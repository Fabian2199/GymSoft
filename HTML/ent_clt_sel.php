<?php include ("db_connection\mtr_ejr.php")?>
<?php include ("db_connection\connection.php")?>
<?php include("db_connection\dato_ent_clt.php") ?>
<?php
$id = $_GET['id_persona'];
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
	<link rel="stylesheet" type="text/css" href="CSS_ENT_CLT_SEl/menu.css">
	<link rel="stylesheet" type="text/css" href="iconos/web-fonts-with-css/css/fontawesome-all.css">
	<link rel="stylesheet" type="text/css" href="CSS_ENt_CLT_SEl/principal_ent_clt.css">
	<link rel="stylesheet" type="text/css" href="CSS_ENT_CLT_SEL/principal_ent_clt_taR.css">
	<script language="javascript" src="js\jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css_ent_rut/popup.css">

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
		<!-- clase overlay es una ventana emergente para agregar una rutina -->
		<div class="overlay-agregar-rutina" id="overlay-agregar-rutina">
			<div class="popup-agregar-rutina" id="popup-agregar-rutina">
				<a href="#" id="btn-cerrar-popup-agregar-rutina" class="btn-cerrar-popup-agregar-rutina"><i class="fas fa-times"></i></a>
				<h3>AGREGAR RUTINA</h3>
				<h4>completa el siguiente formulario</h4>
				<form action="db_connection/agregarRutina.php" method="post">
					<?php
					$query = "SELECT us.id_user, pe.nombres, pe.apellidos FROM usuarios us, personas pe WHERE us.id_persona = pe.id_persona AND tipo_user LIKE 'cliente';";
					$consul = mysqli_query($conexion, $query);
					?>
					<select name="clientes" id="ejers">
						<option value="100">Seleccionar cliente</option>
						<?php foreach($consul as $personas):?>
							<option value="<?php echo $personas['id_user']; ?>"><?php echo $personas['nombres']." ".$personas['apellidos']; ?></option>
						<?php endforeach ?>
					</select>

					<select name="ejercicios" id="ejers">
							<option value="100">Seleccionar ejercicio</option>
						<?php foreach($consulta as $ejercicios):?>
							<option value="<?php echo $ejercicios['id_ejercicio']; ?>"><?php echo $ejercicios['nombre_ejercicio']; ?></option>
						<?php endforeach ?>
					</select>

					<select name="dias" id="ejers">
						<option value="100">Seleccionar día</option>
						<?php $semana = ['LUNES','MARTES','MIERCOLES','JUEVES','VIERNES','SABADO','DOMINGO']?>
						<?php foreach($semana as $index => $dia):?>
							<option value="<?php echo $dia; ?>"><?php echo $dia; ?></option>
							<!--<option value="<?php echo array_search($dia,array_keys($semana)); ?>"><?php echo $dia; ?></option>-->
						<?php endforeach ?>
					</select>

					<input type="number" name="num_series" placeholder="Numero de series">
					<input type="number" name="num_repeticiones" placeholder="Numero de repeticiones">
					<input type="submit" value="Guardar">
				</form>
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
							<img src="<?php echo "img_per\\" . $row['foto']; ?>" alt="">
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
						<select name="ficha" id="ficha">
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
						<input id="btn-popup-agregar-rutina" class="btn btn-popup-agregar-rutina" type="button" name="btnAgregarRutina" value="Agregar rutina">
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
										<th><img src="<?php echo "img_ejer\\" . $row['imagen']; ?>" alt="" class="imagen_ejr"></th>
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
<script src="CSS_ENT_CLT_SEL\combobox.js"></script>
<script src="css_ent_rut/popup.js"></script>
</html>