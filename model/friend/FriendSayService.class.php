<?php
define('INCLUDE_CHECK',1);
require_once('F:/Apache/wamp/www/healthWEB/model/sqlHelper/connect.php');
require_once('function.php');

class FriendSayService {
    
    public function add_say($username,$content,$time) {
        $db = new MyDB();
        if(!$db){
            echo $db->lastErrorMsg();
        }
        
        $sql =<<<EOF
      INSERT INTO say (username,content,addtime)
      VALUES ('$username','$content','$time' );
      
EOF;
        $ret = $db->exec($sql);
        if(!$ret){
            echo $db->lastErrorMsg();
        }
            
        $db->close();
        
        return formatSay($content,$time,$username);
    }
    
   
}


?>