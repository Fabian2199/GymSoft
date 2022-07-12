<?php include("db_connection\mtr_clt.php") ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Entrenadores inicio</title>
	<link rel="stylesheet" type="text/css" href="CSS_ENT_INDEx/menu.css">
	<link rel="stylesheet" type="text/css" href="iconos/web-fonts-with-css/css/fontawesome-all.css">
	<link rel="stylesheet" type="text/css" href="CSS_ENT_INDEx/principal_ent_clt.css">
	<link rel="stylesheet" type="text/css" href="CSS_ENT_INDEx/principal_ent_clt_taR.css">
	<link rel="stylesheet" type="text/css" href="CSS_ENT_INDEX/popup.css">
	<link rel="stylesheet" type="text/css" href="CSS_ENT_INDEX/popup_update.css">
	<script language="javascript" src="js\jquery-3.6.0.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>

<body>
	<header>
		<div class="contenedor">
			<img src="img_gen/logoBFree.png" class="logogym">
			<input type="checkbox" id="menu-bar">
			<label class="fas fa-bars" for="menu-bar"></label>
			<nav class="menu2">
				<a href="adm_ejer.php">Agregar rutina</a>
				<a href="ficha.php">Agregar ficha antropometrica</a>
				<a href="Configuracion.php">Configuracion</a>
			</nav>
			<div class="busqueda">
				<h1>Buscar documento</h1>
				<input onkeyup="buscar_ahora($('#buscar_1').val());" type="text" class="form-control" id="buscar_1" name="buscar_1">
			</div>
		</div>
	</header>
	<main>
		<!-- creacion dinamica de las tarjetas que contienen los clientes -->
		<div class="principal" id="principal">
		<?php include("db_connection\mtr_clt.php") ?>
			<?php while ($row = $consulta->fetch_assoc()) { ?>
				<div for="tar" class="gen">
					<div class="targeta " id="tar">
						<div class="adelante">
							<a  href="ent_clt_sel.php?id_persona=<?php echo $row['id_persona']; ?>">
								<h1><?php echo $row['nombres'] . " " . $row['apellidos']; ?></h1>
							</a>
							<img src=<?php echo "img_per\\" . $row['foto']; ?> alt="">
						</div>
					</div>
				</div>
			<?php } ?>
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
				url: 'db_connection/mtr_clt_activo.php',
				success: function(data) {
					document.getElementById("principal").innerHTML = data;
				}
			});
		}
	</script>
</body>


</html>
