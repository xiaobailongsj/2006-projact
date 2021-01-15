<?php

$name = $_GET['data'];
$mysqli = new mysqli("127.0.0.1", "root", "root", "2006");
$sql = "select * from `user` where account='$name' || tel='$name' || email='$name'";
//echo $sql;die;
$res = $mysqli->query($sql);
$arr = mysqli_fetch_assoc($res);

if ($arr) {
    $response = [
        'error' => 3000,
        'msg' => '已存在'
    ];
} else {
    $response = [
        'error' => 0,
        'msg' => 'ok'
    ];
}
die(json_encode($response));
