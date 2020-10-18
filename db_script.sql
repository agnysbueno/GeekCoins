-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema sakila
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema geekcoins
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema geekcoins
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `geekcoins` DEFAULT CHARACTER SET utf8 ;
USE `geekcoins` ;

-- -----------------------------------------------------
-- Table `geekcoins`.`categoria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `geekcoins`.`categoria` ;

CREATE TABLE IF NOT EXISTS `geekcoins`.`categoria` (
  `idcategoria` INT NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idcategoria`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `geekcoins`.`colecao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `geekcoins`.`colecao` ;

CREATE TABLE IF NOT EXISTS `geekcoins`.`colecao` (
  `idcolecao` INT NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(500) NOT NULL,
  PRIMARY KEY (`idcolecao`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `geekcoins`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `geekcoins`.`usuario` ;

CREATE TABLE IF NOT EXISTS `geekcoins`.`usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(16) NOT NULL,
  `telefone` CHAR(10) NULL DEFAULT NULL,
  `celular` CHAR(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idusuario`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `geekcoins`.`endereco`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `geekcoins`.`endereco` ;

CREATE TABLE IF NOT EXISTS `geekcoins`.`endereco` (
  `idendereco` INT NOT NULL AUTO_INCREMENT,
  `logradouro` VARCHAR(45) NOT NULL,
  `numero` VARCHAR(4) NULL DEFAULT NULL,
  `complemento` VARCHAR(15) NULL DEFAULT NULL,
  `ponto_referencia` VARCHAR(30) NULL DEFAULT NULL,
  `bairro` VARCHAR(45) NOT NULL,
  `cep` CHAR(8) NOT NULL,
  `cidade` VARCHAR(45) NOT NULL,
  `estado` VARCHAR(45) NOT NULL,
  `usuario_fk` INT NOT NULL,
  PRIMARY KEY (`idendereco`),
  INDEX `fk_endereco_usuario1_idx` (`usuario_fk` ASC),
  CONSTRAINT `fk_endereco_usuario1`
    FOREIGN KEY (`usuario_fk`)
    REFERENCES `geekcoins`.`usuario` (`idusuario`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `geekcoins`.`produto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `geekcoins`.`produto` ;

CREATE TABLE IF NOT EXISTS `geekcoins`.`produto` (
  `idproduto` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(500) NOT NULL,
  `detalhe` VARCHAR(500) NOT NULL,
  `preco_unitario` DOUBLE(5,2) NOT NULL,
  `categoria_fk` INT NOT NULL,
  `colecao_fk` INT NOT NULL,
  PRIMARY KEY (`idproduto`),
  INDEX `fk_produto_categoria_idx` (`categoria_fk` ASC),
  INDEX `fk_produto_colecao1_idx` (`colecao_fk` ASC),
  CONSTRAINT `fk_produto_categoria`
    FOREIGN KEY (`categoria_fk`)
    REFERENCES `geekcoins`.`categoria` (`idcategoria`),
  CONSTRAINT `fk_produto_colecao1`
    FOREIGN KEY (`colecao_fk`)
    REFERENCES `geekcoins`.`colecao` (`idcolecao`))
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `geekcoins`.`imagem`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `geekcoins`.`imagem` ;

CREATE TABLE IF NOT EXISTS `geekcoins`.`imagem` (
  `idimagem` INT NOT NULL AUTO_INCREMENT,
  `url_imagem` VARCHAR(500) NOT NULL,
  `produto_fk` INT NOT NULL,
  PRIMARY KEY (`idimagem`),
  INDEX `imagem_ibfk_1` (`produto_fk` ASC),
  CONSTRAINT `imagem_ibfk_1`
    FOREIGN KEY (`produto_fk`)
    REFERENCES `geekcoins`.`produto` (`idproduto`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `geekcoins`.`pedido`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `geekcoins`.`pedido` ;

CREATE TABLE IF NOT EXISTS `geekcoins`.`pedido` (
  `idpedido` INT NOT NULL AUTO_INCREMENT,
  `usuario_fk` INT NOT NULL,
  `preco_subtotal` DOUBLE(7,2) NOT NULL,
  `desconto` DOUBLE(4,2) NULL DEFAULT NULL,
  `frete` DOUBLE(4,2) NOT NULL,
  `preco_total` DOUBLE(7,2) NOT NULL,
  `nota_fiscal` VARCHAR(30) NOT NULL,
  `tipo_entrega` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`idpedido`),
  INDEX `fk_pedido_usuario1_idx` (`usuario_fk` ASC),
  CONSTRAINT `fk_pedido_usuario1`
    FOREIGN KEY (`usuario_fk`)
    REFERENCES `geekcoins`.`usuario` (`idusuario`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `geekcoins`.`produto_pedido`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `geekcoins`.`produto_pedido` ;

CREATE TABLE IF NOT EXISTS `geekcoins`.`produto_pedido` (
  `idprodutopedido` INT NOT NULL AUTO_INCREMENT,
  `produto_fk` INT NOT NULL,
  `pedido_fk` INT NOT NULL,
  `quantidade` INT NOT NULL,
  `preco_quantidade` DOUBLE(6,2) NOT NULL,
  PRIMARY KEY (`idprodutopedido`),
  INDEX `fk_produto_has_pedido_pedido1_idx` (`pedido_fk` ASC),
  INDEX `fk_produto_has_pedido_produto1_idx` (`produto_fk` ASC),
  CONSTRAINT `fk_produto_has_pedido_pedido1`
    FOREIGN KEY (`pedido_fk`)
    REFERENCES `geekcoins`.`pedido` (`idpedido`),
  CONSTRAINT `fk_produto_has_pedido_produto1`
    FOREIGN KEY (`produto_fk`)
    REFERENCES `geekcoins`.`produto` (`idproduto`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `geekcoins`.`tema`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `geekcoins`.`tema` ;

CREATE TABLE IF NOT EXISTS `geekcoins`.`tema` (
  `idtema` INT NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idtema`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `geekcoins`.`produto_tema`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `geekcoins`.`produto_tema` ;

CREATE TABLE IF NOT EXISTS `geekcoins`.`produto_tema` (
  `idprodutotema` INT NOT NULL AUTO_INCREMENT,
  `produto_fk` INT NOT NULL,
  `tema_fk` INT NOT NULL,
  PRIMARY KEY (`idprodutotema`),
  INDEX `fk_produto_has_tema_tema1_idx` (`tema_fk` ASC),
  INDEX `fk_produto_has_tema_produto1_idx` (`produto_fk` ASC),
  CONSTRAINT `fk_produto_has_tema_produto1`
    FOREIGN KEY (`produto_fk`)
    REFERENCES `geekcoins`.`produto` (`idproduto`),
  CONSTRAINT `fk_produto_has_tema_tema1`
    FOREIGN KEY (`tema_fk`)
    REFERENCES `geekcoins`.`tema` (`idtema`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `geekcoins`.`tag`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `geekcoins`.`tag` ;

CREATE TABLE IF NOT EXISTS `geekcoins`.`tag` (
  `idtag` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`idtag`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `geekcoins`.`produto_tag`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `geekcoins`.`produto_tag` ;

CREATE TABLE IF NOT EXISTS `geekcoins`.`produto_tag` (
  `idprodutotag` INT NOT NULL AUTO_INCREMENT,
  `produto_fk` INT NOT NULL,
  `tag_fk` INT NOT NULL,
  INDEX `fk_produto_has_tag_tag1_idx` (`tag_fk` ASC),
  INDEX `fk_produto_has_tag_produto1_idx` (`produto_fk` ASC),
  PRIMARY KEY (`idprodutotag`),
  CONSTRAINT `fk_produto_has_tag_produto1`
    FOREIGN KEY (`produto_fk`)
    REFERENCES `geekcoins`.`produto` (`idproduto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_produto_has_tag_tag1`
    FOREIGN KEY (`tag_fk`)
    REFERENCES `geekcoins`.`tag` (`idtag`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
