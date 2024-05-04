<?php

namespace App\Models;

use CodeIgniter\Model;

class BitacorasModel extends Model
{
    protected $table            = 'bitacoras';
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
}
