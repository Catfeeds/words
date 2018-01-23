<?php



$params = require(__DIR__ . '/params.php');

Yii::$classMap['Method'] = '@app/libs/Method.php';

Yii::$classMap['UploadFile'] = '@app/libs/upload/UploadFile.php';

Yii::$classMap['AlipaySubmit'] = '@app/libs/yii2_alipay/AlipaySubmit.php';



$config = [

    'id' => 'basic',

    'basePath' => dirname(__DIR__),

    'bootstrap' => ['log'],

    'modules' => [

        'content' => [

                    'class'=>'app\modules\content\ContentModule'

                ],

        'basic' => [

            'class'=>'app\modules\basic\BasicModule'

        ],



        'user' => [

            'class'=>'app\modules\user\UserModule'

        ],



        'cn' => [

            'class'=>'app\modules\cn\CnModule'

        ],



        'toefl' => [

            'class'=>'app\modules\toefl\ToeflModule'

        ],

        'order' => [

            'class'=>'app\modules\order\OrderModule'

        ],

        'pay' => [

            'class'=>'app\modules\pay\PayModule'

        ],
        'page' => [

            'class'=>'app\modules\page\PageModule'

        ],

    ],

    'components' => [

        'request' => [

            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation

            'cookieValidationKey' => '3ggkbEhqR-n2ASj19BJSpbdvpmbO4NwK',

        ],

//        'cache' => [
//
//            'class' => 'yii\caching\MemCache',
//
//            'servers'=> [['host'=>'127.0.0.1','port'=>'11211']]
//
//        ],

//        'errorHandler' => [
//
//            'errorAction' => 'site/error',
//
//        ],

        'mailer' => [

            'class' => 'yii\swiftmailer\Mailer',

            'useFileTransport' =>false,//这句一定有，false发送邮件，true只是生成邮件在runtime文件夹下，不发邮件

            'transport' => [

                'class' => 'Swift_SmtpTransport',

                'host' => 'smtp.qq.com',  //每种邮箱的host配置不一样

                'username' => '2565225484@qq.com',

                'password' => 'pfglhtsistrneaif',

                'port' => '25',

                'encryption' => 'tls',



            ],

            'messageConfig'=>[

                'charset'=>'UTF-8',

                'from'=>['2565225484@qq.com'=>'小申托福在线']

            ],

        ],

        'urlManager' => [

             'enablePrettyUrl' => true,

             'showScriptName' => false,

             //'suffix' => '.html',

             'rules' => [

                 'study-abroad.html'=>'cn/serve/apply',
                 'study-abroad/category-<category>/aim-<aim>/country-<country>/page-<page:\d+>.html'=>'cn/serve/apply',
                 'study-abroad/category-<category>/aim-<aim>/country-<country>/page-<page:\d+>/buyNum-<buyNum:\d+>.html'=>'cn/serve/apply',
                 'study-abroad/category-<category>/aim-<aim>/country-<country>/page-<page:\d+>/price-<price:\d+>.html'=>'cn/serve/apply',
                 'study-abroad/category-<category>/aim-<aim>/country-<country>/page-<page:\d+>/time-<time:\d+>.html'=>'cn/serve/apply',
//                 Yanni 2016-10-12
                 '/cn/smartapply/mydocument/<page:\d+>.html'=>'/cn/smartapply/mydocument',
                 '/cn/admission-requirement/body/<catid:\d+>.html'=>'/cn/admission-requirement/body',
                 '/cn/admission-requirement/body/page-<page:\d+>/<catid:\d+>.html'=>'/cn/admission-requirement/body',
                 '/cn/admission-requirement/detail/<catid:\d+>-<id:\d+>.html'=>'/cn/admission-requirement/detail',
                 '/cn/admission-requirement/detail/<id:\d+>.html'=>'/cn/admission-requirement/detail',

                 '/cn/consultant/details/<contentid:\d+>.html'=>'/cn/consultant/details',
                 '/cn/consultant/<page:\d+>.html'=>'/cn/consultant',
                 '/cn/consultant/<country:\d+>/<page:\d+>.html'=>'/cn/consultant',
                 '/cn/consultant/country-<country:\d+>/-<regionid:\d+>-<page:\d+>.html'=>'/cn/consultant',
                 '/cn/consultant/country-<country:\d+>/-<regionid:\d+>-<page:\d+>-<num:\d+>.html'=>'/cn/consultant',

                 '/cn/project.html'=>'/cn/internship/index',

                 '/cn/project/<catId:\d+>-<id:\d+>.html'=>'/cn/internship/details',

                 '/cn/project/<id:\d+>.html'=>'/cn/internship/details',

                 '/cn/study-mall.html'=>'/cn/smart/study-mall',    //留学商城页

                 '/cn/know.html'=>'/cn/know/index',    //留学知识库

                 '/cn/know/detail/<catId:\d+>-<contentId:\d+>.html'=>'/cn/know/detail',    //留学知识库详情

                 '/cn/medi.html'=>'/cn/zero-medi',

                 '/cn/case.html'=>'/cn/mall-two',
                 '/cn/select.html'=>'/cn/mall-two/new-index',
                 '/cn/case/<countryid:\d+>-<contentid:\d+>.html'=>'/cn/mall-two/three',
                 '/cn/case/list.html'=>'/cn/mall-two/list',
                 '/cn/case/l-<page:\d+>.html'=>'/cn/mall-two/list',
                 '/cn/case/list-<countryid:\d+>.html'=>'/cn/mall-two/detail',
                 '/cn/case/list-<countryid:\d+>-<page:\d+>.html'=>'/cn/mall-two/detail',

                 '/cn/ranking/<type:\d+>-<year:\d+>.html' => '/cn/ranking/index',
                 '/cn/ranking/<type:\d+>-<year:\d+>-<page:\d+>.html'=>'/cn/ranking/index',

                 '/cn/question/<id:\d+>.html' => '/cn/question/detail',
                 '/cn/question/<page:\d+>-<cat:\d+>.html' => '/cn/question/index',
                 '/cn/question/Detail?id=<id:\d+>.html' => '/cn/question/detail',

                 '/question-tag/<tag:\d+>.html'=>'cn/question/question-page',                //问答路径 2017-08-01
                 '/question-detail/<id:\d+>.html' => '/cn/question/question-detail',
                 '/add-question.html' => '/cn/question/add-question',

                 '/major.html' => '/cn/major/index',
                 '/major-detail/<id:\d+>.html' => '/cn/major/detail',

                 '/free.html' => '/cn/evaluation/index',          //测评首页
                 '/percentages-test.html' => '/cn/evaluation/admit',
                 '/admit-result.html'=>'/cn/evaluation/admit-result',
                 '/background-test.html'=>'/cn/evaluation/background',
                 '/background-result.html'=>'/cn/evaluation/background-result',
                 '/school-choice.html'=>'/cn/school-choice/index',
                 '/probability/<testId:\d+>.html'=>'/cn/evaluation/view-results',
                 '/school-test/<testId:\d+>.html'=>'/cn/school-choice/user-result',

                 'writ.html'=>'cn/serve/writ',
                 'writ/aim-<aim>/country-<country>/page-<page:\d+>.html'=>'cn/serve/writ',
                 'writ/aim-<aim>/country-<country>/page-<page:\d+>/buyNum-<buyNum:\d+>.html'=>'cn/serve/writ',
                 'writ/aim-<aim>/country-<country>/page-<page:\d+>/price-<price:\d+>.html'=>'cn/serve/writ',
                 'writ/aim-<aim>/country-<country>/page-<page:\d+>/time-<time:\d+>.html'=>'cn/serve/writ',

                 'search.html'=>'cn/serve/writ',
                 'search/content-<content>/page-<page:\d+>.html'=>'cn/search/index',
                 'search/content-<content>/page-<page:\d+>/buyNum-<buyNum:\d+>.html'=>'cn/search/index',
                 'search/content-<content>/page-<page:\d+>/price-<price:\d+>.html'=>'cn/search/index',
                 'search/content-<content>/page-<page:\d+>/time-<time:\d+>.html'=>'cn/search/index',


                 'cn/login.html'=>'cn/login',

                 ''=>'cn/index',

                 'visa.html'=>'cn/serve/visa',
                 'visa/aim-<aim>/country-<country>/page-<page:\d+>.html'=>'cn/serve/visa',
                 'visa/aim-<aim>/country-<country>/page-<page:\d+>/buyNum-<buyNum:\d+>.html'=>'cn/serve/visa',
                 'visa/aim-<aim>/country-<country>/page-<page:\d+>/price-<price:\d+>.html'=>'cn/serve/visa',
                 'visa/aim-<aim>/country-<country>/page-<page:\d+>/time-<time:\d+>.html'=>'cn/serve/visa',

                 'practice.html'=>'cn/serve/practice',
                 'practice/aim-<aim>/country-<country>/page-<page:\d+>.html'=>'cn/serve/practice',
                 'practice/aim-<aim>/country-<country>/page-<page:\d+>/buyNum-<buyNum:\d+>.html'=>'cn/serve/practice',
                 'practice/aim-<aim>/country-<country>/page-<page:\d+>/price-<price:\d+>.html'=>'cn/serve/practice',
                 'practice/aim-<aim>/country-<country>/page-<page:\d+>/time-<time:\d+>.html'=>'cn/serve/practice',

                 'course.html'=>'cn/course/course',
                 'course/category-<category>/type-<type>/page-<page:\d+>.html'=>'cn/course/course',
                 'course/category-<category>/type-<type>/page-<page:\d+>/buyNum-<buyNum:\d+>.html'=>'cn/course/course',
                 'course/category-<category>/type-<type>/page-<page:\d+>/price-<price:\d+>.html'=>'cn/course/course',
                 'course/category-<category>/type-<type>/page-<page:\d+>/time-<time:\d+>.html'=>'cn/course/course',

                 'voucher.html'=>'cn/voucher/index',
                 'voucher/category-<category>/page-<page:\d+>.html'=>'cn/voucher/index',
                 'voucher/category-<category>/page-<page:\d+>/buyNum-<buyNum:\d+>.html'=>'cn/voucher/index',
                 'voucher/category-<category>/page-<page:\d+>/price-<price:\d+>.html'=>'cn/voucher/index',
                 'voucher/category-<category>/page-<page:\d+>/time-<time:\d+>.html'=>'cn/voucher/index',

                 'after-class.html'=>'cn/after-class/index',
                 'after-class/category-<category>/page-<page:\d+>.html'=>'cn/after-class/index',
                 'after-class/category-<category>/page-<page:\d+>/buyNum-<buyNum:\d+>.html'=>'cn/after-class/index',
                 'after-class/category-<category>/page-<page:\d+>/price-<price:\d+>.html'=>'cn/after-class/index',
                 'after-class/category-<category>/page-<page:\d+>/time-<time:\d+>.html'=>'cn/after-class/index',

                 'login.html' => 'cn/login/login',
                 'register.html' => 'cn/login/register',
                 'found-pass.html' => 'cn/login/found',
                 'phone.html' => 'cn/login/message',
                 'goods/<id:\d+>.html' => 'cn/details/details',
                 'payType/<orderId:\d+>.html' => 'pay/order/pay-type',

                 'integral/<type:\d+>/<page:\d+>.html' => 'cn/lei-dou/index',

                 'integral.html' => 'cn/lei-dou/index',

                 'evaluate/<orderId:\d+>.html' => 'pay/reviews/index',

                 'use.html' => 'cn/lei-dou/use',

                 'user.html' => 'cn/user/index',

                 'my-test.html' => 'cn/user/my-test',

                 'shopping-cart.html' => 'pay/shopping-cart/index',

                 'shopping-cart/success.html' => 'pay/shopping-cart/success',

                 'order.html' => 'pay/order/list',

                 'order/<status:\d+>/<page:\d+>.html' => 'pay/order/list',

                 'pay/success.html' => 'pay/order/success',

                 'clearing.html' => 'pay/order/index',

                 'quick-clearing/<id:\d+>/<num:\d+>.html' => 'pay/order/clear',

                 'integral/pay.html' => 'pay/order/integral',

                 'public-class.html' => 'cn/public-class/index',

                 'public-class/Training.html' => 'cn/public-class/list',

                 'public-class/<id:\d+>.html' => 'cn/public-class/details',
                 'public-class/back/<id:\d+>.html' => 'cn/public-class/back',

                 'public-class/<category>/<page:\d+>.html' => 'cn/public-class/list',
                 '/Americatop30.html' => 'cn/study/index',
                 '/Mechanism.html' => 'cn/index/mechanism',
                 '/Mechanism/enter.html' => 'cn/index/mechanism-enter',
                 '/Mechanism-detail.html' => 'cn/index/mechanism-detail',

             ],

         ],



        'log' => [

            'traceLevel' => YII_DEBUG ? 3 : 0,

            'targets' => [

                [

                    'class' => 'yii\log\FileTarget',

                    'levels' => ['error', 'warning'],

                ],

            ],

        ],

        'db' => require(__DIR__ . '/db.php'),

    ],

    'params' => $params,

];



if (YII_ENV_DEV) {

    // configuration adjustments for 'dev' environment

    $config['bootstrap'][] = 'debug';

    $config['modules']['debug'] = 'yii\debug\Module';



    $config['bootstrap'][] = 'gii';

    $config['modules']['gii'] = 'yii\gii\Module';

}



return $config;



