var btnAbrirPopup = document.getElementById('btn-popup-agregar-rutina'),
	overlay = document.getElementById('overlay-agregar-rutina'),
	popup = document.getElementById('popup-agregar-rutina'),
	btnCerrarPopup = document.getElementById('btn-cerrar-popup-agregar-rutina');

btnAbrirPopup.addEventListener('click', function(){
	overlay.classList.add('active');
	popup.classList.add('active');
});

btnCerrarPopup.addEventListener('click', function(e){
	e.preventDefault();
	overlay.classList.remove('active');
	popup.classList.remove('active');
});