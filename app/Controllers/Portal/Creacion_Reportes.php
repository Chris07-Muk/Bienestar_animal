<?php

namespace App\Controllers\Portal;

use App\Models\Tabla_reportes; // Importar el modelo
use App\Controllers\BaseController;

class Creacion_Reportes extends BaseController{

    private $view = 'portal/creacion_Reporte';


    public function guardar()
    {
        $reporteModel = new Tabla_reportes();

        $data = [
            'titulo_reporte' => $this->request->getPost('titulo_reporte'),
            'imagen' => $this->request->getPost('imagen'),
            'descripcion' => $this->request->getPost('descripcion'),
            'ubi_lat' => $this->request->getPost('ubi_lat'),
            'ubi_long' => $this->request->getPost('ubi_long'),
        ];

        if ($reporteModel->agregarReporte($data)) {
            return redirect()->to('reportar')->with('success', 'Reporte enviado correctamente.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Error al enviar el reporte.');
        }
    }



}

