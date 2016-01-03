<?php
require_once 'F:/Apache/wamp/www/healthWEB/model/sqlHelper/connect.php';
class Question_Service{
    
        function add_question($user,$expert,$question,$detail){
            $db = new MyDB();
            if(!$db){
                echo $db->lastErrorMsg();
            }
            $created_time= date("Y-m-d H:i:s");
            $sql =<<<EOF
      INSERT INTO suggestion (user,expert,question,detail,created_time)
      VALUES ('$user','$expert','$question','$detail','$created_time' )
        
EOF;
            $ret = $db->exec($sql);
            if(!$ret){
                echo $db->lastErrorMsg();
            }
            $db->close();
        
            return true;
        }
        
        function update_answer($qid,$answer){
            $db = new MyDB();
            if(!$db){
                echo $db->lastErrorMsg();
            }
            $created_time= date("Y-m-d H:i:s");
            $sql =<<<EOF
      UPDATE suggestion SET answer='$answer' where id='$qid'
        
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