<?php
include("connection.php");

$id_persona = $_GET['id_persona'];
$id_user = "ent" . $id_persona;
$cel = $_POST['celular'];
$email = $_POST['email'];
$old_pass = md5($_POST['old_pass']);
$act_pass = 0;
$new_pass = md5($_POST['new_pass1']);
$ver_pass = md5($_POST['new_pass2']);
$pass= "SELECT contrasena FROM usuarios WHERE id_user = '$id_user'";
$consulta_pass= $conexion->query($pass);
while ($row = $consulta_pass->fetch_assoc()) { 
  $act_pass = $row['contrasena'];
}
$actualizar = "UPDATE personas SET `email`='$email',`celular`=$cel WHERE id_persona='$id_persona'";
$validar = mysqli_query($conexion, $actualizar);
if ($old_pass != "d41d8cd98f00b204e9800998ecf8427e") {
  
  if (($new_pass != null) and ($new_pass == $ver_pass)and ($old_pass==$act_pass)) {
    $actualizar_pass = "UPDATE `usuarios` SET `contrasena` = '$new_pass' WHERE `usuarios`.`id_user` = '$id_user'";
    $validar2 = mysqli_query($conexion, $actualizar_pass);
    header('Location: ../html/homeMenu.php?id_user=ent' . $id_persona);
  } else {
    echo "<script>";
    echo "alert ('Error al actualizar la contraseña,  por favor verifique la contraseña')";
    echo "</script>";
  }
}else{
  header('Location: ../html/homeMenu.php?id_user=ent' . $id_persona);
};
