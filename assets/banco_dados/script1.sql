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
-- Table `mydb`.`funcionario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`funcionario` (
  `registroF` INT NOT NULL,
  `nome` VARCHAR(45) NULL,
  `setor` VARCHAR(45) NULL,
  PRIMARY KEY (`registroF`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`equipamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`equipamento` (
  `registroE` INT NOT NULL,
  `lote` VARCHAR(45) NULL,
  `quantidade` VARCHAR(45) NULL,
  `fornecedor` VARCHAR(45) NULL,
  `preco` FLOAT NULL,
  PRIMARY KEY (`registroE`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`movimento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`movimento` (
  `registroM` INT NOT NULL,
  `dataE` DATE NULL,
  `dataS` DATE NULL,
  `horarioE` TIME NULL,
  `horarioS` TIME NULL,
  `obs` LONGTEXT NULL,
  `funcionario_registroF` INT NOT NULL,
  `equipamento_registroE` INT NOT NULL,
  PRIMARY KEY (`registroM`),
  INDEX `fk_movimento_funcionario_idx` (`funcionario_registroF` ASC) VISIBLE,
  INDEX `fk_movimento_equipamento1_idx` (`equipamento_registroE` ASC) VISIBLE,
  CONSTRAINT `fk_movimento_funcionario`
    FOREIGN KEY (`funcionario_registroF`)
    REFERENCES `mydb`.`funcionario` (`registroF`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_movimento_equipamento1`
    FOREIGN KEY (`equipamento_registroE`)
    REFERENCES `mydb`.`equipamento` (`registroE`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
