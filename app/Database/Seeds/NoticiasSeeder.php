<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class NoticiasSeeder extends Seeder
{
    public function run()
    {
        //----------------------------------------------Publicadas-------------------------------------------------------//

        $fechaPublicacion = date('Y-m-d H:i:s');
        $data = [
            'version' => 3,
            'titulo' => 'Lanzamiento del Nuevo Smartphone XYZ con Tecnología 5G',
            'descripcion' => 'La empresa tecnológica XYZ ha presentado su último buque insignia, el Smartphone XYZ, que incorpora la tecnología 5G de última generación. Este dispositivo revolucionario promete velocidades de conexión ultrarrápidas, permitiendo a los usuarios disfrutar de descargas instantáneas, streaming sin interrupciones y una experiencia móvil superior. Además, el Smartphone XYZ cuenta con una cámara mejorada, una pantalla de alta resolución y una batería de larga duración, convirtiéndolo en una opción atractiva para los amantes de la tecnología móvil.',
            'imagen' => '1715826379_e0d2e05c4fdac8d1532a.jpg',
            'estado' => VALIDADA,
            'activa' => ACTIVA,
            'id_categoria' => 1,
            'id_usuario' => 1,
            'fechaCreacion' => date('Y-m-d H:i:s'),
            'fechaModificacion' => date('Y-m-d H:i:s'),
            'fechaPublicacion' => $fechaPublicacion,
            'fechaExpiracion' => date('Y-m-d H:i:s', strtotime($fechaPublicacion . TIEMPO_PUBLICACION))
        ];
        $this->db->table('noticias')->insert($data);

        $data = [
            'version' => 1,
            'titulo' => 'AMD Ryzen Pro',
            'descripcion' => 'Las tecnologías AMD PRO ofrecen niveles de protección y capacidad de rendimiento para empresas. ',
            'imagen' => '1715826464_d6a2d46a84054e0a6e6a.jpg',
            'estado' => VALIDADA,
            'activa' => ACTIVA,
            'id_categoria' => 2,
            'id_usuario' => 1,
            'fechaCreacion' => date('Y-m-d H:i:s'),
            'fechaModificacion' => date('Y-m-d H:i:s'),
            'fechaPublicacion' => $fechaPublicacion,
            'fechaExpiracion' => date('Y-m-d H:i:s', strtotime($fechaPublicacion . TIEMPO_PUBLICACION))
        ];
        $this->db->table('noticias')->insert($data);

        $data = [
            'version' => 1,
            'titulo' => 'Procesadores Intel Core Ultra',
            'descripcion' => 'Los nuevos procesadores Intel Core Ultra ya están disponibles en varios países, incluyendo México, Chile, Colombia y Perú.',
            'imagen' => '1715826327_22c861850670362411d0.jpg',
            'estado' => VALIDADA,
            'activa' => ACTIVA,
            'id_categoria' => 2,
            'id_usuario' => 3,
            'fechaCreacion' => date('Y-m-d H:i:s'),
            'fechaModificacion' => date('Y-m-d H:i:s'),
            'fechaPublicacion' => $fechaPublicacion,
            'fechaExpiracion' => date('Y-m-d H:i:s', strtotime($fechaPublicacion . TIEMPO_PUBLICACION))
        ];
        $this->db->table('noticias')->insert($data);

        $data = [
            'version' => 1,
            'titulo' => 'Qué pasa en tu cerebro cuando estás scrolleando tu celular y 3 consejos para evitar hacerlo compulsivamente',
            'descripcion' => 'Los cerebros buscan naturalmente ser recompensados. Existen ciertos centros neuronales que reaccionan al placer —el sexo, las drogas, ganar dinero en un casino— y buscan que se repita una y otra vez. “Están buscando esa novedad, ese próximo golpe de placer, lo que sea que podamos realmente disfrutar”, explica la profesora Duke.Es lo que se conoce como sistema o circuito de recompensa del cerebro, y es exactamente el mismo mecanismo por el que una persona se vuelve adicta a una sustancia como el alcohol.',
            'imagen' => '1715826397_21371cea4d8a9a6569ca.jpg',
            'estado' => VALIDADA,
            'activa' => ACTIVA,
            'id_categoria' => 5,
            'id_usuario' => 4,
            'fechaCreacion' => date('Y-m-d H:i:s'),
            'fechaModificacion' => date('Y-m-d H:i:s'),
            'fechaPublicacion' => $fechaPublicacion,
            'fechaExpiracion' => date('Y-m-d H:i:s', strtotime($fechaPublicacion . TIEMPO_PUBLICACION))
        ];
        $this->db->table('noticias')->insert($data);

        $data = [
            'version' => 1,
            'titulo' => 'La Inteligencia Artificial llegó a los procesadores AMD Ryzen',
            'descripcion' => 'AMD ha presentado los procesadores Ryzen AI Serie 8000 con inteligencia artificial. Estos procesadores móviles ya están integrados en equipos de cómputo Asus.',
            'estado' => VALIDADA,
            'activa' => ACTIVA,
            'id_categoria' => 2,
            'id_usuario' => 3,
            'fechaCreacion' => date('Y-m-d H:i:s'),
            'fechaModificacion' => date('Y-m-d H:i:s'),
            'fechaPublicacion' => $fechaPublicacion,
            'fechaExpiracion' => date('Y-m-d H:i:s', strtotime($fechaPublicacion . TIEMPO_PUBLICACION))
        ];
        $this->db->table('noticias')->insert($data);

        $data = [
            'version' => 1,
            'titulo' => 'CES 2024',
            'descripcion' => 'En la feria CES 2024, AMD aseguró que la tecnología de Ryzen AI ayudará a que el ecosistema siga creciendo.',
            'estado' => VALIDADA,
            'activa' => ACTIVA,
            'id_categoria' => 4,
            'id_usuario' => 4,
            'fechaCreacion' => date('Y-m-d H:i:s'),
            'fechaModificacion' => date('Y-m-d H:i:s'),
            'fechaPublicacion' => $fechaPublicacion,
            'fechaExpiracion' => date('Y-m-d H:i:s', strtotime($fechaPublicacion . TIEMPO_PUBLICACION))
        ];
        $this->db->table('noticias')->insert($data);

        $data = [
            'version' => 1,
            'titulo' => 'Riesgos para la salud',
            'descripcion' => 'Infórmate sobre los riesgos para la salud al usar computadoras y cómo proteger a los niños al utilizar dispositivos digitales desde temprana edad. ',
            'estado' => VALIDADA,
            'activa' => ACTIVA,
            'id_categoria' => 5,
            'id_usuario' => 1,
            'fechaCreacion' => date('Y-m-d H:i:s'),
            'fechaModificacion' => date('Y-m-d H:i:s'),
            'fechaPublicacion' => $fechaPublicacion,
            'fechaExpiracion' => date('Y-m-d H:i:s', strtotime($fechaPublicacion . TIEMPO_PUBLICACION))
        ];
        $this->db->table('noticias')->insert($data);

        $data = [
            'version' => 1,
            'titulo' => 'Nuevos iPad Pro',
            'descripcion' => 'Apple planea lanzar nuevos iPad Pro con tecnología Mini-Led y conector Thunderbolt. Estos dispositivos permiten cargar y conectar a otros dispositivos.',
            'estado' => VALIDADA,
            'activa' => ACTIVA,
            'id_categoria' => 1,
            'id_usuario' => 3,
            'fechaCreacion' => date('Y-m-d H:i:s'),
            'fechaModificacion' => date('Y-m-d H:i:s'),
            'fechaPublicacion' => $fechaPublicacion,
            'fechaExpiracion' => date('Y-m-d H:i:s', strtotime($fechaPublicacion . TIEMPO_PUBLICACION))
        ];
        $this->db->table('noticias')->insert($data);

        $data = [
            'version' => 2,
            'titulo' => 'Nuevos ',
            'descripcion' => 'Apple planea lanzar nuevos iPad ',
            'estado' => L_VALIDAR,
            'activa' => ACTIVA,
            'id_categoria' => 1,
            'id_usuario' => 3,
            'fechaCreacion' => '2024-05-08 18:55:52',
            'fechaModificacion' => '2024-05-08 18:55:52',
            'fechaPublicacion' => $fechaPublicacion,
            'fechaExpiracion' => date('Y-m-d H:i:s', strtotime($fechaPublicacion . TIEMPO_PUBLICACION))
        ];
        $this->db->table('noticias')->insert($data);

        //---------------------------------------------Borrador------------------------------------------------//

        $data = [
            'version' => 0,
            'titulo' => 'Google anuncia avances en inteligencia artificial para mejorar la accesibilidad en Android',
            'descripcion' => 'Google revela nuevas herramientas impulsadas por inteligencia artificial diseñadas para mejorar la accesibilidad en dispositivos Android. Estas innovaciones incluyen funciones de reconocimiento de voz mejoradas y capacidades de navegación simplificadas para usuarios con discapacidades visuales y motoras',
            'estado' => BORRADOR,
            'activa' => ACTIVA,
            'id_categoria' => 2,
            'id_usuario' => 1,
            'fechaCreacion' => date('Y-m-d H:i:s'),
            'fechaModificacion' => date('Y-m-d H:i:s'),
        ];
        $this->db->table('noticias')->insert($data);

        $data = [
            'version' => 0,
            'titulo' => 'Tesla presenta su nuevo modelo de automóvil eléctrico con tecnología de conducción autónoma avanzada',
            'descripcion' => 'Tesla desvela su último modelo de vehículo eléctrico, equipado con un sistema de conducción autónoma de próxima generación. Este sistema utiliza cámaras, radares y sensores ultrasonidos para proporcionar capacidades de conducción autónoma mejoradas, acercando un paso más la visión de la conducción totalmente autónoma',
            'estado' => BORRADOR,
            'activa' => ACTIVA,
            'id_categoria' => 2,
            'id_usuario' => 1,
            'fechaCreacion' => date('Y-m-d H:i:s'),
            'fechaModificacion' => date('Y-m-d H:i:s'),
        ];
        $this->db->table('noticias')->insert($data);

        $data = [
            'version' => 0,
            'titulo' => 'Amazon lanza su servicio de entrega con drones en áreas urbanas seleccionadas.',
            'descripcion' => 'Amazon inicia oficialmente su servicio de entrega con drones en ciertas áreas urbanas, permitiendo tiempos de entrega más rápidos y eficientes. Este innovador enfoque de logística promete revolucionar la industria del comercio electrónico y cambiar la forma en que se realizan las entregas a domicilio',
            'estado' => BORRADOR,
            'activa' => ACTIVA,
            'id_categoria' => 5,
            'id_usuario' => 1,
            'fechaCreacion' => date('Y-m-d H:i:s'),
            'fechaModificacion' => date('Y-m-d H:i:s'),
        ];
        $this->db->table('noticias')->insert($data);

        //-----------------------------------------a validarse------------------------------------------------------------------//

        $data = [
            'version' => 0,
            'titulo' => 'Facebook anuncia nuevas medidas de seguridad para proteger la privacidad de los usuarios',
            'descripcion' => 'Facebook introduce una serie de nuevas herramientas y políticas destinadas a fortalecer la privacidad y seguridad de los datos de sus usuarios. Estas medidas incluyen controles de privacidad más intuitivos, auditorías de seguridad más rigurosas y mayores restricciones sobre el uso de datos personales con fines publicitarios',
            'estado' => L_VALIDAR,
            'activa' => ACTIVA,
            'id_categoria' => 5,
            'id_usuario' => 1,
            'fechaCreacion' => date('Y-m-d H:i:s'),
            'fechaModificacion' => date('Y-m-d H:i:s'),
        ];
        $this->db->table('noticias')->insert($data);

        $data = [
            'version' => 0,
            'titulo' => 'Investigadores desarrollan una nueva vacuna contra el COVID-19 utilizando tecnología de ARN mensajero',
            'descripcion' => 'Científicos anuncian el desarrollo exitoso de una vacuna contra el COVID-19 basada en la tecnología de ARN mensajero. Esta vacuna promete una respuesta inmunitaria más robusta y una producción más rápida que las vacunas tradicionales, lo que podría revolucionar la forma en que se combaten las enfermedades infecciosas en el futuro.',
            'estado' => L_VALIDAR,
            'activa' => ACTIVA,
            'id_categoria' => 5,
            'id_usuario' => 3,
            'fechaCreacion' => date('Y-m-d H:i:s'),
            'fechaModificacion' => date('Y-m-d H:i:s'),
        ];
        $this->db->table('noticias')->insert($data);
        
    }
}
