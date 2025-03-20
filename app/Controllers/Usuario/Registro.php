<?php

namespace App\Controllers\Usuario;

use App\Controllers\BaseController;

class Registro extends BaseController
{
    // Atributo específico
    private $view = 'usuario/registro';
    private $session = NULL;

    public function __construct()
    {
        helper('funciones_globales');

        // Inicializar la sesión
        $this->session = session();
    }

    private function cargar_datos(){
        $data = array();
        // Datos de la página
        $data['nombre_pagina'] = 'Registro';
        $data['titulo_pagina'] = 'Registro';

        return $data;
    }

    private function crear_vista($nombre_vista = '', $contenido = array())
    {
        return view($nombre_vista, $contenido);
    }

    public function index()
    {
        return $this->crear_vista($this->view, $this->cargar_datos());
    }

    public function validar_usuario()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('pass');
    
        // Instancia del modelo
        $tabla_usuarios = new \App\Models\Tabla_usuarios();
    
        // Hashear la contraseña antes de compararla
        $hashedPassword = hash("sha256", $password);
    
        // Buscar el usuario en la base de datos
        $usuario = $tabla_usuarios->iniciar_sesion($email, hash("sha256", $password));
        if (!empty($usuario)) {

        if ($usuario->estatus_usuario == ESTATUS_DESHABILITADO) {
            crear_mensaje("Este usuario ha sido deshabilitado. Comunícate con el administrador", "Error", TOASTR_WARNING);
            return redirect()->to(route_to("login"));
        } //end estatus_deshabilitado

        $this->session->set("sesion_iniciada", TRUE);
        $this->session->set("id_usuario", $usuario->id_usuario);
        $this->session->set("usuario", $usuario->nombre_usuario);
        $this->session->set("nombre_completo_usuario", trim($usuario->nombre_usuario . ' ' . $usuario->ap_usuario . ' ' . $usuario->am_usuario));
        $this->session->set("sexo_usuario", $usuario->sexo_usuario);
        $this->session->set("email_usuario", $usuario->email_usuario);
        $this->session->set("imagen_usuario", $usuario->imagen_usuario);
        $this->session->set("rol_actual", $usuario->id_rol);
        $this->session->set("tarea_actual", TAREA_DASHBOARD);

        crear_mensaje("Hola de nuevo " . $this->session->nombre_usuario . " al panel publico", "¡Bienvenido!", TOASTR_INFO);
        return redirect()->to(route_to("portal"));
    } //end if
    else {
        crear_mensaje("El usuario y/o contraseña son incorrectas", "Error", TOASTR_DANGER);
        return redirect()->to(route_to("login"));
    } //end else
}
}