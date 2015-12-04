<?php
require_once '../../model/user/admin_act_service.class.php';
$admin_service=new Admin_act_Service();
$op=$_GET['op'];
if($op==0){//create
    $title = $_POST['title'];
    $detial = $_POST['detail'];
    
    $ret = $admin_service->add_activity($title, $detial);
    if($ret){
        header("Location: http://localhost/healthWEB/views/user/admin_activity.php");
        exit();
    }
} else if($op==1){
    $title = $_POST['title'];
    $detial = $_POST['detail'];
    $id = $_POST['id'];
    $ret = $admin_service->update_activity($id,$title, $detial);
    if($ret){
        header("Location: http://localhost/healthWEB/views/user/admin_activity.php");
        exit();
    }
} else if($op==2){
    $id=$_GET['id'];
    $ret = $admin_service->delete_activity($id);
    if($ret){
        header("Location: http://localhost/healthWEB/views/user/admin_activity.php");
        exit();
    }
}

?>