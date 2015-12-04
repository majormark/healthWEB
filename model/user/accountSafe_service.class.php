<?php
require_once 'F:/Apache/wamp/www/healthWEB/model/sqlHelper/connect.php';

class AccountSafe_Service{
    
    function update_password($username,$newpwd) {
        $db = new MyDB();
        if(!$db){
            echo $db->lastErrorMsg();
        }
        
        $sql =<<<EOF
      UPDATE user SET password='$newpwd' where nickname='$username'
EOF;
        $ret = $db->exec($sql);
        if(!$ret){
            echo $db->lastErrorMsg();
        }
        $db->close();
        
        return true;
    }
    
    function isRightPwd($username, $pwd){
        $db = new MyDB();
        if(!$db){
            echo $db->lastErrorMsg();
        }
        $sql =<<<EOF
      SELECT * FROM user where nickname='$username'
EOF;
        $ret = $db->query($sql);
        $row=$ret->fetchArray(SQLITE3_ASSOC);
        echo $row['password'];
        return $row['password']==md5($pwd);
    }
}
?>