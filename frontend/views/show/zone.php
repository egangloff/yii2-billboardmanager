<?php
use billboardmanager\frontend\assets\FrontendAssets;
use yii\web\View;

/* @var $this yii\web\View */

FrontendAssets::register($this);
$this->registerJs(
    "var images = '$images'",
    View::POS_HEAD,
    'my-button-handler'
);

$this->title = Yii::$app->name;
?>