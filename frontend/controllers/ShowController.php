<?php

namespace billboardmanager\frontend\controllers;
use billboardmanager\common\models\Schedule;
use Yii;
use yii\web\Controller;
use billboardmanager\common\models\Zone;

/**
 * Default controller for the `currencyconverter` module
 */
class ShowController extends Controller
{
    /**
     * Show Homepage
     * @return mixed
     */
    public function actionIndex()
    {
        $zones = Zone::find()->all();
        return $this->render('index', [
            'zones' => $zones
        ]);
    }

    /**
     * Show Slideshow
     * @return mixed
     */
    public function actionZone($id)
    {
        $now = date("Y-m-d H:i:s");
        $schedules = Schedule::find()
            ->where(['fkzone' => $id])
            ->andWhere(['<', 'start', $now])
            ->andWhere(['>', 'end', $now])
            ->orWhere(['always' => 1])
            ->all();

        $images = [];
        foreach ($schedules as $schedule) {
            foreach ($schedule->playlist->contents as $content) {
                if (isset($content->image) and $content->image != '') {
                    $images[]['src'] = Yii::$app->getModule('billboard')->imgFileUrl . $content->image;
                } elseif (isset($content->video) and $content->video != '') {
                    $images[]['video']['src'] = Yii::$app->getModule('billboard')->imgFileUrl . $content->video;
                }
            }
        }

        return $this->render('zone', [
            'images' => json_encode($images)
        ]);

    }


}
