<?php
    include ("../php/connection.php");
    $id_user=$_GET['id_user'];
    $sql = "SELECT p.id_persona, `nombres`, `apellidos`, `foto`, `email`, `celular`, `fecha_nac`, `estado` FROM personas p JOIN usuarios u ON p.id_persona = u.id_persona WHERE u.tipo_user = 'cliente'";
    $consulta = $conexion->query($sql);
    if (!isset($_POST['buscar'])) {
        $_POST['buscar'] = '';
    }
    if (!empty($_POST)) {
        $aKeyword = explode(" ", $_POST['buscar']);
        $sql = "SELECT p.id_persona, `nombres`, `apellidos`, `foto`, `email`, `celular`, `fecha_nac`, `estado` FROM personas p JOIN usuarios u ON p.id_persona = u.id_persona WHERE u.tipo_user = 'cliente' AND p.id_persona LIKE '%".$aKeyword[0]."%'";
        for ($i = 1; $i < count($aKeyword); $i++) {
            if (!empty($aKeyword[$i])) {
                $sql .= " AND p.id_persona LIKE '%".$aKeyword[$i]."%'";
            }
        }
        $consulta_cliente = $conexion->query($sql);
        echo '<table>';
        echo '<thead>';
        echo '<th>Documento</th>';
        echo '<th>Nombre</th>';
        echo '<th>Apellido</th>';
        echo '<th>Email</th>';
        echo '<th>Celular</th>';
        echo '<th>Datos plan</th>';
        echo '<th>Actualizar</th>';
        echo '<thead>';
        echo '<tbody>';
        while ($row = $consulta_cliente->fetch_assoc()) {
            echo '<tr>';
            echo '<th>'.$row['id_persona'].'</th>';
            echo '<th>'.$row['nombres'].'</th>';
            echo '<th>'.$row['apellidos'].'</th>';
            echo '<th>'.$row['email'].'</th>';
            echo '<th>'.$row['celular'].'</th>';
            if ($row['estado'] == 0) {
                $estado = "Plan Vigente";
            } else {
                $estado = "Plan Vencido";
            }
            echo '<th>'.$estado.'</th>';
            echo '<th>
                <a href="update_clt_sel.php?id_persona='.$row['id_persona'].'&id_user='.$id_user.'" >Actualizar</a>
            </th>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    }
?>