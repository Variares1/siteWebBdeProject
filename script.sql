-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema database_development
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema database_development
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `database_development` DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema database_production
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema database_production
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `database_production` DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema database_test
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema database_test
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `database_test` DEFAULT CHARACTER SET utf8 ;
USE `database_development` ;

-- -----------------------------------------------------
-- Table `database_development`.`centers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `database_development`.`centers` (
  `id_center` INT(11) NOT NULL AUTO_INCREMENT,
  `center` CHAR(45) NOT NULL,
  PRIMARY KEY (`id_center`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `database_development`.`statuts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `database_development`.`statuts` (
  `id_statut` INT(11) NOT NULL AUTO_INCREMENT,
  `statut` CHAR(45) CHARACTER SET 'big5' NOT NULL,
  PRIMARY KEY (`id_statut`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `database_development`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `database_development`.`users` (
  `id_user` INT(11) NOT NULL AUTO_INCREMENT,
  `user_name` CHAR(45) NOT NULL,
  `user_firstName` CHAR(45) NOT NULL,
  `user_email` CHAR(50) NOT NULL,
  `user_password` CHAR(255) NOT NULL,
  `id_centre` INT(11) NOT NULL,
  `id_statut` INT(11) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE INDEX `email_UNIQUE` (`user_email` ASC),
  UNIQUE INDEX `password_UNIQUE` (`user_password` ASC),
  INDEX `fk_users_centre_idx` (`id_centre` ASC),
  INDEX `fk_users_statut1_idx` (`id_statut` ASC),
  CONSTRAINT `fk_users_centre`
    FOREIGN KEY (`id_centre`)
    REFERENCES `database_development`.`centers` (`id_center`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_statut1`
    FOREIGN KEY (`id_statut`)
    REFERENCES `database_development`.`statuts` (`id_statut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `database_development`.`comments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `database_development`.`comments` (
  `id_comment` INT(11) NOT NULL AUTO_INCREMENT,
  `comment` CHAR(255) NOT NULL,
  `url_img` CHAR(255) NULL DEFAULT NULL,
  `id_user` INT(11) NOT NULL,
  `id_commentbis` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_comment`),
  INDEX `fk_comments_users1_idx` (`id_user` ASC),
  INDEX `fk_comments_comments1_idx` (`id_comment` ASC),
  CONSTRAINT `fk_comments_comments1`
    FOREIGN KEY (`id_comment`)
    REFERENCES `database_development`.`comments` (`id_comment`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comments_users1`
    FOREIGN KEY (`id_user`)
    REFERENCES `database_development`.`users` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `database_development`.`events`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `database_development`.`events` (
  `id_events` INT(11) NOT NULL AUTO_INCREMENT,
  `event_name` CHAR(45) NOT NULL,
  `event_description` CHAR(255) NOT NULL,
  `event_date` DATETIME NULL DEFAULT NULL,
  `event_place` CHAR(75) NULL DEFAULT NULL,
  `event_like` INT(11) NOT NULL DEFAULT '0',
  `event_price` FLOAT NULL DEFAULT NULL,
  `event_p_r` INT(11) NULL DEFAULT NULL,
  `event_p_t` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_events`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `database_development`.`events_has_users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `database_development`.`events_has_users` (
  `id_event` INT(11) NOT NULL AUTO_INCREMENT,
  `id_user` INT(11) NOT NULL,
  PRIMARY KEY (`id_event`, `id_user`),
  INDEX `fk_events_has_users_users1_idx` (`id_user` ASC),
  INDEX `fk_events_has_users_events1_idx` (`id_event` ASC),
  CONSTRAINT `fk_events_has_users_events1`
    FOREIGN KEY (`id_event`)
    REFERENCES `database_development`.`events` (`id_events`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_events_has_users_users1`
    FOREIGN KEY (`id_user`)
    REFERENCES `database_development`.`users` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `database_development`.`products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `database_development`.`products` (
  `id_product` INT(11) NOT NULL AUTO_INCREMENT,
  `product_name` CHAR(45) NOT NULL,
  `product_desc` CHAR(255) NOT NULL,
  `product_price` FLOAT NOT NULL,
  `product_qty` INT(11) NOT NULL,
  `product_img` CHAR(255) NOT NULL,
  `product_nb_com` INT(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_product`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `database_development`.`products_has_users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `database_development`.`products_has_users` (
  `id_product` INT(11) NOT NULL AUTO_INCREMENT,
  `id_user` INT(11) NOT NULL,
  `qty` INT(11) NOT NULL DEFAULT '1',
  `statut` INT(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_product`, `id_user`),
  INDEX `fk_products_has_users1_users1_idx` (`id_user` ASC),
  INDEX `fk_products_has_users1_products1_idx` (`id_product` ASC),
  CONSTRAINT `fk_products_has_users1_products1`
    FOREIGN KEY (`id_product`)
    REFERENCES `database_development`.`products` (`id_product`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_products_has_users1_users1`
    FOREIGN KEY (`id_user`)
    REFERENCES `database_development`.`users` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

USE `database_production` ;

-- -----------------------------------------------------
-- Table `database_production`.`centers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `database_production`.`centers` (
  `id_center` INT(11) NOT NULL AUTO_INCREMENT,
  `center` CHAR(45) NOT NULL,
  PRIMARY KEY (`id_center`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `database_production`.`statuts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `database_production`.`statuts` (
  `id_statut` INT(11) NOT NULL AUTO_INCREMENT,
  `statut` CHAR(45) CHARACTER SET 'big5' NOT NULL,
  PRIMARY KEY (`id_statut`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `database_production`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `database_production`.`users` (
  `id_user` INT(11) NOT NULL AUTO_INCREMENT,
  `user_name` CHAR(45) NOT NULL,
  `user_firstName` CHAR(45) NOT NULL,
  `user_email` CHAR(50) NOT NULL,
  `user_password` CHAR(255) NOT NULL,
  `id_centre` INT(11) NOT NULL,
  `id_statut` INT(11) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE INDEX `email_UNIQUE` (`user_email` ASC),
  UNIQUE INDEX `password_UNIQUE` (`user_password` ASC),
  INDEX `fk_users_centre_idx` (`id_centre` ASC),
  INDEX `fk_users_statut1_idx` (`id_statut` ASC),
  CONSTRAINT `fk_users_centre`
    FOREIGN KEY (`id_centre`)
    REFERENCES `database_production`.`centers` (`id_center`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_statut1`
    FOREIGN KEY (`id_statut`)
    REFERENCES `database_production`.`statuts` (`id_statut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `database_production`.`comments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `database_production`.`comments` (
  `id_comment` INT(11) NOT NULL AUTO_INCREMENT,
  `comment` CHAR(255) NOT NULL,
  `url_img` CHAR(255) NULL DEFAULT NULL,
  `id_user` INT(11) NOT NULL,
  `id_commentbis` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_comment`),
  INDEX `fk_comments_users1_idx` (`id_user` ASC),
  INDEX `fk_comments_comments1_idx` (`id_comment` ASC),
  CONSTRAINT `fk_comments_comments1`
    FOREIGN KEY (`id_comment`)
    REFERENCES `database_production`.`comments` (`id_comment`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comments_users1`
    FOREIGN KEY (`id_user`)
    REFERENCES `database_production`.`users` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `database_production`.`events`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `database_production`.`events` (
  `id_events` INT(11) NOT NULL AUTO_INCREMENT,
  `event_name` CHAR(45) NOT NULL,
  `event_description` CHAR(255) NOT NULL,
  `event_date` DATETIME NULL DEFAULT NULL,
  `event_place` CHAR(75) NULL DEFAULT NULL,
  `event_like` INT(11) NOT NULL DEFAULT '0',
  `event_price` FLOAT NULL DEFAULT NULL,
  `event_p_r` INT(11) NULL DEFAULT NULL,
  `event_p_t` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_events`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `database_production`.`events_has_users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `database_production`.`events_has_users` (
  `id_event` INT(11) NOT NULL AUTO_INCREMENT,
  `id_user` INT(11) NOT NULL,
  PRIMARY KEY (`id_event`, `id_user`),
  INDEX `fk_events_has_users_users1_idx` (`id_user` ASC),
  INDEX `fk_events_has_users_events1_idx` (`id_event` ASC),
  CONSTRAINT `fk_events_has_users_events1`
    FOREIGN KEY (`id_event`)
    REFERENCES `database_production`.`events` (`id_events`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_events_has_users_users1`
    FOREIGN KEY (`id_user`)
    REFERENCES `database_production`.`users` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `database_production`.`products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `database_production`.`products` (
  `id_product` INT(11) NOT NULL AUTO_INCREMENT,
  `product_name` CHAR(45) NOT NULL,
  `product_desc` CHAR(255) NOT NULL,
  `product_price` FLOAT NOT NULL,
  `product_qty` INT(11) NOT NULL,
  `product_img` CHAR(255) NOT NULL,
  `product_nb_com` INT(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_product`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `database_production`.`products_has_users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `database_production`.`products_has_users` (
  `id_product` INT(11) NOT NULL AUTO_INCREMENT,
  `id_user` INT(11) NOT NULL,
  `qty` INT(11) NOT NULL DEFAULT '1',
  `statut` INT(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_product`, `id_user`),
  INDEX `fk_products_has_users1_users1_idx` (`id_user` ASC),
  INDEX `fk_products_has_users1_products1_idx` (`id_product` ASC),
  CONSTRAINT `fk_products_has_users1_products1`
    FOREIGN KEY (`id_product`)
    REFERENCES `database_production`.`products` (`id_product`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_products_has_users1_users1`
    FOREIGN KEY (`id_user`)
    REFERENCES `database_production`.`users` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

USE `database_test` ;

-- -----------------------------------------------------
-- Table `database_test`.`centers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `database_test`.`centers` (
  `id_center` INT(11) NOT NULL AUTO_INCREMENT,
  `center` CHAR(45) NOT NULL,
  PRIMARY KEY (`id_center`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `database_test`.`statuts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `database_test`.`statuts` (
  `id_statut` INT(11) NOT NULL AUTO_INCREMENT,
  `statut` CHAR(45) CHARACTER SET 'big5' NOT NULL,
  PRIMARY KEY (`id_statut`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `database_test`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `database_test`.`users` (
  `id_user` INT(11) NOT NULL AUTO_INCREMENT,
  `user_name` CHAR(45) NOT NULL,
  `user_firstName` CHAR(45) NOT NULL,
  `user_email` CHAR(50) NOT NULL,
  `user_password` CHAR(255) NOT NULL,
  `id_centre` INT(11) NOT NULL,
  `id_statut` INT(11) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE INDEX `email_UNIQUE` (`user_email` ASC),
  UNIQUE INDEX `password_UNIQUE` (`user_password` ASC),
  INDEX `fk_users_centre_idx` (`id_centre` ASC),
  INDEX `fk_users_statut1_idx` (`id_statut` ASC),
  CONSTRAINT `fk_users_centre`
    FOREIGN KEY (`id_centre`)
    REFERENCES `database_test`.`centers` (`id_center`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_statut1`
    FOREIGN KEY (`id_statut`)
    REFERENCES `database_test`.`statuts` (`id_statut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `database_test`.`comments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `database_test`.`comments` (
  `id_comment` INT(11) NOT NULL AUTO_INCREMENT,
  `comment` CHAR(255) NOT NULL,
  `url_img` CHAR(255) NULL DEFAULT NULL,
  `id_user` INT(11) NOT NULL,
  `id_commentbis` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_comment`),
  INDEX `fk_comments_users1_idx` (`id_user` ASC),
  INDEX `fk_comments_comments1_idx` (`id_comment` ASC),
  CONSTRAINT `fk_comments_comments1`
    FOREIGN KEY (`id_comment`)
    REFERENCES `database_test`.`comments` (`id_comment`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comments_users1`
    FOREIGN KEY (`id_user`)
    REFERENCES `database_test`.`users` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `database_test`.`events`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `database_test`.`events` (
  `id_events` INT(11) NOT NULL AUTO_INCREMENT,
  `event_name` CHAR(45) NOT NULL,
  `event_description` CHAR(255) NOT NULL,
  `event_date` DATETIME NULL DEFAULT NULL,
  `event_place` CHAR(75) NULL DEFAULT NULL,
  `event_like` INT(11) NOT NULL DEFAULT '0',
  `event_price` FLOAT NULL DEFAULT NULL,
  `event_p_r` INT(11) NULL DEFAULT NULL,
  `event_p_t` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_events`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `database_test`.`events_has_users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `database_test`.`events_has_users` (
  `id_event` INT(11) NOT NULL AUTO_INCREMENT,
  `id_user` INT(11) NOT NULL,
  PRIMARY KEY (`id_event`, `id_user`),
  INDEX `fk_events_has_users_users1_idx` (`id_user` ASC),
  INDEX `fk_events_has_users_events1_idx` (`id_event` ASC),
  CONSTRAINT `fk_events_has_users_events1`
    FOREIGN KEY (`id_event`)
    REFERENCES `database_test`.`events` (`id_events`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_events_has_users_users1`
    FOREIGN KEY (`id_user`)
    REFERENCES `database_test`.`users` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `database_test`.`products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `database_test`.`products` (
  `id_product` INT(11) NOT NULL AUTO_INCREMENT,
  `product_name` CHAR(45) NOT NULL,
  `product_desc` CHAR(255) NOT NULL,
  `product_price` FLOAT NOT NULL,
  `product_qty` INT(11) NOT NULL,
  `product_img` CHAR(255) NOT NULL,
  `product_nb_com` INT(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_product`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `database_test`.`products_has_users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `database_test`.`products_has_users` (
  `id_product` INT(11) NOT NULL AUTO_INCREMENT,
  `id_user` INT(11) NOT NULL,
  `qty` INT(11) NOT NULL DEFAULT '1',
  `statut` INT(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_product`, `id_user`),
  INDEX `fk_products_has_users1_users1_idx` (`id_user` ASC),
  INDEX `fk_products_has_users1_products1_idx` (`id_product` ASC),
  CONSTRAINT `fk_products_has_users1_products1`
    FOREIGN KEY (`id_product`)
    REFERENCES `database_test`.`products` (`id_product`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_products_has_users1_users1`
    FOREIGN KEY (`id_user`)
    REFERENCES `database_test`.`users` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
