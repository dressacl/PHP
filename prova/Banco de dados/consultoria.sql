-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Mar-2020 às 00:25
-- Versão do servidor: 10.1.39-MariaDB
-- versão do PHP: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `consultoria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `consultor`
--

CREATE TABLE `consultor` (
  `id_consultor` int(11) NOT NULL,
  `nome_con` varchar(60) NOT NULL,
  `num_ident` varchar(12) NOT NULL,
  `especializacao` varchar(15) NOT NULL,
  `hrs_trab` varchar(10) NOT NULL,
  `funcao` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `consultor`
--

INSERT INTO `consultor` (`id_consultor`, `nome_con`, `num_ident`, `especializacao`, `hrs_trab`, `funcao`) VALUES
(1, 'Andressa', '20.239.459', 'PHP', '30', 'Lider'),
(2, 'Wilson', '10.345.675', 'JAVA', '30', 'Membro'),
(3, 'Giulia', '28.392.936', 'IOT', '30', 'Membro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL,
  `end_emp` varchar(100) DEFAULT NULL,
  `nome_emp` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `end_emp`, `nome_emp`) VALUES
(1, 'AV Santana', 'LDR'),
(3, 'Rua Rubi', 'ACL');

-- --------------------------------------------------------

--
-- Estrutura da tabela `participantes`
--

CREATE TABLE `participantes` (
  `id_projeto` int(11) NOT NULL,
  `id_consultor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `participantes`
--

INSERT INTO `participantes` (`id_projeto`, `id_consultor`) VALUES
(3, 2),
(3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeto`
--

CREATE TABLE `projeto` (
  `id_projeto` int(11) NOT NULL,
  `data_in` date NOT NULL,
  `data_ter` date NOT NULL,
  `valor` double NOT NULL,
  `id_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `projeto`
--

INSERT INTO `projeto` (`id_projeto`, `data_in`, `data_ter`, `valor`, `id_empresa`) VALUES
(3, '2020-03-04', '2020-03-26', 999.99, 1),
(4, '2020-03-04', '2020-03-12', 500.3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consultor`
--
ALTER TABLE `consultor`
  ADD PRIMARY KEY (`id_consultor`);

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indexes for table `participantes`
--
ALTER TABLE `participantes`
  ADD KEY `id_projeto` (`id_projeto`),
  ADD KEY `id_consultor` (`id_consultor`);

--
-- Indexes for table `projeto`
--
ALTER TABLE `projeto`
  ADD PRIMARY KEY (`id_projeto`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consultor`
--
ALTER TABLE `consultor`
  MODIFY `id_consultor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `projeto`
--
ALTER TABLE `projeto`
  MODIFY `id_projeto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `participantes`
--
ALTER TABLE `participantes`
  ADD CONSTRAINT `participantes_ibfk_1` FOREIGN KEY (`id_projeto`) REFERENCES `projeto` (`id_projeto`),
  ADD CONSTRAINT `participantes_ibfk_2` FOREIGN KEY (`id_consultor`) REFERENCES `consultor` (`id_consultor`);

--
-- Limitadores para a tabela `projeto`
--
ALTER TABLE `projeto`
  ADD CONSTRAINT `projeto_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
