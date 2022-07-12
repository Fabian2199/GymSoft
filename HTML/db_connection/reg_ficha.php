<?php
    session_start();
    include ("connection.php");
    include ("login.php");
    require_once "ficha.php";
    $id_ficha=$_POST['id_ficha'];
    $id_entrenador=$_SESSION['user'];
    $id_cliente=$_POST['id_cliente'];
    $fecha= $_POST['fecha'];
    $edad = $_POST['edad'];
    $peso = $_POST['peso'];
    $estatura = $_POST['estatura'];
    $cuello = $_POST['cuello'];
    $hombro = $_POST['hombro'];
    $pecho = $_POST['pecho'];
    $espalda = $_POST['espalda'];
    $br_izq = $_POST['br_izq'];
    $br_der = $_POST['br_der'];
    $ant_izq = $_POST['ant_izq'];
    $ant_der = $_POST['ant_der'];
    $cintura = $_POST['cintura'];
    $abdomen = $_POST['abdomen'];
    $cadera = $_POST['cadera'];
    $pr_izq = $_POST['pr_izq'];
    $pr_der = $_POST['pr_der'];
    $pnt_izq = $_POST['pnt_izq'];
    $pnt_der = $_POST['pnt_der'];
    $por_grasa = $_POST['por_grasa'];
    $valor_tension = $_POST['valor tension'];
    $pulso = $_POST['pulso'];
    $adipo_tri = $_POST['adipo_tri'];
    $adipo_abdo = $_POST['adipo_apdo'];
    $adipo_supra = $_POST['adipo_supra'];
    $adipo_sube = $_POST['adipo_sube'];
    $t_cuerpo = $_POST['t_cuerpo'];
    $imc = $_POST['imc'];
    $embarazo = $_POST['embarazo'];
    $cardiaco = $_POST['cardiaco'];
    $hipoglisemia = $_POST['hipoglisemia'];
    $alergias = $_POST['alergias'];
    $migrana = $_POST['migrana'];
    $asma = $_POST['asma'];
    $les_osea = $_POST['les_osea'];
    $les_musc = $_POST['les_musc'];
    $tens_arterial = $_POST['tens_arterial'];
    $colesterol = $_POST['colesterol'];
    $trigliceridos = $_POST['trigliceridos'];
    $observaciones = $_POST['observaciones'];


    $registro ="INSERT INTO `ficha_antropometrica` (`id_ficha`, `id_entrenador`, `id_cliente`, `fecha`, `edad`, `peso`, `estatura`, `cuello`, `hombro`, `pecho`, `espalda`, `br_izq`, `br_der`, `ant_izq`, `ant_der`, `cintura`, `abdomen`,
    `cadera`,`pr_izq`, `pr_der`, `pnt_izq`, `pnt_der`, `por_grasa`, `valor_tension`, `pulso`, `adipo_tri`, `adipo_abdo`, `adipo_supra`, `adipo_sube`, `t_cuerpo`, `imc`, `embarazo`, `cardiaco`, `hipoglisemia`, `alergias`, `migrana`, `asma`,
     `les_osea`,`les_musc`, `tens_arterial`, `colesterol`, `trigliceridos`, `observaciones`) VALUES ('$id_ficha', '$id_entrenador', '$id_cliente', '$fecha', '$edad', '$peso', '$estatura', '$cuello', '$hombro', '$pecho', '$espalda', '$br_izq', '$br_der', '$ant_izq',
    '$ant_der', '$cintura', '$abdomen', '$cadera','$pr_izq', '$pr_der', '$pnt_izq', '$pnt_der', '$por_grasa', '$valor_tension', '$pulso', '$adipo_tri', '$adipo_abdo', '$adipo_supra', '$adipo_sube', '$t_cuerpo', '$imc', '$embarazo', '$cardiaco', '$hipoglisemia',
    '$alergias', '$migrana', '$asma', '$les_osea','$les_musc', '$tens_arterial', '$colesterol', '$trigliceridos', '$observaciones')";
    $validar = mysqli_query($conexion,$registro);

?>
