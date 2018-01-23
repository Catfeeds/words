<link rel="stylesheet" href="/cn/css/evaluation-public.css"/>
<link rel="stylesheet" href="/cn/css/radialindicator.css"/>
<link rel="stylesheet" href="/cn/css/choose-school-result.css"/>
<script type="text/javascript" src="/cn/js/radialIndicator.min.js"></script>
<div class="sort-top">
    <div class="choose-sort1">
        <div class="youScore">
            <span>您的得分</span>
            <b><?php echo $data['score'] ?></b>
        </div>
        <div class="choose-s1-left">
            <img src="/cn/images/evaluation/cp-laba.png" alt="图标"/>
        </div>
        <div class="choose-s1-right">
            <ul>
                <li>
                    <img src="/cn/images/evaluation/cp-greenD.png" alt="点图标"/>
                    <span>此报告未考虑文书质量与面试质量</span>
                </li>
                <li>
                    <img src="/cn/images/evaluation/cp-greenD.png" alt="点图标"/>
                    <span>用户须填写实际情况，保证结果的准确性</span>
                </li>
                <li>
                    <img src="/cn/images/evaluation/cp-greenD.png" alt="点图标"/>
                    <span>此报告匹配标准以近5年留学录取成果大数据作为技术支撑，并不能百分百代表实际录取结果，仅供参考</span>
                </li>
<!--                <li>-->
<!--                    <span>分数：--><?php //echo $data['score'] ?><!--</span>-->
<!--                </li>-->
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="c-s-2title">
        以下是你的选校报告
    </div>
    <div class="choose-sort2">
        <ul>
            <!--将百分比的数字放在这个li标签的data-percentage属性值上-->
            <?php
            if($data['res'] != null) {
                foreach ($data['res'] as $v) {
                    ?>
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
                        <div class="sort-li-3"></div>
                        <div class="sort-li-4">
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
<!--            <li data-percentage="80">-->
<!--                <div class="sort-li-1">-->
<!--                    <img src="/cn/images/rank02-country.png" alt="学校图标"/>-->
<!--                </div>-->
<!--                <div class="sort-li-2">-->
<!--                    <h4 class="ellipsis"><a href="#">普林斯大学</a></h4>-->
<!--                    <p class="ellipsis">Princeton University</p>-->
<!--                    <span class="ellipsis">-->
<!--                        <img src="/cn/images/evaluation/cp-address.png" alt="图标"/>-->
<!--                        所在地区：新泽西州-->
<!--                    </span>-->
<!--                </div>-->
<!--                <div class="sort-li-3">-->
<!--                    <p>您的综合得分</p>-->
                <!--圆形进度条-->
<!--                    <div class="prg-cont-wrap">-->
<!--                        <div class="prg-cont rad-prg" id="indicatorContainer2"></div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="sort-li-4">-->
<!--                    <ul>-->
<!--                        <li>-->
<!--                            <a href="#">-->
<!--                                <img src="/cn/images/evaluation/cp-xxicon01.png" alt="图标"/>-->
<!--                                <span>推荐导师</span>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="#">-->
<!--                                <img src="/cn/images/evaluation/cp-xxicon02.png" alt="图标"/>-->
<!--                                <span>热门案例</span>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="#">-->
<!--                                <img src="/cn/images/evaluation/cp-xxicon03.png" alt="图标"/>-->
<!--                                <span>查看院校</span>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                    <span class="pl">评论：<b>222</b></span>-->
<!--                    <span class="ck">查看人数：<b>222</b></span>-->
<!--                </div>-->
<!--                <div class="clearfix"></div>-->
<!--            </li>-->
<!--            <li data-percentage="100">-->
<!--                <div class="sort-li-1">-->
<!--                    <img src="/cn/images/rank02-country.png" alt="学校图标"/>-->
<!--                </div>-->
<!--                <div class="sort-li-2">-->
<!--                    <h4 class="ellipsis"><a href="#">普林斯大学</a></h4>-->
<!--                    <p class="ellipsis">Princeton University</p>-->
<!--                    <span class="ellipsis">-->
<!--                        <img src="/cn/images/evaluation/cp-address.png" alt="图标"/>-->
<!--                        所在地区：新泽西州-->
<!--                    </span>-->
<!--                </div>-->
<!--                <div class="sort-li-3">-->
<!--                    <p>申请录取几率</p>-->
<!--                    <div class="prg-cont-wrap">-->
<!--                        <div class="prg-cont rad-prg" id="indicatorContainer3"></div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="sort-li-4">-->
<!--                    <ul>-->
<!--                        <li>-->
<!--                            <a href="#">-->
<!--                                <img src="/cn/images/evaluation/cp-xxicon01.png" alt="图标"/>-->
<!--                                <span>推荐导师</span>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="#">-->
<!--                                <img src="/cn/images/evaluation/cp-xxicon02.png" alt="图标"/>-->
<!--                                <span>热门案例</span>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="#">-->
<!--                                <img src="/cn/images/evaluation/cp-xxicon03.png" alt="图标"/>-->
<!--                                <span>查看院校</span>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                    <span class="pl">评论：<b>222</b></span>-->
<!--                    <span class="ck">查看人数：<b>222</b></span>-->
<!--                </div>-->
<!--                <div class="clearfix"></div>-->
<!--            </li>-->
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
        var lis=$(".choose-sort2>ul>li");
        for(var i=0;i<lis.length;i++){
            var bfb=lis.eq(i).attr("data-percentage");
            $('#indicatorContainer'+(i+1)).radialIndicator({
                barColor: '#f95250',
                barBgColor:"#a79e9e",
                barWidth: 3,
                initValue: bfb,
                fontSize:"30",
                fontColor:"#a79e9e",
                roundCorner : true,
                percentage: true
            });
        }

    });
</script>