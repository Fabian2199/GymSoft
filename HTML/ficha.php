<!DOCTYPE html>
<html style="font-size: 16px;"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Doing The Right Thing,&nbsp;At The Right Time">
    <meta name="description" content="">
    <title>Ficha AP</title>
    <link rel="stylesheet" href="CSS_FICHA/nicepage.css" media="screen">
<link rel="stylesheet" href="CSS_FICHA/Page-3.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 4.13.4, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">


    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"logo": "images/default-logo.png",
		"sameAs": []
}</script>
    <meta name="theme-color" content="#88bcec">
    <meta property="og:title" content="Page 3">
    <meta property="og:type" content="website">

    <?php
	include ("db_connection/connection.php");
	session_start();
	require_once "db_connection/connection.php";
	$conexion;
	$row = '';
	$sql2=mysqli_query($conexion,"SELECT * FROM usuarios WHERE `tipo_user` ='cliente'");
	while($f=mysqli_fetch_assoc($sql2)){
					$row .= "<option value='" . $f['id_user'] . "'>" .
											 $f['id_user'] . "</option>";
	}

?>
  </head>
  <body data-home-page="Page-3.html" data-home-page-title="Page 3" class="u-body u-xl-mode"><header class="u-clearfix u-custom-color-1 u-header u-header" id="sec-4f93"><a href="" class="u-image u-logo u-image-1">
      </a><a href="" class="u-image u-logo u-image-2" data-image-width="127" data-image-height="90">
        <img src="img/logoBFree.png" class="u-logo-image u-logo-image-2">
      </a></header>
    <section class="u-align-center u-clearfix u-grey-10 u-section-1" id="carousel_3034">
      <img alt="" class="u-expanded-height u-image u-image-default u-image-1" data-image-width="1000" data-image-height="1502" src="img/lateral.jpg">
      <div class="u-align-left u-container-style u-group u-group-1">
        <div class="u-container-layout u-valign-top u-container-layout-1">
          <h1 class="u-align-center u-custom-font u-font-playfair-display u-text u-text-1">Ficha Antropometrica</h1>
          <h5 class="u-align-center u-text u-text-2">Rellene todos los campos</h5>
          <div class="u-expanded-width u-form u-form-1">
            <form action="#" method="POST" class="u-clearfix u-form-spacing-30 u-form-vertical u-inner-form" style="padding: 0;" name="form">
              <div class="u-form-group u-form-select u-form-group-1">
                <label for="select-0c1a" class="u-label">Cliente</label>
                <div class="u-form-select-wrapper">

                  <?php
					$query = "SELECT us.id_user, pe.nombres, pe.apellidos FROM usuarios us, personas pe WHERE us.id_persona = pe.id_persona AND tipo_user LIKE 'cliente';";
					$consul = mysqli_query($conexion, $query);
					?>
					<select id="select-0c1a" name="id_cliente" class="u-input u-input-rectangle u-white">
						<option>Seleccionar cliente</option>
						<?php foreach($consul as $personas):?>
							<option value="<?php echo $personas['id_user']; ?>"><?php echo $personas['nombres']." ".$personas['apellidos']; ?></option>
						<?php endforeach ?>
					</select>
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
                </div>
              </div>
              <div class="u-form-date u-form-group u-form-group-2">
                <label for="date-65bd" class="u-label">Fecha</label>
                <input type="date" placeholder="MM/DD/AAAA" id="date-65bd" name="fecha" class="u-input u-input-rectangle u-white" required="">
              </div>
              <div class="u-form-group u-form-name u-form-partition-factor-3 u-form-group-3">
                <label for="name-d70e" class="u-label">Edad</label>
                <input type="number" placeholder="Edad" id="name-d70e" name="edad" class="u-input u-input-rectangle u-white" required="">
              </div>
              <div class="u-form-address u-form-group u-form-partition-factor-3 u-form-group-4">
                <label for="address-2127" class="u-label">Peso</label>
                <input type="number" placeholder="Peso en kg" id="address-2127" name="peso" class="u-input u-input-rectangle u-white" required="">
              </div>
              <div class="u-form-email u-form-group u-form-partition-factor-3 u-form-group-5">
                <label for="email-d70e" class="u-label">Estatura</label>
                <input type="number" placeholder="Estatura en cm" id="email-d70e" name="estatura" class="u-input u-input-rectangle u-white" required="required">
              </div>
              <div class="u-form-group u-form-partition-factor-3 u-form-group-6">
                <label for="text-b538" class="u-label">Cuello</label>
                <input type="number" placeholder="Cuello" id="text-b538" name="cuello" class="u-input u-input-rectangle u-white">
              </div>
              <div class="u-form-group u-form-partition-factor-3 u-form-group-7">
                <label for="text-7664" class="u-label">Hombro</label>
                <input type="number" placeholder="Hombro" id="text-7664" name="hombro" class="u-input u-input-rectangle u-white">
              </div>
              <div class="u-form-group u-form-partition-factor-3 u-form-group-8">
                <label for="text-6d16" class="u-label">Pecho</label>
                <input type="number" placeholder="Pecho" id="text-6d16" name="pecho" class="u-input u-input-rectangle u-white">
              </div>
              <div class="u-form-group u-form-partition-factor-3 u-form-group-9">
                <label for="text-c7cd" class="u-label">Espalda</label>
                <input type="number" placeholder="Espalda" id="text-c7cd" name="espalda" class="u-input u-input-rectangle u-white">
              </div>
              <div class="u-form-group u-form-partition-factor-3 u-form-group-10">
                <label for="text-dfe2" class="u-label">Brazo Izquierdo</label>
                <input type="number" placeholder="Brazo Izquierdo" id="text-dfe2" name="br_izq" class="u-input u-input-rectangle u-white">
              </div>
              <div class="u-form-group u-form-partition-factor-3 u-form-group-11">
                <label for="text-c082" class="u-label">Brazo Derecho</label>
                <input type="number" placeholder="Brazo Derecho" id="text-c082" name="br_der" class="u-input u-input-rectangle u-white">
              </div>
              <div class="u-form-group u-form-partition-factor-3 u-form-group-12">
                <label for="text-9f76" class="u-label">Ante-Brazo Izquierdo</label>
                <input type="number" placeholder="Ante-Brazo Izquierdo" id="text-9f76" name="ant_izq" class="u-input u-input-rectangle u-white">
              </div>
              <div class="u-form-group u-form-partition-factor-3 u-form-group-13">
                <label for="text-d504" class="u-label">Ante-Brazo Derecho</label>
                <input type="number" placeholder="Ante-Brazo Derecho" id="text-d504" name="ant_der" class="u-input u-input-rectangle u-white">
              </div>
              <div class="u-form-group u-form-partition-factor-3 u-form-group-14">
                <label for="text-ff79" class="u-label">Cintura</label>
                <input type="number" placeholder="Cintura" id="text-ff79" name="cintura" class="u-input u-input-rectangle u-white">
              </div>
              <div class="u-form-group u-form-partition-factor-3 u-form-group-15">
                <label for="text-8320" class="u-label">abdomen</label>
                <input type="number" placeholder="abdomen" id="text-8320" name="abdomen" class="u-input u-input-rectangle u-white">
              </div>
              <div class="u-form-group u-form-partition-factor-3 u-form-group-16">
                <label for="text-9534" class="u-label">cadera</label>
                <input type="number" placeholder="cadera" id="text-9534" name="cadera" class="u-input u-input-rectangle u-white">
              </div>
              <div class="u-form-group u-form-partition-factor-3 u-form-group-17">
                <label for="text-484e" class="u-label">Pierna Izquierda</label>
                <input type="number" placeholder="Pierna Izquierda" id="text-484e" name="pr_izq" class="u-input u-input-rectangle u-white">
              </div>
              <div class="u-form-group u-form-partition-factor-3 u-form-group-18">
                <label for="text-deec" class="u-label">Pierna Derecha</label>
                <input type="number" placeholder="Pierna Derecha" id="text-deec" name="pr_der" class="u-input u-input-rectangle u-white">
              </div>
              <div class="u-form-group u-form-partition-factor-3 u-form-group-19">
                <label for="text-d7f7" class="u-label">Pantorrilla Izquierda</label>
                <input type="number" placeholder="Pantorrilla Izquierda" id="text-d7f7" name="pnt_izq" class="u-input u-input-rectangle u-white">
              </div>
              <div class="u-form-group u-form-partition-factor-3 u-form-group-20">
                <label for="text-dccc" class="u-label">Pantorrilla Derecha</label>
                <input type="number" placeholder="Pantorrilla Derecha" id="text-dccc" name="pnt_der" class="u-input u-input-rectangle u-white">
              </div>
              <div class="u-form-group u-form-partition-factor-3 u-form-group-21">
                <label for="text-7484" class="u-label">% de grasa</label>
                <input type="number" placeholder="% de grasa" id="text-7484" name="por_grasa" class="u-input u-input-rectangle u-white">
              </div>
              <div class="u-form-group u-form-partition-factor-3 u-form-group-22">
                <label for="text-6553" class="u-label">valor tension</label>
                <input type="number" placeholder="valor tension" id="text-6553" name="valor_tension" class="u-input u-input-rectangle u-white">
              </div>
              <div class="u-form-group u-form-partition-factor-3 u-form-group-23">
                <label for="text-7b43" class="u-label">pulso</label>
                <input type="number" placeholder="pulso" id="text-7b43" name="pulso" class="u-input u-input-rectangle u-white">
              </div>
              <div class="u-form-group u-form-partition-factor-3 u-form-group-24">
                <label for="text-1d9b" class="u-label">adipo_tri</label>
                <input type="number" placeholder="adipo_tri" id="text-1d9b" name="adipo_tri" class="u-input u-input-rectangle u-white">
              </div>
              <div class="u-form-group u-form-partition-factor-3 u-form-group-25">
                <label for="text-6676" class="u-label">adipo_apdo</label>
                <input type="number" placeholder="adipo_apdo" id="text-6676" name="adipo_apdo" class="u-input u-input-rectangle u-white">
              </div>
              <div class="u-form-group u-form-partition-factor-3 u-form-group-26">
                <label for="text-47d3" class="u-label">adipo_supra</label>
                <input type="number" placeholder="adipo_supra" id="text-47d3" name="adipo_supra" class="u-input u-input-rectangle u-white">
              </div>
              <div class="u-form-group u-form-partition-factor-3 u-form-group-27">
                <label for="text-4ad9" class="u-label">adipo_sube</label>
                <input type="number" placeholder="adipo_sube" id="text-4ad9" name="adipo_sube" class="u-input u-input-rectangle u-white">
              </div>
              <div class="u-form-group u-form-partition-factor-3 u-form-group-28">
                <label for="text-d5d2" class="u-label">Tipo de Cuerpo</label>
                <input type="number" placeholder="Tipo de Cuerpo" id="text-d5d2" name="t_cuerpo" class="u-input u-input-rectangle u-white">
              </div>
              <div class="u-form-group u-form-partition-factor-3 u-form-group-29">
                <label for="text-51a6" class="u-label">IMC</label>
                <input type="number" placeholder="IMC" id="text-51a6" name="imc" class="u-input u-input-rectangle u-white">
              </div>
              <div class="u-form-group u-form-partition-factor-3 u-form-select u-form-group-30">
                <label for="select-b6df" class="u-label">Situación de embarazo</label>
                <div class="u-form-select-wrapper">
                  <select id="select-b6df" name="embarazo" class="u-input u-input-rectangle u-white">
                    <option value="1">Si</option>
                    <option value="0">No</option>
                  </select>
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
                </div>
              </div>
              <div class="u-form-group u-form-partition-factor-3 u-form-select u-form-group-31">
                <label for="select-e965" class="u-label">Problemas Cardiacos</label>
                <div class="u-form-select-wrapper">
                  <select id="select-e965" name="cardiaco" class="u-input u-input-rectangle u-white">
                    <option value="1">Si</option>
                    <option value="0">No</option>
                  </select>
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
                </div>
              </div>
              <div class="u-form-group u-form-partition-factor-3 u-form-select u-form-group-32">
                <label for="select-9b85" class="u-label">Hipoglicemia</label>
                <div class="u-form-select-wrapper">
                  <select id="select-9b85" name="hipoglisemia" class="u-input u-input-rectangle u-white">
                    <option value="1">Si</option>
                    <option value="0">No</option>
                  </select>
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
                </div>
              </div>
              <div class="u-form-group u-form-partition-factor-3 u-form-select u-form-group-33">
                <label for="select-b548" class="u-label">Alergias</label>
                <div class="u-form-select-wrapper">
                  <select id="select-b548" name="alergias" class="u-input u-input-rectangle u-white">
                    <option value="1">Si</option>
                    <option value="0">No</option>
                  </select>
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
                </div>
              </div>
              <div class="u-form-group u-form-partition-factor-3 u-form-select u-form-group-34">
                <label for="select-5452" class="u-label">Migrañas</label>
                <div class="u-form-select-wrapper">
                  <select id="select-5452" name="migrana" class="u-input u-input-rectangle u-white">
                    <option value="1">Si</option>
                    <option value="0">No</option>
                  </select>
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
                </div>
              </div>
              <div class="u-form-group u-form-partition-factor-3 u-form-select u-form-group-35">
                <label for="select-204d" class="u-label">Asma</label>
                <div class="u-form-select-wrapper">
                  <select id="select-204d" name="asma" class="u-input u-input-rectangle u-white">
                    <option value="1">Si</option>
                    <option value="0">No</option>
                  </select>
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
                </div>
              </div>
              <div class="u-form-group u-form-partition-factor-3 u-form-select u-form-group-36">
                <label for="select-a654" class="u-label">Lesiones Oseas</label>
                <div class="u-form-select-wrapper">
                  <select id="select-a654" name="les_osea" class="u-input u-input-rectangle u-white">
                    <option value="1">Si</option>
                    <option value="0">No</option>
                  </select>
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
                </div>
              </div>
              <div class="u-form-group u-form-partition-factor-3 u-form-select u-form-group-37">
                <label for="select-232f" class="u-label">Lesiones Musculares</label>
                <div class="u-form-select-wrapper">
                  <select id="select-232f" name="les_musc" class="u-input u-input-rectangle u-white">
                    <option value="1">Si</option>
                    <option value="0">No</option>
                  </select>
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
                </div>
              </div>
              <div class="u-form-group u-form-partition-factor-3 u-form-select u-form-group-38">
                <label for="select-a3c8" class="u-label">Tensión Arterial</label>
                <div class="u-form-select-wrapper">
                  <select id="select-a3c8" name="tens_arterial" class="u-input u-input-rectangle u-white">
                    <option value="1">Normal</option>
                    <option value="0">Anormal</option>
                  </select>
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
                </div>
              </div>
              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-39">
                <label for="select-2b7f" class="u-label">Trigliseridos</label>
                <div class="u-form-select-wrapper">
                  <select id="select-2b7f" name="trigliceridos" class="u-input u-input-rectangle u-white">
                    <option value="1">Normal</option>
                    <option value="0">Anormal</option>
                  </select>
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
                </div>
              </div>
              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-40">
                <label for="select-c53c" class="u-label">Colesterol</label>
                <div class="u-form-select-wrapper">
                  <select id="select-c53c" name="colesterol" class="u-input u-input-rectangle u-white">
                    <option value="1">Normal</option>
                    <option value="0">Anormal</option>
                  </select>
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
                </div>
              </div>
              <div class="u-form-group u-form-message u-form-group-41">
                <label for="message-d70e" class="u-label">Observaciones</label>
                <textarea placeholder="Observaciones preparador físico" rows="4" cols="50" id="message-d70e" name="observaciones" class="u-input u-input-rectangle u-white" required=""></textarea>

              </div>
              <div class="u-align-left u-form-group  u-form-group-42">
                <input type="submit" name="register" class="registrar u-btn u-btn-submit u-button-style u-hover-grey-25 u-white u-btn-1" onclick="location.href='ent_index.php';"/>
              </div>
            </form>

          </div>
        </div>
      </div>
    </section>
    <div type="hidden" class="registerficha">
      <?php
      error_reporting(0);
      include("db_connection/reg_ficha.php");
      ?>
    </div>


    <footer class="u-clearfix u-footer u-grey-80" id="sec-d26a"><div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-align-left u-social-icons u-spacing-10 u-social-icons-1">
          <a class="u-social-url" title="facebook" target="_blank" href=""><span class="u-icon u-social-facebook u-social-icon u-icon-1"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-f24d"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-f24d"><circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle><path fill="#FFFFFF" d="M73.5,31.6h-9.1c-1.4,0-3.6,0.8-3.6,3.9v8.5h12.6L72,58.3H60.8v40.8H43.9V58.3h-8V43.9h8v-9.2
            c0-6.7,3.1-17,17-17h12.5v13.9H73.5z"></path></svg></span>
          </a>
          <a class="u-social-url" title="instagram" target="_blank" href=""><span class="u-icon u-social-icon u-social-instagram u-icon-2"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-2d0e"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-2d0e"><circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle><path fill="#FFFFFF" d="M55.9,38.2c-9.9,0-17.9,8-17.9,17.9C38,66,46,74,55.9,74c9.9,0,17.9-8,17.9-17.9C73.8,46.2,65.8,38.2,55.9,38.2
            z M55.9,66.4c-5.7,0-10.3-4.6-10.3-10.3c-0.1-5.7,4.6-10.3,10.3-10.3c5.7,0,10.3,4.6,10.3,10.3C66.2,61.8,61.6,66.4,55.9,66.4z"></path><path fill="#FFFFFF" d="M74.3,33.5c-2.3,0-4.2,1.9-4.2,4.2s1.9,4.2,4.2,4.2s4.2-1.9,4.2-4.2S76.6,33.5,74.3,33.5z"></path><path fill="#FFFFFF" d="M73.1,21.3H38.6c-9.7,0-17.5,7.9-17.5,17.5v34.5c0,9.7,7.9,17.6,17.5,17.6h34.5c9.7,0,17.5-7.9,17.5-17.5V38.8
            C90.6,29.1,82.7,21.3,73.1,21.3z M83,73.3c0,5.5-4.5,9.9-9.9,9.9H38.6c-5.5,0-9.9-4.5-9.9-9.9V38.8c0-5.5,4.5-9.9,9.9-9.9h34.5
            c5.5,0,9.9,4.5,9.9,9.9V73.3z"></path></svg></span>
          </a>
        </div>
      </div></footer>

</body></html>
