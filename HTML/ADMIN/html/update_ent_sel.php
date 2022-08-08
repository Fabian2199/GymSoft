<?php
session_start();
include("../php/connection.php");
$usuario = $_SESSION['user'];
if(!isset($usuario)){
    header("location:../../index.php");
}
?>
<?php include("..\php\connection.php") ?>
<?php include("..\php\dato_ent.php") ?>

<?php
$id = $_GET['id_persona'];
$datos = get_datos($id);
$id_user = $_GET['id_user'];
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Actualizar entrenador</title>
	<link rel="stylesheet" type="text/css" href="../CSS/CSS/menu.css">
	<link rel="stylesheet" type="text/css" href="../../iconos/web-fonts-with-css/css/fontawesome-all.css">
	<link rel="stylesheet" type="text/css" href="../CSS/CSS/banner.css">
	<link rel="stylesheet" type="text/css" href="../CSS/CSS/body.css">
	<link rel="stylesheet" type="text/css" href="../CSS/CSS_ADM_CLT/update_clt.css">

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
							
							<img src="<?php echo "../../img_per\\" . $row['foto']; ?>" alt="">
							<?php if ($row['estado'] == 0) { $estado = "Contratado";} else {$estado = "Sin contrato"; }?>
							<h1 class="h1_datos">Estado: <?php echo $estado; ?></h1>
							<form action="../php/act_per.php?id_user=<?php echo $id_user; ?>" method="POST">
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
							<a href="homeMenu.php?id_user=adm<?php echo $id_user; ?>" class="boton">Inicio</a>
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