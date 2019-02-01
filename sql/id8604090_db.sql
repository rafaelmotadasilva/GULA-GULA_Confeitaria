-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 22-Nov-2018 às 19:31
-- Versão do servidor: 5.7.23
-- versão do PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loja_virtual`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_categoria` varchar(32) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `descricao_categoria`) VALUES
(2, 'Chocolates'),
(3, 'Trufas'),
(4, 'Colomba Pascal'),
(5, 'Pães de Mel'),
(6, 'Panetones');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(32) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `email` varchar(32) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `cep` varchar(28) DEFAULT NULL,
  `estado` varchar(32) DEFAULT NULL,
  `cidade` varchar(32) DEFAULT NULL,
  `endereco` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome`, `usuario`, `email`, `senha`, `cep`, `estado`, `cidade`, `endereco`) VALUES
(28, 'Rafael', 'rafael', 'rafael.silva1696@etec.sp.gov.br', '81dc9bdb52d04dc20036dbd8313ed055', '09180360', 'SP', 'Santo Andre', 'Rua 307');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

DROP TABLE IF EXISTS `contato`;
CREATE TABLE IF NOT EXISTS `contato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(32) NOT NULL,
  `sobrenome` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `mensagem` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`id`, `nome`, `sobrenome`, `email`, `mensagem`, `created`, `modified`) VALUES
(8, 'Rafael', 'Mota', 'rafael.silva1696@etec.sp.gov.br', 'Ola Adm.', '2018-11-22 15:27:33', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_pedido`
--

DROP TABLE IF EXISTS `itens_pedido`;
CREATE TABLE IF NOT EXISTS `itens_pedido` (
  `id_itens_pedidos` int(11) NOT NULL AUTO_INCREMENT,
  `id_pedido` int(11) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `valor_produto` double DEFAULT NULL,
  `valor_total` double DEFAULT NULL,
  PRIMARY KEY (`id_itens_pedidos`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `itens_pedido`
--

INSERT INTO `itens_pedido` (`id_itens_pedidos`, `id_pedido`, `id_produto`, `quantidade`, `valor_produto`, `valor_total`) VALUES
(48, 79, 205, 1, 19, 19);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `id_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `data_pedido` date DEFAULT NULL,
  `data_hora_pedido` datetime DEFAULT NULL,
  `valor_pedido` double DEFAULT NULL,
  `status_pedido` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pedido`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `data_pedido`, `data_hora_pedido`, `valor_pedido`, `status_pedido`) VALUES
(79, '2018-11-22', '2018-11-22 17:12:45', 19, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `arquivo` varchar(64) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `nome_produto` varchar(32) DEFAULT NULL,
  `valor_produto` double DEFAULT NULL,
  `descricao_produto` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id_produto`)
) ENGINE=InnoDB AUTO_INCREMENT=215 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `arquivo`, `id_categoria`, `nome_produto`, `valor_produto`, `descricao_produto`) VALUES
(204, 'adm/galeria/upload/banana-com-avela.jpg', 2, 'Banana com AvelÃ£', 19, 'Brownie de chocolate com banana e avelÃ£.'),
(205, 'adm/galeria/upload/cachaca-e-passas.jpg', 2, 'CachaÃ§a e Passas', 19, 'Ganache de Chocolate Preto com Passas Ã  CachaÃ§a.'),
(207, 'adm/galeria/upload/cake.jpg', 3, 'Trufas de Chocolate', 29, 'Com Creme de Leite e Conhaque.'),
(208, 'adm/galeria/upload/castanha-do-para.jpg', 3, 'Castanha do ParÃ¡', 28, 'Trufas Com Castanha do ParÃ¡'),
(209, 'adm/galeria/upload/choc.jpg', 4, 'Pistache', 39, 'Colomba Pascal com Pistache.'),
(210, 'adm/galeria/upload/creme_de_cacau.jpg', 4, 'Creme de AvelÃ£', 39, 'Com Creme de Cacau ao invÃ©s de Chocolate em PÃ³.'),
(211, 'adm/galeria/upload/creme-de-cacau.jpg', 5, 'Creme de Cacau', 39, 'PÃ£es de Mel com Creme de Cacau.'),
(212, 'adm/galeria/upload/limao-siciliano.jpg', 5, 'LimÃ£o Siciliano', 37, 'PÃ£es de Mel com Recheio de LimÃ£o Siciliano.'),
(213, 'adm/galeria/upload/romeu-e-julieta.jpg', 6, 'Romeu & Julieta', 37, 'Panetone Romeu & Julieta.'),
(214, 'adm/galeria/upload/trufa.jpg', 2, 'Trufado', 39, 'Chocolate Trufado.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `usuario_id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(15) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `usuario`, `senha`) VALUES
(1, 'rafaelmota', '81dc9bdb52d04dc20036dbd8313ed055');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
