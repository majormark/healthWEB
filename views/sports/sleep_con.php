<?php include '../base.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>咚咚运动|睡眠分析</title>
    <script type="text/javascript" src="http://localhost/healthWEB/static/script/jquery-1.11.3.js"></script>
    <link rel="stylesheet" type="text/css" href="http://localhost/healthWEB/static/css/mySports/sleep_con.css" />
    <link rel="stylesheet"  href="http://localhost/healthWEB/static/css/base/bootstrap.min.css" />
    <script type="text/javascript" src="http://localhost/healthWEB/static/script/laydate/laydate.js"></script>
<script type="text/javascript" src="http://localhost/healthWEB/static/script/Highcharts-4.1.9/js/highcharts.js"></script>
    
</head>
<?php

$links = array();
$links[]=array("我的运动","mySports.php","glyphicon glyphicon-user");
$links[]=array("身体管理","body_con.php","glyphicon glyphicon-heart");
$links[]=array("睡眠分析","sleep_con.php","glyphicon glyphicon-eye-close");
$self_page = basename($_SERVER['PHP_SELF']);
?>
<?php 
    			         require_once('../../model/sqlHelper/connect.php');
    			         if(!empty($_GET['date'])){
    			             $date=$_GET['date'];
    			         } else {
    			             $date=date("Y-m-d");
    			         }
    			         $db=new MyDB();
    			         if(!$db){
    			             echo $db->lastErrorMsg();
    			         }
    			         $user=$_SESSION['username'];
    			         $sql =<<<EOF
      SELECT * FROM sleep where date='$date' and username='$user'
EOF;
    			         $ret = $db->query($sql);
    			         if(!$ret){
    			             echo $db->lastErrorMsg();
    			         }
    			         
    			         $row=$ret->fetchArray(SQLITE3_ASSOC);
    			         if($row){
    			             $start=$row['start_time'];
    			             $end=$row['end_time'];
    			             $total_time=$row['total_time'];
    			             $slight=$row['slight_time'];
    			             $deep=$row['deep_time'];
    			             $use_time=$slight+$deep;
    			             $use_rate=$use_time/$total_time;
    			             $pre=$row['pre_time'];
    			             $wake_num=$row['wake_num'];
    			             $wake=$row['wake_time'];
    			         }else{
    			             $start=0;
    			             $end=0;
    			             $total_time=0;
    			             $slight=0;
    			             $deep=0;
    			             $use_time=0;
    			             $use_rate=0;
    			             $pre=0;
    			             $wake_num=0;
    			             $wake=1;
    			         }
    			         
    			    
?>
<body>
<div class="body">
    <div class="nav-frame">
        <div class="nav-title">
            <h3>健康管理</h3>
        </div>
        <div class="nav-wrap">
            <ul class="nav-ul">
            <?php
                foreach($links as $link){
                   printf('<li class="item"><a %s href="%s"><span class="%s"></span><span class="nav-con">%s</span></a></li>' , $self_page==$link[1]?' class="on"':'' , $link[1],$link[2], $link[0]);
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
        <div class="title">
            <h3>咚咚睡眠<h3/>
        </div>
        <div class="sleep-analyse">
            <div class="wrap">
            <div class="demo1">
            <form action="http://localhost/healthWEB/controller/sports/sleep_controller.php" method="post" >
                <span>你
                    <?php 
                    if($date==date("Y-m-d"))
                        echo '今天';
                    else 
                        echo $date;
                        ?>的睡眠情况</span>
                <input class="laydate-icon" id="demo" name="date_select"> <input  type="submit" name="submit"> 
            </div>
                <div class="circle-result">
                    <p class="sleep-lv">睡眠有效率</p>
                    <p class="percent-lv" ><?php echo round($use_rate,3)*100;?>%</p>
                </div>
                <div class="start">
                    <ul>
                        <li>睡眠开始</li>
                        <li><?php echo $start;?></li>
                    </ul>
                </div>
                <div class="end">
                    <ul>
                        <li>睡眠结束</li>
                        <li><?php echo $end;?></li>
                    </ul>
                </div>
                <div class="total">
                    <ul>
                        <li>睡眠总时长</li>
                        <li><span class="special-num"><?php echo floor($total_time/60);?></span>小时<span class="special-num"><?php echo $total_time%60;?></span>分</li>
                    </ul>
                </div>
                <div class="useful">
                    <ul>
                        <li>有效睡眠</li>
                        <li><span class="special-num"><?php echo floor($use_time/60);?></span>小时<span class="special-num"><?php echo $use_time%60;?></span>分</li>
                    </ul>
                </div>
            </div>
            <div class="wrap2">
                <div class="title-small">
                    <h4>睡眠情况组成</h4>
                </div>
                <div id="circle">
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script>
!function(){
laydate.skin('molv');//切换皮肤，请查看skins下面皮肤库
laydate({elem: '#demo'});//绑定元素
}();
//日期范围限制
var start = {
    elem: '#start',
    format: 'YYYY-MM-DD',
    min: laydate.now(), //设定最小日期为当前日期
    max: '2099-06-16', //最大日期
    istime: true,
    istoday: false,
    choose: function(datas){
         end.min = datas; //开始日选好后，重置结束日的最小日期
         end.start = datas //将结束日的初始值设定为开始日
    }
};
var end = {
    elem: '#end',
    format: 'YYYY-MM-DD',
    min: laydate.now(),
    max: '2099-06-16',
    istime: true,
    istoday: false,
    choose: function(datas){
        start.max = datas; //结束日选好后，充值开始日的最大日期
    }
};
laydate(start);
laydate(end);
//自定义日期格式
laydate({
    elem: '#test1',
    format: 'YYYY年MM月DD日',
    festival: true, //显示节日
    choose: function(datas){ //选择日期完毕的回调
        alert('得到：'+datas);
    }
});
//日期范围限定在昨天到明天
laydate({
    elem: '#hello3',
    min: laydate.now(-1), //-1代表昨天，-2代表前天，以此类推
    max: laydate.now(+1) //+1代表明天，+2代表后天，以此类推
});
</script>

<script language="JavaScript">
$(document).ready(function() {  
   var chart = {
       plotBackgroundColor: null,
       plotBorderWidth: null,
       plotShadow: false,
       backgroundColor: 'rgba(0,0,0,0)'
   };
   var title = {
      text: null   
   };      
   var tooltip = {
      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
   };
   var plotOptions = {
      pie: {
         allowPointSelect: true,
         cursor: 'pointer',
         dataLabels: {
            enabled: true,
            format: '<b>{point.name}</b>: {point.percentage:.1f} %',
            style: {
               color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
            }
         }
      }
   };
   var series= [{
      type: 'pie',
      name: 'sleep share',
      data: [
         ['入睡时间',   <?php echo $pre;?>],
         ['浅度睡眠',    <?php echo $slight;?>],
         {
            name: '深度睡眠',
            y: <?php echo $deep;?>,
            sliced: true,
            selected: true
         },
         ['清醒时间',    <?php echo $wake;?>]
        
      ]
   }];     
      
   var json = {};   
   json.chart = chart; 
   json.title = title;     
   json.tooltip = tooltip;  
   json.series = series;
   json.plotOptions = plotOptions;
   $('#circle').highcharts(json);  
});
</script>
</body>
</html>
