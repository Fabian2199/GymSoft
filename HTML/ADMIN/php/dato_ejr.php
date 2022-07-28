<?php
  function get_datos($id_ejercicio){
    include ('connection.php');
    $slq_datos = "SELECT *FROM ejercicios WHERE id_ejercicio = $id_ejercicio";
    $consulta_datos = $conexion->query($slq_datos);
    return $consulta_datos;
  };
  
?>