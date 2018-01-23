<link rel="stylesheet" href="/cn/css/swiper-3.3.1.min.css"/>
<link rel="stylesheet" href="/cn/css/index-4.css"/>
<script type="text/javascript" src="/cn/js/swiper-3.3.1.jquery.min.js"></script>
<script type="text/javascript" src="/cn/js/index4.js"></script>
<body>
<!--目前背景能申请-->
<div class="apply-current">
    <div class="apply-auto">
        <h2>你目前的背景能申请到哪些院校？</h2>
        <p>只需三分钟，精准选校匹配、为你提供专业选校报告</p>
<!--        第一屏弹幕-->
        <div class="index-font-slide1">
            <div class="i-f-sbd">
                <ul>
                    <?php
                    $schoolTest = \app\modules\cn\models\SchoolTest::find()->asArray()->select(['uid','createTime','country'])->orderBy(" id desc")->limit(10)->all();
                    $probabilityTest = \app\modules\cn\models\ProbabilityTest::find()->asArray()->select(['uid','createTime'])->orderBy(" id desc")->limit(10)->all();
                    $news = array_merge($schoolTest,$probabilityTest);
                    shuffle($news);
                    foreach($news as $k=>$v) {
                        $res = \app\modules\cn\models\User::find()->asArray()->where("uid={$v['uid']}")->one();
                        ?>
                        <li>雷哥网会员 <?php echo isset($res['nickname'])?$res['nickname']:$res['userName'] ?> <?php echo date("Y-m-d H:i",$v['createTime']) ?>获得一份<?php echo isset($v['country'])?'选校':'录取' ?>报告</li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
        <script type="text/javascript">
            jQuery(".index-font-slide1").slide({mainCell:".i-f-sbd ul",autoPlay:true,effect:"leftMarquee",vis:3,interTime:50,mouseOverStop:false});
        </script>
        <div class="apply-bot-ul">
            <ul>
                <li>
                    <a href="/school-choice.html">
                        <img src="/cn/images/index4/index4-1icon01.png" alt="图标"/>
                        <p>选校测评</p>
                    </a>
                </li>
                <li>
                    <a href="http://schools.smartapply.cn/schools.html">
                        <img src="/cn/images/index4/index4-1icon02.png" alt="图标"/>
                        <p>热门院校</p>
                    </a>
                </li>
                <li>
                    <a href="http://www.smartapply.cn/cn/consultant">
                        <img src="/cn/images/index4/index4-1icon03.png" alt="图标"/>
                        <p>推荐顾问</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--最新消息(第二屏弹幕)-->
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
<!--上千所院校-->
<div class="newHot">
    <div class="newH-left">
        <ul>
            <li class="on">
                <a href="javascript:void(0);">
                    <img src="/cn/images/index4/index4-zui01.png" alt="图标"/>
                    <p>最热留学院校</p>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <img src="/cn/images/index4/index4-zui02.png" alt="图标"/>
                    <p>最新院校排名</p>
                </a>
            </li>
        </ul>
    </div>
    <div class="newH-right">
        <!--最热留学院校-->
        <div class="hot-school">
            <div class="hot-shd">
                <ul>
                    <?php
                    foreach($schools as $v) {
                        ?>
                        <li><a href="javascript:void(0);"><?php echo $v['name'] ?></a></li>
                        <?php
                    }
                    ?>
                </ul>
                <a href="http://schools.smartapply.cn/schools.html" target="_blank" class="more-a">MORE</a>
            </div>
            <div class="hot-sbd">
                <!--美国-->
                <?php
                foreach($schools as $v) {
                    ?>
                    <ul>
                        <li>
                            <div class="hot-s-content">
                                <ul>
                                    <?php
                                    foreach($v['school'] as $va) {
                                        ?>
                                        <li>
                                            <div class="bg-change">
                                                <div class="black-mask">
                                                    <a href="http://schools.smartapply.cn/assess.html" target="_blank">
                                                        <img src="/cn/images/index4/index4-cao01.png" alt="图标"/> 录取几率测评</a>
                                                    <a href="http://schools.smartapply.cn/schools<?php if($va['id']){ echo '/'.$va['id'].'.html';} else{ echo '.html';}?>" target="_blank">
                                                        <img src="/cn/images/index4/index4-cao02.png" alt="图标"/> 查看院校</a>
                                                </div>
                                                <div class="s-c-left">
                                                    <img src="http://schools.smartapply.cn<?php echo $va['image'] ?>" alt="大学图片"/>
                                                </div>
                                                <div class="s-c-right">
                                                    <h4 class="ellipsis"><?php echo $va['name'] ?></h4>
                                                    <p class="ellipsis"><?php echo $va['title'] ?></p>
                                                    <span>学校排名：<?php echo $va['rank'] ?></span>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="s-c-bot">
                                                <ul>
                                                    <li>
                                                        <a href="/cn/consultant">
                                                            <b class="bg-icon01"></b>
                                                            <!--<img src="images/index4/index4-cou01.png" alt="图标"/>-->
                                                            <span>推荐导师</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="/cn/case.html">
                                                            <b class="bg-icon02"></b>
                                                            <!--<img src="images/index4/index4-cou02.png" alt="图标"/>-->
                                                            <span>热门案例</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                    <?php
                }
                ?>
                <!--后面都是一个标题对应一个ul，我就不写了-->
            </div>
        </div>
        <!--最新院校排名-->
        <div class="new-school">
            <div class="n-s-title">
                <h2>上千所院校，雷哥留学为您的留学目的地层层把关</h2>
                <div class="n-s-t-right">
                    <span>年份</span>
                    <select id="year">
                        <?php
                        $year = \app\modules\cn\models\Category::find()->where("pid=305")->orderBy("id asc")->all();
                        foreach($year as $v) {
                            ?>
                            <option value="<?php echo $v['id'] ?>" <?php if($v['id']==308){ ?> selected = "selected" <?php }?> ><?php echo $v['name']?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="n-s-choose">
                <a href="/cn/ranking/296-307.html" target="_blank" class="choose-more">MORE</a>
                <ul>
                    <?php
                    $class = \app\modules\cn\models\Category::find()->asArray()->where("pid=292")->orderBy("CAST(sort as SIGNED) ASC")->all();
                    foreach($class as $v) {
                        ?>
                        <li <?php if($v['id']==296){ echo "class='on' "; }?> onclick="changeClass(<?php echo $v['id'] ?>,this)" ><a href="javascript:void(0);"><?php echo $v['name'] ?></a></li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <!-- Swiper -->
            <div class="swiper-container n-s-ul">
                    <ul class="swiper-wrapper">
                        <?php
                        foreach($rank as $v) {
                            ?>
                            <li class="swiper-slide">
                                <div class="n-s-ubg">
                                    <span><?php echo $v['article']?></span>
                                </div>
                                <h4 class="ellipsis"><a href="http://schools.smartapply.cn/schools<?php if($v['alternatives']){ echo '/'.$v['alternatives'].'.html';} else{ echo '.html';}?>" target="_blank"><?php echo $v['name']?></a></h4>
                                <p class="ellipsis"><a href="http://schools.smartapply.cn/schools<?php if($v['alternatives']){ echo '/'.$v['alternatives'].'.html';} else{ echo '.html';}?>" target="_blank"><?php echo $v['title']?></a></p>
                                <p class="ellipsis">查看人数：<?php echo round(($v['id'])*10/3+5)?></p>
                                <div class="diff">
                                    <div class="s-c-btn01">
                                        <a href="/cn/consultant">
                                            <img src="/cn/images/index4/index4-cou001.png" alt="图标"/>
                                            <span>推荐导师</span>
                                        </a>
                                    </div>
                                    <div class="s-c-btn02">
                                        <a href="/cn/case.html">
                                            <img src="/cn/images/index4/index4-cou002.png" alt="图标"/>
                                            <span>热门案例</span>
                                        </a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
            </div>

        </div>
    </div>
    <div class="clearfix"></div>
</div>
<!--最热名校专业项目-->
<!--<div class="school-major">-->
<!--    <div class="major-auto">-->
<!--        <h2>最热名校专业项目 <a href="http://schools.smartapply.cn/schools.html" target="_blank">MORE</a></h2>-->
<!--        <ul>-->
<!--            --><?php
//            $majorHot = \app\modules\cn\models\Content::getClass(['fields' => 'answer,alternatives,article,listeningFile,cnName,sentenceNumber,numbering,duration,problemComplement,trainer','category' =>"432",'pageSize'=>6]);
//            foreach($majorHot as $v) {
//                ?>
<!--                <li>-->
<!--                    <div class="major-left">-->
<!--                        <div class="m-l-bg">-->
<!--                            <img src="/cn/images/index4/index4-blue01.png" alt="图标"/>-->
<!--                        </div>-->
<!--                        <p class="jr"><a href="">--><?php //echo $v['name']?><!--</a></p>-->
<!--                        <p class="red"><img src="/cn/images/index4/index4-hot.png" alt="hot"/> 热门院校</p>-->
<!--                        <p class="xy"><a href="">--><?php //echo $v['name']?><!--</a></p>-->
<!--                    </div>-->
<!--                    <div class="major-right">-->
<!--                        <div class="m-r-top">-->
<!--                            <p class="ellipsis"><a href="">--><?php //echo $v['title']?><!--</a></p>-->
<!--                            <p class="ellipsis">专业类别：--><?php //echo $v['name']?><!--</p>-->
<!--                            <span class="sep-ell">--><?php //echo $v['numbering']?><!--</span>-->
<!--                        </div>-->
<!--                        <p class="lj ellipsis"><a href="" target="_blank"></a></p>-->
<!--                        <a href="tencent://message/?uin=2949709934&amp;Site=www.cnclcy&amp;Menu=yes" target="_blank" class="guwen"><img src="/cn/images/index4/index4-tuijian.png" alt="guwen"/> 推荐顾问</a>-->
<!--                    </div>-->
<!--                    <div class="clearfix"></div>-->
<!--                </li>-->
<!--                --><?php
//            }
//            ?>
<!--        </ul>-->
<!--    </div>-->
<!--</div>-->
<div class="school-major">
    <div class="major-auto">
        <h2>最热名校专业项目 <a href="/major.html">MORE</a></h2>
        <ul>
            <?php
            $majorHot = \app\modules\cn\models\Content::getClass(['fields' => 'answer,alternatives,article,listeningFile,cnName,sentenceNumber,numbering,duration,problemComplement,trainer','category' =>"432",'pageSize'=>6]);
            foreach($majorHot as $anneK=>$v) {
                ?>
                <li>
                    <div class="m-a-left">
                        <a href="/major-detail/<?php echo $v['id']; ?>.html#/major.html">
                            <?php
                            if($anneK==0){
                            ?>
                                <img src="/cn/images/index4/index4-major01.png" alt="图标"/>
                            <?php
                            }else if($anneK==1) {
                                ?>
                                <img src="/cn/images/index4/index4-major02.png" alt="图标"/>
                                <?php
                            }else if($anneK==2) {
                                ?>
                                <img src="/cn/images/index4/index4-major03.png" alt="图标"/>
                                <?php
                            }else if($anneK==3) {
                                ?>
                                <img src="/cn/images/index4/index4-major04.png" alt="图标"/>
                                <?php
                            }else if($anneK==4) {
                                ?>
                                <img src="/cn/images/index4/index4-major05.png" alt="图标"/>
                                <?php
                            }else if($anneK==5) {
                                ?>
                                <img src="/cn/images/index4/index4-major06.png" alt="图标"/>
                                <?php
                            }
                            ?>
<!--                            <img src="--><?php //echo $v['image']?><!--" alt="图标"/>-->
                        </a>
                    </div>
                    <div class="m-a-right">
                        <h4 class="ellipsis"><a href="/major-detail/<?php echo $v['id']; ?>.html#/major.html"><?php echo $v['name']?> <span>(<?php echo $v['title']?>)</span></a></h4>
                        <div class="m-a-xiang"><?php echo $v['numbering']?></div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="m-a-related">
                        <b>相关院校：</b>
                        <?php
                        $school = explode(',',$v['duration']);
                        foreach($school as $key=>$va) {
                            if ($key < 1) {
                                ?>
                                <img src="/cn/images/index4/index4-hot.png" alt="图标"/>
                                <?php
                            }
                            ?>
                            <a href="/major-detail/<?php echo $v['id']; ?>.html#/major.html"><?php echo $va ?></a>
                            <?php
                        }
                        ?>
                    </div>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
</div>
<!--马上出国了轮播-->
<div class="come-gun">
    <div class="come-hd"><ul></ul></div>
    <div class="come-bd">
        <ul>
            <?php
            $banner = \app\modules\cn\models\Content::getClass(['fields' => 'answer','category' => '226,227','page'=>1]);
            foreach($banner as $v) {
                ?>
                <li>
                    <a href="<?php echo $v['answer'] ?>"><img src="<?php echo $v['image'] ?>" alt="banner"/></a>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
</div>
<!--热门留学问答-->
<div class="hot-question">
    <div class="h-q-left">
        <h2>热门留学问答</h2>
        <div class="que-sort">
            <ul>
                <li>留学申请</li>
                <li>留学生活</li>
                <li>留学院校</li>
                <li>学科专业</li>
                <li>其他</li>
            </ul>
        </div>
        <div class="clearfix"></div>
        <div class="wenda">
            <div class="wenda-hd">
                <ul>
                    <li>最新</li>
                    <li>推荐</li>
                    <li>全部</li>
<!--                    <li>我的回答</li>-->
                </ul>
                <a href="/cn/question" class="more">MORE</a>
            </div>
            <div class="wenda-bd">
                <!--最新-->
                <ul>
                    <li>
                        <div class="wenda-b-con">
                            <ul>
                                <?php
                                $data = \app\modules\cn\models\QuestionContent::find()->asArray()->where('type=1')->orderBy('addTime desc')->limit(5)->all();
                                foreach($data as $v) {
                                    ?>
                                    <li>
                                        <div class="w-b-left">
                                            <?php
                                            $userData = \app\modules\cn\models\User::find()->asArray()->where('id='.$v['userId'])->one();
                                            ?>
                                            <div class="w-b-thumb">
                                                <img src="<?php echo isset($userData['image'])?$userData['image']:'/cn/images/details_defaultImg.png' ?>" alt="头像"/>
                                            </div>
                                            <p class="ellipsis"><?php echo $userData['userName'] ?></p>
                                        </div>
                                        <div class="w-b-right">
                                            <h4><a href="/question-detail/<?php echo $v['id'] ?>.html"><?php echo $v['question'] ?></a></h4>
                                            <p>
                                                <?php echo $v['content'] ?>
                                            </p>
                                            <span class="mr">时间：<?php echo $v['addTime'] ?></span>
                                            <span class="mr">关注度：<?php echo $v['follow'] ?></span>
                                            <span>回答数量：<?php echo count(\app\modules\cn\models\QuestionContent::find()->asArray()->where('pid='.$v['id'])->all())?></span>
                                            <span><b>|</b>我来回答</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </li>
                </ul>
                <!--推荐-->
                <ul>
                    <li>
                        <div class="wenda-b-con">
                            <ul>
                                <?php
                                $data = \app\modules\cn\models\QuestionContent::find()->asArray()->where('type=1 and questionType=1')->orderBy('addTime desc')->limit(5)->all();
                                foreach($data as $v) {
                                    ?>
                                    <li>
                                        <div class="w-b-left">
                                            <?php
                                            $userData = \app\modules\cn\models\User::find()->asArray()->where('id='.$v['userId'])->one();
                                            ?>
                                            <div class="w-b-thumb">
                                                <img src="<?php echo isset($userData['image'])?$userData['image']:'/cn/images/details_defaultImg.png' ?>" alt="头像"/>
                                            </div>
                                            <p><?php echo $userData['userName'] ?></p>
                                        </div>
                                        <div class="w-b-right">
                                            <h4><a href="/question-detail/<?php echo $v['id'] ?>.html"><?php echo $v['question'] ?></a></h4>
                                            <p>
                                                <?php echo $v['content'] ?>
                                            </p>
                                            <span class="mr">时间：<?php echo $v['addTime'] ?></span>
                                            <span class="mr">关注度：<?php echo $v['follow'] ?></span>
                                            <span>回答数量：<?php echo count(\app\modules\cn\models\QuestionContent::find()->asArray()->where('pid='.$v['id'])->all())?></span>
                                            <span><b>|</b>我来回答</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="h-q-right">
        <div class="h-q-btn1">
            <a href="/cn/question">
                <img src="/cn/images/index4/index4-tiwen.png" alt="图标"/>
                我要提问</a>
        </div>
        <div class="h-q-btn2">
            <a href="/cn/question">
                <img src="/cn/images/index4/index4-huida.png" alt="图标"/>
                我要回答</a>
        </div>
        <!--向导师提问-->
        <div class="daoshi-tiwen">
            <div class="dao-title">
                <span>向导师提问</span>
            </div>
            <div class="dao-con">
                <ul>
                    <?php
                    foreach($adviser as $v) {
                        ?>
                        <li>
                            <p><?php echo $v['information']['name'] ?></p>
                            <p>已回答<?php echo $v['num'] ?>个问题</p>
                            <a href="tencent://message/?uin=2949709934&Site=www.cnclcy&Menu=yes" target="_blank">向她提问</a>
                            <div class="dao-thumb">
                                <img src="<?php echo isset($v['information']['image'])?$v['information']['image']:'/cn/images/details_defaultImg.png' ?>" alt="头像"/>
                            </div>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>

    </div>
    <div class="clearfix"></div>
</div>
<!--留学攻略、热门标签-->
<div class="study-sort">
    <div class="s-sort-left">
        <h2>留学攻略</h2>
        <div class="s-sort-hd">
            <ul>
                <li><a href="javascript:void(0);">今日头条</a></li>
                <li><a href="javascript:void(0);">留学规划</a></li>
                <li><a href="javascript:void(0);">留学国家</a></li>
                <li><a href="javascript:void(0);">知识库</a></li>
            </ul>
        </div>
        <div class="s-sort-bd">
            <!--图文-->
            <ul>
                <li>
                    <div class="today-tt">
                        <ul>
                            <?php
                            $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0','fields' => 'answer,article','category' => '241','order'=>'article DESC','page'=>1,'pageSize' => 4]);
                            foreach($data as $key=>$v) { ?>
                                <li>
                                    <a href="/cn/admission-requirement/detail/241-<?php echo $v['id']?>.html">
                                        <img src="<?php echo $v['image'] ?>" alt="图片"/>
                                    </a>
                                    <div class="today-black">
                                        <span><?php echo $v['name'] ?></span>
                                        <b><?php echo $v['article'] ?></b>
                                    </div>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </li>
            </ul>
            <!--列表-->
            <ul>
                <li>
                    <div class="today-list">
                        <ul>
                            <?php
                            $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0','fields' => 'answer,article','category' => '245','page'=>1,'pageSize' => 6,'order' => 'c.createTime DESC']);
                            foreach($data as $v) {
                                ?>
                                <li>
                                    <a href="/cn/admission-requirement/detail/245-<?php echo $v['id']?>.html"><?php echo $v['name']?></a>
                                    <span><?php echo $v['article']?></span>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </li>
            </ul>
            <!--列表-->
            <ul>
                <li>
                    <div class="today-list">
                        <ul>
                            <?php
                            $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0','fields' => 'answer,article','category' => 244,'page'=>1,'pageSize' => 6,'order' => 'c.createTime DESC']);
                            foreach($data as $v) {
                                ?>
                                <li>
                                    <a href="/cn/admission-requirement/detail/244-<?php echo $v['id']?>.html"><?php echo $v['name'] ?></a>
                                    <span><?php echo $v['article'] ?></span>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </li>
            </ul>
            <!--列表-->
            <ul>
                <li>
                    <div class="today-list">
                        <ul>
                            <?php
                            $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0','fields' => 'answer,article','category' => 338,'page'=>1,'pageSize' => 6,'order' => 'c.createTime DESC']);
                            foreach($data as $v) {
                                ?>
                                <li>
                                    <a href="/cn/know/detail/338-<?php echo $v['id']?>.html"><?php echo $v['name']?></a>
                                    <span><?php echo $v['createTime']?></span>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="s-sort-right">
        <h2>热门标签</h2>
        <div class="all-sort">
            <ul>
                <li class="bg01">
                    <a href="tencent://message/?uin=2949709934&Site=www.cnclcy&Menu=yes" class="box1">留学资讯</a>
                    <a href="tencent://message/?uin=2949709934&Site=www.cnclcy&Menu=yes" class="fontbox">留学资讯</a>
                </li>
                <li class="bg01">
                    <a href="tencent://message/?uin=2949709934&Site=www.cnclcy&Menu=yes" class="box1">留学案例</a>
                    <a href="tencent://message/?uin=2949709934&Site=www.cnclcy&Menu=yes" class="fontbox">留学案例</a>
                </li>
                <li class="bg01">
                    <a href="tencent://message/?uin=2949709934&Site=www.cnclcy&Menu=yes" class="box1">留学顾问</a>
                    <a href="tencent://message/?uin=2949709934&Site=www.cnclcy&Menu=yes" class="fontbox">留学顾问</a>
                </li>
                <li class="bg02">
                    <a href="tencent://message/?uin=2949709934&Site=www.cnclcy&Menu=yes" class="box1">美国留学</a>
                    <a href="tencent://message/?uin=2949709934&Site=www.cnclcy&Menu=yes" class="fontbox">美国留学</a>
                </li>
                <li class="bg02">
                    <a href="tencent://message/?uin=2949709934&Site=www.cnclcy&Menu=yes" class="box1">留学中介</a>
                    <a href="tencent://message/?uin=2949709934&Site=www.cnclcy&Menu=yes" class="fontbox">留学中介</a>
                </li>
                <li class="bg02">
                    <a href="tencent://message/?uin=2949709934&Site=www.cnclcy&Menu=yes" class="box1">英国留学</a>
                    <a href="tencent://message/?uin=2949709934&Site=www.cnclcy&Menu=yes" class="fontbox">英国留学</a>
                </li>
                <li class="bg03">
                    <a href="tencent://message/?uin=2949709934&Site=www.cnclcy&Menu=yes" class="box1">文书写作</a>
                    <a href="tencent://message/?uin=2949709934&Site=www.cnclcy&Menu=yes" class="fontbox">文书写作</a>
                </li>
                <li class="bg03 specialLi">
                    <a href="tencent://message/?uin=2949709934&Site=www.cnclcy&Menu=yes" class="box1">世界大学<br/>排名</a>
                    <a href="tencent://message/?uin=2949709934&Site=www.cnclcy&Menu=yes" class="fontbox">世界大学<br/>排名</a>
                </li>
                <li class="bg03">
                    <a href="tencent://message/?uin=2949709934&Site=www.cnclcy&Menu=yes" class="box1">留学费用</a>
                    <a href="tencent://message/?uin=2949709934&Site=www.cnclcy&Menu=yes" class="fontbox">留学费用</a>
                </li>
            </ul>
        </div>
        <div class="sort-side">
            <p>
                <a href="/cn/case.html">
                    热门留学方案，看前辈 <br/>
                    们是怎么成功拿到offer！
                </a>
            </p>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<!--留学社交-->
<div class="study-social">
       <div class="in-social">
           <div class="social-title">
               有一个暖心的角落，让留学社交变得更真实，放心倾诉，放心交流。
               <hr/>
           </div>
           <div class="social-con">
               <ul>
                   <li onclick="showStudy('商科留学大本营')">
                       <a href="javascript:void(0);">
                           <img src="/cn/images/index4/index4-dby01.png" alt="图标"/>
                           <p>商科留学大本营</p>
                       </a>
                   </li>
                   <li onclick="showStudy('理工科留学大本营')">
                       <a href="javascript:void(0);">
                           <img src="/cn/images/index4/index4-dby02.png" alt="图标"/>
                           <p>理工科留学大本营</p>
                       </a>
                   </li>
                   <li onclick="showStudy('留学课滚滚滚滚动直播')">
                       <a href="javascript:void(0);">
                           <img src="/cn/images/index4/index4-dby03.png" alt="图标"/>
                           <p>留学课滚滚滚滚动 <br/>直播</p>
                       </a>
                   </li>
                   <li onclick="showStudy('牛X文书怎怎怎怎么写')">
                       <a href="javascript:void(0);">
                           <img src="/cn/images/index4/index4-dby04.png" alt="图标"/>
                           <p>牛X文书怎怎怎怎 <br/>么写</p>
                       </a>
                   </li>
                   <li onclick="showStudy('海外留学申请与资源分享群')">
                       <a href="javascript:void(0);">
                           <img src="/cn/images/index4/index4-dby05.png" alt="图标"/>
                           <p>海外留学申请与资 <br/>源分享群</p>
                       </a>
                   </li>
               </ul>
           </div>
           <div class="social-btn" onclick="showStudy('商科留学大本营')">
               <div class="bb">进群请点</div>
           </div>
<!--           最后一屏弹幕-->
           <div class="danmu-db one-1">
               <div class="damu-db-bd db-bd1">
                   <ul>

                       <?php
                       $groupDM1 = \app\modules\cn\models\Content::getClass(['fields' => 'alternatives','category' =>"430",'pageSize'=>10]);
                       foreach($groupDM1 as $v) {
                           ?>
                           <li>
                               <span>雷哥网会员<?php echo  substr($v['alternatives'], 0, 3)."*****".substr($v['alternatives'], -3, 3) ?>已成功加入<?php  echo $v['name'] ?></span>
                               <img src="/cn/images/index4/index4-dabing.png" alt="图标"/>
                           </li>
                           <?php
                       }
                       ?>
                   </ul>
               </div>
           </div>
           <script type="text/javascript">
               jQuery(".danmu-db.one-1").slide({mainCell:".damu-db-bd.db-bd1 ul",autoPlay:true,effect:"leftMarquee",vis:2,interTime:5,mouseOverStop:false});
           </script>
           <div class="danmu-db one-2">
               <div class="damu-db-bd db-bd2">
                   <ul>
                       <?php
                       $groupDM2 = \app\modules\cn\models\Content::getClass(['fields' => 'alternatives','category' =>"430",'page'=>'2','pageSize'=>10]);
                       foreach($groupDM2 as $v) {
                           ?>
                           <li>
                               <span>雷哥网会员<?php echo substr($v['alternatives'], 0, 3)."*****".substr($v['alternatives'], -3, 3);  ?>已成功加入<?php  echo $v['name'] ?></span>
                               <img src="/cn/images/index4/index4-dabing.png" alt="图标"/>
                           </li>
                           <?php
                       }
                       ?>
                   </ul>
               </div>
           </div>
           <script type="text/javascript">
               jQuery(".danmu-db.one-2").slide({mainCell:".damu-db-bd.db-bd2 ul",autoPlay:true,effect:"leftMarquee",vis:2,interTime:10,mouseOverStop:false});
           </script>
       </div>
</div>
<!--留学社交弹窗-->
<div class="study-mask">
    <div class="in-w-disc">
         <div class="disc-title">进群方式</div>
          <div class="disc-close" onclick="closeStudy()"><img src="/cn/images/index4/index4-close.png" alt="关闭图标"/></div>
          <div class="qq-weChat">
              <ul>
                  <li>
                      <label for="s-qq">
                          <img src="/cn/images/index4/index4-qq.png" alt="qq"/>
                          手机号</label>
                      <input type="text" id="s-qq" placeholder="必填"/>
                  </li>
                  <li>
                      <label for="s-wechat">
                          <img src="/cn/images/index4/index4-wechat.png" alt="qq"/>
                          微信号</label>
                      <input type="text" id="s-wechat" placeholder="可填"/>
                  </li>
              </ul>
          </div>
        <div class="disc-botBtn">
            <ul>
                <li>
                    <input type="button" value="取消" onclick="closeStudy()"/>
                </li>
                <li>
                    <input type="button" value="提交" onclick="subStudy(this)" id="tijiao"/>
                </li>
            </ul>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
    function changeClass(o,e){
        var year = $("#year").val();
        mySwiper.slideTo(0, 1000, false);
        $.ajax({
            url: '/cn/api/get-ranking',
            data: {
                year: year,
                cat: o
            },
            type: 'get',
            dataType: 'json',
            success: function (data) {
                if(data.code==1){
                    var str = "";
                    for(i=0;i<data.data.length;i++){
                        str +='<li class="swiper-slide">'+
                              '<div class="n-s-ubg">'+
                              '<span>'+data.data[i].article+'</span>'+
                              '</div>';
                        if(data.data[i].alternatives){
                            var url = "http://schools.smartapply.cn/schools/"+data.data[i].alternatives+".html"
                            str +='<h4 class="ellipsis"><a href="'+url+'">'+data.data[i].name+'</a></h4>'+
                                '<p class="ellipsis"><a href="'+url+'">'+data.data[i].title+'</a></p>';
                        } else {
                            str +='<h4 class="ellipsis"><a href="http://schools.smartapply.cn/schools.html">'+data.data[i].name+'</a></h4>'+
                                '<p class="ellipsis"><a href="http://schools.smartapply.cn/schools.html">'+data.data[i].title+'</a></p>'
                        }
                        str += '<p class="ellipsis">查看人数：'+Math.round((data.data[i].id)*10/3+5)+'</p>'+
                                '<div class="diff">'+
                                '<div class="s-c-btn01">'+
                                '<a href="/cn/consultant">'+
                                '<img src="/cn/images/index4/index4-cou001.png" alt="图标"/>&nbsp;'+
                                '<span>推荐导师</span>'+
                                '</a>'+
                                '</div>'+
                                '<div class="s-c-btn02">'+
                                '<a href="/cn/case.html">'+
                                '<img src="/cn/images/index4/index4-cou002.png" alt="图标"/>&nbsp;'+
                                '<span>热门案例</span>'+
                                '</a>'+
                                '</div>'+
                                '</div>'+
                              '</li>'
                    }
                    $(".n-s-ul").find("ul").html(str);
                    $(e).addClass("on").siblings('li').removeClass('on');

                } else {
                    alert(data.message)
                }
            },
            error: function () {
                alert("网络通讯失败");
            }
        })
    }
</script>