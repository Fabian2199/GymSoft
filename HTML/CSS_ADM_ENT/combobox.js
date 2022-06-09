$(document).ready(function(){
	var btn = document.getElementById('btn_actu');
	$("#ent").change(function () {
		$("#ent option:selected").each(function () {
			btn.disabled =false;
			id_persona = $(this).val();
			console.log(btn);
			$.post("db_connection/sel_per.php", { id_persona: id_persona }, function(data){
				$("#contenedor-inputs").html(data);
			});            
		});
	})
});

