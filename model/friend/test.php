<?php
require_once 'FriendSayService.class.php';

$friend_service = new FriendSayService();


$content="aaaaaaaa";
$time=time();
$userid=rand(0,4);
$id=$userid."_".time();
echo $userid ;
echo '<br />';
echo $id;
echo '<br />';
$friend_service->add_say($id,$userid,$content,$time);
?>