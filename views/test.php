<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<form action="http://localhost/healthWEB/views/test.php?op=sport" method="post" enctype="multipart/form-data">
<input type="file" name="file" />
<input type="submit" name="submit" value="运动">

</form>

<form action="http://localhost/healthWEB/views/test.php?op=sleep" method="post" enctype="multipart/form-data">
<input type="file" name="file" />
<input type="submit" name="submit" value="睡眠">
</form>
</body>
</html>
<?php 
require_once 'F:/Apache/wamp/www/healthWEB/model/sqlHelper/connect.php';
if(!empty($_GET['op'])){
    $op=$_GET['op'];
    move_uploaded_file($_FILES["file"]["tmp_name"],$_FILES["file"]["name"]);
    $doc = new DOMDocument();
    $doc->load( $_FILES["file"]["name"] );
    if($op=='sport'){    
        $sports = $doc->getElementsByTagName( "sport" );
        foreach( $sports as $sport )
        {
            $usernames = $sport->getElementsByTagName("username");
            $username = $usernames->item(0)->nodeValue;
        
            $dates = $sport->getElementsByTagName("date");
            $date = $dates->item(0)->nodeValue;
        
            $steps = $sport->getElementsByTagName("steps");
            $step = $steps->item(0)->nodeValue;
            
            $distances = $sport->getElementsByTagName("distance");
            $distance = $distances->item(0)->nodeValue;
            
            $energys = $sport->getElementsByTagName("energy");
            $energy = $energys->item(0)->nodeValue;
            
            $start_time = $sport->getElementsByTagName("start_time");
            $start_time = $start_time->item(0)->nodeValue;
            
            $end_time = $sport->getElementsByTagName("end_time");
            $end_time = $end_time->item(0)->nodeValue;
            
            
            $total_time = $sport->getElementsByTagName("total_time");
            $total_time = $total_time->item(0)->nodeValue;
            $ret=insert_sports($username,$date,$step,$distance,$energy,$start_time,$end_time,$total_time);
            
            
//             if($ret){
//                 header("Location: http://localhost/healthWEB/views/test.php");
//                 exit();
//             }
        } 
    
    }else if($op=='sleep'){
        $sleeps = $doc->getElementsByTagName( "sleep" );
        foreach( $sleeps as $sleep )
        {
            $usernames = $sleep->getElementsByTagName("username");
            $username = $usernames->item(0)->nodeValue;
        
            $dates = $sleep->getElementsByTagName("date");
            $date = $dates->item(0)->nodeValue;
        
            $slight_time = $sleep->getElementsByTagName("slight_time");
            $slight_time = $slight_time->item(0)->nodeValue;
        
            $deep_time = $sleep->getElementsByTagName("deep_time");
            $deep_time = $deep_time->item(0)->nodeValue;
        
            $pre_time = $sleep->getElementsByTagName("pre_time");
            $pre_time = $pre_time->item(0)->nodeValue;
        
            $wake_num = $sleep->getElementsByTagName("wake_num");
            $wake_num = $wake_num->item(0)->nodeValue;
            
            $wake_time = $sleep->getElementsByTagName("wake_time");
            $wake_time = $wake_time->item(0)->nodeValue;
            
            $start_time = $sleep->getElementsByTagName("start_time");
            $start_time = $start_time->item(0)->nodeValue;
        
            $end_time = $sleep->getElementsByTagName("end_time");
            $end_time = $end_time->item(0)->nodeValue;
        
            $total_time = $sleep->getElementsByTagName("total_time");
            $total_time = $total_time->item(0)->nodeValue;
            $ret=insert_sleep($username,$date,$slight_time,$deep_time,$pre_time,$wake_num,$wake_time,$start_time,$end_time,$total_time);
        
        
//             if($ret){
//                 header("Location: http://localhost/healthWEB/views/test.php");
//                 exit();
//             }
        }
    }
}


function insert_sports($username,$date,$step,$distance,$energy,$start_time,$end_time,$total_time){
    $db = new MyDB();
    if(!$db){
        echo $db->lastErrorMsg();
    }
    $sql =<<<EOF
      INSERT INTO sports (username,date,steps,distance,energy,start_time,end_time,total_time)
      VALUES ('$username','$date','$step','$distance','$energy','$start_time','$end_time','$total_time')
    
EOF;
    $ret = $db->exec($sql);
    if(!$ret){
        echo $db->lastErrorMsg();
    }
    $db->close();
    return true;
}

function insert_sleep($username,$date,$slight_time,$deep_time,$pre_time,$wake_num,$wake_time,$start_time,$end_time,$total_time){
    $db = new MyDB();
    if(!$db){
        echo $db->lastErrorMsg();
    }
    $sql =<<<EOF
      INSERT INTO sleep (username,date,slight_time,deep_time,pre_time,wake_num,wake_time,start_time,end_time, total_time)
      VALUES ('$username','$date','$slight_time','$deep_time','$pre_time','$wake_num','$wake_time','$start_time','$end_time','$total_time')

EOF;
    $ret = $db->exec($sql);
    if(!$ret){
        echo $db->lastErrorMsg();
    }
    $db->close();
    return true;
}
?>