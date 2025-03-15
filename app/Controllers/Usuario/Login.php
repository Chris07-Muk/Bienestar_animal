<?php

namespace App\Controllers\Usuario;

use App\Controllers\BaseController;

class Login extends BaseController
{
    private $view = 'usuario/login';

    private function load_data(){
        $data = array();
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
        $hashedPassword = hash("sha256", $password);
        $usuario = $tabla_usuarios->loginUsuario($email, $hashedPassword);

        if ($usuario != null) {
            if ($usuario->estatus_usuario != ESTATUS_DESHABILITADO) {
                $session = session();
                $session->set("sesion_iniciada", TRUE);
                $session->set("id_usuario", $usuario->id_usuario);
                $session->set("usuario", $usuario->nombre_usuario);
                $session->set("email_usuario", $usuario->email_usuario);
                $session->set("nombre_completo_usuario", $usuario->nombre_usuario . ' ' . $usuario->ap_usuario . ' ' . $usuario->am_usuario);
                $session->set("sexo_usuario", $usuario->sexo_usuario);
                $session->set("imagen_usuario", $usuario->imagen_usuario);
                $session->set("id_rol", $usuario->id_rol);

                // Mensaje de bienvenida personalizado basado en el sexo del usuario
                if ($usuario->sexo_usuario == SEXO_MASCULINO) {
                    $mensaje = "Bienvenido al Sistema de Bienestar Animal Tlaxcala";
                    $mensajeUsuario = "¡Hola " . $session->get('usuario') . "!";
                } else {
                    $mensaje = "Bienvenida al Sistema de Bienestar Animal Tlaxcala";
                    $mensajeUsuario = "¡Hola " . $session->get('usuario') . "!";
                }

                // Almacenamos el mensaje en la sesión para ser mostrado en la vista
                $session->setFlashdata('mensaje', $mensaje);
                $session->setFlashdata('mensaje_usuario', $mensajeUsuario);

                return redirect()->to(route_to('Dashboard'));
            } else {
                return redirect()->to(route_to('login'))->with('error', 'Tu cuenta está inhabilitada.');
            }
        } else {
            return redirect()->to(route_to('login'))->with('error', 'Credenciales incorrectas.');
        }
    }
}
