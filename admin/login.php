<?php require_once '../include.php';?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>登陆</title>
<link type="text/css" rel="stylesheet" href="../styles/reset.css">
<link type="text/css" rel="stylesheet" href="../styles/main.css">
<!--[if IE 6]>
<script type="text/javascript" src="../scripts/DD_belatedPNG_0.0.8a-min.js"></script>
<script type="text/javascript" src="../scripts/ie6Fixpng.js"></script>
<![endif]-->
</head>

<body>
<h1 class="welcome-title">欢迎登陆后台管理系统</h1>

<div class="loginBox">
	<div class="login-cont">
	<form action="doLogin.php" method="post">
			<ul class="login">
				<li class="l-tit">管理员帐号</li>
				<li class="mb-10"><input type="text"  name=adminName placeholder="请输入管理员帐号"class="login-input"></li>
				<li class="l-tit">密码</li>
				<li class="mb-10"><input type="password"  name="password" class="login-input"></li>
				<li class="l-tit">验证码</li>
				<li class="mb-10"><input type="text"  name="verify" class="login-input"></li>
				<li class="l-tit"><img onclick="refreshVerify(this);" src="../lib/image.func.php" alt="验证码" title="点击刷新" /></li>
				<li class="autoLogin"><input type="checkbox" id="a1" class="checked" name="autoFlag" value="1"><label for="a1">自动登陆(一周内自动登陆)</label></li>
				<li><button type="submit" class="login-btn">登录</button></li>
			</ul>
		</form>
	</div>
</div>

<div class="hr_25"></div>
<script type="text/javascript">
    function refreshVerify(e) {
        e.src="";
    	e.src="../lib/image.func.php";
    }
</script>
</body>
</html>
