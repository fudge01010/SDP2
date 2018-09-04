CREATE TABLE `customers` (
	`cust_id` INT(6) NOT NULL AUTO_INCREMENT,
	`fullname` varchar(64) NOT NULL,
	`contactno` INT(10) NOT NULL,
	`postcode` INT(4) NOT NULL,
	PRIMARY KEY (`cust_id`)
);

CREATE TABLE `products` (
	`prod_id` INT(6) NOT NULL AUTO_INCREMENT,
	`cost` DECIMAL NOT NULL,
	`description` varchar(512) NOT NULL,
	`name` varchar(64) NOT NULL,
	PRIMARY KEY (`prod_id`)
);

CREATE TABLE `invoices` (
	`inv_id` INT(6) NOT NULL AUTO_INCREMENT,
	`date` DATE NOT NULL,
	`total` DECIMAL NOT NULL,
	`paid` BOOLEAN NOT NULL,
	`customer` INT(6) NOT NULL,
	PRIMARY KEY (`inv_id`)
);

CREATE TABLE `product_count` (
	`prod_id` INT(6) NOT NULL AUTO_INCREMENT,
	`level` INT(3) NOT NULL,
	PRIMARY KEY (`prod_id`)
);

CREATE TABLE `inv_lines` (
	`line_id` INT(6) NOT NULL AUTO_INCREMENT,
	`inv_id` INT(6) NOT NULL,
	`prod_id` INT(6) NOT NULL,
	`qty` INT NOT NULL,
	PRIMARY KEY (`line_id`)
);

ALTER TABLE `invoices` ADD CONSTRAINT `invoices_fk0` FOREIGN KEY (`customer`) REFERENCES `customers`(`cust_id`);

ALTER TABLE `product_count` ADD CONSTRAINT `product_count_fk0` FOREIGN KEY (`prod_id`) REFERENCES `products`(`prod_id`);

ALTER TABLE `inv_lines` ADD CONSTRAINT `inv_lines_fk0` FOREIGN KEY (`inv_id`) REFERENCES `invoices`(`inv_id`);

ALTER TABLE `inv_lines` ADD CONSTRAINT `inv_lines_fk1` FOREIGN KEY (`prod_id`) REFERENCES `products`(`prod_id`);

