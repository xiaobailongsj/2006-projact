<?php
//$cook=implode (',',$_G);
$account=$_GET['user_names'];
$id=$_GET['user_ids'];

include "pdo.php";

$mysqli = getPdo();
//$mysqli= new mysqli('127.0.0.1','root','root','2006');
$sql = "select id,account,email,last_logiin,`time` from user where id='{$id}' and account='{$account}'";
//echo $sql;die;
$res= $mysqli->query($sql);
$arr = mysqli_fetch_assoc($res);

//print_r($arr);exit;
echo json_encode($arr);
