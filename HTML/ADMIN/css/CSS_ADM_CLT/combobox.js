$(document).ready(function(){
	var btn = document.getElementById('btn_actu');
	$("#clt").change(function () {
		$("#clt option:selected").each(function () {
			btn.disabled =false;
			id_persona = $(this).val();
			console.log(btn);
			$.post("../php/sel_per.php", { id_persona: id_persona }, function(data){
				$("#contenedor-inputs").html(data);
			});            
		});
	})
});

