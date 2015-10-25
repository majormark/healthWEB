<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link type="text/css" rel="stylesheet" href="http://localhost/healthWEB/static/css/register/register.css">
        <title>咚咚运动|注册</title>
    </head>

    <body>
        <div class="regi-frame">
            <div class="regi-title">
                <h3>注册 是一种态度</h3>
            </div>
            <div class="regi-wrap">
                <form action="http://localhost/healthWEB/controller/regiController.php" method="post">
                    <ul>
                    <li><h4>
                        <?php 
                           if(!empty($_GET['errno'])) {
                               $errno=$_GET['errno'];
                               if($errno==1){
                                   echo '<font color="red">用户名或密码错误!</font>';
                               }  
                           }else {
                               echo '请注册！';
                           }
                               
                        ?>
                    </h4></li>
                        <li><b>用户名</b><input class="item" type="text" name="username" placeholder="例如：yyy" /></li>
                        <li><b>　密码</b><input class="item" type="password" name="password" placeholder="例如：123456" /></li>
                        <li><b>　邮箱</b><input class="item" type="text" name="email" placeholder="例如：xiaoming@163.com" /></li>
                        <li><input class="btn" type="submit" name="submit" value="注册" /><input class="btn" type="reset" name="reset" value="重填" /></li>                       
                    </ul>
                </form>
            </div>
        </div>
    </body>
</html>