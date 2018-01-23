<link rel="stylesheet" href="/cn/css/choose-school.css"/>
<script type="text/javascript" src="/cn/js/choose-school.js"></script>
<div class="choose-bg">
<!--    选校测评弹幕-->
    <div class="index-font-slide1">
        <div class="i-f-sbd">
            <ul>
                <?php
                foreach($news as $v) {
                    ?>
                    <li>雷哥网会员 <?php echo isset($v['nickname'])?$v['nickname']:$v['userName'] ?> <?php  echo date("Y-m-d H:i:s", $v['createTime']) ; ?>-获得一份选校报告</li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
    <script type="text/javascript">
        jQuery(".index-font-slide1").slide({mainCell:".i-f-sbd ul",autoPlay:true,effect:"leftMarquee",vis:2,interTime:50,mouseOverStop:false});
    </script>
    <div class="choose-auto">
        <h2>选校测评</h2>
        <div class="top-info-c">
            为学生了解自身情况、寻找合适院校，“我目前水平能申到哪些国外学校？”自动生成选校报告+熟悉申请条件
        </div>
        <div class="choose-step">
            <ul>
                <li class="on">
                    <div class="font-box">个人成绩</div>
                    <div class="num-box">1</div>
                </li>
                <li>
                    <div class="font-box">学校背景</div>
                    <div class="num-box">2</div>
                </li>
                <li>
                    <div class="font-box">个人软背景</div>
                    <div class="num-box">3</div>
                </li>
                <li>
                    <div class="font-box">申请方向背景</div>
                    <div class="num-box">4</div>
                </li>
            </ul>
        </div>
        <form action="/cn/school-choice/result" method="post" id="chooseSchool">
            <div class="step-1">
                <ul>
                    <li>
                        <label for="gpa">GPA<b>*</b></label>
                        <input type="text" id="gpa" name="result_gpa"/>
                        <span class="tishi-yu" style="right: -75px">例：3.0或者85</span>
                    </li>
                    <li>
                        <label for="gmat">GMAT/GRE</label>
                        <input type="text" id="gmat" name="result_gmat"/>
                        <span class="tishi-yu">若暂未出分，可填目标分数</span>
                    </li>
<!--                    <li>-->
<!--                        <label for="gre">GRE</label>-->
<!--                        <input type="text" id="gre" name="result_gre"/>-->
<!--                    </li>-->
                    <li>
                        <label for="toefl">TOEFL/IELTS<b>*</b></label>
                        <input type="text" id="toefl" name="result_toefl"/>
                        <span class="tishi-yu">若暂未出分，可填目标分数</span>
                    </li>
<!--                    <li>-->
<!--                        <label for="ielts">IELTS</label>-->
<!--                        <input type="text" id="ielts" name="result_ielts"/>-->
<!--                    </li>-->
                </ul>
                <div class="bot-btn-group">
                    <input type="button" value="下一步" onclick="nextStep1()"/>
                </div>
            </div>
            <div class="step-2 common-step">
                <ul>
                    <li>
                        <span>目&nbsp;&nbsp;&nbsp;前&nbsp;&nbsp;学&nbsp;&nbsp;&nbsp;历</span>
                        <ul>
                            <li>
                                <input type="radio" name="education" id="boshi" value="博士"/>
                                <label for="boshi">博士</label>
                            </li>
                            <li>
                                <input type="radio" name="education" value="硕士" id="shuoshi"/>
                                <label for="shuoshi">硕士</label>
                            </li>
                            <li>
                                <input type="radio" name="education" value="本科" id="benke"/>
                                <label for="benke">本科</label>
                            </li>
                            <li>
                                <input type="radio" name="education" value="专科" id="zhuanke"/>
                                <label for="zhuanke">专科</label>
                            </li>
                            <li>
                                <input type="radio" name="education" value="高中" id="gaozhong"/>
                                <label for="gaozhong">高中</label>
                            </li>
                            <li>
                                <input type="radio" name="education" value="初中" id="chuzhong"/>
                                <label for="chuzhong">初中</label>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <span>就读/毕业学校<b>*</b></span>
                        <select id="biye" name="school">
                            <option value=""></option>
                            <option value="1">清北复交浙大</option>
                            <option value="2">985学校</option>
                            <option value="3">211学校</option>
                            <option value="4">非211本科</option>
                            <option value="5">专科</option>
                        </select>
                    </li>
                    <li>
                        <span style="letter-spacing: 1px">学校具体名称<b>*</b></span>
                        <input type="text" id="schoolName" name="schoolName" class="com-input"/>
                    </li>
                    <li>
                        <span>专&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;业<b>*</b></span>
                        <input type="text" class="com-input" id="major-input" onclick="showMajorC(this,2)" name="major01"/>
                        <input type="hidden" name="major_top" class="fangId"/>
                        <input type="hidden" name="school_major" class="fangPid"/>
                        <input type="hidden" name="nowMajor" class="fangName"/>
                    </li>
                </ul>
                <div class="bot-btn-group">
                    <input type="button" value="上一步" class="mr" onclick="prevStep1()"/>
                    <input type="button" value="下一步" onclick="nextStep2()"/>
                </div>
            </div>
            <div class="step-3">
                <div class="common-box">
                    <h4>实习/工作经验</h4>
                    <ul>
                        <li>
                            <input type="radio" name="work[0][]" value="1" id="dashi"/>
                            <label for="dashi">国内四大</label>
                        </li>
                        <li>
                            <input type="radio" name="work[0][]" value="2" id="fiveH"/>
                            <label for="fiveH">500强</label>
                        </li>
                        <li>
                            <input type="radio" name="work[0][]" value="3" id="waiqi"/>
                            <label for="waiqi">外企</label>
                        </li>
                        <li>
                            <input type="radio" name="work[0][]" value="4" id="guoqi"/>
                            <label for="guoqi">国企</label>
                        </li>
                        <li>
                            <input type="radio" name="work[0][]" value="5" id="siqi"/>
                            <label for="siqi">私企</label>
                        </li>
                    </ul>
                    <textarea name="live[0]" placeholder="请如实填写跟申请方向相关的工作经验，若没有完整工作经验，请填写相关实习经验,每项描述不低于30字，请尽量填写大于30天的相关经历，若没有可不填；"></textarea>
                    <div class="jixu-add" id="add_1">
                        <img src="/cn/images/evaluation/choose-add.png" alt="添加图标"/>
                        <span>继续添加</span>
                    </div>
                </div>
                <div class="common-box">
                    <h4>项目经验</h4>
                    <textarea name="project[]" placeholder="请如实填写跟申请方向相关的项目经验，如相关比赛经历、商业项目、实验项目、论文发表等。每项描述文字不低于30字。若没有可不填。"></textarea>
                    <div class="jixu-add" id="add_2">
                        <img src="/cn/images/evaluation/choose-add.png" alt="添加图标"/>
                        <span>继续添加</span>
                    </div>
                </div>
                <div class="common-box">
                    <h4>海外留学</h4>
                    <textarea name="studyTour[]" placeholder="请如实填写海外游学经历，如交换项目、海外实践课程等。若没有可不填。"></textarea>
                    <div class="jixu-add" id="add_3">
                        <img src="/cn/images/evaluation/choose-add.png" alt="添加图标"/>
                        <span>继续添加</span>
                    </div>
                </div>
                <div class="common-box">
                    <h4>公益活动</h4>
                    <textarea name="active[]" placeholder="请如实填写你所参与的公益项目，若没有可不填。"></textarea>
                    <div class="jixu-add" id="add_4">
                        <img src="/cn/images/evaluation/choose-add.png" alt="添加图标"/>
                        <span>继续添加</span>
                    </div>
                </div>
                <div class="common-box">
                    <h4>获奖经历</h4>
                    <textarea name="price[]" placeholder="请如实填写你所获奖经历，若没有可不填。"></textarea>
                    <div class="jixu-add" id="add_5">
                        <img src="/cn/images/evaluation/choose-add.png" alt="添加图标"/>
                        <span>继续添加</span>
                    </div>
                </div>
                <div class="bot-btn-group">
                    <input type="button" value="上一步" class="mr" onclick="prevStep2()"/>
                    <input type="button" value="下一步" onclick="nextStep3()"/>
                </div>
            </div>
            <div class="step-4 common-step">
                <ul>
                    <li>
                        <span>留&nbsp;学&nbsp;目&nbsp;的&nbsp;地<b>*</b></span>
                        <ul id="mudidi">
                            <?php
                            foreach($data['country'] as $k=>$v) {
                                ?>
                                <li>
                                    <input type="radio" name="destination" id="meiguo<?php echo $k?>" value="<?php echo $v['id'] ?>"/>
                                    <label for="meiguo<?php echo $k?>"><?php echo $v['name'] ?></label>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </li>
                    <li>
                        <span>专&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;业<b>*</b></span>
                        <input type="text" class="com-input" id="step4-major" onclick="showMajorC(this,4)" name="major02"/>
                        <input type="hidden" name="id2" class="fangId"/>
                        <input type="hidden" name="major" class="fangPid"/>
                        <input type="hidden" name="major_left" class="fangName"/>
                    </li>
                </ul>
                <div class="warn-info">
                    <div class="warn-left">
                        <img src="/cn/images/evaluation/cp-worn.png" alt="图标"/>
                    </div>
                    <div class="warn-right">
                        <p>
                            此报告未考虑文书质量与面试质量用户须填写实际情况，保证结果的准确性，此报告匹配标准以近5年留学录取成果大数据作为技术支撑，并不能百分百代表实际录取结果，仅供参考
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="bot-btn-group">
                    <input type="button" value="上一步" class="mr" onclick="prevStep3()"/>
                    <input type="button" value="提交" onclick="chooseSub()"/>
                </div>
            </div>
        </form>
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
                foreach($data['major'] as $v) {
                    ?>
                    <li>
                        <span><?php echo $v['name'] ?></span>
                        <div class="second_page">
                            <ul>
                                <?php
                                foreach($v['child'] as $va) {
                                    ?>
                                    <li data-id="<?php echo $va['id'] ?>" data-pid="<?php echo $va['pid'] ?>" data-name="<?php echo $va['name'] ?>"><?php echo $va['name'] ?></li>
                                    <?php
                                }
                                ?>
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
