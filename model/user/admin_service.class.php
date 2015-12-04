<?php
require_once 'F:/Apache/wamp/www/healthWEB/model/sqlHelper/connect.php';
class Admin_Service{
    
    function update_power($username,$state){
        $db = new MyDB();
        if(!$db){
            echo $db->lastErrorMsg();
        }
        
        $created_time= date("Y-m-d H:i:s");
        $sql =<<<EOF
      UPDATE user SET state='$state' where nickname='$username'
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