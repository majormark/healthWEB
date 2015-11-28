<?php
    require_once '../model/sqlHelper/connect.php';
    $username = $_POST['username'];
    $passwd = $_POST['password'];
    
    $db = new MyDB('../model/sqlHelper/test.db');
    if(!$db){
        die("connecting to sql failed".$db->lastErrorMsg());
    }
    $sql =<<<EOF
          SELECT nickname as num FROM user where nickname='$username';
EOF;
    
    $ret = $db->query($sql);
    
    if($row = $ret->fetchArray(SQLITE3_ASSOC)) {
        
        header("Location: http://localhost/healthWEB/views/register.php?errno=1");
        exit();
        
    }
    $passwd=md5($passwd);
    $date = date("Y-m-d H:i:s");
    $sql =<<<EOF
      INSERT INTO user (nickname,password,created_time)
      VALUES ('$username','$passwd', '$date');
EOF;
    $ret = $db->exec($sql);
    if(!$ret){
        die($db->lastErrorMsg());
    } else {
      echo "Records created successfully\n";
   }
   $db->close();

?>
