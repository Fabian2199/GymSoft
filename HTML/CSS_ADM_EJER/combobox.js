$(document).ready(function(){
	var btn = document.getElementById('btn_actu');
	$("#ejers").change(function () {
		$("#ejers option:selected").each(function () {
			btn.disabled =false;
			id_ejercicio = $(this).val();
			console.log(btn);
			$.post("db_connection/sel_ejr.php", { id_ejercicio: id_ejercicio }, function(data){
				$("#contenedor-inputs").html(data);
			});            
		});
	})
});

