<?php
    ob_start();
    $id_usuario = $_GET['id_user'];
    $id_ent = substr($id_usuario,3);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/css/styleMEnu.css">
    <link rel="stylesheet" href="../css/css/home.css">
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
            <div id="photo"><img src="photo.jpeg" alt=""></div>
            <div id="name"><span>Camilo Sanguino</span></div>
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
                <a href="ent_index.php?id_ent=<?php echo $id_ent?>">
                    <div class="icon"><img src="../../iconos/entrenador/clientes.png" alt=""></div>
                    <div class="title"><span>Clientes</span></div>
                </a>
            </div>
            <div class="item separator"></div>
            <div class="item">
                <a href="config_ent.php?id_ent=<?php echo $id_ent?>">
                    <div class="icon"><img src="../../iconos/entrenador/configuracion.png" alt=""></div>
                    <div class="title"><span>Configuración</span></div>
                </a>
            </div>
            <div class="item">
                <a href="#">
                    <div class="icon"><img src="../../iconos/entrenador/cerrar_sesion.png" alt=""></div>
                    <div class="title"><span>Cerrar sesión</span></div>
                </a>
            </div>
        </div>
    </div>

    <div id="inicial">
        <h1>Logo, contacto, redes</h1>
        <div class="icon"><img src="../../img/BF.png" alt="Logo gimnasio" style="width: 400px; height: 300px;"></div>
        <div class="icon"><h2>Sistema de HHHHH</h2></div>
        <div class="icon"><h3><?php echo 'c';?> - GymSoft</h3></div>
        <br><br>
        <div class="redesSociales">
            <a title="Facebook" href="https://www.facebook.com/BfreeGym"><img id="imgFacebook" src="../../img/logoFacebook.png" alt="Logo facebook"/></a>
            <a title="Instagram" href="https://www.instagram.com/bfreegym/"><img id="imgInstagram" src="../../img/logoInstagram.png" alt="Logo instagram" /></a>
        </div>
    </div>

    <div id="cambio" style="visibility:hidden">
        <div class="icon"><img src="photo.jpeg" alt="Logo gimnasio" style="width: 400px; height: 300px;"></div>
        <div class="icon"><h1>Ey prueba</h1></div>
        <div class="redesSociales">
            <a title="Facebook" href="https://www.facebook.com/BfreeGym"><img src="../img/logoFacebook.png" alt="Logo facebook" style="width: 100px; height: 100px;"/></a>
            <a title="Instagram" href="https://www.instagram.com/bfreegym/"><img src="../img/logoInstagram.png" alt="Logo instagram" style="width: 100px; height: 100px;"/></a>
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