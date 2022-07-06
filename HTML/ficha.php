<!DOCTYPE html>
<html>
<head>
	<title>Registrar usuario</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="CSS_FICHA/estilo.css">
	<?php
	include ("db_connection/connection.php");
	session_start();
	require_once "db_connection/connection.php";
	$conexion;
	$row = '';
	$row2 = '';
	$sql=mysqli_query($conexion,"SELECT * FROM usuarios WHERE `tipo_user` ='entrenador'");
	while($f=mysqli_fetch_assoc($sql)){
					$row .= "<option value='" . $f['id_user'] . "'>" .
											 $f['id_user'] . "</option>";
	}
	$sql2=mysqli_query($conexion,"SELECT * FROM usuarios WHERE `tipo_user` ='cliente'");
	while($f=mysqli_fetch_assoc($sql2)){
					$row2 .= "<option value='" . $f['id_user'] . "'>" .
											 $f['id_user'] . "</option>";
	}

?>
</head>
<body style="background: url('fondo.jpg') 50% fixed">
<body>
    <form method="post">
		<a href="db_connection/ent_index.php" class="boton">VOLVER</a>
    	<h1><br>Ficha Antropometrica</h1>
			<form action="reg_ficha.php" method="post">
				<div class="contenedor-inputs">
				<select class="select-css" name="id_entrenador" id="SelectBanco" required="">
					<option disabled="disabled" value="" name="id_entrenador" selected>Entrenadores</option>
						<?php echo $row;?>">
				</select>
				<select class="select-css" name="id_cliente" id="SelectBanco" required="">
					<option disabled="disabled" value="" name="id_cliente"  selected>Clientes</option>
						<?php echo $row2;?>">
				</select>
				<input type="date" name="fecha" required>
				<input type="number" name="edad" placeholder="Edad">
				<input type="number" name="peso" placeholder="Peso (KG)">
				<input type="number" name="estatura" placeholder="Estatura (cm)">
				<input type="number" name="cuello" placeholder="Cuello">
				<input type="number" name="hombro" placeholder="Hombro">
				<input type="number" name="pecho" placeholder="Pecho">
				<input type="number" name="espalda" placeholder="Espalda">
				<input type="number" name="br_izq" placeholder="Brazo Izquierdo">
				<input type="number" name="br_der" placeholder="Brazo Derecho">
				<input type="number" name="ant_izq" placeholder="Ante-Brazo Izquierdo">
				<input type="number" name="ant_der" placeholder="Ante-Brazo Derecho">
				<input type="number" name="cintura" placeholder="Cintura">
				<input type="number" name="abdomen" placeholder="Abdomen">
				<input type="number" name="cadera" placeholder="Cadera">
				<input type="number" name="pr_izq" placeholder="Pierna izquiqerda">
				<input type="number" name="pr_der"  placeholder="Pierna derecha">
				<input type="number" name="por_grasa" placeholder="% De grasa">
				<input type="number" name="valor tension" placeholder="valor tension">
				<input type="number" name="pulso" placeholder="Pulso">
				<input type="number" name="adipo_tri" placeholder="adipo_tri">
				<input type="number" name="adipo_apdo" placeholder="adipo_apdo">
				<input type="number" name="adipo_supra" placeholder="adipo_supra">
				<input type="number" name="adipo_sube" placeholder="adipo_sube">
				<input type="text" name="t_cuerpo" placeholder="Tipo de cuerpo">
				<input type="number" name="imc"  placeholder="IMC"><br>
				<h3><br>Situación de embarazo</h3><br>
				<label class="container" name="embarazo">Si
				  <input type="radio"  value="0" name="embarazo">
				  <span class="checkmark"></span>
				</label>
				<label class="container" name="embarazo">No
				  <input type="radio" value="1" name="embarazo">
				  <span class="checkmark"></span>
				</label>

				<h3><br>Problemas cardiacos</h3><br>
				<label class="container" name="cardiaco">Si
				  <input type="radio"  value="0" name="cardiaco">
				  <span class="checkmark"></span>
				</label>
				<label class="container">No
				  <input type="radio" value="1" name="cardiaco">
				  <span class="checkmark"></span>
				</label>

				<h3><br>Hipoglisemia</h3><br>
				<label class="container" name="hipoglisemia">Si
				  <input type="radio"  value="0" name="hipoglisemia">
				  <span class="checkmark"></span>
				</label>
				<label class="container" name="hipoglisemia">No
				  <input type="radio" value="1" name="hipoglisemia">
				  <span class="checkmark"></span>
				</label>

				<h3><br>Alergias </h3><br>
				<label class="container"  name="alergias">Si
					<input type="radio"  value="0" name="alergias">
					<span class="checkmark"></span>
				</label>
				<label class="container" name="alergias">No
					<input type="radio" value="1" name="alergias">
					<span class="checkmark"></span>
				</label>

				<h3><br>Migraña</h3><br>
				<label class="container" name="migrana">Si
					<input type="radio" value="0" name="migrana">
					<span class="checkmark"></span>
				</label>
				<label class="container" name="migrana">No
					<input type="radio" value="1" name="migrana">
					<span class="checkmark"></span>
				</label>

				<h3><br>Asma</h3><br>
				<label class="container" name="asma">Si
					<input type="radio"  value="0" name="asma">
					<span class="checkmark"></span>
				</label>
				<label class="container" name="asma">No
					<input type="radio" value="1" name="asma">
					<span class="checkmark"></span>
				</label>

				<h3><br>Lesiones oseas</h3><br>
				<label class="container" name="les_osea">Si
					<input type="radio" value="0" name="les_osea">
					<span class="checkmark"></span>
				</label>
				<label class="container" name="les_osea">No
					<input type="radio" value="1" name="les_osea">
					<span class="checkmark"></span>
				</label>

				<h3><br>Lesiones musculares</h3><br>
				<label class="container" name="les_musc">Si
					<input type="radio" value="0" name="les_musc">
					<span class="checkmark"></span>
				</label>
				<label class="container" name="les_musc">No
					<input type="radio" value="1" name="les_musc">
					<span class="checkmark"></span>
				</label>

				<h3><br>Tension Arterial </h3><br>
				<label class="container" name="tens_arterial">Si
					<input type="radio" value="0" name="tens_arterial">
					<span class="checkmark"></span>
				</label>
				<label class="container" name="tens_arterial">No
					<input type="radio" value="1" name="tens_arterial">
					<span class="checkmark"></span>
				</label>

				<h3><br>Colesterol</h3><br>
				<label class="container" name="colesterol">Si
					<input type="radio"  value="0" name="colesterol">
					<span class="checkmark"></span>
				</label>
				<label class="container" name="colesterol">No
					<input type="radio" value="1" name="colesterol">
					<span class="checkmark"></span>
				</label>

				<h3><br>Trigliceridos</h3><br>
				<label class="container" name="trigliceridos">Si
					<input type="radio"  value="0" name="trigliceridos">
					<span class="checkmark"></span>
				</label>
				<label class="container" name="trigliceridos">No
					<input type="radio" value="1" name="trigliceridos">
					<span class="checkmark"></span>
				</label>
				<input type="text" name="observaciones" placeholder="Observaciones">
	    	<input type="submit" name="register">
				</div>
    </form>
        <?php
        include("db_connection.php");
        ?>
</body>
</html>
