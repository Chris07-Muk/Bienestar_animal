<!-- Importar las dependencias -->
<?= $this->extend("plantillas/panel_base") ?>


<!-- Sección de contenido -->
<?= $this->section('content') ?>


<h1>Gestión de Usuarios Aceptados</h1>

<!-- Comprobar si hay usuarios activos -->
<?php if (!empty($usuarios_activos) && count($usuarios_activos) > 0): ?>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre Completo</th>
                <th>Correo Electrónico</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios_activos as $usuario): ?>
                <tr>
                    <td><?= $usuario->id_usuario ?></td>
                    <td><?= $usuario->nombre_usuario . ' ' . $usuario->ap_usuario . ' ' . $usuario->am_usuario ?></td>
                    <td><?= $usuario->email_usuario ?></td>
                    <td>
                        <?php if (!empty($usuario->imagen_usuario)): ?>
                            <img src="<?= base_url('uploads/' . $usuario->imagen_usuario) ?>" alt="Imagen" width="50">
                        <?php else: ?>
                            <img src="<?= base_url('uploads/no-image.png') ?>" alt="Imagen" width="50">
                        <?php endif; ?>
                    </td>
                    <td>
                        <!-- Aquí puedes agregar enlaces o botones para editar/eliminar usuarios -->
                        <a href="<?= route_to('usuario_editar', $usuario->id_usuario) ?>" class="btn btn-warning">Editar</a>
                        <a href="<?= route_to('usuario_eliminar', $usuario->id_usuario) ?>" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php else: ?>
    <p>No hay usuarios aceptados en el sistema.</p>
<?php endif; ?>

<?= $this->endSection() ?>
