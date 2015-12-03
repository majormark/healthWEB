<?php include '../base.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>咚咚运动|我的运动</title>
    <script type="text/javascript" src="http://localhost/healthWEB/static/script/jquery-1.11.3.js"></script>
    <link rel="stylesheet" type="text/css" href="http://localhost/healthWEB/static/css/mySports/mySports.css" />
    <link rel="stylesheet"  href="http://localhost/healthWEB/static/css/base/bootstrap.min.css" />
    
</head>
<?php

$links = array();
$links[]=array("我的运动","mySports.php","glyphicon glyphicon-user");
$links[]=array("身体管理","body_con.php","glyphicon glyphicon-heart");
$links[]=array("睡眠分析","sleep_con.php","glyphicon glyphicon-eye-close");
$self_page = basename($_SERVER['PHP_SELF']);
?>
<body>
<div class="body">
    <div class="nav-frame">
        <div class="nav-title">
            <h3>健康管理</h3>
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
        <div class="health-con">
            <div class="title">
                <h3>你本周的健康状况<h3/>
            </div>
            <div class="wrap">
                <div class="target"><span>aaaaaaaaaaaaaaa</span><br />aaaaaa</div>
                <div class="sleep"></div>
                <div class="health"></div>
            </div>
        </div>
        <div class="sports-total">
            <div class="title">
                <h3>你的运动总量<h3/>
            </div>
            <div class="wrap">
                <div class="distance"><img src=../../static/vendor/image/walk.png><span>aaa</span><br /><span>bbb</span></div>
                <div class="time"><img src=../../static/vendor/image/total_time.png><span>aaa</span><br /><span>bbb</span></div>
                <div class="energy"><img src=../../static/vendor/image/hot.png><span>aaa</span><br /><span>bbb</span></div>
            </div>
        </div> 
        <div class="transfer">
            <div class="title">
                <h3>这些运动量可以<h3/>
            </div>
            <div class="wrap">
                <div class="circle"></div>
                <div class="meat"></div>
                <div class="gas"></div>
                <div class="light"></div>
            </div>
        </div> 
        <div class="rank">
            <div class="title">
                <h3>朋友排行</h3>
            </div>
        </div>
    </div>
</div>
</body>
</html>