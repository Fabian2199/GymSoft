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

		<link rel="stylesheet" type="text/css" href="css_adM_ent/popup.css">
		<link rel="stylesheet" type="text/css" href="css_adM_ent/popup_update.css">
		<script language="javascript" src="js\jquery-3.6.0.min.js"></script>
		<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
		<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
        crossorigin="anonymous">

    <title>Configuracion</title>
</head>

<body>
	<header>
		<div class="contenedor">
			<img src="img_gen/logoBFree.png" class="logogym">
			<input type="checkbox" id="menu-bar">
			<label class="fas fa-bars" for="menu-bar"></label>
			<nav class="menu2">
				<a href="adm_ejer.php">EJERCICIOS</a>
				<a href="adm_clt.php">CLIENTES</a>
				<a href="facturacion.php">FACTURACION</a>
				<a href="">INGRESO</a>
			</nav>

		</div>
	</header>
	<br>
    <div class="container my-5">
      <br>  <h2>Cambiar Contraseña</h2>
        <form id="formulario"  method="POST">
            <input type="text" name="usuario" placeholder="Ingresa contraseña actual" class="form-control my-3">
            <input type="text" name="pass" placeholder="Ingresa contraseña nueva" class="form-control my-3">
            <button class="btn btn-primary" type="submit">Actualizar</button>
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
