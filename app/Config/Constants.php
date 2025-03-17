<?php

/*
 | --------------------------------------------------------------------
 | App Namespace
 | --------------------------------------------------------------------
 |
 | This defines the default Namespace that is used throughout
 | CodeIgniter to refer to the Application directory. Change
 | this constant to change the namespace that all application
 | classes should use.
 |
 | NOTE: changing this will require manually modifying the
 | existing namespaces of App\* namespaced-classes.
 */
defined('APP_NAMESPACE') || define('APP_NAMESPACE', 'App');

/*
 | --------------------------------------------------------------------------
 | Composer Path
 | --------------------------------------------------------------------------
 |
 | The path that Composer's autoload file is expected to live. By default,
 | the vendor folder is in the Root directory, but you can customize that here.
 */
defined('COMPOSER_PATH') || define('COMPOSER_PATH', ROOTPATH . 'vendor/autoload.php');

/*
 |--------------------------------------------------------------------------
 | Timing Constants
 |--------------------------------------------------------------------------
 |
 | Provide simple ways to work with the myriad of PHP functions that
 | require information to be in seconds.
 */
defined('SECOND') || define('SECOND', 1);
defined('MINUTE') || define('MINUTE', 60);
defined('HOUR')   || define('HOUR', 3600);
defined('DAY')    || define('DAY', 86400);
defined('WEEK')   || define('WEEK', 604800);
defined('MONTH')  || define('MONTH', 2592000);
defined('YEAR')   || define('YEAR', 31536000);
defined('DECADE') || define('DECADE', 315360000);

/*
 | --------------------------------------------------------------------------
 | Exit Status Codes
 | --------------------------------------------------------------------------
 |
 | Used to indicate the conditions under which the script is exit()ing.
 | While there is no universal standard for error codes, there are some
 | broad conventions.  Three such conventions are mentioned below, for
 | those who wish to make use of them.  The CodeIgniter defaults were
 | chosen for the least overlap with these conventions, while still
 | leaving room for others to be defined in future versions and user
 | applications.
 |
 | The three main conventions used for determining exit status codes
 | are as follows:
 |
 |    Standard C/C++ Library (stdlibc):
 |       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
 |       (This link also contains other GNU-specific conventions)
 |    BSD sysexits.h:
 |       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
 |    Bash scripting:
 |       http://tldp.org/LDP/abs/html/exitcodes.html
 |
 */
defined('EXIT_SUCCESS')        || define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          || define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         || define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   || define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  || define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') || define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     || define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       || define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      || define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      || define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

//Constantes para el panel de administracion
define('RECURSOS_PANEL_CSS', 'recursos_panel/css/');
define('RECURSOS_PANEL_JS', 'recursos_panel/js/');
define('RECURSOS_PANEL_IMG', 'recursos_panel/img/');
define('RECURSOS_PANEL_FONTS', 'recursos_panel/fonts/');

//Constantes para el portal
define('RECURSOS_PORTAL_CSS', 'recursos_portal/css/');
define('RECURSOS_PORTAL_FONTS', 'recursos_portal/fonts/');
define('RECURSOS_PORTAL_ICON', 'recursos_portal/icon/');
define('RECURSOS_PORTAL_IMAGES', 'recursos_portal/images/');
define('RECURSOS_PORTAL_JS', 'recursos_portal/js/');

//Constantes para el login
define('RECURSOS_LOGIN_CSS', 'recursos_login/css/');
define('RECURSOS_LOGIN_FONTS', 'recursos_login/fonts/');
define('RECURSOS_LOGIN_IMAGES', 'recursos_login/images/');
define('RECURSOS_LOGIN_JS', 'recursos_login/js/');
define('RECURSOS_LOGIN_VENDOR', 'recursos_login/vendor/');



//=================================ESTATUS======================================
//Habilitado/Deshabilitado
define("ESTATUS_HABILITADO", 1);     //In JS = E_H
define("ESTATUS_DESHABILITADO", -1); //In JS = E_D

//SEXOS
define("SEXO_FEMENINO", 0); //In JS = S_F
define("SEXO_MASCULINO", 1); //In JS = S_M

//******************************************************************************
//**************************** TAREAS DEL USUARIO ******************************
//******************************************************************************

//LOGIN Y LOGOUT
define("TAREA_LOGIN", "tarea_login");
define("TAREA_LOGOUT", "tarea_logout");

//TAREAS PROPIAS DEL USUARIO
define("TAREA_USUARIO_PERFIL", "tarea_usuario_perfil");
define("TAREA_USUARIO_PASSWORD", "tarea_usuario_password");

//******************************************************************************
//ROLES
define("ROL_ADMIN", array('nombre' => 'Admininistrador', 'clave' => '745'));
define("ROL_OPERADOR", array('nombre' => 'Operador', 'clave' => '125'));
define("ROL_USUARIO", array('nombre' => 'Usuario', 'clave' => '123'));

//******************************************************************************
//***************************** PERMISOS DE LOS ROLES **************************
//******************************************************************************
define(
    "PERMISOS_ADMIN",
    array(


        )
    );

define(
    "PERMISOS_OPERADOR",
    array(   

        )
    );
    

define(
    "PERMISOS_USUARIO",
    array(   

        )
    );