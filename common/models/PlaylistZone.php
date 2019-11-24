<?php

namespace billboardmanager\common\models;

use Yii;

/**
 * This is the model class for table "playlist_zone".
 *
 * @property int $id
 * @property int $fkplaylist
 * @property int $fkzone
 */
class PlaylistZone extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'playlist_zone';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fkplaylist', 'fkzone'], 'required'],
            [['fkplaylist', 'fkzone'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fkplaylist' => 'Fkplaylist',
            'fkzone' => 'Fkzone',
        ];
    }
}
