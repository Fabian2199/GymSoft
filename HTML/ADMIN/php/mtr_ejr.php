<?php
    include ("connection.php");
    $sql = "SELECT *FROM ejercicios ";
    $consulta = $conexion->query($sql);
   /* $ejer ="";
     while($ejer =$consulta->fetch_assoc()){
            echo " ".$ejer['nombre_ejercicio'];
            echo " ".$ejer['descripcion'];
    }*/
    
   
?>