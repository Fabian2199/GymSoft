<?php
session_start();
include("../PHP/connection.php");
$usuario = $_SESSION['user'];
if(!isset($usuario)){
    header("location:../../index.php");
}
?>
<?php 
include("..\php\connection.php"); 
include ("../PHP/dato_login.php");
$id = $_GET['id_user'];
$datosL = get_datos($id);
$foto = "";
$nombres = "";
while ($row = $datosL->fetch_assoc()) {
	$foto = $row['foto'];
	$nombres = $row['nombres'] . " " . $row['apellidos'];
}
?>
<?php include("..\php\datos_clt.php") ?>

<?php
$rutina = get_rutina($id);
$datos = get_datoss($id);
$ficha = get_ficha($id);


?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Cliente</title>
	<link rel="stylesheet" href="../css/stylemEnu.css">
	<link rel="stylesheet" href="../css/menU.css">
	<link rel="stylesheet" type="text/css" href="../../iconos/web-fonts-with-css/css/fontawesome-all.css">
	<link rel="stylesheet" type="text/css" href="../CSS/principal_clt.css">
	<link rel="stylesheet" type="text/css" href="../CSS/principal_clt_tar.css">
	<script language="javascript" src="..\..\js\jquery-3.6.0.min.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>

<body>
	<header>
		<div class="contenedor">
			<img src="../../img_gen/logoBFree.png" class="logogym">
		</div>
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
					<a href="homeMenu.php?id_user=clt<?php echo $id ?>">
						<div class="icon"><img src="../../iconos/admin/home.png" alt=""></div>
						<div class="title"><span>Inicio</span></div>
					</a>
				</div>
				<div class="item separator"></div>
				<div class="item">
					<a href="config_clt.php?id_user=<?php echo $id ?>">
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
	</header>
	<main>
		<div class="principal" id="principal">
			<div for="tar" class="datos_gen">
				<div class="datos " id="tar">
					<div class="adelante">
						<h1>Datos</h1>
						<?php while ($row = $datos->fetch_assoc()) { ?>
							<img src="<?php echo "..\..\img_per\\" . $row['foto']; ?>" alt="">
							<h1 class="h1_datos"><?php echo $row['nombres']; ?></h1>
							<h1 class="h1_datos"><?php echo $row['apellidos']; ?></h1>
							<h1 class="h1_datos"><?php echo $row['celular']; ?></h1>
							<h1 class="h1_datos">Inicio Plan: <?php echo $row['fecha_ini']; ?></h1>
							<h1 class="h1_datos">Fin Plan: <?php echo $row['fecha_fin']; ?></h1>
						<?php } ?>
					</div>
				</div>
			</div>
			<div for="tar" class="ficha_gen">
				<div class="ficha " id="tar">
					<div class="adelante">
						<h1>Valoraciones</h1>
						<select name="ficha" id="ficha" class="select">
							<option value="100">Seleccionar fecha </option>
							<?php foreach ($ficha as $opciones) : ?>
								<option value="<?php echo $opciones['id_ficha']; ?>"><?php echo $opciones['fecha']; ?></option>
							<?php endforeach ?>
						</select>
						<div class="contenedor-inputs" id="contenedor-inputs">
							<h1 class='h1_datos'>Entrenador: </h1>
							<h1 class='h1_datos'>Datos y medidas:</h1>
							<h1 class='h1_datos'>Adipometria:</h1>
							<h1 class='h1_datos'>Antecedentes medicos:</h1>
						</div>
					</div>
				</div>
			</div>
			<div for="tar" class="rutina_gen">
				<div class="rutina " id="tar">
					<div class="adelante">
						<h1>Rutina</h1>
						<div style="text-align: center;">
							<input onclick="location.href='../PHP/rutinaPDF.php?id=<?php echo $id; ?>';" style="display: inline-block; margin: 0 auto; margin-top: 10px; height: 25px; width: 120px;" id="btn-popup-agregar-rutina" class="btn btn-popup-agregar-rutina" type="button" name="btnAgregarRutina" value="Descargar rutina">
						</div>
						<table>
							<thead>
								<th>Dia</th>
								<th>Ejercicio</th>
								<th>Imagen</th>
								<th>Número de series</th>
								<th>Número de repeticiones</th>
							</thead>
							<tbody>
								<?php while ($row = $rutina->fetch_assoc()) { ?>
									<tr>
										<th><?php echo $row['dia']; ?></th>
										<th><?php echo $row['nombre_ejercicio']; ?></th>
										<th><img src="<?php echo "..\..\img_ejer\\" . $row['imagen']; ?>" alt="" class="imagen_ejr"></th>
										<th><?php echo $row['n_series']; ?></th>
										<th><?php echo $row['n_rep']; ?></th>
									</tr>
								<?php } ?>
							</tbody>
						</table>
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
<script src="..\cSS\combobox.js"></script>
<script>
	const btn = document.querySelector('#menu-btn');
	const menu = document.querySelector('#sidemenu');
	btn.addEventListener('click', e => {
		menu.classList.toggle("menu-expanded");
		menu.classList.toggle("menu-collapsed");
		document.querySelector('body').classList.toggle('body-expanded');
	});
</script>

</html>