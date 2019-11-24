<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model billboardmanager\common\models\Schedule */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Schedules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="schedule-view">

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
                'attribute' => 'fkzone',
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
        ],
    ]) ?>

</div>
