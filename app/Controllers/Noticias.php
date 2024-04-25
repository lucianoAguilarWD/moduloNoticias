<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SeguimientosModel;
use App\Models\CategoriasModel;
use App\Models\NoticasModel;
use App\Models\UsuariosModel;

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
        $this->noticiasModel = new NoticasModel();
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
        return view('Noticias/mostrar', ['titulo' => 'Noticias Publicadas', 'layout' => 'layouts/layoutBase']);
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
        //
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
    }

    public function borrador()
    {
        //? muestra las noticias disponibles para editar
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
    }

}
