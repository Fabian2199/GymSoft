<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
        <input type="text" name="busqueda">
        <input type="submit" name="enviar" value="Buscar">
    </form>
    <?php
        include 'conexion.php';
        if(isset($_GET['enviar'])) {
            $busqueda = $_GET['busqueda'];
            $consulta = $conecta->query("SELECT * FROM cliente WHERE nombre LIKE '%$busqueda%' OR apellido LIKE '%$busqueda%' OR cedula LIKE '%$busqueda%'");
            while($row = $consulta->fetch_array()) {
                echo $row['nombre']." ".$row['apellido']." ".$row['cedula'].'<br>';
            }
        }
    ?>
    <!--
    <div class="" id="tablaBusqueda">
        <table>
            <thead>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Cedula</th>
            </thead>
            <tbody>
                <?php
                /*
                    include 'conexion.php';
                    if(isset($_GET['enviar'])){
                        $busqueda = $_GET['busqueda'];
                        $consulta = $conecta->query("SELECT * FROM cliente WHERE nombre LIKE '%$busqueda%'");?>
                        <?php while($row = $consulta->fetch_array()){ ?>
                            <tr>
                                <td><?php echo $row['nombre']; ?></td>
                                <td><?php echo $row['apellido']; ?></td>
                                <td><?php echo $row['cedula']; ?></td>
                            </tr>
                        <?php}?>
                        <?php}?>
                        */
                    ?>
            </tbody>
        </table>
    </div>
    -->
</body>
</html>