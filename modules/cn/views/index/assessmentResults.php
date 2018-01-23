    <link rel="stylesheet" href="/cn/css/assessmenResults.css"/>
<div class="assessment">
    <h1>您成功的击败了<span><?php echo $collagen ?>%</span>的申请者</h1>
    <div class="inContent">
        <ul>
            <li>
                <label>电话:</label>
                <div>
                    <input type="text" id="phone"/>
                </div>
                <a onclick="getCode()" href="javascript:;">获取验证码</a>
            </li>
            <li>
                <label>验证码:</label>
                <div>
                    <input type="text" id="code"/>
                </div>
            </li>
        </ul>
        <div>
            <div class="checkDiv">
                <img src="/cn/images/assessmentResults_draw.png" alt="勾勾图标"/>
                 <input type="checkbox" id="wish" name="com"/>
            </div>
           <label for="wish">我希望获得更多的留学咨询</label>
        </div>
        <a onclick="subPhone()" href="javascript:;" class="completion">查看完整报告</a>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        var com = $("#wish");
        com.change(function ()
        {
            if($(this).is(":checked")){
                $(".checkDiv img").show();
            }else{
                $(".checkDiv img").hide();
            }
        });
    });
    function getCode(){
        var phone = $('#phone').val();
        $.post('/cn/api/phone-code',{phoneNum:phone,type:1},function(re){
            alert(re.message);
        },"json")
    }
    function subPhone(){
        var phone = $('#phone').val();
        var code = $('#code').val();
        if(phone == ''){
            alert('留下您的联系方式');
            return false;
        }
        if(code == ''){
            alert('请输入验证码');
            return false;
        }
        $.post('/cn/api/assess',{phone:phone,code:code},function(re){
            alert(re.message);
            if(re.code == 1){
                window.location.href="/";
            }
        },"json")
    }
</script>