<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('categorias')->insert(['nombre' => 'Actualizaciones de productos']);
        $this->db->table('categorias')->insert(['nombre' => 'Tendencias tecnológicas']);
        $this->db->table('categorias')->insert(['nombre' => 'Análisis de mercado']);
        $this->db->table('categorias')->insert(['nombre' => 'Eventos y conferencias']);
        $this->db->table('categorias')->insert(['nombre' => 'Opinión y análisis']);
    }
}
