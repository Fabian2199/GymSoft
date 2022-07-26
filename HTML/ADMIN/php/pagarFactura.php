<?php
    include '../php/connection.php';
    //include '../index.php';
    // include '.php' <----------- Dónde se almacena el user de la sesión
    $id_admin = "adm1010136222";
    $fecha_actual = date('Y/m/d', time());
    $documento = $_POST['doc_cliente'];
    $nombre_plan = $_POST['nombre_plan']; // entra un ID
    $fecha_inicio = $_POST['fecha_inicio_plan'];

    // Obtener el ultimo ID para crear uno nuevo
    $query = "SELECT MAX(id_factura) max FROM facturas";
    $consulta = mysqli_query($conexion, $query);

    while($row = $consulta->fetch_array()) {
        $contador = $row['max'] + 1;
    }

    // Obtiene el ID perteneciente a ese documento
    $query = "SELECT id_user FROM usuarios where id_persona = $documento";
    $consulta = mysqli_query($conexion, $query);
    
    while($row = $consulta->fetch_array()) {
        $documento = $row['id_user'];
    }
    
    // Obtener el tiempo en meses del plan
    $query = "SELECT Duracion FROM planes WHERE id_plan = '$nombre_plan'";
    $consulta = mysqli_query($conexion, $query);

    while($row = $consulta->fetch_array()) {
        $meses = $row['Duracion'];
    }

    $meses = explode(" ", $meses)[0];
    
    // Obtener la fecha fin del plan
    $query = "SELECT DATE_ADD('$fecha_inicio', INTERVAL '$meses' MONTH) fin FROM facturas";
    $consulta = mysqli_query($conexion, $query);
    
    while($row = $consulta->fetch_array()) {
        $fecha_fin = $row['fin'];
    }
    
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

    if($consulta){
        Header("Location: ../html/facturacion.php");
    }
?>