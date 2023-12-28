-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql100.byetcluster.com
-- Tempo de geração: 27/09/2023 às 21:54
-- Versão do servidor: 10.6.15-MariaDB
-- Versão do PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `b10_35096088_tecconnect`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` smallint(6) NOT NULL,
  `nome_curso` varchar(255) NOT NULL,
  `descricao_curso` text NOT NULL,
  `data` date DEFAULT NULL,
  `prazo_de_inscricao` date DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fim` time DEFAULT NULL,
  `num_vagas` smallint(6) DEFAULT NULL,
  `vagas_disponiveis` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cursos`
--

INSERT INTO `cursos` (`id_curso`, `nome_curso`, `descricao_curso`, `data`, `prazo_de_inscricao`, `hora_inicio`, `hora_fim`, `num_vagas`, `vagas_disponiveis`) VALUES
(1, 'Excel', 'Aprenda PHP do básico ao avançado.', '2023-10-15', '2023-10-10', '09:00:00', '16:00:00', 20, 0),
(2, 'Canva', 'Crie designs incríveis com ferramentas populares.', '2023-09-20', '2023-09-15', '10:00:00', '15:00:00', 20, 0),
(3, 'Windows 10', 'Aprimore suas habilidades fotográficas.', '2023-11-05', '2023-10-30', '14:00:00', '17:00:00', 20, 9),
(4, 'Nuvem', 'Domine as estratégias de marketing online.', '2023-09-30', '2023-09-25', '18:30:00', '20:30:00', 20, 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cursos_senac`
--

CREATE TABLE `cursos_senac` (
  `id_curso_senac` smallint(6) NOT NULL,
  `nome_curso_senac` varchar(255) DEFAULT NULL,
  `codigo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cursos_senac`
--

INSERT INTO `cursos_senac` (`id_curso_senac`, `nome_curso_senac`, `codigo`) VALUES
(1, 'Técnico em administração', '153'),
(2, 'Técnico em Logística', '154'),
(3, 'Técnico em Recursos Humanos', '155'),
(4, 'Técnico em Segurança do Trabalho', '121'),
(5, 'Técnico em Logística', '42'),
(6, 'Técnico em Segurança do Trabalho', '211'),
(7, 'Libras Básico', '177'),
(8, 'Recepcionista', '128');

-- --------------------------------------------------------

--
-- Estrutura para tabela `inscritos`
--

CREATE TABLE `inscritos` (
  `id_inscrito` smallint(6) NOT NULL,
  `nome_completo` varchar(255) DEFAULT NULL,
  `fk_id_curso` smallint(6) DEFAULT NULL,
  `fk_id_curso_senac` smallint(6) DEFAULT NULL,
  `turno` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `inscritos`
--

INSERT INTO `inscritos` (`id_inscrito`, `nome_completo`, `fk_id_curso`, `fk_id_curso_senac`, `turno`) VALUES
(8, 'Esther Gonçalves de Araujo ', 1, 8, 'Noturno'),
(11, 'Edna santos Araújo Alvarenga', 1, 4, 'Noturno'),
(12, 'Josiane serqueira marques ', 1, 4, 'Noturno'),
(13, 'Edna santos Araujo Alvarenga', 3, 4, 'Noturno'),
(14, 'Edna Santos Araújo Alvarenga ', 2, 4, 'Noturno'),
(15, 'Ianke Cravo Becalli', 1, 2, 'Noturno'),
(16, 'Ianke Cravo Becalli', 2, 2, 'Noturno'),
(17, 'Isabel Cristina da Silva Barros ', 1, 8, 'Noturno'),
(18, 'Isabel Cristina da Silva Barros ', 3, 8, 'Noturno'),
(19, 'Eliane aparecida de almeida ', 1, 8, 'Noturno'),
(20, 'Magda Guilhermino Bastos ', 3, 8, 'Noturno'),
(21, 'Elizabeth nogueira de oliveira ', 1, 8, 'Noturno'),
(22, 'Mikaellen Barreira ', 2, 2, 'Noturno'),
(23, 'CINTIA INOCENTE', 1, 8, 'Noturno'),
(24, 'Mikaellen Barreira ', 1, 2, 'Noturno'),
(25, 'Clecia Ferreira', 1, 1, 'Noturno'),
(26, 'Franciele de Almeida ', 1, 8, 'Noturno'),
(27, 'Sara Moura Campos ', 1, 2, 'Noturno'),
(28, 'Kamilly Lopes Fabres ', 2, 2, 'Noturno'),
(29, 'Ivone Guimarães Faroni ', 2, 2, 'Noturno'),
(30, 'Francieli dos anjos jovencio ', 1, 8, 'Noturno'),
(32, 'Ivone Guimarães Faroni ', 1, 2, 'Noturno'),
(38, 'Jessica da Cruz Santana ', 1, 6, 'Noturno'),
(39, 'Lazarela Guasti de Moura Renon', 1, 1, 'Noturno'),
(47, 'chris', NULL, 1, 'Matutino'),
(48, 'Géssica Laiza da silva baima', 4, 2, 'Noturno'),
(49, 'Leiriane Pereira Machado ', 2, 3, 'Noturno'),
(50, 'Leiriane Pereira Machado ', 1, 3, 'Noturno'),
(51, 'Laysla de oliveira Machado ', 2, 2, 'Noturno'),
(52, 'Érica Pratti ', 1, 8, 'Noturno'),
(53, 'Érica Pratti ', 3, 8, 'Noturno'),
(54, 'Samuel Nascimento de Souza ', 1, 6, 'Noturno'),
(55, 'Edivan ilioterio marques ', 3, 6, 'Noturno'),
(56, 'Shakira', 1, 1, 'Matutino'),
(57, 'Michael Colins', 3, 7, 'Noturno'),
(58, 'NAYARA ARANHA', 2, 3, 'Noturno'),
(59, 'ANA LUISA GARCIA', 2, 3, 'Noturno'),
(60, 'ANA LUISA GARCIA', 4, 3, 'Noturno'),
(61, 'JUSSARA SOUZA', 2, 3, 'Noturno'),
(62, 'MARIA EDUARDA', 2, 3, 'Noturno'),
(63, 'MARCELO TIBUTINO', 2, 3, 'Noturno'),
(64, 'IRIS MEIRE', 2, 3, 'Noturno'),
(65, 'MAERLAINE LIMA', 2, 3, 'Noturno'),
(66, 'GREICIANE DOS SANTOS', 2, 3, 'Noturno'),
(67, 'DILRIS DA SILVA', 2, 3, 'Noturno'),
(68, 'JANAELI NASCIMENTO', 2, 3, 'Noturno'),
(69, 'ANDREA ALVES', 2, 3, 'Noturno'),
(70, 'ROSANGELA TOSTI', 3, 3, 'Noturno'),
(71, 'RITIELLY RIMIDIO ', 3, 3, 'Noturno'),
(72, 'ANA LUISA GARCIA', 3, 3, 'Noturno'),
(73, 'Eliane aparecida de almeida ', 2, 8, 'Noturno'),
(74, 'Franciele de Almeida ', 2, 8, 'Noturno'),
(75, 'Edson Gripa ', 4, 2, 'Noturno'),
(76, 'Edson Gripa ', 3, 2, 'Noturno'),
(77, 'Ana Cláudia Nogueira da Rocha piao ', 3, 1, 'Noturno'),
(78, 'Icaro souza', 4, 6, 'Vespertino'),
(79, 'Vanessa Oliveira Mendes', 4, 5, 'Matutino'),
(80, 'Ketlen Sincora', 4, 7, 'Noturno'),
(81, 'Thiago Lopes', 4, 7, 'Matutino'),
(82, 'Kimberly Meireles', 4, 1, 'Noturno'),
(83, 'Samuel Batista Cruz', 4, 1, 'Matutino'),
(84, 'Anna Cristina', 4, 2, 'Noturno'),
(85, 'Harry Potter', 4, 6, 'Matutino'),
(86, 'Scott Summers', 4, 4, 'Matutino'),
(87, ' Jean Grey', 4, 1, 'Noturno'),
(88, 'Pedro Vieira', 4, 1, 'Noturno'),
(89, 'Tamyris da Silva Oliveira ', 4, 2, 'Noturno');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`);

--
-- Índices de tabela `cursos_senac`
--
ALTER TABLE `cursos_senac`
  ADD PRIMARY KEY (`id_curso_senac`);

--
-- Índices de tabela `inscritos`
--
ALTER TABLE `inscritos`
  ADD PRIMARY KEY (`id_inscrito`),
  ADD KEY `id_curso` (`fk_id_curso`),
  ADD KEY `id_curso_senac` (`fk_id_curso_senac`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `cursos_senac`
--
ALTER TABLE `cursos_senac`
  MODIFY `id_curso_senac` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `inscritos`
--
ALTER TABLE `inscritos`
  MODIFY `id_inscrito` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `inscritos`
--
ALTER TABLE `inscritos`
  ADD CONSTRAINT `inscritos_ibfk_1` FOREIGN KEY (`fk_id_curso`) REFERENCES `cursos` (`id_curso`),
  ADD CONSTRAINT `inscritos_ibfk_2` FOREIGN KEY (`fk_id_curso_senac`) REFERENCES `cursos_senac` (`id_curso_senac`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
