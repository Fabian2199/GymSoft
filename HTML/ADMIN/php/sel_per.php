<?php
  include ('connection.php');
  $id_persona=$_POST['id_persona'];
  $sql ="SELECT * FROM personas WHERE id_persona ='$id_persona'";
  $consulta = $conexion->query($sql);
  $nombres ="";
  $apellidos="";
  $documento="";
  $fecha="";
  $email="";
  $cel="";
  $foto="";
  while($persona_selec =$consulta->fetch_assoc()){
    $nombres =$persona_selec['nombres'];
    $apellidos=$persona_selec['apellidos'];
    $documento=$persona_selec['id_persona'];
    $fecha=$persona_selec['fecha_nac'];
    $email=$persona_selec['email'];
    $cel=$persona_selec['celular'];
    $foto=$persona_selec['foto'];
    
  }
  $html = "
  <input type='text' value='$nombres' name='nombres' pattern='[A-Za-z ]+' required>
	<input type='text' value='$apellidos' name='apellidos' pattern='[A-Za-z ]+' required>
	<input type='date' value=".$fecha." name='cumpleanos' required >
	<input type='tel'  value=".$cel." name='celular' pattern='[0-9]{10}' required>
	<input type='email' value=".$email." name='email' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$'>
  <label id='divimg'>
    <div><input type='text' value=".$foto." name='foto' style='display: none;'></div>
  </label>
  ";

  echo $html;
 
?>