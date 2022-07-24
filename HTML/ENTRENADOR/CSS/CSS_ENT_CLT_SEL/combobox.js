$(document).ready(function(){
	$("#ficha").change(function () {
		$("#ficha option:selected").each(function () {
			id_ficha = $(this).val();
			$.post("../php/sel_ficha.php", { id_ficha: id_ficha }, function(data){
				$("#contenedor-inputs").html(data);
			});            
		});
	})
});

