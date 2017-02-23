<?php 
require_once '../include.php';
$id=$_REQUEST['id'];
$link=mysqli_connect(HOST,USERNAME,PASSWORD,DB);
$sql="select * from admin where id='$id'";
$row=fetchOne($sql, $link);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
</head>
<body>
<h3>编辑管理员</h3>
<form action="doAdminAction.php?act=editAdmin&&id=<?php echo $row['id'];?>" method="post">
<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
	<tr>
		<td align="right">管理员名称</td>
		<td><input type="text" name="adminName" value="<?php echo $row['adminName'];?>"/></td>
	</tr>
	<tr>
		<td align="right">管理员密码</td>
		<td><input type="password" name="password" value="<?php echo $row['password'];?>"/></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit"  value="编辑管理员"/></td>
	</tr>
	<?php 
	mysqli_close($link);
	?>
</table>
</form>
</body>
</html>
