<?php include '../base.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>咚咚运动|我的建议</title>
<script type="text/javascript"
	src="http://localhost/healthWEB/static/script/jquery-1.11.3.js"></script>
<link rel="stylesheet" type="text/css"
	href="http://localhost/healthWEB/static/css/mySports/expertSelect.css" />

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
    "我的建议",
    "mySuggestion.php",
    "glyphicon glyphicon-comment"
);
$links[] = array(
    "专家选择",
    "expertSelect.php",
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
    			         $sql1 =<<<EOF
      SELECT * FROM user where role ='doctor' and state=1
EOF;
    			         $ret = $db->query($sql1);
    			         if(!$ret){
    			             echo $db->lastErrorMsg();
    			         }
    			         
    			         $doctor_list='';
    			         while($row=$ret->fetchArray(SQLITE3_ASSOC)){
    			             $doctor_list.=formatSay($row['nickname'],$row['content']);
    			         }
    			         $sql2 =<<<EOF
      SELECT * FROM user where role ='coach' and state=1
EOF;
    			         $ret = $db->query($sql2);
    			         if(!$ret){
    			             echo $db->lastErrorMsg();
    			         }
    			         
    			         $coach_list='';
    			         while($row=$ret->fetchArray(SQLITE3_ASSOC)){
    			             $coach_list.=formatSay($row['nickname'],$row['content']);
    			         }
    			        
    			         function formatSay($expert,$content){
    			             $str= '
		          <div class="list">
					<a href="#"><img
						src="http://localhost/healthWEB/static/vendor/image/2.jpg" alt="" /></a>
					<div class="info">
						<span class="left"><a href="#"><strong>'.$expert.'</strong></a></span> <span
							class="right">';
							if(isJoin($expert,$_SESSION['username'])){
    			                 $str.='<a href="http://localhost/healthWEB/controller/suggestion/expertSelect_controller.php?expert='.$expert.'&op=out">取消选择</a><a href="http://localhost/healthWEB/views/suggestion/question.php?expert='.$expert.'">　咨询</a></span><br />';
    			             } else{
    			                 $str.='<a href="http://localhost/healthWEB/controller/suggestion/expertSelect_controller.php?expert='.$expert.'&op=join">选择</a></span><br />';
    			             }
							
							$str.='
						<p class="left">'.$content.'</p><br/>
					</div>
					<div class="clear"></div>
				</div>
		    ';
							return $str;
    			         }
    			         
    			     function isJoin($expert,$username){
    			         $db=new MyDB();
    			         if(!$db){
    			             echo $db->lastErrorMsg();
    			         }
    			         $sql =<<<EOF
      SELECT * FROM health_work where expert='$expert' and user='$username' 
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
						<li class="active"><a data-toggle="tab" href="#panel-783427">教练</a></li>
						<li><a data-toggle="tab" href="#panel-524521">医生</a></li>
					</ul>
				</div>
			</div>

			<div class="frame-wrap">
				<div class="tab-content">
					<div class="tab-pane active" id="panel-783427">
					   <?php echo $coach_list;?>
<!-- 						<div class="coach-list list"> -->
<!-- 							<a href="#"><img -->
<!-- 								src="http://localhost/healthWEB/static/vendor/image/2.jpg" -->
<!-- 								alt="" /></a> -->
<!-- 							<div class="info"> -->
<!-- 								<span class="left"><a href="#"><strong>Demo</strong></a></span> -->
<!-- 								<span class="right"><a class=" theme-login" href="javascript:;">查看详情</a></span><br /> -->
<!-- 								<p class="left">内容</p> -->
<!-- 								<div class="date"></div> -->
<!-- 							</div> -->
<!-- 							<div class="clear"></div> -->
<!-- 						</div> -->
					</div>

					<div class="tab-pane" id="panel-524521">
					   <?php echo $doctor_list;?>
<!-- 						<div class="doctor-list list"> -->
<!-- 							<a href="#"><img -->
<!-- 								src="http://localhost/healthWEB/static/vendor/image/2.jpg" -->
<!-- 								alt="" /></a> -->
<!-- 							<div class="info"> -->
<!-- 								<span class="left"><a href="#"><strong>Demo</strong></a></span> -->
<!-- 								<span class="right"><a class=" theme-login" href="javascript:;">查看详情</a></span><br /> -->
<!-- 								<p class="left">内容</p> -->
<!-- 								<div class="date"></div> -->
<!-- 							</div> -->
<!-- 							<div class="clear"></div> -->
<!-- 						</div> -->
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