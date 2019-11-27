<?php
use billboardmanager\frontend\assets\FrontendAssets;
use yii\web\View;

/* @var $this yii\web\View */

FrontendAssets::register($this);
$this->registerJs(
    "var contents = '$contents'",
    View::POS_HEAD,
    'my-button-handler'
);

$this->title = Yii::$app->name;
?>
<img id="slideshow" src="<?=Yii::$app->getModule('billboard')->imgFileUrl?>/default.png" width=100% height=100% alt="Slideshow">

<video id="slideshow_vid" hidden  muted="muted">
    <source id="slideshow_src" type="video/mp4">
</video>
