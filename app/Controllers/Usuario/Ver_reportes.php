<?php

namespace App\Controllers\Usuario;

use App\Models\Tabla_reportes; // Importar el modelo
use App\Controllers\BaseController;

class Ver_reportes extends BaseController{

    private $view = 'usuario/mascotas_perdidas';

    private function load_data()
    {
        $data['nombre_pagina'] = 'Reportes';
        $data['titulo_pagina'] = 'mascotas_perdidas';

        return $data;

    }

    private function make_view($name_view = '', $data = [])
    {
        return view($name_view, $data);
    }


    public function listarReportesActivos()
    {
        $reporteModel = new Tabla_reportes();
        
        // Cargar los datos principales
        $data = $this->load_data();
        
        // Agregar los reportes activos
        $data['reportes'] = $reporteModel->getReportesActivos();

        // Retornar la vista con los datos correctos
        return view('portal/Mascotas_Perdidas', $data);
    }





}