-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema db_web_project
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema db_web_project
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_web_project` DEFAULT CHARACTER SET utf8 ;
USE `db_web_project` ;

-- -----------------------------------------------------
-- Table `db_web_project`.`centers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_web_project`.`centers` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `center` CHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_web_project`.`statuts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_web_project`.`statuts` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `statut` CHAR(45) CHARACTER SET 'big5' NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_web_project`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_web_project`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` CHAR(45) NOT NULL,
  `firstName` CHAR(45) NOT NULL,
  `email` CHAR(50) NOT NULL,
  `password` CHAR(255) NOT NULL,
  `centres_id` INT(11) NOT NULL,
  `statuts_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  UNIQUE INDEX `password_UNIQUE` (`password` ASC),
  INDEX `fk_users_centre_idx` (`centres_id` ASC),
  INDEX `fk_users_statut1_idx` (`statuts_id` ASC),
  CONSTRAINT `fk_users_centre`
    FOREIGN KEY (`centres_id`)
    REFERENCES `db_web_project`.`centers` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_statut1`
    FOREIGN KEY (`statuts_id`)
    REFERENCES `db_web_project`.`statuts` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_web_project`.`products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_web_project`.`products` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` CHAR(45) NOT NULL,
  `description` CHAR(255) NOT NULL,
  `price` FLOAT NOT NULL,
  `stock` INT(11) NOT NULL,
  `nb_com` INT(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_web_project`.`imgs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_web_project`.`imgs` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `url` CHAR(255) NOT NULL,
  `date` DATETIME NOT NULL,
  `products_id` INT(11) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_imgs_products1_idx` (`products_id` ASC),
  CONSTRAINT `fk_imgs_products1`
    FOREIGN KEY (`products_id`)
    REFERENCES `db_web_project`.`products` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_web_project`.`comments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_web_project`.`comments` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `comment` CHAR(255) NOT NULL,
  `users_id` INT(11) NOT NULL,
  `comments_id` INT(11) NULL DEFAULT NULL,
  `imgs_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_comments_users1_idx` (`users_id` ASC),
  INDEX `fk_comments_comments1_idx` (`id` ASC),
  INDEX `fk_comments_imgs1_idx` (`imgs_id` ASC),
  CONSTRAINT `fk_comments_comments1`
    FOREIGN KEY (`id`)
    REFERENCES `db_web_project`.`comments` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comments_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `db_web_project`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comments_imgs1`
    FOREIGN KEY (`imgs_id`)
    REFERENCES `db_web_project`.`imgs` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_web_project`.`places`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_web_project`.`places` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `place` CHAR(75) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_web_project`.`events`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_web_project`.`events` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` CHAR(45) NOT NULL,
  `description` CHAR(255) NOT NULL,
  `date` DATETIME NULL DEFAULT NULL,
  `place` CHAR(75) NULL DEFAULT NULL,
  `like` INT(11) NOT NULL DEFAULT '0',
  `price` FLOAT NULL DEFAULT NULL,
  `p_r` INT(11) NULL DEFAULT NULL,
  `p_t` INT(11) NULL DEFAULT NULL,
  `places_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_events_places1_idx` (`places_id` ASC),
  CONSTRAINT `fk_events_places1`
    FOREIGN KEY (`places_id`)
    REFERENCES `db_web_project`.`places` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_web_project`.`users_events`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_web_project`.`users_events` (
  `events_id` INT(11) NOT NULL,
  `users_id` INT(11) NOT NULL,
  PRIMARY KEY (`events_id`, `users_id`),
  INDEX `fk_events_has_users_users1_idx` (`users_id` ASC),
  INDEX `fk_events_has_users_events1_idx` (`events_id` ASC),
  CONSTRAINT `fk_events_has_users_events1`
    FOREIGN KEY (`events_id`)
    REFERENCES `db_web_project`.`events` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_events_has_users_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `db_web_project`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_web_project`.`users_products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_web_project`.`users_products` (
  `products_id` INT(11) NOT NULL,
  `users_id` INT(11) NOT NULL,
  `qty` INT(11) NOT NULL DEFAULT '1',
  `statut` INT(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`products_id`, `users_id`),
  INDEX `fk_products_has_users1_users1_idx` (`users_id` ASC),
  INDEX `fk_products_has_users1_products1_idx` (`products_id` ASC),
  CONSTRAINT `fk_products_has_users1_products1`
    FOREIGN KEY (`products_id`)
    REFERENCES `db_web_project`.`products` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_products_has_users1_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `db_web_project`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
