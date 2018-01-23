<link rel="stylesheet" href="/cn/css/MyEvaluation-new.css"/>

<div class="orderContent">
    <div class="order-left">
        <ul>
            <li class="on">我的测评</li>
            <li><a href="/order.html">我的订单</a></li>
            <li><a href="/integral.html">我的雷豆</a></li>
            <li><a href="/user.html">个人资料</a></li>
        </ul>
    </div>
    <div class="order-right">
        <div class="new-evaluation">
            <div class="n-common-title">
                <img src="/cn/images/evaluation/newCP-icon01.png" alt="图标"/>
                <span>选校测评</span>
                <a href="/school-choice.html">参加测评</a>
            </div>
            <div class="table-choose">
                <div class="tab-title">
                    <div class="c-left">得分</div>
                    <div class="c-center">详细</div>
                    <div class="c-right">时间</div>
                    <div style="clear: both;"></div>
                </div>
                <div class="tab-content">
                    <!--没有记录展示-->
                    <?php
                    if(!$schoolTest) {
                        ?>
                        <div class="noRecord">
                            没有任何记录，快去参加选校测评吧！
                        </div>
                        <?php
                    } else {
                        ?>
                        <!--                    展示记录-->
                        <ul>
                            <?php
                            foreach($schoolTest as $v) {
                                ?>
                                <li>
                                    <div class="c-left">
                                        <span class="blueColor"><?php echo isset($v['score'])?$v['score']:'' ?>分</span>
                                    </div>
                                    <div class="c-center">
                                        <a href="/school-test/<?php echo $v['id'] ?>.html" class="tab-btn">查看详情</a>
                                    </div>
                                    <div class="c-right">
                                        <span class="greyColor"><?php echo isset($v['createTime'])?date("Y-m-d H:i:s",$v['createTime']):'' ?></span>
                                    </div>
                                    <div style="clear: both;"></div>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                        <?php
                    }
                    ?>
                </div>

            </div>
            <div class="n-common-title">
                <img src="/cn/images/evaluation/newCP-icon02.png" alt="图标"/>
                <span>学校录取测评</span>
                <a href="/percentages-test.html">参加测评</a>
            </div>
            <div class="table-choose twoT">
                <div class="tab-title">
                    <div class="c-left1">学校</div>
                    <div class="c-left2">专业</div>
                    <div class="c-left">申请概率</div>
                    <div class="c-center">详细</div>
                    <div class="c-right">时间</div>
                    <div style="clear: both;"></div>
                </div>
                <div class="tab-content">
                    <?php
                    if(!$probabilityTest) {
                        ?>
                        <!--没有记录展示-->
                        <div class="noRecord">
                            没有任何记录，快去参加选校测评吧！
                        </div>
                        <!--展示记录-->
                        <?php
                    } else{
                        ?>
                        <ul>
                            <?php
                            foreach($probabilityTest as $v) {
                                ?>
                                <li>
                                    <div class="c-left1"><?php echo isset($v['school'])?$v['school']:'' ?></div>
                                    <div class="c-left2"><?php echo isset($v['major'])?$v['major']:'' ?></div>
                                    <div class="c-left">
                                        <span class="blueColor"><?php echo isset($v['percent'])?$v['percent']:'' ?>%</span>
                                    </div>
                                    <div class="c-center">
                                        <a href="/probability/<?php echo $v['id'] ?>.html" class="tab-btn">查看详情</a>
                                    </div>
                                    <div class="c-right">
                                        <span class="greyColor"><?php echo isset($v['createTime'])?date("Y-m-d H:i:s",$v['createTime']):'' ?></span>
                                    </div>
                                    <div style="clear: both;"></div>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                        <?php
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>
    <div style="clear: both"></div>
</div>