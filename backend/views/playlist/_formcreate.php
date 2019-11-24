<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use billboardmanager\common\models\Content;
use billboardmanager\backend\assets\BackendAssets;

/* @var $this yii\web\View */
/* @var $model billboardmanager\common\models\Playlist */
/* @var $form yii\widgets\ActiveForm */

BackendAssets::register($this);
?>

<div class="playlist-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    
    <?php $contentArray = ArrayHelper::map(Content::find()->orderBy('id')->all(), 'id', 'name') ?>

    <?= $form->field($playlistContent, 'fkcontent')->dropDownList($contentArray, ['prompt' => '---- Select Content ----']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
