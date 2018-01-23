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
    <link rel="stylesheet" href="/cn/css/new-headFoot.css"/>
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
<div class="refer_small" style="display: block" onclick="showZiXun()"></div>
<div class="referBox" style="display: none;">
    <div class="refer_close" onclick="closeRefer()"></div>
    <div class="refer_top"></div>
    <div class="refer_con">
        <ul>
            <li>
                <a href="http://p.qiao.baidu.com/im/index?siteid=7905926&ucid=18329536&cp=&cr=&cw=" target="_blank">
                    <div class="comSize diffBG01"></div>
                    <p>在线咨询</p>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <div class="comSize diffBG02"></div>
                    <p>微信</p>
                    <div class="tanc_mask01 animated"><img src="/cn/images/smartapply_ewm.png" alt="二维码图片"></div>
                </a>
            </li>
            <li>
                <a href="tencent://message/?uin=1746295647&amp;Site=www.cnclcy&amp;Menu=yes" target="_blank">
                    <div class="comSize diffBG03"></div>
                    <p>QQ</p>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <div class="comSize diffBG04"></div>
                    <p>电话</p>
                    <div class="tanc_mask02 animated">400-1816-180</div>
                </a>
            </li>
            <li>
                <a href="tencent://message/?uin=1746295647&amp;Site=www.cnclcy&amp;Menu=yes" target="_blank">
                    <div class="comSize diffBG05"></div>
                    <p>吐槽入口</p>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" onclick="referTop();">
                    <div class="diffBG06 animated">
                        <img src="/cn/images/refer_icon06.png" alt="回到顶部图标"/>
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
<!--logo、搜索框-->
<div class="out-bg">
    <div class="logo-search">
        <div class=l-logo>
            <a href="/"><img src="/cn/images/index3-img/index3-logo.png" alt="logo"/></a>
        </div>
        <div class=c-search>
            <input type="text" id="content" placeholder="搜索服务"/>
            <input type="button" onclick="searchGoods()" value="搜索"/>
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
                <a href="tencent://message/?uin=1746295647&Site=www.cnclcy&Menu=yes" target="_blank">
                    <img src="/cn/images/index3-img/index3-zixun.png" alt="图标"/></a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
    <!-----------------------导航------------------------------->
    <div id="navBox">
        <!--头部导航-->
        <nav>
            <ul>
                <?php
                $rankOne = \app\modules\cn\models\Navigate::find()->where("pid=1")->orderBy("sort asc")->all();
                foreach($rankOne as $k=>$v) {
                    ?>
                    <li class="<?php if($k==0){ echo 'on'; } else{ if((Yii::$app->request->getHostInfo().Yii::$app->request->url) == $v['url']){ echo 'active'; } } ?>">
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
                                        <li class="<?php if((Yii::$app->request->getHostInfo().Yii::$app->request->url) == $va['url']){ echo 'active'; }  ?>">
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
                                                            <li <?php if((Yii::$app->request->getHostInfo().Yii::$app->request->url) == $val['url']){ echo 'active'; }  ?>>
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
                ?>
                <li class="rightSidebar">
                    <a href="/goods/3099.html"><img src="/cn/images/nav-img.png" alt="活动图片" width="120"/></a>
                </li>
            </ul>
        </nav>
</div>
    <!-------------------导航 end------------------------>

<?=$content?>
<!----------------------尾部----------------------------->
    <!--footer-->
<footer>
    <div class="in-footer">
        <h2>媒体报道</h2>
        <ul class="common">
            <li><img src="/cn/images/index3-img/index3-footerwb.png" alt="新浪"/></li>
            <li><h4>服务</h4></li>
            <li><a href="/cn/smartapply/index">tpo30名校申请计划</a></li>
            <li><a href="/cn/smartapply/mydocument">文书神器</a></li>
            <li><a href="http://gmatonline.cn">高分培训</a></li>
            <li><a href="/cn/consultant">留学行家咨询</a></li>
            <li><img src="/cn/images/index3-img/index3-ficon01.png" alt="icon"> 周一至周日 9:00-22:00</li>
        </ul>
        <ul class="common">
            <li><img src="/cn/images/index3-img/index3-footersh.png" alt="搜狐"/></li>
            <li><h4>资源</h4></li>
            <li><a href="/cn/project.html">顶尖暑校申请</a></li>
            <li><a href="/cn/project.html">华尔街投行实习</a></li>
            <li><a href="/cn/project.html">伦敦精品实习</a></li>
            <li><a href="/cn/project.html">香港上海精品实习</a></li>
            <li><img src="/cn/images/index3-img/index3-ficon02.png" alt="icon"> 全国热线：400-1816-180</li>
        </ul>
        <ul class="common">
            <li><img src="/cn/images/index3-img/index3-footersb.png" alt="搜狐"/></li>
            <li><h4>工具</h4></li>
            <li><a href="http://schools.smartapply.cn/schools.html">海外院校库</a></li>
            <li><a href="/cn/ranking">大学排名</a></li>
            <li><a href="http://schools.smartapply.cn/assess.html">留学在线测试</a></li>
            <li><a href="/cn/study-mall.html">海淘留学商城</a></li>
            <li><img src="/cn/images/index3-img/index3-ficon03.png" alt="icon">
                <a href="tencent://message/?uin=1746295647&Site=www.cnclcy&Menu=yes" target="_blank">在线客服咨询处</a></li>
        </ul>
        <ul class="common" style="width: 190px;">
            <li><img src="/cn/images/index3-img/index3-footeryc.png" alt="搜狐"/></li>
            <li>
                <img src="/cn/images/index3-img/index3-wechat01.png" alt="二维码" height="120">
                <p style="color: #ffffff;margin-top: 5px;">重要的问题微信说</p>
            </li>
            <li>
                <img src="/cn/images/index3-img/index3-wechat02.png" alt="二维码" height="120">
                <p style="margin-top: 5px">加入雷哥网留学生社团微信群</p>
            </li>

        </ul>
        <div class="clearfix"></div>
        <div class="foot-logo">
            <img src="/cn/images/index3-img/index3-flogo.png" alt="icon" height="100"/>
        </div>
        <p class="fot-last">©2017 viplgw.cn All Rights Reserved 京ICP备15001182号-1 京公网安备11010802017681 免责声明</p>
    </div>
    <div id="uidSign" data-uid="<?php echo $userId?1:0?>" style='display:none'><a href="http://www.51js.com" target="_blank" id="link">text</a></div>
</footer>
<!----------------------尾部  end----------------------------->
    <script type="text/javascript">
        function searchGoods(){
            var content = $('#content').val();
            if(content == ''){
                alert('请输入关键词');return false;
            }
            location.href = '/search/content-'+content+'/page-1.html'
        }
        function searchs(e){
            if(e.keyCode==13){
                searchGoods();
            }
        }
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