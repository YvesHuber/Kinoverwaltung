-- MySQL Script generated by MySQL Workbench
-- Mon Feb  8 11:38:07 2021
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema zopesacu_db
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema zopesacu_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `zopesacu_db` DEFAULT CHARACTER SET utf8 ;
USE `zopesacu_db` ;

-- -----------------------------------------------------
-- Table `zopesacu_db`.`Film`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `zopesacu_db`.`film` (
  `id` INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idFilme_UNIQUE` (`id` ASC),
  `name` varchar(255) NOT NULL,
  `zeit` varchar(6) NOT NULL)
ENGINE = InnoDB;
INSERT INTO `zopesacu_db`.`film` (`id`, `name`, `zeit`) VALUES
(1, 'Xmen', '18:00'),
(2, 'Marley and me', '19:00'),
(3, 'Endgame', '20:00');

-- -----------------------------------------------------
-- Table `zopesacu_db`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `zopesacu_db`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `iduser_UNIQUE` (`id` ASC),
  `vorname` varchar(255) NOT NULL,
  `nachname` varchar(255) NOT NULL)
ENGINE = InnoDB;
INSERT INTO `zopesacu_db`.`user` (`id`, `vorname`, `nachname`) VALUES
(1, 'Yves','Smolders'),
(2, 'Alex','19:00'),
(3, 'Andrew','Longitude');


CREATE TABLE IF NOT EXISTS `zopesacu_db`.`saal_plätze` (
  `id` INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  `sitze` INT(10) NOT NULL)
ENGINE = InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `zopesacu_db`.`saal_plätze` (`sitze`) VALUES
(50),
(70),
(80);
-- -----------------------------------------------------
-- Table `zopesacu_db`.`Saal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `zopesacu_db`.`saal` (
  `id` INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idSaal_UNIQUE` (`id` ASC),
  `platz_nummer` INT(10) NOT NULL,
  `user_id_fs` int(10),
  `film_id_fs` int(11) NOT NULL,
  `saal_plätze_id_fs` int(11) NOT NULL,
  `besetzt` char(1) NOT NULL,
  CONSTRAINT `film_id_fs`
    FOREIGN KEY (`film_id_fs`)
    REFERENCES `zopesacu_db`.`film` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `user_id_fs`
    FOREIGN KEY (`user_id_fs`)
    REFERENCES `zopesacu_db`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION, 
  CONSTRAINT `saal_plätze_id_fs`
    FOREIGN KEY (`saal_plätze_id_fs`)
    REFERENCES `zopesacu_db`.`saal_plätze` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)

ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
