<?php include '../base.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>咚咚运动|身体管理</title>
    <script type="text/javascript" src="http://localhost/healthWEB/static/script/jquery-1.11.3.js"></script>
    <link rel="stylesheet" type="text/css" href="http://localhost/healthWEB/static/css/mySports/body_con.css" />
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
        <div class="title">
            <h3>身体管理<h3/>
        </div>
        <div class="health-bmi">
            <div class="wrap">
                <div class="circle-result">
                    <p class="health-lv">健康</p>
                    <p class="bmi-lv" >BMI</p>
                </div>
                <div class="back-small">
                    <form action="#" method="post">
                        <ul>
                            
                            <li>身高<input class="input" name="height" type="text" /> 厘米</li>
                            <li>体重<input class="input" name="weight" type="text" /> 公斤</li>
                            <li><input class="btn" name="submit" type="submit" value="保存">
                        </ul>
                    </form>
                </div>
                <div class="scale">
                    <ul>
                        <li >BMI度量尺</li>
                        <li class="one"></li>
                        <li class="two"><span style="margin-left: -100px;color:white;">18.5</span></li>
                        <li class="three"><span style="margin-left: -80px;color:white;">24</span></li>
                        <li class="four"><span style="margin-left: -80px;color:white;">28</span></li>
                        
                    </ul>
                </div>
            </div>
        </div>
        
        
    </div>
</div>
</body>
</html>
