<?php
    include 'connection.php';
    //include 'login.php';
    //$entrenador = $usuario;
    $entrenador = 'ent40037079'; //<----------- Dónde se almacena el user de la sesión
    $cliente = 'clt'.$_POST['clientes'];
    $ejercicio = $_POST['ejercicios'];
    $dia = $_POST['dias'];
    $series = $_POST['num_series'];
    $repeticiones = $_POST['num_repeticiones'];

    //echo "cli={$cliente} ejer={$ejercicio} dia={$dia} series={$series} rep={$repeticiones} ";
    //echo "Entrenador: ".$entrenador;

    ///*
    $query = "INSERT INTO rutinas VALUES('$entrenador', '$cliente', '$ejercicio', '$dia', '$series', '$repeticiones');";
    $consulta = mysqli_query($conexion, $query);
    
    if($consulta){
        header('Location: ..\html\ent_clt_sel.php?id_persona='.$_POST['clientes']);
    }
    //*/
?>