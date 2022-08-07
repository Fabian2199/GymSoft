<?php
    include ("connection.php");
    $ejercicio =$_POST['ejercicio'];
    $imagen =$_FILES['imagen']['name'];
    echo "hoilaaaaaaa".$_FILES['imagen']['name'];
    $move_imagen = "../../img_ejer/";
    move_uploaded_file($_FILES['imagen']['tmp_name'],$move_imagen.$imagen);
    $descripcion=$_POST['descripcion'];
    $video=$_POST['video'];
    $id_ejercicio=101;
    $sql ="SELECT MAX(id_ejercicio) FROM ejercicios";
    $valor_id = mysqli_query($conexion,$sql);
    $idmax= mysqli_fetch_array($valor_id);
    $id_user =$_GET['id_user'];
    if($idmax["MAX(id_ejercicio)"]!=null){
        $id_ejercicio=$idmax["MAX(id_ejercicio)"]+1;
    }
    $registro ="INSERT INTO `ejercicios`(`id_ejercicio`, `nombre_ejercicio`, `descripcion`, `imagen`, `video`) VALUES ('$id_ejercicio','$ejercicio','$descripcion','$imagen','$video')";
    if($imagen == null||$descripcion == null||$ejercicio == null){
        echo "<script>";
        echo "alert ('error al realizar el registro, por favor verificar todos los campos')";
        echo "</script>";
        //header('Location: ..\adm_ejer.php');
    }else{
        $validar = mysqli_query($conexion,$registro);
        header('Location: ..\html\adm_ejer.php?id_user='.$id_user);
    };
?>