<?php
namespace backend\controllers;

use Yii;
use common\models\User;
use common\models\Packs;
use common\models\search\UserQuery;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use common\models\search\PacksQuery;

/**
 * PacksController implements the CRUD actions for Packs model.
 */
class PacksController extends Controller
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
     * Lists all Packs models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PacksQuery();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Packs model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        
        $model = $this->findModel($id);
        $user = User::find()->where(["id" => $model->user_id])->one();

        return $this->render('view', [
            'model' => $this->findModel($id),
            'user'  => $user
        ]);
    }

    /**
     * Creates a new Packs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Packs();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Packs model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $user = User::find()->where(["id" => $model->user_id])->one();

        if ($model->load(Yii::$app->request->post())) {
            $image = UploadedFile::getInstance($model, 'img');
            if($image) {

                $name = explode(".", $image->name)[0];
                $imageformat = bin2hex(openssl_random_pseudo_bytes(5))."-".$name.'.'.$image->extension;
                $model->img = $imageformat;
                $image->saveAs('uploads/'.$imageformat);
            }else {
                $model->img = $model->OldAttributes['img'];
            }

            $model->save();
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
            'user' => $user,
        ]);
    }

    /**
     * Deletes an existing Packs model.
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
     * Finds the Packs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Packs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Packs::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
