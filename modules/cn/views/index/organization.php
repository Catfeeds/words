
    <link rel="stylesheet" href="/cn/css/organization.css"/>
</head>
<body>
<div class="organ-banner">
    <img src="/cn/images/jigou/jigou-banner.png" alt="banner"/>
</div>
<div class="organ-con">
    <div class="organ-con-left">
        <div class="orgin-con-hd">
            <ul>
                <li>
                    <p>综合</p>
                    <img src="/cn/images/jigou/jigou-jiantou.png" alt="三角图标"/>
                </li>
                <li>
                    <p>好评度</p>
                    <img src="/cn/images/jigou/jigou-jiantou.png" alt="三角图标"/>
                </li>
            </ul>
        </div>
        <div class="orgin-con-bd">
            <ul>
                <?php
                $data =  \app\modules\cn\models\Content::getClass(['fields' => 'answer,cnName','category' =>"438",'pageSize'=>20]);
                foreach($data as $v) {
                    ?>
                    <li>
                        <div class="orgin-left">
                            <a href="/Mechanism-detail.html?id=<?php echo $v['id'] ?>"><img src="<?php echo $v['image'] ?>" alt="图片"/></a>
                        </div>
                        <div class="orgin-center">
                            <h4><a href="/Mechanism-detail.html?id=<?php echo $v['id'] ?>"><?php echo $v['name'] ?></a><span>（已有<b><?php echo $v['cnName'] ?></b>人咨询）</span></h4>
                            <span class="service">服务地区：</span>
                            <ul>
                                <li>全国</li>
                            </ul>
                            <span class="service">办理国家：</span>
                            <ul>
                                <?php
                                $country = explode(',',$v['answer']);
                                foreach ($country as $c) {
                                    ?>
                                    <li><?php echo $c?></li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="orgin-right">
                            <p class="fl">好评度：
                                <img src="/cn/images/jigou/jigou-xingxing.png" alt="星星"/>
                                <img src="/cn/images/jigou/jigou-xingxing.png" alt="星星"/>
                                <img src="/cn/images/jigou/jigou-xingxing.png" alt="星星"/>
                                <img src="/cn/images/jigou/jigou-xingxing.png" alt="星星"/>
                                <img src="/cn/images/jigou/jigou-xingBan.png" alt="星星"/>
                            </p>
                            <div class="new-info">
                                <img src="/cn/images/jigou/jigou-cnm.png" alt="信息" class="img-info"/>
                                <div class="new-i-inFont">
                                    <span>学生反馈，顾问负责认真，申请结果有保障，费用合适，口碑好 </span>
                                    <b></b>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <!--                        <p>综合得分：9.2</p>-->
                            <a href="http://p.qiao.baidu.com/im/index?siteid=7905926&ucid=18329536&cp=&cr=&cw=" target="_blank">
                                <img src="/cn/images/jigou/jigou-zixun.png" alt="咨询图标"/>
                                <span>免费预约中介顾问</span>
                            </a>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                    <?php
                }
                ?>
            </ul>
            <ul>
                <?php
                $data =  \app\modules\cn\models\Content::getClass(['fields' => 'answer,cnName','category' =>"438",'order'=>'viewCount DESC','pageSize'=>20]);
                foreach($data as $v) {
                    ?>
                    <li>
                        <div class="orgin-left">
                            <a href="/Mechanism-detail.html?id=<?php echo $v['id'] ?>"><img src="<?php echo $v['image'] ?>" alt="图片"/></a>
                        </div>
                        <div class="orgin-center">
                            <h4> <a href="/Mechanism-detail.html?id=<?php echo $v['id'] ?>"><?php echo $v['name'] ?></a><span>（已有<b><?php echo $v['cnName'] ?></b>人咨询）</span></h4>
                            <span class="service">服务地区：</span>
                            <ul>
                                <li>全国</li>
                            </ul>
                            <span class="service">办理国家：</span>
                            <ul>
                                <?php
                                $country = explode(',',$v['answer']);
                                foreach ($country as $c) {
                                    ?>
                                    <li><?php echo $c?></li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="orgin-right">
                            <p class="fl">好评度：
                                <img src="/cn/images/jigou/jigou-xingxing.png" alt="星星"/>
                                <img src="/cn/images/jigou/jigou-xingxing.png" alt="星星"/>
                                <img src="/cn/images/jigou/jigou-xingxing.png" alt="星星"/>
                                <img src="/cn/images/jigou/jigou-xingxing.png" alt="星星"/>
                                <img src="/cn/images/jigou/jigou-xingBan.png" alt="星星"/>
                            </p>
                            <div class="new-info">
                                <img src="/cn/images/jigou/jigou-cnm.png" alt="信息" class="img-info"/>
                                <div class="new-i-inFont">
                                    <span>学生反馈，顾问负责认真，申请结果有保障，费用合适，口碑好 </span>
                                    <b></b>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <!--                        <p>综合得分：9.2</p>-->
                            <a href="http://p.qiao.baidu.com/im/index?siteid=7905926&ucid=18329536&cp=&cr=&cw=" target="_blank">
                                <img src="/cn/images/jigou/jigou-zixun.png" alt="咨询图标"/>
                                <span>免费预约中介顾问</span>
                            </a>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
    <script type="text/javascript">
        jQuery(".organ-con-left").slide({titCell: ".orgin-con-hd li", mainCell: ".orgin-con-bd", trigger: "click"});
    </script>
    <div class="organ-con-right">
        <a href="/Mechanism/enter.html" class="sideBar">
            <img src="/cn/images/jigou/jigou-sideBanner.png" alt="图片"/>
        </a>
        <div class="organ-r-title">如何寻找合适的中介公司？</div>
        <div class="organ-r-con">
            <ul>
                <li>
                    <img src="/cn/images/jigou/jigou-ricon01.png" alt="图标"/>
                    <b>看口碑</b>
                    <span>看学生真实点评</span>
                </li>
                <li>
                    <img src="/cn/images/jigou/jigou-ricon02.png" alt="图标"/>
                    <b>比方案</b>
                    <span>比3套设计方案</span>
                </li>
                <li>
                    <img src="/cn/images/jigou/jigou-ricon03.png" alt="图标"/>
                    <b>比报价</b>
                    <span>比3家公司报价</span>
                </li>
                <li>
                    <img src="/cn/images/jigou/jigou-ricon04.png" alt="图标"/>
                    <b>比保障</b>
                    <span>比服务和保障</span>
                </li>
            </ul>
            <a href="tencent://message/?uin=2949709934&Site=www.cnclcy&Menu=yes" target="_blank" class="zixun">在线咨询</a>
        </div>
        <div class="organ-r-title">留学中介好评榜</div>
        <div class="organ-r-con bot">
            <ul>
                <li>
                    <a href="tencent://message/?uin=2949709934&Site=www.cnclcy&Menu=yes" target="_blank">
                        <img src="/cn/images/jigou/jigou-ricon05.png" alt="图标"/>
                        <b>申友留学</b>
                    </a>
                </li>
                <li>
                    <a href="tencent://message/?uin=2949709934&Site=www.cnclcy&Menu=yes" target="_blank">
                        <img src="/cn/images/jigou/jigou-ricon05.png" alt="图标"/>
                        <b>藤门留学</b>
                    </a>
                </li>
                <li>
                    <a href="tencent://message/?uin=2949709934&Site=www.cnclcy&Menu=yes" target="_blank">
                        <img src="/cn/images/jigou/jigou-ricon05.png" alt="图标"/>
                        <b>太傻留学</b>
                    </a>
                </li>
                <li>
                    <a href="tencent://message/?uin=2949709934&Site=www.cnclcy&Menu=yes" target="_blank">
                        <img src="/cn/images/jigou/jigou-ricon05.png" alt="图标"/>
                        <b>前途出国留学</b>
                    </a>
                </li>
<!--                <li>-->
<!--                    <a href="tencent://message/?uin=2949709934&Site=www.cnclcy&Menu=yes" target="_blank">-->
<!--                        <img src="/cn/images/jigou/jigou-ricon05.png" alt="图标"/>-->
<!--                        <b>威久留学</b>-->
<!--                    </a>-->
<!--                </li>-->
            </ul>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
</body>
</html>