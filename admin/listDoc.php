<?php 
require_once '../include.php';
$link = mysqli_connect(HOST, USERNAME, PASSWORD, DB);
mysqli_set_charset($link, DB_CHARSET);

@$disId = $_REQUEST['disId'];
if ($disId) {
    $sql="select * from booksystem.doctor where disId='{$disId}'";
} else {
    $sql="select * from booksystem.doctor";
}
$totalRows=getResultNum($sql, $link);//结果集个数
$pageSize=3;//每页显示个数
$totalPage=ceil($totalRows/$pageSize);//总页数
@$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
if ($page<1||$page==null||!is_numeric($page)){
    $page=1;
}
if ($page>$totalPage){
    $page=$totalPage;
}
$offset=($page-1)*$pageSize;//取值初始位置
if ($disId) {
    $sql="select * from booksystem.doctor where disId='{$disId}' limit $offset,$pageSize";
} else {
    $sql="select * from booksystem.doctor limit $offset,$pageSize";
}
$rows=fetchAll($sql, $link);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link rel="stylesheet" href="../styles/backstage.css">
</head>
<body>
<div class="">
    <!--右侧内容-->
    <div class="details">
        <div class="details_operation clearfix">
            <div class="">
                <select name="disId" id="searchSelect">	
                <?php 
                $sql = "select * from disease";
                $disRes = fetchAll($sql, $link);
                foreach ($disRes as $disres){
                    if ($disres['id']==$disId){
                ?>	        
		                <option value="<?php echo $disres['id'];?>" selected><?php echo $disres['disName'];?></option>
		      <?php }else{ ?>
		                <option value="<?php echo $disres['id'];?>"><?php echo $disres['disName'];?></option>
		      <?php      }
                }?>
		        </select>
                <input type="button" value="搜索" class="add" onclick="Getvaule()";>
            </div> 
        </div>
        <!--表格-->
        <table class="table" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th width="10%">编号</th>
                    <th width="15%">姓名</th>
                    <th width="15%">职位</th>
                    <th width="15%">专病</th>
                    <th width="25%">简介</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if ($rows) {
                    foreach ($rows as $row){               
                ?>
                <tr>
                    <td><input type="checkbox" id="c1" class="check"><label for="c1" class="label"><?php echo $row['id'];?></label></td>
                    <td><?php echo $row['docname']?></td>
                    <td><?php echo $row['position'];?></td>
                    <td><?php echo $row['department'];?></td>
                    <td><?php echo $row['description'];?></td>
                    <td align="center"><input type="button" value="修改" class="btn" onclick="editCate(<?php echo $row['id'];?>)">
                    <input type="button" value="删除" class="btn" onclick="delCate('<?php echo $row['id'];?>')"></td>
                </tr>
                <?php 
                    }              
                }
                mysqli_close($link);
                if (count($rows)>$pageSize)
                ?>
                <tr>
                	<td colspan='6'><?php
                	if ($disId) {
                	    echo showPage($page,$totalPage,$where="disId={$disId}",$step="&nbsp");
                	} else {
                	    echo showPage($page,$totalPage,$where=null,$step="&nbsp");
                	}
                	?></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
<script type="text/javascript">
function addCate(){
	window.location="addDoc.php";
}
function editCate(id){
	window.location="editDoc.php?id="+id;
}
function delCate(id){
	if(confirm("确定要删除吗!")){
	     window.location="doAdminAction.php?act=delDoc&&id="+id;
	}
}
function Getvaule(){
	var url = window.location.href;
	var index = url.indexOf("?", 0);
	if(index>0) {
		url = url.substring(0, index);
	}
	var obj = document.getElementById('searchSelect');
	var val=obj.options[obj.options.selectedIndex].value;

	window.location=url+"?disId="+val+"&page=1";
}
</script>
</html>
