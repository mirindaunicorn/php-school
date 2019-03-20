INSERT INTO `product_descriptions` (`product_id`, `lang`, `name`, `description`)
VALUES (<product_id value>, <lang value>, <name value>, <description value>)
ON DUPLICATE KEY UPDATE `name`=<name value>, `description`=<description value>;
