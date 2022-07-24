var btnAbrirPopupUpdate = document.getElementById('btn_update'),
	overlayUpdate = document.getElementById('update_over'),
	popupUpdate = document.getElementById('update_popup'),
	btnCerrarPopupUpdate = document.getElementById('btn-cerrar-update_popup');
	
btnAbrirPopupUpdate.addEventListener('click', function(){
	overlayUpdate.classList.add('active');
	document.getElementById('contenedor-inputs').outerHTML="<div class='contenedor-inputs' id='contenedor-inputs'></div>";
	document.getElementById('btn_actu').disabled = true;
	popupUpdate.classList.add('active');
});

btnCerrarPopupUpdate.addEventListener('click', function(e){
	e.preventDefault();
	overlayUpdate.classList.remove('active');
	popupUpdate.classList.remove('active');
	
});