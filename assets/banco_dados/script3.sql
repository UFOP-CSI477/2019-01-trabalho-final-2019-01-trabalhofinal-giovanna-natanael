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
  `registrof` INT NOT NULL,
  `nome` VARCHAR(45) NULL,
  `setor` VARCHAR(45) NULL,
  PRIMARY KEY (`registrof`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`equipamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`equipamento` (
  `registroe` INT NOT NULL,
  `lote` VARCHAR(45) NULL,
  `quantidade` VARCHAR(45) NULL,
  `fornecedor` VARCHAR(45) NULL,
  `preco` FLOAT NULL,
  PRIMARY KEY (`registroe`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`movimento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`movimento` (
  `registrom` INT NOT NULL,
  `dataE` DATE NULL,
  `dataS` DATE NULL,
  `horarioE` TIME NULL,
  `horarioS` TIME NULL,
  `obs` LONGTEXT NULL,
  `equipamento_registroe` INT NOT NULL,
  `funcionario_registrof` INT NOT NULL,
  PRIMARY KEY (`registrom`, `equipamento_registroe`, `funcionario_registrof`),
  INDEX `fk_movimento_equipamento_idx` (`equipamento_registroe` ASC) VISIBLE,
  INDEX `fk_movimento_funcionario1_idx` (`funcionario_registrof` ASC) VISIBLE,
  CONSTRAINT `fk_movimento_equipamento`
    FOREIGN KEY (`equipamento_registroe`)
    REFERENCES `mydb`.`equipamento` (`registroe`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_movimento_funcionario1`
    FOREIGN KEY (`funcionario_registrof`)
    REFERENCES `mydb`.`funcionario` (`registrof`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
