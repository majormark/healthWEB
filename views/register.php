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
                                   echo '<font color="red">该用户名已存在!</font>';
                               } else if($errno==2){
                                   echo '<font color="red">注册成功!</font>';
                               }  else if($errno==3){
                                   echo '<font color="red">申请未通过</font>';
                               } 
                           }else {
                               echo '请注册！';
                           }
                               
                        ?>
                    </h4></li>
                        <li><b>用户名</b><input class="item" type="text" name="username" placeholder="例如：yyy" /></li>
                        <li><b>　密码</b><input class="item" type="password" name="password" placeholder="例如：123456" /></li>
                        <li><b>　您是</b><select class="item-select" name="role"><option value="user">普通用户</option><option value="doctor">医生</option><option value="coach">教练</option></select></li>
                        <li><input class="btn" type="submit" name="submit" value="注册" /><a href="http://localhost/healthWEB/views/login.php"/>back</a></li>                       
                    </ul>
                </form>
            </div>
        </div>
    </body>
</html>