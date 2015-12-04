<?php
require_once 'F:/Apache/wamp/www/healthWEB/model/sqlHelper/connect.php';

class Activity_Square_Service{
    function add_join($username,$activity_id){
        $db = new MyDB();
        if(!$db){
            echo $db->lastErrorMsg();
        }
        $created_time= date("Y-m-d H:i:s");
        $sql =<<<EOF
      INSERT INTO activity_join (username,activity_id)
      VALUES ('$username','$activity_id' )
        
EOF;
        $ret = $db->exec($sql);
        if(!$ret){
            echo $db->lastErrorMsg();
        }
        $db->close();
        
        return true;
    }
    
    function delete_join($username,$activity_id){
        $db = new MyDB();
        if(!$db){
            echo $db->lastErrorMsg();
        }
        $created_time= date("Y-m-d H:i:s");
        $sql =<<<EOF
      DELETE FROM activity_join WHERE activity_id='$activity_id' and username='$username'
    
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