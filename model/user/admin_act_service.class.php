<?php
require_once 'F:/Apache/wamp/www/healthWEB/model/sqlHelper/connect.php';

    class Admin_act_Service{
        function add_activity($title,$detail){
            $db = new MyDB();
            if(!$db){
                echo $db->lastErrorMsg();
            } 
            $created_time= date("Y-m-d H:i:s");
            $sql =<<<EOF
      INSERT INTO activity (title,detail,created_time)
      VALUES ('$title','$detail','$created_time' );
            
EOF;
            $ret = $db->exec($sql);
            if(!$ret){
                echo $db->lastErrorMsg();
            } 
            $db->close();
            
            return true;
        }
        
        function update_activity($id,$title,$detail){
            $db = new MyDB();
            if(!$db){
                echo $db->lastErrorMsg();
            }
            
            $created_time= date("Y-m-d H:i:s");
            $sql =<<<EOF
      UPDATE activity SET title='$title',detail='$detail', created_time='$created_time' where activity_id=$id
EOF;
            $ret = $db->exec($sql);
            if(!$ret){
                echo $db->lastErrorMsg();
            }
            $db->close();
        
            return true;
        }
        
        function delete_activity($id){
            $db = new MyDB();
            if(!$db){
                echo $db->lastErrorMsg();
            }
        
            $sql =<<<EOF
      DELETE FROM activity where activity_id='$id'
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