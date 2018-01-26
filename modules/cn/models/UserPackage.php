<?php 
namespace app\modules\cn\models;
use yii\db\ActiveRecord;
class UserPackage extends ActiveRecord {
    public $cateData;

    public static function tableName(){
            return '{{%user_package}}';
    }
}
