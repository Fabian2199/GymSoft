<?php
session_start();
include ("db_connection/connection.php");
include ("db_connection/login.php");
include ("configuracion.php");
require_once "configuracion.php";
require_once "db_connection/connection.php";
$usuario = $_SESSION['user'];
$pass = $_POST['pass'];
$celular= $_POST['celular'];
$email=$_POST['email'];

$conexion;
if($usuario === '' || $pass=== ''){
    echo json_encode('error');
}else{
   echo json_encode('Correcto: <br>Usuario:'.$usuario.'<br>Pass:'.$pass);
   $sql=mysqli_query($conexion,"UPDATE `personas` JOIN `usuarios` ON `personas`.`id_persona` = `usuarios`.`id_persona` SET `celular` = '$celular' WHERE `usuarios`.`id_user` = '$usuario'");
   $sql1=mysqli_query($conexion,"UPDATE `personas` JOIN `usuarios` ON `personas`.`id_persona` = `usuarios`.`id_persona`SET `email` = '$email' WHERE `usuarios`.`id_user` = '$usuario'");
   $sql2=mysqli_query($conexion,"UPDATE `usuarios` SET `contrasena` = '$pass' WHERE `usuarios`.`id_user` = '$usuario'");
}
