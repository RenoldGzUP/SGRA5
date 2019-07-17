-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-07-2019 a las 05:32:41
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sgra`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `id_area` int(11) NOT NULL,
  `codigo_categoria` int(11) NOT NULL,
  `codigo_area` varchar(11) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre_area` varchar(200) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`id_area`, `codigo_categoria`, `codigo_area`, `nombre_area`) VALUES
(1, 2, '1', 'Administracion de empresas'),
(2, 2, '2', 'Administracion Publica y Economia'),
(3, 2, '3', 'Arquitectura'),
(4, 2, '4', 'Cientifica'),
(5, 2, '5', 'Humanistica'),
(6, 2, '6', 'Policia'),
(7, 2, '7', 'Derecho'),
(8, 2, '8', 'Informatica'),
(9, 2, '9', 'Asistente Odontologico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `id_area` int(11) NOT NULL,
  `codigo_categoria` int(11) NOT NULL,
  `codigo_area` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_area` text CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `codigo_relacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`id_area`, `codigo_categoria`, `codigo_area`, `nombre_area`, `codigo_relacion`) VALUES
(1, 2, '1', 'Administracion de empresas', 1),
(2, 2, '2', 'Administracion Publica y Economia', 1),
(3, 2, '3', 'Arquitectura', 1),
(4, 2, '4', 'Cientifica', 1),
(5, 2, '5', 'Humanistica', 1),
(6, 2, '6', 'Policia', 1),
(7, 2, '7', 'Derecho', 1),
(8, 2, '8', 'Informatica', 1),
(9, 2, '9', 'Asistente Odontologico', 1),
(13, 2, '4', 'Cientifica', 2),
(19, 2, '1', 'Administracion de empresas', 3),
(20, 2, '2', 'Administracion Publica y Economia', 3),
(21, 2, '3', 'Arquitectura', 3),
(22, 2, '4', 'Cientifica', 3),
(23, 2, '5', 'Humanistica', 3),
(25, 2, '7', 'Derecho', 3),
(26, 2, '8', 'Informatica', 3),
(28, 2, '1', 'Administracion de empresas', 4),
(29, 2, '2', 'Administracion Publica y Economia', 4),
(30, 2, '3', 'Arquitectura', 4),
(31, 2, '4', 'Cientifica', 4),
(32, 2, '5', 'Humanistica', 4),
(34, 2, '7', 'Derecho', 4),
(35, 2, '8', 'Informatica', 4),
(36, 2, '9', 'Asistente Odontologico', 4),
(37, 2, '1', 'Administracion de empresas', 5),
(38, 2, '2', 'Administracion Publica y Economia', 5),
(40, 2, '4', 'Cientifica', 5),
(41, 2, '5', 'Humanistica', 5),
(43, 2, '7', 'Derecho', 5),
(44, 2, '8', 'Informatica', 5),
(46, 2, '1', 'Administracion de empresas', 6),
(47, 2, '2', 'Administracion Publica y Economia', 6),
(48, 2, '3', 'Arquitectura', 6),
(49, 2, '4', 'Cientifica', 6),
(50, 2, '5', 'Humanistica', 6),
(52, 2, '7', 'Derecho', 6),
(53, 2, '8', 'Informatica', 6),
(54, 2, '9', 'Asistente Odontologico', 6),
(55, 2, '1', 'Administracion de empresas', 7),
(56, 2, '2', 'Administracion Publica y Economia', 7),
(57, 2, '3', 'Arquitectura', 7),
(58, 2, '4', 'Cientifica', 7),
(59, 2, '5', 'Humanistica', 7),
(61, 2, '7', 'Derecho', 7),
(62, 2, '8', 'Informatica', 7),
(63, 2, '9', 'Asistente Odontologico', 7),
(64, 2, '1', 'Administracion de empresas', 8),
(65, 2, '2', 'Administracion Publica y Economia', 8),
(67, 2, '4', 'Cientifica', 8),
(68, 2, '5', 'Humanistica', 8),
(70, 2, '7', 'Derecho', 8),
(71, 2, '8', 'Informatica', 8),
(72, 2, '9', 'Asistente Odontologico', 8),
(73, 2, '1', 'Administracion de empresas', 9),
(74, 2, '2', 'Administracion Publica y Economia', 9),
(76, 2, '4', 'Cientifica', 9),
(77, 2, '5', 'Humanistica', 9),
(79, 2, '7', 'Derecho', 9),
(80, 2, '8', 'Informatica', 9),
(82, 2, '1', 'Administracion de empresas', 10),
(83, 2, '2', 'Administracion Publica y Economia', 10),
(84, 2, '3', 'Arquitectura', 10),
(85, 2, '4', 'Cientifica', 10),
(86, 2, '5', 'Humanistica', 10),
(88, 2, '7', 'Derecho', 10),
(89, 2, '8', 'Informatica', 10),
(91, 2, '1', 'Administracion de empresas', 11),
(92, 2, '2', 'Administracion Publica y Economia', 11),
(93, 2, '3', 'Arquitectura', 11),
(94, 2, '4', 'Cientifica', 11),
(95, 2, '5', 'Humanistica', 11),
(97, 2, '7', 'Derecho', 11),
(100, 2, '1', 'Administracion de empresas', 12),
(103, 2, '4', 'Cientifica', 12),
(104, 2, '5', 'Humanistica', 12),
(107, 2, '8', 'Informatica', 12),
(109, 2, '1', 'Administracion de empresas', 13),
(112, 2, '4', 'Cientifica', 13),
(113, 2, '5', 'Humanistica', 13),
(116, 2, '8', 'Informatica', 13),
(118, 2, '1', 'Administracion de empresas', 14),
(121, 2, '4', 'Cientifica', 14),
(122, 2, '5', 'Humanistica', 14),
(131, 2, '5', 'Humanistica', 15),
(134, 2, '8', 'Informatica', 15),
(136, 2, '1', 'Administracion de empresas', 16),
(140, 2, '5', 'Humanistica', 16),
(146, 2, '2', 'Administracion Publica y Economia', 17),
(158, 2, '5', 'Humanistica', 18),
(161, 2, '8', 'Informatica', 18),
(166, 2, '4', 'Cientifica', 19),
(167, 2, '5', 'Humanistica', 19),
(179, 2, '8', 'Informatica', 20),
(181, 2, '1', 'Administracion de empresas', 21),
(182, 2, '2', 'Administracion Publica y Economia', 21),
(188, 2, '8', 'Informatica', 21),
(191, 2, '2', 'Administracion Publica y Economia', 22),
(192, 2, '3', 'Arquitectura', 22),
(194, 2, '5', 'Humanistica', 22),
(199, 2, '1', 'Administracion de empresas', 23),
(202, 2, '4', 'Cientifica', 23),
(203, 2, '5', 'Humanistica', 23),
(206, 2, '8', 'Informatica', 23),
(212, 2, '5', 'Humanistica', 24),
(221, 2, '5', 'Humanistica', 25),
(230, 2, '5', 'Humanistica', 26),
(239, 2, '5', 'Humanistica', 27),
(248, 2, '5', 'Humanistica', 28),
(253, 2, '1', 'Administracion de empresas', 29),
(254, 2, '2', 'Administracion Publica y Economia', 29),
(257, 2, '5', 'Humanistica', 29),
(266, 2, '5', 'Humanistica', 30),
(269, 2, '8', 'Informatica', 30),
(275, 2, '5', 'Humanistica', 31),
(278, 2, '8', 'Informatica', 31),
(284, 2, '5', 'Humanistica', 32),
(287, 2, '8', 'Informatica', 32),
(289, 2, '1', 'Administracion de empresas', 33),
(298, 2, '1', 'Administracion de empresas', 34),
(299, 2, '2', 'Administracion Publica y Economia', 34),
(302, 2, '5', 'Humanistica', 34),
(314, 2, '8', 'Informatica', 35),
(320, 2, '5', 'Humanistica', 36),
(328, 2, '4', 'Cientifica', 37),
(329, 2, '5', 'Humanistica', 37),
(334, 2, '1', 'Administracion de empresas', 38),
(335, 2, '2', 'Administracion Publica y Economia', 38),
(347, 2, '5', 'Humanistica', 39),
(356, 2, '5', 'Humanistica', 40),
(365, 2, '5', 'Humanistica', 41);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `id_carr` int(10) NOT NULL,
  `codigo_carrera` int(10) NOT NULL,
  `nombre_carrera` varchar(50) COLLATE utf32_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id_carr`, `codigo_carrera`, `nombre_carrera`) VALUES
(1, 3, 'Lic.En Adminstración Pública Aduanera'),
(2, 4, 'Lic.En Adminstración Pública'),
(3, 8, 'Lic.En Administracio Policial'),
(4, 1, 'Lic.En Relaciones Internacionales'),
(5, 2, 'Téc.En Proteccion,Seguridad y Estudios  INT'),
(6, 3, 'Téc.En Seguridad Nacional y de Frontera'),
(7, 1, 'Lic.En Trabajo Social'),
(8, 6, 'Téc.En Protocolo y Rel.Internacionales'),
(9, 5, 'Ing.Agronomíca en Cultivos Tropicales'),
(10, 4, 'Ing.Agrónomo Zootecnista'),
(11, 9, 'Ing.Manejo de Cuencas y Ambiente'),
(12, 4, 'Ing.En Agronegocios y Des.Agropecuario'),
(13, 2, 'Lic.En Ciencias de la Flia.y Des.Comunitario'),
(14, 3, 'Téc.En Artes Culinarias'),
(15, 4, 'Lic.En Gastronomía'),
(16, 2, 'Lic.En Arquitectura'),
(17, 4, 'Lic.y Téc.En Diseño de Interiores'),
(18, 6, 'Lic. Y Téc.En Diseño Gráfico'),
(19, 12, 'Téc.En Dibujo Arquitectónico'),
(20, 13, 'Téc.En Edificación'),
(21, 14, 'Téc.En Confección y Vestuarios'),
(22, 15, 'Lic.En Diseño de Moda'),
(23, 16, 'Lic.En Representación Arquitectónica y Digital'),
(24, 17, 'Lic.En Edificación'),
(25, 18, 'Lic.En Diseño Industrial de Productos'),
(26, 3, 'Lic.En Biología Con Orientació en : Biología Anima'),
(27, 3, 'Lic.En Biología Con Orientació en : Biología Veget'),
(28, 3, 'Lic.En Biología Con Orientació en : Biología Ambie'),
(29, 3, 'Lic.En Biología Con Orientació en : Microbiología '),
(30, 3, 'Lic.En Biología Con Orientació en : Biología Marin'),
(31, 16, 'Lic.En Docencia de Biología'),
(32, 1, 'Lic. En Física'),
(33, 3, 'Lic. En Docencia de Física'),
(34, 2, 'Lic.En Matemática'),
(35, 4, 'Lic.En Docencia de Matemática'),
(36, 1, 'Lic.En Química'),
(37, 2, 'Lic.En Docencia de Química'),
(38, 3, 'Lic.En Tecnología Química Industrial'),
(39, 5, 'Lic.En Ingeniería Estadística'),
(40, 7, 'Lic.De Registros Médicos y Estadistica de Salud'),
(41, 1, 'Lic.En Derecho y Ciencias Políticas'),
(42, 2, 'Lic.En Ciencias Política'),
(43, 4, 'Téc.En Criminalística'),
(44, 4, 'Lic.En Bibliotecología y Ciencias de la Informátic'),
(45, 1, 'Lic.En Educación Física'),
(46, 1, 'Lic.En Español'),
(47, 1, 'Lic.En Filosofía e Historia'),
(48, 2, 'Lic.En Filosofía Ética y Valores'),
(49, 1, 'Lic.En Geografía E Historia'),
(50, 5, 'Téc.En Cartografía'),
(51, 6, 'Téc. En Guía Turismo Geográfico Ecológico'),
(52, 7, 'Lic.En Humanidades Esp.Turismo Geográfico'),
(53, 9, 'Lic.En Humanidades Esp.Turismo Alternativo'),
(54, 1, 'Lic.En Inglés'),
(55, 1, 'Lic.En Francés'),
(56, 2, 'Téc.En Francés con Énfasis en Comunicación Oral'),
(57, 1, 'Lic.En Historia'),
(58, 2, 'Lic.En Antropología'),
(59, 4, 'Lic.Turismo Con Esp.Promoción Cultural'),
(60, 1, 'Lic.En Sociología'),
(61, 4, 'Téc.En Gestión de Documentos y Archivo'),
(62, 5, 'Lic.En Gestión Archivística'),
(63, 1, 'Doctorado En Medicina Veterinaria'),
(64, 1, 'Doctor En Medicina'),
(65, 2, 'Lic.En Nutrición y Dietetíca'),
(66, 3, 'Lic.En Salud Ocupacional'),
(67, 1, 'Lic.En Tecnología Médica'),
(68, 3, 'Técnico En Radiología E Imagenología'),
(69, 2, 'Téc.En Asistencia Odontológica'),
(70, 4, 'Doctor En Cirugía Dental'),
(71, 5, 'Téc.En Mantenimiento de Equipo Dental'),
(72, 6, 'Téc.En Laboratorio Dental'),
(73, 1, 'Lic.En Economía '),
(74, 3, 'Lic.En Economía Gestión Ambiental '),
(75, 4, 'Lic.En Estadísticas Económica y Social'),
(76, 1, 'Lic.En Finanzas y Banca'),
(77, 2, 'Lic.En Inversión y Riesgo'),
(78, 3, 'Téc.En Economía Ambiental '),
(79, 1, 'Lic.En Contabilidad'),
(80, 3, 'Lic.En Contabilidad y Auditoria '),
(81, 6, 'Lic.En Administración Financiera y Negocios Intern'),
(82, 8, 'Lic.En Admón De Empresas Marítimas'),
(83, 9, 'Lic.Admón.de Empresas Turísticas Bilingüe'),
(84, 12, 'Lic.En Administración de Empresas'),
(85, 13, 'Lic.En Administracion En Recursos Humanos'),
(86, 14, 'Lic.En Ing.Operaciones y Logística Empresarial'),
(87, 15, 'Lic.Bilingue En Adminstrción De Oficina'),
(88, 17, 'Lic.Docencia De Las Ciencias Comerciales'),
(89, 18, 'Lic.En Administración de Mercadeo,Promocion y Vent'),
(90, 3, 'Téc.En Admón.De Empresas Cooperativas'),
(91, 10, 'Téc.En Asistente Administrativo'),
(92, 1, 'Lic.En Periodismo'),
(93, 1, 'Lic.En Relaciones Públicas'),
(94, 2, 'Lic. y Téc.En Eventos y Protocolo Corporativos'),
(95, 1, 'Lic.En Publicidad'),
(96, 1, 'Lic.En Producción Dirección De Radio,Cine y TV'),
(97, 2, 'Téc.Produccion Audiovisual'),
(98, 9, 'Lic.Administración De Centros Educativos'),
(99, 10, 'Lic.Psicopedagogía'),
(100, 11, 'Lic.Educación Primaria'),
(101, 12, 'Lic.Evaluación E Investigación Educativa'),
(102, 13, 'Lic.Educación Preescolar'),
(103, 1, 'Lic.En Educación Con Especialización Orientación E'),
(104, 1, 'Lic.En Farmacia'),
(105, 3, 'Téc.En Farmacia'),
(106, 2, 'Lic.y Téc.En Ciencias De Enfermería'),
(107, 2, 'Lic.Musica'),
(108, 8, 'Lic.En Bellas Artes Con Especialización En Instrum'),
(109, 9, 'Lic.En Bellas Artes Con Especialización En Instrum'),
(110, 2, 'Lic.En Bellas Artes Con Especialización En Ballet '),
(111, 3, 'Lic.En Bellas Artes Con Especialización En Danza M'),
(112, 4, 'Lic.En Bellas Artes Con Especialización En Jazz y '),
(113, 5, 'Lic.En Bellas Artes Con Especialización En Folclor'),
(114, 1, 'Lic.En Bellas Artes Con Especializacion En Artes V'),
(115, 1, 'Lic.En Bellas Artes Con Especialización En Arte Te'),
(116, 1, 'Lic.En Ing.Electrónica y Comunicación'),
(117, 2, 'Lic.En Gerencia De Comercio Electrónico'),
(118, 1, 'Lic.En Ingeniería En Informática'),
(119, 3, 'Lic.En Ing.Aplicada a la Enseñanza E Implementació'),
(120, 1, 'Lic.En Psicología'),
(121, 1, 'Ing.Indust.En Auditoría y Gestíon De Procesos'),
(122, 2, 'Ing.Civil En Edificaciones'),
(123, 3, 'Ing.Civil En Infraestructura'),
(124, 5, 'Ing.Prevención De Riesgos,Seguridad y Ambiente'),
(125, 6, 'Lic.En Meteorología'),
(126, 7, 'Lic.En Geografía (Geografo Profesional)'),
(127, 8, 'Lic.En Ingeniería Geológica'),
(128, 9, 'Lic.En Ing. En Topografía y Geodesia'),
(129, 3, 'Ing.En Operacioens Aeroportuarias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `mensaje` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;


-- Estructura de tabla para la tabla `dgeneral`
--

CREATE TABLE `dgeneral` (
  `red` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `nota` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `cedula` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `cedulatxt` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `provincia` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `clave` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `tomo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `folio` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `pasaporte` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `nacionalidad` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `trabaja` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `ocupacion` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `tipoc` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `col_proc` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `cod_col` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `est_civil` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `mes_n` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `dia_n` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `ao_n` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `mes_i` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `dia_i` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `ao_i` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `fac_ia` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `esc_ia` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `car_ia` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `fac_iia` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `esc_iia` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `car_iia` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `fac_iiia` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `esc_iiia` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `car_iiia` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `n_ins` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `bach` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `nbachiller` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `ao_grad` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `ecrop` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `sexo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `pviu` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `aopviu` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `sede` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `provi` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `distrito` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `corregimiento` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `ocup_p` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `ocup_m` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `grado_p` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `esc_p` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `grado_m` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `esc_m` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `cfe` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `ecps` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `imf` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `npers` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `mtrasp` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `thijos` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `chijos` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `discap` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `rpadre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `rmadre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `rhnos` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `pgind` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `rend_esc` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `tel_cel` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `tel_ofic` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `mail` varchar(300) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `t_comp` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `t_internet` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `cod_promed` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `cod_ext_le` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `consu_dic` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `pg_num` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `area_i` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `area_ii` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `area_iii` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `arch_i` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `grupo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `edif` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `aula` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `hora_prueb` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `ao_lect` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `edad` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_inscr` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_nac` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `otro_coleg` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `nfac_ia` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `d` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `cod_prov` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `nsede` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `nfacultad` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `ncarrera` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `matricula` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `sefaesca` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `red2` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `no1` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `no2` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--

--
-- Estructura de tabla para la tabla `esc`
--

CREATE TABLE `esc` (
  `id_escu` int(10) NOT NULL,
  `sed` int(10) DEFAULT NULL,
  `fac` int(10) DEFAULT NULL,
  `esc` int(10) NOT NULL,
  `car` int(10) NOT NULL,
  `nombre_car` varchar(100) COLLATE utf32_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `esc`
--

INSERT INTO `esc` (`id_escu`, `sed`, `fac`, `esc`, `car`, `nombre_car`) VALUES
(1, 1, 1, 1, 3, 'Lic.En Adminstración Pública Aduanera'),
(2, 1, 1, 1, 4, 'Lic.En Adminstración Pública'),
(3, 1, 20, 1, 8, 'Lic.En Administracio Policial'),
(4, 1, 1, 4, 1, 'Lic.En Relaciones Internacionales'),
(5, 1, 1, 4, 2, 'Téc.En Proteccion,Seguridad y Estudios  INT'),
(6, 1, 1, 4, 3, 'Téc.En Seguridad Nacional y de Frontera'),
(7, 1, 1, 5, 1, 'Lic.En Trabajo Social'),
(8, 1, 1, 6, 6, 'Téc.En Protocolo y Rel.Internacionales'),
(9, 1, 2, 1, 5, 'Ing.Agronomíca en Cultivos Tropicales'),
(10, 1, 2, 2, 4, 'Ing.Agrónomo Zootecnista'),
(11, 1, 2, 3, 9, 'Ing.Manejo de Cuencas y Ambiente'),
(12, 1, 2, 4, 4, 'Ing.En Agronegocios y Des.Agropecuario'),
(13, 1, 2, 5, 2, 'Lic.En Ciencias de la Flia.y Des.Comunitario'),
(14, 1, 2, 5, 3, 'Téc.En Artes Culinarias'),
(15, 1, 2, 5, 4, 'Lic.En Gastronomía'),
(16, 1, 3, 1, 2, 'Lic.En Arquitectura'),
(17, 1, 3, 1, 4, 'Lic.y Téc.En Diseño de Interiores'),
(18, 1, 3, 1, 6, 'Lic. Y Téc.En Diseño Gráfico'),
(19, 1, 3, 1, 12, 'Téc.En Dibujo Arquitectónico'),
(20, 1, 3, 1, 13, 'Téc.En Edificación'),
(21, 1, 3, 1, 14, 'Téc.En Confección y Vestuarios'),
(22, 1, 3, 1, 15, 'Lic.En Diseño de Moda'),
(23, 1, 3, 1, 16, 'Lic.En Representación Arquitectónica y Digital'),
(24, 1, 3, 1, 17, 'Lic.En Edificación'),
(25, 1, 3, 1, 18, 'Lic.En Diseño Industrial de Productos'),
(26, 1, 4, 1, 3, 'Lic.En Biología Con Orientació en : Biología Animal'),
(27, 1, 4, 1, 3, 'Lic.En Biología Con Orientació en : Biología Vegetal'),
(28, 1, 4, 1, 3, 'Lic.En Biología Con Orientació en : Biología Ambiental'),
(29, 1, 4, 1, 3, 'Lic.En Biología Con Orientació en : Microbiología Y Parasitología'),
(30, 1, 4, 1, 3, 'Lic.En Biología Con Orientació en : Biología Marina y Limnología'),
(31, 1, 4, 1, 16, 'Lic.En Docencia de Biología'),
(32, 1, 4, 5, 1, 'Lic. En Física'),
(33, 1, 4, 5, 3, 'Lic. En Docencia de Física'),
(34, 1, 4, 6, 2, 'Lic.En Matemática'),
(35, 1, 4, 6, 4, 'Lic.En Docencia de Matemática'),
(36, 1, 4, 8, 1, 'Lic.En Química'),
(37, 1, 4, 8, 2, 'Lic.En Docencia de Química'),
(38, 1, 4, 8, 3, 'Lic.En Tecnología Química Industrial'),
(39, 1, 4, 13, 5, 'Lic.En Ingeniería Estadística'),
(40, 1, 4, 13, 7, 'Lic.De Registros Médicos y Estadistica de Salud'),
(41, 1, 5, 1, 1, 'Lic.En Derecho y Ciencias Políticas'),
(42, 1, 5, 1, 2, 'Lic.En Ciencias Política'),
(43, 1, 5, 4, 4, 'Téc.En Criminalística'),
(44, 1, 6, 1, 4, 'Lic.En Bibliotecología y Ciencias de la Informática'),
(45, 1, 6, 2, 1, 'Lic.En Educación Física'),
(46, 1, 6, 3, 1, 'Lic.En Español'),
(47, 1, 6, 4, 1, 'Lic.En Filosofía e Historia'),
(48, 1, 6, 4, 2, 'Lic.En Filosofía Ética y Valores'),
(49, 1, 6, 5, 1, 'Lic.En Geografía E Historia'),
(50, 1, 6, 5, 5, 'Téc.En Cartografía'),
(51, 1, 6, 5, 6, 'Téc. En Guía Turismo Geográfico Ecológico'),
(52, 1, 6, 5, 7, 'Lic.En Humanidades Esp.Turismo Geográfico'),
(53, 1, 6, 5, 9, 'Lic.En Humanidades Esp.Turismo Alternativo'),
(54, 1, 6, 6, 1, 'Lic.En Inglés'),
(55, 1, 6, 7, 1, 'Lic.En Francés'),
(56, 1, 6, 7, 2, 'Téc.En Francés con Énfasis en Comunicación Oral'),
(57, 1, 6, 10, 1, 'Lic.En Historia'),
(58, 1, 6, 10, 2, 'Lic.En Antropología'),
(59, 1, 6, 10, 4, 'Lic.Turismo Con Esp.Promoción Cultural'),
(60, 1, 6, 17, 1, 'Lic.En Sociología'),
(61, 1, 6, 19, 4, 'Téc.En Gestión de Documentos y Archivo'),
(62, 1, 6, 19, 5, 'Lic.En Gestión Archivística'),
(63, 1, 7, 1, 1, 'Doctorado En Medicina Veterinaria'),
(64, 1, 8, 1, 1, 'Doctor En Medicina'),
(65, 1, 8, 2, 2, 'Lic.En Nutrición y Dietetíca'),
(66, 1, 8, 2, 3, 'Lic.En Salud Ocupacional'),
(67, 1, 8, 3, 1, 'Lic.En Tecnología Médica'),
(68, 1, 8, 3, 3, 'Técnico En Radiología E Imagenología'),
(69, 1, 21, 1, 2, 'Téc.En Asistencia Odontológica'),
(70, 1, 9, 1, 4, 'Doctor En Cirugía Dental'),
(71, 1, 9, 1, 5, 'Téc.En Mantenimiento de Equipo Dental'),
(72, 1, 9, 1, 6, 'Téc.En Laboratorio Dental'),
(73, 1, 10, 1, 1, 'Lic.En Economía '),
(74, 1, 10, 1, 3, 'Lic.En Economía Gestión Ambiental '),
(75, 1, 10, 1, 4, 'Lic.En Estadísticas Económica y Social'),
(76, 1, 10, 3, 1, 'Lic.En Finanzas y Banca'),
(77, 1, 10, 3, 2, 'Lic.En Inversión y Riesgo'),
(78, 1, 10, 4, 3, 'Téc.En Economía Ambiental '),
(79, 1, 11, 1, 1, 'Lic.En Contabilidad'),
(80, 1, 11, 1, 3, 'Lic.En Contabilidad y Auditoria '),
(81, 1, 11, 2, 6, 'Lic.En Administración Financiera y Negocios Internacionales'),
(82, 1, 11, 2, 8, 'Lic.En Admón De Empresas Marítimas'),
(83, 1, 11, 2, 9, 'Lic.Admón.de Empresas Turísticas Bilingüe'),
(84, 1, 11, 2, 12, 'Lic.En Administración de Empresas'),
(85, 1, 11, 2, 13, 'Lic.En Administracion En Recursos Humanos'),
(86, 1, 11, 2, 14, 'Lic.En Ing.Operaciones y Logística Empresarial'),
(87, 1, 11, 2, 15, 'Lic.Bilingue En Adminstrción De Oficina'),
(88, 1, 11, 2, 17, 'Lic.Docencia De Las Ciencias Comerciales'),
(89, 1, 11, 2, 18, 'Lic.En Administración de Mercadeo,Promocion y Ventas'),
(90, 1, 11, 3, 3, 'Téc.En Admón.De Empresas Cooperativas'),
(91, 1, 11, 3, 10, 'Téc.En Asistente Administrativo'),
(92, 1, 12, 2, 1, 'Lic.En Periodismo'),
(93, 1, 12, 3, 1, 'Lic.En Relaciones Públicas'),
(94, 1, 12, 3, 2, 'Lic. y Téc.En Eventos y Protocolo Corporativos'),
(95, 1, 12, 4, 1, 'Lic.En Publicidad'),
(96, 1, 12, 8, 1, 'Lic.En Producción Dirección De Radio,Cine y TV'),
(97, 1, 12, 8, 2, 'Téc.Produccion Audiovisual'),
(98, 1, 13, 1, 9, 'Lic.Administración De Centros Educativos'),
(99, 1, 13, 1, 10, 'Lic.Psicopedagogía'),
(100, 1, 13, 1, 11, 'Lic.Educación Primaria'),
(101, 1, 13, 1, 12, 'Lic.Evaluación E Investigación Educativa'),
(102, 1, 13, 1, 13, 'Lic.Educación Preescolar'),
(103, 1, 13, 3, 1, 'Lic.En Educación Con Especialización Orientación Educativa y Profesional'),
(104, 1, 14, 1, 1, 'Lic.En Farmacia'),
(105, 1, 14, 1, 3, 'Téc.En Farmacia'),
(106, 1, 15, 1, 2, 'Lic.y Téc.En Ciencias De Enfermería'),
(107, 1, 16, 1, 2, 'Lic.Musica'),
(108, 1, 16, 1, 8, 'Lic.En Bellas Artes Con Especialización En Instrumento Musical Canto'),
(109, 1, 16, 1, 9, 'Lic.En Bellas Artes Con Especialización En Instrumento Musical Piano'),
(110, 1, 16, 3, 2, 'Lic.En Bellas Artes Con Especialización En Ballet Clásico'),
(111, 1, 16, 3, 3, 'Lic.En Bellas Artes Con Especialización En Danza Moderna '),
(112, 1, 16, 3, 4, 'Lic.En Bellas Artes Con Especialización En Jazz y Danza Carácter'),
(113, 1, 16, 3, 5, 'Lic.En Bellas Artes Con Especialización En Folclor y Danza  de la Etnia Nacional'),
(114, 1, 16, 4, 1, 'Lic.En Bellas Artes Con Especializacion En Artes Visuales '),
(115, 1, 16, 5, 1, 'Lic.En Bellas Artes Con Especialización En Arte Teatral'),
(116, 1, 17, 1, 1, 'Lic.En Ing.Electrónica y Comunicación'),
(117, 1, 17, 1, 2, 'Lic.En Gerencia De Comercio Electrónico'),
(118, 1, 17, 2, 1, 'Lic.En Ingeniería En Informática'),
(119, 1, 17, 2, 3, 'Lic.En Ing.Aplicada a la Enseñanza E Implementación De Tecnologías'),
(120, 1, 18, 1, 1, 'Lic.En Psicología'),
(121, 1, 19, 1, 1, 'Ing.Indust.En Auditoría y Gestíon De Procesos'),
(122, 1, 19, 1, 2, 'Ing.Civil En Edificaciones'),
(123, 1, 19, 1, 3, 'Ing.Civil En Infraestructura'),
(124, 1, 19, 1, 5, 'Ing.Prevención De Riesgos,Seguridad y Ambiente'),
(125, 1, 19, 1, 6, 'Lic.En Meteorología'),
(126, 1, 19, 1, 7, 'Lic.En Geografía (Geografo Profesional)'),
(127, 1, 19, 1, 8, 'Lic.En Ingeniería Geológica'),
(128, 1, 19, 1, 9, 'Lic.En Ing. En Topografía y Geodesia'),
(129, 1, 19, 4, 3, 'Ing.En Operacioens Aeroportuarias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escuela-carrera`
--

CREATE TABLE `escuela-carrera` (
  `id_trinario` int(10) NOT NULL,
  `codigo_sede` int(10) DEFAULT NULL,
  `codigo_facultad` int(10) NOT NULL,
  `codigo_escuela` int(10) NOT NULL,
  `codigo_carrera` int(10) NOT NULL,
  `nombre_carrera` varchar(50) COLLATE utf32_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `escuela-carrera`
--

INSERT INTO `escuela-carrera` (`id_trinario`, `codigo_sede`, `codigo_facultad`, `codigo_escuela`, `codigo_carrera`, `nombre_carrera`) VALUES
(1, 1, 1, 1, 1, NULL),
(2, 1, 1, 1, 2, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultades`
--

CREATE TABLE `facultades` (
  `id_facultad` int(11) NOT NULL,
  `codigo_categoria` int(11) NOT NULL,
  `codigo_facultad` varchar(11) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre_facultad` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `codigo_relacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `facultades`
--

INSERT INTO `facultades` (`id_facultad`, `codigo_categoria`, `codigo_facultad`, `nombre_facultad`, `codigo_relacion`) VALUES
(1, 3, '1', 'Facultad de Administracion Publica', 2),
(2, 3, '2', 'Facultad de ciencias agropecuarias', 4),
(3, 3, '3', 'Facultad de arquitectura', 3),
(4, 3, '4', 'Facultad de ciencias naturales y exactas', 4),
(5, 3, '5', 'Facultad de derecho', 7),
(6, 3, '6', 'Facultad de humanidades', 5),
(7, 3, '7', 'Facultad de medicina veterinaria', 4),
(8, 3, '8', 'Facultad de medicina', 4),
(9, 3, '9', 'Facultad de odontologia', 4),
(10, 3, '10', 'Facultad de Economia', 2),
(11, 3, '11', 'Fac.Admon.Empresas', 1),
(12, 3, '12', 'Facultad de comunicacion social', 5),
(13, 3, '13', 'Facultad de ciencias de la educacion', 5),
(14, 3, '14', 'Facultad de farmacia', 4),
(15, 3, '17', 'Facultad de enfermeria', 4),
(16, 3, '18', 'Facultad de bellas artes', 5),
(17, 3, '24', 'Facultad de Informatica', 8),
(18, 3, '27', 'Facultad de psicologia', 4),
(19, 3, '32', 'Facultad de ingenieria', 4),
(20, 3, '1P', 'Administracion Policial', 6),
(21, 3, '9A', 'Asistente Odontologico', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `filtro_area`
--

CREATE TABLE `filtro_area` (
  `id_farea` int(10) NOT NULL,
  `codigo_farea` int(10) DEFAULT NULL,
  `descripcion` text COLLATE utf8_spanish2_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `filtro_area`
--

INSERT INTO `filtro_area` (`id_farea`, `codigo_farea`, `descripcion`) VALUES
(1, 1, 'Administración de empresas'),
(2, 2, 'Administracion Publica y economia'),
(3, 3, 'Arquitectura'),
(4, 4, 'Cientifica'),
(5, 5, 'Humanistica'),
(6, 6, 'Policia'),
(7, 7, 'Derecho'),
(8, 8, 'Informatica'),
(9, 9, 'Asistente Odontologico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscritos2017`
--

CREATE TABLE `inscritos2017` (
  `red` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `nota` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `cedula` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `cedulatxt` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `provincia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `clave` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `tomo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `folio` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `pasaporte` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `nacionalidad` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `trabaja` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ocupacion` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `tipoc` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `col_proc` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `cod_col` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `est_civil` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `mes_n` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `dia_n` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ao_n` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `mes_i` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `dia_i` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ao_i` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `fac_ia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `esc_ia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `car_ia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `fac_iia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `esc_iia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `car_iia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `fac_iiia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `esc_iiia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `car_iiia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `n_ins` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `bach` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `nbachiller` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ao_grad` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ecrop` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `sexo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `pviu` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `aopviu` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `sede` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `provi` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `distrito` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `corregimiento` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ocup_p` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ocup_m` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `grado_p` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `esc_p` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `grado_m` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `esc_m` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `cfe` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ecps` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `imf` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `npers` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `mtrasp` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `thijos` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `chijos` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `discap` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `rpadre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `rmadre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `rhnos` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `pgind` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `rend_esc` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `tel_cel` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `tel_ofic` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `mail` varchar(300) COLLATE utf8_spanish2_ci NOT NULL,
  `t_comp` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `t_internet` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `cod_promed` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `cod_ext_le` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `consu_dic` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `pg_num` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `area_i` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `area_ii` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `area_iii` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `arch_i` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `grupo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `edif` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `aula` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `hora_prueb` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ao_lect` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `edad` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_inscr` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_nac` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `otro_coleg` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `nfac_ia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `d` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `cod_prov` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `nsede` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `nfacultad` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ncarrera` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `matricula` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `sefaesca` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `red2` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `no1` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `no2` varchar(100) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;


CREATE TABLE `inscritos2018` (
  `red` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `nota` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `cedula` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `cedulatxt` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `provincia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `clave` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `tomo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `folio` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `pasaporte` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `nacionalidad` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `trabaja` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ocupacion` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `tipoc` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `col_proc` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `cod_col` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `est_civil` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `mes_n` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `dia_n` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ao_n` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `mes_i` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `dia_i` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ao_i` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `fac_ia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `esc_ia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `car_ia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `fac_iia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `esc_iia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `car_iia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `fac_iiia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `esc_iiia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `car_iiia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `n_ins` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `bach` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `nbachiller` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ao_grad` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ecrop` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `sexo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `pviu` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `aopviu` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `sede` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `provi` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `distrito` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `corregimiento` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ocup_p` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ocup_m` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `grado_p` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `esc_p` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `grado_m` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `esc_m` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `cfe` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ecps` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `imf` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `npers` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `mtrasp` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `thijos` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `chijos` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `discap` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `rpadre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `rmadre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `rhnos` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `pgind` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `rend_esc` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `tel_cel` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `tel_ofic` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `mail` varchar(300) COLLATE utf8_spanish2_ci NOT NULL,
  `t_comp` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `t_internet` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `cod_promed` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `cod_ext_le` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `consu_dic` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `pg_num` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `area_i` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `area_ii` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `area_iii` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `arch_i` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `grupo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `edif` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `aula` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `hora_prueb` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ao_lect` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `edad` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_inscr` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_nac` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `otro_coleg` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `nfac_ia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `d` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `cod_prov` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `nsede` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `nfacultad` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ncarrera` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `matricula` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `sefaesca` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `red2` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `no1` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `no2` varchar(100) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `inscritos2018`
--

INSERT INTO `inscritos2018` (`red`, `nota`, `apellido`, `nombre`, `cedula`, `cedulatxt`, `provincia`, `clave`, `tomo`, `folio`, `pasaporte`, `nacionalidad`, `trabaja`, `ocupacion`, `tipoc`, `col_proc`, `cod_col`, `est_civil`, `mes_n`, `dia_n`, `ao_n`, `mes_i`, `dia_i`, `ao_i`, `fac_ia`, `esc_ia`, `car_ia`, `fac_iia`, `esc_iia`, `car_iia`, `fac_iiia`, `esc_iiia`, `car_iiia`, `n_ins`, `bach`, `nbachiller`, `ao_grad`, `ecrop`, `sexo`, `pviu`, `aopviu`, `sede`, `provi`, `distrito`, `corregimiento`, `ocup_p`, `ocup_m`, `grado_p`, `esc_p`, `grado_m`, `esc_m`, `cfe`, `ecps`, `imf`, `npers`, `mtrasp`, `thijos`, `chijos`, `discap`, `rpadre`, `rmadre`, `rhnos`, `pgind`, `rend_esc`, `telefono`, `tel_cel`, `tel_ofic`, `mail`, `t_comp`, `t_internet`, `cod_promed`, `cod_ext_le`, `consu_dic`, `pg_num`, `area_i`, `area_ii`, `area_iii`, `arch_i`, `grupo`, `edif`, `aula`, `hora_prueb`, `ao_lect`, `edad`, `fecha_inscr`, `fecha_nac`, `otro_coleg`, `nfac_ia`, `d`, `cod_prov`, `nsede`, `nfacultad`, `ncarrera`, `matricula`, `sefaesca`, `red2`, `no1`, `no2`) VALUES
('A1', '1', 'MEDINA', 'JESUS', '', '', '03', '00', '0738', '01678', 'NO', '', 'S', 'AYUDANTE GENERAL', '10', 'INST RUFO A GARAY', 'IO', '1', 'FEB', '03', '97', 'AUG', '02', '16', '01', '01', '03', '', '', '', '', '', '', 'V00001', '2', 'CIENCIAS', '2015', 'N', 'M', 'S', '2017', '05', 'COLON', '', '', 'ADMINISTRADOR P�BLICO', 'ADMINISTRADOR P�BLICO', '0', '4', '0', '5', '1', '3', '8', '   4', '1', 'N', ' 0', '', '1', '1', '1', '8', 'C', '000-0000', '6232-0764', '', 'el-boy-dorado01@hotmail.com', 'S', 'S', 'C', 'A', 'S', '', '2', '', '', '', 'A1', 'AD.PUB', 'C2-5', '52', '2017', '0', '', '', '', '', '', '03', '', '', '', '', '', '', '', ''),
('A1', '1', 'BERNAL PONCE A.', 'NAJAH R.', '', '', '09', '00', '0753', '01935', 'NO', '', 'N', 'DESEMPLEADO', '20', 'INST COMP Y LABORAL DE VERAGUAS', 'GM', '1', 'NOV', '04', '98', 'AUG', '02', '16', '08', '01', '01', '09', '01', '04', '14', '01', '01', 'V00002', '2', 'CIENCIAS', '2016', 'N', 'M', 'S', '2017', '01', 'VERAGUAS', '', '', 'EMPRESARIO INDEPENDIENTE', 'CONTADOR P�BLICO AUTORIZADO', '0', '3', '0', '5', '1', '5', '13', '   4', '1', 'N', ' 0', '', '1', '1', '1', '8', 'B', '958-8649', '6914-8887', '', 'rhandall98@hotmail.com', 'S', 'S', 'D', 'A', 'S', '', '4', '', '', '', 'G5', 'F501', 'FARM', '50', '2017', '0', '', '', 'BELISARIO VILLAR PEREZ', '', '', '09', '', '', '', '', '', '', '', ''),
('A1', '1', 'QUINN', 'SAHAHANA', '', '', '08', '00', '0939', '01595', 'NO', '', 'N', 'DESEMPLEADO', '10', 'COL ELENA CHAVEZ DE PINATE', 'BN', '1', 'JAN', '07', '99', 'AUG', '02', '16', '27', '01', '01', '08', '02', '02', '14', '01', '01', 'V00003', '2', 'CIENCIAS', '2016', 'N', 'F', 'S', '2017', '01', 'PANAMA', '', '', '09', 'COTIZADORA', '0', '5', '0', '5', '1', '2', '12', '   4', '2', 'N', ' 0', '', '3', '1', '1', '8', 'C', '266-5046', '6458-5424', '', 'shahanitalove07@gmail.com', 'S', 'S', 'B', 'B', 'S', '', '4', '', '', '', 'G1', 'DOMO', '301', '51', '2017', '0', '', '', '', '', '', '08', '', '', '', '', '', '', '', ''),
('A1', '1', 'VALENCIA', 'ARNULFO', '', '', '08', '00', '0921', '00641', 'NO', '', 'N', 'DESEMPLEADO', '10', 'CENTRO EDUCATIVO MONSENOR FRANCISCO BECKMAN', 'RT', '1', 'JUL', '08', '97', 'AUG', '02', '16', '24', '01', '02', '12', '04', '01', '06', '06', '01', 'V00004', '9', 'COMERCIO', '2015', 'N', 'M', 'S', '2017', '01', 'PANAMA', '', '', 'PESCADOR', 'AMA DE CASA', '0', '4', '0', '2', '2', '2', '2', '   7', '1', 'N', ' 0', '', '1', '1', '1', '8', 'C', '268-4593', '6653-0265', '', 'arnulfovalencia08@gmail.com', 'N', 'N', 'C', 'A', 'S', '', '4', '', '', '', 'A1', 'INFOR', '20', '52', '2017', '0', '', '', '', '', '', '08', '', '', '', '', '', '', '', ''),
('A1', '1', 'ESCOBAR', 'CARLOS R.', '', '', '08', '00', '0934', '00988', 'NO', '', 'N', 'DESEMPLEADO', '20', 'ESC LATINOAMERICANA', 'ER', '1', 'FEB', '08', '98', 'AUG', '02', '16', '24', '02', '03', '24', '01', '02', '03', '01', '06', 'V00005', '9', 'COMERCIO', '2015', 'N', 'M', 'S', '2017', '01', 'PANAMA', '', '', 'CONTADOR', 'ASISTENTE DE RECURSOS HUMANOS', '0', '3', '0', '3', '2', '5', '9', '   5', '1', 'N', ' 0', '', '1', '1', '1', '8', 'B', '221-7940', '6677-9019', '', 'calito0898@gmail.com', 'S', 'S', 'C', 'A', 'S', '', '4', '', '', '', 'A1', 'INFOR', '20', '52', '2017', '0', '', '', '', '', '', '08', '', '', '', '', '', '', '', ''),
('A1', '1', 'PANG', 'YARITZA', '', '', '03', '00', '0725', '00572', 'NO', '', 'S', 'VENDEDOR', '10', 'COL JOSE GUARDIA VEGA', 'CG', '5', 'JUL', '18', '90', 'AUG', '02', '16', '11', '02', '14', '', '', '', '', '', '', 'V00006', '9', 'COMERCIO', '2007', 'S', 'F', 'S', '2017', '05', 'COLON', '', '', 'TAXISTA', 'GERENTE', '0', '3', '0', '3', '2', '2', '11', '   4', '3', 'S', ' 2', '', '1', '1', '1', '8', 'C', '474-0141', '6157-1292', '', 'yaripang18@hotmail.com', 'S', 'S', 'C', 'A', 'S', '', '1', '', '', '', 'A1', 'AD.PUB', 'C1-1', '52', '2017', '0', '', '', '', '', '', '03', '', '', '', '', '', '', '', ''),
('A1', '1', 'PEREZ', 'ALEXIS', '', '', '08', '00', '0926', '01426', 'NO', '', 'N', 'DESEMPLEADO', '10', 'CENTRO EDUCATIVO MONSENOR FRANCISCO BECKMAN', 'RT', '1', 'DEC', '09', '97', 'AUG', '02', '16', '12', '04', '01', '12', '08', '01', '12', '02', '01', 'V00007', '9', 'COMERCIO', '2015', 'N', 'M', 'S', '2017', '01', 'PANAMA', '', '', 'TRANSPORTISTA', 'VENDEDOR DE TIENDA', '0', '4', '0', '3', '3', '3', '2', '   6', '2', 'N', ' 0', '', '2', '1', '1', '8', 'C', '268-9672', '6524-8608', '', 'papu0997@hotmail.com', 'N', 'N', 'C', 'A', 'S', '', '5', '', '', '', 'A1', 'COMU', '101', '52', '2017', '0', '', '', '', '', '', '08', '', '', '', '', '', '', '', ''),
('A1', '1', 'PASCUAL R.', 'MARICHELL Y.', '', '', '02', '00', '0742', '00205', 'NO', '', 'N', 'DESEMPLEADO', '10', 'COL CARMEN CONTE LOMBARDO', 'PG', '2', 'AUG', '29', '98', 'AUG', '02', '16', '08', '01', '01', '32', '04', '03', '09', '01', '06', 'V00008', '2', 'CIENCIAS', '2016', 'S', 'F', 'S', '2017', '01', 'COCLE', '', '', 'ADMINISTRADOR P�BLICO', 'ENFERMERIA', '0', '7', '0', '5', '1', '5', '13', '   3', '1', 'N', ' 0', '', '1', '1', '0', '8', 'B', '000-0000', '6757-7877', '', 'clarymari09@hotmail.com', 'S', 'S', 'D', 'A', 'S', '', '4', '', '', '', 'G5', 'F501', 'FARM', '50', '2017', '0', '', '', '', '', '', '02', '', '', '', '', '', '', '', ''),
('A1', '1', 'RIOS', 'EYLEEN', '', '', '08', '00', '0949', '00873', 'NO', '', 'N', 'DESEMPLEADO', '20', 'PANAMA HEIGHT INTERNATIONAL ACADEMY', 'VD', '1', 'JUL', '12', '99', 'AUG', '02', '16', '27', '01', '01', '07', '01', '01', '18', '03', '02', 'V00009', '2', 'CIENCIAS', '2016', 'N', 'F', 'S', '2017', '01', 'PANAMA', '', '', 'CHAPISTERO', 'MAESTRO', '0', '3', '0', '5', '1', '3', '6', '   2', '1', 'N', ' 0', '', '1', '1', '1', '8', 'C', '000-0000', '6058-0645', '000-0000', 'eyleen1910@hotmail.com', 'S', 'N', 'C', 'B', 'S', '', '4', '', '', '', 'G1', 'DOMO', '301', '51', '2017', '0', '', '', '', '', '', '08', '', '', '', '', '', '', '', ''),
('A1', '1', 'SMITH', 'ELVIA', '', '', '01', '00', '0744', '01562', 'NO', '', 'N', 'DESEMPLEADO', '10', 'COL BASICO GENERAL DE GUABITO', 'BA', '1', 'OCT', '04', '98', 'AUG', '03', '16', '17', '01', '02', '', '', '', '', '', '', 'V00010', '2', 'CIENCIAS', '2016', 'N', 'F', 'S', '', '08', 'BOCAS DEL TO', '', '', 'GERENTE', 'AMA DE CASA', '0', '2', '0', '3', '1', '3', '4', '   4', '1', 'N', ' 0', '', '1', '1', '0', '8', 'A', '000-0000', '6912-0248', '', '', 'S', 'S', 'C', 'A', 'S', '', '4', '', '', '', 'G1', 'FIN15', 'S-36', '52', '2017', '0', '', '', '', '', '', '01', '', '', '', '', '', '', '', ''),
('A1', '1', 'PINZON', 'JAMETH', '', '', '08', '00', '0931', '02108', 'NO', '', 'N', 'DESEMPLEADO', '10', 'CENTRO EDUCATIVO MONSENOR FRANCISCO BECKMAN', 'RT', '1', 'MAY', '17', '98', 'AUG', '02', '16', '04', '06', '02', '04', '06', '04', '', '', '', 'V00011', '2', 'CIENCIAS', '2016', 'N', 'M', 'S', '2017', '01', 'PANAMA', '', '', 'SOLDADOR', 'AMA DE CASA', '0', '3', '0', '4', '1', '1', '2', '   5', '1', 'N', ' 0', '', '2', '1', '1', '8', 'B', '268-4090', '6912-2307', '', 'yairpinzon2016@gmail.com', 'S', 'S', 'C', 'A', 'S', '', '4', '', '', '', 'G1', 'ENF', '13', '52', '2017', '0', '', '', '', '', '', '08', '', '', '', '', '', '', '', ''),
('A1', '1', 'RODRIGUEZ P', 'ABDIEL A', '', '', '06', '00', '0722', '00451', 'NO', '', 'N', 'DESEMPLEADO', '10', 'COL JOSE DANIEL CRESPO', 'CD', '1', 'OCT', '30', '98', 'AUG', '06', '16', '05', '01', '01', '24', '02', '05', '27', '01', '01', 'V00012', '14', 'LETRAS', '2016', 'N', 'M', 'S', '2017', '03', 'HERRERA', '', '', 'JUBILADOS', 'AMA DE CASA', '0', '3', '0', '3', '1', '3', '3', '   2', '1', 'N', ' 0', '', '0', '1', '0', '8', 'B', '970-1112', '6564-3377', '', 'abdielrg1@gmail.com', 'S', 'S', 'D', 'A', 'S', '', '5', '', '', '', 'G1', 'AZUER', 'B-11', '52', '2017', '0', '', '', '', '', '', '06', '', '', '', '', '', '', '', ''),
('A1', '1', 'MEDINA', 'ANA', '', '', '08', '00', '0901', '02181', 'NO', '', 'S', 'AYUDANTE GENERAL', '10', 'INST BENIGNO JIMENEZ GARAY', 'FQ', '1', 'DEC', '28', '95', 'AUG', '03', '16', '11', '02', '09', '', '', '', '', '', '', 'V00013', '9', 'COMERCIO', '2014', 'N', 'F', 'S', '2017', '05', 'COLON', '', '', 'GUARDIA DE SEGURIDAD', 'AMA DE CASA', '0', '4', '0', '2', '1', '2', '2', '   6', '1', 'N', ' 0', '', '1', '1', '1', '8', 'C', '000-0000', '6788-5524', '', 'alizbethhernandez894@gmail.com', 'N', 'N', 'C', 'A', 'S', '', '1', '', '', '', 'A1', 'AD.PUB', 'C1-1', '52', '2017', '0', '', '', '', '', '', '03', '', '', '', '', '', '', '', ''),
('A1', '1', 'PEREZ', 'ALEXIS', '', '', '08', '00', '0926', '01426', 'NO', '', 'N', 'DESEMPLEADO', '10', 'CENTRO EDUCATIVO MONSENOR FRANCISCO BECKMAN', 'RT', '1', 'DEC', '09', '97', 'AUG', '02', '16', '12', '04', '01', '12', '08', '01', '12', '02', '01', 'V00014', '9', 'COMERCIO', '2015', 'N', 'M', 'S', '2017', '01', 'PANAMA', '', '', 'TRANSPORTISTA', 'VENDEDOR DE TIENDA', '0', '4', '0', '3', '3', '3', '2', '   6', '2', 'N', ' 0', '', '2', '1', '1', '8', 'C', '268-9672', '6524-8608', '', 'papu0997@hotmail.com', 'N', 'N', 'C', 'A', 'S', '', '5', '', '', '', 'A1', 'COMU', '101', '52', '2017', '0', '', '', '', '', '', '08', '', '', '', '', '', '', '', ''),
('A1', '1', 'SAMANIEGO', 'LIZBETH', '0003074100184', '', '03', '00', '0741', '00184', 'NO', '', 'N', 'DESEMPLEADO', '10', 'CENTRO BASICO GENERAL TORTI', 'PF', '1', 'DEC', '23', '97', 'NOV', '07', '16', '06', '06', '01', '10', '03', '01', '06', '07', '01', 'V00014', '2', 'CIENCIAS', '2015', 'N', 'F', 'S', '2016', '01', 'PANAMA', '', '', 'AGRICULTOR', 'ASEADOR', '0', '2', '0', '1', '1', '1', '7', '   2', '1', 'N', ' 0', '', '1', '1', '1', '8', 'B', '000-0000', '6992-1725', '000-0000', 'lizyclara@gmail.com', 'S', 'S', 'C', 'B', 'S', '', '5', '', '', 'VAL16-17', 'A5', 'PISO3', '402', '51', '2017', '18', '', '', '', '', '', '05', '', '', '', '', '', '', '', ''),
('A3', '1', 'ATENCIO', 'VIANKA', '0008070901189', '', '08', '00', '0709', '01189', 'NO', '', 'N', 'DESEMPLEADO', '10', 'COL RICHARD NEUMANN', 'DK', '2', 'MAY', '31', '77', 'NOV', '24', '16', '01', '04', '01', '', '', '', '', '', '', 'V00014', '26', 'CONTABILIDAD', '1994', 'N', 'F', 'N', '2016', '01', 'PANAMA', '', '', 'JUBILADOS', 'AMA DE CASA', '0', '1', '0', '4', '3', '1', '13', '   4', '1', 'S', ' 2', '', '1', '1', '1', '8', 'B', '231-1343', '6771-9240', '', 'viankaatencio@hotmail.com', 'S', 'S', 'D', 'A', 'S', '', '2', '', '', 'VAL16-17', 'A8', 'PISO1', '108', '52', '2017', '39', '', '', '', '', '', '08', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscritos2019`
--

CREATE TABLE `inscritos2019` (
  `red` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `nota` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `cedula` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `cedulatxt` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `provincia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `clave` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `tomo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `folio` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `pasaporte` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `nacionalidad` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `trabaja` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ocupacion` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `tipoc` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `col_proc` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `cod_col` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `est_civil` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `mes_n` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `dia_n` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ao_n` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `mes_i` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `dia_i` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ao_i` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `fac_ia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `esc_ia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `car_ia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `fac_iia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `esc_iia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `car_iia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `fac_iiia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `esc_iiia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `car_iiia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `n_ins` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `bach` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `nbachiller` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ao_grad` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ecrop` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `sexo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `pviu` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `aopviu` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `sede` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `provi` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `distrito` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `corregimiento` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ocup_p` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ocup_m` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `grado_p` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `esc_p` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `grado_m` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `esc_m` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `cfe` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ecps` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `imf` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `npers` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `mtrasp` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `thijos` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `chijos` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `discap` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `rpadre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `rmadre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `rhnos` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `pgind` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `rend_esc` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `tel_cel` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `tel_ofic` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `mail` varchar(300) COLLATE utf8_spanish2_ci NOT NULL,
  `t_comp` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `t_internet` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `cod_promed` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `cod_ext_le` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `consu_dic` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `pg_num` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `area_i` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `area_ii` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `area_iii` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `arch_i` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `grupo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `edif` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `aula` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `hora_prueb` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ao_lect` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `edad` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_inscr` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_nac` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `otro_coleg` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `nfac_ia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `d` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `cod_prov` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `nsede` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `nfacultad` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ncarrera` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `matricula` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `sefaesca` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `red2` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `no1` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `no2` varchar(100) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscritostmp`
--

CREATE TABLE `inscritostmp` (
  `red` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `nota` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `cedula` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `cedulatxt` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `provincia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `clave` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `tomo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `folio` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `pasaporte` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `nacionalidad` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `trabaja` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ocupacion` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `tipoc` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `col_proc` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `cod_col` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `est_civil` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `mes_n` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `dia_n` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ao_n` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `mes_i` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `dia_i` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ao_i` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `fac_ia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `esc_ia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `car_ia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `fac_iia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `esc_iia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `car_iia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `fac_iiia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `esc_iiia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `car_iiia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `n_ins` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `bach` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `nbachiller` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ao_grad` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ecrop` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `sexo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `pviu` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `aopviu` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `sede` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `provi` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `distrito` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `corregimiento` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ocup_p` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ocup_m` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `grado_p` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `esc_p` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `grado_m` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `esc_m` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `cfe` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ecps` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `imf` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `npers` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `mtrasp` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `thijos` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `chijos` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `discap` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `rpadre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `rmadre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `rhnos` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `pgind` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `rend_esc` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `tel_cel` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `tel_ofic` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `mail` varchar(300) COLLATE utf8_spanish2_ci NOT NULL,
  `t_comp` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `t_internet` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `cod_promed` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `cod_ext_le` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `consu_dic` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `pg_num` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `area_i` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `area_ii` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `area_iii` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `arch_i` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `grupo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `edif` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `aula` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `hora_prueb` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ao_lect` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `edad` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_inscr` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_nac` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `otro_coleg` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `nfac_ia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `d` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `cod_prov` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `nsede` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `nfacultad` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ncarrera` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `matricula` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `sefaesca` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `red2` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `no1` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `no2` varchar(100) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `inscritostmp`
--

INSERT INTO `inscritostmp` (`red`, `nota`, `apellido`, `nombre`, `cedula`, `cedulatxt`, `provincia`, `clave`, `tomo`, `folio`, `pasaporte`, `nacionalidad`, `trabaja`, `ocupacion`, `tipoc`, `col_proc`, `cod_col`, `est_civil`, `mes_n`, `dia_n`, `ao_n`, `mes_i`, `dia_i`, `ao_i`, `fac_ia`, `esc_ia`, `car_ia`, `fac_iia`, `esc_iia`, `car_iia`, `fac_iiia`, `esc_iiia`, `car_iiia`, `n_ins`, `bach`, `nbachiller`, `ao_grad`, `ecrop`, `sexo`, `pviu`, `aopviu`, `sede`, `provi`, `distrito`, `corregimiento`, `ocup_p`, `ocup_m`, `grado_p`, `esc_p`, `grado_m`, `esc_m`, `cfe`, `ecps`, `imf`, `npers`, `mtrasp`, `thijos`, `chijos`, `discap`, `rpadre`, `rmadre`, `rhnos`, `pgind`, `rend_esc`, `telefono`, `tel_cel`, `tel_ofic`, `mail`, `t_comp`, `t_internet`, `cod_promed`, `cod_ext_le`, `consu_dic`, `pg_num`, `area_i`, `area_ii`, `area_iii`, `arch_i`, `grupo`, `edif`, `aula`, `hora_prueb`, `ao_lect`, `edad`, `fecha_inscr`, `fecha_nac`, `otro_coleg`, `nfac_ia`, `d`, `cod_prov`, `nsede`, `nfacultad`, `ncarrera`, `matricula`, `sefaesca`, `red2`, `no1`, `no2`) VALUES
('A1', '1', 'MEDINA', 'JESUS', '', '', '03', '00', '0738', '01678', 'NO', '', 'S', 'AYUDANTE GENERAL', '10', 'INST RUFO A GARAY', 'IO', '1', 'FEB', '03', '97', 'AUG', '02', '16', '01', '01', '03', '', '', '', '', '', '', 'V00001', '2', 'CIENCIAS', '2015', 'N', 'M', 'S', '2017', '05', 'COLON', '', '', 'ADMINISTRADOR P�BLICO', 'ADMINISTRADOR P�BLICO', '0', '4', '0', '5', '1', '3', '8', '   4', '1', 'N', ' 0', '', '1', '1', '1', '8', 'C', '000-0000', '6232-0764', '', 'el-boy-dorado01@hotmail.com', 'S', 'S', 'C', 'A', 'S', '', '2', '', '', '', 'A1', 'AD.PUB', 'C2-5', '52', '2017', '0', '', '', '', '', '', '03', '', '', '', '', '', '', '', ''),
('A1', '1', 'BERNAL PONCE A.', 'NAJAH R.', '', '', '09', '00', '0753', '01935', 'NO', '', 'N', 'DESEMPLEADO', '20', 'INST COMP Y LABORAL DE VERAGUAS', 'GM', '1', 'NOV', '04', '98', 'AUG', '02', '16', '08', '01', '01', '09', '01', '04', '14', '01', '01', '', '2', 'CIENCIAS', '2016', 'N', 'M', 'S', '2017', '01', 'VERAGUAS', '', '', 'EMPRESARIO INDEPENDIENTE', 'CONTADOR P�BLICO AUTORIZADO', '0', '3', '0', '5', '1', '5', '13', '   4', '1', 'N', ' 0', '', '1', '1', '1', '8', 'B', '958-8649', '6914-8887', '', 'rhandall98@hotmail.com', 'S', 'S', 'D', 'A', 'S', '', '4', '', '', '', 'G5', 'F501', 'FARM', '50', '2017', '0', '', '', 'BELISARIO VILLAR PEREZ', '', '', '09', '', '', '', '', '', '', '', ''),
('A1', '1', 'QUINN', 'SAHAHANA', '', '', '08', '00', '0939', '01595', 'NO', '', 'N', 'DESEMPLEADO', '10', 'COL ELENA CHAVEZ DE PINATE', 'BN', '1', 'JAN', '07', '99', 'AUG', '02', '16', '27', '01', '01', '08', '02', '02', '14', '01', '01', '', '2', 'CIENCIAS', '2016', 'N', 'F', 'S', '2017', '01', 'PANAMA', '', '', '09', 'COTIZADORA', '0', '5', '0', '5', '1', '2', '12', '   4', '2', 'N', ' 0', '', '3', '1', '1', '8', 'C', '266-5046', '6458-5424', '', 'shahanitalove07@gmail.com', 'S', 'S', 'B', 'B', 'S', '', '4', '', '', '', 'G1', 'DOMO', '301', '51', '2017', '0', '', '', '', '', '', '08', '', '', '', '', '', '', '', ''),
('A1', '1', 'BERNAL PONCE A.', 'NAJAH R.', '', '', '09', '00', '0753', '01935', 'NO', '', 'N', 'DESEMPLEADO', '20', 'INST COMP Y LABORAL DE VERAGUAS', 'GM', '1', 'NOV', '04', '98', 'AUG', '02', '16', '08', '01', '01', '09', '01', '04', '14', '01', '01', '', '2', 'CIENCIAS', '2016', 'N', 'M', 'S', '2017', '01', 'VERAGUAS', '', '', 'EMPRESARIO INDEPENDIENTE', 'CONTADOR P�BLICO AUTORIZADO', '0', '3', '0', '5', '1', '5', '13', '   4', '1', 'N', ' 0', '', '1', '1', '1', '8', 'B', '958-8649', '6914-8887', '', 'rhandall98@hotmail.com', 'S', 'S', 'D', 'A', 'S', '', '4', '', '', '', 'G5', 'F501', 'FARM', '50', '2017', '0', '', '', 'BELISARIO VILLAR PEREZ', '', '', '09', '', '', '', '', '', '', '', ''),
('A1', '1', 'BERNAL PONCE A.', 'NAJAH R.', '', '', '09', '00', '0753', '01935', 'NO', '', 'N', 'DESEMPLEADO', '20', 'INST COMP Y LABORAL DE VERAGUAS', 'GM', '1', 'NOV', '04', '98', 'AUG', '02', '16', '08', '01', '01', '09', '01', '04', '14', '01', '01', 'V00002', '2', 'CIENCIAS', '2016', 'N', 'M', 'S', '2017', '01', 'VERAGUAS', '', '', 'EMPRESARIO INDEPENDIENTE', 'CONTADOR P�BLICO AUTORIZADO', '0', '3', '0', '5', '1', '5', '13', '   4', '1', 'N', ' 0', '', '1', '1', '1', '8', 'B', '958-8649', '6914-8887', '', 'rhandall98@hotmail.com', 'S', 'S', 'D', 'A', 'S', '', '4', '', '', '', 'G5', 'F501', 'FARM', '50', '2017', '0', '', '', 'BELISARIO VILLAR PEREZ', '', '', '09', '', '', '', '', '', '', '', ''),
('A1', '1', 'QUINN', 'SAHAHANA', '', '', '08', '00', '0939', '01595', 'NO', '', 'N', 'DESEMPLEADO', '10', 'COL ELENA CHAVEZ DE PINATE', 'BN', '1', 'JAN', '07', '99', 'AUG', '02', '16', '27', '01', '01', '08', '02', '02', '14', '01', '01', 'V00003', '2', 'CIENCIAS', '2016', 'N', 'F', 'S', '2017', '01', 'PANAMA', '', '', '09', 'COTIZADORA', '0', '5', '0', '5', '1', '2', '12', '   4', '2', 'N', ' 0', '', '3', '1', '1', '8', 'C', '266-5046', '6458-5424', '', 'shahanitalove07@gmail.com', 'S', 'S', 'B', 'B', 'S', '', '4', '', '', '', 'G1', 'DOMO', '301', '51', '2017', '0', '', '', '', '', '', '08', '', '', '', '', '', '', '', ''),
('A1', '1', 'VALENCIA', 'ARNULFO', '', '', '08', '00', '0921', '00641', 'NO', '', 'N', 'DESEMPLEADO', '10', 'CENTRO EDUCATIVO MONSENOR FRANCISCO BECKMAN', 'RT', '1', 'JUL', '08', '97', 'AUG', '02', '16', '24', '01', '02', '12', '04', '01', '06', '06', '01', 'V00004', '9', 'COMERCIO', '2015', 'N', 'M', 'S', '2017', '01', 'PANAMA', '', '', 'PESCADOR', 'AMA DE CASA', '0', '4', '0', '2', '2', '2', '2', '   7', '1', 'N', ' 0', '', '1', '1', '1', '8', 'C', '268-4593', '6653-0265', '', 'arnulfovalencia08@gmail.com', 'N', 'N', 'C', 'A', 'S', '', '4', '', '', '', 'A1', 'INFOR', '20', '52', '2017', '0', '', '', '', '', '', '08', '', '', '', '', '', '', '', ''),
('A1', '1', 'ESCOBAR', 'CARLOS R.', '', '', '08', '00', '0934', '00988', 'NO', '', 'N', 'DESEMPLEADO', '20', 'ESC LATINOAMERICANA', 'ER', '1', 'FEB', '08', '98', 'AUG', '02', '16', '24', '02', '03', '24', '01', '02', '03', '01', '06', 'V00005', '9', 'COMERCIO', '2015', 'N', 'M', 'S', '2017', '01', 'PANAMA', '', '', 'CONTADOR', 'ASISTENTE DE RECURSOS HUMANOS', '0', '3', '0', '3', '2', '5', '9', '   5', '1', 'N', ' 0', '', '1', '1', '1', '8', 'B', '221-7940', '6677-9019', '', 'calito0898@gmail.com', 'S', 'S', 'C', 'A', 'S', '', '4', '', '', '', 'A1', 'INFOR', '20', '52', '2017', '0', '', '', '', '', '', '08', '', '', '', '', '', '', '', ''),
('A1', '1', 'PANG', 'YARITZA', '', '', '03', '00', '0725', '00572', 'NO', '', 'S', 'VENDEDOR', '10', 'COL JOSE GUARDIA VEGA', 'CG', '5', 'JUL', '18', '90', 'AUG', '02', '16', '11', '02', '14', '', '', '', '', '', '', 'V00006', '9', 'COMERCIO', '2007', 'S', 'F', 'S', '2017', '05', 'COLON', '', '', 'TAXISTA', 'GERENTE', '0', '3', '0', '3', '2', '2', '11', '   4', '3', 'S', ' 2', '', '1', '1', '1', '8', 'C', '474-0141', '6157-1292', '', 'yaripang18@hotmail.com', 'S', 'S', 'C', 'A', 'S', '', '1', '', '', '', 'A1', 'AD.PUB', 'C1-1', '52', '2017', '0', '', '', '', '', '', '03', '', '', '', '', '', '', '', ''),
('A1', '1', 'PEREZ', 'ALEXIS', '', '', '08', '00', '0926', '01426', 'NO', '', 'N', 'DESEMPLEADO', '10', 'CENTRO EDUCATIVO MONSENOR FRANCISCO BECKMAN', 'RT', '1', 'DEC', '09', '97', 'AUG', '02', '16', '12', '04', '01', '12', '08', '01', '12', '02', '01', 'V00014', '9', 'COMERCIO', '2015', 'N', 'M', 'S', '2017', '01', 'PANAMA', '', '', 'TRANSPORTISTA', 'VENDEDOR DE TIENDA', '0', '4', '0', '3', '3', '3', '2', '   6', '2', 'N', ' 0', '', '2', '1', '1', '8', 'C', '268-9672', '6524-8608', '', 'papu0997@hotmail.com', 'N', 'N', 'C', 'A', 'S', '', '5', '', '', '', 'A1', 'COMU', '101', '52', '2017', '0', '', '', '', '', '', '08', '', '', '', '', '', '', '', ''),
('A1', '1', 'PASCUAL R.', 'MARICHELL Y.', '', '', '02', '00', '0742', '00205', 'NO', '', 'N', 'DESEMPLEADO', '10', 'COL CARMEN CONTE LOMBARDO', 'PG', '2', 'AUG', '29', '98', 'AUG', '02', '16', '08', '01', '01', '32', '04', '03', '09', '01', '06', 'V00008', '2', 'CIENCIAS', '2016', 'S', 'F', 'S', '2017', '01', 'COCLE', '', '', 'ADMINISTRADOR P�BLICO', 'ENFERMERIA', '0', '7', '0', '5', '1', '5', '13', '   3', '1', 'N', ' 0', '', '1', '1', '0', '8', 'B', '000-0000', '6757-7877', '', 'clarymari09@hotmail.com', 'S', 'S', 'D', 'A', 'S', '', '4', '', '', '', 'G5', 'F501', 'FARM', '50', '2017', '0', '', '', '', '', '', '02', '', '', '', '', '', '', '', ''),
('A1', '1', 'RIOS', 'EYLEEN', '', '', '08', '00', '0949', '00873', 'NO', '', 'N', 'DESEMPLEADO', '20', 'PANAMA HEIGHT INTERNATIONAL ACADEMY', 'VD', '1', 'JUL', '12', '99', 'AUG', '02', '16', '27', '01', '01', '07', '01', '01', '18', '03', '02', 'V00009', '2', 'CIENCIAS', '2016', 'N', 'F', 'S', '2017', '01', 'PANAMA', '', '', 'CHAPISTERO', 'MAESTRO', '0', '3', '0', '5', '1', '3', '6', '   2', '1', 'N', ' 0', '', '1', '1', '1', '8', 'C', '000-0000', '6058-0645', '000-0000', 'eyleen1910@hotmail.com', 'S', 'N', 'C', 'B', 'S', '', '4', '', '', '', 'G1', 'DOMO', '301', '51', '2017', '0', '', '', '', '', '', '08', '', '', '', '', '', '', '', ''),
('A1', '1', 'SMITH', 'ELVIA', '', '', '01', '00', '0744', '01562', 'NO', '', 'N', 'DESEMPLEADO', '10', 'COL BASICO GENERAL DE GUABITO', 'BA', '1', 'OCT', '04', '98', 'AUG', '03', '16', '17', '01', '02', '', '', '', '', '', '', 'V00010', '2', 'CIENCIAS', '2016', 'N', 'F', 'S', '', '08', 'BOCAS DEL TO', '', '', 'GERENTE', 'AMA DE CASA', '0', '2', '0', '3', '1', '3', '4', '   4', '1', 'N', ' 0', '', '1', '1', '0', '8', 'A', '000-0000', '6912-0248', '', '', 'S', 'S', 'C', 'A', 'S', '', '4', '', '', '', 'G1', 'FIN15', 'S-36', '52', '2017', '0', '', '', '', '', '', '01', '', '', '', '', '', '', '', ''),
('A1', '1', 'PINZON', 'JAMETH', '', '', '08', '00', '0931', '02108', 'NO', '', 'N', 'DESEMPLEADO', '10', 'CENTRO EDUCATIVO MONSENOR FRANCISCO BECKMAN', 'RT', '1', 'MAY', '17', '98', 'AUG', '02', '16', '04', '06', '02', '04', '06', '04', '', '', '', 'V00011', '2', 'CIENCIAS', '2016', 'N', 'M', 'S', '2017', '01', 'PANAMA', '', '', 'SOLDADOR', 'AMA DE CASA', '0', '3', '0', '4', '1', '1', '2', '   5', '1', 'N', ' 0', '', '2', '1', '1', '8', 'B', '268-4090', '6912-2307', '', 'yairpinzon2016@gmail.com', 'S', 'S', 'C', 'A', 'S', '', '4', '', '', '', 'G1', 'ENF', '13', '52', '2017', '0', '', '', '', '', '', '08', '', '', '', '', '', '', '', ''),
('A1', '1', 'RODRIGUEZ P', 'ABDIEL A', '', '', '06', '00', '0722', '00451', 'NO', '', 'N', 'DESEMPLEADO', '10', 'COL JOSE DANIEL CRESPO', 'CD', '1', 'OCT', '30', '98', 'AUG', '06', '16', '05', '01', '01', '24', '02', '05', '27', '01', '01', 'V00012', '14', 'LETRAS', '2016', 'N', 'M', 'S', '2017', '03', 'HERRERA', '', '', 'JUBILADOS', 'AMA DE CASA', '0', '3', '0', '3', '1', '3', '3', '   2', '1', 'N', ' 0', '', '0', '1', '0', '8', 'B', '970-1112', '6564-3377', '', 'abdielrg1@gmail.com', 'S', 'S', 'D', 'A', 'S', '', '5', '', '', '', 'G1', 'AZUER', 'B-11', '52', '2017', '0', '', '', '', '', '', '06', '', '', '', '', '', '', '', ''),
('A1', '1', 'MEDINA', 'ANA', '', '', '08', '00', '0901', '02181', 'NO', '', 'S', 'AYUDANTE GENERAL', '10', 'INST BENIGNO JIMENEZ GARAY', 'FQ', '1', 'DEC', '28', '95', 'AUG', '03', '16', '11', '02', '09', '', '', '', '', '', '', 'V00013', '9', 'COMERCIO', '2014', 'N', 'F', 'S', '2017', '05', 'COLON', '', '', 'GUARDIA DE SEGURIDAD', 'AMA DE CASA', '0', '4', '0', '2', '1', '2', '2', '   6', '1', 'N', ' 0', '', '1', '1', '1', '8', 'C', '000-0000', '6788-5524', '', 'alizbethhernandez894@gmail.com', 'N', 'N', 'C', 'A', 'S', '', '1', '', '', '', 'A1', 'AD.PUB', 'C1-1', '52', '2017', '0', '', '', '', '', '', '03', '', '', '', '', '', '', '', ''),
('A1', '1', 'SAMANIEGO', 'LIZBETH', '0003074100184', '', '03', '00', '0741', '00184', 'NO', '', 'N', 'DESEMPLEADO', '10', 'CENTRO BASICO GENERAL TORTI', 'PF', '1', 'DEC', '23', '97', 'NOV', '07', '16', '06', '06', '01', '10', '03', '01', '06', '07', '01', 'V00014', '2', 'CIENCIAS', '2015', 'N', 'F', 'S', '2016', '01', 'PANAMA', '', '', 'AGRICULTOR', 'ASEADOR', '0', '2', '0', '1', '1', '1', '7', '   2', '1', 'N', ' 0', '', '1', '1', '1', '8', 'B', '000-0000', '6992-1725', '000-0000', 'lizyclara@gmail.com', 'S', 'S', 'C', 'B', 'S', '', '5', '', '', 'VAL16-17', 'A5', 'PISO3', '402', '51', '2017', '18', '', '', '', '', '', '05', '', '', '', '', '', '', '', ''),
('A3', '1', 'ATENCIO', 'VIANKA', '0008070901189', '', '08', '00', '0709', '01189', 'NO', '', 'N', 'DESEMPLEADO', '10', 'COL RICHARD NEUMANN', 'DK', '2', 'MAY', '31', '77', 'NOV', '24', '16', '01', '04', '01', '', '', '', '', '', '', 'V00014', '26', 'CONTABILIDAD', '1994', 'N', 'F', 'N', '2016', '01', 'PANAMA', '', '', 'JUBILADOS', 'AMA DE CASA', '0', '1', '0', '4', '3', '1', '13', '   4', '1', 'S', ' 2', '', '1', '1', '1', '8', 'B', '231-1343', '6771-9240', '', 'viankaatencio@hotmail.com', 'S', 'S', 'D', 'A', 'S', '', '2', '', '', 'VAL16-17', 'A8', 'PISO1', '108', '52', '2017', '39', '', '', '', '', '', '08', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logsystem`

CREATE TABLE `logsystem` (
  `id_log` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `datelog` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `accion` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- --------------------------------------------------------

-- Estructura de tabla para la tabla `resultados2017`

CREATE TABLE `resultados2017` (
  `red` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `red2` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `region` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `extranjero` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `sede` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nsede` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `facultad` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nfacultad` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `escuela` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `carrera` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellido` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cedula` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cedulatxt` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `provincia` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `clave` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tomo` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `folio` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `n_ins` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `areap` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nota` int(25) DEFAULT NULL,
  `ps` float(25,0) DEFAULT NULL,
  `gatb` float(25,0) DEFAULT NULL,
  `pca` int(25) DEFAULT NULL,
  `pcg` int(25) DEFAULT NULL,
  `ingles` int(25) DEFAULT NULL,
  `indice` float(25,0) DEFAULT NULL,
  `indicear` float(25,0) DEFAULT NULL,
  `indiceci` float(25,0) DEFAULT NULL,
  `indiceem` float(25,0) DEFAULT NULL,
  `indicehu` float(25,0) DEFAULT NULL,
  `indicein` float(25,0) DEFAULT NULL,
  `indicepe` float(25,0) DEFAULT NULL,
  `indicepo` float(25,0) DEFAULT NULL,
  `indicede` float(25,0) DEFAULT NULL,
  `indicead` float(25,0) DEFAULT NULL,
  `fecpca` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cl_def` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cl_propb` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `lect1` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `r_com_comp` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `rel_o` int(25) DEFAULT NULL,
  `lect2` int(25) DEFAULT NULL,
  `r_plan` int(25) DEFAULT NULL,
  `verbal` int(25) DEFAULT NULL,
  `oper1` int(25) DEFAULT NULL,
  `oper2` int(25) DEFAULT NULL,
  `razon1` int(25) DEFAULT NULL,
  `razon2` int(25) DEFAULT NULL,
  `numer` int(25) DEFAULT NULL,
  `area1` int(25) DEFAULT NULL,
  `area2` int(25) DEFAULT NULL,
  `area3` int(25) DEFAULT NULL,
  `area4` int(25) DEFAULT NULL,
  `area5` int(25) DEFAULT NULL,
  `area6` int(25) DEFAULT NULL,
  `gram1` int(25) DEFAULT NULL,
  `vocab` int(25) DEFAULT NULL,
  `gram2` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `narchi` int(25) DEFAULT NULL,
  `opc` int(25) DEFAULT NULL,
  `npag` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecpcg` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `indice00` float(25,0) DEFAULT NULL,
  `indice25` float(25,0) DEFAULT NULL,
  `indice50` float(25,0) DEFAULT NULL,
  `indice75` float(25,0) DEFAULT NULL,
  `registro` int(25) DEFAULT NULL,
  `car1` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `areap1` int(25) DEFAULT NULL,
  `car2` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `areap2` int(25) DEFAULT NULL,
  `car3` int(25) DEFAULT NULL,
  `areap3` int(25) DEFAULT NULL,
  `col_proc` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cod_col` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tipoc` int(25) DEFAULT NULL,
  `ntipoc` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `bach` int(25) DEFAULT NULL,
  `bachiller` int(25) DEFAULT NULL,
  `nbachiller` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `sexo` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nsexo` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `mes_n` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `dia_n` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ao_n` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fechanaci` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `edad` int(20) DEFAULT NULL,
  `fac_ia` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `esc_ia` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `car_ia` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fac_iia` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `esc_iia` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `car_iia` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fac_iiia` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `esc_iiia` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `car_iiia` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ao_grad` int(20) DEFAULT NULL,
  `provi` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `distri` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `correg` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tel_cel` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tel_ofi` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `sede_i` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `area_i` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ao_lect` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cod_prov` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nprovincia` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `matricula` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `safaesca` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nacionalid` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `trabaja` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ocupacion` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `est_civil` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ecrop` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `pviu` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `aopviu` int(10) DEFAULT NULL,
  `ocup_p` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ocup_m` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `grado_p` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `esc_p` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `grado_m` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `esc_m` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cfe` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ecps` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `imf` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `npers` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `mtrasp` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `thijos` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `chijos` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `discap` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `rpadre` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `rmadre` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `rhnos` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `pgind` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `rend_esc` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tipo_est` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `arch_i` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `observacion` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fn` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ncarrera` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `d` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `no2` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;



--
-- Estructura de tabla para la tabla `resultados2018`
--

CREATE TABLE `resultados2018` (
  `red` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `red2` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `region` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `extranjero` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `sede` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nsede` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `facultad` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nfacultad` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `escuela` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `carrera` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellido` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cedula` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cedulatxt` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `provincia` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `clave` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tomo` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `folio` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `n_ins` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `areap` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nota` int(25) DEFAULT NULL,
  `ps` float(25,0) DEFAULT NULL,
  `gatb` float(25,0) DEFAULT NULL,
  `pca` int(25) DEFAULT NULL,
  `pcg` int(25) DEFAULT NULL,
  `ingles` int(25) DEFAULT NULL,
  `indice` float(25,0) DEFAULT NULL,
  `indicear` float(25,0) DEFAULT NULL,
  `indiceci` float(25,0) DEFAULT NULL,
  `indiceem` float(25,0) DEFAULT NULL,
  `indicehu` float(25,0) DEFAULT NULL,
  `indicein` float(25,0) DEFAULT NULL,
  `indicepe` float(25,0) DEFAULT NULL,
  `indicepo` float(25,0) DEFAULT NULL,
  `indicede` float(25,0) DEFAULT NULL,
  `indicead` float(25,0) DEFAULT NULL,
  `fecpca` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cl_def` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cl_propb` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `lect1` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `r_com_comp` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `rel_o` int(25) DEFAULT NULL,
  `lect2` int(25) DEFAULT NULL,
  `r_plan` int(25) DEFAULT NULL,
  `verbal` int(25) DEFAULT NULL,
  `oper1` int(25) DEFAULT NULL,
  `oper2` int(25) DEFAULT NULL,
  `razon1` int(25) DEFAULT NULL,
  `razon2` int(25) DEFAULT NULL,
  `numer` int(25) DEFAULT NULL,
  `area1` int(25) DEFAULT NULL,
  `area2` int(25) DEFAULT NULL,
  `area3` int(25) DEFAULT NULL,
  `area4` int(25) DEFAULT NULL,
  `area5` int(25) DEFAULT NULL,
  `area6` int(25) DEFAULT NULL,
  `gram1` int(25) DEFAULT NULL,
  `vocab` int(25) DEFAULT NULL,
  `gram2` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `narchi` int(25) DEFAULT NULL,
  `opc` int(25) DEFAULT NULL,
  `npag` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecpcg` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `indice00` float(25,0) DEFAULT NULL,
  `indice25` float(25,0) DEFAULT NULL,
  `indice50` float(25,0) DEFAULT NULL,
  `indice75` float(25,0) DEFAULT NULL,
  `registro` int(25) DEFAULT NULL,
  `car1` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `areap1` int(25) DEFAULT NULL,
  `car2` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `areap2` int(25) DEFAULT NULL,
  `car3` int(25) DEFAULT NULL,
  `areap3` int(25) DEFAULT NULL,
  `col_proc` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cod_col` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tipoc` int(25) DEFAULT NULL,
  `ntipoc` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `bach` int(25) DEFAULT NULL,
  `bachiller` int(25) DEFAULT NULL,
  `nbachiller` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `sexo` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nsexo` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `mes_n` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `dia_n` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ao_n` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fechanaci` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `edad` int(20) DEFAULT NULL,
  `fac_ia` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `esc_ia` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `car_ia` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fac_iia` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `esc_iia` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `car_iia` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fac_iiia` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `esc_iiia` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `car_iiia` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ao_grad` int(20) DEFAULT NULL,
  `provi` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `distri` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `correg` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tel_cel` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tel_ofi` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `sede_i` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `area_i` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ao_lect` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cod_prov` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nprovincia` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `matricula` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `safaesca` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nacionalid` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `trabaja` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ocupacion` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `est_civil` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ecrop` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `pviu` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `aopviu` int(10) DEFAULT NULL,
  `ocup_p` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ocup_m` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `grado_p` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `esc_p` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `grado_m` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `esc_m` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cfe` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ecps` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `imf` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `npers` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `mtrasp` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `thijos` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `chijos` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `discap` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `rpadre` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `rmadre` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `rhnos` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `pgind` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `rend_esc` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tipo_est` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `arch_i` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `observacion` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fn` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ncarrera` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `d` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `no2` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `resultados2018`
--

INSERT INTO `resultados2018` (`red`, `red2`, `region`, `extranjero`, `sede`, `nsede`, `facultad`, `nfacultad`, `escuela`, `carrera`, `apellido`, `nombre`, `cedula`, `cedulatxt`, `provincia`, `clave`, `tomo`, `folio`, `n_ins`, `areap`, `nota`, `ps`, `gatb`, `pca`, `pcg`, `ingles`, `indice`, `indicear`, `indiceci`, `indiceem`, `indicehu`, `indicein`, `indicepe`, `indicepo`, `indicede`, `indicead`, `fecpca`, `cl_def`, `cl_propb`, `lect1`, `r_com_comp`, `rel_o`, `lect2`, `r_plan`, `verbal`, `oper1`, `oper2`, `razon1`, `razon2`, `numer`, `area1`, `area2`, `area3`, `area4`, `area5`, `area6`, `gram1`, `vocab`, `gram2`, `narchi`, `opc`, `npag`, `fecpcg`, `indice00`, `indice25`, `indice50`, `indice75`, `registro`, `car1`, `areap1`, `car2`, `areap2`, `car3`, `areap3`, `col_proc`, `cod_col`, `tipoc`, `ntipoc`, `bach`, `bachiller`, `nbachiller`, `sexo`, `nsexo`, `mes_n`, `dia_n`, `ao_n`, `fechanaci`, `edad`, `fac_ia`, `esc_ia`, `car_ia`, `fac_iia`, `esc_iia`, `car_iia`, `fac_iiia`, `esc_iiia`, `car_iiia`, `ao_grad`, `provi`, `distri`, `correg`, `telefono`, `tel_cel`, `tel_ofi`, `mail`, `sede_i`, `area_i`, `ao_lect`, `cod_prov`, `nprovincia`, `matricula`, `safaesca`, `nacionalid`, `trabaja`, `ocupacion`, `est_civil`, `ecrop`, `pviu`, `aopviu`, `ocup_p`, `ocup_m`, `grado_p`, `esc_p`, `grado_m`, `esc_m`, `cfe`, `ecps`, `imf`, `npers`, `mtrasp`, `thijos`, `chijos`, `discap`, `rpadre`, `rmadre`, `rhnos`, `pgind`, `rend_esc`, `tipo_est`, `arch_i`, `observacion`, `fn`, `ncarrera`, `d`, `no2`) VALUES
('A1', '', '', '', '05', 'COLON', '01', 'ADMON. PUBLICA', '01', '03', 'MEDINA', 'JESUS', '   3073801678', '', '03', '00', '0738', '01678', 'V00001', '2', NULL, 3, 0, 34, 0, 0, 1, 0, 0, 1, 1, 1, 1, 0, 0, 1, 'NOV1916', '2', '6', '2', '3', 0, 1, 4, 18, 4, 4, 3, 5, 16, 0, 0, 0, 0, 0, 0, 0, 0, '0', 1, 0, '0000014', 'NOV1916', 1, 1, 1, 1, 14, '', 0, '', 0, NULL, 0, 'INST RUFO A GARAY', 'IO', 10, 'OFICIAL', 2, 2, 'CIENCIAS', 'M', 'MASCULINO', 'FEB', '03', '97', '', 0, '01', '01', '03', '', '', '', '', '', '', 2015, 'COLON', 'COLON', 'CRISTOBAL', '000-0000', '6232-0764', '', 'el-boy-dorado01@hotmail.com', '05', '2', '2017', '03', 'COLON', '', NULL, 'paname�a', 'S', 'AYUDANTE GEN', '1', 'N', 'S', 2017, 'ADMINISTRADO', 'ADMINISTRADO', '0', '4', '0', '5', '1', '3', '8', '', '1', 'N', ' 0', '', '1', '1', '1', '8', 'C', '', '', NULL, '', 'LIC. EN ADMINISTRACION PUBLICA ADUANERA', '', ''),
('A1', '', '', '', '01', 'CAMPUS', '08', 'MEDICINA', '01', '01', 'BERNAL', 'NAJAH', '  09075301935', '', '09', '00', '0753', '01935', 'V00002', '4', NULL, 4, 0, 34, 22, 0, 1, 0, 1, 1, 1, 1, 1, 0, 0, 1, 'NOV1915', '3', '3', '3', '6', 4, 3, 2, 24, 3, 4, 3, 0, 10, 5, 4, 4, 9, 0, 0, 0, 0, '0', 0, 1, '0000009', 'DEC41?6', 1, 1, 1, 1, 9, '', 0, '', 0, NULL, 0, 'INST COMP Y LABORAL DE VERAGUAS', 'GM', 20, 'PRIVADO', 2, 2, 'CIENCIAS', 'M', 'MASCULINO', 'NOV', '04', '98', '', 0, '08', '01', '01', '09', '01', '04', '14', '01', '01', 2016, 'VERAGUAS', 'SANTIAGO', 'SANTIAGO (CABEC.)', '958-8649', '6914-8887', '', 'rhandall98@hotmail.com', '01', '4', '2017', '09', 'VERAGUAS', '', NULL, 'paname�a', 'N', 'DESEMPLEADO', '1', 'N', 'S', 2017, 'EMPRESARIO I', 'CONTADOR P�B', '0', '3', '0', '5', '1', '5', '13', '', '1', 'N', ' 0', '', '1', '1', '1', '8', 'B', '', '', NULL, '', 'DOCTOR EN MEDICINA', '', ''),
('A1', '', '', '', '01', 'CAMPUS', '27', 'PSICOLOGIA', '01', '01', 'QUINN', 'SHAHANA', '  08093901595', '', '08', '00', '0939', '01595', 'V00003', '4', NULL, 3, 0, 29, 20, 0, 1, 0, 1, 1, 1, 1, 1, 0, 0, 1, 'AUG0216', '3', '3', '2', '3', 5, 3, 2, 21, 4, 3, 1, 0, 8, 8, 4, 5, 3, 0, 0, 0, 0, '0', 7, 0, '0000003', '', 1, 1, 1, 1, 3, '', 0, '', 0, NULL, 0, 'COL ELENA CHAVEZ DE PINATE', 'BN', 10, 'OFICIAL', 2, 2, 'CIENCIAS', 'F', 'FEMENINO', 'JAN', '07', '99', '', 0, '27', '01', '01', '08', '02', '02', '14', '01', '01', 2016, 'PANAMA', 'PANAMA', 'SAN FELIPE', '266-5046', '6458-5424', '', 'shahanitalove07@gmail.com', '01', '4', '2017', '08', 'PANAMA', '', NULL, 'paname�a', 'N', 'DESEMPLEADO', '1', 'N', 'S', 2017, '09', 'COTIZADORA', '0', '5', '0', '5', '1', '2', '12', '', '2', 'N', ' 0', '', '3', '1', '1', '8', 'C', '', '', NULL, '', 'LIC. EN PSICOLOGIA', '', ''),
('A1', '', '', '', '01', 'CAMPUS', '24', 'INFORMATICA', '01', '02', 'VALENCIA', 'ARNULFO', '   8092100641', '', '08', '00', '0921', '00641', 'V00004', '8', NULL, 4, 0, 34, 0, 0, 1, 0, 0, 1, 1, 1, 1, 0, 0, 1, 'NOV1916', '4', '3', '3', '4', 2, 3, 3, 22, 3, 2, 3, 4, 12, 0, 0, 0, 0, 0, 0, 0, 0, '0', 1, 0, '0000031', '', 1, 1, 1, 1, 27, '', 0, '', 0, NULL, 0, 'CENTRO EDUCATIVO MONSENOR FRANCISCO BECKMAN', 'RT', 10, 'OFICIAL', 9, 9, 'COMERCIO', 'M', 'MASCULINO', 'JUL', '08', '97', '', 0, '24', '01', '02', '12', '04', '01', '06', '06', '01', 2015, 'PANAMA', 'PANAMA', 'EL CHORRILLO', '268-4593', '6653-0265', '', 'arnulfovalencia08@gmail.com', '01', '4', '2017', '08', 'PANAMA', '', NULL, 'paname�a', 'N', 'DESEMPLEADO', '1', 'N', 'S', 2017, 'PESCADOR', 'AMA DE CASA', '0', '4', '0', '2', '2', '2', '2', '', '1', 'N', ' 0', '', '1', '1', '1', '8', 'C', '', '', NULL, '', 'LIC. EN INGENIERIA COMERCIO ELECTRONICO', '', ''),
('A1', '', '', '', '01', 'CAMPUS', '24', 'INFORMATICA', '02', '03', 'ESCOBAR', 'CARLOS', '   8093400988', '', '08', '00', '0934', '00988', 'V00005', '8', NULL, 3, 75, 30, 0, 0, 1, 1, 0, 1, 1, 1, 1, 0, 0, 1, 'NOV1916', '3', '1', '2', '3', 5, 3, 4, 21, 2, 3, 3, 1, 9, 0, 0, 0, 0, 0, 0, 0, 0, '0', 1, 0, '0000021', '', 1, 1, 1, 1, 17, '', 0, '', 0, NULL, 0, 'ESC LATINOAMERICANA', 'ER', 20, 'PRIVADO', 9, 9, 'COMERCIO', 'M', 'MASCULINO', 'FEB', '08', '98', '', 0, '24', '02', '03', '24', '01', '02', '03', '01', '06', 2015, 'PANAMA', 'PANAMA', 'SAN FRANCISCO', '221-7940', '6677-9019', '', 'calito0898@gmail.com', '01', '4', '2017', '08', 'PANAMA', '', NULL, 'paname�a', 'N', 'DESEMPLEADO', '1', 'N', 'S', 2017, 'CONTADOR', 'ASISTENTE DE', '0', '3', '0', '3', '2', '5', '9', '', '1', 'N', ' 0', '', '1', '1', '1', '8', 'B', '', '', NULL, '', 'LIC. INF APLICADA A LA ENS IMP TECNOLOGIA', '', ''),
('A1', '', '', '', '05', 'COLON', '11', 'ADMON. DE EMPRESAS', '02', '14', 'PANG', 'YARITZA', '   3072500572', '', '03', '00', '0725', '00572', 'V00006', '1', NULL, 4, 0, 26, 0, 0, 1, 0, 0, 1, 1, 1, 1, 0, 0, 1, 'NOV1916', '5', '4', '1', '2', 3, 2, 1, 18, 1, 1, 5, 1, 8, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 0, '0000008', '', 1, 1, 1, 1, 8, '', 0, '', 0, NULL, 0, 'COL JOSE GUARDIA VEGA', 'CG', 10, 'OFICIAL', 9, 9, 'COMERCIO', 'F', 'FEMENINO', 'JUL', '18', '90', '', 0, '11', '02', '14', '', '', '', '', '', '', 2007, 'COLON', 'COLON', 'CRISTOBAL', '474-0141', '6157-1292', '', 'yaripang18@hotmail.com', '05', '1', '2017', '03', 'COLON', '', NULL, 'paname�a', 'S', 'VENDEDOR', '5', 'S', 'S', 2017, 'TAXISTA', 'GERENTE', '0', '3', '0', '3', '2', '2', '11', '', '3', 'S', ' 2', '', '1', '1', '1', '8', 'C', '', '', NULL, '', 'ING. OPERACIONES Y LOGISTICAS EMPRESARIALES', '', ''),
('A1', '', '', '', '01', 'CAMPUS', '12', 'COM. SOCIAL', '04', '01', 'PEREZ', 'ALEXIS', '   8092601426', '', '08', '00', '0926', '01426', 'V00007', '5', NULL, 3, 0, 23, 0, 0, 1, 0, 0, 1, 1, 1, 1, 0, 0, 1, '   1916', '2', '4', '1', '2', 2, 3, 2, 16, 2, 1, 1, 3, 7, 0, 0, 0, 0, 0, 0, 0, 0, '0', 1, 0, '0000018', '', 1, 1, 1, 1, 18, '', 0, '', 0, NULL, 0, 'CENTRO EDUCATIVO MONSENOR FRANCISCO BECKMAN', 'RT', 10, 'OFICIAL', 9, 9, 'COMERCIO', 'M', 'MASCULINO', 'DEC', '09', '97', '', 0, '12', '04', '01', '12', '08', '01', '12', '02', '01', 2015, 'PANAMA', 'PANAMA', 'SAN FELIPE', '268-9672', '6524-8608', '', 'papu0997@hotmail.com', '01', '5', '2017', '08', 'PANAMA', '', NULL, 'paname�a', 'N', 'DESEMPLEADO', '1', 'N', 'S', 2017, 'TRANSPORTIST', 'VENDEDOR DE', '0', '4', '0', '3', '3', '3', '2', '', '2', 'N', ' 0', '', '2', '1', '1', '8', 'C', '', '', NULL, '', 'LIC. EN PUBLICIDAD', '', ''),
('A1', '', '', '', '01', 'CAMPUS', '08', 'MEDICINA', '01', '01', 'PA ?UAL       M', 'A RICHELL', '  02074200205', '', '02', '00', '0742', '00205', 'V00008', '4', NULL, 4, 0, 51, 35, 0, 1, 0, 1, 2, 2, 2, 2, 0, 0, 2, 'NOV1916', '4', '4', '4', '7', 6, 1, 5, 31, 2, 4, 7, 7, 20, 11, 5, 11, 8, 0, 0, 0, 0, '0', 0, 0, '0000020', '', 1, 1, 1, 1, 20, '', 0, '', 0, NULL, 0, 'COL CARMEN CONTE LOMBARDO', 'PG', 10, 'OFICIAL', 2, 2, 'CIENCIAS', 'F', 'FEMENINO', 'AUG', '29', '98', '', 0, '08', '01', '01', '32', '04', '03', '09', '01', '06', 2016, 'COCLE', 'PENONOME', 'PAJONAL', '000-0000', '6757-7877', '', 'clarymari09@hotmail.com', '01', '4', '2017', '02', 'COCLE', '', NULL, 'paname�a', 'N', 'DESEMPLEADO', '2', 'S', 'S', 2017, 'ADMINISTRADO', 'ENFERMERIA', '0', '7', '0', '5', '1', '5', '13', '', '1', 'N', ' 0', '', '1', '1', '0', '8', 'B', '', '', NULL, '', 'DOCTOR EN MEDICINA', '', ''),
('A1', '', '', '', '01', 'CAMPUS', '27', 'PSICOLOGIA', '01', '01', 'RIOS', 'EYLEEN', '  08094900873', '', '08', '00', '0949', '00873', 'V00009', '4', NULL, 4, 0, 53, 29, 0, 1, 0, 1, 1, 1, 1, 1, 0, 0, 1, 'AUG0216', '6', '4', '3', '7', 6, 3, 5, 34, 7, 4, 3, 5, 19, 4, 5, 16, 4, 0, 0, 0, 0, '0', 1, 1, '0000021', 'DEC0316', 1, 1, 1, 1, 21, '', 0, '', 0, NULL, 0, 'PANAMA HEIGHT INTERNATIONAL ACADEMY', 'VD', 20, 'PRIVADO', 2, 2, 'CIENCIAS', 'F', 'FEMENINO', 'JUL', '12', '99', '', 0, '27', '01', '01', '07', '01', '01', '18', '03', '02', 2016, 'PANAMA', 'ARRAIJAN', 'ARRAIJAN (CABECERA', '000-0000', '6058-0645', '000-0000', 'eyleen1910@hotmail.com', '01', '4', '2017', '08', 'PANAMA', '', NULL, 'paname�a', 'N', 'DESEMPLEADO', '1', 'N', 'S', 2017, 'CHAPISTERO', 'MAESTRO', '0', '3', '0', '5', '1', '3', '6', '', '1', 'N', ' 0', '', '1', '1', '1', '8', 'C', '', '', NULL, '', 'LIC. EN PSICOLOGIA', '', ''),
('A1', '', '', '', '08', 'BOCAS DEL TORO', '17', 'ENFERMERIA', '01', '02', 'SMITH', 'ELVIA', '   1074401562', '', '01', '00', '0744', '01562', 'V00010', '4', NULL, 4, 0, 45, 23, 0, 1, 0, 1, 1, 1, 1, 1, 0, 0, 1, 'DEC0616', '4', '3', '2', '6', 8, 1, 5, 29, 4, 4, 4, 4, 16, 7, 5, 4, 7, 0, 0, 0, 0, '0', 1, 1, '0000150', 'DEC0706', 1, 1, 1, 1, 149, '', 0, '', 0, NULL, 0, 'COL BASICO GENERAL DE GUABITO', 'BA', 10, 'OFICIAL', 2, 2, 'CIENCIAS', 'F', 'FEMENINO', 'OCT', '04', '98', '', 0, '17', '01', '02', '', '', '', '', '', '', 2016, 'BOCAS DEL TO', 'CHANGUINOLA', 'CHANGUINOLA (CABEC', '000-0000', '6912-0248', '', '', '08', '4', '2017', '01', 'BOCAS DEL TORO', '', NULL, 'paname�a', 'N', 'DESEMPLEADO', '1', 'N', 'S', NULL, 'GERENTE', 'AMA DE CASA', '0', '2', '0', '3', '1', '3', '4', '', '1', 'N', ' 0', '', '1', '1', '0', '8', 'A', '', '', NULL, '', 'LIC. EN ENFERMERIA', '', ''),
('A1', '', '', '', '01', 'CAMPUS', '04', 'C. NATURALES', '06', '02', 'PINZON', 'JAMETH', '   80 3 02', '', '08', '00', '0931', '02108', 'V00011', '4', NULL, 4, 0, 34, 23, 0, 1, 0, 1, 1, 1, 1, 1, 0, 0, 1, 'AUG0216', '5', '4', '2', '7', 5, 0, 4, 27, 7, 0, 0, 0, 7, 8, 4, 7, 4, 0, 0, 0, 0, '0', 3, 1, '0000010', 'DEC4 16', 1, 1, 1, 1, 10, '', 0, '', 0, NULL, 0, 'CENTRO EDUCATIVO MONSENOR FRANCISCO BECKMAN', 'RT', 10, 'OFICIAL', 2, 2, 'CIENCIAS', 'M', 'MASCULINO', 'MAY', '17', '98', '', 0, '04', '06', '02', '04', '06', '04', '', '', '', 2016, 'PANAMA', 'PANAMA', 'SAN FELIPE', '268-4090', '6912-2307', '', 'yairpinzon2016@gmail.com', '01', '4', '2017', '08', 'PANAMA', '', NULL, 'paname�a', 'N', 'DESEMPLEADO', '1', 'N', 'S', 2017, 'SOLDADOR', 'AMA DE CASA', '0', '3', '0', '4', '1', '1', '2', '', '1', 'N', ' 0', '', '2', '1', '1', '8', 'B', '', '', NULL, '', 'LIC. EN MATEMATICA', '', ''),
('A1', '', '', '', '03', 'AZUERO', '05', 'DERECHO', '01', '01', 'RODRIGUEZ', 'ABDIEL', '  06072200451', '', '06', '00', '0722', '00451', 'V00012', '7', NULL, 4, 0, 42, 61, 0, 1, 0, 0, 1, 1, 1, 1, 0, 1, 1, 'NOV1916', '7', '6', '1', '7', 5, 2, 3, 31, 5, 1, 3, 2, 11, 13, 9, 17, 11, 11, 0, 0, 0, '0', 0, 0, '0000008', '', 1, 1, 1, 1, 8, '', 0, '', 0, NULL, 0, 'COL JOSE DANIEL CRESPO', 'CD', 10, 'OFICIAL', 14, 14, 'LETRAS', 'M', 'MASCULINO', 'OCT', '30', '98', '', 0, '05', '01', '01', '24', '02', '05', '27', '01', '01', 2016, 'HERRERA', 'CHITRE', 'LA ARENA', '970-1112', '6564-3377', '', 'abdielrg1@gmail.com', '03', '5', '2017', '06', 'HERRERA', '', NULL, 'paname�a', 'N', 'DESEMPLEADO', '1', 'N', 'S', 2017, 'JUBILADOS', 'AMA DE CASA', '0', '3', '0', '3', '1', '3', '3', '', '1', 'N', ' 0', '', '0', '1', '0', '8', 'B', '', '', NULL, '', 'LIC. EN DERECHO Y  CIENCIAS POLITICAS', '', ''),
('A1', '', '', '', '05', 'COLON', '11', 'ADMON. DE EMPRESAS', '02', '09', 'MEDINA', 'ANA', '   8090102181', '', '08', '00', '0901', '02181', 'V00013', '1', NULL, 3, 0, 34, 0, 0, 1, 0, 0, 1, 1, 1, 1, 0, 0, 1, 'NOV1916', '4', '5', '2', '5', 6, 3, 4, 29, 2, 2, 1, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 0, '0000020', '', 1, 1, 1, 1, 20, '', 0, '', 0, NULL, 0, 'INST BENIGNO JIMENEZ GARAY', 'FQ', 10, 'OFICIAL', 9, 9, 'COMERCIO', 'F', 'FEMENINO', 'DEC', '28', '95', '', 0, '11', '02', '09', '', '', '', '', '', '', 2014, 'COLON', 'PORTOBELO', 'MARIA CHIQUITA', '000-0000', '6788-5524', '', 'alizbethhernandez894@gmail.com', '05', '1', '2017', '03', 'COLON', '', NULL, 'paname�a', 'S', 'AYUDANTE GEN', '1', 'N', 'S', 2017, 'GUARDIA DE S', 'AMA DE CASA', '0', '4', '0', '2', '1', '2', '2', '', '1', 'N', ' 0', '', '1', '1', '1', '8', 'C', '', '', NULL, '', 'LIC. ADMON. DE EMPRESAS TURISTICAS BILINGUE', '', ''),
('A1', '', '', '', '01', 'CAMPUS', '12', 'COM. SOCIAL', '04', '01', 'PEREZ', 'ALEXIS', '   8092601426', '', '08', '00', '0926', '01426', 'V00014', '5', NULL, 3, 0, 23, 0, 0, 1, 0, 0, 1, 1, 1, 1, 0, 0, 1, '   1916', '2', '4', '1', '2', 2, 3, 2, 16, 2, 1, 1, 3, 7, 0, 0, 0, 0, 0, 0, 0, 0, '0', 1, 0, '0000018', '', 1, 1, 1, 1, 18, '', 0, '', 0, NULL, 0, 'CENTRO EDUCATIVO MONSENOR FRANCISCO BECKMAN', 'RT', 10, 'OFICIAL', 9, 9, 'COMERCIO', 'M', 'MASCULINO', 'DEC', '09', '97', '', 0, '12', '04', '01', '12', '08', '01', '12', '02', '01', 2015, 'PANAMA', 'PANAMA', 'SAN FELIPE', '268-9672', '6524-8608', '', 'papu0997@hotmail.com', '01', '5', '2017', '08', 'PANAMA', '', NULL, 'paname�a', 'N', 'DESEMPLEADO', '1', 'N', 'S', 2017, 'TRANSPORTIST', 'VENDEDOR DE', '0', '4', '0', '3', '3', '3', '2', '', '2', 'N', ' 0', '', '2', '1', '1', '8', 'C', '', '', NULL, '', 'LIC. EN PUBLICIDAD', '', ''),
('A1', '', '', '', '01', 'CAMPUS', '06', 'HUMANIDADES', '06', '01', 'SAMANIEGO', 'LIZBETH', '   3074100184', '', '03', '00', '0741', '00184', 'V00014', '5', NULL, 4, 0, 42, 0, 0, 1, 0, 0, 1, 1, 1, 1, 0, 0, 1, 'NOV1415', '4', '4', '5', '7', 6, 2, 2, 30, 1, 3, 1, 7, 12, 0, 0, 0, 0, 0, 0, 0, 0, '0', 16, 0, '0000047', '', 1, 1, 1, 1, 41, '', 0, '', 0, NULL, 0, 'CENTRO BASICO GENERAL TORTI', 'PF', 10, 'OFICIAL', 2, 2, 'CIENCIAS', 'F', 'FEMENINO', 'DEC', '23', '97', '', 0, '06', '06', '01', '10', '03', '01', '06', '07', '01', 2015, 'PANAMA', 'CHEPO', 'TORTI', '000-0000', '6992-1725', '000-0000', 'lizyclara@gmail.com', '01', '5', '2017', '05', 'DARIEN', '', NULL, 'paname�a', 'N', 'DESEMPLEADO', '1', 'N', 'S', 2016, 'AGRICULTOR', 'ASEADOR', '0', '2', '0', '1', '1', '1', '7', '', '1', 'N', ' 0', '', '1', '1', '1', '8', 'B', '', 'VAL16-17', NULL, '', 'LIC. EN INGLES', '', ''),
('A3', '', '', '', '01', 'CAMPUS', '01', 'ADMON. PUBLICA', '04', '01', 'ATENCIO', 'VIANKA', '   8070901189', '', '08', '00', '0709', '01189', 'V00014', '2', NULL, 4, 0, 41, 0, 0, 1, 0, 0, 2, 1, 1, 1, 0, 0, 1, 'MAR0116', '2', '5', '6', '5', 4, 2, 3, 27, 6, 1, 4, 3, 14, 0, 0, 0, 0, 0, 0, 0, 0, '0', 16, 0, '0000012', '', 1, 1, 1, 1, 12, '', 0, '', 0, NULL, 0, 'COL RICHARD NEUMANN', 'DK', 10, 'OFICIAL', 26, 26, 'CONTABILIDAD', 'F', 'FEMENINO', 'MAY', '31', '77', '', 0, '01', '04', '01', '', '', '', '', '', '', 1994, 'PANAMA', 'PANAMA', 'SAN FELIPE', '231-1343', '6771-9240', '', 'viankaatencio@hotmail.com', '01', '2', '2017', '08', 'PANAMA', '', NULL, 'paname�a', 'N', 'DESEMPLEADO', '2', 'N', 'N', 2016, 'JUBILADOS', 'AMA DE CASA', '0', '1', '0', '4', '3', '1', '13', '', '1', 'S', ' 2', '', '1', '1', '1', '8', 'B', '', 'VAL16-17', NULL, '', 'LIC. EN RELACIONES INTERNACIONALES', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados2019`
--

CREATE TABLE `resultados2019` (
  `red` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `red2` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `region` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `extranjero` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `sede` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nsede` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `facultad` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nfacultad` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `escuela` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `carrera` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellido` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cedula` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cedulatxt` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `provincia` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `clave` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tomo` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `folio` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `n_ins` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `areap` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nota` int(25) DEFAULT NULL,
  `ps` float(25,0) DEFAULT NULL,
  `gatb` float(25,0) DEFAULT NULL,
  `pca` int(25) DEFAULT NULL,
  `pcg` int(25) DEFAULT NULL,
  `ingles` int(25) DEFAULT NULL,
  `indice` float(25,0) DEFAULT NULL,
  `indicear` float(25,0) DEFAULT NULL,
  `indiceci` float(25,0) DEFAULT NULL,
  `indiceem` float(25,0) DEFAULT NULL,
  `indicehu` float(25,0) DEFAULT NULL,
  `indicein` float(25,0) DEFAULT NULL,
  `indicepe` float(25,0) DEFAULT NULL,
  `indicepo` float(25,0) DEFAULT NULL,
  `indicede` float(25,0) DEFAULT NULL,
  `indicead` float(25,0) DEFAULT NULL,
  `fecpca` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cl_def` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cl_propb` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `lect1` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `r_com_comp` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `rel_o` int(25) DEFAULT NULL,
  `lect2` int(25) DEFAULT NULL,
  `r_plan` int(25) DEFAULT NULL,
  `verbal` int(25) DEFAULT NULL,
  `oper1` int(25) DEFAULT NULL,
  `oper2` int(25) DEFAULT NULL,
  `razon1` int(25) DEFAULT NULL,
  `razon2` int(25) DEFAULT NULL,
  `numer` int(25) DEFAULT NULL,
  `area1` int(25) DEFAULT NULL,
  `area2` int(25) DEFAULT NULL,
  `area3` int(25) DEFAULT NULL,
  `area4` int(25) DEFAULT NULL,
  `area5` int(25) DEFAULT NULL,
  `area6` int(25) DEFAULT NULL,
  `gram1` int(25) DEFAULT NULL,
  `vocab` int(25) DEFAULT NULL,
  `gram2` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `narchi` int(25) DEFAULT NULL,
  `opc` int(25) DEFAULT NULL,
  `npag` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecpcg` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `indice00` float(25,0) DEFAULT NULL,
  `indice25` float(25,0) DEFAULT NULL,
  `indice50` float(25,0) DEFAULT NULL,
  `inidce75` float(25,0) DEFAULT NULL,
  `registro` int(25) DEFAULT NULL,
  `car1` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `areap1` int(25) DEFAULT NULL,
  `car2` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `areap2` int(25) DEFAULT NULL,
  `car3` int(25) DEFAULT NULL,
  `areap3` int(25) DEFAULT NULL,
  `col_proc` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cod_col` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tipoc` int(25) DEFAULT NULL,
  `ntipoc` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `bach` int(25) DEFAULT NULL,
  `bachiller` int(25) DEFAULT NULL,
  `nbachiller` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `sexo` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nsexo` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `mes_n` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `dia_n` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ao_n` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fechanaci` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `edad` int(20) DEFAULT NULL,
  `fac_ia` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `esc_ia` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `car_ia` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fac_iia` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `esc_iia` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `car_iia` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fac_iiia` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `esc_iiia` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `car_iiia` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ao_grad` int(20) DEFAULT NULL,
  `provi` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `distri` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `correg` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tel_cel` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tel_ofi` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `sede_i` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `area_i` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ao_lect` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cod_prov` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nprovincia` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `matricula` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `safaesca` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nacionalid` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `trabaja` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ocupacion` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `est_civil` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ecrop` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `pviu` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `aopviu` int(10) DEFAULT NULL,
  `ocup_p` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ocup_m` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `grado_p` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `esc_p` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `grado_m` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `esc_m` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cfe` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ecps` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `imf` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `npers` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `mtrasp` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `thijos` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `chijos` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `discap` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `rpadre` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `rmadre` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `rhnos` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `pgind` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `rend_esc` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tipo_est` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `arch_i` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `observacion` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fn` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ncarrera` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `d` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `no2` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultadostmp`
--

CREATE TABLE `resultadostmp` (
  `red` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `red2` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `region` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `extranjero` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `sede` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nsede` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `facultad` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nfacultad` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `escuela` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `carrera` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellido` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cedula` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cedulatxt` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `provincia` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `clave` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tomo` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `folio` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `n_ins` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `areap` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nota` int(25) DEFAULT NULL,
  `ps` float(25,0) DEFAULT NULL,
  `gatb` float(25,0) DEFAULT NULL,
  `pca` int(25) DEFAULT NULL,
  `pcg` int(25) DEFAULT NULL,
  `ingles` int(25) DEFAULT NULL,
  `indice` float(25,0) DEFAULT NULL,
  `indicear` float(25,0) DEFAULT NULL,
  `indiceci` float(25,0) DEFAULT NULL,
  `indiceem` float(25,0) DEFAULT NULL,
  `indicehu` float(25,0) DEFAULT NULL,
  `indicein` float(25,0) DEFAULT NULL,
  `indicepe` float(25,0) DEFAULT NULL,
  `indicepo` float(25,0) DEFAULT NULL,
  `indicede` float(25,0) DEFAULT NULL,
  `indicead` float(25,0) DEFAULT NULL,
  `fecpca` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cl_def` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cl_propb` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `lect1` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `r_com_comp` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `rel_o` int(25) DEFAULT NULL,
  `lect2` int(25) DEFAULT NULL,
  `r_plan` int(25) DEFAULT NULL,
  `verbal` int(25) DEFAULT NULL,
  `oper1` int(25) DEFAULT NULL,
  `oper2` int(25) DEFAULT NULL,
  `razon1` int(25) DEFAULT NULL,
  `razon2` int(25) DEFAULT NULL,
  `numer` int(25) DEFAULT NULL,
  `area1` int(25) DEFAULT NULL,
  `area2` int(25) DEFAULT NULL,
  `area3` int(25) DEFAULT NULL,
  `area4` int(25) DEFAULT NULL,
  `area5` int(25) DEFAULT NULL,
  `area6` int(25) DEFAULT NULL,
  `gram1` int(25) DEFAULT NULL,
  `vocab` int(25) DEFAULT NULL,
  `gram2` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `narchi` int(25) DEFAULT NULL,
  `opc` int(25) DEFAULT NULL,
  `npag` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecpcg` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `indice00` float(25,0) DEFAULT NULL,
  `indice25` float(25,0) DEFAULT NULL,
  `indice50` float(25,0) DEFAULT NULL,
  `indice75` float(25,0) DEFAULT NULL,
  `registro` int(25) DEFAULT NULL,
  `car1` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `areap1` int(25) DEFAULT NULL,
  `car2` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `areap2` int(25) DEFAULT NULL,
  `car3` int(25) DEFAULT NULL,
  `areap3` int(25) DEFAULT NULL,
  `col_proc` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cod_col` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tipoc` int(25) DEFAULT NULL,
  `ntipoc` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `bach` int(25) DEFAULT NULL,
  `bachiller` int(25) DEFAULT NULL,
  `nbachiller` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `sexo` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nsexo` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `mes_n` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `dia_n` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ao_n` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fechanaci` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `edad` int(20) DEFAULT NULL,
  `fac_ia` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `esc_ia` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `car_ia` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fac_iia` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `esc_iia` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `car_iia` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fac_iiia` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `esc_iiia` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `car_iiia` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ao_grad` int(20) DEFAULT NULL,
  `provi` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `distri` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `correg` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tel_cel` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tel_ofi` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `sede_i` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `area_i` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ao_lect` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cod_prov` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nprovincia` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `matricula` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `safaesca` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nacionalid` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `trabaja` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ocupacion` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `est_civil` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ecrop` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `pviu` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `aopviu` int(10) DEFAULT NULL,
  `ocup_p` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ocup_m` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `grado_p` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `esc_p` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `grado_m` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `esc_m` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cfe` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ecps` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `imf` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `npers` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `mtrasp` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `thijos` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `chijos` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `discap` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `rpadre` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `rmadre` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `rhnos` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `pgind` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `rend_esc` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tipo_est` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `arch_i` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `observacion` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fn` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ncarrera` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `d` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `no2` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `resultadostmp`
--

INSERT INTO `resultadostmp` (`red`, `red2`, `region`, `extranjero`, `sede`, `nsede`, `facultad`, `nfacultad`, `escuela`, `carrera`, `apellido`, `nombre`, `cedula`, `cedulatxt`, `provincia`, `clave`, `tomo`, `folio`, `n_ins`, `areap`, `nota`, `ps`, `gatb`, `pca`, `pcg`, `ingles`, `indice`, `indicear`, `indiceci`, `indiceem`, `indicehu`, `indicein`, `indicepe`, `indicepo`, `indicede`, `indicead`, `fecpca`, `cl_def`, `cl_propb`, `lect1`, `r_com_comp`, `rel_o`, `lect2`, `r_plan`, `verbal`, `oper1`, `oper2`, `razon1`, `razon2`, `numer`, `area1`, `area2`, `area3`, `area4`, `area5`, `area6`, `gram1`, `vocab`, `gram2`, `narchi`, `opc`, `npag`, `fecpcg`, `indice00`, `indice25`, `indice50`, `indice75`, `registro`, `car1`, `areap1`, `car2`, `areap2`, `car3`, `areap3`, `col_proc`, `cod_col`, `tipoc`, `ntipoc`, `bach`, `bachiller`, `nbachiller`, `sexo`, `nsexo`, `mes_n`, `dia_n`, `ao_n`, `fechanaci`, `edad`, `fac_ia`, `esc_ia`, `car_ia`, `fac_iia`, `esc_iia`, `car_iia`, `fac_iiia`, `esc_iiia`, `car_iiia`, `ao_grad`, `provi`, `distri`, `correg`, `telefono`, `tel_cel`, `tel_ofi`, `mail`, `sede_i`, `area_i`, `ao_lect`, `cod_prov`, `nprovincia`, `matricula`, `safaesca`, `nacionalid`, `trabaja`, `ocupacion`, `est_civil`, `ecrop`, `pviu`, `aopviu`, `ocup_p`, `ocup_m`, `grado_p`, `esc_p`, `grado_m`, `esc_m`, `cfe`, `ecps`, `imf`, `npers`, `mtrasp`, `thijos`, `chijos`, `discap`, `rpadre`, `rmadre`, `rhnos`, `pgind`, `rend_esc`, `tipo_est`, `arch_i`, `observacion`, `fn`, `ncarrera`, `d`, `no2`) VALUES
('A1', '', '', '', '05', 'COLON', '01', 'ADMON. PUBLICA', '01', '03', 'MEDINA', 'JESUS', '   3073801678', '', '03', '00', '0738', '01678', 'V00001', '2', NULL, 3, 0, 34, 0, 0, 1, 0, 0, 1, 1, 1, 1, 0, 0, 1, 'NOV1916', '2', '6', '2', '3', 0, 1, 4, 18, 4, 4, 3, 5, 16, 0, 0, 0, 0, 0, 0, 0, 0, '0', 1, 0, '0000014', 'NOV1916', 1, 1, 1, 1, 14, '', 0, '', 0, NULL, 0, 'INST RUFO A GARAY', 'IO', 10, 'OFICIAL', 2, 2, 'CIENCIAS', 'M', 'MASCULINO', 'FEB', '03', '97', '', 0, '01', '01', '03', '', '', '', '', '', '', 2015, 'COLON', 'COLON', 'CRISTOBAL', '000-0000', '6232-0764', '', 'el-boy-dorado01@hotmail.com', '05', '2', '2017', '03', 'COLON', '', NULL, 'paname�a', 'S', 'AYUDANTE GEN', '1', 'N', 'S', 2017, 'ADMINISTRADO', 'ADMINISTRADO', '0', '4', '0', '5', '1', '3', '8', '', '1', 'N', ' 0', '', '1', '1', '1', '8', 'C', '', '', NULL, '', 'LIC. EN ADMINISTRACION PUBLICA ADUANERA', '', ''),
('A1', '', '', '', '01', 'CAMPUS', '08', 'MEDICINA', '01', '01', 'BERNAL', 'NAJAH', '  09075301935', '', '09', '00', '0753', '01935', 'V00002', '4', NULL, 4, 0, 34, 22, 0, 1, 0, 1, 1, 1, 1, 1, 0, 0, 1, 'NOV1915', '3', '3', '3', '6', 4, 3, 2, 24, 3, 4, 3, 0, 10, 5, 4, 4, 9, 0, 0, 0, 0, '0', 0, 1, '0000009', 'DEC41?6', 1, 1, 1, 1, 9, '', 0, '', 0, NULL, 0, 'INST COMP Y LABORAL DE VERAGUAS', 'GM', 20, 'PRIVADO', 2, 2, 'CIENCIAS', 'M', 'MASCULINO', 'NOV', '04', '98', '', 0, '08', '01', '01', '09', '01', '04', '14', '01', '01', 2016, 'VERAGUAS', 'SANTIAGO', 'SANTIAGO (CABEC.)', '958-8649', '6914-8887', '', 'rhandall98@hotmail.com', '01', '4', '2017', '09', 'VERAGUAS', '', NULL, 'paname�a', 'N', 'DESEMPLEADO', '1', 'N', 'S', 2017, 'EMPRESARIO I', 'CONTADOR P�B', '0', '3', '0', '5', '1', '5', '13', '', '1', 'N', ' 0', '', '1', '1', '1', '8', 'B', '', '', NULL, '', 'DOCTOR EN MEDICINA', '', ''),
('A1', '', '', '', '01', 'CAMPUS', '27', 'PSICOLOGIA', '01', '01', 'QUINN', 'SHAHANA', '  08093901595', '', '08', '00', '0939', '01595', 'V00003', '4', NULL, 3, 0, 29, 20, 0, 1, 0, 1, 1, 1, 1, 1, 0, 0, 1, 'AUG0216', '3', '3', '2', '3', 5, 3, 2, 21, 4, 3, 1, 0, 8, 8, 4, 5, 3, 0, 0, 0, 0, '0', 7, 0, '0000003', '', 1, 1, 1, 1, 3, '', 0, '', 0, NULL, 0, 'COL ELENA CHAVEZ DE PINATE', 'BN', 10, 'OFICIAL', 2, 2, 'CIENCIAS', 'F', 'FEMENINO', 'JAN', '07', '99', '', 0, '27', '01', '01', '08', '02', '02', '14', '01', '01', 2016, 'PANAMA', 'PANAMA', 'SAN FELIPE', '266-5046', '6458-5424', '', 'shahanitalove07@gmail.com', '01', '4', '2017', '08', 'PANAMA', '', NULL, 'paname�a', 'N', 'DESEMPLEADO', '1', 'N', 'S', 2017, '09', 'COTIZADORA', '0', '5', '0', '5', '1', '2', '12', '', '2', 'N', ' 0', '', '3', '1', '1', '8', 'C', '', '', NULL, '', 'LIC. EN PSICOLOGIA', '', ''),
('A1', '', '', '', '01', 'CAMPUS', '24', 'INFORMATICA', '01', '02', 'VALENCIA', 'ARNULFO', '   8092100641', '', '08', '00', '0921', '00641', 'V00004', '8', NULL, 4, 0, 34, 0, 0, 1, 0, 0, 1, 1, 1, 1, 0, 0, 1, 'NOV1916', '4', '3', '3', '4', 2, 3, 3, 22, 3, 2, 3, 4, 12, 0, 0, 0, 0, 0, 0, 0, 0, '0', 1, 0, '0000031', '', 1, 1, 1, 1, 27, '', 0, '', 0, NULL, 0, 'CENTRO EDUCATIVO MONSENOR FRANCISCO BECKMAN', 'RT', 10, 'OFICIAL', 9, 9, 'COMERCIO', 'M', 'MASCULINO', 'JUL', '08', '97', '', 0, '24', '01', '02', '12', '04', '01', '06', '06', '01', 2015, 'PANAMA', 'PANAMA', 'EL CHORRILLO', '268-4593', '6653-0265', '', 'arnulfovalencia08@gmail.com', '01', '4', '2017', '08', 'PANAMA', '', NULL, 'paname�a', 'N', 'DESEMPLEADO', '1', 'N', 'S', 2017, 'PESCADOR', 'AMA DE CASA', '0', '4', '0', '2', '2', '2', '2', '', '1', 'N', ' 0', '', '1', '1', '1', '8', 'C', '', '', NULL, '', 'LIC. EN INGENIERIA COMERCIO ELECTRONICO', '', ''),
('A1', '', '', '', '01', 'CAMPUS', '24', 'INFORMATICA', '02', '03', 'ESCOBAR', 'CARLOS', '   8093400988', '', '08', '00', '0934', '00988', 'V00005', '8', NULL, 3, 75, 30, 0, 0, 1, 1, 0, 1, 1, 1, 1, 0, 0, 1, 'NOV1916', '3', '1', '2', '3', 5, 3, 4, 21, 2, 3, 3, 1, 9, 0, 0, 0, 0, 0, 0, 0, 0, '0', 1, 0, '0000021', '', 1, 1, 1, 1, 17, '', 0, '', 0, NULL, 0, 'ESC LATINOAMERICANA', 'ER', 20, 'PRIVADO', 9, 9, 'COMERCIO', 'M', 'MASCULINO', 'FEB', '08', '98', '', 0, '24', '02', '03', '24', '01', '02', '03', '01', '06', 2015, 'PANAMA', 'PANAMA', 'SAN FRANCISCO', '221-7940', '6677-9019', '', 'calito0898@gmail.com', '01', '4', '2017', '08', 'PANAMA', '', NULL, 'paname�a', 'N', 'DESEMPLEADO', '1', 'N', 'S', 2017, 'CONTADOR', 'ASISTENTE DE', '0', '3', '0', '3', '2', '5', '9', '', '1', 'N', ' 0', '', '1', '1', '1', '8', 'B', '', '', NULL, '', 'LIC. INF APLICADA A LA ENS IMP TECNOLOGIA', '', ''),
('A1', '', '', '', '05', 'COLON', '11', 'ADMON. DE EMPRESAS', '02', '14', 'PANG', 'YARITZA', '   3072500572', '', '03', '00', '0725', '00572', 'V00006', '1', NULL, 4, 0, 26, 0, 0, 1, 0, 0, 1, 1, 1, 1, 0, 0, 1, 'NOV1916', '5', '4', '1', '2', 3, 2, 1, 18, 1, 1, 5, 1, 8, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 0, '0000008', '', 1, 1, 1, 1, 8, '', 0, '', 0, NULL, 0, 'COL JOSE GUARDIA VEGA', 'CG', 10, 'OFICIAL', 9, 9, 'COMERCIO', 'F', 'FEMENINO', 'JUL', '18', '90', '', 0, '11', '02', '14', '', '', '', '', '', '', 2007, 'COLON', 'COLON', 'CRISTOBAL', '474-0141', '6157-1292', '', 'yaripang18@hotmail.com', '05', '1', '2017', '03', 'COLON', '', NULL, 'paname�a', 'S', 'VENDEDOR', '5', 'S', 'S', 2017, 'TAXISTA', 'GERENTE', '0', '3', '0', '3', '2', '2', '11', '', '3', 'S', ' 2', '', '1', '1', '1', '8', 'C', '', '', NULL, '', 'ING. OPERACIONES Y LOGISTICAS EMPRESARIALES', '', ''),
('A1', '', '', '', '01', 'CAMPUS', '12', 'COM. SOCIAL', '04', '01', 'PEREZ', 'ALEXIS', '   8092601426', '', '08', '00', '0926', '01426', 'V00014', '5', NULL, 3, 0, 23, 0, 0, 1, 0, 0, 1, 1, 1, 1, 0, 0, 1, '   1916', '2', '4', '1', '2', 2, 3, 2, 16, 2, 1, 1, 3, 7, 0, 0, 0, 0, 0, 0, 0, 0, '0', 1, 0, '0000018', '', 1, 1, 1, 1, 18, '', 0, '', 0, NULL, 0, 'CENTRO EDUCATIVO MONSENOR FRANCISCO BECKMAN', 'RT', 10, 'OFICIAL', 9, 9, 'COMERCIO', 'M', 'MASCULINO', 'DEC', '09', '97', '', 0, '12', '04', '01', '12', '08', '01', '12', '02', '01', 2015, 'PANAMA', 'PANAMA', 'SAN FELIPE', '268-9672', '6524-8608', '', 'papu0997@hotmail.com', '01', '5', '2017', '08', 'PANAMA', '', NULL, 'paname�a', 'N', 'DESEMPLEADO', '1', 'N', 'S', 2017, 'TRANSPORTIST', 'VENDEDOR DE', '0', '4', '0', '3', '3', '3', '2', '', '2', 'N', ' 0', '', '2', '1', '1', '8', 'C', '', '', NULL, '', 'LIC. EN PUBLICIDAD', '', ''),
('A1', '', '', '', '01', 'CAMPUS', '08', 'MEDICINA', '01', '01', 'PA ?UAL       M', 'A RICHELL', '  02074200205', '', '02', '00', '0742', '00205', 'V00008', '4', NULL, 4, 0, 51, 35, 0, 1, 0, 1, 2, 2, 2, 2, 0, 0, 2, 'NOV1916', '4', '4', '4', '7', 6, 1, 5, 31, 2, 4, 7, 7, 20, 11, 5, 11, 8, 0, 0, 0, 0, '0', 0, 0, '0000020', '', 1, 1, 1, 1, 20, '', 0, '', 0, NULL, 0, 'COL CARMEN CONTE LOMBARDO', 'PG', 10, 'OFICIAL', 2, 2, 'CIENCIAS', 'F', 'FEMENINO', 'AUG', '29', '98', '', 0, '08', '01', '01', '32', '04', '03', '09', '01', '06', 2016, 'COCLE', 'PENONOME', 'PAJONAL', '000-0000', '6757-7877', '', 'clarymari09@hotmail.com', '01', '4', '2017', '02', 'COCLE', '', NULL, 'paname�a', 'N', 'DESEMPLEADO', '2', 'S', 'S', 2017, 'ADMINISTRADO', 'ENFERMERIA', '0', '7', '0', '5', '1', '5', '13', '', '1', 'N', ' 0', '', '1', '1', '0', '8', 'B', '', '', NULL, '', 'DOCTOR EN MEDICINA', '', ''),
('A1', '', '', '', '01', 'CAMPUS', '27', 'PSICOLOGIA', '01', '01', 'RIOS', 'EYLEEN', '  08094900873', '', '08', '00', '0949', '00873', 'V00009', '4', NULL, 4, 0, 53, 29, 0, 1, 0, 1, 1, 1, 1, 1, 0, 0, 1, 'AUG0216', '6', '4', '3', '7', 6, 3, 5, 34, 7, 4, 3, 5, 19, 4, 5, 16, 4, 0, 0, 0, 0, '0', 1, 1, '0000021', 'DEC0316', 1, 1, 1, 1, 21, '', 0, '', 0, NULL, 0, 'PANAMA HEIGHT INTERNATIONAL ACADEMY', 'VD', 20, 'PRIVADO', 2, 2, 'CIENCIAS', 'F', 'FEMENINO', 'JUL', '12', '99', '', 0, '27', '01', '01', '07', '01', '01', '18', '03', '02', 2016, 'PANAMA', 'ARRAIJAN', 'ARRAIJAN (CABECERA', '000-0000', '6058-0645', '000-0000', 'eyleen1910@hotmail.com', '01', '4', '2017', '08', 'PANAMA', '', NULL, 'paname�a', 'N', 'DESEMPLEADO', '1', 'N', 'S', 2017, 'CHAPISTERO', 'MAESTRO', '0', '3', '0', '5', '1', '3', '6', '', '1', 'N', ' 0', '', '1', '1', '1', '8', 'C', '', '', NULL, '', 'LIC. EN PSICOLOGIA', '', ''),
('A1', '', '', '', '08', 'BOCAS DEL TORO', '17', 'ENFERMERIA', '01', '02', 'SMITH', 'ELVIA', '   1074401562', '', '01', '00', '0744', '01562', 'V00010', '4', NULL, 4, 0, 45, 23, 0, 1, 0, 1, 1, 1, 1, 1, 0, 0, 1, 'DEC0616', '4', '3', '2', '6', 8, 1, 5, 29, 4, 4, 4, 4, 16, 7, 5, 4, 7, 0, 0, 0, 0, '0', 1, 1, '0000150', 'DEC0706', 1, 1, 1, 1, 149, '', 0, '', 0, NULL, 0, 'COL BASICO GENERAL DE GUABITO', 'BA', 10, 'OFICIAL', 2, 2, 'CIENCIAS', 'F', 'FEMENINO', 'OCT', '04', '98', '', 0, '17', '01', '02', '', '', '', '', '', '', 2016, 'BOCAS DEL TO', 'CHANGUINOLA', 'CHANGUINOLA (CABEC', '000-0000', '6912-0248', '', '', '08', '4', '2017', '01', 'BOCAS DEL TORO', '', NULL, 'paname�a', 'N', 'DESEMPLEADO', '1', 'N', 'S', NULL, 'GERENTE', 'AMA DE CASA', '0', '2', '0', '3', '1', '3', '4', '', '1', 'N', ' 0', '', '1', '1', '0', '8', 'A', '', '', NULL, '', 'LIC. EN ENFERMERIA', '', ''),
('A1', '', '', '', '01', 'CAMPUS', '04', 'C. NATURALES', '06', '02', 'PINZON', 'JAMETH', '   80 3 02', '', '08', '00', '0931', '02108', 'V00011', '4', NULL, 4, 0, 34, 23, 0, 1, 0, 1, 1, 1, 1, 1, 0, 0, 1, 'AUG0216', '5', '4', '2', '7', 5, 0, 4, 27, 7, 0, 0, 0, 7, 8, 4, 7, 4, 0, 0, 0, 0, '0', 3, 1, '0000010', 'DEC4 16', 1, 1, 1, 1, 10, '', 0, '', 0, NULL, 0, 'CENTRO EDUCATIVO MONSENOR FRANCISCO BECKMAN', 'RT', 10, 'OFICIAL', 2, 2, 'CIENCIAS', 'M', 'MASCULINO', 'MAY', '17', '98', '', 0, '04', '06', '02', '04', '06', '04', '', '', '', 2016, 'PANAMA', 'PANAMA', 'SAN FELIPE', '268-4090', '6912-2307', '', 'yairpinzon2016@gmail.com', '01', '4', '2017', '08', 'PANAMA', '', NULL, 'paname�a', 'N', 'DESEMPLEADO', '1', 'N', 'S', 2017, 'SOLDADOR', 'AMA DE CASA', '0', '3', '0', '4', '1', '1', '2', '', '1', 'N', ' 0', '', '2', '1', '1', '8', 'B', '', '', NULL, '', 'LIC. EN MATEMATICA', '', ''),
('A1', '', '', '', '03', 'AZUERO', '05', 'DERECHO', '01', '01', 'RODRIGUEZ', 'ABDIEL', '  06072200451', '', '06', '00', '0722', '00451', 'V00012', '7', NULL, 4, 0, 42, 61, 0, 1, 0, 0, 1, 1, 1, 1, 0, 1, 1, 'NOV1916', '7', '6', '1', '7', 5, 2, 3, 31, 5, 1, 3, 2, 11, 13, 9, 17, 11, 11, 0, 0, 0, '0', 0, 0, '0000008', '', 1, 1, 1, 1, 8, '', 0, '', 0, NULL, 0, 'COL JOSE DANIEL CRESPO', 'CD', 10, 'OFICIAL', 14, 14, 'LETRAS', 'M', 'MASCULINO', 'OCT', '30', '98', '', 0, '05', '01', '01', '24', '02', '05', '27', '01', '01', 2016, 'HERRERA', 'CHITRE', 'LA ARENA', '970-1112', '6564-3377', '', 'abdielrg1@gmail.com', '03', '5', '2017', '06', 'HERRERA', '', NULL, 'paname�a', 'N', 'DESEMPLEADO', '1', 'N', 'S', 2017, 'JUBILADOS', 'AMA DE CASA', '0', '3', '0', '3', '1', '3', '3', '', '1', 'N', ' 0', '', '0', '1', '0', '8', 'B', '', '', NULL, '', 'LIC. EN DERECHO Y  CIENCIAS POLITICAS', '', ''),
('A1', '', '', '', '05', 'COLON', '11', 'ADMON. DE EMPRESAS', '02', '09', 'MEDINA', 'ANA', '   8090102181', '', '08', '00', '0901', '02181', 'V00013', '1', NULL, 3, 0, 34, 0, 0, 1, 0, 0, 1, 1, 1, 1, 0, 0, 1, 'NOV1916', '4', '5', '2', '5', 6, 3, 4, 29, 2, 2, 1, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 0, '0000020', '', 1, 1, 1, 1, 20, '', 0, '', 0, NULL, 0, 'INST BENIGNO JIMENEZ GARAY', 'FQ', 10, 'OFICIAL', 9, 9, 'COMERCIO', 'F', 'FEMENINO', 'DEC', '28', '95', '', 0, '11', '02', '09', '', '', '', '', '', '', 2014, 'COLON', 'PORTOBELO', 'MARIA CHIQUITA', '000-0000', '6788-5524', '', 'alizbethhernandez894@gmail.com', '05', '1', '2017', '03', 'COLON', '', NULL, 'paname�a', 'S', 'AYUDANTE GEN', '1', 'N', 'S', 2017, 'GUARDIA DE S', 'AMA DE CASA', '0', '4', '0', '2', '1', '2', '2', '', '1', 'N', ' 0', '', '1', '1', '1', '8', 'C', '', '', NULL, '', 'LIC. ADMON. DE EMPRESAS TURISTICAS BILINGUE', '', ''),
('A1', '', '', '', '01', 'CAMPUS', '06', 'HUMANIDADES', '06', '01', 'SAMANIEGO', 'LIZBETH', '   3074100184', '', '03', '00', '0741', '00184', 'V00014', '5', NULL, 4, 0, 42, 0, 0, 1, 0, 0, 1, 1, 1, 1, 0, 0, 1, 'NOV1415', '4', '4', '5', '7', 6, 2, 2, 30, 1, 3, 1, 7, 12, 0, 0, 0, 0, 0, 0, 0, 0, '0', 16, 0, '0000047', '', 1, 1, 1, 1, 41, '', 0, '', 0, NULL, 0, 'CENTRO BASICO GENERAL TORTI', 'PF', 10, 'OFICIAL', 2, 2, 'CIENCIAS', 'F', 'FEMENINO', 'DEC', '23', '97', '', 0, '06', '06', '01', '10', '03', '01', '06', '07', '01', 2015, 'PANAMA', 'CHEPO', 'TORTI', '000-0000', '6992-1725', '000-0000', 'lizyclara@gmail.com', '01', '5', '2017', '05', 'DARIEN', '', NULL, 'paname�a', 'N', 'DESEMPLEADO', '1', 'N', 'S', 2016, 'AGRICULTOR', 'ASEADOR', '0', '2', '0', '1', '1', '1', '7', '', '1', 'N', ' 0', '', '1', '1', '1', '8', 'B', '', 'VAL16-17', NULL, '', 'LIC. EN INGLES', '', ''),
('A3', '', '', '', '01', 'CAMPUS', '01', 'ADMON. PUBLICA', '04', '01', 'ATENCIO', 'VIANKA', '   8070901189', '', '08', '00', '0709', '01189', 'V00014', '2', NULL, 4, 0, 41, 0, 0, 1, 0, 0, 2, 1, 1, 1, 0, 0, 1, 'MAR0116', '2', '5', '6', '5', 4, 2, 3, 27, 6, 1, 4, 3, 14, 0, 0, 0, 0, 0, 0, 0, 0, '0', 16, 0, '0000012', '', 1, 1, 1, 1, 12, '', 0, '', 0, NULL, 0, 'COL RICHARD NEUMANN', 'DK', 10, 'OFICIAL', 26, 26, 'CONTABILIDAD', 'F', 'FEMENINO', 'MAY', '31', '77', '', 0, '01', '04', '01', '', '', '', '', '', '', 1994, 'PANAMA', 'PANAMA', 'SAN FELIPE', '231-1343', '6771-9240', '', 'viankaatencio@hotmail.com', '01', '2', '2017', '08', 'PANAMA', '', NULL, 'paname�a', 'N', 'DESEMPLEADO', '2', 'N', 'N', 2016, 'JUBILADOS', 'AMA DE CASA', '0', '1', '0', '4', '3', '1', '13', '', '1', 'S', ' 2', '', '1', '1', '1', '8', 'B', '', 'VAL16-17', NULL, '', 'LIC. EN RELACIONES INTERNACIONALES', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede-area`
--

CREATE TABLE `sede-area` (
  `id_sede_area` int(11) NOT NULL,
  `id_sede` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_facultad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `sede-area`
--

INSERT INTO `sede-area` (`id_sede_area`, `id_sede`, `id_area`, `id_facultad`) VALUES
(1, 1, 1, 11),
(2, 1, 2, 1),
(3, 1, 2, 10),
(4, 1, 3, 3),
(5, 1, 4, 2),
(6, 1, 4, 4),
(7, 1, 4, 7),
(8, 1, 4, 8),
(9, 1, 4, 14),
(10, 1, 4, 15),
(11, 1, 4, 18),
(12, 1, 4, 19),
(13, 1, 5, 6),
(14, 1, 5, 12),
(15, 1, 5, 13),
(16, 1, 5, 16),
(17, 1, 6, 20),
(18, 1, 7, 5),
(19, 1, 8, 17),
(20, 1, 9, 21),
(21, 2, 4, 2),
(22, 3, 1, 11),
(23, 3, 2, 10),
(24, 3, 2, 1),
(25, 3, 3, 3),
(26, 3, 4, 2),
(27, 3, 4, 4),
(28, 3, 4, 8),
(29, 3, 4, 18),
(30, 3, 5, 12),
(31, 3, 5, 13),
(32, 3, 5, 6),
(33, 3, 7, 5),
(34, 3, 8, 17),
(35, 4, 1, 11),
(36, 4, 2, 10),
(37, 4, 2, 1),
(38, 4, 3, 3),
(39, 4, 4, 2),
(40, 4, 4, 4),
(41, 4, 4, 14),
(42, 4, 4, 15),
(43, 4, 4, 18),
(44, 4, 5, 6),
(45, 4, 5, 12),
(46, 4, 5, 13),
(47, 4, 5, 16),
(48, 4, 7, 5),
(49, 5, 8, 17),
(50, 5, 9, 21),
(51, 5, 1, 11),
(52, 5, 2, 1),
(53, 5, 2, 10),
(54, 5, 3, 3),
(55, 5, 4, 14),
(56, 5, 4, 18),
(57, 5, 4, 4),
(58, 5, 4, 15),
(59, 5, 5, 6),
(60, 5, 5, 13),
(61, 5, 5, 16),
(62, 5, 7, 5),
(63, 5, 8, 17),
(64, 6, 1, 11),
(65, 6, 2, 1),
(66, 6, 2, 10),
(67, 6, 4, 4),
(68, 6, 4, 15),
(69, 6, 5, 6),
(70, 6, 5, 13),
(71, 6, 5, 16),
(72, 6, 7, 5),
(73, 6, 8, 17),
(74, 6, 9, 21),
(75, 7, 1, 11),
(76, 7, 2, 10),
(77, 7, 3, 3),
(78, 7, 4, 2),
(79, 7, 4, 4),
(80, 7, 5, 6),
(81, 7, 5, 13),
(82, 7, 5, 16),
(83, 7, 7, 5),
(84, 7, 8, 17),
(85, 7, 9, 21),
(86, 8, 1, 11),
(87, 8, 2, 1),
(88, 8, 2, 10),
(89, 8, 4, 2),
(90, 8, 4, 4),
(91, 8, 4, 15),
(92, 8, 5, 6),
(93, 8, 5, 13),
(94, 8, 7, 5),
(95, 8, 8, 17),
(96, 8, 9, 21),
(97, 9, 1, 11),
(98, 9, 2, 1),
(99, 9, 2, 10),
(100, 9, 3, 3),
(101, 9, 4, 4),
(102, 9, 4, 15),
(103, 9, 5, 6),
(104, 9, 5, 12),
(105, 9, 5, 13),
(106, 9, 7, 5),
(107, 9, 8, 17),
(108, 10, 1, 11),
(109, 10, 2, 1),
(110, 10, 2, 10),
(111, 10, 3, 3),
(112, 10, 4, 4),
(113, 10, 5, 6),
(114, 10, 5, 12),
(115, 10, 5, 13),
(116, 10, 7, 5),
(117, 10, 8, 17),
(118, 11, 1, 11),
(119, 11, 2, 1),
(120, 11, 3, 3),
(121, 11, 4, 2),
(122, 11, 4, 4),
(123, 11, 4, 15),
(124, 11, 5, 6),
(125, 11, 5, 13),
(126, 11, 7, 5),
(127, 12, 1, 11),
(128, 12, 4, 4),
(129, 12, 5, 6),
(130, 12, 5, 13),
(131, 12, 5, 16),
(132, 12, 8, 17),
(133, 13, 1, 11),
(134, 13, 4, 4),
(135, 13, 5, 13),
(136, 13, 7, 5),
(137, 13, 8, 17),
(138, 14, 1, 11),
(139, 14, 4, 2),
(140, 14, 5, 6),
(141, 14, 5, 13),
(142, 14, 8, 17),
(143, 15, 5, 6),
(144, 15, 8, 17),
(145, 16, 1, 11),
(146, 16, 4, 2),
(147, 16, 5, 13),
(148, 17, 2, 10),
(149, 18, 5, 6),
(150, 19, 5, 13),
(151, 20, 5, 6),
(152, 20, 5, 13),
(155, 21, 8, 17),
(156, 22, 2, 1),
(157, 22, 3, 3),
(158, 22, 5, 6),
(159, 23, 1, 11),
(160, 23, 4, 2),
(161, 23, 5, 13),
(162, 23, 8, 17),
(163, 24, 5, 13),
(164, 25, 5, 13),
(165, 26, 5, 13),
(166, 27, 5, 6),
(167, 27, 5, 13),
(168, 28, 5, 6),
(169, 28, 5, 13),
(170, 29, 1, 11),
(172, 29, 2, 10),
(173, 29, 7, 5),
(174, 29, 5, 6),
(175, 29, 5, 13),
(176, 30, 5, 6),
(177, 30, 8, 17),
(178, 31, 5, 6),
(179, 31, 7, 5),
(180, 31, 8, 17),
(181, 32, 5, 13),
(182, 32, 5, 6),
(183, 32, 8, 17),
(184, 33, 1, 11),
(185, 34, 1, 11),
(186, 34, 2, 1),
(187, 34, 5, 6),
(188, 34, 5, 13),
(189, 35, 8, 17),
(190, 36, 5, 13),
(191, 37, 4, 2),
(192, 37, 5, 6),
(193, 37, 5, 13),
(194, 38, 1, 11),
(195, 38, 2, 1),
(196, 39, 5, 13),
(197, 40, 5, 13),
(198, 41, 5, 13),
(199, 42, 5, 13),
(200, 43, 1, 11),
(201, 43, 5, 13),
(202, 44, 4, 2),
(203, 44, 5, 6),
(204, 44, 5, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

CREATE TABLE `sedes` (
  `id_sede` int(11) NOT NULL,
  `codigo_categoria` int(11) NOT NULL,
  `codigo_sede` int(11) NOT NULL,
  `nombre_sede` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `sedes`
--

INSERT INTO `sedes` (`id_sede`, `codigo_categoria`, `codigo_sede`, `nombre_sede`) VALUES
(1, 1, 1, 'Campus'),
(2, 1, 2, 'Chiriqui'),
(3, 1, 3, 'CRU Azuero'),
(4, 1, 4, 'CRU Veraguas'),
(5, 1, 5, 'CRU Colon'),
(6, 1, 6, 'CRU Cocle'),
(7, 1, 7, 'CRU Los Santos'),
(8, 1, 8, 'CRU Bocas del Toro'),
(9, 1, 9, 'CRU Pan. Oeste'),
(10, 1, 11, 'CRU San Miguelito'),
(11, 1, 12, 'CRU Darien'),
(12, 1, 13, 'Ext. Aguadulce'),
(13, 1, 14, 'CRU Pan. Este'),
(14, 1, 16, 'Ext. Sona'),
(15, 1, 20, 'Prog. Anexo Arraijan'),
(16, 1, 21, 'Prog. Anexo Ch. Grande'),
(17, 1, 22, 'Prog. AnexoChuruquita Chiquita'),
(18, 1, 23, 'Prog. Anexo Isla Colon'),
(19, 1, 24, 'Prog. Anexo Kankintu'),
(20, 1, 25, 'Prog. Anexo Las Tablas'),
(21, 1, 26, 'Prog. Anexo Ola'),
(22, 1, 27, 'Prog. Anexo 24 de Diciembre'),
(23, 1, 28, 'Prog. Anexo Torti'),
(24, 1, 30, 'Prog. Anexo Jaque'),
(25, 1, 31, 'Prog. Anexo Sambu'),
(26, 1, 32, 'Prog. Anexo Garachine'),
(27, 1, 33, 'Prog. Anexo Guna Yala Sede Carti'),
(28, 1, 34, 'Prog. Anexo Guna Yala Sede Nargana'),
(29, 1, 35, 'Prog. Anexo Oc?'),
(30, 1, 36, 'Prog. Anexo Chame de San Carlos'),
(31, 1, 37, 'Prog. Anexo de Macaracas'),
(32, 1, 38, 'Prog. Anexo de Tonosi'),
(33, 1, 39, 'Prog. Anexo de Valle de Anton '),
(34, 1, 41, 'Prog. Anexo de Nombre de Dios'),
(35, 1, 42, 'Prog. Anexo San Miguel centro'),
(36, 1, 43, 'Prog. Anexo Union Choco'),
(37, 1, 44, 'Prog. Anexo Sitio Prado'),
(38, 1, 46, 'Prog. Anexo Rio Indio'),
(39, 1, 47, 'Prog. Anexo Cerro Puerco'),
(40, 1, 48, 'Prog. Anexo Guabal'),
(41, 1, 49, 'Prog.Anexo Kusapin'),
(42, 1, 50, 'Prog. Anexo El cope'),
(43, 1, 51, 'Prog.Anexo Portobelo'),
(44, 1, 54, 'Prog.Anexo Cañazas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sgra_help`
--

CREATE TABLE `sgra_help` (
  `id_help` int(10) NOT NULL,
  `Autor` varchar(50) COLLATE utf32_spanish_ci DEFAULT NULL,
  `Date` varchar(50) COLLATE utf32_spanish_ci DEFAULT NULL,
  `Paragraph_1` varchar(500) COLLATE utf32_spanish_ci DEFAULT NULL,
  `Paragraph_2` varchar(500) COLLATE utf32_spanish_ci DEFAULT NULL,
  `Paragraph_3` varchar(500) COLLATE utf32_spanish_ci DEFAULT NULL,
  `Paragraph_4` varchar(500) COLLATE utf32_spanish_ci DEFAULT NULL,
  `Paragraph_5` varchar(500) COLLATE utf32_spanish_ci DEFAULT NULL,
  `Paragraph_6` varchar(500) COLLATE utf32_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sgra_recursosinscritos`
--

CREATE TABLE `sgra_recursosinscritos` (
  `idRecurso` int(5) NOT NULL,
  `recurso` varchar(20) COLLATE utf32_spanish_ci NOT NULL,
  `puredb` varchar(20) COLLATE utf32_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `sgra_recursosinscritos`
--

INSERT INTO `sgra_recursosinscritos` (`idRecurso`, `recurso`, `puredb`) VALUES
(1, 'Red', 'red'),
(2, 'Nota', 'nota'),
(3, 'Apellido', 'apellido'),
(4, 'Nombre', 'nombre'),
(5, 'Cedula', 'cedula'),
(6, 'Cedulatxt', 'cedulatxt'),
(7, 'Provincia', 'provincia'),
(8, 'Clave', 'clave'),
(9, 'Tomo', 'tomo'),
(10, 'Folio', 'folio'),
(11, 'Pasaporte', 'pasaporte'),
(12, 'Nacionalidad', 'nacionalid'),
(13, 'Trabaja', 'trabaja'),
(14, 'Ocupación', 'ocupacion'),
(15, 'Tipo Colegio', 'tipoc'),
(16, 'Colegio de procedenc', 'col_proc'),
(17, 'Código de colegio', 'cod_col'),
(18, 'Estado civil', 'est_civil'),
(19, 'Mes de nacimiento', 'mes_n'),
(20, 'Dia de nacimiento', 'dia_n'),
(21, 'Año de nacimiento', 'ao_n'),
(22, 'Mes de inscripción', 'mes_i'),
(23, 'Dia de inscripción', 'dia_i'),
(24, 'Año de inscripción', 'ao_i'),
(25, 'Facultad ia', 'fac_ia'),
(26, 'Escuela ia', 'esc_ia'),
(27, 'Carrera ia', 'car_ia'),
(28, 'Fac_iia', 'fac_iia'),
(29, 'Esc_iia', 'esc_iia'),
(30, 'Car_iia', 'car_iia'),
(31, 'Fac_iiia', 'fac_iiia'),
(32, 'Esc_iiia', 'esc_iiia'),
(33, 'Car_iiia', 'car_iiia'),
(34, 'Numero de inscrito', 'n_ins'),
(35, 'Bachiller', 'bach'),
(36, 'Nomb de bachiller', 'nbachiller'),
(37, 'Año de graduacion', 'ao_grad'),
(38, 'Ecrop', 'ecrop'),
(39, 'Sexo', 'sexo'),
(40, 'Pviu', 'pviu'),
(41, 'Aopviu', 'aopviu'),
(42, 'Sede', 'sede'),
(43, 'Provincia', 'provi'),
(44, 'Distrito', 'distri'),
(45, 'Corregimiento', 'correg'),
(46, 'Ocupacion del padre', 'ocup_p'),
(47, 'Ocupacion de la madr', 'ocup_m'),
(48, 'Grado escolar padre', 'grado_p'),
(49, 'Escuela del padre', 'esc_p'),
(50, 'Grado escolar de la ', 'grado_m'),
(51, 'Escuela de la madre', 'esc_m'),
(52, 'Cfe', 'cfe'),
(53, 'Ecps', 'ecps'),
(54, 'Imf', 'imf'),
(55, 'Numero de personas e', 'npers'),
(56, 'Mtrasp', 'mtrasp'),
(57, 'Tiene hijos', 'thijos'),
(58, 'Cuantos hijos', 'chijos'),
(59, 'Discapacdad', 'discap'),
(60, 'Rpadre', 'rpadre'),
(61, 'Rmadre', 'rmadre'),
(62, 'Rhnos', 'rhnos'),
(63, 'Pgind', 'pgind'),
(64, 'Rend_esc', 'rend_esc'),
(65, 'Telefono', 'telefono'),
(66, 'Telfono celular', 'tel_cel'),
(67, 'Telefono de oficin', 'tel_ofic'),
(68, 'Correo electronico', 'mail'),
(69, 'Tiene computadora', 't_comp'),
(70, 'Tiene Internet', 't_internet'),
(71, 'Cod_promed', 'cod_promed'),
(72, 'Cod_ext_le', 'cod_ext_le'),
(73, 'Consu_dic', 'consu_dic'),
(74, 'Pg_num', 'pg_num'),
(75, 'Area_i', 'area_i'),
(76, 'Area_ii', 'area_ii'),
(77, 'Area_iii', 'area_iii'),
(78, 'Arch_i', 'arch_i'),
(79, 'Grupo', 'grupo'),
(80, 'Edif', 'edif'),
(81, 'Aula', 'aula'),
(82, 'Hora_prueb', 'hora_prueb'),
(83, 'Ao_lect', 'ao_lect'),
(84, 'Edad', 'edad'),
(85, 'Fecha_insc', 'fecha_insc'),
(86, 'Fecha_naci', 'fecha_naci'),
(87, 'Otro_coleg', 'otro_coleg'),
(88, 'Nfac_ia', 'nfac_ia'),
(89, 'D', 'd'),
(90, 'Cod_prov', 'cod_prov'),
(91, 'Nsede', 'nsede'),
(92, 'Nfacultad', 'nfacultad'),
(93, 'Ncarrera', 'ncarrera'),
(94, 'Matricula', 'matricula'),
(95, 'Sefaesca', 'sefaesca'),
(96, 'Red2', 'red2'),
(97, 'No1', 'no1'),
(98, 'No2', 'no2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sgra_recursosresultados`
--

CREATE TABLE `sgra_recursosresultados` (
  `idRecurso` int(5) NOT NULL,
  `recurso` varchar(20) COLLATE utf32_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `sgra_recursosresultados`
--

INSERT INTO `sgra_recursosresultados` (`idRecurso`, `recurso`) VALUES
(1, 'Red'),
(2, 'Red2'),
(3, 'Region'),
(4, 'Extranjero'),
(5, 'Sede'),
(6, 'Nsede'),
(7, 'Facultad'),
(8, 'Nfacultad'),
(9, 'Escuela'),
(10, 'Carrera'),
(11, 'Apellido'),
(12, 'Nombre'),
(13, 'Cedula'),
(14, 'Cedulatxt'),
(15, 'Provincia'),
(16, 'Clave'),
(17, 'Tomo'),
(18, 'Folio'),
(19, 'N_ins'),
(20, 'Areap'),
(21, 'Nota'),
(22, 'Ps'),
(23, 'Gatb'),
(24, 'Pca'),
(25, 'Pcg'),
(26, 'Ingles'),
(27, 'Indice'),
(28, 'Indicear'),
(29, 'Indiceci'),
(30, 'Indiceem'),
(31, 'Indicehu'),
(32, 'Indicein'),
(33, 'Indicepe'),
(34, 'Indicepo'),
(35, 'Indicede'),
(36, 'Indicead'),
(37, 'Fecpca'),
(38, 'Cl_def'),
(39, 'Cl_propb'),
(40, 'Lect1'),
(41, 'R_com_comp'),
(42, 'Rel_o'),
(43, 'Lect2'),
(44, 'R_plan'),
(45, 'Verbal'),
(46, 'Oper1'),
(47, 'Oper2'),
(48, 'Razon1'),
(49, 'Razon2'),
(50, 'Numer'),
(51, 'Area1'),
(52, 'Area2'),
(53, 'Area3'),
(54, 'Area4'),
(55, 'Area5'),
(56, 'Area6'),
(57, 'Gram1'),
(58, 'Vocab'),
(59, 'Gram2'),
(60, 'Narchi'),
(61, 'Opc'),
(62, 'Npag'),
(63, 'Fecpcg'),
(64, 'Indice00'),
(65, 'Indice25'),
(66, 'Indice50'),
(67, 'Indice75'),
(68, 'Registro'),
(69, 'Car1'),
(70, 'Areap1'),
(71, 'Car2'),
(72, 'Areap2'),
(73, 'Car3'),
(74, 'Areap3'),
(75, 'Col_proc'),
(76, 'Cod_col'),
(77, 'Tipoc'),
(78, 'Ntipoc'),
(79, 'Bach'),
(80, 'Bachiller'),
(81, 'Nbachiller'),
(82, 'Sexo'),
(83, 'Nsexo'),
(84, 'Mes_n'),
(85, 'Dia_n'),
(86, 'Ao_n'),
(87, 'Fechanaci'),
(88, 'Edad'),
(89, 'Fac_ia'),
(90, 'Esc_ia'),
(91, 'Car_ia'),
(92, 'Fac_iia'),
(93, 'Esc_iia'),
(94, 'Car_iia'),
(95, 'Fac_iiia'),
(96, 'Esc_iiia'),
(97, 'Car_iiia'),
(98, 'Ao_grad'),
(99, 'Provi'),
(100, 'Distri'),
(101, 'Correg'),
(102, 'Telefono'),
(103, 'Tel_cel'),
(104, 'Tel_ofi'),
(105, 'Mail'),
(106, 'Sede_i'),
(107, 'Area_i'),
(108, 'Ao_lect'),
(109, 'Cod_prov'),
(110, 'Nprovincia'),
(111, 'Matricula'),
(112, 'Sefaesca'),
(113, 'Nacionalid'),
(114, 'Trabaja'),
(115, 'Ocupacion'),
(116, 'Est_civil'),
(117, 'Ecrop'),
(118, 'Pviu'),
(119, 'Aopviu'),
(120, 'Ocup_p'),
(121, 'Ocup_m'),
(122, 'Grado_p'),
(123, 'Esc_p'),
(124, 'Grado_m'),
(125, 'Esc_m'),
(126, 'Cfe'),
(127, 'Ecps'),
(128, 'Imf'),
(129, 'Npers'),
(130, 'Mtrasp'),
(131, 'Thijos'),
(132, 'Chijos'),
(133, 'Discap'),
(134, 'Rpadre'),
(135, 'Rmadre'),
(136, 'Rhnos'),
(137, 'Pgind'),
(138, 'Rend_esc'),
(139, 'Tipo_est'),
(140, 'Arch_i'),
(141, 'Observacio'),
(142, 'Fn'),
(143, 'Ncarrera'),
(144, 'D'),
(145, 'No2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `lastname` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_usuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `type` int(5) NOT NULL,
  `password` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `acceso1` int(5) NOT NULL,
  `acceso2` int(5) NOT NULL,
  `acceso3` int(5) NOT NULL,
  `acceso4` int(5) NOT NULL,
  `acceso5` int(5) NOT NULL,
  `acceso6` int(5) NOT NULL,
  `acceso7` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `name`, `lastname`, `nombre_usuario`, `email`, `type`, `password`, `acceso1`, `acceso2`, `acceso3`, `acceso4`, `acceso5`, `acceso6`, `acceso7`) VALUES
(3, 'Admin', 'General', 'adminG', 'admin@example.com', 1, '$2y$10$GqhvjqPB3TDlMMGiX4wst.3QSvXXNwONEgIY.wIfGNRS3O6/5zn56', 0, 0, 0, 0, 0, 0, 0),
(10, 'Renold', 'González', 'renold.gonzalez', 'renoldgz@gmail.com', 2, '21232f297a57a5a743894a0e4a801fc3', 0, 0, 0, 0, 0, 0, 0),
(12, 'Marina', 'del Pilar', 'marina.pilar', 'marinapilar@gmail.com', 2, '21232f297a57a5a743894a0e4a801fc3', 0, 0, 0, 0, 0, 0, 0),
(13, 'Admin', 'Admin', 'user.renold', 'renold@gmail.com', 1, '21232f297a57a5a743894a0e4a801fc3', 0, 0, 0, 0, 0, 0, 0),
(14, 'Julian', 'Martinez', 'julian.martinez', 'juli', 1, '6c9cdce9f6d927cea4c621b33ca05013', 0, 0, 0, 0, 0, 0, 0),
(15, 'Rodney', 'Vega', 'rodney.vega', 'example@example.com', 1, '21232f297a57a5a743894a0e4a801fc3', 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `validaciones`
--

CREATE TABLE `validaciones` (
  `inscritoanterior` varchar(50) COLLATE utf32_spanish_ci NOT NULL,
  `codigovalidacion` varchar(50) COLLATE utf32_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `validaciones`
--

INSERT INTO `validaciones` (`inscritoanterior`, `codigovalidacion`) VALUES
('001256', 'V00013'),
('Mickey', 'V00014'),
('V00007', 'V00014');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id_area`);

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id_area`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id_carr`);

--
-- Indices de la tabla `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `esc`
--
ALTER TABLE `esc`
  ADD PRIMARY KEY (`id_escu`),
  ADD KEY `fk_facultad` (`fac`) USING BTREE,
  ADD KEY `fk_sedes_es` (`sed`) USING BTREE;

--
-- Indices de la tabla `escuela-carrera`
--
ALTER TABLE `escuela-carrera`
  ADD PRIMARY KEY (`id_trinario`),
  ADD KEY `fk_sede` (`codigo_sede`) USING BTREE,
  ADD KEY `fk_facultad` (`codigo_facultad`) USING BTREE,
  ADD KEY `fk_escuela` (`codigo_escuela`) USING BTREE,
  ADD KEY `fk_carrera` (`codigo_carrera`) USING BTREE;

--
-- Indices de la tabla `facultades`
--
ALTER TABLE `facultades`
  ADD PRIMARY KEY (`id_facultad`,`codigo_relacion`),
  ADD KEY `fk_id_area` (`codigo_relacion`),
  ADD KEY `id_facultad` (`id_facultad`);

--
-- Indices de la tabla `logsystem`
--
ALTER TABLE `logsystem`
  ADD PRIMARY KEY (`id_log`);

--
-- Indices de la tabla `sede-area`
--
ALTER TABLE `sede-area`
  ADD PRIMARY KEY (`id_sede_area`,`id_sede`,`id_area`,`id_facultad`),
  ADD KEY `fk_id_sede` (`id_sede`),
  ADD KEY `fk_id_area_facultad` (`id_facultad`,`id_area`);

--
-- Indices de la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD PRIMARY KEY (`id_sede`);

--
-- Indices de la tabla `sgra_help`
--
ALTER TABLE `sgra_help`
  ADD PRIMARY KEY (`id_help`);

--
-- Indices de la tabla `sgra_recursosinscritos`
--
ALTER TABLE `sgra_recursosinscritos`
  ADD PRIMARY KEY (`idRecurso`);

--
-- Indices de la tabla `sgra_recursosresultados`
--
ALTER TABLE `sgra_recursosresultados`
  ADD PRIMARY KEY (`idRecurso`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=366;

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id_carr` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `esc`
--
ALTER TABLE `esc`
  MODIFY `id_escu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT de la tabla `escuela-carrera`
--
ALTER TABLE `escuela-carrera`
  MODIFY `id_trinario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `facultades`
--
ALTER TABLE `facultades`
  MODIFY `id_facultad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `logsystem`
--
ALTER TABLE `logsystem`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=508;

--
-- AUTO_INCREMENT de la tabla `sede-area`
--
ALTER TABLE `sede-area`
  MODIFY `id_sede_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT de la tabla `sedes`
--
ALTER TABLE `sedes`
  MODIFY `id_sede` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `sgra_recursosinscritos`
--
ALTER TABLE `sgra_recursosinscritos`
  MODIFY `idRecurso` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT de la tabla `sgra_recursosresultados`
--
ALTER TABLE `sgra_recursosresultados`
  MODIFY `idRecurso` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `esc`
--
ALTER TABLE `esc`
  ADD CONSTRAINT `fk_facultad_escu` FOREIGN KEY (`fac`) REFERENCES `facultades` (`id_facultad`),
  ADD CONSTRAINT `fk_sedes_of` FOREIGN KEY (`sed`) REFERENCES `sedes` (`id_sede`);

--
-- Filtros para la tabla `escuela-carrera`
--
ALTER TABLE `escuela-carrera`
  ADD CONSTRAINT `fk_carrera` FOREIGN KEY (`codigo_carrera`) REFERENCES `carreras` (`id_carr`),
  ADD CONSTRAINT `fk_escuela` FOREIGN KEY (`codigo_escuela`) REFERENCES `esc` (`id_escu`),
  ADD CONSTRAINT `fk_facultad` FOREIGN KEY (`codigo_facultad`) REFERENCES `facultades` (`id_facultad`),
  ADD CONSTRAINT `fk_sede` FOREIGN KEY (`codigo_sede`) REFERENCES `sedes` (`id_sede`);

--
-- Filtros para la tabla `facultades`
--
ALTER TABLE `facultades`
  ADD CONSTRAINT `fk_id_area` FOREIGN KEY (`codigo_relacion`) REFERENCES `area` (`id_area`);

--
-- Filtros para la tabla `sede-area`
--
ALTER TABLE `sede-area`
  ADD CONSTRAINT `fk_id_area_facultad` FOREIGN KEY (`id_facultad`,`id_area`) REFERENCES `facultades` (`id_facultad`, `codigo_relacion`),
  ADD CONSTRAINT `fk_id_sede` FOREIGN KEY (`id_sede`) REFERENCES `sedes` (`id_sede`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
