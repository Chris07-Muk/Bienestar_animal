<?php namespace App\Controllers\Usuario;
use App\Controllers\BaseController;
class Login extends BaseController
{
     // Atributo específico
    private $view = 'usuario/login';

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
            //crear_mensaje("Este usuario ha sido deshabilitado. Comunícate con el administrador", "Error", TOASTR_WARNING);
            return redirect()->to(route_to("login"));
        } //end estatus_deshabilitado

        $session = session();
        $session->set("sesion_iniciada", TRUE);
        $session->set("id_usuario", $usuario->id_usuario);
        $session->set("usuario", $usuario->nombre_usuario);
        $session->set("nombre_completo_usuario", trim($usuario->nombre_usuario . ' ' . $usuario->ap_usuario . ' ' . $usuario->am_usuario));
        $session->set("sexo_usuario", $usuario->sexo_usuario);
        $session->set("email_usuario", $usuario->email_usuario);
        $session->set("imagen_usuario", $usuario->imagen_usuario);
        $session->set("rol_actual", $usuario->id_rol);
        $session->set("tarea_actual", TAREA_DASHBOARD);

        //crear_mensaje("Hola de nuevo " . $session->get("Usuarios_aceptados") . " al panel de administración", "¡Bienvenido!", TOASTR_INFO);
        return redirect()->to(route_to("Dashboard"));
    } //end if
    else {
        //crear_mensaje("El usuario y/o contraseña son incorrectas", "Error", TOASTR_DANGER);
        return redirect()->to(route_to("login"));
    } //end else
}
}