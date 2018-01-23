
    <link rel="stylesheet" href="/cn/css/admit-result.css"/>
</head>
<body>
<div class="admit">
    <div class="admit-in">
        <div class="result-con">
            <div class="r-c-title">
                <p class="new-word"><b></b> 你好，你申请到 <span><?php echo isset($school)?$school:'该校' ?>-<?php echo isset($major)?$major:'' ?></span>专业的成功率为：</p>
                <span class="big"><?php echo isset($percent)?$percent:'' ?>%</span>
            </div>
            <div class="r-c-con">
                <p>已超过<span><?php if($score<=50){ echo 30; } elseif($score<=60){ echo 40; } elseif($score<=70){ echo 55; } elseif($score<=80){ echo 70; } elseif($score<=90){ echo 80; } elseif($score<=100){ echo 85; } ?>%</span>的人！</p>
                <span><b>*</b>此报告匹配标准以近5年留学录取成功大数据作为技术支撑并不
                  能百分之百代表实际录取结果，仅供参考。</span>
            </div>
            <div class="r-c-btn">
                <a href="/free.html">返回首页</a>
                <a href="/percentages-test.html">继续测评</a>
            </div>
        </div>
        <!--尾部三角形-->
        <div class="admin-foot"></div>
    </div>
</div>
</body>
    <script type="text/javascript">
        $(function(){
            $(".new-word b").html($("#luquCP-need").val());
        });
    </script>
</html>