<?php

require_once 'F:/Apache/wamp/www/healthWEB/model/sqlHelper/connect.php';

class ExpertSelect_Service{
    function add_join($user,$expert){
        $db = new MyDB();
        if(!$db){
            echo $db->lastErrorMsg();
        }
        $created_time= date("Y-m-d H:i:s");
        $sql =<<<EOF
      INSERT INTO health_work (user,expert)
      VALUES ('$user','$expert' )
    
EOF;
        $ret = $db->exec($sql);
        if(!$ret){
            echo $db->lastErrorMsg();
        }
        $db->close();
    
        return true;
    }
    
    function delete_join($user,$expert){
        $db = new MyDB();
        if(!$db){
            echo $db->lastErrorMsg();
        }
        $created_time= date("Y-m-d H:i:s");
        $sql =<<<EOF
      DELETE FROM health_work WHERE expert='$expert' and user='$user'
    
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