<?php include("..\php\connection.php") ?>
<?php include("..\php\dato_ent.php") ?>

<?php
$id = $_GET['id_persona'];
$datos = get_datos($id);
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Actualizar Ejercicio</title>
	<link rel="stylesheet" type="text/css" href="../css/css/menu.css">
	<link rel="stylesheet" type="text/css" href="../../iconos/web-fonts-with-css/css/fontawesome-all.css">
	<link rel="stylesheet" type="text/css" href="../Css/css/banner.css">
	<link rel="stylesheet" type="text/css" href="../Css/css/body.css">
	<link rel="stylesheet" type="text/css" href="../CSs/CsS_ADM_Clt/update_clt.css">

</head>

<body>
	<header>
		<div class="contenedor">
			<img src="../../img_gen/logoBFree.png" class="logogym">
			<input type="checkbox" id="menu-bar">
			<label class="fas fa-bars" for="menu-bar"></label>
			<nav class="menu2">
				<a href="adm_ejer.php">Ejercicios</a>
				<a href="adm_ent.php">Entrenadores</a>
				<a href="facturacion.php">Facturacion</a>
				<a href="../../torniquete.php">Ingreso</a>
				<a href="../../configuracion.php">COf</a>
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
							
							<img src="<?php echo "../../img_per\\" . $row['foto']; ?>" alt="">
							<?php if ($row['estado'] == 0) { $estado = "Contratado";} else {$estado = "Sin contrato"; }?>
							<h1 class="h1_datos">Estado: <?php echo $estado; ?></h1>
							<form action="../php/act_per.php" method="POST">
								<div class="inputs_update">
									<input type="text" value=<?php echo $id;?> name= 'id_persona' style='display: none;'>
									<input type='text' value="<?php echo $row['nombres'];?>" name='nombres' pattern='[A-Za-z ]+' required>
									<input type='text' value="<?php echo $row['apellidos']; ?>"name='apellidos'pattern='[A-Za-z ]+' required>
									<input type='text' value=<?php echo $row['celular']; ?> name='celular' pattern='[0-9]{10}' required>
									<input type='email' value=<?php echo $row['email']; ?> name='email' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$'>
									<select name="contrato" class="contrato">
										<option value="0">Contratar</option>
										<option value="1">Sin contrato</option>
									</select>
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