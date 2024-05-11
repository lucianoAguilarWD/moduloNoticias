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
    protected $allowedFields    = ['id', 'accion', 'antes', 'despues', 'motivo', 'id_usuario', 'id_noticia'];

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
        $subquery = $this->select('MAX(seguimientos.fechaCreacion) as max_fechaCreacion')
            ->join('noticias', 'seguimientos.id_noticia = noticias.id')
            ->join('usuarios', 'seguimientos.id_usuario = usuarios.id')
            ->where('usuarios.nombre', $nombre)
            ->groupBy('seguimientos.id_noticia')
            ->findAll();

        $fechas = array_column($subquery, 'max_fechaCreacion');

        return $this->select('seguimientos.*, noticias.titulo AS noticiaT, noticias.id AS noticiaI, noticias.version AS version, noticias.estado AS estado , noticias.fechaPublicacion AS publicacion, usuarios.nombre AS usuario')
            ->join('noticias', 'seguimientos.id_noticia = noticias.id')
            ->join('usuarios', 'seguimientos.id_usuario = usuarios.id')
            ->where('usuarios.nombre', $nombre)
            ->where('noticias.id_usuario != usuarios.id')
            ->whereIn('seguimientos.fechaCreacion', $fechas)
            ->findAll();
    }

    public function seguimientosUserRechazo($nombre, $noticia)
    {
        return $this->select('seguimientos.*, noticias.titulo AS noticiaT, noticias.id AS noticiaI, usuarios.nombre AS usuario')
            ->join('noticias', 'seguimientos.id_noticia = noticias.id')
            ->join('usuarios', 'seguimientos.id_usuario = usuarios.id')
            ->where('usuarios.nombre', $nombre)
            ->where('noticias.id', $noticia)
            ->where('noticias.id_usuario != usuarios.id')
            ->findAll();
    }

    public function seguimientosNoticia($id)
    {
        return $this->select('seguimientos.*, noticias.titulo AS noticia, noticias.estado AS estado')
            ->join('noticias', 'seguimientos.id_noticia = noticias.id')
            ->where('noticias.id', $id)
            ->findAll();
    }
}
