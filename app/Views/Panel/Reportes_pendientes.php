<!-- Importar las dependencias -->
<?= $this->extend("plantillas/panel_base") ?>


<!-- Sección de contenido -->
<?= $this->section('content') ?>


<h1>Gestión de Reportes Pendientes</h1>

<!-- Comprobar si hay usuarios activos -->
<?php if (!empty($ReportesInactivos) && count($ReportesInactivos) > 0): ?>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Descripcion</th>
                <th>ubicacion</th>
                <th>Imagen</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ReportesInactivos as $reporte): ?>
                <tr>
                    <td><?= $reporte->titulo_reporte ?></td>
                    <td><?= $reporte->descripcion ?></td>
                    <td><?= $reporte->ubi_lat . ' ' . $reporte->ubi_long ?></td>
                    <td>
                        <?php if (!empty($reporte->imagen_usuario)): ?>
                            <img src="<?= base_url('uploads/' . $reporte->imagen_usuario) ?>" alt="Imagen" width="50">
                        <?php else: ?>
                            <img src="<?= base_url('uploads/no-image.png') ?>" alt="Imagen" width="50">
                        <?php endif; ?>
                    </td>
                    <td>
                        <!-- Botones -->
                        <a href="<?= route_to('activar_reporte_pendiente', $reporte->id_reporte) ?>" class="btn btn-success"
                        onclick="return confirm('¿Estás seguro de que deseas activar este reporte?');">
                        Activar
                        </a>
                        
                        <a href="<?= route_to('eliminar_reporte_pendiente', $reporte->id_reporte) ?>" class="btn btn-danger"
                        onclick="return confirm('¿Estás seguro de que deseas eliminar este reporte? Esta acción no se puede deshacer.');">
                        Eliminar
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


    <form action="<?= base_url('Reporte_agregar') ?>" method="post">
            <label>Título:</label>
            <input type="text" name="titulo_reporte" required>

            <label>Descripción:</label>
            <textarea name="descripcion" required></textarea>

            <label>Ubicación (Latitud):</label>
            <input type="text" name="ubi_lat" required>

            <label>Ubicación (Longitud):</label>
            <input type="text" name="ubi_long" required>

            <button type="submit">Guardar Reporte</button>
        </form>


<?php else: ?>
    <p>No hay usuarios aceptados en el sistema.</p>
<?php endif; ?>

<?= $this->endSection() ?>
