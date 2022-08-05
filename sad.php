<?php
/**
 * 忧伤
 * 
 * @package custom 
 * 
 **/
date_default_timezone_set("PRC");
$servername = "sql112.epizy.com";
$username = "epiz_29365562";
$password = "so0iXVEjR0n";
$dbname = "epiz_29365562_wayne";
$datetime = date('Y-m-d H:i:s');

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 


$sql = "INSERT INTO typecho_sad (time)
VALUES ('$datetime')";

if ($conn->query($sql) === TRUE) {

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title>sad</title>
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
      .btn-group {
        display: flex;
        position: absolute;
        width: 400px;
        left: 0;
        right:0;
        margin: 0 auto;
        bottom: 15%;
      }
      .btn-group div {
        flex: 1;
        text-align: center;
      }
      .sure {
        padding: 20px 0;
        background: linear-gradient(
          180deg,
          rgba(255, 127, 87, 1) 0%,
          rgba(221, 40, 39, 1) 100%
        );
        border-top-left-radius: 20px;
        border-bottom-left-radius: 20px;
      }
      .cancel {
        padding: 20px 0;
        background: #eee;
        color: #333;
        border-top-right-radius: 20px;
        border-bottom-right-radius: 20px;
      }
    </style> 
</head>
<body>
<h1 id="h1"></h1>
<div class = "btn-group">
  <div class = "sure" onclick = "window.location.href='meet.html'">返回</div>
  <div class = "cancel" onclick = "alert('再考虑考虑？')">关闭</div>
</div>
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

h1.innerHTML="？<br>再考虑考虑<br>做我的女朋友吧<br>！！！"


</script>

</body>
</html>
