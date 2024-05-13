<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PublicarAutomaticamente extends Migration
{
    public function up()
    {
        $this->db->query("
            CREATE EVENT publicar_automaticamente
            ON SCHEDULE EVERY 1 DAY
            STARTS CURRENT_TIMESTAMP
            ON COMPLETION NOT PRESERVE
            DO
            BEGIN
                UPDATE noticias
                SET fechaPublicacion = CURDATE(), fechaExpiracion = DATE_ADD(CURDATE(), INTERVAL 5 DAY)
                WHERE estado = 1 AND DATEDIFF(CURDATE(), fechaRegistro) >= 5;
            END;
        ");
    }

    public function down()
    {
        $this->db->query("
            DROP EVENT IF EXISTS publicar_automaticamente;
        ");
    }
}
