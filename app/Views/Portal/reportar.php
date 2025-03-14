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


<?= $this->section('Street-maps') ?>

    <!-- CSS de Leaflet -->
   <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha384-x7zDpFAowm7hP8LuSfbsmN05lURC7U6+1poUy0FrBPCPh5DUsXjix34Yl0axVe3L5" crossorigin=""/>

   <!-- JS de Leaflet -->
   <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha384-Q2v6ptJ6lfujG4k5Rt5szayA1N5sPC9cPR9yxV7hlBl20AmeX3okdvI1h7cszUjJ" crossorigin=""></script>

   <!-- mapa  -->
   <script src="<?= base_url(RECURSOS_PORTAL_JS.'mapa.js') ?>" defer></script>


   <script>
      document.addEventListener("DOMContentLoaded", function() {
         var map = L.map('mapa').setView([19.432608, -99.133209], 13); // Coordenadas de CDMX

         L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
         }).addTo(map);

         L.marker([19.432608, -99.133209]).addTo(map)
            .bindPopup('Ciudad de México')
            .openPopup();
      });
   </script>
   
<?= $this->endSection() ?>


<?= $this->section('content2') ?>
<div class="back_re">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="title">
                  <h2>Reportar Mascota</h2>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Formulario para reportar mascota -->
   <div class="container">
      <form id="reportForm" method="post" action="../../backend/PHP/Insertar_reporte.php" enctype="multipart/form-data">
         <div class="form-group">
            <br>
            <label for="foto">Foto de la mascota:</label>
            <input type="file" class="form-control" id="foto" name="imagen" accept="image/*">
         </div>
         <div class="form-group">
            <label for="descripcion">Descripción de la mascota:</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
         </div>
         <div class="form-group">
            <label for="mapa">Ubicación de la mascota:</label>
            <br>
            <input type="text" class="form-control" id="latitude" name="ubi_lat" placeholder="Latitud" readonly>
            <br>
            <input type="text" class="form-control" id="longitude" name="ubi_long" placeholder="Longitud" readonly>
         </div>
         <button type="submit" class="btn btn-primary">Enviar Reporte</button>
         <button type="reset" class="btn btn-secondary">Limpiar</button>
         <br>
      </form>
   </div>

   <!-- Barra de búsqueda -->
   <div class="container mb-4">
      <div class="form-inline">
         <br>
         <br>
         <input type="text" id="direccion" class="form-control" placeholder="Buscar dirección..." style="width: 80%;">
         <button id="buscarBtn" class="btn btn-primary ml-2">Buscar</button>
      </div>

   </div>


   <!-- Mapa interactivo -->
   <div class="map-container">
      <div id="mapa" style="height: 400px; width: 100%;"></div>
   </div>
   
<?= $this->endSection() ?>