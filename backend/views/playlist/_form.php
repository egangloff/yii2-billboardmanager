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

    <?= $form->field($playlistContent, 'fkplaylist')->textInput(['value'=> $model->id])->label(false) ?>

    <?php $contentArray = ArrayHelper::map(Content::find()->orderBy('id')->all(), 'id', 'name') ?>

    <?= $form->field($playlistContent, 'fkcontent')->dropDownList($contentArray, ['prompt' => '---- Select Content ----']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <div id="sortable" class="row is-flex content-image">
        <?php
            $contents = $model->contents;
            foreach ($contents as $content)
            {
                ?>
                    <div id="item-<?= $content->id ?>" class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <?php
                        if($content->type == 0){
                           ?>
                                   <?= Html::img(Yii::$app->getModule('billboard')->imgFileUrl.$content->image); ?>
                           <?php
                        }
                        elseif ($content->type == 1){
                           ?>
                            <video controls width="250">
                                <source src="<?= Yii::$app->getModule('billboard')->imgFileUrl.$content->video ?>" type="video/mp4">
                                Sorry, your browser doesn't support embedded videos.
                            </video>
                            <?php
                        }
                        ?>
                        <a href="<?= Url::to(['removecontent', 'fkplaylist' => $model->id, 'fkcontent' => $content->id]); ?>">Remove</a>
                    </div>
                <?php
            }
        ?>
    </div>


</div>
