<?php
/**
 * 首页
 * Created by PhpStorm.
 * User: obelisk
 */
namespace app\modules\cn\controllers;
use app\libs\ApiController;
use app\modules\cn\models\User;
use app\modules\cn\models\UserPackage;
use app\modules\cn\models\UserWords;
use app\modules\cn\models\Words;
use yii;


class AppApiController extends ApiController {
    public $enableCsrfValidation = false;
    /**
     * 获取用户资料
     * @Obelisk
     */
    public function actionUserInfo(){
        $uid = Yii::$app->session->get('uid');
        if(!$uid){
            die(json_encode(['code' => 99,'message' => '未登录']));
        }
        $re = User::find()->asArray()->where("uid=$uid")->one();
        if($re){
            $re = [
                'code' => 1,
                'message' => '获取成功',
                'data' => $re
            ];
        }else{
            $re = [
                'code' => 0,
                'message' => '无效用户'
            ];
        }
        die(json_encode($re));

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


    /**
     * 修改记忆模式
     * @Obelisk
     */
    public function actionUpdateModel(){
        $uid = Yii::$app->session->get('uid');
        if(!$uid){
            die(json_encode(['code' => 99,'message' => '未登录']));
        }
        $status = Yii::$app->request->post('status');
        $re = User::updateAll(['studyModel' => $status],"uid=$uid");
        if($re){
            $re = [
                'code' => 1,
                'message' => '修改成功'
            ];
        }else{
            $re = [
                'code' => 0,
                'message' => '修改失败'
            ];
        }
        die(json_encode($re));
    }



    /**
     * 用户计划词包
     * @Obelisk
     */
    public function actionUserPackage(){
        $uid = Yii::$app->session->get('uid');
        if(!$uid){
            die(json_encode(['code' => 99,'message' => '未登录']));
        }
        $package = UserPackage::find()->asArray()->where("uid=$uid")->all();
        foreach($package as $k => $v){
            $total = Words::find()->where("categoryId={$v['id']}")->count();
            $package[$k]['total'] = $total;
            $userWords = UserWords::find()->where("catId={$v['id']} AND uid=$uid")->count();
            $package[$k]['userWords'] = $userWords;
        }
        die(json_encode(['package' => $package]));
    }

    /**
     * 词包列表
     * @Obelisk
     */
    public function actionPackageList(){
        $uid = Yii::$app->session->get('uid');
        if(!$uid){
            die(json_encode(['code' => 99,'message' => '未登录']));
        }
        $package = UserPackage::find()->asArray()->where('pid=0')->all();
        foreach($package as $k => $v){
            $child = UserPackage::find()->asArray()->where("pid={$v['id']}")->all();
            foreach($child as $key => $val){
                $total = Words::find()->where("categoryId={$val['id']}")->count();
                $child[$key]['total'] = $total;
                $userWords = Words::find()->where("catId={$val['id']} AND uid=$uid")->count();
                $child[$key]['userWords'] = $userWords;
            }
            $package[$k]['child'] = $child;
        }
        die(json_encode(['package' => $package]));
    }

    /**
     * 词包详情
     * @Obelisk
     */
    public function actionPackageDetails(){
        $uid = Yii::$app->session->get('uid');
        $catId = Yii::$app->request->post('catId');
        if(!$uid){
            die(json_encode(['code' => 99,'message' => '未登录']));
        }
        $model = new Words();
        $packageDetails = $model->packageDetails($catId,$uid);
        die(json_encode(['packageDetails' => $packageDetails]));
    }

    /**
     * 添加词包
     * @Obelisk
     */
    public function actionAddPackage(){
        $uid = Yii::$app->session->get('uid');
        if(!$uid){
            die(json_encode(['code' => 99,'message' => '未登录']));
        }
        $packageId = Yii::$app->request->post('packageId');
        $model = new UserPackage();
        $model->uid = $uid;
        $model->catId = $packageId;
        $re = $model->save();
        if($re){
            $re = [
                'code' => 1,
                'message' => '添加成功'
            ];
        }else{
            $re = [
                'code' => 0,
                'message' => '添加失败'
            ];
        }
        die(json_encode($re));
    }

    /**
     * 修改翅膀计划
     * @Obelisk
     */
    public function actionUpdatePackage(){
        $uid = Yii::$app->session->get('uid');
        $userPackageId = Yii::$app->request->post('userPackageId');
        $planDay = Yii::$app->request->post('planDay');
        $planWords = Yii::$app->request->post('planWords');
        if(!$uid){
            die(json_encode(['code' => 99,'message' => '未登录']));
        }
        $re = UserPackage::updateAll(['planDay'=>$planDay,'planWords'=>$planWords],"id=$userPackageId");
        if($re){
            $re = [
                'code' => 1,
                'message' => '修改成功'
            ];
        }else{
            $re = [
                'code' => 0,
                'message' => '修改失败'
            ];
        }
        die(json_encode($re));
    }




}