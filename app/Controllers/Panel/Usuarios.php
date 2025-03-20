<?php
namespace App\Controllers\Panel;

use App\Controllers\BaseController;

class Usuarios extends BaseController
{
    private $view = 'panel/usuarios';
    private $session = NULL;
    private $permiso = TRUE;

    public function __construct()
    {
        // Iniciar sesión
        $this->session = session();

        helper('funciones_globales');


        // Cargar el helper de permisos
        helper("permisos_roles_helper");


        // Verificar el acceso del usuario
        if (!acceso_usuario(TAREA_USUARIOS, $this->session->rol_actual)) {
            $this->permiso = false;
        }

        // Definir la tarea actual en la sesión
        $this->session->tarea_actual = TAREA_USUARIOS;
    }

    private function cargar_datos()
    {
        $datos = array();

        // Datos fundamentales
        $datos['nombre_completo_usuario'] = $this->session ? $this->session->get('nombre_completo_usuario') ?? '' : '';
        $datos['email_usuario'] = $this->session ? $this->session->get('email_usuario') ?? '' : '';
        $datos['rol_actual'] = $this->session ? $this->session->get('rol_actual') ?? '' : '';

        $imagen_usuario = $this->session ? $this->session->get('imagen_usuario') : null;
        $sexo_usuario = $this->session ? $this->session->get('sexo_usuario') : null;

        $datos['imagen_usuario'] = base_url(
            $imagen_usuario === null
            ? ($sexo_usuario === FEMENINO
                ? IMG_USUARIOS . '/mujer.png'
                : IMG_USUARIOS . '/hombre.png')
            : IMG_USUARIOS . '/' . $imagen_usuario
        );

        // Datos de la página
        $datos['nombre_pagina'] = 'Usuarios';
        $datos['titulo_pagina'] = 'Gestión de Usuarios';

        // Cargar helper
        helper('breadcrumb');

        $navegacion = array(
            array(
                'href' => route_to('/dashboard'),
                'tarea' => 'Inicio',
                'icon' => 'fa fa-home',
            ),
            array(
                'href' => route_to('/usuarios'),
                'tarea' => 'Usuarios',
                'icon' => 'fa fa-shopping-cart',
            ),
        );

        $tabla_usuarios = new \App\Models\Tabla_usuarios;

        $datos["usuarios"] = $tabla_usuarios->get_table();

        return $datos;

    }

    private function crear_vista($crear_vista = '', $contenido = array())
    {
        $contenido['menu_lateral'] = crear_menu_panel(); // Agregar menú lateral
        return view($crear_vista, $contenido);
    }

    public function index()
    {
        if ($this->permiso) {
            return $this->crear_vista($this->view, $this->cargar_datos());
        }//end if
        else {
            crear_mensaje("No tienes permisos para acceder a este módulo, contancte al Administrador", "Oppss!", TOASTR_WARNING);
            return redirect()->to(route_to("login"));
        }//

        

    }//end index


    public function registrar_usuario()
    {
        // d('registrando');
        //arreglo temporal
        $usuario = array();
        // $categoria["ATRIBUTO DATABASE"] = $this->request->getPost("NAMEFILEHTML");

        $usuario["estatus_usuario"] = ESTATUS_HABILITADO;
        $usuario["nombre_usuario"] = $this->request->getPost("nombre");
        $usuario["ap_usuario"] = $this->request->getPost("ap_paterno");
        $usuario["am_usuario"] = $this->request->getPost("ap_materno");
        $usuario["sexo_usuario"] = $this->request->getPost("sexo");
        $usuario["email_usuario"] = $this->request->getPost("correo_electronico");
        $usuario["password_usuario"] = hash("sha256", $this->request->getPost("password"));
        $usuario["imagen_usuario"] = $this->request->getPost("imagen_perfil");
        $usuario["id_rol"] = $this->request->getPost("rol");
        // dd($usuario);
        $tabla_usuarios = new \App\Models\Tabla_usuarios();
        if ($tabla_usuarios->create_data($usuario) > 0) {
            crear_mensaje("El usuario ha sido registrada de manera exitosa", "¡Petición exitosa!", TOASTR_SUCCESS);
            return redirect()->to(route_to("administracion_usuarios"));
        } else {
            crear_mensaje("Hubo un error al registrar el usuario", "¡Error interno!", TOASTR_DANGER);
            return redirect()->to(route_to("administracion_usuarios"));
        }
    }

    public function estatus($id_usuario = 0, $estatus = FALSE)
    {
        //Instancia del modelo Usuario
        $tabla_usuarios = new \App\Models\Tabla_usuarios;
        if ($tabla_usuarios->find($id_usuario) != null) {
            //---------------------
            //    UPDATE Usuario
            //---------------------
            if ($tabla_usuarios->update_data($id_usuario, ["estatus_usuario" => $estatus])) {
                crear_mensaje("El estatus del usuario ha sido actualizado", "¡Estatus actualizado!", TOASTR_SUCCESS);
            }//ende if
            else {
                crear_mensaje("Ocurrio un error al actualizar el estatus del usuario", "¡Error al Actualizar!", TOASTR_DANGER);
            }//end else
        }//end if
        else {
            crear_mensaje("El usuario no ha sido encontrado", "¡Oppss!", TOASTR_WARNING);
        }//end else
        return redirect()->to(route_to("administracion_usuarios"));
    }//end estatus



    public function eliminar($id_usuario = 0)
    {
        //Instancia del modelo Usuario
        $tabla_usuarios = new \App\Models\Tabla_usuarios;


        if ($tabla_usuarios->find($id_usuario) != null) {
            if ($tabla_usuarios->delete_data($id_usuario)) {
                crear_mensaje("El usuario ha sido eliminado de manera correcta", "¡Usuario eliminado!", TOASTR_SUCCESS);
            }//end if
            else {
                crear_mensaje("Error al eliminar este usuario", "¡Error al eliminar!!", TOASTR_DANGER);
            }//end else
        }//end if
        else {
            crear_mensaje("El usuario que solicitas no se encuentra en la BD", "Oppss!", TOASTR_WARNING);
        }//end else
        return redirect()->to(route_to("administracion_usuarios"));
    }//end eliminar

    public function obtener_datos_usuario($id_usuario = 0)
    {
        // Instancia del modelo Categoria
        $tabla_usuarios = new \App\Models\Tabla_usuarios;
        $usuario = $tabla_usuarios->get_user(['id_usuario' => $id_usuario]);
        // dd($categoria);
        if ($usuario != null) {
            return $this->response->setJSON(['data' => $usuario]);
        }//end if existe area
        else {
            return $this->response->setJSON(['data' => -1]);
        }//end else
    }//end obtener_datos_area

    public function actualizar()
    {
        // d($id_usuario);
        $id_usuario = $this->request->getPost("id_usuario");
        //Instancia del modelo Usuario
        $tabla_usuarios = new \App\Models\Tabla_usuarios;
        if ($tabla_usuarios->find($id_usuario) != null) {
            // dd("Proceso de actualización");
            //Arreglo Temporal
            $usuario = array();
            $usuario["nombre_usuario"] = $this->request->getPost("nombre");
            $usuario["ap_usuario"] = $this->request->getPost("ap_paterno");
            $usuario["am_usuario"] = $this->request->getPost("ap_materno");
            $usuario["sexo_usuario"] = $this->request->getPost("sexo");
            $usuario["email_usuario"] = $this->request->getPost("correo_electronico");
            $usuario["password_usuario"] = hash("sha256", $this->request->getPost("password"));
            $usuario["imagen_usuario"] = $this->request->getPost("imagen_perfil");
            $usuario["id_rol"] = $this->request->getPost("rol");

            //---------------------
            //    UPDATE 
            //---------------------
            if ($tabla_usuarios->update_data($id_usuario, $usuario)) {
                crear_mensaje("El usuario ha sido actualizado", "¡Actualización éxitosa!", TOASTR_SUCCESS);
                return $this->response->setJSON(['error' => 0]);
                // return $this->index();
            }//ende if
            else {
                crear_mensaje("Ocurrio un error al procesar la información al actualizar", "¡Error al Actualizar!", TOASTR_WARNING);
                return $this->response->setJSON(['error' => -1]);
                // return $this->index();
            }//end else

        }//end if
        else {
            crear_mensaje("El usuario que solicitas actualizar no se encuentra en la BD", "Oppss!", TOASTR_WARNING);
            return $this->index();
        }//end else
    }//end actualizar
}