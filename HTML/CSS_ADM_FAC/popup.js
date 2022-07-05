var btnAbrirPopup = document.getElementById('btn-popup-pagar-factura'),
	overlay = document.getElementById('overlay-pagar-factura'),
	popup = document.getElementById('popup-pagar-factura'),
	btnCerrarPopup = document.getElementById('btn-cerrar-popup-pagar-factura');

btnAbrirPopup.addEventListener('click', function(){
	overlay.classList.add('active');
	popup.classList.add('active');
});

btnCerrarPopup.addEventListener('click', function(e){
	e.preventDefault();
	overlay.classList.remove('active');
	popup.classList.remove('active');
});