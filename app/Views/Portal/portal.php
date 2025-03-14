<!-- Importartar las depedencias -->

<?= $this->extend("Plantillas/portal_base") ?>

<!-- Titulo -->
<?= $this->section('titulo') ?>
    <?= $titulo_pagina ?>
<?= $this->endSection() ?>


<!-- Seccion del contenido banner -->
<?= $this->section('content') ?>
    <section class="banner_main">
                <div id="myCarousel" class="carousel slide banner" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container">
                            <div class="carousel-caption  banner_po">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="yo_img">
                                        <figure><img src="<?=base_url(RECURSOS_PORTAL_IMAGES.'CarruselBienestar.png') ?>" alt="#"/></figure>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="yoga_box">
                                        <h1> <strong>B</strong> I <strong>E</strong> N <strong>E</strong> S <strong>T</strong>
                                            A <strong>R</strong> <strong>A</strong> N <strong>I</strong> M <strong>A</strong> L
                                        </h1>
                                        <a class="read_more yoga_btn" href="contact.html" role="button">Contactanos</a>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container">
                            <div class="carousel-caption banner_po">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="yo_img">
                                        <figure><img src="<?=base_url(RECURSOS_PORTAL_IMAGES.'CarruselBienestar.png') ?>" alt="#"/></figure>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="yoga_box">
                                        <h1> <strong>B</strong> I <strong>E</strong> N <strong>E</strong> S <strong>T</strong>
                                            A <strong>R</strong> <strong>A</strong> N <strong>I</strong> M <strong>A</strong> L
                                        </h1>
                                        <a class="read_more yoga_btn" href="contact.html" role="button">Contact us</a>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container">
                            <div class="carousel-caption banner_po">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="yo_img">
                                        <figure><img src="<?=base_url(RECURSOS_PORTAL_IMAGES.'CarruselBienestar.png') ?>" alt="#"/></figure>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="yoga_box">
                                        <h1> <strong>B</strong> I <strong>E</strong> N <strong>E</strong> S <strong>T</strong>
                                            A <strong>R</strong> <strong>A</strong> N <strong>I</strong> M <strong>A</strong> L
                                        </h1>
                                        <a class="read_more yoga_btn " href="contact.html" role="button">Contact us</a>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <i class="fa fa-arrow-right" aria-hidden="true"></i>
                <span class="sr-only">Next</span>
                </a>
                </div>
            </section>
<?= $this->endSection() ?>

<!-- Seccion del contenido central -->
<?= $this->section('content2') ?>
    <div class="classes">
      <div class="container">
         <div class="row">
            <div class="col-sm-12">
               <div class="titlepage">
                  <h2>Nuestros Servicios</h2>
                  <span>En bienestar animal Tlaxcala brindamos los siguientes servicios
                  </span>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-4 col-sm-6 d_none">
            </div>
            <div class="col-md-4 col-sm-6 margin_bott">
               <div class="our_yoga">
                  <figure><img src="<?=base_url(RECURSOS_PORTAL_IMAGES.'reporte.jpeg') ?>" alt="#" /></figure>
                  <h3>Reporte de Avistamientos</h3>
                  <span>Permite a la comunidad reportar
                     avistamientos de mascotas extraviadas.</span>
               </div>
            </div>
            <div class="col-md-4 col-sm-6 d_none">
            </div>
            <div class="col-md-4 col-sm-6">
               <div class="our_yoga">
                  <figure><img src="<?=base_url(RECURSOS_PORTAL_IMAGES.'soporte.jpeg') ?>" alt="#" /></figure>
                  <h3>Soporte de adopcion</h3>
                  <span>Encuentra hogares para
                     mascotas sin dueño.</span>
               </div>
            </div>
            <div class="col-md-4 col-sm-6 d_none">
            </div>
            <div class="col-md-4 col-sm-6">
               <div class="our_yoga">
                  <figure><img src="<?=base_url(RECURSOS_PORTAL_IMAGES.'perfil.jpeg') ?>" alt="#" /></figure>
                  <h3>Perfiles de mascotas</h3>
                  <span>Crea perfiles con fotos
                     y características para facilitar el reconocimiento.</span>
               </div>
            </div>

            <div class="col-md-4 offset-md-4 col-sm-6  margin_top">

            </div>
         </div>
      </div>
   </div>
   </div>
   <!-- end our classes -->
   <!-- middle -->
   <div class="middle">
      <div class="container-fluid">
         <div class="row d_flex">
            <div class="col-md-6">

               <div class="titlepage">
                  <h2>Conoce sobre nosotros</h2>
                  <p>La Coordinación de Bienestar Animal tiene por objeto el estudio, planeación y aplicación de la
                     política de Protección y Bienestar Animal en el Estado de Tlaxcala, de animales que no sean
                     competencia de la Federación.

                     Desde su creación la CBA coadyuva con 55 municipios del estado que han designado a un enlace y
                     acudido a reuniones de trabajo para la emisión u homologación de su respectiva reglamentación
                     municipal, así como para la generación de campañas de concientización al respecto de la tenencia
                     responsable de animales y sobre el respeto a su vida e integridad.</p>
                  <a class="read_more ye_b5n " href="about.html"> Leer mas</a>
               </div>

            </div>
            <div class="col-md-5 offset-md-1 padding_right0">
               <div class="yoga_img">
                  <figure><img src="<?=base_url(RECURSOS_PORTAL_IMAGES.'perro.jpg') ?>" alt="#" /></figure>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- end middle -->
   <!-- pepole -->
   <div class="pepole">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="titlepage">
                  <h2>Testimonios</h2>
                  <span>Personas agradecidas con nuestros servicios </span>
               </div>
            </div>
         </div>

         <div class="row">
            <div class="col-md-8 offset-md-2">
               <div class="testimo_ban_bg">
                  <div id="testimo" class="carousel slide testimo_ban" data-ride="carousel">
                     <ol class="carousel-indicators">
                        <li data-target="#testimo" data-slide-to="0" class="active"></li>
                        <li data-target="#testimo" data-slide-to="1"></li>
                        <li data-target="#testimo" data-slide-to="2"></li>
                     </ol>

                     <div class="carousel-inner">
                        <div class="carousel-item active">
                           <div class="container parile0">
                              <div class="carousel-caption relative2">
                                 <div class="row d_flex">
                                    <div class="col-md-12">
                                       <i><img class="qusright" src="<?=base_url(RECURSOS_PORTAL_IMAGES.'t.png') ?>" alt="#" /><img
                                             src="<?=base_url(RECURSOS_PORTAL_IMAGES.'user profile.png') ?>" alt="#" /><img class="qusleft"
                                             src="<?=base_url(RECURSOS_PORTAL_IMAGES.'t.png') ?>" alt="#" /></i>
                                       <div class="aliq">
                                          <span>Olivia Sanchez Ramos</span>
                                          <p> <img class="inline-image" src="<?=base_url(RECURSOS_PORTAL_IMAGES.'testimonio1.jpg') ?>" />
                                             "Perdí a mi gatita Kira y no sabía qué hacer, estaba muy preocupado.
                                             Gracias a la aplicación de Bienestar Animal Tlaxcala, pude reportarla y en
                                             pocos días recibí un aviso de alguien que la encontró. Estoy muy agradecido
                                             con esta herramienta porque me permitió reunirnos nuevamente. ¡Kira está de
                                             vuelta en casa!"
                                          </p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="carousel-item">
                           <div class="container parile0">
                              <div class="carousel-caption relative2">
                                 <div class="row d_flex">
                                    <div class="col-md-12">
                                       <i><img class="qusright" src="<?=base_url(RECURSOS_PORTAL_IMAGES.'t.png') ?>" alt="#" /><img
                                             src="<?=base_url(RECURSOS_PORTAL_IMAGES.'user profile.png') ?>" alt="#" /><img class="qusleft"
                                             src="<?=base_url(RECURSOS_PORTAL_IMAGES.'t.png') ?>" alt="#" /></i>
                                       <div class="aliq">
                                          <span>Daniel Rodriguez</span>
                                          <p>
                                             <img class="inline-image" src="<?=base_url(RECURSOS_PORTAL_IMAGES.'testimonio2.jpg') ?>" />
                                             Cuando Max, mi husky, se perdió, pensé que no lo volvería a ver. Decidí
                                             usar la aplicación de Bienestar Animal Tlaxcala y, para mi sorpresa,
                                             alguien lo había reportado cerca de su colonia. Gracias a esta plataforma,
                                             pude reunirme con Max rápidamente. Estoy muy agradecido por esta increíble
                                             herramienta que realmente hace la diferencia.
                                          </p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="carousel-item">
                           <div class="container parile0">
                              <div class="carousel-caption relative2">
                                 <div class="row d_flex">
                                    <div class="col-md-12">
                                       <i><img class="qusright" src="<?=base_url(RECURSOS_PORTAL_IMAGES.'t.png') ?>" alt="#" /><img
                                             src="<?=base_url(RECURSOS_PORTAL_IMAGES.'user profile.png') ?>" alt="#" /><img class="qusleft"
                                             src="<?=base_url(RECURSOS_PORTAL_IMAGES.'t.png') ?>" alt="#" /></i>
                                       <div class="aliq">
                                          <span>Karla Montiel</span>
                                          <p>
                                             <img class="inline-image" src="<?=base_url(RECURSOS_PORTAL_IMAGES.'testimonio3.jpg') ?>" />
                                             "Perdimos a Rocky, nuestro pug, y toda la familia estaba desesperada.
                                             Subimos su reporte en la app de Bienestar Animal Tlaxcala, y en menos de
                                             una semana recibimos noticias de alguien que lo había encontrado. ¡Fue un
                                             alivio enorme! Esta aplicación nos ayudó a traerlo de vuelta a casa, y no
                                             podríamos estar más agradecidos."
                                          </p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <a class="carousel-control-prev" href="#testimo" role="button" data-slide="prev">
                           <i class="fa fa-arrow-left" aria-hidden="true"></i>
                           <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#testimo" role="button" data-slide="next">
                           <i class="fa fa-arrow-right" aria-hidden="true"></i>
                           <span class="sr-only">Next</span>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
<?= $this->endSection() ?>