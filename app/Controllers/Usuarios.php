<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\UsuariosModel;

class Usuarios extends BaseController
{
    private $usuariosModel;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->usuariosModel = new UsuariosModel();
    }

    public function index()
    {
        //? view de inicio de sesion
        if ($this->session->rol === null) {
            return view('Usuarios/login', ['titulo' => 'Iniciar Sesión', 'layout' => 'layouts/layoutUsuarios']);
        } else {
            return redirect()->to('noticias');
        }
    }

    public function login()
    {
        //? Validación de datos de formulario e inicio de la sesión

        $reglas = [
            'nombre' => [
                'label' => 'Usuario',
                'rules' => 'required|validationUser',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                    'validationUser' => 'Usuario no encontrado'
                ]
            ],
            'pw' => [
                'label' => 'Contraseña',
                'rules' => 'required|validationPassword',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                    'validationPassword' => 'Contraseña incorrecta'
                ]
            ]
        ];

        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput('error', $this->validator->listErrors());
        }

        $usuario = $this->request->getPost('nombre');

        if (is_string($usuario)) {
            $usuarioBuscado = $this->usuariosModel->find_by_name($usuario);
            //todo: datos para la sesión
            $data = [
                'usuario' => trim($usuarioBuscado['nombre']),
                'rol' => intval($usuarioBuscado['rol'])
            ];
            //* Creamos la sesión
            $this->session->set($data);

            return redirect()->to('noticias');
        }
    }



    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        //* muestra del formulario de creacion de usuario
        if ($this->session->rol === null) {
            return view('Usuarios/signup',  ['titulo' => 'Crear Cuenta', 'layout' => 'layouts/layoutUsuarios']);
        } else {
            return redirect()->to('noticias');
        }
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        //* validación del formulario de creacion de usuario
        $reglas = [
            'nombre' => [
                'label' => 'Usuario',
                'rules' => 'required|is_unique[usuarios.nombre]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                    'is_unique' => 'Ese nombre de usuario ya está en uso. Prueba con otro'
                ]
            ],
            'pw' => [
                'label' => 'Contraseña',
                'rules' => 'required|min_length[6]|max_length[60]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                    'min_length' => 'El campo {field} debe tener al menos {param} caracteres.',
                    'max_length' => 'El campo {field} no puede exceder los {param} caracteres.'
                ]
            ],

            'pwc' => [
                'label' => 'Confirmar Contraseña',
                'rules' => 'required|matches[pw]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                    'matches' => 'Las contraseñas no coinciden. Intenta nuevamente'
                ]
            ],

            'rol' => [
                'label' => 'Rol',
                'rules' => 'required|in_list[0,1,2]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                ]
            ]
        ];

        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput('error', $this->validator->listErrors());
        }

        $post = $this->request->getPost(['nombre', 'pw', 'rol']);

        $this->usuariosModel->insert([
            'nombre' => trim($post['nombre']),
            'contrasenia' => password_hash($post['pw'], PASSWORD_BCRYPT),
            'rol' => intval($post['rol'])
        ]);

        //todo: datos para la sesión
        $data = [
            'usuario' => trim($post['nombre']),
            'rol' => intval($post['rol'])
        ];
        //* Creamos la sesión
        $this->session->set($data);

        return redirect()->to('noticias');
    }

    public function logOut()
    {
        if ($this->session->rol !== null) {
            $this->session->destroy();
            return redirect()->to('noticias');
        }
    }
}
