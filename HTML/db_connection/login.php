/*Validacion de usuario en la base de datos*/
<?php

	session_start();
	require_once "connection.php";

	$conexion;

		$usuario=$_POST['id_user'];
		$pass=($_POST['contrasena']);

		$sql="SELECT * from usuarios where id_user='$usuario' and contrasena='$pass' and tipo_user='administrador'";
		$sql_cliente="SELECT * from usuarios where id_user='$usuario' and contrasena='$pass' and tipo_user='cliente'";
		$sql_entrenador="SELECT * from usuarios where id_user='$usuario' and contrasena='$pass' and tipo_user='entrenador'";
		$result=mysqli_query($conexion,$sql);
		$result_cliente=mysqli_query($conexion,$sql_cliente);
		$result_entrenador=mysqli_query($conexion,$sql_entrenador);

		if(mysqli_num_rows($result) > 0){
			$_SESSION['user']=$usuario;
			echo 1;
		}elseif (mysqli_num_rows($result_cliente) > 0) {
			$_SESSION['user']=$usuario;
			echo 2;
		}elseif (mysqli_num_rows($result_entrenador) > 0) {
			$_SESSION['user']=$usuario;
			echo 3;
		}else{
			echo 0;
		}
 ?>
