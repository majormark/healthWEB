<?php
require_once '../../model/friend/FriendSayService.class.php';

$friend_service = new FriendSayService();
session_start();
$username=$_SESSION['username'];
$txt=stripslashes($_POST['saytxt']);
$txt=strip_tags($txt); //过滤HTML标签，并转义特殊字符
if(mb_strlen($txt)<1 || mb_strlen($txt)>140)
    die("0");
$time=time();
echo $friend_service->add_say($username,$txt,$time);

?>