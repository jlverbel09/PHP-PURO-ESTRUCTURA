/*
SQLyog Ultimate v11.33 (32 bit)
MySQL - 10.4.13-MariaDB : Database - phppuro
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`phppuro` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` double DEFAULT NULL,
  `commentary` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

/*Data for the table `users` */

insert  into `users`(`id`,`firstname`,`lastname`,`email`,`phone`,`commentary`,`created_at`,`updated_at`,`deleted_at`) values (1,'jorge luis','verbel diaz','jlverbel09@gmail.com',3224545,'hola mundo jorge','2020-08-12 13:21:36','2020-08-12 13:37:58',NULL),(2,'saray vannesa','verbel diaz','saray@gmail.com',3045264,'hola mundo saray','2020-08-12 13:21:57','2020-08-12 13:38:54',NULL),(3,'miguel angel ','verbel diaz','miguel@gmail.com',3015426,'hola mundo migue','2020-08-12 13:22:17','2020-08-26 16:52:07',NULL),(4,'gabriel santi','pertuz cortez','daniel@gmail.com',3012547,'hola mundo santi','2020-08-12 13:22:50','2020-08-12 13:39:08',NULL),(5,'maria camila','perez villalobo','maria@gmail.com',3045785,'hola mundo maria ','2020-08-12 13:23:15','2020-08-12 13:39:14',NULL),(6,'bruce wein','banner jose','bruce@gmail.com',3046352,'hola mundo bruce','2020-08-12 13:24:00','2020-08-12 14:50:13',NULL),(7,'daniel armando ','jimenez gomez','daniel@gmail.com',3224578,'hola mundo daniel','2020-08-12 13:41:57',NULL,NULL),(8,'camila del socorro','puentes fria','camila@gmail.com',3014545,'hola mundo camila','2020-08-12 14:49:42',NULL,NULL),(9,'ortencia maria','del socorro','ortencia@gmail.com',3045263,'hola ortencia','2020-08-12 15:11:52','2020-08-12 15:33:42',NULL),(10,'carmen angelica','verbel garcia','carmen@gmail.com',3224545,'hola carmen','2020-08-12 15:33:18','2020-08-12 15:33:51',NULL),(11,'daniel','dante perea','daniel@gmail.com',3224545,'hola mundo','2020-09-16 17:49:10',NULL,NULL);

/* Procedure structure for procedure `sp_clients` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_clients` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_clients`(
	IN accion VARCHAR(100),
	in firstname_ varchar(100),
	in lastname_ varchar(100),
	in email_ varchar(100),
	in phone_ double,
	in commentary_ text,
	in idUser_ int(11)
	
    )
BEGIN
    
	case accion 
	
		when 'consultar' then 
			
			SELECT * FROM users order by id desc;
		
		when 'registrar' then
		
			insert into users (firstname,lastname,email,phone,commentary) 
			values (firstname_,lastname_,email_,phone_,commentary_);
		
		WHEN 'modificar' THEN
		
			update users set 
				firstname = firstname_,
				lastname = lastname_,
				email = email_,
				phone = phone_,
				commentary = commentary_ ,
				updated_at = now()
				where id = idUser_;
			
		WHEN 'eliminar' THEN
		
			DELETE FROM users WHERE id = idUser_;
			
		when 'consultarById' then
		
			select * from users where id = idUser_;
		
	end case;
    END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
