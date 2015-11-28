<?php
define('INCLUDE_CHECK',1);
require_once('../sqlHelper/connect.php');
require_once('function.php');

class FriendSayService {
    
    public function add_say($id,$userid,$content,$time) {
        $db = new MyDB('F:/Apache/wamp/www/healthWEB/model/sqlHelper/test.db');
        if(!$db){
            echo $db->lastErrorMsg();
        } else {
            echo "Opened database successfully\n";
        }
        
        $sql =<<<EOF
      INSERT INTO say (userid,content,addtime,id)
      VALUES ('$userid','$content','$time','$id' );
      
EOF;
        $ret = $db->exec($sql);
        if(!$ret){
            echo $db->lastErrorMsg();
        } else {
            echo "Records created successfully\n";
        }
        $db->close();
        
        return formatSay($content,$time,$userid);
    }
    
   
}


?>