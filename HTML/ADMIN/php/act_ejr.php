<?php
  include ("connection.php");
  $id_ejercicio=$_POST['id'];
  $ejercicio =$_POST['ejercicio'];
  $imagen =$_POST['imagen'];
  $descripcion=$_POST['descripcion'];
  $video=$_POST['video'];
  $id_user= $_GET['id_user'];
  
  

  $actualizar="UPDATE ejercicios SET  `nombre_ejercicio`= '$ejercicio', `descripcion`= '$descripcion', `imagen`= '$imagen', `video`='$video' WHERE id_ejercicio = '$id_ejercicio'";
  $validar = mysqli_query($conexion,$actualizar);
  
  header('Location: ..\html\adm_ejer.php?id_user='.$id_user);
?>