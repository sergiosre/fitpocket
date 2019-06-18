-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 18-06-2019 a las 01:24:37
-- Versión del servidor: 10.1.39-MariaDB
-- Versión de PHP: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `test`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`` PROCEDURE `AddGeometryColumn` (`catalog` VARCHAR(64), `t_schema` VARCHAR(64), `t_name` VARCHAR(64), `geometry_column` VARCHAR(64), `t_srid` INT)  begin
  set @qwe= concat('ALTER TABLE ', t_schema, '.', t_name, ' ADD ', geometry_column,' GEOMETRY REF_SYSTEM_ID=', t_srid); PREPARE ls from @qwe; execute ls; deallocate prepare ls; end$$

CREATE DEFINER=`` PROCEDURE `DropGeometryColumn` (`catalog` VARCHAR(64), `t_schema` VARCHAR(64), `t_name` VARCHAR(64), `geometry_column` VARCHAR(64))  begin
  set @qwe= concat('ALTER TABLE ', t_schema, '.', t_name, ' DROP ', geometry_column); PREPARE ls from @qwe; execute ls; deallocate prepare ls; end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `id` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info` mediumtext COLLATE utf8mb4_unicode_ci,
  `impacto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'assets/img/actividades/default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`id`, `nombre`, `info`, `impacto`, `img`) VALUES
(2, 'Core', 'Core es una palabra en inglés que significa núcleo o centro, se utiliza para nombrar toda la zona muscular que envuelve el centro de gravedad de nuestro cuerpo, que lo  encontramos justo debajo del ombligo, aunque dependerá de varios factores como del movimiento del cuerpo. El Core es nuestra faja abdominal, podríamos decir que seria como nuestro corsé, formado por músculos. Éste núcleo es un componente clave en la construcción de un cuerpo fuerte, tanto en salud como para atletas. Ya que al realizar la mayoría de movimientos tanto deportivos como cuotidianos se utiliza la musculatura del Core. Hay que aclarar un concepto erróneo que muchas veces tenemos y es que el core no es simplemente el six-pack (recto anterior) sino que un conjunto de músculos, que trabajan en sintonía.', 'medio', 'assets/img/actividades/core.jpg'),
(5, 'Spinning', 'El spinning es un ejercicio aeróbico y de piernas principalmente, donde el monitor o profesor puede mediante el cambio de la frecuencia de pedaleo y de la resistencia al movimiento, realizar todo tipo de intensidades.', 'medio', 'assets/img/actividades/spinning.jpg'),
(6, 'Gap', 'La clase de GAP es una clase colectiva de tonificación específica para trabajar glúteos, abdomen y piernas. En las sesiones de GAP se trabajan estos grupos musculares de forma aislada durante 25-30 minutos para aumentar su eficacia. El monitor o monitora que dirige las clases utiliza música como método de apoyo y motivación para que las clases sean más dinámicas y entretenidas.', 'alto', 'assets/img/actividades/gap.jpg'),
(7, 'Baile latino', ' Los bailes latinos son aquellos que baila una pareja de forma coordinada y siguiendo el ritmo de la música latina. Las modalidades que se enseñan son Cha, Cha, Cha,  Bachata, Merengue y Salsa.\r\n\r\nLos métodos de enseñanza de este curso, son tres:\r\n\r\n-De forma individual: Donde cada alumno/a aprenderá individualmente los pasos básicos de las diferentes variaciones.\r\n\r\n-En parejas: Donde emplearán los pasos aprendidos en la etapa anterior a realizarlos con pareja.\r\n\r\n-Colectivo: Una vez aprendidos los pasos en parejas, se pasa a hacer coreografías con el resto del alumnado. Estas coreografías serán en circulo, filas, etc., pasando de lo más simple a lo más complejo.', 'bajo', 'assets/img/actividades/baile_latino.jpg'),
(10, 'Body Combat', 'Body Combat es un programa de entrenamiento cardiovascular inspirado en las artes marciales. Coreografiado en base a una buena música, con sus excelentes instructores, los participantes realizan golpes, puñetazos, patadas y katas, queman calorías y consiguen una mayor resistencia cardiovascular. ', 'alto', 'assets/img/actividades/body_combat.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) UNSIGNED NOT NULL,
  `usuario` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `usuario`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'sergio', 'ffc150a160d37e92012c196b6af4160d'),
(3, 'alejandro', '3bffa4ebdf4874e506c2b12405796aa5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula`
--

CREATE TABLE `aula` (
  `id` int(11) UNSIGNED NOT NULL,
  `numero` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `aula`
--

INSERT INTO `aula` (`id`, `numero`) VALUES
(1, 1),
(2, 2),
(4, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historico`
--

CREATE TABLE `historico` (
  `id` int(11) NOT NULL,
  `fecha` int(11) NOT NULL,
  `hora_inicio` int(11) NOT NULL,
  `hora_fin` int(11) NOT NULL,
  `actividad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historico`
--

INSERT INTO `historico` (`id`, `fecha`, `hora_inicio`, `hora_fin`, `actividad`) VALUES
(1, 0, 0, 0, 0),
(2, 0, 0, 0, 0),
(3, 0, 0, 0, 0),
(4, 0, 0, 0, 0),
(5, 0, 0, 0, 0),
(6, 0, 0, 0, 0),
(7, 0, 0, 0, 0),
(8, 0, 0, 0, 0),
(9, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historico_reservas`
--

CREATE TABLE `historico_reservas` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fecha_reserva` date NOT NULL,
  `dia` varchar(50) COLLATE utf8_bin NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `aula` int(11) NOT NULL,
  `monitor` varchar(190) COLLATE utf8_bin NOT NULL,
  `actividad` varchar(190) COLLATE utf8_bin NOT NULL,
  `reserva_borrada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `historico_reservas`
--

INSERT INTO `historico_reservas` (`id`, `user_id`, `fecha_reserva`, `dia`, `hora_inicio`, `hora_fin`, `aula`, `monitor`, `actividad`, `reserva_borrada`) VALUES
(38, 1, '2019-05-19', 'domingo', '15:00:00', '16:00:00', 1, '1', 'Body combat', 1),
(39, 1, '2019-05-19', 'domingo', '18:00:00', '19:00:00', 1, '1', 'Body combat', 2),
(40, 1, '2019-05-22', 'miercoles', '14:00:00', '15:00:00', 2, '1', 'Body combat', 3),
(41, 1, '2019-05-25', 'sabado', '10:00:00', '11:00:00', 1, '1', 'Body combat', 4),
(42, 1, '2019-05-22', 'miercoles', '14:00:00', '15:00:00', 1, '1', 'Body combat', 5),
(45, 1, '2019-06-02', 'domingo', '15:00:00', '16:00:00', 1, '1', 'Body combat', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monitor`
--

CREATE TABLE `monitor` (
  `id` int(11) UNSIGNED NOT NULL,
  `usuario` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellidos` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` int(11) UNSIGNED DEFAULT NULL,
  `fotografia` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `monitor`
--

INSERT INTO `monitor` (`id`, `usuario`, `nombre`, `apellidos`, `password`, `email`, `telefono`, `fotografia`) VALUES
(1, 'monitor1', 'monitor1', 'monitor1', 'e4f5691e6481ffc3dd048042deda5c6f', 'monitor1@monitor1.com', 666666666, 'monitor1'),
(2, 'monitor2', 'monitor2', 'monitor2', '6e8d9db2620886f43b5ee4e023718ee0', 'monitor2@monitor2.com', 666666666, 'monitor2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

CREATE TABLE `post` (
  `id` int(11) UNSIGNED NOT NULL,
  `texto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hora_publicacion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publicado_por_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `post`
--

INSERT INTO `post` (`id`, `texto`, `hora_publicacion`, `publicado_por_id`) VALUES
(4, 'as', '06-17-2019T00:49', 1),
(5, 'Hola, este es un mensaje de prueba', '06-17-2019T00:56', 1),
(6, 'holaaa', '06-17-2019T10:37', 1),
(7, 'Nuevo tweet', '06-17-2019T11:34', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id` int(11) UNSIGNED NOT NULL,
  `estado` int(11) UNSIGNED DEFAULT NULL,
  `fecha_reserva` datetime DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `sesion_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion`
--

CREATE TABLE `sesion` (
  `id` int(11) UNSIGNED NOT NULL,
  `dia` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  `se_realiza_id` int(11) UNSIGNED DEFAULT NULL,
  `imparte_id` int(11) UNSIGNED DEFAULT NULL,
  `tiene_lugar_en_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sesion`
--

INSERT INTO `sesion` (`id`, `dia`, `hora_inicio`, `hora_fin`, `se_realiza_id`, `imparte_id`, `tiene_lugar_en_id`) VALUES
(28, 'lunes', '09:00:00', '10:00:00', 10, 1, 1),
(29, 'lunes', '10:00:00', '11:00:00', 7, 2, 1),
(30, 'lunes', '11:00:00', '12:00:00', 5, 1, 1),
(31, 'lunes', '12:00:00', '12:45:00', 2, 2, 1),
(32, 'martes', '09:00:00', '10:00:00', 7, 1, 1),
(33, 'martes', '10:00:00', '11:00:00', 5, 2, 1),
(34, 'martes', '11:00:00', '12:00:00', 2, 2, 1),
(35, 'martes', '12:00:00', '12:45:00', 5, 1, 1),
(36, 'miercoles', '09:00:00', '10:00:00', 7, 1, 1),
(37, 'miercoles', '10:00:00', '11:00:00', 5, 2, 1),
(38, 'miercoles', '11:00:00', '12:00:00', 2, 2, 1),
(39, 'miercoles', '12:00:00', '12:45:00', 5, 1, 1),
(40, 'jueves', '12:00:00', '12:45:00', 2, 2, 1),
(41, 'jueves', '11:00:00', '12:00:00', 5, 1, 1),
(42, 'jueves', '10:00:00', '11:00:00', 7, 2, 1),
(43, 'jueves', '09:00:00', '10:00:00', 10, 1, 1),
(44, 'viernes', '09:00:00', '10:00:00', 7, 1, 1),
(45, 'viernes', '10:00:00', '11:00:00', 5, 2, 1),
(46, 'viernes', '11:00:00', '12:00:00', 2, 2, 1),
(47, 'viernes', '12:00:00', '12:45:00', 5, 1, 1),
(48, 'sabado', '12:00:00', '12:45:00', 5, 1, 1),
(49, 'sabado', '11:00:00', '12:00:00', 2, 2, 1),
(50, 'sabado', '10:00:00', '11:00:00', 5, 2, 1),
(51, 'sabado', '09:00:00', '10:00:00', 7, 1, 1),
(52, 'domingo', '09:00:00', '10:00:00', 5, 1, 1),
(53, 'domingo', '10:00:00', '11:00:00', 5, 1, 2),
(54, 'jueves', '09:00:00', '10:00:00', 10, 1, 2),
(55, 'lunes', '09:00:00', '10:00:00', 10, 1, 2),
(56, 'martes', '11:00:00', '12:00:00', 2, 2, 2),
(57, 'martes', '10:00:00', '11:00:00', 5, 2, 2),
(58, 'sabado', '09:00:00', '10:00:00', 7, 1, 2),
(59, 'lunes', '12:45:00', '13:45:00', 2, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellidos` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `movil` int(11) UNSIGNED DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usuario` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edad` int(11) UNSIGNED DEFAULT NULL,
  `estatura` int(11) UNSIGNED DEFAULT NULL,
  `peso` int(11) UNSIGNED DEFAULT NULL,
  `activo` int(11) UNSIGNED DEFAULT NULL,
  `img` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'assets/img/users/default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `nombre`, `apellidos`, `movil`, `email`, `usuario`, `password`, `edad`, `estatura`, `peso`, `activo`, `img`) VALUES
(1, 'Víctor', 'Martín López', 666666666, 'victor@victor.com', 'victor', 'ffc150a160d37e92012c196b6af4160d', 25, 170, 70, 1, 'assets/img/actividades/Logotipo sin fondo.png'),
(4, 'Sergio', 'Romero Estacio', 666666666, 'sergio@sergio.com', 'sergio', '3bffa4ebdf4874e506c2b12405796aa5', 25, 170, 70, 0, 'assets/img/users/default.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `aula`
--
ALTER TABLE `aula`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historico_reservas`
--
ALTER TABLE `historico_reservas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `monitor`
--
ALTER TABLE `monitor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_foreignkey_post_publicado_por` (`publicado_por_id`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_foreignkey_reserva_user` (`user_id`),
  ADD KEY `index_foreignkey_reserva_sesion` (`sesion_id`);

--
-- Indices de la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_foreignkey_sesion_se_realiza` (`se_realiza_id`),
  ADD KEY `index_foreignkey_sesion_imparte` (`imparte_id`),
  ADD KEY `c_fk_sesion_tiene_lugar_en_id` (`tiene_lugar_en_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `aula`
--
ALTER TABLE `aula`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `historico`
--
ALTER TABLE `historico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `historico_reservas`
--
ALTER TABLE `historico_reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `monitor`
--
ALTER TABLE `monitor`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `sesion`
--
ALTER TABLE `sesion`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `c_fk_post_publicado_por_id` FOREIGN KEY (`publicado_por_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `c_fk_reserva_sesion_id` FOREIGN KEY (`sesion_id`) REFERENCES `sesion` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `c_fk_reserva_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD CONSTRAINT `c_fk_sesion_imparte_id` FOREIGN KEY (`imparte_id`) REFERENCES `monitor` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `c_fk_sesion_se_realiza_id` FOREIGN KEY (`se_realiza_id`) REFERENCES `actividad` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `c_fk_sesion_tiene_lugar_en_id` FOREIGN KEY (`tiene_lugar_en_id`) REFERENCES `aula` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `move_reservation_to_historic` ON SCHEDULE EVERY 1 SECOND STARTS '2019-05-01 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO INSERT INTO historico_reservas(user_id,fecha_reserva,dia,hora_inicio,hora_fin,aula,monitor,actividad,reserva_borrada)
SELECT user_id, fecha_reserva, sesion.dia, sesion.hora_inicio,sesion.hora_fin, aula.numero, monitor.id, actividad.nombre, reserva.id
FROM reserva, sesion, aula, monitor, actividad
WHERE fecha_reserva < NOW() AND (reserva.sesion_id = sesion.id AND sesion.tiene_lugar_en_id = aula.id AND sesion.imparte_id = monitor.id AND sesion.se_realiza_id = actividad.id)$$

CREATE DEFINER=`root`@`localhost` EVENT `delete_reservation` ON SCHEDULE EVERY 1 SECOND STARTS '2019-05-01 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM reserva 
WHERE reserva.id IN 
  ( SELECT historico_reservas.reserva_borrada
   FROM historico_reservas)$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
