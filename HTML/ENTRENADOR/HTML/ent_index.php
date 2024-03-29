<?php
session_start();
include("../php/connection.php");
$usuario = $_SESSION['user'];
if(!isset($usuario)){
    header("location:../../index.php");
}
?>
<!DOCTYPE html>
<html>
<?php
ob_start();
include("../php/dato_login.php");
$id_ent = $_GET['id_ent'];
$foto = "";
$nombres = "";
$datos = get_datos($id_ent);
while ($row = $datos->fetch_assoc()) {
	$foto = $row['foto'];
	$nombres = $row['nombres'] . " " . $row['apellidos'];
}
?>

<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Entrenadores inicio</title>
	<link rel="stylesheet" type="text/css" href="../CSS/CSS/menu.css">
	<link rel="stylesheet" type="text/css" href="../../iconos/web-fonts-with-css/css/fontawesome-all.css">
	<link rel="stylesheet" type="text/css" href="../CSS/CSS/banner.css">
	<link rel="stylesheet" type="text/css" href="../CSS/CSS/body.css">
	<link rel="stylesheet" type="text/css" href="../CSS/CSS/tablas.css">
	<link rel="stylesheet" type="text/css" href="../CSS/CSS_ENT_INDEX/principal_ent_clt_tar.css">
	<script language="javascript" src="..\..\js\jquery-3.6.0.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

	<link rel="stylesheet" href="../CSS/CSS/styleMenu.css">
</head>

<body>
	<div id="sidemenu" class="menu-collapsed">
		<!-- HEADER -->
		<div id="header">
			<div id="title"><span>Gimnasio BFree</span></div>
			<div id="menu-btn">
				<div class="btn-hamburger"></div>
				<div class="btn-hamburger"></div>
				<div class="btn-hamburger"></div>
			</div>
		</div>

		<!-- PROFILE -->
		<div id="profile">
			<div id="photo"><img src="../../img_per/<?php echo $foto ?>" alt=""></div>
            <div id="name"><span><?php echo $nombres ?></span></div>
		</div>

		<!-- ITEMS -->
		<div id="menu-items">
			<div class="item">
				<a href="homeMenu.php?id_user=ent<?php echo $id_ent ?>">
					<div class="icon"><img src="../../iconos/entrenador/home.png" alt=""></div>
					<div class="title"><span>Inicio</span></div>
				</a>
			</div>
			<div class="item separator"></div>
			<div class="item">
				<a href="config_ent.php?id_ent=<?php echo $id_ent ?>">
					<div class="icon"><img src="../../iconos/entrenador/configuracion.png" alt=""></div>
					<div class="title"><span>Configuración</span></div>
				</a>
			</div>
			<div class="item">
				<a href="../php/cerrarS.php">
					<div class="icon"><img src="../../iconos/entrenador/cerrar_sesion.png" alt=""></div>
					<div class="title"><span>Cerrar sesión</span></div>
				</a>
			</div>
		</div>
	</div>

	<header>
		<div class="contenedor">
			<img src="../../img_gen/logoBFree.png" class="logogym">
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
				url: '../php/mtr_clt_activo.php?id_ent=<?php echo $id_ent ?>',
				success: function(data) {
					document.getElementById("datos_busqueda").innerHTML = data;
				}
			});
		}
	</script>
	<script>
		const btn = document.querySelector('#menu-btn');
		const menu = document.querySelector('#sidemenu');
		btn.addEventListener('click', e => {
			menu.classList.toggle("menu-expanded");
			menu.classList.toggle("menu-collapsed");
			document.querySelector('body').classList.toggle('body-expanded');
		});
	</script>
</body>


</html>