<?php
require_once 'F:/Apache/wamp/www/healthWEB/model/sqlHelper/connect.php';

class AccountSet_Service{
    
    function update_user_info($username,$sex,$birthday,$address,$hobby,$content){
        $db = new MyDB();
        if(!$db){
            echo $db->lastErrorMsg();
        }
        
        $sql =<<<EOF
      UPDATE user SET sex='$sex', birthday='$birthday', address='$address',hobby='$hobby', content='$content' where nickname='$username'
EOF;
        $ret = $db->exec($sql);
        if(!$ret){
            echo $db->lastErrorMsg();
        }
        $db->close();
        
        return true;
    }
}

?>