<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use billboardmanager\backend\assets\BackendAssets;

/* @var $this yii\web\View */
/* @var $model billboardmanager\common\models\Content */
/* @var $form yii\widgets\ActiveForm */

BackendAssets::register($this);
$this->registerJs(
    "$(window).on('load', function(){showType($model->type)})",
    View::POS_END,
    'my-button-handler'
);

?>

<div class="content-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?php $typeArray = ['Image', 'Video']; ?>

    <?= $form->field($model, 'type')->dropDownList($typeArray, ['prompt' => '---- Select type ----'])->label('type') ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?php
    if($model->image != null and $model->image != '')
    {
        ?>
        <div class="row content-image">
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <?= Html::img(Yii::$app->getModule('billboard')->imgFileUrl.$model->image); ?>
            </div>
        </div>
        <?php
    }
    ?>

    <?= $form->field($model, 'upload_image')->fileInput(['multiple' => false]) ?>

    <?php
    if($model->video != null and $model->video != '')
    {
        ?>
        <div class="row content-video">
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <video controls width="250">
                    <source src="<?= Yii::$app->getModule('billboard')->imgFileUrl.$model->video ?>" type="video/mp4">
                    Sorry, your browser doesn't support embedded videos.
                </video>
            </div>
        </div>
        <?php
    }
    ?>

    <?= $form->field($model, 'upload_video')->fileInput(['multiple' => false]) ?>

    <?= $form->field($model, 'duration')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
