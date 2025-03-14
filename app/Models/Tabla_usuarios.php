<?php
    namespace App\Models;
    use CodeIgniter\Model;

    class Tabla_usuarios extends Model
    {
        protected $table = 'usuarios';
        protected $primaryKey = 'id_usuario';
        protected $useAutoIncrement = true;
        protected $returnType = 'object';
        protected $allowedFields = [
            'id_usuario', 'estatus_usuario', 'nombre_usuario', 'ap_usuario',
            'am_usuario', 'sexo_usuario', 'email_usuario', 'password_usuario',
            'imagen_usuario', 'id_rol'
        ];

        public function createUsuario ($data = array()){
        if ($data != null){
            $id = $this
                    ->table($this->table)
                    ->insert($data);
            return ($id) ? $id : false; 

        }//end if
        return false;
        }//end createUsuario

        public function getUsuario($constraint = array()){
        return $this
            ->select('id_usuario, estatus_usuario, nombre_usuario, ap_usuario, am_usuario, sexo_usuario, email_usuario, password_usuario, imagen_usuario, id_rol')
            ->where($constraint)
            ->first();
        }//end getUsuario

        public function getUsuarios()
        {
            // Ejecuta la consulta y guarda los resultados en una variable
            $usuarios = $this
                            ->table($this->table)
                            ->select('id_usuario, estatus_usuario, nombre_usuario, ap_usuario, am_usuario, sexo_usuario, email_usuario, imagen_usuario, id_rol')
                            ->findAll();

            
            // dd($usuarios);

            return $usuarios; // Devuelve los resultados
        }

        
        public function getUsuariosActivos()
        {
            // Devuelve todos los usuarios con estatus 1
            return $this->table($this->table) 
                        ->where('estatus_usuario', 1)
                        ->findAll(); 
        }

        public function getUsuariosInactivos()
        {
            // Filtra por estatus inactivo (-1)
            return $this->table($this->table)
                        ->where('estatus_usuario', -1)
                        ->findAll(); 
        }





        public function updateUsuario($id = 0, $data = array()){
            if ($data != null){
                return $this
                        ->table($this->table)
                        ->set($data)
                        ->where([$this->primaryKey => $id]);
            }//end if
            return false;
        }//end updateUsuario

        public function deleteUsuario($id = 0){
            if ($this->table($this->table)->find($id) != null){
                return $this
                        ->table($this->table)
                        ->delete([$this->primaryKey => $id]);
            }//end if
            return -1;
        }//end deleteUsuario


        public function loginUsuario($email = '', $password = '')
        {
            return $this
                ->select("usuarios.id_usuario, 
                        usuarios.nombre_usuario, 
                        usuarios.ap_usuario, 
                        usuarios.am_usuario, 
                        usuarios.estatus_usuario, 
                        usuarios.sexo_usuario, 
                        usuarios.email_usuario, 
                        usuarios.imagen_usuario, 
                        usuarios.id_rol, 
                        roles.rol AS rol")
                ->join('roles', 'usuarios.id_rol = roles.id_rol')
                ->where('usuarios.email_usuario', $email)
                ->where('usuarios.password_usuario', $password)
                ->first();
        }//end loginUsuario

    }// end Tabla_usuarios

?>