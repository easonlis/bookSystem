<?php 
require_once '../include.php';
$link = mysqli_connect(HOST, USERNAME, PASSWORD, DB);
mysqli_set_charset($link, DB_CHARSET);

$sql="select * from disease";
$result = fetchAll($sql, $link);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
</head>
<body>
<h3>添加就诊医生</h3>
<form action="doAdminAction.php?act=addDoc" method="post">
<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
    <tr>
		<td align="right">姓名</td>
		<td><input type="text" name="docname" placeholder="请输入医生姓名"/></td>
	</tr>
	<tr>
		<td align="right">职位</td>
		<td>
		<select name="position" id="select">		        
             <option value="主任医师">主任医师</option>
             <option value="副主任医师">副主任医师</option>
             <option value="医师">医师</option>
		</select>
        </td>
	</tr>
	<tr>
		<td align="right">专病</td>
		<td>
		<select name="disId" id="select">		        
	         <?php 
		         $sql = "select * from disease";
		         $result = fetchAll($sql, $link);
		         if ($result) {
		             foreach ($result as $res) {		                 
                 ?>
                 <option value="<?php echo $res['id']?>"><?php echo $res['disName']?></option>
                 <?php
		                 
		             }
		         } 
		        ?>  
		</select>
        </td>
	</tr>
	<tr>
		<td align="right">简介</td>
		<td><textarea name="description" id="" cols="30" rows="5"></textarea></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit"  value="添加"/></td>
	</tr>
	<?php 
	mysqli_close($link);
	?>
</table>
</form>
</body>
</html>
