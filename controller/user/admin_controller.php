<?php
require_once '../../model/user/admin_service.class.php';
$admin_service=new Admin_Service();
$op=$_GET['op'];
$username=$_GET['username'];

if($op=='join'){
    $ret =$admin_service->update_power($username,1);
    if($ret){
        header("Location: http://localhost/healthWEB/views/user/admin.php?op=join");
        exit();
    }
} else if($op=='out'){
    $ret = $admin_service->update_power($username,0);
    if($ret){
        header("Location: http://localhost/healthWEB/views/user/admin.php?op=out");
        exit();
    }
}

?>