<!-- Importartar las depedencias -->

<?= $this->extend("plantillas/portal_base") ?>

<!-- Titulo -->
<?= $this->section('titulo') ?>
    <?= $titulo_pagina ?> - Nosotros
<?= $this->endSection() ?>

<!-- Banner -->
<?= $this->section('banner') ?>
   inner_page
<?= $this->endSection() ?>



<!-- Seccion del contenido banner -->
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
   <!-- about -->
   <div class="about">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-6 offset-md-3">
               <div class="titlepage1">

                  <span>

                     <p>
                        La Coordinación de Bienestar Animal tiene por objeto el estudio, planeación y aplicación de la
                        política de Protección y Bienestar Animal en el Estado de Tlaxcala, de animales que no sean
                        competencia de la Federación.
                        <br><br>
                        Desde su creación la CBA coadyuva con 55 municipios del estado que han designado a un enlace y
                        acudido a reuniones de trabajo para la emisión u homologación de su respectiva reglamentación
                        municipal, así como para la generación de campañas de concientización al respecto de la tenencia
                        responsable de animales y sobre el respeto a su vida e integridad.
                        <br><br>
                        El 11 de mayo de 2022 la Coordinación de Bienestar Animal recepcionó la primera denuncia por
                        maltrato animal, al corte del 13 de septiembre de 2022, la CBA ha remitido 106 denuncias a las
                        autoridades correspondientes.
                        <br><br>
                        El maltrato animal en el estado de Tlaxcala fue un tema pendiente a tratar por administraciones
                        anteriores. La Coordinación de Bienestar Animal da cumplimiento a las líneas de acción del Plan
                        Estatal de Desarrollo, que por primera vez atiende esta problemática social.
                        <br><br>
                        Lo anterior en cuanto a la vía administrativa, en el ámbito penal, se encuentra una iniciativa
                        para tipificar al maltrato animal como delito, misma que se espera que sea aprobada en el
                        presente periodo legislativo del Congreso del Estado de Tlaxcala.
                     </p>
                  </span>
               </div>
            </div>
            <div class="col-md-12">
               <div class="about_img">
                  <figure><img src="<?=base_url(RECURSOS_PORTAL_IMAGES.'perro nosotros.jpg') ?>" alt="#" /></figure>
                  <!--<a class="read_more yoga_btn" href="Javascript:void(0)"> Read More</a>-->
               </div>
            </div>
         </div>
      </div>
   </div>
<?= $this->endSection() ?>