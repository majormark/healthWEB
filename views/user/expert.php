<?php session_start();?>
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
    "用户列表",
    "expert.php",
    "glyphicon glyphicon-comment"
);
$links[] = array(
    "个人设置",
    "ex_accountSet.php",
    "glyphicon glyphicon-user"
);
$links[]=array("账号安全","ex_accountSafe.php","glyphicon glyphicon-wrench");
$links[] = array(
    "导入　　 ",
    "ex_push.php",
    "glyphicon glyphicon-question-sign"
);
$self_page = basename($_SERVER['PHP_SELF']);
?>
<?php 
    			         require_once('../../model/sqlHelper/connect.php');
    			         $db=new MyDB();
    			         if(!$db){
    			             echo $db->lastErrorMsg();
    			         }
    			         $login_user=$_SESSION['username'];
    			         $sql1 =<<<EOF
      SELECT * FROM suggestion where expert='$login_user'
EOF;
    			         $ret = $db->query($sql1);
    			         if(!$ret){
    			             echo $db->lastErrorMsg();
    			         }
    			         
    			         $question_list='';
    			         while($row=$ret->fetchArray(SQLITE3_ASSOC)){
    			             $question_list.=formatSay($row['id'],$row['user'],$row['question'],$row['detail'],$row['answer']);
    			         }
    			         
    			         function formatSay($id,$user,$question,$detail,$answer){
    			             $str= '
		          <div class="list">
					<form action="http://localhost/healthWEB/controller/suggestion/question_controller.php?op=2&qid='.$id.'" method="post">
					<div class="info">
    			        <ul>
						  <li><span class="left"><a href="#"><strong>'.$user.'</strong></a></span></li>';
    			             
							$str.='
						<li><p class="left">问题：'.$question.'</p></li>
    			        <li><p class="left">问题：'.$detail.'</p></li>
    			         <li><span style="font-size:10px;">回复：</span><textarea class="answer" name="answer" rows="2" cols="60">'.$answer.'</textarea></li>
    			        <li><input class="btn1" type="submit" name="submit" value="回复" ></li>
					</div>
    			     </form>
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
				<h3>用户列表</h3>
				<p><a class="quit" href="http://localhost/healthWEB/views/login.php">退出</a></p>
				<span style="font-size: 10px;color:red;margin-left:80px;">
							     <?php 
							     if(!empty($_GET["errno"])) {
							         $errno=$_GET["errno"];
							         if($errno==2){
							             echo "回复成功!";
							         } 
							     }
							     ?>
							</span>
			</div>

			<div class="frame-wrap">
			<?php echo $question_list;?>
    			
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