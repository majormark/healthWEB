<?php
require_once '../../model/friend/FriendSayService.class.php';

$friend_service = new FriendSayService();
$txt=stripslashes($_POST['saytxt']);
$txt=strip_tags($txt); //过滤HTML标签，并转义特殊字符
if(mb_strlen($txt)<1 || mb_strlen($txt)>140)
    die("0");
$time=time();
$userid=rand(0,4);
$id=$userid.'_'.time();
echo $friend_service->add_say($id,$userid,$txt,$time);

?>