
    <link rel="stylesheet" href="/cn/css/ranking.css"/>
</head>
<body>
<div class="rankBox">
    <div class="rankBox-left">
         <div class="rank-blue">排名类型</div>
         <div class="rank-type">
             <ul>
                 <?php
                 $University = \app\modules\cn\models\Category::find()->where("pid=292")->orderBy("CAST(sort as SIGNED) ASC")->all();
                 foreach($University as $v) {
                     ?>
                     <li <?php if($v['id'] == (isset($_GET['type'])?$_GET['type']:'')){?> class="on" <?php } ?>>
                         <?php if($v['id'] == 296){?> <img src="/cn/images/rank02-tuijian.png" alt="推荐图标" class="tuijian"/> <?php } ?>
                         <a href="/cn/ranking/<?php echo $v['id']?>-<?php echo isset($_GET['year'])?$_GET['year']:0?>.html">
                             <?php echo $v['name']?>
                         </a>
                         <?php if($v['id'] == (isset($_GET['type'])?$_GET['type']:'')){?> <img src="/cn/images/rank02-jiantou.png" alt="三角图标" class="sanjiao"/> <?php } ?>

                     </li>
                     <?php
                 }
                 ?>
             </ul>
         </div>
        <div class="rank-blue">成功案例</div>
        <div class="rank-case">
            <ul>
                <?php
                $case = \app\modules\cn\models\Content::getClass(['fields' => 'answer', 'category' => '281', 'page' => 1, 'pageSize' => 8]);
                foreach ($case as $v) {
                    ?>
                    <li><span>●</span><a href="/cn/case/281-<?php echo $v['id'] ?>.html"><?php echo $v['name'] ?></a></li>
                    <?php
                }
                ?>
            </ul>
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
    <div class="rankBox-right">
        <div class="years">
            <ul>
                <li>年份：</li>
                <?php
                $year = \app\modules\cn\models\Category::find()->where("pid=305")->orderBy("id desc")->all();
                foreach($year as $v) {
                ?>
                <li <?php if($v['id'] == (isset($_GET['year'])?$_GET['year']:'')){?> class="on" <?php } ?>>
                    <a href="/cn/ranking/<?php echo isset($_GET['type'])?$_GET['type']:0?>-<?php echo $v['id']?>.html"><?php echo $v['name'];?> <?php if($v['id']==427){ echo '<img src="/cn/images/rank002-new.png" alt="new图标"/>';}?></a>
                </li>
                <?php
                }
                ?>
            </ul>
        </div>
        <div class="rank-content">
            <ul>
                <?php foreach($data['data'] as $k=>$v) { ?>
                    <li>
                        <div class="school-thumb">
<!--                            <img src="--><?php //echo $v['image']?><!--" alt="学校图片"/>-->
                            <span class="number <?php if($k>=3){ echo 'default';}?>"><?php echo $v['article'];?></span>
                        </div>
                        <div class="school-info">
                            <h4><?php echo $v['name']?></h4>
                            <p><?php echo $v['title']?></p>
                        <span>查看人数：<b><?php echo round(($v['id'])*10/3+5)?></b>
                        评论：<b><?php echo round(($v['id'])*3/2+10)?></b></span>
                        </div>
                        <div class="school-btn">
                            <ul>
                                <li>
                                    <a href="/percentages-test.html">
                                        <span></span>
                                        录取几率
                                    </a>
                                </li>
                                <li>
                                    <a href="/cn/consultant">
                                        <span></span>
                                        推荐导师
                                    </a>
                                </li>
                                <li>
                                    <a href="/cn/case.html">
                                        <span></span>
                                        热门案例
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <!--分页-->
        <div class="rank-page">
            <ul>
                <?php echo $data['pageStr']?>
            </ul>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<script type="text/javascript">
    $('.iPage').click(function(){
        $(this).siblings().removeClass('on');
        $(this).addClass('on');
        var page = $('.rank-page').find('.on').html();
        location.href ="/cn/ranking/<?php echo isset($_GET['type'])?$_GET['type']:0?>-<?php echo isset($_GET['year'])?$_GET['year']:0?>-"+page+".html";
    })

    $('.prev').click(function(){
        var page = $('.rank-page').find('.on').html();
        if(page == 1){
            return false;
        }else{
            page = parseInt(page)-1;
        }
        location.href ="/cn/ranking/<?php echo isset($_GET['type'])?$_GET['type']:0?>-<?php echo isset($_GET['year'])?$_GET['year']:0?>-"+page+".html";
    })

    $('.next').click(function(){
        var page = $('.rank-page').find('.on').html();
        if(page == <?php echo $data['totalPage']?>){
            return false;
        }else{
            page = parseInt(page)+1;
        }
        location.href ="/cn/ranking/<?php echo isset($_GET['type'])?$_GET['type']:0?>-<?php echo isset($_GET['year'])?$_GET['year']:0?>-"+page+".html";
    })
</script>
</body>
</html>