<?php
/* 常用操作函数 */

/**
 * @param 信息提示 $mes
 * @param 跳转页面 $url
 */
function alertMes($mes,$url) {
    echo "<script>alert('$mes');window.location.href='$url';</script>";
}
function alertBack($mes) {//返回前一个页面并刷新
    echo "<script>alert('$mes');location.replace(document.referrer);</script>";
}
