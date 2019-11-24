<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use billboardmanager\common\models\Zone;

/* @var $this yii\web\View */
/* @var $searchModel billboardmanager\common\models\ScheduleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Schedules';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schedule-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Schedule', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'fkzone',
                'filter'=>ArrayHelper::map(Zone::find()->asArray()->all(), 'id', 'name'),
                'format' => 'text',
                'value'=>function($data) { return $data->zone->name; },
            ],
            [
                'attribute' => 'fkplaylist',
                'format' => 'text',
                'value'=>function($data) { return $data->playlist->name; },
            ],
            [
                'attribute' => 'always',
                'format' => 'text',
                'value'=>function($data) {
                    $alwaysArray = ['No', 'Yes'];
                    return $alwaysArray[$data->always];
                },
            ],
            'start',
            'end',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
