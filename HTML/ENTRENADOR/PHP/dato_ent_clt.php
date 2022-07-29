<?php
  function get_rutina($id_persona){
    include ('connection.php');
    $slq_rutina = "SELECT r.dia,e.id_ejercicio,e.nombre_ejercicio,e.imagen,r.n_series,r.n_rep FROM rutinas r JOIN usuarios u ON r.id_cliente = u.id_user JOIN personas p ON p.id_persona = u.id_persona JOIN ejercicios e ON e.id_ejercicio = r.id_ejercicio 
    WHERE p.id_persona =$id_persona ORDER BY FIELD(r.dia,'Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo')";
    $consulta_rutina= $conexion ->query($slq_rutina);
    return $consulta_rutina;
  };
  function get_datos($id_persona){
    include ('connection.php');
    $slq_datos = "SELECT * FROM personas p JOIN usuarios u ON p.id_persona = u.id_persona JOIN facturas f ON f.id_cliente = u.id_user JOIN detalles_fac d ON d.id_factura = f.id_factura 
    WHERE d.fecha_ini< (SELECT sysdate()) AND d.fecha_fin > (SELECT sysdate()) AND p.id_persona = $id_persona";
    $consulta_datos = $conexion->query($slq_datos);
    return $consulta_datos;
  };
  function get_ficha($id_persona){
    include ('connection.php');
    $sql_ficha = "SELECT f.id_ficha, f.fecha FROM ficha_antropometrica f WHERE f.id_cliente = (SELECT us.id_user FROM usuarios us JOIN personas pe ON us.id_persona = pe.id_persona 
    WHERE pe.id_persona = ".$id_persona." AND us.tipo_user = 'cliente')";
    $consulta_ficha = $conexion -> query($sql_ficha);
    return $consulta_ficha; 
  }
  
?>