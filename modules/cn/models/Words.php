<?php 
namespace app\modules\cn\models;
use yii\db\ActiveRecord;
use app\libs\Pager;
use app\modules\cn\models\Content;
class Words extends ActiveRecord {
    public $cateData;

    public static function tableName(){
            return '{{%words}}';
    }

    public function packageDetails($catId,$uid,$page,$pageSize){
        $limit = " limit ".($page-1)*$pageSize.",".$pageSize;
        $sql = "select w.*,uw.firstStatus from {{%words}} w LEFT JOIN  {{%user_words}} uw on w.id=uw.wordsId AND uw.uid=$uid WHERE w.categoryId=$catId $limit";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        return $data;
    }
}
