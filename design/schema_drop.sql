ALTER TABLE `invoices` DROP FOREIGN KEY `invoices_fk0`;

ALTER TABLE `product_count` DROP FOREIGN KEY `product_count_fk0`;

ALTER TABLE `inv_lines` DROP FOREIGN KEY `inv_lines_fk0`;

ALTER TABLE `inv_lines` DROP FOREIGN KEY `inv_lines_fk1`;

DROP TABLE IF EXISTS `customers`;

DROP TABLE IF EXISTS `products`;

DROP TABLE IF EXISTS `invoices`;

DROP TABLE IF EXISTS `product_count`;

DROP TABLE IF EXISTS `inv_lines`;

