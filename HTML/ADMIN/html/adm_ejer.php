<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Ejercicios</title>
	<link rel="stylesheet" type="text/css" href="../css/css/menu.css">
	<link rel="stylesheet" type="text/css" href="../../iconos/web-fonts-with-css/css/fontawesome-all.css">
	<link rel="stylesheet" type="text/css" href="../Css/css/banner.css">
	<link rel="stylesheet" type="text/css" href="../Css/css/body.css">
	<link rel="stylesheet" type="text/css" href="../CSs/cSS_ADM_EJeR/principal_adm_ejer_tar.css">
	<link rel="stylesheet" type="text/css" href="../Css/css_adm_eJer/popup.css">
	<script language="javascript" src="..\..\js\jquery-3.6.0.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>

<body>
	<header>
		<div class="contenedor">
			<img src="../../img_gen/logoBFree.png" class="logogym">
			<button id="btn-abrir-popup" class="btn-abrir-popup"><img src="../../img_gen/plus.png" class="plus"></button>
			<input type="checkbox" id="menu-bar">
			<label class="fas fa-bars" for="menu-bar"></label>
			<nav class="menu2">
				<a href="adm_clt.php">Clientes</a>
				<a href="adm_ent.php">Entrenadores</a>
				<a href="facturacion.php">Facturacion</a>
				<a href="">Ingreso</a>
			</nav>
			<!-- clase overlay es una ventana emergente para agregar un ejercicio -->
			<div class="overlay" id="overlay">
				<div class="popup" id="popup">
					<a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
					<h3>Añadir ejercicio</h3>
					<h4>Completa el siguiente formulario</h4>
					<form action="..\php\reg_ejr.php" method="post">
						<div class="contenedor-inputs">
							<input type="text" placeholder="Nombre Ejercicio" name="ejercicio" required>
							<textarea name="descripcion" placeholder="Descripcion" required></textarea>
							<input type="text" placeholder="URL video ejercicio (opcional)" name="video">
							<label for="">Seleccione Imagen: </label>
							<input type="file" name="imagen" required>
						</div>
						<input type="submit" class="btn-submit" value="AÑADIR">
					</form>
				</div>
			</div>
		</div>
	</header>
	<main>
		<!-- creacion dinamica de las tarjetas que contienen los ejercicios -->
		<div class="principal">
			<div class="datos " id="tar">
				<div class="busqueda">
					<h1>Buscar ejercicio</h1>
					<input onkeyup="buscar_ahora($('#buscar_1').val());" type="text" class="form-control" id="buscar_1" name="buscar_1">
				</div>
			</div>
			<div id="datos_buscador" class="datos_buscador">
				
			</div>
		</div>
	</main>
	<footer>
		<div class="sociales">
			<a class="fab fa-facebook" href="https://www.facebook.com/BfreeGym"></a>
			<a class="fab fa-instagram" href="https://www.instagram.com/bfreegym/"></a>
		</div>
	</footer>
	<script src="../css/css_adm_ejer/popup.js"></script>
	<script type="text/javascript">
		function buscar_ahora(buscar) {
			var parametros = {
				"buscar": buscar
			};
			$.ajax({
				data: parametros,
				type: 'POST',
				url: '../php/mtr_ejr_buscador.php',
				success: function(data) {
					document.getElementById("datos_buscador").innerHTML = data;
				}
			});
		}
	</script>
</body>

</html>