# yii2-billboardmanager
Billboard manager for Yii2

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist egangloff/yii2-billboardmanager "dev-master"
```

or add

```
"egangloff/yii2-billboardmanager": "dev-master"
```

to the require section of your `composer.json` file.


## Configuration

Setup component in `backend/config/main.php`

```
'modules' => [
        'billboard' => [
            'class' => 'billboardmanager\backend\BillboardManager',
            'imgFilePath' => Yii::getAlias('@frontend').'/web/img/billboardmanager/',
            'imgFileUrl' => 'https://<YOUR HOST>/frontend/web/img/billboardmanager/',
        ],
    ],
```

Setup component in `frontend/config/main.php`

```
'modules' => [
        'billboard' => [
            'class' => 'billboardmanager\frontend\BillboardManager',
            'imgFilePath' => Yii::getAlias('@frontend').'/web/img/billboardmanager/',
            'imgFileUrl' => 'https://<YOUR HOST>/frontend/web/img/billboardmanager/',
        ],
    ],
```

## Access

##### Backend

```
https://<YOUR HOST>/backend/billboard
https://<YOUR HOST>/backend/billboard/playlist
https://<YOUR HOST>/backend/billboard/content
https://<YOUR HOST>/backend/billboard/zone
```

##### Frontend

```
https://<YOUR HOST>/billboard
```
