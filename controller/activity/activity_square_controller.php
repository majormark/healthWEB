<?php
require_once '../../model/activity/activity_square_service.class.php';
session_start();
$activity_join = new Activity_Square_Service();
$op=$_GET['op'];
if($op=='join'){    
    $activity_id=$_GET['id'];
    $username=$_SESSION['username'];
    $ret=$activity_join->add_join($username,$activity_id);
    if($ret){
        header("Location: http://localhost/healthWEB/views/activity/activity_square.php");
        exit();
    }
} else if($op='out'){
    $activity_id=$_GET['id'];
    $username=$_SESSION['username'];
    $ret=$activity_join->delete_join($username,$activity_id);
    if($ret){
        header("Location: http://localhost/healthWEB/views/activity/activity_square.php");
        exit();
    }
}
?>