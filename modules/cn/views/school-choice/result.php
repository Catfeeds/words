<link rel="stylesheet" href="/cn/css/evaluation-public.css"/>
<link rel="stylesheet" href="/cn/css/radialindicator.css"/>
<link rel="stylesheet" href="/cn/css/choose-school-result.css"/>
<script type="text/javascript" src="/cn/js/radialIndicator.min.js"></script>
<div class="sort-top">
    <div class="choose-sort1">
        <div class="youScore">
            <span class="ti"><b><?php echo $user['nickname']?></b>，您的得分</span>
            <span class="score-bg"><?php echo $data['score'] ?></span>
            <p>以下是你智能选校报告</p>
        </div>
        <div class="choose-s1-right">
            <ul>
                <li>
                    <b>●</b>
                    <span>此报告未考虑文书质量与面试质量</span>
                </li>
                <li>
                    <b>●</b>
                    <span>用户须填写实际情况，保证结果的准确性</span>
                </li>
                <li>
                    <b>●</b>
                    <span>此报告匹配标准以近5年留学录取成果大数据作为技术支撑，并不
                        &nbsp;&nbsp;&nbsp;
                        能百分百代表实际录取结果，仅供参考</span>
                </li>
            </ul>
        </div>
    </div>
    <div class="c-s-2title">
        背景条件分析
    </div>
    <div class="background-fenxi">
        <div class="back-left">
            <ul>
                <?php
                    if($score['school']) {
                        ?>
                        <li>
                            <span class="back-start <?php echo $score['school']['type'] == 1?'green':'red'?>"><?php echo $score['school']['type'] == 1?'优势':'劣势'?></span>
                    <span class="back-info">
                        <b>院校背景：</b><?php echo $score['school']['name']?>院校，打败了<b><?php echo $score['school']['num']?></b>位测评者
                    </span>
                        </li>
                    <?php
                    }
                ?>
                <?php
                if($score['gpa']) {
                    ?>
                    <li>
                        <span class="back-start <?php echo $score['gpa']['type'] == 1?'green':'red'?>"><?php echo $score['gpa']['type'] == 1?'优势':'劣势'?></span>
                    <span class="back-info">
                        <b>GPA：</b><?php echo $score['gpa']['score']?>，打败了<b><?php echo $score['gpa']['num']?></b>位测评者
                    </span>
                    </li>
                <?php
                }
                ?>
                <?php
                if($score['gmat']) {
                    ?>
                    <li>
                        <span class="back-start <?php echo $score['gmat']['type'] == 1?'green':'red'?>"><?php echo $score['gmat']['type'] == 1?'优势':'劣势'?></span>
                    <span class="back-info">
                        <b><?php echo $score['gmat']['name']?>：</b><?php echo $score['gmat']['score']?>，打败了<b><?php echo $score['gmat']['num']?></b>位测评者
                    </span>
                    </li>
                <?php
                }
                ?>
                <?php
                if($score['toefl']) {
                    ?>
                    <li>
                        <span class="back-start <?php echo $score['toefl']['type'] == 1?'green':'red'?>"><?php echo $score['toefl']['type'] == 1?'优势':'劣势'?></span>
                    <span class="back-info">
                        <b><?php echo $score['toefl']['name']?>：</b><?php echo $score['toefl']['score']?>，打败了<b><?php echo $score['toefl']['num']?></b>位测评者
                    </span>
                    </li>
                <?php
                }
                ?>
                <?php
                if($score['work']) {
                    ?>
                    <li>
                        <span class="back-start <?php echo $score['work']['type'] == 1?'green':'red'?>"><?php echo $score['work']['type'] == 1?'优势':'劣势'?></span>
                    <span class="back-info">
                        <b>个人经历：</b><?php echo $score['work']['name']?>，打败了<b><?php echo $score['work']['num']?></b>位测评者
                    </span>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
        <div class="back-right">
            <h4>你的背景条件符合</h4>
            <h1><?php echo $data['res'] != null?count($data['res']):0?></h1>
            <p>所院校的申请要求</p>
            <a href="http://service.weibo.com/share/share.php?
            url=http://www.smartapply.cn/school-choice.html
            &appkey=雷哥网&title=雷哥网留学测评系统_留学背景选校录取几率快速测评
            &pic=http://www.smartapply.cn/cn/images/index3-img/index3-logo.png&ralateUid=&language="
               class="mr" target="_blank">
                <img src="/cn/images/evaluation/choose-r-blog.png" alt="图标"/> 炫耀一下</a>
            <a href="/school-choice.html">重新评估</a>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="c-s-2title">
        以下是你的选校报告
    </div>
    <div class="choose-sort2">
        <ul>
            <?php
            if($data['res'] != null) {
            foreach ($data['res'] as $v) {
            ?>
                <!--将百分比的数字放在这个li标签的data-percentage属性值上-->
            <li data-percentage="60">
                <div class="sort-li-1">
                    <img src="http://schools.smartapply.cn<?php echo $v['image'] ?>" alt="学校图标"/>
                </div>
                <div class="sort-li-2">
                    <h4 class="ellipsis"><a
                            href="http://schools.smartapply.cn/schools/<?php echo $v['id'] ?>.html"><?php echo $v['name'] ?></a>
                    </h4>
                    <p class="ellipsis"><?php echo $v['title'] ?></p>
                <span class="ellipsis">
                    <img src="/cn/images/evaluation/cp-address.png" alt="图标"/>
                    所在地区：<?php echo $v['place'] ?>
                </span>
                </div>
                <div class="sort-li-3">
<!--                    <p>申请录取几率</p>-->
<!--                    <!--圆形进度条-->
<!--                    <div class="prg-cont-wrap">-->
<!--                        <div class="prg-cont rad-prg" id="indicatorContainer1"></div>-->
<!--                    </div>-->
                </div>
                <div class="sort-li-4">
                    <div class="rukou">
                        <a href="tencent://message/?uin=1746295647&Site=www.cnclcy&Menu=yes" target="_blank">人工精准选校入口&gt;</a>
                    </div>
                    <ul>
                        <li>
                            <a href="/cn/consultant">
                                <img src="/cn/images/evaluation/cp-xxicon01.png" alt="图标"/>
                                <span>推荐导师</span>
                            </a>
                        </li>
                        <li>
                            <a href="/cn/case.html">
                                <img src="/cn/images/evaluation/cp-xxicon02.png" alt="图标"/>
                                <span>热门案例</span>
                            </a>
                        </li>
                        <li>
                            <a href="http://schools.smartapply.cn/schools/<?php echo $v['id'] ?>.html">
                                <img src="/cn/images/evaluation/cp-xxicon03.png" alt="图标"/>
                                <span>查看院校</span>
                            </a>
                        </li>
                    </ul>
                    <span class="pl">评论：<b><?php echo round(($v['id']) / 5 + 10) ?></b></span>
                    <span class="ck">查看人数：<b><?php echo round(($v['id']) / 3 + 5) ?></b></span>
                </div>
                <div class="clearfix"></div>
            </li>
                <?php
            }
            }
            ?>
        </ul>
        <!--分页-->
<!--        <div class="rank-page">-->
<!--            <ul>-->
<!--                <li><a href="javascript:void(0);">&lt;</a></li>-->
<!--                <li class="on"><a href="javascript:void(0);">1</a></li>-->
<!--                <li><a href="javascript:void(0);">2</a></li>-->
<!--                <li><a href="javascript:void(0);">3</a></li>-->
<!--                <li><a href="javascript:void(0);">4</a></li>-->
<!--                <li><a href="javascript:void(0);">5</a></li>-->
<!--                <li><a href="javascript:void(0);">&gt;</a></li>-->
<!--            </ul>-->
<!--        </div>-->
    </div>
</div>
<script type="text/javascript">
    $(function(){
//        var lis=$(".choose-sort2>ul>li");
//        for(var i=0;i<lis.length;i++){
//            var bfb=lis.eq(i).attr("data-percentage");
//            $('#indicatorContainer'+(i+1)).radialIndicator({
//                barColor: '#1c9cbc',
//                barBgColor:"#a79e9e",
//                barWidth: 4,
//                initValue: bfb,
//                fontSize:"30",
//                fontColor:"#a79e9e",
//                roundCorner : true,
//                percentage: true
//            });
//        }

    });
</script>