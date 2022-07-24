<?php
  include ("connection.php");
  $id_ejercicio=$_POST['id_ejercicio'];
  $sql ="SELECT * FROM ejercicios WHERE id_ejercicio ='$id_ejercicio'";
  $consulta = $conexion->query($sql);
  $nombre ="";
  $descripcion="";
  $video="";
  $imagen="";
  while($ejercicio_selec =$consulta->fetch_assoc()){
    $nombre =$ejercicio_selec['nombre_ejercicio'];
    $descripcion=$ejercicio_selec['descripcion'];
    $video=$ejercicio_selec['video'];
    $imagen=$ejercicio_selec['imagen'];
  }
  $html = "
  <input type='text' value=".$nombre." name='ejercicio'>
  <textarea name='descripcion' id='' >.$descripcion.</textarea>
  <input type='text' value=".$video." name='video' >
  <label id='divimg'>
    ¿Desea cambiars imagen?<input type='checkbox'value= '1' name ='check' id = 'check'>
    <div><input type='text' value=".$imagen." name='imagen' style='display: none;'></div>
  </label>
  <Script src='../css/css_adm_ejer/checkbox.js'></Script>	
  ";

  echo $html;
?>