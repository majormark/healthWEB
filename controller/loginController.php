<?php
    require_once '../model/sqlHelper/connect.php';
    $username = $_POST['username'];
    $passwd = $_POST['password'];
    
    $db = new MyDB('../model/sqlHelper/test.db');
    if(!$db){
        die("connecting to sql failed".$db->lastErrorMsg());
    }
    $sql =<<<EOF
      SELECT password FROM user where nickname='$username';
EOF;
    
    $ret = $db->query($sql);
    
    if($row = $ret->fetchArray(SQLITE3_ASSOC)) {
        if($row['password']==md5($passwd)){
            header("Location: http://localhost/healthWEB/views/index.php?username=$username");
            exit();
        }
    } else {
        header("Location: http://localhost/healthWEB/views/login.php?errno=1");
        exit();
    }
    
    $db->close();
    //简单验证
//     if($username=='major'&&$passwd=='111'){
//         header("Location: http://localhost/healthWEB/views/index.php?username=$username");
//         //if wanna change
//         exit();
//     } else {
//         header("Location: http://localhost/healthWEB/views/login.php?errno=1");
//     }

?>
