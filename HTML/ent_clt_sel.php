<?php include("db_connection\mtr_clt.php") ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Cliente</title>
	<link rel="stylesheet" type="text/css" href="CSS_ENT_CLT_SEl/menu.css">
	<link rel="stylesheet" type="text/css" href="iconos/web-fonts-with-css/css/fontawesome-all.css">
	<link rel="stylesheet" type="text/css" href="CSS_ENt_CLT_SEl/principal_ent_clt.css">
	<link rel="stylesheet" type="text/css" href="CSS_ENT_CLT_SEl/principal_ent_clt_taR.css">
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
				<a href="ent_index.php">Inicio</a>
				<a href="adm_ejer.php">Agregar rutina</a>
				<a href="adm_ent.php">Agregar ficha antropometrica</a>
				<a href="adm_ent.php">Configuracion</a>
			</nav>
		</div>
	</header>
	<main>
		<div class="principal" id="principal">
			<div for="tar" class="datos_gen">
				<div class="datos " id="tar">
					<div class="adelante">
						<h1>Datos</h1>
						<img src=""alt="">
						<img src=""alt="">
						<img src=""alt="">
					</div>
				</div>
			</div>
			<div for="tar" class="ficha_gen">
				<div class="ficha " id="tar">
					<div class="adelante">
						<h1>Valoraciones</h1>
						<img src=""alt="">
					</div>
				</div>
			</div>
			<div for="tar" class="rutina_gen">
				<div class="rutina " id="tar">
					<div class="adelante">
						<h1>Rutina</h1>
						<img src=""alt="">
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
</body>


</html>