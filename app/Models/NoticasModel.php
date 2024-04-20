<?php

namespace App\Models;

use CodeIgniter\Model;

class NoticasModel extends Model
{
    protected $table            = 'noticas';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['titulo', 'descripcion', 'estado', 'validada', 'imagen', 'fechaPublicacion', 'fechaExpiracion', 'id_usuario'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'fechaCreacion';
    protected $deletedField  = 'activa';

}
