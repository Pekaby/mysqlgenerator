<?
	$name_table = $_GET['name_table'];
	$theme = $_GET['theme'];
	$many_stocks = $_GET['many_stocks'];
	$g_recaptcha_response = $_GET['g-recaptcha-response'];
	$start_singl = $_GET['start_singl'];
	header("refresh:3; /generation?name_table=$name_table&theme=$theme&many_stocks=$many_stocks&g-recaptcha-response=$g_recaptcha_response&start_singl=$start_singl");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$name_site?></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<style>
		#myCanvas{
/*			width: 100%;
			height: 100%;*/
		}
		.lds-spinner {
			padding-left: 50%;
			padding-top: 85px;	
  color: official;
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
}
.lds-spinner div {
  transform-origin: 40px 40px;
  animation: lds-spinner 1.2s linear infinite;
}
.lds-spinner div:after {
  content: " ";
  display: block;
  position: absolute;
  top: 3px;
  left: 37px;
  width: 6px;
  height: 18px;
  border-radius: 20%;
  background: #333;
}
.lds-spinner div:nth-child(1) {
  transform: rotate(0deg);
  animation-delay: -1.1s;
}
.lds-spinner div:nth-child(2) {
  transform: rotate(30deg);
  animation-delay: -1s;
}
.lds-spinner div:nth-child(3) {
  transform: rotate(60deg);
  animation-delay: -0.9s;
}
.lds-spinner div:nth-child(4) {
  transform: rotate(90deg);
  animation-delay: -0.8s;
}
.lds-spinner div:nth-child(5) {
  transform: rotate(120deg);
  animation-delay: -0.7s;
}
.lds-spinner div:nth-child(6) {
  transform: rotate(150deg);
  animation-delay: -0.6s;
}
.lds-spinner div:nth-child(7) {
  transform: rotate(180deg);
  animation-delay: -0.5s;
}
.lds-spinner div:nth-child(8) {
  transform: rotate(210deg);
  animation-delay: -0.4s;
}
.lds-spinner div:nth-child(9) {
  transform: rotate(240deg);
  animation-delay: -0.3s;
}
.lds-spinner div:nth-child(10) {
  transform: rotate(270deg);
  animation-delay: -0.2s;
}
.lds-spinner div:nth-child(11) {
  transform: rotate(300deg);
  animation-delay: -0.1s;
}
.lds-spinner div:nth-child(12) {
  transform: rotate(330deg);
  animation-delay: 0s;
}
@keyframes lds-spinner {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
  }
}
	</style>
	<script
  src="https://code.jquery.com/jquery-1.12.4.js"
  integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
  crossorigin="anonymous"></script>
</head>
<body>
<header id="to_remove">
  <div class="bg-dark collapse" id="navbarHeader" style="">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">About</h4>
          <p class="text-muted"><?=$text_muted?></p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Contact</h4>
          <ul class="list-unstyled">
            <li><a href="mailto:<?=$email?>" class="text-white">Email me</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container d-flex justify-content-between">
      <a href="/" class="navbar-brand d-flex align-items-center">
        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="mr-2" viewBox="0 0 24 24" focusable="false"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg> -->
        <strong><?=$name_site?></strong>
      </a>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>
<main role="main" class="container" id="to_remove#2">
	
<h2>Your file is getting ready for download...</h2>
<h4>Please wait</h4>
<div class="snake" onclick="playsnake()">Play snake!</div>
<div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
</main>
<canvas></canvas>
<footer id="to_remove#3">
	<br><br><br><br><br>
	<div class="container">
		<p><?=$warning?></p>
		<hr id="featurette-divider"> 

    <p>© <?=$name_site?></p>
    <p>Pekaby.</p>
  </div>
</footer>
<script type="text/javascript">
	function playsnake() {
		console.log("TEST");
		var elem = document.getElementById("to_remove");
		elem.parentNode.removeChild(elem);

		var elem = document.getElementById("to_remove#2");
		elem.parentNode.removeChild(elem);

		var elem = document.getElementById("to_remove#3");
		elem.parentNode.removeChild(elem);

		const get_cav = document.querySelector('canvas');

		get_cav.setAttribute('id', 'myCanvas');
        
	
var rand = function (min, max) {k = Math.floor(Math.random() * (max - min) + min); return (Math.round( k / s) * s);}
var newA = function () {a = [rand(0, innerWidth),rand(0, innerHeight)];},
	newB = function () {sBody = [{x: 0,y: 0}];}
var gP = document.getElementById('myCanvas'), 
	g = gP.getContext('2d'), 
	sBody = null, 
	d = 1, 
	a = null, 
	s = 25; newB(); newA();
gP.width = innerWidth;  
gP.height = innerHeight; 
setInterval(function(){
	if (a[0] + s >= gP.width || a[1] + s >= gP.height) newA(); 
	g.clearRect(0,0,gP.width,gP.height); 
	g.fillStyle = "red";
	g.fillRect(...a, s, s);
	g.fillStyle = "#000";
	sBody.forEach(function(el, i){
		if (el.x == sBody[sBody.length - 1].x && el.y == sBody[sBody.length - 1].y && i < sBody.length - 1) sBody.splice(0,sBody.length-1), sBody = [{x:0,y:0}], d = 1;
	});
	var m = sBody[0], f = {x: m.x,y: m.y}, l = sBody[sBody.length - 1];
	if (d == 1)  f.x = l.x + s, f.y = Math.round(l.y / s) * s; 
	if (d == 2) f.y = l.y + s, f.x = Math.round(l.x / s) * s; 
	if (d == 3) f.x = l.x - s, f.y = Math.round(l.y / s) * s; 
	if (d == 4) f.y = l.y - s, f.x = Math.round(l.x / s) * s; 
	sBody.push(f); 
	sBody.splice(0,1); 
	
	sBody.forEach(function(pob, i){
		if (d == 1) if (pob.x > Math.round(gP.width / s) * s) pob.x = 0; 
		if (d == 2) if (pob.y > Math.round(gP.height / s) * s) pob.y = 0; 
		if (d == 3) if (pob.x < 0) pob.x = Math.round(gP.width / s) * s; 
		if (d == 4) if (pob.y < 0) pob.y = Math.round(gP.height / s) * s; 
		if (pob.x == a[0] && pob.y == a[1]) newA(), sBody.unshift({x: f.x - s, y:l.y})
		g.fillRect(pob.x, pob.y, s, s);		
		
	});
}, 1000/30);
onkeydown = function (e) {
	var k = e.keyCode;
	if ([38,39,40,37].indexOf(k) >= 0) 
		
		e.preventDefault();
	if (k == 39 && d != 3) d = 1; 
	if (k == 40 && d != 4) d = 2; 
	if (k == 37 && d != 1) d = 3; 
	if (k == 38 && d != 2) d = 4; 
};
};


</script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>