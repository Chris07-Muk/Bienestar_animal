<?php

namespace App\Controllers\Panel;

use App\Models\Tabla_usuarios; // Importar el modelo
use App\Controllers\BaseController;

class Usuarios_pendientes extends BaseController
{
    private $view = 'panel/usuarios_pendientes'; // Vista del dashboard
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
        //==========================DATOS FUNDAMENTALES========================
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
        $data['usuarios_pendientes'] = $usuarioModel->getUsuariosInactivos();

        // Pasa los datos a la vista
        return $this->make_view($this->view, $data);
    }

}

?>
