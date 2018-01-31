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

    public function lastWords($packageId,$uid){
        $sql = "select uw.wordsId from {{%user_words}} uw LEFT JOIN {{%words}} w ON uw.wordsId=w.id WHERE w.categoryId=$packageId AND uw.uid=$uid ORDER BY uw.createTime DESC LIMIT 1";
        $data = \Yii::$app->db->createCommand($sql)->queryOne();
        if($data){
            return $data['wordsId'];
        }else{
            return 0;
        }
    }


}
