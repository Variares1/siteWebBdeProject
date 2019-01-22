-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`centers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`centers` (
  `id_center` INT NOT NULL,
  `center` CHAR(45) NOT NULL,
  PRIMARY KEY (`id_center`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`statuts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`statuts` (
  `id_statut` INT NOT NULL,
  `statut` CHAR(45) CHARACTER SET 'big5' NOT NULL,
  PRIMARY KEY (`id_statut`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`users` (
  `id_user` INT NOT NULL AUTO_INCREMENT,
  `user_name` CHAR(45) NOT NULL,
  `user_firstName` CHAR(45) NOT NULL,
  `user_email` CHAR(50) NOT NULL,
  `user_password` CHAR(255) NOT NULL,
  `id_centre` INT NOT NULL,
  `id_statut` INT NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE INDEX `email_UNIQUE` (`user_email` ASC),
  UNIQUE INDEX `password_UNIQUE` (`user_password` ASC),
  INDEX `fk_users_centre_idx` (`id_centre` ASC),
  INDEX `fk_users_statut1_idx` (`id_statut` ASC),
  CONSTRAINT `fk_users_centre`
    FOREIGN KEY (`id_centre`)
    REFERENCES `mydb`.`centers` (`id_center`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_statut1`
    FOREIGN KEY (`id_statut`)
    REFERENCES `mydb`.`statuts` (`id_statut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`comments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`comments` (
  `id_comment` INT NOT NULL,
  `comment` CHAR(255) NOT NULL,
  `url_img` CHAR(255) NULL,
  `id_user` INT NOT NULL,
  `id_commentbis` INT NULL,
  PRIMARY KEY (`id_comment`),
  INDEX `fk_comments_users1_idx` (`id_user` ASC),
  INDEX `fk_comments_comments1_idx` (`id_comment` ASC),
  CONSTRAINT `fk_comments_users1`
    FOREIGN KEY (`id_user`)
    REFERENCES `mydb`.`users` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comments_comments1`
    FOREIGN KEY (`id_comment`)
    REFERENCES `mydb`.`comments` (`id_comment`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`events`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`events` (
  `id_events` INT NOT NULL,
  `event_name` CHAR(45) NOT NULL,
  `event_description` CHAR(255) NOT NULL,
  `event_date` DATETIME NULL,
  `event_place` CHAR(75) NULL,
  `event_like` INT NOT NULL DEFAULT 0,
  `event_price` FLOAT NULL,
  `event_p_r` INT NULL,
  `event_p_t` INT NULL,
  PRIMARY KEY (`id_events`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`events_has_users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`events_has_users` (
  `id_event` INT NOT NULL,
  `id_user` INT NOT NULL,
  PRIMARY KEY (`id_event`, `id_user`),
  INDEX `fk_events_has_users_users1_idx` (`id_user` ASC),
  INDEX `fk_events_has_users_events1_idx` (`id_event` ASC),
  CONSTRAINT `fk_events_has_users_events1`
    FOREIGN KEY (`id_event`)
    REFERENCES `mydb`.`events` (`id_events`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_events_has_users_users1`
    FOREIGN KEY (`id_user`)
    REFERENCES `mydb`.`users` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`products` (
  `id_product` INT NOT NULL,
  `product_name` CHAR(45) NOT NULL,
  `product_desc` CHAR(255) NOT NULL,
  `product_price` FLOAT NOT NULL,
  `product_qty` INT NOT NULL,
  `product_img` CHAR(255) NOT NULL,
  `product_nb_com` INT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_product`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`products_has_users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`products_has_users` (
  `id_product` INT NOT NULL,
  `id_user` INT NOT NULL,
  `qty` INT NOT NULL DEFAULT 1,
  `statut` INT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_product`, `id_user`),
  INDEX `fk_products_has_users1_users1_idx` (`id_user` ASC),
  INDEX `fk_products_has_users1_products1_idx` (`id_product` ASC),
  CONSTRAINT `fk_products_has_users1_products1`
    FOREIGN KEY (`id_product`)
    REFERENCES `mydb`.`products` (`id_product`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_products_has_users1_users1`
    FOREIGN KEY (`id_user`)
    REFERENCES `mydb`.`users` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;