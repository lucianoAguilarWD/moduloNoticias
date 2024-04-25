<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('categorias')->insert(['nombre' => 'categoria 1']);
        $this->db->table('categorias')->insert(['nombre' => 'categoria 2']);
        $this->db->table('categorias')->insert(['nombre' => 'categoria 3']);
        $this->db->table('categorias')->insert(['nombre' => 'categoria 4']);
        $this->db->table('categorias')->insert(['nombre' => 'categoria 5']);
    }
}
