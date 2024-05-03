<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BitacorasSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'titulo' => 'Lanzamiento del Nuevo Smartphone XYZ',
            'descripcion' => 'La empresa tecnológica XYZ ha presentado su último buque insignia, el Smartphone XYZ, que incorpora la tecnología 5G de última generación. Este dispositivo revolucionario promete velocidades de conexión ultrarrápidas, permitiendo a los usuarios disfrutar de descargas instantáneas, streaming sin interrupciones y una experiencia móvil superior. Además, el Smartphone XYZ cuenta con una cámara mejorada, una pantalla de alta resolución y una batería de larga duración, convirtiéndolo en una opción atractiva para los amantes de la tecnología móvil.',
            'estado' => 1,
            'activa' => 1,
            'id_categoria' => 1,
            'id_noticia' => 1
        ];
        $this->db->table('bitacoras')->insert($data);
    }
}
