<?php
    ob_start();
    $id = $_GET['id'];
    #include("db_connection\dato_ent_clt.php")
    //include 'db_connection/dato_ent_clt.php';

    include '../../db_connection/connection.php';
    $slq_rutina = "SELECT r.dia,e.id_ejercicio,e.nombre_ejercicio,e.imagen,r.n_series,r.n_rep FROM rutinas r JOIN usuarios u ON r.id_cliente = u.id_user JOIN personas p ON p.id_persona = u.id_persona JOIN ejercicios e ON e.id_ejercicio = r.id_ejercicio 
    WHERE p.id_persona = $id ORDER BY FIELD(r.dia,'Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo')";
    $rutina= $conexion ->query($slq_rutina);

    //$rutina = get_rutina($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rutina PDF</title>
</head>
<body>
    <div >
        <h1 style="text-align: center;">Gimnasio BFree</h1>
        <h4 style="text-align: center; margin-top: -20px;">NIT: 000000000-1 TEL: 0000000</h4>
    </div>
    <br><br><br>
    <h2 style="text-align: center; margin-top: -20px;">RUTINA</h2>
    <table style="width: 60%; margin: 50px auto; border-spacing: 0;">
        <thead>
            <th style="vertical-align: top; border: 1px solid #000;">Dia</th>
            <th style="vertical-align: top; border: 1px solid #000;">Ejercicio</th>
            <th style="vertical-align: top; border: 1px solid #000;">Series</th>
            <th style="vertical-align: top; border: 1px solid #000;">Repeticiones</th>
        </thead>
        <tbody>
            <?php while ($row = $rutina->fetch_assoc()) { ?>
                <tr>
                    <th style="vertical-align: top; border: 1px solid #000; text-align: center;"><?php echo $row['dia']; ?></th>
                    <th style="vertical-align: top; border: 1px solid #000; text-align: center;"><?php echo $row['nombre_ejercicio']; ?></th>
                    <th style="vertical-align: top; border: 1px solid #000; text-align: center;"><?php echo $row['n_series']; ?></th>
                    <th style="vertical-align: top; border: 1px solid #000; text-align: center;"><?php echo $row['n_rep']; ?></th>
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

    $dompdf->stream("rutina"."$id".".pdf", array("Attachment" => false));
?>