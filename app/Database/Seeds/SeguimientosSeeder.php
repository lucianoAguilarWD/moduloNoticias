<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeguimientosSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'accion' => A_CORREGIR,
            'antes' => 'validandose',
            'despues' => 'a corregir',
            'motivo' => 'El titulo es demasiado largo.',
            'id_usuario' => 3,
            'id_noticia' => 1,
            'fechaCreacion' => date('Y-m-d H:i:s')
        ];
        $this->db->table('seguimientos')->insert($data);

        $data = [
            'accion' => 0,
            'antes' => 'Titulo: Lanzamiento del Nuevo Smartphone XYZ con Tecnología 5G | Descripción: La empresa tecnológica XYZ ha presentado su último buque insignia, el Smartphone XYZ, que incorpora la tecnología 5G de última generación. Este dispositivo revolucionario promete velocidades de conexión ultrarrápidas, permitiendo a los usuarios disfrutar de descargas instantáneas, streaming sin interrupciones y una experiencia móvil superior. Además, el Smartphone XYZ cuenta con una cámara mejorada, una pantalla de alta resolución y una batería de larga duración, convirtiéndolo en una opción atractiva para los amantes de la tecnología móvil. | Estado: A corregir | Imagen: Mantuvo imagen | Categoria: Actualizaciones de productos',
            'despues' => 'Titulo: Lanzamiento del Nuevo Smartphone XYZ | Descripción: La empresa tecnológica XYZ ha presentado su último buque insignia, el Smartphone XYZ, que incorpora la tecnología 5G de última generación. Este dispositivo revolucionario promete velocidades de conexión ultrarrápidas, permitiendo a los usuarios disfrutar de descargas instantáneas, streaming sin interrupciones y una experiencia móvil superior. Además, el Smartphone XYZ cuenta con una cámara mejorada, una pantalla de alta resolución y una batería de larga duración, convirtiéndolo en una opción atractiva para los amantes de la tecnología móvil. | Estado: A corregir | Imagen: Mantuvo imagen | Categoria: Actualizaciones de productos',
            'id_usuario' => 1,
            'id_noticia' => 1,
            'fechaCreacion' => date('Y-m-d H:i:s')
        ];
        $this->db->table('seguimientos')->insert($data);

        $data = [
            'accion' => 2,
            'antes' => 'validandose',
            'despues' => 'válido/público',
            'id_usuario' => 3,
            'id_noticia' => 1,
            'fechaCreacion' => date('Y-m-d H:i:s')
        ];
        $this->db->table('seguimientos')->insert($data);

        $data = [
            'accion' => 2,
            'antes' => 'validandose',
            'despues' => 'válido/público',
            'id_usuario' => 3,
            'id_noticia' => 2,
            'fechaCreacion' => date('Y-m-d H:i:s')
        ];
        $this->db->table('seguimientos')->insert($data);

        $data = [
            'accion' => 2,
            'antes' => 'validandose',
            'despues' => 'válido/público',
            'id_usuario' => 2,
            'id_noticia' => 3,
            'fechaCreacion' => date('Y-m-d H:i:s')
        ];
        $this->db->table('seguimientos')->insert($data);

        $data = [
            'accion' => 2,
            'antes' => 'validandose',
            'despues' => 'válido/público',
            'id_usuario' => 2,
            'id_noticia' => 4,
            'fechaCreacion' => date('Y-m-d H:i:s')
        ];
        $this->db->table('seguimientos')->insert($data);

        $data = [
            'accion' => 2,
            'antes' => 'validandose',
            'despues' => 'válido/público',
            'id_usuario' => 2,
            'id_noticia' => 5,
            'fechaCreacion' => date('Y-m-d H:i:s')
        ];
        $this->db->table('seguimientos')->insert($data);

        $data = [
            'accion' => 2,
            'antes' => 'validandose',
            'despues' => 'válido/público',
            'id_usuario' => 2,
            'id_noticia' => 6,
            'fechaCreacion' => date('Y-m-d H:i:s')
        ];
        $this->db->table('seguimientos')->insert($data);

        $data = [
            'accion' => 2,
            'antes' => 'validandose',
            'despues' => 'válido/público',
            'id_usuario' => 2,
            'id_noticia' => 7,
            'fechaCreacion' => date('Y-m-d H:i:s')
        ];
        $this->db->table('seguimientos')->insert($data);

        $data = [
            'accion' => 0,
            'antes' => 'Titulo: Nuevos iPad Pro | Descripción: Apple planea lanzar nuevos iPad Pro con tecnología Mini-Led y conector Thunderbolt. Estos dispositivos permiten cargar y conectar a otros dispositivos. | Estado: borrador | Imagen: No tiene imagen | Categoria: Actualizaciones de productos',
            'despues' => 'Titulo: Nuevos iPad Pro | Descripción: Apple planea lanzar nuevos iPad Pro con tecnología Mini-Led y conector Thunderbolt. Estos dispositivos permiten cargar y conectar a otros dispositivos. La evolución de la manzanita. | Estado: validandose | Imagen: Mantuvo | Categoria: Actualizaciones de productos',
            'id_usuario' => 3,
            'id_noticia' => 8,
            'fechaCreacion' => date('Y-m-d H:i:s')
        ];
        $this->db->table('seguimientos')->insert($data);

        $data = [
            'accion' => 2,
            'antes' => 'validandose',
            'despues' => 'válido/público',
            'id_usuario' => 2,
            'id_noticia' => 8,
            'fechaCreacion' => date('Y-m-d H:i:s')
        ];
        $this->db->table('seguimientos')->insert($data);
    }
}
