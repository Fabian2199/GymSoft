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
    include ("../php/dato_login.php");
    $id_user = $_GET['id_user'];
    $id = substr($id_user,3);
    $rol = "Entrenador"; //><-------------- que le entre el rol o id pa buscarlo
    $foto = "";
    $nombres ="";
    $datos = get_datos($id);
    while ($row = $datos->fetch_assoc()) {
        $foto = $row['foto'];
        $nombres = $row['nombres']." ".$row['apellidos']; 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio admin</title>
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
            <div id="photo"><img src="../../img_per/<?php echo $foto?>" alt=""></div>
            <div id="name"><span><?php echo $nombres?></span></div>
        </div>

        <!-- ITEMS -->
        <div id="menu-items">
            <div class="item">
                <a href="">
                    <div class="icon"><img src="../../iconos/admin/home.png" alt=""></div>
                    <div class="title"><span>Inicio</span></div>
                </a>
            </div>
            <div class="item">
                <a href="adm_clt.php?id_user=<?php echo $id;?>">
                    <div class="icon"><img src="../../iconos/admin/clientes.png" alt=""></div>
                    <div class="title"><span>Clientes</span></div>
                </a>
            </div>
            <div class="item">
                <a href="adm_ent.php?id_user=<?php echo $id;?>">
                    <div class="icon"><img src="../../iconos/admin/entrenadores.png" alt=""></div>
                    <div class="title"><span>Entrenadores</span></div>
                </a>
            </div>
            <div class="item">
                <a href="adm_ejer.php?id_user=<?php echo $id;?>">
                    <div class="icon"><img src="../../iconos/admin/ejercicios.png" alt=""></div>
                    <div class="title"><span>Ejercicios</span></div>
                </a>
            </div>
            <div class="item">
                <a href="facturacion.php?id_user=<?php echo $id;?>">
                    <div class="icon"><img src="../../iconos/admin/facturacion.png" alt=""></div>
                    <div class="title"><span>Facturación</span></div>
                </a>
            </div>
            <div class="item separator"></div>
            <div class="item">
                <a href="config_adm.php?id_persona=<?php echo $id;?>">
                    <div class="icon"><img src="../../iconos/admin/configuracion.png" alt=""></div>
                    <div class="title"><span>Configuración</span></div>
                </a>
            </div>
            <div class="item">
                <a href="../php/cerrarS.php">
                    <div class="icon"><img src="../../iconos/admin/cerrar_sesion.png" alt=""></div>
                    <div class="title"><span>Cerrar sesión</span></div>
                </a>
            </div>
        </div>
    </div>

    <div id="inicial">
        <br><br><br><br>
        <div class="icon"><img src="../../img/BF.png" alt="Logo gimnasio" style="width: 400px; height: 300px;"></div>
        <br><br><br><br><br>
        <div class="icon"><h2>Sistema de administrador</h2></div>
        <div class="icon"><h3><?php echo $id_user;?> - GymSoft</h3></div>
        <br><br>
        <div class="redesSociales">
            <a title="Facebook" href="https://www.facebook.com/BfreeGym"><img id="imgFacebook" src="../../img/logoFacebook.png" alt="Logo facebook"/></a>
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