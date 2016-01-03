<?php
require_once '../../model/user/accountSet_service.class.php';
session_start();
$accountSet_service=new AccountSet_Service();
$username=$_SESSION['username'];
$_POST['sex'];
if($_POST['sex']=='male')
    $sex=1;
else 
    $sex=0;
$birthday=$_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];
$address =$_POST['location'];
$hobby=$_POST['hobby'];
$content=$_POST['content'];
$ret = $accountSet_service->update_user_info($username,$sex,$birthday,$address,$hobby,$content);
if($ret){
    if($_SESSION['role']=='user'){
        header("Location: http://localhost/healthWEB/views/user/accountSet.php?errno=2");
        exit();
    }else if($_SESSION['role']=='expert'){
        header("Location: http://localhost/healthWEB/views/user/ex_accountSet.php?errno=2");
        exit();
    }
}
?>