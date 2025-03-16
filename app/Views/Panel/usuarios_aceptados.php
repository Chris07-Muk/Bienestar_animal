<!-- Importar las dependencias -->
<?= $this->extend("plantillas/panel_base") ?>

<!-- Sección de contenido -->
<?= $this->section('content') ?>

<h1>Gestión de Usuarios Aceptados</h1>

<!-- Botón para abrir el modal de registro -->
<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#nuevo-usuario-modal">
    <i class="fa fa-user-plus"></i> Nuevo Usuario
</button>
<br><br>

<!-- Comprobar si hay usuarios activos -->
<?php if (!empty($usuarios_activos) && count($usuarios_activos) > 0): ?>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre Completo</th>
                <th>Correo Electrónico</th>
                <th>Sexo</th>
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
                    <td><?= $usuario->sexo_usuario ?></td>

                    <td>
                        <?php if (!empty($usuario->imagen_usuario)): ?>
                            <img src="<?= base_url('uploads/' . $usuario->imagen_usuario) ?>" alt="Imagen" width="50">
                        <?php else: ?>
                            <img src="<?= base_url('uploads/no-image.png') ?>" alt="Imagen" width="50">
                        <?php endif; ?>
                        <td>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editar-usuario-modal">Editar</button>
                        <!-- Botón de eliminación -->
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#confirmar-eliminacion-modal" data-id="<?= $usuario->id_usuario; ?>">
                            Eliminar
                        </button>
                        <button class="btn btn-info btn-sm" id="estatusBtn">Estatus</button>
                        </td>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php else: ?>
    <p>No hay usuarios aceptados en el sistema.</p>
<?php endif; ?>

<!-- Modal para registrar usuario -->
<div class="modal fade" id="nuevo-usuario-modal" tabindex="-1" aria-labelledby="nuevo-usuario-modal-title" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center modal-colored-header bg-primary text-white">
                <h4 class="modal-title" id="nuevo-usuario-modal-title">Nuevo Usuario</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <?= form_open(route_to('registrar_usuario'), ['id' => 'formulario-usuario-nuevo']); ?>

                <!-- Body con scroll -->
                <div class="modal-body">
                    <h5>Todos los campos marcados con ( <font color="red">*</font> ) son obligatorios</h5>

                    <!-- Nombre completo -->
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-control-label">Nombre: (<font color="red">*</font>)</label>
                            <div class="form-floating mb-3">
                                <?php
                                $parametros = array(
                                    'class' => 'form-control',
                                    'id' => 'nombre_usuario',
                                    'name' => 'nombre_usuario',
                                    'placeholder' => 'Nombre',
                                    'value' => ''
                                );
                                echo form_input($parametros);
                                ?>
                                <div class="invalid-feedback"></div>
                                <label><i class="fa fa-user text-dark me-2"></i>Nombre</label>
                            </div>
                        </div>

                        <!-- Apellido Paterno -->
                        <div class="col-md-4 mb-3">
                            <label class="form-control-label">Apellido Paterno: (<font color="red">*</font>)</label>
                            <div class="form-floating mb-3">
                                <?php
                                $parametros = array(
                                    'class' => 'form-control',
                                    'id' => 'ap_usuario',
                                    'name' => 'ap_usuario',
                                    'placeholder' => 'Apellido Paterno',
                                    'value' => ''
                                );
                                echo form_input($parametros);
                                ?>
                                <div class="invalid-feedback"></div>
                                <label><i class="fa fa-user text-dark me-2"></i>Apellido Paterno</label>
                            </div>
                        </div>

                        <!-- Apellido Materno -->
                        <div class="col-md-4 mb-3">
                            <label class="form-control-label">Apellido Materno: (<font color="red">*</font>)</label>
                            <div class="form-floating mb-3">
                                <?php
                                $parametros = array(
                                    'class' => 'form-control',
                                    'id' => 'am_usuario',
                                    'name' => 'am_usuario',
                                    'placeholder' => 'Apellido Materno',
                                    'value' => ''
                                );
                                echo form_input($parametros);
                                ?>
                                <div class="invalid-feedback"></div>
                                <label><i class="fa fa-user text-dark me-2"></i>Apellido Materno</label>
                            </div>
                        </div>
                    </div>

                    <!-- Correo electrónico -->
                    <div class="col-md-12 mb-3">
                        <label class="form-control-label">Correo Electrónico: (<font color="red">*</font>)</label>
                        <div class="form-floating mb-3">
                            <?php
                            $parametros = array(
                                'class' => 'form-control',
                                'id' => 'email_usuario',
                                'name' => 'email_usuario',
                                'placeholder' => 'Correo Electrónico',
                                'value' => ''
                            );
                            echo form_input($parametros);
                            ?>
                            <div class="invalid-feedback"></div>
                            <label><i class="fa fa-envelope text-dark me-2"></i>Correo Electrónico</label>
                        </div>
                    </div>

                    <div class="row">
                    <!-- Sexo -->
                    <div class="col-md-6 mb-3">
                        <label class="form-control-label">Sexo: (<font color="red">*</font>)</label>
                        <div class="form-floating mb-3">
                            <select class="form-control" id="sexo_usuario" name="sexo_usuario" required>
                                <option value="">Seleccione una opción</option>
                                <option value="<?= SEXO_MASCULINO ?>" <?= set_value('sexo_usuario') == SEXO_MASCULINO ? 'selected' : '' ?>>Masculino</option>
                                <option value="<?= SEXO_FEMENINO ?>" <?= set_value('sexo_usuario') == SEXO_FEMENINO ? 'selected' : '' ?>>Femenino</option>
                            </select>
                            <div class="invalid-feedback"></div>
                            <label><i class="fa fa-venus-mars text-dark me-2"></i>Sexo</label>
                        </div>
                    </div>
                    <!-- Contraseña -->
                    <div class="col-md-6 mb-3">
                        <label class="form-control-label">Contraseña: (<font color="red">*</font>) </label>
                        <div class="form-floating mb-3">
                            <?php
                            $parametros = array(
                                'class' => 'form-control',
                                'id' => 'password_usuario',
                                'name' => 'password_usuario',
                                'type' => 'password',  // Campo para la contraseña
                                'placeholder' => 'Contraseña',
                                'value' => ''
                            );
                            echo form_input($parametros);
                            ?>
                            <div class="invalid-feedback"></div>
                            <label><i class="fa fa-lock text-dark me-2"></i>Contraseña</label>
                        </div>
                    </div>
                    </div>
                    <!-- Imagen -->
                    <div class="col-md-12 mb-3">
                        <label class="form-control-label">Imagen de Perfil: (opcional)</label>
                        <div class="input-group">
                            <?php
                            $parametros = array(
                                'class' => 'form-control',
                                'id' => 'imagen_usuario',
                                'name' => 'imagen_usuario',
                                'type' => 'file',
                                'accept' => 'image/*'
                            );
                            echo form_input($parametros);
                            ?>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>

                </div>
                <!-- Fin Body -->

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="cancel-form-create-usuario">
                        <i class="fa fa-times"></i> Cancelar
                    </button>
                    <button class="btn btn-success" type="submit" id="btn-guardar-usuario">
                        <i class="fa fa-lg fa-save"></i> Registrar Usuario
                    </button>
                </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<!-- Modal editar-usuario -->
<div class="modal fade" id="editar-usuario-modal" tabindex="-1" aria-labelledby="editar-usuario-modal-title" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center modal-colored-header bg-primary text-white">
                <h4 class="modal-title" id="editar-usuario-modal-title">Editar Usuario</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <?= form_open('editar_usuario', ['id' => 'formulario-usuario-editar']); ?>
                <div class="modal-body">
                    <h5>Todos los campos marcados con ( <font color="red">*</font> ) son obligatorios</h5>

                    <div class="row">
                        <!-- ID Usuario (campo oculto) -->
                        <?php
                            $parametros = array('type' => 'hidden', 'id' => 'id_usuario_editar', 'name' => 'id_usuario_editar', 'value' => '');
                            echo form_input($parametros);
                        ?>

                        <!-- Nombre completo -->
                        <div class="col-md-4 mb-3">
                            <label class="form-control-label">Nombre: (<font color="red">*</font>)</label>
                            <div class="form-floating mb-3">
                                <?php
                                $parametros = array(
                                    'class' => 'form-control',
                                    'id' => 'nombre_usuario_editar',
                                    'name' => 'nombre_usuario_editar',
                                    'placeholder' => 'Nombre',
                                    'value' => ''
                                );
                                echo form_input($parametros);
                                ?>
                                <div class="invalid-feedback"></div>
                                <label><i class="fa fa-user text-dark me-2"></i>Nombre</label>
                            </div>
                        </div>

                        <!-- Apellido Paterno -->
                        <div class="col-md-4 mb-3">
                            <label class="form-control-label">Apellido Paterno: (<font color="red">*</font>)</label>
                            <div class="form-floating mb-3">
                                <?php
                                $parametros = array(
                                    'class' => 'form-control',
                                    'id' => 'ap_usuario_editar',
                                    'name' => 'ap_usuario_editar',
                                    'placeholder' => 'Apellido Paterno',
                                    'value' => ''
                                );
                                echo form_input($parametros);
                                ?>
                                <div class="invalid-feedback"></div>
                                <label><i class="fa fa-user text-dark me-2"></i>Apellido Paterno</label>
                            </div>
                        </div>

                        <!-- Apellido Materno -->
                        <div class="col-md-4 mb-3">
                            <label class="form-control-label">Apellido Materno: (<font color="red">*</font>)</label>
                            <div class="form-floating mb-3">
                                <?php
                                $parametros = array(
                                    'class' => 'form-control',
                                    'id' => 'am_usuario_editar',
                                    'name' => 'am_usuario_editar',
                                    'placeholder' => 'Apellido Materno',
                                    'value' => ''
                                );
                                echo form_input($parametros);
                                ?>
                                <div class="invalid-feedback"></div>
                                <label><i class="fa fa-user text-dark me-2"></i>Apellido Materno</label>
                            </div>
                        </div>
                    </div>

                    <!-- Correo electrónico -->
                    <div class="col-md-12 mb-3">
                        <label class="form-control-label">Correo Electrónico: (<font color="red">*</font>)</label>
                        <div class="form-floating mb-3">
                            <?php
                            $parametros = array(
                                'class' => 'form-control',
                                'id' => 'email_usuario_editar',
                                'name' => 'email_usuario_editar',
                                'placeholder' => 'Correo Electrónico',
                                'value' => ''
                            );
                            echo form_input($parametros);
                            ?>
                            <div class="invalid-feedback"></div>
                            <label><i class="fa fa-envelope text-dark me-2"></i>Correo Electrónico</label>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Sexo -->
                        <div class="col-md-6 mb-3">
                            <label class="form-control-label">Sexo: (<font color="red">*</font>)</label>
                            <div class="form-floating mb-3">
                                <select class="form-control" id="sexo_usuario_editar" name="sexo_usuario_editar" required>
                                    <option value="">Seleccione una opción</option>
                                    <option value="<?= SEXO_MASCULINO ?>" <?= set_value('sexo_usuario') == SEXO_MASCULINO ? 'selected' : '' ?>>Masculino</option>
                                    <option value="<?= SEXO_FEMENINO ?>" <?= set_value('sexo_usuario') == SEXO_FEMENINO ? 'selected' : '' ?>>Femenino</option>
                                </select>
                                <div class="invalid-feedback"></div>
                                <label><i class="fa fa-venus-mars text-dark me-2"></i>Sexo</label>
                            </div>
                        </div>

                        <!-- Contraseña -->
                        <div class="col-md-6 mb-3">
                            <label class="form-control-label">Contraseña: (<font color="red">*</font>) </label>
                            <div class="form-floating mb-3">
                                <?php
                                $parametros = array(
                                    'class' => 'form-control',
                                    'id' => 'password_usuario_editar',
                                    'name' => 'password_usuario_editar',
                                    'type' => 'password',  // Campo para la contraseña
                                    'placeholder' => 'Contraseña',
                                    'value' => ''
                                );
                                echo form_input($parametros);
                                ?>
                                <div class="invalid-feedback"></div>
                                <label><i class="fa fa-lock text-dark me-2"></i>Contraseña</label>
                            </div>
                        </div>
                    </div>

                    <!-- Imagen de perfil -->
                    <div class="col-md-12 mb-3">
                        <label class="form-control-label">Imagen de Perfil: (opcional)</label>
                        <div class="input-group">
                            <?php
                                $parametros = array(
                                    'class' => 'form-control',
                                    'id' => 'imagen_usuario_editar',
                                    'name' => 'imagen_usuario_editar',
                                    'type' => 'file',
                                    'accept' => 'image/*',
                                    'onchange' => "validate_image(this, 'img-editar', 'btn-editar', './uploads/no-image.png', 512, 512);"
                                );
                                echo form_input($parametros);
                            ?>
                        </div>
                    </div>
                </div>

                <!-- Footer fijo -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="cancel-form-edit-usuario">
                        <i class="fa fa-times"></i> Cancelar
                    </button>

                    <button class="btn btn-primary" type="submit" id="btn-editar-usuario">
                        <i class="fa fa-lg fa-save"></i> Guardar cambios
                    </button>
                </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<!-- Modal de Confirmación de Eliminación -->
<div class="modal fade" id="confirmar-eliminacion-modal" tabindex="-1" aria-labelledby="confirmar-eliminacion-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= route_to('eliminar_usuario') ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmar-eliminacion-modalLabel">Confirmar Eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro de que deseas eliminar este usuario?</p>
                    <input type="hidden" name="id_usuario" id="id_usuario_eliminar">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>




<!-- JS específico -->
<script src="<?php echo base_url(RECURSOS_PANEL_JS . "specifics/usuarios_aceptados.js"); ?>"></script>

<?= $this->endSection() ?>
