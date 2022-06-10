<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla dinamica</title>    
</head>
<body>
    <div class="container py-4">
        <div class="container">
            <div>
                <?php
                    include 'conexion.php';
                    $consulta = "select * from tabla_factura";
                    $resultado = $conecta->query($consulta);
                ?>
                <h3>Tabla dinamica</h3>
                <div class="" id="TablaConsulta">
                    <table class="table">
                        <thead class="text-muted">
                            <th class="text-center">ID</th>
                            <th class="text-center">Fecha de pago</th>
                            <th class="text-center">Plan</th>
                            <th class="text-center">Fecha fin</th>
                        </thead>
                        <tbody>
                            <?php while($row = $resultado->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['fecha_pago']; ?></td>
                                    <td><?php echo $row['plan']; ?></td>
                                    <td><?php echo $row['fecha_fin']; ?></td>
                                </tr>
                            <?php } ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>