<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>咚咚运动|咨询专家</title>
<script type="text/javascript"
	src="http://localhost/healthWEB/static/script/jquery-1.11.3.js"></script>
<link rel="stylesheet" type="text/css"
	href="http://localhost/healthWEB/static/css/user/activity_modify.css" />

<link rel="stylesheet"
	href="http://localhost/healthWEB/static/css/base/bootstrap.min.css" />

</head>
<?php 
require_once('../../model/sqlHelper/connect.php');

$expert=$_GET['expert'];

?>
<body>

<!--遮罩窗体  -->

	
	<div class="theme-popover2">
		<div class="theme-poptit2">
			<a href="http://localhost/healthWEB/views/suggestion/expertSelect.php" title="关闭" class="close">×</a>
			<h3>被咨询人<?php echo $expert;?></h3>
		</div>
		<div class="content">
		    <form action="http://localhost/healthWEB/controller/suggestion/question_controller.php?op=1" method="post">
		        <ul>
		          <li>问题 <input  class="item" type="text" name="question" /></li>
		          <li>详细描述<textarea class="detail" name="detail"></textarea></li>
		          <li><input class="btn" type="submit" name="submit" value="提交"/><a href="http://localhost/healthWEB/views/suggestion/expertSelect.php">　　back</a></li>
		          <li><input type="hidden" name="expert" value="<?php echo $expert;?>">
		        </ul>
		    </form>
		</div>
	</div>

</body>
</html>