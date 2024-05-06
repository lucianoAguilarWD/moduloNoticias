<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    public function run()
    {
        $usuario = "lucho";
        $hash = password_hash("lucho", PASSWORD_BCRYPT);
        $rol = "0";
        $data = [
            'nombre' => $usuario,
            'contrasenia' => $hash,
            'rol' => $rol
        ];

        $this->db->table('usuarios')->insert($data);

        $usuario = "samus";
        $hash = password_hash("samus", PASSWORD_BCRYPT);
        $rol = VALIDADOR;
        $data = [
            'nombre' => $usuario,
            'contrasenia' => $hash,
            'rol' => $rol
        ];

        $this->db->table('usuarios')->insert($data);
    }
}
