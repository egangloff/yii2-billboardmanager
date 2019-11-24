<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use billboardmanager\common\models\Zone;
use billboardmanager\common\models\Playlist;
use dosamigos\datetimepicker\DateTimePicker;
use billboardmanager\backend\assets\BackendAssets;

/* @var $this yii\web\View */
/* @var $model billboardmanager\common\models\Schedule */
/* @var $form yii\widgets\ActiveForm */

BackendAssets::register($this);
?>

<div class="schedule-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php $zoneArray = ArrayHelper::map(Zone::find()->orderBy('id')->all(), 'id', 'name') ?>

    <?= $form->field($model, 'fkzone')->dropDownList($zoneArray, ['prompt' => '---- Select zone ----'])->label('Zone') ?>

    <?php $playlistArray = ArrayHelper::map(Playlist::find()->orderBy('id')->all(), 'id', 'name') ?>

    <?= $form->field($model, 'fkplaylist')->dropDownList($playlistArray, ['prompt' => '---- Select playlist ----'])->label('Playlist') ?>

    <?php $alwaysArray = ['No', 'Yes'] ?>

    <?= $form->field($model, 'always')->dropDownList($alwaysArray, ['prompt' => '---- Select answer ----', 'options' => [ 1 => ['Selected'=>'selected']]])->label('Always Show') ?>

    <div class="row dates">
        <div class="col-md-6">
            <?= $form->field($model, 'start')->widget(DateTimePicker::className(), [
                'language' => 'en',
                'size' => 'ms',
                'template' => '{input}',
                'pickButtonIcon' => 'glyphicon glyphicon-time',
                'inline' => true,
                'clientOptions' => [
                    'startView'=>'month',
                    'minView' => 0,
                    'maxView' => 1,
                    'autoclose' => true,
                    'linkFormat' => 'yyyy-m-dd hh:ii:ss', // if inline = true
                    // 'format' => 'HH:ii P', // if inline = false
                    'todayBtn' => false
                ]
            ]);?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'end')->widget(DateTimePicker::className(), [
                'language' => 'en',
                'size' => 'ms',
                'template' => '{input}',
                'pickButtonIcon' => 'glyphicon glyphicon-time',
                'inline' => true,
                'clientOptions' => [
                    'startView'=>'month',
                    'minView' => 0,
                    'maxView' => 1,
                    'autoclose' => true,
                    'linkFormat' => 'yyyy-m-dd hh:ii:ss', // if inline = true
                    // 'format' => 'HH:ii P', // if inline = false
                    'todayBtn' => false
                ]
            ]);?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
