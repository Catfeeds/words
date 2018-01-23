<link rel="stylesheet" href="/cn/css/major.css"/>
<script type="text/javascript" src="/cn/js/major.js"></script>
<div class="major-con">
    <div class="organ-two-nav">
        <ul>
            <li>
                <a href="javascript:void(0);" onclick="returnIndex()">专业解析首页</a>
            </li>
            <li>&gt;</li>
            <li>
                <a href="javascript:void(0)"><?php echo $data['name'] ?></a>
            </li>
        </ul>
    </div>
    <div class="major-left">
         <div class="major-public">
             <h2><?php echo $data['name'] ?></h2>
             <p>(<?php echo $data['title'] ?>)</p>
             <h4>专业详情</h4>
             <div class="m-details">
                 <table border="1" bordercolor="#cccccc">
                     <?php
                     if($data['answer']) {
                         ?>
                         <tr>
                             <td>开设学位</td>
                             <td><?php echo $data['answer'] ?></td>
                         </tr>
                         <?php
                     }
                     ?>
                     <?php
                     if($data['alternatives']) {
                         ?>
                         <tr>
                             <td>就业方向</td>
                             <td><?php echo $data['alternatives'] ?></td>
                         </tr>
                         <?php
                     }
                     ?>
                     <?php
                     if($data['article']) {
                         ?>
                         <tr>
                             <td>从事职业</td>
                             <td><?php echo $data['article'] ?></td>
                         </tr>
                         <?php
                     }
                     ?>
                     <?php
                     if($data['listeningFile']) {
                         ?>
                         <tr>
                             <td>相关证书</td>
                             <td><?php echo $data['listeningFile'] ?></td>
                         </tr>
                         <?php
                     }
                     ?>
                     <?php
                     if($data['cnName']) {
                         ?>
                         <tr>
                             <td>相关排名</td>
                             <td><?php echo $data['cnName'] ?></td>
                         </tr>
                         <?php
                     }
                     ?>
                 </table>
             </div>
             <h4>专业解释</h4>
             <div class="common-font">
                 <p><?php echo $data['numbering'] ?></p>
             </div>
             <h4>适合申请人背景</h4>
             <div class="common-font">
                 <p><?php echo $data['sentenceNumber'] ?></p>
             </div>
             <h4>相关院校</h4>
             <div class="relate-school">
                 <ul>
                     <?php
                     $school = explode(',',$data['duration']);
                     foreach($school as $key=>$v) {
                         if ($key < 1) {
                             ?>
                             <li>
                                 <a href="#"><?php echo $v ?></a>
                                 <img src="/cn/images/major-hot.png" alt="hot图标"/>
                             </li>
                             <?php
                         } else {
                             ?>
                             <li>
                                 <a href="#"><?php echo $v ?></a>
                             </li>
                             <?php
                         }
                     }
                     ?>
                 </ul>
             </div>
             <h4>专业开设课程及课程方向</h4>
             <div class="common-font">
                 <div class="course-title">
                     <span>课程方向</span>
                 </div>
                 <p><?php echo $data['problemComplement'] ?></p>
                 <div class="course-title mt">
                     <span>专业开设课程</span>
                 </div>
                 <div class="course-con">
                     <ul>
                         <?php
                         $curriculum = explode(',',$data['trainer']);
                         foreach($curriculum as $v ) {
                             if($v){
                             ?>
                             <li><?php echo $v ?></li>
                             <?php
                           }
                         }
                         ?>
                     </ul>
                 </div>
             </div>
             <div class="btn-gr-bot">
                 <a href="javascript:void(0);" onclick="fabulous(this,<?php echo $data['id'] ?>)">
                     <img src="/cn/images/major-zan.png" alt="图标"/>
                     <span>点赞（<span class="number"><?php echo $data['fabulous'] ?></span>）</span>
                 </a>
                 <a href="tencent://message/?uin=2949709934&Site=www.cnclcy&Menu=yes" target="_blank">
                     <img src="/cn/images/major-zixun.png" alt="图标"/>
                     <span>在线咨询</span>
                 </a>
             </div>
             <div class="clearfix"></div>
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
