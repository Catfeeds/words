<?php $userId = Yii::$app->session->get('userId'); ?>
<?php $userData = Yii::$app->session->get('userData')?>
<?php $level = Yii::$app->session->get('level')?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $this->context->title?></title>
    <!--    <title>出国留学_美国留学_英国留学_澳洲留学_留学申请_雷哥网留学</title>-->
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="keywords" content="<?php echo $this->context->keywords?>，雷哥培训">
    <meta name="description" content="<?php echo $this->context->description?>">
    <link rel="stylesheet" href="/cn/css/fonts/font-awesome/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="/cn/css/animate.min.css"/>
    <link rel="stylesheet" href="/cn/css/evaluation-public.css"/>
    <link rel="stylesheet" href="/cn/css/reset.css"/>
    <link rel="stylesheet" href="/cn/css/bootstrap.css"/>
    <link rel="stylesheet" href="/cn/css/studyingPublic.css"/>
    <script type="text/javascript" src="/cn/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="/cn/js/bootstrap.js"></script>
    <script type="text/javascript" src="/cn/js/jquery.SuperSlide.2.1.1.js"></script>
    <script type="text/javascript" src="/cn/js/public.js"></script>
    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?a40d58dee17fd6131d23c4535aa3dd7e";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
</head>
<body>
<?php
$success_content = Yii::$app->session->get('success_content');
$loginOut = Yii::$app->session->get('loginOut');
if($success_content){
    echo $success_content;
    Yii::$app->session->remove('success_content');
}
if($loginOut){
    echo $loginOut;
    Yii::$app->session->remove('loginOut');
}
$country ='美国,英国,香港,澳洲,加拿大,新加坡,其他国家,移民';
$education = '高中,本科,硕士,MBA,博士,游学';
$major = '商科,理工科,文科,法律,医学,艺术,体育,其他';
$city = '北京,天津,上海,重庆,黑龙江,吉林,辽宁,河北,山东,江苏,安徽,浙江,福建,广东,海南,云南,贵州,四川,湖南,湖北,河南,山西,陕西,甘肃,青海,江西,新疆,西藏,宁夏,内蒙古,广西,台湾,香港,澳门,国外';
?>
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
    <!-------------------头部------------------------>
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
<!--            <div class="fl nav-de">互联网一站式留学申请平台</div>-->
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
                            <input type="hidden" value="<?php echo $userData['nickname']?$userData['nickname']:$userData['nickname']?>" id="luquCP-need"/>
                            <i class="fa fa-angle-down"></i>
                        </div>
                        <div class="clearB"></div>
                        <!--下拉-->
                        <div class="xiala-con">
                            <ul>
                                <li><a href="/my-test.html">我的测评</a></li>
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
                            <a href="http://www.gmatonline.cn/DownloadApp.html">
                            <div class="first_layer">
                                <img src="/cn/images/gmatapp_logo.jpg" alt="app logo图标"/>
                                <span>雷哥GMAT苹果版</span>
                            </div>
                            <div class="code_box">
                                <img src="/cn/images/leigeQrCode.png" alt="app二维码图片"/>
                            </div>
                                </a>
                        </li>
                        <li>
                            <a href="http://www.gmatonline.cn/DownloadApp.html">
                            <div class="first_layer">
                                <img src="/cn/images/gmatapp_logo.jpg" alt="app logo图标"/>
                                <span>雷哥GMAT安卓版</span>
                            </div>
                            <div class="code_box">
                                <img src="/cn/images/leige-android.png" alt="app二维码图片"/>
                            </div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.gmatonline.cn/DownloadApp.html">
                            <div class="first_layer">
                                <img src="/cn/images/toeflapp_logo.jpg" alt="app logo图标"/>
                                <span>雷哥托福苹果版</span>
                            </div>
                            <div class="code_box">
                                <img src="/cn/images/toeflQrCode.jpg" alt="app二维码图片"/>
                            </div>
                            </a>
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
<!--导航-->
<div class="newNav-out">
    <div class="newNav">
        <div class="new-left">
            <a href="/"><img src="/cn/images/index3-img/index3-logo.png" alt="logo"/></a>
        </div>
        <div class="new-right">
            <ul>
                <li><div class="n-r-left"><a href="/">首页</a></div></li>
                <li>
                    <div class="n-r-left"><a href="javascript:void(0);">院校<br/>数据</a></div>
                    <div class="n-r-right">
                        <ul>
                            <li><a href="http://schools.smartapply.cn/schools.html">院校查询</a></li>
                            <li><a href="/major.html">专业解析</a></li>
                            <li><a href="/cn/ranking/296-308.html">大学排名</a></li>
                            <li><a href="/cn/know.html">知识库</a></li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </li>
                <li>
                    <div class="n-r-left"><a href="/free.html">选校<br/>工具</a></div>
                    <div class="n-r-right threeToop">
                        <ul>
                            <li><a href="/background-test.html">背景测评</a></li>
                            <li><a href="/school-choice.html">选校测评</a></li>
                            <li><a href="/percentages-test.html">学校录取测评</a></li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </li>
                <li>
                    <div class="n-r-left"><a href="javascript:void(0);">申请<br/>互动</a></div>
                    <div class="n-r-right">
                        <ul>
                            <li><a href="/question-tag/0.html">申请问答</a></li>
                            <li><a href="http://bbs.viplgw.cn/" target="_blank">留学社区</a></li>
                            <li><a href="/cn/consultant">顾问推荐</a></li>
                            <li><a href="http://ncrm.thinkwithu.com/" target="_blank">申请进度管理</a></li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </li>
                <li>
                    <div class="n-r-left"><a href="javascript:void(0);">留学<br/>攻略</a></div>
                    <div class="n-r-right">
                        <ul>
                            <li><a href="/Mechanism.html">机构</a></li><!--/Mechanism.html-->
                            <li><a href="/cn/admission-requirement">资讯</a></li>
                            <li><a href="/cn/case.html">案例</a></li>
                            <li><a href="/cn/study-mall.html">申请</a></li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!--导航 end-->

<?=$content?>
<!--尾部-->
<div class="new-footer">
    <div class="new-f-1">
        <h2>媒体报道</h2>
        <ul class="top">
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
        <h2>合作机构</h2>
        <ul class="bot">
            <li>
                <img src="/cn/images/nfooter-1.png" alt="图片"/>
            </li>
            <li>
                <img src="/cn/images/nfooter-2.png" alt="图片"/>
            </li>
            <li>
                <img src="/cn/images/nfooter-3.png" alt="图片"/>
            </li>
            <li>
                <img src="/cn/images/nfooter-4.png" alt="图片"/>
            </li>
            <li>
                <img src="/cn/images/nfooter-5.png" alt="图片"/>
            </li>
<!--            <li>-->
<!--                <img src="/cn/images/nfooter-6.png" alt="图片"/>-->
<!--            </li>-->
<!--            <li>-->
<!--                <img src="/cn/images/nfooter-7.png" alt="图片"/>-->
<!--            </li>-->
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
                            <li><a href="/Mechanism.html">机构查询</a></li>
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
                            <img src="/cn/images/index3-img/index3-wechat01.png" alt="二维码" height="100">
                            <p>官方微信订阅号</p>
                        </li>
                        <li>
                            <img src="/cn/images/index3-img/index3-wechat02.png" alt="二维码" height="100">
                            <p>客服微信</p>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"></div>
                <div class="fot-last">
                    <p>©2017 smartapply.cn All Rights Reserved <a href="http://www.miitbeian.gov.cn" target="_blank">沪ICP备15006607号-1</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="uidSign" data-uid="<?php echo $userId?1:0?>" style='display:none'><a href="http://www.51js.com" target="_blank" id="link">text</a></div>
<!--尾部 end-->
    <script type="text/javascript">
        /**
         * 用户退出
         */
        function loginOut() {
            $.post('/cn/api/login-out', {}, function (re) {
                window.location.href = "/"
            }, 'json')
        }

        /**
         * 登录框
         */
        function userLogin(){
            location.href="http://login.gmatonline.cn/cn/index?source=3&url=<?php echo Yii::$app->request->hostInfo.Yii::$app->request->getUrl()?>"

        }
    </script>
</body>
</html>