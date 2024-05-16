<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RespaldosSeeder extends Seeder
{
    public function run()
    {
        $fechaPublicacion = date('Y-m-d H:i:s');
        $data = [
            'titulo' => 'Lanzamiento del Nuevo Smartphone XYZ',
            'descripcion' => 'La empresa tecnológica XYZ ha presentado su último buque insignia, el Smartphone XYZ, que incorpora la tecnología 5G de última generación. Este dispositivo revolucionario promete velocidades de conexión ultrarrápidas, permitiendo a los usuarios disfrutar de descargas instantáneas, streaming sin interrupciones y una experiencia móvil superior. Además, el Smartphone XYZ cuenta con una cámara mejorada, una pantalla de alta resolución y una batería de larga duración, convirtiéndolo en una opción atractiva para los amantes de la tecnología móvil.',
            'imagen' => '1714697566_4e6b644b9616f57325f1.jpg',
            'estado' => VALIDADA,
            'activa' => ACTIVA,
            'id_categoria' => 1,
            'id_noticia' => 1,
            'fechaPublicacion' => $fechaPublicacion,
            'fechaExpiracion' => date('Y-m-d H:i:s', strtotime($fechaPublicacion . TIEMPO_PUBLICACION))
        ];
        $this->db->table('respaldos')->insert($data);

        $data = [
            'titulo' => 'Nuevos iPad Pro',
            'descripcion' => 'Apple planea lanzar nuevos iPad Pro con tecnología Mini-Led y conector Thunderbolt. Estos dispositivos permiten cargar y conectar a otros dispositivos. La evolución de la manzanita.',
            'estado' => VALIDADA,
            'activa' => ACTIVA,
            'id_categoria' => 1,
            'id_noticia' => 8,
            'fechaPublicacion' => $fechaPublicacion,
            'fechaExpiracion' => date('Y-m-d H:i:s', strtotime($fechaPublicacion . TIEMPO_PUBLICACION))
        ];
        $this->db->table('respaldos')->insert($data);
    }
}
