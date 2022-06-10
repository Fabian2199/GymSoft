<?php
    $servidor = "localhost";
    $usuario = "root";
    $password = "";
    $bd = "prueba_tabla_dinamica";
    $conecta = mysqli_connect($servidor, $usuario, $password, $bd);
    if($conecta->connect_error){
        die("Error al conectarse a la base de datos".$conecta->connect_error);
    }
?>