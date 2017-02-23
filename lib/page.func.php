<?php 
function showPage($page,$totalPage,$where=null,$step="&nbsp"){
    $where=($where==null)?null:$where."&";
    $url = $_SERVER['PHP_SELF'];//获取当前路径
        //首页、尾页、前一页、后一页
        $index = ($page == 1) ? "首页" : "<a href='{$url}?{$where}page=1'>首页</a>";
        $last = ($page == $totalPage) ? "尾页" : "<a href='{$url}?{$where}page={$totalPage}'>尾页</a>";
        $prev = ($page == 1) ? "上一页" : "<a href='{$url}?{$where}page=" . ($page - 1) . "'>上一页</a>";
        $next = ($page == $totalPage) ? "下一页" : "<a href='{$url}?{$where}page=" . ($page + 1) . "'>下一页</a>";
        $str = "总共{$totalPage}页/当前第{$page}页";
        $p = '';
        for ($i = 1; $i <= $totalPage; $i ++) {  //输出页码
            if ($page == $i) {
                $p .= "[{$i}]";
            } else {
                $p .= "<a href='{$url}?{$where}page=" . $i . "'>[{$i}]</a>";
            }
        }
    
    
  
    $pageStr= $str . "<br/>" . $index .$step. $prev .$step. $p.$step . $next.$step . $last;
    return $pageStr;
}