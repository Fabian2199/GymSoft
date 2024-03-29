<?php
session_start();
include("../php/connection.php");
$usuario = $_SESSION['user'];
if(!isset($usuario)){
    header("location:../../index.php");
}
?>
<?php include ("../php/mtr_clt.php")?>
<?php include("../php/mtr_ejr.php") ?>
<?php 
include ("../php/connection.php");
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
<?php include("../php/dato_ent_clt.php") ?>

<?php
$id = $_GET['id_persona'];
$rutina = get_rutina($id);
$datos = get_datoss($id);
$ficha = get_ficha($id);

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
	<link rel="stylesheet" type="text/css" href="../CSS/CSS_ENT_CLT_SEL/principal_ent_clt_tar.css">

    <link rel="stylesheet" type="text/css" href=" ../CSS/CSS_ENT_RUT/popup.css">
	
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
                <a href="homeMenu.php?id_user=ent<?php echo $id_ent?>">
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
		<!-- clase overlay es una ventana emergente para agregar una rutina -->
		<div class="overlay-agregar-rutina" id="overlay-agregar-rutina">
			<div class="popup-agregar-rutina" id="popup-agregar-rutina">
				<a href="#" id="btn-cerrar-popup-agregar-rutina" class="btn-cerrar-popup-agregar-rutina"><i class="fas fa-times"></i></a>
				<h3>AGREGAR RUTINA</h3>
				<h4>completa el siguiente formulario</h4>
				<form action="../php/agregarRutina.php?id_ent=<?php echo $id_ent?>" method="post">
					<input name="clientes" id="ejers" type="hidden" value='<?php echo $id;?>'>

					<select name="ejercicios" id="ejers" class="select" required>
							<option value="101">Seleccionar ejercicio</option>
						<?php foreach($consulta as $ejercicios):?>
							<option value="<?php echo $ejercicios['id_ejercicio']; ?>"><?php echo $ejercicios['nombre_ejercicio']; ?></option>
						<?php endforeach ?>
					</select>

					<select name="dias" id="ejers" class="select" required>
						<option value="Lunes">Seleccionar día</option>
						<?php $semana = ['Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo']?>
						<?php foreach($semana as $index => $dia):?>
							<option value="<?php echo $dia; ?>"><?php echo $dia; ?></option>
						<?php endforeach ?>
					</select>

					<input type="number" name="num_series" placeholder="Numero de series" required>
					<input type="number" name="num_repeticiones" placeholder="Numero de repeticiones" required>
					<input type="submit" value="Guardar" class="btn_actu">
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
							<img src="<?php echo "../../img_per\\" . $row['foto']; ?>" alt="">
							<h1 class="h1_datos"><?php echo $row['nombres']." ".$row['apellidos']; ?></h1>
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
						<a href="add_ficha.php?id_clt=<?php echo $id?>&id_ent=<?php echo $id_ent?>" >Agregar ficha antropometrica</a>
						<select name="ficha" id="ficha" class="select">
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
						<input style="display: block; margin: 0 auto; margin-top: 10px; height: 40px; width: 150px;" id="btn-popup-agregar-rutina" class="btn btn-popup-agregar-rutina" type="button" name="btnAgregarRutina" value="Agregar rutina">
						<table>
							<thead>
								<th>Dia</th>
								<th>Ejercicio</th>
								<th>Imagen</th>
								<th>Número de series</th>
								<th>Número de repeticiones</th>
								<th>Funciones</th>
							</thead>
							<tbody>
								<?php while ($row = $rutina->fetch_assoc()) { ?>
									<tr>
										<th><?php echo $row['dia']; ?></th>
										<th><?php echo $row['nombre_ejercicio']; ?></th>
										<th><img src="<?php echo "../../img_ejer\\" . $row['imagen']; ?>" alt="" class="imagen_ejr"></th>
										<th><?php echo $row['n_series']; ?></th>
										<th><?php echo $row['n_rep']; ?></th>
										<th>
											<a href="update_clt_rut.php?id_persona=<?php echo $id; ?>&id_ejercicio=<?php echo $row['id_ejercicio']; ?>&dia=<?php echo $row['dia']; ?>&id_ent=<?php echo $id_ent?>" >Actualizar</a>
											<a href="../php/del_rut.php?id_persona=<?php echo $id; ?>&id_ejercicio=<?php echo $row['id_ejercicio']; ?>&dia=<?php echo $row['dia']; ?>&id_ent=<?php echo $id_ent?>">Borrar</a>
										</th>
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
<script src="../CSS/CSS_ENT_CLT_SEL/combobox.js"></script>
<script src="../CSS/CSS_ENT_RUT/popup.js"></script>
</html>
