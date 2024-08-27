CREATE TABLE `voiture` (`id` INT NOT NULL AUTO_INCREMENT , `immatriculation` VARCHAR(255) NULL , `marque` VARCHAR(255) NULL , `modele` VARCHAR(255) NULL , `annee` INT NULL , `type_motorisation` VARCHAR(255) NULL , `etat` VARCHAR(255) NULL , `km` INT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `user` (`id` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(255) NULL , `password` VARCHAR(255) NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
