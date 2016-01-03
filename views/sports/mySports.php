<?php include '../base.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>咚咚运动|我的运动</title>
    <script type="text/javascript" src="http://localhost/healthWEB/static/script/jquery-1.11.3.js"></script>
    <link rel="stylesheet" type="text/css" href="http://localhost/healthWEB/static/css/mySports/mySports.css" />
    <link rel="stylesheet"  href="http://localhost/healthWEB/static/css/base/bootstrap.min.css" />
    <script type="text/javascript" src="http://localhost/healthWEB/static/script/laydate/laydate.js"></script>
    
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
      SELECT * FROM sports where date='$date' and username='$user'
EOF;
    			         $ret = $db->query($sql);
    			         if(!$ret){
    			             echo $db->lastErrorMsg();
    			         }
    			         
    			         $row=$ret->fetchArray(SQLITE3_ASSOC);
    			         if($row){
    			             $steps=$row['steps'];
    			             $distance=$row['distance'];
    			             $energy=$row['energy'];
    			             $total_time=$row['total_time'];
    			             $goal=$row['goal'];
    			             
    			         }else{
    			             $steps=0;
    			             $distance=0;
    			             $energy=0;
    			             $total_time=0;
    			             $goal=0;
    			         }
    			         $sql =<<<EOF
      SELECT * FROM sports where username='$user'
EOF;
    			         $ret = $db->query($sql);
    			         if(!$ret){
    			             echo $db->lastErrorMsg();
    			         }
    			         $total_distance=0;
    			         $total_energy=0;
    			         $total_day=0;
    			         while($row=$ret->fetchArray(SQLITE3_ASSOC)){
    			             $total_distance+=$row['distance'];
    			             $total_energy+=$row['energy'];
    			             $total_day+=1;
    			         }
    			         $road=round($total_distance/400,1);
    			         $meat=round($total_energy/8000,1);
    			         $gas=round($total_energy/8000,1);
    			         $light=round(($total_energy*4.1858518)/(60*3600),1);
    			         
    			         $sql =<<<EOF
      SELECT username, sum(distance) as total_distance FROM sports group by username order by total_distance desc
EOF;
    			         $ret = $db->query($sql);
    			         if(!$ret){
    			             echo $db->lastErrorMsg();
    			         }
    			         $rank_list="";
    			         $count=1;
    			         while($row=$ret->fetchArray(SQLITE3_ASSOC)){
    			             if($count==1){
    			                 $rank_list.='<li><span class="badge one" >'.$count.'</span>'.$row['username'].'<span class="dis">'.round($row['total_distance']/1000,1).'</span>km</li>';
    			             }else if($count==2){
    			                 $rank_list.='<li><span class="badge two" >'.$count.'</span>'.$row['username'].'<span class="dis">'.round($row['total_distance']/1000,1).'</span>km</li>';
    			             }else if($count==3){
    			                 $rank_list.='<li><span class="badge three" >'.$count.'</span>'.$row['username'].'<span class="dis">'.round($row['total_distance']/1000,1).'</span>km</li>';
    			             }else{
    			                 $rank_list.='<li><span class="badge other" >'.$count.'</span>'.$row['username'].'<span class="dis">'.round($row['total_distance']/1000,1).'</span>km</li>';
    			             }
    			             $count++;
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
        <div class="health-con">
            <div class="title">
                <h3>运动状况<h3/>
            </div>
            <div class="wrap">
                <div class="demo1">
                <form action="http://localhost/healthWEB/controller/sports/sports_controller.php" method="post" >
                    <span>你
                    <?php 
                    if($date==date("Y-m-d"))
                        echo '今天';
                    else 
                        echo $date;
                        ?>的运动情况</span>
                    <input class="laydate-icon" id="demo" name="date_select"/> <input  type="submit" name="submit"/> 
                </form>
                </div>
                <div class="sport-distance">
                    <ul>
                        <li>运动距离</li>
                        <li><span class="special-num"><?php echo round($distance/1000,1);?></span>公里</li>
                    </ul>
                </div>
                <div class="sport-time">
                    <ul>
                        <li>运动时长</li>
                        <li><span class="special-num"><?php echo floor($total_time/60);?></span>小时<span class="special-num"><?php echo floor($total_time%60);?></span>分</li>
                    </ul>
                </div>
                <div class="sport-energy">
                    <ul>
                        <li>燃烧热量</li>
                        <li><span class="special-num"><?php echo $energy;?></span>大卡</li>
                    </ul>
                </div>
                <div class="sport-step">
                    <ul>
                        <li>运动步数</li>
                        <li><span class="special-num"><?php echo $steps;?></span>步</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="sports-total">
            <div class="title">
                <h3>你的运动总量<h3/>
            </div>
            <div class="wrap">
                <div class="distance"><img src=../../static/vendor/image/walk.png><ul><li>累计运动距离</li><li><span><?php echo round($total_distance/1000,1);?></span>公里</li></ul></div>
                <div class="time"><img src=../../static/vendor/image/total_time.png><ul><li>累计运动时间</li><li><span><?php echo $total_day;?></span>天</li></ul></div>
                <div class="energy"><img src=../../static/vendor/image/hot.png><ul><li>累计燃烧热量</li><li><span><?php echo $total_energy;?></span>大卡</li></ul></div>
            </div>
        </div> 
        <div class="transfer">
            <div class="title">
                <h3>这些运动量可以<h3/>
            </div>
            <div class="wrap">
                <div class="circle">
                    <ul>
                        <li><img style="margin-top: 20px;" src="http://localhost/healthWEB/static/vendor/image/road.png" /></li>
                        <li style="color:white;margin-top: 10px;">绕环形跑道(圈)</li>
                        <li><span style="font-size:34px;color:white;font-weight: bold;"><?php echo $road;?></span></li>
                    </ul>
                </div>
                <div class="meat">
                    <ul>
                        <li><img style="margin-top: 20px;" src="http://localhost/healthWEB/static/vendor/image/meat.png" /></li>
                        <li style="color:white;margin-top: 6px;">消耗肥肉(公斤)</li>
                        <li><span style="font-size:34px;color:white;font-weight: bold;"><?php echo $meat;?></span></li>
                    </ul>
                </div>
                <div class="gas">
                    <ul>
                        <li><img style="margin-top: 20px;" src="http://localhost/healthWEB/static/vendor/image/gas.png" /></li>
                        <li style="color:white;margin-top: 14px;">省93#汽油(升)</li>
                        <li><span style="font-size:34px;color:white;font-weight: bold;"><?php echo $gas;?></span></li>
                    </ul>
                </div>
                <div class="light">
                    <ul>
                        <li><img style="margin-top: 20px;" src="http://localhost/healthWEB/static/vendor/image/light.png" /></li>
                        <li style="color:white;margin-top: 4px;">60W灯泡亮(小时)</li>
                        <li><span style="font-size:34px;color:white;font-weight: bold;"><?php echo $light;?></span></li>
                    </ul>
                </div>
            </div>
        </div> 
        <div class="rank">
            <div class="title">
                <h3>排行榜</h3>
            </div>
             <div class="wrap">
                <ul>
                    <?php echo $rank_list;?>
                </ul>
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
</body>
</html>