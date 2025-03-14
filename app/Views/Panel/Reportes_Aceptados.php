<!-- Importar las dependencias -->
<?= $this->extend("plantillas/panel_base") ?>


<!-- Sección de contenido -->
<?= $this->section('content') ?>


<h1>Gestión de Usuarios Aceptados</h1>

<!-- Comprobar si hay usuarios activos -->
<?php if (!empty($getReportesActivos) && count($getReportesActivos) > 0): ?>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Descripcion</th>
                <th>ubicacion</th>
                <th>Imagen</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($getReportesActivos as $reporte): ?>
                <tr>
                    <td><?= $reporte->id_reporte ?></td>
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
                        <a href="<?= route_to('usuario_editar', $reporte->id_reporte) ?>" class="btn btn-warning">Editar</a>
                        <a href="<?= route_to('usuario_eliminar', $reporte->id_reporte) ?>" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php else: ?>
    <p>No hay usuarios aceptados en el sistema.</p>
<?php endif; ?>

<?= $this->endSection() ?>
