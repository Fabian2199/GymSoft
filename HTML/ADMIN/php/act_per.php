<?php
  include ("connection.php");
  
  $id_persona=$_POST['id_persona'];
  $nombres =$_POST['nombres'];
  $apellidos=$_POST['apellidos'];
  $cel = $_POST['celular'];
  $email = $_POST['email'];
  $contrato = $_POST['contrato'];
  
  

  $actualizar="UPDATE personas SET `nombres`='$nombres',`apellidos`='$apellidos',`email`='$email',`celular`=$cel WHERE id_persona='$id_persona'";
  $validar = mysqli_query($conexion,$actualizar);
  if($contrato!= null){
    $id_user= "ent".$id_persona;
    $actualizar_contrato ="UPDATE `usuarios` SET `estado` = '$contrato' WHERE `usuarios`.`id_user` = '$id_user'";
    $validar2 =mysqli_query($conexion,$actualizar_contrato);
  };

  header('Location: ..\html\adm_clt.php');
?>