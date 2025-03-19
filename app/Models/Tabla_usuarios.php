<?php
namespace App\Models;
use CodeIgniter\Model;

class Tabla_usuarios extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    protected $returnType = 'object';
    protected $allowedFields = [
        'estatus_usuario',
        'id_usuario',
        'nombre_usuario',
        'ap_usuario',
        'am_usuario',
        'sexo_usuario',
        'email_usuario',
        'password_usuario',
        'imagen_usuario',
        'id_rol'
    ];

    //============================
    // Consultas epecificas o básicas
    // Create Read Update Delete
    //============================
    public function create_data($data = array())
    {
        if (!empty($data)) {
            return $this
                ->table($this->table)
                ->insert($data);
        }//end if 
        else {
            return FALSE;
        }//end else
    }//end create_data

    public function get_user($contraints = array())
    {
        return $this
            ->table($this->table)
            ->where($contraints)
            ->get()
            ->getRow();
    }//get_user

    public function get_table()
    {
        return $this
            ->table($this->table)
            ->get()
            ->getResult();
    }//get_table

    public function update_data($id = 0, $data = array())
    {
        if (!empty($data)) {
            return $this
                ->table($this->table)
                ->where([$this->primaryKey => $id])
                ->set($data)
                ->update();
        }//end if
        else {
            return FALSE;
        }//end else
    }//update_data


    public function delete_data($id_usuario = 0)
    {
        return $this->db
            ->table($this->table)
            ->where([$this->primaryKey => $id_usuario])
            ->delete();
    }//end delete_data

    ///Specifc Queries
    public function iniciar_sesion($email = "", $password = "")
{
    if ($email != NULL && $password != NULL) {
        return $this
            ->table($this->table)
            ->select("
                usuarios.id_usuario, 
                estatus_usuario, 
                usuarios.nombre_usuario, 
                usuarios.ap_usuario, 
                usuarios.am_usuario,
                CONCAT(usuarios.nombre_usuario, ' ', usuarios.ap_usuario, ' ', usuarios.am_usuario) AS nombre_completo,
                usuarios.sexo_usuario, 
                usuarios.email_usuario,
                usuarios.imagen_usuario, 
                roles.id_rol, 
                roles.rol")
            ->join("roles", "usuarios.id_rol = roles.id_rol")
            ->where("usuarios.email_usuario", $email)
            ->where("usuarios.password_usuario", $password)
            ->first();
    } else {
        return array();
    }
}


}//end Tabla_usuarios