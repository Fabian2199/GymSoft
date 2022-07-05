<?php include ("db_connection\mtr_ejr.php")?>
<?php include ("db_connection\connection.php")?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css_adm_ejer/menu.css">
	<link rel="stylesheet" type="text/css" href="iconos/web-fonts-with-css/css/fontawesome-all.css">
	<link rel="stylesheet" type="text/css" href="css_adm_ejer/principal_adm_ejer_tar.css">
    <link rel="stylesheet" type="text/css" href="css_adm_ejer/principal_adm_ejer_tar.css">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css_ent_rut/popup.css">

    <script language="javascript" src="js\jquery-3.6.0.min.js"></script>
</head>
<body>
    <header>
		<div class="contenedor">
			<img src="img_gen/logoBFree.png" class="logogym">
			<input type="checkbox" id="menu-bar">
			<label class="fas fa-bars" for="menu-bar"></label>
			<nav class="menu2">
				<a href="adm_clt.php">CLIENTES</a>
				<a href="adm_ent.php">ENTRENADORES</a>
				<a href="facturacion.php">FACTURACION</a>
				<a href="">INGRESO</a>
			</nav>
            <!-- clase overlay es una ventana emergente para agregar una rutina -->
            <div class="overlay-agregar-rutina" id="overlay-agregar-rutina">
                <div class="popup-agregar-rutina" id="popup-agregar-rutina">
                    <a href="#" id="btn-cerrar-popup-agregar-rutina" class="btn-cerrar-popup-agregar-rutina"><i class="fas fa-times"></i></a>
                    <h3>AGREGAR RUTINA</h3>
                    <h4>completa el siguiente formulario</h4>
                    <form action="db_connection/agregarRutina.php" method="post">
                        <?php
                        $query = "SELECT us.id_user, pe.nombres, pe.apellidos FROM `usuarios` us, `personas` pe WHERE us.id_persona = pe.id_persona AND tipo_user LIKE 'cliente';";
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
		</div>
	</header>
    <div style="margin-top: 150px;">
        <input id="btn-popup-agregar-rutina" class="btn btn-popup-agregar-rutina" type="button" name="btnAgregarRutina" value="Agregar rutina">
    </div>
    <footer>
		<div class="sociales">
			<a class="fab fa-facebook" href="https://www.facebook.com/BfreeGym"></a>
			<a class="fab fa-instagram" href="https://www.instagram.com/bfreegym/"></a>
		</div>
	</footer>
    <script src="css_ent_rut/popup.js"></script>
</body>
</html>