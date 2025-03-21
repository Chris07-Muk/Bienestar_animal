<?php

namespace App\Controllers\Portal;

use App\Models\Tabla_reportes; // Importar el modelo
use App\Controllers\BaseController;

class Ver_reportes extends BaseController{

    private $view = 'portal/mascotas_perdidas';

    private function load_data()
    {
        $data['nombre_pagina'] = 'Reportes';
        $data['titulo_pagina'] = 'mascotas_perdidas';
        
        // Agregar los reportes activos
        $reporteModel = new Tabla_reportes();
        $data['reportes'] = $reporteModel->getReportesActivos();
        
        return $data;

    }

    private function make_view($name_view = '', $data = [])
    {
        return view($name_view, $data);
    }
    
    
    public function index(){
      // Cargar los datos principales
      $data = $this->load_data();
      return view($this->view, $data);
    }




}