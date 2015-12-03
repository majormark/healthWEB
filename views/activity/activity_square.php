<?php include '../base.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>咚咚运动|活动</title>
<script type="text/javascript"
	src="http://localhost/healthWEB/static/script/jquery-1.11.3.js"></script>
<link rel="stylesheet" type="text/css"
	href="http://localhost/healthWEB/static/css/activity/activity_square.css" />
<link rel="stylesheet"
	href="http://localhost/healthWEB/static/css/base/bootstrap.min.css" />
<script>
jQuery(document).ready(function($) {
	$('.theme-login').click(function(){
		$('.theme-popover-mask').fadeIn(100);
		$('.theme-popover').slideDown(200);
	})
	$('.theme-poptit .close').click(function(){
		$('.theme-popover-mask').fadeOut(100);
		$('.theme-popover').slideUp(200);
	})

})
</script>
</head>
<?php 
    			         require_once('../../model/sqlHelper/connect.php');
    			         $db=new MyDB();
    			         if(!$db){
    			             echo $db->lastErrorMsg();
    			         }
    			         $sql =<<<EOF
      SELECT * FROM activity ORDER BY created_time DESC;
EOF;
    			         $ret = $db->query($sql);
    			         if(!$ret){
    			             echo $db->lastErrorMsg();
    			         }
    			         
    			         $act_list='';
    			         while($row=$ret->fetchArray(SQLITE3_ASSOC)){
    			             $act_list.=formatSay($row['activity_id'],$row['title'],$row['detail'],$row['created_time']);
    			         }
    			         $user = $_SESSION['username'];
    			         $sql =<<<EOF
      SELECT * FROM activity_join aj, activity a where aj.activity_id = a.activity_id and aj.username='$user'
EOF;
    			     
    			         $ret = $db->query($sql);
    			         if(!$ret){
    			             echo $db->lastErrorMsg();
    			         }
    			         
    			         $my_act_list='';
    			         while($row=$ret->fetchArray(SQLITE3_ASSOC)){
    			             $my_act_list.='
    			                 <li>'.$row['title'].'</li>
    			                                
    			                 ';
    			         }
    			         function formatSay($id,$title,$detail,$created_time){
    			             $str= '
		          <div class="list">
					<a href="#"><img
						src="http://localhost/healthWEB/static/vendor/image/2.jpg" alt="" /></a>
					<div class="info">
						<span class="left"><a href="#"><strong>'.$title.'</strong></a></span> <span
							class="right">';
							if(isJoin($id,$_SESSION['username'])){
    			                 $str.='<a href="http://localhost/healthWEB/controller/activity/activity_square_controller.php?id='.$id.'&op=out">取消加入</a></span><br />';
    			             } else{
    			                 $str.='<a href="http://localhost/healthWEB/controller/activity/activity_square_controller.php?id='.$id.'&op=join">加入</a></span><br />';
    			             }
							
							$str.='
						<p class="left">'.$detail.'</p><br/>
						<div class="date">'.$created_time.'</div>
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
				<h3>我的活动</h3>
			</div>
			<div class="nav-wrap">
			    <p> </p>
				<ul>
				    <?php echo $my_act_list;?>
					
				</ul>
			</div>
		</div>

		<div class="frame-outer">
			<div class="frame-title">
				<h3>
					最新活动
				<h3 />
			
			</div>
			<div class="frame-wrap">
			  <?php echo $act_list;?>
<!-- 				<div class="list"> -->
<!-- 					<a href="#"><img -->
<!-- 						src="http://localhost/healthWEB/static/vendor/image/2.jpg" alt="" /></a> -->
<!-- 					<div class="info"> -->
<!-- 						<span class="left"><a href="#"><strong>Demo</strong></a></span> <span -->
<!-- 							class="right"><a class=" theme-login" href="javascript:;">查看详情</a></span><br /> -->
<!-- 						<p class="left">内容</p> -->
<!-- 						<div class="date"></div> -->
<!-- 					</div> -->
<!-- 					<div class="clear"></div> -->
<!-- 				</div> -->
			</div>
		</div>

		<!--遮罩窗体  -->
		<div class="theme-popover">
			<div class="theme-poptit">
				<a href="javascript:;" title="关闭" class="close">×</a>
				<h3>详情</h3>
			</div>
			<p>内容</p>
		</div>
		<div class="theme-popover-mask"></div>
	</div>
</body>
</html>
