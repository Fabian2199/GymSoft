<?php include("..\php\connection.php") ?>
<?php include("..\php\dato_ejr.php") ?>

<?php
$id = $_GET['id_persona'];
$id_ejercicio = $_GET['id_ejercicio'];
$dia = $_GET['dia'];
$datos = get_ejr($id_ejercicio);
$datos_rut = get_rut($id_ejercicio, $id, $dia);
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Actualizar rutina</title>
	<link rel="stylesheet" type="text/css" href="../css/css/menu.css">
	<link rel="stylesheet" type="text/css" href="../../iconos/web-fonts-with-css/css/fontawesome-all.css">
	<link rel="stylesheet" type="text/css" href="../Css/css/banner.css">
	<link rel="stylesheet" type="text/css" href="../Css/css/body.css">
	<link rel="stylesheet" type="text/css" href="../css/CSS_ENT_CLT_SEl/update_clt.css">

</head>

<body>
	<header>
		<div class="contenedor">
			<img src="../../img_gen/logoBFree.png" class="logogym">
			<input type="checkbox" id="menu-bar">
			<label class="fas fa-bars" for="menu-bar"></label>
			<nav class="menu2">
				<a href="ent_index.php">Inicio</a>
				<a href="ficha.php">Agregar ficha antropometrica</a>
				<a href="configuracion.php">Configuracion</a>
			</nav>
		</div>
	</header>
	<main>
		<div class="principal">
			<div for="tar" class="ficha_gen">
				<div class="ficha " id="tar">
					<div class="adelante">
						<h1>Datos</h1>

						<?php while ($row = $datos->fetch_assoc()) { ?>
							<h3 class="h1_datos"><?php echo $row['nombre_ejercicio']; ?></h3>
							<img src="<?php echo "../../img_ejer\\" . $row['imagen']; ?>" alt="">
							<p><?php echo $row['descripcion']; ?></p>
						<?php } ?>
						<?php while ($row = $datos_rut->fetch_assoc()) { ?>
							<form action="../php/act_rut.php" method="POST">
								<div class="inputs_update">
									<input type="text" name="dia" value="<?php echo $dia; ?>" style="display: none;">
									<input type="text" name="id_persona" value="<?php echo $id; ?>" style="display: none;">
									<input type="text" name="id_ejercicio" value="<?php echo $id_ejercicio; ?>" style="display: none;">
									<h2>Series:</h2>
									<input type="number" name="series" value="<?php echo $row['n_series']; ?>" required>
									<h2>Repeticiones:</h2>
									<input type="number" name="repeticiones" value="<?php echo $row['n_rep']; ?>" required>

								</div>
								<input type="submit" class="btn_actu" value="Actualizar" id="btn_actu">
							</form>
						<?php } ?>

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

</html>