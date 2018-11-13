-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07-Nov-2018 às 10:50
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knn`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `cod` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `rg` varchar(15) NOT NULL,
  `datanascimento` date NOT NULL,
  `telefonealuno` varchar(15) NOT NULL,
  `nomeresponsavel` varchar(150) DEFAULT NULL,
  `telefoneresponsavel` varchar(15) DEFAULT NULL,
  `rua` varchar(50) NOT NULL,
  `numero` int(11) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(50) CHARACTER SET big5 NOT NULL,
  `estado` varchar(2) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `alergiaalimentar` varchar(250) DEFAULT NULL,
  `remedio` varchar(250) DEFAULT NULL,
  `alergia` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`cod`, `nome`, `cpf`, `rg`, `datanascimento`, `telefonealuno`, `nomeresponsavel`, `telefoneresponsavel`, `rua`, `numero`, `bairro`, `cidade`, `estado`, `cep`, `email`, `alergiaalimentar`, `remedio`, `alergia`) VALUES
(15, 'Aluno1', '122.800.826-40', '21.329.959', '1999-01-19', '35-98403-6830', 'Mae', '35-94002-8922', 'Rua 1', 21, 'Bairro', 'Cidade', 'UF', '37660-000', 'aluno1@gmail.com', 'Pao', 'Gardenal', 'Idiotas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aulas`
--

CREATE TABLE `aulas` (
  `cod` int(11) NOT NULL,
  `conteudo` varchar(150) NOT NULL,
  `dataaula` date NOT NULL,
  `turma_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aulas`
--

INSERT INTO `aulas` (`cod`, `conteudo`, `dataaula`, `turma_cod`) VALUES
(1, 'aula1', '2018-11-07', 22);

-- --------------------------------------------------------

--
-- Estrutura da tabela `boletim`
--

CREATE TABLE `boletim` (
  `cod` int(11) NOT NULL,
  `falta` int(11) DEFAULT NULL,
  `nota1` float DEFAULT NULL,
  `nota2` float DEFAULT NULL,
  `nota3` float DEFAULT NULL,
  `nota4` float DEFAULT NULL,
  `nota5` float DEFAULT NULL,
  `nota6` float DEFAULT NULL,
  `media` float DEFAULT NULL,
  `reposicao` int(11) DEFAULT NULL,
  `aluno_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `boletim`
--

INSERT INTO `boletim` (`cod`, `falta`, `nota1`, `nota2`, `nota3`, `nota4`, `nota5`, `nota6`, `media`, `reposicao`, `aluno_cod`) VALUES
(1, 2, 5, 6, 8, 10, 10, 6, 7.5, 1, 15);

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `nome` varchar(45) NOT NULL,
  `duracao` int(11) NOT NULL,
  `cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`nome`, `duracao`, `cod`) VALUES
('Ingles', 0, 14);

-- --------------------------------------------------------

--
-- Estrutura da tabela `frequencia`
--

CREATE TABLE `frequencia` (
  `aluno_cod` int(11) NOT NULL,
  `aulas_cod` int(11) NOT NULL,
  `falta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `frequencia`
--

INSERT INTO `frequencia` (`aluno_cod`, `aulas_cod`, `falta`) VALUES
(15, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `interessados`
--

CREATE TABLE `interessados` (
  `cod` int(11) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `privilegio` int(11) DEFAULT NULL,
  `datav` date DEFAULT NULL,
  `horario` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `usuario` varchar(16) NOT NULL,
  `senha` varchar(16) NOT NULL,
  `privilegio` varchar(3) NOT NULL,
  `al` varchar(15) DEFAULT NULL,
  `pr` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`usuario`, `senha`, `privilegio`, `al`, `pr`) VALUES
('adm', 'adm', 'adm', NULL, NULL),
('aluno', 'aluno', 'usr', '122.800.826-40', NULL),
('professor', 'professor', 'prf', NULL, '565.465.465-46');

-- --------------------------------------------------------

--
-- Estrutura da tabela `matricula`
--

CREATE TABLE `matricula` (
  `datamatricula` date NOT NULL,
  `aluno_cod` int(11) NOT NULL,
  `turma_cod` int(11) NOT NULL,
  `curso` varchar(7) NOT NULL,
  `datapagamento` date NOT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `matricula`
--

INSERT INTO `matricula` (`datamatricula`, `aluno_cod`, `turma_cod`, `curso`, `datapagamento`, `status`) VALUES
('2018-11-07', 15, 22, 'Ingles', '2018-12-30', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentos`
--

CREATE TABLE `pagamentos` (
  `cod` int(11) NOT NULL,
  `codAluno` int(11) NOT NULL,
  `valor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `cod` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `rg` varchar(15) NOT NULL,
  `rua` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `numero` int(11) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`cod`, `nome`, `cpf`, `rg`, `rua`, `email`, `telefone`, `numero`, `bairro`, `cidade`, `estado`) VALUES
(8, 'Professor', '565.465.465-46', '12.312.313', 'Rua 10', 'professor@gmail.com', '35-98425-4596', 20, 'Bairro', 'Cidade', 'UF');

-- --------------------------------------------------------

--
-- Estrutura da tabela `recado`
--

CREATE TABLE `recado` (
  `cod` int(11) NOT NULL,
  `recado` varchar(500) NOT NULL,
  `turma_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `cod` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `codProf` int(11) NOT NULL,
  `qtd` int(11) NOT NULL,
  `curso_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`cod`, `nome`, `codProf`, `qtd`, `curso_cod`) VALUES
(22, 'Turma1', 8, 10, 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`cod`),
  ADD UNIQUE KEY `cpf_UNIQUE` (`cpf`),
  ADD UNIQUE KEY `rg_UNIQUE` (`rg`);

--
-- Indexes for table `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `fk_aulas_turma1_idx` (`turma_cod`);

--
-- Indexes for table `boletim`
--
ALTER TABLE `boletim`
  ADD PRIMARY KEY (`aluno_cod`,`cod`),
  ADD KEY `fk_boletim_aluno1_idx` (`aluno_cod`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`cod`);

--
-- Indexes for table `frequencia`
--
ALTER TABLE `frequencia`
  ADD PRIMARY KEY (`aulas_cod`,`aluno_cod`),
  ADD KEY `fk_frequencia_aluno1_idx` (`aluno_cod`);

--
-- Indexes for table `interessados`
--
ALTER TABLE `interessados`
  ADD PRIMARY KEY (`cod`),
  ADD UNIQUE KEY `horario_UNIQUE` (`horario`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`usuario`),
  ADD KEY `fk_login_aluno1_idx` (`al`),
  ADD KEY `fk_login_professor1_idx` (`pr`);

--
-- Indexes for table `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`aluno_cod`,`turma_cod`),
  ADD KEY `fk_matricula_turma1_idx` (`turma_cod`);

--
-- Indexes for table `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `fk_pagamentos_aluno1_idx` (`codAluno`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`cod`),
  ADD UNIQUE KEY `cpf_UNIQUE` (`cpf`),
  ADD UNIQUE KEY `rg_UNIQUE` (`rg`);

--
-- Indexes for table `recado`
--
ALTER TABLE `recado`
  ADD PRIMARY KEY (`cod`,`turma_cod`),
  ADD KEY `fk_recado_turma1_idx` (`turma_cod`);

--
-- Indexes for table `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`cod`,`curso_cod`),
  ADD KEY `fk_turma_professor1_idx` (`codProf`),
  ADD KEY `curso_cod` (`curso_cod`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aluno`
--
ALTER TABLE `aluno`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `interessados`
--
ALTER TABLE `interessados`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pagamentos`
--
ALTER TABLE `pagamentos`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `turma`
--
ALTER TABLE `turma`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aulas`
--
ALTER TABLE `aulas`
  ADD CONSTRAINT `fk_aulas_turma1` FOREIGN KEY (`turma_cod`) REFERENCES `turma` (`cod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `boletim`
--
ALTER TABLE `boletim`
  ADD CONSTRAINT `fk_boletim_aluno1` FOREIGN KEY (`aluno_cod`) REFERENCES `aluno` (`cod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `frequencia`
--
ALTER TABLE `frequencia`
  ADD CONSTRAINT `fk_frequencia_aluno1` FOREIGN KEY (`aluno_cod`) REFERENCES `aluno` (`cod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `frequencia_ibfk_1` FOREIGN KEY (`aulas_cod`) REFERENCES `aulas` (`cod`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `fk_login_aluno1` FOREIGN KEY (`al`) REFERENCES `aluno` (`cpf`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_login_professor1` FOREIGN KEY (`pr`) REFERENCES `professor` (`cpf`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `fk_matricula_aluno1` FOREIGN KEY (`aluno_cod`) REFERENCES `aluno` (`cod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_matricula_turma1` FOREIGN KEY (`turma_cod`) REFERENCES `turma` (`cod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD CONSTRAINT `fk_pagamentos_aluno1` FOREIGN KEY (`codAluno`) REFERENCES `aluno` (`cod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `recado`
--
ALTER TABLE `recado`
  ADD CONSTRAINT `fk_recado_turma1` FOREIGN KEY (`turma_cod`) REFERENCES `turma` (`cod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `fk_turma_professor1` FOREIGN KEY (`codProf`) REFERENCES `professor` (`cod`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
