/*Login al sistema BodyFree*/
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

	<?php require_once "scripts.php"; ?>
</head>
<body style="background: url('img_login/fondo.jpg') 50% fixed">
	<br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<div class="panel panel-primary">
					<div class="panel panel-heading">Login BodyFree</div>
					<div class="panel panel-body">
						<div style="text-align: center;">
							<img src="img/BF.png" height="100">
						</div>
						<p></p>
						<label>Usuario</label>
						<input type="text" id="id_user" class="form-control input-sm" name="id_user">
						<label>Password</label>
						<input type="password" id="contrasena" class="form-control input-sm" name="">
						<p></p>
						<span class="btn btn-primary" id="entrarSistema">Entrar</span>
					</div>
				</div>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#entrarSistema').click(function(){
			if($('#id_user').val()==""){
				alertify.alert("Debes agregar el usuario");
				return false;
			}else if($('#contrasena').val()==""){
				alertify.alert("Debes agregar el password");
				return false;
			}

			cadena="id_user=" + $('#id_user').val() +"&contrasena=" + $('#contrasena').val();

			$.ajax({
				type:"POST",
				url:"db_connection/login.php",
				data:cadena,
				success:function(r){
					if(r==1){
						//admin
						window.location="admin/html/adm_clt.php?id_user="+ $('#id_user').val();
					}else if (r==2) {
						//cliente
						window.location="cliente/html/perfil_clt.php?id_user="+ $('#id_user').val();
					}else if (r==3) {
						//entrenador
						window.location="entrenador/html/ent_index.php?id_user="+ $('#id_user').val();
					}else {
						alertify.alert("Fallo al entrar :(");
					}
				}
			});
		});
	});
</script>
