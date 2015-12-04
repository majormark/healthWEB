<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>咚咚运动|我的建议</title>
<script type="text/javascript"
	src="http://localhost/healthWEB/static/script/jquery-1.11.3.js"></script>
<link rel="stylesheet" type="text/css"
	href="http://localhost/healthWEB/static/css/user/ex_push.css" />

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
    "用户列表",
    "expert.php",
    "glyphicon glyphicon-comment"
);
$links[] = array(
    "个人设置",
    "ex_accountSet.php",
    "glyphicon glyphicon-user"
);
$links[] = array(
    "推送　　 ",
    "ex_push.php",
    "glyphicon glyphicon-question-sign"
);
$self_page = basename($_SERVER['PHP_SELF']);
?>
<body>
	<div class="body">
		<div class="nav-frame">
			<div class="nav-title">
				<h3>建议管理</h3>
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
				<h3>推送列表</h3>
				<a class="create" href="javascript:;">编写新推送</a>
			</div>

			<div class="frame-wrap">
    			<div class="list">
    				<a href="#"><img
    					src="http://localhost/healthWEB/static/vendor/image/2.jpg"
    					alt="" /></a>
    				<div class="info">
    					<span class="left"><a href="#"><strong>Demo</strong></a></span>
    					<span class="right"><a class="theme-login" href="javascript:;">查看详情</a></span><br />
    					<p class="left">内容</p>
    					<div class="date"></div>
    				</div>
    				<div class="clear"></div>
    			</div>
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
			<h3>详情</h3>
		</div>
		<form>
		     <b>标题</b><input type="text" name="title" >
		     <textarea></textarea>
		</form>
	</div>
</body>
</html>