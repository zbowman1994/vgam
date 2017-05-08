-- MySQL Script generated by MySQL Workbench
-- Mon May  8 12:10:29 2017
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema ics199grp00
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema ics199grp00
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ics199grp00` DEFAULT CHARACTER SET utf8 ;
USE `ics199grp00` ;

-- -----------------------------------------------------
-- Table `ics199grp00`.`categories`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ics199grp00`.`categories` ;

CREATE TABLE IF NOT EXISTS `ics199grp00`.`categories` (
  `cat_id` INT NOT NULL AUTO_INCREMENT,
  `cat_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`cat_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ics199grp00`.`Customer`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ics199grp00`.`Customer` ;

CREATE TABLE IF NOT EXISTS `ics199grp00`.`Customer` (
  `cust_id` INT NOT NULL AUTO_INCREMENT,
  `f_name` VARCHAR(45) NOT NULL,
  `l_name` VARCHAR(45) NOT NULL,
  `address` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`cust_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ics199grp00`.`cart`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ics199grp00`.`cart` ;

CREATE TABLE IF NOT EXISTS `ics199grp00`.`cart` (
  `cust_id` INT NOT NULL,
  `timestamp` VARCHAR(45) NOT NULL,
  `product_name` VARCHAR(45) NOT NULL,
  `product_price` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`cust_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ics199grp00`.`products`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ics199grp00`.`products` ;

CREATE TABLE IF NOT EXISTS `ics199grp00`.`products` (
  `product_id` INT NOT NULL AUTO_INCREMENT,
  `product_name` VARCHAR(45) NOT NULL,
  `product_description` MEDIUMTEXT NULL DEFAULT NULL,
  `product_price` DECIMAL(9,2) NOT NULL,
  `categories_cat_id` INT NOT NULL,
  `product_image` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`product_id`, `categories_cat_id`),
  INDEX `fk_products_categories_idx` (`categories_cat_id` ASC),
  CONSTRAINT `fk_products_categories`
    FOREIGN KEY (`categories_cat_id`)
    REFERENCES `ics199grp00`.`categories` (`cat_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
