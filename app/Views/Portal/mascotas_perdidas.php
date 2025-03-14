<!-- Importartar las depedencias -->

<?= $this->extend("Plantillas/portal_base") ?>

<!-- Titulo -->
<?= $this->section('titulo') ?>
    <?= $titulo_pagina ?> - Reportar
<?= $this->endSection() ?>

<!-- Banner -->
<?= $this->section('banner') ?>
   inner_page
<?= $this->endSection() ?>


<?= $this->section('content2') ?>
    <div class="back_re">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="title">
                  <h2>Mascotas Perdidas</h2>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div>
    <h1>
        seccion 
    </h1>
   </div>
<?= $this->endSection() ?>