<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Usuarios extends BaseController
{
    public function __construct()
    {
        helper('form');
    }
    
    public function index()
    {
        //! view de inicio de sesion
        $data = [
            'titulo' => 'Iniciar Sesión'
        ];
        return view('Usuarios/login', $data);
    }

    public function login()
    {
        //* validacion de datos de formulario e inicio de la sesion
    }


     /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        //? muestra del formulario de creacion de usuario
        $data = [
            'titulo' => 'Crear Cuenta'
        ];
        return view('Usuarios/signup', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        //todo: validacion de formulario de creacion de usuario
    }
}
