<?php include '../base.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>咚咚运动|我的好友</title>
    <script type="text/javascript" src="http://localhost/healthWEB/static/script/jquery-1.11.3.js"></script>
    <link rel="stylesheet" type="text/css" href="http://localhost/healthWEB/static/css/friend/friend.css" />
    <link rel="stylesheet"  href="http://localhost/healthWEB/static/css/base/bootstrap.min.css" />
    
</head>
<?php

$links = array();
$links[]=array("关注","friend.php","glyphicon glyphicon-user");
$links[]=array("粉丝","fans.php","glyphicon glyphicon-heart");
$self_page = basename($_SERVER['PHP_SELF']);
?>

<?php 
    			         require_once('../../model/sqlHelper/connect.php');
    			         $db=new MyDB();
    			         if(!$db){
    			             echo $db->lastErrorMsg();
    			         }
    			         $user=$_SESSION['username'];
    			         $sql =<<<EOF
      SELECT * FROM followership fs, user u where fs.followed=u.nickname and fans='$user';
EOF;
    			         $ret = $db->query($sql);
    			         if(!$ret){
    			             echo $db->lastErrorMsg();
    			         }
    			         
    			         $friend_list='';
    			         $count=0;
    			         while($row=$ret->fetchArray(SQLITE3_ASSOC)){
    			             $friend_list.=formatSay($row['followed'],$row['address']);
    			             $count+=1;
    			         }
    			        
    			         function formatSay($followed,$address){
    			             $str= '
    			               <div class="friend-list"> 
                <a href="#"><img src="http://localhost/healthWEB/static/vendor/image/2.jpg" alt="" /></a> 
                <div class="friend-info">
						<span class="left"><a href="#"><strong>'.$followed.'</strong></a></span> <span
							class="right">';
							
    			                 $str.='<a href="http://localhost/healthWEB/controller/friend/follow_controller.php?followed='.$followed.'&op=out&source=friend">取消关注</a></span><br />';
    			             
    			                 
							
							$str.='
						<p class="left">'.$address.'</p><br/>
						
					</div>
					<div class="clear"></div>
				</div>
		    ';
							return $str;
    			         }
    			         
    			     function isJoin($id,$username){
    			         $db=new MyDB();
    			         if(!$db){
    			             echo $db->lastErrorMsg();
    			         }
    			         $sql =<<<EOF
      SELECT * FROM activity_join where activity_id='$id' and username='$username' 
EOF;
    			         $ret = $db->query($sql);
    			         $row=$ret->fetchArray(SQLITE3_ASSOC);
    			         if($row){
    			            return true;
    			         } else {
    			             return false;
    			         }
    			     }    
    			     
?>
<body>
<div class="body">
    <div class="nav-frame">
        <div class="nav-title">
            <h3>好友关系</h3>
        </div>
        <div class="nav-wrap">
            <ul class="nav-ul">
            <?php
                foreach($links as $link){
                   printf('<li class="item"><a %s href="%s"><span class="%s"></span><span class="nav-con">%s</span></a></li>' , $self_page==$link[1]?' class="on"':'' , $link[1],$link[2], $link[0]);
                   echo "\n";
                }
            ?>
<!--                <li class="item"><a  href="#" target="frame"><span class="glyphicon glyphicon-user"></span><span class="nav-con">我的运动</span></a></li> -->
<!--                <li class="item"><a  href="#" target="frame"><span class="glyphicon glyphicon-heart"></span><span class="nav-con">身体管理</span></a></li> -->
<!--                <li class="item"><a  href="#" target="frame"><span class="glyphicon glyphicon-eye-close"></span><span class="nav-con">睡眠分析</span></a></li> -->
               
            </ul>
        </div>
    </div>
    
    <div class="frame-outer">
        <div class="frame-title">
            <h3>我的<?php echo$count;?>个关注<h3/>
        </div>
        <div class="frame-wrap">
        <?php echo $friend_list;?>
<!--             <div class="friend-list">  -->
<!--                 <a href="#"><img src="http://localhost/healthWEB/static/vendor/image/2.jpg" alt="" /></a>  -->
<!--                 <div class="friend-info"> -->
<!--                     <span class="left"><a href="#"><strong>Demo</strong></a></span> -->
<!--                     <span class="right"><a>发私信</a></span><br /><br /> -->
<!--                     <span class="left">四川</span> -->
<!--                     <span class="right"><a>取消关注</a></span> -->
<!--                 </div>  -->
<!--                 <div class="clear"></div>  -->
<!--             </div>  -->
        </div>
    </div>
</div>
</body>
</html>
