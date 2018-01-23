
    <link rel="stylesheet" href="/cn/css/unitary.css"/>
</head>
<body>
<form action="/cn/activity/collection" id="form" method="post">
    <div class="form-title"><span>推荐人信息</span></div>
    <div class="common-input">
        <ul>
            <li>
                <label for="name">推荐人姓名<span>*</span></label>
                <input type="text" name="extendVal[name]" id="name"/>
            </li>
            <li>
                <label for="phone">推荐人联系方式<span>*</span></label>
                <input type="text" name="extendVal[phone]" id="phone"/>
            </li>
        </ul>
    </div>
    <div class="form-title"><span>被推荐人信息</span></div>
    <div class="common-input">
        <ul>
            <li>
                <label for="bname">被推荐人姓名<span>*</span></label>
                <input type="text" name="extendVal[bname]" id="bname"/>
            </li>
            <li>
                <label for="bphone">被推荐人手机<span>*</span></label>
                <input type="text" name="extendVal[bphone]" id="bphone"/>
            </li>
        </ul>
    </div>
    <div class="form-title"><span>以下为选填项目</span></div>
    <div class="common-input">
        <ul>
            <li>
                <label for="bemail">被推荐人电子邮箱</label>
                <input type="text" name="extendVal[bemail]" id="bemail"/>
            </li>
            <li>
                <label for="bqq">被推荐人QQ</label>
                <input type="text" name="extendVal[bqq]" id="bqq"/>
            </li>
            <li>
                <label for="bwechat">被推荐人微信</label>
                <input type="text" name="extendVal[bwechat]" id="bwechat"/>
            </li>
            <li>
                <label for="xueli">目标学历</label>
                <input type="text" name="extendVal[xueli]" id="xueli"/>
            </li>
            <li>
                <label for="school">目标学校</label>
                <input type="text" name="extendVal[school]" id="school"/>
            </li>
            <li>
                <label for="zhuanye">目标专业</label>
                <input type="text" name="extendVal[zhuanye]" id="zhuanye"/>
            </li>
            <li>
                <label for="time">入学时间</label>
                <input type="text" name="extendVal[time]" id="time"/>
            </li>
            <li>
                <label for="zaidu">在读学校</label>
                <input type="text" name="extendVal[zaidu]" id="zaidu"/>
            </li>
            <li>
                <label for="grade">在读年级</label>
                <input type="text" name="extendVal[grade]" id="grade"/>
            </li>
            <li>
                <label for="remark">备注</label>
                <textarea name="extendVal[remark]" id="remark"></textarea>
            </li>
            <li class="btn">
                <input type="button" value="提交" onclick="subInfo()"/>
                <input type="reset" value="重置"/>
            </li>
        </ul>
    </div>
</form>
<div class="success-mask">
    <div class="in-success">
        <span>我们的工作人员会在3个<br/>工作日内与你联系</span>
        <div class="close-mask" onclick="closeSuccess()"><img src="/cn/images/unitary/unitary-close.png" alt="关闭图标"/></div>
    </div>
</div>
</body>
<script type="text/javascript" src="/cn/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="/cn/js/unitary-form.js"></script>
</html>