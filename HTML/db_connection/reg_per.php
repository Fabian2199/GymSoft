<?php
    include ("connection.php");
    $nombres =$_POST['nombres'];
    $apellidos=$_POST['apellidos'];
    $documento=$_POST['documento'];
    $fecha= $_POST['cumpleanos'];
    $cel = $_POST['celular'];
    $email = $_POST['email'];
    $foto = $_POST['foto'];
    $user = $_POST['usuario'];
    $sql ="SELECT 'id_persona' FROM personas WHERE `id_persona` =$documento";
    $valor_id = mysqli_query($conexion,$sql);
    $validarPK= mysqli_fetch_array($valor_id);
    if($validarPK["id_persona"] !=null){
        $sql_user = "SELECT `id_persona` FROM usuarios WHERE `id_persona` =$documento AND `tipo_user` ='$user' ";
        $valor_user = mysqli_query($conexion,$sql_user);
        $validarPK_user= mysqli_fetch_array($valor_user);
        if($validarPK_user["id_persona"]!= null){
            echo "<script>";
            echo "alert ('Error al realizar el registro, la persona ya se encuentra registrada por favor verifique los datos')";
            echo "</script>";
        }else{
            if($user=="cliente"){
                $id_user = 02+$documento;
                $password = 02+$cel;
                $registro_user ="INSERT INTO `usuarios` (`id_user`, `id_persona`, `tipo_user`, `contrasena`, `estado`) VALUES ('$id_user', '$documento', '$user', '$password', '0')";
                $validar_user = mysqli_query($conexion,$registro_user);
                header('Location: ..\adm_clt.php');
            }elseif($user=="entrenador"){
                $id_user = 03+$documento;
                $password = 03+$cel;
                $registro_user ="INSERT INTO `usuarios` (`id_user`, `id_persona`, `tipo_user`, `contrasena`, `estado`) VALUES ('$id_user', '$documento', '$user', '$password', '0')";
                $validar_user = mysqli_query($conexion,$registro_user);
            }else{
                $id_user = 01+$documento;
                $password = 01+$cel;
                $registro_user ="INSERT INTO `usuarios` (`id_user`, `id_persona`, `tipo_user`, `contrasena`, `estado`) VALUES ('$id_user', '$documento', '$user', '$password', '0')";
                $validar_user = mysqli_query($conexion,$registro_user);
            }
            
        }
        
    }else{
        $registro ="INSERT INTO `personas` (`id_persona`, `nombres`, `apellidos`, `foto`, `email`, `celular`, `fecha_nac`) VALUES ('$documento', '$nombres', '$apellidos','$foto','$email', '$cel', '$fecha')";
        $validar = mysqli_query($conexion,$registro);
        if($user=="cliente"){
            $id_user = 02+$documento;
            $password = 02+$cel;
            $registro_user ="INSERT INTO `usuarios` (`id_user`, `id_persona`, `tipo_user`, `contrasena`, `estado`) VALUES ('$id_user', '$documento', '$user', '$password', '0')";
            $validar_user = mysqli_query($conexion,$registro_user);
            header('Location: ..\adm_clt.php');
        }elseif($user=="entrenador"){
            $id_user = 03+$documento;
            $password = 03+$cel;
            $registro_user ="INSERT INTO `usuarios` (`id_user`, `id_persona`, `tipo_user`, `contrasena`, `estado`) VALUES ('$id_user', '$documento', '$user', '$password', '0')";
            $validar_user = mysqli_query($conexion,$registro_user);
        }else{
            $id_user = 01+$documento;
            $password = 01+$cel;
            $registro_user ="INSERT INTO `usuarios` (`id_user`, `id_persona`, `tipo_user`, `contrasena`, `estado`) VALUES ('$id_user', '$documento', '$user', '$password', '0')";
            $validar_user = mysqli_query($conexion,$registro_user);
        }
    }
    
?>