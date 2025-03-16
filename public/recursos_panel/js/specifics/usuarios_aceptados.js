document.getElementById('estatusBtn').addEventListener('click', function() {
    var btn = this;
    if (btn.innerText === 'Habilitar') {
        btn.innerText = 'Deshabilitar';
        btn.classList.remove('btn-success');
        btn.classList.add('btn-danger');
    } else {
        btn.innerText = 'Habilitar';
        btn.classList.remove('btn-danger');
        btn.classList.add('btn-success');
    }
});

// Pasar datos al modal de edición
$('#editar-usuario-modal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var id_usuario = button.data('id'); // ID del usuario
    var nombre_usuario = button.data('nombre');
    var ap_usuario = button.data('ap');
    var am_usuario = button.data('am');
    var sexo_usuario = button.data('sexo');
    var email_usuario = button.data('email');
    var id_rol = button.data('rol');
    
    // Actualiza los valores de los campos del modal
    var modal = $(this);
    modal.find('.modal-body #id_usuario').val(id_usuario);
    modal.find('.modal-body #nombre_usuario').val(nombre_usuario);
    modal.find('.modal-body #ap_usuario').val(ap_usuario);
    modal.find('.modal-body #am_usuario').val(am_usuario);
    modal.find('.modal-body #sexo_usuario').val(sexo_usuario);
    modal.find('.modal-body #email_usuario').val(email_usuario);
    modal.find('.modal-body #id_rol').val(id_rol);
});

// Pasar datos al modal de confirmación de eliminación
$('#confirmar-eliminacion-modal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var id_usuario = button.data('id'); // ID del usuario

    var modal = $(this);
    modal.find('.modal-body #id_usuario_eliminar').val(id_usuario);
});
