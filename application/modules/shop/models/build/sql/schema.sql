
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- shop_category
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_category`;

CREATE TABLE `shop_category`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`external_id` VARCHAR(255),
	`url` VARCHAR(255) NOT NULL,
	`active` TINYINT(1),
	`image` VARCHAR(255),
	`parent_id` INTEGER,
	`position` INTEGER,
	`full_path` VARCHAR(1000),
	`full_path_ids` VARCHAR(250),
	`tpl` VARCHAR(250),
	`order_method` INTEGER,
	`showsitetitle` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `shop_category_I_1` (`url`),
	INDEX `shop_category_I_2` (`active`),
	INDEX `shop_category_I_3` (`parent_id`),
	INDEX `shop_category_I_4` (`position`),
	CONSTRAINT `shop_category_FK_1`
		FOREIGN KEY (`parent_id`)
		REFERENCES `shop_category` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- shop_category_i18n
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_category_i18n`;

CREATE TABLE `shop_category_i18n`
(
	`id` INTEGER NOT NULL,
	`locale` VARCHAR(5) NOT NULL,
	`name` VARCHAR(255) NOT NULL,
	`h1` VARCHAR(255) NOT NULL,
	`description` TEXT,
	`meta_desc` VARCHAR(255) NOT NULL,
	`meta_title` VARCHAR(255) NOT NULL,
	`meta_keywords` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`,`locale`),
	INDEX `shop_category_i18n_I_1` (`name`),
	CONSTRAINT `shop_category_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `shop_category` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- shop_products
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_products`;

CREATE TABLE `shop_products`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`user_id` INTEGER,
	`external_id` VARCHAR(255),
	`url` VARCHAR(255) NOT NULL,
	`active` TINYINT(1),
	`hit` TINYINT(1),
	`hot` TINYINT(1),
	`action` TINYINT(1),
	`brand_id` INTEGER,
	`category_id` INTEGER NOT NULL,
	`related_products` VARCHAR(255),
	`mainImage` VARCHAR(255),
	`mainModImage` VARCHAR(255),
	`smallImage` VARCHAR(255),
	`smallModImage` VARCHAR(255),
	`old_price` FLOAT (10,2),
	`created` INTEGER NOT NULL,
	`updated` INTEGER NOT NULL,
	`views` INTEGER DEFAULT 0,
	`added_to_cart_count` INTEGER,
	`enable_comments` TINYINT(1) DEFAULT 1,
	`tpl` VARCHAR(250),
	PRIMARY KEY (`id`),
	INDEX `shop_products_I_1` (`url`),
	INDEX `shop_products_I_2` (`brand_id`),
	INDEX `shop_products_I_3` (`category_id`),
	CONSTRAINT `shop_products_FK_1`
		FOREIGN KEY (`brand_id`)
		REFERENCES `shop_brands` (`id`),
	CONSTRAINT `shop_products_FK_2`
		FOREIGN KEY (`category_id`)
		REFERENCES `shop_category` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- shop_kit
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_kit`;

CREATE TABLE `shop_kit`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`product_id` INTEGER,
	`active` TINYINT(1) DEFAULT 1 NOT NULL,
	`position` SMALLINT NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `shop_kit_FI_1` (`product_id`),
	CONSTRAINT `shop_kit_FK_1`
		FOREIGN KEY (`product_id`)
		REFERENCES `shop_products` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- shop_gifts
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_gifts`;

CREATE TABLE `shop_gifts`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`key` VARCHAR(255),
	`active` INTEGER,
	`price` INTEGER,
	`created` INTEGER,
	`espdate` INTEGER,
	PRIMARY KEY (`id`)
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- shop_kit_product
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_kit_product`;

CREATE TABLE `shop_kit_product`
(
	`product_id` INTEGER NOT NULL,
	`kit_id` INTEGER NOT NULL,
	`discount` VARCHAR(11) DEFAULT '0',
	PRIMARY KEY (`product_id`,`kit_id`),
	INDEX `shop_kit_product_FI_3` (`kit_id`),
	CONSTRAINT `shop_kit_product_FK_1`
		FOREIGN KEY (`product_id`)
		REFERENCES `shop_products` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	CONSTRAINT `shop_kit_product_FK_2`
		FOREIGN KEY (`product_id`)
		REFERENCES `shop_product_variants` (`product_id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	CONSTRAINT `shop_kit_product_FK_3`
		FOREIGN KEY (`kit_id`)
		REFERENCES `shop_kit` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- shop_products_i18n
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_products_i18n`;

CREATE TABLE `shop_products_i18n`
(
	`id` INTEGER NOT NULL,
	`locale` VARCHAR(5) NOT NULL,
	`name` VARCHAR(500) NOT NULL,
	`short_description` TEXT,
	`full_description` TEXT,
	`meta_title` VARCHAR(255),
	`meta_description` VARCHAR(255),
	`meta_keywords` VARCHAR(255),
	PRIMARY KEY (`id`,`locale`),
	INDEX `shop_products_i18n_I_1` (`name`),
	CONSTRAINT `shop_products_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `shop_products` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- shop_product_images
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_product_images`;

CREATE TABLE `shop_product_images`
(
	`product_id` INTEGER NOT NULL,
	`image_name` VARCHAR(255) NOT NULL,
	`position` SMALLINT,
	PRIMARY KEY (`product_id`,`image_name`),
	INDEX `shop_product_images_I_1` (`position`),
	CONSTRAINT `shop_product_images_FK_1`
		FOREIGN KEY (`product_id`)
		REFERENCES `shop_products` (`id`)
		ON DELETE CASCADE
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- shop_brands
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_brands`;

CREATE TABLE `shop_brands`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`url` VARCHAR(255) NOT NULL,
	`image` VARCHAR(255),
	`position` SMALLINT NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `shop_brands_I_1` (`url`)
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- shop_brands_i18n
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_brands_i18n`;

CREATE TABLE `shop_brands_i18n`
(
	`id` INTEGER NOT NULL,
	`locale` VARCHAR(5) NOT NULL,
	`name` VARCHAR(500) NOT NULL,
	`description` TEXT,
	`meta_title` VARCHAR(255),
	`meta_description` VARCHAR(255),
	`meta_keywords` VARCHAR(255),
	PRIMARY KEY (`id`,`locale`),
	INDEX `shop_brands_i18n_I_1` (`name`),
	CONSTRAINT `shop_brands_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `shop_brands` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- shop_product_variants
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_product_variants`;

CREATE TABLE `shop_product_variants`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`external_id` VARCHAR(255),
	`product_id` INTEGER NOT NULL,
	`price` DOUBLE (20,5) NOT NULL,
	`number` VARCHAR(255),
	`stock` INTEGER,
	`mainImage` VARCHAR(255),
	`smallImage` VARCHAR(255),
	`position` INTEGER,
	`currency` INTEGER,
	`price_in_main` DOUBLE (20,5) NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `shop_product_variants_I_1` (`product_id`),
	INDEX `shop_product_variants_I_2` (`position`),
	INDEX `shop_product_variants_I_3` (`number`),
	INDEX `shop_product_variants_I_4` (`price`),
	INDEX `shop_product_variants_FI_2` (`currency`),
	CONSTRAINT `shop_product_variants_FK_1`
		FOREIGN KEY (`product_id`)
		REFERENCES `shop_products` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	CONSTRAINT `shop_product_variants_FK_2`
		FOREIGN KEY (`currency`)
		REFERENCES `shop_currencies` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- shop_product_variants_i18n
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_product_variants_i18n`;

CREATE TABLE `shop_product_variants_i18n`
(
	`id` INTEGER NOT NULL,
	`locale` VARCHAR(5) NOT NULL,
	`name` VARCHAR(500),
	PRIMARY KEY (`id`,`locale`),
	INDEX `shop_product_variants_i18n_I_1` (`name`),
	CONSTRAINT `shop_product_variants_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `shop_product_variants` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- shop_warehouse
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_warehouse`;

CREATE TABLE `shop_warehouse`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL,
	`address` VARCHAR(255),
	`phone` VARCHAR(255),
	`description` TEXT,
	PRIMARY KEY (`id`),
	INDEX `shop_warehouse_I_1` (`name`)
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- shop_warehouse_data
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_warehouse_data`;

CREATE TABLE `shop_warehouse_data`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`product_id` INTEGER NOT NULL,
	`warehouse_id` INTEGER NOT NULL,
	`count` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `shop_warehouse_data_FI_1` (`product_id`),
	INDEX `shop_warehouse_data_FI_2` (`warehouse_id`),
	CONSTRAINT `shop_warehouse_data_FK_1`
		FOREIGN KEY (`product_id`)
		REFERENCES `shop_products` (`id`)
		ON DELETE CASCADE,
	CONSTRAINT `shop_warehouse_data_FK_2`
		FOREIGN KEY (`warehouse_id`)
		REFERENCES `shop_warehouse` (`id`)
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- shop_product_categories
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_product_categories`;

CREATE TABLE `shop_product_categories`
(
	`product_id` INTEGER NOT NULL,
	`category_id` INTEGER NOT NULL,
	PRIMARY KEY (`product_id`,`category_id`),
	INDEX `shop_product_categories_FI_2` (`category_id`),
	CONSTRAINT `shop_product_categories_FK_1`
		FOREIGN KEY (`product_id`)
		REFERENCES `shop_products` (`id`)
		ON DELETE CASCADE,
	CONSTRAINT `shop_product_categories_FK_2`
		FOREIGN KEY (`category_id`)
		REFERENCES `shop_category` (`id`)
		ON DELETE CASCADE
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- shop_product_properties
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_product_properties`;

CREATE TABLE `shop_product_properties`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`external_id` VARCHAR(255),
	`csv_name` VARCHAR(50) NOT NULL,
	`multiple` TINYINT(1),
	`active` TINYINT(1),
	`show_on_site` TINYINT(1),
	`show_in_compare` TINYINT(1),
	`show_in_filter` TINYINT(1),
	`show_faq` TINYINT(1),
	`main_property` TINYINT(1),
	`position` INTEGER NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `shop_product_properties_I_1` (`active`),
	INDEX `shop_product_properties_I_2` (`show_on_site`),
	INDEX `shop_product_properties_I_3` (`show_in_compare`),
	INDEX `shop_product_properties_I_4` (`position`)
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- shop_product_properties_i18n
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_product_properties_i18n`;

CREATE TABLE `shop_product_properties_i18n`
(
	`id` INTEGER NOT NULL,
	`locale` VARCHAR(5) NOT NULL,
	`name` VARCHAR(50) NOT NULL,
	`data` TEXT,
	`description` TEXT,
	PRIMARY KEY (`id`,`locale`),
	INDEX `shop_product_properties_i18n_I_1` (`name`),
	CONSTRAINT `shop_product_properties_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `shop_product_properties` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- shop_product_properties_categories
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_product_properties_categories`;

CREATE TABLE `shop_product_properties_categories`
(
	`property_id` INTEGER NOT NULL,
	`category_id` INTEGER NOT NULL,
	PRIMARY KEY (`property_id`,`category_id`),
	INDEX `shop_product_properties_categories_FI_2` (`category_id`),
	CONSTRAINT `shop_product_properties_categories_FK_1`
		FOREIGN KEY (`property_id`)
		REFERENCES `shop_product_properties` (`id`)
		ON DELETE CASCADE,
	CONSTRAINT `shop_product_properties_categories_FK_2`
		FOREIGN KEY (`category_id`)
		REFERENCES `shop_category` (`id`)
		ON DELETE CASCADE
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- shop_product_properties_data
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_product_properties_data`;

CREATE TABLE `shop_product_properties_data`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`property_id` INTEGER,
	`product_id` INTEGER,
	`value` VARCHAR(500) NOT NULL,
	`locale` VARCHAR(5) NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `shop_product_properties_data_I_1` (`value`),
	INDEX `shop_product_properties_data_FI_1` (`property_id`),
	INDEX `shop_product_properties_data_FI_2` (`product_id`),
	CONSTRAINT `shop_product_properties_data_FK_1`
		FOREIGN KEY (`property_id`)
		REFERENCES `shop_product_properties` (`id`)
		ON DELETE CASCADE,
	CONSTRAINT `shop_product_properties_data_FK_2`
		FOREIGN KEY (`product_id`)
		REFERENCES `shop_products` (`id`)
		ON DELETE CASCADE
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- shop_notifications
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_notifications`;

CREATE TABLE `shop_notifications`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`product_id` INTEGER NOT NULL,
	`variant_id` INTEGER NOT NULL,
	`user_name` VARCHAR(100),
	`user_email` VARCHAR(100),
	`user_phone` VARCHAR(100),
	`user_comment` VARCHAR(500),
	`status` INTEGER NOT NULL,
	`date_created` INTEGER NOT NULL,
	`active_to` INTEGER NOT NULL,
	`manager_id` INTEGER,
	`notified_by_email` TINYINT(1),
	PRIMARY KEY (`id`),
	INDEX `shop_notifications_I_1` (`user_email`),
	INDEX `shop_notifications_I_2` (`user_phone`),
	INDEX `shop_notifications_I_3` (`status`),
	INDEX `shop_notifications_I_4` (`date_created`),
	INDEX `shop_notifications_I_5` (`active_to`),
	INDEX `shop_notifications_FI_1` (`product_id`),
	INDEX `shop_notifications_FI_2` (`variant_id`),
	CONSTRAINT `shop_notifications_FK_1`
		FOREIGN KEY (`product_id`)
		REFERENCES `shop_products` (`id`),
	CONSTRAINT `shop_notifications_FK_2`
		FOREIGN KEY (`variant_id`)
		REFERENCES `shop_product_variants` (`id`),
	CONSTRAINT `shop_notifications_FK_3`
		FOREIGN KEY (`status`)
		REFERENCES `shop_notification_statuses` (`id`)
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- shop_notification_statuses
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_notification_statuses`;

CREATE TABLE `shop_notification_statuses`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`position` SMALLINT,
	PRIMARY KEY (`id`),
	INDEX `shop_notification_statuses_I_1` (`position`)
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- shop_notification_statuses_i18n
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_notification_statuses_i18n`;

CREATE TABLE `shop_notification_statuses_i18n`
(
	`id` INTEGER NOT NULL,
	`locale` VARCHAR(5) NOT NULL,
	`name` VARCHAR(500) NOT NULL,
	PRIMARY KEY (`id`,`locale`),
	INDEX `shop_notification_statuses_i18n_I_1` (`name`),
	CONSTRAINT `shop_notification_statuses_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `shop_notification_statuses` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- shop_delivery_methods
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_delivery_methods`;

CREATE TABLE `shop_delivery_methods`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`price` FLOAT (10,2) NOT NULL,
	`free_from` FLOAT (10,2) NOT NULL,
	`enabled` TINYINT(1),
	`is_price_in_percent` TINYINT(1) NOT NULL,
	`position` INTEGER(11),
	PRIMARY KEY (`id`),
	INDEX `shop_delivery_methods_I_1` (`enabled`)
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- shop_delivery_methods_i18n
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_delivery_methods_i18n`;

CREATE TABLE `shop_delivery_methods_i18n`
(
	`id` INTEGER NOT NULL,
	`locale` VARCHAR(5) NOT NULL,
	`name` VARCHAR(500) NOT NULL,
	`description` TEXT,
	`pricedescription` TEXT,
	PRIMARY KEY (`id`,`locale`),
	INDEX `shop_delivery_methods_i18n_I_1` (`name`),
	CONSTRAINT `shop_delivery_methods_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `shop_delivery_methods` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- shop_delivery_methods_systems
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_delivery_methods_systems`;

CREATE TABLE `shop_delivery_methods_systems`
(
	`delivery_method_id` INTEGER NOT NULL,
	`payment_method_id` INTEGER NOT NULL,
	PRIMARY KEY (`delivery_method_id`,`payment_method_id`),
	INDEX `shop_delivery_methods_systems_FI_2` (`payment_method_id`),
	CONSTRAINT `shop_delivery_methods_systems_FK_1`
		FOREIGN KEY (`delivery_method_id`)
		REFERENCES `shop_delivery_methods` (`id`)
		ON DELETE CASCADE,
	CONSTRAINT `shop_delivery_methods_systems_FK_2`
		FOREIGN KEY (`payment_method_id`)
		REFERENCES `shop_payment_methods` (`id`)
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- shop_order_statuses
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_order_statuses`;

CREATE TABLE `shop_order_statuses`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`position` SMALLINT,
	PRIMARY KEY (`id`),
	INDEX `shop_order_statuses_I_1` (`position`)
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- shop_order_statuses_i18n
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_order_statuses_i18n`;

CREATE TABLE `shop_order_statuses_i18n`
(
	`id` INTEGER NOT NULL,
	`locale` VARCHAR(5) NOT NULL,
	`name` VARCHAR(500) NOT NULL,
	PRIMARY KEY (`id`,`locale`),
	INDEX `shop_order_statuses_i18n_I_1` (`name`),
	CONSTRAINT `shop_order_statuses_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `shop_order_statuses` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- shop_orders
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_orders`;

CREATE TABLE `shop_orders`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`user_id` INTEGER,
	`key` VARCHAR(255) NOT NULL,
	`delivery_method` INTEGER,
	`delivery_price` FLOAT (10,2),
	`payment_method` INTEGER,
	`status` INTEGER,
	`paid` TINYINT(1),
	`user_full_name` VARCHAR(255),
	`user_email` VARCHAR(255),
	`user_phone` VARCHAR(255),
	`user_deliver_to` VARCHAR(500),
	`user_comment` VARCHAR(1000),
	`date_created` INTEGER,
	`date_updated` INTEGER,
	`user_ip` VARCHAR(255),
	`total_price` FLOAT (10,2),
	`external_id` VARCHAR(255),
	`gift_cert_key` VARCHAR(25),
	`discount` FLOAT (10,2),
	`gift_cert_price` INTEGER,
	`discount_info` TEXT,
	`origin_price` FLOAT (10,2),
	`comulativ` FLOAT (10,2),
	PRIMARY KEY (`id`),
	INDEX `shop_orders_I_1` (`key`),
	INDEX `shop_orders_I_2` (`status`),
	INDEX `shop_orders_I_3` (`date_created`),
	INDEX `shop_orders_FI_1` (`delivery_method`),
	INDEX `shop_orders_FI_2` (`payment_method`),
	CONSTRAINT `shop_orders_FK_1`
		FOREIGN KEY (`delivery_method`)
		REFERENCES `shop_delivery_methods` (`id`)
		ON DELETE SET NULL,
	CONSTRAINT `shop_orders_FK_2`
		FOREIGN KEY (`payment_method`)
		REFERENCES `shop_payment_methods` (`id`)
		ON DELETE SET NULL,
	CONSTRAINT `shop_orders_FK_3`
		FOREIGN KEY (`status`)
		REFERENCES `shop_order_statuses` (`id`)
		ON DELETE SET NULL
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- shop_orders_products
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_orders_products`;

CREATE TABLE `shop_orders_products`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`order_id` INTEGER NOT NULL,
	`kit_id` INTEGER,
	`is_main` TINYINT(1),
	`product_id` INTEGER NOT NULL,
	`variant_id` INTEGER NOT NULL,
	`product_name` VARCHAR(255),
	`variant_name` VARCHAR(255),
	`price` FLOAT (10,2),
	`quantity` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `shop_orders_products_I_1` (`order_id`),
	INDEX `shop_orders_products_FI_1` (`product_id`),
	INDEX `shop_orders_products_FI_2` (`variant_id`),
	CONSTRAINT `shop_orders_products_FK_1`
		FOREIGN KEY (`product_id`)
		REFERENCES `shop_products` (`id`),
	CONSTRAINT `shop_orders_products_FK_2`
		FOREIGN KEY (`variant_id`)
		REFERENCES `shop_product_variants` (`id`),
	CONSTRAINT `shop_orders_products_FK_3`
		FOREIGN KEY (`order_id`)
		REFERENCES `shop_orders` (`id`)
		ON DELETE CASCADE
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- shop_orders_status_history
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_orders_status_history`;

CREATE TABLE `shop_orders_status_history`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`order_id` INTEGER NOT NULL,
	`status_id` INTEGER NOT NULL,
	`user_id` INTEGER NOT NULL,
	`date_created` INTEGER,
	`comment` VARCHAR(1000),
	PRIMARY KEY (`id`),
	INDEX `shop_orders_status_history_I_1` (`order_id`),
	INDEX `shop_orders_status_history_FI_2` (`status_id`),
	CONSTRAINT `shop_orders_status_history_FK_1`
		FOREIGN KEY (`order_id`)
		REFERENCES `shop_orders` (`id`)
		ON DELETE CASCADE,
	CONSTRAINT `shop_orders_status_history_FK_2`
		FOREIGN KEY (`status_id`)
		REFERENCES `shop_order_statuses` (`id`)
		ON DELETE SET NULL
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- shop_payment_methods
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_payment_methods`;

CREATE TABLE `shop_payment_methods`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`active` TINYINT(1),
	`currency_id` INTEGER(11),
	`payment_system_name` VARCHAR(255),
	`position` INTEGER(11),
	PRIMARY KEY (`id`),
	INDEX `shop_payment_methods_I_1` (`position`),
	INDEX `shop_payment_methods_FI_1` (`currency_id`),
	CONSTRAINT `shop_payment_methods_FK_1`
		FOREIGN KEY (`currency_id`)
		REFERENCES `shop_currencies` (`id`)
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- shop_payment_methods_i18n
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_payment_methods_i18n`;

CREATE TABLE `shop_payment_methods_i18n`
(
	`id` INTEGER NOT NULL,
	`locale` VARCHAR(5) NOT NULL,
	`name` VARCHAR(255),
	`description` TEXT,
	PRIMARY KEY (`id`,`locale`),
	INDEX `shop_payment_methods_i18n_I_1` (`name`),
	CONSTRAINT `shop_payment_methods_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `shop_payment_methods` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- shop_currencies
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_currencies`;

CREATE TABLE `shop_currencies`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255),
	`main` TINYINT(1),
	`is_default` TINYINT(1),
	`code` VARCHAR(5),
	`symbol` VARCHAR(5),
	`rate` FLOAT (6,3) DEFAULT 1.000,
	`showOnSite` INT (1) DEFAULT 0,
	PRIMARY KEY (`id`),
	INDEX `shop_currencies_I_1` (`name`),
	INDEX `shop_currencies_I_2` (`main`),
	INDEX `shop_currencies_I_3` (`is_default`)
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- shop_products_rating
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_products_rating`;

CREATE TABLE `shop_products_rating`
(
	`product_id` INTEGER(11) NOT NULL,
	`votes` INTEGER(11),
	`rating` INTEGER(11),
	PRIMARY KEY (`product_id`),
	CONSTRAINT `shop_products_rating_FK_1`
		FOREIGN KEY (`product_id`)
		REFERENCES `shop_products` (`id`)
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- shop_settings
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_settings`;

CREATE TABLE `shop_settings`
(
	`name` VARCHAR(255) NOT NULL,
	`value` TEXT,
	`locale` VARCHAR(5) NOT NULL,
	PRIMARY KEY (`name`,`locale`)
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- shop_sorting
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_sorting`;

CREATE TABLE `shop_sorting`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`pos` INTEGER(11),
	`name` VARCHAR(50) NOT NULL,
	`name_front` VARCHAR(50),
	`tooltip` VARCHAR(100),
	`get` VARCHAR(25) NOT NULL,
	`active` TINYINT(1),
	PRIMARY KEY (`id`)
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- shop_discounts
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_discounts`;

CREATE TABLE `shop_discounts`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL,
	`description` TEXT,
	`active` TINYINT(1) NOT NULL,
	`date_start` INTEGER(11),
	`date_stop` INTEGER(11),
	`discount` VARCHAR(11),
	`user_group` VARCHAR(255),
	`min_price` FLOAT (10,2),
	`max_price` FLOAT (10,2),
	`categories` TEXT,
	`products` TEXT,
	PRIMARY KEY (`id`)
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- users
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(50),
	`password` VARCHAR(255),
	`email` VARCHAR(100),
	`address` VARCHAR(255),
	`phone` VARCHAR(32),
	`banned` TINYINT(1),
	`ban_reason` VARCHAR(255),
	`newpass` VARCHAR(255),
	`newpass_key` VARCHAR(255),
	`newpass_time` INTEGER,
	`created` INTEGER,
	`last_ip` VARCHAR(40),
	`last_login` INTEGER,
	`modified` DATETIME,
	`cart_data` TEXT,
	`wish_list_data` TEXT,
	`key` VARCHAR(255) NOT NULL,
	`amout` FLOAT (10,2) NOT NULL,
	`discount` VARCHAR(255),
	`role_id` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `users_I_1` (`key`)
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- shop_callbacks
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_callbacks`;

CREATE TABLE `shop_callbacks`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`user_id` INTEGER,
	`status_id` INTEGER,
	`theme_id` VARCHAR(255),
	`phone` VARCHAR(255),
	`name` VARCHAR(255),
	`comment` TEXT,
	`date` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `shop_callbacks_I_1` (`user_id`),
	INDEX `shop_callbacks_I_2` (`status_id`),
	INDEX `shop_callbacks_I_3` (`theme_id`),
	INDEX `shop_callbacks_I_4` (`date`),
	CONSTRAINT `shop_callbacks_FK_1`
		FOREIGN KEY (`status_id`)
		REFERENCES `shop_callbacks_statuses` (`id`),
	CONSTRAINT `shop_callbacks_FK_2`
		FOREIGN KEY (`theme_id`)
		REFERENCES `shop_callbacks_themes` (`id`)
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- shop_callbacks_statuses
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_callbacks_statuses`;

CREATE TABLE `shop_callbacks_statuses`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`is_default` TINYINT(1),
	PRIMARY KEY (`id`)
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- shop_callbacks_statuses_i18n
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_callbacks_statuses_i18n`;

CREATE TABLE `shop_callbacks_statuses_i18n`
(
	`id` INTEGER NOT NULL,
	`locale` VARCHAR(5) NOT NULL,
	`text` VARCHAR(255),
	PRIMARY KEY (`id`,`locale`),
	INDEX `shop_callbacks_statuses_i18n_I_1` (`text`),
	CONSTRAINT `shop_callbacks_statuses_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `shop_callbacks_statuses` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- shop_callbacks_themes
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_callbacks_themes`;

CREATE TABLE `shop_callbacks_themes`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`position` INTEGER,
	PRIMARY KEY (`id`)
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- shop_callbacks_themes_i18n
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_callbacks_themes_i18n`;

CREATE TABLE `shop_callbacks_themes_i18n`
(
	`id` INTEGER NOT NULL,
	`locale` VARCHAR(5) NOT NULL,
	`text` VARCHAR(255),
	PRIMARY KEY (`id`,`locale`),
	INDEX `shop_callbacks_themes_i18n_I_1` (`text`),
	CONSTRAINT `shop_callbacks_themes_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `shop_callbacks_themes` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- shop_banners
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_banners`;

CREATE TABLE `shop_banners`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`position` SMALLINT,
	`active` TINYINT(1),
	`categories` TEXT,
	`on_main` TINYINT(1),
	`espdate` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `shop_banners_I_1` (`position`)
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- shop_banners_i18n
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_banners_i18n`;

CREATE TABLE `shop_banners_i18n`
(
	`id` INTEGER NOT NULL,
	`locale` VARCHAR(5) NOT NULL,
	`name` VARCHAR(255),
	`text` VARCHAR(255),
	`url` VARCHAR(255) NOT NULL,
	`image` VARCHAR(255),
	PRIMARY KEY (`id`,`locale`),
	CONSTRAINT `shop_banners_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `shop_banners` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- custom_fields
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `custom_fields`;

CREATE TABLE `custom_fields`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`entity` VARCHAR(32),
	`field_type_id` INTEGER NOT NULL,
	`field_name` VARCHAR(64) NOT NULL,
	`is_required` TINYINT(1) DEFAULT 1 NOT NULL,
	`is_active` TINYINT(1) DEFAULT 1 NOT NULL,
	`options` VARCHAR(65),
	`is_private` TINYINT(1) DEFAULT 0 NOT NULL,
	`validators` VARCHAR(255),
	`classes` TEXT,
	`position` TINYINT,
	PRIMARY KEY (`id`)
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- custom_fields_i18n
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `custom_fields_i18n`;

CREATE TABLE `custom_fields_i18n`
(
	`id` INTEGER NOT NULL,
	`locale` VARCHAR(4) NOT NULL,
	`field_label` VARCHAR(255),
	`field_description` TEXT,
	`possible_values` TEXT,
	PRIMARY KEY (`id`,`locale`),
	CONSTRAINT `custom_fields_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `custom_fields` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- shop_comulativ_discount
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_comulativ_discount`;

CREATE TABLE `shop_comulativ_discount`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`description` VARCHAR(255),
	`discount` INTEGER(3),
	`active` INTEGER(1),
	`date` INTEGER(15),
	`total` INTEGER(255),
	`total_a` INTEGER(255),
	PRIMARY KEY (`id`)
) Engine=MyISAM CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- custom_fields_data
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `custom_fields_data`;

CREATE TABLE `custom_fields_data`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`locale` VARCHAR(4) NOT NULL,
	`field_id` INTEGER NOT NULL,
	`entity_id` INTEGER NOT NULL,
	`field_data` TEXT,
	PRIMARY KEY (`id`)
) Engine=MyISAM CHARACTER SET='utf8';

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
