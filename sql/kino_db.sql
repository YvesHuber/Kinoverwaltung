-- MySQL Script generated by MySQL Workbench
-- Mon Feb  8 10:29:26 2021
-- Model: New Model    Version: 1.0
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
-- Table `mydb`.`Film`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Film` (
  `id` INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
 `name` varchar(255) NOT NULL AUTO_INCREMENT)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`User` (
  `id` INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
 `vorname` varchar(255) DEFAULT NULL,
 `nachname` varchar(255) DEFAULT NULL)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Saal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Saal` (
  `id` INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  `platz_nummer` varchar(255) DEFAULT NULL,
  `zeit` varchar(255) DEFAULT NULL,
  CONSTRAINT `fk_saal_user` FOREIGN KEY (`markers_id`) REFERENCES `User` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_saal_film` FOREIGN KEY (`place_id`) REFERENCES `Film` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
