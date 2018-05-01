-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-05-2018 a las 02:52:25
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vitec`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t01_incidencia`
--

CREATE TABLE `t01_incidencia` (
  `cod_incidencia` int(11) NOT NULL,
  `cod_estacion` int(11) NOT NULL,
  `fecha_resolucion` date NOT NULL,
  `urgencia` int(11) NOT NULL,
  `impacto` int(11) NOT NULL,
  `cod_persona` int(11) NOT NULL,
  `fecha_recepcion` date NOT NULL,
  `horas_asignacion` time NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `archivo` text NOT NULL,
  `estado_incidencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t01_incidencia`
--

INSERT INTO `t01_incidencia` (`cod_incidencia`, `cod_estacion`, `fecha_resolucion`, `urgencia`, `impacto`, `cod_persona`, `fecha_recepcion`, `horas_asignacion`, `descripcion`, `archivo`, `estado_incidencia`) VALUES
(1, 5, '2018-04-29', 3, 1, 3, '2018-04-27', '18:24:00', 'Uno de los usuarios de la empresa tiene problemas con el correo electronico, favor de solucionar en el transcurso del dia.', 'file:///C:/Users/usuario/Desktop/Tesis%202018/Documentos%20Profesor/Tesis-%20Gestion%20de%20Incidencias.pdf', 1),
(2, 4, '2018-05-04', 3, 3, 5, '2018-04-27', '18:30:00', 'El ordenador del usuario no reconoce los graficos usando el programa autocad, es de suma urgencia solucioanrlo, ya que se necesita presentar el diseño hoy mismo, favor de realizarlo a la brevedad.', 'file:///C:/Users/usuario/Desktop/Tesis%202018/Documentos%20Profesor/Confiabilidad%20-%20Test%20Retest.pdf', 1),
(3, 2, '2018-04-30', 2, 3, 3, '2018-04-27', '18:45:00', 'Es de importancia realizar la configuracion de la impressora en el ordenador del usuario john, favor de configurar lo mas pronto posible', 'https://doc-0s-3s-apps-viewer.googleusercontent.com/viewer/secure/pdf/p60dmen0jm1kllp5o8hm8o58i7f3i0on/icmtamoqhj86oeofh46dd9jd38crp66s/1524702225000/drive/03375670128975686627/ACFrOgAL4nBtFwHm0i1iIgCm-fltMn1FvzfeEhFh8mHuLp2BRgzLIz_MB4318FyabkqpTwU6GXmW6v-TztQV1rxSQ3-vTfroNT3spFjYcdGQclBTbahpjPO2MJGQm3Y=?print=true', 1),
(4, 8, '0000-00-00', 3, 3, 3, '2018-04-28', '11:00:00', 'problema con correos en el servidor del proveedor Yachay', 'file:///C:/Users/usuario/Desktop/Tesis%202018/Documentos%20Profesor/Confiabilidad%20-%20Test%20Retest.pdf', 1),
(5, 1, '2018-04-30', 2, 2, 5, '2018-04-30', '10:00:00', 'el correo del señor hector aramallo presenta fallas en la plataforma outlook', 'file:///C:/Users/usuario/Desktop/Tesis%202018/Documentos%20Profesor/Confiabilidad%20-%20Test%20Retest.pdf', 1),
(6, 3, '2018-05-02', 3, 3, 3, '2018-04-30', '09:00:00', 'Se reportó que el File server presentó un problema en el acceso a las carpetas compartidas, ', 'file:///C:/Users/usuario/Desktop/Tesis%202018/Documentos%20Profesor/Confiabilidad%20-%20Test%20Retest.pdf', 1),
(7, 3, '2018-05-03', 2, 1, 5, '2018-04-30', '09:00:00', 'Se reportó que la impresora HP LaserJet P2055dn de la usuaria Mayte Delgado no era reconocida por su equipo', 'file:///C:/Users/usuario/Desktop/Tesis%202018/Documentos%20Profesor/Confiabilidad%20-%20Test%20Retest.pdf', 1),
(8, 7, '2018-05-05', 3, 3, 3, '2018-04-30', '10:00:00', 'Se reportó que el rendimiento del internet tanto como la red local presentaba lentitud', 'file:///C:/Users/usuario/Desktop/Tesis%202018/Documentos%20Profesor/Confiabilidad%20-%20Test%20Retest.pdf', 1),
(9, 2, '2018-05-05', 2, 2, 5, '2018-04-30', '14:00:00', 'Se reportó que el usuario Genaro al iniciar sesión con su perfil asignado en su equipo no le cargaban sus documentos y otros', 'file:///C:/Users/usuario/Desktop/Tesis%202018/Documentos%20Profesor/Confiabilidad%20-%20Test%20Retest.pdf', 1),
(10, 2, '2018-05-07', 3, 3, 5, '2018-04-30', '16:00:00', 'Se reportó que los usuarios no podían acceder a la página web de bcp, principalmente el área de contabilidad,', 'file:///C:/Users/usuario/Desktop/Tesis%202018/Documentos%20Profesor/Confiabilidad%20-%20Test%20Retest.pdf', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t02_persona`
--

CREATE TABLE `t02_persona` (
  `cod_persona` int(11) NOT NULL,
  `dni` int(8) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `apellido_p` varchar(100) NOT NULL,
  `apellido_m` varchar(100) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `celular` int(9) NOT NULL,
  `telefono` int(7) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `cod_perfil` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `contraseña` varchar(100) NOT NULL,
  `estado_persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t02_persona`
--

INSERT INTO `t02_persona` (`cod_persona`, `dni`, `nombre`, `apellido_p`, `apellido_m`, `direccion`, `fecha_ingreso`, `celular`, `telefono`, `correo`, `cod_perfil`, `usuario`, `contraseña`, `estado_persona`) VALUES
(1, 46741457, 'Eder', 'Garrido', 'Mestanza', 'Calle Quipaypampa #319 Tahuantinsuyo - Independencia', '2017-02-05', 959222470, 5267876, 'eder.garridom@gmail.com', 1, 'edergar', 'garrido2012', 1),
(2, 46852138, 'Jhoselyn', 'Arevalo', 'Espinoza', 'Urb. Los jasmines # 269 ', '2017-06-05', 987563269, 6539874, 'jhoselyn.ae@gmail.com', 2, 'jhosyarevalo', 'espinoza', 1),
(3, 73654789, 'Erik', 'Bustamante', 'Arellano', 'Los Nogales # 128 - San Isidro', '2016-04-06', 986545698, 3510239, 'erikba@vitec.pe', 3, 'erickba', 'arellano', 1),
(4, 65412398, 'Hans', 'Calzada', 'Bernuy', 'Calle Quipaypampa # 398 - Tahuantinsuyo Independencia', '2010-05-06', 968541235, 2364127, 'hcalzadab@vitec.pe', 1, 'hanscb', 'calzada', 1),
(5, 74120135, 'jorge', 'jimenez', 'rios', 'calle los sauces #638 - La victoria', '2015-07-15', 978020369, 7001236, 'jjimenezr@vitec.pe', 3, 'Jorger', 'rios123', 1),
(6, 45689325, 'arnold', 'ramos', 'calderon', 'Urb. Villasol #452 - los Olivoa', '2017-08-14', 965231478, 3601020, 'aramosc.16@gmail.com', 2, 'arnoldrc', 'calderon', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t03_actividad`
--

CREATE TABLE `t03_actividad` (
  `cod_actividad` int(11) NOT NULL,
  `cod_incidencia` int(11) NOT NULL,
  `trabajo_realizado` varchar(1000) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t03_actividad`
--

INSERT INTO `t03_actividad` (`cod_actividad`, `cod_incidencia`, `trabajo_realizado`, `fecha_inicio`, `fecha_fin`) VALUES
(1, 2, '', '2018-04-27', '2018-04-29'),
(2, 3, '', '2018-04-28', '2018-04-29'),
(3, 1, '', '2018-04-30', '2018-05-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t04_estacion_servicio`
--

CREATE TABLE `t04_estacion_servicio` (
  `cod_estacion` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `cod_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t04_estacion_servicio`
--

INSERT INTO `t04_estacion_servicio` (`cod_estacion`, `nombre`, `direccion`, `cod_cliente`) VALUES
(1, 'Sede Principal - Sicgsac', 'Calle Arias Schereiber 225, Oficina 404 - Miraflores', 7),
(2, 'Oficinal Principal - Consensus', 'Monte Grande 109, Oficina 407\r\nChacarilla, Surco, Lima 41 - Perú', 2),
(3, 'Oficina Principal - Confiep', 'Av. Víctor Andrés Belaúnde 147, Edificio Real Tres, Of. 401. San Isidro', 1),
(4, 'Oficina de Proyecto UTP - Sicgsac', 'Panamericana Norte, Av. Alfredo Mendiola 6377, Los Olivos 15306', 7),
(5, 'Oficina Principal - Jamming', 'Av. Canaval y Moreyra 674\r\nSan Isidro, Lima', 3),
(6, 'Oficina Principal - Salkantay', 'Dirección: Av. Mariscal La Mar 662, Of. 503 - Miraflores', 4),
(7, 'Oficina Principal - Laptop', 'Calle Francisco de Toledo 165, Surco Lima - Perú', 5),
(8, 'Oficina Principal - Aramburú', 'Calle Lord Nelson 245, Miraflores', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t05_cliente`
--

CREATE TABLE `t05_cliente` (
  `cod_cliente` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `razon_social` varchar(100) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `telefono` int(7) NOT NULL,
  `contacto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t05_cliente`
--

INSERT INTO `t05_cliente` (`cod_cliente`, `nombre`, `razon_social`, `correo`, `telefono`, `contacto`) VALUES
(1, 'Confiep', 'CONFEDERACION NACIONAL DE INSTITUCIONES EMPRESARIALES PRIVADAS ', 'comunicaciones@confiep.org.pe', 4152555, 'Mayte Delgado'),
(2, 'Consensus', 'CONSENSUS S.R.L', 'abogados@consensus.com.pe', 3720218, 'Maria Fernanda Bossio Mavila de Flórez'),
(3, 'Jamming', 'JAMMING Consultoria en Talento Humano y Escuela de Coaching', 'programas@jamming.pe', 2265133, 'Fernando Gil Sanguineti'),
(4, 'Salkantay', 'Salkantay Partners', 'mzavala@salkap.com', 2708029, 'Guillermo Miró Quesada'),
(5, 'Laptop', 'LABTOP Tecnología Educación y Salud', 'dr@ga.pe', 2743414, 'Yury Hoyos'),
(6, 'Estudio Manuel Aramburú', 'Estudio Manuel Aramburú Yrigoyen & Asociados', 'aramburucastanedaboero@acb-abogados.com', 2211063, 'MANUEL ARAMBURÚ YRIGOYEN'),
(7, 'Sicgsac', 'Servicio de Ingenieros y Construcciones en General S.A.C', 'info@sicgsac.net', 2736127, 'Héctor Aramayo Barreda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t06_nota_pedido`
--

CREATE TABLE `t06_nota_pedido` (
  `cod_nota` int(11) NOT NULL,
  `cod_incidencia` int(11) NOT NULL,
  `fecha_solicitud` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t06_nota_pedido`
--

INSERT INTO `t06_nota_pedido` (`cod_nota`, `cod_incidencia`, `fecha_solicitud`) VALUES
(1, 2, '2018-04-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t07_guia_remision`
--

CREATE TABLE `t07_guia_remision` (
  `cod_guia` int(11) NOT NULL,
  `cod_nota` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t07_guia_remision`
--

INSERT INTO `t07_guia_remision` (`cod_guia`, `cod_nota`, `fecha`, `cantidad`, `descripcion`) VALUES
(1, 1, '2018-04-30', 1, 'disco duro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t08_perfil`
--

CREATE TABLE `t08_perfil` (
  `cod_perfil` int(11) NOT NULL,
  `descripcion_perfil` varchar(200) NOT NULL,
  `estado_perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t08_perfil`
--

INSERT INTO `t08_perfil` (`cod_perfil`, `descripcion_perfil`, `estado_perfil`) VALUES
(1, 'Aministrador', 1),
(2, 'Analista', 1),
(3, 'Tecnico', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t09_estado`
--

CREATE TABLE `t09_estado` (
  `cod_estado` int(11) NOT NULL,
  `cod_actividad` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t09_estado`
--

INSERT INTO `t09_estado` (`cod_estado`, `cod_actividad`, `descripcion`, `fecha`) VALUES
(1, 1, 'se instalo el driver ', '2018-04-28'),
(2, 1, 'se configuro nuevamente la PC para el uso del programa', '2018-04-29'),
(3, 2, 'Se configuro la cuenta de correo electronica correctamente', '2018-04-30');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t01_incidencia`
--
ALTER TABLE `t01_incidencia`
  ADD PRIMARY KEY (`cod_incidencia`),
  ADD KEY `cod_estacion` (`cod_estacion`),
  ADD KEY `cod_tecnico` (`cod_persona`);

--
-- Indices de la tabla `t02_persona`
--
ALTER TABLE `t02_persona`
  ADD PRIMARY KEY (`cod_persona`),
  ADD KEY `cod_perfil` (`cod_perfil`);

--
-- Indices de la tabla `t03_actividad`
--
ALTER TABLE `t03_actividad`
  ADD PRIMARY KEY (`cod_actividad`),
  ADD KEY `cod_incidencia` (`cod_incidencia`);

--
-- Indices de la tabla `t04_estacion_servicio`
--
ALTER TABLE `t04_estacion_servicio`
  ADD PRIMARY KEY (`cod_estacion`),
  ADD KEY `cod_cliente` (`cod_cliente`);

--
-- Indices de la tabla `t05_cliente`
--
ALTER TABLE `t05_cliente`
  ADD PRIMARY KEY (`cod_cliente`);

--
-- Indices de la tabla `t06_nota_pedido`
--
ALTER TABLE `t06_nota_pedido`
  ADD PRIMARY KEY (`cod_nota`),
  ADD KEY `cod_incidencia` (`cod_incidencia`);

--
-- Indices de la tabla `t07_guia_remision`
--
ALTER TABLE `t07_guia_remision`
  ADD PRIMARY KEY (`cod_guia`),
  ADD KEY `cod_nota` (`cod_nota`);

--
-- Indices de la tabla `t08_perfil`
--
ALTER TABLE `t08_perfil`
  ADD PRIMARY KEY (`cod_perfil`);

--
-- Indices de la tabla `t09_estado`
--
ALTER TABLE `t09_estado`
  ADD PRIMARY KEY (`cod_estado`),
  ADD KEY `cod_actividad` (`cod_actividad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t01_incidencia`
--
ALTER TABLE `t01_incidencia`
  MODIFY `cod_incidencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `t02_persona`
--
ALTER TABLE `t02_persona`
  MODIFY `cod_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `t03_actividad`
--
ALTER TABLE `t03_actividad`
  MODIFY `cod_actividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `t04_estacion_servicio`
--
ALTER TABLE `t04_estacion_servicio`
  MODIFY `cod_estacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `t06_nota_pedido`
--
ALTER TABLE `t06_nota_pedido`
  MODIFY `cod_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `t07_guia_remision`
--
ALTER TABLE `t07_guia_remision`
  MODIFY `cod_guia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `t08_perfil`
--
ALTER TABLE `t08_perfil`
  MODIFY `cod_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `t09_estado`
--
ALTER TABLE `t09_estado`
  MODIFY `cod_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `t01_incidencia`
--
ALTER TABLE `t01_incidencia`
  ADD CONSTRAINT `t01_incidencia_ibfk_1` FOREIGN KEY (`cod_estacion`) REFERENCES `t04_estacion_servicio` (`cod_estacion`) ON UPDATE CASCADE,
  ADD CONSTRAINT `t01_incidencia_ibfk_2` FOREIGN KEY (`cod_persona`) REFERENCES `t02_persona` (`cod_persona`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `t02_persona`
--
ALTER TABLE `t02_persona`
  ADD CONSTRAINT `t02_persona_ibfk_1` FOREIGN KEY (`cod_perfil`) REFERENCES `t08_perfil` (`cod_perfil`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `t03_actividad`
--
ALTER TABLE `t03_actividad`
  ADD CONSTRAINT `t03_actividad_ibfk_1` FOREIGN KEY (`cod_incidencia`) REFERENCES `t01_incidencia` (`cod_incidencia`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `t04_estacion_servicio`
--
ALTER TABLE `t04_estacion_servicio`
  ADD CONSTRAINT `t04_estacion_servicio_ibfk_1` FOREIGN KEY (`cod_cliente`) REFERENCES `t05_cliente` (`cod_cliente`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `t06_nota_pedido`
--
ALTER TABLE `t06_nota_pedido`
  ADD CONSTRAINT `t06_nota_pedido_ibfk_1` FOREIGN KEY (`cod_incidencia`) REFERENCES `t01_incidencia` (`cod_incidencia`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `t07_guia_remision`
--
ALTER TABLE `t07_guia_remision`
  ADD CONSTRAINT `t07_guia_remision_ibfk_1` FOREIGN KEY (`cod_nota`) REFERENCES `t06_nota_pedido` (`cod_nota`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `t09_estado`
--
ALTER TABLE `t09_estado`
  ADD CONSTRAINT `t09_estado_ibfk_1` FOREIGN KEY (`cod_actividad`) REFERENCES `t03_actividad` (`cod_actividad`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
