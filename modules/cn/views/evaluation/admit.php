
    <link rel="stylesheet" href="/cn/css/admit.css"/>
</head>
<body>
<div class="admit">
<!--    学校录取几率弹幕-->
    <div class="index-font-slide1">
        <div class="i-f-sbd">
            <ul>
                <?php
                foreach($news as $v) {
                    ?>
                    <li>雷哥网会员 <?php echo isset($v['nickname'])?$v['nickname']:$v['userName'] ?> <?php  echo date("Y-m-d H:i:s", $v['createTime']) ; ?>-获得一份录取报告</li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
    <script type="text/javascript">
        jQuery(".index-font-slide1").slide({mainCell:".i-f-sbd ul",autoPlay:true,effect:"leftMarquee",vis:2,interTime:50,mouseOverStop:false});
    </script>
     <div class="admit-in">
         <div class="box-in">
             <form action="/admit-result.html" method="post" id="luquForm">
             <h2>学校录取测评</h2>
                 <p class="fu-title">欢迎使用雷哥网学校录取测评工具。被自己的 Dream School 录取 <br>
                     是怎样的体验？来测评下我离名校的距离还差多少。</p>
             <div class="search-lu-group">
                 <div class="search-school">
                     <span class="sea-name">院校搜索<b>*</b></span>
                     <div class="sea-input">
                         <input type="text" placeholder="请输入学校名称" oninput="showData()" id="top-schoolName" name="schoolName"/>
                         <input type="hidden" name="schoolId" class="schoolId"/>
                         <input type="hidden" name="schoolRank" class="schoolRank"/>
                         <input type="hidden" name="country" class="s_country"/>
                         <div class="search-btn" onclick="showData()">
                             <img src="/cn/images/evaluation/luqu-search.png" alt="搜索图标"/>
                         </div>
                         <div class="s-i-select">
                             <ul>

                             </ul>
                         </div>
                     </div>
                 </div>
                 <div class="search-major">
                     <span class="sea-name">专业选择<b>*</b></span>
                     <div class="s-m-select">
                         <div class="btn-group">
                             <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                 <span class="b_val" id="top-majorName"><b>请选择专业</b></span>
                                 <input type="hidden" value="" name="majorId" id="majorId"/>
                                 <input type="hidden" name="majorName" id="majorName"/>
                                 <a href="javascript:void(0);" class="rightJ-btn">
                                     <img src="/cn/images/evaluation/luqu-sanjiao.png" alt="箭头图标"/>
                                 </a>
                             </button>
                             <ul class="dropdown-menu" role="menu">

                             </ul>
                         </div>
                     </div>
                 </div>
                 <div class="clearfix"></div>
             </div>
             <h4><img src="/cn/images/evaluation/luqu-icon01.png" alt="图标"/>个人成绩</h4>
             <div class="person">
                 <ul>
                     <li>
                         <label for="gpa">GPA<b>*</b></label>
                         <input type="text" id="gpa" name="gpa"/>
                         <span style="color: grey;font-size: 12px;">例：3.0或者85</span>
                     </li>
                     <li>
                         <label for="gmat">GMAT/GRE</label>
                         <input type="text" id="gmat" name="gmat"/>
                         <span style="color: grey;font-size: 12px;">若暂未出分，可填目标分数</span>
                     </li>
<!--                     <li>-->
<!--                         <label for="gre">GRE</label>-->
<!--                         <input type="text" id="gre" name="gre"/>-->
<!--                     </li>-->
                     <li>
                         <label for="toefl">TOEFL/IELTS<b>*</b></label>
                         <input type="text" id="toefl" name="toefl"/>
                         <span style="color: grey;font-size: 12px;">若暂未出分，可填目标分数</span>
                     </li>
<!--                     <li>-->
<!--                         <label for="ielts">IELTS</label>-->
<!--                         <input type="text" id="ielts" name="ielts"/>-->
<!--                     </li>-->
                 </ul>
             </div>
             <h4><img src="/cn/images/evaluation/luqu-icon02.png" alt="图标"/>学校背景</h4>
             <div class="school">
                  <ul>
                      <li>
                          <span class="before-name">
                              目&nbsp;
                              &nbsp;&nbsp;前
                              &nbsp;&nbsp;学
                              &nbsp;&nbsp;历</span>
                          <input type="radio" name="education" id="boshi" value="博士" checked />
                          <label for="boshi">博士</label>
                          <input type="radio"  name="education" id="shuoshi" value="硕士"/>
                          <label for="shuoshi">硕士</label>
                          <input type="radio"  name="education" id="bengke" value="本科"/>
                          <label for="bengke">本科</label>
                          <input type="radio" name="education" id="zhuanke" value="专科"/>
                          <label for="zhuanke">专科</label>
                          <input type="radio"  name="education" id="gaozhong" value="高中"/>
                          <label for="gaozhong">高中</label>
                          <input type="radio"  name="education" id="chuzhong" value="初中"/>
                          <label for="chuzhong">初中</label>
                      </li>
                      <li>
                          <span class="before-name">就读/毕业学校<b>*</b></span>
                          <div class="btn-group">
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                  <span class="b_val" id="jiudu"></span>
                                  <input type="hidden" value="" name="school" class="school_value"/>
                                  <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu" role="menu">
                                  <li onclick="fuzhi(this)" data-value="1">
                                      <a href="javascript:void(0);">清北复交浙大</a>
                                  </li>
                                  <li onclick="fuzhi(this)" data-value="2">
                                      <a href="javascript:void(0);">985</a>
                                  </li>
                                  <li onclick="fuzhi(this)" data-value="3">
                                      <a href="javascript:void(0);">211</a>
                                  </li>
                                  <li onclick="fuzhi(this)" data-value="4">
                                      <a href="javascript:void(0);">非211本科</a>
                                  </li>
                                  <li onclick="fuzhi(this)" data-value="5">
                                      <a href="javascript:void(0);">专科</a>
                                  </li>
                              </ul>
                          </div>
                      </li>
                      <li>
                          <span class="before-name" style="letter-spacing: 1px">学校具体名称<b>*</b></span>
                          <input type="text" id="schoolname" style="padding-left: 10px" name="attendSchool"/>
                      </li>
                      <li>
                          <span class="before-name">专
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              业<b>*</b></span>
                          <input type="text" id="major-input" onclick="showMajorC(this)"/>
                          <input type="hidden" name="major" value="172">
<!--                          <div class="btn-group">-->
<!--                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">-->
<!--                                  <span class="b_val">商科</span>-->
<!--                                  <input type="hidden" value="172" name="major"/>-->
<!--                                  <span class="caret"></span>-->
<!--                              </button>-->
<!--                              <ul class="dropdown-menu" role="menu" style="height: 200px;overflow: auto">-->
<!--                                  --><?php
//                                  foreach($major as $v) {
//                                  ?>
<!--                                  <li onclick="fuzhi(this)" data-value="--><?php //echo $v['id'] ?><!--">-->
<!--                                      <a href="javascript:void(0);">--><?php //echo $v['name'] ?><!--</a>-->
<!--                                  </li>-->
<!--                                      --><?php
//                                  }
//                                  ?>
<!--                              </ul>-->
<!--                          </div>-->

                      </li>
                  </ul>
              </div>
<!--             <input type="button" value="提交" class="subbtn" id="subbtn" onclick="subsInfo()"/>-->
             <input type="button" value="下一步" class="subbtn" id="nextMask" onclick="showMaskN()"/>
                 <!--背景条件弹窗-->
                 <div class="back-mask">
                     <div class="in-b-disc">
                         <div class="in-b-top">
                             你是否具备以下背景条件？
                         </div>
                         <div class="in-b-bot">
                             <p class="blue">备注：请勾选以下已参加过的内容（可多选）</p>
                             <ul>
                                 <li>
                                     <div class="group_check">
                                         <input type="checkbox" value="1" name="bigFour" id="tiaojian1"/>
                                         <label for="tiaojian1"></label>
                                     </div>
                                     <label for="tiaojian1" class="font">500强/四大实习（工作）经验</label>
                                 </li>
                                 <li>
                                     <div class="group_check">
                                         <input type="checkbox" value="1" name="foreignCompany" id="tiaojian2"/>
                                         <label for="tiaojian2"></label>
                                     </div>
                                     <label for="tiaojian2" class="font">外企实习（工作）经验</label>
                                 </li>
                                 <li>
                                     <div class="group_check">
                                         <input type="checkbox" value="1" name="enterprises" id="tiaojian3"/>
                                         <label for="tiaojian3"></label>
                                     </div>
                                     <label for="tiaojian3" class="font">国企实习（工作）经验</label>
                                 </li>
                                 <li>
                                     <div class="group_check">
                                         <input type="checkbox" value="1" name="privateEnterprise" id="tiaojian4"/>
                                         <label for="tiaojian4"></label>
                                     </div>
                                     <label for="tiaojian4" class="font">私企实习（工作）经验</label>
                                 </li>
                                 <li>
                                     <div class="group_check">
                                         <input type="checkbox" value="1" name="project" id="tiaojian5"/>
                                         <label for="tiaojian5"></label>
                                     </div>
                                     <label for="tiaojian5" class="font">相关专业项目比赛经验</label>
                                 </li>
                                 <li>
                                     <div class="group_check">
                                         <input type="checkbox" value="1" name="study" id="tiaojian6"/>
                                         <label for="tiaojian6"></label>
                                     </div>
                                     <label for="tiaojian6" class="font">海外游学经验</label>
                                 </li>
                                 <li>
                                     <div class="group_check">
                                         <input type="checkbox" value="1" name="publicBenefit" id="tiaojian7"/>
                                         <label for="tiaojian7"></label>
                                     </div>
                                     <label for="tiaojian7" class="font">公益活动</label>
                                 </li>
                                 <li>
                                     <div class="group_check">
                                         <input type="checkbox" value="1" name="awards" id="tiaojian8"/>
                                         <label for="tiaojian8"></label>
                                     </div>
                                     <label for="tiaojian8" class="font">获奖经历</label>
                                 </li>
                             </ul>
                             <input type="button" value="提交" class="new-sub" onclick="subsInfo()"/>
                         </div>
                     </div>
                 </div>
             </form>
         </div>
     </div>
</div>
<!--专业显示遮罩层-->
<div class="t-major-mask">
    <div class="t-m-in">
        <div class="t-m-close" onclick="closeMajorC()">×</div>
        <div class="first_page">
            <h4>学科类别</h4>
            <ul class="first-ul">
                <?php
                foreach($major as $v) {
                    ?>
                    <li>
                        <span><?php echo $v['name'] ?></span>
                        <div class="second_page">
                            <ul>
                                <?php
                                foreach($v['child'] as $va) {
                                    ?>
                                    <li data-pid="<?php echo $va['name'] ?>"><?php echo $va['name'] ?></li>
                                    <?php
                                }
                                ?>
                                <li>林业</li>
                            </ul>
                        </div>
                    </li>
                    <?php
                }
                ?>
            </ul>
            <div class="t-m-btn">
                <input type="button" value="确定" onclick="sureMajor()"/>
            </div>
        </div>

    </div>
</div>
<input type="hidden" value="<?php echo $sign?>" id="sign"/>

</body>
<script type="text/javascript">
    $(function(){
//        判断是否登录
        var numS=$("#sign").val();
        if(numS!=1){
            alert("请登录");
            userLogin();
        }
        //专业选择
        $(".t-major-mask").css("height",$(document).height());
        $(".second_page ul li").click(function(){
            $(this).addClass("on").siblings("li").removeClass("on");
            $(this).parents("li").addClass("on").siblings("li").removeClass("on").find("li").removeClass("on");
        });
//        背景条件弹窗遮罩层高度
        $(".back-mask").css("height",$(document).height());
    });
//    下拉之后赋值
    function  fuzhi(o){
        var newVal=$(o).find("a").html();
        var majorId=$(o).attr("data-id");
        var s_value=$(o).attr("data-value");
        $(o).parents("ul").siblings("button").find(".b_val").html(newVal);
        $(o).parents("ul").siblings("button").find("input.school_value").val(s_value);
        $(o).parents("ul").siblings("button").find("input#majorId").val(majorId);
        $(o).parents("ul").siblings("button").find("input#majorName").val(newVal);
    }
//    提交表单
    function subsInfo(){
        var num=$(".in-b-bot ul li input:checked").length;
        if(num){
            $("#luquForm").submit();
        }
    }
//    显示专业弹窗
    function showMajorC(o){
        $(".t-major-mask").show();
    }
//    关闭专业弹窗
    function closeMajorC(){
        $(".t-major-mask").hide();
    }
//    保存选择的专业类别
    function sureMajor(){
        var h=$(".second_page ul li.on").html();
        var pid=$(".second_page ul li.on").attr("data-pid");
        $(".t-major-mask").hide();
        $("#major-input").val(h).siblings("input[type='hidden']").val(pid);
    }
//    院校搜索显示搜索的数据（下拉框）
    function showData(){
        var v=$("#top-schoolName").val();
        if(v){
            $(".s-i-select").find("ul").html("");
            $.ajax({
                url:"http://test.school.gmatonline.cn/cn/api/words-school",
                type:"get",
                data:{
                    keywords:v
                },
                dataType:"json",
                jsonp: "callback",//传递给请求处理程序或页面的，用以获得jsonp回调函数名的参数名(默认为:callback)
                jsonpCallback: "success_jsonpCallback",//自定义的jsonp回调函数名称，默认为jQuery自动生成的随机函数名
                success:function(data){
                    var str='';
                   if(data.code==1){
                       if(data.data){
                           for(var i=0;i<data.data.length;i++){
                               str+='<li onclick="schoolFuZhi(this)" data-id="'+data.data[i].id+'"' +
                                   ' data-rank="'+data.data[i].rank+'"' +
                                   'data-country="'+data.data[i].country+'"><b>'+data.data[i].name+'</b><span>('+data.data[i].title+')</span></li>';
                           }
                           $(".s-i-select").find("ul").html(str);
                           $(".s-i-select").slideDown();
                           return false;
                       }
                   }
                }
            });

        }else{
            $(".s-i-select").slideUp();
        }
    }
//    院校搜索下拉框赋值
    function schoolFuZhi(o){
        var newV=$(o).find("b").html();
        $(o).parents(".s-i-select").hide().siblings("input").val(newV).attr("data-lid",$(o).attr("data-id"))
            .siblings("input.schoolId").val($(o).attr("data-id"))
            .end().siblings("input.schoolRank").val($(o).attr("data-rank"))
            .end().siblings("input.s_country").val($(o).attr("data-country"));
        searchMajor($(o).attr("data-id"));
    }
//    搜索专业
    function searchMajor(id){
        $(".search-major").find(".dropdown-menu").html("");
        $.ajax({
            url:"http://test.school.gmatonline.cn/cn/api/id-major",
            type:"get",
            data:{
                id:id
            },
            dataType:"json",
            jsonp: "callback",//传递给请求处理程序或页面的，用以获得jsonp回调函数名的参数名(默认为:callback)
            jsonpCallback: "success_jsonpCallback",//自定义的jsonp回调函数名称，默认为jQuery自动生成的随机函数名
            success:function(data){
                var str='';
                if(data){
                    for(var i=0;i<data.length;i++){
                        str+='<li onclick="fuzhi(this)" data-id="'+data[i].id+'">'+
                            '<a href="javascript:void(0);">'+data[i].name+'</a>'+
                            '</li>';
                    }
                    $(".search-major").show().find(".dropdown-menu").html(str);
                }
            }
        });
    }
//    下一步
    function showMaskN(){
        var bitian1=$("#jiudu").html();
        var bitian2=$("#schoolname").val();
        var bitian3=$("#major-input").val();
        var gpa=$("#gpa").val();
        var gmat=$("#gmat").val();
//        var gre=$("#gre").val();
        var toefl=$("#toefl").val();
//        var ielts=$("#ielts").val();
        var topSname=$("#top-schoolName").val();
        var topMname=$("#top-majorName").html();
        //if(!gpa || !gmat || !gre || !toefl || !ielts){
        //    alert("请注意必填项！");
        //    return false;
        //}
        if(!topSname){
            alert("院校搜索为必选项！");
            return false;
        }
        if(!topMname || topMname=='<b>请选择专业</b>'){
            alert("专业选择为必选项！");
            return false;
        }
        if(gpa){
//            if(!(gpa>=2.5) || !(gpa<=4)){
//                alert("gpa数值填写范围为2.5-4.0！");
//                return false;
//            }
            if (isNaN(gpa)) {
                alert("请输入正确的科目分数！");
                return false;
            }
            if((gpa<2.5) || (gpa>100) || ((gpa>4)&&(gpa<50))){
                alert("gpa数值填写范围为2.5-4.0或者50-100！");
                return false;
            }
        }else{
            alert("GPA为必填项！");
            return false;
        }
        if(gmat){
            if (isNaN(gmat)) {
                alert("请输入正确的科目分数！");
                return false;
            }
            if((gmat<200)){
                alert("gre数值填写范围为200-340，gmat数值填写范围为400-800");
                return false;
            }
            if((gmat>340)&&(gmat<400)){
                alert("gre数值填写范围为200-340，gmat数值填写范围为400-800");
                return false;
            }
            if((gmat>800)){
                alert("gre数值填写范围为200-340，gmat数值填写范围为400-800");
                return false;
            }
        }
//        if(gre){
//            if(!(gre>=200) || !(gre<=340)){
//                alert("gre数值填写范围为200-340！");
//                return false;
//            }
//        }
        if(toefl){
            if (isNaN(toefl)) {
                alert("请输入正确的科目分数！");
                return false;
            }
            if((toefl<5)){
                alert("toefl数值填写范围为60-120！,ielts数值填写范围为5.0-9.0！");
                return false;
            }
            if((toefl>120)){
                alert("toefl数值填写范围为60-120！,ielts数值填写范围为5.0-9.0！");
                return false;
            }
            if((toefl<60) && (toefl>9)){
                alert("toefl数值填写范围为60-120！,ielts数值填写范围为5.0-9.0！");
                return false;
            }
        }else{
            alert("TOEFL/IELTS为必填项！");
            return false;
        }
//        if(ielts){
//            if(!(ielts>=5) || !(ielts<=9)){
//                alert("ielts数值填写范围为5.0-9.0！");
//                return false;
//            }
//        }

        if(!bitian1){
            alert("就读/毕业学校为必填项！");
            return false;
        }
        if(!bitian2){
            alert("学校具体名称为必填项！");
            return false;
        }
        if(!bitian3){
            alert("专业为必填项！");
            return false;
        }
        $(".back-mask").show("side");
    }
</script>
