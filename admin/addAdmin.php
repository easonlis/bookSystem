<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
</head>
<body>
<h3>添加管理员</h3>
<form action="doAdminAction.php?act=addAdmin" method="post">
<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
	<tr>
		<td align="right">管理员名称</td>
		<td><input type="text" name="adminName" placeholder="请输入管理员名称"/></td>
	</tr>
	<tr>
		<td align="right">管理员密码</td>
		<td><input type="password" name="password" /></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit"  value="添加管理员"/></td>
	</tr>

</table>
</form>
</body>
</html>
