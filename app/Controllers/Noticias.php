<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SeguimientosModel;
use App\Models\CategoriasModel;
use App\Models\NoticiasModel;
use App\Models\UsuariosModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Noticias extends BaseController
{
    private $usuariosModel;
    private $categoriasModel;
    private $noticiasModel;
    private $seguimientosModel;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->usuariosModel = new UsuariosModel();
        $this->categoriasModel = new CategoriasModel();
        $this->noticiasModel = new NoticiasModel();
        $this->seguimientosModel = new SeguimientosModel();
    }
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        //? Muestra de todas las noticias publicadas
        $noticias = $this->noticiasModel->findAll();

        $data = [
            'noticias' => $noticias,
            'titulo' => 'Noticias Publicadas',
            'layout' => 'layouts/layoutBase'
        ];

        return view('Noticias/index', $data);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        $noticia = $this->noticiasModel->find($id);


        if (empty($noticia)) {
            throw new PageNotFoundException('Cannot find the news item: ' . $id);
        }

        $data = [
            'noticia' => $noticia,
            'titulo' => $noticia['titulo'],
            'layout' => 'layouts/layoutBase'
        ];

        return view('Noticias/mostrar', $data);
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        //TODO: crear una una noticia
        $data = [
            'categorias' => $this->categoriasModel->findAll(),
            'titulo' => 'Crear noticia',
            'layout' => 'layouts/layoutBase'
        ];

        return view('Noticias/nuevo', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        //TODO: validación e inserción de la noticia

        //? ------------------------- CRUD ----------------------------

        $reglas = [
            'titulo' => [
                'label' => 'Titulo',
                'rules' => 'required|max_length[50]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                    'max_length' => 'El campo {field} no puede exceder los {param} caracteres.'
                ]
            ],

            'desc' => [
                'label' => 'Descripción',
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                    'max_length' => 'El campo {field} no puede exceder los {param} caracteres.'
                ]
            ],

            'archivo' => [
                'label' => 'Selecciona una imagen',
                'rules' => [
                    'uploaded[archivo]',
                    'is_image[archivo]',
                    'mime_in[archivo,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_size[archivo,1000]',
                    'max_dims[archivo,1920,1080]',
                ],
            ],

            'categoria' => [
                'label' => 'Seleccione una categoria',
                'rules' => 'required|in_list[1,2,3,4,5]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                ]
            ]
        ];

        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput('error', $this->validator->listErrors());
        }

        $file = $this->request->getFile('archivo');
        $newName = $file->getRandomName();

        if (!$file->hasMoved()) {
            $filepath = ROOTPATH.'public/uploads/';
            

            $file->move($filepath, $newName);
        }



        $post = $this->request->getPost(['titulo', 'desc', 'categoria']);

        $this->noticiasModel->insert([
            'titulo' => trim($post['titulo']),
            'descripcion' => trim($post['desc']),
            'estado' => 1,
            'imagen' => $newName,
            'id_categoria' => intval($post['categoria']),
            'id_usuario' => 1
        ]);
        return redirect()->to('noticias');
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        //? Editar una noticia seleccionada

        $data = [
            'categorias' => $this->categoriasModel->findAll(),
            'noticia' => $this->noticiasModel->find($id),
            'titulo' => 'Editar noticia',
            'layout' => 'layouts/layoutBase'
        ];

        return view('Noticias/editar', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        //? validación y modificación de la noticia

        if (!$this->request->is('put') || $id == null) {
            return redirect()->route('empleados');
        }


        $reglas = [
            'titulo' => [
                'label' => 'Titulo',
                'rules' => 'required|max_length[50]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                    'max_length' => 'El campo {field} no puede exceder los {param} caracteres.'
                ]
            ],

            'desc' => [
                'label' => 'Descripción',
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                    'max_length' => 'El campo {field} no puede exceder los {param} caracteres.'
                ]
            ],

            'archivo' => [
                'label' => 'Selecciona una imagen',
                'rules' => [
                    'uploaded[archivo]',
                    'is_image[archivo]',
                    'mime_in[archivo,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_size[archivo,1000]',
                    'max_dims[archivo,1920,1080]',
                ],
            ],

            'categoria' => [
                'label' => 'Seleccione una categoria',
                'rules' => 'required|in_list[1,2,3,4,5]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio',
                ]
            ]
        ];

        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput('error', $this->validator->listErrors());
        }

        $file = $this->request->getFile('archivo');
        $newName = $file->getRandomName();
        
        if (!$file->hasMoved()) {
            $filepath = ROOTPATH.'public/uploads/';
            

            $file->move($filepath, $newName);
        }



        $post = $this->request->getPost(['titulo', 'desc', 'categoria']);

        $this->noticiasModel->update($id,[
            'titulo' => trim($post['titulo']),
            'descripcion' => trim($post['desc']),
            'estado' => 1,
            'imagen' => $newName,
            'id_categoria' => intval($post['categoria']),
            'id_usuario' => 1
        ]);
        return redirect()->to('noticias');
    }


    public function delete($id = null)
    {
        if (!$this->request->is('delete') || $id == null) {
            return redirect()->route('noticias');
        }

        $this->noticiasModel->delete($id);

        return redirect()->to('noticias');
    }

    //? -----------------------------------------------------------------------

    //*------------------------ Requerimentos ---------------------------------

    public function borrador()
    {
        //? muestra las noticias disponibles para editar
    }


}
