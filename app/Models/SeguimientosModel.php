<?php

namespace App\Models;

use CodeIgniter\Model;

class SeguimientosModel extends Model
{
    protected $table            = 'seguimientos';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'accion', 'motivo', 'id_usuario', 'id_noticia'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'fechaCreacion';
    protected $updatedField  = '';
    protected $deletedField  = '';


    public function seguimientosNoticiasUser($nombre)
    {
        return $this->select('seguimientos.*, noticias.titulo AS noticiaT, noticias.id AS noticiaI, usuarios.nombre AS usuario')
            ->join('noticias', 'seguimientos.id_noticia = noticias.id')
            ->join('usuarios', 'seguimientos.id_usuario = usuarios.id')
            ->where('usuarios.nombre', $nombre)
            ->where('noticias.id_usuario != usuarios.id')
            ->findAll();
    }

}
