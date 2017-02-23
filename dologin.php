<?php
session_start();
require_once 'include.php';
$link = mysqli_connect(HOST, USERNAME, PASSWORD, DB);
mysqli_set_charset($link, DB_CHARSET);

$username = $_POST['username'];
$password = $_POST['password'];
$verify = $_POST['verify'];
$verify1 = $_SESSION['verify'];
@$autoFlag=$_POST['autoFlag'];
if ($verify == $verify1) {
    $sql = "select * from user where username='$username' and password='$password'";
    $row = fetchOne($sql, $link);
    if ($row) {
        //储存到cookie中,关闭浏览器即清除
        setcookie('userName',$row['username']);
        setcookie('userId',$row['id']);
        //若选中一周内自动登录则储存到cookie中
        if($autoFlag){
            setcookie('userName',$row['username'],time()+7*24*3600);
            setcookie('userId',$row['id'],time()+7*24*3600);
        }       
        alertMes('登录成功!', "index.php");
    } else {
        alertMes("登录失败，重新登录！", "index.php");
    }
} else {
    alertMes("验证码错误！", "index.php");
}

