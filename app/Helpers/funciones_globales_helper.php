<?php


function crear_mensaje($descripcion = '', $titulo = '', $tipo_alerta = 0)
{
    session();

    $mensaje = array(
        'descripcion' => $descripcion,
        'titulo' => $titulo,
        'tipo_alerta' => $tipo_alerta
    );

    session()->set("mensaje", $mensaje);
}//end crear mensaje

function mostrar_mensaje()
{
    $html = '';
    $session = session();
    /**
     * Recuperamos la informacion instanciada del valor message
     * descripcion
     * titulo
     * tipo alerta
     */

    $mensaje = $session->get("mensaje");
    if ($mensaje == null) {
        return $html;
    }
    $tipo_mensaje = '';
    switch ($mensaje["tipo_alerta"]) {
        case 50:
            //verde
            $tipo_mensaje = 'success';
            break;

        case 100:
            //amarillo
            $tipo_mensaje = 'warning';
            break;

        case 125:
            //rojo
            $tipo_mensaje = 'danger';
            break;

        default:
            //azul
            $tipo_mensaje = 'info';
            break;
    }
    $html = 'toastr.' . $tipo_mensaje . '("' . $mensaje["descripcion"] . '", "' . $mensaje["titulo"] . '");';

    $session->set("mensaje", null);
    return $html;

}