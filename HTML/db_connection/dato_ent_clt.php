<?php
  function get_rutina($id_persona){
    include ('connection.php');
    $slq_rutina = "SELECT r.dia,e.nombre_ejercicio,e.imagen,r.n_series,r.n_rep FROM rutinas r JOIN usuarios u ON r.id_cliente = u.id_user JOIN personas p ON p.id_persona = u.id_persona JOIN ejercicios e ON e.id_ejercicio = r.id_ejercicio WHERE p.id_persona =".$id_persona;
    $consulta_rutina= $conexion ->query($slq_rutina);
    return $consulta_rutina;
  };
  function get_datos($id_persona){
    include ('connection.php');
    $slq_datos = "SELECT * FROM personas p JOIN usuarios u ON p.id_persona = u.id_persona JOIN facturas f ON f.id_cliente = u.id_user JOIN detalles_fac d ON d.id_factura = f.id_factura 
    WHERE f.fecha_fac = (SELECT MAX(f.fecha_fac) FROM facturas f JOIN usuarios u ON f.id_cliente = u.id_user JOIN personas p ON u.id_persona = p.id_persona WHERE p.id_persona =".$id_persona.")";
    $consulta_datos = $conexion->query($slq_datos);
    return $consulta_datos;
  };
  
  
?>