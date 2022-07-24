<?php
include('connection.php');
$id_ficha = $_POST['id_ficha'];
$sql = "SELECT * FROM ficha_antropometrica f JOIN usuarios u ON f.id_entrenador = u.id_user JOIN personas p ON p.id_persona = u.id_persona WHERE f.id_ficha = '$id_ficha'";
$consulta = $conexion->query($sql);
$nombres = "";
$apellidos = "";
$edad = " ";
$peso  = " ";
$estatura = " ";
$cuello = " ";
$hombro = " ";
$pecho = " ";
$espalda = " ";
$br_izq = " ";
$br_der = " ";
$ant_izq = " ";
$ant_der = " ";
$cintura = " ";
$abdomen = " ";
$cadera = " ";
$pr_izq = " ";
$pr_der = " ";
$pnt_izq = " ";
$pnt_der = " ";
$por_grasa = " ";
$valor_tension = " ";
$pulso  = " ";
$adipo_tri   = " ";
$adipo_abdo    = " ";
$adipo_supra   = " ";
$adipo_sube   = " ";
$t_cuerpo   = " ";
$imc        = " ";
$embarazo  = " ";
$cardiaco  = " ";
$hipoglisemia  = " ";
$alergias  = " ";
$migrana = " ";
$asma    = " ";
$les_osea  = " ";
$les_musc  = " ";
$tens_arterial = " ";
$colesterol = " ";
$trigliceridos = " ";
$observaciones = " ";

while ($ficha_selec = $consulta->fetch_assoc()) {
  $nombres =  $ficha_selec['nombres'];
  $apellidos = $ficha_selec['apellidos'];
  $edad =  $ficha_selec['edad'];
  $peso  = $ficha_selec['peso'];
  $estatura =$ficha_selec['estatura'];
  $cuello = $ficha_selec['cuello'];
  $hombro = $ficha_selec['hombro'];
  $pecho = $ficha_selec['pecho'];
  $espalda = $ficha_selec['espalda'];
  $br_izq = $ficha_selec['br_izq'];
  $br_der = $ficha_selec['br_der'];
  $ant_izq = $ficha_selec['ant_izq'];
  $ant_der = $ficha_selec['ant_der'];
  $cintura = $ficha_selec['cintura'];
  $abdomen = $ficha_selec['abdomen'];
  $cadera = $ficha_selec['cadera'];
  $pr_izq = $ficha_selec['pr_izq'];
  $pr_der = $ficha_selec['pr_der'];
  $pnt_izq = $ficha_selec['pnt_izq'];
  $pnt_der = $ficha_selec['pnt_der'];
  $por_grasa = $ficha_selec['por_grasa'];
  $valor_tension = $ficha_selec['valor_tension'];
  $pulso  = $ficha_selec['pulso'];
  $adipo_tri   = $ficha_selec['adipo_tri'];
  $adipo_abdo    = $ficha_selec['adipo_abdo'];
  $adipo_supra   = $ficha_selec['adipo_supra'];
  $adipo_sube   = $ficha_selec['adipo_sube'];
  $t_cuerpo   = $ficha_selec['t_cuerpo'];
  $imc        = $ficha_selec['imc'];
  $embarazo  = $ficha_selec['embarazo'];
  $cardiaco  = $ficha_selec['cardiaco'];
  $hipoglisemia  = $ficha_selec['hipoglisemia'];
  $alergias  = $ficha_selec['alergias'];
  $migrana = $ficha_selec['migrana'];
  $asma    = $ficha_selec['asma'];
  $les_osea  = $ficha_selec['les_osea'];
  $les_musc  = $ficha_selec['les_musc'];
  $tens_arterial = $ficha_selec['tens_arterial'];
  $colesterol = $ficha_selec['colesterol'];
  $trigliceridos = $ficha_selec['trigliceridos'];
  $observaciones = $ficha_selec['observaciones'];
  if($embarazo== 0){
    $embarazo = "No";
  }else{
    $embarazo ="Si";
  }
  if($cardiaco == 0){
    $cardiaco  = "No";
  }else{
    $cardiaco  ="Si";
  }
  if($tens_arterial== 0){
    $tens_arterial = "Normal";
  }else{
    $tens_arterial ="Anormal";
  }
  if( $hipoglisemia== 0){
    $hipoglisemia = "No";
  }else{
    $hipoglisemia ="Si";
  }
  if($colesterol== 0){
    $colesterol = "Normal";
  }else{
    $colesterol ="Anormal";
  }
  if($trigliceridos== 0){
    $trigliceridos = "Normal";
  }else{
    $trigliceridos ="Anormal";
  }
  if( $alergias == 0){
    $alergias  = "No";
  }else{
    $alergias  ="Si";
  }
  if( $migrana== 0){
    $migrana = "No";
  }else{
    $migrana ="Si";
  }
  if( $asma== 0){
    $asma = "No";
  }else{
    $asma ="Si";
  }
  if( $les_osea== 0){
    $les_osea = "No";
  }else{
    $les_osea ="Si";
  }
  if( $les_musc== 0){
    $les_musc = "No";
  }else{
    $les_musc ="Si";
  }

}
$html = "
<h1 class='h1_datos'>Entrenador: </h1>
  <table>    
    <tr>
        <th>".$nombres." ".$apellidos."</th>
    </tr>
  </table>
<div class='medidas'>
  <h1 class='h1_datos'>Datos y medidas:</h1>
  <table>
    <thead>
      <th>Dato</th>
      <th> Valor</th>
    </thead>
    <tbody>
      <tr>
        <th>Edad</th>
        <th>".$edad." Años</th>
      </tr>
      <tr>
        <th>Peso</th>
        <th>".$peso." Kg</th>
      </tr>
      <tr>
        <th>Estatura</th>
        <th>".$estatura." cm</th>
      </tr>
    </tbody>
  </table>
  <table>
    <thead>
      <th>Medida</th>
      <th> Valor</th>
    </thead> 
    <tbody>
      <tr>
        <th>Cuello</th>
        <th>".$cuello." cm</th>
      </tr>
      <tr>
        <th>Hombro</th>
        <th>".$hombro." cm</th>
      </tr>
      <tr>
        <th>Pecho</th>
        <th>".$pecho." cm</th>
      </tr>
      <tr>
        <th>Espalda</th>
        <th>".$espalda." cm</th>
      </tr>
      <tr>
        <th>Cintura</th>
        <th>".$cintura." cm</th>
      </tr>
      <tr>
        <th>Abdomen</th>
        <th>".$abdomen." cm</th>
      </tr>
      <tr>
        <th>Cadera</th>
        <th>".$cadera." cm</th>
      </tr>
      <tr>
        <th>% Grasa</th>
        <th>".$por_grasa."</th>
      </tr>
      <tr>
        <th>Tension arterial</th>
        <th>".$valor_tension."</th>
      </tr>
      <tr>
        <th>Pulso</th>
        <th>".$pulso." cm</th>
      </tr>
    </tbody> 
  </table>
  <table>
    <thead>
      <th>Medida</th>
      <th> Valor izq</th>
      <th> Valor der</th>
    </thead>
    <tbody>
      <tr>
        <th>Brazos</th>
        <th>".$br_izq." cm</th>
        <th> ".$br_der." cm</th>
      </tr>
      <tr>
        <th>Antebrazos</th>
        <th>".$ant_izq." cm</th>
        <th>".$ant_der." cm</th>
      </tr>
      <tr>
        <th>Piernas</th>
        <th>".$pr_izq." cm</th>
        <th>".$pr_der." cm</th>
      </tr>
      <tr>
        <th>Pantorrillas</th>
        <th>".$pnt_izq." cm</th>
        <th>".$pnt_der." cm</th>
      </tr>
    </tbody>
  </table>
</div>
<div class='adipo'>
  <h1 class='h1_datos'>Adipometria:</h1>
  <table>
    <thead>
      <th>Adipometria</th>
      <th> Valor</th>
    </thead>
    <tbody>
      <tr>
        <th>Tricipital</th>
        <th>".$adipo_tri."</th>
      </tr>
      <tr>
        <th>Abdominal</th>
        <th>".$adipo_abdo."</th>
      </tr>
      <tr>
        <th>Suprailiaco</th>
        <th>".$adipo_supra."</th>
      </tr>
      <tr>
        <th>Subescapular</th>
        <th>".$adipo_sube."</th>
      </tr>
      <tr>
        <th>Tipo de cuerpo</th>
        <th>".$t_cuerpo."</th>
      </tr>
      <tr>
        <th>IMC</th>
        <th>".$imc."</th>
      </tr>
    </tbody>
  </table>
</div>
<div class='antecedentes'>
  <h1 class='h1_datos'>Antecedentes medicos:</h1>
  <table>
    <thead>
      <th>Antecedente medico</th>
      <th> Valor</th>
    </thead>
    <tbody>
      <tr>
        <th>Embarazo</th>
        <th>".$embarazo."</th>
      </tr>
      <tr>
        <th>Enfermedades cardiacas</th>
        <th>".$cardiaco."</th>
      </tr>
      <tr>
        <th>Tension arterial</th>
        <th>".$tens_arterial."</th>
      </tr>
      <tr>
        <th>Hipoglicemia</th>
        <th>".$hipoglisemia."</th>
      </tr>
      <tr>
        <th>Colesterol</th>
        <th>".$colesterol."</th>
      </tr>
      <tr>
        <th>Trigliceridos</th>
        <th>".$trigliceridos."</th>
      </tr>
      <tr>
        <th>Alergias</th>
        <th>".$alergias."</th>
      </tr>
      <tr>
        <th>Migrañas</th>
        <th>".$migrana."</th>
      </tr>
      <tr>
        <th>Asma</th>
        <th>".$asma."</th>
      </tr>
      <tr>
        <th>Lesiones oseas</th>
        <th>".$les_osea."</th>
      </tr>
      <tr>
        <th>Lesiones musculares</th>
        <th>".$les_musc."</th>
      </tr>
      <tr>
        <th>Observaciones</th>
        <th>".$observaciones."</th>
      </tr>
    </tbody>
  </table>
</div>";

echo $html;
