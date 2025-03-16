<?php

namespace App\Controllers\Panel;

use App\Models\Tabla_reportes; // Importar el modelo
use App\Controllers\BaseController;

class Reporte_Visualizar extends BaseController
{
    private $view = 'panel/Reporte_Visualizar'; // Vista del dashboard
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


    public function vizualizar($id)
    {
        $modelo = new Tabla_reportes();
        $data = $this->load_data();

        // Obtener el reporte a editar
        $data['reporte'] = $modelo->getReporte($id);

        if ($this->request->getMethod() === 'post') {
            $datos = [
                'descripcion' => $this->request->getPost('descripcion'),
                'ubi_lat' => $this->request->getPost('ubi_lat'),
                'ubi_long' => $this->request->getPost('ubi_long'),
                'estatus_apr' => $this->request->getPost('estatus_apr')
            ];

            // Procesamiento de imagen
            $imagen = $this->request->getFile('imagen');
            if ($imagen && $imagen->isValid() && !$imagen->hasMoved()) {
                $nuevoNombre = $imagen->getRandomName();
                $imagen->move('uploads/', $nuevoNombre);
                $datos['imagen'] = $nuevoNombre;
            }

            return redirect()->to('/Reportes_Aceptados')->with('success', 'Reporte actualizado correctamente.');
        }

        return $this->make_view('panel/Reporte_Visualizar', $data);
    }

}

?>
