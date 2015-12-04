<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>咚咚运动|我的建议</title>
<script type="text/javascript"
	src="http://localhost/healthWEB/static/script/jquery-1.11.3.js"></script>
<link rel="stylesheet" type="text/css"
	href="http://localhost/healthWEB/static/css/user/ex_accountSet.css" />

<link rel="stylesheet"
	href="http://localhost/healthWEB/static/css/base/bootstrap.min.css" />
<script type="text/javascript"
	src="http://localhost/healthWEB/static/script/bootstrap.min.js"></script>
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
				<div class="tabbable tabs-below" id="tabs-538977">
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#panel-783427">个人资料</a></li>
						<li><a data-toggle="tab" href="#panel-524521">头像设置</a></li>
					</ul>


				</div>
			</div>

			<div class="frame-wrap">
	           <div class="tab-content">
					<div class="tab-pane active" id="panel-783427">
						<form action="#" method="post">
							<ul class="info">
								<li>　　昵称<input class="item" type="text" name="nickname" /></li>
								<li>　　性别<input class="item-radio" type="radio" name="sex" value="male" />男<input 
									class="item-radio" type="radio" name="sex" value="female" />女
								</li>
								<li>　　生日<input class="item" type="text" name="year" /><select class="item-select" name="month"><option>8</option>
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option></select>
										
										<select class="item-select" name="day"><option>1</option></select></li>
								<li>　所在地<select class="item" name="location">
								        <option>北京</option>
										<option>上海</option>
										<option>昆明</option>
										<option>广州</option>
										<option>南京</option></select></li>
										
								<li>　　兴趣<input class="item" type="text" name="nickname" /></li>
								<li>个人简介<textarea class="content" name="content" rows="2" cols="40" ></textarea></li>
								<li><input class="btn" type="submit" name="save" value="保存"/></li>
							</ul>

						</form>
					</div>

					<div class="tab-pane" id="panel-524521">
						<img src="http://localhost/healthWEB/static/vendor/image/0.jpg">
						<form action="#" method="post" enctype="multipart/form-data">
						      <ul>
						          <li><input class="upfile" type="file" name="up_image" /></li>
						          <p>注意：头像图片只支持jpeg,jpg,png,gif,bmp格式;头像文件须小于5M;</p>
						          <li><input class="btn" type="submit" name="submit" value="上传" /></li>
						      </ul>
						      
						</form>
					</div>
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
</body>
</html>