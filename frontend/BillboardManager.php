<?php
namespace billboardmanager\frontend;

use Yii;

class BillboardManager extends \yii\base\Module
{
    public $controllerNamespace = 'billboardmanager\frontend\controllers';
    public $imgFilePath;
    public $imgFileUrl;
    public $defaultRoute = 'show';

    public function init()
    {
        parent::init();

        Yii::configure($this, require __DIR__ . '/config.php');
        Yii::$app->setHomeUrl('/billboard');

    }
}