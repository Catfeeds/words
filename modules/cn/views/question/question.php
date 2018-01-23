<?php $uid = Yii::$app->session->get('uid'); ?>
    <link rel="stylesheet" href="/cn/css/question-public.css"/>
    <link rel="stylesheet" href="/cn/css/question.css"/>
    <script type="text/javascript" src="/cn/js/question.js"></script>
</head>
<body>
<input type="hidden" value="<?php echo $_GET['tag']?>" id="tagCom"/>
<div class="question">
     <div class="question-in">
         <div class="question-in-left">
             <div class="question-sort">
                  <h4>分类</h4>
                 <ul>
                     <li <?php if(!isset($_GET['tag']) || $_GET['tag']==0){ ?>class="on" <?php } ?> ><a href="/question-tag/0.html">全部</a></li>
                     <?php
                     $tag = \app\modules\user\models\Tag::find()->asArray()->all();
                     foreach($tag as $v) {
                         ?>
                         <li <?php if(isset($_GET['tag']) && $_GET['tag']==$v['id']){ ?>class="on" <?php } ?> ><a href="/question-tag/<?php echo $v['id']?>.html"><?php echo $v['name'] ?></a></li>
                         <?php
                     }
                     ?>
                 </ul>
             </div>
             <div class="question-con">
                 <div class="question-c-nav">
                     <ul>
                         <li><a href="javascript:void(0);">最新</a></li>
                         <li><a href="javascript:void(0);">推荐</a></li>
                         <li><a href="javascript:void(0);">全部</a></li>
                         <li><a href="javascript:void(0);">我的回答</a></li>
                     </ul>
                 </div>
                 <div class="question-c-con">
                     <ul id="ul_new">
                         <?php
                         foreach($newest['data'] as $v) {
                             ?>
                             <li>
                                 <div class="q-c-left">
                                     <div class="q-c-l-thumb">
                                         <img src="<?php echo isset($v['image'])?$v['image']:'/cn/images/question/question-head.png' ?>" alt="头像"/>
                                     </div>
                                     <p class="ellipsis"><?php echo $v['nickname'] ?></p>
                                 </div>
                                 <div class="q-c-right">
                                     <div class="question-info">
                                         <h4 class="ellipsis">
                                             <img src="/cn/images/question/question-wen.png" alt="问图标"/>
                                             <a href="/question-detail/<?php echo $v['id'] ?>.html"> <?php echo $v['question'] ?></a>
                                         </h4>
                                         <p class="ellipsis"><?php echo $v['content'] ?></p>
                                         <span class="l-span"><?php echo $v['addTime'] ?></span>
                                     <span
                                         class="r-span">关注度：<?php echo $v['browse'] ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo count($v['answer'])?>人回答&nbsp;&nbsp;|&nbsp;&nbsp;<a
                                             href="/question-detail/<?php echo $v['id'] ?>.html">我要回答</a></span>
                                         <div class="clearfix"></div>
                                         <div class="right-sort">
                                             <ul>
                                                 <?php
                                                 foreach($v['tags'] as $va) {
                                                     ?>
                                                     <li><?php echo $va['name'] ?></li>
                                                     <?php
                                                 }
                                                 ?>
                                             </ul>
                                         </div>
                                     </div>
                                     <?php if(!empty($v['answer'])) { ?>
                                         <div class="answer-con">
                                             <ul>
                                                 <li>
                                                     <div class="answer-c-left">
                                                         <div class="answer-thumb">
                                                             <img
                                                                 src="<?php echo isset($v['answer'][0]['image']) ? $v['answer'][0]['image'] : '/cn/images/question/question-head02.png' ?>"
                                                                 alt="头像"/>
                                                         </div>
                                                         <p class="ellipsis"><?php echo isset($v['answer'][0]['nickname']) ? $v['answer'][0]['nickname'] : '' ?></p>
                                                     </div>
                                                     <div class="answer-c-right">
                                                         <p class="ellipsis">
                                                             <img src="/cn/images/question/question-da.png" alt="答图标"/>
                                                             <?php echo strip_tags(isset($v['answer'][0]['content']) ? $v['answer'][0]['content'] : '') ?>
                                                         </p>
                                                         <span class="l-time">回答时间：<?php echo $v['answer'][0]['addTime'] ?></span>
                                                 <span class="r-time">
                                                    <a href="/question-detail/<?php echo $v['id'] ?>.html">
                                                        <img src="/cn/images/question/question-pinglun.png" alt="评论图标"/>
                                                        <b class="blue">评论</b>
                                                        <span>（<?php echo \app\modules\user\models\QuestionContent::find()->where("pId={$v['answer'][0]['id']}")->count(); ?>
                                                            ）</span>
                                                    </a>&nbsp;&nbsp;&nbsp;&nbsp;
                                                     <a href="/question-detail/<?php echo $v['id'] ?>.html">
                                                         <img src="/cn/images/question/question-zan.png" alt="点赞图标"/>
                                                         <b class="green">赞同</b>
                                                         <span>（<?php echo isset($v['answer'][0]['praise']) ? $v['answer'][0]['praise'] : '0' ?>
                                                             ）</span>
                                                     </a>
                                                 </span>
                                                     </div>
                                                     <div class="clearfix"></div>
                                                 </li>
                                             </ul>
                                         </div>
                                         <?php
                                     }
                                     ?>
                                 </div>
                                 <div class="clearfix"></div>
                             </li>
                             <!--分页-->
                             <?php
                         }
                         ?>
                         <div class="rank-page page01">
                             <ul>
                                 <?php echo $newest['pageStr']?>
                             </ul>
                             <input type="hidden" value="<?php echo $newest['totalPage']?>" class="totalPage"/>
                         </div>
                     </ul>
                     <ul id="ul_new02">
                         <?php
                         foreach($recommend['data'] as $v) {
                             ?>
                             <li>
                                 <div class="q-c-left">
                                     <div class="q-c-l-thumb">
                                         <img src="<?php echo isset($v['image'])?$v['image']:'/cn/images/question/question-head.png' ?>" alt="头像"/>
                                     </div>
                                     <p class="ellipsis"><?php echo $v['nickname'] ?></p>
                                 </div>
                                 <div class="q-c-right">
                                     <div class="question-info">
                                         <h4 class="ellipsis">
                                             <img src="/cn/images/question/question-wen.png" alt="问图标"/>
                                             <a href="/question-detail/<?php echo $v['id'] ?>.html"><?php echo $v['question'] ?></a>
                                         </h4>
                                         <p class="ellipsis"><?php echo $v['content'] ?></p>
                                         <span class="l-span"><?php echo $v['addTime'] ?></span>
                                     <span
                                         class="r-span">关注度：<?php echo $v['browse'] ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo count($v['answer'])?>人回答&nbsp;&nbsp;|&nbsp;&nbsp;<a
                                             href="/question-detail/<?php echo $v['id'] ?>.html">我要回答</a></span>
                                         <div class="clearfix"></div>
                                         <div class="right-sort">
                                             <ul>
                                                 <?php
                                                 foreach($v['tags'] as $va) {
                                                     ?>
                                                     <li><?php echo $va['name'] ?></li>
                                                     <?php
                                                 }
                                                 ?>
                                             </ul>
                                         </div>
                                     </div>
                                     <?php if(!empty($v['answer'])) { ?>
                                         <div class="answer-con">
                                             <ul>
                                                 <li>
                                                     <div class="answer-c-left">
                                                         <div class="answer-thumb">
                                                             <img
                                                                 src="<?php echo isset($v['answer'][0]['image']) ? $v['answer'][0]['image'] : '/cn/images/question/question-head02.png' ?>"
                                                                 alt="头像"/>
                                                         </div>
                                                         <p class="ellipsis"><?php echo isset($v['answer'][0]['nickname']) ? $v['answer'][0]['nickname'] : '' ?></p>
                                                     </div>
                                                     <div class="answer-c-right">
                                                         <p class="ellipsis">
                                                             <img src="/cn/images/question/question-da.png" alt="答图标"/>
                                                             <?php echo strip_tags(isset($v['answer'][0]['content']) ? $v['answer'][0]['content'] : '') ?>
                                                         </p>
                                                         <span class="l-time">回答时间<?php echo $v['answer'][0]['addTime']?></span>
                                                     <span class="r-time">
                                                             <a href="/question-detail/<?php echo $v['id'] ?>.html">
                                                                 <img src="/cn/images/question/question-pinglun.png" alt="评论图标"/>
                                                                 <b class="blue">评论</b>
                                                                 <span>（<?php echo \app\modules\user\models\QuestionContent::find()->where("pId={$v['answer'][0]['id']}")->count(); ?>
                                                                     ）</span>
                                                             </a>&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <a href="/question-detail/<?php echo $v['id'] ?>.html">
                                                                 <img src="/cn/images/question/question-zan.png" alt="点赞图标"/>
                                                                 <b class="green">赞同</b>
                                                                 <span>（<?php echo isset($v['answer'][0]['praise']) ? $v['answer'][0]['praise'] : '0' ?>
                                                                     ）</span>
                                                            </a>
                                                     </span>
                                                     </div>
                                                     <div class="clearfix"></div>
                                                 </li>
                                             </ul>
                                         </div>
                                         <?php
                                     }
                                     ?>
                                 </div>
                                 <div class="clearfix"></div>
                             </li>
                             <!--分页-->
                             <?php
                         }
                         ?>
                         <div class="rank-page page02">
                             <ul>
                                 <?php echo $recommend['pageStr']?>
                             </ul>
                             <input type="hidden" value="<?php echo $newest['totalPage']?>" class="totalPage"/>
                         </div>
                     </ul>
                     <ul id="ul_new03">
                         <?php
                         foreach($whole['data'] as $v) {
                             ?>
                             <li>
                                 <div class="q-c-left">
                                     <div class="q-c-l-thumb">
                                         <img src="<?php echo isset($v['image'])?$v['image']:'/cn/images/question/question-head.png' ?>" alt="头像"/>
                                     </div>
                                     <p class="ellipsis"><?php echo $v['nickname'] ?></p>
                                 </div>
                                 <div class="q-c-right">
                                     <div class="question-info">
                                         <h4 class="ellipsis">
                                             <img src="/cn/images/question/question-wen.png" alt="问图标"/>
                                             <a href="/question-detail/<?php echo $v['id'] ?>.html"><?php echo $v['question'] ?></a>
                                         </h4>
                                         <p class="ellipsis"><?php echo $v['content'] ?></p>
                                         <span class="l-span"><?php echo $v['addTime'] ?></span>
                                     <span
                                         class="r-span">关注度：<?php echo $v['browse'] ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo count($v['answer'])?>人回答&nbsp;&nbsp;|&nbsp;&nbsp;<a
                                             href="/question-detail/<?php echo $v['id'] ?>.html">我要回答</a></span>
                                         <div class="clearfix"></div>
                                         <div class="right-sort">
                                             <ul>
                                                 <?php
                                                 foreach($v['tags'] as $va) {
                                                     ?>
                                                     <li><?php echo $va['name'] ?></li>
                                                     <?php
                                                 }
                                                 ?>
                                             </ul>
                                         </div>
                                     </div>
                                     <?php if(!empty($v['answer'])) { ?>
                                         <div class="answer-con">
                                             <ul>
                                                 <li>
                                                     <div class="answer-c-left">
                                                         <div class="answer-thumb">
                                                             <img
                                                                 src="<?php echo isset($v['answer'][0]['image']) ? $v['answer'][0]['image'] : '/cn/images/question/question-head02.png' ?>"
                                                                 alt="头像"/>
                                                         </div>
                                                         <p class="ellipsis"><?php echo isset($v['answer'][0]['nickname']) ? $v['answer'][0]['nickname'] : '' ?></p>
                                                     </div>
                                                     <div class="answer-c-right">
                                                         <p class="ellipsis">
                                                             <img src="/cn/images/question/question-da.png" alt="答图标"/>
                                                             <?php echo strip_tags(isset($v['answer'][0]['content']) ? $v['answer'][0]['content'] : '') ?>
                                                         </p>
                                                         <span class="l-time">回答时间：<?php echo $v['answer'][0]['addTime']?></span>
                                                     <span class="r-time">
                                                         <a href="/question-detail/<?php echo $v['id'] ?>.html">
                                                             <img src="/cn/images/question/question-pinglun.png" alt="评论图标"/>
                                                             <b class="blue">评论</b>
                                                             <span>（<?php echo \app\modules\user\models\QuestionContent::find()->where("pId={$v['answer'][0]['id']}")->count(); ?>
                                                                 ）</span>
                                                         </a>&nbsp;&nbsp;&nbsp;&nbsp;
                                                          <a href="/question-detail/<?php echo $v['id'] ?>.html">
                                                             <img src="/cn/images/question/question-zan.png" alt="点赞图标"/>
                                                             <b class="green">赞同</b>
                                                             <span>（<?php echo isset($v['answer'][0]['praise']) ? $v['answer'][0]['praise'] : '0' ?>
                                                                 ）</span>
                                                           </a>
                                                     </span>
                                                     </div>
                                                     <div class="clearfix"></div>
                                                 </li>
                                             </ul>
                                         </div>
                                         <?php
                                     }
                                     ?>
                                 </div>
                                 <div class="clearfix"></div>
                             </li>
                             <!--分页-->
                             <?php
                         }
                         ?>
                         <div class="rank-page page03">
                             <ul>
                                 <?php echo $whole['pageStr']?>
                             </ul>
                             <input type="hidden" value="<?php echo $newest['totalPage']?>" class="totalPage"/>
                         </div>
                     </ul>
                     <ul>
                         <li>
                             <div class="question-c-answer">
                                 <ul>
                                     <?php
                                     foreach($myAnswer as $v) {
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
                                                 <span class="gray"><?php echo $v['countAnswer'] ?>人回答</span>
                                                 <b>|</b>
                                                 <span class="gray"><?php echo $v['addTime'] ?></span>
                                             </span>
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
             <script type="text/javascript">
                 jQuery(".question-con").slide({titCell:".question-c-nav li",mainCell:".question-c-con",trigger:"click",prevCell:".prevNew",nextCell:".nextNew"});
             </script>
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
                     <a href="http://login.gmatonline.cn/cn/index?source=1&url=http://www.smartapply.cn/question-tag/<?php echo $_GET['tag'] ?>.html">
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
                             if($key<6) {
                                 ?>
                                 <li>
                                     <div class="hout-s-left">
                                         <a href="http://schools.smartapply.cn/schools/<?php echo $v['id'] ?>.html"><img
                                                 src="http://schools.smartapply.cn/<?php echo $v['image'] ?>"
                                                 alt="学校图标"/></a>
                                         <div class="hot-box"></div>
                                     </div>
                                     <div class="hout-s-right">
                                         <h4 class="ellipsis"><a
                                                 href="http://schools.smartapply.cn/schools/<?php echo $v['id'] ?>.html"><?php echo $v['name'] ?></a>
                                         </h4>
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
