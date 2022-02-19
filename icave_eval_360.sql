-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 11-12-2019 a las 17:48:33
-- Versión del servidor: 5.7.27
-- Versión de PHP: 7.0.33-0+deb9u6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `icave_eval_360`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aplicaciones`
--

CREATE TABLE `aplicaciones` (
  `id` int(11) NOT NULL,
  `id_evaluacion` int(11) NOT NULL,
  `id_evaluado` int(11) NOT NULL,
  `id_evaluador` int(11) NOT NULL,
  `id_rol_evaluador` tinyint(4) NOT NULL,
  `creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` set('A','B','C') NOT NULL DEFAULT 'A',
  `hash` varchar(32) NOT NULL,
  `pagina` int(2) NOT NULL DEFAULT '1',
  `email_enviado` set('N','S') NOT NULL DEFAULT 'N',
  `finalizado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aplicaciones`
--

INSERT INTO `aplicaciones` (`id`, `id_evaluacion`, `id_evaluado`, `id_evaluador`, `id_rol_evaluador`, `creacion`, `estado`, `hash`, `pagina`, `email_enviado`, `finalizado`) VALUES
(56, 10, 78, 75, 1, '2019-12-09 19:18:28', 'A', 'a2e4cebd36a069c6ff99e1e73135f05c', 1, 'S', NULL),
(57, 10, 78, 76, 2, '2019-12-09 19:18:28', 'C', '1b358e17450d5a59af738742e312714b', 1, 'S', NULL),
(58, 10, 78, 77, 3, '2019-12-09 19:18:28', 'C', 'c38cc1316bd5ae195d2456a1278cba3f', 1, 'S', NULL),
(59, 10, 78, 81, 4, '2019-12-09 19:18:28', 'C', 'b4b0f172d32c6cd8d0daaf29c57132fd', 1, 'S', NULL),
(60, 10, 78, 78, 5, '2019-12-09 19:18:28', 'C', '8583000834badc60c8ac1cee2c3b5ea2', 1, 'S', NULL),
(61, 11, 80, 79, 1, '2019-12-09 19:29:48', 'C', 'b8f070d246492be0d45f58f64e0f921c', 1, 'S', NULL),
(62, 11, 80, 82, 2, '2019-12-09 19:29:48', 'C', 'f7de4974a9ac410bef3bbee7a9fb243c', 1, 'S', NULL),
(63, 11, 80, 84, 3, '2019-12-09 19:29:48', 'C', 'f3bd7cc71e0429a516b40fece9e33ab6', 1, 'S', NULL),
(64, 11, 80, 85, 4, '2019-12-09 19:29:48', 'C', '52a4ebda25f4db711482f617c110f28e', 1, 'S', NULL),
(65, 11, 80, 80, 5, '2019-12-09 19:29:48', 'C', '4586d5312d397bf521cf3b49f35cfcb3', 1, 'S', NULL),
(66, 12, 78, 1, 1, '2019-12-10 11:41:02', 'C', '36e319e30fef086394c84e0fbc5017d0', 1, 'S', NULL),
(67, 12, 78, 75, 2, '2019-12-10 11:41:02', 'C', '7d54b7138534b623d0424f494807058b', 1, 'S', NULL),
(68, 12, 78, 76, 3, '2019-12-10 11:41:02', 'C', '1358c01ea6551a837ed0d1debb1af2ed', 1, 'S', NULL),
(69, 12, 78, 77, 4, '2019-12-10 11:41:02', 'C', '8df71aba3391841369509c5618fe7792', 1, 'S', NULL),
(70, 12, 78, 78, 5, '2019-12-10 11:41:02', 'A', '1e721126b002013e2e543102537bffab', 1, 'S', NULL),
(71, 11, 79, 80, 1, '2019-12-10 13:01:08', 'A', '5e1c86204b11096ebdb2985ca388cc3a', 1, 'N', NULL),
(72, 11, 79, 82, 2, '2019-12-10 13:01:08', 'A', 'a7c28cf49b76c64ae8283981939cb60b', 1, 'N', NULL),
(73, 11, 79, 83, 3, '2019-12-10 13:01:08', 'C', '3f53fc2a0e549dc4c3de7b6ee2afa9be', 1, 'N', '2019-12-11 13:06:25'),
(74, 11, 79, 84, 4, '2019-12-10 13:01:08', 'C', 'a4c095af99baa8009ecc78c43d06551d', 1, 'N', '2019-12-11 12:53:26'),
(94, 18, 79, 80, 1, '2019-12-10 18:58:21', 'C', '78545ff0c5129ce60a29a4a1d3b1b0cf', 1, 'N', '2019-12-10 19:00:44'),
(95, 18, 79, 82, 2, '2019-12-10 18:58:21', 'C', '23ac6bbb823eaf2d6f38f0fcb96a2016', 1, 'N', '2019-12-10 19:03:24'),
(96, 18, 79, 84, 3, '2019-12-10 18:58:21', 'C', '5fd63b12f6955d40a349320d368bca31', 1, 'N', '2019-12-10 19:04:04'),
(97, 18, 79, 83, 4, '2019-12-10 18:58:21', 'A', '8f36169e18d33250369fe45fc99219c3', 1, 'N', NULL),
(98, 18, 79, 79, 5, '2019-12-10 18:58:21', 'C', '97cf622bd846e7d83c9ecd62aa368c8b', 1, 'N', '2019-12-10 19:05:58'),
(99, 18, 82, 79, 1, '2019-12-10 18:58:41', 'C', 'bdb9c776114f7adbcc45191e9961ebce', 1, 'N', '2019-12-10 19:06:45'),
(100, 18, 82, 80, 2, '2019-12-10 18:58:41', 'C', 'e80e76514b7cd692c2df611735a35acc', 1, 'N', '2019-12-10 19:01:09'),
(101, 18, 82, 85, 3, '2019-12-10 18:58:41', 'A', '67437becc4e19ae7d41f319549aa2e5a', 1, 'N', NULL),
(102, 18, 82, 84, 4, '2019-12-10 18:58:41', 'C', 'a00cb38da04072512131cf455248793c', 1, 'N', '2019-12-11 13:42:49'),
(103, 18, 82, 82, 5, '2019-12-10 18:58:41', 'C', 'a371f2a098497ddb864c08bc92248403', 1, 'N', '2019-12-10 19:04:01'),
(104, 18, 83, 79, 1, '2019-12-10 18:59:02', 'C', 'f3fddb172a321acf66c25f99c4248788', 1, 'N', '2019-12-10 19:08:19'),
(105, 18, 83, 80, 2, '2019-12-10 18:59:02', 'C', '8a4a596e14dbc363cd4225b37fdb7d5f', 1, 'N', '2019-12-10 19:00:22'),
(106, 18, 83, 85, 3, '2019-12-10 18:59:02', 'C', 'b68ee2f3d61fb7bbb9eb3a6ac12b6edb', 1, 'N', '2019-12-10 19:06:27'),
(107, 18, 83, 82, 4, '2019-12-10 18:59:02', 'C', '59028bdf518b2dd5540061420b910d49', 1, 'N', '2019-12-10 19:04:34'),
(108, 18, 83, 83, 5, '2019-12-10 18:59:02', 'C', '9b4d9b66751be671421c0aa9286b8164', 1, 'N', '2019-12-10 19:05:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `competencias`
--

CREATE TABLE `competencias` (
  `id` int(11) NOT NULL,
  `competencia` varchar(100) DEFAULT NULL,
  `creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `actualizacion` datetime DEFAULT NULL,
  `estado` set('A','B') NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `competencias`
--

INSERT INTO `competencias` (`id`, `competencia`, `creacion`, `actualizacion`, `estado`) VALUES
(1, 'Liderazgo', '2019-11-13 18:00:00', '2019-11-11 00:00:00', 'B'),
(2, 'Responsabilidad', '2019-11-23 08:24:09', '2019-11-23 02:23:28', 'A'),
(3, 'Credibilidad', '2019-11-13 18:00:00', '2019-12-04 20:19:48', 'A'),
(4, 'Función', '2019-11-27 01:14:26', '2019-11-27 01:14:41', 'B');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuestionarios`
--

CREATE TABLE `cuestionarios` (
  `id` int(11) NOT NULL,
  `cuestionario` varchar(150) DEFAULT NULL,
  `creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `creacion_ip` varchar(15) DEFAULT NULL,
  `actualizacion` datetime DEFAULT NULL,
  `actualizacion_ip` varchar(15) DEFAULT NULL,
  `estado` set('A','B') NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuestionarios`
--

INSERT INTO `cuestionarios` (`id`, `cuestionario`, `creacion`, `creacion_ip`, `actualizacion`, `actualizacion_ip`, `estado`) VALUES
(1, 'Cuestionario Liderazgo', '2019-11-15 03:30:30', '45678', '2019-12-11 16:51:58', '::1', 'A'),
(2, 'Evaluación de motivación ', '2019-12-10 11:37:05', NULL, '2019-12-11 16:40:46', '::1', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `decalogos`
--

CREATE TABLE `decalogos` (
  `id` int(11) NOT NULL,
  `decalogo` varchar(150) DEFAULT NULL,
  `creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `actualizacion` datetime DEFAULT NULL,
  `id_escala` int(11) NOT NULL,
  `status` set('A','B') NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `decalogos`
--

INSERT INTO `decalogos` (`id`, `decalogo`, `creacion`, `actualizacion`, `id_escala`, `status`) VALUES
(1, 'Liderazgo 2019', '2019-11-13 17:00:00', '2019-11-13 17:00:00', 1, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `decalogos_aseveraciones`
--

CREATE TABLE `decalogos_aseveraciones` (
  `id` int(11) NOT NULL,
  `aseveracion` varchar(150) DEFAULT NULL,
  `creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `actualizacion` datetime DEFAULT NULL,
  `id_decalogo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `decalogos_aseveraciones`
--

INSERT INTO `decalogos_aseveraciones` (`id`, `aseveracion`, `creacion`, `actualizacion`, `id_decalogo`) VALUES
(1, 'Sabe negociar ante situaciones criticas', '2019-11-14 00:00:00', NULL, 1),
(2, 'Es empático y mentor con sus colaboradores', '2019-11-15 15:19:18', NULL, 1),
(3, 'Es hábil para tomar decisiones', '2019-11-20 23:02:23', NULL, 1),
(4, 'Es inteligente en el uso de sus emociones', '2019-11-20 23:04:17', NULL, 1),
(5, 'Cuenta con visión estratégica del negocio', '2019-12-04 00:53:04', NULL, 1),
(6, 'Es incluyente ante la diversidad de opiniones', '2019-12-04 00:53:04', NULL, 1),
(7, 'Es influyente en su entorno', '2019-12-09 01:09:45', NULL, 1),
(8, 'Tiene empuje y suele innovar', '2019-12-09 01:09:45', NULL, 1),
(9, 'Es autocritico de sus prácticas', '2019-12-09 01:10:25', NULL, 1),
(10, 'Le motiva trabajar en equipo', '2019-12-09 01:10:25', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id` int(11) NOT NULL,
  `departamento` varchar(150) DEFAULT NULL,
  `organizaciones_id` int(11) NOT NULL,
  `ultima_actualizacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estatus` set('Activo','Inactivo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `departamento`, `organizaciones_id`, `ultima_actualizacion`, `estatus`) VALUES
(3, 'Recursos Humanos', 1, '2019-12-08 03:44:30', 'Activo'),
(4, 'Compras', 1, '2019-12-10 00:17:33', 'Activo'),
(6, 'Tecnologías de Información', 1, '2019-12-08 04:14:35', 'Activo'),
(7, 'Contabilidad', 1, '2019-12-11 12:01:49', 'Activo'),
(8, 'Tesorería', 1, '2019-12-08 05:05:36', 'Activo'),
(9, 'Producción', 1, '2019-12-08 05:06:10', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `email_conf`
--

CREATE TABLE `email_conf` (
  `id` int(11) NOT NULL,
  `host` varchar(100) NOT NULL,
  `port` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email_name` varchar(100) NOT NULL,
  `content` mediumtext NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `email_conf`
--

INSERT INTO `email_conf` (`id`, `host`, `port`, `username`, `password`, `email_name`, `content`, `url`) VALUES
(1, 'smtp.mailgun.org', 587, 'postmaster@sandbox54eef678978a46319abade95bafd3d69.mailgun.org', '8e106c8d77cb51bf8add51651f49b403-1df6ec32-d7fc31ce', 'ICAVE Evaluacion 360', '<p>¡Hola!</p><p>Como parte de nuestro proceso de Evaluación 360 te invitamos a contestar el siguiente cuestionario.</p><p>Link del cuestionario: {{url_encuesta}}</p><p>Gracias por tu participación</p>', 'http://35.202.106.35/proyecto/'),
(2, 'smtp.mailgun.org', 587, 'postmaster@sandbox71751019d46848f8ad58e2698a85159a.mailgun.org', '1b34892ea5a57de30dba8dd323af2538-09001d55-56cc7155', 'ICAVE Evaluacion 360', '¡Hola!  Se ha solicitado un cambio de contraseña de acceso a su cuenta. Da clic en la siguiente liga de Internet para realizar el cambio:  {$link}  Si no lo has solicitado tú, te recomendamos ingresar a la aplicación y cambiar tu contraseña para proteger tu cuenta.  Saludos.', 'proyecto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `num_empleado` varchar(20) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `actualizacion` datetime DEFAULT NULL,
  `id_departamento` int(11) NOT NULL,
  `id_puesto` int(11) NOT NULL,
  `estado` set('A','B') NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `num_empleado`, `nombre`, `apellidos`, `email`, `creacion`, `actualizacion`, `id_departamento`, `id_puesto`, `estado`) VALUES
(1, '0', 'Edgar', 'Morlet', 'foo1024bar@outlook.com', '2019-11-27 00:47:37', '2019-12-11 14:18:37', 6, 1, 'A'),
(75, '399', 'Irma', 'Morales', 'irma2520@gmail.com', '2019-12-09 18:54:11', '2019-12-09 19:17:41', 6, 3, 'A'),
(76, '669', 'Manuel Antonio', 'Lopez Horta', 'manolo_1997@hotmail.com', '2019-12-09 18:54:20', NULL, 6, 1, 'A'),
(77, '986', 'Hugo Leonardo', 'Martínez Segura', 'hleonardoms@gmail.com', '2019-12-09 18:54:22', NULL, 6, 3, 'A'),
(78, '537', 'Guillermo', 'Ataxca', 'gaar1997@gmail.com', '2019-12-09 18:54:28', '2019-12-10 19:27:47', 4, 6, 'A'),
(79, '191', 'Kevin Jabir', 'Nicasio Jaym', 'ing.jabir_knj@hotmail.com', '2019-12-09 18:54:31', '2019-12-09 22:57:38', 7, 10, 'A'),
(80, '673', 'José Manuel', 'Villar Campos', 'manuelvillarcampos@gmail.com', '2019-12-09 18:55:41', '2019-12-10 19:28:49', 9, 6, 'A'),
(81, '118', 'Jareth Alejandro', 'Aguilar Uscanga', 'jareth.aguilar10@outlook.com', '2019-12-09 18:57:07', NULL, 6, 1, 'A'),
(82, '398', 'Armando', 'Reyes Rivera', 'armando.sistemas.ucc@gmail.com', '2019-12-09 19:04:52', NULL, 7, 9, 'A'),
(83, '856', 'José Rubén', 'Sánchez González', 'rsanchez@ucc.mx', '2019-12-09 19:25:12', '2019-12-09 19:29:22', 7, 6, 'A'),
(84, '464', 'Marlon', 'Guzmán', 'marlongc2@gmail.com', '2019-12-09 19:26:36', NULL, 7, 3, 'A'),
(85, '397', 'Daniel', 'Leyva Caballero', 'caballerodlc@outlook.com', '2019-12-09 19:26:47', NULL, 7, 5, 'A'),
(86, '985', 'Alejandra Militzi', 'Fuentes Orozco', 'alejandra@gmail.com', '2019-12-09 19:26:52', NULL, 8, 6, 'A'),
(87, '942', 'Andrés Francisco', 'Fonseca González', 'fonsecaandres175@gmail.com', '2019-12-09 19:27:15', NULL, 3, 2, 'A'),
(88, '69', 'Jonathan Uriel', 'Vazquez Orozco', 'cberjony@hotmail.com', '2019-12-09 23:08:14', '2019-12-11 03:32:49', 3, 2, 'B'),
(123, '866', 'Sergio ', 'Román Jara', 'sergior@ucc.mx', '2019-12-10 19:17:22', '2019-12-10 19:26:50', 8, 7, 'A'),
(124, '941', 'Beatriz', 'Ferat Zárate', 'ferat.beatirz@icave.com.mx', '2019-12-10 19:19:00', NULL, 4, 9, 'A'),
(125, '781', 'Emilio Iván', 'Palma Aguirre', 'palma.ivan@icave.com.mx', '2019-12-10 19:21:20', NULL, 3, 5, 'A'),
(126, '379', 'Cecilia', 'Duarte Cuán', 'cecycuan@gmail.com', '2019-12-10 19:22:18', '2019-12-10 19:25:47', 3, 5, 'A'),
(127, '493', 'Juan Miguel', 'Méndez Carrera', 'jmmendez@ucc.mx', '2019-12-10 19:23:26', '2019-12-10 19:26:31', 8, 5, 'A'),
(128, '745', 'Natalia', 'Franyuti Carlin', 'nataliafranyuti@gmail.com', '2019-12-10 19:24:46', NULL, 3, 2, 'A'),
(129, '728', 'Hugo', 'Fernández Hernández', 'hugofdz@ucc.mx', '2019-12-10 19:29:53', NULL, 9, 3, 'A'),
(130, '256', 'Luis', 'Cevallos Ramírez', 'lcevallos@ucc.mx', '2019-12-10 19:31:01', NULL, 9, 9, 'A'),
(131, '416', 'Felipe', 'Pozos Texon', 'fpozost@ucc.mx', '2019-12-10 19:31:54', NULL, 9, 9, 'A'),
(132, '363', 'Carlos Alberto', 'Rojas Kramer', 'crojask@ucc.mx', '2019-12-10 19:32:41', NULL, 9, 5, 'A'),
(135, '91236', 'Antonio', 'Martinez', 'Anmar@ucc.com', '2019-12-10 19:51:51', NULL, 9, 6, 'A'),
(140, '883', 'John', 'Doe', 'johndoe@email.com', '2019-12-11 14:26:11', '2019-12-11 14:28:36', 6, 10, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados_temp`
--

CREATE TABLE `empleados_temp` (
  `id` int(11) NOT NULL,
  `num_empleado` varchar(20) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `id_departamento` int(11) NOT NULL,
  `id_puesto_temp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escalas`
--

CREATE TABLE `escalas` (
  `id` int(11) NOT NULL,
  `nivel1_etiqueta` varchar(45) DEFAULT NULL,
  `nivel1_descripcion` varchar(150) DEFAULT NULL,
  `nivel1_inferior` decimal(7,2) DEFAULT NULL,
  `nivel1_superior` decimal(7,2) DEFAULT NULL,
  `nivel2_etiqueta` varchar(45) DEFAULT NULL,
  `nivel2_descripcion` varchar(150) DEFAULT NULL,
  `nivel2_inferior` decimal(7,2) DEFAULT NULL,
  `nivel2_superior` decimal(7,2) DEFAULT NULL,
  `nivel3_etiqueta` varchar(45) DEFAULT NULL,
  `nivel3_descripcion` varchar(150) DEFAULT NULL,
  `nivel3_inferior` decimal(7,2) DEFAULT NULL,
  `nivel3_superior` decimal(7,2) DEFAULT NULL,
  `nivel4_etiqueta` varchar(45) DEFAULT NULL,
  `nivel4_descripcion` varchar(150) DEFAULT NULL,
  `nivel4_inferior` decimal(7,2) DEFAULT NULL,
  `nivel4_superior` decimal(7,2) DEFAULT NULL,
  `nivel5_etiqueta` varchar(45) DEFAULT NULL,
  `nivel5_descripcion` varchar(150) DEFAULT NULL,
  `nivel5_inferior` decimal(7,2) DEFAULT NULL,
  `nivel5_superior` decimal(7,2) DEFAULT NULL,
  `creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `actualizacion` datetime DEFAULT NULL,
  `creacion_ip` varchar(15) DEFAULT NULL,
  `actualizacion_ip` varchar(15) DEFAULT NULL,
  `status` set('A','B') NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `escalas`
--

INSERT INTO `escalas` (`id`, `nivel1_etiqueta`, `nivel1_descripcion`, `nivel1_inferior`, `nivel1_superior`, `nivel2_etiqueta`, `nivel2_descripcion`, `nivel2_inferior`, `nivel2_superior`, `nivel3_etiqueta`, `nivel3_descripcion`, `nivel3_inferior`, `nivel3_superior`, `nivel4_etiqueta`, `nivel4_descripcion`, `nivel4_inferior`, `nivel4_superior`, `nivel5_etiqueta`, `nivel5_descripcion`, `nivel5_inferior`, `nivel5_superior`, `creacion`, `actualizacion`, `creacion_ip`, `actualizacion_ip`, `status`) VALUES
(1, 'Marginal', 'Rara vez muestra el comportamiento esperado', '0.00', '1.00', 'Mínimo aceptable', 'Comportamiento inconsistente', '1.00', '2.00', 'Satisfactorio', 'Comportamiento esperado', '2.00', '3.00', 'Notable', 'Comportamiento superior a lo esperado', '3.00', '4.00', 'Excelente', 'Comportamiento que trasciende su área de influencia', '4.00', '5.00', '2019-11-13 23:00:11', '2019-12-11 13:20:18', '12.52.65.65', '201.123.226.252', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluaciones`
--

CREATE TABLE `evaluaciones` (
  `id` int(11) NOT NULL,
  `id_cuestionario` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `id_periodo` int(11) NOT NULL,
  `inicio` date NOT NULL,
  `fin` date NOT NULL,
  `limite` date DEFAULT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `estado` set('A','B') NOT NULL DEFAULT 'A',
  `creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `creacion_ip` varchar(15) DEFAULT NULL,
  `actualizacion` datetime DEFAULT NULL,
  `actulizacion_ip` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `evaluaciones`
--

INSERT INTO `evaluaciones` (`id`, `id_cuestionario`, `id_departamento`, `id_periodo`, `inicio`, `fin`, `limite`, `descripcion`, `estado`, `creacion`, `creacion_ip`, `actualizacion`, `actulizacion_ip`) VALUES
(10, 1, 6, 1, '2019-12-29', '2019-12-29', '2019-12-29', 'Dirección de TI primer semestre', 'A', '2019-12-09 19:16:37', '201.123.226.252', '2019-12-11 17:13:51', '::1'),
(11, 1, 7, 1, '2019-12-29', '2019-12-29', '2019-12-29', 'Evaluación Contabilidad 2016', 'A', '2019-12-09 19:25:55', '201.123.226.252', '2019-12-11 17:03:23', '201.123.226.252'),
(12, 1, 6, 1, '2019-12-29', '2019-12-30', '2019-12-31', 'Dirección de TI segundo semestre', 'A', '2019-12-10 11:40:45', '::1', '2019-12-11 17:04:03', '201.123.226.252'),
(18, 1, 7, 44, '2019-12-09', '2019-12-17', '2019-12-24', 'Evaluación Contabilidad 2017', 'A', '2019-12-10 18:58:05', '201.123.186.123', '2019-12-11 17:05:33', '::1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles_puesto`
--

CREATE TABLE `niveles_puesto` (
  `id` int(11) NOT NULL,
  `nivel_puesto` varchar(50) DEFAULT NULL,
  `creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `actualizacion` datetime DEFAULT NULL,
  `estado` set('Activo','Inactivo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `niveles_puesto`
--

INSERT INTO `niveles_puesto` (`id`, `nivel_puesto`, `creacion`, `actualizacion`, `estado`) VALUES
(1, 'Director', '2019-11-14 07:25:02', '2019-12-11 08:43:46', 'Activo'),
(2, 'Sub director', '2019-11-14 07:25:57', '2019-12-08 21:17:52', 'Activo'),
(3, 'Gerente', '2019-11-14 07:25:57', '2019-12-04 23:21:42', 'Activo'),
(4, 'Sub gerente', '2019-11-15 02:42:35', '2019-12-01 21:39:32', 'Activo'),
(5, 'Obrero', '2019-11-29 00:13:56', '2019-11-29 00:13:56', 'Activo'),
(6, 'Analistas', '2019-12-01 21:49:33', '2019-12-11 17:18:04', 'Activo'),
(7, 'Jefatura', '2019-12-09 19:14:48', '2019-12-10 00:11:44', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id_notificaciones` int(11) NOT NULL,
  `id_evaluado` int(11) NOT NULL,
  `id_evaluador` int(11) NOT NULL,
  `id_aplicacion` int(11) NOT NULL,
  `estado_visto` int(1) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_visto` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`id_notificaciones`, `id_evaluado`, `id_evaluador`, `id_aplicacion`, `estado_visto`, `fecha_creacion`, `fecha_visto`) VALUES
(16, 78, 77, 58, 1, '2019-12-09 19:19:59', '2019-12-10 19:40:11'),
(17, 78, 76, 57, 1, '2019-12-09 19:20:00', '2019-12-10 19:40:11'),
(18, 78, 75, 56, 1, '2019-12-09 19:20:15', '2019-12-10 19:40:11'),
(19, 78, 81, 59, 1, '2019-12-09 19:20:43', '2019-12-10 19:40:11'),
(20, 78, 78, 60, 1, '2019-12-09 19:20:55', '2019-12-10 19:40:11'),
(21, 80, 82, 62, 1, '2019-12-09 19:30:59', '2019-12-10 19:40:11'),
(22, 80, 84, 63, 1, '2019-12-09 19:31:20', '2019-12-10 19:40:11'),
(23, 80, 80, 65, 1, '2019-12-09 19:33:02', '2019-12-10 19:33:00'),
(24, 80, 85, 64, 1, '2019-12-09 19:33:02', '2019-12-10 19:33:00'),
(25, 80, 79, 61, 1, '2019-12-09 19:33:32', '2019-12-10 19:33:00'),
(26, 78, 1, 66, 1, '2019-12-10 11:41:41', '2019-12-10 19:33:00'),
(27, 78, 75, 67, 1, '2019-12-10 11:42:11', '2019-12-10 19:33:00'),
(28, 78, 76, 68, 1, '2019-12-10 11:42:37', '2019-12-10 19:33:00'),
(29, 78, 77, 69, 1, '2019-12-10 11:43:06', '2019-12-10 19:32:59'),
(30, 1, 75, 75, 1, '2019-12-10 13:15:22', '2019-12-10 19:32:59'),
(31, 83, 80, 105, 1, '2019-12-10 19:00:22', '2019-12-10 19:32:59'),
(32, 79, 80, 94, 1, '2019-12-10 19:00:44', '2019-12-10 19:32:59'),
(33, 82, 80, 100, 1, '2019-12-10 19:01:09', '2019-12-10 19:32:35'),
(34, 79, 82, 95, 1, '2019-12-10 19:03:24', '2019-12-10 19:32:35'),
(35, 82, 82, 103, 1, '2019-12-10 19:04:01', '2019-12-10 19:32:35'),
(36, 79, 84, 96, 1, '2019-12-10 19:04:04', '2019-12-10 19:32:35'),
(37, 83, 82, 107, 1, '2019-12-10 19:04:34', '2019-12-10 19:32:35'),
(38, 83, 83, 108, 1, '2019-12-10 19:05:20', '2019-12-10 19:32:35'),
(39, 79, 79, 98, 1, '2019-12-10 19:05:58', '2019-12-10 19:32:34'),
(40, 83, 85, 106, 1, '2019-12-10 19:06:27', '2019-12-10 19:32:34'),
(41, 82, 79, 99, 1, '2019-12-10 19:06:45', '2019-12-10 19:32:34'),
(42, 83, 79, 104, 1, '2019-12-10 19:08:19', '2019-12-10 19:32:34'),
(43, 79, 84, 74, 1, '2019-12-11 12:53:26', '2019-12-11 12:54:50'),
(44, 79, 83, 73, 1, '2019-12-11 13:06:25', '2019-12-11 13:07:23'),
(45, 82, 84, 102, 1, '2019-12-11 13:42:49', '2019-12-11 14:13:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `organizaciones`
--

CREATE TABLE `organizaciones` (
  `id` int(11) NOT NULL,
  `organizacion` varchar(150) NOT NULL,
  `creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `actualizacion` datetime DEFAULT NULL,
  `estatus` set('Activo','Inactivo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `organizaciones`
--

INSERT INTO `organizaciones` (`id`, `organizacion`, `creacion`, `actualizacion`, `estatus`) VALUES
(1, 'ICAVE Veracruz', '2019-11-17 07:17:05', '2019-11-17 07:17:05', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `token` varchar(1024) NOT NULL,
  `expira` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`id`, `token`, `expira`, `status`) VALUES
(1, '030695f6b7d1323fcd4a617d4adf661c', '2019-12-10 20:11:29', 1),
(1, '1346dbf6b59afa16939ef7a46d1cfae3', '2019-12-10 19:30:07', 1),
(1, '328a4345d0ff7d34288d21a8933783a5', '2019-12-10 21:01:00', 1),
(1, '36b6e5d6fa70392e053e66dbbfbb0437', '2019-12-10 18:33:59', 1),
(1, '3c913b1036f2c6af1860898670f6f79e', '2019-12-10 21:28:39', 0),
(1, '3e47eb88b9f938cf5ed3128082b60fa6', '2019-12-10 18:55:14', 1),
(1, '42b2916f387f7321c4fae12885c673b0', '2019-12-07 18:50:28', 0),
(1, '454dc69d55acc1a359bd39bde186d097', '2019-12-10 20:59:34', 1),
(1, '47d02fa5678181c7f39c98d10ce43fff', '2019-12-11 18:44:01', 1),
(1, '497e221785e2526ca1db78ef54e646f1', '2019-12-10 19:14:23', 1),
(1, '51be98837f54fbe0966cdce0147edc78', '2019-12-10 18:35:49', 1),
(1, '5249a05439d1248546f580279088a029', '2019-12-10 21:14:02', 0),
(1, '56247f3d3c449cffc0a0c28881fd4613', '2019-12-11 18:42:45', 0),
(1, '5b965979ca65b83cbf3300d935e4a793', '2019-12-10 18:55:39', 1),
(1, '67c7419452de6a6987c5440ae4199470', '2019-12-10 20:37:11', 0),
(1, '8c61f82ef5e3022faae7dc7d9c095c41', '2019-12-07 18:48:07', 0),
(1, '92759961ee44d4e5a92e08dc23a6d607', '2019-12-10 20:49:23', 1),
(1, 'a2add8be0d80fce69d9f40db7b739c5d', '2019-12-07 19:24:20', 1),
(1, 'aad4c1bac3c65b159f8bd5022bdd8b6f', '2019-12-10 21:17:04', 0),
(1, 'b5d12b6fd59c37a47dfffe0601a70333', '2019-12-07 18:29:16', 0),
(1, 'b740c2e1523f4377e96559736e309522', '2019-12-10 18:34:48', 1),
(1, 'c00bef1e1bfbd10f76d66d1890ce5ed8', '2019-12-10 21:34:02', 0),
(1, 'c4e609ef78f1017fb3ecb47b31c28251', '2019-12-07 18:50:58', 0),
(1, 'd1800a7a0c85d33ebbb612c0b3902cc5', '2019-12-10 21:31:42', 1),
(1, 'da1820858bd24b907976621b6d08b055', '2019-12-10 19:26:46', 1),
(1, 'db150e4a538c845e64d49eccb11a2772', '2019-12-07 17:56:15', 0),
(1, 'dc17335d6904fcc3f273b4248814f71d', '2019-12-10 18:53:07', 1),
(1, 'e02006534ae7e14b22b7196ba4ccf262', '2019-12-10 20:19:18', 0),
(1, 'ec3c08dffc99cb69d4918b6606e40a8a', '2019-12-10 20:18:50', 1),
(1, 'ee28b37a37425fdd6f8f42c28f9c4432', '2019-12-10 18:52:31', 1),
(1, 'fabd17fa25e98cfd9fae85edb6217abc', '2019-12-10 20:25:26', 0),
(1, 'fbe6913af6215d73c2821d3b28776b85', '2019-12-10 18:59:48', 1),
(1, 'ffc13c49720e51920dc08e4d93322233', '2019-12-10 19:27:41', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodos`
--

CREATE TABLE `periodos` (
  `id` int(11) NOT NULL,
  `periodo` varchar(50) DEFAULT NULL,
  `creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `actualizacion` datetime DEFAULT NULL,
  `estado` set('Activo','Inactivo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `periodos`
--

INSERT INTO `periodos` (`id`, `periodo`, `creacion`, `actualizacion`, `estado`) VALUES
(1, 'Año 2016', '2019-11-14 18:53:37', '2019-12-11 17:17:22', 'Activo'),
(44, 'Año 2017', '2019-12-10 09:56:23', '2019-12-10 09:56:23', 'Activo'),
(45, 'Año 2018', '2019-12-10 09:56:29', '2019-12-10 09:56:29', 'Activo'),
(46, 'Año 2019', '2019-12-10 09:56:33', '2019-12-10 09:56:33', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id` int(11) NOT NULL,
  `pregunta` varchar(500) NOT NULL,
  `orden` smallint(6) DEFAULT NULL,
  `tipo` set('M','A') NOT NULL DEFAULT 'M',
  `pagina` smallint(6) NOT NULL DEFAULT '1',
  `creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `creacion_ip` varchar(15) DEFAULT NULL,
  `actualizacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `actualizacion_ip` varchar(15) DEFAULT NULL,
  `id_decalogo_aseveracion` int(11) DEFAULT NULL,
  `id_cuestionario` int(11) DEFAULT NULL,
  `id_competencia` int(11) DEFAULT NULL,
  `id_decalogo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `pregunta`, `orden`, `tipo`, `pagina`, `creacion`, `creacion_ip`, `actualizacion`, `actualizacion_ip`, `id_decalogo_aseveracion`, `id_cuestionario`, `id_competencia`, `id_decalogo`) VALUES
(1, '¿Sabe negociar ante situaciones difíciles?', 1, 'M', 1, '2019-11-15 16:37:57', '::1', '2019-12-03 01:52:14', '::1', 1, 1, 2, 1),
(2, '¿Es empático y mentor con sus colaboradores?', 2, 'M', 1, '2019-11-15 16:38:22', '::1', '2019-11-23 06:11:24', '::1', 2, 1, 1, 1),
(3, '¿Es hábil para tomar decisiones?', 3, 'M', 1, '2019-11-21 00:05:43', '::1', '2019-11-23 01:49:25', '::1', 3, 1, 2, 1),
(4, '¿Tiene control de sus emociones?', 4, 'M', 1, '2019-11-21 00:06:35', '::1', '2019-12-02 18:08:09', '::1', 4, 1, 2, 1),
(5, '¿Cuenta con visión estratégica del negocio?', 5, 'M', 1, '2019-12-03 00:00:00', NULL, '2019-12-03 00:42:45', NULL, 5, 1, 3, NULL),
(6, '¿Es incluyente ante la diversidad de opiniones?', 6, 'M', 1, '2019-12-03 02:10:34', NULL, '2019-12-03 02:10:34', NULL, 6, 1, 3, NULL),
(7, '¿Es influyente en su entorno?', 7, 'M', 1, '2019-12-06 00:11:29', NULL, '2019-12-06 00:11:29', NULL, 7, 1, 3, NULL),
(8, '¿Tiene empuje y suele innovar?', 8, 'M', 1, '2019-12-09 01:06:16', NULL, '2019-12-09 01:06:16', NULL, 8, 1, 4, NULL),
(9, '¿Es autocritico de sus prácticas?', 9, 'M', 1, '2019-12-09 01:07:02', NULL, '2019-12-09 01:07:02', NULL, 9, 1, 4, NULL),
(10, '¿Le motiva trabajar en equipo?', 10, 'M', 1, '2019-12-09 01:07:32', NULL, '2019-12-09 01:07:32', NULL, 10, 1, 4, NULL),
(11, '¿Con qué frecuencia se deprime?', 1, 'M', 1, '2019-12-10 11:38:52', NULL, '2019-12-10 11:38:52', NULL, NULL, NULL, 3, NULL),
(12, '¿Con qué frecuencia escucha audios de motivación?\n', 1, 'M', 1, '2019-12-10 19:56:22', NULL, '2019-12-10 19:56:22', NULL, NULL, NULL, 1, NULL),
(15, '¿Tu compañero te motiva para ser mejor?', 11, 'M', 1, '2019-12-11 20:53:54', '::1', '2019-12-11 13:53:53', NULL, 1, NULL, NULL, 1),
(16, '¿Sabe mandar?', 2, 'M', 1, '2019-12-11 13:56:22', '201.123.226.252', '2019-12-11 13:56:22', NULL, 1, 2, NULL, 1),
(17, '¿Es bueno mandando?', 1, 'M', 1, '2019-12-11 13:56:31', '201.123.226.252', '2019-12-11 13:56:31', NULL, 1, 2, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas_respuestas`
--

CREATE TABLE `preguntas_respuestas` (
  `id` int(11) NOT NULL,
  `id_pregunta` int(11) NOT NULL,
  `id_respuesta` int(11) NOT NULL,
  `puntos` decimal(6,2) DEFAULT NULL,
  `orden_respuesta` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `preguntas_respuestas`
--

INSERT INTO `preguntas_respuestas` (`id`, `id_pregunta`, `id_respuesta`, `puntos`, `orden_respuesta`) VALUES
(6, 2, 1, '5.00', 1),
(7, 2, 2, '4.00', 2),
(8, 2, 3, '2.00', 3),
(9, 2, 4, '0.00', 4),
(10, 3, 1, '5.00', 1),
(11, 3, 2, '4.00', 2),
(12, 3, 3, '2.00', 3),
(13, 3, 4, '0.00', 4),
(14, 4, 1, '5.00', 1),
(15, 4, 2, '4.00', 2),
(16, 4, 3, '2.00', 3),
(17, 4, 4, '0.00', 4),
(18, 5, 1, '5.00', 1),
(19, 5, 2, '4.00', 2),
(20, 5, 3, '2.00', 3),
(21, 5, 4, '0.00', 4),
(22, 6, 1, '5.00', 1),
(23, 6, 2, '4.00', 2),
(24, 6, 3, '2.00', 3),
(25, 6, 4, '0.00', 4),
(26, 7, 1, '5.00', 1),
(27, 7, 2, '4.00', 2),
(28, 7, 3, '2.00', 3),
(29, 7, 4, '0.00', 4),
(30, 8, 1, '5.00', 1),
(31, 8, 2, '4.00', 2),
(32, 8, 3, '2.00', 3),
(33, 8, 4, '0.00', 4),
(34, 9, 1, '5.00', 1),
(35, 9, 2, '4.00', 2),
(36, 9, 3, '2.00', 3),
(37, 9, 4, '0.00', 4),
(38, 10, 1, '5.00', 1),
(39, 10, 2, '4.00', 2),
(40, 10, 3, '2.00', 3),
(41, 10, 4, '0.00', 4),
(180, 1, 1, '5.00', 1),
(181, 1, 2, '4.00', 2),
(182, 1, 3, '2.00', 3),
(183, 1, 4, '0.00', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promedios_por_evaluado`
--

CREATE TABLE `promedios_por_evaluado` (
  `id` int(11) NOT NULL,
  `id_evaluacion` int(11) NOT NULL,
  `id_cuestionario` int(11) NOT NULL,
  `id_periodo` int(11) NOT NULL,
  `id_evaluado` int(11) NOT NULL,
  `id_evaluado_nivel` int(11) NOT NULL,
  `id_evaluador` int(11) NOT NULL,
  `id_evaluador_nivel` int(11) NOT NULL,
  `id_rol_evaluador` tinyint(4) NOT NULL,
  `id_aplicacion` int(11) NOT NULL,
  `id_pregunta` int(11) NOT NULL,
  `id_respuesta` int(11) NOT NULL,
  `puntos` int(11) NOT NULL,
  `creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `promedios_por_evaluado`
--

INSERT INTO `promedios_por_evaluado` (`id`, `id_evaluacion`, `id_cuestionario`, `id_periodo`, `id_evaluado`, `id_evaluado_nivel`, `id_evaluador`, `id_evaluador_nivel`, `id_rol_evaluador`, `id_aplicacion`, `id_pregunta`, `id_respuesta`, `puntos`, `creacion`) VALUES
(411, 10, 1, 1, 78, 1, 76, 1, 2, 57, 1, 2, 4, '2019-12-10 14:22:17'),
(412, 10, 1, 1, 78, 1, 76, 1, 2, 57, 2, 2, 4, '2019-12-10 14:22:17'),
(413, 10, 1, 1, 78, 1, 76, 1, 2, 57, 3, 3, 2, '2019-12-10 14:22:17'),
(414, 10, 1, 1, 78, 1, 76, 1, 2, 57, 4, 2, 4, '2019-12-10 14:22:17'),
(415, 10, 1, 1, 78, 1, 76, 1, 2, 57, 5, 2, 4, '2019-12-10 14:22:17'),
(416, 10, 1, 1, 78, 1, 76, 1, 2, 57, 6, 1, 5, '2019-12-10 14:22:17'),
(417, 10, 1, 1, 78, 1, 76, 1, 2, 57, 7, 3, 2, '2019-12-10 14:22:18'),
(418, 10, 1, 1, 78, 1, 76, 1, 2, 57, 8, 1, 5, '2019-12-10 14:22:18'),
(419, 10, 1, 1, 78, 1, 76, 1, 2, 57, 9, 1, 5, '2019-12-10 14:22:18'),
(420, 10, 1, 1, 78, 1, 76, 1, 2, 57, 10, 2, 4, '2019-12-10 14:22:18'),
(421, 10, 1, 1, 78, 1, 77, 1, 3, 58, 1, 2, 4, '2019-12-10 14:22:18'),
(422, 10, 1, 1, 78, 1, 77, 1, 3, 58, 2, 1, 5, '2019-12-10 14:22:18'),
(423, 10, 1, 1, 78, 1, 77, 1, 3, 58, 3, 3, 2, '2019-12-10 14:22:18'),
(424, 10, 1, 1, 78, 1, 77, 1, 3, 58, 4, 2, 4, '2019-12-10 14:22:18'),
(425, 10, 1, 1, 78, 1, 77, 1, 3, 58, 5, 3, 2, '2019-12-10 14:22:18'),
(426, 10, 1, 1, 78, 1, 77, 1, 3, 58, 6, 4, 0, '2019-12-10 14:22:18'),
(427, 10, 1, 1, 78, 1, 77, 1, 3, 58, 7, 2, 4, '2019-12-10 14:22:18'),
(428, 10, 1, 1, 78, 1, 77, 1, 3, 58, 8, 4, 0, '2019-12-10 14:22:18'),
(429, 10, 1, 1, 78, 1, 77, 1, 3, 58, 9, 2, 4, '2019-12-10 14:22:18'),
(430, 10, 1, 1, 78, 1, 77, 1, 3, 58, 10, 4, 0, '2019-12-10 14:22:18'),
(431, 10, 1, 1, 78, 1, 78, 1, 5, 60, 1, 2, 4, '2019-12-10 14:22:18'),
(432, 10, 1, 1, 78, 1, 78, 1, 5, 60, 2, 2, 4, '2019-12-10 14:22:18'),
(433, 10, 1, 1, 78, 1, 78, 1, 5, 60, 3, 2, 4, '2019-12-10 14:22:18'),
(434, 10, 1, 1, 78, 1, 78, 1, 5, 60, 4, 2, 4, '2019-12-10 14:22:18'),
(435, 10, 1, 1, 78, 1, 78, 1, 5, 60, 5, 2, 4, '2019-12-10 14:22:18'),
(436, 10, 1, 1, 78, 1, 78, 1, 5, 60, 6, 2, 4, '2019-12-10 14:22:18'),
(437, 10, 1, 1, 78, 1, 78, 1, 5, 60, 7, 2, 4, '2019-12-10 14:22:18'),
(438, 10, 1, 1, 78, 1, 78, 1, 5, 60, 8, 2, 4, '2019-12-10 14:22:18'),
(439, 10, 1, 1, 78, 1, 78, 1, 5, 60, 9, 2, 4, '2019-12-10 14:22:18'),
(440, 10, 1, 1, 78, 1, 78, 1, 5, 60, 10, 2, 4, '2019-12-10 14:22:18'),
(441, 10, 1, 1, 78, 1, 81, 1, 4, 59, 1, 4, 0, '2019-12-10 14:22:18'),
(442, 10, 1, 1, 78, 1, 81, 1, 4, 59, 2, 4, 0, '2019-12-10 14:22:18'),
(443, 10, 1, 1, 78, 1, 81, 1, 4, 59, 3, 4, 0, '2019-12-10 14:22:18'),
(444, 10, 1, 1, 78, 1, 81, 1, 4, 59, 4, 4, 0, '2019-12-10 14:22:18'),
(445, 10, 1, 1, 78, 1, 81, 1, 4, 59, 5, 4, 0, '2019-12-10 14:22:18'),
(446, 10, 1, 1, 78, 1, 81, 1, 4, 59, 6, 4, 0, '2019-12-10 14:22:18'),
(447, 10, 1, 1, 78, 1, 81, 1, 4, 59, 7, 4, 0, '2019-12-10 14:22:18'),
(448, 10, 1, 1, 78, 1, 81, 1, 4, 59, 8, 4, 0, '2019-12-10 14:22:18'),
(449, 10, 1, 1, 78, 1, 81, 1, 4, 59, 9, 4, 0, '2019-12-10 14:22:18'),
(450, 10, 1, 1, 78, 1, 81, 1, 4, 59, 10, 4, 0, '2019-12-10 14:22:18'),
(1366, 18, 1, 44, 79, 1, 79, 1, 5, 98, 1, 3, 2, '2019-12-11 19:44:42'),
(1367, 18, 1, 44, 79, 1, 79, 1, 5, 98, 2, 4, 0, '2019-12-11 19:44:42'),
(1368, 18, 1, 44, 79, 1, 79, 1, 5, 98, 3, 1, 5, '2019-12-11 19:44:42'),
(1369, 18, 1, 44, 79, 1, 79, 1, 5, 98, 4, 2, 4, '2019-12-11 19:44:42'),
(1370, 18, 1, 44, 79, 1, 79, 1, 5, 98, 5, 2, 4, '2019-12-11 19:44:42'),
(1371, 18, 1, 44, 79, 1, 79, 1, 5, 98, 6, 2, 4, '2019-12-11 19:44:42'),
(1372, 18, 1, 44, 79, 1, 79, 1, 5, 98, 7, 1, 5, '2019-12-11 19:44:42'),
(1373, 18, 1, 44, 79, 1, 79, 1, 5, 98, 8, 2, 4, '2019-12-11 19:44:42'),
(1374, 18, 1, 44, 79, 1, 79, 1, 5, 98, 9, 1, 5, '2019-12-11 19:44:42'),
(1375, 18, 1, 44, 79, 1, 79, 1, 5, 98, 10, 3, 2, '2019-12-11 19:44:42'),
(1376, 18, 1, 44, 79, 1, 80, 1, 1, 94, 1, 3, 2, '2019-12-11 19:44:42'),
(1377, 18, 1, 44, 79, 1, 80, 1, 1, 94, 2, 3, 2, '2019-12-11 19:44:42'),
(1378, 18, 1, 44, 79, 1, 80, 1, 1, 94, 3, 3, 2, '2019-12-11 19:44:42'),
(1379, 18, 1, 44, 79, 1, 80, 1, 1, 94, 4, 3, 2, '2019-12-11 19:44:42'),
(1380, 18, 1, 44, 79, 1, 80, 1, 1, 94, 5, 3, 2, '2019-12-11 19:44:42'),
(1381, 18, 1, 44, 79, 1, 80, 1, 1, 94, 6, 3, 2, '2019-12-11 19:44:42'),
(1382, 18, 1, 44, 79, 1, 80, 1, 1, 94, 7, 3, 2, '2019-12-11 19:44:42'),
(1383, 18, 1, 44, 79, 1, 80, 1, 1, 94, 8, 3, 2, '2019-12-11 19:44:42'),
(1384, 18, 1, 44, 79, 1, 80, 1, 1, 94, 9, 3, 2, '2019-12-11 19:44:42'),
(1385, 18, 1, 44, 79, 1, 80, 1, 1, 94, 10, 3, 2, '2019-12-11 19:44:42'),
(1386, 18, 1, 44, 79, 1, 82, 3, 2, 95, 1, 4, 0, '2019-12-11 19:44:42'),
(1387, 18, 1, 44, 79, 1, 82, 3, 2, 95, 2, 4, 0, '2019-12-11 19:44:42'),
(1388, 18, 1, 44, 79, 1, 82, 3, 2, 95, 3, 4, 0, '2019-12-11 19:44:42'),
(1389, 18, 1, 44, 79, 1, 82, 3, 2, 95, 4, 4, 0, '2019-12-11 19:44:42'),
(1390, 18, 1, 44, 79, 1, 82, 3, 2, 95, 5, 4, 0, '2019-12-11 19:44:42'),
(1391, 18, 1, 44, 79, 1, 82, 3, 2, 95, 6, 4, 0, '2019-12-11 19:44:42'),
(1392, 18, 1, 44, 79, 1, 82, 3, 2, 95, 7, 4, 0, '2019-12-11 19:44:42'),
(1393, 18, 1, 44, 79, 1, 82, 3, 2, 95, 8, 4, 0, '2019-12-11 19:44:42'),
(1394, 18, 1, 44, 79, 1, 82, 3, 2, 95, 9, 4, 0, '2019-12-11 19:44:42'),
(1395, 18, 1, 44, 79, 1, 82, 3, 2, 95, 10, 4, 0, '2019-12-11 19:44:42'),
(1396, 18, 1, 44, 79, 1, 84, 1, 3, 96, 1, 2, 4, '2019-12-11 19:44:42'),
(1397, 18, 1, 44, 79, 1, 84, 1, 3, 96, 2, 3, 2, '2019-12-11 19:44:42'),
(1398, 18, 1, 44, 79, 1, 84, 1, 3, 96, 3, 3, 2, '2019-12-11 19:44:42'),
(1399, 18, 1, 44, 79, 1, 84, 1, 3, 96, 4, 2, 4, '2019-12-11 19:44:42'),
(1400, 18, 1, 44, 79, 1, 84, 1, 3, 96, 5, 2, 4, '2019-12-11 19:44:42'),
(1401, 18, 1, 44, 79, 1, 84, 1, 3, 96, 6, 3, 2, '2019-12-11 19:44:42'),
(1402, 18, 1, 44, 79, 1, 84, 1, 3, 96, 7, 1, 5, '2019-12-11 19:44:42'),
(1403, 18, 1, 44, 79, 1, 84, 1, 3, 96, 8, 4, 0, '2019-12-11 19:44:42'),
(1404, 18, 1, 44, 79, 1, 84, 1, 3, 96, 9, 2, 4, '2019-12-11 19:44:42'),
(1405, 18, 1, 44, 79, 1, 84, 1, 3, 96, 10, 1, 5, '2019-12-11 19:44:42'),
(1406, 18, 1, 44, 82, 3, 79, 1, 1, 99, 1, 1, 5, '2019-12-11 19:44:42'),
(1407, 18, 1, 44, 82, 3, 79, 1, 1, 99, 2, 2, 4, '2019-12-11 19:44:42'),
(1408, 18, 1, 44, 82, 3, 79, 1, 1, 99, 3, 2, 4, '2019-12-11 19:44:42'),
(1409, 18, 1, 44, 82, 3, 79, 1, 1, 99, 4, 2, 4, '2019-12-11 19:44:42'),
(1410, 18, 1, 44, 82, 3, 79, 1, 1, 99, 5, 2, 4, '2019-12-11 19:44:42'),
(1411, 18, 1, 44, 82, 3, 79, 1, 1, 99, 6, 2, 4, '2019-12-11 19:44:42'),
(1412, 18, 1, 44, 82, 3, 79, 1, 1, 99, 7, 3, 2, '2019-12-11 19:44:42'),
(1413, 18, 1, 44, 82, 3, 79, 1, 1, 99, 8, 3, 2, '2019-12-11 19:44:42'),
(1414, 18, 1, 44, 82, 3, 79, 1, 1, 99, 9, 3, 2, '2019-12-11 19:44:42'),
(1415, 18, 1, 44, 82, 3, 79, 1, 1, 99, 10, 2, 4, '2019-12-11 19:44:42'),
(1416, 18, 1, 44, 82, 3, 80, 1, 2, 100, 1, 2, 4, '2019-12-11 19:44:42'),
(1417, 18, 1, 44, 82, 3, 80, 1, 2, 100, 2, 2, 4, '2019-12-11 19:44:42'),
(1418, 18, 1, 44, 82, 3, 80, 1, 2, 100, 3, 2, 4, '2019-12-11 19:44:42'),
(1419, 18, 1, 44, 82, 3, 80, 1, 2, 100, 4, 2, 4, '2019-12-11 19:44:42'),
(1420, 18, 1, 44, 82, 3, 80, 1, 2, 100, 5, 2, 4, '2019-12-11 19:44:42'),
(1421, 18, 1, 44, 82, 3, 80, 1, 2, 100, 6, 2, 4, '2019-12-11 19:44:42'),
(1422, 18, 1, 44, 82, 3, 80, 1, 2, 100, 7, 2, 4, '2019-12-11 19:44:42'),
(1423, 18, 1, 44, 82, 3, 80, 1, 2, 100, 8, 2, 4, '2019-12-11 19:44:42'),
(1424, 18, 1, 44, 82, 3, 80, 1, 2, 100, 9, 2, 4, '2019-12-11 19:44:42'),
(1425, 18, 1, 44, 82, 3, 80, 1, 2, 100, 10, 2, 4, '2019-12-11 19:44:42'),
(1426, 18, 1, 44, 82, 3, 82, 3, 5, 103, 1, 4, 0, '2019-12-11 19:44:42'),
(1427, 18, 1, 44, 82, 3, 82, 3, 5, 103, 2, 4, 0, '2019-12-11 19:44:42'),
(1428, 18, 1, 44, 82, 3, 82, 3, 5, 103, 3, 4, 0, '2019-12-11 19:44:42'),
(1429, 18, 1, 44, 82, 3, 82, 3, 5, 103, 4, 4, 0, '2019-12-11 19:44:42'),
(1430, 18, 1, 44, 82, 3, 82, 3, 5, 103, 5, 4, 0, '2019-12-11 19:44:42'),
(1431, 18, 1, 44, 82, 3, 82, 3, 5, 103, 6, 4, 0, '2019-12-11 19:44:42'),
(1432, 18, 1, 44, 82, 3, 82, 3, 5, 103, 7, 4, 0, '2019-12-11 19:44:42'),
(1433, 18, 1, 44, 82, 3, 82, 3, 5, 103, 8, 4, 0, '2019-12-11 19:44:42'),
(1434, 18, 1, 44, 82, 3, 82, 3, 5, 103, 9, 4, 0, '2019-12-11 19:44:42'),
(1435, 18, 1, 44, 82, 3, 82, 3, 5, 103, 10, 4, 0, '2019-12-11 19:44:42'),
(1436, 18, 1, 44, 82, 3, 84, 1, 4, 102, 1, 2, 4, '2019-12-11 19:44:42'),
(1437, 18, 1, 44, 82, 3, 84, 1, 4, 102, 2, 2, 4, '2019-12-11 19:44:42'),
(1438, 18, 1, 44, 82, 3, 84, 1, 4, 102, 3, 2, 4, '2019-12-11 19:44:42'),
(1439, 18, 1, 44, 82, 3, 84, 1, 4, 102, 4, 1, 5, '2019-12-11 19:44:42'),
(1440, 18, 1, 44, 82, 3, 84, 1, 4, 102, 5, 2, 4, '2019-12-11 19:44:42'),
(1441, 18, 1, 44, 82, 3, 84, 1, 4, 102, 6, 1, 5, '2019-12-11 19:44:42'),
(1442, 18, 1, 44, 82, 3, 84, 1, 4, 102, 7, 1, 5, '2019-12-11 19:44:42'),
(1443, 18, 1, 44, 82, 3, 84, 1, 4, 102, 8, 3, 2, '2019-12-11 19:44:42'),
(1444, 18, 1, 44, 82, 3, 84, 1, 4, 102, 9, 3, 2, '2019-12-11 19:44:42'),
(1445, 18, 1, 44, 82, 3, 84, 1, 4, 102, 10, 1, 5, '2019-12-11 19:44:42'),
(1446, 18, 1, 44, 83, 1, 79, 1, 1, 104, 1, 4, 0, '2019-12-11 19:44:42'),
(1447, 18, 1, 44, 83, 1, 79, 1, 1, 104, 2, 4, 0, '2019-12-11 19:44:42'),
(1448, 18, 1, 44, 83, 1, 79, 1, 1, 104, 3, 4, 0, '2019-12-11 19:44:42'),
(1449, 18, 1, 44, 83, 1, 79, 1, 1, 104, 4, 4, 0, '2019-12-11 19:44:42'),
(1450, 18, 1, 44, 83, 1, 79, 1, 1, 104, 5, 4, 0, '2019-12-11 19:44:42'),
(1451, 18, 1, 44, 83, 1, 79, 1, 1, 104, 6, 4, 0, '2019-12-11 19:44:42'),
(1452, 18, 1, 44, 83, 1, 79, 1, 1, 104, 7, 4, 0, '2019-12-11 19:44:42'),
(1453, 18, 1, 44, 83, 1, 79, 1, 1, 104, 8, 4, 0, '2019-12-11 19:44:42'),
(1454, 18, 1, 44, 83, 1, 79, 1, 1, 104, 9, 4, 0, '2019-12-11 19:44:42'),
(1455, 18, 1, 44, 83, 1, 79, 1, 1, 104, 10, 4, 0, '2019-12-11 19:44:42'),
(1456, 18, 1, 44, 83, 1, 80, 1, 2, 105, 1, 4, 0, '2019-12-11 19:44:42'),
(1457, 18, 1, 44, 83, 1, 80, 1, 2, 105, 2, 4, 0, '2019-12-11 19:44:42'),
(1458, 18, 1, 44, 83, 1, 80, 1, 2, 105, 3, 4, 0, '2019-12-11 19:44:42'),
(1459, 18, 1, 44, 83, 1, 80, 1, 2, 105, 4, 4, 0, '2019-12-11 19:44:42'),
(1460, 18, 1, 44, 83, 1, 80, 1, 2, 105, 5, 4, 0, '2019-12-11 19:44:42'),
(1461, 18, 1, 44, 83, 1, 80, 1, 2, 105, 6, 4, 0, '2019-12-11 19:44:42'),
(1462, 18, 1, 44, 83, 1, 80, 1, 2, 105, 7, 4, 0, '2019-12-11 19:44:42'),
(1463, 18, 1, 44, 83, 1, 80, 1, 2, 105, 8, 4, 0, '2019-12-11 19:44:42'),
(1464, 18, 1, 44, 83, 1, 80, 1, 2, 105, 9, 4, 0, '2019-12-11 19:44:42'),
(1465, 18, 1, 44, 83, 1, 80, 1, 2, 105, 10, 4, 0, '2019-12-11 19:44:42'),
(1466, 18, 1, 44, 83, 1, 82, 3, 4, 107, 1, 4, 0, '2019-12-11 19:44:42'),
(1467, 18, 1, 44, 83, 1, 82, 3, 4, 107, 2, 4, 0, '2019-12-11 19:44:42'),
(1468, 18, 1, 44, 83, 1, 82, 3, 4, 107, 3, 4, 0, '2019-12-11 19:44:42'),
(1469, 18, 1, 44, 83, 1, 82, 3, 4, 107, 4, 4, 0, '2019-12-11 19:44:42'),
(1470, 18, 1, 44, 83, 1, 82, 3, 4, 107, 5, 4, 0, '2019-12-11 19:44:42'),
(1471, 18, 1, 44, 83, 1, 82, 3, 4, 107, 6, 4, 0, '2019-12-11 19:44:42'),
(1472, 18, 1, 44, 83, 1, 82, 3, 4, 107, 7, 4, 0, '2019-12-11 19:44:42'),
(1473, 18, 1, 44, 83, 1, 82, 3, 4, 107, 8, 4, 0, '2019-12-11 19:44:42'),
(1474, 18, 1, 44, 83, 1, 82, 3, 4, 107, 9, 4, 0, '2019-12-11 19:44:42'),
(1475, 18, 1, 44, 83, 1, 82, 3, 4, 107, 10, 4, 0, '2019-12-11 19:44:42'),
(1476, 18, 1, 44, 83, 1, 83, 1, 5, 108, 1, 1, 5, '2019-12-11 19:44:42'),
(1477, 18, 1, 44, 83, 1, 83, 1, 5, 108, 2, 1, 5, '2019-12-11 19:44:42'),
(1478, 18, 1, 44, 83, 1, 83, 1, 5, 108, 3, 1, 5, '2019-12-11 19:44:42'),
(1479, 18, 1, 44, 83, 1, 83, 1, 5, 108, 4, 1, 5, '2019-12-11 19:44:42'),
(1480, 18, 1, 44, 83, 1, 83, 1, 5, 108, 5, 1, 5, '2019-12-11 19:44:42'),
(1481, 18, 1, 44, 83, 1, 83, 1, 5, 108, 6, 1, 5, '2019-12-11 19:44:42'),
(1482, 18, 1, 44, 83, 1, 83, 1, 5, 108, 7, 1, 5, '2019-12-11 19:44:42'),
(1483, 18, 1, 44, 83, 1, 83, 1, 5, 108, 8, 1, 5, '2019-12-11 19:44:42'),
(1484, 18, 1, 44, 83, 1, 83, 1, 5, 108, 9, 1, 5, '2019-12-11 19:44:42'),
(1485, 18, 1, 44, 83, 1, 83, 1, 5, 108, 10, 1, 5, '2019-12-11 19:44:42'),
(1486, 18, 1, 44, 83, 1, 85, 2, 3, 106, 1, 4, 0, '2019-12-11 19:44:42'),
(1487, 18, 1, 44, 83, 1, 85, 2, 3, 106, 2, 1, 5, '2019-12-11 19:44:42'),
(1488, 18, 1, 44, 83, 1, 85, 2, 3, 106, 3, 2, 4, '2019-12-11 19:44:42'),
(1489, 18, 1, 44, 83, 1, 85, 2, 3, 106, 4, 3, 2, '2019-12-11 19:44:42'),
(1490, 18, 1, 44, 83, 1, 85, 2, 3, 106, 5, 1, 5, '2019-12-11 19:44:42'),
(1491, 18, 1, 44, 83, 1, 85, 2, 3, 106, 6, 3, 2, '2019-12-11 19:44:42'),
(1492, 18, 1, 44, 83, 1, 85, 2, 3, 106, 7, 1, 5, '2019-12-11 19:44:42'),
(1493, 18, 1, 44, 83, 1, 85, 2, 3, 106, 8, 1, 5, '2019-12-11 19:44:42'),
(1494, 18, 1, 44, 83, 1, 85, 2, 3, 106, 9, 2, 4, '2019-12-11 19:44:42'),
(1495, 18, 1, 44, 83, 1, 85, 2, 3, 106, 10, 1, 5, '2019-12-11 19:44:42'),
(1496, 11, 1, 1, 79, 1, 83, 1, 3, 73, 1, 1, 5, '2019-12-11 19:47:22'),
(1497, 11, 1, 1, 79, 1, 83, 1, 3, 73, 2, 2, 4, '2019-12-11 19:47:22'),
(1498, 11, 1, 1, 79, 1, 83, 1, 3, 73, 3, 1, 5, '2019-12-11 19:47:22'),
(1499, 11, 1, 1, 79, 1, 83, 1, 3, 73, 4, 2, 4, '2019-12-11 19:47:22'),
(1500, 11, 1, 1, 79, 1, 83, 1, 3, 73, 5, 1, 5, '2019-12-11 19:47:22'),
(1501, 11, 1, 1, 79, 1, 83, 1, 3, 73, 6, 2, 4, '2019-12-11 19:47:22'),
(1502, 11, 1, 1, 79, 1, 83, 1, 3, 73, 7, 2, 4, '2019-12-11 19:47:22'),
(1503, 11, 1, 1, 79, 1, 83, 1, 3, 73, 8, 1, 5, '2019-12-11 19:47:22'),
(1504, 11, 1, 1, 79, 1, 83, 1, 3, 73, 9, 2, 4, '2019-12-11 19:47:22'),
(1505, 11, 1, 1, 79, 1, 83, 1, 3, 73, 10, 1, 5, '2019-12-11 19:47:22'),
(1506, 11, 1, 1, 79, 1, 84, 1, 4, 74, 1, 2, 4, '2019-12-11 19:47:22'),
(1507, 11, 1, 1, 79, 1, 84, 1, 4, 74, 2, 1, 5, '2019-12-11 19:47:22'),
(1508, 11, 1, 1, 79, 1, 84, 1, 4, 74, 3, 3, 2, '2019-12-11 19:47:22'),
(1509, 11, 1, 1, 79, 1, 84, 1, 4, 74, 4, 2, 4, '2019-12-11 19:47:22'),
(1510, 11, 1, 1, 79, 1, 84, 1, 4, 74, 5, 3, 2, '2019-12-11 19:47:22'),
(1511, 11, 1, 1, 79, 1, 84, 1, 4, 74, 6, 2, 4, '2019-12-11 19:47:22'),
(1512, 11, 1, 1, 79, 1, 84, 1, 4, 74, 7, 1, 5, '2019-12-11 19:47:22'),
(1513, 11, 1, 1, 79, 1, 84, 1, 4, 74, 8, 2, 4, '2019-12-11 19:47:22'),
(1514, 11, 1, 1, 79, 1, 84, 1, 4, 74, 9, 2, 4, '2019-12-11 19:47:22'),
(1515, 11, 1, 1, 79, 1, 84, 1, 4, 74, 10, 1, 5, '2019-12-11 19:47:22'),
(1516, 11, 1, 1, 80, 1, 79, 1, 1, 61, 1, 4, 0, '2019-12-11 19:47:22'),
(1517, 11, 1, 1, 80, 1, 79, 1, 1, 61, 2, 4, 0, '2019-12-11 19:47:22'),
(1518, 11, 1, 1, 80, 1, 79, 1, 1, 61, 3, 4, 0, '2019-12-11 19:47:22'),
(1519, 11, 1, 1, 80, 1, 79, 1, 1, 61, 4, 4, 0, '2019-12-11 19:47:22'),
(1520, 11, 1, 1, 80, 1, 79, 1, 1, 61, 5, 4, 0, '2019-12-11 19:47:22'),
(1521, 11, 1, 1, 80, 1, 79, 1, 1, 61, 6, 4, 0, '2019-12-11 19:47:22'),
(1522, 11, 1, 1, 80, 1, 79, 1, 1, 61, 7, 4, 0, '2019-12-11 19:47:22'),
(1523, 11, 1, 1, 80, 1, 79, 1, 1, 61, 8, 4, 0, '2019-12-11 19:47:22'),
(1524, 11, 1, 1, 80, 1, 79, 1, 1, 61, 9, 4, 0, '2019-12-11 19:47:22'),
(1525, 11, 1, 1, 80, 1, 79, 1, 1, 61, 10, 4, 0, '2019-12-11 19:47:22'),
(1526, 11, 1, 1, 80, 1, 80, 1, 5, 65, 1, 1, 5, '2019-12-11 19:47:22'),
(1527, 11, 1, 1, 80, 1, 80, 1, 5, 65, 2, 1, 5, '2019-12-11 19:47:22'),
(1528, 11, 1, 1, 80, 1, 80, 1, 5, 65, 3, 1, 5, '2019-12-11 19:47:22'),
(1529, 11, 1, 1, 80, 1, 80, 1, 5, 65, 4, 1, 5, '2019-12-11 19:47:22'),
(1530, 11, 1, 1, 80, 1, 80, 1, 5, 65, 5, 1, 5, '2019-12-11 19:47:22'),
(1531, 11, 1, 1, 80, 1, 80, 1, 5, 65, 6, 1, 5, '2019-12-11 19:47:22'),
(1532, 11, 1, 1, 80, 1, 80, 1, 5, 65, 7, 1, 5, '2019-12-11 19:47:22'),
(1533, 11, 1, 1, 80, 1, 80, 1, 5, 65, 8, 1, 5, '2019-12-11 19:47:22'),
(1534, 11, 1, 1, 80, 1, 80, 1, 5, 65, 9, 1, 5, '2019-12-11 19:47:23'),
(1535, 11, 1, 1, 80, 1, 80, 1, 5, 65, 10, 1, 5, '2019-12-11 19:47:23'),
(1536, 11, 1, 1, 80, 1, 82, 3, 2, 62, 1, 4, 0, '2019-12-11 19:47:23'),
(1537, 11, 1, 1, 80, 1, 82, 3, 2, 62, 2, 4, 0, '2019-12-11 19:47:23'),
(1538, 11, 1, 1, 80, 1, 82, 3, 2, 62, 3, 4, 0, '2019-12-11 19:47:23'),
(1539, 11, 1, 1, 80, 1, 82, 3, 2, 62, 4, 4, 0, '2019-12-11 19:47:23'),
(1540, 11, 1, 1, 80, 1, 82, 3, 2, 62, 5, 4, 0, '2019-12-11 19:47:23'),
(1541, 11, 1, 1, 80, 1, 82, 3, 2, 62, 6, 4, 0, '2019-12-11 19:47:23'),
(1542, 11, 1, 1, 80, 1, 82, 3, 2, 62, 7, 4, 0, '2019-12-11 19:47:23'),
(1543, 11, 1, 1, 80, 1, 82, 3, 2, 62, 8, 4, 0, '2019-12-11 19:47:23'),
(1544, 11, 1, 1, 80, 1, 82, 3, 2, 62, 9, 4, 0, '2019-12-11 19:47:23'),
(1545, 11, 1, 1, 80, 1, 82, 3, 2, 62, 10, 4, 0, '2019-12-11 19:47:23'),
(1546, 11, 1, 1, 80, 1, 84, 1, 3, 63, 1, 4, 0, '2019-12-11 19:47:23'),
(1547, 11, 1, 1, 80, 1, 84, 1, 3, 63, 2, 4, 0, '2019-12-11 19:47:23'),
(1548, 11, 1, 1, 80, 1, 84, 1, 3, 63, 3, 4, 0, '2019-12-11 19:47:23'),
(1549, 11, 1, 1, 80, 1, 84, 1, 3, 63, 4, 4, 0, '2019-12-11 19:47:23'),
(1550, 11, 1, 1, 80, 1, 84, 1, 3, 63, 5, 4, 0, '2019-12-11 19:47:23'),
(1551, 11, 1, 1, 80, 1, 84, 1, 3, 63, 6, 4, 0, '2019-12-11 19:47:23'),
(1552, 11, 1, 1, 80, 1, 84, 1, 3, 63, 7, 4, 0, '2019-12-11 19:47:23'),
(1553, 11, 1, 1, 80, 1, 84, 1, 3, 63, 8, 4, 0, '2019-12-11 19:47:23'),
(1554, 11, 1, 1, 80, 1, 84, 1, 3, 63, 9, 4, 0, '2019-12-11 19:47:23'),
(1555, 11, 1, 1, 80, 1, 84, 1, 3, 63, 10, 2, 4, '2019-12-11 19:47:23'),
(1556, 11, 1, 1, 80, 1, 85, 2, 4, 64, 1, 2, 4, '2019-12-11 19:47:23'),
(1557, 11, 1, 1, 80, 1, 85, 2, 4, 64, 2, 1, 5, '2019-12-11 19:47:23'),
(1558, 11, 1, 1, 80, 1, 85, 2, 4, 64, 3, 4, 0, '2019-12-11 19:47:23'),
(1559, 11, 1, 1, 80, 1, 85, 2, 4, 64, 4, 2, 4, '2019-12-11 19:47:23'),
(1560, 11, 1, 1, 80, 1, 85, 2, 4, 64, 5, 1, 5, '2019-12-11 19:47:23'),
(1561, 11, 1, 1, 80, 1, 85, 2, 4, 64, 6, 2, 4, '2019-12-11 19:47:23'),
(1562, 11, 1, 1, 80, 1, 85, 2, 4, 64, 7, 4, 0, '2019-12-11 19:47:23'),
(1563, 11, 1, 1, 80, 1, 85, 2, 4, 64, 8, 1, 5, '2019-12-11 19:47:23'),
(1564, 11, 1, 1, 80, 1, 85, 2, 4, 64, 9, 2, 4, '2019-12-11 19:47:23'),
(1565, 11, 1, 1, 80, 1, 85, 2, 4, 64, 10, 2, 4, '2019-12-11 19:47:23'),
(1606, 12, 1, 1, 78, 1, 1, 1, 1, 66, 1, 1, 5, '2019-12-11 22:56:10'),
(1607, 12, 1, 1, 78, 1, 1, 1, 1, 66, 2, 1, 5, '2019-12-11 22:56:10'),
(1608, 12, 1, 1, 78, 1, 1, 1, 1, 66, 3, 1, 5, '2019-12-11 22:56:10'),
(1609, 12, 1, 1, 78, 1, 1, 1, 1, 66, 4, 1, 5, '2019-12-11 22:56:10'),
(1610, 12, 1, 1, 78, 1, 1, 1, 1, 66, 5, 2, 4, '2019-12-11 22:56:10'),
(1611, 12, 1, 1, 78, 1, 1, 1, 1, 66, 6, 2, 4, '2019-12-11 22:56:10'),
(1612, 12, 1, 1, 78, 1, 1, 1, 1, 66, 7, 2, 4, '2019-12-11 22:56:10'),
(1613, 12, 1, 1, 78, 1, 1, 1, 1, 66, 8, 1, 5, '2019-12-11 22:56:10'),
(1614, 12, 1, 1, 78, 1, 1, 1, 1, 66, 9, 1, 5, '2019-12-11 22:56:10'),
(1615, 12, 1, 1, 78, 1, 1, 1, 1, 66, 10, 1, 5, '2019-12-11 22:56:10'),
(1616, 12, 1, 1, 78, 1, 75, 1, 2, 67, 1, 1, 5, '2019-12-11 22:56:10'),
(1617, 12, 1, 1, 78, 1, 75, 1, 2, 67, 2, 4, 0, '2019-12-11 22:56:10'),
(1618, 12, 1, 1, 78, 1, 75, 1, 2, 67, 3, 4, 0, '2019-12-11 22:56:10'),
(1619, 12, 1, 1, 78, 1, 75, 1, 2, 67, 4, 4, 0, '2019-12-11 22:56:10'),
(1620, 12, 1, 1, 78, 1, 75, 1, 2, 67, 5, 4, 0, '2019-12-11 22:56:10'),
(1621, 12, 1, 1, 78, 1, 75, 1, 2, 67, 6, 4, 0, '2019-12-11 22:56:10'),
(1622, 12, 1, 1, 78, 1, 75, 1, 2, 67, 7, 4, 0, '2019-12-11 22:56:10'),
(1623, 12, 1, 1, 78, 1, 75, 1, 2, 67, 8, 1, 5, '2019-12-11 22:56:10'),
(1624, 12, 1, 1, 78, 1, 75, 1, 2, 67, 9, 1, 5, '2019-12-11 22:56:10'),
(1625, 12, 1, 1, 78, 1, 75, 1, 2, 67, 10, 1, 5, '2019-12-11 22:56:10'),
(1626, 12, 1, 1, 78, 1, 76, 1, 3, 68, 1, 1, 5, '2019-12-11 22:56:10'),
(1627, 12, 1, 1, 78, 1, 76, 1, 3, 68, 2, 1, 5, '2019-12-11 22:56:10'),
(1628, 12, 1, 1, 78, 1, 76, 1, 3, 68, 3, 3, 2, '2019-12-11 22:56:10'),
(1629, 12, 1, 1, 78, 1, 76, 1, 3, 68, 4, 3, 2, '2019-12-11 22:56:10'),
(1630, 12, 1, 1, 78, 1, 76, 1, 3, 68, 5, 2, 4, '2019-12-11 22:56:10'),
(1631, 12, 1, 1, 78, 1, 76, 1, 3, 68, 6, 1, 5, '2019-12-11 22:56:10'),
(1632, 12, 1, 1, 78, 1, 76, 1, 3, 68, 7, 1, 5, '2019-12-11 22:56:10'),
(1633, 12, 1, 1, 78, 1, 76, 1, 3, 68, 8, 1, 5, '2019-12-11 22:56:10'),
(1634, 12, 1, 1, 78, 1, 76, 1, 3, 68, 9, 1, 5, '2019-12-11 22:56:10'),
(1635, 12, 1, 1, 78, 1, 76, 1, 3, 68, 10, 1, 5, '2019-12-11 22:56:10'),
(1636, 12, 1, 1, 78, 1, 77, 1, 4, 69, 1, 1, 5, '2019-12-11 22:56:10'),
(1637, 12, 1, 1, 78, 1, 77, 1, 4, 69, 2, 1, 5, '2019-12-11 22:56:10'),
(1638, 12, 1, 1, 78, 1, 77, 1, 4, 69, 3, 4, 0, '2019-12-11 22:56:10'),
(1639, 12, 1, 1, 78, 1, 77, 1, 4, 69, 4, 2, 4, '2019-12-11 22:56:10'),
(1640, 12, 1, 1, 78, 1, 77, 1, 4, 69, 5, 2, 4, '2019-12-11 22:56:10'),
(1641, 12, 1, 1, 78, 1, 77, 1, 4, 69, 6, 1, 5, '2019-12-11 22:56:10'),
(1642, 12, 1, 1, 78, 1, 77, 1, 4, 69, 7, 2, 4, '2019-12-11 22:56:10'),
(1643, 12, 1, 1, 78, 1, 77, 1, 4, 69, 8, 2, 4, '2019-12-11 22:56:10'),
(1644, 12, 1, 1, 78, 1, 77, 1, 4, 69, 9, 2, 4, '2019-12-11 22:56:10'),
(1645, 12, 1, 1, 78, 1, 77, 1, 4, 69, 10, 1, 5, '2019-12-11 22:56:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puestos`
--

CREATE TABLE `puestos` (
  `id` int(11) NOT NULL,
  `puesto` varchar(100) DEFAULT NULL,
  `creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_nivel_puesto` int(11) NOT NULL,
  `estado` set('Activo','Inactivo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `puestos`
--

INSERT INTO `puestos` (`id`, `puesto`, `creacion`, `id_nivel_puesto`, `estado`) VALUES
(1, 'Director de Tecnologías de Información', '2019-11-15 01:47:49', 1, 'Inactivo'),
(2, 'Director de Recursos Humanos', '2019-11-15 02:17:16', 1, 'Inactivo'),
(3, 'Director de Marketing', '2019-11-15 03:44:42', 1, 'Activo'),
(4, 'Gerente de ventas', '2019-11-15 03:44:59', 3, 'Inactivo'),
(5, 'Jefe de Operaciones', '2019-11-30 20:31:57', 2, 'Activo'),
(6, 'Director de logística', '2019-12-03 00:05:44', 1, 'Activo'),
(7, 'Director de tesorería', '2019-12-03 00:28:01', 1, 'Activo'),
(8, 'Director', '2019-12-03 00:55:58', 1, 'Activo'),
(9, 'Inventario', '2019-12-08 20:42:39', 3, 'Activo'),
(10, 'Director de Sistemas', '2019-12-09 12:21:05', 1, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `id` int(11) NOT NULL,
  `respuesta` varchar(250) NOT NULL,
  `creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `creacion_ip` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`id`, `respuesta`, `creacion`, `creacion_ip`) VALUES
(1, 'Siempre', '2019-11-13 20:00:00', NULL),
(2, 'Algunas veces', '2019-11-23 04:21:21', NULL),
(3, 'Rara vez', '2019-11-23 05:42:11', '::1'),
(4, 'Nunca', '2019-12-02 17:33:06', '::1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

CREATE TABLE `resultados` (
  `id` int(11) NOT NULL,
  `id_aplicacion` int(11) NOT NULL,
  `id_pregunta` int(11) NOT NULL,
  `id_respuesta` int(11) NOT NULL,
  `orden` mediumint(9) DEFAULT NULL,
  `creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `puntos` decimal(6,2) DEFAULT NULL,
  `texto_libre` varchar(150) DEFAULT NULL,
  `ip` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `resultados`
--

INSERT INTO `resultados` (`id`, `id_aplicacion`, `id_pregunta`, `id_respuesta`, `orden`, `creacion`, `puntos`, `texto_libre`, `ip`) VALUES
(96, 58, 1, 2, 1, '2019-12-09 19:19:59', '4.00', NULL, '201.123.226.252'),
(97, 58, 2, 1, 2, '2019-12-09 19:19:59', '5.00', NULL, '201.123.226.252'),
(98, 58, 3, 3, 3, '2019-12-09 19:19:59', '2.00', NULL, '201.123.226.252'),
(99, 58, 4, 2, 4, '2019-12-09 19:19:59', '4.00', NULL, '201.123.226.252'),
(100, 58, 5, 3, 5, '2019-12-09 19:19:59', '2.00', NULL, '201.123.226.252'),
(101, 58, 6, 4, 6, '2019-12-09 19:19:59', '0.00', NULL, '201.123.226.252'),
(102, 58, 7, 2, 7, '2019-12-09 19:19:59', '4.00', NULL, '201.123.226.252'),
(103, 58, 8, 4, 8, '2019-12-09 19:19:59', '0.00', NULL, '201.123.226.252'),
(104, 58, 9, 2, 9, '2019-12-09 19:19:59', '4.00', NULL, '201.123.226.252'),
(105, 58, 10, 4, 10, '2019-12-09 19:19:59', '0.00', NULL, '201.123.226.252'),
(106, 57, 1, 2, 1, '2019-12-09 19:20:00', '4.00', NULL, '201.123.226.252'),
(107, 57, 2, 2, 2, '2019-12-09 19:20:00', '4.00', NULL, '201.123.226.252'),
(108, 57, 3, 3, 3, '2019-12-09 19:20:00', '2.00', NULL, '201.123.226.252'),
(109, 57, 4, 2, 4, '2019-12-09 19:20:00', '4.00', NULL, '201.123.226.252'),
(110, 57, 5, 2, 5, '2019-12-09 19:20:00', '4.00', NULL, '201.123.226.252'),
(111, 57, 6, 1, 6, '2019-12-09 19:20:00', '5.00', NULL, '201.123.226.252'),
(112, 57, 7, 3, 7, '2019-12-09 19:20:00', '2.00', NULL, '201.123.226.252'),
(113, 57, 8, 1, 8, '2019-12-09 19:20:00', '5.00', NULL, '201.123.226.252'),
(114, 57, 9, 1, 9, '2019-12-09 19:20:00', '5.00', NULL, '201.123.226.252'),
(115, 57, 10, 2, 10, '2019-12-09 19:20:00', '4.00', NULL, '201.123.226.252'),
(116, 56, 1, 1, 1, '2019-12-09 19:20:15', '5.00', NULL, '201.123.226.252'),
(117, 56, 2, 2, 2, '2019-12-09 19:20:15', '4.00', NULL, '201.123.226.252'),
(118, 56, 3, 2, 3, '2019-12-09 19:20:15', '4.00', NULL, '201.123.226.252'),
(119, 56, 4, 1, 4, '2019-12-09 19:20:15', '5.00', NULL, '201.123.226.252'),
(120, 56, 5, 1, 5, '2019-12-09 19:20:15', '5.00', NULL, '201.123.226.252'),
(121, 56, 6, 2, 6, '2019-12-09 19:20:15', '4.00', NULL, '201.123.226.252'),
(122, 56, 7, 1, 7, '2019-12-09 19:20:15', '5.00', NULL, '201.123.226.252'),
(123, 56, 8, 1, 8, '2019-12-09 19:20:15', '5.00', NULL, '201.123.226.252'),
(124, 56, 9, 1, 9, '2019-12-09 19:20:15', '5.00', NULL, '201.123.226.252'),
(125, 56, 10, 1, 10, '2019-12-09 19:20:15', '5.00', NULL, '201.123.226.252'),
(126, 59, 1, 4, 1, '2019-12-09 19:20:42', '0.00', NULL, '201.123.226.252'),
(127, 59, 2, 4, 2, '2019-12-09 19:20:42', '0.00', NULL, '201.123.226.252'),
(128, 59, 3, 4, 3, '2019-12-09 19:20:42', '0.00', NULL, '201.123.226.252'),
(129, 59, 4, 4, 4, '2019-12-09 19:20:42', '0.00', NULL, '201.123.226.252'),
(130, 59, 5, 4, 5, '2019-12-09 19:20:42', '0.00', NULL, '201.123.226.252'),
(131, 59, 6, 4, 6, '2019-12-09 19:20:42', '0.00', NULL, '201.123.226.252'),
(132, 59, 7, 4, 7, '2019-12-09 19:20:42', '0.00', NULL, '201.123.226.252'),
(133, 59, 8, 4, 8, '2019-12-09 19:20:42', '0.00', NULL, '201.123.226.252'),
(134, 59, 9, 4, 9, '2019-12-09 19:20:42', '0.00', NULL, '201.123.226.252'),
(135, 59, 10, 4, 10, '2019-12-09 19:20:42', '0.00', NULL, '201.123.226.252'),
(136, 60, 1, 2, 1, '2019-12-09 19:20:55', '4.00', NULL, '201.123.226.252'),
(137, 60, 2, 2, 2, '2019-12-09 19:20:55', '4.00', NULL, '201.123.226.252'),
(138, 60, 3, 2, 3, '2019-12-09 19:20:55', '4.00', NULL, '201.123.226.252'),
(139, 60, 4, 2, 4, '2019-12-09 19:20:55', '4.00', NULL, '201.123.226.252'),
(140, 60, 5, 2, 5, '2019-12-09 19:20:55', '4.00', NULL, '201.123.226.252'),
(141, 60, 6, 2, 6, '2019-12-09 19:20:55', '4.00', NULL, '201.123.226.252'),
(142, 60, 7, 2, 7, '2019-12-09 19:20:55', '4.00', NULL, '201.123.226.252'),
(143, 60, 8, 2, 8, '2019-12-09 19:20:55', '4.00', NULL, '201.123.226.252'),
(144, 60, 9, 2, 9, '2019-12-09 19:20:55', '4.00', NULL, '201.123.226.252'),
(145, 60, 10, 2, 10, '2019-12-09 19:20:55', '4.00', NULL, '201.123.226.252'),
(146, 62, 1, 4, 1, '2019-12-09 19:30:59', '0.00', NULL, '201.123.186.123'),
(147, 62, 2, 4, 2, '2019-12-09 19:30:59', '0.00', NULL, '201.123.186.123'),
(148, 62, 3, 4, 3, '2019-12-09 19:30:59', '0.00', NULL, '201.123.186.123'),
(149, 62, 4, 4, 4, '2019-12-09 19:30:59', '0.00', NULL, '201.123.186.123'),
(150, 62, 5, 4, 5, '2019-12-09 19:30:59', '0.00', NULL, '201.123.186.123'),
(151, 62, 6, 4, 6, '2019-12-09 19:30:59', '0.00', NULL, '201.123.186.123'),
(152, 62, 7, 4, 7, '2019-12-09 19:30:59', '0.00', NULL, '201.123.186.123'),
(153, 62, 8, 4, 8, '2019-12-09 19:30:59', '0.00', NULL, '201.123.186.123'),
(154, 62, 9, 4, 9, '2019-12-09 19:30:59', '0.00', NULL, '201.123.186.123'),
(155, 62, 10, 4, 10, '2019-12-09 19:30:59', '0.00', NULL, '201.123.186.123'),
(156, 63, 1, 4, 1, '2019-12-09 19:31:20', '0.00', NULL, '201.123.226.252'),
(157, 63, 2, 4, 2, '2019-12-09 19:31:20', '0.00', NULL, '201.123.226.252'),
(158, 63, 3, 4, 3, '2019-12-09 19:31:20', '0.00', NULL, '201.123.226.252'),
(159, 63, 4, 4, 4, '2019-12-09 19:31:20', '0.00', NULL, '201.123.226.252'),
(160, 63, 5, 4, 5, '2019-12-09 19:31:20', '0.00', NULL, '201.123.226.252'),
(161, 63, 6, 4, 6, '2019-12-09 19:31:20', '0.00', NULL, '201.123.226.252'),
(162, 63, 7, 4, 7, '2019-12-09 19:31:20', '0.00', NULL, '201.123.226.252'),
(163, 63, 8, 4, 8, '2019-12-09 19:31:20', '0.00', NULL, '201.123.226.252'),
(164, 63, 9, 4, 9, '2019-12-09 19:31:20', '0.00', NULL, '201.123.226.252'),
(165, 63, 10, 2, 10, '2019-12-09 19:31:20', '4.00', NULL, '201.123.226.252'),
(166, 65, 1, 1, 1, '2019-12-09 19:33:02', '5.00', NULL, '201.123.226.252'),
(167, 65, 2, 1, 2, '2019-12-09 19:33:02', '5.00', NULL, '201.123.226.252'),
(168, 65, 3, 1, 3, '2019-12-09 19:33:02', '5.00', NULL, '201.123.226.252'),
(169, 65, 4, 1, 4, '2019-12-09 19:33:02', '5.00', NULL, '201.123.226.252'),
(170, 65, 5, 1, 5, '2019-12-09 19:33:02', '5.00', NULL, '201.123.226.252'),
(171, 65, 6, 1, 6, '2019-12-09 19:33:02', '5.00', NULL, '201.123.226.252'),
(172, 65, 7, 1, 7, '2019-12-09 19:33:02', '5.00', NULL, '201.123.226.252'),
(173, 65, 8, 1, 8, '2019-12-09 19:33:02', '5.00', NULL, '201.123.226.252'),
(174, 65, 9, 1, 9, '2019-12-09 19:33:02', '5.00', NULL, '201.123.226.252'),
(175, 65, 10, 1, 10, '2019-12-09 19:33:02', '5.00', NULL, '201.123.226.252'),
(176, 64, 1, 2, 1, '2019-12-09 19:33:02', '4.00', NULL, '201.123.226.252'),
(177, 64, 2, 1, 2, '2019-12-09 19:33:02', '5.00', NULL, '201.123.226.252'),
(178, 64, 3, 4, 3, '2019-12-09 19:33:02', '0.00', NULL, '201.123.226.252'),
(179, 64, 4, 2, 4, '2019-12-09 19:33:02', '4.00', NULL, '201.123.226.252'),
(180, 64, 5, 1, 5, '2019-12-09 19:33:02', '5.00', NULL, '201.123.226.252'),
(181, 64, 6, 2, 6, '2019-12-09 19:33:02', '4.00', NULL, '201.123.226.252'),
(182, 64, 7, 4, 7, '2019-12-09 19:33:02', '0.00', NULL, '201.123.226.252'),
(183, 64, 8, 1, 8, '2019-12-09 19:33:02', '5.00', NULL, '201.123.226.252'),
(184, 64, 9, 2, 9, '2019-12-09 19:33:02', '4.00', NULL, '201.123.226.252'),
(185, 64, 10, 2, 10, '2019-12-09 19:33:02', '4.00', NULL, '201.123.226.252'),
(186, 61, 1, 4, 1, '2019-12-09 19:33:32', '0.00', NULL, '201.123.226.252'),
(187, 61, 2, 4, 2, '2019-12-09 19:33:32', '0.00', NULL, '201.123.226.252'),
(188, 61, 3, 4, 3, '2019-12-09 19:33:32', '0.00', NULL, '201.123.226.252'),
(189, 61, 4, 4, 4, '2019-12-09 19:33:32', '0.00', NULL, '201.123.226.252'),
(190, 61, 5, 4, 5, '2019-12-09 19:33:32', '0.00', NULL, '201.123.226.252'),
(191, 61, 6, 4, 6, '2019-12-09 19:33:32', '0.00', NULL, '201.123.226.252'),
(192, 61, 7, 4, 7, '2019-12-09 19:33:32', '0.00', NULL, '201.123.226.252'),
(193, 61, 8, 4, 8, '2019-12-09 19:33:32', '0.00', NULL, '201.123.226.252'),
(194, 61, 9, 4, 9, '2019-12-09 19:33:32', '0.00', NULL, '201.123.226.252'),
(195, 61, 10, 4, 10, '2019-12-09 19:33:32', '0.00', NULL, '201.123.226.252'),
(196, 66, 1, 1, 1, '2019-12-10 11:41:39', '5.00', NULL, '::1'),
(197, 66, 2, 1, 2, '2019-12-10 11:41:39', '5.00', NULL, '::1'),
(198, 66, 3, 1, 3, '2019-12-10 11:41:39', '5.00', NULL, '::1'),
(199, 66, 4, 1, 4, '2019-12-10 11:41:39', '5.00', NULL, '::1'),
(200, 66, 5, 2, 5, '2019-12-10 11:41:40', '4.00', NULL, '::1'),
(201, 66, 6, 2, 6, '2019-12-10 11:41:40', '4.00', NULL, '::1'),
(202, 66, 7, 2, 7, '2019-12-10 11:41:40', '4.00', NULL, '::1'),
(203, 66, 8, 1, 8, '2019-12-10 11:41:40', '5.00', NULL, '::1'),
(204, 66, 9, 1, 9, '2019-12-10 11:41:41', '5.00', NULL, '::1'),
(205, 66, 10, 1, 10, '2019-12-10 11:41:41', '5.00', NULL, '::1'),
(206, 67, 1, 1, 1, '2019-12-10 11:42:09', '5.00', NULL, '::1'),
(207, 67, 2, 4, 2, '2019-12-10 11:42:09', '0.00', NULL, '::1'),
(208, 67, 3, 4, 3, '2019-12-10 11:42:09', '0.00', NULL, '::1'),
(209, 67, 4, 4, 4, '2019-12-10 11:42:10', '0.00', NULL, '::1'),
(210, 67, 5, 4, 5, '2019-12-10 11:42:10', '0.00', NULL, '::1'),
(211, 67, 6, 4, 6, '2019-12-10 11:42:10', '0.00', NULL, '::1'),
(212, 67, 7, 4, 7, '2019-12-10 11:42:10', '0.00', NULL, '::1'),
(213, 67, 8, 1, 8, '2019-12-10 11:42:11', '5.00', NULL, '::1'),
(214, 67, 9, 1, 9, '2019-12-10 11:42:11', '5.00', NULL, '::1'),
(215, 67, 10, 1, 10, '2019-12-10 11:42:11', '5.00', NULL, '::1'),
(216, 68, 1, 1, 1, '2019-12-10 11:42:35', '5.00', NULL, '::1'),
(217, 68, 2, 1, 2, '2019-12-10 11:42:35', '5.00', NULL, '::1'),
(218, 68, 3, 3, 3, '2019-12-10 11:42:35', '2.00', NULL, '::1'),
(219, 68, 4, 3, 4, '2019-12-10 11:42:36', '2.00', NULL, '::1'),
(220, 68, 5, 2, 5, '2019-12-10 11:42:36', '4.00', NULL, '::1'),
(221, 68, 6, 1, 6, '2019-12-10 11:42:36', '5.00', NULL, '::1'),
(222, 68, 7, 1, 7, '2019-12-10 11:42:36', '5.00', NULL, '::1'),
(223, 68, 8, 1, 8, '2019-12-10 11:42:37', '5.00', NULL, '::1'),
(224, 68, 9, 1, 9, '2019-12-10 11:42:37', '5.00', NULL, '::1'),
(225, 68, 10, 1, 10, '2019-12-10 11:42:37', '5.00', NULL, '::1'),
(226, 69, 1, 1, 1, '2019-12-10 11:43:04', '5.00', NULL, '::1'),
(227, 69, 2, 1, 2, '2019-12-10 11:43:04', '5.00', NULL, '::1'),
(228, 69, 3, 4, 3, '2019-12-10 11:43:04', '0.00', NULL, '::1'),
(229, 69, 4, 2, 4, '2019-12-10 11:43:04', '4.00', NULL, '::1'),
(230, 69, 5, 2, 5, '2019-12-10 11:43:05', '4.00', NULL, '::1'),
(231, 69, 6, 1, 6, '2019-12-10 11:43:05', '5.00', NULL, '::1'),
(232, 69, 7, 2, 7, '2019-12-10 11:43:05', '4.00', NULL, '::1'),
(233, 69, 8, 2, 8, '2019-12-10 11:43:05', '4.00', NULL, '::1'),
(234, 69, 9, 2, 9, '2019-12-10 11:43:06', '4.00', NULL, '::1'),
(235, 69, 10, 1, 10, '2019-12-10 11:43:06', '5.00', NULL, '::1'),
(245, 105, 1, 4, 1, '2019-12-10 19:00:22', '0.00', NULL, '201.123.226.252'),
(246, 105, 2, 4, 2, '2019-12-10 19:00:22', '0.00', NULL, '201.123.226.252'),
(247, 105, 3, 4, 3, '2019-12-10 19:00:22', '0.00', NULL, '201.123.226.252'),
(248, 105, 4, 4, 4, '2019-12-10 19:00:22', '0.00', NULL, '201.123.226.252'),
(249, 105, 5, 4, 5, '2019-12-10 19:00:22', '0.00', NULL, '201.123.226.252'),
(250, 105, 6, 4, 6, '2019-12-10 19:00:22', '0.00', NULL, '201.123.226.252'),
(251, 105, 7, 4, 7, '2019-12-10 19:00:22', '0.00', NULL, '201.123.226.252'),
(252, 105, 8, 4, 8, '2019-12-10 19:00:22', '0.00', NULL, '201.123.226.252'),
(253, 105, 9, 4, 9, '2019-12-10 19:00:22', '0.00', NULL, '201.123.226.252'),
(254, 105, 10, 4, 10, '2019-12-10 19:00:22', '0.00', NULL, '201.123.226.252'),
(255, 94, 1, 3, 1, '2019-12-10 19:00:44', '2.00', NULL, '201.123.226.252'),
(256, 94, 2, 3, 2, '2019-12-10 19:00:44', '2.00', NULL, '201.123.226.252'),
(257, 94, 3, 3, 3, '2019-12-10 19:00:44', '2.00', NULL, '201.123.226.252'),
(258, 94, 4, 3, 4, '2019-12-10 19:00:44', '2.00', NULL, '201.123.226.252'),
(259, 94, 5, 3, 5, '2019-12-10 19:00:44', '2.00', NULL, '201.123.226.252'),
(260, 94, 6, 3, 6, '2019-12-10 19:00:44', '2.00', NULL, '201.123.226.252'),
(261, 94, 7, 3, 7, '2019-12-10 19:00:44', '2.00', NULL, '201.123.226.252'),
(262, 94, 8, 3, 8, '2019-12-10 19:00:44', '2.00', NULL, '201.123.226.252'),
(263, 94, 9, 3, 9, '2019-12-10 19:00:44', '2.00', NULL, '201.123.226.252'),
(264, 94, 10, 3, 10, '2019-12-10 19:00:44', '2.00', NULL, '201.123.226.252'),
(265, 100, 1, 2, 1, '2019-12-10 19:01:09', '4.00', NULL, '201.123.226.252'),
(266, 100, 2, 2, 2, '2019-12-10 19:01:09', '4.00', NULL, '201.123.226.252'),
(267, 100, 3, 2, 3, '2019-12-10 19:01:09', '4.00', NULL, '201.123.226.252'),
(268, 100, 4, 2, 4, '2019-12-10 19:01:09', '4.00', NULL, '201.123.226.252'),
(269, 100, 5, 2, 5, '2019-12-10 19:01:09', '4.00', NULL, '201.123.226.252'),
(270, 100, 6, 2, 6, '2019-12-10 19:01:09', '4.00', NULL, '201.123.226.252'),
(271, 100, 7, 2, 7, '2019-12-10 19:01:09', '4.00', NULL, '201.123.226.252'),
(272, 100, 8, 2, 8, '2019-12-10 19:01:09', '4.00', NULL, '201.123.226.252'),
(273, 100, 9, 2, 9, '2019-12-10 19:01:09', '4.00', NULL, '201.123.226.252'),
(274, 100, 10, 2, 10, '2019-12-10 19:01:09', '4.00', NULL, '201.123.226.252'),
(275, 95, 1, 4, 1, '2019-12-10 19:03:24', '0.00', NULL, '201.123.170.113'),
(276, 95, 2, 4, 2, '2019-12-10 19:03:24', '0.00', NULL, '201.123.170.113'),
(277, 95, 3, 4, 3, '2019-12-10 19:03:24', '0.00', NULL, '201.123.170.113'),
(278, 95, 4, 4, 4, '2019-12-10 19:03:24', '0.00', NULL, '201.123.170.113'),
(279, 95, 5, 4, 5, '2019-12-10 19:03:24', '0.00', NULL, '201.123.170.113'),
(280, 95, 6, 4, 6, '2019-12-10 19:03:24', '0.00', NULL, '201.123.170.113'),
(281, 95, 7, 4, 7, '2019-12-10 19:03:24', '0.00', NULL, '201.123.170.113'),
(282, 95, 8, 4, 8, '2019-12-10 19:03:24', '0.00', NULL, '201.123.170.113'),
(283, 95, 9, 4, 9, '2019-12-10 19:03:24', '0.00', NULL, '201.123.170.113'),
(284, 95, 10, 4, 10, '2019-12-10 19:03:24', '0.00', NULL, '201.123.170.113'),
(285, 103, 1, 4, 1, '2019-12-10 19:04:01', '0.00', NULL, '201.123.170.113'),
(286, 103, 2, 4, 2, '2019-12-10 19:04:01', '0.00', NULL, '201.123.170.113'),
(287, 103, 3, 4, 3, '2019-12-10 19:04:01', '0.00', NULL, '201.123.170.113'),
(288, 103, 4, 4, 4, '2019-12-10 19:04:01', '0.00', NULL, '201.123.170.113'),
(289, 103, 5, 4, 5, '2019-12-10 19:04:01', '0.00', NULL, '201.123.170.113'),
(290, 103, 6, 4, 6, '2019-12-10 19:04:01', '0.00', NULL, '201.123.170.113'),
(291, 103, 7, 4, 7, '2019-12-10 19:04:01', '0.00', NULL, '201.123.170.113'),
(292, 103, 8, 4, 8, '2019-12-10 19:04:01', '0.00', NULL, '201.123.170.113'),
(293, 103, 9, 4, 9, '2019-12-10 19:04:01', '0.00', NULL, '201.123.170.113'),
(294, 103, 10, 4, 10, '2019-12-10 19:04:01', '0.00', NULL, '201.123.170.113'),
(295, 96, 1, 2, 1, '2019-12-10 19:04:04', '4.00', NULL, '201.123.226.252'),
(296, 96, 2, 3, 2, '2019-12-10 19:04:04', '2.00', NULL, '201.123.226.252'),
(297, 96, 3, 3, 3, '2019-12-10 19:04:04', '2.00', NULL, '201.123.226.252'),
(298, 96, 4, 2, 4, '2019-12-10 19:04:04', '4.00', NULL, '201.123.226.252'),
(299, 96, 5, 2, 5, '2019-12-10 19:04:04', '4.00', NULL, '201.123.226.252'),
(300, 96, 6, 3, 6, '2019-12-10 19:04:04', '2.00', NULL, '201.123.226.252'),
(301, 96, 7, 1, 7, '2019-12-10 19:04:04', '5.00', NULL, '201.123.226.252'),
(302, 96, 8, 4, 8, '2019-12-10 19:04:04', '0.00', NULL, '201.123.226.252'),
(303, 96, 9, 2, 9, '2019-12-10 19:04:04', '4.00', NULL, '201.123.226.252'),
(304, 96, 10, 1, 10, '2019-12-10 19:04:04', '5.00', NULL, '201.123.226.252'),
(305, 107, 1, 4, 1, '2019-12-10 19:04:34', '0.00', NULL, '201.123.170.113'),
(306, 107, 2, 4, 2, '2019-12-10 19:04:34', '0.00', NULL, '201.123.170.113'),
(307, 107, 3, 4, 3, '2019-12-10 19:04:34', '0.00', NULL, '201.123.170.113'),
(308, 107, 4, 4, 4, '2019-12-10 19:04:34', '0.00', NULL, '201.123.170.113'),
(309, 107, 5, 4, 5, '2019-12-10 19:04:34', '0.00', NULL, '201.123.170.113'),
(310, 107, 6, 4, 6, '2019-12-10 19:04:34', '0.00', NULL, '201.123.170.113'),
(311, 107, 7, 4, 7, '2019-12-10 19:04:34', '0.00', NULL, '201.123.170.113'),
(312, 107, 8, 4, 8, '2019-12-10 19:04:34', '0.00', NULL, '201.123.170.113'),
(313, 107, 9, 4, 9, '2019-12-10 19:04:34', '0.00', NULL, '201.123.170.113'),
(314, 107, 10, 4, 10, '2019-12-10 19:04:34', '0.00', NULL, '201.123.170.113'),
(315, 108, 1, 1, 1, '2019-12-10 19:05:20', '5.00', NULL, '201.123.226.252'),
(316, 108, 2, 1, 2, '2019-12-10 19:05:20', '5.00', NULL, '201.123.226.252'),
(317, 108, 3, 1, 3, '2019-12-10 19:05:20', '5.00', NULL, '201.123.226.252'),
(318, 108, 4, 1, 4, '2019-12-10 19:05:20', '5.00', NULL, '201.123.226.252'),
(319, 108, 5, 1, 5, '2019-12-10 19:05:20', '5.00', NULL, '201.123.226.252'),
(320, 108, 6, 1, 6, '2019-12-10 19:05:20', '5.00', NULL, '201.123.226.252'),
(321, 108, 7, 1, 7, '2019-12-10 19:05:20', '5.00', NULL, '201.123.226.252'),
(322, 108, 8, 1, 8, '2019-12-10 19:05:20', '5.00', NULL, '201.123.226.252'),
(323, 108, 9, 1, 9, '2019-12-10 19:05:20', '5.00', NULL, '201.123.226.252'),
(324, 108, 10, 1, 10, '2019-12-10 19:05:20', '5.00', NULL, '201.123.226.252'),
(325, 98, 1, 3, 1, '2019-12-10 19:05:58', '2.00', NULL, '201.123.226.252'),
(326, 98, 2, 4, 2, '2019-12-10 19:05:58', '0.00', NULL, '201.123.226.252'),
(327, 98, 3, 1, 3, '2019-12-10 19:05:58', '5.00', NULL, '201.123.226.252'),
(328, 98, 4, 2, 4, '2019-12-10 19:05:58', '4.00', NULL, '201.123.226.252'),
(329, 98, 5, 2, 5, '2019-12-10 19:05:58', '4.00', NULL, '201.123.226.252'),
(330, 98, 6, 2, 6, '2019-12-10 19:05:58', '4.00', NULL, '201.123.226.252'),
(331, 98, 7, 1, 7, '2019-12-10 19:05:58', '5.00', NULL, '201.123.226.252'),
(332, 98, 8, 2, 8, '2019-12-10 19:05:58', '4.00', NULL, '201.123.226.252'),
(333, 98, 9, 1, 9, '2019-12-10 19:05:58', '5.00', NULL, '201.123.226.252'),
(334, 98, 10, 3, 10, '2019-12-10 19:05:58', '2.00', NULL, '201.123.226.252'),
(335, 106, 1, 4, 1, '2019-12-10 19:06:27', '0.00', NULL, '201.123.226.252'),
(336, 106, 2, 1, 2, '2019-12-10 19:06:27', '5.00', NULL, '201.123.226.252'),
(337, 106, 3, 2, 3, '2019-12-10 19:06:27', '4.00', NULL, '201.123.226.252'),
(338, 106, 4, 3, 4, '2019-12-10 19:06:27', '2.00', NULL, '201.123.226.252'),
(339, 106, 5, 1, 5, '2019-12-10 19:06:27', '5.00', NULL, '201.123.226.252'),
(340, 106, 6, 3, 6, '2019-12-10 19:06:27', '2.00', NULL, '201.123.226.252'),
(341, 106, 7, 1, 7, '2019-12-10 19:06:27', '5.00', NULL, '201.123.226.252'),
(342, 106, 8, 1, 8, '2019-12-10 19:06:27', '5.00', NULL, '201.123.226.252'),
(343, 106, 9, 2, 9, '2019-12-10 19:06:27', '4.00', NULL, '201.123.226.252'),
(344, 106, 10, 1, 10, '2019-12-10 19:06:27', '5.00', NULL, '201.123.226.252'),
(345, 99, 1, 1, 1, '2019-12-10 19:06:45', '5.00', NULL, '201.123.226.252'),
(346, 99, 2, 2, 2, '2019-12-10 19:06:45', '4.00', NULL, '201.123.226.252'),
(347, 99, 3, 2, 3, '2019-12-10 19:06:45', '4.00', NULL, '201.123.226.252'),
(348, 99, 4, 2, 4, '2019-12-10 19:06:45', '4.00', NULL, '201.123.226.252'),
(349, 99, 5, 2, 5, '2019-12-10 19:06:45', '4.00', NULL, '201.123.226.252'),
(350, 99, 6, 2, 6, '2019-12-10 19:06:45', '4.00', NULL, '201.123.226.252'),
(351, 99, 7, 3, 7, '2019-12-10 19:06:45', '2.00', NULL, '201.123.226.252'),
(352, 99, 8, 3, 8, '2019-12-10 19:06:45', '2.00', NULL, '201.123.226.252'),
(353, 99, 9, 3, 9, '2019-12-10 19:06:45', '2.00', NULL, '201.123.226.252'),
(354, 99, 10, 2, 10, '2019-12-10 19:06:45', '4.00', NULL, '201.123.226.252'),
(355, 104, 1, 4, 1, '2019-12-10 19:08:19', '0.00', NULL, '201.123.226.252'),
(356, 104, 2, 4, 2, '2019-12-10 19:08:19', '0.00', NULL, '201.123.226.252'),
(357, 104, 3, 4, 3, '2019-12-10 19:08:19', '0.00', NULL, '201.123.226.252'),
(358, 104, 4, 4, 4, '2019-12-10 19:08:19', '0.00', NULL, '201.123.226.252'),
(359, 104, 5, 4, 5, '2019-12-10 19:08:19', '0.00', NULL, '201.123.226.252'),
(360, 104, 6, 4, 6, '2019-12-10 19:08:19', '0.00', NULL, '201.123.226.252'),
(361, 104, 7, 4, 7, '2019-12-10 19:08:19', '0.00', NULL, '201.123.226.252'),
(362, 104, 8, 4, 8, '2019-12-10 19:08:19', '0.00', NULL, '201.123.226.252'),
(363, 104, 9, 4, 9, '2019-12-10 19:08:19', '0.00', NULL, '201.123.226.252'),
(364, 104, 10, 4, 10, '2019-12-10 19:08:19', '0.00', NULL, '201.123.226.252'),
(365, 74, 1, 2, 1, '2019-12-11 12:53:26', '4.00', NULL, '201.123.226.252'),
(366, 74, 2, 1, 2, '2019-12-11 12:53:26', '5.00', NULL, '201.123.226.252'),
(367, 74, 3, 3, 3, '2019-12-11 12:53:26', '2.00', NULL, '201.123.226.252'),
(368, 74, 4, 2, 4, '2019-12-11 12:53:26', '4.00', NULL, '201.123.226.252'),
(369, 74, 5, 3, 5, '2019-12-11 12:53:26', '2.00', NULL, '201.123.226.252'),
(370, 74, 6, 2, 6, '2019-12-11 12:53:26', '4.00', NULL, '201.123.226.252'),
(371, 74, 7, 1, 7, '2019-12-11 12:53:26', '5.00', NULL, '201.123.226.252'),
(372, 74, 8, 2, 8, '2019-12-11 12:53:26', '4.00', NULL, '201.123.226.252'),
(373, 74, 9, 2, 9, '2019-12-11 12:53:26', '4.00', NULL, '201.123.226.252'),
(374, 73, 1, 1, 1, '2019-12-11 13:06:25', '5.00', NULL, '201.123.226.252'),
(375, 73, 2, 2, 2, '2019-12-11 13:06:25', '4.00', NULL, '201.123.226.252'),
(376, 73, 3, 1, 3, '2019-12-11 13:06:25', '5.00', NULL, '201.123.226.252'),
(377, 73, 4, 2, 4, '2019-12-11 13:06:25', '4.00', NULL, '201.123.226.252'),
(378, 73, 5, 1, 5, '2019-12-11 13:06:25', '5.00', NULL, '201.123.226.252'),
(379, 73, 6, 2, 6, '2019-12-11 13:06:25', '4.00', NULL, '201.123.226.252'),
(380, 73, 7, 2, 7, '2019-12-11 13:06:25', '4.00', NULL, '201.123.226.252'),
(381, 73, 8, 1, 8, '2019-12-11 13:06:25', '5.00', NULL, '201.123.226.252'),
(382, 73, 9, 2, 9, '2019-12-11 13:06:25', '4.00', NULL, '201.123.226.252'),
(383, 102, 1, 2, 1, '2019-12-11 13:42:49', '4.00', NULL, '201.123.226.252'),
(384, 102, 2, 2, 2, '2019-12-11 13:42:49', '4.00', NULL, '201.123.226.252'),
(385, 102, 3, 2, 3, '2019-12-11 13:42:49', '4.00', NULL, '201.123.226.252'),
(386, 102, 4, 1, 4, '2019-12-11 13:42:49', '5.00', NULL, '201.123.226.252'),
(387, 102, 5, 2, 5, '2019-12-11 13:42:49', '4.00', NULL, '201.123.226.252'),
(388, 102, 6, 1, 6, '2019-12-11 13:42:49', '5.00', NULL, '201.123.226.252'),
(389, 102, 7, 1, 7, '2019-12-11 13:42:49', '5.00', NULL, '201.123.226.252'),
(390, 102, 8, 3, 8, '2019-12-11 13:42:49', '2.00', NULL, '201.123.226.252'),
(391, 102, 9, 3, 9, '2019-12-11 13:42:49', '2.00', NULL, '201.123.226.252'),
(392, 102, 10, 1, 10, '2019-12-11 13:42:49', '5.00', NULL, '201.123.226.252'),
(393, 73, 10, 1, 10, '2019-12-11 13:44:11', '5.00', NULL, NULL),
(394, 74, 10, 1, 10, '2019-12-11 13:44:35', '5.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(50) DEFAULT NULL,
  `creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `actualizacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`, `creacion`, `actualizacion`) VALUES
(1, 'Jefe', '2019-12-04 19:59:02', NULL),
(2, 'Par 1', '2019-12-04 19:59:02', NULL),
(3, 'Par 2', '2019-12-04 19:59:27', NULL),
(4, 'Cliente', '2019-12-04 19:59:27', NULL),
(5, 'Autoevaluación', '2019-12-04 19:59:40', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `passwd` varchar(72) NOT NULL,
  `cookie` varchar(72) DEFAULT NULL,
  `estado` set('A','B') NOT NULL DEFAULT 'A',
  `creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `actualizacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `passwd`, `cookie`, `estado`, `creacion`, `actualizacion`) VALUES
(1, '$2y$12$MmI4ZWUxOWQ4MjlmN2E5Nurovdm9kZVQxQIaaDvv6imGTqDdSLFHC', 'ak48g24r17nno1th6p6ptlsju1', 'A', '2019-11-11 22:47:52', '2019-12-11 17:43:32'),
(80, '$2y$12$MmI4ZWUxOWQ4MjlmN2E5Nurovdm9kZVQxQIaaDvv6imGTqDdSLFHC', '51j63thavgiqrh0ido0unles34', 'A', '2019-12-11 17:42:23', '2019-12-11 17:42:23'),
(82, '$2y$12$MmI4ZWUxOWQ4MjlmN2E5Nurovdm9kZVQxQIaaDvv6imGTqDdSLFHC', 'k360pskdnojk0ooamotus20h34', 'A', '2019-12-11 17:42:04', '2019-12-11 17:42:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_organizaciones`
--

CREATE TABLE `usuarios_organizaciones` (
  `id_usuario` int(11) NOT NULL,
  `id_organizacion` int(11) NOT NULL,
  `creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aplicaciones`
--
ALTER TABLE `aplicaciones`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `id_evaluacion` (`id_evaluacion`,`id_evaluado`,`id_evaluador`),
  ADD KEY `fk_evaluacion_aplicaciones_empleados1_idx` (`id_evaluado`),
  ADD KEY `fk_evaluacion_aplicaciones_empleados2_idx` (`id_evaluador`),
  ADD KEY `fk_evaluacion_aplicaciones_evaluaciones1_idx` (`id_evaluacion`);

--
-- Indices de la tabla `competencias`
--
ALTER TABLE `competencias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cuestionarios`
--
ALTER TABLE `cuestionarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `decalogos`
--
ALTER TABLE `decalogos`
  ADD PRIMARY KEY (`id`,`id_escala`),
  ADD KEY `fk_decalogos_escalas1_idx` (`id_escala`);

--
-- Indices de la tabla `decalogos_aseveraciones`
--
ALTER TABLE `decalogos_aseveraciones`
  ADD PRIMARY KEY (`id`,`id_decalogo`),
  ADD KEY `fk_decalogos_aseveraciones_decalogos1_idx` (`id_decalogo`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id`,`organizaciones_id`),
  ADD KEY `fk_departamentos_organizaciones1_idx` (`organizaciones_id`);

--
-- Indices de la tabla `email_conf`
--
ALTER TABLE `email_conf`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`,`id_puesto`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_empleados_departamentos1_idx` (`id_departamento`),
  ADD KEY `fk_empleados_puestos1_idx` (`id_puesto`);

--
-- Indices de la tabla `empleados_temp`
--
ALTER TABLE `empleados_temp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_empleados_departamentos1_idx` (`id_departamento`);

--
-- Indices de la tabla `escalas`
--
ALTER TABLE `escalas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  ADD PRIMARY KEY (`id`,`id_cuestionario`,`id_departamento`,`id_periodo`),
  ADD KEY `fk_evaluaciones_cuestionarios1_idx` (`id_cuestionario`),
  ADD KEY `fk_evaluaciones_periodos1_idx` (`id_periodo`),
  ADD KEY `id_departamento` (`id_departamento`);

--
-- Indices de la tabla `niveles_puesto`
--
ALTER TABLE `niveles_puesto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id_notificaciones`);

--
-- Indices de la tabla `organizaciones`
--
ALTER TABLE `organizaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`token`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `periodos`
--
ALTER TABLE `periodos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_preguntas_decalogos_aseveraciones1_idx` (`id_decalogo_aseveracion`),
  ADD KEY `fk_preguntas_cuestionarios1_idx` (`id_cuestionario`),
  ADD KEY `fk_preguntas_competencias1_idx` (`id_competencia`);

--
-- Indices de la tabla `preguntas_respuestas`
--
ALTER TABLE `preguntas_respuestas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_preguntas_has_respuestas_respuestas1_idx` (`id_respuesta`),
  ADD KEY `fk_preguntas_has_respuestas_preguntas_idx` (`id_pregunta`);

--
-- Indices de la tabla `promedios_por_evaluado`
--
ALTER TABLE `promedios_por_evaluado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_periodo` (`id_periodo`,`id_evaluado`),
  ADD KEY `id_evaluacion` (`id_evaluacion`),
  ADD KEY `id_cuestionario` (`id_cuestionario`),
  ADD KEY `id_evaluado_nivel` (`id_evaluado_nivel`),
  ADD KEY `id_evaluador_nivel` (`id_evaluador_nivel`),
  ADD KEY `id_pregunta` (`id_pregunta`),
  ADD KEY `id_rol_evaluador` (`id_rol_evaluador`),
  ADD KEY `promedios_por_evaluado_ibfk_4` (`id_evaluado`),
  ADD KEY `promedios_por_evaluado_ibfk_6` (`id_evaluador`),
  ADD KEY `promedios_por_evaluado_ibfk_8` (`id_aplicacion`);

--
-- Indices de la tabla `puestos`
--
ALTER TABLE `puestos`
  ADD PRIMARY KEY (`id`,`id_nivel_puesto`),
  ADD KEY `fk_puestos_niveles_puesto1_idx` (`id_nivel_puesto`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD PRIMARY KEY (`id`,`id_aplicacion`,`id_pregunta`),
  ADD KEY `fk_resultados_evaluacion_aplicaciones1_idx` (`id_aplicacion`),
  ADD KEY `fk_resultados_preguntas_respuestas1_idx` (`id_pregunta`),
  ADD KEY `id_aplicacion` (`id_aplicacion`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios_organizaciones`
--
ALTER TABLE `usuarios_organizaciones`
  ADD PRIMARY KEY (`id_usuario`,`id_organizacion`),
  ADD KEY `fk_usuarios_has_organizaciones_organizaciones1_idx` (`id_organizacion`),
  ADD KEY `fk_usuarios_has_organizaciones_usuarios1_idx` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aplicaciones`
--
ALTER TABLE `aplicaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;
--
-- AUTO_INCREMENT de la tabla `competencias`
--
ALTER TABLE `competencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `cuestionarios`
--
ALTER TABLE `cuestionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `decalogos`
--
ALTER TABLE `decalogos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `decalogos_aseveraciones`
--
ALTER TABLE `decalogos_aseveraciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `email_conf`
--
ALTER TABLE `email_conf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;
--
-- AUTO_INCREMENT de la tabla `empleados_temp`
--
ALTER TABLE `empleados_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `escalas`
--
ALTER TABLE `escalas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `niveles_puesto`
--
ALTER TABLE `niveles_puesto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id_notificaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT de la tabla `organizaciones`
--
ALTER TABLE `organizaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `periodos`
--
ALTER TABLE `periodos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `preguntas_respuestas`
--
ALTER TABLE `preguntas_respuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;
--
-- AUTO_INCREMENT de la tabla `promedios_por_evaluado`
--
ALTER TABLE `promedios_por_evaluado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1646;
--
-- AUTO_INCREMENT de la tabla `puestos`
--
ALTER TABLE `puestos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `resultados`
--
ALTER TABLE `resultados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=395;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aplicaciones`
--
ALTER TABLE `aplicaciones`
  ADD CONSTRAINT `fk_evaluacion_aplicaciones_empleados1` FOREIGN KEY (`id_evaluado`) REFERENCES `empleados` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evaluacion_aplicaciones_empleados2` FOREIGN KEY (`id_evaluador`) REFERENCES `empleados` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evaluacion_aplicaciones_evaluaciones1` FOREIGN KEY (`id_evaluacion`) REFERENCES `evaluaciones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `decalogos`
--
ALTER TABLE `decalogos`
  ADD CONSTRAINT `fk_decalogos_escalas1` FOREIGN KEY (`id_escala`) REFERENCES `escalas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `decalogos_aseveraciones`
--
ALTER TABLE `decalogos_aseveraciones`
  ADD CONSTRAINT `fk_decalogos_aseveraciones_decalogos1` FOREIGN KEY (`id_decalogo`) REFERENCES `decalogos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD CONSTRAINT `fk_departamentos_organizaciones1` FOREIGN KEY (`organizaciones_id`) REFERENCES `organizaciones` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `fk_empleados_departamentos1` FOREIGN KEY (`id_departamento`) REFERENCES `departamentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_empleados_puestos1` FOREIGN KEY (`id_puesto`) REFERENCES `puestos` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  ADD CONSTRAINT `evaluaciones_ibfk_1` FOREIGN KEY (`id_departamento`) REFERENCES `departamentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evaluaciones_cuestionarios1` FOREIGN KEY (`id_cuestionario`) REFERENCES `cuestionarios` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_evaluaciones_periodos1` FOREIGN KEY (`id_periodo`) REFERENCES `periodos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD CONSTRAINT `password_resets_ibfk_1` FOREIGN KEY (`id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `fk_preguntas_competencias1` FOREIGN KEY (`id_competencia`) REFERENCES `competencias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_preguntas_cuestionarios1` FOREIGN KEY (`id_cuestionario`) REFERENCES `cuestionarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_preguntas_decalogos_aseveraciones1` FOREIGN KEY (`id_decalogo_aseveracion`) REFERENCES `decalogos_aseveraciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `preguntas_respuestas`
--
ALTER TABLE `preguntas_respuestas`
  ADD CONSTRAINT `fk_preguntas_has_respuestas_preguntas` FOREIGN KEY (`id_pregunta`) REFERENCES `preguntas` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_preguntas_has_respuestas_respuestas1` FOREIGN KEY (`id_respuesta`) REFERENCES `respuestas` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `promedios_por_evaluado`
--
ALTER TABLE `promedios_por_evaluado`
  ADD CONSTRAINT `promedios_por_evaluado_ibfk_1` FOREIGN KEY (`id_evaluacion`) REFERENCES `evaluaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `promedios_por_evaluado_ibfk_2` FOREIGN KEY (`id_cuestionario`) REFERENCES `cuestionarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `promedios_por_evaluado_ibfk_3` FOREIGN KEY (`id_periodo`) REFERENCES `periodos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `promedios_por_evaluado_ibfk_4` FOREIGN KEY (`id_evaluado`) REFERENCES `empleados` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `promedios_por_evaluado_ibfk_5` FOREIGN KEY (`id_evaluado_nivel`) REFERENCES `niveles_puesto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `promedios_por_evaluado_ibfk_6` FOREIGN KEY (`id_evaluador`) REFERENCES `empleados` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `promedios_por_evaluado_ibfk_7` FOREIGN KEY (`id_evaluador_nivel`) REFERENCES `niveles_puesto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `promedios_por_evaluado_ibfk_8` FOREIGN KEY (`id_aplicacion`) REFERENCES `aplicaciones` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `promedios_por_evaluado_ibfk_9` FOREIGN KEY (`id_pregunta`) REFERENCES `preguntas` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `puestos`
--
ALTER TABLE `puestos`
  ADD CONSTRAINT `fk_puestos_niveles_puesto1` FOREIGN KEY (`id_nivel_puesto`) REFERENCES `niveles_puesto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD CONSTRAINT `fk_resultados_preguntas_respuestas1` FOREIGN KEY (`id_pregunta`) REFERENCES `preguntas` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `resultados_ibfk_1` FOREIGN KEY (`id_aplicacion`) REFERENCES `aplicaciones` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_empleados1` FOREIGN KEY (`id`) REFERENCES `empleados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios_organizaciones`
--
ALTER TABLE `usuarios_organizaciones`
  ADD CONSTRAINT `fk_usuarios_has_organizaciones_organizaciones1` FOREIGN KEY (`id_organizacion`) REFERENCES `organizaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_has_organizaciones_usuarios1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
