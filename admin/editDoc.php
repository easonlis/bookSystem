<?php 
require_once '../include.php';
$id=$_REQUEST['id'];
$link=mysqli_connect(HOST,USERNAME,PASSWORD,DB);
$sql="select * from doctor where id='$id'";
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
<form action="doAdminAction.php?act=editDoc&&id=<?php echo $row['id'];?>" method="post">
<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
    <tr>
		<td align="right">姓名</td>
		<td><?php echo $row['docname']?></td>
	</tr>
	<tr>
		<td align="right">职位</td>
		<td>
		<select name="position" id="select">		        
	         <option value="<?php echo $row['position']?>" selected><?php echo $row['position']?></option>
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
		                 if ($row['disId'] == $res['id']) {		                     		                 
		         ?>
		         <option value="<?php echo $res['id']?>" selected><?php echo $res['disName']?></option>
		         <?php   
		                 } else {
                 ?>
                 <option value="<?php echo $res['id']?>"><?php echo $res['disName']?></option>
                 <?php
		                 }
		             }
		         } 
		        ?>  
		</select>
        </td>
	</tr>
	<tr>
		<td align="right">简介</td>
		<td><textarea name="description" id="" cols="30" rows="5"><?php echo $row['description']?></textarea></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit"  value="编辑"/></td>
	</tr>
	<?php 
	mysqli_close($link);
	?>
</table>
</form>
</body>
</html>
