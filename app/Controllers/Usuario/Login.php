<?php

namespace App\Controllers\Usuario;

use App\Controllers\BaseController;

class Login extends BaseController
{
    private $view = 'usuario/login';

    private function load_data(){
        $data = array();
        // Datos de la página
        $data['nombre_pagina'] = 'Login';
        $data['titulo_pagina'] = 'Login';

        return $data;
    }

    private function make_view($name_view = '', $content = array()){
        return view($name_view, $content);
    }

    public function index()
    {
        return $this->make_view($this->view, $this->load_data());
    }

    public function validar_usuario()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('pass');
    
        $tabla_usuarios = new \App\Models\Tabla_usuarios();
    
        // Hashear la contraseña antes de compararla
        $hashedPassword = hash("sha256", $password);
    
        // Buscar el usuario en la base de datos
        $usuario = $tabla_usuarios->loginUsuario($email, $hashedPassword);
    
        if ($usuario != null) {
            // Verificar si el usuario está habilitado
            if ($usuario->estatus_usuario == 1) {
                // Crear la sesión
                $session = session();
                $session->set("sesion_iniciada", TRUE);
                $session->set("id_usuario", $usuario->id_usuario);
                $session->set("usuario", $usuario->nombre_usuario); // ← Corregido
                $session->set("email_usuario", $usuario->email_usuario); // ← Corregido
                $session->set("nombre_completo_usuario", $usuario->nombre_usuario . ' ' . $usuario->ap_usuario . ' ' . $usuario->am_usuario);
                $session->set("sexo_usuario", $usuario->sexo_usuario);
                $session->set("imagen_usuario", $usuario->imagen_usuario);
                $session->set("id_rol", $usuario->id_rol); // ← Corregido
    
                // Redirigir al dashboard
                return redirect()->to(route_to('Dashboard'));
            } else {
                // Usuario inhabilitado
                return redirect()->to(route_to('login'))->with('error', 'Tu cuenta está inhabilitada.');
            }
        } else {
            // Credenciales incorrectas
            return redirect()->to(route_to('login'))->with('error', 'Credenciales incorrectas.');
        }
    }
    
}