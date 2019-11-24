<?php

namespace billboardmanager\common\models;

use Yii;

/**
 * This is the model class for table "schedule".
 *
 * @property int $id
 * @property int $fkplaylist
 * @property int $fkzone
 * @property int $always
 * @property string $start
 * @property string $end
 */
class Schedule extends \yii\db\ActiveRecord
{
    public $startTemp;
    public $endTemp;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'schedule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fkplaylist', 'fkzone', 'always'], 'required'],
            [['fkplaylist', 'fkzone', 'always'], 'integer'],
            [
                'start',
                'required',
                'when' => function ($model) {
                    return $model->always == 0;
                },
                'whenClient' => "function (attribute, value) { 
                    return $('#schedule-always').val() == '0'; 
                }"
            ],
            [
                'end',
                'required',
                'when' => function ($model) {
                    return $model->always == 0;
                },
                'whenClient' => "function (attribute, value) { 
                    return $('#schedule-always').val() == '0'; 
                }"
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fkplaylist' => 'Playlist',
            'fkzone' => 'Zone',
            'always' => 'Always Show',
            'start' => 'Start',
            'end' => 'End',
        ];
    }

    public function getZone(){
        return $this->hasOne(Zone::className(), ['id' => 'fkzone']);
    }

    public function getPlaylist(){
        return $this->hasOne(Playlist::className(), ['id' => 'fkplaylist']);
    }
}
