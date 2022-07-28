<?php
  include ("connection.php");
  $dia =$_GET['dia'];
  $id_persona=$_GET['id_persona'];
  $id_ejercicio =$_GET['id_ejercicio'];
  $id_cliente ="clt".$id_persona;

  $actualizar="DELETE FROM rutinas  
  WHERE id_cliente  = '$id_cliente' AND id_ejercicio = $id_ejercicio AND dia ='$dia'";
  $validar = mysqli_query($conexion,$actualizar);
  header('Location: ..\html\ent_clt_sel.php?id_persona='.$id_persona);
?>