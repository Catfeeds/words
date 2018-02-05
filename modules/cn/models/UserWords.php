<?php 
namespace app\modules\cn\models;
use yii\db\ActiveRecord;
use app\libs\Pager;
use app\modules\cn\models\Content;
class UserWords extends ActiveRecord {
    public $cateData;

    public static function tableName(){
            return '{{%user_words}}';
    }

    /**
     * 用户词包数量
     * @param $catId
     * @param $uid
     * @return int
     * @Obelisk
     */

    public function getUserPackageNum($catId,$uid){
        $sql = "select uw.id from {{%user_words}} uw LEFT JOIN {{%words}} w ON uw.wordsId=w.id WHERE w.categoryId=$catId AND uw.uid=$uid";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        if($data){
            $num = count($data);
        }else{
            $num = 0;
        }
        return $num;
    }

    /**
     * 用户当前词包最后的单词
     * @param $packageId
     * @param $uid
     * @return int
     * @Obelisk
     */
    public function lastWords($packageId,$uid){
        $sql = "select uw.wordsId from {{%user_words}} uw LEFT JOIN {{%words}} w ON uw.wordsId=w.id WHERE w.categoryId=$packageId AND uw.uid=$uid ORDER BY uw.createTime DESC LIMIT 1";
        $data = \Yii::$app->db->createCommand($sql)->queryOne();
        if($data){
            return $data['wordsId'];
        }else{
            return 0;
        }
    }

    /**
     * 用户坚持的天数
     * @Obelisk
     */
    public function insistDay($uid){
        $sql = "select uw.id  from {{%user_words}} uw WHERE uid=$uid GROUP BY uw.createDay";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        $num = count($data);
        return $num;
    }

    /**
     * 用户剩余天数
     * @param $uid
     * @param $packageDay
     * @Obelisk
     */
    public function surplusDay($packageId,$userWords,$planWords){
        $allWords = Words::find()->where("categoryId=$packageId")->count();
        $surplusWords = $allWords-$userWords;
        $num = ceil($surplusWords/$planWords);
        return $num;
    }

    /**
     * 获取用户需要复习的单词数量
     * @param $uid
     * @param $day
     * @Obelisk
     */
    public function getUserNeedReviewWords($uid,$studyModel,$day){
        if($studyModel == 3){
            return 0;
        }else{

        }
    }






}
