
    <link rel="stylesheet" href="/cn/css/applicationIn.css"/>
    <script language="javascript" src="/cn/js/PCASClass.js"></script>
    <script type="text/javascript" src="/ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/ueditor/ueditor.all.min.js"></script>
    <!-- 编辑器公式插件 -->
    <div class="ruzhu-banner">
        <a href="#ruzhuBox">
            <img src="/cn/images/jigou/ruzhu-banner.png" alt="banner"/>
        </a>
    </div>
    <div class="ruzhu-data">
        <h2>雷哥网，提供大数据驱动下的国际教育O+O服务</h2>
        <div class="ruzhu-d-left">
            <img src="/cn/images/jigou/ruzhu-computer.png" alt="图片"/>
        </div>
        <div class="ruzhu-d-right">
            <ul>
                <li>
                    <div class="rz-left">
                        <img src="/cn/images/jigou/ruzhu-icon01.png" alt="图标"/>
                    </div>
                    <div class="rz-right">
                        <h4>雷哥网留学服务概念1：信息服务</h4>
                        <p>雷哥网通过PC、WAP和APP等互联网平台和工具，通过院校库、案例库和
                            录取条件库等建立选校模型，为客户的留学申请精准定位，提供个性化留学
                            选校与申请服务。</p>
                    </div>
                    <div class="clearfix"></div>
                </li>
                <li>
                    <div class="rz-left">
                        <img src="/cn/images/jigou/ruzhu-icon02.png" alt="图标"/>
                    </div>
                    <div class="rz-right">
                        <h4>雷哥网留学服务概念２：共享平台</h4>
                        <p>入驻雷哥网，增强自身机构品牌效应和口碑营销，提升专业度！降低机构运
                            营成本，减少资金投入，帮助留学机构彰显机构品牌形象！</p>
                    </div>
                    <div class="clearfix"></div>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
    <div id="ruzhuBox">
        <div class="ruzhu-top-t">
            <img src="/cn/images/jigou/ruzhu-xian.png" alt="标题线"/>
            <img src="/cn/images/jigou/ruzhu-wdian.png" alt="点" class="l-dian"/>
            <span>申请入驻</span>
            <img src="/cn/images/jigou/ruzhu-wdian.png" alt="点" class="r-dian"/>
            <img src="/cn/images/jigou/ruzhu-xian.png" alt="标题线"/>
        </div>
        <div class="ruzhu-bot-c">
            <div class="ruzhu-l-div l-l"></div>
            <div class="ruzhu-l-div l-r"></div>
            <div class="ruzhu-group">
                <ul>
                    <li>
                        <b>*</b><label for="jg-name">机&nbsp;构&nbsp;名&nbsp;称：</label>
                        <input type="text" id="jg-name"/>
                    </li>
                    <li>
                        <b style="top: -20px;">*</b><label style="position: relative;top: -20px;">上&nbsp;传&nbsp;资&nbsp;质：</label>
                        <div class="file-input">
                            <input type="text" id="zhizi"/>
                            <input type="button" onclick="upImage();" value="上传"/>
                            <p style="color: grey">请上传JPG格式的营业执照</p>
<!--                            <input type="file" id="zz-file" onchange="fuFileZhi(this)"/>-->
                        </div>
                    </li>
                    <li>
                        <b>*</b><label for="lx-name">联系人名称：</label>
                        <input type="text" id="lx-name"/>
                    </li>
                    <li>
                        <b>*</b><label for="lx-phone">联系人手机：</label>
                        <input type="text" id="lx-phone"/>
                    </li>
                    <li>
                        <b>&nbsp;</b><label for="lx-qq">&nbsp;联系人 QQ：</label>
                        <input type="text" id="lx-qq"/>
                    </li>
                    <li>
                        <b>&nbsp;</b><label for="lx-email">&nbsp;联系人邮箱：</label>
                        <input type="text" id="lx-email"/>
                    </li>
                    <li>
                        <b>*</b><label>所&nbsp;在&nbsp;地&nbsp;区：</label>
                        <select name="province" id="province" class="address"></select>
                        <select name="city" id="city" class="address"></select>
                        <select name="area" id="area" class="address"></select>
                    </li>
                </ul>
                <input type="button" value="提交申请" class="shenq-btn" onclick="shenqingSub()"/>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        //地址插件
        new PCAS("province","city","area");
        function fuFileZhi(o){
            $("#zhizi").val($(o).val());
        }
        function shenqingSub(){
            var jgName=$("#jg-name").val();
            var zhizi=$("#zhizi").val();
            var lxName=$("#lx-name").val();
            var lxPhone=$("#lx-phone").val();
            var reg=/^1[3|4|5|7|8][0-9]\d{8}$/;
            var lxQq=$("#lx-qq").val();
            var lxEmail=$("#lx-email").val();
            var province=$("#province").val();
            var city=$("#city").val();
            var area=$("#area").val();

            if(!jgName || !zhizi || !lxName || !lxPhone || !province || !city || !area){
                alert("请注意必填项！");
                return false;
            }
            if(!reg.test(lxPhone)){
                alert("电话格式不正确！");
                return false;
            }
            $.ajax({
                url:"/cn/api/mechanism-enter",
                type:"post",
                data:{
                    image:zhizi,
                    name:jgName,
                    extend:[lxName,lxPhone,lxQq,lxEmail,province+'-'+city+'-'+area]
                },
                dataType:"json",
                success:function(data){
                   if(data.code==1){
                       alert("提交成功，工作人员会在3个工作日内审核材料，并与您取得联系。");
                   }
                }
            });
        }

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
                $('#zhizi').val(arg[0].src);

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