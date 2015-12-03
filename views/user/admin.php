<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>咚咚运动|我的建议</title>
<script type="text/javascript"
	src="http://localhost/healthWEB/static/script/jquery-1.11.3.js"></script>
<link rel="stylesheet" type="text/css"
	href="http://localhost/healthWEB/static/css/user/expert.css" />

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

$links = array();
$links[] = array(
    "权限管理",
    "admin.php",
    "glyphicon glyphicon-comment"
);
$links[] = array(
    "活动管理",
    "admin_activity.php",
    "glyphicon glyphicon-user"
);

$self_page = basename($_SERVER['PHP_SELF']);
?>

<?php 
    			         require_once('../../model/sqlHelper/connect.php');
    			         $db=new MyDB();
    			         if(!$db){
    			             echo $db->lastErrorMsg();
    			         }
    			         $sql =<<<EOF
      SELECT * FROM user where role in ('doctor','coach') order by created_time desc
EOF;
    			         $ret = $db->query($sql);
    			         if(!$ret){
    			             echo $db->lastErrorMsg();
    			         }
    			         
    			         $user_list='';
    			         while($row=$ret->fetchArray(SQLITE3_ASSOC)){
    			             $user_list.=formatSay($row['nickname'],$row['role'],$row['created_time'],$row['state']);
    			         }
    			         
    			         function formatSay($username,$role,$created_time,$state){
    			            $str= '
		          <div class="list">
					<a href="#"><img
						src="http://localhost/healthWEB/static/vendor/image/2.jpg" alt="" /></a>
					<div class="info">
						<span class="left"><a href="#"><strong>'.$username.'</strong></a></span> <span
							class="right">';
							if($state==1){
    			                 $str.='<a href="http://localhost/healthWEB/controller/user/admin_controller.php?username='.$username.'&op=out">取消允许</a></span><br />';
    			             } else{
    			                 $str.='<a href="http://localhost/healthWEB/controller/user/admin_controller.php?username='.$username.'&op=join">允许</a></span><br />';
    			             }
							
							$str.='
						<p class="left">'.$role.'</p><br/>
						<div class="date">'.$created_time.'</div>
					</div>
					<div class="clear"></div>
				</div>
		    ';
							return $str;
    			         }
    			         
    			         
?>
<body>
	<div class="body">
		<div class="nav-frame">
			<div class="nav-title">
				<h3>管理员</h3>
			</div>
			<div class="nav-wrap">
				<ul class="nav-ul">
            <?php
            foreach ($links as $link) {
                printf('<li class="item"><a %s href="%s"><span class="%s"></span><span class="nav-con">%s</span></a></li>', $self_page == $link[1] ? ' class="on"' : '', $link[1], $link[2], $link[0]);
                echo "\n";
            }
            ?>
        
            </ul>
			</div>
		</div>

		<div class="frame-outer">
			<div class="frame-title">
				<h3>用户列表</h3>
			</div>

			<div class="frame-wrap">
			<?php echo $user_list;?>
<!--     			<div class="list"> -->
<!--     				<a href="#"><img -->
<!--     					src="http://localhost/healthWEB/static/vendor/image/2.jpg" -->
<!--     					alt="" /></a> -->
<!--     				<div class="info"> -->
<!--     					<span class="left"><a href="#"><strong>Demo</strong></a></span> -->
<!--     					<span class="right"><a class=" theme-login" href="javascript:;">查看详情</a></span><br /> -->
<!--     					<p class="left">内容</p> -->
<!--     					<div class="date"></div> -->
<!--     				</div> -->
<!--     				<div class="clear"></div> -->
<!--     			</div> -->
			</div>
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
</body>
</html>