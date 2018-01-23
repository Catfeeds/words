<?php
namespace app\libs;
use app\modules\cn\models\SchoolTest;
use yii;
use yii\data\Pagination;
class Method
{
    /**
     * 分页函数
     * @param array $config 分页配置
     * @return array 分页
     * @Obelisk
     */
    public static function getPagedRows($config=[])
    {
        $pages=new Pagination(['totalCount' => $config['count']]);
        if(isset($config['pageSize']))
        {
            $pages->setPageSize($config['pageSize'],true);
        }
        return $pages;
    }
    /**
     * 生成时间 时、分、秒
     * by yanni
     */
    function gmstrftimeA($seconds)
    {
        if ($seconds > 3600*24*365) {
            $year = intval($seconds / (3600*24*365));
        }
        elseif ($seconds > 3600*24*30) {
            $month = intval($seconds / (3600*24*30));
        }
        elseif ($seconds > 3600*24) {
            $day = intval($seconds / (3600*24));
        }
        elseif ($seconds > 3600) {
            $hours = intval($seconds / 3600);
        }
        elseif ($seconds > 60) {
            $minutes = intval($seconds / 60);
        }
        $time = '刚刚';
        if (!empty($year)) {
            $time = $year . '年前';
        }
        if (!empty($month)) {
            $time = $month . '月前';
        }
        if (!empty($day)) {
            $time = $day . '天前';
        }
        if (!empty($hours)) {
            $time = $hours . '小时前';
        }
        if (!empty($minutes)) {
            $time = $minutes . '分钟前';
        }
        return trim($time);
    }
    /**
     * 生成32位字符串
     * @return string
     * @Obelisk
     */
    public static function guid()
    {
        mt_srand((double)microtime() * 10000);
        $charid = strtolower(md5(uniqid(rand(), true)));
        $uuid = substr($charid, 0, 8) . substr($charid, 8, 4) . substr($charid, 12, 4) . substr($charid, 16, 4) . substr($charid, 20, 12);
        return $uuid;
    }

    /**
     * 生成订单号
     * @return string
     * @Obelisk
     */
    public static function orderNumber()
    {
        $orderNumber = 'toefl'.time().rand(0,9);
        return $orderNumber;
    }

    /**
     * @param string $html html内容
     * @param string $tags 保留标签
     * @return string
     */
    public static function getextbyhtml($html = '', $tags = '')
    {
        if (!empty($html)) {
            $res = preg_replace('/&nbsp;/', ' ', trim(strip_tags(htmlspecialchars_decode($html), $tags)));
            $res = trim(preg_replace('/<(p|P)>\W+<\/(p|P)>/', '', $res));
        } else {
            $res = false;
        }
        return $res;
    }

    /**
     * 词典翻译
     * @Obelisk
     */
    public static function getTranslate($words){
        $url = "http://fanyi.youdao.com/openapi.do?keyfrom=5asdfasdf6&key=925644231&type=data&only=dict&doctype=json&version=1.1&q=".$words;
        $list = file_get_contents($url);
        $js_de = json_decode($list,true);
        if($js_de['errorCode'] != 0){
            $data = 0;
        }else{
            $js_de['basic']['us'] = $js_de['basic']['us-phonetic'];
            $js_de['basic']['uk'] = $js_de['basic']['uk-phonetic'];
            $data = $js_de['basic'];
        }
        return $data;
    }


    /**
     * 二维数组去重
     * by  yanni
     */
    public static function more_array_unique($arr=array()){
        foreach($arr[0] as $k => $v){
            $arr_inner_key[]= $k;   //先把二维数组中的内层数组的键值记录在在一维数组中
        }
        foreach ($arr as $k => $v){
            $v =join(",",$v);
            $temp[$k] =$v;      //保留原来的键值 $temp[]即为不保留原来键值
        }
        $temp =array_unique($temp);    //去重：去掉重复的字符串
        foreach ($temp as $k => $v){
            $a = explode(",",$v);   //拆分后的重组 如：Array( [0] => james [1] => 30 )
            $arr_after[$k]= array_combine($arr_inner_key,$a);  //将原来的键与值重新合并
        }
        return $arr_after;
    }

    /**
     * 生成字符串
     * @param $i
     * @return string
     * @Obelisk
     */
    public static function randStr($i){
        $str = "abcdefghijklmnopqrstuvwxyz";
        $finalStr = "";
        for($j=0;$j<$i;$j++)
        {
            $finalStr .= substr($str,rand(0,25),1);
        }
        return $finalStr;
    }

    /**
     * post请求
     * @param $url
     * @param string $post_data
     * @param int $timeout
     * @return mixed
     * @Obelisk
     */
    public static  function post($url, $post_data = '', $timeout = 5){//curl

        $ch = curl_init();

        curl_setopt ($ch, CURLOPT_URL, $url);

        curl_setopt ($ch, CURLOPT_POST, 1);

        if($post_data != ''){

            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));

        }

        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);

        curl_setopt($ch, CURLOPT_HEADER, false);

        $file_contents = curl_exec($ch);

        curl_close($ch);

        return $file_contents;

    }

    public static function score($res){
        $gpa = $res['gpa'];
        $gmat = $res['gmat'];
        $toefl = $res['toefl'];
        $school = $res['schoolGrade'];
        $work = $res['most'];
        if($gpa>10){
            $num1 = SchoolTest::find()->where("gpa<$gpa AND gpa>10")->count();
            $sign = round($gpa/100*4, 1);
            $num2 = SchoolTest::find()->where("gpa<$gpa")->count();
            $num = $num1+$num2;
            $gpa = $sign;
        }else{
            $num1 = SchoolTest::find()->where("gpa<$gpa")->count();
            $sign = ceil($gpa/4*100);
            $num2 = SchoolTest::find()->where("gpa<$gpa")->count();
            $num = $num1+$num2;
        }
        if($gpa>=3.5){
            $gpa = [
                'score' => $gpa,
                'num' => $num+2330,
                'type' => 1,
                'name' => 'GPA'
            ];
        }elseif($gpa>=3.0){
            $gpa = false;
        }else{
            $gpa = [
                'score' => $gpa,
                'num' => $num+117,
                'type' => 0,
                'name' => 'GPA'
            ];
        }

        if(!empty($gmat)){
            if($gmat<360){
                $num = SchoolTest::find()->where("gmat<$gmat")->count();
                if($gmat>=325){
                    $gmat = [
                        'score' => $gmat,
                        'num' => $num+2330,
                        'type' => 1,
                        'name' => 'GRE'
                    ];
                }elseif($gmat>=310){
                    $gmat = false;
                }else{
                    $gmat = [
                        'score' => $gmat,
                        'num' => $num+117,
                        'type' => 0,
                        'name' => 'GRE'
                    ];
                }
            }else{
                $num = SchoolTest::find()->where("gmat<$gmat AND gmat>360")->count();
                if($gmat>=720){
                    $gmat = [
                        'score' => $gmat,
                        'num' => $num+2330,
                        'type' => 1,
                        'name' => 'GMAT'
                    ];
                }elseif($gmat>=650){
                    $gmat = false;
                }else{
                    $gmat = [
                        'score' => $gmat,
                        'num' => $num+117,
                        'type' => 0,
                        'name' => 'GMAT'
                    ];
                }
            }
        }else{
            $gmat =false;
        }

        if($toefl<15){
            $num = SchoolTest::find()->where("toefl<$toefl")->count();
            if($toefl>=7){
                $toefl = [
                    'score' => $toefl,
                    'num' => $num+2330,
                    'type' => 1,
                    'name' => '雅思'
                ];
            }elseif($toefl>=6){
                $toefl = false;
            }else{
                $toefl = [
                    'score' => $toefl,
                    'num' => $num+117,
                    'type' => 0,
                    'name' => '雅思'
                ];
            }
        }else{
            $num = SchoolTest::find()->where("toefl<$toefl AND toefl>15")->count();
            if($toefl>=110){
                $toefl = [
                    'score' => $toefl,
                    'num' => $num+2330,
                    'type' => 1,
                    'name' => '托福'
                ];
            }elseif($toefl>=95){
                $toefl = false;
            }else{
                $toefl = [
                    'score' => $toefl,
                    'num' => $num+117,
                    'type' => 0,
                    'name' => '托福'
                ];
            }
        }

        $num = SchoolTest::find()->where("schoolGrade>$school")->count();
        if($school <=2){
            $school = [
                'name' => $res['attendSchool'],
                'num' => $num+2330,
                'type' => 1
            ];
        }elseif($school<=3){
            $school = false;
        }else{
            $school = [
                'name' => $res['attendSchool'],
                'num' => $num+117,
                'type' => 0
            ];
        }
        if($work == 6){
            $work = false;
        }else{
            $num = SchoolTest::find()->where("most>$work")->count();
            switch($work){
                case 1:$workName = '四大/500强';break;
                case 2:$workName = '四大/500强';break;
                case 3:$workName = '外企';break;
                case 4:$workName = '国企';break;
                case 5:$workName = '私企';break;
            }
            if($work <=2){
                $work = [
                    'name' => $workName,
                    'num' => $num+2330,
                    'type' => 1
                ];
            }elseif($work<=4){
                $work = false;
            }else{
                $work = [
                    'name' => $workName,
                    'num' => $num+117,
                    'type' => 0
                ];
            }
        }
      return ['gpa' => $gpa,'gmat' => $gmat,'toefl' => $toefl,'school' => $school,'work' => $work];
    }
}