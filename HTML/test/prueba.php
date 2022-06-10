<?php include("db_connection\mtr_ejr.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script language="javascript" src="js\jquery-3.6.0.min.js"></script>

<body>
    <form action="db_connection\act_ejr.php" method="POST">
        <div class="inputs-update">
            <div class="box">
                <label for="ejers">Ejercicio: </label>
                <select name="ejers" id="ejers">
                    <option value="101">Seleccionar ejercicio </option>
                    <?php foreach ($consulta as $opciones) : ?>
                        <option value="<?php echo $opciones['id_ejercicio']; ?>"><?php echo $opciones['nombre_ejercicio']; ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="contenedor-inputs" id="contenedor-inputs">
                <input type="file" placeholder="hola">
                <label >Desea cambiar imagen<input type="checkbox"></label>
            </div>
           
        </div>
    </form>
    <footer>   
	<script src="css_adm_ejer/combobox.js"></script>
    </footer>
</body>

</html>