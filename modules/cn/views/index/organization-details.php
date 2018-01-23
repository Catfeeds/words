<link rel="stylesheet" href="/cn/css/organization.css"/>
<script src="/cn/js/jquery-1.9.1.min.js"></script>
<script src="/cn/js/jquery.SuperSlide.2.1.1.js"></script>
<div class="organ-con">
    <div class="organ-two-nav">
        <ul>
            <li>
                <a href="/Mechanism.html">机构首页</a>
            </li>
            <li>&gt;</li>
            <li>
                <a href="javascript:void(0)"><?php echo $data['name'] ?></a>
            </li>
        </ul>
    </div>
    <div class="organ-con-left">
        <div class="organ-detail-out">
            <div class="organ-d-1">
                <div class="organ-d-1-left">
                    <img src="<?php echo $data['image'] ?>" alt="图片"/>
                </div>
                <div class="organ-d-1-right">
                    <h4><?php echo $data['name'] ?></h4>
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
                    <div class="organ-d-info">
                        <?php echo $data['description'] ?>
                    </div>
                    <div class="organ-d-a">
                        <a href="tencent://message/?uin=2949709934&amp;Site=www.cnclcy&amp;Menu=yes" target="_blank">
                            <img src="/cn/images/jigou/jigou-zixun.png" alt="咨询图标">
                            免费预约中介顾问
                        </a>
                        <span>（已有<b><?php echo $data['cnName'] ?></b>人咨询）</span>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="organ-d-2">
                 <div class="organ-com-title">
                     <h4>办理国家</h4>
                     <div class="xian_b"></div>
                 </div>
                <div class="banli-country">
                    <ul>
                        <?php $country = explode(',',$data['answer']);
                        foreach ($country as $c) {
                            ?>
                            <li><?php echo $c ?></li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="organ-d-3">
                <div class="organ-com-title">
                    <h4>核心服务介绍</h4>
                    <div class="xian_b"></div>
                </div>
                <div class="hexin-service">
                    <?php echo $data['alternatives'] ?>
                </div>
            </div>
            <div class="organ-d-4">
                <div class="organ-com-title">
                    <h4>顾问推荐</h4>
                    <div class="xian_b"></div>
                </div>
                <div class="guwen-teacher">
                    <ul>
                        <?php
                        foreach($data['adviser'] as $v) {
                            ?>
                            <li>
                                <div class="guwen-left">
                                    <img src="<?php echo $v['image'] ?>" alt="老师照片"/>
                                </div>
                                <div class="guwen-right">
                                    <h4>
                                        <?php echo $v['name'] ?>
                                        <a href="tencent://message/?uin=2949709934&amp;Site=www.cnclcy&amp;Menu=yes"
                                           target="_blank">
                                            <img src="/cn/images/jigou/jigou-zixun.png" alt="咨询图标">
                                            预约顾问
                                        </a>
                                    </h4>
                                    <p class="ellipsis-2">
                                        <?php echo $v['answer'] ?>
                                    </p>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="organ-d-5">
                <div class="organ-com-title">
                    <h4>案例</h4>
                    <div class="xian_b"></div>
                </div>
                <div class="organ-case">
                     <?php echo $data['listeningFile'] ?>
                </div>
            </div>
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