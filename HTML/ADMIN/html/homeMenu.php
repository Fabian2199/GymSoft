<?php
    ob_start();
    //$id_usuario = $_GET['id'];
    $rol = "Entrenador"; //><-------------- que le entre el rol o id pa buscarlo
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
                <a href="#">
                    <div class="icon"><img src="../../iconos/admin/home.png" alt=""></div>
                    <div class="title"><span>Inicio</span></div>
                </a>
            </div>
            <div class="item">
                <a href="../../torniquete.php">
                    <div class="icon"><img src="../../iconos/admin/ingreso.png" alt=""></div>
                    <div class="title"><span>Ingreso</span></div>
                </a>
            </div>
            <div class="item">
                <a href="adm_clt.php">
                    <div class="icon"><img src="../../iconos/admin/clientes.png" alt=""></div>
                    <div class="title"><span>Clientes</span></div>
                </a>
            </div>
            <div class="item">
                <a href="adm_ent.php">
                    <div class="icon"><img src="../../iconos/admin/entrenadores.png" alt=""></div>
                    <div class="title"><span>Entrenadores</span></div>
                </a>
            </div>
            <div class="item">
                <a href="adm_ejer.php">
                    <div class="icon"><img src="../../iconos/admin/ejercicios.png" alt=""></div>
                    <div class="title"><span>Ejercicios</span></div>
                </a>
            </div>
            <div class="item">
                <a href="facturacion.php">
                    <div class="icon"><img src="../../iconos/admin/facturacion.png" alt=""></div>
                    <div class="title"><span>Facturación</span></div>
                </a>
            </div>
            <div class="item separator"></div>
            <div class="item">
                <a href="../../configuracion.php">
                    <div class="icon"><img src="../../iconos/admin/configuracion.png" alt=""></div>
                    <div class="title"><span>Configuración</span></div>
                </a>
            </div>
            <div class="item">
                <a href="·">
                    <div class="icon"><img src="../../iconos/admin/cerrar_sesion.png" alt=""></div>
                    <div class="title"><span>Cerrar sesión</span></div>
                </a>
            </div>
        </div>
    </div>

    <div id="inicial">
        <h1>Logo, contacto, redes</h1>
        <div class="icon"><img src="../../img/BF.png" alt="Logo gimnasio" style="width: 400px; height: 300px;"></div>
        <div class="icon"><h2>Sistema de HHHHH</h2></div>
        <div class="icon"><h3><?php echo $rol;?> - GymSoft</h3></div>
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