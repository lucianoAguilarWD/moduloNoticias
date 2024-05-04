<?php

namespace App\Models;

use CodeIgniter\Model;

class NoticiasModel extends Model
{
    protected $table            = 'noticias';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'version', 'titulo', 'descripcion', 'imagen', 'estado', 'activa', 'fechaPublicacion', 'fechaExpiracion', 'id_usuario', 'id_categoria'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'fechaCreacion';
    protected $updatedField  = 'fechaModificacion';
    protected $deletedField  = 'descartado';


    public function noticiasCategorias()
    {
        return $this->select('noticias.*, categorias.nombre AS categorias')
            ->join('categorias', 'noticias.id_categoria = categorias.id')
            ->findAll();
    }

    public function noticiaCategoria($id)
    {
        return $this->select('noticias.*, categorias.nombre AS categoria')
            ->join('categorias', 'noticias.id_categoria = categorias.id')
            ->find($id);
    }

    public function noticiasPorEstado($nombre, $estado)
    {
        return $this->select('noticias.*, categorias.nombre AS categorias, usuarios.nombre AS usuario')
            ->join('categorias', 'noticias.id_categoria = categorias.id')
            ->join('usuarios', 'noticias.id_usuario = usuarios.id')
            ->where('usuarios.nombre', $nombre)
            ->where('estado', $estado)
            ->where('activa', ACTIVA)
            ->findAll();
    }

    public function noticiasDesactivadas($nombre)
    {
        return $this->select('noticias.*, categorias.nombre AS categorias, usuarios.nombre AS usuario')
            ->join('categorias', 'noticias.id_categoria = categorias.id')
            ->join('usuarios', 'noticias.id_usuario = usuarios.id')
            ->where('usuarios.nombre', $nombre)
            ->where('activa', DESACTIVADA)
            ->findAll();
    }

    public function noticiasPublicadasUser($nombre)
    {
        return $this->select('noticias.*, categorias.nombre AS categorias, usuarios.nombre AS usuario')
            ->join('categorias', 'noticias.id_categoria = categorias.id')
            ->join('usuarios', 'noticias.id_usuario = usuarios.id')
            ->where('usuarios.nombre', $nombre)
            ->where('fechaPublicacion IS NOT NULL')
            ->findAll();
    }

    public function noticiasPublicadas(){
        return $this->select('noticias.*, categorias.nombre AS categorias')
            ->join('categorias', 'noticias.id_categoria = categorias.id')
            ->where('fechaPublicacion IS NOT NULL')
            ->findAll();
    }
    

}
