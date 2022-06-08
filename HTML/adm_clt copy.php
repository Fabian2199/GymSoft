<?php include ("db_connection\mtr_ejr.php")?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>clientes</title>
	<link rel="stylesheet" type="text/css" href="css_adm_ejer/menu.css">
	<link rel="stylesheet" type="text/css" href="iconos/web-fonts-with-css/css/fontawesome-all.css">
	<link rel="stylesheet" type="text/css" href="CSS_ADM_EJER/banner.css">
	<link rel="stylesheet" type="text/css" href="css_adm_ejEr/principal_adm_ejer.css">
	<link rel="stylesheet" type="text/css" href="CSS_ADM_EJeR/principal_adm_ejer_tar.css">
	<link rel="stylesheet" type="text/css" href="css_adm_ejer/popup.css">
</head>
<body>
<header>
		<div class="contenedor">
			<img src="img_gen/logoBFree.png" class="logogym">
			<button id="btn-abrir-popup" class="btn-abrir-popup"><img src="img_gen/plus.png" class="plus"></button>
			<input type="checkbox" id="menu-bar">
			<label class="fas fa-bars" for="menu-bar"></label>
			<nav class="menu2">
				<a href="adm_ejer.php">EJERCICIOS</a>
				<a href="">ENTRENADORES</a>
				<a href="">FACTURACION</a>
				<a href="">INGRESO</a>
			</nav>
			<!-- clase overlay es una ventana emergente para agregar un ejercicio -->
			<div class="overlay" id="overlay">
				<div class="popup" id="popup">
					<a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
					<h3>AÑADIR CLIENTE</h3>
					<h4>completa el siguiente formulario</h4>
					<form action="" method="post">
						<div class="contenedor-inputs">
							<input type="text" placeholder="Nombre Ejercicio" name="ejercicio">
							<input type="text" placeholder="Descripcion" name="descripcion">
							<input type="text" placeholder="URL video ejercicio (opcional)" name="video">
							<label for="">Seleccione Imagen: </label>
							<input type="file" name="imagen">
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
			<?php while($row=$consulta->fetch_assoc()){?>
				<div for="tar" class="gen">
					<div class="targeta " id="tar">
						<div class="adelante">
							<img src=<?php echo "img_ejer\\".$row['imagen']; ?> alt="">
						</div>
						<div class="atras">
							<a href=<?php echo $row['video']; ?>>
								<h1><?php echo $row['nombre_ejercicio']; ?></h1></a>
							<p>
							<?php echo $row['descripcion']; ?>
							</p>
					
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	<!--<div class="principal">
		<div class="gen">
			<div class="targeta ">
				<div class="adelante">
					<img src="img_ejer\leg_ext.jpg" alt="">
				</div>
				<div class="atras">
					<h1>EJERCICIO 1:</h1>
					<p>
						Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora laborum in nihil laboriosam ipsum exercitationem voluptates atque corporis reprehenderit sit porro, ab at doloremque eius eligendi maxime sunt cupiditate? Ullam.
					</p>
					
				</div>
			</div>
		</div>
	</div>-->
	</main>
	<footer>
		<div class="sociales">
			<a class="fab fa-facebook" href="https://www.facebook.com/BfreeGym"></a>
			<a class="fab fa-instagram" href="https://www.instagram.com/bfreegym/"></a>
		</div>
	</footer>
	<script src="css_adm_ejer/popup.js"></script>
</body>
</html>