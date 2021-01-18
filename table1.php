<?php
session_start();
$id= $_POST['id'];
//echo $id;die;
if(empty($_SESSION['user'])){            //未登录
    $response = [
        'errno' => 400001,
        'msg'   => "未登录"
    ];

    echo json_encode($response);
    exit;
}else {          //已登录
    $response = [
        'errno' => 0,
        'msg' => 'ok'
    ];
    include "pdo.php";
    $mysqli=getPdo();
    $time = time();
    $sql = "update p_rooms set status=1,add_time = '$time' where id = $id";
//    echo $sql;exit;
    $res= $mysqli->query($sql);
//    var_dump($res);/
    die(json_encode($response));

}



