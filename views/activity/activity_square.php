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

<body>
	<div class="body">
		<div class="nav-frame">
			<div class="nav-title">
				<h3>我的活动</h3>
			</div>
			<div class="nav-wrap">
				<ul>
					<li>活动一</li>
					<li>活动二</li>
					<li>活动三</li>
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
				<div class="doctor-list list">
					<a href="#"><img
						src="http://localhost/healthWEB/static/vendor/image/2.jpg" alt="" /></a>
					<div class="info">
						<span class="left"><a href="#"><strong>Demo</strong></a></span> <span
							class="right"><a class=" theme-login" href="javascript:;">查看详情</a></span><br />
						<p class="left">内容</p>
						<div class="date"></div>
					</div>
					<div class="clear"></div>
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
	</div>
</body>
</html>
