<?php
session_start();
include("../PHP/connection.php");
$usuario = $_SESSION['user'];
if(!isset($usuario)){
    header("location:../../index.php");
}
?>
<?php
$id = $_GET['id_user'];
include("../PHP/dato_login.php");
$foto = "";
$nombres = "";
$datos = get_datos($id);
while ($row = $datos->fetch_assoc()) {
	$foto = $row['foto'];
	$nombres = $row['nombres'] . " " . $row['apellidos'];
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Clientes</title>
	<link rel="stylesheet" type="text/css" href="../css/css/menu.css">
	<link rel="stylesheet" type="text/css" href="../../iconos/web-fonts-with-css/css/fontawesome-all.css">
	<link rel="stylesheet" type="text/css" href="../Css/css/banner.css">
	<link rel="stylesheet" type="text/css" href="../Css/css/body.css">
	<link rel="stylesheet" type="text/css" href="../CSS/CsS_ADM_Clt/principal_adm_clt_tar.css">
	<link rel="stylesheet" type="text/css" href="../csS/Css/tablas.css">
	<link rel="stylesheet" type="text/css" href="../Css/css_adM_clt/Popup.css">
	<script language="javascript" src="..\..\js\jquery-3.6.0.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

	<link rel="stylesheet" href="../css/css/styleMEnu.css">
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
				<a href="homeMenu.php?id_user=adm<?php echo $id; ?>">
					<div class="icon"><img src="../../iconos/admin/home.png" alt=""></div>
					<div class="title"><span>Inicio</span></div>
				</a>
			</div>
			<div class="item">
				<a href="adm_ent.php?id_user=<?php echo $id; ?>">
					<div class="icon"><img src="../../iconos/admin/entrenadores.png" alt=""></div>
					<div class="title"><span>Entrenadores</span></div>
				</a>
			</div>
			<div class="item">
				<a href="adm_ejer.php?id_user=<?php echo $id; ?>">
					<div class="icon"><img src="../../iconos/admin/ejercicios.png" alt=""></div>
					<div class="title"><span>Ejercicios</span></div>
				</a>
			</div>
			<div class="item">
				<a href="facturacion.php?id_user=<?php echo $id; ?>">
					<div class="icon"><img src="../../iconos/admin/facturacion.png" alt=""></div>
					<div class="title"><span>Facturación</span></div>
				</a>
			</div>
			<div class="item separator"></div>
			<div class="item">
				<a href="config_adm.php?id_persona=<?php echo $id; ?>">
					<div class="icon"><img src="../../iconos/admin/configuracion.png" alt=""></div>
					<div class="title"><span>Configuración</span></div>
				</a>
			</div>
			<div class="item">
				<a href="../PHP/cerrarS.php">
					<div class="icon"><img src="../../iconos/admin/cerrar_sesion.png" alt=""></div>
					<div class="title"><span>Cerrar sesión</span></div>
				</a>
			</div>
		</div>
	</div>

	<header>
		<div class="contenedor">
			<img src="../../img_gen/logoBFree.png" class="logogym">
			<button id="btn-abrir-popup" class="btn-abrir-popup"><img src="../../img_gen/plus.png" class="plus"></button>

			<!-- clase overlay es una ventana emergente para agregar un cliente -->
			<div class="overlay" id="overlay">
				<div class="popup" id="popup">
					<a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
					<h3>Añadir cliente</h3>
					<h4>Completa el siguiente formulario</h4>
					<form action="..\php\reg_per.php?id_user=adm<?php echo $id; ?>" method="post">
						<div class="contenedor-inputs">
							<input type="text" placeholder="Nombres" name="nombres" pattern="[A-Za-z ]+" required>
							<input type="text" placeholder="Apellidos" name="apellidos" pattern="[A-Za-z ]+" required>
							<input type="tel" placeholder="Numero Documento" name="documento" pattern="[0-9]+" required>
							<input type="date" name="cumpleanos" required>
							<input type="tel" placeholder="Celular" name="celular" pattern="[0-9]{10}" required>
							<input type="email" placeholder="Correo Electronico" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
							<input type="text" value="cliente" name="usuario" style="display: none;">
							<div class="foto" id="foto">
								<h1>Selecciona un dispositivo</h1>
								<select name="listaDeDispositivos" id="listaDeDispositivos"></select>
								<input class="btn_foto" type="button" id="boton" value="Tomar foto">
								<p id="estado"></p>
								<input type="text" name="foto" value="" style="display: none;">
								<video muted="muted" id="video"></video>
								<canvas id="canvas" style="display: none;"></canvas>
							</div>
						</div>
						<input type="submit" class="btn-submit" id="btn-submit" value="AÑADIR">
					</form>
				</div>
			</div>
		</div>
	</header>
	<main>
		<!-- creacion dinamica de la tabla de los clientes -->
		<div class="principal">
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
	<script src="../css/Css_adm_clt/popup.js"></script>
	<script src="../css/Css_adm_clT/combobox.js"></script>
	<script src="../Css/Css_adm_clt/foto.js"></script>
	<script type="text/javascript">
		function buscar_ahora(buscar) {
			var parametros = {
				"buscar": buscar
			};
			$.ajax({
				data: parametros,
				type: 'POST',
				url: '../php/mtr_clt_buscador.php?id_user=<?php echo $id; ?>',
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