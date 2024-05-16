<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Noticias extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'version' => [
                'type' => 'INT',
                'constraint' => 255,
            ],
            'titulo' => [
                'type' => 'VARCHAR',
                'constraint' => 150
            ],
            'descripcion' => [
                'type' => 'VARCHAR',
                'constraint' => 1000
            ],
            'imagen' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
                'null' => true
            ],
            'estado' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'activa' => [
                'type' => 'Int',
                'constraint' => 11,
            ],
            'fechaPublicacion' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'fechaExpiracion' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'fechaCreacion' => [
                'type' => 'DATETIME',
            ],
            'fechaModificacion' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'descartado' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'id_categoria' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'id_usuario' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_categoria', 'categorias', 'id');
        $this->forge->addForeignKey('id_usuario', 'usuarios', 'id');
        $this->forge->createTable('noticias');
    }

    public function down()
    {
        $this->forge->dropTable('noticias');
    }
}
