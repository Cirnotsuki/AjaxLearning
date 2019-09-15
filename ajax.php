<?php
header("content-type:text/html;charset=utf-8");
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
;
$user = $_REQUEST["user"];
// $age = $_REQUEST["age"];
$off = $_REQUEST["off"];
$arr = array();
// echo $user."今年已经".$age."岁了";
sendData();
function sendData(){
    global $user,$off,$arr;
	if($off==="false"){
		array_push($arr,$user);
		echo json_encode($arr);
//		echo "发送成功";
		return;
	}
	echo json_encode($arr);
}
?>