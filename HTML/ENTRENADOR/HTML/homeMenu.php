<?php
session_start();
include("../php/connection.php");
$usuario = $_SESSION['user'];
if(!isset($usuario)){
    header("location:../../index.php");
}
?>
<?php
ob_start();
include("../php/dato_login.php");
$id_usuario = $_GET['id_user'];
$id_ent = substr($id_usuario, 3);
$foto = "";
$nombres = "";
$datos = get_datos($id_ent);
while ($row = $datos->fetch_assoc()) {
    $foto = $row['foto'];
    $nombres = $row['nombres'] . " " . $row['apellidos'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio entrenador</title>
    <link rel="stylesheet" href="../CSS/CSS/styleMenu.css">
    <link rel="stylesheet" href="../CSS/CSS/home.css">
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
                <a href="">
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
                <a href="config_ent.php?id_ent=<?php echo $id_ent ?>">
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

    <div id="inicial">
        <br><br><br><br>
        <div class="icon"><img src="../../img/BF.png" alt="Logo gimnasio" style="width: 400px; height: 300px;"></div>
        <br><br><br><br><br>
        <h2>Sistema de entrenador</h2>
        <h3><?php echo $id_usuario; ?> - GymSoft</h3>
        <br><br>
        <div class="redesSociales">
            <a title="Facebook" href="https://www.facebook.com/BfreeGym"><img id="imgFacebook" src="../../img/logoFacebook.png" alt="Logo facebook" /></a>
            <a title="Instagram" href="https://www.instagram.com/bfreegym/"><img id="imgInstagram" src="../../img/logoInstagram.png" alt="Logo instagram" /></a>
        </div>
    </div>

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