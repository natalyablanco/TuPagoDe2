/* Replace this file with actual dump of your database */
CREATE TABLE IF NOT EXISTS `transaction` (
  `merchant_usn` varchar(12) DEFAULT NULL,
  `amount` int(12) NOT NULL,
  `nit` varchar(64) DEFAULT NULL,
  `trans_status` varchar(3) NOT NULL,
  `message` varchar(500) NOT NULL,
  `payment_type` varchar(1) NOT NULL,
  `order_id` varchar(20) NOT NULL,
  `pago` varchar(128) NOT NULL,
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
  PRIMARY KEY (`id`)
);

truncate merchant;
truncate transaction;
truncate puntoconexion;
