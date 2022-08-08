<?php
session_start();
include("../php/connection.php");
$usuario = $_SESSION['user'];
if(!isset($usuario)){
    header("location:../../index.php");
}
?>
<?php include("../php/connection.php");
$id_ent = $_GET['id_ent'];
include("../php/dato_login.php");
$foto = "";
$nombres = "";
$datos = get_datos($id_ent);
while ($row = $datos->fetch_assoc()) {
    $foto = $row['foto'];
    $nombres = $row['nombres'] . " " . $row['apellidos'];
} ?>
<?php include("../php/dato_ejr.php") ?>

<?php
$id = $_GET['id_persona'];
$id_ejercicio = $_GET['id_ejercicio'];
$dia = $_GET['dia'];
$datos = get_ejr($id_ejercicio);
$datos_rut = get_rut($id_ejercicio, $id, $dia);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Actualizar rutina</title>
    <link rel="stylesheet" type="text/css" href="../CSS/CSS/menu.css">
    <link rel="stylesheet" type="text/css" href="../../iconos/web-fonts-with-css/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="../CSS/CSS/banner.css">
    <link rel="stylesheet" type="text/css" href="../CSS/CSS/body.css">
    <link rel="stylesheet" type="text/css" href="../CSS/CSS_ENT_CLT_SEL/update_clt.css">

    <link rel="stylesheet" href="../CSS/CSS/styleMenu.css">
</head>

<body>
    <div id="sidemenu" class="menu-collapsed">
        <!-- HEADER -->
        <div id="header">
            <div id="title"><span>Gimnasio BFree</span></div>
            <div id="menu-btn">
                <div class="btn-hamburger"></div>
                <div class="btn-hamburger"></div>
                <div class="btn-hamburger"></div>
            </div>
        </div>

        <!-- PROFILE -->
        <div id="profile">
            <div id="photo"><img src="../../img_per/<?php echo $foto ?>" alt=""></div>
            <div id="name"><span><?php echo $nombres ?></span></div>
        </div>

        <!-- ITEMS -->
        <div id="menu-items">
            <div class="item">
                <a href="homeMenu.php?id_user=ent<?php echo $id_ent ?>">
                    <div class="icon"><img src="../../iconos/entrenador/home.png" alt=""></div>
                    <div class="title"><span>Inicio</span></div>
                </a>
            </div>
            <div class="item">
                <a href="ent_index.php?id_ent=<?php echo $id_ent ?>">
                    <div class="icon"><img src="../../iconos/entrenador/clientes.png" alt=""></div>
                    <div class="title"><span>Clientes</span></div>
                </a>
            </div>
            <div class="item separator"></div>
            <div class="item">
                <a href="configuracion.php">
                    <div class="icon"><img src="../../iconos/entrenador/configuracion.png" alt=""></div>
                    <div class="title"><span>Configuración</span></div>
                </a>
            </div>
            <div class="item">
                <a href="../php/cerrarS.php">
                    <div class="icon"><img src="../../iconos/entrenador/cerrar_sesion.png" alt=""></div>
                    <div class="title"><span>Cerrar sesión</span></div>
                </a>
            </div>
        </div>
    </div>

    <header>
        <div class="contenedor">
            <img src="../../img_gen/logoBFree.png" class="logogym">
        </div>
    </header>
    <main>
        <div class="principal">
            <div for="tar" class="ficha_gen">
                <div class="ficha " id="tar">
                    <div class="adelante">
                        <h1>Datos</h1>

                        <?php while ($row = $datos->fetch_assoc()) { ?>
                            <h3 class="h1_datos"><?php echo $row['nombre_ejercicio']; ?></h3>
                            <img src="<?php echo "../../img_ejer\\" . $row['imagen']; ?>" alt="">
                            <p><?php echo $row['descripcion']; ?></p>
                        <?php } ?>
                        <?php while ($row = $datos_rut->fetch_assoc()) { ?>
                            <form action="../php/act_rut.php?id_ent=<?php echo $id_ent ?>" method="POST">
                                <div class="inputs_update">
                                    <input type="text" name="dia" value="<?php echo $dia; ?>" style="display: none;">
                                    <input type="text" name="id_persona" value="<?php echo $id; ?>" style="display: none;">
                                    <input type="text" name="id_ejercicio" value="<?php echo $id_ejercicio; ?>" style="display: none;">
                                    <h2>Series:</h2>
                                    <input type="number" name="series" value="<?php echo $row['n_series']; ?>" required>
                                    <h2>Repeticiones:</h2>
                                    <input type="number" name="repeticiones" value="<?php echo $row['n_rep']; ?>" required>

                                </div>
                                <input type="submit" class="btn_actu" value="Actualizar" id="btn_actu">
                            </form>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="sociales">
            <a class="fab fa-facebook" href="https://www.facebook.com/BfreeGym"></a>
            <a class="fab fa-instagram" href="https://www.instagram.com/bfreegym/"></a>
        </div>
    </footer>
    <script>
        const btn = document.querySelector('#menu-btn');
        const menu = document.querySelector('#sidemenu');
        btn.addEventListener('click', e => {
            menu.classList.toggle("menu-expanded");
            menu.classList.toggle("menu-collapsed");
            document.querySelector('body').classList.toggle('body-expanded');
        });
    </script>
</body>

</html>