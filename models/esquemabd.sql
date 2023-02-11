CREATE TABLE `almacen`.`categoria`
(
	`cat_id` INT NOT NULL AUTO_INCREMENT ,
  `car_nombre` VARCHAR(50) NOT NULL ,
   PRIMARY KEY (`cat_id`)
) ENGINE = InnoDB; 

CREATE TABLE `almacen`.`articulo` 
(
	`art_id` INT NOT NULL AUTO_INCREMENT ,
	 `art_nombre` VARCHAR(50) NOT NULL , 
	 `art_categoria` INT NOT NULL , 
	 `art_cantidad` INT NOT NULL , 
	 PRIMARY KEY (`art_id`),
	 FOREIGN KEY(`art_categoria`) REFERENCES `almacen`.`categoria`(`cat_id`)
) ENGINE = InnoDB; 