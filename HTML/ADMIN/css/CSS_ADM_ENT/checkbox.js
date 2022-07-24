var miCheckbox = document.getElementById('check');
var msg = document.getElementById('divimg');
var btn =document.querySelector('btn_actu');
function myfunctiion(){
	if (miCheckbox.checked) {
		var script="<script src='css_adm_clt/fotO.js'></script>	";
		var h1 = "<h1>Selecciona un dispositivo</h1>";
		var select ="<select name='listaDeDispositivos' id='listaDeDispositivos'></select>";
		var input ="<input class='btn_foto' type='button' id='boton' value='Tomar foto'>";
		var p ="<p id='estado'></p><input type='text' name='foto' value='' style='display: none;'>";
		var video="<video muted='muted' id='video'></video>";
		var canvas="<canvas id='canvas' style='display: none;'></canvas>";
		msg.outerHTML="<div class='foto' id='foto'>"+h1+select+input+p+video+canvas+"</div>"+script;
		
		
	}
};
miCheckbox.addEventListener('click', myfunctiion);