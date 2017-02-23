<?php 
require_once '../include.php';
$id=$_REQUEST['id'];
$link=mysqli_connect(HOST,USERNAME,PASSWORD,DB);
$sql="select * from disease where id='$id'";
$row=fetchOne($sql, $link);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
</head>
<body>
<h3>编辑分类</h3>
<form action="doAdminAction.php?act=editDisease&&id=<?php echo $row['id'];?>" method="post">
<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
    <tr>
		<td align="right">所属分类</td>
		<td>
		<select name="cateId" id="select">
		        <?php 
		         $sql = "select * from discate";
		         $result = fetchAll($sql, $link);
		         if ($result) {
		             foreach ($result as $res) {
		                 if ($row['cateId'] == $res['id']) {		                     		                 
		         ?>
		         <option value="<?php echo $res['id']?>" selected><?php echo $res['cateName']?></option>
		         <?php   
		                 } else {
                 ?>
                 <option value="<?php echo $res['id']?>"><?php echo $res['cateName']?></option>
                 <?php
		                 }
		             }
		         } 
		        ?>  		       	
		</select>
		</td>
	</tr>
	<tr>
		<td align="right">疾病名称</td>
		<td><input type="text" name="disName" value="<?php echo $row['disName'];?>"/></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit"  value="编辑分类"/></td>
	</tr>
	<?php 
	mysqli_close($link);
	?>
</table>
</form>
</body>
</html>
