SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `G44_ZOTZ` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `G44_ZOTZ` ;

-- -----------------------------------------------------
-- Table `G44_ZOTZ`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `G44_ZOTZ`.`usuarios` (
  `login` VARCHAR(20) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `tipo` VARCHAR(4) NOT NULL,
  PRIMARY KEY (`login`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `G44_ZOTZ`.`concurso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `G44_ZOTZ`.`concurso` (
  `edicion` INT NOT NULL,
  `folleto` VARCHAR(45),
  `gastromapa` VARCHAR(45),
  `fechac` DATE NOT NULL,
  `fechaf` DATE NOT NULL,
  `usuarios_login` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`edicion`),
  INDEX `fk_concurso_usuarios1_idx` (`usuarios_login` ASC),
  CONSTRAINT `fk_concurso_usuarios1`
    FOREIGN KEY (`usuarios_login`)
    REFERENCES `G44_ZOTZ`.`usuarios` (`login`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `G44_ZOTZ`.`establecimiento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `G44_ZOTZ`.`establecimiento` (
  `usuarios_login` VARCHAR(20) NOT NULL,
  `nombre` VARCHAR(90) NOT NULL,
  `direccion` VARCHAR(90) NOT NULL,
  `telefono` VARCHAR(20) NOT NULL,
  `web` VARCHAR(45) NULL,
  `horario` VARCHAR(15) NOT NULL,
  `descripcionestablecimiento` VARCHAR(200) NOT NULL,
  INDEX `fk_establecimiento_usuarios1_idx` (`usuarios_login` ASC),
  PRIMARY KEY (`usuarios_login`),
  CONSTRAINT `fk_establecimiento_usuarios1`
    FOREIGN KEY (`usuarios_login`)
    REFERENCES `G44_ZOTZ`.`usuarios` (`login`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `G44_ZOTZ`.`pincho`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `G44_ZOTZ`.`pincho` (
  `idpincho` INT NOT NULL AUTO_INCREMENT,
  `nombrepincho` VARCHAR(100) NOT NULL,
  `fotopincho` VARCHAR(50) NOT NULL,
  `descripcionpincho` VARCHAR(500) NOT NULL,
  `ingredientesp` VARCHAR(300) NOT NULL,
  `precio` VARCHAR(5) NOT NULL,
  `aceptado` VARCHAR(1) NULL,
  `concurso_edicion` INT NOT NULL,
  `establecimiento_usuarios_login` VARCHAR(20) NOT NULL,
  INDEX `precio_idx` (`precio` ASC),
  INDEX `fk_pincho_concurso1_idx` (`concurso_edicion` ASC),
  INDEX `fk_pincho_establecimiento1_idx` (`establecimiento_usuarios_login` ASC),
  PRIMARY KEY (`idpincho`),
  CONSTRAINT `fk_pincho_concurso1`
    FOREIGN KEY (`concurso_edicion`)
    REFERENCES `G44_ZOTZ`.`concurso` (`edicion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pincho_establecimiento1`
    FOREIGN KEY (`establecimiento_usuarios_login`)
    REFERENCES `G44_ZOTZ`.`establecimiento` (`usuarios_login`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `G44_ZOTZ`.`juradoprofesional`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `G44_ZOTZ`.`juradoprofesional` (
  `usuarios_login` VARCHAR(20) NOT NULL,
  `fotojuradoprofesional` VARCHAR(50) NULL,
  `nombrejuradoprofesional` VARCHAR(60) NOT NULL,
  `reconocimientos` VARCHAR(1000) NULL,
  INDEX `fk_juradoprofesional_usuarios1_idx` (`usuarios_login` ASC),
  PRIMARY KEY (`usuarios_login`),
  CONSTRAINT `fk_juradoprofesional_usuarios1`
    FOREIGN KEY (`usuarios_login`)
    REFERENCES `G44_ZOTZ`.`usuarios` (`login`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `G44_ZOTZ`.`votaprofesional`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `G44_ZOTZ`.`votaprofesional` (
  `pincho_idpincho` INT NOT NULL,
  `juradoprofesional_usuarios_login` VARCHAR(20) NOT NULL,
  `votoprofesional` INT NULL,
  `finalista` TINYINT(1) NULL,
  PRIMARY KEY (`pincho_idpincho`, `juradoprofesional_usuarios_login`),
  INDEX `fk_votaprofesional_juradoprofesional1_idx` (`juradoprofesional_usuarios_login` ASC),
  INDEX `fk_votaprofesional_pincho1_idx` (`pincho_idpincho` ASC),
  CONSTRAINT `fk_votaprofesional_juradoprofesional1`
    FOREIGN KEY (`juradoprofesional_usuarios_login`)
    REFERENCES `G44_ZOTZ`.`juradoprofesional` (`usuarios_login`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_votaprofesional_pincho1`
    FOREIGN KEY (`pincho_idpincho`)
    REFERENCES `G44_ZOTZ`.`pincho` (`idpincho`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `G44_ZOTZ`.`codigopincho`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `G44_ZOTZ`.`codigopincho` (
  `codigopincho` VARCHAR(6) NOT NULL,
  `likes` TINYINT(1) NULL,
  `establecimiento_usuarios_login` VARCHAR(20) NOT NULL,
  `pincho_idpincho` INT NOT NULL,
  PRIMARY KEY (`codigopincho`, `pincho_idpincho`),
  INDEX `fk_codigopincho_establecimiento1_idx` (`establecimiento_usuarios_login` ASC),
  INDEX `fk_codigopincho_pincho1_idx` (`pincho_idpincho` ASC),
  CONSTRAINT `fk_codigopincho_establecimiento1`
    FOREIGN KEY (`establecimiento_usuarios_login`)
    REFERENCES `G44_ZOTZ`.`establecimiento` (`usuarios_login`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_codigopincho_pincho1`
    FOREIGN KEY (`pincho_idpincho`)
    REFERENCES `G44_ZOTZ`.`pincho` (`idpincho`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `G44_ZOTZ` ;

-- -----------------------------------------------------
-- Placeholder table for view `G44_ZOTZ`.`vista_establecimiento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `G44_ZOTZ`.`vista_establecimiento` (`nombre` INT, `direccion` INT, `telefono` INT);

-- -----------------------------------------------------
-- Placeholder table for view `G44_ZOTZ`.`vista_concurso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `G44_ZOTZ`.`vista_concurso` (`edicion` INT, `nombrepincho` INT, `fotopincho` INT, `descripcionpincho` INT, `ingredientesp` INT, `precio` INT);

-- -----------------------------------------------------
-- View `G44_ZOTZ`.`vista_establecimiento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `G44_ZOTZ`.`vista_establecimiento`;
USE `G44_ZOTZ`;
CREATE  OR REPLACE VIEW `vista_establecimiento` AS (
select nombre,direccion,telefono from establecimiento order by 1
);

-- -----------------------------------------------------
-- View `G44_ZOTZ`.`vista_concurso`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `G44_ZOTZ`.`vista_concurso`;
USE `G44_ZOTZ`;
CREATE  OR REPLACE VIEW `vista_concurso` AS (
select concurso.edicion,nombrepincho,fotopincho,descripcionpincho,ingredientesp,precio from concurso inner join pincho on concurso.edicion=pincho.concurso_edicion order by 1 desc,2 asc
);
CREATE USER 'zotz' IDENTIFIED BY 'zotz';

GRANT SELECT, INSERT, TRIGGER, UPDATE, DELETE ON TABLE `G44_ZOTZ`.* TO 'zotz';
GRANT SELECT, INSERT, TRIGGER ON TABLE `G44_ZOTZ`.* TO 'zotz';
GRANT SELECT ON TABLE `G44_ZOTZ`.* TO 'zotz';

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;




-- Insertar Organizador

INSERT INTO `usuarios` (`login`, `password`, `email`, `tipo`) VALUES('carmen', 'orgpass', 'lchousal@gmail.com', 'org');

-- Insertar Concurso

INSERT INTO `concurso` (`edicion`, `fechac`, `fechaf`, `usuarios_login`) VALUES(5,  '2015-11-11', '2015-12-28', 'carmen');
INSERT INTO `concurso` (`edicion`, `fechac`, `fechaf`, `usuarios_login`) VALUES(4, '2014-10-05', '2014-11-13', 'carmen');
INSERT INTO `concurso` (`edicion`, `fechac`, `fechaf`, `usuarios_login`) VALUES(3,  '2014-03-11', '2014-04-07', 'carmen');
INSERT INTO `concurso` (`edicion`, `fechac`, `fechaf`, `usuarios_login`) VALUES(2, '2013-09-10', '2014-10-02', 'carmen');
INSERT INTO `concurso` (`edicion`, `fechac`, `fechaf`, `usuarios_login`) VALUES(1,  '2013-02-11', '2015-03-20', 'carmen');


-- Insertat Usuarios

INSERT INTO `usuarios` (`login`, `password`, `email`, `tipo`) VALUES('millenium', 'milleniumpass', 'millenium@gmail.com', 'est');
INSERT INTO `usuarios` (`login`, `password`, `email`, `tipo`) VALUES('peregrinus', 'peregrinuspass', 'peregrinus@gmail.com', 'est');
INSERT INTO `usuarios` (`login`, `password`, `email`, `tipo`) VALUES('casapepe', 'casapepepass', 'casapepe@gmail.com', 'est');
INSERT INTO `usuarios` (`login`, `password`, `email`, `tipo`) VALUES('comecome', 'comecomepass', 'comecome@gmail.com', 'est');
INSERT INTO `usuarios` (`login`, `password`, `email`, `tipo`) VALUES('tapitas', 'tapitaspass', 'tapitas@gmai.com', 'est');
INSERT INTO `usuarios` (`login`, `password`, `email`, `tipo`) VALUES('recuncho', 'recunchopass', 'recuncho@gmail.com', 'est');
INSERT INTO `usuarios` (`login`, `password`, `email`, `tipo`) VALUES('brasa', 'brasapass', 'brasapass@gmail.com', 'est');
INSERT INTO `usuarios` (`login`, `password`, `email`, `tipo`) VALUES('centolo', 'centolopass', 'centolopass@gmail.com', 'est');
INSERT INTO `usuarios` (`login`, `password`, `email`, `tipo`) VALUES('tiacarmucha', 'tiacarmuchapass', 'tiacarmucha@gmail.com', 'est');
INSERT INTO `usuarios` (`login`, `password`, `email`, `tipo`) VALUES('lareira', 'lareirapass', 'lareira@gmail.com', 'est');
INSERT INTO `usuarios` (`login`, `password`, `email`, `tipo`) VALUES('atarazana', 'atarazanapass', 'atarazana@gmail.com', 'est');
INSERT INTO `usuarios` (`login`, `password`, `email`, `tipo`) VALUES('elplato', 'elplatopass', 'elplato@gmail.com', 'est');
INSERT INTO `usuarios` (`login`, `password`, `email`, `tipo`) VALUES('treboles', 'trebolespass', 'treboles@gmail.com', 'est');
INSERT INTO `usuarios` (`login`, `password`, `email`, `tipo`) VALUES('elreydelamesa', 'elreydelamesapass', 'elreydelamesa@gmail.com', 'est');

INSERT INTO `usuarios` (`login`, `password`, `email`, `tipo`) VALUES('mariano', 'marianopass', 'mariano@gmail.com', 'jpro');
INSERT INTO `usuarios` (`login`, `password`, `email`, `tipo`) VALUES('maria', 'mariapass', 'maria@gmail.com', 'jpro');
INSERT INTO `usuarios` (`login`, `password`, `email`, `tipo`) VALUES('paloma', 'palomapass', 'paloma@gmail.com', 'jpro');
INSERT INTO `usuarios` (`login`, `password`, `email`, `tipo`) VALUES('jose', 'josepass', 'jose@gmail.com', 'jpro');
INSERT INTO `usuarios` (`login`, `password`, `email`, `tipo`) VALUES('alberto', 'albertopass', 'alberto@gmail.com', 'jpro');

INSERT INTO `usuarios` (`login`, `password`, `email`, `tipo`) VALUES('jaime', 'jaimepass', 'jaime@gmail.com', 'jpop');
INSERT INTO `usuarios` (`login`, `password`, `email`, `tipo`) VALUES('laura', 'laurapass', 'laura@gmail.com', 'jpop');
INSERT INTO `usuarios` (`login`, `password`, `email`, `tipo`) VALUES('german', 'germanpass', 'german@gmail.com', 'jpop');
INSERT INTO `usuarios` (`login`, `password`, `email`, `tipo`) VALUES('clara', 'clarapass', 'clara@gmail.com', 'jpop');
INSERT INTO `usuarios` (`login`, `password`, `email`, `tipo`) VALUES('sergio', 'sergiopass', 'sergio@gmail.com', 'jpop');
INSERT INTO `usuarios` (`login`, `password`, `email`, `tipo`) VALUES('ramon', 'ramonpass', 'ramon@gmail.com', 'jpop');
INSERT INTO `usuarios` (`login`, `password`, `email`, `tipo`) VALUES('marcos', 'marcospass', 'macos@gmail.com', 'jpop');
INSERT INTO `usuarios` (`login`, `password`, `email`, `tipo`) VALUES('patricia', 'patriciapass', 'patricia@gmail.com', 'jpop');
INSERT INTO `usuarios` (`login`, `password`, `email`, `tipo`) VALUES('josemiguel', 'josemiguelpass', 'josemiguel@gmail.com', 'jpop');

-- Insertar Establecimientos

INSERT INTO `establecimiento` (`usuarios_login`, `nombre`, `direccion`, `telefono`, `web`, `horario`, `descripcionestablecimiento`) VALUES('millenium', 'Millenium', 'C/Manzana N&ordm;2', '988458212', 'www.millenium.com', '09.00 - 22.00', 'Comida italiana casera');
INSERT INTO `establecimiento` (`usuarios_login`, `nombre`, `direccion`, `telefono`, `web`, `horario`, `descripcionestablecimiento`) VALUES('peregrinus', 'Peregrinus', 'Avd/Principal Bajo 23', '988654212', 'www.Peregrinus.com', '13.00-24.00', 'Especialistaas en carne');
INSERT INTO `establecimiento` (`usuarios_login`, `nombre`, `direccion`, `telefono`, `web`, `horario`, `descripcionestablecimiento`) VALUES('casapepe', 'Casa Pepe', 'C/Manzana N&ordm;20', '988314756', 'www.casa-pepe.com', '09.00 - 16.00', 'Comida casera muy rica');
INSERT INTO `establecimiento` (`usuarios_login`, `nombre`, `direccion`, `telefono`, `web`, `horario`, `descripcionestablecimiento`) VALUES('comecome', 'Come Come', 'c/Abajo N&ordm;82', '988564123', 'www.come.com', '13.00-24.00', 'Muy buen precio');
INSERT INTO `establecimiento` (`usuarios_login`, `nombre`, `direccion`, `telefono`, `web`, `horario`, `descripcionestablecimiento`) VALUES('tapitas', 'Tapitas', 'Plaza Mayor N&ordm;2', '988756301', 'www.tapitas.es', '19.00 - 02.00', 'Las mejores tapas de Ourense');
INSERT INTO `establecimiento` (`usuarios_login`, `nombre`, `direccion`, `telefono`, `web`, `horario`, `descripcionestablecimiento`) VALUES('recuncho', 'O Recuncho', 'C/Arriba N&ordm;45', '988756400', 'www.recuncho.com', '12.00-17.00', 'Comida tradicional gallega');
INSERT INTO `establecimiento` (`usuarios_login`, `nombre`, `direccion`, `telefono`, `web`, `horario`, `descripcionestablecimiento`) VALUES('brasa', 'Brasa', 'C/Larga N&ordm;120', '988120365', 'www.brasa.com', '12.00 - 22.00', 'Especialistas en churrasco');
INSERT INTO `establecimiento` (`usuarios_login`, `nombre`, `direccion`, `telefono`, `web`, `horario`, `descripcionestablecimiento`) VALUES('centolo', 'O Centolo', 'Avd/Mar n&ordm;9', '988213366', 'www.centolo.com', '13.00-24.00', 'Especialidades de la casa: pulpo, marisco y bacalao');
INSERT INTO `establecimiento` (`usuarios_login`, `nombre`, `direccion`, `telefono`, `web`, `horario`, `descripcionestablecimiento`) VALUES('tiacarmucha', 'Tia Carmucha', 'C/restaurante N&ordm;43', '98777231', 'www.carmucha.com', '09.00 - 15.00', 'Especialistas en cocido');
INSERT INTO `establecimiento` (`usuarios_login`, `nombre`, `direccion`, `telefono`, `web`, `horario`, `descripcionestablecimiento`) VALUES('lareira', 'Lareira', 'Avd/Principal n&ordm;89', '988276143', 'www.lareira.com', '13.00-20.00', 'Muy acogedor');
INSERT INTO `establecimiento` (`usuarios_login`, `nombre`, `direccion`, `telefono`, `web`, `horario`, `descripcionestablecimiento`) VALUES('atarazana', 'A Tarazana', 'C/Larga N&ordm;10', '988751236', 'www.tarazana.com', '12.00 - 22.00', 'La mejor sopa de la ciudad');
INSERT INTO `establecimiento` (`usuarios_login`, `nombre`, `direccion`, `telefono`, `web`, `horario`, `descripcionestablecimiento`) VALUES('elplato', 'El Plato', 'c/Manzana n&ordm;9', '988541136', 'www.el-plato.com', '13.00-24.00', 'M&uacute;sica en directo durante la cena');
INSERT INTO `establecimiento` (`usuarios_login`, `nombre`, `direccion`, `telefono`, `web`, `horario`, `descripcionestablecimiento`) VALUES('treboles', 'Treboles', 'C/restaurante n&ordm;1', '9881536', 'www.treboles.com', '09.00 - 15.00', 'Comida vegetariana');
INSERT INTO `establecimiento` (`usuarios_login`, `nombre`, `direccion`, `telefono`, `web`, `horario`, `descripcionestablecimiento`) VALUES('elreydelamesa', 'El Rey de la mesa', 'Avd/Principal n&ordm;60', '988882145', 'www.rey-mesa.com', '13.00-20.00', 'Restaurante muy familiar');

-- Insertar JuradoProfesional

INSERT INTO `juradoprofesional` (`usuarios_login`,`fotojuradoprofesional`,`nombrejuradoprofesional`,`reconocimientos`) VALUES('mariano','mariano.jpg','Mariano Sousas Fern&aacute;ndez','Nombrado tres veces estrella Michelin por sus grandes obras gastron&oacute;micas');
INSERT INTO `juradoprofesional` (`usuarios_login`,`fotojuradoprofesional`,`nombrejuradoprofesional`,`reconocimientos`) VALUES('maria','maria.jpg','Mar&iacute;a P&eacute;rez L&oacute;pez','Mejor repostera del a&ntilde;o 2013 y finalista al bogavante de oro en el a&ntilde;o 2014');
INSERT INTO `juradoprofesional` (`usuarios_login`,`fotojuradoprofesional`,`nombrejuradoprofesional`,`reconocimientos`) VALUES('paloma','paloma.jpg','Paloma Fern&aacute;ndez &Aacute;lvarez','Nombrada finalista tres a&ntilde;os consecutivos (2010-2013) y ganadora en el a&ntilde;o 2014 de los premios Restaurante de Oro');
INSERT INTO `juradoprofesional` (`usuarios_login`,`fotojuradoprofesional`,`nombrejuradoprofesional`,`reconocimientos`) VALUES('jose','jose.jpg','Jose M&eacute;ndez Castro','Mejor pincho en el certamen de pinchos de Madrid en el a&ntilde;o 2014');
INSERT INTO `juradoprofesional` (`usuarios_login`,`fotojuradoprofesional`,`nombrejuradoprofesional`,`reconocimientos`) VALUES('alberto','alberto.jpg','Alberto Dom&iacute;nguez Pereira','Maestro cocinero reconocido internacionalmente por la revista Kitchen');

-- Insertar Pincho

INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(null, 'Tortilla', 'pincho_1_casapepe.jpg', 'Tipica tortilla de patatas casera', 'Huevo, Cebolla, Patata', '2.30', 'A', 1, 'casapepe');
INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(null, 'Huevo frito', 'pincho_1_tiacarmucha.jpg', 'Huevo frito simple', 'Huevo, aceite y sal.', '2.70', 'A', 1, 'tiacarmucha');
INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(null, 'Revuelto', 'pincho_1_elreydelamesa.jpg', 'Deconstruccion de huevo con boletus y panceta', 'Huevo, panceta, boletus', '2.00', 'A', 1, 'elreydelamesa');
INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(null, 'Lomos de merluza en salsa de crust&aacute;ceos', 'pincho_1_treboles.jpg', 'Sabores de mar cautivadores y explosivos que te har&aacute;n disfrutar de momentos de pasi&oacute;n y extasis', 'Lomos de merluza, cebolla, tomate, mejill&oacute;n, aceite, pimienta negra y perejil', '5.45', 'A', 1, 'treboles');
INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(null, 'Montaditos de salchicha', 'pincho_1_elplato.jpg', 'Salchicha que descansa placidamente sobre un colch&oacute;n de pimiento rojo y pan.', 'Salchicha, pan, primiento rojo, mermelada de cebolla y aceite.', '2.5', 'A', 1, 'elplato');
INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(null, 'Pincho de calabaza al horno', 'pincho_1_lareira.jpg', 'Cubo de calabaza relleno de arroz bastami, arandanos secos, pistachos pelados, calde de verduras, cebolla, ajo y pimiento verde italiano. Todos ingredientes de primerisima calidad.', 'Calabaza, arroz, ar&aacute;ndanos, pistachos, cebolla, ajo, pimiento verde, tomillo, guindilla, pimienta molida, canela y sal.', '2.80', 'A', 1, 'lareira');
INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(null, 'Alb&oacute;ndiga con tomate rellena de huevo', 'pincho_1_millenium.jpg', 'Alb&oacute;ndiga de carne de ternera rellana de huevo duro que le da un toque de entusiasmo a la tradicional alb&oacute;ndiga para el deleite del comensal.', 'Carne de ternera, ajo, cebolla, comino, clavos de olor, sal, pimienta negra, huevo, hierbabuena, pan rallado, harina, aceite y tomate', '2.35', 'A', 1, 'millenium');
INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(null, 'Hojaldre con pat&eacute; de perdiz, manzana verde y trufa', 'pincho_1_comecome.jpg', 'Bocado con contraste de sabores y un aroma que despiertan el apetito, es un hojaldre con pat&eacute; de perdiz, manzana verde y trufa que est&aacute; para chuparse los dedos', 'Hojaldre, pat&eacute; de perdiz, manzana verde y trufa', '3', 'A', 1, 'comecome');
INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(null, 'Palitos de polenta con parmesano y romero', 'pincho_1_centolo.jpg', 'Polenta  enriquecida con queso y aromatizada con romero y aceite de trufa a la plancha', 'Caldo de jam&oacute;n, romero fresco, polenta, queso parmesano', '2.5', 'A', 1, 'centolo');

INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(null, 'Merluza al tomillo lim&oacute;n con patatas rotas', 'pincho_2_treboles.jpg', 'La Merluza de Pincho se denomina as&iacute; porque esa es la modalidad en la que fue pescada.  Esta merluza es mas cara de lo normal  porque es pescada a la antigua usanza, una a una, de hay el anzuelo que encontraremos en su mandibula. A cambio, aporta una considerable ventaja: lo que se pesca es de primer&iacute;sima calidad.', 'Merluza de Pincho, vino blanco, hierbabuena, pimienta, sal, tomillo y lim&oacute;n', '8.75', 'A', 2, 'treboles');
INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(null, 'Minihamburguesa con queso, philadelphia y cebolla', 'pincho_2_centolo.jpg', 'Para un finde de relax, en el que no tenemos muchas ganas de complicarnos la vida, es ideal esta hamburguesa, pocos ingredientes y de calidad.', 'Pan de hamburguesa, carne de ternera, sal, pimienta negra, queso philadelphia y cebolla', '2.5', 'A', 2, 'centolo');
INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(null, 'Pincho de bacalao a la provenzal', 'pincho_2_elplato.jpg', 'Riquisimo pincho de bacalao al estilo provenzal', 'Bacalao, patatas, salsa bechamel, AOVE, ajo, perejil y pan rallado', '1.75', 'A', 2, 'elplato');
INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(null, 'Brocheta de pollo marinado con verduras', 'pincho_2_peregrinus.jpg', 'Brochetas estupendas de pollo con verduras que quedan estupendamente para preparar un rico y jugoso pincho o para una cena bien completa.', 'Pechuga de pollo, tomate cherry, cebolla, pimiento verde, pimiento rojo, calabac&iacute;n, vino blanco, aceite, cayena, ajo en polvo, cebolla en polvo, romero seco, or&eacute;gano seco, comino en polvo, colorante alimenticio, piment&oacute;n, sal y pimienta', '3.25', 'A', 2, 'peregrinus');
INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(null, 'Carpaccio con tapenade de nueces en hojaldre', 'pincho_2_tapitas.jpg', 'El carpaccio de ternera est&aacute; muy bien acompa&ntilde;ado del tapenade con nueces sobre una tostada', 'Carpaccio, tapenade, nueces, hojaldre', '5', 'A', 2, 'tapitas');
INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(null, 'Cazuelita de almejas con esp&aacute;rragos', 'pincho_2_millenium.jpg', 'Manzanilla y salsa de soja aromatizan este salteado de esp&aacute;rragos, ajos tiernos y almejas', 'Almejas, esp&aacute;rragos, ajo, soja', '2.5', 'A', 2, 'millenium');
INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(null, 'Higos, mozzarella y albahaca', 'pincho_2_recuncho.jpg', 'Pincho fresco y rico en verano, es tan sencillo como combinar higos, mozzarella y albahaca y aderezar con una vinagreta con mostaza, miel y frutos secos', 'Higos, mozzarella, albahaca, vinagreta, miel, frutos secos', '2.5', 'A', 2, 'recuncho');
INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(null, 'Pincho de mel&oacute;n con anchoa y mermelada de cebolla', 'pincho_2_elreydelamesa.jpg', 'Pincho de mel&oacute;n con anchoa y mermelada de cebolla, una combinaci&oacute;n de sabores dulces y salados que resulta elegante al paladar.', 'Mel&oacute;n, anchoa, mermelada de cebolla', '1.5', 'A', 2, 'elreydelamesa');

INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(null, 'Delicia de salmon', 'pincho_3_centolo.jpg', 'Salmon ahumado sobre pan tostado', 'Salmon ahumado, pan tostado', '3.50', 'A', 3, 'centolo');
INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(null, 'Pincho de pollo verde', 'pincho_3_comecome.jpg', 'Pollo, lenchuga, cebolleta y mayonesa sobreuna cama de pan de molde sin corteza crujiente', 'Contramuslos deshuesados de pollo, cebolleta, r&uacute;cula, can&oacute;nigos, lechuga romana, mayonesa, sal, aceite de oliva y pan de model', '2.95', 'A', 3, 'comecome');
INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(null, 'Pimientos del piquillo con salsa de ostras', 'pincho_3_tiacarmucha.jpg', 'Pimientos del piquillo con salsa de ostras que est&aacute;n para mojar pan.', 'Pimientos, ostras', '2', 'A', 3, 'tiacarmucha');
INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(null, 'Patatas a la importancia', 'pincho_3_elreydelamesa.jpg', 'Es un plato popular y bastante conocido. Mi madre las preparaba a menudo, aunque en casa nunca se denominaron patatas a la importancia. En casa eran simplemente patatas rebozadas, que tendremos que reconocer que a pesar de describir muy bien lo que es el plato en s&iacute; es un nombre con mucho menos empaque.', 'Patatas, cebolla, ajo, perejil, azafr&aacute;n, vino blanco, aceite, huevo, harina, sal e pimienta', '3.50', 'A', 3, 'elreydelamesa');
INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(null, 'Minipiza vegetariana', 'pincho_3_elplato.jpg', 'Para aquellos que disfrutan con las buenaz pizzas y les encantan los vegetales no pueden perderse este pincho elaborado en horno de le&ntilde;a y con ingredientes de primera calidad.', 'Harina, aceite, sal, levadura,alcachofa, mozzarela de b&uacute;fala, setas, tomates cherry, albahaca, ajo y queso parmesano', '4.55', 'A', 3, 'elplato');
INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(null, 'Pat&eacute; de berenjena', 'pincho_3_brasa.jpg', 'Este Pat&eacute; de berenjena est&aacute; inspirado en dos platos t&iacute;picos de la cocina &aacute;rabe, el Baba Ganush y el Mutabal (Mtabbal bathenjan), ambos pensados para el disfrute de los sentidos.', 'Berenjena, ajo, lim&oacute;n, tahini, aceite, semillas de s&eacute;samo, comino en polvo y yogurt desnatado cremoso.', '2.65', 'D', 3, 'brasa');
INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(null, 'Salsa de pimientos asados', 'pincho_3_tapitas.jpg', 'Esta salsa de pimientos es una aut&eacute;ntica delicia, ideal para acompa&ntilde;ar aperitivos, pinchos, para aderezar bocadillos y si acompa&ntilde;amos con ella un trozo de tortilla, nos lleva a la gloria. Os invito a hacerla, les gustar&aacute;', 'Pimiento rojo, aceite, vinagre, piment&oacute;n comino, ajo, sal y pimienta', '1.50', 'A', 3, 'tapitas');

INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(null, 'Sardinas', 'pincho_4_elplato.jpg', 'Sardinas fritas', 'Sardinas', '3.50', 'A', 4, 'elplato');
INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(null, 'Pincho de anchoas y pepinillo', 'pincho_4_recuncho.jpg', 'Anchoas y pimiento sobre una rodaja de pepino', 'Pepino largo, cebolleta fresca, pimiento rojo, sal, aceite, pimiento y terneta' ,'1.85', 'A', 4, 'recuncho');
INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(null, 'Patatas rellenas de carne', 'pincho_4_comecome.jpg', 'Explosi&oacute;n de sabores. Manjar de dioses.', 'Patatas, carne, ajo, cebolla, perejil, azafr&aacute;n, aceita, sal, pimienta,harina y huevo.', '6.50', 'N', 4, 'comecome');
INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(null, 'Jam&oacute;n de pato al cacao con vinagreta ahumada de naranja', 'pincho_4_tiacarmucha.jpg', 'Juego de sabores muy acertado porque por un lado est&aacute; la jugosidad y dulzor de la fruta, y por el otro un jam&oacute;n curado con una tendencia salada', 'Jam&oacute;n de pato, cacao, mango, vinagreta, naranja', '2.5', 'A', 4, 'tiacarmucha');
INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(null, 'Mejillones Tigres Rabiosos', 'pincho_4_elreydelamesa.jpg', 'Mejillones as vapor cubiertos en salsa de tomate con cebolla aderezada con oregano, pimienta negra y piment&oacute;n.', 'Mejillones, cebolla, salsa de tomate, ajo, laurel, guindilla, pimiento choricero, vino blanco, or&eacute;gano, pimienta negra y piment&oacute;n picante.', '4.50', 'A', 4, 'elreydelamesa');
INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(null, 'Pincho de at&uacute;n a la plancha al aroma de mostaza', 'pincho_4_tapitas.jpg', 'Lomos de at&uacute;n a la plancha aderezados con mostraza importada de Francia', 'At&uacute;n, aceie, vinagre, mostaza, sal y pimienta blanca', '4.55', 'A', 4, 'tapitas');

INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(null, 'Waps de at&uacute;n y aguacate', 'pincho_5_treboles.jpg', 'Una ensalada con encanto', 'Tortillas de ma&iacute;z, aguacate, huevo, at&uacute;n, bacon ahumado, r&uacute;cula, aceita y pimienta negra', '1.50', 'A', 5, 'treboles');
INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(null, 'Ensalada ahumada de salm&oacute;n y aguacates', 'pincho_5_tapitas.jpg', 'Para cuando una ensalada no es suficiente. Para cuando necesitamos nuevas emociones. Un pincho para disfrutar de una nueva forma de ensaladas.', 'Salm&oacute;n ahumado, aguacate, zumo de lim&oacute;n, aceite, cebolleta, primienta rosa y sal.', '3.45', 'A', 5, 'tapitas');
INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(null, 'Chipirones', 'pincho_5_comecome.jpg', 'Chipirones rellenos', 'Chipirones, pimiento, tomate, zanahoria', '2.75', 'A', 5, 'comecome');
INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(null, 'Cocidito', 'pincho_5_tiacarmucha.jpg', 'Degustacion en miniatur de un codido', 'Garbanzos, repollo,chorizo,lacon', '3.80', 'A', 5, 'tiacarmucha');
INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(null, 'Multiarroz', 'pincho_5_recuncho.jpg', 'Arroz con polo y verduras', 'Pollo, arroz, calabazin, guisantes', '2.25', 'A', 5, 'recuncho');
INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(null, 'Ensalada de brotes de espinacas, queso y frutos secos', 'pincho_5_peregrinus.jpg', 'Para chuparse los dedos. Combinaci&oacute;n de ingredientes asombroso.', 'espinacas, queso de cabra, frutos secos, panceta, az&uacute;car, binagre, aceite y sal', '2.60', 'A', 5, 'peregrinus');
INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(null, 'Berenjena a la parmesana', 'pincho_5_centolo.jpg', 'De las verduras m&aacute;s sabrosas y ricas que existen adornada con queso parmesano y mozzarela.', 'Berenjena, harina, aceite, mozzarela, queso parmesano, tomat, cebolla, ajo, primiento verde, albahaca, sal y pimienta.', '3.60', 'N', 5, 'centolo');
INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(null, 'Alb&oacute;ndiga de carne y queso', 'pincho_5_millenium.jpg', 'Alb&oacute;ndiga de carne y queso presentada sobre una cama de lechuga.', 'Carne de ternera, cebolla, queso emental, eneldo, perejil, arroz, sal y pimienta.', '2.50', 'A', 5, 'millenium');
INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(null, 'Patatas al horno con pasta de soja y guindilla ', 'pincho_5_casapepe.jpg', 'Patatas al horno con pasta de soja fermentada y guindilla, una pasta coreana conocida como Gochu Jang con un toque picante.', 'Patatas, soja y guindilla ', '2.5', 'D', 5, 'casapepe');
INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(null, 'Patatas bravas', 'pincho_5_elplato.jpg', 'Cl&aacute;sico de la cocina madrile&ntilde;a, las patatas bravas con aut&eacute;ntica salsa elaborada.', 'Patatas, salsa brava', '2.5', 'A', 5, 'elplato');




