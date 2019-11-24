<?php
namespace billboardmanager\backend;

use Yii;

class BillboardManager extends \yii\base\Module
{
    public $controllerNamespace = 'billboardmanager\backend\controllers';
    public $imgFilePath;
    public $imgFileUrl;
    public $defaultRoute = 'schedule';

    public function init()
    {
        parent::init();

        Yii::configure($this, require __DIR__ . '/config.php');
        Yii::$app->setHomeUrl('/billboard');

    }
}