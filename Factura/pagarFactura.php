<?php
    include 'conexion.php';
    $fecha_actual = date('Y/m/d', time());
    $documento = $_POST['doc_cliente'];
    $nombre_plan = $_POST['nombre_plan'];
    $fecha_inicio = $_POST['fecha_inicio_plan'];

    $query = "INSERT INTO factura VALUES(0, '$documento', '$fecha_actual', '$nombre_plan', '$fecha_inicio');";
    $consulta = mysqli_query($conecta, $query);

    if($consulta){
        Header("Location: pagar_factura.php");
    }
?>