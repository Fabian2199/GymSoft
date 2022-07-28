
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Entrenadores inicio</title>
	<link rel="stylesheet" type="text/css" href="../css/css/menu.css">
	<link rel="stylesheet" type="text/css" href="../../iconos/web-fonts-with-css/css/fontawesome-all.css">
	<link rel="stylesheet" type="text/css" href="../Css/css/banner.css">
	<link rel="stylesheet" type="text/css" href="../Css/css/body.css">
	<link rel="stylesheet" type="text/css" href="../csS/Css/tablas.css">
	<link rel="stylesheet" type="text/css" href="../csS/CsS_ENt_INDEx/principal_Ent_clt_taR.css">
	<script language="javascript" src="..\..\js\jquery-3.6.0.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>

<body>
	<header>
		<div class="contenedor">
			<img src="../../img_gen/logoBFree.png" class="logogym">
			<input type="checkbox" id="menu-bar">
			<label class="fas fa-bars" for="menu-bar"></label>
			<nav class="menu2">
				<a href="ficha.php">Agregar ficha antropometrica</a>
				<a href="../../configuracion.php">Configuracion</a>
			</nav>
		</div>
	</header>
	<main>
		<!-- creacion dinamica de las tarjetas que contienen los clientes -->
		<div class="principal" id="principal">
			<div for="tar" class="ficha_gen">
				<div class="ficha " id="tar">
					<div class="datos " id="tar">
						<div class="busqueda">
							<h1>Buscar documento</h1>
							<input onkeyup="buscar_ahora($('#buscar_1').val());" type="text" class="form-control" id="buscar_1" name="buscar_1">
						</div>
					</div>
					<div id="datos_busqueda">

					</div>
				</div>
			</div>
		</div>
	</main>
	<footer>
		<div class="sociales">
			<a class="fab fa-facebook" href="https://www.facebook.com/BfreeGym"></a>
			<a class="fab fa-instagram" href="https://www.instagram.com/bfreegym/"></a>
		</div>
	</footer>
	<script type="text/javascript">
		function buscar_ahora(buscar) {
			var parametros = {
				"buscar": buscar
			};
			$.ajax({
				data: parametros,
				type: 'POST',
				url: '../php/mtr_clt_activo.php',
				success: function(data) {
					document.getElementById("datos_busqueda").innerHTML = data;
				}
			});
		}
	</script>
</body>


</html>