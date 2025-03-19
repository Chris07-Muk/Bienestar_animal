<!-- Importartar las depedencias -->

<?= $this->extend("plantillas/panel_base") ?>

<!-- Seccion de css -->
<?= $this->section('css') ?>
<link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css">
<!-- Estilos CSS personalizados -->
<style>
    /* Estilos para centrar texto en la tabla */
    #dataTable th,
    #dataTable td {
        text-align: center;
        vertical-align: middle;
    }

    #dataTable th:last-child,
    #dataTable td:last-child {
        width: 220px;
        /* Ajuste del ancho de la columna de acciones */
        white-space: nowrap;
    }

    /* Personalización de colores para los botones */
    .btn-nuevo {
        background-color: rgb(255, 6, 6);
        color: white;
    }

    .btn-deshabilitar {
        background-color: #dc3545;
        color: white;
    }

    .btn-habilitar {
        background-color: #28a745;
        color: white;
    }

    .btn-detalles {
        background-color: #ffc107;
        color: black;
    }

    .btn-eliminar {
        background-color: #6c757d;
        color: white;
    }

    /* Espaciado entre botones */
    .btn {
        margin-right: 15px;
    }
</style>

<?= $this->endSection() ?>

<!-- Sección de contenido -->
<?= $this->section('content') ?>


<!-- Tabla de Usuarios -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <div class="col-md-12 text-center">
                    <h3>Lista de Usuarios</h3>
                </div>
                <button type="button" class="btn btn-nuevo mb-3" data-bs-toggle="modal" data-bs-target="#nuevo-usuario"
                    id="nuevo-usuario-btn">
                    <i class="fas fa-lg fa-plus-circle"></i> Agregar Nuevo Usuario
                </button>
                <div class="table-responsive">
                    <table id="table-usuarios" class="table table-striped table-bordered text-center" style="width:100%"
                        cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th class="special-cell">#</th>
                                <th class="special-cell">Usuario</th>
                                <th class="special-cell">Rol</th>
                                <th class="special-cell">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            $html = '';
                            $index = 0;
                            if (!empty($usuarios) && is_array($usuarios)) {
                                foreach ($usuarios as $usuario) {
                                    // d($usuario->id_rol);
                                    // dd(ROLES[$usuario->id_rol]);
                                    if ($usuario->id_usuario != session()->id_usuario) {
                                        $html .= '<tr>
                                        <td>' . ++$index. '</td>
                                        <td>' . htmlspecialchars($usuario->nombre_usuario . ' ' . $usuario->ap_usuario . ' ' . $usuario->am_usuario) . '</td>
                                        <td>' . (ROL_ADMINISTRADOR['clave'] == $usuario->id_rol ? ROL_ADMINISTRADOR['rol'] : ROL_OPERADOR['rol'] ) . '</td>
                                        <td>';
                                        if ($usuario->estatus_usuario == ESTATUS_DESHABILITADO) {
                                            $html .= '<a href="' . route_to("estatus_usuario", $usuario->id_usuario, ESTATUS_HABILITADO) . '" class="btn btn-info btn-xs mt-1">Habilitar</a>';
                                        } else {
                                            $html .= '<a href="' . route_to("estatus_usuario", $usuario->id_usuario, ESTATUS_DESHABILITADO) . '" class="btn btn-dark btn-xs mt-1">Deshabilitar</a>';
                                        }
                                        $html .= '<button id="' . $usuario->id_usuario . '" class="btn btn-warning btn-xs mt-1 btn-editar">Editar</button>
                                        <a href="' . route_to("eliminar_usuario", $usuario->id_usuario) . '" class="btn btn-danger btn-xs mt-1">Eliminar</a>
                                        </td>
                                    </tr>';
                                    }

                                }
                            }
                            echo $html;
                            ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal nuevo usuario -->
<div class="modal fade" id="nuevo-usuario" tabindex="-1" aria-labelledby="nuevo-usuario-title" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-secondary text-white">
            <div class="modal-header d-flex align-items-center bg-primary text-white mb-2">
                <h4 class="modal-title" id="nuevo-usuario-title">Nuevo Usuario</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                <center>
                    <img src="<?= base_url(IMG_DIR_ICONS . '/usuario.png'); ?>" alt="imagen_usuario" class="avatar-img"
                        width="150px" id="img_editar" style="margin-bottom: 30px;">
                </center>
                <h5>Todos los campos marcados con (<font color="red">*</font>) son obligatorios</h5>

                <?= form_open("registrar_usuario", ["id" => "formulario-usuario-nuevo"]); ?>
                <div class="row">
                    <!-- Nombre ocupando todo el ancho -->
                    <div class="col-12 mb-3">
                        <label class="form-control-label">Nombre (<font color="red">*</font>)</label>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre"
                                required>
                            <label><i class="fas fa-user text-light me-2"></i> Nombre</label>
                        </div>
                    </div>

                    <!-- Apellidos en dos columnas -->
                    <div class="col-md-6 mb-3">
                        <label class="form-control-label">Apellido Paterno (<font color="red">*</font>)</label>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="ap_paterno" name="ap_paterno"
                                placeholder="Apellido Paterno" required>
                            <label><i class="fas fa-user text-light me-2"></i> Apellido Paterno</label>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-control-label">Apellido Materno (<font color="red">*</font>)</label>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="ap_materno" name="ap_materno"
                                placeholder="Apellido Materno" required>
                            <label><i class="fas fa-user text-light me-2"></i> Apellido Materno</label>
                        </div>
                    </div>

                    <!-- Sexo con radio buttons -->
                    <div class="col-md-6 mb-3">
                        <label class="form-control-label">Sexo (<font color="red">*</font>)</label>
                        <div class="form-floating">
                            <div class="d-flex">
                                <!-- Radio button para Masculino -->
                                <div class="form-check me-3">
                                    <input type="radio" class="form-check-input" id="sexo_masculino" name="sexo"
                                        value="1" <?php echo ($usuario->sexo_usuario == MASCULINO) ? 'checked' : ''; ?>
                                        required>
                                    <label class="form-check-label" for="sexo_masculino">
                                        <i class="fas fa-mars"></i> Masculino
                                    </label>
                                </div>
                                <!-- Radio button para Femenino -->
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="sexo_femenino" name="sexo"
                                        value="0" <?php echo ($usuario->sexo_usuario == FEMENINO) ? 'checked' : ''; ?>
                                        required>
                                    <label class="form-check-label" for="sexo_femenino">
                                        <i class="fas fa-venus"></i> Femenino
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Correo Electrónico -->
                    <div class="col-md-6 mb-3">
                        <label class="form-control-label">Correo Electrónico (<font color="red">*</font>)</label>
                        <div class="form-floating">
                            <input type="email" class="form-control" id="correo_electronico" name="correo_electronico"
                                placeholder="Correo Electrónico" required>
                            <label><i class="fas fa-envelope text-light me-2"></i> Correo Electrónico</label>
                        </div>
                    </div>

                    <!-- Contraseña -->
                    <div class="col-md-6 mb-3">
                        <label class="form-control-label">Contraseña (<font color="red">*</font>)</label>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Contraseña" required>
                            <label><i class="fas fa-lock text-light me-2"></i> Contraseña</label>
                        </div>
                    </div>


                    <!-- Repetir Contraseña -->
                    <div class="col-md-6 mb-3">
                        <label class="form-control-label">Repetir Contraseña (<font color="red">*</font>)</label>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="repetir_password" name="repetir_password"
                                placeholder="Repetir Contraseña" required>
                            <label><i class="fas fa-lock text-light me-2"></i> Repetir Contraseña</label>
                        </div>
                    </div>


                    <!-- Imagen de Perfil -->
                    <div class="col-md-6 mb-3">
                        <label class="form-control-label">Imagen de Perfil</label>
                        <div class="form-floating">
                            <input type="file" class="form-control" id="imagen_perfil" name="imagen_perfil"
                                placeholder="URL de la imagen" accept="image/*">
                            <label><i class="fas fa-image text-light me-2"></i> URL Imagen de Perfil</label>
                        </div>
                    </div>

                    <!-- Rol -->
                    <div class="col-md-6 mb-3">
                        <label class="form-control-label">Rol (<font color="red">*</font>)</label>
                        <div class="form-floating">
                            <select class="form-control" id="rol" name="rol" required>
                                <option value="">Seleccione...</option>
                                <option value="745">Administrador</option>
                                <option value="125">Operador</option>
                            </select>
                            <label><i class="fas fa-user-tag text-light me-2"></i> Rol</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-secondary text-white">
                    <button type="submit" class="btn btn-primary">Registrar Usuario</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal Editar Usuario -->
<div class="modal fade" id="editar-usuario" tabindex="-1" aria-labelledby="editar-usuario-title" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-secondary text-white">
            <div class="modal-header d-flex align-items-center bg-primary text-white mb-2">
                <h4 class="modal-title" id="editar-usuario-title">Editar Usuario</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                <center>
                    <img src="<?= base_url(IMG_DIR_ICONS . '/usuario.png'); ?>" alt="imagen_usuario" class="avatar-img"
                        width="150px" id="img_editar_usuario" style="margin-bottom: 30px;">
                </center>
                <h5>Todos los campos marcados con (<font color="red">*</font>) son obligatorios</h5>

                <?= form_open("editar_usuario", ["id" => "formulario-usuario-editar"]); ?>
                <input type="hidden" id="id_usuario" name="id_usuario">
                <div class="row">
                    <div class="col-12 mb-3">
                        <label class="form-control-label">Nombre (<font color="red">*</font>)</label>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="nombre_usuario_editar" name="nombre" required>
                            <label><i class="fas fa-user text-light me-2"></i> Nombre</label>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-control-label">Apellido Paterno (<font color="red">*</font>)</label>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="ap_paterno_editar" name="ap_paterno" required>
                            <label><i class="fas fa-user text-light me-2"></i> Apellido Paterno</label>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-control-label">Apellido Materno</label>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="ap_materno_editar" name="ap_materno">
                            <label><i class="fas fa-user text-light me-2"></i> Apellido Materno</label>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-control-label">Sexo (<font color="red">*</font>)</label>
                        <div class="form-floating">
                            <div class="d-flex">
                                <!-- Radio button para Masculino -->
                                <div class="form-check me-3">
                                    <input type="radio" class="form-check-input" id="sexo_masculino_editar" name="sexo"
                                        value="1" <?php echo ($usuario->sexo_usuario == MASCULINO) ? 'checked' : ''; ?>
                                        required>
                                    <label class="form-check-label" for="sexo_masculino_editar">
                                        <i class="fas fa-mars"></i> Masculino
                                    </label>
                                </div>
                                <!-- Radio button para Femenino -->
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="sexo_femenino_editar" name="sexo"
                                        value="0" <?php echo ($usuario->sexo_usuario == FEMENINO) ? 'checked' : ''; ?>
                                        required>
                                    <label class="form-check-label" for="sexo_femenino_editar">
                                        <i class="fas fa-venus"></i> Femenino
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-control-label">Correo Electrónico (<font color="red">*</font>)</label>
                        <div class="form-floating">
                            <input type="email" class="form-control" id="correo_electronico_editar"
                                name="correo_electronico" required>
                            <label><i class="fas fa-envelope text-light me-2"></i> Correo Electrónico</label>
                        </div>
                    </div>

                    <!-- Contraseña -->
                    <div class="col-md-6 mb-3">
                        <label class="form-control-label">Contraseña (<font color="red">*</font>)</label>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="password-editar" name="password">
                            <label><i class="fas fa-lock text-light me-2"></i> Contraseña</label>
                        </div>
                    </div>

                    <!-- Repetir Contraseña -->
                    <div class="col-md-6 mb-3">
                        <label class="form-control-label">Repetir Contraseña (<font color="red">*</font>)</label>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="repetir_password-editar"
                                name="repetir_password">
                            <label><i class="fas fa-lock text-light me-2"></i> Repetir Contraseña</label>
                        </div>
                    </div>

                    <!-- Imagen de Perfil -->
                    <div class="col-md-6 mb-3">
                        <label class="form-control-label">Imagen de Perfil</label>
                        <div class="form-floating">
                            <input type="file" class="form-control" id="imagen_perfil_editar" name="imagen_perfil"
                                accept="image/*">
                            <label><i class="fas fa-image text-light me-2"></i> URL Imagen de Perfil</label>
                        </div>
                    </div>

                    <!-- Rol -->
                    <div class="col-md-6 mb-3">
                        <label class="form-control-label">Rol (<font color="red">*</font>)</label>
                        <div class="form-floating">
                            <select class="form-control" id="rol_editar" name="rol" required>
                                <option value="">Seleccione...</option>
                                <option value="745">Administrador</option>
                                <option value="125">Operador</option>
                            </select>
                            <label><i class="fas fa-user-tag text-light me-2"></i> Rol</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-secondary text-white">
                    <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Alerta: Contraseñas No Coinciden -->
<div class="modal fade" id="modal-password-error" tabindex="-1" aria-labelledby="modalPasswordErrorLabel"
    aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-warning text-dark">
            <div class="modal-header d-flex align-items-center bg-warning text-dark mb-2">
                <h4 class="modal-title" id="modalPasswordErrorLabel">Error de Contraseña</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                <center>
                    <!-- Icono de alerta amarilla -->
                    <i class="fas fa-exclamation-circle text-warning" style="font-size: 80px; margin-bottom: 30px;"></i>
                </center>
                <p id="mensaje-password-error" style="font-size: 18px; text-align: center;">Las contraseñas no
                    coinciden. Por favor, verifica e intenta de nuevo.</p>
            </div>
            <div class="modal-footer bg-warning text-dark">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal de Alerta: Email Ya Utilizado -->
<div class="modal fade" id="modal-email-error" tabindex="-1" aria-labelledby="modalEmailErrorLabel" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-warning text-dark">
            <div class="modal-header d-flex align-items-center bg-warning text-dark mb-2">
                <h4 class="modal-title" id="modalEmailErrorLabel">Error de Email</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                <center>
                    <!-- Icono de alerta amarilla -->
                    <i class="fas fa-exclamation-circle text-warning" style="font-size: 80px; margin-bottom: 30px;"></i>
                </center>
                <p id="mensaje-email-error" style="font-size: 18px; text-align: center;">Este email ya ha sido
                    registrado. Por favor, utiliza otro.</p>
            </div>
            <div class="modal-footer bg-warning text-dark">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Confirmación: Eliminar Usuario -->
<div class="modal fade" id="modal-eliminar-usuario" tabindex="-1" aria-labelledby="modalEliminarUsuarioLabel"
    aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-danger text-white">
            <div class="modal-header d-flex align-items-center bg-danger text-white mb-2">
                <h4 class="modal-title" id="modalEliminarUsuarioLabel">Confirmación</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                <center>
                    <!-- Icono de alerta roja -->
                    <i class="fas fa-exclamation-circle text-danger" style="font-size: 80px; margin-bottom: 30px;"></i>
                </center>
                <p id="mensaje-eliminar-usuario" style="font-size: 18px; text-align: center;">¿Estás seguro de eliminar
                    este usuario? Esta acción no se puede deshacer.</p>
            </div>
            <div class="modal-footer bg-danger text-white">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <a href="#" id="btn-confirmar-eliminar-usuario" class="btn btn-danger">Eliminar</a>
            </div>
        </div>
    </div>
</div>





<?= $this->endSection() ?>
<!-- End sección de contenido -->


<!-- Seccion de js -->
<?= $this->section('js') ?>
<!-- SweartAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- DataTable -->
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>
<!-- JS específico -->
<script src="<?php echo base_url(RECURSOS_PANEL_JS . "/specifics/usuarios.js") ?>"></script>
<?= $this->endSection() ?>