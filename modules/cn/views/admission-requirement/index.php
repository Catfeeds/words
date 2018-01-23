
    <link rel="stylesheet" href="/cn/css/study-message.css"/>
</head>
<body>
<div class="top-border">
    <div class="mess-big">
        <div class="mess-b-left">
            <a href="javascript:void(0);" class="prev jian">
                <img src="/cn/images/today-leftj.png" alt="图标"/>
            </a>
            <a href="javascript:void(0);" class="next jian">
                <img src="/cn/images/today-rightJ.png" alt="图标"/>
            </a>
            <div class="mess-b-hd">
                <ul></ul>
            </div>
            <div class="mess-b-bd">
                <ul>
                    <?php
                    $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0','fields' => 'answer,article','category' => '241','order'=>'article DESC','page'=>1,'pageSize' => 4]);
                    foreach($data as $v) {
                        ?>
                        <li>
                            <a href="javascript:void(0);">
                                <img src="<?php echo $v['image']?>" alt="banner"/>
                            </a>
                            <div class="mess-bot-mask">
                                <span><?php echo $v['title']?></span>
                            </div>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
        <script type="text/javascript">
            jQuery(".mess-b-left").slide({titCell:".mess-b-hd ul",mainCell:".mess-b-bd ul",effect:"leftLoop",autoPage:"<li></li>",autoPlay:true});
        </script>
        <div class="mess-b-right">
            <h1>今日头条 <img src="images/today-hot.png" alt="图标"/></h1>
            <ul>
                <?php
                $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0','fields' => 'answer,article','category' => '241','order'=>'article DESC','page'=>1,'pageSize' => 3]);
                foreach($data as $key=>$v) {
                    ?>
                    <li>
                        <h4><span>留学国家</span><a href="/cn/admission-requirement/detail/241-<?php echo $v['id'] ?>.html"><?php echo $v['title'] ?></a></h4>
                        <div class="r-con-info">
                            <?php echo $v['answer']?>
                        </div>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <div class="clearfix"></div>
        <!--下面内容部分-->
        <div class="study-left">
            <div class="study-title-side">
                <div class="s-t-s-hd border01">
                    <div class="left-disc-title">
                        <img src="/cn/images/today-icon01.png" alt="图标"/>
                        <span>留学考试</span>
                        <b></b>
                    </div>
                    <a href="/cn/admission-requirement/body/243.html" class="title-more">MORE</a>
                    <ul>
                        <?php
                        foreach($ks_class as $v){ ?>
                            <li><a href="javascript:void(0);"><?php echo $v['name']?></a></li>
                            <?php
                        }
                        ?>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="s-t-s-bd">
                    <?php
                    foreach($ks_class as $v){ ?>
                        <ul>

                            <li>
                                <div class="s-t-s-b-left">
                                    <img src="/cn/images/today-sidebar01.png" alt="图片"/>
                                </div>
                                <div class="s-t-s-b-right">
                                    <ul>
                                        <?php
                                        $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0','fields' => 'answer','category' => $v['id'],'page'=>1,'pageSize' => 6,'order' => 'c.createTime DESC']);
                                        foreach($data as $kanne=>$va) {
                                            if($kanne<4){
                                                ?>
                                                <li>
                                                    <h4><a href="/cn/admission-requirement/detail/243-<?php echo $va['id']?>.html"><?php echo $va['title']?></a></h4>
                                                    <p>
                                                        <?php echo $va['answer']?>
                                                    </p>
                                                </li>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </li>

                        </ul>
                    <?php }?>
                </div>
            </div>
            <script type="text/javascript">
                jQuery(".study-title-side").slide({titCell:".s-t-s-hd li",mainCell:".s-t-s-bd",trigger:"mouseover"});
            </script>
            <!--留学规划-->
            <div class="study-title-side">
                <div class="s-t-s-hd border02">
                    <div class="left-disc-title">
                        <img src="/cn/images/today-icon02.png" alt="图标"/>
                        <span>留学规划</span>
                        <b></b>
                    </div>
                    <a href="/cn/admission-requirement/body/245.html" class="title-more">MORE</a>
                    <div class="clearfix"></div>
                </div>
                <div class="s-t-s-bd">
                    <ul>
                        <li>
                            <div class="s-t-s-b-left">
                                <img src="/cn/images/today-sidebar02.png" alt="图片"/>
                            </div>
                            <div class="s-t-s-b-right">
                                <ul>
                                    <?php
                                    $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0','fields' => 'answer','category' => '245','page'=>1,'pageSize' => 6,'order' => 'c.createTime DESC']);
                                    foreach($data as $guih=>$v) {
                                        if($guih<4){
                                            ?>
                                            <li>
                                                <h4><a href="/cn/admission-requirement/detail/245-<?php echo $v['id']?>.html"><?php echo $v['title']?></a></h4>
                                                <p>
                                                    <?php echo $v['answer']?>
                                                </p>
                                            </li>
                                            <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </li>
                    </ul>
                </div>
            </div>
            <!--留学国家-->
            <div class="study-title-side">
                <div class="s-t-s-hd border03">
                    <div class="left-disc-title">
                        <img src="/cn/images/today-icon03.png" alt="图标"/>
                        <span>留学国家</span>
                        <b></b>
                    </div>
                    <a href="/cn/admission-requirement/body/244.html" class="title-more">MORE</a>
                    <div class="clearfix"></div>
                </div>
                <div class="s-t-s-bd">
                    <ul>
                        <li>
                            <div class="s-t-s-b-left">
                                <img src="/cn/images/today-sidebar03.png" alt="图片"/>
                            </div>
                            <div class="s-t-s-b-right">
                                <ul>
                                    <?php
                                    $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0','fields' => 'answer','category' => '244','page'=>1,'pageSize' => 6,'order' => 'c.createTime DESC']);
                                    foreach($data as $counk=>$v) {
                                        if($counk<4){
                                            ?>
                                            <li>
                                                <h4><a href="/cn/admission-requirement/detail/244-<?php echo $v['id']?>.html"><?php echo $v['title']?></a></h4>
                                                <p>
                                                    <?php echo $v['answer']?>
                                                </p>
                                            </li>
                                            <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </li>
                    </ul>
                </div>
            </div>
            <!--留学手续-->
            <div class="study-title-side">
                <div class="s-t-s-hd border04">
                    <div class="left-disc-title">
                        <img src="/cn/images/today-icon04.png" alt="图标"/>
                        <span>留学手续</span>
                        <b></b>
                    </div>
                    <a href="/cn/admission-requirement/body/242.html" class="title-more">MORE</a>
                    <div class="clearfix"></div>
                </div>
                <div class="s-t-s-bd">
                    <ul>
                        <li>
                            <div class="s-t-s-b-left">
                                <img src="/cn/images/today-sidebar04.png" alt="图片"/>
                            </div>
                            <div class="s-t-s-b-right">
                                <ul>
                                    <?php
                                    $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0','fields' => 'answer','category' => '242','page'=>1,'pageSize' => 6,'order' => 'c.createTime DESC']);
                                    foreach($data as $shouxu=>$v) {
                                        if($shouxu<4){
                                            ?>
                                            <li>
                                                <h4><a href="/cn/admission-requirement/detail/242-<?php echo $v['id']?>.html"><?php echo $v['title']?></a></h4>
                                                <p>
                                                    <?php echo $v['answer']?>
                                                </p>
                                            </li>
                                            <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="study-right">
            <div class="TopList">
                <div class="common-title-h">
                    热销排行榜
                </div>
                <div class="ProductList">
                    <ul>
                        <?php
                        $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0','category' => '223','pageSize' => 10]);
                        foreach($data as $key=>$v){?>
                            <li>
                                <div class="numDiv"><?php echo $key+1;?></div>
                                <a href="/goods/<?php echo $v['id']?>.html"><?php echo $v['name']?></a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
                <div class="common-title-h">
                    你可能感兴趣的学校
                </div>
                <div class="interSchool">
                    <ul>
                        <?php foreach($ranking as $key=>$v) {
                            if ($key < 10) {
                                ?>
                                <li>
                                    <div class="inter-num"><?php echo $key + 1; ?></div>
                                    <div class="inter-img">
                                        <img src="http://schools.smartapply.cn<?php echo $v['image']; ?>" alt="学校图片"/>
                                    </div>
                                    <div class="inter-info">
                                        <h4><a href="http://schools.smartapply.cn/schools/<?php echo $v['id'] ?>.html"><?php echo $v['name']; ?></a></h4>
                                        <span>排名：<b><?php echo $v['article']; ?></b> | 查看人数：<b>
<!--                                                --><?php //echo $v['viewCount'] ?>
                                               <?php echo rand(280,350); ?>
                                            </b></span>
                                    </div>
                                    <div class="clearfix"></div>
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>

            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
</body>
