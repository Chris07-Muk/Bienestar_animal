<?php
    namespace App\Models;
    use CodeIgniter\Model;


    class Tabla_refugios extends Model{


        protected $table = 'refugios';
        protected $primaryKey = 'id_refugio';
        protected $useAutoIncrement = true;
        protected $returnType = 'object';
        protected $allowedFields = [
            'id_refugio', 'nombre_refugio', 'direccion', 'capacidad' 
        ];


        public function getRefugio($constraint = array())
        {
            // Ejecuta la consulta y guarda los resultados en una variable
            $refugio = $this
                            ->table($this->table)
                            ->select('id_refugio, nombre_refugio, direccion, capacidad')
                            ->findAll();

            
            // dd($refugio);

            return $refugio; // Devuelve los resultados
        }

        public function agregarRefugio($data)
        {
            return $this->insert($data); // Inserta los datos en la tabla 'refugios'
        }


        public function eliminarRefugio($id)
        {
            // Elimina el refugio por id
            if ($this->where('id_refugio', $id)->delete()) {
                return true;
            }
            return false; // Retorna falso si hubo un error
        }

    }