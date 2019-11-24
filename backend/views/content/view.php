<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use billboardmanager\backend\assets\BackendAssets;

/* @var $this yii\web\View */
/* @var $model billboardmanager\common\models\Content */

BackendAssets::register($this);

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Contents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="content-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'type',
                'value' => function($model){
                    $typeArray = ['Image', 'Video'];
                    return $typeArray[$model->type];
                }
            ],
            'name',
            [
                'attribute' => 'image',
                'format' => 'image',
                'value'=>function($data) {
                    if($data->image){
                        return Yii::$app->getModule('billboard')->imgFileUrl.$data->image;
                    }
                },
                'contentOptions' => ['class' => 'view-image'],
            ],
            [
                'attribute' => 'video',
                'format' => 'raw',
                'value'=>function($data) {
                    if($data->video){
                        return '<video controls width="250"><source src="' . Yii::$app->getModule('billboard')->imgFileUrl.$data->video .'" type="video/mp4">Sorry, your browser doesn\'t support embedded videos.</video>';
                    }
                },
                'contentOptions' => ['class' => 'view-image'],
            ],
        ],
    ]) ?>

</div>
