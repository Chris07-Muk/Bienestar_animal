
<!-- Importar las dependencias -->
<?= $this->extend("plantillas/panel_base") ?>

<?= $this->section('content') ?>

<div class="container mt-4">
        <h2 class="mb-4">Agregar Nueva Adopción</h2>
        <a href="<?= route_to('adopciones') ?>" class="btn btn-secondary mb-3">Volver a Adopciones</a>
        <div class="card">
            <div class="card-body">
                <form action="<?= route_to('guardar_adopcion') ?>" method="POST">
                    <div class="mb-3">
                        <label for="id_refugio" class="form-label">Refugio</label>
                        <select name="id_refugio" class="form-select" required>
                            <?php foreach ($refugios as $refugio): ?>
                                <option value="<?= esc($refugio->id_refugio) ?>"><?= esc($refugio->nombre_refugio) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tipo" class="form-label">Tipo de Adopción</label>
                        <input type="text" name="tipo" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion_adopcion" class="form-label">Descripción</label>
                        <textarea name="descripcion_adopcion" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="img_adopcion" class="form-label">Imagen (URL)</label>
                        <input type="text" name="img_adopcion" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Adopción</button>
                </form>
            </div>
        </div>
    </div>


    <?= $this->endSection() ?>


