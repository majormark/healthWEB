<?php
    $username = $_POST['username'];
    $passwd = $_POST['password'];
    
    //简单验证
    if($username=='major'&&$passwd=='111'){
        header("Location: http://localhost/healthWEB/views/index.php?username=$username");
        //if wanna change
        exit();
    } else {
        header("Location: http://localhost/healthWEB/views/login.php?errno=1");
    }
?>
