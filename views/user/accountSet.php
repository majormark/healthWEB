<?php include_once '../base.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>咚咚运动|个人设置</title>
<script type="text/javascript"
	src="http://localhost/healthWEB/static/script/jquery-1.11.3.js"></script>
<link rel="stylesheet" type="text/css"
	href="http://localhost/healthWEB/static/css/user/accountSet.css" />
<link rel="stylesheet"
	href="http://localhost/healthWEB/static/css/base/bootstrap.min.css" />


<script type="text/javascript"
	src="http://localhost/healthWEB/static/script/bootstrap.min.js"></script>

</head>
<?php

$links = array();
$links[] = array(
    "基本信息",
    "/healthWEB/views/user/accountSet.php",
    "glyphicon glyphicon-user"
);
$links[] = array(
    "账号安全",
    "/healthWEB/views/user/accountsafe.php",
    "glyphicon glyphicon-wrench"
);
$self_page = $_SERVER['PHP_SELF'];
?>

<?php 
    			         require_once('../../model/sqlHelper/connect.php');
    			         $db=new MyDB();
    			         if(!$db){
    			             echo $db->lastErrorMsg();
    			         }
    			         $user=$_SESSION['username'];
    			         $sql =<<<EOF
      SELECT * FROM user where nickname='$user'
EOF;
    			         $ret = $db->query($sql);
    			         if(!$ret){
    			             echo $db->lastErrorMsg();
    			         }
    			         
    			         $info='';
    			         while($row=$ret->fetchArray(SQLITE3_ASSOC)){
    			             $info.=formatSay($row['sex'],$row['birthday'],$row['address'],$row['hobby'],$row['content']);
    			         }
    			         
    			         function formatSay($sex,$birthday,$address,$hobby,$content){
    			             $birth=explode("-",$birthday);
    			             $str="";
    			             if($sex==1){
    			                 $str.='<li>　　性别<input class="item-radio" type="radio" name="sex" value="male" checked="checked"/>男<input 
									class="item-radio" type="radio" name="sex" value="female" />女
								</li>';
    			             } else {
    			                 $str.='<li>　　性别<input class="item-radio" type="radio" name="sex" value="male" />男<input
									class="item-radio" type="radio" name="sex" value="female" checked="checked"/>女
								</li>';
    			             }
    			             
    			             $str.= '
		             		<li>　　生日<input class="item" type="text" name="year" value="'.$birth[0].'" /><select class="item-select" name="month">';
										
							for($i=1;$i<13;$i++){
								    $str.='<option ';
								    if($i==$birth[1]){
								        $str.='selected="selected"';
								    }
								        $str.='>'.$i.'</option>';
							}	
							$str.='</select><select class="item-select" name="day">';
							for($i=1;$i<=31;$i++){
							    $str.='<option ';
								    if($i==$birth[2]){
								        $str.='selected="selected"';
								    }
								        $str.='>'.$i.'</option>';
							}
							$str.='</select></li>
								<li>　所在地<input type="text" class="item" name="location" value="'.$address.'"></li>
										
								<li>　　兴趣<input class="item" type="text" name="hobby" value="'.$hobby.'"/></li>
								<li>运动宣言<textarea class="content" name="content" rows="2" cols="40" >'.$content.'</textarea></li>
		    ';
							return $str;
    			         }
?>
<body>
	<div class="body">
		<div class="nav-frame">
			<div class="nav-title">
				<h3>个人设置</h3>
			</div>
			<div class="nav-wrap">
				<ul class="nav-ul">
            <?php
            foreach ($links as $link) {
                printf('<li class="item"><a %s href="%s"><span class="%s"></span><span class="nav-con">%s</span></a></li>', $self_page == $link[1] ? ' class="on"' : '', $link[1], $link[2], $link[0]);
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
						<form action="http://localhost/healthWEB/controller/user/accountSet_controller.php" method="post">
							<ul class="info">
								<?php echo $info;?>
                                 <li><span style="font-size: 10px;color:red;margin-left:80px;">
							     <?php 
							     if(!empty($_GET['errno'])) {
							         $errno=$_GET['errno'];
							         if($errno==2){
							             echo '修改成功!';
							         } 
							     }
							     ?>
							</span></li>
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
</body>
</html>
