-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`equipamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`equipamento` (
  `idequipamento` INT NOT NULL,
  `nome` VARCHAR(45) NULL,
  `registro` VARCHAR(45) NULL,
  `fornecedor` VARCHAR(45) NULL,
  `preco` VARCHAR(45) NULL,
  PRIMARY KEY (`idequipamento`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`funcionario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`funcionario` (
  `idfuncionario` INT NOT NULL,
  `nome` VARCHAR(45) NULL,
  `registro` VARCHAR(45) NULL,
  `setor` VARCHAR(45) NULL,
  PRIMARY KEY (`idfuncionario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`entrada`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`entrada` (
  `identrada` INT NOT NULL,
  `lote` VARCHAR(45) NULL,
  `data` DATE NULL,
  `horario` TIME NULL,
  `obs` VARCHAR(45) NULL,
  `funcionario_idfuncionario` INT NOT NULL,
  `equipamento_idequipamento` INT NOT NULL,
  PRIMARY KEY (`identrada`, `funcionario_idfuncionario`, `equipamento_idequipamento`),
  INDEX `fk_entrada_funcionario_idx` (`funcionario_idfuncionario` ASC),
  INDEX `fk_entrada_equipamento1_idx` (`equipamento_idequipamento` ASC),
  CONSTRAINT `fk_entrada_funcionario`
    FOREIGN KEY (`funcionario_idfuncionario`)
    REFERENCES `mydb`.`funcionario` (`idfuncionario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_entrada_equipamento1`
    FOREIGN KEY (`equipamento_idequipamento`)
    REFERENCES `mydb`.`equipamento` (`idequipamento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`saida`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`saida` (
  `idsaida` INT NOT NULL,
  `quantidade` INT NULL,
  `data` DATE NULL,
  `horario` TIME NULL,
  `obs` VARCHAR(45) NULL,
  `funcionario_idfuncionario` INT NOT NULL,
  `equipamento_idequipamento` INT NOT NULL,
  PRIMARY KEY (`idsaida`, `funcionario_idfuncionario`, `equipamento_idequipamento`),
  INDEX `fk_saida_funcionario1_idx` (`funcionario_idfuncionario` ASC),
  INDEX `fk_saida_equipamento1_idx` (`equipamento_idequipamento` ASC),
  CONSTRAINT `fk_saida_funcionario1`
    FOREIGN KEY (`funcionario_idfuncionario`)
    REFERENCES `mydb`.`funcionario` (`idfuncionario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_saida_equipamento1`
    FOREIGN KEY (`equipamento_idequipamento`)
    REFERENCES `mydb`.`equipamento` (`idequipamento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
