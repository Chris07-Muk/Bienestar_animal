<!-- Importar las dependencias -->
<?= $this->extend("plantillas/panel_base") ?>




<?= $this->section('content') ?>


<h1 class="text-center my-4">Lista de Refugios</h1>

<div class="container">
    <div class="row">
        <?php if (!empty($refugios) && count($refugios) > 0): ?>
            <?php foreach ($refugios as $refugio): ?>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($refugio->nombre_refugio) ?></h5> 
                            <p class="card-text"><strong>Dirección:</strong> <?= esc($refugio->direccion) ?></p> 
                            <p class="card-text"><strong>Capacidad:</strong> <?= esc($refugio->capacidad) ?> mascotas</p>
                            <form action="<?= route_to('eliminar_refugio', $refugio->id_refugio) ?>" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este refugio?');">
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No se encontraron refugios.</p>
        <?php endif; ?>
    </div>
</div>

<a href="<?= route_to('agregar_refugio') ?>" class="btn btn-success">Agregar Refugio</a>


<?= $this->endSection() ?>