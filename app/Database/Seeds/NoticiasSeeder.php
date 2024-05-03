<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class NoticiasSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'titulo' => 'Lanzamiento del Nuevo Smartphone XYZ con Tecnología 5G',
            'descripcion' => 'La empresa tecnológica XYZ ha presentado su último buque insignia, el Smartphone XYZ, que incorpora la tecnología 5G de última generación. Este dispositivo revolucionario promete velocidades de conexión ultrarrápidas, permitiendo a los usuarios disfrutar de descargas instantáneas, streaming sin interrupciones y una experiencia móvil superior. Además, el Smartphone XYZ cuenta con una cámara mejorada, una pantalla de alta resolución y una batería de larga duración, convirtiéndolo en una opción atractiva para los amantes de la tecnología móvil.',
            'estado' => 1,
            'activa' => 1,
            'id_categoria' => 1,
            'id_usuario' => 1,
            'fechaCreacion' => date('Y-m-d H:i:s'),
            'fechaModificacion' => date('Y-m-d H:i:s')
        ];
        $this->db->table('noticias')->insert($data);
    }
}
