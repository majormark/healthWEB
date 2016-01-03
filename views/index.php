
<?php include_once 'base.php';?>
<?php 
    if(empty($_SESSION['username']))
        header("Location: http://localhost/healthWEB/views/login.php");
    if($_SESSION['role']!='user')
        header("Location: http://localhost/healthWEB/views/login.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>咚咚运动|首页</title>
    <script type="text/javascript" src="http://localhost/healthWEB/static/script/jquery-1.11.3.js"></script>
    <script type="text/javascript" src="http://localhost/healthWEB/static/script/index/global.js"></script>
    <link rel="stylesheet" type="text/css" href="http://localhost/healthWEB/static/css/index.css" />
    <link rel="stylesheet"  href="http://localhost/healthWEB/static/css/base/bootstrap.min.css" />
    
</head>
<?php 
define('INCLUDE_CHECK',1); 
require_once('../model/sqlHelper/connect.php'); 
require_once('../model/friend/function.php'); 
$db = new MyDB();
if(!$db){
    echo $db->lastErrorMsg();
} 
$sql =<<<EOF
      SELECT * FROM say ORDER BY addtime DESC;
EOF;
$ret = $db->query($sql);
if(!$ret){
    echo $db->lastErrorMsg();
} 
$sayList='';
while ($row=$ret->fetchArray(SQLITE3_ASSOC)) { 
    $sayList.=formatSay($row['content'],$row['addtime'],$row['username']); 
} 

$db->close();
?> 


<body>
<div class="body">
    <div class="nav-frame">
        <div class="nav-title">
            <h3><img width="200" height="200" src="http://localhost/healthWEB/static/vendor/image/big.jpg"></h3>
        </div>
        <div class="nav-wrap">
            
        </div>
    </div>
    
    <div class="frame-outer">
        <div class="frame-say-wrap">
            
            <form id="frame-say-form" action="" method="post">
                <h3><span style="float: left">说说你正在做什么...</span><span class="counter">140</span></h3>
                <textarea id="saytxt" class="frame-say-text" name="saytxt" rows="2" cols="40"></textarea>
                <p>
                    <input class="btn" type="submit" value="发　 布" hidefocus="true"/>
                    <span class="msg"></span>
                </p>
            </form>
        </div>
        <div class="clear"></div> 
        <div class="frame-saylist-wrap">
             <?php echo $sayList;?>
             
        </div>
    </div>
</div>
</body>
</html>