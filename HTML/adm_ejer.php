<?php include ("db_connection\mtr_ejr.php")?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>ejercicios</title>
	<link rel="stylesheet" type="text/css" href="css_adm_ejer/menu.css">
	<link rel="stylesheet" type="text/css" href="iconos/web-fonts-with-css/css/fontawesome-all.css">
	<link rel="stylesheet" type="text/css" href="CSS_ADM_EJER/banner.css">
	<link rel="stylesheet" type="text/css" href="css_adm_ejer/principal_adm_ejer.css">
	<link rel="stylesheet" type="text/css" href="CSS_ADM_EJeR/principal_adm_ejer_tar.css">
	<link rel="stylesheet" type="text/css" href="css_adm_eJer/popup.css">
	<link rel="stylesheet" type="text/css" href="css_adm_ejEr/popup_update.css">
	<script language="javascript" src="js\jquery-3.6.0.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<body>
<header>
		<div class="contenedor">
			<img src="img_gen/logoBFree.png" class="logogym">
			<button id="btn-abrir-popup" class="btn-abrir-popup"><img src="img_gen/plus.png" class="plus"></button>
			<button id="btn_update" class="btn_update"><h1>Actualizar</h1></button>
			<input type="checkbox" id="menu-bar">
			<label class="fas fa-bars" for="menu-bar"></label>
			<nav class="menu2">
				<a href="adm_clt.php">CLIENTES</a>
				<a href="">ENTRENADORES</a>
				<a href="">FACTURACION</a>
				<a href="">INGRESO</a>
			</nav>
			<!-- clase overlay es una ventana emergente para agregar un ejercicio -->
			<div class="overlay" id="overlay">
				<div class="popup" id="popup">
					<a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
					<h3>AÑADIR EJERCICIO</h3>
					<h4>completa el siguiente formulario</h4>
					<form action="db_connection\reg_ejr.php" method="post">
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
			<?php while($row=$consulta->fetch_assoc()){?>
				<div for="tar" class="gen">
					<div class="targeta " id="tar">
						<div class="adelante">
							<img src=<?php echo "img_ejer\\".$row['imagen']; ?> alt="">
						</div>
						<div class="atras">
							<a href=<?php echo $row['video']; ?>>
								<h1><?php echo $row['nombre_ejercicio']; ?></h1>
							</a>
							<p>
							<?php echo $row['descripcion']; ?>
							</p>
						</div>
					</div>
				</div>
			<?php } ?>
			<!-- ventana emergente de actualizar datos -->
			<div class="update_over" id="update_over">
				<div class="update_popup" id="update_popup">
					<a href="#" id="btn-cerrar-update_popup" class="btn-cerrar-update_popup"><i class="fas fa-times"></i></a>
					<h3>Actualizar Datos</h3>
					<form action="db_connection\act_ejr.php" method="POST">
						<div class="inputs-update">
							<div class="box">
								<label for="ejers">Ejercicio: </label>
								<select name="ejers" id="ejers">
										<option value="100">Seleccionar ejercicio </option>
									<?php foreach($consulta as $opciones):?>
										<option value="<?php echo $opciones['id_ejercicio']; ?>"><?php echo $opciones['nombre_ejercicio']; ?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="contenedor-inputs" id="contenedor-inputs">
								
							</div>
						</div>
						<input type="submit" class="btn_actu" value="Actualizar" id="btn_actu" disabled = true>
					</form>
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
	<script src="css_adm_ejer/popup.js"></script>
	<script src="css_adm_ejeR/popup_update.js"></script>
	<script src="css_adm_eJer/combobox.js"></script>
	<script src="css_adm_ejeR/select2.js"></script>
</body>
</html>