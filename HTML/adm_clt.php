<?php include("db_connection\mtr_clt.php") ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Clientes</title>
	<link rel="stylesheet" type="text/css" href="css_adm_ejer/menu.css">
	<link rel="stylesheet" type="text/css" href="iconos/web-fonts-with-css/css/fontawesome-all.css">
	<link rel="stylesheet" type="text/css" href="CSS_ADM_clt/banner.css">
	<link rel="stylesheet" type="text/css" href="css_adm_clt/principal_adm_clt.css">
	<link rel="stylesheet" type="text/css" href="CSS_ADM_clt/principal_adm_clt_taR.css">
	<link rel="stylesheet" type="text/css" href="css_adM_clt/popup.css">
	<link rel="stylesheet" type="text/css" href="css_adM_clt/popup_update.css">
	<script language="javascript" src="js\jquery-3.6.0.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body>
	<header>
		<div class="contenedor">
			<img src="img_gen/logoBFree.png" class="logogym">
			<button id="btn-abrir-popup" class="btn-abrir-popup"><img src="img_gen/plus.png" class="plus"></button>
			<button id="btn_update" class="btn_update">
				<h1>Actualizar</h1>
			</button>
			<input type="checkbox" id="menu-bar">
			<label class="fas fa-bars" for="menu-bar"></label>
			<nav class="menu2">
				<a href="adm_ejer.php">EJERCICIOS</a>
				<a href="adm_ent.php">ENTRENADORES</a>
				<a href="facturacion.php">FACTURACION</a>
				<a href="">INGRESO</a>
			</nav>
			<!-- clase overlay es una ventana emergente para agregar un cliente -->
			<div class="overlay" id="overlay">
				<div class="popup" id="popup">
					<a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
					<h3>AÑADIR CLIENTE</h3>
					<h4>completa el siguiente formulario</h4>
					<form action="db_connection\reg_per.php" method="post">
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
		<!-- creacion dinamica de las tarjetas que contienen los clientes -->
		<div class="principal">
			<?php while ($row = $consulta->fetch_assoc()) { ?>
				<div for="tar" class="gen">
					<div class="targeta " id="tar">
						<div class="adelante">
							<h1><?php echo $row['nombres'] . " " . $row['apellidos']; ?></h1>
							<img src=<?php echo "img_per\\" . $row['foto']; ?> alt="">
						</div>
						<div class="atras">
							<h1><?php echo $row['nombres'] . " " . $row['apellidos']; ?></h1>
							<p>
								<?php echo "Datos Personales"; ?> <br>
								<?php echo "Documento: " . $row['id_persona']; ?> <br>
								<?php echo "Email: " . $row['email']; ?> <br>
								<?php echo "Cel: " . $row['celular']; ?> <br>
								<?php echo "Fecha de nacimiento: " . $row['fecha_nac']; ?> <br>
								<?php
									$estado =" ";
								 	if($row['estado']==1){
										$estado ="Plan Vigente";
									}else{
										$estado= "Plan Vencido";
									}
								?>
								<?php echo "Datos Plan: ".$estado ; ?> <br>
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
					<form action="db_connection\act_per.php" method="POST">
						<div class="inputs-update">
							<div class="box">
								<label for="clt">Clientes: </label>
								<select name="clt" id="clt">
									<option value="100">Seleccionar Numero del documento </option>
									<?php foreach ($consulta as $opciones) : ?>
										<option value="<?php echo $opciones['id_persona']; ?>"><?php echo $opciones['id_persona']; ?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="contenedor-inputs" id="contenedor-inputs">

							</div>

						</div>
						<input type="submit" class="btn_actu" value="Actualizar" id="btn_actu" disabled=true>
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
	<script src="css_adm_clt/popup.js"></script>
	<script src="css_adm_clt/popup_update.js"></script>
	<script src="css_adm_clT/combobox.js"></script>
	<script src="css_adm_clt/foto.js"></script>
	<script src="css_adm_clT/select2.js"></script>
</body>

</html>