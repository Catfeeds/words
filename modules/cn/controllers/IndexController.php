<?php
/**
 * 首页
 * Created by PhpStorm.
 * User: obelisk
 */
namespace app\modules\cn\controllers;
use app\modules\cn\models\Nc;
use app\modules\cn\models\Voc;
use app\modules\cn\models\Words;
use app\modules\cn\models\WordsSentence;
use yii;
use app\libs\Snoopy;
use app\libs\ToeflController;

class IndexController extends ToeflController {
    public $enableCsrfValidation = false;
    public $layout = 'cn';
    /**
     * 留学首页
     * @Obelisk
     */
    public function actionIndex(){
//        $snoopy = new Snoopy;
//        $snoopy->proxy_host = "59.108.44.41";
//        $snoopy->proxy_port = "3128";
//        $snoopy->rawheaders['X_FORWARDED_FOR'] = '127.0.0.1';
//        $snoopy->fetchtext("http://api.shanbay.com/bdc/search/?word=hello");
//        var_dump($snoopy->results);die;
        set_time_limit(0);
        $words = Words::find()->asArray()->where("id>56134")->orderBy("id ASC")->all();
        foreach($words as $k => $v){
            $data = file_get_contents("https://api.shanbay.com/bdc/search/?word={$v['word']}");
            $data = json_decode($data,true);
            if($data['status_code'] == 0){
                $data = $data['data'];
                Words::updateAll(['translate' => $data['definition'],'us_audio' => $data['us_audio'],'uk_audio' => $data['uk_audio']],"id={$v['id']}");
                $sign = file_get_contents("https://api.shanbay.com/bdc/example/?vocabulary_id={$data['id']}&type=sys");
                $sign = json_decode($sign,true);
                $sign = $sign['data'];
                foreach($sign as $key=>$value){
                    $model = new WordsSentence();
                    $model->wordsId = $v['id'];
                    $model->english = $value['annotation'];
                    $model->chinese = $value['translation'];
                    $model->createTime = time();
                    $model->save();
                }
            }
//            $sign = Voc::find()->asArray()->where('vc_vocabulary="'.$v['word'].'"')->one();
//            if($sign){
//                $mnemonic = Nc::find()->asArray()->where("nt_voc_id='{$sign['vc_id']}'")->one();
//                $re = Words::updateAll(['mnemonic' => $mnemonic['pl_note'],'phonetic_uk' => $sign['vc_phonetic_uk'],'phonetic_us' => $sign['vc_phonetic_us']],"id={$v['id']}");
//            }
        }
    }


}