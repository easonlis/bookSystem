<?php
require_once 'include.php';
$link = mysqli_connect(HOST, USERNAME, PASSWORD, DB);
mysqli_set_charset($link, DB_CHARSET);

@$date = $_REQUEST['date'];
@$all = $_REQUEST['all'];
@$disId = $_REQUEST['disId'];
if (! $all) {
    $sql = "select * from doctor where disId = '$disId'";
    $where = "disId=".$disId."&date=".$date;
} else {
    $sql = "select * from doctor";
    $where = "all=100"."&date=".$date;
}
$totalRows = getResultNum($sql, $link); // 结果集个数
$pageSize = 8; // 每页显示个数
$totalPage = ceil($totalRows / $pageSize); // 总页数
$page = $_REQUEST['page'];
if ($page < 1 || $page == null || ! is_numeric($page)) {
    $page = 1;
}
if ($page > $totalPage) {
    $page = $totalPage;
}
$offset = ($page - 1) * $pageSize; // 取值初始位置
if (! $all) {
    $sql = "select * from doctor where disId = '$disId' limit $offset,$pageSize";
} else {
    $sql = "select * from doctor limit $offset,$pageSize";
}
@$rows = fetchAll($sql, $link);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>挂号服务</title>
<link rel="stylesheet" type="text/css" href="styles/reset.css">
<link rel="stylesheet" type="text/css" href="styles/main.css">
</head>
<body>
<div class="header-bar">
	<div class="top-bar">
		<div class="common-width">
			<div class="right-area">
				<a href="index.php">首页</a>|
				<a href="register.php">注册</a>|
				<a href="">预约指南</a>
				投诉电话：020-12345
			</div>
		</div>
	</div>
	<div class="logo-bar">
		<div class="common-width">
			<h1 class="logo-text">医院预约挂号系统</h1>
			<p class="phone-text">预约热线：020-12345</p>
		</div>
	</div>
	<div class="nav-box">
		<div class="common-width menu">
			<ul class="first-nav">
				<li><a href="index.php">首页</a></li>
				<li class="nav-on"><a href="docSrcByDis.php?all=100&date=<?php echo date('Y-m-d');?>&page=1">挂号服务</a></li>
				<li><a href="bookManage.php">预约管理</a></li>
				<li><a href="payManage.php">缴费管理</a></li>
				<li><a href="">预约指南</a>
				    <ul class="second-nav hide">
						<li><a href="">预约挂号须知</a></li>
						<li><a href="">预约挂号指南</a></li>
						<li><a href="">常见疾病对应科室</a></li>
						<li><a href="">常见问题</a></li>
					</ul>
				</li>
				<li><a href="">停诊通知</a></li>
			</ul>
		</div>
	</div>
</div>

	<div class="docSrcByDis">
		<div class="commom-width">
		    <div class="book-date">预约日期：
    		    <select name="book_date" id="select">   	
    		    <?php 
    		    for ($i = 0; $i < 7; $i++){
    		        if ($date == date("Y-m-d",strtotime("+$i day"))){
    		            ?>
    		            <option value="<?php echo date("Y-m-d",strtotime("+$i day")) ?>" selected><?php echo date("Y-m-d",strtotime("+$i day")) ?></option>
    		            <?php 
    		        }else {
    		            ?>
    		             <option value="<?php echo date("Y-m-d",strtotime("+$i day")) ?>"><?php echo date("Y-m-d",strtotime("+$i day")) ?></option>
    		            <?php 
    		        }
    		    }
    		    ?>	  
    		  
    		    </select>
		        <button id="datebtn">确定</button>
		    </div>
			<table>
				<tr>
					<td class="first-td">专家/专病</td>
					<td>上午</td>
					<td>下午</td>
				</tr>
			<?php
if (! $rows) {
    echo "<tr><td colspan='3'><b>没有数据！</b></td></tr>";
} else {
    foreach ($rows as $row) {
        ?>
			    <tr>
					<td colspan="3"><i class="break-line"></i></td>
				</tr>
				<tr>
					<td class="first-td"><img src="images/doctor.jpg" style="display: block;" class="fl" alt="">
						<ul class="fl padding-t-l">
							<li><?php echo $row['docname'];?></li>
							<li><?php echo $row['position']." ".$row['department'];?></li>
							<li>简介：<?php echo $row['description'];?></li>
						</ul></td>
				<?php
        if (isset($_COOKIE['userId'])) {
            $flag = false;
            $sql = "select docId,bookdate,timeFrame from booksystem.order where userId = '{$_COOKIE['userId']}'";
            @$result = fetchAll($sql, $link);
            if ($result) {
                foreach ($result as $res) {
                    if ($res['docId'] == $row['id'] && $res['bookdate'] == $date) {
                        $flag = true;
                        if ($res['timeFrame'] == "8:30-9:30") {
                            ?>
                            <td><ul>
    				    	    <li class="fl"><input type="button" value="已预约" class="btn-on"></li>
    				    	    <li class="fl"><input type="button" value="9:30-10:30" class="btn-off"></li>			    	
    				        </ul></td>
    					    <td><ul>
    				    	    <li class="fl"><input type="button" value="14:30-15:30" class="btn-off"></li>
    				    	    <li class="fl"><input type="button" value="15:30-16:30" class="btn-off"></li>
    				        </ul></td>
                        <?php
                        } elseif ($res['timeFrame'] == "9:30-10:30") {
                            ?>
                          <td><ul>
    				    	    <li class="fl"><input type="button" value="8:30-9:30" class="btn-off"></li>
    				    	    <li class="fl"><input type="button" value="已预约" class="btn-on"></li>			    	
    				        </ul></td>
    					    <td><ul>
    				    	    <li class="fl"><input type="button" value="14:30-15:30" class="btn-off"></li>
    				    	    <li class="fl"><input type="button" value="15:30-16:30" class="btn-off"></li>
    				        </ul></td>
                        <?php
                        } elseif ($res['timeFrame'] == "14:30-15:30") {
                            ?>
                          <td><ul>
    				    	    <li class="fl"><input type="button" value="8:30-9:30" class="btn-off"></li>
    				    	    <li class="fl"><input type="button" value="9:30-10:30" class="btn-off"></li>			    	
    				        </ul></td>
    					    <td><ul>
    				    	    <li class="fl"><input type="button" value="已预约" class="btn-on"></li>
    				    	    <li class="fl"><input type="button" value="15:30-16:30" class="btn-off"></li>
    				        </ul></td>
                        <?php
                        } elseif ($res['timeFrame'] == "15:30-16:30") {
                            ?>
                          <td><ul>
    				    	    <li class="fl"><input type="button" value="8:30-9:30" class="btn-off"></li>
    				    	    <li class="fl"><input type="button" value="9:30-10:30" class="btn-off"></li>			    	
    				        </ul></td>
    					    <td><ul>
    				    	    <li class="fl"><input type="button" value="14:30-15:30" class="btn-off"></li>
    				    	    <li class="fl"><input type="button" value="已预约" class="btn-on"></li>
    				        </ul></td>
                        <?php
                        }
                    }
                }
            }
            if (! $flag) {
                ?>
                    <td><ul>
				    	<li class="fl"><input type="button" value="8:30-9:30" class="btn" index1="<?php echo $row['id'];?>" index2="0"></li>
				    	<li class="fl"><input type="button" value="9:30-10:30" class="btn" index1="<?php echo $row['id'];?>" index2="1"></li>			    	
				    </ul></td>
					<td><ul>
				    	<li class="fl"><input type="button" value="14:30-15:30" class="btn" index1="<?php echo $row['id'];?>" index2="2"></li>
				    	<li class="fl"><input type="button" value="15:30-16:30" class="btn" index1="<?php echo $row['id'];?>" index2="3"></li>
				    </ul></td>
        <?php
            }
        } else {
            ?>
				    <td><ul>
				    	<li class="fl"><input type="button" value="8:30-9:30" class="btn" index1="<?php echo $row['id'];?>" index2="0"></li>
				    	<li class="fl"><input type="button" value="9:30-10:30" class="btn" index1="<?php echo $row['id'];?>" index2="1"></li>			    	
				    </ul></td>
					<td><ul>
				    	<li class="fl"><input type="button" value="14:30-15:30" class="btn" index1="<?php echo $row['id'];?>" index2="2"></li>
				    	<li class="fl"><input type="button" value="15:30-16:30" class="btn" index1="<?php echo $row['id'];?>" index2="3"></li>
				    </ul></td>
	<?php }?>
			</tr>
			 <?php
    }
}
mysqli_close($link);
if (count($rows) > $pageSize)?>
                <tr>
					<td colspan='3' style="text-align: center;"><?php echo showPage($page,$totalPage,$where,$step="&nbsp");?></td>
				</tr>
			</table>
		</div>
	</div>

	<div class="hr-25"></div>
	<div class="footer">
		<p>
			<a href="">招贤纳士</a><i>|</i><a href="">联系我们</a><i>|</i><span>客服热线:
				10010</span>
		</p>
		<pre>Copyright © 2016 - 2017 个人版权所有   粤ICP备00000000号   粤ICP证00000-0000号   某市公安局XX分局备案编号：123456789123</pre>
		<p>
			<a href=""><img src="images/webLogo.jpg" alt=""></a>&nbsp;&nbsp;<a
				href=""><img src="images/webLogo.jpg" alt=""></a>
		</p>
	</div>
	<script type="text/javascript">
// 1.用户是否登录，没有登录提示登录
// 2.如果登录，根据用户订单修改状态
var btn = document.getElementsByClassName("btn");
for(var i = 0; i < btn.length; i++) {
	btn[i].onclick = function () {
		var myselect= document.getElementById("select");
		var index=myselect.selectedIndex ;
		var selectValue = myselect.options[index].text;
		var docId = this.getAttribute("index1");
		var timeFrame = this.getAttribute("index2");
		if (confirm("一位医师只能预约一个时间段，确定预约吗?预约费5元！")) {
			window.location = "doOrder.php?act=cOrder&index1=" + docId +"&index2=" + timeFrame +"&date=" + selectValue;
		}
	}
}
var datebtn = document.getElementById('datebtn');
datebtn.onclick = function () {
	var myselect= document.getElementById("select");
	var index=myselect.selectedIndex ;
	var selectValue = myselect.options[index].text;
	url = window.location.href;
	var index = url.indexOf("&",0);
	url=url.substring(0,index);
	window.location = url+"&date="+selectValue+"&page=1";
}
</script>
</body>
</html>