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
    protected $allowedFields    = ['id', 'titulo', 'descripcion', 'imagen', 'activa', 'id_noticia'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'fechaCreacion';
    protected $updatedField  = '';
    protected $deletedField  = '';

}
