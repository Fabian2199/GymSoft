<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" type="text/css" href="css_adm_ejeR/menu.css">
		<link rel="stylesheet" type="text/css" href="iconos/web-fonts-with-css/css/fontawesome-all.css">
		<link rel="stylesheet" type="text/css" href="CSS_ADM_ent/banner.css">
    <link rel="stylesheet" type="text/css" href="CSS_ENT_INDEx/principal_ent_clt.css">
  	<link rel="stylesheet" type="text/css" href="CSS_ENT_INDEx/principal_ent_clt_taR.css">
		<link rel="stylesheet" type="text/css" href="css_adM_ent/popup.css">
		<link rel="stylesheet" type="text/css" href="css_adM_ent/popup_update.css">
		<script language="javascript" src="js\jquery-3.6.0.min.js"></script>
		<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
		<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
        crossorigin="anonymous">

    <title>Configuracion</title>
    <link rel="stylesheet" href="CSS_CONFIG/nicepage.css" media="screen">
<link rel="stylesheet" href="CSS_CONFIG/Page-3.css" media="screen">
    <script class="u-script" type="text/javascript" src="CSS_CONFIG/jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="CSS_CONFIG/nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 4.13.4, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">

</head>

<body data-home-page="Page-3.html" data-home-page-title="Page 3" class="u-body u-xl-mode"><header class="u-clearfix u-custom-color-1 u-header u-valign-middle u-header" id="sec-4f93"><a href="https://nicepage.com" class="u-image u-logo u-image-1">
      <img src="CSS_CONFIG/images/default-logo.png" class="u-logo-image u-logo-image-1">
    </a><a href="https://nicepage.com/templates" class="u-image u-logo u-image-2" data-image-width="127" data-image-height="90">
      <img src="CSS_CONFIG/images/logoBFree.png" class="u-logo-image u-logo-image-2">
    </a></header>
  <section class="u-align-center-lg u-align-center-md u-align-center-xl u-align-left-sm u-align-left-xs u-clearfix u-grey-10 u-section-1" id="carousel_d225">
    <div class="u-clearfix u-sheet u-sheet-1">
      <h1 class="u-custom-font u-font-playfair-display u-text u-text-1">Editar mi Perfil</h1>
      <p class="u-large-text u-text u-text-variant u-text-2">Modifica tu información personal</p>
      <div class="u-clearfix u-expanded-width u-gutter-0 u-layout-wrap u-layout-wrap-1">
        <div class="u-layout">
          <div class="u-layout-row">
            <div class="u-align-center-md u-align-left-sm u-align-left-xs u-container-style u-layout-cell u-size-21 u-layout-cell-1">
              <div class="u-container-layout u-valign-top-md u-valign-top-sm u-valign-top-xs u-container-layout-1">
                <div alt="" class="u-image u-image-circle" data-image-width="700" data-image-height="700">
                  <div class="principal" id="principal">
              		<?php include("db_connection\update.php") ?>
              			<?php while ($row = $consulta->fetch_assoc()) { ?>
              				<div for="tar" class="gen">
              						<div class="adelante">
              							<a  href="ent_clt_sel.php?id_persona=<?php echo $row['id_persona']; ?>">

              							</a>
              							<img src=<?php echo "img_per\\" . $row['foto']; ?> alt="">
              						</div>

              				</div>
              			<?php } ?>
              		</div>
                </div>
              </div>
            </div>
            <div class="u-container-style u-layout-cell u-size-39 u-layout-cell-2">
              <div class="u-container-layout u-container-layout-2">
                <h4 class="u-text u-text-3">Detalles</h4>
                <hr>
                <?php include("db_connection\update.php") ?>
                  <?php while ($row = $consulta->fetch_assoc()) { ?>

                          <a>
                            <h5><b>Nombre:  </b><?php echo $row['nombres'] . " " . $row['apellidos']; ?></h5>
                            <h5><b>Fecha de nacimiento:  </b> <?php echo $row['fecha_nac']?></h5>
                          </a>
                  <?php } ?>
  <hr>
    <div class="u-container-layout u-container-layout-3">
      <br>
        <form id="formulario"  method="POST"><br>
            <div class="u-form-group u-form-name">
              <h5 class="u-text u-text-3">Modificar email</h5><br>
              <?php include("db_connection\update.php") ?>
                <?php while ($row = $consulta->fetch_assoc()) { ?>
              <input type="text" name="email" placeholder=<?php echo $row['email']; ?>  class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white u-input-1">
              <?php } ?>
            </div><br>
              <h5 class="u-text u-text-3">Modificar telefono</h5><br>
              <?php include("db_connection\update.php") ?>
                <?php while ($row = $consulta->fetch_assoc()) { ?>
              <input type="text" name="celular" placeholder=<?php echo $row['celular']; ?>  class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white u-input-2">
              <?php } ?>
              <br>
              <h5 class="u-text u-text-3">Cambiar Contraseña</h5><br>
            <input type="text" name="usuario" placeholder="Ingresa contraseña actual"  class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white u-input-1">
            </div><br>
            <input type="text" name="pass" placeholder="Ingresa contraseña nueva" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white u-input-2">
            <br>
            <button class="btn btn-primary" type="submit">Actualizar</button>
                  <a href="ent_index.php" class="boton">Regresar</a>
        </form>
        <div class="mt-3" id="respuesta">

        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>
    <script src="app.js"></script>
</body>

</html>
