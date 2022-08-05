<?php include("..\php\connection.php") ?>
<?php include("..\php\dato_ejr.php") ?>

<?php
$id = $_GET['id_ejercicio'];
$datos = get_datos($id);
$id_user =$_GET['id_user'];
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
	<link rel="stylesheet" type="text/css" href="../CSs/CSS_ADM_ejer/update_ejr.css">

</head>

<body>
	<header>
		<div class="contenedor">
			<img src="../../img_gen/logoBFree.png" class="logogym">
		</div>
	</header>
	<main>
		<div class="principal">
			<div for="tar" class="ficha_gen">
				<div class="ficha " id="tar">
					<div class="adelante">
						<h1>Datos</h1>

						<?php while ($row = $datos->fetch_assoc()) { ?>
							
							<img src="<?php echo "../../img_ejer\\" . $row['imagen']; ?>" alt="">
							<form action="../php/act_ejr.php?id_user=<?php echo $id_user; ?>" method="POST">
								<div class="inputs_update">
									<input type="text" value="<?php echo $row['id_ejercicio'];?>" name="id" style="display: none;">
									<input type="text" value="<?php echo $row['nombre_ejercicio'];?>" name="ejercicio" pattern='[A-Za-z ]+' required>
									<textarea name="descripcion" pattern='[A-Za-z ]+' required><?php echo $row['descripcion'];?></textarea>
									<input type="text" value="<?php echo $row['video'];?>" name="video">
									<label id="divimg">
										¿Desea cambiar imagen?
										<input type="checkbox" value="1" name="check" id="check">
										<div><input type="text" value="<?php echo $row['imagen'];?>" name="imagen" style="display: none;"></div>
									</label>
									
								</div>
								<input type="submit" class="btn_actu" value="Actualizar" id="btn_actu">
								
							</form>

						<?php } ?>
						<a href="homeMenu.php?id_user=adm<?php echo $id_user; ?>" class="boton">Inicio</a>
					</div>
				</div>
			</div>
		</div>
	</main>
	<footer>
	<script src="../css/css_adm_ejer/checkbox.js"></script>
		<div class="sociales">
			<a class="fab fa-facebook" href="https://www.facebook.com/BfreeGym"></a>
			<a class="fab fa-instagram" href="https://www.instagram.com/bfreegym/"></a>
		</div>
	</footer>
</body>

</html>