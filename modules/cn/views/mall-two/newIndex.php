<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <!--阻止浏览器缓存-->
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache, must-revalidate">
    <meta http-equiv="expires" content="0">
    <!-- Basic Page Needs
     ================================================== -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="title" content="">
    <meta name="author" content="">
    <meta name="Copyright" content="">
    <meta name="description" content="">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- 让IE浏览器用最高级内核渲染页面 还有用 Chrome 框架的页面用webkit 内核
    ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="chrome=1,IE=edge">
    <!-- IOS6全屏 Chrome高版本全屏
    ================================================== -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <!-- 让360双核浏览器用webkit内核渲染页面
    ================================================== -->
    <meta name="renderer" content="webkit">
    <link rel="stylesheet" href="/cn/css/new_reset.css">
    <link rel="stylesheet" href="/cn/css/case.css">
    <!--<link rel="stylesheet" href="css/common.css">-->
    <script src="/cn/js/jquery-1.12.2.min.js"></script>
    <script src="/cn/js/jquery.SuperSlide.2.1.1.js"></script>
    <script src="/cn/js/case.js"></script>
    <title>录取案例库</title>
</head>
<body>
<!--banner-->
<section class="banner">
    <div class="slideBox">
        <div class="ani tbWrap">
            <div class="w12 relative">
                <div class="txtMarquee-top">
                    <table class="tab-1 ani bd">
                        <thead>
                        <tr>
                            <th><img src="/cn/images/case-icon-1.png" alt="姓 名"/></th>
                            <th><img src="/cn/images/case-icon-3.png" alt="录取专业"/></th>
                            <th><img src="/cn/images/case-icon-2.png" alt="录取学校"/></th>
                        </tr>
                        </thead>
                        <tbody class="bd-top">
                        <?php
                        $data = \app\modules\cn\models\Content::getClass(['fields' => 'cnName,article,problemComplement', 'category' => '281', 'page' => 1, 'pageSize' => 20]);
                        foreach ($data as $v) {
                            ?>
                            <tr>
                                <td>
                                    <div class="sName ellipsis"><?php echo $v['cnName'] ?></div>
                                </td>
                                <td>
                                    <div class="school-2 ellipsis"><?php echo $v['article'] ?></div>
                                </td>
                                <td>
                                    <div class="degree ellipsis"><?php echo $v['problemComplement'] ?></div>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <script type="text/javascript">
                    jQuery(".txtMarquee-top").slide({
                        mainCell: ".bd .bd-top",
                        autoPlay: true,
                        effect: "topMarquee",
                        vis: 13,
                        interTime: 50
                    });
                </script>
            </div>
        </div>
        <ul class="bannerWrap">
            <li><a href="#"
                   style="background: url('/cn/images/banner-2.jpg')no-repeat center;background-size: cover;"></a></li>
            <li><a href="#"
                   style="background: url('/cn/images/banner-2.jpg')no-repeat center;background-size: cover;"></a></li>
            <li><a href="#"
                   style="background: url('/cn/images/banner-2.jpg')no-repeat center;background-size: cover;"></a></li>
        </ul>
        <script>
            //    banner 轮播
            jQuery(".slideBox").slide({
                mainCell: ".bannerWrap",
                titCell: ".hd",
                effect: "fold",
                autoPlay: true,
                autoPage: "<li></li>"
            });
        </script>
    </div>

</section>
<!--一键搜索-->
<section class="search">
    <form action="/cn/mall-two/select" method="get">
        <div class="w12 tm">
            <div class="inb caseText"><img src="/cn/images/case-text.png" alt=""/></div>
            <div class="searchWrap inb tl">
                <img style="width: 40px" src="/cn/images/case-icon-4.png" alt=""/>
                <input type="hidden" name="countryid" value="240">
                <input class="searchInt" placeholder="USC  UIUC  牛津大学" name="word" type="text"/>
                <input type="submit" class="seaBtn" value="搜索">
            </div>
        </div>
    </form>
</section>
<!--热门案例-->
<section>
    <div class="w12">
        <div class="caseTit tm">
            <div class="inb">
            <span class="inb enTit">HOT</span>
            <div class="inb cnTit-wrap tl">
                <p class="chTit"><em>热门</em>&nbsp;<em>案例</em></p>
                <p class="enDe">The hot case</p>
            </div>
            </div>

        </div>
        <div class="tr"> <span class="replace-btn tm">换一批</span></div>
        <div class="hotWrap tm clearfix">
            <ol class="leftList inb">
                <?php
                $data = \app\modules\cn\models\Content::getClass(['fields' => 'article,problemComplement,cnName', 'category' => '281', 'page' => 1, 'pageSize' => 3]);
                foreach ($data as $v) {
                    ?>
                    <li>
                        <a href="/cn/case/281-<?php echo $v['id'] ?>.html">
                            <div>
                                <img src="<?php echo $v['image'] ?>" alt="">

                                <div class="listTit tl"><span class="inb ellipsis-2"><?php echo $v['title'] ?></span>
                                </div>
                                <div class="caseDe-wrap">
                                    <div class="inb">
                                        <p class="tm student-name"><?php echo $v['cnName'] ?></p>

                                        <p class="tl">录取院校：<?php echo $v['problemComplement'] ?></p>

                                        <p class="tl">录取专业：<?php echo $v['article'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <?php
                }
                ?>

            </ol>
            <ul class="rightList inb clearfix">
                <?php
                $data = \app\modules\cn\models\Content::getClass(['fields' => 'article,problemComplement,cnName', 'category' => '281', 'page' => 1, 'pageSize' => 7]);
                foreach ($data as $k => $v) {
                    if ($k > 2) {
                        ?>
                        <li>
                            <a href="/cn/case/281-<?php echo $v['id'] ?>.html">
                                <div>
                                    <img src="<?php echo $v['image'] ?>" alt="">

                                    <p class="ellipsis listTit"><?php echo $v['cnName'] ?>
                                        拿到<?php echo $v['problemComplement'] ?></p>

                                    <div class="caseDe-wrap">
                                        <div class="inb">
                                            <p class="tm student-name"><?php echo $v['cnName'] ?></p>

                                            <p class="tl">录取院校：<?php echo $v['problemComplement'] ?></p>

                                            <p class="tl">录取专业：<?php echo $v['article'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <?php
                    }
                }
                ?>
            </ul>
        </div>

    </div>
</section>
<!--成功案例-->
<section>
    <div class="w12">
        <div class="caseTit tm">
            <span class="inb enTit" style="color: #c55b60;">WIN</span>
            <div class="inb cnTit-wrap tl">
                <p class="chTit" style="border-bottom: 2px solid #c55b60;"><em>成功</em>&nbsp;<em>案例</em></p>
                <p class="enDe">The successful case</p>
            </div>
        </div>
        <div class="relative">
            <ul class="caseNav clearfix">
                <!--                <li data-url="case/list.html" class="on">商科专业 <span class="caseLine"></span></li>-->
                <li class="on" data-id="282" data-url="case/list.html">美国留学<span class="caseLine"></span></li>
                <li data-id="283" data-url="/cn/case/list.html">英国留学<span class="caseLine"></span></li>
                <li data-id="284" data-url="/cn/case/list.html">澳洲加拿大<span class="caseLine"></span></li>
                <li data-id="285" data-url="/cn/case/list.html">香港新加坡<span class="caseLine"></span></li>
                <li data-id="286" data-url="/cn/case/list.html">欧洲国家<span class="caseLine"></span></li>
            </ul>
            <a class="ani more" href="/cn/case/list.html">More＞＞</a>
        </div>
    </div>
</section>
<!--成功案例列表-->
<section class="successCase">
    <div class="w12">
        <!--        <ul class="successList clearfix">-->
        <!--            --><?php
        //            $data = \app\modules\cn\models\Content::getClass(['fields' => 'article,cnName,problemComplement,sentenceNumber,numbering', 'category' => '322', 'page' => 1, 'pageSize' => 8]);
        //            foreach ($data as $v) {
        //                ?>
        <!--                <li>-->
        <!--                    <a href="/cn/case/322---><?php //echo $v['id'] ?><!--.html">-->
        <!--                    <div class="successImg relative">-->
        <!--                        <img src="--><?php //echo $v['image'] ?><!--" alt="">-->
        <!---->
        <!--                        <div class="successInfo">-->
        <!--                            <p class="ellipsis">--><?php //echo $v['cnName'] ?><!--</p>-->
        <!---->
        <!--                            <p class="ellipsis">--><?php //echo $v['problemComplement'] ?><!--</p>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    <div class="successInfo-bt">-->
        <!--                        <div class="bt-wrap">-->
        <!--                            <p class="ellipsis">毕业院校：--><?php //echo $v['numbering'] ?><!--</p>-->
        <!---->
        <!--                            <p class="ellipsis-2">硬件条件：--><?php //echo $v['sentenceNumber'] ?><!--</p>-->
        <!---->
        <!--                            <p class="ellipsis-2">录取院校：--><?php //echo $v['problemComplement'] ?><!--</p>-->
        <!---->
        <!--                            <p class="ellipsis">录取专业：--><?php //echo $v['article'] ?><!--</p>-->
        <!--                        </div>-->
        <!--                    </div></a>-->
        <!--                </li>-->
        <!--                --><?php
        //            }
        //            ?>
        <!--        </ul>-->
        <div class="indexNum" style="display: block;">
            <ul class="successList clearfix">
                <?php
                foreach ($data_m['data'] as $v) {
                    ?>
                    <li>
                        <a href="/cn/case/282-<?php echo $v['id'] ?>.html">
                            <div class="successImg relative">
                                <img src="<?php echo $v['image'] ?>" alt="">

                            </div>
                            <div class="successInfo-bt">
                                <div class="successInfo">
                                    <p class="ellipsis"><?php echo $v['cnName'] ?></p>

                                    <p class="ellipsis"><?php echo $v['problemComplement'] ?></p>
                                </div>
                                <div class="bt-wrap">
                                    <p class="ellipsis">毕业院校：<?php echo $v['numbering'] ?></p>

                                    <p class="ellipsis-2">硬件条件：<?php echo $v['sentenceNumber'] ?></p>

                                    <p class="ellipsis-2">录取院校：<?php echo $v['problemComplement'] ?></p>

                                    <p class="ellipsis">录取专业：<?php echo $v['article'] ?></p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <?php
                }
                ?>
            </ul>
            <ul class="pageSize">
                <?php echo $data_m['pageStr'] ?>
            </ul>
        </div>
        <div class="indexNum">
            <ul class="successList clearfix">
                <?php
                foreach ($data_y['data'] as $v) {
                    ?>
                    <li>
                        <a href="/cn/case/283-<?php echo $v['id'] ?>.html">
                            <div class="successImg relative">
                                <img src="<?php echo $v['image'] ?>" alt="">

                            </div>
                            <div class="successInfo-bt">
                                <div class="successInfo">
                                    <p class="ellipsis"><?php echo $v['cnName'] ?></p>

                                    <p class="ellipsis"><?php echo $v['problemComplement'] ?></p>
                                </div>
                                <div class="bt-wrap">
                                    <p class="ellipsis">毕业院校：<?php echo $v['numbering'] ?></p>

                                    <p class="ellipsis-2">硬件条件：<?php echo $v['sentenceNumber'] ?></p>

                                    <p class="ellipsis-2">录取院校：<?php echo $v['problemComplement'] ?></p>

                                    <p class="ellipsis">录取专业：<?php echo $v['article'] ?></p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <?php
                }
                ?>
            </ul>
            <ul class="pageSize">
                <?php echo $data_y['pageStr'] ?>
            </ul>
        </div>
        <div class="indexNum">
            <ul class="successList clearfix">
                <?php
                foreach ($data_a['data'] as $v) {
                    ?>
                    <li>
                        <a href="/cn/case/284-<?php echo $v['id'] ?>.html">
                            <div class="successImg relative">
                                <img src="<?php echo $v['image'] ?>" alt="">

                            </div>
                            <div class="successInfo-bt">
                                <div class="successInfo">
                                    <p class="ellipsis"><?php echo $v['cnName'] ?></p>

                                    <p class="ellipsis"><?php echo $v['problemComplement'] ?></p>
                                </div>
                                <div class="bt-wrap">
                                    <p class="ellipsis">毕业院校：<?php echo $v['numbering'] ?></p>

                                    <p class="ellipsis-2">硬件条件：<?php echo $v['sentenceNumber'] ?></p>

                                    <p class="ellipsis-2">录取院校：<?php echo $v['problemComplement'] ?></p>

                                    <p class="ellipsis">录取专业：<?php echo $v['article'] ?></p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <?php
                }
                ?>
            </ul>
            <ul class="pageSize">
                <?php echo $data_a['pageStr'] ?>
            </ul>
        </div>
        <div class="indexNum">
            <ul class="successList clearfix">
                <?php
                foreach ($data_x['data'] as $v) {
                    ?>
                    <li>
                        <a href="/cn/case/285-<?php echo $v['id'] ?>.html">
                            <div class="successImg relative">
                                <img src="<?php echo $v['image'] ?>" alt="">

                            </div>
                            <div class="successInfo-bt">
                                <div class="successInfo">
                                    <p class="ellipsis"><?php echo $v['cnName'] ?></p>

                                    <p class="ellipsis"><?php echo $v['problemComplement'] ?></p>
                                </div>
                                <div class="bt-wrap">
                                    <p class="ellipsis">毕业院校：<?php echo $v['numbering'] ?></p>

                                    <p class="ellipsis-2">硬件条件：<?php echo $v['sentenceNumber'] ?></p>

                                    <p class="ellipsis-2">录取院校：<?php echo $v['problemComplement'] ?></p>

                                    <p class="ellipsis">录取专业：<?php echo $v['article'] ?></p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <?php
                }
                ?>
            </ul>
            <ul class="pageSize">
                <?php echo $data_x['pageStr'] ?>
            </ul>
        </div>
        <div class="indexNum">
            <ul class="successList clearfix">
                <?php
                foreach ($data_o['data'] as $v) {
                    ?>
                    <li>
                        <a href="/cn/case/286-<?php echo $v['id'] ?>.html">
                            <div class="successImg relative">
                                <img src="<?php echo $v['image'] ?>" alt="">

                            </div>
                            <div class="successInfo-bt">
                                <div class="successInfo">
                                    <p class="ellipsis"><?php echo $v['cnName'] ?></p>

                                    <p class="ellipsis"><?php echo $v['problemComplement'] ?></p>
                                </div>
                                <div class="bt-wrap">
                                    <p class="ellipsis">毕业院校：<?php echo $v['numbering'] ?></p>

                                    <p class="ellipsis-2">硬件条件：<?php echo $v['sentenceNumber'] ?></p>

                                    <p class="ellipsis-2">录取院校：<?php echo $v['problemComplement'] ?></p>

                                    <p class="ellipsis">录取专业：<?php echo $v['article'] ?></p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <?php
                }
                ?>
            </ul>
            <ul class="pageSize">
                <?php echo $data_o['pageStr'] ?>
            </ul>
        </div>
    </div>
</section>
</body>
</html>
