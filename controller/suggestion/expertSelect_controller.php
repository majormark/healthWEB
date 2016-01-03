<?php
require_once '../../model/suggestion/expertSelect_service.class.php';
session_start();
$expertSelect_service=new ExpertSelect_Service();
$user=$_SESSION['username'];
$expert=$_GET['expert'];
$op=$_GET['op'];
if($op=='join'){
    $ret=$expertSelect_service->add_join($user,$expert);
    if($ret){
        header("Location: http://localhost/healthWEB/views/suggestion/expertSelect.php");
        exit();
    }
} else if($op='out'){   
    $ret=$expertSelect_service->delete_join($user,$expert);
    if($ret){
        header("Location: http://localhost/healthWEB/views/suggestion/expertSelect.php");
        exit();
    }
}
?>