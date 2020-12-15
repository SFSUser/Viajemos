-- Viajemos.autores definition

CREATE TABLE `autores` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;


-- Viajemos.editoriales definition

CREATE TABLE `editoriales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `sede` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;


-- Viajemos.libros definition

CREATE TABLE `libros` (
  `ISBN` int(13) NOT NULL,
  `editoriales_id` int(10) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `sinopsis` text NOT NULL,
  `n_paginas` varchar(45) NOT NULL,
  PRIMARY KEY (`ISBN`),
  KEY `libros_fk0` (`editoriales_id`),
  CONSTRAINT `libros_fk0` FOREIGN KEY (`editoriales_id`) REFERENCES `editoriales` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- Viajemos.autores_has_libros definition

CREATE TABLE `autores_has_libros` (
  `autores_id` int(10) NOT NULL,
  `libros_ISBN` int(13) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `autores_has_libros_fk0` (`autores_id`),
  KEY `autores_has_libros_fk1` (`libros_ISBN`),
  CONSTRAINT `autores_has_libros_fk0` FOREIGN KEY (`autores_id`) REFERENCES `autores` (`id`),
  CONSTRAINT `autores_has_libros_fk1` FOREIGN KEY (`libros_ISBN`) REFERENCES `libros` (`ISBN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;