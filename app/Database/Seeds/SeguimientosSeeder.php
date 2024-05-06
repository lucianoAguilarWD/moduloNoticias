<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeguimientosSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'accion' => 1,
            'motivo' => 'Se mando a corregir el titulo, porque es muy largo',
            'id_usuario' => 2,
            'id_noticia' => 1,
            'fechaCreacion' => date('Y-m-d H:i:s')
        ];
        $this->db->table('seguimientos')->insert($data);

        $data = [
            'accion' => 1,
            'motivo' => 'Se mando a corregir el titulo, porque es muy largo',
            'id_usuario' => 3,
            'id_noticia' => 2,
            'fechaCreacion' => date('Y-m-d H:i:s')
        ];
        $this->db->table('seguimientos')->insert($data);
    }
}
