<?php 
function addCate(){
    $link=mysqli_connect(HOST,USERNAME,PASSWORD,DB);
    $arr=$_POST;
    if (insert('discate', $arr, $link)) {
        $mes="添加成功!<br/><a href='addCate.php'>继续添加</a>|<a href='listCate.php'>查看分类列表</a>";
    }else{
        $mes="添加失败!<br/><a href='addCate.php'>重新添加</a>|<a href='listCate.php'>查看分类列表</a>";
    }
    mysqli_close($link);
    return $mes;
}

function editCate($id){
    $link=mysqli_connect(HOST,USERNAME,PASSWORD,DB);
    $arr=$_POST;
    if (update('discate', $arr, "id='$id'", $link)){
        $mes="修改成功!<br/><a href='listCate.php'>查看分类列表</a>";
    }else{
        $mes="修改失败!<br/><a href='listCate.php'>查看分类列表</a>";
    }
    mysqli_close($link);
    return $mes;
}

function delCate($id){
    $link=mysqli_connect(HOST,USERNAME,PASSWORD,DB);
    $sql = "select * from disease where cateId='{$id}'";
    if (fetchOne($sql, $link)) {
        $mes="删除失败!请确保该分类下没有子分类!<br/><a href='listCate.php'>查看分类列表</a>";
    } else {
        if (delete('discate', "id='$id'",$link)){
            $mes="删除成功!<br/><a href='listCate.php'>查看分类列表</a>";
        }else{
            $mes="删除失败!<br/><a href='listCate.php'>查看分类列表</a>";
        }
    }    
    return $mes;
}

function addDisease(){
    $link=mysqli_connect(HOST,USERNAME,PASSWORD,DB);
    $arr=$_POST;
    if (insert('disease', $arr, $link)) {
        $mes="添加成功!<br/><a href='addDisease.php'>继续添加</a>|<a href='listDisease.php'>查看分类列表</a>";
    }else{
        $mes="添加失败!<br/><a href='addDisease.php'>重新添加</a>|<a href='listDisease.php'>查看分类列表</a>";
    }
    mysqli_close($link);
    return $mes;
}

function editDisease($id){
    $link=mysqli_connect(HOST,USERNAME,PASSWORD,DB);
    $arr=$_POST;
    if (update('disease', $arr, "id='$id'", $link)){
        $mes="修改成功!<br/><a href='listDisease.php'>查看分类列表</a>";
    }else{
        $mes="修改失败!<br/><a href='listDisease.php'>查看分类列表</a>";
    }
    mysqli_close($link);
    return $mes;
}

function delDisease($id){
    $link=mysqli_connect(HOST,USERNAME,PASSWORD,DB);
    $sql = "select * from doctor where disId='{$id}'";
    if (fetchOne($sql, $link)) {
        $mes="删除失败!请确保该子分类下没有医生可出诊!<br/><a href='listDisease.php'>查看分类列表</a>";
    } else {
        if (delete('disease', "id='$id'",$link)){
            $mes="删除成功!<br/><a href='listDisease.php'>查看分类列表</a>";
        }else{
            $mes="删除失败!<br/><a href='listDisease.php'>查看分类列表</a>";
        }
    }   
    return $mes;
}

function addDoc(){
    $link=mysqli_connect(HOST,USERNAME,PASSWORD,DB);
    $arr=$_POST;
    $sql = "select * from disease";
    $rows = fetchAll($sql, $link);
    foreach ($rows as $row) {
        if ($arr['disId'] == $row['id']) {
            $arr['department'] = $row['disName'];
            break;
        }
    }
    if (insert('doctor', $arr, $link)) {
        $mes="添加成功!<br/><a href='addDoc.php'>继续添加</a>|<a href='listDoc.php'>查看分类列表</a>";
    }else{
        $mes="添加失败!<br/><a href='addDoc.php'>重新添加</a>|<a href='listDoc.php'>查看分类列表</a>";
    }
    mysqli_close($link);
    return $mes;
}

function editDoc($id){
    $link=mysqli_connect(HOST,USERNAME,PASSWORD,DB);
    $arr=$_POST;
    $sql = "select * from disease";
    $rows = fetchAll($sql, $link);
    foreach ($rows as $row) {
        if ($arr['disId'] == $row['id']) {
            $arr['department'] = $row['disName'];
            break;
        }
    }
    if (update('doctor', $arr, "id='$id'", $link)){
        $mes="修改成功!<br/><a href='listDoc.php'>查看医生列表</a>";
    }else{
        $mes="修改失败!<br/><a href='listDoc.php'>查看医生列表</a>";
    }
    mysqli_close($link);
    return $mes;
}

function delDoc($id){
    $link=mysqli_connect(HOST,USERNAME,PASSWORD,DB);
    if (delete('doctor', "id='$id'",$link)){
        $mes="删除成功!<br/><a href='listDoc.php'>查看医生列表</a>";
    }else{
        $mes="删除失败!<br/><a href='listDoc.php'>查看医生列表</a>";
    }
    return $mes;
}

function updatePaystatue($id){
    $link=mysqli_connect(HOST,USERNAME,PASSWORD,DB);
    $arr['paystatue'] = "已受理";
    if (update('booksystem.order', $arr, "id='$id'", $link)){
        $mes=alertMes("受理成功!", "waitingOrder.php");
    }else{
        $mes="修改失败!<br/><a href='listDisease.php'>查看分类列表</a>";
    }
    mysqli_close($link);
    return $mes;
}
?>