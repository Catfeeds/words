<?php $uid = Yii::$app->session->get('uid'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>问答详情页</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="/cn/css/bootstrap.css"/>
    <link rel="stylesheet" href="/cn/css/newPublic.css"/>
    <link rel="stylesheet" href="/cn/css/evaluation-public.css"/>
    <link rel="stylesheet" href="/cn/css/question-public.css"/>
    <link rel="stylesheet" href="/cn/css/question-details.css"/>
    <script type="text/javascript" src="/cn/js/jquery-1.9.1.min.js"></script>
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

    <script type="text/javascript" src="/cn/js/question-details.js"></script>
</head>
<body>
<div class="question">
    <div class="question-in">
        <div class="que-nav">
            <ul>
                <li>您的位置：</li>
                <li><a href="/question-tag/0.html">首页</a></li>
                <li>&gt;</li>
                <li>我要回答</li>
            </ul>
        </div>
        <div class="question-in-left">
             <div class="question-details">
                 <div class="small-sort">
                     <ul>
                         <?php
                         foreach($question['tags'] as $v) {
                             ?>
                             <li><?php echo $v['name'] ?></li>
                             <?php
                         }
                         ?>
                     </ul>
                 </div>
                 <div class="question-info">
                     <h4><?php echo $question['question'] ?> </h4>
                     <p>
                         <?php echo $question['content'] ?>
                     </p>
                     <div class="q-info-left">
                         <img src="<?php echo isset($question['image'])?$question['image']:'/cn/images/question/question-head.png' ?>" alt="头像"/>
                     </div>
                     <div class="q-info-left2">
                         <span><?php echo $question['nickname'] ?></span>
                         <b>于<?php echo $question['addTime'] ?>提问&nbsp;&nbsp;|&nbsp;&nbsp;
                         关注度：<?php echo $question['follow'] ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo count($answer)?>人回答</b>
                     </div>
                     <div class="q-info-right" onclick="showEditor()">
                         <span>我要回答</span>
                         <img src="/cn/images/question/question-xiala.png" alt="下拉箭头"/>
                     </div>
                     <div class="clearfix"></div>
                     <!--编辑器-->
                     <form action="#" method="post" id="editer_form">
                         <input type="hidden" name="questionId" value="<?php echo $question['id'] ?>" id="quesId">
                         <input type="hidden" name="questionUid" value="<?php echo $question['userId'] ?>" id="quesUid">
                         <input type="hidden" name="type" value="2">
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
                         <!--提交按钮-->
                         <input type="button" value="提交回答" class="subBtn" onclick="subAnswer()"/>
                         <div class="clearfix"></div>
                     </form>
                 </div>
                 <!--回答内容-->
                 <div class="answer-con" id="answerPos">
                     <h4><span id="answerNum"><?php echo count($answer) ?></span>条回答</h4>
                     <ul>
                         <?php
                         foreach($answer as $v) {
                             ?>
                             <li data-id="<?php echo $v['id']?>">
                                 <div class="answer-c-left">
                                 <?php
                                 if(empty($v['adviser'])) {
                                     ?>
                                     <div class="answer-u-thumb">
                                         <img
                                             src="<?php echo isset($v['image']) ? $v['image'] : '/cn/images/question/question-head02.png' ?>"
                                             alt="头像">
                                     </div>
                                     <p class="ellipsis"><?php echo $v['nickname'] ?></p>
                                     <?php
                                 } else {
                                     ?>
                                     <div class="answer-u-thumb">
                                         <img
                                             src="<?php echo isset($v['adviser']['image']) ? $v['adviser']['image'] : '/cn/images/question/question-head02.png' ?>"
                                             alt="头像">
                                     </div>
                                     <p class="ellipsis"><?php echo $v['adviser']['name'] ?></p>
                                     <?php
                                 }
                                 ?>
                                 </div>
                                 <div class="answer-c-right">
                                     <div class="a-c-r-top">
                                         <p>
                                             <?php echo $v['content'] ?>
                                         </p>
                                         <span class="l-time">回答时间：<?php echo $v['addTime'] ?></span>
                                     <span class="r-time">
                                         <span onclick="commentAnswer(this)">
                                             <img src="/cn/images/question/question-pinglun.png" alt="评论图标">
                                              <b class="blue">评论</b>
                                              <span>（<span class="compNum"><?php echo count($v['reply']) ?></span>）</span>&nbsp;&nbsp;&nbsp;&nbsp;
                                         </span>
                                         <span onclick="zanTong(this)" data-conId="<?php echo $v['id']?>">
                                             <img src="/cn/images/question/question-zan.png" alt="点赞图标">
                                             <b class="green">赞同</b>
                                             <span>（<span class="zanNum"><?php echo $v['praise'] ?></span>）</span>
                                         </span>
                                     </span>
                                     </div>
                                     <!--回答里面的评论-->
                                     <div class="a-c-r-bot">
                                         <ul>
                                             <?php
                                             foreach($v['reply'] as $va) {
                                                 ?>
                                                 <li>
                                                     <div class="bot-last-left">
                                                         <img src="<?php echo !empty($va['image'])?$va['image']:'/cn/images/question/question-head02.png' ?>" alt="头像">
                                                     </div>
                                                     <div class="bot-last-right">
                                                         <span class="name"><?php echo $va['nickname']?></span>
                                                         <b style="margin-left: 0">回复</b>
                                                         <span><?php echo !empty($va['replyUser'])?$va['replyUser']:$v['nickname'] ?></span>
                                                         <b><?php echo $va['addTime']?></b>
                                                         <p><?php echo $va['content']?>
                                                             <span class="in-reply-btn" onclick="replySecond(this,1,<?php echo $va['userId']?>)">回复</span>
                                                         </p>
<!--                                                         <ul>-->
<!--                                                             <li>-->
<!--                                                                 <span class="name">用户名2</span>-->
<!--                                                                 <b style="margin-left: 0">回复</b>-->
<!--                                                                 <span>用户名：</span>-->
<!--                                                                 <span>老师会根据学生提供给的信息为学生设计非常有感染力的PS首段</span>-->
<!--                                                                 <b>2017.6.28 14:20</b>-->
<!--                                                                 <span class="in-reply-btn" onclick="replySecond(this,2)">回复</span>-->
<!--                                                             </li>-->
<!--                                                         </ul>-->
                                                     </div>
                                                     <div class="clearfix"></div>
                                                 </li>
                                                 <?php
                                             }
                                             ?>
                                         </ul>
                                         <span class="in-reply-btn total-reply" onclick="replySecond(this,3)">总回复</span>
                                         <input type="hidden" class="replyUser" value="<?php echo isset($v['adviser']['name'])?$v['adviser']['name']:$v['nickname'] ?>">
                                         <input type="hidden" class="replyUid" value="<?php echo $v['userId'] ?>">
                                         <textarea placeholder="请写下你的评价..."></textarea>
                                         <input type="submit" value="提交评价" class="subBtn" onclick="putInComment(this)"/>
                                     </div>
                                 </div>
                                 <div class="clearfix"></div>
                             </li>
                             <?php
                         }
                         ?>
                     </ul>
                 </div>
             </div>
            <!--其他类似问题-->
            <div class="other-question">
                <h4>
                    <img src="/cn/images/question/question-titleIcon01.png" alt="标题图标"/>
                    其他类似问题
                </h4>
                <ul>
                    <?php
                    foreach($relevantQuestion as $v) {
                        ?>
                        <li>
                            <a href="/question-detail/<?php echo $v['id'] ?>.html" class="ellipsis"><?php echo $v['question'] ?></a>
                            <?php
                            foreach($v['tags'] as $va) {
                                ?>
                                <span class="blue-sort"><?php echo $va['name'] ?></span>
                                <?php
                            }
                            ?>
                         <span class="right-info">
                             <span onclick="zanTong(this)" data-conId="<?php echo $va['id']?>" style="cursor: pointer">
                                 <img src="/cn/images/question/question-zan.png" alt="点赞图标">
                                 <span class="green">赞同 <b>(<span class="zanNum"><?php echo $v['praise'] ?></span>)</b></span>
                             </span>
                             <span class="gray"><?php echo $v['addTime'] ?></span>
                         </span>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
                <h4 class="mt">
                    <img src="/cn/images/question/question-titleIcon02.png" alt="标题图标"/>
                    等你来回答
                </h4>
                <ul>
                    <?php
                    foreach($unanswered as $v) {
                        ?>
                        <li>
                            <a href="/question-detail/<?php echo $v['id'] ?>.html" class="ellipsis"><?php echo $v['question'] ?></a>
                         <span class="right-info">
                             <span class="gray">0人回答</span>
                             <span class="gray"><?php echo $v['addTime'] ?></span>
                         </span>
                        </li>
                        <?php
                    }
                    ?>
<!--                    <li>-->
<!--                        <a href="#" class="ellipsis">我的条件能申请美国什么样的学校？</a>-->
<!--                         <span class="right-info">-->
<!--                             <span class="gray">0人回答</span>-->
<!--                             <span class="gray">2017.7.5</span>-->
<!--                         </span>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#" class="ellipsis">我的条件能申请美国什么样的学校？</a>-->
<!--                         <span class="right-info">-->
<!--                             <span class="gray">0人回答</span>-->
<!--                             <span class="gray">2017.7.5</span>-->
<!--                         </span>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#" class="ellipsis">我的条件能申请美国什么样的学校？</a>-->
<!--                         <span class="right-info">-->
<!--                             <span class="gray">0人回答</span>-->
<!--                             <span class="gray">2017.7.5</span>-->
<!--                         </span>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#" class="ellipsis">我的条件能申请美国什么样的学校？</a>-->
<!--                         <span class="right-info">-->
<!--                             <span class="gray">0人回答</span>-->
<!--                             <span class="gray">2017.7.5</span>-->
<!--                         </span>-->
<!--                    </li>-->
                </ul>
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
                    <a href="http://login.gmatonline.cn/cn/index?source=1&url=http://www.smartapply.cn/question-detail/<?php echo $_GET['id'] ?>.html">
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
                                <a href="/add-question.html?tid=<?php echo $v['information']['id'] ?>" target="_blank">向她提问</a>
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
</body>
</html>