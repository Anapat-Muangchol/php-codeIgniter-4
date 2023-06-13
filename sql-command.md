# SQL Command

## Create Table

CREATE TABLE `php-codeigniter`.news (
	id int(10) auto_increment NOT NULL PRIMARY KEY,
	title varchar(128) NOT NULL,
	slug varchar(128) NOT NULL,
	body text NOT NULL
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb3
COLLATE=utf8mb3_general_ci;
