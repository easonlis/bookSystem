<?php 
require_once '../include.php';
checkLogin();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link rel="stylesheet" href="../styles/backstage.css">
</head>

<body>
    <div class="head">
            <h3 class="head_text fr">医院预约挂号后台管理系统</h3>
    </div>
    <div class="operation_user clearfix">     
        <div class="link fr">
            <b>欢迎您
            <?php echo $_COOKIE['adminName']; ?>           
            </b>&nbsp;&nbsp;&nbsp;&nbsp;<a href="doAdminAction.php?act=logout" class="icon icon_e">退出</a>
        </div>
    </div>
    <div class="content clearfix">
        <div class="main">
            <!--右侧内容-->
            <div class="cont">
                <div class="title">后台管理</div>
      	 		<!-- 嵌套网页开始 -->         
                <iframe src="main.php"  frameborder="0" name="mainFrame" width="100%" height="522"></iframe>
                <!-- 嵌套网页结束 -->   
            </div>
        </div>
        <!--左侧列表-->
        <div class="menu">
            <div class="cont">
                <div class="title">管理员</div>
                <ul class="mList">
                    <li>
                        <h3><span onclick="show('menu1','change1')" id="change1">+</span>医生排班管理</h3>
                        <dl id="menu1" style="display:none;">
                        	<dd><a href="addDoc.php" target="mainFrame">添加就诊医生</a></dd>
                            <dd><a href="listDoc.php" target="mainFrame">医生列表</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><span onclick="show('menu2','change2')" id="change2">+</span>科室及疾病管理</h3>
                        <dl id="menu2" style="display:none;">
                        	<dd><a href="addCate.php" target="mainFrame">添加科室</a></dd>
                        	<dd><a href="addDisease.php" target="mainFrame">添加疾病</a></dd>
                        	<dd><a href="listCate.php" target="mainFrame">科室列表</a></dd>
                        	<dd><a href="listDisease.php" target="mainFrame">疾病列表</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><span  onclick="show('menu3','change3')" id="change3">+</span>订单管理</h3>
                        <dl id="menu3" style="display:none;">                            
                            <dd><a href="waitingOrder.php" target="mainFrame">待处理订单</a></dd>
                            <dd><a href="listOrder.php" target="mainFrame">订单列表</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><span onclick="show('menu5','change5')" id="change5">+</span>管理员管理</h3>
                        <dl id="menu5" style="display:none;">
                        	<dd><a href="addAdmin.php" target="mainFrame">添加管理员</a></dd>
                            <dd><a href="listAdmin.php" target="mainFrame">管理员列表</a></dd>
                        </dl>
                    </li>
                </ul>
            </div>
        </div>

    </div>
    <script type="text/javascript">
    	function show(num,change){
	    		var menu=document.getElementById(num);
	    		var change=document.getElementById(change);
	    		if(change.innerHTML=="+"){
	    				change.innerHTML="-";
	        	}else{
						change.innerHTML="+";
	            }
    		   if(menu.style.display=='none'){
    	             menu.style.display='';
    		    }else{
    		         menu.style.display='none';
    		    }
        }
    </script>
</body>
</html>