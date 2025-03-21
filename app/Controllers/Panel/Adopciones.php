<?php

namespace App\Controllers\Panel;

use App\Controllers\BaseController;
use App\Models\Tabla_adopciones; // Importar el modelo
use App\Models\Tabla_refugios; // Importar el modelo 

class Adopciones extends BaseController
{
    private $view = 'panel/adopciones'; // Vista del dashboard
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
		//==========================DATOS FUNDAMENTALES=========================
		//======================================================================
        $data = array();
        $data['nombre_completo_usuario'] = $this->session->get('nombre_completo_usuario');
        $data['email_usuario'] = $this->session->get('email_usuario');
        $data['imagen_usuario'] = $this->session->get('imagen_usuario') ?? ($this->session->get('sexo_usuario') == 1 ? 'no-image-m.png' : 'no-image-f.png');

        // Datos de la página
        $data['nombre_pagina'] = 'Adopciones';
        $data['titulo_pagina'] = 'Adopciones';

        // Cargar helper para el breadcrumb
        helper('breadcrumb');

        // Navegación (breadcrumb)
        $navegacion = array(
            array(
                'href' => route_to('/dashboard'),
                'tarea' => 'usuarios',
                'icon' => 'fa fa-user',
            ),
            array(
                'href' => '#',
                'tarea' => 'usuario nuevo',
                'icon' => 'fa fa-user',
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

    public function index()
    {
        $adopcionModel = new Tabla_adopciones(); // Creamos una instancia del modelo de adopciones
        $data['adopciones'] = $adopcionModel->getAdopciones(); // Obtenemos las adopciones

        $refugioModel = new Tabla_refugios();
        $data['refugios'] = $refugioModel->getRefugio();

        // dd($data);

        return $this->make_view($this->view, $data);
    }

    public function agregar()
    {
        $refugioModel = new Tabla_refugios();
        $data['refugios'] = $refugioModel->getRefugio(); // Obtener los refugios disponibles


        return $this->make_view('panel/agregar_adopcion', $data); // Vista de formulario para agregar
    }


    public function guardar()
    {
        if ($this->request->getMethod() === 'post') {
            $adopcionModel = new Tabla_adopciones();

        // Capturar los datos del formulario
        $data = [
            'id_refugio' => $this->request->getPost('id_refugio'),
            'tipo' => $this->request->getPost('tipo'),
            'descripcion_adopcion' => $this->request->getPost('descripcion_adopcion'),
            'img_adopcion' => $this->request->getPost('img_adopcion'),
        ];

        // Insertar el nuevo refugio en la base de datos
        if ($adopcionModel->insert($data)) {
            return redirect()->to(route_to('adopciones'))->with('success', 'Refugio agregado correctamente.');
        } else {
            return redirect()->to(route_to('adopciones'))->with('error', 'Hubo un problema al agregar el refugio.');
        }

        }
    }

    public function eliminar($id_adopcion)
    {
        $adopcionModel = new Tabla_adopciones();
        
        if ($adopcionModel->eliminarAdopcion($id_adopcion)) {
            return redirect()->to(route_to('adopciones'))->with('success', 'Refugio eliminado correctamente.');
        } else {
            return redirect()->to(route_to('adopciones'))->with('error', 'No se pudo eliminar el refugio.');
        }
    }


}