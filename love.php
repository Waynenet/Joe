<?php
/**
 * 相爱
 * 
 * @package custom 
 * 
 **/
date_default_timezone_set("PRC");
$datetime = date('Y-m-d H:i:s');
$servername = "sql112.epizy.com";
$username = "epiz_29365562";
$password = "so0iXVEjR0n";
$dbname = "epiz_29365562_wayne";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 


$sql = "INSERT INTO typecho_love (time)
VALUES ('$datetime')";

if ($conn->query($sql) === TRUE) {

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$lovetime = "select time from typecho_love where mid='1'";
$ressql = $conn->query($lovetime);
$res = $ressql->fetch_object()->time;


$conn->close();
?>



<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title>love</title>
    <style>
      body{
        overflow: hidden;
        margin: 0;
      }
      h1{
        position: fixed;
        top: 40%;
        left: 0;
        width: 100%;
        text-align: center;
        transform:translateY(-50%);
        font-family: 'Love Ya Like A Sister', cursive;
        font-size: 50px;
        color: #c70012;
      }
      h1 span{
          font-size:25px;
      }
    </style> 
</head>
<body>
<h1 id="h1"></h1>

<canvas></canvas>

<script>
  var canvas = document.querySelector("canvas"),
    ctx = canvas.getContext("2d");
  
  var ww,wh;
  
  function onResize(){
    ww = canvas.width = window.innerWidth;
    wh = canvas.height = window.innerHeight;
  }
  
  ctx.strokeStyle = "red";
  ctx.shadowBlur = 25;
  ctx.shadowColor = "hsla(0, 100%, 60%,0.5)";
  
  var precision = 100;
  var hearts = [];
  var mouseMoved = false;
  function onMove(e){
    mouseMoved = true;
    if(e.type === "touchmove"){
      hearts.push(new Heart(e.touches[0].clientX, e.touches[0].clientY));
      hearts.push(new Heart(e.touches[0].clientX, e.touches[0].clientY));
    }
    else{
      hearts.push(new Heart(e.clientX, e.clientY));
      hearts.push(new Heart(e.clientX, e.clientY));
    }
  }
  
  var Heart = function(x,y){
    this.x = x || Math.random()*ww;
    this.y = y || Math.random()*wh;
    this.size = Math.random()*2 + 1;
    this.shadowBlur = Math.random() * 10;
    this.speedX = (Math.random()+0.2-0.6) * 8;
    this.speedY = (Math.random()+0.2-0.6) * 8;
    this.speedSize = Math.random()*0.05 + 0.01;
    this.opacity = 1;
    this.vertices = [];
    for (var i = 0; i < precision; i++) {
      var step = (i / precision - 0.5) * (Math.PI * 2);
      var vector = {
        x : (15 * Math.pow(Math.sin(step), 3)),
        y : -(13 * Math.cos(step) - 5 * Math.cos(2 * step) - 2 * Math.cos(3 * step) - Math.cos(4 * step)) 
      }
      this.vertices.push(vector);
    }
  }
  
  Heart.prototype.draw = function(){
    this.size -= this.speedSize;
    this.x += this.speedX;
    this.y += this.speedY;
    ctx.save();
    ctx.translate(-1000,this.y);
    ctx.scale(this.size, this.size);
    ctx.beginPath();
    for (var i = 0; i < precision; i++) {
      var vector = this.vertices[i];
      ctx.lineTo(vector.x, vector.y);
    }
    ctx.globalAlpha = this.size;
    ctx.shadowBlur = Math.round((3 - this.size) * 10);
    ctx.shadowColor = "hsla(0, 100%, 60%,0.5)";
    ctx.shadowOffsetX = this.x + 1000;
    ctx.globalCompositeOperation = "screen"
    ctx.closePath();
    ctx.fill()
    ctx.restore();
  };
  
  
  function render(a){
    requestAnimationFrame(render);
  
    hearts.push(new Heart())
    ctx.clearRect(0,0,ww,wh);
    for (var i = 0; i < hearts.length; i++) {
      hearts[i].draw();
      if(hearts[i].size <= 0){
        hearts.splice(i,1);
        i--;
      }
    }
  }


onResize();
window.addEventListener("mousemove", onMove);
window.addEventListener("touchmove", onMove);
window.addEventListener("resize", onResize);
requestAnimationFrame(render);


var clink = "<?php echo $res; ?>";

window.onload=function starttime(){
        time(h1,clink);                           // 相爱的时间
        ptimer = setTimeout(starttime,1000);            // 添加计时器
}



    function time(obj,clink){
        var nowtime = new Date().getTime();             // 现在时间转换为时间戳
        var pasttime =  new Date(clink).getTime();   // 过去时间转换为时间戳
        var msec = nowtime-pasttime;                  // 毫秒 现在时间-过去时间
        var time = (msec/1000);                         // 毫秒/1000
        var day = parseInt(time/86400);                 // 天  24*60*60*1000 
        var hour = parseInt(time/3600)-24*day;          // 小时 60*60 总小时数-过去的小时数=现在的小时数 
        var minute = parseInt(time%3600/60);            // 分 -(day*24) 以60秒为一整份 取余 剩下秒数 秒数/60 就是分钟数
        var second = parseInt(time%60);                 // 以60秒为一整份 取余 剩下秒数
        obj.innerHTML="unknown&unknown<br><br>相爱已经<br><br>"+day+"天"+hour+"小时"+minute+"分"+second+"秒</span>"
        return true;
    }

</script>
</body>
</html>






