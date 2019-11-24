<?php

namespace billboardmanager\backend\controllers;

use Yii;
use billboardmanager\common\models\Content;
use billboardmanager\common\models\ContentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ContentController implements the CRUD actions for Content model.
 */
class ContentController extends Controller
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
     * Lists all Content models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ContentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Content model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Content model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Content();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $image = UploadedFile::getInstance($model, 'upload_image');
            if(!is_null($image))
            {
                $imgPath = Yii::getAlias('@frontend').'/web/img/billboardmanager/';
                $imgName = $model->id.'.'.$image->getExtension();
                $saveTo = $imgPath.$imgName;
                if($image->saveAs($saveTo))
                {
                    $model->image = $imgName;
                    $model->save();
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Content model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $image = UploadedFile::getInstance($model, 'upload_image');
            if(!is_null($image))
            {
                $imgPath = Yii::getAlias('@frontend').'/web/img/billboardmanager/';
                $imgName = $model->id.'.'.$image->getExtension();
                $saveTo = $imgPath.$imgName;
                if($image->saveAs($saveTo))
                {
                    $model->image = $imgName;
                }
            }
            $video = UploadedFile::getInstance($model, 'upload_video');
            if(!is_null($video))
            {
                $videoPath = Yii::getAlias('@frontend').'/web/img/billboardmanager/';
                $videoName = $model->id.'.'.$video->getExtension();
                $saveTo = $videoPath.$videoName;
                if($video->saveAs($saveTo))
                {
                    $model->video = $videoName;
                }
            }
            if($model->type == 0){
                $model->video = '';
            }
            elseif ($model->type == 1){
                $model->image = '';
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Content model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Content model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Content the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Content::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
