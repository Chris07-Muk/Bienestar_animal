<!-- Importar las dependencias -->
<?= $this->extend("plantillas/panel_base") ?>




<?= $this->section('content') ?>


<h2>Agregar Refugio</h2>

<form action="<?= route_to('guardar_refugio') ?>" method="POST">
    <div class="form-group">
        <label for="nombre_refugio">Nombre del Refugio</label>
        <input type="text" class="form-control" id="nombre_refugio" name="nombre_refugio" required>
    </div>
    <div class="form-group">
        <label for="direccion">Dirección</label>
        <input type="text" class="form-control" id="direccion" name="direccion" required>
    </div>
    <div class="form-group">
        <label for="capacidad">Capacidad</label>
        <input type="number" class="form-control" id="capacidad" name="capacidad" required>
    </div>
    <button type="submit" class="btn btn-primary">Agregar Refugio</button>
</form>




<?= $this->endSection() ?>