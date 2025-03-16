<!-- Importar las dependencias -->
<?= $this->extend("plantillas/panel_base") ?>


<!-- Sección de contenido -->
<?= $this->section('content') ?>


<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Detalles del Reporte</h3>
        </div>
        <div class="card-body">
            <form>

                <div class="mb-3">
                    <label class="form-label">Titulo:</label>
                    <textarea class="form-control" readonly><?= esc($reporte->titulo_reporte) ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Descripción:</label>
                    <textarea class="form-control" readonly><?= esc($reporte->descripcion) ?></textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Ubicación (Latitud):</label>
                        <input type="text" class="form-control" value="<?= esc($reporte->ubi_lat) ?>" readonly>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Ubicación (Longitud):</label>
                        <input type="text" class="form-control" value="<?= esc($reporte->ubi_long) ?>" readonly>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Estado:</label>
                    <input type="text" class="form-control" 
                           value="<?= $reporte->estatus_apr == 1 ? 'Aceptado' : 'Pendiente' ?>" 
                           readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Imagen:</label>
                    <?php if (!empty($reporte->imagen)): ?>
                        <div class="mt-2">
                            <img src="<?= base_url('uploads/' . $reporte->imagen) ?>" class="img-thumbnail" width="150">
                        </div>
                    <?php else: ?>
                        <p class="text-muted">No hay imagen disponible.</p>
                    <?php endif; ?>
                </div>

                <div class="text-end">
                    <a href="<?= site_url('/Reportes_Aceptados') ?>" class="btn btn-secondary">Volver</a>
                </div>

            </form>
        </div>
    </div>
</div>




<?= $this->endSection() ?>