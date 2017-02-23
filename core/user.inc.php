<?php 
function logoutUser() {
    $_SESSION=array();
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(),"",time()-1);
    }
    if (isset($_COOKIE['userId'])){
        setcookie('userId',"",time()-1);
    }
    if (isset($_COOKIE['userName'])){
        setcookie('userName',"",time()-1);
    }
    session_destroy();
    header("location:index.php");
}

function addUser(){
    $link=mysqli_connect(HOST,USERNAME,PASSWORD,DB);
    $arr=$_POST;
    $_POST['password']=md5($_POST['password']);
    if (insert('user', $arr,$link)){
        $mes="注册成功!</br><a href='index.php'>返回首页</a>";
    }else{
        $mes="注册失败!</br><a href='index.php'>返回首页</a>";
    }
    mysqli_close($link);
    return $mes;
}
?>