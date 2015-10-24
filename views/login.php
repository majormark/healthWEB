<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="http://localhost/healthWEB/static/css/login/login.css">
<title>咚咚运动|登录</title>
</head>

<body>
    <div class="login">
        <div class="login-title">
            <h3>登录 是一种态度</h3>
        </div>
        <div class="login-wrap">
            <form class="login-form" action="http://localhost/healthWEB/controller/loginController.php" method="post">
                <ul>
                    <li><h4>
                        <?php 
                           if(!empty($_GET['errno'])) {
                               $errno=$_GET['errno'];
                               if($errno==1){
                                   echo '<font color="red">用户名或密码错误!</font>';
                               }  
                           }else {
                               echo '你必须先登录!';
                           }
                               
                        ?>
                    </h4></li>
                    <li><strong>用户名</strong><input class="item" type="text" name="username" placeholder="用户名" required="required" size="20"/></li>
                    <li><strong>　密码</strong><input class="item" type="password" name="password" placeholder="密码" required="required" size="20"/></li>
                    <li><input class="btn" type="submit" name="login" value="登录"/>  <a class="register" href="#">join us!</a></li>
                   
                </ul>
            </form>
         </div>
    </div>  
</body>
</html>