<?php include '../base.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>咚咚运动|我的好友</title>
    <script type="text/javascript" src="http://localhost/healthWEB/static/script/jquery-1.11.3.js"></script>
    <link rel="stylesheet" type="text/css" href="http://localhost/healthWEB/static/css/friend/fans.css" />
    <link rel="stylesheet"  href="http://localhost/healthWEB/static/css/base/bootstrap.min.css" />
    
</head>
<?php

$links = array();
$links[]=array("关注","friend.php","glyphicon glyphicon-user");
$links[]=array("粉丝","fans.php","glyphicon glyphicon-heart");
$self_page = basename($_SERVER['PHP_SELF']);
?>
<body>
<div class="body">
    <div class="nav-frame">
        <div class="nav-title">
            <h3>好友关系</h3>
        </div>
        <div class="nav-wrap">
            <ul class="nav-ul">
            <?php
                foreach($links as $link){
                   printf('<li class="item"><a %s href="%s"><span class="%s"></span><span class="nav-con">%s</span></a></li>' , $self_page==$link[1]?' class="on"':'' , $link[1],$link[2], $link[0]);
                   echo "\n";
                }
            ?>
<!--                <li class="item"><a  href="#" target="frame"><span class="glyphicon glyphicon-user"></span><span class="nav-con">我的运动</span></a></li> -->
<!--                <li class="item"><a  href="#" target="frame"><span class="glyphicon glyphicon-heart"></span><span class="nav-con">身体管理</span></a></li> -->
<!--                <li class="item"><a  href="#" target="frame"><span class="glyphicon glyphicon-eye-close"></span><span class="nav-con">睡眠分析</span></a></li> -->
               
            </ul>
        </div>
    </div>
    
    <div class="frame-outer">
        <div class="frame-title">
            <h3>我的3个粉丝<h3/>
        </div>
        <div class="frame-wrap">
            <div class="friend-list"> 
                <a href="#"><img src="http://localhost/healthWEB/static/vendor/image/2.jpg" alt="" /></a> 
                <div class="friend-info">
                    <span class="left"><a href="#"><strong>Demo</strong></a></span>
                    <span class="right"><a>发私信</a></span><br /><br />
                    <span class="left">四川</span>
                    <span class="right"><a>关注</a></span>
                </div> 
                <div class="clear"></div> 
            </div> 
        </div>
    </div>
</div>
</body>
</html>
