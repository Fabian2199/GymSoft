<?php
include("connection.php");

//$sql = "SELECT p.id_persona, `nombres`, `apellidos`, `foto`, `email`, `celular`, `fecha_nac`, `estado` FROM personas p JOIN usuarios u ON p.id_persona = u.id_persona WHERE u.tipo_user = 'cliente' AND u.estado = 0";
if (!isset($_POST['buscar'])) {
    $_POST['buscar'] = '';
}
if (!empty($_POST)) {
    $aKeyword = explode(" ", $_POST['buscar']);
    $sql = "SELECT p.id_persona, `nombres`, `apellidos`, `foto`, `email`, `celular`, `fecha_nac`, `estado` FROM personas p JOIN usuarios u ON p.id_persona = u.id_persona WHERE u.tipo_user = 'cliente' AND u.estado = 0 AND p.id_persona LIKE '%".$aKeyword[0]."%'";
    for ($i = 1; $i < count($aKeyword); $i++) {
        if (!empty($aKeyword[$i])) {
            $sql .= " AND p.id_persona LIKE '%".$aKeyword[$i]."%'";
        }
    }
    $consulta_cliente = $conexion->query($sql);
    while ($row = $consulta_cliente->fetch_assoc()) {
        $imagen = "img_per/".$row['foto'];
        echo '<div for="tar" class="gen">';
        echo '<div class="targeta " id="tar">';
        echo '<div class="adelante">';
        echo '<a  href="ent_clt_sel.php?id_persona='.$row['id_persona'].'">';
        echo '<h1>' . $row['nombres'] . ' ' . $row['apellidos'] . '</h1>';
		echo '</a>';
        echo '<img src= "'.$imagen.'" alt="">';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
}
?>
