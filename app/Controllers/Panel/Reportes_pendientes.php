<?php

namespace App\Controllers\Panel;

use App\Models\Tabla_reportes; // Importar el modelo
use App\Controllers\BaseController;

class Reportes_Pendientes extends BaseController
{
    private $view = 'panel/reportes_pendientes'; // Vista del dashboard
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
        $data['nombre_pagina'] = 'Reportes';
        $data['titulo_pagina'] = 'Reportes Activos';

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
        $usuarioModel = new Tabla_reportes(); // Instancia del modelo Tabla_usuarios
        $data = $this->load_data(); // Cargar datos de usuario y navegación

        // Obtener usuarios activos de la base de datos
        $data['ReportesInactivos'] = $usuarioModel->getReportesInactivos();
        // dd($data);

        // Pasa los datos a la vista
        return $this->make_view($this->view, $data);
    }


    public function activar($id)
    {
        $reporteModel = new Tabla_reportes();
        
        if ($reporteModel->activarReporte($id)) {
            return redirect()->to(route_to('Reportes_Pendientes'))->with('success', 'Reporte activado correctamente.');
        } else {
            return redirect()->to(route_to('Reportes_Pendientes'))->with('error', 'No se pudo activar el reporte.');
        }
    }


    //eliminar
    public function eliminar($id)
    {
        $modelo = new Tabla_reportes();

        // Verificar si el reporte existe antes de eliminar
        $reporte = $modelo->find($id);
        if (!$reporte) {
            return redirect()->to('/Reportes_Pendientes')->with('error', 'Reporte no encontrado.');
        }

        // Eliminar imagen asociada
        if (!empty($reporte->imagen)) {
            $rutaImagen = FCPATH . 'uploads/' . $reporte->imagen;
            if (file_exists($rutaImagen)) {
                unlink($rutaImagen);
            }
        }        

        // Eliminar el reporte
        $modelo->eliminarReporte($id);

        return redirect()->to('/Reportes_Pendientes')->with('success', 'Reporte eliminado correctamente.');
    }

    public function guardar()
    {
        $reporteModel = new Tabla_reportes();

        $data = [
            'titulo_reporte' => $this->request->getPost('titulo_reporte'),
            'imagen' => $this->request->getPost('imagen'),  // Si la imagen se sube, procesa antes
            'descripcion' => $this->request->getPost('descripcion'),
            'ubi_lat' => $this->request->getPost('ubi_lat'),
            'ubi_long' => $this->request->getPost('ubi_long'),
        ];

        if ($reporteModel->agregarReporte($data)) {
            return redirect()->to(route_to('Reportes_Pendientes'))->with('success', 'Reporte agregado correctamente.');
        } else {
            return redirect()->to(route_to('Reportes_Pendientes'))->with('error', 'Error al agregar el reporte.');
        }
    }


}

?>
