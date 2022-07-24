<?php
    include ("..\php\connection.php");
    $sql = "SELECT p.id_persona, `nombres`, `apellidos`, `foto`, `email`, `celular`, `fecha_nac`, `estado` FROM personas p JOIN usuarios u ON p.id_persona = u.id_persona WHERE u.tipo_user = 'cliente'";
    $consulta = $conexion->query($sql);
?>