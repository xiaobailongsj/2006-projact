$('#form').on('submit',function (event) {
    event.preventDefault();
    var inputs = $("#form :input")
    var inputs1=$("#form :input").serialize();
    // console.log(inputs1);
    $.ajax({
        url:'check.php',
        method:'POST',
        data:inputs1,
        dataType:'json'
    }).done(function (d) {
       if(d.error==0){
           alert('注册成功')
           window.location.href='login1.html'
       }else{
           alert(d.mag)
       }
    })
})
function ajax(p,node){

        //var self = this         // js对象
        $.ajax({
            url: 'reg2.php',       //请求的接口地址
            method: "get",          //请求的方法
            dataType: 'json',       // 将服务器返回的json转JS对象
            data: {data:p}       // 发送的数据
        }).done(function(d){     // 请求成功后回调函数 d 为服务器响应的数据
            if(d.error>0){      //异常
                alert(d.msg)
                node.val("")       //清空 input
                node.focus()        //重新获取焦点
            }
        });
}
//验证用户名
$("#account").on('blur',function ()
{
    var self = $(this)
    if($(this).val()==""){
        return
    }
    var account=$(this).val();
    ajax(account,self)
})
//验证手机号
$("#tel").on('blur',function ()
{
    var self = $(this)
    if($(this).val()==""){
        return
    }
    var tel=$(this).val();
    ajax(tel,self)
})
//验证邮箱
$("#email").on('blur',function ()
{
    var self = $(this)
    if($(this).val()==""){
        return
    }
    var email=$(this).val();
    ajax(email,self)
})
// $('#register').click(function (event) {
//     event.preventDefault();
//     var account=$('#account').val()
//     var tel=$('#tel').val()
//     var email=$('#email').val()
//     var pwd=$('#pwd').val()
//     var is_pwd=$('#is_pwd').val()
//     $.ajax({
//         method:"POST",
//         url:'check.php',
//         data:{account:account,tel:tel,email:email,pwd:pwd,is_pwd:is_pwd},
//         dataType:'json'
//     }).done(function (d) {
//        if(d.error==0){
//            alert('注册成功')
//        }else{
//            alert(d.msg)
//        }
//     })
//
// })
