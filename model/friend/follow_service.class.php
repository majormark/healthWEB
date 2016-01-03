<?php
require_once 'F:/Apache/wamp/www/healthWEB/model/sqlHelper/connect.php';
class Follow_Service{
    function add_join($followed,$fans){
        $db = new MyDB();
        if(!$db){
            echo $db->lastErrorMsg();
        }
        $sql =<<<EOF
      INSERT INTO followership (followed,fans)
      VALUES ('$followed','$fans' )
        
EOF;
        $ret = $db->exec($sql);
        if(!$ret){
            echo $db->lastErrorMsg();
        }
        $db->close();
        
        return true;
    }
    function delete_join($followed,$fans){
        $db = new MyDB();
        if(!$db){
            echo $db->lastErrorMsg();
        }
        $created_time= date("Y-m-d H:i:s");
        $sql =<<<EOF
      DELETE FROM followership WHERE followed='$followed' and fans='$fans'
    
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