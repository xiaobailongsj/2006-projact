<?php
$data =strtotime('2021/01/19 11:12:30');
$time= $data - time();
$response=[
    'error'=>'0',
    'mag'=>'抽奖结束时间',
    'data'=>$time
];
echo json_encode($response);