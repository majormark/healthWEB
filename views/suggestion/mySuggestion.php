<?php include '../base.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>咚咚运动|我的建议</title>
    <script type="text/javascript" src="http://localhost/healthWEB/static/script/jquery-1.11.3.js"></script>
    <link rel="stylesheet" type="text/css" href="http://localhost/healthWEB/static/css/mySports/mySports.css" />
    <link rel="stylesheet"  href="http://localhost/healthWEB/static/css/base/bootstrap.min.css" />
</head>
<?php

$links = array();
$links[]=array("我的建议","mySuggestion.php","glyphicon glyphicon-comment");
$links[]=array("专家选择","expertSelect.php","glyphicon glyphicon-user");
$links[]=array("推送　　 ","push.php","glyphicon glyphicon-question-sign");
$self_page = basename($_SERVER['PHP_SELF']);
?>
<body>
<div class="body">
    <div class="nav-frame">
        <div class="nav-title">
            <h3>建议管理</h3>
        </div>
        <div class="nav-wrap">
            <ul class="nav-ul">
            <?php
                foreach($links as $link){
                   printf('<li class="item"><a %s href="%s"><span class="%s"></span><span class="nav-con">%s</span></a></li>' , $self_page==$link[1]?' class="on"':'' , $link[1],$link[2], $link[0]);
                   echo "\n";
                }
            ?>
        
            </ul>
        </div>
    </div>
    
    <div class="frame-outer">
        <div class="frame-title">
            <h3>tab/doctor/coach<h3/>
        </div>
        <div class="frame-wrap">
            
        </div>
    </div>
</div>
</body>
</html>