<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class NoticiasSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'titulo' => 'booca',
            'descripcion' => 'El unico grande',
            'estado' => 1,
            'activa' => 1,
            'id_categoria' => 1,
            'id_usuario' => 1
        ];
        $this->db->table('noticias')->insert($data);
    }
}
