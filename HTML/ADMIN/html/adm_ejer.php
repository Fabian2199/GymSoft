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
	<title>Ejercicios</title>
	<link rel="stylesheet" type="text/css" href="../css/css/Menu.css">
	<link rel="stylesheet" type="text/css" href="../../iconos/web-fonts-with-css/css/fontawesome-all.css">
	<link rel="stylesheet" type="text/css" href="../Css/css/banner.css">
	<link rel="stylesheet" type="text/css" href="../Css/css/body.css">
	<link rel="stylesheet" type="text/css" href="../CSs/cSS_ADM_EJER/principal_adm_ejer_tar.css">
	<link rel="stylesheet" type="text/css" href="../Css/css_adm_eJer/Popup.css">
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
				<a href="torniquete.php">
					<div class="icon"><img src="../../iconos/admin/ingreso.png" alt=""></div>
					<div class="title"><span>Ingreso</span></div>
				</a>
			</div>
			<div class="item">
				<a href="adm_clt.php?id_user=<?php echo $id; ?>">
					<div class="icon"><img src="../../iconos/admin/clientes.png" alt=""></div>
					<div class="title"><span>Clientes</span></div>
				</a>
			</div>
			<div class="item">
				<a href="adm_ent.php?id_user=<?php echo $id; ?>">
					<div class="icon"><img src="../../iconos/admin/entrenadores.png" alt=""></div>
					<div class="title"><span>Entrenadores</span></div>
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
			<!-- clase overlay es una ventana emergente para agregar un ejercicio -->
			<div class="overlay" id="overlay">
				<div class="popup" id="popup">
					<a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
					<h3>Añadir ejercicio</h3>
					<h4>Completa el siguiente formulario</h4>
					<form action="..\php\reg_ejr.php?id_user=<?php echo $id; ?>" method="post">
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
				url: '../php/mtr_ejr_buscador.php?id_user=<?php echo $id; ?>',
				success: function(data) {
					document.getElementById("datos_buscador").innerHTML = data;
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