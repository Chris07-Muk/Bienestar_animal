<?php namespace App\Controllers\Usuario;
use App\Controllers\BaseController;
class Login extends BaseController
{
     // Atributo específico
    private $view = 'usuario/login';
    private $session = NULL;

    public function __construct()
    {
        helper('funciones_globales');
        // Inicializar la sesión
        $this->session = session(); // Inicializar la sesión
    }

    private function cargar_datos(){
        $data = array();
        $data['nombre_pagina'] = 'Login';
        $data['titulo_pagina'] = 'Login';

        return $data;
    }//end cargar_datos

    private function crear_vista($nombre_vista = '', $contenido = array())
    {
        return view($nombre_vista, $contenido);
    }// end crear_vista

    public function index()
    {
        return $this->crear_vista($this->view, $this->cargar_datos());
    }// end index

    // Función para validar usuario
    public function validar_usuario()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('pass');

        // Instancia del modelo
        $tabla_usuarios = new \App\Models\Tabla_usuarios();

        // Query
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

        crear_mensaje("Hola de nuevo " . $this->session->get("Usuarios_aceptados") . " al panel de administración", "¡Bienvenido!", TOASTR_INFO);
        return redirect()->to(route_to("Dashboard"));
    } //end if
    else {
        crear_mensaje("El usuario y/o contraseña son incorrectas", "Error", TOASTR_DANGER);
        return redirect()->to(route_to("login"));
    } //end else
}
}