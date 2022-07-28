<?php
  function get_ejr($id_ejercicio){
    include ('connection.php');
    $slq_ejr = "SELECT * FROM ejercicios WHERE id_ejercicio = $id_ejercicio ";
    $consulta_ejr= $conexion ->query($slq_ejr);
    return $consulta_ejr;
  };
  function get_rut($id_ejercicio,$id_persona,$dia){
    include ('connection.php');
    $slq_rut = "SELECT * FROM rutinas r  JOIN usuarios u 
    ON r.id_cliente= u.id_user JOIN personas p 
    ON p.id_persona = u.id_persona
    WHERE p.id_persona =$id_persona AND r.id_ejercicio=$id_ejercicio AND r.dia = '$dia' LIMIT 1";
    $consulta_rut= $conexion ->query($slq_rut);
    return $consulta_rut;
  };

  
?>