<?php
    include 'connection.php';
    $entrenador = 'ent164897526'; //<----------- Dónde se almacena el user de la sesión
    $cliente = $_POST['clientes'];
    $ejercicio = $_POST['ejercicios'];
    $dia = $_POST['dias'];
    $series = $_POST['num_series'];
    $repeticiones = $_POST['num_repeticiones'];

    //echo "cli={$cliente} ejer={$ejercicio} dia={$dia} series={$series} rep={$repeticiones} ";

    $query = "INSERT INTO rutinas VALUES('$entrenador', '$cliente', '$ejercicio', '$dia', '$series', '$repeticiones');";
    $consulta = mysqli_query($conexion, $query);
    
    if($consulta){
        Header("Location: ../agregar_rutina.php");
    }
?>