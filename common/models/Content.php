<?php

namespace billboardmanager\common\models;

use Yii;

/**
 * This is the model class for table "content".
 *
 * @property int $id
 * @property int $type
 * @property int $name
 * @property string $image
 * @property string $video
 */
class Content extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'content';
    }

    public $upload_image;
    public $upload_video;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'name'], 'required'],
            /*
            ['image', 'required',
                'when' => function($model) {
                    return $model->type == 0;
                },'enableClientValidation' => false
            ],
            ['video', 'required',
                'when' => function($model) {
                    return $model->type == 1;
                },'enableClientValidation' => false
            ],
            */
            [['type', 'duration'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['image', 'video'], 'string', 'max' => 50],
            [['upload_image'], 'file', 'extensions' => 'png, jpg', 'maxFiles' => 1, 'skipOnEmpty' => true],
            [['upload_video'], 'file', 'extensions' => 'mp4', 'maxFiles' => 1, 'skipOnEmpty' => true],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'type',
            'name' => 'Name',
            'image' => 'Image',
            'video' => 'Video',
            'duration' => 'Duration'
        ];
    }
    

    public function getPlaylists()
    {
        return $this->hasMany(Playlist::className(), ['id' => 'fkplaylist'])
            ->viaTable('playlist_content', ['fkcontent' => 'id']);
    }
}
