<?php
  include ("connection.php");
  
  $id_persona=$_POST['id_persona'];
  $nombres =$_POST['nombres'];
  $apellidos=$_POST['apellidos'];
  $cel = $_POST['celular'];
  $email = $_POST['email'];
  
  

  $actualizar="UPDATE personas SET `nombres`='$nombres',`apellidos`='$apellidos',`email`='$email',`celular`=$cel WHERE id_persona='$id_persona'";
  $validar = mysqli_query($conexion,$actualizar);
  header('Location: ..\html\adm_clt.php');
?>