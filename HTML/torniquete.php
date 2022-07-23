<!DOCTYPE html>
<html style="font-size: 16px;"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Doing The Right Thing,&nbsp;At The Right Time">
    <meta name="description" content="">
    <title>Page 3</title>
    <link rel="stylesheet" href="CSS_TORNIQUETE/nicepage.css" media="screen">
<link rel="stylesheet" href="Page-3.css" media="screen">
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
  </head>
  <body data-home-page="Page-3.html" data-home-page-title="Page 3" class="u-body u-xl-mode"><header class="u-clearfix u-custom-color-1 u-header u-valign-middle u-header" id="sec-4f93"><a href="https://nicepage.com" class="u-image u-logo u-image-1">
        <img src="CSS_CONFIG/images/default-logo.png" class="u-logo-image u-logo-image-1">
      </a><a href="https://nicepage.com/templates" class="u-image u-logo u-image-2" data-image-width="127" data-image-height="90">
        <img src="CSS_CONFIG/images/logoBFree.png" class="u-logo-image u-logo-image-2">
      </a></header>
    <section class="u-align-center-lg u-align-center-md u-align-center-xl u-align-left-sm u-align-left-xs u-clearfix u-grey-10 u-section-1" id="carousel_d225">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h1 class="u-custom-font u-font-playfair-display u-text u-text-1">Torniquete</h1><br>
        <div class="u-table u-table-responsive u-table-1">
          <table class="u-table-entity">
            <colgroup>
              <col width="50%">
              <col width="50%">
            </colgroup>
            <thead class="u-grey-50 u-table-header u-table-header-1">
              <tr style="height: 44px;">
                <th class="u-border-1 u-border-grey-50 u-table-cell">CLIENTE</th>
                <th class="u-border-1 u-border-grey-50 u-table-cell">ESTADO</th>
              </tr>
            </thead>
            <tbody class="u-table-body">
              <?php include("db_connection\mtr_clt.php") ?>
                <?php while ($row = $consulta->fetch_assoc()) { ?>
              <tr style="height: 45px;">
                <td class="u-border-2 u-border-grey-40 u-table-cell u-table-cell-3">
                <h5><?php echo $row['nombres'] . " " . $row['apellidos']; ?></h5>
                </td>
                <td class="u-border-2 u-border-grey-40 u-table-cell">
                  <h5><?php $estado = $row['estado'];
                   if ($estado==1) {
                    echo "Activo";
                  }else {
                    echo "Inactivo";
                  } ?></h5>
                <?php } ?>
                </td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>
    </section>


    <footer class="u-clearfix u-footer u-grey-50" id="sec-d26a"><div class="u-clearfix u-sheet u-sheet-1">
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
