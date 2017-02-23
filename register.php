<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>注册</title>
	<link rel="stylesheet" type="text/css" href="styles/reset.css">
	<link rel="stylesheet" type="text/css" href="styles/main.css">
</head>
<body>
<div class="header-bar">
	<div class="top-bar">
		<div class="common-width">
			<div class="right-area">
				<a href="index.php">首页</a>|
				<a href="">注册</a>|
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
</div>

<hr class="hr-10">
<div>
	<div class="common-width register">
		<p>注册信息(*为必填项)</p>
		<hr style="position: relative;top: 52px;width: 90%;margin: 0 auto;">
		<form action="doUserAction.php?act=addUser" method="post" id="form">	
			<ul>
				<li>
					<span>*用户名:</span>
					<input type="text" name="username" onblur="checkMes(this.value, 0);">
					<span id="checkUserName"></span>
				</li>
				<li>
					<span>*登录密码:</span>
					<input type="password" name="password" onblur="checkMes(this.value, 1);">
					<span id="checkPassword"></span>
				</li>
				<li>
					<span>*确认密码:</span>
					<input type="password" name="" onblur="checkMes(this.value, 2);">
					<span id="confirmPassword"></span>
				</li>
				<li>
					<span>*真实姓名:</span>
					<input type="text" name="realname" onblur="checkMes(this.value, 3);">
					<span id="checkRealName"></span>
				</li>
				<li>
					<span>*身份证号:</span>
					<input type="text" name="identity" onblur="checkMes(this.value, 4);">
					<span id="checkIdentity"></span>
				</li>
				<li>
					<span>*手机号:</span>
					<input type="text" name="phone" onblur="checkMes(this.value, 5);">
					<span id="checkPhone"></span>
				</li>
				<li>
				<input type="checkbox" name="" id="a1" class="checked" checked> 
				<label for="a1">我已同意遵守</label><a href="">《预约挂号协议》</a><span id="checkDeal"></span>
				</li>
				<li>
					<button class="login-btn">注册</button>
				</li>
			</ul>
		</form>
	</div>
</div>


<div class="hr-25"></div>
<div class="footer">
	<p><a href="">招贤纳士</a><i>|</i><a href="">联系我们</a><i>|</i><span>客服热线: 10010</span></p>
	<pre>Copyright © 2016 - 2017 个人版权所有   粤ICP备00000000号   粤ICP证00000-0000号   某市公安局XX分局备案编号：123456789123</pre>
	<p><a href=""><img src="images/webLogo.jpg" alt=""></a>&nbsp;&nbsp;<a href=""><img src="images/webLogo.jpg" alt=""></a></p>
</div>
<script type="text/javascript">
var img = document.createElement("img")
img.src = "images/icon/true.jpg";
img.style.width = "20px";
img.style.height = "20px";
var password;
function checkMes (text,index) {
	var span;
	var pattern;
	var tips;	
	switch (index) {
		case 0:
			pattern = /^\w*\w{6,15}\w*$/;
			span = document.getElementById("checkUserName");
			tips = "6~15位数字、字母";
			break;
		case 1:
		    password = text;
			pattern = /^\S*\S{6,15}\S*$/;
			span = document.getElementById("checkPassword");
			tips = "6~15位数字、字母、标点符号";
			break;
		case 2:
		    tips = "密码不一致";
			if (text === password) {
				pattern = /^\S*\S{6,15}\S*$/;
				if (text == "") {
					tips = "请重复密码";
				}
			} else if(text !== password) {
				pattern = /\w{100,}/;
				if (text == "") {
					tips = "请重复密码";
				}
			}
			span = document.getElementById("confirmPassword");			
			break;
		case 3:
			pattern = /^[\u4e00-\u9fa5]{2,4}$/;
			span = document.getElementById("checkRealName");
			tips = "请正确输入姓名";
			break;
		case 4:
			pattern = /(^\d{15}$)|(^\d{17}([0-9]|X)$)/;
			span = document.getElementById("checkIdentity");
			tips = "请正确输入身份证号码";
			break;
		case 5:
			pattern = /^1[34578]{1}\d{9}$/;
			span = document.getElementById("checkPhone");
			tips = "请正确输入手机号码";
			break;
	}
	if (pattern.test(text)) {
		span.textContent = "";
		span.appendChild(img);
		return true;
	} 
	else {
		span.textContent = tips;
		span.style.color = "red";
	    span.style.fontSize = "14px";
		return false;
	}
}
document.getElementById("form").onsubmit = function () {
	var input = document.getElementsByTagName("input");
	for (var i = 0; i < input.length-1; i++) {
	       var k = checkMes(input[i].value, i);
	       if (!k) {
	    	   alert("请完善信息");
		       return false;
	       }
	}
	var checkDeal = document.getElementById("a1").checked;
	if (!checkDeal) {
		alert("请同意协议");
	}
	return true && checkDeal;
}
</script>
</body>
</html>