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

/**
 * UsersController implements the CRUD actions for User model.
 */
class UsersController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserQuery();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {   
        $packs = Packs::find()->where(['user_id' => $id])->orderBy('id DESC')->all();

        return $this->render('view', [
            'model' => $this->findModel($id),
            'packs' => $packs
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();
        
        if ($model->load(Yii::$app->request->post())/* && $model->save()*/) {

            $model->username = $model->first_name."-". $model->last_name ."_". bin2hex(openssl_random_pseudo_bytes(5));

            if( $model->email == "" || $model->email == NULL) {
                $model->email = $model->first_name."-". $model->last_name ."@". bin2hex(openssl_random_pseudo_bytes(5)) ."_". $model->id_card .".com";
            }

           /* $model->setPassword(bin2hex(openssl_random_pseudo_bytes(15)));
            $model->generateAuthKey();*/

            if($model->validate() && $model->save()){
                return $this->redirect(['index']);
            } 
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
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
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

   public function actionPacks($id) {

        $user = $this->findModel($id);
        $model = new Packs();

        if ( $model->load( Yii::$app->request->post() ) ) {

            $model->user_id = $user->id;
            $model->first_name = $user->first_name;
            $model->last_name = $user->last_name;
            $image = UploadedFile::getInstance($model, 'img');

            if($model->date == "" || $model->date == NULL ) {
               $model->date = date("d.m.Y"); 
            }
            
            if(isset($image->name)) {
                $name = explode(".", $image->name)[0];

                $imageformat = bin2hex(openssl_random_pseudo_bytes(5))."-".$name.'.'.$image->extension;
                $model->img = $imageformat;
                $image->saveAs('uploads/'.$imageformat);
            }

            if($model->save()) {

                Yii::$app->session->setFlash('success', 'Uspješno ste upisali paket!');            
            }

            return $this->redirect(['view', 'id' => $id]);
        } else {
            return $this->render('packs', [
                'model' => $model,
                'user' => $user
            ]);
        }       
    }
}
