<?php
include "pdo.php";
$mysqli=getPdo();
$sql="select * from p_rooms";
$res= $mysqli->query($sql);
$arr = mysqli_fetch_all($res,1);
//print_r($arr)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<style>
    a{
        text-decoration: none;
        color: black;
    }
    .b{
        width: 690px;
        height: 550px;
        /*background-color: #c07bff;*/
    }
    .a{
        margin-left: 70px;
    }
    li{
        width: 110px;
        height: 110px;
        display: block;
        background-color: red;
        float: left;
        margin: 10px;
    }
    h3{
        font-size: 20px;
        display: block;
        margin-left:10px;
    }
</style>
<body>


<?php
session_start();
if($_SESSION['user']==""){
    echo '<button><a href="login1.html">登录</a></button>';
    echo '<button><a href="reg.html">注册</a></button>';
    echo '<button><a href="lottery.html">抽奖</a></button>';
}else{
    echo '<button><a href="Session.php">退出</a></button>';
    echo '<button><a href="my.php">个人中心</a></button>';
    echo '<button><a href="lottery.html">抽奖</a></button>';
}
?>






<div class="b">
    <div class="a">
        <h1>房间预订</h1>
        <span class="time"></span>
    </div>
    <ul>
        <?php

         foreach ($arr as $k=>$v){
//             $status = $v['status']==0?'预约':'已预约';
             echo "<li data-id=\"{$v['id']}\" data-status=$v[status]>
                <button class=\"but\" >预约 ￥{$v['price']}</button>
                <h3 class=\"a\">{$v['name']}</h3>
                </li>";
         }


        ?>


</div>
<script src="../jquery-3.5.1.min.js"></script>
<script>

    $('.but').click(function () {
       var self = $(this)
        var id= self.parent().attr("data-id")


        if(confirm('确定预订吗？')) {

            $.ajax({
                url: 'table1.php',
                method: 'POST',
                data: {id:id},
                dataType: 'json'
            }).done(function (d) {
                if(d.errno==400001){
                    alert(d.msg)
                    window.location.href = 'login1.html'
                    return
                }
                self.parent().css('backgroundColor','green')
                // self.parent().attr('data-status',1)
                self.text('已预约').attr('disabled','disabled')

            })

        }


    })
    setInterval(function () {
        var arr= ['周日','周一','周二','周三','周四','周五','周六']
        var date= new Date();
        var year=date.getFullYear()

        var datas = date.getDate()
        if(datas<10){
            datas ="0"+datas
        }
        var day = date.getDay()
        var month= date.getMonth()+1
        if(month<10){
            month ="0"+month
        }
        // console.log(month)
        var hours = date.getHours()
        if(hours<10){
            hours ="0"+hours
        }
        var minutess = date.getMinutes()
        if(minutess<10){
            minutess ="0"+minutess
        }
        var secondss = date.getSeconds()
        if(secondss<10){
            secondss ="0"+secondss
        }
        var time=year+"年"+month+"月"+datas+"日"+"  "+hours+":"+minutess+":"+secondss+" "+arr[day];
        var time1=$('.time')
        time1.text(time)
    },1000)
</script>
</body>
</html>