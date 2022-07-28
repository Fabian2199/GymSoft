<?php include ("db_connection\connection.php")?>
<?php include("db_connection\datos_clt.php") ?>
<?php
$id = 101013622;
$rutina = get_rutina($id);
$datos = get_datos($id);
$ficha = get_ficha($id);
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Cliente</title>
	<link rel="stylesheet" type="text/css" href="CSS/menu.css">
	<link rel="stylesheet" type="text/css" href="../iconos/web-fonts-with-css/css/fontawesome-all.css">
	<link rel="stylesheet" type="text/css" href="CSS/principal_clt.css">
	<link rel="stylesheet" type="text/css" href="CSS/principal_clt_taR.css">
	<script language="javascript" src="..\js\jquery-3.6.0.min.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>

<body>
	<header>
		<div class="contenedor">
			<img src="../img_gen/logoBFree.png" class="logogym">
			<input type="checkbox" id="menu-bar">
			<label class="fas fa-bars" for="menu-bar"></label>
			<nav class="menu2">
				<a href="perfil_clt.php">Datos</a>
				<a href="../../cofiguracion.php">Configuracion</a>
			</nav>
		</div>
	</header>
	<main>

	</main>
	<footer>
		<div class="sociales">
			<a class="fab fa-facebook" href="https://www.facebook.com/BfreeGym"></a>
			<a class="fab fa-instagram" href="https://www.instagram.com/bfreegym/"></a>
		</div>
	</footer>
</body>
<script src="CSS_ENT_CLT_SEL\combobox.js"></script>
<script src="css_ent_rut/popup.js"></script>
</html>
