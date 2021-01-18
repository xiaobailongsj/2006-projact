$('#form').submit(function (event) {
    event.preventDefault()
    var input = $("#form :input")
    var inputs = $("#form :input").serialize()
    $.ajax({
        url:'login1.php',
        method:'POST',
        data:inputs,
        dataType:'json'
    }).done(function (d) {
        if(d.error==0){
            alert('登录成功')

            window.location.href='table.php'
        }else{
            alert(d.mag)
        }
    })
})