<?php $userId = Yii::$app->session->get('userId'); ?>
<?php $userData = Yii::$app->session->get('userData')?>
<?php $level = Yii::$app->session->get('level')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--阻止浏览器缓存-->
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache, must-revalidate">
    <meta http-equiv="expires" content="0">
    <!-- Basic Page Needs
     ================================================== -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="keywords" content="英国留学,澳洲留学,美国留学,出国留学,留学文书,留学服务,雷哥网">
    <meta name="description" content="雷哥网留学采取互联网一站式智能留学服务模式，用户可自主在网站上通过留学评估、院校库、申请问答、智能选校等功能获取详细留学申请方案。用户在了解自身背景条件及申请院校录取条件后，
        可在商城自主选择美国留学，澳洲留学，英国留学等全球不同国家留学申请服务、语言培训、文书写作、网申、签证等碎片化留学申请服务。">
    <meta name="title" content="">
    <meta name="author" content="">
    <meta name="Copyright" content="">
    <meta name="description" content="">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- 让IE浏览器用最高级内核渲染页面 还有用 Chrome 框架的页面用webkit 内核
    ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="chrome=1,IE=edge">
    <!-- IOS6全屏 Chrome高版本全屏
    ================================================== -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <!-- 让360双核浏览器用webkit内核渲染页面
    ================================================== -->
    <meta name="renderer" content="webkit">
    <link rel="stylesheet" href="/cn/css/fonts/font-awesome/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="/cn/css/animate.min.css"/>
    <link rel="stylesheet" href="/cn/css/new-headFoot.css"/>
    <link rel="stylesheet" href="/cn/css/smart.css">
    <link rel="stylesheet" href="/cn/css/reset.css"/>
    <link rel="stylesheet" href="/cn/css/studyingPublic.css"/>
    <script type="text/javascript" src="/cn/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="/cn/js/jquery.SuperSlide.2.1.1.js"></script>
    <script type="text/javascript" src="/cn/js/public.js"></script>
    <title>留学商城-美国留学|英国留学|澳洲留学|留学文书-雷哥网留学申请智能服务平台</title>

</head>
<body>
<div class="greyNav">
    <div class="inGrey">
        <div class="leftNav">
            <ul>
                <li>
                    <a href="http://www.viplgw.cn" target="_blank"><img src="/cn/images/index_kevinIcon.png" alt="图标"/></a>
                </li>
                <li><a class="on" href="http://www.smartapply.cn/" target="_blank">留学</a></li>
                <li><a href="http://www.gmatonline.cn/" target="_blank">GMAT</a></li>
                <li><a href="http://sat.viplgw.cn/" target="_blank">SAT</a></li>
                <li><a href="http://www.toeflonline.cn/" target="_blank">托福</a></li>
                <li><a href="http://ielts.viplgw.cn/" target="_blank">雅思</a></li>
                <li class="xian">|</li>
                <li><a href="http://open.viplgw.cn" target="_blank">公开课</a></li>
                <li><a href="http://class.viplgw.cn/" target="_blank">网校</a></li>
                <li><a href="http://class.viplgw.cn/studyGroup.html" target="_blank">小组</a></li>
                <li><a href="http://class.viplgw.cn/vip.html" target="_blank">会员</a></li>
                <li class="phone"><span>400-1816-180</span></li>
                <li><a href="tencent://message/?uin=1746295647&amp;Site=www.cnclcy&amp;Menu=yes">在线咨询</a></li>
            </ul>
        </div>
        <div class="fl nav-de">互联网一站式留学申请平台</div>
        <div class="rightLogin">
            <?php
            if(!$userId) {
                ?>
                <!--未登录展示-->
                <div class="rightLogin">
                    <div class="loginBefore">
                        <a href="http://login.gmatonline.cn/cn/index?source=3&url=<?php echo Yii::$app->request->hostInfo.Yii::$app->request->getUrl()?>"><input type="button" value="登陆" onclick="userLogin()"></a>
                        <a href="http://login.gmatonline.cn/cn/index?source=3&url=<?php echo Yii::$app->request->hostInfo.Yii::$app->request->getUrl()?>"><input type="button" value="注册" onclick="userRegister()"></a>
                    </div>
                </div>
                <?php
            }else {
                ?>
                <!--登陆之后展示-->
                <div class="loginAfter">
                    <div class="whiteDiv"><img src="<?php echo $userData['image']?$userData['image']:'/cn/images/details_defaultImg.png'?>" alt="用户头像"></div>
                    <div class="leftFont">
                        <span><?php echo $userData['nickname']?$userData['nickname']:$userData['nickname']?>（<?php echo $level?>）</span>
                        <i class="fa fa-angle-down"></i>
                    </div>
                    <div class="clearB"></div>
                    <!--下拉-->
                    <div class="xiala-con">
                        <ul>
                            <li><a href="/order.html">我的订单</a></li>
                            <li><a href="/integral.html">我的雷豆</a></li>
                            <li><a href="/user.html">个人资料</a></li>
                            <li><a onclick="loginOut()" href="javascript:;">退出</a></li>
                        </ul>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <!--        app下载-->
        <div class="appDownload">
            <span title="app下载" class="tit_t">APP <b></b></span>
            <div class="pull_down">
                <ul>
                    <li>
                        <div class="first_layer">
                            <img src="/cn/images/gmatapp_logo.jpg" alt="app logo图标"/>
                            <span>雷哥GMAT苹果版</span>
                        </div>
                        <div class="code_box">
                            <img src="/cn/images/leigeQrCode.png" alt="app二维码图片"/>
                        </div>
                    </li>
                    <li>
                        <div class="first_layer">
                            <img src="/cn/images/gmatapp_logo.jpg" alt="app logo图标"/>
                            <span>雷哥GMAT安卓版</span>
                        </div>
                        <div class="code_box">
                            <img src="/cn/images/leige-android.png" alt="app二维码图片"/>
                        </div>
                    </li>
                    <li>
                        <div class="first_layer">
                            <img src="/cn/images/toeflapp_logo.jpg" alt="app logo图标"/>
                            <span>雷哥托福苹果版</span>
                        </div>
                        <div class="code_box">
                            <img src="/cn/images/toeflQrCode.jpg" alt="app二维码图片"/>
                        </div>
                    </li>
                    <li>
                        <a href="http://apk.hiapk.com/appinfo/io.dcloud.H58E83894">
                            <div class="first_layer">
                                <img src="/cn/images/toeflapp_logo.jpg" alt="app logo图标"/>
                                <span>雷哥托福安卓版</span>
                            </div>
                        </a>
                        <div class="code_box">
                            <img src="/cn/images/appewm.png" alt="app二维码图片"/>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!--        app下载 end-->
        <div class="clearBr"></div>
    </div>
</div>
<!-------------------咨询框------------------------>
<div class="refer_small" style="display: block" onclick="showZiXun()">
    <img src="/cn/images/zixun/new-zxBG02.gif" alt="中间图片"/>
</div>
<div class="referBox" style="display: none;">
    <div class="refer_close" onclick="closeRefer()"></div>
    <div class="refer_top"></div>
    <div class="refer_con">
        <ul>
            <li>
                <a href="http://p.qiao.baidu.com/im/index?siteid=7905926&ucid=18329536&cp=&cr=&cw=" target="_blank">
                    <div class="comSize diffBG01"></div>
                    <p>在线<br>咨询</p>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <div class="comSize diffBG02"></div>
                    <p>微信</p>
                    <div class="clearfix"></div>
                    <div class="tanc_mask01 animated"><img src="/cn/images/smartapply_ewm.png" alt="二维码图片"></div>
                </a>
            </li>
            <li>
                <a href="tencent://message/?uin=2949709934&amp;Site=www.cnclcy&amp;Menu=yes" target="_blank">
                    <div class="comSize diffBG03"></div>
                    <p>QQ</p>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <div class="comSize diffBG04"></div>
                    <p>电话</p>
                    <div class="clearfix"></div>
                    <div class="tanc_mask02 animated">400-1816-180</div>
                </a>
            </li>
            <!--            <li>-->
            <!--                <a href="tencent://message/?uin=1746295647&amp;Site=www.cnclcy&amp;Menu=yes" target="_blank">-->
            <!--                    <div class="comSize diffBG05"></div>-->
            <!--                    <p>吐槽</p>-->
            <!--                    <div class="clearfix"></div>-->
            <!--                </a>-->
            <!--            </li>-->
            <li>
                <a href="javascript:void(0);" onclick="referTop();">
                    <div class="diffBG06 animated">
                        <img src="/cn/images/zixun/new-zxicon06.png" alt="回到顶部图标"/>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>
<!--logo、搜索框-->
<div class="out-bg">
    <div class="logo-search">
        <div class=l-logo>
            <a href="/"><img src="/cn/images/index3-img/index3-logo.png" alt="logo"/></a>
        </div>
        <div class=c-search>
            <input type="text" placeholder="搜索服务"/>
            <input type="button" value="搜索"/>
        </div>
        <div class="r-zixun">
            <div class="weChat">
                <img src="/cn/images/index3-img/index3-wechat01.png" alt="二维码" height="66"/>
                <p>官方微信服务平台</p>
            </div>
            <div class="p-zixun">
                <p>
                    <img src="/cn/images/index3-img/index3-phone.png" alt="icon"/>
                    <span>400-1816-180</span>
                </p>
                <a href="tencent://message/?uin=1746295647&amp;Site=www.cnclcy&amp;Menu=yes" target="_blank">
                    <img src="/cn/images/index3-img/index3-zixun.png" alt="图标"/></a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<!--头部导航-->
<nav class="shopSpecial">
    <ul>
        <?php
        $rankOne = \app\modules\cn\models\Navigate::find()->where("pid=1")->orderBy("sort asc")->all();
        foreach($rankOne as $k=>$v) {
            if($k==0) {
                ?>
                <li class="on">
                    <a href="<?php echo isset($v['url']) ? $v['url'] : 'javascript:void(0);' ?>"><?php echo $v['name'] ?> <?php if ($k == 0) { ?>
                            <i class="fa fa-caret-down"></i> <?php } ?></a>
                    <?php
                    $rankTwo = \app\modules\cn\models\Navigate::find()->where("pid=" . $v['id'])->orderBy("sort asc")->all();
                    if (count($rankTwo) > 0) {
                        ?>
                        <div class="secondNav first">
                            <ul>
                                <?php
                                foreach ($rankTwo as $va) {
                                    ?>
                                    <li>
                                        <a href="<?php echo isset($va['url']) ? $va['url'] : 'javascript:void(0);' ?>"><?php echo $va['name'] ?>
                                            <span><?php if ($k == 0) { ?>&gt; <?php } ?></span></a>
                                        <?php
                                        $rankThree = \app\modules\cn\models\Navigate::find()->where("pid=" . $va['id'])->orderBy("sort asc")->all();
                                        if (count($rankThree) > 0) {
                                            ?>
                                            <div class="thirdNav">
                                                <ul>
                                                    <?php
                                                    foreach ($rankThree as $val) {
                                                        ?>
                                                        <li>
                                                            <a href="<?php echo $val['url'] ?>"><?php echo $val['name'] ?></a>
                                                        </li>
                                                        <?php
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <?php
                    }
                    ?>
                </li>
                <?php
            } else {
                ?>
                <li class="<?php if((Yii::$app->request->getHostInfo().Yii::$app->request->url) == $v['url']){ echo 'active'; }  ?>">
                    <a href="<?php echo isset($v['url'])?$v['url']:'javascript:void(0);' ?>"><?php echo $v['name'] ?> <?php if($k==0){ ?> <i class="fa fa-caret-down"></i> <?php } ?></a>
                    <?php
                    $rankTwo = \app\modules\cn\models\Navigate::find()->where("pid=".$v['id'])->orderBy("sort asc")->all();
                    if(count($rankTwo)>0) {
                        ?>
                        <div class="secondNav">
                            <ul>
                                <?php
                                foreach($rankTwo as $va) {
                                    ?>
                                    <li <?php if((Yii::$app->request->getHostInfo().Yii::$app->request->url) == $v['url']){ echo 'active'; }  ?>>
                                        <a href="<?php echo isset($va['url'])?$va['url']:'javascript:void(0);' ?>"><?php echo $va['name'] ?><span><?php if($k==0){ ?>&gt; <?php } ?></span></a>
                                        <?php
                                        $rankThree = \app\modules\cn\models\Navigate::find()->where("pid=".$va['id'])->orderBy("sort asc")->all();
                                        if(count($rankThree)>0) {
                                            ?>
                                            <div class="thirdNav">
                                                <ul>
                                                    <?php
                                                    foreach ($rankThree as $val) {
                                                        ?>
                                                        <li <?php if((Yii::$app->request->getHostInfo().Yii::$app->request->url) == $v['url']){ echo 'active'; }  ?>>
                                                            <a href="<?php echo $val['url'] ?>"><?php echo $val['name'] ?></a>
                                                        </li>
                                                        <?php
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <?php
                    }
                    ?>
                </li>
                <?php
            }
        }
        ?>
        <li class="rightSidebar">
            <a href="/goods/3099.html"><img src="/cn/images/nav-img.png" alt="活动图片" width="120"/></a>
        </li>
    </ul>
</nav>
<section class="bg-f">
    <div class="w12 clearfix">
        <!--<div class="fl nav2Left-wrap">-->
        <!--<ul>-->
        <!--<li>精品留学服务</li>-->
        <!--<li>一站式留学服务</li>-->
        <!--<li>高端文书写作服务</li>-->
        <!--<li>精品留学服务</li>-->
        <!--<li>精品留学服务</li>-->
        <!--<li>精品留学服务</li>-->
        <!--<li>精品留学服务</li>-->
        <!--<li>精品留学服务</li>-->
        <!--</ul>-->

        <!--</div>-->
        <div class="nav2Right-wrap fr">
            <!--<ul class="nav2r-name clearfix">-->
            <!--<li class="on"><a href="#">首页</a></li>-->
            <!--<li><a href="#">留学商城</a></li>-->
            <!--<li><a href="#">查院校</a></li>-->
            <!--<li><a href="#">搜排名</a></li>-->
            <!--<li><a href="#">寻攻略</a></li>-->
            <!--<li><a href="#">看案例</a></li>-->
            <!--<li><a href="#">找行家</a></li>-->
            <!--</ul>-->
            <div class="bannerWrap clearfix">
                <div class="slideBox fl">
                    <ul class="hd clearfix"></ul>
                    <ul class="banner">
                        <?php
                        $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0', 'fields' => 'answer', 'category' => '226,334']);
                        foreach ($data as $v) {
                            ?>
                            <li><a href="<?php echo $v['answer'] ?>"><img src="<?php echo $v['image'] ?>" alt=""></a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
                <ul class="nr-icon-wrap fr">
                    <li>
                        <a href="/cn/smartapply/index">
                            <div class="inb icon-info">
                                <img src="/cn/images/index3-img/nr-icon-1.png" alt="">
                                <p class="icon-name">名校申请</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="http://open.viplgw.cn">
                            <div class="inb icon-info">
                                <img src="/cn/images/index3-img/nr-icon-2.png" alt="">
                                <p class="icon-name">留学课堂</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/cn/question">
                            <div class="inb icon-info">
                                <img src="/cn/images/index3-img/nr-icon-3.png" alt="">
                                <p class="icon-name">问答社区</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/cn/smartapply/mydocument">
                            <div class="inb icon-info">
                                <img src="/cn/images/index3-img/nr-icon-4.png" alt="">
                                <p class="icon-name">文书神器</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/cn/admission-requirement">
                            <div class="inb icon-info">
                                <img src="/cn/images/index3-img/nr-icon-5.png" alt="">
                                <p class="icon-name">最新资讯</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.gmatonline.cn/index.html">
                            <div class="inb icon-info">
                                <img src="/cn/images/index3-img/nr-icon-6.png" alt="">
                                <p class="icon-name">GMAT</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.toeflonline.cn">
                            <div class="inb icon-info">
                                <img src="/cn/images/index3-img/nr-icon-7.png" alt="">
                                <p class="icon-name">托福</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="http://ielts.viplgw.cn">
                            <div class="inb icon-info">
                                <img src="/cn/images/index3-img/nr-icon-8.png" alt="">
                                <p class="icon-name">雅思</p>
                            </div>
                        </a>
                    </li>

                </ul>
            </div>
            <ul class="navAd">
                <li>
                    <a href="/cn/activity/one-yuan" target="_blank">
                        <img src="/cn/images/index3-img/nav-ad-1.jpg" alt="">
                    </a>
                </li>
                <li>
                    <a href="/cn/consultant">
                        <img src="/cn/images/index3-img/nav-ad-2.jpg" alt="">
                    </a>
                </li>
                <li>
                    <a href="/goods/2789.html">
                        <img src="/cn/images/index3-img/nav-ad-3.jpg" alt="">
                    </a>
                </li>
                <li>
                    <a href="/cn/project.html">
                        <img src="/cn/images/index3-img/nav-ad-4.jpg" alt="">
                    </a>
                </li>
            </ul>

        </div>
    </div>
    <div class="w12" style="padding-top: 10px;">
        <ul class="info-list clearfix tm">
            <li>
                <div class="infoText-wrap">
                    <img src="/cn/images/index3-img/info-1.png" alt="">
                    <div class="info-text">
                        <p class="info-name">申请程序标准</p>
                        <p class="info-de">均为海外热门名校</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="infoText-wrap">
                    <img src="/cn/images/index3-img/info-2.png" alt="">
                    <div class="info-text">
                        <p class="info-name">服务流程透明</p>
                        <p class="info-de">进度网上随时可查</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="infoText-wrap">
                    <img src="/cn/images/index3-img/info-3.png" alt="">
                    <div class="info-text">
                        <p class="info-name">一次性收费</p>
                        <p class="info-de">不加收排名等其他费用</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="infoText-wrap">
                    <img src="/cn/images/index3-img/info-4.png" alt="">
                    <div class="info-text">
                        <p class="info-name">申请流程高效</p>
                        <p class="info-de">1~3月即可获得offer</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="infoText-wrap">
                    <img src="/cn/images/index3-img/info-5.png" alt="">
                    <div class="info-text">
                        <p class="info-name">学校录取率高</p>
                        <p class="info-de">99%以上成功率</p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</section>
<section class="bg-g serviceWrap">
    <div class="w12 bg-f">
        <ul class="tm service-list">
            <li>
                <a href="http://test.smartapply.cn/cn/medi.html ">
                    <div>
                        <img src="/cn/images/index3-img/service-1.png" alt="">
                        <p class="service-name">英澳零中介申请服务<span class="service-line" style="background: #25ae5e;"></span>
                        </p>
                        <p class="service-de"> 你留学，我买单 最高可帮你节约<br>10000RMB！</p>
                    </div>
                </a>
            </li>
            <li>
                <a href="http://www.smartapply.cn/cn/smartapply/mydocument">
                    <div>
                        <img src="/cn/images/index3-img/service-2.png" alt="">
                        <p class="service-name">文书服务<span class="service-line" style="background: #e97c28;"></span></p>
                        <p class="service-de"> 美国top30，英国G5 PS+RL+CV+Essays<br>全套文书服务 博士导师为你精写 </p>
                    </div>
                </a>
            </li>
            <li>
                <a href="http://www.smartapply.cn/goods/2310.html">
                    <div>
                        <img src="/cn/images/index3-img/service-3.png" alt="">
                        <p class="service-name">半DIY服务<span class="service-line" style="background: #2a80bb;"></span>
                        </p>
                        <p class="service-de">申请流程全透明，学生全程参与，<br>让你告别繁琐！</p>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</section>
<section class="bg-f">
    <div class="w12">
        <div class="commodityWrap">
            <div class="commodity-item">
                <!--标题-->
                <div class="commodityTitle-wrap clearfix">
                    <div class="fl">
                        <img class="commodity-icon" src="/cn/images/index3-img/icon-hand.png" alt="">
                        <span class="commodity-name">留学精品服务/</span>
                        <span class="commodity-de">98%的学员通过我们专业申请服务在1-3月内拿到3+封女神院offer</span>
                    </div>
                    <div class="fr moreWrap">
                        <a class="more" href="/study-abroad/category-152/aim-0/country-0/page-1.html">更多></a>
                    </div>
                </div>
                <!--内容-->
                <div class="commodity-list clearfix">
                    <div class="leftName sbg-1 fl">
                        <div class="serTit-wrap">
                            <img src="/cn/images/index3-img/service-t1.png" alt="">
                            <p class="ser-name">留学服务</p>
                        </div>
                        <p class="ser-de">美国TOP20名校申请 美国TOP50<br>名校申请英国G5名校申请 </p>
                    </div>
                    <ul class="rightList clearfix fr">
                        <?php
                        $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0', 'fields' => 'originalPrice,price', 'category' => '152', 'pageSize' => 4]);
                        foreach ($data as $v) {
                            ?>
                            <li>
                                <a href="/goods/<?php echo $v['id'] ?>.html">
                                    <div class="cdImg relative">
                                        <img src="<?php echo $v['image'] ?>" alt="">

                                        <div class="ani topBg">美国<br>Top30</div>
                                    </div>
                                    <div class="cdInfo">
                                        <p class="cdName ellipsis-2"><?php echo $v['name'] ?></p>

                                        <div class="priceWrap">
                                            <span class="newPrice">￥<?php echo $v['price'] ?></span>
                                            <span class="oldprice">￥<?php echo $v['originalPrice'] ?></span>
                                        </div>
                                        <a class="showDe" href="/goods/<?php echo $v['id'] ?>.html">查看详情</a>
                                    </div>
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="commodity-item">
                <!--标题-->
                <div class="commodityTitle-wrap clearfix">
                    <div class="fl">
                        <img class="commodity-icon" src="images/index3-img/icon-p2.png" alt="">
                        <span class="commodity-name">碎片化留学服务/</span>
                        <span class="commodity-de">材料翻译 审核及选校方案 文书服务 面试辅导 签证指导</span>
                    </div>
                    <div class="fr moreWrap">
                        <a class="more"
                           href="/study-abroad/category-153,220,223,224/aim-0/country-0/page-1.html">更多></a>
                    </div>
                </div>
                <!--内容-->
                <div class="commodity-list clearfix">
                    <div class="leftName sbg-2 fl">
                        <div class="serTit-wrap">
                            <img src="/cn/images/index3-img/service-t1.png" alt="">
                            <p class="ser-name">碎片化留学</p>
                        </div>
                        <p class="ser-de">美国TOP20名校申请 美国TOP50<br>名校申请英国G5名校申请 </p>
                    </div>
                    <ul class="rightList clearfix fr">
                        <?php
                        foreach ($research['data'] as $v) {
                            ?>
                            <li>
                                <a href="/goods/<?php echo $v['id'] ?>.html">
                                    <div class="cdImg relative">
                                        <img src="<?php echo $v['image'] ?>" alt="">
                                    </div>
                                    <div class="cdInfo">
                                        <p class="cdName ellipsis-2"><?php echo $v['name'] ?></p>

                                        <div class="priceWrap">
                                            <span class="newPrice">￥<?php echo $v['price'] ?></span>
                                            <span class="oldprice">￥<?php echo $v['originalPrice'] ?></span>
                                        </div>
                                        <a class="showDe" href="/goods/<?php echo $v['id'] ?>.html">查看详情</a>
                                    </div>
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="commodity-item">
                <!--标题-->
                <div class="commodityTitle-wrap clearfix">
                    <div class="fl">
                        <img class="commodity-icon" src="/cn/images/index3-img/icon-p3.png" alt="">
                        <span class="commodity-name">背景提升项目/</span>
                        <span class="commodity-de">先人一步，先赢一步</span>
                    </div>
                    <div class="fr moreWrap">
                        <a class="more" href="/cn/project.html">更多></a>
                    </div>
                </div>
                <!--内容-->
                <div class="commodity-list clearfix">
                    <div class="leftName sbg-3 fl">
                        <div class="serTit-wrap">
                            <img src="/cn/images/index3-img/service-t1.png" alt="">
                            <p class="ser-name">背景提升</p>
                        </div>
                        <p class="ser-de">美国TOP20名校申请 美国TOP50<br>名校申请英国G5名校申请 </p>
                    </div>
                    <ul class="rightList rst-3 clearfix fr">
                        <?php
                        foreach ($project['data'] as $v) {
                            ?>
                            <li>
                                <a href="/cn/project/<?php echo $v['id'] ?>.html">
                                    <div class="cdImg relative">
                                        <img src="<?php echo $v['image'] ?>" alt="">
                                    </div>
                                    <div class="cdInfo">
                                        <p class="cdName ellipsis-2"><?php echo $v['name'] ?></p>
                                        <a class="showDe" href="/cn/project/<?php echo $v['id'] ?>.html">查看详情</a>
                                    </div>
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--尾部-->
<div class="new-footer">
    <div class="new-f-1">
        <h2>媒体报道</h2>
        <ul>
            <li>
                <img src="/cn/images/index3-img/index3-footerwb.png" alt="新浪"/>
            </li>
            <li>
                <img src="/cn/images/index3-img/index3-footersh.png" alt="搜狐">
            </li>
            <li>
                <img src="/cn/images/index3-img/index3-footersb.png" alt="市报">
            </li>
            <li>
                <img src="/cn/images/index3-img/index3-footeryc.png" alt="晚报">
            </li>
        </ul>
    </div>
    <div class="new-f-2">
        <div class="in-n-2">
            <div class="study-five">
                <ul>
                    <li>
                        <img src="/cn/images/index3-img/index3-ppicon01.png" alt="图片">
                        <div class="tm sf-text">
                            <p class="stn-1">申请程序标准</p>
                            <p class="stn-2">均为海外热门院校</p>
                        </div>
                    </li>
                    <li>
                        <img src="/cn/images/index3-img/index3-ppicon02.png" alt="图片">
                        <div class="tm sf-text">
                            <p class="stn-1">服务流程透明</p>
                            <p class="stn-2">进度网上随时可查</p>
                        </div>
                    </li>
                    <li>
                        <img src="/cn/images/index3-img/index3-ppicon03.png" alt="图片">
                        <div class="tm sf-text">
                            <p class="stn-1">学校录取率高</p>
                            <p class="stn-2">99%以上成功率</p>
                        </div>
                    </li>
                    <li>
                        <img src="/cn/images/index3-img/index3-ppicon04.png" alt="图片">
                        <div class="tm sf-text">
                            <p class="stn-1">申请流程高效</p>
                            <p class="stn-2">1~3月即可获得offer</p>
                        </div>
                    </li>
                    <li>
                        <img src="/cn/images/index3-img/index3-ppicon05.png" alt="图片">
                        <div class="tm sf-text">
                            <p class="stn-1">一次性收费</p>
                            <p class="stn-2">不加收排名等其他费用</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="in-n-two">
                <div class="n-t-left">
                    <div class="sort-li">
                        <ul>
                            <li class="title">服务</li>
                            <li><a href="/cn/smartapply/index">名校申请</a></li>
                            <li><a href="/cn/study-mall.html">留学商城</a></li>
                            <li><a href="/cn/smartapply/mydocument">文书神器</a></li>
                            <li><a href="tencent://message/?uin=2949709934&amp;Site=www.cnclcy&amp;Menu=yes" target="_blank">机构查询</a></li>
                            <li><a href="/cn/project.html">背景提升</a></li>
                        </ul>
                        <ul>
                            <li class="title">资源</li>
                            <li><a href="/cn/project.html">顶尖暑校申请</a></li>
                            <li><a href="/cn/project.html">华尔街投行实习</a></li>
                            <li><a href="/cn/project.html">伦敦精品实习</a></li>
                            <li><a href="/cn/project.html">香港上海精品实习</a></li>
                        </ul>
                        <ul>
                            <li class="title">工具</li>
                            <li><a href="http://schools.smartapply.cn/schools.html">院校查询</a></li>
                            <li><a href="/cn/ranking/296-308.html">排名查询</a></li>
                            <li><a href="http://schools.smartapply.cn/assess.html" target="_blank">背景测评</a></li>
                            <li><a href="http://schools.smartapply.cn/assess.html" target="_blank">选校测评</a></li>
                            <li><a href="tencent://message/?uin=2949709934&amp;Site=www.cnclcy&amp;Menu=yes" target="_blank">顾问推荐</a></li>
                        </ul>
                    </div>
                    <div class="logo-phone">
                        <img src="/cn/images/index3-img/index3-flogo.png" alt="logo" width="216" class="logo"/>
                        <div class="l-p-font">
                            <img src="/cn/images/index3-img/index3-ficon02.png" alt="图标"/>
                            <span>全国热线：400-1816-180</span>
                            <div class="mb"></div>
                            <img src="/cn/images/index3-img/index3-ficon03.png" alt="图标"/>
                            <a href="tencent://message/?uin=2949709934&amp;Site=www.cnclcy&amp;Menu=yes" target="_blank">在线客服咨询处</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="n-t-right">
                    <ul>
                        <li>
                            <img src="/cn/images/index3-img/index3-wechat01.png" alt="二维码" height="120">
                            <p>官方微信订阅号</p>
                        </li>
                        <li>
                            <img src="/cn/images/index3-img/index3-wechat02.png" alt="二维码" height="120">
                            <p>客服微信</p>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"></div>
                <div class="fot-last">
                    <p>©2017 viplgw.cn All Rights Reserved 京ICP备15001182号-1 京公网安备11010802017681&nbsp;免责声明</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--尾部 end-->
<!--活动弹窗-->
<div class="active-one">
    <a href="/goods/2789.html"></a>
    <div class="active-close" onclick="closeActive()">
        <img src="/cn/images/unitary/unitary-close.png" alt="关闭图标"/>
    </div>
</div>
</body>
<script>
    $(function () {
        //        banner 轮播
        jQuery(".slideBox").slide({
            mainCell: ".banner",
            titCell: ".hd",
            effect: "left",
            autoPlay: true,
            autoPage: "<li></li>"
        });
    })
    function closeActive(){
        $(".active-one").hide();
    }
</script>
<script>
    $(function () {

    }
</script>
</html>