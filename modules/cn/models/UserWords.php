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
}
