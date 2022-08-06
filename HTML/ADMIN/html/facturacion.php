<?php
session_start();
include("../PHP/connection.php");
$usuario = $_SESSION['user'];
if(!isset($usuario)){
    header("location:../../index.php");
}
?>
<?php 
include ("..\php\mtr_ejr.php");
$id = $_GET['id_user'];
include("../PHP/dato_login.php");
$foto = "";
$nombres = "";
$datos = get_datos($id);
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
	<title>Facturación #2</title>
	<link rel="stylesheet" type="text/css" href="../css/CSS_ADM_FAC/menu.css">
	<link rel="stylesheet" type="text/css" href="../../iconos/web-fonts-with-css/css/fontawesome-all.css">
	<!--<link rel="stylesheet" type="text/css" href="css_adm_ejer/principal_adm_ejer.css">-->

	<!--<link rel="stylesheet" type="text/css" href="CSS_ADM_EJER/banner.css">-->
	<link rel="stylesheet" type="text/css" href="../css/CSS_ADM_FAC/principal_adm_ejer_tar.css">
	<!--<link rel="stylesheet" type="text/css" href="css_adm_eJer/popup.css">-->

	<link rel="stylesheet" type="text/css" href="../css/css/Style.css">
	<link rel="stylesheet" type="text/css" href="../css/CSS_ADM_FAC/popup.css">
    <link rel="stylesheet" href="../css/css/styleMEnu.css">

	<script language="javascript" src="../../js/jquery-3.6.0.min.js"></script>
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
            <div id="photo"><img src="../../img_per/<?php echo $foto?>" alt=""></div>
            <div id="name"><span><?php echo $nombres?></span></div>
        </div>

        <!-- ITEMS -->
        <div id="menu-items">
            <div class="item">
                <a href="homeMenu.php?id_user=adm<?php echo $id;?>">
                    <div class="icon"><img src="../../iconos/admin/home.png" alt=""></div>
                    <div class="title"><span>Inicio</span></div>
                </a>
            </div>
            <div class="item">
                <a href="torniquete.php">
                    <div class="icon"><img src="../../iconos/admin/ingreso.png" alt=""></div>
                    <div class="title"><span>Ingreso</span></div>
                </a>
            </div>
            <div class="item">
                <a href="adm_clt.php?id_user=<?php echo $id;?>">
                    <div class="icon"><img src="../../iconos/admin/clientes.png" alt=""></div>
                    <div class="title"><span>Clientes</span></div>
                </a>
            </div>
            <div class="item">
                <a href="adm_ent.php?id_user=<?php echo $id;?>">
                    <div class="icon"><img src="../../iconos/admin/entrenadores.png" alt=""></div>
                    <div class="title"><span>Entrenadores</span></div>
                </a>
            </div>
            <div class="item">
                <a href="adm_ejer.php?id_user=<?php echo $id;?>">
                    <div class="icon"><img src="../../iconos/admin/ejercicios.png" alt=""></div>
                    <div class="title"><span>Ejercicios</span></div>
                </a>
            </div>
            <div class="item separator"></div>
            <div class="item">
                <a href="config_adm.php?id_persona=<?php echo $id;?>">
                    <div class="icon"><img src="../../iconos/admin/configuracion.png" alt=""></div>
                    <div class="title"><span>Configuración</span></div>
                </a>
            </div>
            <div class="item">
                <a href="../PHP/cerrarS.php">
                    <div class="icon"><img src="../../iconos/admin/cerrar_sesion.png" alt=""></div>
                    <div class="title"><span>Cerrar sesión</span></div>
                </a>
            </div>
        </div>
    </div>

	<header>
		<div class="contenedor">
			<img src="../../img_gen/logoBFree.png" class="logogym">			
            <!-- <h2>Gimnasio</h2>
            clase overlay es una ventana emergente para pagar una factura -->
            <div class="overlay-pagar-factura" id="overlay-pagar-factura">
                <div class="popup-pagar-factura" id="popup-pagar-factura">
                    <a href="#" id="btn-cerrar-popup-pagar-factura" class="btn-cerrar-popup-pagar-factura"><i class="fas fa-times"></i></a>
                    <h3>PAGAR FACTURA</h3>
                    <h4>completa el siguiente formulario</h4>
                    <form action="../php/pagarFactura.php?id_user=<?php echo $id;?>" method="post">
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
                <input style="visibility: hidden; width: 0px;" value="<?php echo $id; ?>" name="id_user">
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
                        <?php if(($busqueda = $_GET['buscarFactura']) != '') { ?>
                            <?php //$busqueda = $_GET['buscarFactura']; ?>
                            <?php $consulta = $conexion->query("SELECT det.id_factura, per.nombres, per.apellidos, pl.nombre_plan, det.fecha_ini, det.fecha_fin, det.estado_plan FROM detalles_fac det, planes pl, facturas fac, usuarios us, personas per where det.id_plan = pl.id_plan and det.id_factura = fac.id_factura and fac.id_cliente = us.id_user and us.id_persona = per.id_persona and per.id_persona = $busqueda"); // <------- query correcto ?;?>
                            <?php// SELECT det.id_factura, per.nombres, per.apellidos, pl.nombre_plan, det.fecha_ini, det.fecha_fin, det.estado_plan FROM detalles_fac det, planes pl, facturas fac, usuarios us, personas per where det.id_plan = pl.id_plan and det.id_factura = fac.id_factura and fac.id_cliente = us.id_user and us.id_persona = per.id_persona and per.id_persona = 1598762665;?>
                            <?php while($row = $consulta->fetch_array()) { ?>
                                <tr>
                                    <td><?php echo $row['id_factura']; ?></td>
                                    <td><?php echo $row['nombres']." ".$row['apellidos']; ?></td>
                                    <td><?php echo $row['nombre_plan']; ?></td>
                                    <td><?php $feI = explode(" ", $row['fecha_ini']); echo $feI[0]; ?></td>
                                    <td><?php $feF = explode(" ", $row['fecha_fin']); echo $feF[0]; ?></td>
                                    <td><?php if($row['estado_plan'] == 0){echo "Activado";} if($row['estado_plan'] == 1){echo "Desactivado";}?></td>
                                    <?php $variable = $row['id_factura']; ?>
                                    <td><a href="misDatosPdf.php?id=<?php echo $row['id_factura']; ?>">Descargar</a></td>
                                    <!--<td><input class="" type="submit" name="btnDescargarPDF" value="Descargar"><?php $id_dowload_pdf = $row['id_factura']; ?></td>-->
                                    <!--<td><a href="crearPDF.php?id=<?php echo $row['id_factura']; ?>">Descargar</a></td>-->
                                </tr>
                            <?php } ?>
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