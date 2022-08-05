<?php
    include ("..\php\connection.php");
    $id_user=$_GET['id_user'];
    $sql = "SELECT *FROM ejercicios ";
    $consulta = $conexion->query($sql);
    if (!isset($_POST['buscar'])) {
        $_POST['buscar'] = '';
    }
    if (!empty($_POST)) {
        $aKeyword = explode(" ", $_POST['buscar']);
        $sql = "SELECT *FROM ejercicios e WHERE e.nombre_ejercicio LIKE '%".$aKeyword[0]."%'";
        for ($i = 1; $i < count($aKeyword); $i++) {
            if (!empty($aKeyword[$i])) {
                $sql .= " AND e.nombre_ejercicio LIKE '%".$aKeyword[$i]."%'";
            }
        }
        $consulta_cliente = $conexion->query($sql);
        while ($row = $consulta_cliente->fetch_assoc()) {
            $imagen ="../../img_ejer/".$row['imagen'];
            echo '<div for="tar" class="gen">';
            echo '<div class="targeta " id="tar">';
            echo '<div class="adelante">';
            echo '<img src="'.$imagen.'" alt="">';
            echo '</div>';
            echo '<div class="atras">';
            echo '<a href="'.$row['video'].'">';
            echo '<h1>'.$row['nombre_ejercicio'].'</h1>';
            echo '</a>';
            echo '<p>'.$row['descripcion'].'</p>';
            echo ' <a href="update_ejr_sel.php?id_ejercicio='.$row['id_ejercicio'].'&id_user='.$id_user.'" class= "btn_update">Actualizar</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    }
?>