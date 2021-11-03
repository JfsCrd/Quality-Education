-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema project
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema project
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `project` ;
USE `project` ;

-- -----------------------------------------------------
-- Table `project`.`Bootcamp`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `project`.`Bootcamp` (
  `idBootcamp` INT NOT NULL,
  `Name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idBootcamp`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `project`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `project`.`User` (
  `idUser` INT NOT NULL,
  `Name` VARCHAR(50) NOT NULL,
  `Email` VARCHAR(45) NOT NULL,
  `Telephone` VARCHAR(13) NOT NULL,
  `Password` VARCHAR(12) NOT NULL,
  `Rank` INT NOT NULL,
  `Birth` DATE NOT NULL,
  `Adress` VARCHAR(100) NOT NULL,
  `Bootcamp_idBootcamp` INT NULL,
  PRIMARY KEY (`idUser`),
  INDEX `fk_User_Bootcamp1_idx` (`Bootcamp_idBootcamp` ASC),
  CONSTRAINT `fk_User_Bootcamp1`
    FOREIGN KEY (`Bootcamp_idBootcamp`)
    REFERENCES `project`.`Bootcamp` (`idBootcamp`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `project`.`SupportingCompany`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `project`.`SupportingCompany` (
  `idSupportingCompany` INT NOT NULL,
  `Name` VARCHAR(45) NOT NULL,
  `Email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idSupportingCompany`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `project`.`Course`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `project`.`Course` (
  `idCourse` INT NOT NULL,
  `Name` VARCHAR(45) NOT NULL,
  `Link` VARCHAR(45) NOT NULL,
  `SupportingCompany_idSupportingCompany` INT NOT NULL,
  PRIMARY KEY (`idCourse`),
  INDEX `fk_Course_SupportingCompany1_idx` (`SupportingCompany_idSupportingCompany` ASC),
  CONSTRAINT `fk_Course_SupportingCompany1`
    FOREIGN KEY (`SupportingCompany_idSupportingCompany`)
    REFERENCES `project`.`SupportingCompany` (`idSupportingCompany`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `project`.`Certificate`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `project`.`Certificate` (
  `idCertificate` INT NOT NULL,
  `Certificate` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCertificate`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `project`.`Bootcamp_has_Course`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `project`.`Bootcamp_has_Course` (
  `Bootcamp_idBootcamp` INT NOT NULL,
  `Course_idCourse` INT NOT NULL,
  `Registration` DATE NOT NULL,
  PRIMARY KEY (`Bootcamp_idBootcamp`, `Course_idCourse`),
  INDEX `fk_Bootcamp_has_Course_Course1_idx` (`Course_idCourse` ASC),
  INDEX `fk_Bootcamp_has_Course_Bootcamp1_idx` (`Bootcamp_idBootcamp` ASC),
  CONSTRAINT `fk_Bootcamp_has_Course_Bootcamp1`
    FOREIGN KEY (`Bootcamp_idBootcamp`)
    REFERENCES `project`.`Bootcamp` (`idBootcamp`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Bootcamp_has_Course_Course1`
    FOREIGN KEY (`Course_idCourse`)
    REFERENCES `project`.`Course` (`idCourse`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `project`.`User_has_Course`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `project`.`User_has_Course` (
  `User_idUser` INT NOT NULL,
  `Course_idCourse` INT NOT NULL,
  `Registration` DATE NOT NULL,
  PRIMARY KEY (`User_idUser`, `Course_idCourse`),
  INDEX `fk_User_has_Course_Course1_idx` (`Course_idCourse` ASC),
  INDEX `fk_User_has_Course_User1_idx` (`User_idUser` ASC),
  CONSTRAINT `fk_User_has_Course_User1`
    FOREIGN KEY (`User_idUser`)
    REFERENCES `project`.`User` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_User_has_Course_Course1`
    FOREIGN KEY (`Course_idCourse`)
    REFERENCES `project`.`Course` (`idCourse`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `project`.`User_has_Certificate`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `project`.`User_has_Certificate` (
  `User_idUser` INT NOT NULL,
  `Certificate_idCertificate` INT NOT NULL,
  `Issue DATE` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`User_idUser`, `Certificate_idCertificate`),
  INDEX `fk_User_has_Certificate_Certificate1_idx` (`Certificate_idCertificate` ASC),
  INDEX `fk_User_has_Certificate_User1_idx` (`User_idUser` ASC),
  CONSTRAINT `fk_User_has_Certificate_User1`
    FOREIGN KEY (`User_idUser`)
    REFERENCES `project`.`User` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_User_has_Certificate_Certificate1`
    FOREIGN KEY (`Certificate_idCertificate`)
    REFERENCES `project`.`Certificate` (`idCertificate`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
