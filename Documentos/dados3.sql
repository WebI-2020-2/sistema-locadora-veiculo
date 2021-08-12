-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Ago-2021 às 23:41
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dados3`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluguel`
--

CREATE TABLE `aluguel` (
  `idaluguel` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `diaria` varchar(200) NOT NULL,
  `datalocacao` date NOT NULL,
  `combustivelatual` varchar(200) NOT NULL,
  `ativo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aluguel`
--

INSERT INTO `aluguel` (`idaluguel`, `idcliente`, `diaria`, `datalocacao`, `combustivelatual`, `ativo`) VALUES
(1, 3, '220', '2021-08-07', '1000', 0),
(2, 3, '200', '2021-08-07', '6', 0),
(3, 5, '150', '2021-08-11', '55', 1),
(4, 8, '500', '2021-08-11', '55', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `telefone` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`idcliente`, `nome`, `email`, `endereco`, `telefone`) VALUES
(3, 'luana silva', 'luanacocos22@gmail.com', 'rua seis de agosto', '(77) 9812-1212'),
(5, 'lucas', 'uhull@ha.com', 'rua dos doidos ', '7788955455'),
(6, 'llsl', 'aha@gmail.com', 'rua dos doidos', '8845542212354'),
(7, 'lucas', 'y@huas.com', 'rrra', '(77) 88854-6652'),
(8, 'adsdasda', 'uiohawsjikdhjkas@hus.com', 'jashdfkjashdfsjklça', '(74) 56556-5656');

-- --------------------------------------------------------

--
-- Estrutura da tabela `devolucao`
--

CREATE TABLE `devolucao` (
  `iddevolucao` int(11) NOT NULL,
  `total` varchar(200) NOT NULL,
  `idaluguel` int(11) NOT NULL,
  `combustiveldevolucao` varchar(200) NOT NULL,
  `extra` varchar(200) NOT NULL,
  `datadevolucao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `devolucao`
--

INSERT INTO `devolucao` (`iddevolucao`, `total`, `idaluguel`, `combustiveldevolucao`, `extra`, `datadevolucao`) VALUES
(14, '1062', 2, '2', '230', '2021-08-11'),
(15, '7474', 1, '11', '220', '2021-08-13'),
(16, '530', 4, '50', '0', '2021-08-12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `idfuncionario` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `cpf` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itemaluguel`
--

CREATE TABLE `itemaluguel` (
  `iditemaluguel` int(11) NOT NULL,
  `idaluguel` int(11) NOT NULL,
  `idveiculo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `itemaluguel`
--

INSERT INTO `itemaluguel` (`iditemaluguel`, `idaluguel`, `idveiculo`) VALUES
(4, 1, 4),
(5, 2, 5),
(6, 3, 6),
(7, 4, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelo`
--

CREATE TABLE `modelo` (
  `idmodelo` int(11) NOT NULL,
  `descricao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `modelo`
--

INSERT INTO `modelo` (`idmodelo`, `descricao`) VALUES
(2, 'ford');

-- --------------------------------------------------------

--
-- Estrutura da tabela `seguro`
--

CREATE TABLE `seguro` (
  `idseguro` int(11) NOT NULL,
  `datafinal` date NOT NULL,
  `datainicio` date NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `seguro`
--

INSERT INTO `seguro` (`idseguro`, `datafinal`, `datainicio`, `valor`) VALUES
(2, '2021-08-06', '2021-08-06', 200);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipoveiculo`
--

CREATE TABLE `tipoveiculo` (
  `idtipoveiculo` int(11) NOT NULL,
  `descricao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipoveiculo`
--

INSERT INTO `tipoveiculo` (`idtipoveiculo`, `descricao`) VALUES
(2, 'carro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculo`
--

CREATE TABLE `veiculo` (
  `idveiculo` int(11) NOT NULL,
  `idtipoveiculo` int(11) NOT NULL,
  `idmodelo` int(11) NOT NULL,
  `idseguro` int(11) NOT NULL,
  `ano` varchar(200) NOT NULL,
  `cor` varchar(200) NOT NULL,
  `placa` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `nome` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `veiculo`
--

INSERT INTO `veiculo` (`idveiculo`, `idtipoveiculo`, `idmodelo`, `idseguro`, `ano`, `cor`, `placa`, `status`, `nome`) VALUES
(2, 2, 2, 2, '2010', 'rosa', 'III5I55', 'disponivel', 'carro1'),
(4, 2, 2, 2, '2012', 'rosa', 'i9i1e12', 'disponivel', 'carro2'),
(5, 2, 2, 2, '1995', 'verde', 'jku6655', 'disponivel', 'number'),
(6, 2, 2, 2, '2023', 'yrdd', 'YUB8D54', 'indisponivel', 'o ford do futuro'),
(7, 2, 2, 2, '2022', 'sadsda', 'YAU5S44', 'disponivel', 'hurragh');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aluguel`
--
ALTER TABLE `aluguel`
  ADD PRIMARY KEY (`idaluguel`),
  ADD KEY `idcliente` (`idcliente`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`);

--
-- Índices para tabela `devolucao`
--
ALTER TABLE `devolucao`
  ADD PRIMARY KEY (`iddevolucao`),
  ADD KEY `idaluguel` (`idaluguel`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`idfuncionario`);

--
-- Índices para tabela `itemaluguel`
--
ALTER TABLE `itemaluguel`
  ADD PRIMARY KEY (`iditemaluguel`),
  ADD KEY `idaluguel` (`idaluguel`),
  ADD KEY `idveiculo` (`idveiculo`);

--
-- Índices para tabela `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`idmodelo`);

--
-- Índices para tabela `seguro`
--
ALTER TABLE `seguro`
  ADD PRIMARY KEY (`idseguro`);

--
-- Índices para tabela `tipoveiculo`
--
ALTER TABLE `tipoveiculo`
  ADD PRIMARY KEY (`idtipoveiculo`);

--
-- Índices para tabela `veiculo`
--
ALTER TABLE `veiculo`
  ADD PRIMARY KEY (`idveiculo`),
  ADD KEY `idmodelo` (`idmodelo`),
  ADD KEY `idseguro` (`idseguro`),
  ADD KEY `idtipoveiculo` (`idtipoveiculo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluguel`
--
ALTER TABLE `aluguel`
  MODIFY `idaluguel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `devolucao`
--
ALTER TABLE `devolucao`
  MODIFY `iddevolucao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `idfuncionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `itemaluguel`
--
ALTER TABLE `itemaluguel`
  MODIFY `iditemaluguel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `modelo`
--
ALTER TABLE `modelo`
  MODIFY `idmodelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `seguro`
--
ALTER TABLE `seguro`
  MODIFY `idseguro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tipoveiculo`
--
ALTER TABLE `tipoveiculo`
  MODIFY `idtipoveiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `veiculo`
--
ALTER TABLE `veiculo`
  MODIFY `idveiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `aluguel`
--
ALTER TABLE `aluguel`
  ADD CONSTRAINT `aluguel_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`) ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `devolucao`
--
ALTER TABLE `devolucao`
  ADD CONSTRAINT `devolucao_ibfk_1` FOREIGN KEY (`idaluguel`) REFERENCES `aluguel` (`idaluguel`) ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `veiculo`
--
ALTER TABLE `veiculo`
  ADD CONSTRAINT `veiculo_ibfk_1` FOREIGN KEY (`idmodelo`) REFERENCES `modelo` (`idmodelo`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `veiculo_ibfk_2` FOREIGN KEY (`idseguro`) REFERENCES `seguro` (`idseguro`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `veiculo_ibfk_3` FOREIGN KEY (`idtipoveiculo`) REFERENCES `tipoveiculo` (`idtipoveiculo`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
