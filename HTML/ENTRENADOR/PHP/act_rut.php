<?php
  include ("connection.php");
  $dia =$_POST['dia'];
  $id_persona=$_POST['id_persona'];
  $id_ejercicio =$_POST['id_ejercicio'];
  $series=$_POST['series'];
  $repeticiones = $_POST['repeticiones'];
  $id_cliente ="clt".$id_persona;
  $actualizar="UPDATE rutinas  SET `n_series`= $series, `n_rep` = $repeticiones 
  WHERE id_cliente = '$id_cliente' AND id_ejercicio = $id_ejercicio AND dia = '$dia'";
  $validar = mysqli_query($conexion,$actualizar);
  header('Location: ../html/ent_clt_sel.php?id_persona='.$id_persona.'&id_ent='.$_GET['id_ent']);
?>