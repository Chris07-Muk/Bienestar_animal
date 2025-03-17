<?php

namespace App\Controllers\Panel;

use App\Models\Tabla_usuarios; // Importar el modelo
use App\Controllers\BaseController;

class Usuarios_aceptados extends BaseController
{
    private $view = 'panel/usuarios_aceptados'; // Vista del dashboard
    private $session = null; // Variable para almacenar la sesión

    public function __construct()
    {
        $this->session = session(); // Inicializar la sesión
    }

    private function load_data()
    {
        // Verificar si el usuario está autenticado
        if (!$this->session->get('sesion_iniciada')) {
            return redirect()->to(route_to('login'))->with('error', 'Debes iniciar sesión para acceder al panel.');
        }

        //======================================================================
        //==========================DATOS FUNDAMENTALES=======================
        //======================================================================
        $data = array();
        $data['nombre_completo_usuario'] = $this->session->get('nombre_completo_usuario');
        $data['email_usuario'] = $this->session->get('email_usuario');
        $data['imagen_usuario'] = $this->session->get('imagen_usuario') ?? ($this->session->get('sexo_usuario') == 1 ? 'no-image-m.png' : 'no-image-f.png');

        // Datos de la página
        $data['nombre_pagina'] = 'Usuarios';
        $data['titulo_pagina'] = 'Usuarios Activos';

        // Cargar helper para el breadcrumb
        helper('breadcrumb');

        // Navegación (breadcrumb)
        $navegacion = array(
            array(
                'href' => route_to('/dashboard'),
                'tarea' => 'Usuarios',
                'icon' => 'fa fa-user',
            ),
            array(
                'href' => '#',
                'tarea' => 'Usuarios Activos',
                'icon' => 'fa fa-users',
            ),
        );

        // Asignar breadcrumb a los datos
        $data['breadcrumb'] = breadcrumb_panel($data['titulo_pagina'], $navegacion);

        return $data;
    }

    private function make_view($name_view = '', $content = array())
    {
        $content['menu_lateral'] = crear_menu_panel(); // Agregar menú lateral
        return view($name_view, $content);
    }

    // Método para mostrar los usuarios activos
    public function index()
    {
        $usuarioModel = new Tabla_usuarios(); // Instancia del modelo Tabla_usuarios
        $data = $this->load_data(); // Cargar datos de usuario y navegación

        // Obtener usuarios activos de la base de datos
        $data['usuarios_activos'] = $usuarioModel->getUsuariosActivos();

        // Pasa los datos a la vista
        return $this->make_view($this->view, $data);
    }

    // Método para habilitar o deshabilitar usuario
    public function estatus()
    {
        $id_usuario = $this->request->getPost('id_usuario');
        $estatus = $this->request->getPost('estatus');

        $usuarioModel = new Tabla_usuarios();

        if ($estatus == ESTATUS_HABILITADO) {
            $nuevo_estatus = ESTATUS_DESHABILITADO; // Cambiar a deshabilitado
        } else {
            $nuevo_estatus = ESTATUS_HABILITADO; // Cambiar a habilitado
        }

        $data = ['estatus_usuario' => $nuevo_estatus];

        $usuarioModel->updateUsuario($id_usuario, $data);
        return redirect()->to(route_to('usuarios_aceptados'))->with('success', 'Estatus actualizado correctamente');
    }

    // Método para eliminar usuario
    public function eliminar()
    {
        $id_usuario = $this->request->getPost('id_usuario');
        $usuarioModel = new Tabla_usuarios();
        $usuarioModel->deleteUsuario($id_usuario);

        return redirect()->to(route_to('usuarios_aceptados'))->with('success', 'Usuario eliminado correctamente');
    }

    // Método para registrar nuevo usuario
    public function registrar()
    {
        $usuarioModel = new Tabla_usuarios();
        $data = [
            'nombre_usuario' => $this->request->getPost('nombre_usuario'),
            'ap_usuario' => $this->request->getPost('ap_usuario'),
            'am_usuario' => $this->request->getPost('am_usuario'),
            'sexo_usuario' => $this->request->getPost('sexo_usuario'),
            'email_usuario' => $this->request->getPost('email_usuario'),
            'password_usuario' => password_hash($this->request->getPost('password_usuario'), PASSWORD_BCRYPT),
            'id_rol' => $this->request->getPost('id_rol'),
            'estatus_usuario' => ESTATUS_HABILITADO, // Por defecto, el usuario se habilita al registrarse
        ];

        $usuarioModel->createUsuario($data);

        return redirect()->to(route_to('usuarios_aceptados'))->with('success', 'Usuario registrado correctamente');
    }

    // Método para editar un usuario
    public function editar()
    {

        // dd($this->request->getPost());

        $id_usuario = $this->request->getPost('id_usuario');
        $data = [
            'nombre_usuario' => $this->request->getPost('nombre_usuario'),
            'ap_usuario' => $this->request->getPost('ap_usuario'),
            'am_usuario' => $this->request->getPost('am_usuario'),
            'sexo_usuario' => $this->request->getPost('sexo_usuario'),
            'email_usuario' => $this->request->getPost('email_usuario'),
            'id_rol' => $this->request->getPost('id_rol'),
        ];

        $usuarioModel = new Tabla_usuarios();
        $usuarioModel->updateUsuario($id_usuario, $data);

        return redirect()->to(route_to('usuarios_aceptados'))->with('success', 'Usuario actualizado correctamente');
    }
}
