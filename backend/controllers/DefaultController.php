<?php

namespace billboardmanager\backend\controllers;

use Yii;
use billboardmanager\common\models\Schedule;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ScheduleController implements the CRUD actions for Schedule model.
 */
class DefaultController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Show index Page.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index', [
        ]);
    }
}
