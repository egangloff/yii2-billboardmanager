<?php

namespace billboardmanager\common\models;

use Yii;
use billboardmanager\common\models\Content;

/**
 * This is the model class for table "playlist".
 *
 * @property int $id
 * @property string $name
 */
class Playlist extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'playlist';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    public function getZones()
    {
        return $this->hasMany(Zone::className(), ['id' => 'fkzone'])
            ->viaTable('playlist_zone', ['fkzone' => 'id']);
    }

    public function getContents()
    {
        return $this->hasMany(Content::className(), ['id' => 'fkcontent'])
            ->viaTable('playlist_content', ['fkplaylist' => 'id'])
            ->innerJoin('playlist_content','playlist_content.fkcontent = content.id')
            ->andWhere(['playlist_content.fkplaylist' => $this])
            ->orderBy(['playlist_content.position'=> SORT_ASC]);
    }
}
