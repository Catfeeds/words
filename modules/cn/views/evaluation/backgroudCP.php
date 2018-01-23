
    <link rel="stylesheet" href="/cn/css/backgroudCP.css"/>
    <script type="text/javascript" src="/cn/js/backgroudCP.js"></script>
</head>
<body>
<div class="bg-1">
    <div class="bg-2">
         <div class="bg-title">
             <img src="/cn/images/evaluation/bg-title.png" alt="标题图片"/>
             <p>“我该如何合理规划申请时间？”1分钟完成专业测评 <br>
                 ，即可获得留学评估师提供的全面专业留学评估报告与方案建议，为你指点迷津</p>
         </div>
        <div class="bg-white">
            <img src="/cn/images/evaluation/bg-white.png" alt="图片" class="shape"/>
            <form action="/background-result.html" method="post" id="backForm">
            <div class="page-1 firstPage">
                    <ul>
                        <li>
                            <label for="time">1<b>*</b>计划出国时间</label>
                            <input type="text" id="time" name="planTime" placeholder="如：2018年春季"/>
                        </li>
                        <li>
                            <label for="country">2<b>*</b>意&nbsp;&nbsp;向&nbsp;&nbsp;国&nbsp;&nbsp;&nbsp;家</label>
                            <input type="text" id="country" name="country"/>
                        </li>
                        <li>
                            <label for="major">3<b>*</b>意&nbsp;&nbsp;向&nbsp;&nbsp;专&nbsp;&nbsp;&nbsp;业</label>
                            <input type="text" id="major" name="major"/>
                        </li>
                        <li>
                            <label>4 是否有参加过以下考试</label>
                            <input type="radio" name="kaoshi" id="yes" checked/>
                            <label for="yes">是</label>
                            <input type="radio" name="kaoshi" id="no"/>
                            <label for="no">否</label>
                            <ul>
                                <li>
                                    <label for="gmat">GMAT</label>
                                    <input type="text" id="gmat" name="gmat" placeholder="请填写真实分数"/>
                                </li>
                                <li>
                                    <label for="toefl">托&nbsp;&nbsp;&nbsp;福</label>
                                    <input type="text" id="toefl" name="toefl" placeholder="请填写真实分数"/>
                                </li>
                                <li>
                                    <label for="ielts">雅&nbsp;&nbsp;&nbsp;思</label>
                                    <input type="text" id="ielts" name="ielts" placeholder="请填写真实分数"/>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <label>5<b>*</b>是否有软背景经历？</label>
                            <input type="radio" name="shixi" id="yes02" checked/>
                            <label for="yes02">是</label>
                            <input type="radio" name="shixi" id="no02"/>
                            <label for="no02">否</label>
                            <textarea cols="30" rows="10" name="experience" id="xuelijl" placeholder="请如实填写跟申请方向相关的软背景经历。如实习/工作经验、项目比赛经验、海外游学经验、公益活动 、获奖经历等。"></textarea>
                        </li>
                        <li>
                            <input type="button" value="下一页" class="nextBtn" onclick="bcNextPage()"/>
                        </li>
                    </ul>
            </div>
            <div class="page-1 secondPage">
                <ul>
                    <li>
                        <label>6<b>*</b>您最关心的问题</label>
                        <ul class="check_ul">
                            <li>
                                <input type="checkbox" name="emphases[]" id="fuwu" value="服务流程"/>
                                <label for="fuwu">服务流程</label>
                            </li>
                            <li>
                                <input type="checkbox" name="emphases[]" id="chuguo" value="出国考试课程"/>
                                <label for="chuguo">出国考试课程</label>
                            </li>
                            <li>
                                <input type="checkbox" name="emphases[]" id="xuanxiao" value="选校定位"/>
                                <label for="xuanxiao">选校定位</label>
                            </li>
                            <li>
                                <input type="checkbox" name="emphases[]" id="guwen" value="推荐顾问"/>
                                <label for="guwen">推荐顾问</label>
                            </li>
                            <li>
                                <input type="checkbox" name="emphases[]" id="buzou" value="申请步骤"/>
                                <label for="buzou">申请步骤</label>
                            </li>
                            <li>
                                <input type="checkbox" name="emphases[]" id="feiyong" value="申请费用"/>
                                <label for="feiyong">申请费用</label>
                            </li>
                            <li>
                                <input type="checkbox" name="emphases[]" id="jiangxuej" value="奖学金"/>
                                <label for="jiangxuej">奖学金</label>
                            </li>
                            <li>
                                <input type="checkbox" name="emphases[]" id="other" value="其他"/>
                                <label for="other">其他</label>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <label for="buchong">7<b>&nbsp;</b>请补充你想了解的问题</label>
                        <textarea id="buchong" name="supplement"></textarea>
                    </li>
                    <li>
                        <label for="n-name">&nbsp;&nbsp;8<b>*</b>您的姓名</label>
                        <input type="text" id="n-name" name="uName"/>
                    </li>
                    <li>
                        <label for="n-phone">&nbsp;&nbsp;9<b>*</b>您的电话</label>
                        <input type="text" id="n-phone" name="phone"/>
                    </li>
                    <li>
                        <label for="n-wechat">10<b>*</b>QQ/微信</label>
                        <input type="text" id="n-wechat" name="weChat"/>
                    </li>
                    <li>
                        <input type="button" value="上一页" class="nextBtn" onclick="bcPrevPage()"/>
                        <input type="button" value="提交" class="nextBtn" onclick="subBackground()"/>
                        <div class="clearfix"></div>
                    </li>
                </ul>
            </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>