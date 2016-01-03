<?php
require_once '../../model/user/accountSafe_service.class.php';
session_start();
$accountSafe_service = new AccountSafe_Service();
$username=$_SESSION['username'];
$oldpwd=$_POST['old_pwd'];
$newpwd=$_POST['new_pwd'];
if($accountSafe_service->isRightPwd($username,$oldpwd)) {
    $ret=$accountSafe_service->update_password($username,md5($newpwd));
    if($ret){  
        if($_SESSION['role']=='expert'){
            header("Location: http://localhost/healthWEB/views/user/ex_accountSafe.php?errno=2");
            exit();
        }else if($_SESSION['role']=='user'){
            header("Location: http://localhost/healthWEB/views/user/accountSafe.php?errno=2");
            exit();
        }else {
            header("Location: http://localhost/healthWEB/views/user/admin_accountSafe.php?errno=2");
            exit();
        }
    }
} else {
    if($_SESSION['role']=='expert'){
        header("Location: http://localhost/healthWEB/views/user/ex_accountSafe.php?errno=1");
        exit();
    }else if($_SESSION['role']=='user'){
        header("Location: http://localhost/healthWEB/views/user/accountSafe.php?errno=1");
        exit();
    }else{
        header("Location: http://localhost/healthWEB/views/user/admin_accountSafe.php?errno=1");
        exit();
    }
}

?>