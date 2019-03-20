version 1:
CREATE TABLE `product_descriptions` (
`id` INT(11) NOT NULL AUTO_INCREMENT,
`product_id` INT(11) NOT NULL,
`lang` VARCHAR(5) DEFAULT 'eng',
`name` VARCHAR(255) NOT NULL,
`description` TEXT,
PRIMARY KEY (`id`)
) ENGINE = InnoDB;

INSERT INTO `product_descriptions` (`product_id`, `name`, `description`)
SELECT `id`, `name`, `description` FROM `products`;

DELETE `name`, `description` FROM `products`;
---------------------------------------------------------------------
version 2:
CREATE TABLE `product_descriptions` (
`id` INT(11) NOT NULL AUTO_INCREMENT,
`product_id` INT(11) NOT NULL,
`lang` VARCHAR(5) NOT NULL,
`name` VARCHAR(255) NOT NULL,
`description` TEXT,
PRIMARY KEY (`id`)
) ENGINE = InnoDB;

INSERT INTO `product_descriptions` (`product_id`, `lang`, `name`, `description`)
SELECT `id`, 'eng', `name`, `description` FROM `products`;

DELETE `name`, `description` FROM `products`;
