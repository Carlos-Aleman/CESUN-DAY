-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2020 at 06:08 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cesunday`
--

-- --------------------------------------------------------

--
-- Table structure for table `departamento`
--

CREATE TABLE `departamento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departamento`
--

INSERT INTO `departamento` (`id`, `nombre`) VALUES
(1, 'Recursos Humanos'),
(2, 'Control Escolar');

-- --------------------------------------------------------

--
-- Table structure for table `puesto`
--

CREATE TABLE `puesto` (
  `id_puesto` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `nombre` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `puesto`
--

INSERT INTO `puesto` (`id_puesto`, `id_departamento`, `nombre`) VALUES
(1, 1, 'Jefe De Recursos Humanos'),
(2, 2, 'Jefe De Control Escolar'),
(3, 2, 'Secretaria'),
(4, 1, 'Secretaria');

-- --------------------------------------------------------

--
-- Table structure for table `tareaglobal`
--

CREATE TABLE `tareaglobal` (
  `id_proyecto` int(11) NOT NULL,
  `nombre_proyecto` varchar(300) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `area_proyecto` varchar(300) NOT NULL,
  `fecha_inicio` varchar(300) NOT NULL,
  `fecha_final` varchar(300) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tareaglobal`
--

INSERT INTO `tareaglobal` (`id_proyecto`, `nombre_proyecto`, `descripcion`, `area_proyecto`, `fecha_inicio`, `fecha_final`, `activo`) VALUES
(1, 'Seguimiento De Codigo 2', 'Se relizara la busqueda de errores en este sistema , de todos lados', 'Recursos Humanos', '09/07/2020 11:41', '09/07/2020 12:18', 0),
(3, 'Seguimiento De Codigo', 'Una breve descripcion del proyecto (Global)', 'Recursos Humanos', '09/07/2020 12:42', '', 1),
(4, 'Seguimiento De Codigo 3', 'Una breve descripcion del proyecto (Global)', 'Control Escolar', '09/07/2020 12:42', '', 1),
(5, 'Seguimiento a reportes 2020', 'Una breve descripcion del proyecto (Global)\r\nxrfyvghjdfghjhf', 'Control Escolar', '09/07/2020 17:52', '', 1),
(6, 'Leer', 'Una breve descripcion del proyecto (Global)', 'Recursos Humanos', '09/07/2020 19:29', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tareas`
--

CREATE TABLE `tareas` (
  `id_tarea` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `nombre` varchar(300) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `usuario` varchar(300) NOT NULL,
  `fecha_inicio` varchar(300) NOT NULL,
  `fecha_limite` varchar(300) NOT NULL,
  `fecha_final` varchar(300) NOT NULL,
  `status` varchar(300) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT 1,
  `subordinado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tareas`
--

INSERT INTO `tareas` (`id_tarea`, `id_proyecto`, `nombre`, `descripcion`, `usuario`, `fecha_inicio`, `fecha_limite`, `fecha_final`, `status`, `activo`, `subordinado`) VALUES
(1, 3, 'Revisar parte 2 del doc', 'revisar toda la parte de la logica', '3', '09/07/2020 15:32', '12/07/2020 15:32', '', '', 1, 0),
(2, 3, 'Ver la secuencia', 'Ver secuencia de grafos', '4', '09/07/2020 17:04', '09/07/2020 17:04', '', '', 1, 0),
(3, 5, 'revisar el articulo 2', 'fffhgjkhjhgbj', '4', '09/07/2020 17:56', '12/07/2020 17:56', '', '', 1, 0),
(4, 6, 'Leer pagina 10', 'fghjkl;', '3', '09/07/2020 19:30', '13/07/2020 19:30', '', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombres` varchar(300) NOT NULL,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `jefe` varchar(300) NOT NULL,
  `departamento` varchar(300) NOT NULL,
  `puesto` varchar(300) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombres`, `username`, `password`, `jefe`, `departamento`, `puesto`, `activo`) VALUES
(1, 'Carlos ', 'root', '$2y$10$CwoJMvwS.elXpkWcOGrvR.Zmk7z5rR9cm7XbXg/DHkXskA43.suKe', 'Admin', 'Recursos Humanos', 'Jefe De Recursos Humanos', 1),
(2, 'Luis ', 'luis', '$2y$10$2P2kmi2t1IZHSnczzubXjOn/Mu/vDnvokdAP/2SIhUzm8EoJDa442', 'No', 'Cobranza', 'cajero', 1),
(3, 'Gilberto Salazar Hernandez', 'root2', '$2y$10$4TPjQGQdFQXIVEuZ6wdhOuYSpGFI/dfYxZpLpH3PmhmjzOkXOThFO', 'Si', 'Control Escolar', 'Jefe De Control Escolar', 1),
(4, 'Julio Cesar Hernandez Lopez', 'root3', '$2y$10$.JS9rQ3sStoTPw92jgwm/es0qVXmnOrOJP7Wgs63cWSf/8xQAxQUS', 'Si', 'Recursos Humanos', 'Jefe De Recursos Humanos', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `puesto`
--
ALTER TABLE `puesto`
  ADD PRIMARY KEY (`id_puesto`);

--
-- Indexes for table `tareaglobal`
--
ALTER TABLE `tareaglobal`
  ADD PRIMARY KEY (`id_proyecto`);

--
-- Indexes for table `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`id_tarea`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `puesto`
--
ALTER TABLE `puesto`
  MODIFY `id_puesto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tareaglobal`
--
ALTER TABLE `tareaglobal`
  MODIFY `id_proyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id_tarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
