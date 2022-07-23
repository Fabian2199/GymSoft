<?php include ("..\php\mtr_ejr.php")?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Facturación #2</title>
	<link rel="stylesheet" type="text/css" href="../css/css/menu.css">
	<link rel="stylesheet" type="text/css" href="../../iconos/web-fonts-with-css/css/fontawesome-all.css">
	<link rel="stylesheet" type="text/css" href="../Css/css/banner.css">
	<link rel="stylesheet" type="text/css" href="../Css/css/body.css">
	<!--<link rel="stylesheet" type="text/css" href="css_adm_ejer/principal_adm_ejer.css">-->

	<!--<link rel="stylesheet" type="text/css" href="CSS_ADM_EJER/banner.css">-->
	<link rel="stylesheet" type="text/css" href="../../CSS_ADM_EJeR/principal_adm_ejer_tar.css">
	<!--<link rel="stylesheet" type="text/css" href="css_adm_eJer/popup.css">-->

	<link rel="stylesheet" type="text/css" href="../css/Css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/css_adm_Fac/popup.css">


	<script language="javascript" src="../../js/jquery-3.6.0.min.js"></script>
</head>
<body>
	<header>
		<div class="contenedor">
			<img src="../../img_gen/logoBFree.png" class="logogym">
			<input type="checkbox" id="menu-bar">
			<label class="fas fa-bars" for="menu-bar"></label>
			<nav class="menu2">
				<a href="adm_clt.php">CLIENTES</a>
				<a href="adm_ent.php">ENTRENADORES</a>
				<a href="adm_ejer.php">EJERCICIOS</a>
				<a href="">INGRESO</a>
			</nav>
            <!-- clase overlay es una ventana emergente para pagar una factura -->
            <div class="overlay-pagar-factura" id="overlay-pagar-factura">
                <div class="popup-pagar-factura" id="popup-pagar-factura">
                    <a href="#" id="btn-cerrar-popup-pagar-factura" class="btn-cerrar-popup-pagar-factura"><i class="fas fa-times"></i></a>
                    <h3>PAGAR FACTURA</h3>
                    <h4>completa el siguiente formulario</h4>
                    <form action="../../db_connection/pagarFactura.php" method="post">
                        <input type="text" name="doc_cliente" placeholder="Documento">

                        <?php
                        $query = "SELECT id_plan, nombre_plan FROM planes;";
                        $consul = mysqli_query($conexion, $query);
                        ?>
                        <select name="nombre_plan" id="ejers">
                            <option value="100">Seleccionar plan</option>
                            <?php foreach($consul as $personas):?>
                                <option value="<?php echo $personas['id_plan']; ?>"><?php echo $personas['nombre_plan']; ?></option>
                            <?php endforeach ?>
                        </select>


                        <input type="date" name="fecha_inicio_plan" placeholder="Fecha inicio">
                        <input type="submit" value="Pagar">
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
                    <input id="btn-popup-pagar-factura" class="btn btn-popup-pagar-factura" type="button" name="btnPagar" value="Pagar">
                </div>
            </form>
        </div>
        <div class="hijo-2" id="hijo-2" style="margin-top: 50px; margin-bottom: 50px;">
            <table class="table">
                <thead class="text-muted">
                    <th class="text-center">ID</th>
                    <th class="text-center">Cliente</th>
                    <th class="text-center">Nombre del plan</th>
                    <th class="text-center">Fecha inicio</th>
                    <th class="text-center">Fecha fin</th>
                    <th class="text-center">Estado del plan</th>
                    <th class="text-center"></th>
                </thead>
                <tbody>
                    <?php include '../../db_connection/connection.php';?>
                    <?php if(isset($_GET['btnBuscar'])) { ?>
                        <?php $busqueda = $_GET['buscarFactura']; ?>
                        <?php $consulta = $conexion->query("SELECT det.id_factura, per.nombres, per.apellidos, pl.nombre_plan, det.fecha_ini, det.fecha_fin, det.estado_plan FROM detalles_fac det, planes pl, facturas fac, usuarios us, personas per where det.id_plan = pl.id_plan and det.id_factura = fac.id_factura and fac.id_cliente = us.id_user and us.id_persona = per.id_persona and per.id_persona = $busqueda"); // <------- query correcto ?;?>
                        <?php while($row = $consulta->fetch_array()) { ?>
                            <tr>
                                <td><?php echo $row['id_factura']; ?></td>
                                <td><?php echo $row['nombres']." ".$row['apellidos']; ?></td>
                                <td><?php echo $row['nombre_plan']; ?></td>
                                <td><?php $feI = explode(" ", $row['fecha_ini']); echo $feI[0]; ?></td>
                                <td><?php $feF = explode(" ", $row['fecha_fin']); echo $feF[0]; ?></td>
                                <td><?php if($row['estado_plan'] == 0){echo "Activado";} if($row['estado_plan'] == 1){echo "Desactivado";}?></td>
                                <?php $variable = $row['id_factura']; ?>
                                <td><a href="../../db_connection/misDatosPdf.php?id=<?php echo $row['id_factura']; ?>">Descargar</a></td>
                                <!--<td><input class="" type="submit" name="btnDescargarPDF" value="Descargar"><?php $id_dowload_pdf = $row['id_factura']; ?></td>-->
                                <!--<td><a href="crearPDF.php?id=<?php echo $row['id_factura']; ?>">Descargar</a></td>-->
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
	<!--<script src="css_adm_ejer/popup.js"></script>
	<script src="css_adm_ejeR/popup_update.js"></script>
	<script src="css_adm_eJer/combobox.js"></script>-->

    <script src="../css/css_adm_fac/popup.js"></script>
</body>
</html>