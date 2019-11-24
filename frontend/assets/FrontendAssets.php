<?php
namespace billboardmanager\frontend\assets;

use yii\web\AssetBundle;

class FrontendAssets extends AssetBundle
{
    public $sourcePath = '@billboardmanager-frontend-assets';
    public $css = [
        'css/vegas.min.css',
        'css/style.css',
    ];
    public $js = [
        'js/vegas.min.js',
        'js/script.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}