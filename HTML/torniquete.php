<?php include("db_connection\mtr_clt.php") ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Entrenadores inicio</title>
	<link rel="stylesheet" type="text/css" href="CSS_TORNIQUETE/menu.css">
	<link rel="stylesheet" type="text/css" href="iconos/web-fonts-with-css/css/fontawesome-all.css">
	<link rel="stylesheet" type="text/css" href="CSS_ENT_INDEx/principal_ent_clt.css">
	<link rel="stylesheet" type="text/css" href="CSS_ENT_INDEx/principal_ent_clt_taR.css">
	<link rel="stylesheet" type="text/css" href="CSS_ENT_INDEX/popup.css">
	<link rel="stylesheet" type="text/css" href="CSS_ENT_INDEX/popup_update.css">
  <link rel="stylesheet" href="CSS_TORNIQUETE/nicepage.css" media="screen">
	<script language="javascript" src="js\jquery-3.6.0.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>

<body>
	<header>
		<div class="contenedor">
			<img src="img_gen/logoBFree.png" class="logogym">
			<input type="checkbox" id="menu-bar">
			<label class="fas fa-bars" for="menu-bar"></label>
			<nav class="menu2">
				<a href="adm_ejer.php">Agregar rutina</a>
				<a href="ficha.php">Agregar ficha antropometrica</a>
				<a href="conf_entrenador.php">Configuracion</a>
			</nav>
			<div>
				<h4 class="busqueda">Buscar documento  </h4>
				<input onkeyup="buscar_ahora($('#buscar_1').val());" type="text" class="form-control" id="buscar_1" name="buscar_1">

			</div>
		</div>
	</header>
	<main>
		<!-- creacion dinamica de las tarjetas que contienen los clientes -->
		<div  id="principal">
      <section class="u-align-center-lg u-align-center-md u-align-center-xl u-align-left-sm u-align-left-xs u-clearfix u-grey-10 u-section-1" id="carousel_d225">
          <div class="u-clearfix u-sheet u-sheet-1">
            <h1 class="u-custom-font u-font-playfair-display u-text u-text-1">Torniquete</h1><br>
            <div class="u-table u-table-responsive u-table-1">
              <table class="u-table-entity">
                <colgroup>
                  <col width="50%">
                  <col width="50%">
                </colgroup>
                <thead class="u-grey-50 u-table-header u-table-header-1">
                  <tr style="height: 44px;">
                    <th class="u-border-1 u-border-grey-50 u-table-cell">CLIENTE</th>
                    <th class="u-border-1 u-border-grey-50 u-table-cell">ESTADO</th>
                  </tr>
                </thead>
                <tbody class="u-table-body">
                  <?php include("db_connection\mtr_clt.php") ?>
                    <?php while ($row = $consulta->fetch_assoc()) { ?>
                  <tr style="height: 45px;">
                    <td class="u-border-2 u-border-grey-40 u-table-cell u-table-cell-3">
                    <h5><?php echo $row['nombres'] . " " . $row['apellidos']; ?></h5>
                    </td>
                    <td class="u-border-2 u-border-grey-40 u-table-cell">
                      <h5><?php $estado = $row['estado'];
                       if ($estado==1) {
                        echo "Activo";
                      }else {
                        echo "Inactivo";
                      } ?></h5>
                    <?php } ?>
                    </td>
                  </tr>

                </tbody>
              </table>
              <a href="ent_index.php" class="boton">Regresar</a>
            </div>
          </div>
        </section>
		</div>
	</main>
	<footer>
		<div class="sociales">
			<a class="fab fa-facebook" href="https://www.facebook.com/BfreeGym"></a>
			<a class="fab fa-instagram" href="https://www.instagram.com/bfreegym/"></a>
		</div>
	</footer>
	<script type="text/javascript">
		function buscar_ahora(buscar) {
			var parametros = {
				"buscar": buscar
			};
			$.ajax({
				data: parametros,
				type: 'POST',
				url: 'db_connection/torn_activo.php',
				success: function(data) {
					document.getElementById("principal").innerHTML = data;
				}
			});
		}
	</script>
</body>


</html>
