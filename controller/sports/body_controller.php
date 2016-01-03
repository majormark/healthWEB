<?php
require_once '../../model/sports/body_service.class.php';
session_start();
$body_service=new Body_Service();
$height=$_POST['height'];
$weight=$_POST['weight'];
$username=$_SESSION['username'];
$ret =$body_service->update_body($height,$weight,$username);
echo 'yes';
if($ret){
    header("Location: http://localhost/healthWEB/views/sports/body_con.php");
    exit();
}
?>