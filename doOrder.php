<?php 
require_once 'include.php';
$act=$_REQUEST['act'];
@$docId = $_REQUEST['index1'];
@$timeFrame = $_REQUEST['index2'];
@$bookDate = $_REQUEST['date'];
@$orderId = $_REQUEST['oId'];
if ($act == "cOrder") {
    createOrder($docId,$timeFrame,$bookDate);
}elseif ($act == "dOrder") {
    deleteOrder($orderId);
}elseif ($act == "pOrder") {
    payOrder($orderId);
}
?>