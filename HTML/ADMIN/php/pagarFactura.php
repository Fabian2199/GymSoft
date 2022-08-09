<script src="../../js/alertifyjs/alertify.js"></script>

<?php
    //$pru_1 = '<script src="../../js/alertifyjs/alertify.js"></script>';
    //include '../../scripts.php';
    include '../php/connection.php';
    //include '../index.php';
    // include '.php' <----------- Dónde se almacena el user de la sesión
    $id_admin = "adm".$_GET['id_user'];
    $fecha_actual = date('Y/m/d', time());
    $documento = $_POST['doc_cliente'];
    $nombre_plan = $_POST['nombre_plan']; // entra un ID
    $fecha_inicio = $_POST['fecha_inicio_plan'];

    // Revisar que la fecha inicio sea mayor a la ultima fecha final
    $query = "SELECT MAX(detFac.fecha_fin) ultima FROM facturas fac, detalles_fac detFac WHERE fac.id_factura = detFac.id_factura AND fac.id_cliente = concat('clt',$documento) ORDER BY detFac.fecha_fin DESC";
    $consulta = mysqli_query($conexion, $query);

    //$ultimaFactura = 0;
    while($resul = $consulta->fetch_array()) {
        $ultimaFactura = $resul['ultima'];
    }

    if($ultimaFactura == ''){
        $ultimaFactura = date('Y-m-d', strtotime("-1 days"));
    }

    //echo $ultimaFactura." - ".$fecha_inicio;

    $consulta = $conexion->query("SELECT us.tipo_user rol FROM usuarios us WHERE us.id_persona = $documento");
    while ($row = $consulta->fetch_array()) {
        echo "pasa por el rol";
        $rol = $row['rol'];
    }

    if($rol == 'cliente' && $ultimaFactura < $fecha_inicio){
        // Obtener el ultimo ID para crear uno nuevo
        $query = "SELECT MAX(id_factura) max FROM facturas";
        $consulta = mysqli_query($conexion, $query);
    
        while($row = $consulta->fetch_array()) {
            echo "pasa por contador";
            $contador = $row['max'] + 1;
        }
    
        // Obtiene el ID perteneciente a ese documento
        $query = "SELECT id_user FROM usuarios where id_persona = $documento";
        $consulta = mysqli_query($conexion, $query);
        
        while($row = $consulta->fetch_array()) {
            echo "pasa por documento";
            $documento = $row['id_user'];
        }
        
        // Obtener el tiempo en meses del plan
        $query = "SELECT Duracion FROM planes WHERE id_plan = '$nombre_plan'";
        $consulta = mysqli_query($conexion, $query);
    
        while($row = $consulta->fetch_array()) {
            echo "pasa por meses";
            $meses = $row['Duracion'];
        }
    
        $meses = explode(" ", $meses)[0];
        echo "\nFecha inicio: ". $fecha_inicio . " meses: " . $meses;
        
        // Obtener la fecha fin del plan
        /*
        $query = "SELECT DATE_ADD('$fecha_inicio', INTERVAL $meses MONTH) fin FROM facturas";
        $consulta = mysqli_query($conexion, $query);
        
        while($row = $consulta->fetch_array()) {
            echo "pasa por fecha fin";
            $fecha_fin = $row['fin'];
        }
        */

        $fecha_fin = date('Y-m-d', strtotime($fecha_inicio."+".$meses." month"));
        
        //echo "Fecha fin: ".$fecha_fin
        
        /*
        $query = "SELECT us.id_persona FROM usuarios us where us.id_user = '$id_admin'";
        $consulta = mysqli_query($conexion, $query);
    
        while($row = $consulta->fetch_array()) {
            $id_admin = $row['id_persona'];
        }
        */
    
        // Agrega la nueva factura
        $query = "INSERT INTO facturas VALUES('$contador', '$fecha_actual', '$id_admin', '$documento');";
        //$query = "INSERT INTO factura VALUES(0, '$documento', '$fecha_actual', '$nombre_plan', '$fecha_inicio');";
        $consulta = mysqli_query($conexion, $query);
    
        $id_servicio = 402;
        $estado_plan = 0;
        $query = "INSERT INTO detalles_fac VALUES('$nombre_plan', '$contador', '$id_servicio', '$estado_plan', '$fecha_inicio', '$fecha_fin');";
        $consulta = mysqli_query($conexion, $query);
    } else {
        echo '<script type="text/JavaScript"> alertify.alert("Fallo al entrar :("); </script>';
    }

    /*
    Header("Location: ../html/facturacion.php?id_user=".$_GET['id_user']);
    if($consulta){
        Header("Location: ../html/facturacion.php");
    }
    */
?>