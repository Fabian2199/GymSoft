<?php
session_start();
include("../php/connection.php");
$usuario = $_SESSION['user'];
if(!isset($usuario)){
    header("location:../../index.php");
}
?>
<?php include("../php/mtr_clt.php") ?>
<?php include("../php/mtr_ejr.php") ?>
<?php include("../php/connection.php") ?>
<?php include("../php/dato_ent_clt.php") ?>

<?php
$id_clt = $_GET['id_clt'];
$id_ent = $_GET['id_ent'];
include("../php/dato_login.php");
$foto = "";
$nombres = "";
$datos = get_datos($id_ent);
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
	<title>Cliente</title>
	<link rel="stylesheet" type="text/css" href="../CSS/CSS/menu.css">
	<link rel="stylesheet" type="text/css" href="../../iconos/web-fonts-with-css/css/fontawesome-all.css">
	<link rel="stylesheet" type="text/css" href="../CSS/CSS_ENT_CLT_SEL/principal_ent_clt.css">
	<link rel="stylesheet" type="text/css" href="../CSS/CSS_ENT_CLT_SEL/ficha_clt.css">
	<link rel="stylesheet" href="../CSS/CSS/tablas.css">

	<link rel="stylesheet" href="../CSS/CSS/styleMenu.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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
			<div class="item">
                <a href="ent_index.php?id_ent=<?php echo $id_ent?>">
                    <div class="icon"><img src="../../iconos/entrenador/clientes.png" alt=""></div>
                    <div class="title"><span>Clientes</span></div>
                </a>
            </div>
			<div class="item separator"></div>
			<div class="item">
				<a href="config_ent.php?id_ent=<?php echo $id_ent?>">
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
		<div class="principal" id="principal">
			<div for="tar" class="ficha_gen">
				<div class="ficha " id="tar">
					<div class="adelante">
						<h1>Valoraciones</h1>
						<div class="contenedor-inputs" id="contenedor-inputs">
							<form action="../php/reg_ficha_clt.php?id_ent=<?php echo $id_ent; ?>&id_clt=<?php echo $id_clt; ?>" method="POST">
								<h1 class='h1_datos'>Datos y medidas:</h1>
								<div>
									<label for="fecha">Fecha: </label>
									<input type="date" placeholder="MM/DD/AAAA" id="fecha" name="fecha" required>
									<label for="1">Peso:</label>
									<input type="number" step="0.01" min="1" placeholder="Peso" id="1" name="peso" required>
									<label for="1">Estatura:</label>
									<input type="number" step="0.01" min="1" placeholder="Estatura" id="1" name="estatura" required>
								</div>
								<table>
									<tbody>
										<tr>
											<th>
												<label for="1">Cuello:</label>
												<input type="number" step="0.01" min="1" placeholder="Cuello" id="1" name="cuello" required>
											</th>
											<th>
												<label for="1">Hombro:</label>
												<input type="number" step="0.01" min="1" placeholder="Hombro" id="1" name="hombro" required>
											</th>
											<th>
												<label for="1">Pecho:</label>
												<input type="number" step="0.01" min="1" placeholder="Pecho" id="1" name="pecho" required>
											</th>
											<th>
												<label for="1">Espalda:</label>
												<input type="number" step="0.01" min="1" placeholder="Espalda" id="1" name="espalda" required>
											</th>
											<th>
												<label for="1">Cintura:</label>
												<input type="number" step="0.01" min="1" placeholder="Cintura" id="1" name="cintura" required>
											</th>
										</tr>
										<tr>
											<th>
												<label for="1">Abdomen:</label>
												<input type="number" step="0.01" min="1" placeholder="Abdomen" id="1" name="abdomen" required>
											</th>
											<th>
												<label for="1">Cadera:</label>
												<input type="number" step="0.01" min="1" placeholder="Cadera" id="1" name="cadera" required>
											</th>
											<th>
												<label for="1">% de grasa:</label>
												<input type="number" step="0.01" min="1" placeholder="% de grasa" id="1" name="por_grasa" required>
											</th>
											<th>
												<label for="1">Tension arterial:</label>
												<input type="number" step="0.01" min="1" placeholder="Tension arterial" id="1" name="valor_tension'" required>
											</th>
											<th>
												<label for="1">Pulso:</label>
												<input type="number" step="0.01" min="1" placeholder="Pulso" id="1" name="pulso" required>
											</th>
										</tr>
									</tbody>
								</table>
								<table>
									<thead>
										<tr>
											<th>Medida</th>
											<th>Valor izq</th>
											<th>Valor der</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<th>
												<label for="1">Brazos</label>
											</th>
											<th>
												<input type="number" step="0.01" min="1" placeholder="Izquierdo" id="1" name="br_izq" required>
											</th>
											<th>
												<input type="number" step="0.01" min="1" placeholder="Derecho" id="1" name="br_der" required>
											</th>
										</tr>
										<tr>
											<th>
												<label for="1">Ante-brazos:</label>
											</th>
											<th>
												<input type="number" step="0.01" min="1" placeholder="Izquierdo" id="1" name="ant_izq" required>
											</th>
											<th>
												<input type="number" step="0.01" min="1" placeholder="Derecho" id="1" name="ant_der" required>
											</th>
										</tr>
										<tr>
											<th>
												<label for="1">Piernas:</label>
											</th>
											<th>
												<input type="number" step="0.01" min="1" placeholder="Izquierdo" id="1" name="pr_izq" required>
											</th>
											<th>
												<input type="number" step="0.01" min="1" placeholder="Derecho" id="1" name="pr_der" required>
											</th>
										</tr>
										<tr>
											<th>
												<label for="1">Pantorrillas:</label>
											</th>
											<th>
												<input type="number" step="0.01" min="1" placeholder="Izquierdo" id="1" name="pnt_izq" required>
											</th>
											<th>
												<input type="number" step="0.01" min="1" placeholder="Derecho" id="1" name="pnt_der" required>
											</th>
										</tr>
									</tbody>
								</table>
								<div>
								</div>
								<h1 class='h1_datos'>Adipometria:</h1>
								<table>
									<tbody>
										<tr>
											<th>
												<label for="1">Tricipital:</label>
												<input type="number" step="0.01" min="1" placeholder="Tricipital" id="1" name="adipo_tri" required>
											</th>
											<th>
												<label for="1">Abdominal:</label>
												<input type="number" step="0.01" min="1" placeholder="Abdominal" id="1" name="adipo_apdo" required>
											</th>
											<th>
												<label for="1">Suprailiaco:</label>
												<input type="number" step="0.01" min="1" placeholder="Suprailiaco" id="1" name="adipo_supra" required>
											</th>
											<th>
												<label for="1">Subescapular:</label>
												<input type="number" step="0.01" min="1" placeholder="Subescapular" id="1" name="adipo_sube" required>
											</th>
											<th>
												<label for="1">Tipo de cuerpo:</label>
												<input type="text" placeholder="Tipo de cuerpo" id="1" name="t_cuerpo" required>
											</th>
										</tr>
									</tbody>
								</table>
								<h1 class='h1_datos'>Antecedentes medicos:</h1>
								<table>
									<tbody>
										<tr>
											<th>
												<label for="1">Embarazo:</label>
												<select name="embarazo" id="1" class="sel" required>
													<option value="1">Si</option>
													<option value="0">No</option>
												</select>
											</th>
											<th>
												<label for="1">Enfermedades cardiacas:</label>
												<select name="cardiaco" id="1" class="sel" required>
													<option value="1">Si</option>
													<option value="0">No</option>
												</select>
											</th>
											<th>
												<label for="1">Hipoglicemia:</label>
												<select name="hipoglisemia" id="1" class="sel" required>
													<option value="1">Si</option>
													<option value="0">No</option>
												</select>
											</th>
											<th>
												<label for="1">Alergias:</label>
												<select name="alergias" id="1" class="sel" required>
													<option value="1">Si</option>
													<option value="0">No</option>
												</select>
											</th>
										</tr>
										<tr>
											<th>
												<label for="1">Migrañas:</label>
												<select name="migrana" id="1" class="sel" required>
													<option value="1">Si</option>
													<option value="0">No</option>
												</select>
											</th>
											<th>
												<label for="1">Asma:</label>
												<select name="asma" id="1" class="sel" required>
													<option value="1">Si</option>
													<option value="0">No</option>
												</select>
											</th>
											<th>
												<label for="1">Lesiones oseas:</label>
												<select name="les_osea" id="1" class="sel" required>
													<option value="1">Si</option>
													<option value="0">No</option>
												</select>
											</th>
											<th>
												<label for="1">Lesiones Musculare:</label>
												<select name="les_musc" id="1" class="sel" required>
													<option value="1">Si</option>
													<option value="0">No</option>
												</select>
											</th>
										</tr>
										<tr>
											<th>
												<label for="1">Tension arterial:</label>
												<select name="tens_arterial" id="1" class="sel" required>
													<option value="0">Normal</option>
													<option value="1">Anormal</option>
												</select>
											</th>
											<th>
												<label for="1">Colesterol:</label>
												<select name="colesterol" id="1" class="sel" required>
													<option value="0">Normal</option>
													<option value="1">Anormal</option>
												</select>
											</th>
											<th>
												<label for="1">Trigliceridos:</label>
												<select name="trigliceridos" id="1" class="sel" required>
													<option value="0">Normal</option>
													<option value="1">Anormal</option>
												</select>
											</th>
										</tr>
									</tbody>
								</table>
								<table>
									<tbody>
										<tr>
											<th>
												<label for="1">Observaciones:</label>
											</th>
											<th>
												<textarea name="observaciones" id="1" cols="80" rows="5" name=""></textarea>
											</th>
										</tr>
									</tbody>
								</table>
								<input type="submit" class="btn_actu" value="Agregar" id="btn_actu">
							</form>
						</div>
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