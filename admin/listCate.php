<?php 
require_once '../include.php';
$link = mysqli_connect(HOST, USERNAME, PASSWORD, DB);
mysqli_set_charset($link, DB_CHARSET);

$sql="select * from discate";
$totalRows=getResultNum($sql, $link);//结果集个数
$pageSize=5;//每页显示个数
$totalPage=ceil($totalRows/$pageSize);//总页数
@$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
if ($page<1||$page==null||!is_numeric($page)){
    $page=1;
}
if ($page>$totalPage){
    $page=$totalPage;
}
$offset=($page-1)*$pageSize;//取值初始位置
$sql="select id,cateName from discate limit $offset,$pageSize";
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
            <div class="bui_select">
                <input type="button" value="添&nbsp;&nbsp;加" class="add" onclick="addCate()";>
            </div>
        </div>
        <!--表格-->
        <table class="table" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th width="15%">编号</th>
                    <th width="25%">分类名称</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($rows as $row){
                
                ?>
                <tr>
                    <!--这里的id和for里面的c1 需要循环出来-->
                    <td><input type="checkbox" id="c1" class="check"><label for="c1" class="label"><?php echo $row['id'];?></label></td>
                    <td><?php echo $row['cateName'];?></td>
                    <td align="center"><input type="button" value="修改" class="btn" onclick="editCate(<?php echo $row['id'];?>)">
                    <input type="button" value="删除" class="btn" onclick="delCate('<?php echo $row['id'];?>')"></td>
                </tr>
                <?php 
                }
                mysqli_close($link);
                if (count($rows)>$pageSize)
                ?>
                <tr>
                	<td colspan='4'><?php echo showPage($page,$totalPage,$where=null,$step="&nbsp");?></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
<script type="text/javascript">
function addCate(){
	window.location="addCate.php";
}
function editCate(id){
	window.location="editCate.php?id="+id;
}
function delCate(id){
	if(confirm("确定要删除吗!")){
	     window.location="doAdminAction.php?act=delCate&&id="+id;
	}
}
</script>
</html>
