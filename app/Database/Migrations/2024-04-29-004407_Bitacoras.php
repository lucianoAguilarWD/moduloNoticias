<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Bitacoras extends Migration
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
            'titulo' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'descripcion' => [
                'type' => 'TINYTEXT',
            ],
            'imagen' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true
            ],
            'activa' => [
                'type' => 'Int',
                'constraint' => 11,
            ],
            'fechaCreacion' => [
                'type' => 'DATETIME',
            ],
            'id_noticia' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_noticia', 'noticias', 'id');
        $this->forge->createTable('bitacoras');
    }

    public function down()
    {
        $this->forge->dropTable('bitacoras');
    }
}
