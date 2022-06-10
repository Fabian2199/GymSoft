<?php
    ob_start();
    $id_factura = $_GET['id'];
    //echo $id_factura;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/StyleFactura.css">
    <title>Factura</title>
</head>
<body>
    <h1 style="text-align: center;">Gimnasio BFree</h1>
    <h4 style="text-align: center; margin-top: -20px;">NIT: 000000000-1 TEL: 0000000</h4>
    <br><br><br>
    <h2 style="text-align: center; margin-top: -20px;">FACTURA ELECTRONICA</h2>
    <table class="table" style="width: 80%; margin: 50px auto; border-spacing: 0;">
        <thead>
            <th style="vertical-align: top; border: 1px solid #000;">ID</th>
            <th style="vertical-align: top; border: 1px solid #000;">Cliente</th>
            <th style="vertical-align: top; border: 1px solid #000;">Fecha de pago</th>
            <th style="vertical-align: top; border: 1px solid #000;">Plan</th>
            <th style="vertical-align: top; border: 1px solid #000;">Fecha inicio</th>
        </thead>
        <tbody>
            <?php include 'conexion.php';?>
            <?php $consulta = $conecta->query("SELECT * FROM factura WHERE id = '$id_factura'"); ?>
                <?php while($row = $consulta->fetch_array()) { ?>
                    <tr>
                        <td style="vertical-align: top; border: 1px solid #000; text-align: center;"><?php echo $row['id']; ?></td>
                        <td style="vertical-align: top; border: 1px solid #000; text-align: center;"><?php echo $row['nombre']; ?></td>
                        <td style="vertical-align: top; border: 1px solid #000; text-align: center;"><?php echo $row['fecha_pago']; ?></td>
                        <td style="vertical-align: top; border: 1px solid #000; text-align: center;"><?php echo $row['plan']; ?></td>
                        <td style="vertical-align: top; border: 1px solid #000; text-align: center;"><?php echo $row['fecha_inicio']; ?></td>
                        <?php $variable = $row['id']; ?>
                    </tr>
                <?php } ?>
        </tbody>
    </table>
    <h3 style="text-align: center;">Gracias por elegirnos</h3>
    <!--<img src="https://localhost/tabla/vicente_1.jpg"-->
    <!--<img src="http://<?php echo $_SERVER['HTTP_HOST'];?>/tabla/imgPrueba.png" width="200" alt="">-->
</body>
</html>
<?php
    $html = ob_get_clean();
    //echo $html;

    require_once 'dompdf/autoload.inc.php';
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();

    $options = $dompdf->getOptions();
    $options->set(array('isRemoteEnabled' => true));
    $dompdf->setOptions($options);

    $dompdf->loadHtml($html);

    $dompdf->setPaper('letter');
    //$dompdf->setPaper("letter", "landscape");
    $dompdf->render();

    $dompdf->stream("archivo_.pdf", array("Attachment" => false));
?>