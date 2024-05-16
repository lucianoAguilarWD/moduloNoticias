<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    public function run()
    {
        $usuario = "lucho";
        $hash = password_hash("lucho123", PASSWORD_BCRYPT);
        $rol = "0";
        $data = [
            'nombre' => $usuario,
            'contrasenia' => $hash,
            'rol' => $rol
        ];

        $this->db->table('usuarios')->insert($data);

        $usuario = "samus";
        $hash = password_hash("samus123", PASSWORD_BCRYPT);
        $rol = VALIDADOR;
        $data = [
            'nombre' => $usuario,
            'contrasenia' => $hash,
            'rol' => $rol
        ];

        $this->db->table('usuarios')->insert($data);

        $usuario = "pedro";
        $hash = password_hash("pedro123", PASSWORD_BCRYPT);
        $rol = AMBOS;
        $data = [
            'nombre' => $usuario,
            'contrasenia' => $hash,
            'rol' => $rol
        ];

        $this->db->table('usuarios')->insert($data);

        $usuario = "Alberto Gonzales";
        $hash = password_hash("alberto3344", PASSWORD_BCRYPT);
        $rol = EDITOR;
        $data = [
            'nombre' => $usuario,
            'contrasenia' => $hash,
            'rol' => $rol
        ];

        $this->db->table('usuarios')->insert($data);
    }
}
