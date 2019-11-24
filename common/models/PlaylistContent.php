<?php

namespace billboardmanager\common\models;

use Yii;

/**
 * This is the model class for table "playlist_content".
 *
 * @property int $id
 * @property int $fkplaylist
 * @property int $fkcontent
 */
class PlaylistContent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'playlist_content';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fkplaylist'], 'required'],
            [['fkplaylist', 'fkcontent'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Content',
            'fkplaylist' => 'Fkplaylist',
            'fkcontent' => 'Add content',
        ];
    }
}
