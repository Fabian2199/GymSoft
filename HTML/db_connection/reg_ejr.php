<?php
    include ("connection.php");
    $ejercicio =$_POST['ejercicio'];
    $imagen =$_POST['imagen'];
    $descripcion=$_POST['descripcion'];
    $video=$_POST['video'];
    $id_ejercicio=101;
    $sql ="SELECT MAX(id_ejercicio) FROM ejercicios";
    $valor_id = mysqli_query($conexion,$sql);
    $idmax= mysqli_fetch_array($valor_id);
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
        header('Location: ..\adm_ejer.php');
    };
?>