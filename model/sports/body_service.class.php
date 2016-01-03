<?php
require_once 'F:/Apache/wamp/www/healthWEB/model/sqlHelper/connect.php';

class Body_Service{
    
    function update_body($height,$weight,$username) {
        $db = new MyDB();
        if(!$db){
            echo $db->lastErrorMsg();
        }
        
        
        $sql =<<<EOF
      UPDATE body_con SET height='$height',weight='$weight' where username='$username'
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