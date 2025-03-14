<!-- Importartar las depedencias -->

<?= $this->extend("Plantillas/portal_base") ?>

<!-- Titulo -->
<?= $this->section('titulo') ?>
    <?= $titulo_pagina ?> - Nuestros servicios
<?= $this->endSection() ?>

<!-- Banner -->
<?= $this->section('banner') ?>
   inner_page
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<div class="back_re">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="title">
                  <h2>Sobre Nosotros</h2>
               </div>
            </div>
         </div>
      </div>
   </div>
      <!-- our classes -->
      <div class="about">
        <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <div class="titlepage">
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
                     <figure><img src="<?=base_url(RECURSOS_PORTAL_IMAGES.'reporte.jpeg') ?>" alt="#"/></figure>
                     <h3>Reporte de Avistamientos</h3>
                     <span>Permite a la comunidad reportar
                        avistamientos de mascotas extraviadas.</span>
                  </div>
               </div>
               <div class="col-md-4 col-sm-6 d_none">
               </div>
               <div class="col-md-4 col-sm-6">
                  <div class="our_yoga">
                     <figure><img src="<?=base_url(RECURSOS_PORTAL_IMAGES.'soporte.jpeg') ?>" alt="#"/></figure>
                     <h3>Soporte de adopcion</h3>
                     <span>Encuentra hogares para
                        mascotas sin dueño.</span>
                  </div>
               </div>
               <div class="col-md-4 col-sm-6 d_none">
               </div>
               <div class="col-md-4 col-sm-6">
                  <div class="our_yoga">
                     <figure><img src="<?=base_url(RECURSOS_PORTAL_IMAGES.'perfil.jpeg') ?>" alt="#"/></figure>
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
<?= $this->endSection() ?>