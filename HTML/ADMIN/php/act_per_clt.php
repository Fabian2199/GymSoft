<?php
  include ("connection.php");
  
  $id_persona=$_POST['id_persona'];
  $nombres =$_POST['nombres'];
  $apellidos=$_POST['apellidos'];
  $cel = $_POST['celular'];
  $email = $_POST['email'];
  $id_userH = $_GET['id_user'];
  
  

  $actualizar="UPDATE personas SET `nombres`='$nombres',`apellidos`='$apellidos',`email`='$email',`celular`=$cel WHERE id_persona='$id_persona'";
  $validar = mysqli_query($conexion,$actualizar);

  header('Location: ../html/homeMenu.php?id_user=adm'.$id_userH);
?>