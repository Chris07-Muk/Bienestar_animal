<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>
         <?= $this->renderSection('titulo')?>
      </title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=base_url(RECURSOS_PORTAL_CSS.'bootstrap.min.css') ?>">
    <!-- Style CSS -->
    <link rel="stylesheet" href="<?=base_url(RECURSOS_PORTAL_CSS.'style.css') ?>">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="<?=base_url(RECURSOS_PORTAL_CSS.'responsive.css') ?>">
    <!-- Favicon -->
    <link rel="icon" href="<?=base_url(RECURSOS_PORTAL_IMAGES.'fevicon.png') ?>" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="<?=base_url(RECURSOS_PORTAL_CSS.'jquery.mCustomScrollbar.min.css') ?>">
    <!-- Tweaks for older IEs -->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

    <script src="<?=base_url(RECURSOS_PORTAL_JS.'mapa.js') ?>"></script>

    <?= $this->renderSection('Street-maps')?>
    

   </head>
   <!-- body -->
   <body class="main-layout <?= $this->renderSection('banner')?>">
      <!-- loader  -->
      <div class="loader_bg">
      <div class="loader"><img src="<?=base_url(RECURSOS_PORTAL_IMAGES.'loading.gif') ?>" alt="Logo"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header class="full_bg">
         <!-- header inner -->
         <div class="header">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href=""><img src="<?=base_url(RECURSOS_PORTAL_IMAGES.'logo.png') ?>" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?= header_navbar([
                     ["href" => route_to('Portal'), "tarea" => "Inicio", "active" => true],
                     ["href" => route_to('Nosotros'), "tarea" => "Nosotros"],
                     ["href" => route_to('Servicios'), "tarea" => "Nuestros servicios"],
                     ["href" => route_to('Reportar'), "tarea" => "Reportar mascota"],
                     ["href" => route_to('Mascotas_Perdidas'), "tarea" => "Mascotas perdidas"],
                     ["href" => route_to('Contactanos'), "tarea" => "Contáctanos"]
                  ]); ?>
                  </div>
               </div>
            </div>
         </div>
         <!-- end header inner -->
         <!-- end header -->
         <!-- banner -->
          <!-- Buscar el contenido -->
         <?= $this->renderSection('content')?>
      </header>
      <!-- end banner -->
      <!-- our classes -->
       <div>
       <?= $this->renderSection('content2')?>
       </div>
      
      <!-- end pepole -->
      <!--  contact -->
      <div class="contact">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Contactanos</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6 padding_right0">
                  <form id="request" class="main_form">
                     <div class="row">
                        <div class="col-md-12 ">
                           <input class="contactus" placeholder="Nombre" type="type" name="Name"> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Correo" type="type" name="Email"> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Número de teléfono" type="type" name="Phone Number">                          
                        </div>
                        <div class="col-md-12">
                           <textarea class="textarea" placeholder="Mensaje" type="type" Message="Name">Mensaje</textarea>
                        </div>
                        <div class="col-md-12">
                           <button class="send_btn">Enviar</button>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="col-md-6 padding_left0">
                  <div class="map_main">
                     <div class="map-responsive">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15060.853840276812!2d-98.24661485243686!3d19.316541461008107!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85cfd96a7e30900b%3A0x72cb50aa9d5d00c8!2sTlaxcala%20de%20Xicoht%C3%A9ncatl%2C%20Tlax.!5e0!3m2!1ses-419!2smx!4v1731014203592!5m2!1ses-419!2smx" 
                        width="600" height="463" frameborder="0" style="border:0; width: 100%;" 
                        allowfullscreen=""></iframe>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end contact -->
      <!--  footer -->
      <footer>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class="col-md-8 offset-md-2">
                     <!-- <div class="newslatter">
                        <h4>Subscribe Our Newsletter</h4>
                        <form class="bottom_form">
                           <input class="enter" placeholder="Enter your email" type="text" name="Enter your email">
                           <button class="sub_btn">subscribe</button>
                        </form>
                     </div> -->
                  </div>
                  <div class="col-sm-12">
                     <div class=" border_top1"></div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-4">
                     <h3>Atajos</h3>
                     <ul class="link_menu">
                        <li><a href="#">Inicio</a></li>
                        <li><a href="about.html"> Sobre Nosotros</a></li>
                        <li><a href="classes.html">Nuestros Servicios</a></li>
                        <li><a href="yoga.html">Reportar Mascota</a></li>
                        <li><a href="pricing.html">Mascotas en adopción</a></li>
                        <li><a href="contact.html">Contactanos</a></li>
                     </ul>
                  </div>
                  <div class=" col-md-3">
                     <h3>Bienestar Animal</h3>
                     <p class="many">
                     Coordinación de Bienestar Animal del Gobierno del Estado de Tlaxcala
                     </p>
                  </div>
                  <div class="col-lg-3 offset-mdlg-2     col-md-4 offset-md-1">
                     <h3>Contacto </h3>
                     <ul class="conta">
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i> Calle 33, #203 A, Tlaxcala, Mexico</li>
                        <li> <i class="fa fa-envelope" aria-hidden="true"></i><a href="#">bienestaranimaltlaxcala@gmail.com</a></li>
                        <li><i class="fa fa-mobile" aria-hidden="true"></i> Llama : +52 246 462 8153</li>
                     </ul>
                     <ul class="social_icon">
                        <li><a href="https://www.facebook.com/@BAnimalTlx"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="https://www.instagram.com/banimaltlx"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <p> © 2020 BIENESTAR ANIMAL TLAXCALA</p></p>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->
    <!-- Javascript files -->
    <script src="<?=base_url(RECURSOS_PORTAL_JS.'jquery.min.js') ?>"></script>
    <script src="<?=base_url(RECURSOS_PORTAL_JS.'bootstrap.bundle.min.js') ?>"></script>
    <script src="<?=base_url(RECURSOS_PORTAL_JS.'jquery-3.0.0.min.js') ?>"></script>
    <!-- Sidebar -->
    <script src="<?=base_url(RECURSOS_PORTAL_JS.'jquery.mCustomScrollbar.concat.min.js') ?>"></script>
    <script src="<?=base_url(RECURSOS_PORTAL_JS.'custom.js') ?>"></script>
</body>
</html>