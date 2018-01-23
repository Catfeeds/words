
    <link rel="stylesheet" href="/cn/css/know.css"/>
</head>
<body>
<div class="know-banner">
    <div class="in-k-con">
        <h2>准备<span>2018</span>年留学
        <br>需要提前做好哪些规划</h2>
        <p>留学申请不求人，菜鸟秒变老司机</p>
        <a href="tencent://message/?uin=1746295647&Site=www.cnclcy&Menu=yes" target="_blank">在线留学行家</a>
        <a href="http://schools.smartapply.cn/assess.html">马上开启留学</a>
    </div>
</div>
<div class="cyclopedia">
    <div class="cycl-left">
        <img src="/cn/images/know/know-gobal.png" alt="图标" width="55"/>
    </div>
    <div class="cycl-right">
        <h4>留学小百科</h4>
        <p>留学申请是一个长期的过程。从决定出国留学，到真正开始着手准备，准备申请材料，进行语言考试，写文书，拿到offer后的签证申请，行前准备和心理准备，需要考虑到整个留学流程的方方面面。</p>
    </div>
    <div class="clearfix"></div>
</div>
<div class="applyFor">
    <div class="apply-hd">
        <ul>
            <li>留学规划视频解析</li>
            <li>申请项目视频解析</li>
            <?php
            foreach($classOne as $v) {
                ?>
                <li><?php echo $v['name'] ?></li>
                <?php
            }
            ?>
        </ul>
    </div>
    <div class="apply-bd">
        <ul class="title-ml">
            <li>
                <div class="video-con" style="padding-top: 20px">
                    <ul>
                        <?php
                        $data = \app\modules\cn\models\Content::getClass(['fields' => 'duration','where' =>"c.pid=0",'category' => 429,'pageSize'=>'100']);
                        foreach($data as $v) {
                            ?>
                            <li>
                                <div class="thub-course">
                                    <img src="<?php echo $v['image'] ?>" alt="课程图片"/>
                                </div>
                                <div class="video-info">
                                    <h4><?php echo $v['name'] ?></h4>
                                    <div class="blue-font">
                                        <p>
                                            <img src="/cn/images/know/know-time.png" alt="icon"/>
                                            <span>课程时长</span><br>
                                            <span class="grey-font"><?php echo $v['duration'] ?></span>
                                        </p>
                                        <p>
                                            <img src="/cn/images/know/know-liulan.png" alt="icon"/>
                                            <span>浏览</span><br>
                                            <span class="grey-font"><?php echo $v['viewCount'] ?></span>
                                        </p>
                                    </div>
                                    <div class="course-btn">
                                        <a href="/goods/<?php echo $v['id']  ?>.html">详情</a>
                                        <!--<a href="javascript:void()" onclick="buyNow(<?php /*echo $va['id'] */?>)">购买</a>-->
                                        <a href="tencent://message/?uin=1746295647&Site=www.cnclcy&Menu=yes" target="_blank">立即咨询</a>
                                    </div>
                                </div>
                            </li>
                            <?php
                        }
                        ?>
                        </ul>
                    </div>

                <!--分页-->
                <!--                 <div class="know-page">-->
                <!--                     <ul>-->
                <!--                         <li class="on"><a href="javascript:void(0);">1</a></li>-->
                <!--                         <li><a href="javascript:void(0);">2</a></li>-->
                <!--                         <li><a href="javascript:void(0);">3</a></li>-->
                <!--                         <li><a href="javascript:void(0);">-->
                <!--                             <img src="/cn/images/know/know-sjx.png" alt="箭头"/>-->
                <!--                         </a></li>-->
                <!--                     </ul>-->
                <!--                 </div>-->
            </li>
        </ul>
        <ul class="title-ml">
            <li>
                <?php
                foreach($classVideo as $k=>$v) {
                    ?>
                    <div class="com-blue-title">
                        <div class="blue-con">
                            <img src="/cn/images/know/know-last0<?php echo $k+1 ?>.png" alt="icon"/>
                            <span class="lastDiff"><?php echo $v['name'] ?></span>
                        </div>
                        <div class="blue-line" style="bottom: 15px"></div>
                    </div>
                    <div class="video-con">
                        <ul>
                            <?php
                            $data = \app\modules\cn\models\Content::getClass(['fields' => 'duration','where' =>"c.pid=0",'category' => $v['id'],'pageSize'=>'100']);
                            foreach($data as $va) {
                                ?>
                                <li>
                                    <div class="thub-course">
                                        <img src="<?php echo $va['image'] ?>" alt="课程图片"/>
                                    </div>
                                    <div class="video-info">
                                        <h4><?php echo $va['name'] ?></h4>
                                        <div class="blue-font">
                                            <p>
                                                <img src="/cn/images/know/know-time.png" alt="icon"/>
                                                <span>课程时长</span><br>
                                                <span class="grey-font"><?php echo $va['duration'] ?></span>
                                            </p>
                                            <p>
                                                <img src="/cn/images/know/know-liulan.png" alt="icon"/>
                                                <span>浏览</span><br>
                                                <span class="grey-font"><?php echo $va['viewCount'] ?></span>
                                            </p>
                                        </div>
                                        <div class="course-btn">
                                            <a href="/goods/<?php echo $va['id']  ?>.html">详情</a>
                                            <!--<a href="javascript:void()" onclick="buyNow(<?php /*echo $va['id'] */?>)">购买</a>-->
                                            <a href="tencent://message/?uin=1746295647&Site=www.cnclcy&Menu=yes" target="_blank">立即咨询</a>
                                        </div>
                                    </div>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <?php
                }
                ?>

                <!--分页-->
                <!--                 <div class="know-page">-->
                <!--                     <ul>-->
                <!--                         <li class="on"><a href="javascript:void(0);">1</a></li>-->
                <!--                         <li><a href="javascript:void(0);">2</a></li>-->
                <!--                         <li><a href="javascript:void(0);">3</a></li>-->
                <!--                         <li><a href="javascript:void(0);">-->
                <!--                             <img src="/cn/images/know/know-sjx.png" alt="箭头"/>-->
                <!--                         </a></li>-->
                <!--                     </ul>-->
                <!--                 </div>-->
            </li>
        </ul>
        <?php
        foreach($classOne as $outK=>$v) {
            ?>
            <ul>
                <li>
                    <?php
                    foreach($v['classTwo'] as $key=>$va) {
                        ?>
                        <div class="com-blue-title">
                            <div class="blue-con">
                                <img src="/cn/images/know/<?php echo $outK+1 ?>-know-before0<?php echo $key+1 ?>.png" alt="icon"/>
                                <span><?php echo $va['name'] ?></span>
                            </div>
                            <div class="blue-line"></div>
                        </div>
                        <div class="com-grey-con">
                            <ul>
                                <?php
                                $data = \app\modules\cn\models\Content::getClass(['category' => $va['id']]);
                                foreach($data as $val) {
                                    ?>
                                    <li><a href="/cn/know/detail/<?php echo $va['id'] ?>-<?php echo $val['id'] ?>.html"><?php echo $val['name'] ?></a></li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <?php
                    }
                    ?>
                </li>
            </ul>
            <?php
        }
        ?>

    </div>
</div>
</body>
<script type="text/javascript" src="/cn/js/know.js"></script>
</html>