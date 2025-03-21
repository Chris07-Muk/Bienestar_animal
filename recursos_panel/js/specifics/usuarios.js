// CREAR DATOS DEL MODAL EDITAR USUARIO
// ============================================================== 
$(document).on('click', '.btn-editar', function () {
    let id = $(this).attr('id');
    fetch('../obtener_usuario/' + id)
        .then(res => {
            if (!res.ok) {
                throw new Error('Ocurrió un error');
            }
            return res.json();
        })
        .then(respuesta => {
            if (respuesta.data === -1) {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Error al cargar los datos del usuario",
                    showConfirmButton: false,
                    timer: 1500
                });
            } else {
                let data = respuesta.data;

                // Llenar los campos del modal con los datos obtenidos
                $('#id_usuario').val(data.id_usuario);
                $('#nombre_usuario_editar').val(data.nombre_usuario);
                $('#ap_paterno_editar').val(data.ap_usuario);
                $('#ap_materno_editar').val(data.am_usuario);
                $('#sexo_editar').val(data.sexo_usuario);
                $('#correo_electronico_editar').val(data.email_usuario);
                $('#rol_editar').val(data.id_rol);

                // Cargar imagen de perfil si existe
                if (data.imagen_usuario) {
                    $('#img_editar_usuario').attr('src', '../uploads/usuarios/' + data.imagen_usuario);
                } else {
                    $('#img_editar_usuario').attr('src', '../assets/img/default-user.png');
                }

                // Llenar los radio buttons de sexo
                if (data.sexo_usuario === 0) { // MASCULINO
                    $('#sexo_masculino_editar').prop('checked', true);
                } else if (data.sexo_usuario === 1) { // FEMENINO
                    $('#sexo_femenino_editar').prop('checked', true);
                }

                // Mostrar el modal
                $('#editar-usuario').modal('show');
            }
        })
        .catch(error => {
            Swal.fire({
                position: "center",
                icon: "warning",
                title: "Ocurrió un error interno con el servidor",
                showConfirmButton: false,
                timer: 2500
            });
            console.error(error);
        });
});



document.getElementById('formulario-usuario-editar').addEventListener('submit', event => {
    event.preventDefault();
    event.stopImmediatePropagation();

    setTimeout(function () {
        fetch('../editar_usuario', { // Cambiar la ruta al controlador correcto
            method: 'POST',
            body: new FormData(document.getElementById('formulario-usuario-editar'))
        })
            .then(res => {
                if (!res.ok) {
                    throw new Error('Ocurrió un error');
                }
                return res.json();
            })
            .then(respuesta => {
                if (respuesta.error === 0) {
                    // Reseteamos los campos básicos
                    document.getElementById('formulario-usuario-editar').reset();
                    // Cerramos el modal
                    $('#editar-usuario').modal('hide');
                    // Recargar la tabla si es necesario
                    // table_usuarios.ajax.reload(null, false);
                }
                location.reload(true);
            })
            .catch(error => {
                Swal.fire({
                    position: "center",
                    icon: "warning",
                    title: "Ocurrió un error interno con el servidor",
                    showConfirmButton: false,
                    timer: 2500
                });
            });
    }, 2000);
});


$(document).ready(function () {
    $('#table-usuarios').DataTable({
        'processing': true,
        "responsive": true,
        "scrollX": false,
        "language": {
            "emptyTable": "No hay datos disponibles en la tabla",
            "zeroRecords": "No se encontraron coincidencias",
            "info": "Mostrando START a END de TOTAL registros",
            "infoEmpty": '<span style="color:#ff0000;">Mostrando 0 a 0 de 0 registros</span>',
            "infoFiltered": "(filtrado de MAX registros en total)",
            "lengthMenu": "Mostrar MENU registros por página",
            "search": "Buscar:",
            "paginate": {
                "first": "<span style='color:#6C7293;'>Primero</span>",
                "last": "<span style='color:#6C7293;'>Último</span>",
                "next": "<span style='color:#6C7293;'>Siguiente</span>",
                "previous": "<span style='color:#6C7293;'>Anterior</span>"
            }
        },
        "initComplete": function () {
            // Aplica clases de centrado a las celdas de la tabla
            $('#table-usuarios').find('td, th').css({
                'text-align': 'center',
            });

            // Aplica centrado a los controles de paginación
            $('.dataTables_paginate').css({
                'text-align': 'center',
            });
        }
    });
});

// Validación de contraseña (que coincidan)
document.addEventListener('DOMContentLoaded', function () {
    const formularioUsuarioNuevo = document.getElementById('formulario-usuario-nuevo');
    if (formularioUsuarioNuevo) {
        formularioUsuarioNuevo.addEventListener('submit', function (event) {
            const password = document.getElementById('password').value;
            const repetirPassword = document.getElementById('repetir_password').value;

            if (password !== repetirPassword) {
                // Mostrar mensaje de advertencia con Swal.fire
                Swal.fire({
                    position: 'center',
                    icon: 'warning',
                    title: 'Las contraseñas no coinciden',
                    showConfirmButton: true,
                    timer: 3000
                });

                event.preventDefault(); // Detener el envío del formulario
            }
        });
    }
});


// Limpiar los campos del formulario cuando el modal se cierra
document.getElementById('nuevo-usuario').addEventListener('hidden.bs.modal', function () {
    // Obtener el formulario
    const formulario = document.getElementById('formulario-usuario-nuevo');
    if (formulario) {
        // Limpiar todos los campos de texto
        formulario.reset();

        // Limpiar el campo de imagen de perfil
        document.getElementById('imagen_perfil').value = '';

        // Desmarcar los radio buttons de sexo
        const radiosSexo = document.getElementsByName('sexo');
        radiosSexo.forEach(radio => radio.checked = false);

        // Limpiar el campo de rol
        document.getElementById('rol').selectedIndex = 0;  // Restablecer a "Seleccione..."

        // Limpiar las contraseñas
        document.getElementById('password').value = '';
        document.getElementById('repetir_password').value = '';

        // Limpiar los campos de texto
        document.getElementById('nombre').value = '';
        document.getElementById('ap_paterno').value = '';
        document.getElementById('ap_materno').value = '';
        document.getElementById('correo_electronico').value = '';
    }
});