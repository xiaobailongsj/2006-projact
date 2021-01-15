<?php
$date= strtotime("2022/01/01,00:00:00");
$seconds=$date-time();
$response=[
  'error'=>0,
  'msg'=>'倒计时',
  'data'=>$seconds
];
echo json_encode($response);