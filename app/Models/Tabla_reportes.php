<?php
    namespace App\Models;
    use CodeIgniter\Model;

    class Tabla_reportes extends Model
    {
        protected $table = 'reportes';
        protected $primaryKey = 'id_reporte';
        protected $useAutoIncrement = true;
        protected $returnType = 'object';
        protected $allowedFields = [
            'id_reporte', 'imagen', 'descripcion', 'ubi_lat',
            'ubi_long','estatus_apr'
        ];

        public function getReporte($constraint = array())
        {
            // Ejecuta la consulta y guarda los resultados en una variable
            $reporte = $this
                            ->table($this->table)
                            ->select('id_reporte, imagen, descripcion, ubi_lat, ubi_long, estatus_apr')
                            ->findAll();

            
            // dd($usuarios);

            return $reporte; // Devuelve los resultados
        }

        public function getReportesActivos()
        {
            // Devuelve todos los reportes con estatus 1
            return $this->table($this->table) 
                        ->where('estatus_apr', 1)
                        ->findAll(); 
        }

        public function getReportesInactivos()
        {
            // Devuelve todos los reportes con estatus -1
            return $this->table($this->table) 
                        ->where('estatus_apr', -1)
                        ->findAll(); 
        }
    }