<?php
  include ("connection.php");
  $id_ejercicio_seleccionado=$_POST['ejers'];
  $ejercicio =$_POST['ejercicio'];
  $imagen =$_POST['imagen'];
  $descripcion=$_POST['descripcion'];
  $video=$_POST['video'];
  
  

  $actualizar="UPDATE ejercicios SET  `nombre_ejercicio`= '$ejercicio', `descripcion`= '$descripcion', `imagen`= '$imagen', `video`='$video' WHERE id_ejercicio = '$id_ejercicio_seleccionado'";
  $validar = mysqli_query($conexion,$actualizar);
  
  header('Location: ..\html\adm_ejer.php');
?>