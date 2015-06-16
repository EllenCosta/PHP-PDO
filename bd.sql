CREATE DATABASE pdo;

CREATE TABLE `pdo`.`alunos` ( `id` INT NOT NULL AUTO_INCREMENT , `nome` VARCHAR(255) NOT NULL , `nota` INT NOT NULL , PRIMARY KEY (`id`) ) ENGINE = InnoDB;

INSERT INTO `pdo`.`alunos` (`id`, `nome`, `nota`) 
VALUES 
(NULL, 'sandra', '10'),
(NULL, 'paulo', '6'),
(NULL, 'amanda', '7'),
(NULL, 'carlos', '7'),
(NULL, 'ester', '8'),
(NULL, 'adriana', '7'),
(NULL, 'aline', '7.5'),
(NULL, 'sara', '9'),
(NULL, 'danielle', '7'),
(NULL, 'wellica', '7'),
(NULL, 'larissa', '8'),
(NULL, 'val', '6'),
(NULL, 'suelly', '7.5'),
(NULL, 'katarine', '5'),
(NULL, 'heldaria', '8'),
(NULL, 'gisele', '10'),
(NULL, 'talita', '9'),
(NULL, 'emilly', '9'),
(NULL, 'eneias', '10'),
(NULL, 'elizangela', '8')