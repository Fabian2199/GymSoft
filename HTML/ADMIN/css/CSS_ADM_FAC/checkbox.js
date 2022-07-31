var miCheckbox = document.getElementById('check');
var msg = document.getElementById('divimg');
var btn =document.querySelector('btn_actu');
function myfunctiion(){
	if (miCheckbox.checked) {
		msg.outerHTML="<input type='file' name='imagen' required>";
		
	}
};
miCheckbox.addEventListener('click', myfunctiion);