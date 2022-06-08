<?php
  include ("connection.php");
  $id_persona=$_POST['clt'];
  $nombres =$_POST['nombres'];
  $apellidos=$_POST['apellidos'];
  $fecha= $_POST['cumpleanos'];
  $cel = $_POST['celular'];
  $email = $_POST['email'];
  $foto = $_POST['foto'];
  
  

  $actualizar="UPDATE personas SET `nombres`='$nombres',`apellidos`='$apellidos',`foto`='$foto',`email`='$email',`celular`=$cel,`fecha_nac`='$fecha' WHERE id_persona='$id_persona'";
  $validar = mysqli_query($conexion,$actualizar);
  header('Location: ..\adm_clt.php');
?>