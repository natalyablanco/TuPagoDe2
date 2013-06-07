/* Replace this file with actual dump of your database */
CREATE TABLE IF NOT EXISTS `transaction` (
  `merchant_usn` varchar(12) DEFAULT NULL,
  `amount` int(12) NOT NULL,
  `nit` varchar(64) DEFAULT NULL,
  `trans_status` varchar(3) NOT NULL,
  `message` varchar(500) NOT NULL,
  `payment_type` varchar(1) NOT NULL,
  `order_id` varchar(20) NOT NULL,
  `punto` varchar(128) NOT NULL,
  PRIMARY KEY (`order_id`)
);

CREATE TABLE IF NOT EXISTS `merchant` (
	  `merchant_id` varchar(15) NOT NULL,
	  `nombre` varchar(20) NOT NULL,
	  PRIMARY KEY (`merchant_id`)
);

CREATE TABLE IF NOT EXISTS `puntoconexion` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nombrePunto` varchar(128) NOT NULL,
  `info` varchar(256),
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `cedula` int(20) NOT NULL,
  `nombres` varchar(128) NOT NULL,
  `apellidos` varchar(128) NOT NULL,
  `correo` varchar(128) NOT NULL,
  `direccion` varchar(128) NOT NULL,
  `numeroTelefono` int(20) DEFAULT NULL,
  `numeroCelular` int(20) DEFAULT NULL,
  `fechaNacimiento` date NOT NULL,
  PRIMARY KEY (`cedula`)
) 

truncate merchant;
truncate transaction;
truncate puntoconexion;
truncate tbl_user;
