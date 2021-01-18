<?php


$num=mt_rand(1,100);

if($num<3){
    $response=[
        'error'=>0,
        'msg'=>'一等奖'
    ];
}else if($num<=20&&$num>3){
    $response=[
        'error'=>0,
        'msg'=>'二等奖'
    ];
}else if($num<=40&&$num>20){
    $response=[
        'error'=>0,
        'msg'=>'三等奖'
    ];
}else{
    $response=[
        'error'=>0,
        'msg'=>'未中奖'
    ];
}
echo json_encode($response);