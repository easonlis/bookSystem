<?php 
require_once '../include.php';
$link = mysqli_connect(HOST, USERNAME, PASSWORD, DB);
mysqli_set_charset($link, DB_CHARSET);

$sql="select * from discate";
$result = fetchAll($sql, $link);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
</head>
<body>
<h3>添加疾病</h3>
<form action="doAdminAction.php?act=addDisease" method="post">
<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
    	<tr>
		<td align="right">所属科室</td>
		<td>
		    <select name="cateId" id="select">
		        <?php 
		         if ($result) {
		             foreach ($result as $res) {
		         ?>
		         <option value="<?php echo $res['id']?>"><?php echo $res['cateName']?></option>
		         <?php        
		             }
		         } 
		        ?>  		       	
		    </select>
        </td>
	</tr>
	<tr>
		<td align="right">疾病名称</td>
		<td><input type="text" name="disName" placeholder="请输入疾病名称"/></td>
	</tr>

	<tr>
		<td colspan="2"><input type="submit"  value="添加疾病"/></td>
	</tr>

</table>
</form>
</body>
</html>
