<?php

namespace app\controllers;

use app\models\MercadoLivre;
use app\models\MercadoLivreSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use linslin\yii2\curl;
use yii\helpers\BaseJson;
use Yii;

/**
 * MercadoLivreController implements the CRUD actions for MercadoLivre model.
 */
class MercadoLivreController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all MercadoLivre models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MercadoLivreSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    //https://auth.mercadolivre.com.br/appstore/access?client_id=6461509449383576&response_type=code&redirect_uri=https%3A%2F%2Flocalhost%2FPecaAgora%2Fbasic%2Fweb%2Findex.php%3Fr%3Dmercado-livre%252Findex&state=&scopes=read%2Cwrite%2Coffline_access&code_challenge=&code_challenge_method=&grantType=appstore&nameStamp=0cde72e2695e4729c49ff166b36ed649002799edac31ac6368396fd6918733a0&timestamp=1698934701804&authorize=true&_csrf=AmTTYhHg-d_o3OvpwnItaoUy7vVVyDCk3Z_0&deviceSessionId=armor.5e134153bc1257e61a1461aa332c6add5fd6e10704cab6832c0a7e5ea18f8509dbbe8987e21b5ca959bfe6e086dc3efd0088feb64ddaf54e1a0659a1c5bb3cf61c4c0f3521fc7097653d3acf6e94c41f9f58d482675e5140c4074765962e33c4.201719a85c070586ebbf27899f62d477
    /**
     * Displays a single MercadoLivre model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView()
    {   
        $id=Yii::$app->request->get('MercadoLivreSearch')['id'];

        $searchModel = new MercadoLivreSearch();
        $curl = new curl\Curl();

        //remove o '-' e coloca as letras maiusculas
        $meli_id_sanitized = strtoupper(str_replace( "-", "", $id));
        $resposta = BaseJson::decode($curl->get('https://api.mercadolibre.com/items?ids='.$meli_id_sanitized))[0];
            switch ($resposta['code']) {

                case 'timeout':
                        $resposta['body']['erro'] = 'Tempo de resposta maior que o esperado, tente mais tarde.';
                        return $this->render('view', [
                            'model' =>$resposta['body'],
                            'searchModel' => $searchModel,
                        ]);
                                     
                break;
                    
                case 200:
                    $categoria = $curl->get('https://api.mercadolibre.com/categories/'.$resposta['body']['category_id']);
                    $resposta['body']['category_id'] = BaseJson::decode($categoria)['name'];

                    //verificar se o produto está disponivel (under_review)
                    if($resposta['body']['status'] == 'under_review'){
                        $resposta['body']['erro'] = 'Este produto está indisponível no momento.';
                        return $this->render('view', [
                            'model' =>$resposta['body'],
                            'searchModel' => $searchModel,
                        ]);
                    }

                    return $this->render('view', [
                        'model' =>$resposta['body'],
                        'searchModel' => $searchModel,
                    ]);
                    break;
            
                case 404:
                    $resposta['body']['erro'] = 'Produto não encontrado.';
                    return $this->render('view', [
                        'model' =>$resposta['body'],
                        'searchModel' => $searchModel,
                    ]);
                    break;
            }
        



    }

    /**
     * Creates a new MercadoLivre model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new MercadoLivre();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MercadoLivre model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MercadoLivre model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MercadoLivre model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return MercadoLivre the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MercadoLivre::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
