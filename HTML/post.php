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
   $sql=mysqli_query($conexion,"UPDATE `personas` SET `celular` = '$celular' WHERE `personas`.`id_persona` = '1052416004'");
   $sql1=mysqli_query($conexion,"UPDATE `personas` SET `email` = '$email' WHERE `personas`.`id_persona` = '1052416004'");
   $sql2=mysqli_query($conexion,"UPDATE `usuarios` SET `contrasena` = '$pass' WHERE `usuarios`.`id_user` = '$usuario'");
}
