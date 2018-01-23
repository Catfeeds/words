<!DOCTYPE html>
<html xmlns:gs="http://www.gensee.com/ec">
<head>
    <title><?php echo $data['name']?></title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="/cn/css/aLiveLesson-move.css"/>
    <link rel="stylesheet" type="text/css" href="/cn/css/jquery-ui-1.10.3.custom.gs.min.css">
    <script type="text/javascript" src="/cn/js/aLiveLesson.js"></script>
    <script type="text/javascript" src="http://static.gensee.com/webcast/static/sdk/js/gssdk.js"></script>
    <script type="text/javascript" src="/cn/js/json2.js"></script>
    <script type="text/javascript" src="/cn/js/webplayer.common.js"></script>
    <script type="text/javascript" src="/cn/js/jquery-ui-1.10.3.custom.min.js"></script>
</head>
<body>
<?php
if($belong == 2){
    $url = Yii::$app->params['toeflUrl'];
}else if($belong == 3){
    $url = Yii::$app->params['shopUrl'];
}else if($belong == 5){
    $url = Yii::$app->params['classUrl'];
}
?>
<!--teacher-->
<div class="teacherBox02 leftDiv" id="drag">
    <gs:video-vod
        site="bjsy.gensee.com"
        ctx="training"
        ownerid="<?php echo $data['sdk']?>"
        uid="<?php echo $uid?>"
        uname="<?php echo $username?>"
        password=""
        authcode="<?php echo $data['pwd']?>"
        encodetype=""
        bgimg="http://www.gmatonline.cn/app/web_core/styles/images/bg-video.png"
        bar="false"
        py="1"
        lang="zh_CN"/>
</div>
<!--ppt-->
<div class="pptBox02 rightDiv">
    <gs:doc
        site="bjsy.gensee.com"
        ctx="training"
        ownerid="<?php echo $data['sdk']?>"
        fullscreen="true"
        bgcolor=""
        lang="zh_CN"/>

</div>

<div class="aLive-center updateBJ">
    <div class="aLc-center twoCenter">
        <div class="aLive-top left-diff">
            <h4><?php echo $data['name']?></h4>
<!--            <div class="video-beisu">-->
<!--                <span>播放倍数</span>-->
<!--                <img src="/cn/images/alive-xiaj.png" alt="箭头图标"/>-->
<!--                <div class="grey-beis">-->
<!--                    <ul>-->
<!--                        <li><a href="javascript:void(0);">1×<img src="/cn/images/alive-rblak.png" alt="图标"/></a></li>-->
<!--                        <li><a href="javascript:void(0);">1.5×<img src="/cn/images/alive-rblak.png" alt="图标"/></a></li>-->
<!--                        <li><a href="javascript:void(0);">2×<img src="/cn/images/alive-rblak.png" alt="图标"/></a></li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--            </div>-->
        </div>
        <div class="aLc-cCenter twoaLc-cCenter">
            <div class="aLc_cVideo">
                <div id="aLcVContent">
                    <!--ppt-->
<!--                    <gs:doc-->
<!--                        site="bjsy.gensee.com"-->
<!--                        ctx="training"-->
<!--                        ownerid="LCALmNCsiL"-->
<!--                        fullscreen="true"-->
<!--                        bgcolor=""-->
<!--                        lang="zh_CN"/>-->
                </div>
            </div>
            <!--全屏图标-->
            <div class="full-icon">
                <img src="/cn/images/alive-full.png" alt="全屏图标"/>
            </div>
            <div class="bottomControl">
                <!--播放图标-->
                <div class="play"></div>
                <!--快进图标-->
                <div class="speed" onclick="fastForward()"></div>
                <!--进度条播放当前时间-->
                <span class="current-time">18:35</span>
                <!--进度条-->
                <div class="progress">
                    <div class="progressBG">
<!--                        <div class="progressMove"></div>-->
                    </div>
                </div>
                <!--进度条播放总时间-->
                <span class="duration-time">30:00</span>
                <!--调整音量进度条-->
                <div class="volume">
                    <div class="volu-icon">
                        <img src="/cn/images/alive-voulm.png" alt="图片"/>
                    </div>
                    <div class="volu-progress">
                        <div class="volu-jian" onclick="subVolume()">
                            <img src="/cn/images/alive-jian.png" alt="图片"/>
                        </div>
                        <div class="volu-probg"></div>
                        <div class="volu-add" onclick="addVolume()">
                            <img src="/cn/images/alive-add.png" alt="图片"/>
                        </div>
                    </div>

                </div>


                <div class="toggleCon btn-switch">
                    <img src="/cn/images/aLive_toggle.png" alt="切换按钮"/>
                </div>
            </div>
        </div>

    </div>

</div>
<!--{*360屏蔽弹窗*}-->
<div class="warn-mask">
    <div class="warn-360">
        <div class="close-btn" onclick="closeWarnMask()">
            <img src="/cn/images/warn-360Btn.png" alt="按钮"/>
        </div>
    </div>
</div>
<?php
    if($sign == 0) {
        ?>
        <!--遮罩层-->
        <div class="form-maskLayer"></div>
        <!--遮罩层里面的文字-->
        <div class="form-font">
            <div class="topBlue">雷哥GMAT在线课程，助你预见想象的700+</div>
            <div class="passDiv">
                密码:<input id="pwd" name="pwd" placeholder="请输入密码" type="text"/>
                <button onclick="checkPwd()" type="button">提交</button>
            </div>
        </div>
        <script type="text/javascript">
            //输入密码的遮罩层高度
            $(".form-maskLayer").css("height", $(document).height() + "px");
            function checkPwd(){
                var pwd = $("#pwd").val()
                if(pwd == ''){
                    alert('请输入密码');return false;
                }
                $.post("/pay/api/check-pwd",{pwd:pwd,id:<?php echo $id?>},function(re){
                    if(re.code == 1){
                        window.location.reload();
                    }else{
                        alert(re.message);
                    }
                },'json')
            }

        </script>
    <?php
    }
?>
</body>
<script type="text/javascript">
    window.onload=function ()
    {
        var oDrag=document.getElementById('drag');

        oDrag.onmousedown=function (ev)
        {
            var oEvent=ev||event;
            var disX=oEvent.clientX-oDrag.offsetLeft;//x坐标
            var disY=oEvent.clientY-oDrag.offsetTop;//y坐标

            document.onmousemove=function (ev)
            {
                var oEvent=ev||event;
                var l=oEvent.clientX-disX;//移动x坐标位置
                var t=oEvent.clientY-disY;//移动y坐标位置
                //限制范围
                if(l<0)
                {
                    l=0;
                }
                else if(l>document.documentElement.clientWidth-oDrag.offsetWidth)
                {
                    l=document.documentElement.clientWidth-oDrag.offsetWidth;
                }

                if(t<0)
                {
                    t=0;
                }
                else if(t>document.documentElement.clientHeight-oDrag.offsetHeight)
                {
                    t=document.documentElement.clientHeight-oDrag.offsetHeight;
                }

                oDrag.style.left=l+'px';
                oDrag.style.top=t+'px';
            };

            document.onmouseup=function ()
            {
                document.onmousemove=null;
                document.onmouseup=null;
            };
        };
    };
    window.onload = function () {

        //application/vnd.chromium.remoting-viewer 可能为360特有
        var is360 = _mime("type", "application/vnd.chromium.remoting-viewer");

        if (isChrome() && is360) {
            $(".warn-mask").show();
            channel.send("pause", {})
        }else{
            $(".warn-mask").hide();
        }
    };
    //检测是否是谷歌内核(可排除360及谷歌以外的浏览器)
    function isChrome(){
        var ua = navigator.userAgent.toLowerCase();
        return ua.indexOf("chrome") > 1;
    }
    //测试mime
    function _mime(option, value) {
        var mimeTypes = navigator.mimeTypes;
        for (var mt in mimeTypes) {
            if (mimeTypes[mt][option] == value) {
                return true;
            }
        }
        return false;
    }
    function closeWarnMask(){
//        $(".warn-mask").hide();
        window.opener=null;
        window.open('','_self');
        window.close();
    }
</script>
</html>