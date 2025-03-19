<?php

namespace App\Controllers\Usuario;

use App\Controllers\BaseController;
class Logout extends BaseController
{
    private $session = NULL;

    public function __construct()
    {
        $this->session = session();
    }
    public function index()
    {
        if (isset($this->session) && $this->session->get('sesion_iniciada') == TRUE) {
            $this->session->destroy();
            unset($this->session);
        }
        $this->session = NULL;
        return redirect()->to(route_to('login'));
    }
}