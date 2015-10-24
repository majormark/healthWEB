<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="http://localhost/healthWEB/static/css/base/base.css">
<link rel="stylesheet" type="text/css" href="http://localhost/healthWEB/static/css/base/bootstrap.min.css" />

<script type="text/javascript" src="http://localhost/healthWEB/static/script/bootstrap.js"></script>
<script type="text/javascript" src="http://localhost/healthWEB/static/script/jquery-1.11.3.js"></script>

   <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
</head>
<body>

<!-- 代码部分begin -->
<div class="ue-bar">
    <div class="ue-bar-wrap">
    	<div class="ue-bar-logo">
    		<a href="#">
                
            </a>
    	</div>
    	<div class="ue-bar-nav">
	        <ul class="nav-left">
	            <li class="nav-item"><a href='http://localhost/healthWEB/views/index.php'>首页</a></li>
	    		<li class="nav-item"><a href='http://www.lanrenzhijia.com/nav/'>运动</a></li>
	    		<li class="nav-item"><a href='http://www.lanrenzhijia.com/time/'>竞赛</a></li>
	    		<li class="nav-item"><a href='http://www.lanrenzhijia.com/tab/'>活动</a></li>
	    	</ul>
	    	<ul class="nav-right">
	    		<?php 
	    		     if(!empty($_GET["username"])) {
	    		         echo '<li class="nav-item dropdown" id="login_dropdown">
                            <a id="user" href="#" class="dropdown-toggle" data-toggle="dropdown" >hi,'.$_GET["username"].'<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="user">
                                <li ><a   href="#">个人信息</a></li>
                                <li ><a   href="/logout">注销</a></li>
                            </ul>
                        </li>';
	    		     } else {
	    		         
	    		         echo '<li class="nav-item nav-login"><a href="http://localhost/healthWEB/views/login.php">登录</a></li>';
	    		     }
	    		?>   	    	
	    		
	        </ul>
        </div>
    </div>
</div>

<!-- 代码部分end -->

</body>
</html>