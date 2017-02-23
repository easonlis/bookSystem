<?php 
require_once 'include.php';
$link = mysqli_connect(HOST, USERNAME, PASSWORD, DB);
mysqli_set_charset($link, DB_CHARSET);
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
	<title>医院预约挂号系统</title>
	<link type="text/css" rel="stylesheet"  href="styles/reset.css">
	<link type="text/css" rel="stylesheet"  href="styles/main.css">
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
				<li class="nav-on"><a href="index.php">首页</a></li>
				<li><a href="docSrcByDis.php?all=100&date=<?php echo date('Y-m-d');?>&page=1">挂号服务</a></li>
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

<div class="play-login clearfix">
    <div class="common-width">
	    <div id="play-container" class="fl">
		    <div id="list" style="left: -730px;">
			    <img class="fl" src="images/3.jpg" alt="3">
			    <img class="fl" src="images/1.jpg" alt="1">
			    <img class="fl" src="images/2.jpg" alt="2">
			    <img class="fl" src="images/3.jpg" alt="3">
			    <img class="fl" src="images/1.jpg" alt="1">
		    </div>
		    <div id="buttons">
			    <span index='1' class="on">1</span>
			    <span index='2'>2</span>
			    <span index='3'>3</span>
		    </div>
	    </div>
	    <div class="login-mes fr">
	    	<div class="login-cont">
	    		<div class="login-title">
	    			<p>用户登录</p>
	    		</div>
	    		<form action="dologin.php" method="post">
		    		<div class="login">
		    			<ul>
		    				<li>用户名：</li>
		    				<li class="mb-10"><input type="text" class="login-text user-icon" placeholder="手机号/身份证号" name="username"></li>
		    				<li>密码：</li>
		    				<li class="mb-10"><input type="password" class="login-text user-icon" name="password"></li>
		    				<li>验证码:</li>
					        <li class="mb-10"><input type="text"  name="verify" class="login-text password_icon"></li>
					        <li><img onclick="refreshVerify(this);" src="lib/image.func.php" alt="验证码" title="点击刷新" /></li>
		    				<li class="auto-login">
		    				<input class="checked" type="checkbox" id="a1" name="autoFlag" checked><label for="a1">自动登录</label>
		    				<a href="">忘记密码？</a></li>
		    				<li><button class="login-btn">登录</button></li>
		    			</ul>
		    		</div>
	    	    </form>
	    	</div>
	    	<div class="user-mes">
	    		<h1>欢迎您!</h1>
	    		  <p><b>
	    		      <?php echo $_COOKIE['userName'];?> 
        			  <a href="doUserAction.php?act=logout" class="icon icon_e">退出</a>
			      </b></p>
			      <p>预约订单:(<a href="bookManage.php"><?php 
			      $sql = "select * from booksystem.order where userId='{$_COOKIE['userId']}'";
			      echo getResultNum($sql, $link)?></a>)</p>
			      <p>待缴费订单:(<a href="payManage.php"><?php 
			      $sql = "select * from booksystem.order where userId='{$_COOKIE['userId']}' and paystatue='未缴费'";
			      echo getResultNum($sql, $link);?></a>)</p>	    		
	    	</div>	    	
	    </div>
	    <div class="book-step">
			    <img src="images/step.jpg">
			    <img src="images/step1.jpg">
			    <img src="images/step2.jpg">
			    <img src="images/step3.jpg">
			    <img src="images/step4.jpg">
			    <img src="images/step5.jpg">
		</div>
	</div>
</div>

<div class="search-que clearfix">
	<div class="common-width">
		<div class="search fl">
			<div class="search-banner">
				<img src="images/banner2.jpg" alt="">
			</div>
			<ul class="ills">
				<?php 			
				$sql = "select * from discate";
				$result = fetchAll($sql, $link);
				foreach ($result as $res) {
				    ?>
				 <li class="clearfix">
				    <div class="fl"><?php echo $res['cateName'];?></div>
				    <ul class="ills-list fl">
				<?php 
				    $sql = "select * from disease where cateId={$res['id']}";
				    @$rows = fetchAll($sql, $link);
				    if ($rows){
				        foreach ($rows as $row) {				        				
				?>
						<li class="fl"><a href="docSrcByDis.php?disId=<?php echo $row['id'];?>&date=<?php echo date('Y-m-d');?>&page=1"><?php echo $row['disName'];?></a></li>	
				<?php 
				        }
				    }
			    ?>
			        </ul>
				</li>
				<?php
				}
				?>
			</ul>
		</div>
		<div class="que fr">
			<div class="que-title login-title">常见问题</div>
			<ul>
				<li><a href="" title="如何进行预约？">如何进行预约？</a></li>
				<li><a href="" title="网站注册时一定要填写真实的身份证信息吗？">网站注册时一定要填写真实...</a>
				</li>
				<li><a href="" title="注册时，为什么要输入手机号码？">注册时，为什么要输入手机...</a></li>
				<li><a href="" title="预约挂号可以使用哪些证件？">预约挂号可以使用哪些证件？</a></li>
				<li><a href="" title="预约成功后，怎么取号？">预约成功后，怎么取号？</a></li>
				<li><a href="" title="如何支付挂号费呢？">如何支付挂号费呢？</a></li>
				<li><a href="" title='如果我没有取消预约，又没有就诊，会有什么影响？'>如果我没有取消预约，又没有就诊...
				</a></li>
			</ul>
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
<script type="text/javascript">
    function refreshVerify(e) {
    	e.src="lib/image.func.php";
    }
</script>
</body>
</html>