<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>咚咚运动|修改活动</title>
<script type="text/javascript"
	src="http://localhost/healthWEB/static/script/jquery-1.11.3.js"></script>
<link rel="stylesheet" type="text/css"
	href="http://localhost/healthWEB/static/css/user/activity_modify.css" />

<link rel="stylesheet"
	href="http://localhost/healthWEB/static/css/base/bootstrap.min.css" />

</head>
<?php 
require_once('../../model/sqlHelper/connect.php');
$db=new MyDB();
if(!$db){
    echo $db->lastErrorMsg();
}
$id=$_GET['id'];
$sql =<<<EOF
      SELECT * FROM activity where activity_id='$id';
EOF;
$ret = $db->query($sql);
if(!$ret){
    echo $db->lastErrorMsg();
}

$act_list='';
$row=$ret->fetchArray(SQLITE3_ASSOC);
$title=$row['title'];
$detail=$row['detail'];

?>
<body>

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
			<h3>活动内容</h3>
		</div>
		<div class="content">
		    <form action="http://localhost/healthWEB/controller/user/admin_act_controller.php?op=1" method="post">
		        <ul>
		          <li>标题 <input  class="item" type="text" name="title" value="<?php echo $title;?>"/></li>
		          <li>内容<textarea class="detail" name="detail"><?php echo $detail;?></textarea></li>
		          <li><input class="btn" type="submit" name="submit" value="保存"/><a href="http://localhost/healthWEB/controller/user/admin_activity.php">　　back</a></li>
		          <li><input type="hidden" name="id" value="<?php echo $id;?>">
		        </ul>
		    </form>
		</div>
	</div>

</body>
</html>