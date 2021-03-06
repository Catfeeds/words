<?php
/**
 * 首页
 * Created by PhpStorm.
 * User: obelisk
 */
namespace app\modules\cn\controllers;
use app\libs\ApiController;
use app\modules\cn\models\Category;
use app\modules\cn\models\User;
use app\modules\cn\models\UserPackage;
use app\modules\cn\models\UserSign;
use app\modules\cn\models\UserWords;
use app\modules\cn\models\Words;
use app\modules\cn\models\WordsLowSentence;
use app\modules\cn\models\WordsSentence;
use yii;


class AppApiController extends ApiController {
    function init (){
        parent::init();
        include_once($_SERVER['DOCUMENT_ROOT'].'/../libs/ucenter/ucenter.php');
    }
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
        $sign = UserPackage::find()->asArray()->where("catId={$re['nowPackage']} AND uid=$uid")->one();
        $re['planWords'] = $sign['planWords'];
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
     * 背单词首页
     * @Obelisk
     */
    public function actionIndex(){
        $uid = Yii::$app->session->get('uid');
        if(!$uid){
            die(json_encode(['code' => 99,'message' => '未登录']));
        }
        $re = User::find()->asArray()->where("uid=$uid")->one();
        $model = new UserWords();
        $insistDay = $model->insistDay($uid);
        $userPackageWords = $model->getUserPackageNum($re['nowPackage'],$uid);
        $userPackage = UserPackage::find()->asArray()->where("uid=$uid AND catId={$re['nowPackage']}")->one();
        $surplusDay = $model->surplusDay($re['nowPackage'],$userPackageWords,$userPackage['planWords']);
        $userAllWords = UserWords::find()->where("uid=$uid")->count();
        $day = date("Y-m-d");
        $toDayWords = UserWords::find()->where("uid=$uid AND createDay=$day")->count();
        $userReviewWords = UserWords::find()->where("uid=$uid AND reviewDay=$day")->count();
        $userNeedReviewWords = UserWords::find()->where("uid=$uid AND type=1")->count();
        $allWords = Words::find()->where("categoryId={$re['nowPackage']}")->count();
        $packageName = Category::find()->where("id={$re['nowPackage']}")->one();
        die(json_encode(['packageName' => $packageName->name,'allWords' => $allWords,'insistDay' => $insistDay,'userPackageWords' => $userPackageWords,'userPackage' => $userPackage,'surplusDay' => $surplusDay,'userAllWords' => $userAllWords,'toDayWords' => $toDayWords,'userReviewWords' => $userReviewWords,'userNeedReviewWords' => $userNeedReviewWords]));

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
        $this->first($uid);
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
            $total = Words::find()->where("categoryId={$v['catId']}")->count();
            $package[$k]['total'] = $total;
            $model = new UserWords();
            $num = $model->getUserPackageNum($v['catId'],$uid);
            $package[$k]['userWords'] = $num;
            $sign = Category::find()->where("id={$v['catId']}")->one();
            $package[$k]['name'] = $sign->name;
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
        $package = Category::find()->asArray()->where('pid=0')->all();
        foreach($package as $k => $v){
            $child = Category::find()->asArray()->where("pid={$v['id']}")->all();
            foreach($child as $key => $val){
                $total = Words::find()->where("categoryId={$val['id']}")->count();
                $child[$key]['total'] = $total;
                $model = new UserWords();
                $num = $model->getUserPackageNum($v['id'],$uid);
                $child[$key]['userWords'] = $num;
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
        $page = Yii::$app->request->post('page',1);
        $pageSize = Yii::$app->request->post('pageSize',20);
        if(!$uid){
            die(json_encode(['code' => 99,'message' => '未登录']));
        }
        $model = new Words();
        $packageDetails = $model->packageDetails($catId,$uid,$page,$pageSize);
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
        $sign = User::findOne($uid);
        $packageId = Yii::$app->request->post('packageId');
        $sign1 = UserPackage::find()->where("catId=$packageId AND uid=$uid")->one();
        if($sign1){
            die(json_encode(['code' => 0,'message' => '该词包已添加']));
        }
        $model = new UserPackage();
        $model->uid = $uid;
        $model->catId = $packageId;
        $re = $model->save();
        if($re){
            if(!$sign->nowPackage){
                User::updateAll(['nowPackage' => $packageId],"uid=$uid");
            }
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
     * 删除词包计划
     * @Obelisk
     */
    public function actionDeletePackage(){
        $uid = Yii::$app->session->get('uid');
        $id = Yii::$app->request->post('id');
        if(!$uid){
            die(json_encode(['code' => 99,'message' => '未登录']));
        }
        $sign = UserPackage::findOne($id);
        $sign1 = User::findOne($uid);
        $re = UserPackage::deleteAll("id=$id");
        if($sign->catId == $sign1->nowPackage){
            $sign = UserPackage::find()->orderBy('id ASC')->one();
            if($sign){
                User::updateAll(['nowPackage' => $sign->catId],"uid=$uid");
            }else{
                User::updateAll(['nowPackage' => null],"uid=$uid");
            }
        }
        if($re){
            $re = [
                'code' => 1,
                'message' => '删除成功'
            ];
        }else{
            $re = [
                'code' => 0,
                'message' => '删除成功'
            ];
        }
        die(json_encode($re));
    }

    /**
     * 修改词包计划
     * @Obelisk
     */
    public function actionUpdatePackage(){
        $uid = Yii::$app->session->get('uid');
        $data = Yii::$app->request->post('data');
        $data = json_decode($data,true);
        if(!$uid){
            die(json_encode(['code' => 99,'message' => '未登录']));
        }
        foreach($data as $v){
            UserPackage::updateAll(['planDay'=>$v['planDay'],'planWords'=>$v['planWords']],"id={$v['id']}");
        }
        die(json_encode(['code' => 1,'message' => '成功']));
    }

    /**
     * 背单词
     * @Obelisk
     */
    public function actionReciteWords(){
        $uid = Yii::$app->session->get('uid');
        $isMemory = Yii::$app->session->get('isMemory');
        if(!$uid){
            die(json_encode(['code' => 99,'message' => '未登录']));
        }
        $sign = User::findOne($uid);
        if($sign->studyModel == 1 && $isMemory){
            $re = $this->verifyMemory($uid);
            if($re){
                die(json_encode(['code' => 98,'message' => '进入复习了']));
            }
        }
        $packageId = $sign->nowPackage;
        $model = new UserWords();
        $wordsId = $model->lastWords($packageId,$uid);
        $words = Words::find()->asArray()->where("categoryId=$packageId AND id>$wordsId")->orderBy("id ASC")->one();
        if(!$words){
            die(json_encode(['code' => 2,'message' => '没有单词了']));
        }
        $sentence = WordsSentence::find()->asArray()->where("wordsId={$words['id']}")->all();
        $lowSentence = WordsLowSentence::find()->asArray()->where("wordsId={$words['id']}")->all();
        $re = file_get_contents("http://gmatonline.cc/index.php?web/webapi/getWordsQuestion&words={$words['word']}");
        $re = json_decode($re,true);
        if($re['code'] == 1){
            $question = $re['question'];
        }else{
            $question = false;
        }
        Yii::$app->session->remove('isMemory');
        die(json_encode(['code' => 1,'message' => '成功','words' => $words,'sentence' => $sentence,'lowSentence' => $lowSentence,'question' => $question]));
    }

    /**
     * 修改状态
     * @Obelisk
     */
    public function actionUpdateStatus(){
        $uid = Yii::$app->session->get('uid');
        $wordsId = Yii::$app->request->post('wordsId');
        $status = Yii::$app->request->post('status');
        $time = time();
        $day = date("Y-m-d");
        if(!$uid){
            die(json_encode(['code' => 99,'message' => '未登录']));
        }
        $re = UserWords::find()->where("wordsId=$wordsId AND uid=$uid")->one();
        if($re){
            if($status == 1){
                $isKnow = 1;
            }else{
                $isKnow = 0;
            }
            $re = UserWords::updateAll(['lastStatus' => $status,'updateTime' => $time,'updateDay' => $day,'isKnow' => $isKnow],"id=$re->id");
        }else{
            $model = new UserWords();
            $model->wordsId = $wordsId;
            $model->uid = $uid;
            $model->lastStatus = $status;
            $model->firstStatus = $status;
            $model->createTime = $time;
            $model->updateTime = $time;
            $model->createDay = $day;
            $model->updateDay = $day;
            if($status == 1){
                $model->isKnow = 1;
            }else{
                $model->isKnow = 0;
            }
            $re = $model->save();

        }
        Yii::$app->session->set('isMemory',1);
        if($re){
            $re = [
                'code' => 1,
                'message' => '保存成功'
            ];
        }else{
            $re = [
                'code' => 0,
                'message' => '保存失败'
            ];
        }
        die(json_encode($re));
    }

    /**
     * 验证
     * @param $uid
     * @Obelisk
     */
    public function verifyMemory($uid){
        $str = date("Y-m-d");
        $num = UserWords::find()->asArray("createDay='$str' AND uid=$uid")->count();
        if($num == 5 || $num%25==0){
            return true;
        }else{
            return false;
        }
    }

    /**
     * 更新复习单词
     * @Obelisk
     */
    public function first($uid){
        if(!$uid){
            die(json_encode(['code' => 99,'message' => '未登录']));
        }
        $re = User::find()->asArray()->where("uid=$uid")->one();
        UserWords::updateAll(['type' => 0],"uid=$uid");
        $day = date("Y-m-d");
        $time = strtotime($day);
        if( $re['studyModel'] == 1){
            $oneDay = date("Y-m-d",$time-86400);
            $fourDay = date("Y-m-d",$time-86400*4);
            $sevenDay = date("Y-m-d",$time-86400*7);
            $fourteenDay = date("Y-m-d",$time-86400*14);
            $sql = "UPDATE {{%user_words}} b LEFT JOIN {{%words}} a ON a.id = b.wordsId SET b.type=1 WHERE (b.createDay='$oneDay' OR b.createDay='$fourDay' OR b.createDay='$sevenDay' OR b.createDay='$fourteenDay') AND a.categoryId={$re['nowPackage']} AND b.uid=$uid";
            Yii::$app->db->createCommand($sql)->execute();
        }
        if( $re['studyModel'] == 2){
            $oneDay = date("Y-m-d",$time-86400);
            $sql = "UPDATE {{%user_words}} b  LEFT JOIN {{%words}} a ON a.id = b.wordsId SET b.type=1 WHERE b.createDay='$oneDay' AND a.categoryId={$re['nowPackage']} AND b.uid=$uid";
            Yii::$app->db->createCommand($sql)->execute();
        }
    }

    /**
     * 打卡
     * @Obelisk
     */
    public function actionSign(){
        $uid = Yii::$app->session->get('uid');
        $day = date("Y-m-d");
        if(!$uid){
            die(json_encode(['code' => 99,'message' => '未登录']));
        }
        $sign = User::findOne($uid);
        $lastDay = date("Y-m-d",strtotime("-1 day"));
        if($lastDay == $sign->lastSign){
                User::updateAll(['continuousNum' => "`continuousNum`+1"],"uid=$uid");
        }else{
            User::updateAll(['continuousNum' => 0],"uid=$uid");
        }
        User::updateAll(['lastSign' => $day],"uid=$uid");
        $model = new UserSign();
        $model->uid = $uid;
        $model->createDay = $day;
        $re = $model->save();
        if($re){
            $sign = User::findOne($uid);
            $num = $sign->continuousNum;
            $num = 10+5*$num;
            uc_user_edit_integral1($uid,'单词签到',1,$num);
            $re = [
                'code' => 1,
                'message' => '打卡成功'
            ];
        }else{
            $re = [
                'code' => 0,
                'message' => '打卡失败'
            ];
        }
        die(json_encode($re));
    }

    /**
     * 用户签到
     * @Obelisk
     */
    public function actionUserSign(){
        $uid = Yii::$app->session->get('uid');
        if(!$uid){
            die(json_encode(['code' => 99,'message' => '未登录']));
        }
        $day = date("Y-m");
        $data = UserSign::find()->asArray()->where("DATE_FORMAT(createDay,'%Y-%m') = '$day' AND uid=$uid")->all();
        $num = UserSign::find()->where("uid=$uid")->count();
        $integral = uc_user_integral1($uid);
        die(json_encode(['code' => 1,'data' => $data,'integral' => $integral['integral'],'num' => $num]));

    }



}