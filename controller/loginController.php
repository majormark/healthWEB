<?php
    require_once '../model/sqlHelper/connect.php';
    session_start();
    $username = $_POST['username'];
    $passwd = $_POST['password'];
    
    
    
    $db = new MyDB();
    if(!$db){
        die("connecting to sql failed".$db->lastErrorMsg());
    }
    $sql =<<<EOF
      SELECT password,role,state FROM user where nickname='$username';
EOF;
    
    $ret = $db->query($sql);
    $row = $ret->fetchArray(SQLITE3_ASSOC);
    if($row&&($row['state']==1)) {
        if($row['password']==md5($passwd)){
            $_SESSION['username']=$username;
            $_SESSION['password']=$passwd;
            if($row['role']=='user'){   
                header("Location: http://localhost/healthWEB/views/index.php");
                exit();
            } else if($row['role']=='admin'){
                header("Location: http://localhost/healthWEB/views/user/admin.php");
                exit();
            } else {
                header("Location: http://localhost/healthWEB/views/user/expert.php");
                exit();
            }
        }else{//password is not right
            header("Location: http://localhost/healthWEB/views/login.php?errno=1");
            exit();
        }
    } else {
        header("Location: http://localhost/healthWEB/views/login.php?errno=2");
        exit();
    }
    
    $db->close();

?>
