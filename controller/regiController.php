<?php
    require_once '../model/sqlHelper/connect.php';
    $username = $_POST['username'];
    $passwd = $_POST['password'];
    $role = $_POST['role'];
    
    $db = new MyDB();
    if(!$db){
        die("connecting to sql failed".$db->lastErrorMsg());
    }
    
    
        $sql =<<<EOF
          SELECT nickname as num,state FROM user where nickname='$username';
EOF;
        
        $ret = $db->query($sql);
        $row = $ret->fetchArray(SQLITE3_ASSOC);
        if($row&&$row['state']==1) {
            header("Location: http://localhost/healthWEB/views/register.php?errno=1");
            exit();
        } else if($row&&$row['state']==0){
            header("Location: http://localhost/healthWEB/views/register.php?errno=3");
            exit();
        } else {
            $passwd=md5($passwd);
            $date = date("Y-m-d H:i:s");
            $state=1;
            if($role!='user') $state=0;
            $sql =<<<EOF
          INSERT INTO user (nickname,password,created_time,state,role)
          VALUES ('$username','$passwd', '$date','$state','$role');
EOF;
            $ret = $db->exec($sql);
            if(!$ret){
                die($db->lastErrorMsg());
            } else {
                header("Location: http://localhost/healthWEB/views/register.php?errno=2");
            }
            $db->close();
        }
    
    

?>
