<?php

namespace App\Controllers\Panel;

use App\Models\Tabla_refugios; // Importar el modelo
use App\Controllers\BaseController;

class Refugios extends BaseController
{
    private $view = 'panel/refugios'; // Vista del dashboard
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
        $data['nombre_pagina'] = 'Refugios';
        $data['titulo_pagina'] = 'Refugios';

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
        // Verificar si el archivo de la vista existe antes de cargarlo
        if (!is_file(APPPATH . 'Views/' . $name_view . '.php')) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("La vista {$name_view} no se encontró.");
        }

        $content['menu_lateral'] = crear_menu_panel(); // Agregar menú lateral
        return view($name_view, $content);
    }

    public function index()
    {
        $refugioModel = new Tabla_refugios(); // Instancia del modelo
        $data = $this->load_data(); // Cargar datos de usuario y navegación

        // Obtener refugios activos de la base de datos
        $data['refugios'] = $refugioModel->getRefugio();

        // Pasa los datos a la vista
        return $this->make_view($this->view, $data);
    }

    public function agregar()
    {
        $data = $this->load_data(); // Cargar datos de usuario y navegación
        return $this->make_view('panel/agregar_refugio', $data); // Vista de formulario para agregar
    }

    // Guardar el nuevo refugio en la base de datos
    public function guardar()
    {
        $refugioModel = new Tabla_refugios(); // Instancia del modelo

        // Capturar los datos del formulario con validación
        $nombre = $this->request->getPost('nombre_refugio');
        $direccion = $this->request->getPost('direccion');
        $capacidad = $this->request->getPost('capacidad');

        if (empty($nombre) || empty($direccion) || empty($capacidad)) {
            return redirect()->to(route_to('refugios'))->with('error', 'Todos los campos son obligatorios.');
        }

        $data = [
            'nombre_refugio' => $nombre,
            'direccion' => $direccion,
            'capacidad' => $capacidad,
        ];

        // Insertar el nuevo refugio en la base de datos
        if ($refugioModel->agregarRefugio($data)) {
            return redirect()->to(route_to('refugios'))->with('success', 'Refugio agregado correctamente.');
        } else {
            return redirect()->to(route_to('refugios'))->with('error', 'Hubo un problema al agregar el refugio.');
        }
    }

    public function eliminar($id_refugio)
    {
        $refugioModel = new Tabla_refugios(); // Instancia del modelo

        // Verificar que el refugio exista antes de eliminarlo
        if (!$refugioModel->find($id_refugio)) {
            return redirect()->to(route_to('refugios'))->with('error', 'El refugio no existe.');
        }

        // Llamar a la función eliminarRefugio
        if ($refugioModel->eliminarRefugio($id_refugio)) {
            return redirect()->to(route_to('refugios'))->with('success', 'Refugio eliminado correctamente.');
        } else {
            return redirect()->to(route_to('refugios'))->with('error', 'No se pudo eliminar el refugio.');
        }
    }
}
