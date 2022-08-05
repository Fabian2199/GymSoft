<?php
  function get_datos($id_persona){
    include ('connection.php');
    $slq_datos = "SELECT p.id_persona, `nombres`, `apellidos`, `foto`, `email`, `celular`, `fecha_nac` FROM personas p  WHERE p.id_persona = $id_persona";
    $consulta_datos = $conexion->query($slq_datos);
    return $consulta_datos;
  };
  
?>