<?php

namespace App\Models;

use CodeIgniter\Model;

class RespaldosModel extends Model
{
    protected $table            = 'respaldos';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'titulo', 'descripcion', 'imagen', 'estado', 'activa', 'fechaPublicacion', 'fechaExpiracion', 'id_categoria', 'id_noticia'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = false;


    public function respaldoNoticia($idNoticia)
    {
        return $this->select('respaldos.*')
            ->join('noticias', 'respaldos.id_noticia = noticias.id')
            ->where('id_noticia', $idNoticia)
            ->find();
    }

}
