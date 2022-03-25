-- MySQL Script generated by MySQL Workbench
-- Wed Apr 15 20:03:13 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema pef
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema pef
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `pef` DEFAULT CHARACTER SET utf8 ;
USE `pef` ;

-- -----------------------------------------------------
-- Table `pef`.`ASSUNTO_PRINCIPAL`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pef`.`ASSUNTO_PRINCIPAL` (
  `Codigo` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nome` VARCHAR(100) NOT NULL,
  `CLASSE_PROCESSO_Codigo` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`Codigo`),
  INDEX `fk_ASSUNTO_PRINCIPAL_CLASSE_PROCESSO1_idx` (`CLASSE_PROCESSO_Codigo` ASC) VISIBLE,
  CONSTRAINT `fk_ASSUNTO_PRINCIPAL_CLASSE_PROCESSO1`
    FOREIGN KEY (`CLASSE_PROCESSO_Codigo`)
    REFERENCES `pef`.`CLASSE_PROCESSO` (`Codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pef`.`CLASSE_PROCESSO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pef`.`CLASSE_PROCESSO` (
  `Codigo` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nome` VARCHAR(100) NOT NULL,
  `COMPETENCIA_Codigo` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`Codigo`),
  INDEX `fk_CLASSE_PROCESSO_COMPETENCIA1_idx` (`COMPETENCIA_Codigo` ASC) VISIBLE,
  CONSTRAINT `fk_CLASSE_PROCESSO_COMPETENCIA1`
    FOREIGN KEY (`COMPETENCIA_Codigo`)
    REFERENCES `pef`.`COMPETENCIA` (`Codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pef`.`COMPETENCIA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pef`.`COMPETENCIA` (
  `Codigo` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nome` VARCHAR(100) NOT NULL,
  `FORO_Codigo` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`Codigo`),
  INDEX `fk_COMPETENCIA_FORO_idx` (`FORO_Codigo` ASC) VISIBLE,
  CONSTRAINT `fk_COMPETENCIA_FORO`
    FOREIGN KEY (`FORO_Codigo`)
    REFERENCES `pef`.`FORO` (`Codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pef`.`DOCUMENTO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pef`.`DOCUMENTO` (
  `Codigo` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Arquivo` BLOB NOT NULL,
  `TIPO_Codigo` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`Codigo`),
  INDEX `fk_DOCUMENTO_TIPO1_idx` (`TIPO_Codigo` ASC) VISIBLE,
  CONSTRAINT `fk_DOCUMENTO_TIPO1`
    FOREIGN KEY (`TIPO_Codigo`)
    REFERENCES `pef`.`TIPO` (`Codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pef`.`DOCUMENTOS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pef`.`DOCUMENTOS` (
  `Codigo` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `PETICAO_INICIAL_PRIMEIRO_GRAU_Codigo` INT UNSIGNED NOT NULL,
  `DOCUMENTO_Codigo` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`Codigo`),
  INDEX `fk_DOCUMENTOS_PETICAO_INICIAL_PRIMEIRO_GRAU1_idx` (`PETICAO_INICIAL_PRIMEIRO_GRAU_Codigo` ASC) VISIBLE,
  INDEX `fk_DOCUMENTOS_DOCUMENTO1_idx` (`DOCUMENTO_Codigo` ASC) VISIBLE,
  CONSTRAINT `fk_DOCUMENTOS_PETICAO_INICIAL_PRIMEIRO_GRAU1`
    FOREIGN KEY (`PETICAO_INICIAL_PRIMEIRO_GRAU_Codigo`)
    REFERENCES `pef`.`PETICAO_INICIAL_PRIMEIRO_GRAU` (`Codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_DOCUMENTOS_DOCUMENTO1`
    FOREIGN KEY (`DOCUMENTO_Codigo`)
    REFERENCES `pef`.`DOCUMENTO` (`Codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pef`.`ESTADO_CIVIL`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pef`.`ESTADO_CIVIL` (
  `Codigo` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nome` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`Codigo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pef`.`FORO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pef`.`FORO` (
  `Codigo` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nome` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`Codigo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pef`.`NACIONALIDADE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pef`.`NACIONALIDADE` (
  `Codigo` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nome` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`Codigo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pef`.`PARTE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pef`.`PARTE` (
  `Codigo` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Pessoa` CHAR(1) NOT NULL,
  `CPF` CHAR(14) NOT NULL,
  `RG` VARCHAR(11) NOT NULL,
  `Orgao_Emissor` VARCHAR(5) NOT NULL,
  `Nome` VARCHAR(50) NOT NULL,
  `Genero` CHAR(1) NOT NULL,
  `CEP` VARCHAR(9) NOT NULL,
  `Numero` INT NOT NULL,
  `Complemento` VARCHAR(50) NULL,
  `PARTIPACAO_Codigo` INT UNSIGNED NOT NULL,
  `ESTADO_CIVIL_Codigo` INT UNSIGNED NOT NULL,
  `NACIONALIDADE_Codigo` INT UNSIGNED NOT NULL,
  `PROFISSAO_Codigo` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`Codigo`),
  INDEX `fk_PARTE_PARTIPACAO1_idx` (`PARTIPACAO_Codigo` ASC) VISIBLE,
  INDEX `fk_PARTE_ESTADO_CIVIL1_idx` (`ESTADO_CIVIL_Codigo` ASC) VISIBLE,
  INDEX `fk_PARTE_NACIONALIDADE1_idx` (`NACIONALIDADE_Codigo` ASC) VISIBLE,
  INDEX `fk_PARTE_PROFISSAO1_idx` (`PROFISSAO_Codigo` ASC) VISIBLE,
  CONSTRAINT `fk_PARTE_PARTIPACAO1`
    FOREIGN KEY (`PARTIPACAO_Codigo`)
    REFERENCES `pef`.`PARTIPACAO` (`Codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PARTE_ESTADO_CIVIL1`
    FOREIGN KEY (`ESTADO_CIVIL_Codigo`)
    REFERENCES `pef`.`ESTADO_CIVIL` (`Codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PARTE_NACIONALIDADE1`
    FOREIGN KEY (`NACIONALIDADE_Codigo`)
    REFERENCES `pef`.`NACIONALIDADE` (`Codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PARTE_PROFISSAO1`
    FOREIGN KEY (`PROFISSAO_Codigo`)
    REFERENCES `pef`.`PROFISSAO` (`Codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pef`.`PARTES`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pef`.`PARTES` (
  `Codigo` INT NOT NULL AUTO_INCREMENT,
  `PETICAO_INICIAL_PRIMEIRO_GRAU_Codigo` INT UNSIGNED NOT NULL,
  `PARTE_Codigo` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`Codigo`),
  INDEX `fk_PARTES_PETICAO_INICIAL_PRIMEIRO_GRAU1_idx` (`PETICAO_INICIAL_PRIMEIRO_GRAU_Codigo` ASC) VISIBLE,
  INDEX `fk_PARTES_PARTE1_idx` (`PARTE_Codigo` ASC) VISIBLE,
  CONSTRAINT `fk_PARTES_PETICAO_INICIAL_PRIMEIRO_GRAU1`
    FOREIGN KEY (`PETICAO_INICIAL_PRIMEIRO_GRAU_Codigo`)
    REFERENCES `pef`.`PETICAO_INICIAL_PRIMEIRO_GRAU` (`Codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PARTES_PARTE1`
    FOREIGN KEY (`PARTE_Codigo`)
    REFERENCES `pef`.`PARTE` (`Codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pef`.`PARTIPACAO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pef`.`PARTIPACAO` (
  `Codigo` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nome` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`Codigo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pef`.`PETICAO_INICIAL_PRIMEIRO_GRAU`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pef`.`PETICAO_INICIAL_PRIMEIRO_GRAU` (
  `Codigo` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Valor_Acao` DECIMAL(11,2) UNSIGNED NOT NULL,
  `ASSUNTO_PRINCIPAL_Codigo` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`Codigo`),
  INDEX `fk_PETICAO_INICIAL_PRIMEIRO_GRAU_ASSUNTO_PRINCIPAL1_idx` (`ASSUNTO_PRINCIPAL_Codigo` ASC) VISIBLE,
  CONSTRAINT `fk_PETICAO_INICIAL_PRIMEIRO_GRAU_ASSUNTO_PRINCIPAL1`
    FOREIGN KEY (`ASSUNTO_PRINCIPAL_Codigo`)
    REFERENCES `pef`.`ASSUNTO_PRINCIPAL` (`Codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pef`.`PROFISSAO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pef`.`PROFISSAO` (
  `Codigo` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nome` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`Codigo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pef`.`TIPO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pef`.`TIPO` (
  `Codigo` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nome` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`Codigo`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;