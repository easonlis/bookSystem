<?php 
require_once 'include.php';
$link = mysqli_connect(HOST, USERNAME, PASSWORD, DB);
mysqli_set_charset($link, DB_CHARSET);

if (isset($_COOKIE['userId']) && isset($_COOKIE['userName'])) {
    $sql = "select * from user where id={$_COOKIE['userId']}";
    $row = fetchOne($sql, $link);
} else {
    alertMes("请登录！", "index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>医院预约挂号系统</title>
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
				<li><a href="docSrcByDis.php?all=100&date=<?php echo date('Y-m-d');?>&page=1">挂号服务</a></li>
				<li><a href="bookManage.php">预约管理</a></li>
				<li class="nav-on"><a href="payManage.php">缴费管理</a></li>
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

<div class="bookManage">
	<div class="common-width">
	<div class="book-manage">
		<div class="book-mes">
			<table>
				<tr>
					<td>真实姓名:<?php echo $row['realname'];?></td>
					<td></td>
				</tr>
				<tr>
					<td>证件号:<?php echo $row['identity'];?></td>
					<td>手机号码:<?php echo $row['phone']?></td>
				</tr>
			</table>
			<hr>			
		</div>
		
		<table cellspacing="0">
			<tr class="book-manage-table-title">
				<td>就诊登记号</td>
				<td>医生名称</td>
				<td>专科名称</td>
				<td>金额</td>
				<td>状态</td>
				<td>操作</td>
			</tr>
		<?php 
		$sql = "select * from booksystem.order where userId={$_COOKIE['userId']} and paystatue='未缴费'";
		@$result = fetchAll($sql, $link);
		if ($result) {
		    foreach ($result as $res) {
		?>   
		    <tr style="height:30px;">
		    	<td><?php echo $res['id'];?></td>
		    	<td><?php echo $res['docname'];?></td>
		    	<td><?php echo $res['docDepartment'];?></td>
		    	<td><?php echo $res['cost'];?></td>
		    	<td><?php echo $res['paystatue'];?></td>
		    	<td><a href="doOrder.php?act=pOrder&&oId=<?php echo $res['id'];?>">缴费</a></td>		    	
		    </tr>
	  <?php }
		}else {?>
		<tr>
			<td colspan="6" style="height:30px;">没有数据!</td>
		</tr>
	    <?php }?>
	    </table>
	</div>
	</div>
</div>

<div class="hr-25"></div>
<div class="footer">
	<p><a href="">招贤纳士</a><i>|</i><a href="">联系我们</a><i>|</i><span>客服热线: 10010</span></p>
	<pre>Copyright © 2016 - 2017 个人版权所有   粤ICP备00000000号   粤ICP证00000-0000号   某市公安局XX分局备案编号：123456789123</pre>
	<p><a href=""><img src="images/webLogo.jpg" alt=""></a>&nbsp;&nbsp;<a href=""><img src="images/webLogo.jpg" alt=""></a></p>
</div>
<script type="text/javascript" src="scripts/index.js"></script>
</body>
</html>