
    <link rel="stylesheet" href="/cn/css/know-details.css"/>

<div class="knowDetail">
    <div class="knowD-left">
        <div class="leftSort01">
            <h1><?php echo $data[0]['name'] ?></h1>

            <div class="xianKnow"></div>
            <?php echo $data[0]['answer'] ?>
        </div>
    </div>
    <div class="knowD-right">
        <div class="rightSort01">
            <img src="/cn/images/know/know_startIcon.png" alt="图标">
            <a href="/cn/know.html">返回知识库</a>
        </div>
        <div class="rightSort02">
            <h4>
                <img src="/cn/images/know/know_dengIcon.png" alt="知识点图标"/>
                热门搜索</h4>
            <ul>
                <?php
                foreach($similar as $v) {
                    ?>
                    <li><a href="/cn/know/detail/<?php echo $_GET['catId'] ?>-<?php echo $v['id'] ?>.html">● <?php echo $v['name'] ?></a></li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
    <div style="clear: both"></div>
</div>
