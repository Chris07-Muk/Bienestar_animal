<?php

namespace App\Controllers\Portal;

use App\Controllers\BaseController;
class Mascotas_Perdidas extends BaseController
{
    private $view = 'portal/mascotas_perdidas';

    private function load_data(){
        $data = array();
        //Datos de la pagina
        $data['nombre_pagina'] = 'Bienestar animal';
        $data['titulo_pagina'] = 'Bienestar animal';

        // load helper
        helper('breadcrumb');

        $navegacion = array(
            array(
                'href' => route_to('/portal'),
                'tarea' => 'Usuarios',
                'icon' => 'fa fa-user',
            ),
            array(
                'href' => '#',
                'tarea' => 'Usuario nuevo',
                'icon' => 'fa fa-user',
            ),
        );

        // $data['breadcrumb'] = breadcrumb_panel($data['titulo_pagina'], $navegacion);

        //Queries SQL

        return $data;
    }//edn return data

    private function make_view($name_view = '', $content = array()){
        return view($name_view, $content);
    }//end

    public function index()
    {
        return $this->make_view($this->view,$this->load_data());
    }
}
