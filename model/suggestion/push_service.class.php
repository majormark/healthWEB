<?php
class Push_Service{
    
    function add_activity($user,$expert,$question,$detail){
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
}
?>