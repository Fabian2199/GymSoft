<?php

    error_reporting(0);
    include ("connection.php");
    require_once ("login.php");
    $usuario = $_SESSION['user'];

    $conexion;
    $sql = "SELECT p.id_persona, `nombres`, `apellidos`, `foto`, `email`, `celular`, `fecha_nac`, `estado` FROM personas p JOIN usuarios u ON p.id_persona = u.id_persona WHERE u.id_user = '$usuario'";
    $consulta = $conexion->query($sql);

?>
