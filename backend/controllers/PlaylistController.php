<?php

namespace billboardmanager\backend\controllers;

use Yii;
use billboardmanager\common\models\Playlist;
use billboardmanager\common\models\PlaylistSearch;
use billboardmanager\common\models\PlaylistContent;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PlaylistController implements the CRUD actions for Playlist model.
 */
class PlaylistController extends Controller
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
     * Lists all Playlist models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PlaylistSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Playlist model.
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
     * Creates a new Playlist model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Playlist();
        $playlistContent = new PlaylistContent();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $playlistContent->fkplaylist = $model->id;
            $playlistContent->fkcontent = Yii::$app->request->post('PlaylistContent')['fkcontent'];
            $playlistContent->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'playlistContent' => $playlistContent
        ]);
    }

    /**
     * Updates an existing Playlist model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $playlistContent = new PlaylistContent();

        if ($model->load(Yii::$app->request->post())) {
            if(Yii::$app->request->post('PlaylistContent')['fkcontent']){
                $rowExists = PlaylistContent::find()->where([
                    'fkplaylist' => Yii::$app->request->post('PlaylistContent')['fkplaylist'],
                    'fkcontent' => Yii::$app->request->post('PlaylistContent')['fkcontent']
                ])->one();
                if(!$rowExists){
                    $playlistContent->fkplaylist = Yii::$app->request->post('PlaylistContent')['fkplaylist'];
                    $playlistContent->fkcontent = Yii::$app->request->post('PlaylistContent')['fkcontent'];
                    $playlistContent->save();
                }
            }
            return $this->redirect(['update', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'playlistContent' => $playlistContent
        ]);
    }

    /**
     * Deletes an existing Playlist model.
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
     * Finds the Playlist model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Playlist the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Playlist::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionRemovecontent($fkplaylist, $fkcontent){
        $contents = PlaylistContent::deleteAll(['fkplaylist' => $fkplaylist, 'fkcontent' => $fkcontent]);
        return $this->redirect(['update', 'id' => $fkplaylist]);
    }

    public function actionOrdercontent($id){
        $items = Yii::$app->request->post('item');
        $i = 0;
        foreach ($items as $value) {
            $content = PlaylistContent::findOne(['fkplaylist'=>$id, 'fkcontent'=>$value]);
            $content->position = $i;
            $content->save();
            $i++;
        }
    }
}
