<?php
namespace billboardmanager\backend\assets;

use yii\web\AssetBundle;

class BackendAssets extends AssetBundle
{
    public $sourcePath = '@billboardmanager-backend-assets';
    public $css = [
        'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css',
        'css/style.css',
    ];
    public $js = [
        'https://code.jquery.com/ui/1.12.1/jquery-ui.js',
        'js/script.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}