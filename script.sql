-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema cours_enligne
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema cours_enligne
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `cours_enligne` DEFAULT CHARACTER SET utf8mb4 ;
USE `cours_enligne` ;

-- -----------------------------------------------------
-- Table `cours_enligne`.`enseignant`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cours_enligne`.`enseignant` (
  `idenseignant` INT NOT NULL AUTO_INCREMENT,
  `prenom` VARCHAR(45) NOT NULL,
  `nom` VARCHAR(45) NOT NULL,
  `phone` VARCHAR(25) NOT NULL,
  `courriel` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idenseignant`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cours_enligne`.`cours`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cours_enligne`.`cours` (
  `idcours` INT NOT NULL AUTO_INCREMENT,
  `titre` VARCHAR(45) NOT NULL,
  `description` VARCHAR(1000) NOT NULL,
  `enseignant_idenseignant` INT NULL DEFAULT NULL,
  PRIMARY KEY (`idcours`),
  INDEX `fk_cours_enseignant1_idx` (`enseignant_idenseignant` ASC),
  CONSTRAINT `fk_cours_enseignant1`
    FOREIGN KEY (`enseignant_idenseignant`)
    REFERENCES `cours_enligne`.`enseignant` (`idenseignant`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cours_enligne`.`groupe`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cours_enligne`.`groupe` (
  `idgroupe` INT NOT NULL,
  `nom` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idgroupe`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cours_enligne`.`cours_has_groupe`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cours_enligne`.`cours_has_groupe` (
  `cours_idcours` INT NOT NULL,
  `groupe_idgroupe` INT NOT NULL,
  PRIMARY KEY (`cours_idcours`, `groupe_idgroupe`),
  INDEX `fk_cours_has_groupe_groupe1_idx` (`groupe_idgroupe` ASC),
  INDEX `fk_cours_has_groupe_cours1_idx` (`cours_idcours` ASC),
  CONSTRAINT `fk_cours_has_groupe_cours1`
    FOREIGN KEY (`cours_idcours`)
    REFERENCES `cours_enligne`.`cours` (`idcours`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cours_has_groupe_groupe1`
    FOREIGN KEY (`groupe_idgroupe`)
    REFERENCES `cours_enligne`.`groupe` (`idgroupe`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cours_enligne`.`etudiant`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cours_enligne`.`etudiant` (
  `idetudiant` INT NOT NULL AUTO_INCREMENT,
  `prenom` VARCHAR(45) NOT NULL,
  `nom` VARCHAR(45) NOT NULL,
  `phone` VARCHAR(25) NOT NULL,
  `courriel` VARCHAR(50) NOT NULL,
  `groupe_idgroupe` INT NULL DEFAULT NULL,
  PRIMARY KEY (`idetudiant`),
  INDEX `fk_etudiant_groupe_idx` (`groupe_idgroupe` ASC),
  CONSTRAINT `fk_etudiant_groupe`
    FOREIGN KEY (`groupe_idgroupe`)
    REFERENCES `cours_enligne`.`groupe` (`idgroupe`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 24
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
