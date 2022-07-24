<?php
include("connection.php");

//$sql = "SELECT p.id_persona, `nombres`, `apellidos`, `foto`, `email`, `celular`, `fecha_nac`, `estado` FROM personas p JOIN usuarios u ON p.id_persona = u.id_persona WHERE u.tipo_user = 'cliente' AND u.estado = 0";
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
  }

      echo '<section class="u-align-center-lg u-align-center-md u-align-center-xl u-align-left-sm u-align-left-xs u-clearfix u-grey-10 u-section-1" id="carousel_d225">';
      echo         '<div class="u-clearfix u-sheet u-sheet-1">';
      echo     '<h1 class="u-custom-font u-font-playfair-display u-text u-text-1">Torniquete</h1><br>';
      echo        ' <div class="u-table u-table-responsive u-table-1">';
      echo        '<table class="u-table-entity">';
      echo         ' <colgroup>';
      echo          '<col width="50%">';
      echo            '<col width="50%">';
      echo          '</colgroup>';
      echo          '<thead class="u-grey-50 u-table-header u-table-header-1">';
      echo           ' <tr style="height: 44px;">';
      echo             ' <th class="u-border-1 u-border-grey-50 u-table-cell">CLIENTE</th>';
      echo              '<th class="u-border-1 u-border-grey-50 u-table-cell">ESTADO</th>';
      echo            '</tr>';
      echo          '</thead>';
      echo          '<tbody class="u-table-body">';

      echo            '<tr style="height: 45px;">';
      echo             ' <td class="u-border-2 u-border-grey-40 u-table-cell u-table-cell-3">';
      $consulta_cliente = $conexion->query($sql);
      $row = $consulta_cliente->fetch_assoc(); 
        echo '<h5>' . $row['nombres'] . ' ' . $row['apellidos'] . '</h5>';
      echo   '</td>';
      echo   '<td class="u-border-2 u-border-grey-40 u-table-cell">';
          $estado = $row['estado'];
           if ($estado==1) {
            echo "Activo";
          }else {
            echo "Inactivo";
          }

        '</td>';
      '</tr>';

      '</tbody>';
      '</table>';

      '</div>';
    '</div>';
  '</section>';


?>
