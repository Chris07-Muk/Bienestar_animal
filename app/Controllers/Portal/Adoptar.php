<?php

namespace App\Controllers\Portal;

use App\Models\Tabla_refugios; // Importar el modelo
use App\Models\Tabla_adopciones;
use App\Controllers\BaseController;


class Adoptar extends BaseController{

    private $view = 'Portal/Adoptar';

    private function load_data()
    {
        $data['nombre_pagina'] = 'Adoptar';
        $data['titulo_pagina'] = 'Adoptar';

        return $data;

    }

    private function make_view($name_view = '', $data = [])
    {
        return view($name_view, $data);
    }

    public function index()
    {
        $adopcionModel = new Tabla_adopciones(); // Creamos una instancia del modelo de adopciones
        $data = $this->load_data();
        $data['adopciones'] = $adopcionModel->getAdopciones(); // Obtenemos las adopciones

        $refugioModel = new Tabla_refugios();
        $data['refugios'] = $refugioModel->getRefugio();

        
        // dd($data);

        return $this->make_view($this->view, $data);
    }



}