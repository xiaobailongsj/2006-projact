function getDate(seconds) {
    var d =Math.floor((seconds/86400))
    if(d<10){d='0'+d}
    var h=Math.floor((seconds/3600)%24)
    if(h<10){h='0'+h}
    var m=Math.floor((seconds/60)%60)
    if(m<10){m='0'+m}
    var s=Math.floor(seconds%60)
    if(s<10){s='0'+s}
    return d+"天"+h+"小时"+m+"分钟"+s+"秒"
}