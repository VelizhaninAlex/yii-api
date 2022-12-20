<?php

namespace app\controllers;

use app\models\TokenTransfer;
use app\models\UserWallets;
use Yii;
use yii\filters\AccessControl;
use yii\filters\auth\HttpBearerAuth;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;
use app\models\PresaleOrder;

class ProfileController extends ActiveController
{
    private int $pageSize = 5;
    private int $page = 1;
    public $modelClass = 'app\models\User';

    protected function verbs(){
        return [
            'create' => ['POST'],
            'update' => ['PUT', 'PATCH','POST'],
            'view' => ['GET'],
            'index'=>['GET','POST'],
            'edit' => ['POST'],
            'wallet' => ['POST'],
            'logout' => ['GET'],
        ];
    }

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['authenticator']['authMethods'] = [
            HttpBearerAuth::className(),
        ];

        $behaviors['access'] = [
            'class' => AccessControl::className(),
            'rules' => [
                [
                    'allow' => true,
                    'roles' => ['@'],
                ],
            ],
        ];

        return $behaviors;
    }

    public function actionInfo(){
       return Yii::$app->user->identity;
    }

    public function actionWallet(): array
    {
        if(!empty(Yii::$app->request->post('wallet'))){
            $wallet = UserWallets::findOne(['user_id'=>Yii::$app->user->identity->getId(),'type'=>'ETH']);
            if ($wallet == null) {
                $wallet = new UserWallets();
                $wallet->type = 'ETH';
                $wallet->user_id = Yii::$app->user->identity->getId();
            }else{
                $wallet->wallet = Yii::$app->request->post('wallet');
            }
            if($wallet->save()){
                return ['success'=>true,'msg'=>'SAVE_WALLET_SUCCESS'];
            }
        }
        return ['success'=>false,'msg'=>'WALLET_IS_REQUIRED'];
    }

    /**
     * @throws NotFoundHttpException
     */
    public function actionEdit(): array
    {
        $model = $this->findModel(Yii::$app->user->identity->getId());
        if ($model->load(Yii::$app->request->post(),'') && $model->validate()) {
            if($model->save()){
                return ['success'=>true,'msg'=>'SAVE_PROFILE_SUCCESS'];
            }
        }
        return ['success'=>false,'msg'=>'SAVE_PROFILE_FAIL'];
    }

    public function actionLogout(): array
    {
        Yii::$app->user->logout();
        return ['success'=>true,'msg'=>'LOGOUT_SUCCESS'];
    }

    /**
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        if (($model = $this->modelClass::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Not Found');
    }

    public function actionTransactions(){
       $query = TokenTransfer::find()->andFilterWhere(['=','user_id',Yii::$app->user->identity->getId()]);
       $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
               'pageSize' => !empty($this->request->get('page-size'))?$this->request->get('page-size'):$this->pageSize,
               'page' => !empty($this->request->get('page'))?$this->request->get('page'):$this->page-1,
            ],
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC,
                    'id' => SORT_ASC,
                ]
            ],
        ]);

        return ['result'=>$provider->getModels(),'count'=> $provider->getTotalCount()];
    }

    public function actionGetWallet(){
        return [
            'wallet' => UserWallets::findOne(['user_id'=>Yii::$app->user->identity->getId(),'type'=>'ETH'])->wallet??'',
            'balance' => UserWallets::find()->where(['user_id'=>Yii::$app->user->identity->getId()])->sum('token')??0,
        ];
    }

    public function actionOrder()
    {
        $order = PresaleOrder::findOne(['user_id'=>Yii::$app->user->identity->getId()]);
        if ($order == null) {
            $order = new PresaleOrder();
            $order->user_id = Yii::$app->user->identity->getId();
        }
        $order->sum = $this->request->post('sum');
        $order->wallet = $this->request->post('wallet');
        if($order->save()){
            return ['success'=>true,'msg'=>'SAVE_ORDER_SUCCESS'];
        }
        return ['success'=>false,'msg'=>'SAVE_ORDER_FAIL'];
    }
}
