-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 21-05-2024 a las 21:46:35
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `modulonoticias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Actualizaciones de productos'),
(3, 'Análisis de mercado'),
(4, 'Eventos y conferencias'),
(5, 'Opinión y análisis'),
(2, 'Tendencias tecnológicas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(13, '2024-04-19-192251', 'App\\Database\\Migrations\\Usuarios', 'default', 'App', 1716320711, 1),
(14, '2024-04-19-192352', 'App\\Database\\Migrations\\Categorias', 'default', 'App', 1716320711, 1),
(15, '2024-04-19-193938', 'App\\Database\\Migrations\\Noticias', 'default', 'App', 1716320711, 1),
(16, '2024-04-19-195841', 'App\\Database\\Migrations\\Seguimientos', 'default', 'App', 1716320711, 1),
(17, '2024-04-29-004407', 'App\\Database\\Migrations\\Respaldos', 'default', 'App', 1716320711, 1),
(18, '2024-05-11-211848', 'App\\Database\\Migrations\\PublicarAutomaticamente', 'default', 'App', 1716320711, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) UNSIGNED NOT NULL,
  `version` int(255) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `imagen` varchar(150) DEFAULT NULL,
  `estado` int(11) NOT NULL,
  `activa` int(11) NOT NULL,
  `fechaPublicacion` datetime DEFAULT NULL,
  `fechaExpiracion` datetime DEFAULT NULL,
  `fechaCreacion` datetime NOT NULL,
  `fechaModificacion` datetime DEFAULT NULL,
  `descartado` datetime DEFAULT NULL,
  `id_categoria` int(11) UNSIGNED NOT NULL,
  `id_usuario` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `version`, `titulo`, `descripcion`, `imagen`, `estado`, `activa`, `fechaPublicacion`, `fechaExpiracion`, `fechaCreacion`, `fechaModificacion`, `descartado`, `id_categoria`, `id_usuario`) VALUES
(1, 3, 'Lanzamiento del Nuevo Smartphone XYZ con Tecnología 5G', 'La empresa tecnológica XYZ ha presentado su último buque insignia, el Smartphone XYZ, que incorpora la tecnología 5G de última generación. Este dispositivo revolucionario promete velocidades de conexión ultrarrápidas, permitiendo a los usuarios disfrutar de descargas instantáneas, streaming sin interrupciones y una experiencia móvil superior. Además, el Smartphone XYZ cuenta con una cámara mejorada, una pantalla de alta resolución y una batería de larga duración, convirtiéndolo en una opción atractiva para los amantes de la tecnología móvil.', '1715826379_e0d2e05c4fdac8d1532a.jpg', 4, 1, '2024-05-21 16:45:39', '2024-05-26 16:45:39', '2024-05-21 16:45:39', '2024-05-21 16:45:39', NULL, 1, 1),
(2, 1, 'AMD Ryzen Pro', 'Las tecnologías AMD PRO ofrecen niveles de protección y capacidad de rendimiento para empresas. ', '1715826464_d6a2d46a84054e0a6e6a.jpg', 4, 1, '2024-05-21 16:45:39', '2024-05-26 16:45:39', '2024-05-21 16:45:39', '2024-05-21 16:45:39', NULL, 2, 1),
(3, 1, 'Procesadores Intel Core Ultra', 'Los nuevos procesadores Intel Core Ultra ya están disponibles en varios países, incluyendo México, Chile, Colombia y Perú.', '1715826327_22c861850670362411d0.jpg', 4, 1, '2024-05-21 16:45:39', '2024-05-26 16:45:39', '2024-05-21 16:45:39', '2024-05-21 16:45:39', NULL, 2, 3),
(4, 1, 'Qué pasa en tu cerebro cuando estás scrolleando tu celular y 3 consejos para evitar hacerlo compulsivamente', 'Los cerebros buscan naturalmente ser recompensados. Existen ciertos centros neuronales que reaccionan al placer —el sexo, las drogas, ganar dinero en un casino— y buscan que se repita una y otra vez. “Están buscando esa novedad, ese próximo golpe de placer, lo que sea que podamos realmente disfrutar”, explica la profesora Duke.Es lo que se conoce como sistema o circuito de recompensa del cerebro, y es exactamente el mismo mecanismo por el que una persona se vuelve adicta a una sustancia como el alcohol.', '1715826397_21371cea4d8a9a6569ca.jpg', 4, 1, '2024-05-21 16:45:39', '2024-05-26 16:45:39', '2024-05-21 16:45:39', '2024-05-21 16:45:39', NULL, 5, 4),
(5, 1, 'La Inteligencia Artificial llegó a los procesadores AMD Ryzen', 'AMD ha presentado los procesadores Ryzen AI Serie 8000 con inteligencia artificial. Estos procesadores móviles ya están integrados en equipos de cómputo Asus.', NULL, 4, 1, '2024-05-21 16:45:39', '2024-05-26 16:45:39', '2024-05-21 16:45:39', '2024-05-21 16:45:39', NULL, 2, 3),
(6, 1, 'CES 2024', 'En la feria CES 2024, AMD aseguró que la tecnología de Ryzen AI ayudará a que el ecosistema siga creciendo.', NULL, 4, 1, '2024-05-21 16:45:39', '2024-05-26 16:45:39', '2024-05-21 16:45:39', '2024-05-21 16:45:39', NULL, 4, 4),
(7, 1, 'Riesgos para la salud', 'Infórmate sobre los riesgos para la salud al usar computadoras y cómo proteger a los niños al utilizar dispositivos digitales desde temprana edad. ', NULL, 4, 1, '2024-05-21 16:45:39', '2024-05-26 16:45:39', '2024-05-21 16:45:39', '2024-05-21 16:45:39', NULL, 5, 1),
(8, 1, 'Nuevos iPad Pro', 'Apple planea lanzar nuevos iPad Pro con tecnología Mini-Led y conector Thunderbolt. Estos dispositivos permiten cargar y conectar a otros dispositivos.', NULL, 4, 1, '2024-05-21 16:45:39', '2024-05-26 16:45:39', '2024-05-21 16:45:39', '2024-05-21 16:45:39', NULL, 1, 3),
(9, 2, 'Nuevos ', 'Apple planea lanzar nuevos iPad ', NULL, 1, 1, '2024-05-21 16:45:39', '2024-05-26 16:45:39', '2024-05-08 18:55:52', '2024-05-08 18:55:52', NULL, 1, 3),
(10, 0, 'Google anuncia avances en inteligencia artificial para mejorar la accesibilidad en Android', 'Google revela nuevas herramientas impulsadas por inteligencia artificial diseñadas para mejorar la accesibilidad en dispositivos Android. Estas innovaciones incluyen funciones de reconocimiento de voz mejoradas y capacidades de navegación simplificadas para usuarios con discapacidades visuales y motoras', NULL, 0, 1, NULL, NULL, '2024-05-21 16:45:39', '2024-05-21 16:45:39', NULL, 2, 1),
(11, 0, 'Tesla presenta su nuevo modelo de automóvil eléctrico con tecnología de conducción autónoma avanzada', 'Tesla desvela su último modelo de vehículo eléctrico, equipado con un sistema de conducción autónoma de próxima generación. Este sistema utiliza cámaras, radares y sensores ultrasonidos para proporcionar capacidades de conducción autónoma mejoradas, acercando un paso más la visión de la conducción totalmente autónoma', NULL, 0, 1, NULL, NULL, '2024-05-21 16:45:39', '2024-05-21 16:45:39', NULL, 2, 1),
(12, 0, 'Amazon lanza su servicio de entrega con drones en áreas urbanas seleccionadas.', 'Amazon inicia oficialmente su servicio de entrega con drones en ciertas áreas urbanas, permitiendo tiempos de entrega más rápidos y eficientes. Este innovador enfoque de logística promete revolucionar la industria del comercio electrónico y cambiar la forma en que se realizan las entregas a domicilio', NULL, 0, 1, NULL, NULL, '2024-05-21 16:45:39', '2024-05-21 16:45:39', NULL, 5, 1),
(13, 0, 'Facebook anuncia nuevas medidas de seguridad para proteger la privacidad de los usuarios', 'Facebook introduce una serie de nuevas herramientas y políticas destinadas a fortalecer la privacidad y seguridad de los datos de sus usuarios. Estas medidas incluyen controles de privacidad más intuitivos, auditorías de seguridad más rigurosas y mayores restricciones sobre el uso de datos personales con fines publicitarios', NULL, 1, 1, NULL, NULL, '2024-05-21 16:45:39', '2024-05-21 16:45:39', NULL, 5, 1),
(14, 0, 'Investigadores desarrollan una nueva vacuna contra el COVID-19 utilizando tecnología de ARN mensajero', 'Científicos anuncian el desarrollo exitoso de una vacuna contra el COVID-19 basada en la tecnología de ARN mensajero. Esta vacuna promete una respuesta inmunitaria más robusta y una producción más rápida que las vacunas tradicionales, lo que podría revolucionar la forma en que se combaten las enfermedades infecciosas en el futuro.', NULL, 1, 1, NULL, NULL, '2024-05-21 16:45:39', '2024-05-21 16:45:39', NULL, 5, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respaldos`
--

CREATE TABLE `respaldos` (
  `id` int(11) UNSIGNED NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `imagen` varchar(150) DEFAULT NULL,
  `estado` int(11) NOT NULL,
  `activa` int(11) NOT NULL,
  `fechaPublicacion` datetime DEFAULT NULL,
  `fechaExpiracion` datetime DEFAULT NULL,
  `id_categoria` int(11) UNSIGNED NOT NULL,
  `id_noticia` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `respaldos`
--

INSERT INTO `respaldos` (`id`, `titulo`, `descripcion`, `imagen`, `estado`, `activa`, `fechaPublicacion`, `fechaExpiracion`, `id_categoria`, `id_noticia`) VALUES
(1, 'Lanzamiento del Nuevo Smartphone XYZ', 'La empresa tecnológica XYZ ha presentado su último buque insignia, el Smartphone XYZ, que incorpora la tecnología 5G de última generación. Este dispositivo revolucionario promete velocidades de conexión ultrarrápidas, permitiendo a los usuarios disfrutar de descargas instantáneas, streaming sin interrupciones y una experiencia móvil superior. Además, el Smartphone XYZ cuenta con una cámara mejorada, una pantalla de alta resolución y una batería de larga duración, convirtiéndolo en una opción atractiva para los amantes de la tecnología móvil.', '1714697566_4e6b644b9616f57325f1.jpg', 4, 1, '2024-05-21 16:45:52', '2024-05-26 16:45:52', 1, 1),
(2, 'Nuevos iPad Pro', 'Apple planea lanzar nuevos iPad Pro con tecnología Mini-Led y conector Thunderbolt. Estos dispositivos permiten cargar y conectar a otros dispositivos. La evolución de la manzanita.', NULL, 4, 1, '2024-05-21 16:45:52', '2024-05-26 16:45:52', 1, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimientos`
--

CREATE TABLE `seguimientos` (
  `id` int(11) UNSIGNED NOT NULL,
  `accion` int(11) NOT NULL,
  `antes` longtext NOT NULL,
  `despues` longtext NOT NULL,
  `motivo` varchar(1000) DEFAULT NULL,
  `fechaCreacion` datetime NOT NULL,
  `id_usuario` int(11) UNSIGNED NOT NULL,
  `id_noticia` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `seguimientos`
--

INSERT INTO `seguimientos` (`id`, `accion`, `antes`, `despues`, `motivo`, `fechaCreacion`, `id_usuario`, `id_noticia`) VALUES
(1, 4, 'validandose', 'a corregir', 'El titulo es demasiado largo.', '2024-05-21 16:45:46', 3, 1),
(2, 0, 'Titulo: Lanzamiento del Nuevo Smartphone XYZ con Tecnología 5G | Descripción: La empresa tecnológica XYZ ha presentado su último buque insignia, el Smartphone XYZ, que incorpora la tecnología 5G de última generación. Este dispositivo revolucionario promete velocidades de conexión ultrarrápidas, permitiendo a los usuarios disfrutar de descargas instantáneas, streaming sin interrupciones y una experiencia móvil superior. Además, el Smartphone XYZ cuenta con una cámara mejorada, una pantalla de alta resolución y una batería de larga duración, convirtiéndolo en una opción atractiva para los amantes de la tecnología móvil. | Estado: A corregir | Imagen: Mantuvo imagen | Categoria: Actualizaciones de productos', 'Titulo: Lanzamiento del Nuevo Smartphone XYZ | Descripción: La empresa tecnológica XYZ ha presentado su último buque insignia, el Smartphone XYZ, que incorpora la tecnología 5G de última generación. Este dispositivo revolucionario promete velocidades de conexión ultrarrápidas, permitiendo a los usuarios disfrutar de descargas instantáneas, streaming sin interrupciones y una experiencia móvil superior. Además, el Smartphone XYZ cuenta con una cámara mejorada, una pantalla de alta resolución y una batería de larga duración, convirtiéndolo en una opción atractiva para los amantes de la tecnología móvil. | Estado: A corregir | Imagen: Mantuvo imagen | Categoria: Actualizaciones de productos', NULL, '2024-05-21 16:45:46', 1, 1),
(3, 2, 'validandose', 'válido/público', NULL, '2024-05-21 16:45:46', 3, 1),
(4, 2, 'validandose', 'válido/público', NULL, '2024-05-21 16:45:46', 3, 2),
(5, 2, 'validandose', 'válido/público', NULL, '2024-05-21 16:45:46', 2, 3),
(6, 2, 'validandose', 'válido/público', NULL, '2024-05-21 16:45:46', 2, 4),
(7, 2, 'validandose', 'válido/público', NULL, '2024-05-21 16:45:46', 2, 5),
(8, 2, 'validandose', 'válido/público', NULL, '2024-05-21 16:45:46', 2, 6),
(9, 2, 'validandose', 'válido/público', NULL, '2024-05-21 16:45:46', 2, 7),
(10, 0, 'Titulo: Nuevos iPad Pro | Descripción: Apple planea lanzar nuevos iPad Pro con tecnología Mini-Led y conector Thunderbolt. Estos dispositivos permiten cargar y conectar a otros dispositivos. | Estado: borrador | Imagen: No tiene imagen | Categoria: Actualizaciones de productos', 'Titulo: Nuevos iPad Pro | Descripción: Apple planea lanzar nuevos iPad Pro con tecnología Mini-Led y conector Thunderbolt. Estos dispositivos permiten cargar y conectar a otros dispositivos. La evolución de la manzanita. | Estado: validandose | Imagen: Mantuvo | Categoria: Actualizaciones de productos', NULL, '2024-05-21 16:45:46', 3, 8),
(11, 2, 'validandose', 'válido/público', NULL, '2024-05-21 16:45:46', 2, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `contrasenia` varchar(150) NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `contrasenia`, `rol`) VALUES
(1, 'lucho', '$2y$10$Zw0mlnirP3RdXsF72.fmp.SZtcIF54jqzPexLijrd9Uw3aL0GGTOi', 0),
(2, 'samus', '$2y$10$BcpmLdTSG/DogALYzHjlpOEcm6d/Fi675hxKWFvwloGnLJZE6IfRe', 1),
(3, 'pedro', '$2y$10$3uyXRFwg3htWrp8VryQ.PuZp.kphvLRHXXMfMRHe9kNTXNYtLcKeO', 2),
(4, 'Alberto Gonzales', '$2y$10$wnv7q5e3Voc8DKMklcVPOuzEOm/kcpoT55n8QbMNzHGjwtn80mEJ2', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `noticias_id_categoria_foreign` (`id_categoria`),
  ADD KEY `noticias_id_usuario_foreign` (`id_usuario`);

--
-- Indices de la tabla `respaldos`
--
ALTER TABLE `respaldos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `respaldos_id_categoria_foreign` (`id_categoria`),
  ADD KEY `respaldos_id_noticia_foreign` (`id_noticia`);

--
-- Indices de la tabla `seguimientos`
--
ALTER TABLE `seguimientos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seguimientos_id_usuario_foreign` (`id_usuario`),
  ADD KEY `seguimientos_id_noticia_foreign` (`id_noticia`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `respaldos`
--
ALTER TABLE `respaldos`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `seguimientos`
--
ALTER TABLE `seguimientos`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `noticias_id_categoria_foreign` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `noticias_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `respaldos`
--
ALTER TABLE `respaldos`
  ADD CONSTRAINT `respaldos_id_categoria_foreign` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `respaldos_id_noticia_foreign` FOREIGN KEY (`id_noticia`) REFERENCES `noticias` (`id`);

--
-- Filtros para la tabla `seguimientos`
--
ALTER TABLE `seguimientos`
  ADD CONSTRAINT `seguimientos_id_noticia_foreign` FOREIGN KEY (`id_noticia`) REFERENCES `noticias` (`id`),
  ADD CONSTRAINT `seguimientos_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `publicar_automaticamente` ON SCHEDULE EVERY 1 DAY STARTS '2024-05-21 16:45:11' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE noticias
            SET fechaPublicacion = CURDATE(), fechaExpiracion = DATE_ADD(CURDATE(), INTERVAL 5 DAY)
            WHERE estado = 1 AND activa = 1 AND DATEDIFF(CURDATE(), fechaModificacion) >= 5$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
