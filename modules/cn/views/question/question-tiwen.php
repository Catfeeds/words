<?php $uid = Yii::$app->session->get('uid'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>问答提问页面</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="/cn/css/bootstrap.css"/>
    <link rel="stylesheet" href="/cn/css/newPublic.css"/>
    <link rel="stylesheet" href="/cn/css/evaluation-public.css"/>
    <link rel="stylesheet" href="/cn/css/question-public.css"/>
    <link rel="stylesheet" href="/cn/css/question-tiwen.css"/>
    <script type="text/javascript" src="/cn/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="/cn/js/jquery.SuperSlide.2.1.1.js"></script>
    <script type="text/javascript" src="/cn/js/bootstrap.js"></script>

    <script type="text/javascript" src="http://www.smartapply.cn/ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="http://www.smartapply.cn/ueditor/ueditor.all.min.js"></script>
    <!-- 编辑器公式插件 -->
    <script type="text/javascript" charset="utf-8" src="http://www.smartapply.cn/ueditor/kityformula-plugin/addKityFormulaDialog.js"></script>
    <script type="text/javascript" charset="utf-8" src="http://www.smartapply.cn/ueditor/kityformula-plugin/getKfContent.js"></script>
    <script type="text/javascript" charset="utf-8" src="http://www.smartapply.cn/ueditor/kityformula-plugin/defaultFilterFix.js"></script>

    <!-- 树形菜单选择 -->
    <link rel="stylesheet" type="text/css" href="http://www.smartapply.cn/easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="http://www.smartapply.cn/easyui/themes/icon.css">

    <script type="text/javascript" src="/cn/js/question-tiwen.js"></script>
</head>
<body>
<div class="question">
     <div class="question-in">
         <div class="que-nav">
             <ul>
                 <li>您的位置：</li>
                 <li><a href="/question-tag/0.html">首页</a></li>
                 <li>&gt;</li>
                 <li>我要提问</li>
             </ul>
         </div>
         <div class="question-in-left">

             <div class="tiwen-con">
                 <h2>
                     <img src="/cn/images/question/question-tiwen01.png" alt="标题图标"/>
                     <?php
                     if(!$adviser) {
                         ?>
                         <span>提问</span>
                         <?php
                     } else {
                         ?>
                         <b>向<span><?php echo $adviser['name'] ?>导师</span>提问：</b>
                         <?php
                     }
                     ?>
                 </h2>
                 <!--编辑器-->
                 <form action="/cn/question/sub-question" method="post" id="editer_form">
                     <div class="tiwen-title">
                         <input type="hidden" name="adviserId" value="<?php echo isset($adviser['id'])?$adviser['id']:''?>">
                         <input type="text" placeholder="标题：写下你的问题" name="question"/>
                     </div>
                     <textarea class="input-xxlarge" name="contents" rows="7" id="editor"></textarea>
                     <script>
                         var editor = UE.getEditor('editor');
                         $('.easyui-combotree').combotree({
                             onClick: function (node) {
                                 $("input[name='extend[pid]']").val(node.id);
                             }
                         })
                         function judgeType(_this){
                             var val = $(_this).val();
                             if(val == 5){
                                 $('#typeValue').show();
                             }else{
                                 $('#typeValue').hide();
                             }
                         }

                         $('.requiredValue').change(function(){
                             var val = $(this).val();
                             if(val == 1){
                                 $('#required').show();
                             }else{
                                 $('#required').hide();
                             }
                         })
                     </script>
                     <script>
                         //实例化编辑器
                         var o_ueditorupload = UE.getEditor('j_ueditorupload',
                                 {
                                     autoHeightEnabled:false
                                 });
                         o_ueditorupload.ready(function ()
                         {

                             o_ueditorupload.hide();//隐藏编辑器

                             //监听图片上传
                             o_ueditorupload.addListener('beforeInsertImage', function (t,arg)
                             {
                                 $('.imageFile').val(arg[0].src);

                             });

                             /* 文件上传监听
                              * 需要在ueditor.all.min.js文件中找到
                              * d.execCommand("insertHtml",l)
                              * 之后插入d.fireEvent('afterUpfile',b)
                              */
                             o_ueditorupload.addListener('afterUpfile', function (t, arg)

                             {

                             });
                         });

                         //弹出图片上传的对话框
                         function upImage()
                         {
                             var myImage = o_ueditorupload.getDialog("insertimage");
                             myImage.open();
                         }
                         //弹出文件上传的对话框
                         //    function upFiles()
                         //    {
                         //        var myFiles = o_ueditorupload.getDialog("attachment");
                         //        myFiles.open();
                         //    }

                     </script>
                     <script type="text/plain" id="j_ueditorupload"></script>
                      <div class="more-sort">
                          <p>
                              <img src="/cn/images/question/question-tiwen02.png" alt="图标"/>
                              <span>标签：</span>
                          </p>
                          <input type="hidden" value=" " name="tag[]" id="allSorts"/>
                          <ul>
                              <li>背景提升</li>
                          </ul>
                          <input type="button" value="修改" onclick="showEditorM()"/>
                          <div class="clearfix"></div>
                      </div>
                     <!--提交按钮-->
                     <input type="submit" value="提交问题" class="subBtn"/>
                     <div class="clearfix"></div>
                 </form>
             </div>

         </div>
         <div class="question-in-right">
             <div class="h-q-btn1">
                 <a href="/add-question.html">
                     <img src="/cn/images/index4/index4-tiwen.png" alt="图标"/>
                     我要提问</a>
             </div>
             <?php
             if(!$uid) {
                 ?>
                 <div class="h-q-btn2">
                     <a href="http://login.gmatonline.cn/cn/index?source=1&url=http://www.smartapply.cn/add-question.html">
                         <img src="/cn/images/index4/index4-huida.png" alt="图标"/>
                         我要回答</a>
                 </div>
                 <?php
             }
             ?>
             <!--向导师提问-->
             <div class="daoshi-tiwen">
                 <div class="dao-title">
                     <img src="/cn/images/question/question-teaIcon.png" alt="图标"/>
                     <span>向导师提问</span>
                     <a href="/cn/consultant">MORE</a>
                 </div>
                 <div class="dao-con">
                     <ul>
                         <?php
                         foreach($teacher as $v) {
                             ?>
                             <li>
                                 <p><?php echo $v['information']['name'] ?></p>
                                 <p>已回答<?php echo $v['num'] ?>个问题</p>
                                 <a href="/add-question.html?tid=<?php echo $v['information']['id'] ?>">向她提问</a>
                                 <div class="dao-thumb">
                                     <img src="<?php echo $v['information']['image'] ?>" alt="头像"/>
                                 </div>
                             </li>
                             <?php
                         }
                         ?>
                     </ul>
                 </div>
             </div>
             <!--热门学校-->
             <div class="hot-school">
                 <div class="dao-title">
                     <img src="/cn/images/question/question-hoticon.png" alt="图标"/>
                     &nbsp;<span>热门学校</span>
                     <a href="http://schools.smartapply.cn/schools.html">MORE</a>
                 </div>
                 <div class="hout-s-con">
                     <ul>
                         <?php
                         foreach($school as $key=>$v) {
                             if($key<4) {
                                 ?>
                                 <li>
                                     <div class="hout-s-left">
                                         <a href="http://schools.smartapply.cn/schools/<?php echo $v['id'] ?>.html"><img src="http://schools.smartapply.cn/<?php echo $v['image'] ?>" alt="学校图标"/></a>
                                         <div class="hot-box"></div>
                                     </div>
                                     <div class="hout-s-right">
                                         <h4 class="ellipsis"><a href="http://schools.smartapply.cn/schools/<?php echo $v['id'] ?>.html"><?php echo $v['name'] ?></a></h4>
                                         <p class="ellipsis"><?php echo $v['title'] ?></p>
                                         <span>查看人数：<?php echo $v['viewCount'] ?></span>
                                     </div>
                                     <div class="clearfix"></div>
                                     <div class="diff">
                                         <div class="s-c-btn01">
                                             <a href="/cn/consultant">
                                                 <b class="bg-icon01"></b>
                                                 <span>推荐导师</span>
                                             </a>
                                         </div>
                                         <div class="s-c-btn02">
                                             <a href="/cn/case.html">
                                                 <b class="bg-icon02"></b>
                                                 <span>热门案例</span>
                                             </a>
                                         </div>
                                         <div class="clearfix"></div>
                                     </div>
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

<!--编辑标签弹窗-->
<div class="editor-mask">
    <div class="in-editor">
         <div class="i-e-close" onclick="closeEditor()"></div>
         <div class="i-e-con">
             <h4>编辑标签</h4>
             <ul>
                 <?php
                 foreach($tags as $v) {
                     ?>
                     <li onclick="chooseSort(this)" data-tag="<?php echo $v['id'] ?>"><?php echo $v['name'] ?></li>
                     <?php
                 }
                 ?>
             </ul>
             <input type="button" value="取消" onclick="closeEditor()"/>
             <input type="button" value="保存" onclick="saveSort()"/>
         </div>
    </div>
</div>
</body>
</html>