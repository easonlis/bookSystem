<?php 
/* 统一导入php文件，规范编码方式 */
header("Content-type: text/html; charset=utf-8");
define('ROOT', dirname(__FILE__));
set_include_path(".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT."/core".PATH_SEPARATOR.ROOT."/configs".PATH_SEPARATOR.get_include_path());
require_once 'configs.php';
require_once 'common.func.php';
require_once 'admin.inc.php';
require_once 'user.inc.php';
require_once 'mysql.func.php';
require_once 'page.func.php';
require_once 'cate.inc.php';
require_once 'order.inc.php';
?>