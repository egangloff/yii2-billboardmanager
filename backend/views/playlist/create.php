<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model billboardmanager\common\models\Playlist */

$this->title = 'Create Playlist';
$this->params['breadcrumbs'][] = ['label' => 'Playlist', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="playlist-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formcreate', [
        'model' => $model,
        'playlistContent' => $playlistContent
    ]) ?>

</div>
