
    <link rel="stylesheet" href="/cn/css/index-3.css"/>
</head>
<script>
    function wantSay(o){
        $(".answerMask").show();
        var id=$(o).attr("value");
        $("#appoint").val(id);
    }
    function closeAnswer(){
        $(".answerMask").hide();
    }
    function selectSchool(){
        var guoJia = $('#guoJia').val();
        var jieDuan = $('#jieDuan').val();
        var rank = $('#rank').val();
        location.href = 'http://schools.smartapply.cn/cn/index/index?country='+guoJia+'&rank='+rank+'&degree='+jieDuan+'&major=&page=1'
    }
    function check(){
        var gpaReg1 = new RegExp("^[0-4]$");
        var gpaReg2 = new RegExp("^([0-3])+(.[0-9])?$");
        var toeflReg1 = new RegExp("^([0-1]+([0-2]{1})+([0-9]{1}))$");
        var toeflReg2 = new RegExp("^[1-9]+([0-9]{1})$");
        var toeflReg3 = new RegExp("^([0-9]|([3-8]+(.[0-9]{1})))$");
        var GPA = $('#GPAS').val();
        var TOEFL = $('#TOEFLS').val();
        var GMAT = $('#GMATS').val();
        var a = 1;
        $('.b_val').each(function(){
            var spanVal = $(this).html();
            if(spanVal == '请选择'){
                spanVal = '';
            }
            $(this).parent().siblings("input").val(spanVal);
        });
        $('.value').each(function(){
            if($(this).val() == "" || $(this).val() == "请选择"){
                alert('星标志位必填');
                a = 2;
                return false;
            }
        });
        if(a == 2){
            return false;
        }
        if(GPA<1 || GPA>4){
            alert('GPA请输入1-4之间的数字');
            return false;
        }else{
            if(GPA>=3.5){
                GPA = 90;
            }else
            if(GPA>=3 && GPA<=3.4){
                GPA = 80;
            }else
            if(GPA>=2 && GPA<=2.9){
                GPA = 65;
            }else
            if(GPA<2){
                GPA = 45;
            }
        }
        if(TOEFL){
            if(!toeflReg1.test(TOEFL) && !toeflReg2.test(TOEFL) && !toeflReg3.test(TOEFL)){
                alert('托福数值为10到120  雅思数值为3.0到9.0（最小间隔为0.5）');
                return false;
            }else{
                if(TOEFL>=10){
                    if(TOEFL>=110){
                        TOEFL = 90;
                    }else
                    if(TOEFL>=100 && TOEFL<=109){
                        TOEFL = 80;
                    }else
                    if(TOEFL>=90 && TOEFL<=99){
                        TOEFL = 65;
                    }else
                    if(TOEFL<90){
                        TOEFL = 45;
                    }
                }else{
                    if(TOEFL>=8.0){
                        TOEFL = 90;
                    }else
                    if(TOEFL>=7.5 && TOEFL<=7.9){
                        TOEFL = 80;
                    }else
                    if(TOEFL>=5.5 && TOEFL<=7.4){
                        TOEFL = 65;
                    }else
                    if(TOEFL<5.5){
                        TOEFL = 45;
                    }
                }
            }
        }
        if(GMAT){
            if((GMAT>=400 && GMAT<=800) || (GMAT>=261 && GMAT<=340)){
                if(GMAT>=350){
                    if(GMAT>=750){
                        GMAT = 90;
                    }else
                    if(GMAT>=700 && GMAT<=749){
                        GMAT = 80;
                    }else
                    if(GMAT>=650 && GMAT<=699){
                        GMAT = 65;
                    }else
                    if(GMAT<650){
                        GMAT = 45;
                    }
                }else{
                    if(GMAT>=300){
                        GMAT = 90;
                    }else
                    if(GMAT>=250 && GMAT<=299){
                        GMAT = 80;
                    }else
                    if(GMAT>=200 && GMAT<=249){
                        GMAT = 65;
                    }else
                    if(GMAT<200){
                        GMAT = 45;
                    }
                }
            }else{
                alert('GMAT数值为400到800（最小间隔为10），GRE数值为261-340');
                return false;
            }
        }
        var all = GPA+GMAT+TOEFL;
        var collagen = Math.ceil(all/3)
        $('#collagens').val(collagen);
    }
</script>
<body>
<!--banner-->
<div class="out-banner">
    <div class="left-assess">
        <div class="l-a-hd">
            <ul>
                <li>院校搜索</li>
                <li>留学评估</li>
            </ul>
        </div>
        <div class="l-a-bd">
            <ul>
                <li>
                    <div class="top-country">
                        <ul>
                            <li>
                                <a href="#">
                                    <div class="small-country">
                                        <img src="/cn/images/index3-img/index3-country01.png" alt="国旗"/>
                                        <div class="cou-mask"></div>
                                    </div>
                                    <p>美国</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="small-country">
                                        <img src="/cn/images/index3-img/index3-country02.png" alt="国旗"/>
                                        <div class="cou-mask"></div>
                                    </div>
                                    <p>英国</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="small-country">
                                        <img src="/cn/images/index3-img/index3-country03.png" alt="国旗"/>
                                        <div class="cou-mask"></div>
                                    </div>
                                    <p>澳洲</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="small-country">
                                        <img src="/cn/images/index3-img/index3-country04.png" alt="国旗"/>
                                        <div class="cou-mask"></div>
                                    </div>
                                    <p>香港</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="btnGroupBox mt">
                        <div class="btn-group">
                            <input name="guoJia" id="guoJia" type="hidden" value="" />
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <span class="b_val">国家</span>
                                <span class="fa fa-angle-down"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="javascript:void(0);" onclick="changeVal(this,155)">美国</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" onclick="changeVal(this,156)">英国</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" onclick="changeVal(this,157)">加拿大</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" onclick="changeVal(this,158)">澳洲</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" onclick="changeVal(this,159)">新加坡</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" onclick="changeVal(this,160)">香港</a>
                                </li>

                            </ul>
                        </div>
                        <div class="btn-group">
                            <input name="rank" id="rank" type="hidden" value="" />
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <span class="b_val">排名</span>
                                <span class="fa fa-angle-down"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="javascript:void(0);" onclick="changeVal(this,163)">1-25</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" onclick="changeVal(this,164)">26-50</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" onclick="changeVal(this,165)">51-100</a>
                                </li>

                            </ul>
                        </div>
                        <div class="btn-group">
                            <input name="jieDuan" id="jieDuan" type="hidden" value="" />
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <span class="b_val">申请阶段</span>
                                <span class="fa fa-angle-down"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                <li>
                                    <a href="javascript:void(0);" onclick="changeVal(this,167)">本科</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" onclick="changeVal(this,168)">硕士</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" onclick="changeVal(this,169)">MBA</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" onclick="changeVal(this,170)">博士</a>
                                </li>

                            </ul>
                        </div>
                        <div class="btn-liji-sea">
                            <input type="button"  value="立即搜索" onclick="selectSchool()"/>
                        </div>
                    </div>

                </li>
            </ul>
            <form method="post" action="/cn/index/assessment" onsubmit="return check()">
            <ul>
                <li>
                    <div class="btnGroupBox">
                        <div class="btn-group">
                            <input name="extendValue[]" class="value" type="hidden" value="" />
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <span class="red-xing">*</span>
                                <span class="b_val">我想申请</span>
                                <span class="fa fa-angle-down"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <?php
                                $education = explode(",",$education);
                                foreach($education as $v) { ?>
                                    <li>
                                        <a href="javascript:void(0);" onclick="changeVal(this)"><?php echo $v ?></a>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="btn-group">
                            <input name="extendValue[]" class="value" type="hidden" value="" />
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <span class="red-xing">*</span>
                                <span class="b_val">我想去哪儿</span>
                                <span class="fa fa-angle-down"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <?php
                                $country = explode(",",$country);
                                foreach($country as $v) { ?>
                                    <li>
                                        <a href="javascript:void(0);" onclick="changeVal(this)"><?php echo $v ?></a>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="btn-group">
                            <input name="extendValue[]" class="value" type="hidden" value="" />
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <span class="red-xing">*</span>
                                <span class="b_val">专业方向</span>
                                <span class="fa fa-angle-down"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                <?php
                                $major = explode(",",$major);
                                foreach($major as $v) { ?>
                                    <li>
                                        <a href="javascript:void(0);" onclick="changeVal(this)"><?php echo $v ?></a>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="btn-group">
                            <input name="extendValue[]" class="value" type="hidden" value="" />
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <span class="red-xing">*</span>
                                <span class="b_val">所在地</span>
                                <span class="fa fa-angle-down"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                <?php
                                $city = explode(",",$city);
                                foreach($city as $v) { ?>
                                    <li>
                                        <a href="javascript:void(0);" onclick="changeVal(this)"><?php echo $v ?></a>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="diff-input">
                            <ul>
                                <li>
                                    <label for="gpa"><span>*</span>GPA</label>
                                    <input type="text" id="GPAS" name="extendValue[]" class="value"/>
                                    <div class="clearfix"></div>
                                </li>
                                <li>
                                    <label for="ie">托福/雅思</label>
                                    <input type="text" name="extendValue[]" id="TOEFLS"/>
                                    <div class="clearfix"></div>
                                </li>
                                <li>
                                    <label for="gre">GRE/GMAT</label>
                                    <input type="text" name="extendValue[]" id="GMATS"/>
                                    <div class="clearfix"></div>
                                </li>
                            </ul>
                        </div>
                        <input type="hidden" name="collagen" id="collagens" value="">
                        <div class="btn-liji-sea">
                            <input type="submit" value="立即免费评估"/>
                        </div>
                    </div>
                </li>
            </ul>
            </form>
        </div>
    </div>
    <div class="center-banner">
        <div class="c-b-hd">
            <ul></ul>
        </div>
        <div class="c-b-bd">
            <ul>
                <?php
                $banner = \app\modules\cn\models\Content::getClass(['fields' => 'answer','category' => '226,227','page'=>1]);
                foreach($banner as $v) {
                    ?>
                    <li>
                        <a href="<?php echo $v['answer']?>">
                            <img src="<?php echo $v['image'] ?>" alt="banner"/>
                        </a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
    <div class="right-offer">
        <div class="r-o-title">OFFER墙</div>
        <div class="r-o-table">
            <div class="purple-bg">
                <div class="top-h-title">
                    <div class="t-name">
                        <img src="/cn/images/index3-img/index3-offer01.png" alt="icon"/>
                        <span>姓名</span>
                    </div>
                    <div class="t-major">
                        <img src="/cn/images/index3-img/index3-offer02.png" alt="icon"/>
                        <span>录取专业</span>
                    </div>
                    <div class="t-school">
                        <img src="/cn/images/index3-img/index3-offer03.png" alt="icon"/>
                        <span>录取学校</span>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="offer-bd">
                <ul>
                    <?php
                    $data = \app\modules\cn\models\Content::getClass(['fields' => 'cnName,article,problemComplement', 'category' => '281', 'page' => 1, 'pageSize' => 20]);
                    foreach ($data as $v) {
                        ?>
                        <li>
                            <div class="t-name">
                                <span><?php echo $v['cnName'] ?></span>
                            </div>
                            <div class="t-major">
                                <span><?php echo $v['article'] ?></span>
                            </div>
                            <div class="t-school">
                                <span><?php echo $v['problemComplement'] ?></span>
                            </div>
                            <div class="clearfix"></div>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="offer-sort">
            <div class="o-in-div">
                <img src="/cn/images/index3-img/index3-qiehuan.png" alt="切换图标" class="qiehuan" onclick="qiehuanCity()"/>
                <ul id="ul-1">
                    <li>
                        <div class="cityBox">
                            <img src="/cn/images/index3-img/index3-city02.png" alt="城市"/>
                            <a href="tencent://message/?uin=1746295647&Site=www.cnclcy&Menu=yes" target="_blank">预约体验</a>
                        </div>
                        <p>上海总部服务中心</p>
                    </li>
                    <li>
                        <div class="cityBox">
                            <img src="/cn/images/index3-img/index3-city01.png" alt="城市"/>
                            <a href="tencent://message/?uin=1746295647&Site=www.cnclcy&Menu=yes" target="_blank">预约体验</a>
                        </div>
                        <p>北京服务中心</p>
                    </li>
                    <li>
                        <div class="cityBox">
                            <img src="/cn/images/index3-img/index3-city05.png" alt="城市"/>
                            <a href="tencent://message/?uin=1746295647&Site=www.cnclcy&Menu=yes" target="_blank">预约体验</a>
                        </div>
                        <p>成都服务中心</p>
                    </li>
                    <li>
                        <div class="cityBox">
                            <img src="/cn/images/index3-img/index3-city04.png" alt="城市"/>
                            <a href="tencent://message/?uin=1746295647&Site=www.cnclcy&Menu=yes" target="_blank">预约体验</a>
                        </div>
                        <p>武汉服务中心</p>
                    </li>
                </ul>
                <ul id="ul-2">
                    <li>
                        <div class="cityBox">
                            <img src="/cn/images/index3-img/index3-city03.png" alt="城市"/>
                            <a href="tencent://message/?uin=1746295647&Site=www.cnclcy&Menu=yes" target="_blank">预约体验</a>
                        </div>
                        <p>杭州服务中心</p>
                    </li>
                    <li>
                        <div class="cityBox">
                            <img src="/cn/images/index3-img/index3-city06.jpg" alt="城市"/>
                            <a href="tencent://message/?uin=1746295647&Site=www.cnclcy&Menu=yes" target="_blank">预约体验</a>
                        </div>
                        <p>长沙服务中心</p>
                    </li>
                    <li>
                        <div class="cityBox">
                            <img src="/cn/images/index3-img/index3-city07.png" alt="城市"/>
                            <a href="tencent://message/?uin=1746295647&Site=www.cnclcy&Menu=yes" target="_blank">预约体验</a>
                        </div>
                        <p>广州服务中心</p>
                    </li>
                    <li>
                        <div class="cityBox">
                            <img src="/cn/images/index3-img/index3-city08.png" alt="城市"/>
                            <a href="tencent://message/?uin=1746295647&Site=www.cnclcy&Menu=yes" target="_blank">预约体验</a>
                        </div>
                        <p>深圳服务中心</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<!--雷哥网，申友留学旗下品牌，提供大数据驱动下的国际教育O+O服务-->
<div class="service">
    <h2>雷哥网留学，提供大数据驱动下的国际教育O+O服务</h2>
    <div class="service-left">
        <img src="/cn/images/index3-img/index3-computur.png" alt="电脑图片"/>
    </div>
    <div class="service-right">
        <ul>
            <li>
               <div class="ser-r-left">
                   <img src="/cn/images/index3-img/index3-service01.png" alt="图标"/>
               </div>
                <div class="ser-r-right">
                    <h4>雷哥网留学服务概念1：信息服务</h4>
                    <p>雷哥网通过PC、WAP和APP等互联网平台和工具，通过院校库、案例库和
                        录取条件库等建立选校模型，为客户的留学申请精准定位，提供个性化留学
                        选校与申请服务。</p>
                </div>
                <div class="clearfix"></div>
            </li>
            <li>
                <div class="ser-r-left">
                    <img src="/cn/images/index3-img/index3-service02.png" alt="图标"/>
                </div>
                <div class="ser-r-right">
                    <h4>雷哥网留学服务概念２：城市体验</h4>
                    <p>全国城市独立分公司设立，北京、上海、杭州、武汉、成都.....
                        分公司设立，做到客户服务保障，学生可根据就近城市上门体验留学服务。</p>
                </div>
                <div class="clearfix"></div>
            </li>
            <li>
                <div class="ser-r-left">
                    <img src="/cn/images/index3-img/index3-service03.png" alt="图标"/>
                </div>
                <div class="ser-r-right">
                    <h4>雷哥网留学服务概念３：超强申请进度掌控系统</h4>
                    <ul>
                        <li>
                            <img src="/cn/images/index3-img/index3-greenK.png" alt="绿色图标"/>
                            <p>可与所有服务团队所有成员交流</p>
                        </li>
                        <li>
                            <img src="/cn/images/index3-img/index3-greenK.png" alt="绿色图标"/>
                            <p>上传个人信息、成绩单、推荐人资料申请材料</p>
                        </li>
                        <li>
                            <img src="/cn/images/index3-img/index3-greenK.png" alt="绿色图标"/>
                            <p>审核咨询项目的服务计划书</p>
                        </li>
                        <li>
                            <img src="/cn/images/index3-img/index3-greenK.png" alt="绿色图标"/>
                            <p>查阅雷哥网留学选校内部参数</p>
                        </li>
                        <li>
                            <img src="/cn/images/index3-img/index3-greenK.png" alt="绿色图标"/>
                            <p>查阅申请材料追踪申请状态</p>
                        </li>
                        <li>
                            <img src="/cn/images/index3-img/index3-greenK.png" alt="绿色图标"/>
                            <p>参加留学考试能力测试</p>
                        </li>
                        <li>
                            <img src="/cn/images/index3-img/index3-greenK.png" alt="绿色图标"/>
                            <p>查阅申请文书</p>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </li>
        </ul>
    </div>
    <div class="clearfix"></div>
</div>
<!--雷哥网留学热销产品-->
<div class="out-grey">
    <div class="hot-product">
        <div class="h-p-title">
            <h2>雷哥网留学热销产品</h2>
            <p>留学导师团队海归背景+名校学历+多年申请经验+护航留学</p>
            <a href="/cn/study-mall.html">更多产品&gt;&gt;</a>
        </div>
        <div class="h-p-con">
            <ul>
                <li>
                    <a href="/study-abroad/category-0/aim-0/country-176/page-1.html">
                        <div>
                            <h4>美国星程计划TOP30、TOP80、TOP100</h4>
                            <p>美国名校直通车，94.6%成功率，强大的美国留学团 <br/>
                                队导师，是你放心申请的靠山。一切服务透明、公开 <br/>
                                、优质、让您更有信心拿offer！</p>
                            <span class="btnm">查看详情</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="/cn/smartapply/mydocument">
                        <div>
                            <h4>高端文书产品</h4>
                            <p>文书是申请的灵魂，雷哥网文书导师 <br/>
                                均为名校毕业，善于找出学生文书的 <br/>
                                不足和改进的空间，对内容进行增添/ <br/>
                                删改/结构调整等   </p>
                            <span class="btnm">查看详情</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="/study-abroad/category-0/aim-0/country-157/page-1.html">
                        <div>
                            <h4>英国G5康桥梦计划、TOP30大本钟 <br/>
                                梦计划、TOP40日不落梦计划</h4>
                            <p>多款英国留学服务，走出不一样的精彩！</p>
                            <span class="btnm">查看详情</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="/goods/2878.html">
                        <div>
                            <h4>加拿大TOP8枫启扬帆计划</h4>
                            <p>加拿大留学，你的未来， <br/>
                                我们尽责。</p>
                            <span class="btnm">查看详情</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="/goods/2855.html">
                        <div>
                            <h4>澳洲八大澳世起航计划</h4>
                            <p>澳洲留学团队导师实力干将，申请 <br/>
                                百发百中。</p>
                            <span class="btnm">查看详情</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="/cn/project.html">
                        <div>
                            <h4>精品背景提升项目</h4>
                            <p>美国&英国实习项目、国内大 <br/>
                                型企业实习项目、科研项目</p>
                            <span class="btnm">查看详情</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="/study-abroad/category-421/aim-0/country-0/page-1.html">
                        <div>
                            <h4>MBA精英计划</h4>
                            <p>集合优秀申请导师+文书总监+申请总监+留学总监， <br/>
                                申请发挥最大价值！</p>
                            <span>查看详情</span>
                        </div>
                    </a>
                </li>

            </ul>
        </div>

    </div>
</div>
<!--雷哥网留学工具-->
<div class="study-tools">
    <div class="in-s-tool">
        <div class="i-s-t-title">
            <h2>雷哥网留学工具</h2>
            <p>300+海外学校详细介绍、2016-2017年权威排名、雷哥网200+留学经典案例.....</p>
        </div>
        <div class="bot-two">
            <div class="b-t-left">
                <div class="yxk-common">
                    <span>学校搜索</span>
                </div>
                <div class="study-search">
                    <div class="search-group">
                        <input type="text" id="keyword" placeholder="搜索学校"/>
                        <span onclick="select()"><input type="button" value="搜索"/></span>
                    </div>
                    <script type="text/javascript">
                        function select(){
                            var keyword = $('#keyword').val();
                            if(keyword == ''){
                                alert('请输入关键字');
                            }else{
                                location.href="http://schools.smartapply.cn/cn/index/select?type=搜学校&keywords="+keyword;
                            }
                        }
                        //enter键搜索
                    </script>
                    <div class="school-c">
                        <p>根据国家查找学校：</p>
                        <ul>
                            <?php foreach($schoolsc as $k=>$c) { ?>
                                <li>
                                    <a href="http://schools.smartapply.cn/cn/index/index?country=<?php echo $c['id']?>&rank=&degree=&major=&page=1">
                                        <label><img src="/cn/images/index3-img/index3-foundicon0<?php echo$k+1?>.png"
                                                    alt="icon"/></label>
                                        <span><?php echo $c['name']?></span>
                                    </a>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="b-t-center">
                <div class="yxk-common">
                    <span>热门学校</span>
                    <a href="http://schools.smartapply.cn">全部学校</a>
                </div>
                <div class="all-schools">
                    <ul>
                        <?php foreach($schools as $key=>$v) {
                            if ($key > 5) {
                                break;
                            }
                            ?>
                            <li>
                                <div class="school-img">
                                    <a href="http://schools.smartapply.cn/schools/<?php echo $v['id']?>.html"><img src="http://schools.smartapply.cn<?php echo $v['image'];?>" alt="学校图标"/></a>
                                </div>
                                <h4><a href="http://schools.smartapply.cn/schools/<?php echo $v['id']?>.html"><?php echo $v['name'];?></a></h4>

                                <p><?php echo $v['title'];?></p>

                                <p>学校排名：<?php echo $v['article'];?></p>

                                <p><a href="http://schools.smartapply.cn/schools/<?php echo $v['id']?>.html">查看更多该校信息&gt;</a></p>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="b-t-right">
                <div class="yxk-common">
                    <span>大学排名</span>
                    <a href="/cn/ranking">更多 &gt; </a>
                </div>
                <div class="school-paim">
                    <div class="topB-img">
                        <img src="/cn/images/index3-img/index3-paiming.png" alt="排名banner"/>
                    </div>
                    <ul>
                        <?php
                        $University = \app\modules\cn\models\Category::find()->where("pid=292")->all();
                        foreach($University as $v) {
                            ?>
                            <li><span>●</span><a href="/cn/ranking/<?php echo $v['id']?>-<?php echo isset($_GET['year'])?$_GET['year']:0?>.html"><?php echo $v['name']?></a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="left-c-banner">
                <a href="/goods/2789.html">
                    <img src="/cn/images/index3-img/index3-c-lbanner.png" alt="banner"/></a>
            </div>
            <div class="right-c-banner">
                <a href="/cn/activity/one-yuan">
                    <img src="/cn/images/index3-img/index3-c-rbanner.png" alt="banner"/></a>
            </div>
            <div class="clearfix"></div>
            <div class="b-t-left">
                <div class="yxk-common">
                    <span>留学攻略搜索</span>
                </div>
                <div class="study-search">
                    <div class="search-group">
                        <input type="text" placeholder="搜索攻略"/>
                        <a href="/cn/admission-requirement"><input type="button" value="搜索"/></a>
                    </div>
                    <div class="gonglv">
                        <ul>
                            <li>
                                <a href="/cn/admission-requirement/body/245.html">
                                    <img src="/cn/images/index3-img/index3-gonglv01.png" alt="icon">
                                    <p>留学规划</p>
                                </a>
                            </li>
                            <li>
                                <a href="/cn/admission-requirement/body/243.html">
                                    <img src="/cn/images/index3-img/index3-gonglv02.png" alt="icon">
                                    <p>留学考试</p>
                                </a>
                            </li>
                            <li>
                                <a href="/cn/admission-requirement/body/244.html">
                                    <img src="/cn/images/index3-img/index3-gonglv03.png" alt="icon">
                                    <p>留学国家</p>
                                </a>
                            </li>
                            <li>
                                <a href="/cn/admission-requirement/body/242.html">
                                    <img src="/cn/images/index3-img/index3-gonglv04.png" alt="icon">
                                    <p>留学手续</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="b-t-center">
                <div class="yxk-common">
                    <span>热门攻略</span>
                </div>
                <div class="hot-gonglv">
                    <div class="h-g-left">
                        <ul>
                            <?php
                            $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0','category' => '238','order' => 'c.createTime DESC','page'=>1,'pageSize' => 6]);
                            foreach($data as $v) {
                                ?>
                                <li>
                                    <a href="/cn/admission-requirement/detail/<?php echo $v['id']?>.html">
                                        <img src="/cn/images/index3-img/index3-hoticon01.png" alt="icon">
<!--                                        <img src="--><?php //echo $v['image'] ?><!--" alt="icon">-->
                                        <span><?php echo $v['name'] ?>!</span>
                                    </a>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="h-g-right">
                        <img src="/cn/images/index3-img/index3-glbanner02.jpg" alt="banner"/>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="b-t-right">
                <div class="yxk-common">
                    <span>热门标签</span>
                </div>
                <div class="hot-tag">
                    <ul>
                        <li><a href="javascript:void(0);">留学资讯</a></li>
                        <li><a href="javascript:void(0);">大学生活</a></li>
                        <li><a href="javascript:void(0);">留学案例</a></li>
                        <li><a href="javascript:void(0);">美国申请</a></li>
                        <li><a href="javascript:void(0);">费用详解</a></li>
                        <li><a href="javascript:void(0);">留学就业</a></li>
                        <li><a href="javascript:void(0);">考试攻略</a></li>
                        <li><a href="javascript:void(0);">澳洲申请</a></li>
                        <li><a href="javascript:void(0);">英国申请</a></li>
                        <li><a href="javascript:void(0);">留学经验分享</a></li>
                        <li><a href="javascript:void(0);">留学攻略</a></li>
                        <li><a href="javascript:void(0);">选校</a></li>
                        <li><a href="javascript:void(0);">硕士留学</a></li>
                        <li><a href="javascript:void(0);">留学政策</a></li>
                        <li><a href="javascript:void(0);">工作签证</a></li>
                        <li><a href="javascript:void(0);">签证</a></li>
                        <li><a href="javascript:void(0);">文书服务</a></li>
                        <li><a href="javascript:void(0);">世界大学排名</a></li>
                        <li><a href="javascript:void(0);">金融留学</a></li>
                        <li><a href="javascript:void(0);">商学院</a></li>
                        <li><a href="javascript:void(0);">海外移民</a></li>
                        <li><a href="javascript:void(0);">英国G</a></li>
                        <li><a href="javascript:void(0);">50元留学</a></li>
                        <li><a href="javascript:void(0);">雷哥网留学</a></li>
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="study-active">
                <div class="yxk-common">
                    <span>留学活动</span>
                </div>
                <div class="active-con">
                    <div class="a-c-left">
                        <img src="/cn/images/index3-img/index3-glbanner.png" alt="banner">
                    </div>
                    <div class="a-c-right">
                        <ul>
                            <?php
                            $data = \app\modules\cn\models\Content::getClass(['where' => 'c.pid=0','fields' => 'answer,article','category' => '241','order'=>'article DESC','page'=>1,'pageSize' => 5]);
                            foreach($data as $key=>$v) {
                                ?>
                                <li>
                                    <p><a href="/cn/admission-requirement/detail/241-<?php echo $v['id'] ?>.html" class="ellipsis"><?php echo $v['name'] ?></a></p>
                                    <a href="/cn/admission-requirement/detail/241-<?php echo $v['id'] ?>.html" class="see">查看详情&gt;</a>

                                    <div class="clearfix"></div>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="study-que-out">
                <div class="yxk-common">
                    <span>留学问答</span>
                </div>
                <div class="study-question">
                    <div class="s-que-left">
                        <ul>
                            <?php
                            foreach($question as $v) {
                                ?>
                                <li><span>●</span><a href="/cn/question/<?php echo $v['id']?>.html"><?php echo $v['question']?></a></li>
                                <?php
                            }
                            ?>

                        </ul>
                    </div>
                    <div class="s-que-right">
                        <h4><?php echo $num ?>个</h4>
                        <p>问题已经被回答啦</p>
                        <a href="javascript:void(0);" onclick="wantSay()">我要提问 <img src="/cn/images/index3-img/index3-wenjian.png" alt="jian"></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="star-say">
                <div class="star-title">
                    <span>明星学员有话说/</span>
                    <b>看看学姐学长如何申请到Dream Offer</b>
                    <a href="/cn/case.html">更多</a>
                    <div class="clearfix"></div>
                </div>
                <div class="star-con">
                    <a href="javascript:void(0);" class="prev">
                        <img src="/cn/images/index3-img/index3-left-j.png" alt="箭头"/>
                    </a>
                    <a href="javascript:void(0);" class="next">
                        <img src="/cn/images/index3-img/index3-right-j.png" alt="箭头"/>
                    </a>
                    <div class="star-bd">
                        <ul>
                            <?php
                            $data = \app\modules\cn\models\Content::getClass(['fields' => 'cnName,sentenceNumber,article,problemComplement', 'category' => '281', 'page' => 1, 'pageSize' => 20]);
                            foreach ($data as $v) {
                                ?>
                                <li>
                                    <div class="user-tx"><img src="<?php echo $v['image'] ?>" alt="头像"/></div>
                                    <h4><?php echo $v['cnName'] ?></h4>
<!--                                    <h5 class="ellipsis">录取院校：--><?php //echo $v['problemComplement'] ?><!--</h5>-->
<!---->
<!--                                    <p style="height: 70px;overflow: hidden;"><span>"</span>--><?php //echo $v['originalPrice'] ?><!--<span>"</span></p>-->
<!--                                    <a href="/cn/case/281---><?php //echo $v['id'] ?><!--.html">查看详情</a>-->
                                    <div class="starInfo">
                                        <p>录取院校：<?php echo $v['problemComplement'] ?></p>
                                        <p>硬件条件：<br><?php echo $v['sentenceNumber'] ?></p>
                                        <p> 录取专业：<br><?php echo $v['article'] ?></p>
                                    </div>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="study-brand">
    <!--<h2>雷哥网留学品牌</h2>-->
    <div class="blue-bg">
        <div class="in-blue">
            <div class="b-b-left">
                <p>
                    雷哥留学是全国颇具特色的互联网一站式留学咨询服务中心，雷哥留学导师均是留学行业的精英，至今已帮助全国数万名的学员拿到了TOP30学校的offer，我们秉承“教育是良心事业”的理念，坚持将学员的申请视作自己的申请。为同学提供1V1留学背景规划、留学申请指导、文书写作、海外实习等背景提升资源、职业生涯规划等服务。
                </p>
                <p>
                    海外名校top100均有合作纽约、伦敦、香港、上海内推精品实习资源、科研项目、
                    99%的学员都通过我们的一站式留学服务 <br>
                    在1-3个月内获得了至少3封Dream offer ！
                </p>
            </div>
            <div class="b-b-right">
                <img src="/cn/images/index3-img/index3-ppmeinv.png" alt="图片"/>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="study-five">
            <ul>
                <li>
                    <img src="/cn/images/index3-img/index3-ppicon01.png" alt="图片">
                    <div class="tm sf-text">
                        <p class="stn-1">申请程序标准</p>
                        <p class="stn-2">均为海外热门院校</p>
                    </div>
                </li>
                <li>
                    <img src="/cn/images/index3-img/index3-ppicon02.png" alt="图片">
                    <div class="tm sf-text">
                        <p class="stn-1">服务流程透明</p>
                        <p class="stn-2">进度网上随时可查</p>
                    </div>
                </li>
                <li>
                    <img src="/cn/images/index3-img/index3-ppicon03.png" alt="图片">
                    <div class="tm sf-text">
                        <p class="stn-1">学校录取率高</p>
                        <p class="stn-2">99%以上成功率</p>
                    </div>
                </li>
                <li>
                    <img src="/cn/images/index3-img/index3-ppicon04.png" alt="图片">
                    <div class="tm sf-text">
                        <p class="stn-1">申请流程高效</p>
                        <p class="stn-2">1~3月即可获得offer</p>
                    </div>
                </li>
                <li>
                    <img src="/cn/images/index3-img/index3-ppicon05.png" alt="图片">
                    <div class="tm sf-text">
                        <p class="stn-1">一次性收费</p>
                        <p class="stn-2">不加收排名等其他费用</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="clearfix"></div>
</div>

<div class="answerMask">
    <div class="answerWhite">
        <form action="/cn/question/question" method="post">
            <h4>
                <img src="/cn/images/answer_wenhao.png" alt="问号图标">
                发起问题</h4>
            <input type="hidden" id="appoint" name="appointid" value="">
            <input type="text" name="question" placeholder="写下你的问题"/>
            <textarea name="contents" placeholder="问题背景、条件等详细信息"></textarea>
            <div class="btnGroup">
                <input type="button" value="取消" onclick="closeAnswer()"/>
                <input type="submit" value="提交问题"/>
            </div>
        </form>
    </div>
</div>
<!--广告弹窗-->
<div class="advertisement">
<a href="javascript:void(0);" onclick="closeAdvert()">×</a>
<div class="input-phone">
<input type="text" id="phone-m" placeholder="请输入手机号"/>
<input type="button" value="免费获取留学方案" onclick="freePhone()"/>
</div>
</div>
</body>
<script type="text/javascript" src="/cn/js/index3.js"></script>

</html>