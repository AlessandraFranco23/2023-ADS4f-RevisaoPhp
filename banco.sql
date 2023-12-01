-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 30-Nov-2023 às 23:28
-- Versão do servidor: 8.0.35-0ubuntu0.22.04.1
-- versão do PHP: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `aeo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `idAluno` int NOT NULL,
  `nome` varchar(255) NOT NULL,
  `dtNascimento` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `matricula` varchar(255) NOT NULL,
  `curso` varchar(255) NOT NULL,
  `semestre` varchar(255) NOT NULL,
  `dtContratacao` date NOT NULL,
  `idDisciplina` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`idAluno`, `nome`, `dtNascimento`, `email`, `telefone`, `matricula`, `curso`, `semestre`, `dtContratacao`, `idDisciplina`) VALUES
(1, 'John Doe', '1990-01-15', 'john.doe@example.com', '123-456-7890', 'M12345', 'Computer Science', '5th', '2022-01-01', 1),
(2, 'Jane Smith', '1995-03-20', 'jane.smith@example.com', '987-654-3210', 'M54321', 'Electrical Engineering', '3rd', '2022-02-01', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `idDisciplina` int NOT NULL,
  `nome` varchar(255) NOT NULL,
  `codDisciplina` varchar(255) NOT NULL,
  `mensagem` text NOT NULL,
  `horario` time NOT NULL,
  `sala` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`idDisciplina`, `nome`, `codDisciplina`, `mensagem`, `horario`, `sala`) VALUES
(1, 'Database Management', 'DM101', 'Introduction to Database Management', '09:00:00', 'Room 101'),
(2, 'Network Security', 'NS202', 'Advanced Network Security Principles', '14:30:00', 'Room 202');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `idProfessor` int NOT NULL,
  `nome` varchar(255) NOT NULL,
  `dtNascimento` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `registro` varchar(255) NOT NULL,
  `departamento` varchar(255) NOT NULL,
  `cargaHoraria` varchar(255) NOT NULL,
  `idDisciplina` int NOT NULL,
  `dtContratacao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`idProfessor`, `nome`, `dtNascimento`, `email`, `telefone`, `registro`, `departamento`, `cargaHoraria`, `idDisciplina`, `dtContratacao`) VALUES
(1, 'Professor A', '1985-05-10', 'professor.a@example.com', '555-123-4567', 'P98765', 'Computer Science Department', '20 hours per week', 1, '2022-01-15'),
(2, 'Professor B', '1978-11-25', 'professor.b@example.com', '555-987-6543', 'P54321', 'Electrical Engineering Department', '25 hours per week', 2, '2022-02-15');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`idAluno`),
  ADD KEY `idDisciplina` (`idDisciplina`);

--
-- Índices para tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`idDisciplina`);

--
-- Índices para tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`idProfessor`),
  ADD KEY `idDisciplina` (`idDisciplina`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `idAluno` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `idDisciplina` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `idProfessor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `aluno_ibfk_1` FOREIGN KEY (`idDisciplina`) REFERENCES `disciplina` (`idDisciplina`);

--
-- Limitadores para a tabela `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `professor_ibfk_1` FOREIGN KEY (`idDisciplina`) REFERENCES `disciplina` (`idDisciplina`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
