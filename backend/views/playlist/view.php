<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use billboardmanager\backend\assets\BackendAssets;

/* @var $this yii\web\View */
/* @var $model billboardmanager\common\models\Playlist */

BackendAssets::register($this);

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Playlists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="playlist-view">

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
            'name',
        ],
    ]) ?>

    <div class="row is-flex content-image">
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
            </div>
            <?php
        }
        ?>
    </div>

</div>
