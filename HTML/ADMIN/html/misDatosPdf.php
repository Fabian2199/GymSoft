<?php
session_start();
include("../PHP/connection.php");
$usuario = $_SESSION['user'];
if(!isset($usuario)){
    header("location:../../index.php");
}
?>
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
    <link rel="stylesheet" type="text/css" href="../css/css/StyleFactura.css">
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
            <th style="vertical-align: top; border: 1px solid #000;">Nombre del plan</th>
            <th style="vertical-align: top; border: 1px solid #000;">Fecha inicio</th>
            <th style="vertical-align: top; border: 1px solid #000;">Fecha fin</th>
        </thead>
        <tbody>
            <?php include '../php/connection.php';?>
            <?php $consulta = $conexion->query("SELECT det.id_factura, per.nombres, per.apellidos, pl.nombre_plan, det.fecha_ini, det.fecha_fin, det.estado_plan FROM detalles_fac det, planes pl, facturas fac, usuarios us, personas per where det.id_plan = pl.id_plan and det.id_factura = fac.id_factura and fac.id_cliente = us.id_user and us.id_persona = per.id_persona and fac.id_factura = $id_factura");?>
                <?php while($row = $consulta->fetch_array()) { ?>
                    <tr>
                        <td style="vertical-align: top; border: 1px solid #000; text-align: center;"><?php echo $row['id_factura']; ?></td>
                        <td style="vertical-align: top; border: 1px solid #000; text-align: center;"><?php echo $row['nombres']." ".$row['apellidos']; ?></td>
                        <td style="vertical-align: top; border: 1px solid #000; text-align: center;"><?php echo $row['nombre_plan']; ?></td>
                        <td style="vertical-align: top; border: 1px solid #000; text-align: center;"><?php $feI = explode(" ", $row['fecha_ini']); echo $feI[0]; ?></td>
                        <td style="vertical-align: top; border: 1px solid #000; text-align: center;"><?php $feF = explode(" ", $row['fecha_fin']); echo $feF[0]; ?></td>
                        <?php $variable = $row['id_factura']; ?>
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

    require_once '../php/dompdf/autoload.inc.php';
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