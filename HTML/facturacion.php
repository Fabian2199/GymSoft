<?php include ("db_connection\mtr_ejr.php")?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Facturación #2</title>
	<link rel="stylesheet" type="text/css" href="css_adm_ejer/menu.css">
	<link rel="stylesheet" type="text/css" href="iconos/web-fonts-with-css/css/fontawesome-all.css">
	<!--<link rel="stylesheet" type="text/css" href="css_adm_ejer/principal_adm_ejer.css">-->

	<link rel="stylesheet" type="text/css" href="CSS_ADM_EJER/banner.css">
	<link rel="stylesheet" type="text/css" href="CSS_ADM_EJeR/principal_adm_ejer_tar.css">
	<link rel="stylesheet" type="text/css" href="css_adm_eJer/popup.css">
	<link rel="stylesheet" type="text/css" href="css_adm_ejEr/popup_update.css">

	<link rel="stylesheet" type="text/css" href="css/Style.css">
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
				<a href="">ENTRENADORES</a>
				<a href="facturacion.php">FACTURACION</a>
				<a href="">INGRESO</a>
			</nav>
            <!-- clase overlay es una ventana emergente para agregar un ejercicio -->
            <div class="overlay" id="overlay">
                <div class="popup" id="popup">
                    <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
                    <h3>AÑADIR EJERCICIO</h3>
                    <h4>completa el siguiente formulario</h4>
                    <form action="db_connection\reg_ejr.php" method="post">
                        <div class="contenedor-inputs">
                            <input type="text" placeholder="Nombre Ejercicio" name="ejercicio">
                            <textarea name="descripcion" placeholder="Descripcion" ></textarea>
                            <input type="text" placeholder="URL video ejercicio (opcional)" name="video">
                            <label for="">Seleccione Imagen: </label>
                            <input type="file" name="imagen">
                        </div>
                        <input type="submit" class="btn-submit" value="AÑADIR">
                    </form>
                </div>
            </div>
		</div>
	</header>
	<div class="contenedorFactura">
        <div class="hijo-1">
            <form action="" method="busqueda">
                <input class="inp-doc" type="text" placeholder="Documento" name="buscarFactura">
                <div class="div-btns">
                    <input class="btn" id="btnBuscar" onclick="buscarPersona()" type="submit" name="btnBuscar" value="Buscar">
                    <input id="btn_update" class="btn btn_update" type="button" name="btnPagar" value="Pagar">
                </div>
            </form>
        </div>
        <div class="torniquete" id="torniquete">
            <h2 class="torniquete" id="pruebaH2">SI puede ingresar</h2>
        </div>
        <div class="hijo-2" id="hijo-2">
            <table class="table">
                <thead class="text-muted">
                    <th class="text-center">ID</th>
                    <th class="text-center">Cliente</th>
                    <th class="text-center">Fecha de pago</th>
                    <th class="text-center">Plan</th>
                    <th class="text-center">Fecha inicio</th>
                    <th class="text-center"></th>
                </thead>
                <tbody>
                    <?php include 'db_connection/connection.php';?>
                    <?php if(isset($_GET['btnBuscar'])) { ?>
                        <?php $busqueda = $_GET['buscarFactura']; ?>
                        <?php $consulta = $conexion->query("SELECT * FROM detalles_fac WHERE nombre LIKE '%$busqueda%'"); ?>
                        <?php while($row = $consulta->fetch_array()) { ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['nombre']; ?></td>
                                <td><?php echo $row['fecha_pago']; ?></td>
                                <td><?php echo $row['plan']; ?></td>
                                <td><?php echo $row['fecha_inicio']; ?></td>
                                <?php $variable = $row['id']; ?>
                                <td><input class="" type="submit" name="btnDescargarPDF" value="Descargar"><?php $id_dowload_pdf = $row['id']; ?></td>
                                <!--<td><a href="crearPDF.php?id=<?php echo $row['id']; ?>">Descargar</a></td>-->
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
	<footer>
		<div class="sociales">
			<a class="fab fa-facebook" href="https://www.facebook.com/BfreeGym"></a>
			<a class="fab fa-instagram" href="https://www.instagram.com/bfreegym/"></a>
		</div>
	</footer>
	<script src="css_adm_ejer/popup.js"></script>
	<script src="css_adm_ejeR/popup_update.js"></script>
	<script src="css_adm_eJer/combobox.js"></script>
</body>
</html>