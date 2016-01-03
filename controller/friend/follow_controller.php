<?php
require_once '../../model/friend/follow_service.class.php';
session_start();
$follow_service=new Follow_Service();
$fans=$_SESSION['username'];
$followed=$_GET['followed'];
$op=$_GET['op'];
$source=$_GET['source'];
if($op=='join'){
    $ret=$follow_service->add_join($followed,$fans);
    if($ret){
        if($source=='index'){
            header("Location: http://localhost/healthWEB/views/index.php");
            exit();
        }else if ($source=='friend'){
            header("Location: http://localhost/healthWEB/views/friend/friend.php");
            exit();
        }else if ($source=='fans'){
            header("Location: http://localhost/healthWEB/views/friend/fans.php");
            exit();
        }
    }
} else if($op='out'){
    $ret=$follow_service->delete_join($followed,$fans);
    if($ret){
        if($source=='index'){
            header("Location: http://localhost/healthWEB/views/index.php");
            exit();
        }else if ($source=='friend'){
            header("Location: http://localhost/healthWEB/views/friend/friend.php");
            exit();
        }else if ($source=='fans'){
//             header("Location: http://localhost/healthWEB/views/friend/fans.php");
//             exit();
        }
    }
}
?>