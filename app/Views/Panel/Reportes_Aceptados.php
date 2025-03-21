<!-- Importar las dependencias -->
<?= $this->extend("plantillas/panel_base") ?>


<!-- Sección de contenido -->
<?= $this->section('content') ?>


<h1>Gestión de reportes Aceptados</h1>

<!-- Comprobar si hay usuarios activos -->
<?php if (!empty($getReportesActivos) && count($getReportesActivos) > 0): ?>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Descripcion</th>
                <th>ubicacion</th>
                <th>Imagen</th>
              	<th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($getReportesActivos as $reporte): ?>
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
                        <!-- Aquí puedes agregar enlaces o botones para editar/eliminar usuarios -->
                        <a href="<?= route_to('reporte_Visualizar', $reporte->id_reporte) ?>" class="btn btn-secondary">Detalles</a>

                        <a href="<?= route_to('eliminar_reporte', $reporte->id_reporte) ?>" class="btn btn-danger"
                        onclick="return confirm('¿Estás seguro de que deseas eliminar este reporte? Esta acción no se puede deshacer.');">
                        Eliminar
                        </a>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php else: ?>
    <p>No hay usuarios aceptados en el sistema.</p>
<?php endif; ?>

<?= $this->endSection() ?>
