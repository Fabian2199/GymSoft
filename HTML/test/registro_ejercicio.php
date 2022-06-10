<?php include ("db_connection\mtr_ejr.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav><h1>Bievenidos</h1></nav>
    <div class="contenedor">
        <form action="db_connection\reg_ejr.php" method="post">
            <h2>Logueate</h2>
            <br><br>
            <label for="">Nombre Ejercicio</label>
            <br>
            <input type="text" name="ejercicio" require>
            <br><br>
            <label for="">Imagen</label>
            <br>
            <input type="file" name="imagen" require>
            <br><br>
            <label for="">Descripcion</label>
            <br>
            <input type="text" name="descripcion" require>
            <br><br>
            <label for="">video</label>
            <br>
            <input type="text" name="video">
            <br><br>
            <button>Registrar</button>
        </form>
    </div>
</body>
</html>