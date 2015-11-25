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

INSERT INTO `establecimiento` (`usuarios_login`, `nombre`, `direccion`, `telefono`, `web`, `horario`, `descripcionestablecimento`) VALUES('millenium', 'Millenium', 'C/Manzana Nº2', '988458212', 'www.millenium.com', '09.00 - 22.00', 'Comida italiana casera');
INSERT INTO `establecimiento` (`usuarios_login`, `nombre`, `direccion`, `telefono`, `web`, `horario`, `descripcionestablecimento`) VALUES('peregrinus', 'Peregrinus', 'Avd/Principal Bajo 23', '988654212', 'www.Peregrinus.com', '13.00-24.00', 'Especialistaas en carne');
INSERT INTO `establecimiento` (`usuarios_login`, `nombre`, `direccion`, `telefono`, `web`, `horario`, `descripcionestablecimento`) VALUES('casapepe', 'Casa Pepe', 'C/Manzana Nº20', '988314756', 'www.casa-pepe.com', '09.00 - 16.00', 'Comida casera muy rica');
INSERT INTO `establecimiento` (`usuarios_login`, `nombre`, `direccion`, `telefono`, `web`, `horario`, `descripcionestablecimento`) VALUES('comecome', 'Come Come', 'c/Abajo Nº82', '988564123', 'www.come.com', '13.00-24.00', 'Muy buen precio');
INSERT INTO `establecimiento` (`usuarios_login`, `nombre`, `direccion`, `telefono`, `web`, `horario`, `descripcionestablecimento`) VALUES('tapitas', 'Tapitas', 'Plaza Mayor Nº2', '988756301', 'www.tapitas.es', '19.00 - 02.00', 'Las mejores tapas de Ourense');
INSERT INTO `establecimiento` (`usuarios_login`, `nombre`, `direccion`, `telefono`, `web`, `horario`, `descripcionestablecimento`) VALUES('recuncho', 'O Recuncho', 'C/Arriba Nº45', '988756400', 'www.recuncho.com', '12.00-17.00', 'Comida tradicional gallega');
INSERT INTO `establecimiento` (`usuarios_login`, `nombre`, `direccion`, `telefono`, `web`, `horario`, `descripcionestablecimento`) VALUES('brasa', 'Brasa', 'C/Larga Nº120', '988120365', 'www.brasa.com', '12.00 - 22.00', 'Especialistas en churrasco');
INSERT INTO `establecimiento` (`usuarios_login`, `nombre`, `direccion`, `telefono`, `web`, `horario`, `descripcionestablecimento`) VALUES('centolo', 'O Centolo', 'Avd/Mar nº9', '988213366', 'www.centolo.com', '13.00-24.00', 'Especialidades de la casa: pulpo, marico y bacalao');
INSERT INTO `establecimiento` (`usuarios_login`, `nombre`, `direccion`, `telefono`, `web`, `horario`, `descripcionestablecimento`) VALUES('tiacarmucha', 'Tia Carmucha', 'C/restaurante Nº43', '98777231', 'www.carmucha.com', '09.00 - 15.00', 'Especialistas en cocido');
INSERT INTO `establecimiento` (`usuarios_login`, `nombre`, `direccion`, `telefono`, `web`, `horario`, `descripcionestablecimento`) VALUES('lareira', 'Lareira', 'Avd/Principal nº89', '988276143', 'www.lareira.com', '13.00-20.00', 'Muy acogedor');
INSERT INTO `establecimiento` (`usuarios_login`, `nombre`, `direccion`, `telefono`, `web`, `horario`, `descripcionestablecimento`) VALUES('atarazana', 'A Tarazana', 'C/Larga Nº10', '988751236', 'www.tarazana.com', '12.00 - 22.00', 'La mejor sopa de la ciudad');
INSERT INTO `establecimiento` (`usuarios_login`, `nombre`, `direccion`, `telefono`, `web`, `horario`, `descripcionestablecimento`) VALUES('elpalto', 'El Plato', 'c/Manzana nº9', '988541136', 'www.el-plato.com', '13.00-24.00', 'Musica en directo durante la cena');
INSERT INTO `establecimiento` (`usuarios_login`, `nombre`, `direccion`, `telefono`, `web`, `horario`, `descripcionestablecimento`) VALUES('treboles', 'Treboles', 'C/restaurante nº1', '9881536', 'www.treboles.com', '09.00 - 15.00', 'Comida vegetariana');
INSERT INTO `establecimiento` (`usuarios_login`, `nombre`, `direccion`, `telefono`, `web`, `horario`, `descripcionestablecimento`) VALUES('elreydelamesa', 'El Rey de la mesa', 'Avd/Principal nº60', '988882145', 'www.rey-mesa.com', '13.00-20.00', 'Restaurante muy familiar');

--Insertat Pincho

INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(1, 'Delicia de salmon', './img/pinchos/1_3_centolo.jpg', 'Salmon ahumado sobre pan tostado', 'Salmon ahumado, pan tostado', 2.5, 'A', 3, 'centolo');
INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(2, 'Verdecillo', './img/pinchos/2_5_trboles.jpg', 'Exquisita combinacion de vegetales', 'Calabacin, zanahoria, cebolla, esparragos', 2.5, 'A', 5, 'treboles');
INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(3, 'Tortilla', './img/pinchos/3_1_casapepe.jpg', 'Tipica tortilla de patatas casera', 'Huevo, Cebolla, Patata', 2.5, 'A', 1, 'casapepe');
INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(4, 'Huevo frito', './img/pinchos/4_1_tiacarmucha.jpg', 'Huevo frito simple', 'Huevo', 2.5, 'A', 1, 'tiacarmucha');
INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(5, 'Sardinas', './img/pinchos/5_4_elplato.jpg', 'Sardinas fritas', 'Sardinas', 2.5, 'A', 4, 'elplato');
INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(6, 'Mejillones', './img/pinchos/6_5_tapitas.jpg', 'Mejillones en vinagreta', 'Mejillones, pimiento, cebolla, vinagre', 2.5, 'A', 5, 'tapitas');
INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(7, 'Chipirones', './img/pinchos/7_5_comecome.jpg', 'Chipirones rellenos', 'Chipirones, pimiento, tomate, zanahoria', 2.5, 'A', 5, 'comecome');
INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(8, 'Cocidito', './img/pinchos/7_5_tiacarmucha.jpg', 'Degustacion en miniatur de un codido', 'Garbanzos, repollo,chorizo,lacon', 2.5, 'A', 5, 'tiacarmucha');
INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(9, 'Multiarroz', './img/pinchos/9_5_recuncho.jpg', 'Arroz con polo y verduras', 'Pollo, arroz, calabazin, guisantes', 2.5, 'A', 5, 'recuncho');
INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(10, 'Revuelto', './img/pinchos/10_5_elreydelamesa.jpg', 'Deconstruccion de huevo con boletus y panceta', 'Huevo, panceta, boletus', 2.5, 'A', 5, 'elreydelamesa');









