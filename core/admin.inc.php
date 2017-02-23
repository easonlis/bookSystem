<?php 
/**
 * 检查管理员是否存在于session或cookie中
 */
function checkLogin() {
    if ($_COOKIE['adminName'] == '' && $_COOKIE['adminId'] == ''){
        alertMes("请先登录", "login.php");
    }
}
/**
 * 后台管理员，注销退出，清空所有session和cookie
 */
function logout() {
    $_SESSION=array();
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(),"",time()-1);
    }
    if (isset($_COOKIE['adminId'])){
        setcookie('adminId',"",time()-1);
    }
    if (isset($_COOKIE['adminName'])){
        setcookie('adminName',"",time()-1);
    }
    session_destroy();
    header("location:login.php");
}

/**
 * 添加管理员
 * @return string
 */


function addAdmin(){
    $link=mysqli_connect(HOST,USERNAME,PASSWORD,DB);
    $arr=$_POST;
    $_POST['password']=md5($_POST['password']);
    if (insert('admin', $arr,$link)){
        $mes="注册成功!</br><a href='main.php'>返回首页</a>";
    }else{
        $mes="注册失败!</br><a href='main.php'>返回首页</a>";
    }
    mysqli_close($link);
    return $mes;
}
/**修改管理员
 * @param int $id
 * @return string
 */
function editAdmin($id){
    $link=mysqli_connect(HOST,USERNAME,PASSWORD,DB); 
    $arr=$_POST;
    $_POST['password']=md5($_POST['password']);
    if (update('admin', $arr,"id='$id'", $link)) {
        $mes="修改成功!</br><a href='listAdmin.php'>查看管理员列表</a>";
    }else{
        $mes="修改失败!</br><a href='listAdmin.php'>返回管理员列表</a>";
    }
    return $mes;
}

/**删除管理员
 * @param int $id
 * @return string
 */
function delAdmin($id){
    $link=mysqli_connect(HOST,USERNAME,PASSWORD,DB);   
    if (delete('admin', "id='$id'",$link)){
        $mes="删除成功!<br/><a href='listAdmin.php'>查看管理员列表</a>";
    }else{
        $mes="删除失败!<br/><a href='listAdmin.php' />查看管理员列表</a>";
    }
    mysqli_close($link);
    return $mes;
}
