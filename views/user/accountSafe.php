<?php include '../base.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>咚咚运动|个人设置</title>
    <script type="text/javascript" src="http://localhost/healthWEB/static/script/jquery-1.11.3.js"></script>
    <link rel="stylesheet" type="text/css" href="http://localhost/healthWEB/static/css/user/accountSafe.css" />
    <link rel="stylesheet"  href="http://localhost/healthWEB/static/css/base/bootstrap.min.css" />
    
</head>
<?php

$links = array();
$links[]=array("基本信息","/healthWEB/views/user/accountSet.php","glyphicon glyphicon-user");
$links[]=array("账号安全","/healthWEB/views/user/accountsafe.php","glyphicon glyphicon-wrench");
$self_page = $_SERVER['PHP_SELF'];
?>
<body>
<div class="body">
    <div class="nav-frame">
        <div class="nav-title">
            <h3>个人设置</h3>
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
            <h3>账号安全<h3/>
        </div>
        <div class="frame-wrap">
            <form action="#" >
                <h4><b>修改密码</b></h4>
                <ul>
                    <li><b>　　旧密码</b><input class="item" type="password" name="old_pwd"></li>
                    <li><b>　　新密码</b><input class="item" type="password" name="new_pwd"></li>
                    <li><b>确认新密码</b><input class="item" type="password" name="new_again_pwd"></li>
                    <li><input class="btn" type="submit" name="submit" value="保存"></li>
                </ul>
            </form>
        </div>
    </div>
</div>
</body>
</html>
