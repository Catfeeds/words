<link rel="stylesheet" href="/cn/css/major.css"/>
<script type="text/javascript" src="/cn/js/major.js"></script>
<div class="major-con">
    <div class="major-left">
        <div class="major-sort">
            <span>专业方向：</span>
            <ul>
                <?php foreach($category as $key=>$v) {
                    if ($key < 1) {
                        ?>
                        <li <?php if ((isset($_GET['catId'])?$_GET['catId']:'') =='' || $_GET['catId'] == 433) { ?> class="on" <?php } ?>><a
                                href="/major.html?catId=<?php echo $v['id'] ?>"><?php echo $v['name'] ?></a>
                        </li>
                        <?php
                    } else {
                        ?>
                        <li <?php if ((isset($_GET['catId'])?$_GET['catId']:'') == $v['id']) { ?> class="on" <?php } ?>><a
                                href="/major.html?catId=<?php echo $v['id'] ?>"><?php echo $v['name'] ?></a>
                        </li>
                        <?php
                    }
                }
                ?>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="major-b-con">
            <ul>
                <?php foreach($data['data'] as $v) { ?>
                    <li>
                        <div class="m-b-c-left">
                            <h4>
                                <a href="javascript:void(0)" onclick="tiaoZhuan('<?php echo $v['id'] ?>')"><?php echo $v['name'] ?> <span>(<?php echo $v['title'] ?>)</span></a>
                            </h4>
                            <p>
                                <?php echo strip_tags($v['introduce']) ?>
                            </p>
                        </div>
                        <div class="m-b-c-right">
                            <ul>
                                <li>
                                    <img src="/cn/images/major-icon.png" alt="图标"/>
                                    <span>相关院校</span>
                                </li>
                                <?php
                                $school = explode(',',$v['school']);
                                foreach($school as $k=>$va) {
                                    if($k<2){
                                    ?>
                                    <li>
                                        <a href="#"><?php echo $va ?></a>
                                    </li>
                                    <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                    <?php
                }
                ?>
<!--                <li>-->
<!--                    <div class="m-b-c-left">-->
<!--                        <h4>-->
<!--                            <a href="#">公共管理 <span>(Social Service Administration)</span></a>-->
<!--                        </h4>-->
<!--                        <p>-->
<!--                            公共管理是对公共事务的管理，公共事务是公共管理的起点，决定了公共行政走向公共管理-->
<!--                            的必然态势。近年来，国内学界对公共管理的一些相关问题进行了深入探讨，取得了可喜...dfgfddddddddddddddd-->
<!--                        </p>-->
<!--                    </div>-->
<!--                    <div class="m-b-c-right">-->
<!--                        <ul>-->
<!--                            <li>-->
<!--                                <img src="/cn/images/major-icon.png" alt="图标"/>-->
<!--                                <span>相关院校</span>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <a href="#">芝加哥大学</a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <a href="#">普林斯顿大学</a>-->
<!--                            </li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                    <div class="clearfix"></div>-->
<!--                </li>-->
            </ul>
            <!--分页-->
            <div class="rank-page">
                <ul>
                    <?php echo $data['pageStr'] ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="major-right">
        <div class="m-r-write">
            <div class="m-r-title">
                帮我推荐好顾问
            </div>
            <div class="m-r-con">
                <ul>
                    <li>
                        <span>你的姓名</span>
                        <input type="text"/>
                    </li>
                    <li>
                        <span>意向留学国家</span>
                        <input type="text"/>
                    </li>
                    <li>
                        <span>个人情况(如就读学校，年级，平均成绩等)</span>
                        <textarea></textarea>
                    </li>
                    <li>
                        <span>您的电话<b>*</b></span>
                        <input type="text" class="phone"/>
                    </li>
                    <li>
                        <input type="text" style="width: 160px;"/>
                        <input type="button" value="获取验证码" class="yzm" onclick="l_sendYZM(this)"/>
                    </li>
                </ul>
                <input type="button" value="提交" class="tijiao" onclick="majorSub(this)"/>
            </div>
        </div>
        <div class="side-first">
            <ul>
                <li>
                    <a href="#">
                        <img src="/cn/images/guwen-cp01.png" alt="图标"/>
                        <p>背景测评</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="/cn/images/guwen-cp02.png" alt="图标"/>
                        <p>选校测评</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="/cn/images/guwen-cp03.png" alt="图标"/>
                        <p>录取几率</p>
                    </a>
                </li>
            </ul>
        </div>
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
    </div>
    <div class="clearfix"></div>
</div>
<script type="text/javascript">
    $('.iPage').click(function(){
        $(this).siblings().removeClass('on');
        $(this).addClass('on');
        var page = $('.rank-page').find('.on').html();
        location.href ="/major.html?catId=<?php echo isset($_GET['catId'])?$_GET['catId']:'' ?>&page="+page;
    })

    $('.prev').click(function(){
        var page = $('.rank-page').find('.on').html();
        if(page == 1){
            return false;
        }else{
            page = parseInt(page)-1;
        }
        location.href ="/major.html?catId=<?php echo isset($_GET['catId'])?$_GET['catId']:'' ?>&page="+page;
    })

    $('.next').click(function(){
        var page = $('.rank-page').find('.on').html();
        if(page == <?php echo $data['totalPage']?>){
            return false;
        }else{
            page = parseInt(page)+1;
        }
        location.href ="/major.html?catId=<?php echo isset($_GET['catId'])?$_GET['catId']:'' ?>&page="+page;
    })
</script>