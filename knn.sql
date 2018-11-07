-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06-Nov-2018 às 16:42
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
(10, 'Wellington Augusto Morais Santos', '122.800.826-40', '21.329.959', '1999-01-19', '35-98403-6830', 'MÃ£e', '35-94002-8922', 'Rua 2', 221, 'Residencial ParaÃ­so', 'Parais?polis', 'MG', '37660-000', 'wellingtonmoraisrx@gmail.com', '', 'Celestrat', 'Idiota'),
(13, 'Elias', '55555', '2222222222', '2018-10-02', '2222222222', NULL, NULL, 'XD', 21, 'XD', 'XD', 'RX', 'RX', 'eliasotario@souotariomemo.com', NULL, NULL, NULL);

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
(1, 'teste', '2018-11-06', 11),
(2, 'xd', '2018-10-31', 11),
(3, 'xd', '2018-10-31', 11),
(4, 'xd', '2018-10-31', 11),
(5, 'xd', '2018-10-31', 11),
(6, 'xd', '2018-10-31', 11),
(7, 'xd', '2018-10-31', 11),
(8, 'xd', '2018-10-31', 11),
(9, 'xd', '2018-10-31', 11),
(10, 'xd', '2018-10-31', 11),
(11, 'xd', '2018-10-31', 11),
(12, 'xd', '2018-10-31', 11),
(13, 'xd', '2018-10-31', 11),
(14, 'xd', '2018-10-31', 11),
(15, 'xd', '2018-10-31', 11),
(16, 'xd', '2018-10-31', 11),
(17, 'xd', '2018-10-31', 11),
(18, 'xd', '2018-10-31', 11),
(19, 'xd', '2018-10-31', 11),
(20, 'xd', '2018-10-31', 11),
(21, 'xd', '2018-10-31', 11),
(22, 'dasdsa', '2018-10-30', 11),
(23, 'dasdsa', '2018-10-30', 11),
(24, 'testeee', '2018-11-06', 11),
(25, 'aula54', '2018-11-06', 11),
(26, 'aula20', '2018-11-06', 11),
(27, 'aulinhadocaralho', '2018-11-06', 11),
(28, 'XD', '2018-11-06', 11),
(29, 'adsdas', '2018-10-30', 11);

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
(1, 2, 5, 5, 5, 5, 5, 5, 5, 1, 10),
(0, 3, 7, 7, 5, NULL, NULL, NULL, NULL, 3, 13);

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
('InglÃªs', 18, 12);

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
(10, 26, 1),
(13, 26, 0),
(10, 27, 1),
(13, 27, 0),
(10, 28, 1),
(13, 28, 1);

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
('elias', 'elias', 'usr', '55555', NULL),
('napaula', 'napaula', 'prf', NULL, '149.379.026-96'),
('well', 'well', 'usr', '122.800.826-40', NULL),
('xdxd', 'xdxd', 'prf', NULL, '124124124');

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
('2018-10-16', 10, 11, 'InglÃªs', '2018-11-30', NULL),
('2018-10-25', 13, 11, 'InglÃªs', '2018-10-30', NULL);

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
(4, 'Ana Paula da Silva', '149.379.026-96', '21.327.024', 'SÃ­tio Santo AntÃ´nio S/N', 'napaulabiruta@nha.com', '35 9 8408-362', 24, 'Santo AntÃ´nio', 'ParaisÃ³polis', 'MG'),
(5, 'aaaaaaa', '124124124', '12142124', '1214214', '12412414', '1241241241', 21, 'dd', 'dadasd', 'dd');

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
(11, 'Kinder 5B', 4, 5, 12),
(12, 'Turma1', 4, 10, 12),
(13, 'Turma2', 4, 10, 12),
(14, 'Turma3', 4, 10, 12),
(15, 'caraca', 4, 50, 12),
(16, 'claracol', 4, 40, 12),
(17, 'kkk', 4, 50, 12),
(18, 'hsadghjsagdjhdg', 5, 10, 12);

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
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `turma`
--
ALTER TABLE `turma`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
