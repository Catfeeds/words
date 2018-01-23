
    <link rel="stylesheet" href="/cn/css/counselor-2.css"/>
</head>
<body>
<div class="guwen-banner">
    <img src="/cn/images/guwen-banner.png" alt="banner"/>
</div>
<!--最新消息(顾问页面弹幕)-->
<div class="new-message">
    <div class="new-m-left">
        <img src="/cn/images/index4/index4-white-laba.png" alt="喇叭图标"/>
        <span>最新消息</span>
    </div>
    <div class="new-m-right">
        <div class="new-r-bd">
            <ul>
                <?php
                foreach($barrage as $k=>$v) {
                    ?>
                    <li><?php echo $v['dateTime'];?> 已为雷哥网会员<?php echo isset($v['nickname'])?$v['nickname']:$v['userName'] ?>同学安排<?php
                        if($k==0){
                            echo "美国";
                        } elseif($k==1){
                            echo "英国";
                        } elseif($k==2){
                            echo "美国";
                        } elseif($k==3){
                            echo "香港";
                        } elseif($k==4){
                            echo "加拿大";
                        } elseif($k==5){
                            echo "澳洲";
                        } elseif($k==6){
                            echo "韩国";
                        } elseif($k==7){
                            echo "日本";
                        } elseif($k==8){
                            echo "新加坡";
                        } else{
                            echo "中国";
                        }
                        ?>留学顾问</li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
    <script type="text/javascript">
        jQuery(".new-m-right").slide({mainCell:".new-r-bd ul",autoPlay:true,effect:"leftMarquee",vis:2,interTime:50,mouseOverStop:false});
    </script>
    <div class="clearfix"></div>
</div>
<div class="guwen-nav">
    <ul>
        <li>申请国家:</li>
        <li <?php if((isset($_GET['country'])?$_GET['country']:'0')==0){?> class="on" <?php }?>><a href="/cn/consultant/1.html">全部</a></li>
        <?php
        $country = \app\modules\cn\models\Category::find()->asArray()->where("pid=239")->orderBy("sort asc")->all();
        foreach($country as $v) {
            ?>
            <li <?php
            if($v['id'] == (isset($_GET['country'])?$_GET['country']:'0')){?> class="on" <?php }?>>
                <a href="/cn/consultant/country-<?php echo $v['id']?>/-<?php echo isset($_GET['regionid'])?$_GET['regionid']:0?>-1.html">
                    <?php echo $v['name']?>
                </a>
            </li>
            <?php
        }
        ?>
    </ul>
</div>
<div class="guwen-con">
    <div class="guwen-c-left">
        <ul>
            <?php
            foreach($data['data'] as $v) {
                ?>
                <li>
                    <div class="g-c-l-left">
                        <div class="teacher-thumb">
                            <a href="/cn/consultant/details/<?php echo $v['id'];?>.html">
                                <img src="<?php echo $v['image']?>" alt="老师头像"/>
                            </a>
                        </div>
                        <p><?php echo $v['name']?></p>
                    </div>
                    <div class="g-c-l-right">
                        <h4> <a href="/cn/consultant/details/<?php echo $v['id'];?>.html">个人简介</a></h4>
                        <p><?php echo $v['source']?> <?php echo $v['buyNum']?>;从业<?php echo $v['age']?>年</p>
                     <span class="r-info">
                         <?php echo strip_tags($v['answer'])?>
                     </span>
                        <div class="g-grey">
                            <ul>
                                <li>
                                    <h5><?php echo $v['notice']?>份</h5>
                                <span>获取录取
                                    <br/>通知书</span>
                                </li>
                                <li>
                                    <h5><?php echo $v['successRate']?>%</h5>
                                <span>留学申请
                                    <br/>成功率</span>
                                </li>
                                <li>
                                    <h5><?php echo $v['impression']?>分</h5>
                                    <span>学生印象分</span>
                                </li>
                            </ul>
                        </div>
                        <a href="tencent://message/?uin=2949709934&Site=www.cnclcy&Menu=yes" target="_blank" class="yuyue">预约顾问</a>
                    </div>
                    <div class="clearfix"></div>
                </li>
                <?php
            }
            ?>
        </ul>
        <!-----------------分页--------------------->
        <div class="teaPage">
            <ul>
                <?php echo $data['pageStr']?>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="guwen-c-right">
        <!----热门顾问排行----->
        <div class="hotRank">
            <div class="hotTop">热门顾问排行</div>
            <div class="hotBot">
                <ul>
                    <?php
                    $Ranking = \app\modules\cn\models\Content::getClass(['fields' => 'alternatives,A','category' => '239','page'=>1,'pageSize' => 10]);
                    foreach($Ranking as $v) {
                        ?>
                        <li>
                            <div class="hot-left">
                                <img src="<?php echo $v['image'];?>" alt="顾问头像"/>
                            </div>
                            <div class="hot-right">
                                <h4><?php echo $v['name'];?></h4>
                                <p><?php echo $v['A'];?></p>
                                <a href="tencent://message/?uin=2949709934&Site=www.cnclcy&Menu=yes" target="_blank">咨询</a>
                            </div>
                            <div class="clearfix"></div>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="rightSidebar">
            <div class="side-first">
                <ul>
                    <li>
                        <a href="http://schools.smartapply.cn/assess.html">
                            <img src="/cn/images/guwen-cp01.png" alt="图标"/>
                            <p>背景测评</p>
                        </a>
                    </li>
                    <li>
                        <a href="http://schools.smartapply.cn/assess.html">
                            <img src="/cn/images/guwen-cp02.png" alt="图标"/>
                            <p>选校测评</p>
                        </a>
                    </li>
                    <li>
                        <a href="http://schools.smartapply.cn/assess.html">
                            <img src="/cn/images/guwen-cp03.png" alt="图标"/>
                            <p>录取几率</p>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="side-second">
                 <a href="/cn/case.html"> 热门留学方案，看前辈
                     <br/>
                     们是怎么成功拿到offer！</a>
            </div>
            <div class="side-second diffBG">
                <a href="/cn/smartapply/mydocument"> 如何利用文书包装自己？<br/>
                    文书导师在线解答</a>
            </div>
            <div class="side-ewm">
                <img src="/cn/images/guwen-ewm.png" alt="二维码"/>
                <p>靠谱实习资源、文书资源咨询</p>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
</body>
<script type="text/javascript">
    $('.iPage').click(function(){
        $(this).siblings().removeClass('on');
        $(this).addClass('on');
        var page = $('.teaPage').find('.on').html();
        location.href ="/cn/consultant/country-<?php echo isset($_GET['country'])?$_GET['country']:0?>/-<?php echo isset($_GET['regionid'])?$_GET['regionid']:0?>-"+page+".html";
    })

    $('.prev').click(function(){
        var page = $('.teaPage').find('.on').html();
        if(page == 1){
            return false;
        }else{
            page = parseInt(page)-1;
        }
        location.href ="/cn/consultant/country-<?php echo isset($_GET['country'])?$_GET['country']:0?>/-<?php echo isset($_GET['regionid'])?$_GET['regionid']:0?>-"+page+".html";
    })

    $('.next').click(function(){
        var page = $('.teaPage').find('.on').html();
        if(page == <?php echo $data['totalPage']?>){
            return false;
        }else{
            page = parseInt(page)+1;
        }
        location.href ="/cn/consultant/country-<?php echo isset($_GET['country'])?$_GET['country']:0?>/-<?php echo isset($_GET['regionid'])?$_GET['regionid']:0?>-"+page+".html";
    })
</script>
</html>