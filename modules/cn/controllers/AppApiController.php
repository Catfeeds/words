<?php
/**
 * 首页
 * Created by PhpStorm.
 * User: obelisk
 */
namespace app\modules\cn\controllers;
use app\libs\ApiController;
use app\modules\cn\models\User;
use yii;


class AppApiController extends ApiController {
    public $enableCsrfValidation = false;
    /**
     * 留学首页
     * @Obelisk
     */
    public function actionIndex(){


    }

    /**
     * 总调度
     * @Obelisk
     */
    public function actionUnifyLogin(){
        $session = Yii::$app->session;
        $model = new User();
        $uid = Yii::$app->request->get('uid');
        $username = Yii::$app->request->get('username');
        $nickname = Yii::$app->request->get('nickname');
        $phone = Yii::$app->request->get('phone');
        $email =Yii::$app->request->get('email');
        $password =Yii::$app->request->get('password');
        $data = $model->find()->where("uid = $uid")->one();
        if (empty($data['uid'])) {
            $login = clone $model;
            $login->phone = $phone;

            $login->email = $email;

            $login->createTime = time();

            $login->username = $username;

            $login->password = $password;

            $login->nickname = $nickname;

            $login->uid = $uid;
            
            $login->save();
        }else{
            if($phone != $data['phone']){
                User::updateAll(['phone' => $phone],"uid=$uid");
            }
            if($email != $data['email']){
                User::updateAll(['email' => "$email"],"uid=$uid");
            }
            if($username != $data['username']){
                User::updateAll(['username' => "$username"],"uid=$uid");
            }
            if($password != $data['password']){
                User::updateAll(['password' => "$password"],"uid=$uid");
            }
            if($nickname != $data['nickname']){
                User::updateAll(['nickname' => "$nickname"],"uid=$uid");
            }
        }
        $session->set('uid', $uid);
    }


}