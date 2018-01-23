<?php

namespace app\controllers;

use app\modules\cn\models\Words;
use app\modules\cn\models\WordsLowSentence;
use Yii;
use app\libs\ApiControl;
use app\libs\QueryList;


class TestController extends ApiControl
{
    public function actionIndex()
    {
        $id = WordsLowSentence::find()->asArray()->orderBy('id DESC')->one();
        $words = Words::find()->asArray()->where("id>{$id['wordsId']}")->all();
        foreach($words as $v){
            $url = 'http://dict.youdao.com/w/eng/'.$v['word'].'/#keyfrom=dict2.index';
            //采集某页面所有的图片
            $data = QueryList::Query($url,array(
                'link' => array('a','text'),
                'title' => array('','text'),
            ),'#webPhrase p'
            )->data;
            //打印结果
            foreach($data as $k => $val){
                $sign  = trim(str_replace($val['link'],"",$val['title']));
                $sign = explode(";",$sign);
                foreach($sign as $key => $value){
                    $sign[$key] = trim($value);
                }
                $sign = implode(";",$sign);
                $model = new WordsLowSentence();
                $model->wordsId = $v['id'];
                $model->english = $val['link'];
                $model->chinese = $sign;
                $model->createTime = time();
                $model->save();
            }
        }
    }

}
