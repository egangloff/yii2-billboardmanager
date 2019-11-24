<?php

use yii\helpers\Html;
use yii\grid\GridView;
use billboardmanager\backend\assets\BackendAssets;

/* @var $this yii\web\View */
/* @var $searchModel billboardmanager\common\models\ContentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

BackendAssets::register($this);

$this->title = 'Contents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Content', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'type',
                'filter'=>['Image', 'Video'],
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
                'contentOptions' => ['class' => 'index-image'],
            ],
            [
                'attribute' => 'video',
                'format' => 'raw',
                'value'=>function($data) {
                    if($data->video){
                        return '<video controls width="250"><source src="'. Yii::$app->getModule('billboard')->imgFileUrl.$data->video .'" type="video/mp4">Sorry, your browser doesn\'t support embedded videos.</video>';
                    }
                },
                'contentOptions' => ['class' => 'view-image'],
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
