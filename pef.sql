/*
 Navicat Premium Data Transfer

 Source Server         : Local
 Source Server Type    : MySQL
 Source Server Version : 80019
 Source Host           : localhost:3306
 Source Schema         : pef

 Target Server Type    : MySQL
 Target Server Version : 80019
 File Encoding         : 65001

 Date: 27/05/2020 20:07:56
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for ASSUNTO_PRINCIPAL
-- ----------------------------
DROP TABLE IF EXISTS `ASSUNTO_PRINCIPAL`;
CREATE TABLE `ASSUNTO_PRINCIPAL` (
  `Codigo` int unsigned NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  `CLASSE_PROCESSO_Codigo` int unsigned NOT NULL,
  PRIMARY KEY (`Codigo`),
  KEY `fk_ASSUNTO_PRINCIPAL_CLASSE_PROCESSO1_idx` (`CLASSE_PROCESSO_Codigo`),
  CONSTRAINT `fk_ASSUNTO_PRINCIPAL_CLASSE_PROCESSO1` FOREIGN KEY (`CLASSE_PROCESSO_Codigo`) REFERENCES `CLASSE_PROCESSO` (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ASSUNTO_PRINCIPAL
-- ----------------------------
BEGIN;
INSERT INTO `ASSUNTO_PRINCIPAL` VALUES (1, 'Assunto um', 1);
INSERT INTO `ASSUNTO_PRINCIPAL` VALUES (2, 'Assunto dois', 1);
INSERT INTO `ASSUNTO_PRINCIPAL` VALUES (4, 'Assunto três', 3);
INSERT INTO `ASSUNTO_PRINCIPAL` VALUES (5, 'Assunto quatro', 5);
INSERT INTO `ASSUNTO_PRINCIPAL` VALUES (6, 'Assunto cinco ', 5);
COMMIT;

-- ----------------------------
-- Table structure for CLASSE_PROCESSO
-- ----------------------------
DROP TABLE IF EXISTS `CLASSE_PROCESSO`;
CREATE TABLE `CLASSE_PROCESSO` (
  `Codigo` int unsigned NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  `COMPETENCIA_Codigo` int unsigned NOT NULL,
  PRIMARY KEY (`Codigo`),
  KEY `fk_CLASSE_PROCESSO_COMPETENCIA1_idx` (`COMPETENCIA_Codigo`),
  CONSTRAINT `fk_CLASSE_PROCESSO_COMPETENCIA1` FOREIGN KEY (`COMPETENCIA_Codigo`) REFERENCES `COMPETENCIA` (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of CLASSE_PROCESSO
-- ----------------------------
BEGIN;
INSERT INTO `CLASSE_PROCESSO` VALUES (1, 'Classe um', 1);
INSERT INTO `CLASSE_PROCESSO` VALUES (3, 'Classe dois', 5);
INSERT INTO `CLASSE_PROCESSO` VALUES (4, 'Classe três', 2);
INSERT INTO `CLASSE_PROCESSO` VALUES (5, 'Classe quatro', 4);
INSERT INTO `CLASSE_PROCESSO` VALUES (6, 'Classe cinco', 3);
COMMIT;

-- ----------------------------
-- Table structure for COMPETENCIA
-- ----------------------------
DROP TABLE IF EXISTS `COMPETENCIA`;
CREATE TABLE `COMPETENCIA` (
  `Codigo` int unsigned NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  `FORO_Codigo` int unsigned NOT NULL,
  PRIMARY KEY (`Codigo`),
  KEY `fk_COMPETENCIA_FORO_idx` (`FORO_Codigo`),
  CONSTRAINT `fk_COMPETENCIA_FORO` FOREIGN KEY (`FORO_Codigo`) REFERENCES `FORO` (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of COMPETENCIA
-- ----------------------------
BEGIN;
INSERT INTO `COMPETENCIA` VALUES (1, 'competencia 1', 1);
INSERT INTO `COMPETENCIA` VALUES (2, 'competencia 2', 2);
INSERT INTO `COMPETENCIA` VALUES (3, 'competencia 3', 5);
INSERT INTO `COMPETENCIA` VALUES (4, 'competencia 4', 4);
INSERT INTO `COMPETENCIA` VALUES (5, 'competencia 5', 3);
COMMIT;

-- ----------------------------
-- Table structure for DOCUMENTO
-- ----------------------------
DROP TABLE IF EXISTS `DOCUMENTO`;
CREATE TABLE `DOCUMENTO` (
  `Codigo` int unsigned NOT NULL AUTO_INCREMENT,
  `Arquivo` varchar(255) NOT NULL,
  `TIPO_Codigo` int unsigned NOT NULL,
  PRIMARY KEY (`Codigo`),
  KEY `fk_DOCUMENTO_TIPO1_idx` (`TIPO_Codigo`),
  CONSTRAINT `fk_DOCUMENTO_TIPO1` FOREIGN KEY (`TIPO_Codigo`) REFERENCES `TIPO` (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of DOCUMENTO
-- ----------------------------
BEGIN;
INSERT INTO `DOCUMENTO` VALUES (1, 'http://www.dominio.com.br/public_documents/arquivo1.pdf', 1);
INSERT INTO `DOCUMENTO` VALUES (2, 'http://www.dominio.com.br/public_documents/arquivo43.pdf', 2);
INSERT INTO `DOCUMENTO` VALUES (3, 'http://www.dominio.com.br/public_documents/teste.pdf', 5);
INSERT INTO `DOCUMENTO` VALUES (4, 'http://www.dominio.com.br/public_documents/doc.pdf', 5);
INSERT INTO `DOCUMENTO` VALUES (5, 'http://www.dominio.com.br/public_documents/arquivo43.pdf', 4);
COMMIT;

-- ----------------------------
-- Table structure for DOCUMENTOS
-- ----------------------------
DROP TABLE IF EXISTS `DOCUMENTOS`;
CREATE TABLE `DOCUMENTOS` (
  `Codigo` int unsigned NOT NULL AUTO_INCREMENT,
  `PETICAO_INICIAL_PRIMEIRO_GRAU_Codigo` int unsigned NOT NULL,
  `DOCUMENTO_Codigo` int unsigned NOT NULL,
  PRIMARY KEY (`Codigo`),
  KEY `fk_DOCUMENTOS_PETICAO_INICIAL_PRIMEIRO_GRAU1_idx` (`PETICAO_INICIAL_PRIMEIRO_GRAU_Codigo`),
  KEY `fk_DOCUMENTOS_DOCUMENTO1_idx` (`DOCUMENTO_Codigo`),
  CONSTRAINT `fk_DOCUMENTOS_DOCUMENTO1` FOREIGN KEY (`DOCUMENTO_Codigo`) REFERENCES `DOCUMENTO` (`Codigo`),
  CONSTRAINT `fk_DOCUMENTOS_PETICAO_INICIAL_PRIMEIRO_GRAU1` FOREIGN KEY (`PETICAO_INICIAL_PRIMEIRO_GRAU_Codigo`) REFERENCES `PETICAO_INICIAL_PRIMEIRO_GRAU` (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of DOCUMENTOS
-- ----------------------------
BEGIN;
INSERT INTO `DOCUMENTOS` VALUES (1, 1, 2);
INSERT INTO `DOCUMENTOS` VALUES (2, 4, 2);
INSERT INTO `DOCUMENTOS` VALUES (3, 5, 1);
INSERT INTO `DOCUMENTOS` VALUES (4, 6, 5);
INSERT INTO `DOCUMENTOS` VALUES (5, 1, 3);
COMMIT;

-- ----------------------------
-- Table structure for ESTADO_CIVIL
-- ----------------------------
DROP TABLE IF EXISTS `ESTADO_CIVIL`;
CREATE TABLE `ESTADO_CIVIL` (
  `Codigo` int unsigned NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ESTADO_CIVIL
-- ----------------------------
BEGIN;
INSERT INTO `ESTADO_CIVIL` VALUES (1, 'Solteiro');
INSERT INTO `ESTADO_CIVIL` VALUES (2, 'Casado');
INSERT INTO `ESTADO_CIVIL` VALUES (3, 'Divorciado');
INSERT INTO `ESTADO_CIVIL` VALUES (4, 'Viuvo');
INSERT INTO `ESTADO_CIVIL` VALUES (5, 'Outros');
COMMIT;

-- ----------------------------
-- Table structure for FORO
-- ----------------------------
DROP TABLE IF EXISTS `FORO`;
CREATE TABLE `FORO` (
  `Codigo` int unsigned NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of FORO
-- ----------------------------
BEGIN;
INSERT INTO `FORO` VALUES (1, 'Foro 1');
INSERT INTO `FORO` VALUES (2, 'Foro 2');
INSERT INTO `FORO` VALUES (3, 'Foro 3');
INSERT INTO `FORO` VALUES (4, 'Foro 4');
INSERT INTO `FORO` VALUES (5, 'Foro 5');
COMMIT;

-- ----------------------------
-- Table structure for NACIONALIDADE
-- ----------------------------
DROP TABLE IF EXISTS `NACIONALIDADE`;
CREATE TABLE `NACIONALIDADE` (
  `Codigo` int unsigned NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of NACIONALIDADE
-- ----------------------------
BEGIN;
INSERT INTO `NACIONALIDADE` VALUES (1, 'Brasileiro');
INSERT INTO `NACIONALIDADE` VALUES (2, 'Americano');
INSERT INTO `NACIONALIDADE` VALUES (3, 'Paraguaio');
INSERT INTO `NACIONALIDADE` VALUES (4, 'Espanhol');
INSERT INTO `NACIONALIDADE` VALUES (5, 'Italiano');
COMMIT;

-- ----------------------------
-- Table structure for PARTE
-- ----------------------------
DROP TABLE IF EXISTS `PARTE`;
CREATE TABLE `PARTE` (
  `Codigo` int unsigned NOT NULL AUTO_INCREMENT,
  `Pessoa` char(1) NOT NULL,
  `CPF` char(14) NOT NULL,
  `RG` varchar(11) NOT NULL,
  `Orgao_Emissor` varchar(5) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Genero` char(1) NOT NULL,
  `CEP` varchar(9) NOT NULL,
  `Numero` int NOT NULL,
  `Complemento` varchar(50) DEFAULT NULL,
  `PARTICIPACAO_Codigo` int unsigned NOT NULL,
  `ESTADO_CIVIL_Codigo` int unsigned NOT NULL,
  `NACIONALIDADE_Codigo` int unsigned NOT NULL,
  `PROFISSAO_Codigo` int unsigned NOT NULL,
  PRIMARY KEY (`Codigo`),
  KEY `fk_PARTE_PARTIPACAO1_idx` (`PARTICIPACAO_Codigo`),
  KEY `fk_PARTE_ESTADO_CIVIL1_idx` (`ESTADO_CIVIL_Codigo`),
  KEY `fk_PARTE_NACIONALIDADE1_idx` (`NACIONALIDADE_Codigo`),
  KEY `fk_PARTE_PROFISSAO1_idx` (`PROFISSAO_Codigo`),
  CONSTRAINT `fk_PARTE_ESTADO_CIVIL1` FOREIGN KEY (`ESTADO_CIVIL_Codigo`) REFERENCES `ESTADO_CIVIL` (`Codigo`),
  CONSTRAINT `fk_PARTE_NACIONALIDADE1` FOREIGN KEY (`NACIONALIDADE_Codigo`) REFERENCES `NACIONALIDADE` (`Codigo`),
  CONSTRAINT `fk_PARTE_PARTIPACAO1` FOREIGN KEY (`PARTICIPACAO_Codigo`) REFERENCES `PARTICIPACAO` (`Codigo`),
  CONSTRAINT `fk_PARTE_PROFISSAO1` FOREIGN KEY (`PROFISSAO_Codigo`) REFERENCES `PROFISSAO` (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of PARTE
-- ----------------------------
BEGIN;
INSERT INTO `PARTE` VALUES (2, 'J', '123.456.789-08', '123123', 'ssp', 'Thiago Bardez', 'M', '18900000', 4, 'hahahdfa', 1, 1, 1, 2);
INSERT INTO `PARTE` VALUES (3, 'F', '433.456.789-09', '873617263', 'SSP', 'John Doe', 'M', '18900000', 4, 'complemento', 24, 2, 5, 5);
INSERT INTO `PARTE` VALUES (4, 'F', '121.322.789-08', '837665521', 'SSP', 'Johnny Doe', 'M', '18900000', 4, 'complemento', 1, 4, 3, 2);
INSERT INTO `PARTE` VALUES (5, 'J', '178.456.789-08', '198889273', 'SSP', 'Jane Doe', 'F', '18900000', 4, 'complemento', 26, 3, 4, 3);
INSERT INTO `PARTE` VALUES (6, 'F', '035.456.991-08', '173516771', 'SSP', 'Mary Lou', 'F', '18900000', 4, 'complemento', 23, 5, 2, 4);
COMMIT;

-- ----------------------------
-- Table structure for PARTES
-- ----------------------------
DROP TABLE IF EXISTS `PARTES`;
CREATE TABLE `PARTES` (
  `Codigo` int NOT NULL AUTO_INCREMENT,
  `PETICAO_INICIAL_PRIMEIRO_GRAU_Codigo` int unsigned NOT NULL,
  `PARTE_Codigo` int unsigned NOT NULL,
  PRIMARY KEY (`Codigo`),
  KEY `fk_PARTES_PETICAO_INICIAL_PRIMEIRO_GRAU1_idx` (`PETICAO_INICIAL_PRIMEIRO_GRAU_Codigo`),
  KEY `fk_PARTES_PARTE1_idx` (`PARTE_Codigo`),
  CONSTRAINT `fk_PARTES_PARTE1` FOREIGN KEY (`PARTE_Codigo`) REFERENCES `PARTE` (`Codigo`),
  CONSTRAINT `fk_PARTES_PETICAO_INICIAL_PRIMEIRO_GRAU1` FOREIGN KEY (`PETICAO_INICIAL_PRIMEIRO_GRAU_Codigo`) REFERENCES `PETICAO_INICIAL_PRIMEIRO_GRAU` (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of PARTES
-- ----------------------------
BEGIN;
INSERT INTO `PARTES` VALUES (1, 6, 2);
INSERT INTO `PARTES` VALUES (2, 5, 3);
INSERT INTO `PARTES` VALUES (4, 6, 4);
INSERT INTO `PARTES` VALUES (5, 4, 4);
INSERT INTO `PARTES` VALUES (6, 2, 6);
COMMIT;

-- ----------------------------
-- Table structure for PARTICIPACAO
-- ----------------------------
DROP TABLE IF EXISTS `PARTICIPACAO`;
CREATE TABLE `PARTICIPACAO` (
  `Codigo` int unsigned NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of PARTICIPACAO
-- ----------------------------
BEGIN;
INSERT INTO `PARTICIPACAO` VALUES (1, 'Participação 1');
INSERT INTO `PARTICIPACAO` VALUES (23, 'Participação 2');
INSERT INTO `PARTICIPACAO` VALUES (24, 'Participação 3');
INSERT INTO `PARTICIPACAO` VALUES (25, 'Participação 4');
INSERT INTO `PARTICIPACAO` VALUES (26, 'Participação 5');
COMMIT;

-- ----------------------------
-- Table structure for PETICAO_INICIAL_PRIMEIRO_GRAU
-- ----------------------------
DROP TABLE IF EXISTS `PETICAO_INICIAL_PRIMEIRO_GRAU`;
CREATE TABLE `PETICAO_INICIAL_PRIMEIRO_GRAU` (
  `Codigo` int unsigned NOT NULL AUTO_INCREMENT,
  `Valor_Acao` decimal(11,2) unsigned NOT NULL,
  `ASSUNTO_PRINCIPAL_Codigo` int unsigned NOT NULL,
  PRIMARY KEY (`Codigo`),
  KEY `fk_PETICAO_INICIAL_PRIMEIRO_GRAU_ASSUNTO_PRINCIPAL1_idx` (`ASSUNTO_PRINCIPAL_Codigo`),
  CONSTRAINT `fk_PETICAO_INICIAL_PRIMEIRO_GRAU_ASSUNTO_PRINCIPAL1` FOREIGN KEY (`ASSUNTO_PRINCIPAL_Codigo`) REFERENCES `ASSUNTO_PRINCIPAL` (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of PETICAO_INICIAL_PRIMEIRO_GRAU
-- ----------------------------
BEGIN;
INSERT INTO `PETICAO_INICIAL_PRIMEIRO_GRAU` VALUES (1, 5010.00, 1);
INSERT INTO `PETICAO_INICIAL_PRIMEIRO_GRAU` VALUES (2, 100000.00, 4);
INSERT INTO `PETICAO_INICIAL_PRIMEIRO_GRAU` VALUES (4, 5999.00, 5);
INSERT INTO `PETICAO_INICIAL_PRIMEIRO_GRAU` VALUES (5, 200.00, 2);
INSERT INTO `PETICAO_INICIAL_PRIMEIRO_GRAU` VALUES (6, 1099.99, 2);
COMMIT;

-- ----------------------------
-- Table structure for PROFISSAO
-- ----------------------------
DROP TABLE IF EXISTS `PROFISSAO`;
CREATE TABLE `PROFISSAO` (
  `Codigo` int unsigned NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of PROFISSAO
-- ----------------------------
BEGIN;
INSERT INTO `PROFISSAO` VALUES (1, 'Medico');
INSERT INTO `PROFISSAO` VALUES (2, 'Programador');
INSERT INTO `PROFISSAO` VALUES (3, 'Advogado');
INSERT INTO `PROFISSAO` VALUES (4, 'Dentista');
INSERT INTO `PROFISSAO` VALUES (5, 'Professor');
COMMIT;

-- ----------------------------
-- Table structure for TIPO
-- ----------------------------
DROP TABLE IF EXISTS `TIPO`;
CREATE TABLE `TIPO` (
  `Codigo` int unsigned NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of TIPO
-- ----------------------------
BEGIN;
INSERT INTO `TIPO` VALUES (1, 'Tipo 1');
INSERT INTO `TIPO` VALUES (2, 'Tipo 2');
INSERT INTO `TIPO` VALUES (3, 'Tipo 3');
INSERT INTO `TIPO` VALUES (4, 'Tipo 4');
INSERT INTO `TIPO` VALUES (5, 'Tipo 5');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
