<?php include '../base.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>咚咚运动|我的建议</title>
<script type="text/javascript"
	src="http://localhost/healthWEB/static/script/jquery-1.11.3.js"></script>
<link rel="stylesheet" type="text/css"
	href="http://localhost/healthWEB/static/css/mySports/mySuggestion.css" />

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
    			         $user=$_SESSION['username'];
    			         $sql1 =<<<EOF
      SELECT * FROM suggestion s, user u where s.expert =u.nickname and s.user='$user' and u.role='doctor'
EOF;
    			         $ret = $db->query($sql1);
    			         if(!$ret){
    			             echo $db->lastErrorMsg();
    			         }
    			         
    			         $doctor_list='';
    			         while($row=$ret->fetchArray(SQLITE3_ASSOC)){
    			             $doctor_list.=formatSay($row['nickname'],$row['question'],$row['detail'],$row['answer']);
    			         }
    			         $sql2 =<<<EOF
      SELECT * FROM suggestion s, user u where s.expert =u.nickname and s.user='$user' and u.role='coach'
EOF;
    			         $ret = $db->query($sql2);
    			         if(!$ret){
    			             echo $db->lastErrorMsg();
    			         }
    			         
    			         $coach_list='';
    			         while($row=$ret->fetchArray(SQLITE3_ASSOC)){
    			             $coach_list.=formatSay($row['nickname'],$row['question'],$row['detail'],$row['answer']);
    			         }
    			        
    			         function formatSay($expert,$question,$detail,$answer){
    			             $str= '
		          <div class="list">
					
					<div class="info">
    			        <ul>
						  <li><span class="left"><a href="#"><strong>'.$expert.'</strong></a></span></li>';
    			             
							$str.='
						<li><p class="left">问题：'.$question.'</p></li>
    			        <li><p class="left">详细：'.$detail.'</p></li>
    			         <li><p class=left>回复：'.$answer.'</p></li>
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
						
					</div>

					<div class="tab-pane" id="panel-524521">
					<?php echo $doctor_list;?>
						
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