<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/Style.css">
    <title>Facturación #1</title>
</head>
<body>
    <div class="contenedor">
        <div class="hijo-1">
            <form action="" method="busqueda">
                <input class="inp-doc" type="text" placeholder="Documento" name="buscarFactura">
                <div class="div-btns">
                    <input class="btn" id="btnBuscar" onclick="buscarPersona()" type="submit" name="btnBuscar" value="Buscar">
                    <input class="btn" type="button" name="btnPagar" value="Pagar">
                </div>
            </form>
        </div>
        <div class="torniquete" id="torniquete">
            <h2 class="torniquete" id="pruebaH2">SI puede ingresar</h2>
        </div>
        <div class="hijo-2" id="hijo-2">
            <table class="table">
                <thead class="text-muted">
                    <th class="text-center">ID</th>
                    <th class="text-center">Cliente</th>
                    <th class="text-center">Fecha de pago</th>
                    <th class="text-center">Plan</th>
                    <th class="text-center">Fecha inicio</th>
                    <th class="text-center"></th>
                </thead>
                <tbody>
                    <?php include 'conexion.php';?>
                    <?php if(isset($_GET['btnBuscar'])) { ?>
                        <?php $busqueda = $_GET['buscarFactura']; ?>
                        <?php $consulta = $conecta->query("SELECT * FROM factura WHERE nombre LIKE '%$busqueda%'"); ?>
                        <?php while($row = $consulta->fetch_array()) { ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['nombre']; ?></td>
                                <td><?php echo $row['fecha_pago']; ?></td>
                                <td><?php echo $row['plan']; ?></td>
                                <td><?php echo $row['fecha_inicio']; ?></td>
                                <?php $variable = $row['id']; ?>
                                <td><a href="misDatosPdf.php?id=<?php echo $row['id']; ?>">Descargar</a></td>
                                <!--<td><input class="" type="submit" name="btnDescargarPDF" value="Descargar"><?php $id_dowload_pdf = $row['id']; ?></td>-->
                                <!--<td><a href="crearPDF.php?id=<?php echo $row['id']; ?>">Descargar</a></td>-->
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function buscarPersona(){
            document.getElementById("pruebaH2").innerHTML = '<?php echo $variable; ?>';
        }
    </script>
</body>
</html>