<?php
    namespace App\Models;
    use CodeIgniter\Model;


    class Tabla_adopciones extends Model{


        protected $table = 'adopciones';
        protected $primaryKey = 'id_adopcion';
        protected $useAutoIncrement = true;
        protected $returnType = 'object';
        protected $allowedFields = [
            'id_refugio', 'tipo', 'descripcion_adopcion', 'img_adopcion'
        ];



        // Método para obtener las adopciones
        public function getAdopciones($constraint = [])
        {
            // Comienza la consulta con la tabla adopciones
            $builder = $this->table($this->table)
                            ->select('adopciones.id_adopcion, adopciones.tipo, adopciones.descripcion_adopcion, adopciones.img_adopcion, refugios.nombre_refugio, refugios.direccion AS direccion_refugio')
                            ->join('refugios', 'refugios.id_refugio = adopciones.id_refugio'); // Relaciona la tabla de adopciones con refugios
            
            // Si se pasa un constraint para filtrar por id_refugio, lo aplicamos
            if (!empty($constraint['id_refugio'])) {
                $builder->where('adopciones.id_refugio', $constraint['id_refugio']);
            }

            // Si se pasa un constraint para filtrar por tipo, lo aplicamos
            if (!empty($constraint['tipo'])) {
                $builder->where('adopciones.tipo', $constraint['tipo']);
            }

            // Ejecuta la consulta y devuelve los resultados
            return $builder->findAll();
        }


        public function insertAdopcion($data)
        {
            return $this->insert($data);
        }

        public function eliminarAdopcion($id_adopcion)
        {
            // Elimina el refugio por id
            if ($this->where('id_adopcion', $id_adopcion)->delete()) {
                return true;
            }
            return false; // Retorna falso si hubo un error
        }



        
    }