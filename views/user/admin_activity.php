<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>咚咚运动|我的建议</title>
<script type="text/javascript"
	src="http://localhost/healthWEB/static/script/jquery-1.11.3.js"></script>
<link rel="stylesheet" type="text/css"
	href="http://localhost/healthWEB/static/css/user/admin_activity.css" />

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
	$('.create').click(function(){
		$('.theme-popover-mask').fadeIn(100);
		$('.theme-popover2').slideDown(200);
	})
	$('.theme-poptit2 .close').click(function(){
		$('.theme-popover-mask').fadeOut(100);
		$('.theme-popover2').slideUp(200);
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
$links[]=array("账号安全","admin_accountSafe.php","glyphicon glyphicon-wrench");
$self_page = basename($_SERVER['PHP_SELF']);
?>

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
    			         
    			         function formatSay($id,$title,$detail,$created_time){
    			             return '
		          <div class="list">
		            <a href="#"><img
    					   src="http://localhost/healthWEB/static/vendor/image/2.jpg"
    					   alt="" /></a>
    				<div class="info">
    					<span class="left"><a href="#"><strong>'.$title.'</strong></a></span>
    					<span class="right"><a href="http://localhost/healthWEB/views/user/activity_modify.php?id='.$id.'">修改</a><a href="http://localhost/healthWEB/controller/user/admin_act_controller.php?id='.$id.'&op=2">　　删除</a></span><br />
    					<p class="left">'.$detail.'</p><br />
    					<div class="date">'.$created_time.'</div>
    				</div>
                </div>
		    ';
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
				<h3>活动列表</h3>
				<a class="create">添加活动</a><a class="quit" href="http://localhost/healthWEB/views/login.php">退出</a>
			</div>

			<div class="frame-wrap">
			     <?php echo $act_list;?>
<!--     			<div class="list"> -->
    			    
<!--     				<a href="#"><img -->
<!--     					src="http://localhost/healthWEB/static/vendor/image/2.jpg" -->
<!--     					alt="" /></a> -->
<!--     				<div class="info"> -->
<!--     					<span class="left"><a href="#"><strong>Demo</strong></a></span> -->
<!--     					<span class="right"><a class="theme-login" href="javascript:;" >查看详情</a></span><br /> -->
<!--     					<p class="left">内容</p><br /> -->
<!--     					<p class="time">内容</p> -->
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
	
	<div class="theme-popover2">
		<div class="theme-poptit2">
			<a href="javascript:;" title="关闭" class="close">×</a>
			<h3>添加一个活动</h3>
		</div>
		<div class="content">
		    <form action="http://localhost/healthWEB/controller/user/admin_act_controller.php?op=0" method="post">
		        <ul>
		          <li>标题 <input  class="item" type="text" name="title"/></li>
		          <li>内容<textarea class="detail" name="detail"></textarea></li>
		          <li><input class="btn" type="submit" name="submit" value="创建"/></li>
		        </ul>
		    </form>
		</div>
	</div>

</body>
</html>