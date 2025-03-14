<?php

namespace App\Controllers;
use App\Controllers\BaseController;

class InicioSesion extends BaseController
{
    private $view = 'inicio';

    private function load_data()
    {
        $data = array();
       
        // Datos de la página
        $data['nombre_pagina'] = 'Inicio de Sesión';
        $data['titulo_pagina'] = 'Iniciar Sesión';
        
        return $data;
    } // end load_data

    private function make_view($name_view = '', $content = array())
    {
        return view($name_view, $content);
    }

    public function index()
    {
        return $this->make_view($this->view, $this->load_data());
    } // end index

    public function inicio()
    {
        return $this->make_view($this->view, $this->load_data());
    } // end inicio
} // end InicioSesion