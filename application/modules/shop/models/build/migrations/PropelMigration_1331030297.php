<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1331030297.
 * Generated on 2012-03-06 10:38:17 
 */
class PropelMigration_1331030297 {
	public function preUp($manager) {
		// add the pre-migration code here
	}
	public function postUp($manager) {
		// add the post-migration code here
	}
	public function preDown($manager) {
		// add the pre-migration code here
	}
	public function postDown($manager) {
		// add the post-migration code here
	}
	
	/**
	 * Get the SQL statements for the Up migration
	 *
	 * @return array list of the SQL strings to execute for the Up migration
	 *         the keys being the datasources
	 */
	public function getUpSQL() {
		return array (
				'Shop' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `category`;

DROP TABLE IF EXISTS `category_translate`;

DROP TABLE IF EXISTS `comments`;

DROP TABLE IF EXISTS `components`;

DROP TABLE IF EXISTS `content`;

DROP TABLE IF EXISTS `content_field_groups`;

DROP TABLE IF EXISTS `content_fields`;

DROP TABLE IF EXISTS `content_fields_data`;

DROP TABLE IF EXISTS `content_permissions`;

DROP TABLE IF EXISTS `content_tags`;

DROP TABLE IF EXISTS `gallery_albums`;

DROP TABLE IF EXISTS `gallery_category`;

DROP TABLE IF EXISTS `gallery_images`;

DROP TABLE IF EXISTS `languages`;

DROP TABLE IF EXISTS `login_attempts`;

DROP TABLE IF EXISTS `logs`;

DROP TABLE IF EXISTS `menu_translate`;

DROP TABLE IF EXISTS `menus`;

DROP TABLE IF EXISTS `menus_data`;

DROP TABLE IF EXISTS `permissions`;

DROP TABLE IF EXISTS `roles`;

DROP TABLE IF EXISTS `search`;

DROP TABLE IF EXISTS `settings`;

DROP TABLE IF EXISTS `tags`;

DROP TABLE IF EXISTS `user_autologin`;

DROP TABLE IF EXISTS `user_profile`;

DROP TABLE IF EXISTS `user_temp`;

DROP TABLE IF EXISTS `users`;

DROP TABLE IF EXISTS `widgets`;

ALTER TABLE `shop_callbacks` ADD CONSTRAINT `shop_callbacks_FK_1`
	FOREIGN KEY (`status_id`)
	REFERENCES `shop_callbacks_statuses` (`id`);

ALTER TABLE `shop_callbacks` ADD CONSTRAINT `shop_callbacks_FK_2`
	FOREIGN KEY (`theme_id`)
	REFERENCES `shop_callbacks_themes` (`id`);

ALTER TABLE `shop_callbacks_statuses` CHANGE `is_default` `is_default` TINYINT(1);

ALTER TABLE `shop_callbacks_statuses` DROP `text`;

ALTER TABLE `shop_category` CHANGE `active` `active` TINYINT(1);

ALTER TABLE `shop_currencies` CHANGE `main` `main` TINYINT(1);

ALTER TABLE `shop_currencies` CHANGE `is_default` `is_default` TINYINT(1);

ALTER TABLE `shop_currencies` CHANGE `rate` `rate` FLOAT (6,3) DEFAULT 1.000;

ALTER TABLE `shop_delivery_methods` CHANGE `price` `price` FLOAT (10,2) NOT NULL;

ALTER TABLE `shop_delivery_methods` CHANGE `free_from` `free_from` FLOAT (10,2) NOT NULL;

ALTER TABLE `shop_delivery_methods` CHANGE `enabled` `enabled` TINYINT(1);

ALTER TABLE `shop_delivery_methods` CHANGE `is_price_in_percent` `is_price_in_percent` TINYINT(1) NOT NULL;

ALTER TABLE `shop_delivery_methods_systems` ADD CONSTRAINT `shop_delivery_methods_systems_FK_1`
	FOREIGN KEY (`delivery_method_id`)
	REFERENCES `shop_delivery_methods` (`id`)
	ON DELETE CASCADE;

ALTER TABLE `shop_delivery_methods_systems` ADD CONSTRAINT `shop_delivery_methods_systems_FK_2`
	FOREIGN KEY (`payment_method_id`)
	REFERENCES `shop_payment_methods` (`id`);

ALTER TABLE `shop_discounts` CHANGE `active` `active` TINYINT(1) NOT NULL;

ALTER TABLE `shop_discounts` CHANGE `date_start` `date_start` INTEGER(11);

ALTER TABLE `shop_discounts` CHANGE `date_stop` `date_stop` INTEGER(11);

ALTER TABLE `shop_discounts` CHANGE `min_price` `min_price` FLOAT (10,2);

ALTER TABLE `shop_discounts` CHANGE `max_price` `max_price` FLOAT (10,2);

ALTER TABLE `shop_notifications` CHANGE `notified_by_email` `notified_by_email` TINYINT(1);

ALTER TABLE `shop_notifications` ADD CONSTRAINT `shop_notifications_FK_1`
	FOREIGN KEY (`product_id`)
	REFERENCES `shop_products` (`id`);

ALTER TABLE `shop_notifications` ADD CONSTRAINT `shop_notifications_FK_2`
	FOREIGN KEY (`variant_id`)
	REFERENCES `shop_product_variants` (`id`);

ALTER TABLE `shop_notifications` ADD CONSTRAINT `shop_notifications_FK_3`
	FOREIGN KEY (`status`)
	REFERENCES `shop_notification_statuses` (`id`);

ALTER TABLE `shop_order_statuses_i18n` ADD CONSTRAINT `shop_order_statuses_i18n_FK_1`
	FOREIGN KEY (`id`)
	REFERENCES `shop_order_statuses` (`id`)
	ON UPDATE CASCADE
	ON DELETE CASCADE;

ALTER TABLE `shop_orders` CHANGE `delivery_price` `delivery_price` FLOAT (10,2);

ALTER TABLE `shop_orders` CHANGE `paid` `paid` TINYINT(1);

ALTER TABLE `shop_orders` CHANGE `total_price` `total_price` FLOAT (10,2);

ALTER TABLE `shop_orders` ADD CONSTRAINT `shop_orders_FK_1`
	FOREIGN KEY (`delivery_method`)
	REFERENCES `shop_delivery_methods` (`id`)
	ON DELETE SET NULL;

ALTER TABLE `shop_orders` ADD CONSTRAINT `shop_orders_FK_2`
	FOREIGN KEY (`payment_method`)
	REFERENCES `shop_payment_methods` (`id`)
	ON DELETE SET NULL;

ALTER TABLE `shop_orders` ADD CONSTRAINT `shop_orders_FK_3`
	FOREIGN KEY (`status`)
	REFERENCES `shop_order_statuses` (`id`)
	ON DELETE SET NULL;

ALTER TABLE `shop_orders_products` CHANGE `price` `price` FLOAT (10,2);

ALTER TABLE `shop_orders_products` ADD CONSTRAINT `shop_orders_products_FK_1`
	FOREIGN KEY (`product_id`)
	REFERENCES `shop_products` (`id`);

ALTER TABLE `shop_orders_products` ADD CONSTRAINT `shop_orders_products_FK_2`
	FOREIGN KEY (`order_id`)
	REFERENCES `shop_orders` (`id`)
	ON DELETE CASCADE;

ALTER TABLE `shop_orders_status_history` ADD CONSTRAINT `shop_orders_status_history_FK_1`
	FOREIGN KEY (`order_id`)
	REFERENCES `shop_orders` (`id`)
	ON DELETE CASCADE;

ALTER TABLE `shop_orders_status_history` ADD CONSTRAINT `shop_orders_status_history_FK_2`
	FOREIGN KEY (`status_id`)
	REFERENCES `shop_order_statuses` (`id`)
	ON DELETE SET NULL;

ALTER TABLE `shop_payment_methods` CHANGE `active` `active` TINYINT(1);

ALTER TABLE `shop_payment_methods` CHANGE `currency_id` `currency_id` INTEGER(11);

ALTER TABLE `shop_payment_methods` CHANGE `position` `position` INTEGER(11);

ALTER TABLE `shop_payment_methods` ADD CONSTRAINT `shop_payment_methods_FK_1`
	FOREIGN KEY (`currency_id`)
	REFERENCES `shop_currencies` (`id`);

ALTER TABLE `shop_product_categories` ADD CONSTRAINT `shop_product_categories_FK_1`
	FOREIGN KEY (`product_id`)
	REFERENCES `shop_products` (`id`)
	ON DELETE CASCADE;

ALTER TABLE `shop_product_categories` ADD CONSTRAINT `shop_product_categories_FK_2`
	FOREIGN KEY (`category_id`)
	REFERENCES `shop_category` (`id`)
	ON DELETE CASCADE;

ALTER TABLE `shop_product_images` ADD CONSTRAINT `shop_product_images_FK_1`
	FOREIGN KEY (`product_id`)
	REFERENCES `shop_products` (`id`)
	ON DELETE CASCADE;

ALTER TABLE `shop_product_properties_categories` ADD CONSTRAINT `shop_product_properties_categories_FK_1`
	FOREIGN KEY (`property_id`)
	REFERENCES `shop_product_properties` (`id`)
	ON DELETE CASCADE;

ALTER TABLE `shop_product_properties_categories` ADD CONSTRAINT `shop_product_properties_categories_FK_2`
	FOREIGN KEY (`category_id`)
	REFERENCES `shop_category` (`id`)
	ON DELETE CASCADE;

ALTER TABLE `shop_product_properties_data` ADD CONSTRAINT `shop_product_properties_data_FK_1`
	FOREIGN KEY (`property_id`)
	REFERENCES `shop_product_properties` (`id`)
	ON DELETE CASCADE;

ALTER TABLE `shop_product_properties_data` ADD CONSTRAINT `shop_product_properties_data_FK_2`
	FOREIGN KEY (`product_id`)
	REFERENCES `shop_products` (`id`)
	ON DELETE CASCADE;

ALTER TABLE `shop_product_properties_i18n` ADD CONSTRAINT `shop_product_properties_i18n_FK_1`
	FOREIGN KEY (`id`)
	REFERENCES `shop_product_properties` (`id`)
	ON UPDATE CASCADE
	ON DELETE CASCADE;

ALTER TABLE `shop_product_variants` CHANGE `price` `price` FLOAT (10,5) NOT NULL;

ALTER TABLE `shop_product_variants` ADD CONSTRAINT `shop_product_variants_FK_1`
	FOREIGN KEY (`product_id`)
	REFERENCES `shop_products` (`id`)
	ON DELETE CASCADE;

ALTER TABLE `shop_products` CHANGE `active` `active` TINYINT(1);

ALTER TABLE `shop_products` CHANGE `hit` `hit` TINYINT(1);

ALTER TABLE `shop_products` CHANGE `old_price` `old_price` FLOAT (10,2);

ALTER TABLE `shop_products` CHANGE `hot` `hot` TINYINT(1);

ALTER TABLE `shop_products` CHANGE `action` `action` TINYINT(1);

ALTER TABLE `shop_products` CHANGE `enable_comments` `enable_comments` TINYINT(1) DEFAULT 1;

ALTER TABLE `shop_products` ADD CONSTRAINT `shop_products_FK_1`
	FOREIGN KEY (`brand_id`)
	REFERENCES `shop_brands` (`id`);

ALTER TABLE `shop_products` ADD CONSTRAINT `shop_products_FK_2`
	FOREIGN KEY (`category_id`)
	REFERENCES `shop_category` (`id`);

ALTER TABLE `shop_products_rating` CHANGE `product_id` `product_id` INTEGER(11) NOT NULL;

ALTER TABLE `shop_products_rating` CHANGE `votes` `votes` INTEGER(11);

ALTER TABLE `shop_products_rating` CHANGE `rating` `rating` INTEGER(11);

ALTER TABLE `shop_products_rating` ADD CONSTRAINT `shop_products_rating_FK_1`
	FOREIGN KEY (`product_id`)
	REFERENCES `shop_products` (`id`);

ALTER TABLE `shop_warehouse_data` ADD CONSTRAINT `shop_warehouse_data_FK_1`
	FOREIGN KEY (`product_id`)
	REFERENCES `shop_products` (`id`)
	ON DELETE CASCADE;

ALTER TABLE `shop_warehouse_data` ADD CONSTRAINT `shop_warehouse_data_FK_2`
	FOREIGN KEY (`warehouse_id`)
	REFERENCES `shop_warehouse` (`id`);

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
) Engine=MyISAM CHARACTER SET=\'utf8\';

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
) Engine=MyISAM CHARACTER SET=\'utf8\';

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
) Engine=MyISAM CHARACTER SET=\'utf8\';

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
' 
		);
	}
	
	/**
	 * Get the SQL statements for the Down migration
	 *
	 * @return array list of the SQL strings to execute for the Down migration
	 *         the keys being the datasources
	 */
	public function getDownSQL() {
		return array (
				'Shop' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `shop_notification_statuses_i18n`;

DROP TABLE IF EXISTS `shop_callbacks_statuses_i18n`;

DROP TABLE IF EXISTS `shop_callbacks_themes_i18n`;

ALTER TABLE `shop_callbacks` DROP FOREIGN KEY `shop_callbacks_FK_1`;

ALTER TABLE `shop_callbacks` DROP FOREIGN KEY `shop_callbacks_FK_2`;

ALTER TABLE `shop_callbacks_statuses` CHANGE `is_default` `is_default` TINYINT;

ALTER TABLE `shop_callbacks_statuses` ADD
(
	`text` VARCHAR(255)
);

ALTER TABLE `shop_category` CHANGE `active` `active` TINYINT;

ALTER TABLE `shop_currencies` CHANGE `main` `main` TINYINT;

ALTER TABLE `shop_currencies` CHANGE `is_default` `is_default` TINYINT;

ALTER TABLE `shop_currencies` CHANGE `rate` `rate` FLOAT(6,3) DEFAULT 1.000;

ALTER TABLE `shop_delivery_methods` CHANGE `price` `price` FLOAT(10,2) NOT NULL;

ALTER TABLE `shop_delivery_methods` CHANGE `free_from` `free_from` FLOAT(10,2) NOT NULL;

ALTER TABLE `shop_delivery_methods` CHANGE `enabled` `enabled` TINYINT;

ALTER TABLE `shop_delivery_methods` CHANGE `is_price_in_percent` `is_price_in_percent` TINYINT NOT NULL;

ALTER TABLE `shop_delivery_methods_systems` DROP FOREIGN KEY `shop_delivery_methods_systems_FK_1`;

ALTER TABLE `shop_delivery_methods_systems` DROP FOREIGN KEY `shop_delivery_methods_systems_FK_2`;

ALTER TABLE `shop_discounts` CHANGE `active` `active` TINYINT NOT NULL;

ALTER TABLE `shop_discounts` CHANGE `date_start` `date_start` INTEGER;

ALTER TABLE `shop_discounts` CHANGE `date_stop` `date_stop` INTEGER;

ALTER TABLE `shop_discounts` CHANGE `min_price` `min_price` FLOAT(10,2);

ALTER TABLE `shop_discounts` CHANGE `max_price` `max_price` FLOAT(10,2);

ALTER TABLE `shop_notifications` DROP FOREIGN KEY `shop_notifications_FK_1`;

ALTER TABLE `shop_notifications` DROP FOREIGN KEY `shop_notifications_FK_2`;

ALTER TABLE `shop_notifications` DROP FOREIGN KEY `shop_notifications_FK_3`;

ALTER TABLE `shop_notifications` CHANGE `notified_by_email` `notified_by_email` TINYINT;

ALTER TABLE `shop_order_statuses_i18n` DROP FOREIGN KEY `shop_order_statuses_i18n_FK_1`;

ALTER TABLE `shop_orders` DROP FOREIGN KEY `shop_orders_FK_1`;

ALTER TABLE `shop_orders` DROP FOREIGN KEY `shop_orders_FK_2`;

ALTER TABLE `shop_orders` DROP FOREIGN KEY `shop_orders_FK_3`;

ALTER TABLE `shop_orders` CHANGE `delivery_price` `delivery_price` FLOAT(10,2);

ALTER TABLE `shop_orders` CHANGE `paid` `paid` TINYINT;

ALTER TABLE `shop_orders` CHANGE `total_price` `total_price` FLOAT(10,2);

ALTER TABLE `shop_orders_products` DROP FOREIGN KEY `shop_orders_products_FK_1`;

ALTER TABLE `shop_orders_products` DROP FOREIGN KEY `shop_orders_products_FK_2`;

ALTER TABLE `shop_orders_products` CHANGE `price` `price` FLOAT(10,2);

ALTER TABLE `shop_orders_status_history` DROP FOREIGN KEY `shop_orders_status_history_FK_1`;

ALTER TABLE `shop_orders_status_history` DROP FOREIGN KEY `shop_orders_status_history_FK_2`;

ALTER TABLE `shop_payment_methods` DROP FOREIGN KEY `shop_payment_methods_FK_1`;

ALTER TABLE `shop_payment_methods` CHANGE `active` `active` TINYINT;

ALTER TABLE `shop_payment_methods` CHANGE `currency_id` `currency_id` INTEGER;

ALTER TABLE `shop_payment_methods` CHANGE `position` `position` INTEGER;

ALTER TABLE `shop_product_categories` DROP FOREIGN KEY `shop_product_categories_FK_1`;

ALTER TABLE `shop_product_categories` DROP FOREIGN KEY `shop_product_categories_FK_2`;

ALTER TABLE `shop_product_images` DROP FOREIGN KEY `shop_product_images_FK_1`;

ALTER TABLE `shop_product_properties_categories` DROP FOREIGN KEY `shop_product_properties_categories_FK_1`;

ALTER TABLE `shop_product_properties_categories` DROP FOREIGN KEY `shop_product_properties_categories_FK_2`;

ALTER TABLE `shop_product_properties_data` DROP FOREIGN KEY `shop_product_properties_data_FK_1`;

ALTER TABLE `shop_product_properties_data` DROP FOREIGN KEY `shop_product_properties_data_FK_2`;

ALTER TABLE `shop_product_properties_i18n` DROP FOREIGN KEY `shop_product_properties_i18n_FK_1`;

ALTER TABLE `shop_product_variants` DROP FOREIGN KEY `shop_product_variants_FK_1`;

ALTER TABLE `shop_product_variants` CHANGE `price` `price` FLOAT(10,5) NOT NULL;

ALTER TABLE `shop_products` DROP FOREIGN KEY `shop_products_FK_1`;

ALTER TABLE `shop_products` DROP FOREIGN KEY `shop_products_FK_2`;

ALTER TABLE `shop_products` CHANGE `active` `active` TINYINT;

ALTER TABLE `shop_products` CHANGE `hit` `hit` TINYINT;

ALTER TABLE `shop_products` CHANGE `old_price` `old_price` FLOAT(10,2);

ALTER TABLE `shop_products` CHANGE `hot` `hot` TINYINT;

ALTER TABLE `shop_products` CHANGE `action` `action` TINYINT;

ALTER TABLE `shop_products` CHANGE `enable_comments` `enable_comments` TINYINT DEFAULT 1;

ALTER TABLE `shop_products_rating` DROP FOREIGN KEY `shop_products_rating_FK_1`;

ALTER TABLE `shop_products_rating` CHANGE `product_id` `product_id` INTEGER NOT NULL;

ALTER TABLE `shop_products_rating` CHANGE `votes` `votes` INTEGER;

ALTER TABLE `shop_products_rating` CHANGE `rating` `rating` INTEGER;

ALTER TABLE `shop_warehouse_data` DROP FOREIGN KEY `shop_warehouse_data_FK_1`;

ALTER TABLE `shop_warehouse_data` DROP FOREIGN KEY `shop_warehouse_data_FK_2`;

CREATE TABLE `category`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`parent_id` INTEGER DEFAULT 0 NOT NULL,
	`position` SMALLINT(5) DEFAULT 0 NOT NULL,
	`name` VARCHAR(160) NOT NULL,
	`title` VARCHAR(250),
	`short_desc` TEXT NOT NULL,
	`url` VARCHAR(300) NOT NULL,
	`image` VARCHAR(250),
	`keywords` TEXT,
	`description` TEXT,
	`fetch_pages` TEXT NOT NULL,
	`main_tpl` VARCHAR(50) NOT NULL,
	`tpl` VARCHAR(50),
	`page_tpl` VARCHAR(50),
	`per_page` SMALLINT(5) NOT NULL,
	`order_by` VARCHAR(25) NOT NULL,
	`sort_order` VARCHAR(25) NOT NULL,
	`comments_default` TINYINT(1) DEFAULT 0 NOT NULL,
	`field_group` INTEGER NOT NULL,
	`category_field_group` INTEGER NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `name` (`name`(160)),
	INDEX `url` (`url`(300))
) Engine=MyISAM;

CREATE TABLE `category_translate`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`alias` INTEGER NOT NULL,
	`name` VARCHAR(160) NOT NULL,
	`title` VARCHAR(250),
	`short_desc` TEXT,
	`image` VARCHAR(250),
	`keywords` TEXT,
	`description` TEXT,
	`lang` INTEGER NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `name` (`name`(160), `lang`)
) Engine=MyISAM;

CREATE TABLE `comments`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`module` VARCHAR(25) DEFAULT \'core\' NOT NULL,
	`user_id` INTEGER NOT NULL,
	`user_name` VARCHAR(50) NOT NULL,
	`user_mail` VARCHAR(50) NOT NULL,
	`user_site` VARCHAR(250) NOT NULL,
	`item_id` BIGINT(11) NOT NULL,
	`text` VARCHAR(500) NOT NULL,
	`date` INTEGER NOT NULL,
	`status` SMALLINT(1) NOT NULL,
	`agent` VARCHAR(250) NOT NULL,
	`user_ip` VARCHAR(64) NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `module` (`module`(25)),
	INDEX `item_id` (`item_id`(11)),
	INDEX `date` (`date`)
) Engine=MyISAM;

CREATE TABLE `components`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50) NOT NULL,
	`identif` VARCHAR(25) NOT NULL,
	`enabled` INTEGER(1) NOT NULL,
	`autoload` INTEGER(1) NOT NULL,
	`in_menu` INTEGER(1) DEFAULT 0 NOT NULL,
	`settings` TEXT,
	PRIMARY KEY (`id`),
	INDEX `name` (`name`(50)),
	INDEX `identif` (`identif`(25)),
	INDEX `enabled` (`enabled`(1)),
	INDEX `autoload` (`autoload`(1))
) Engine=MyISAM;

CREATE TABLE `content`
(
	`id` BIGINT(11) NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(500) NOT NULL,
	`meta_title` VARCHAR(300),
	`url` VARCHAR(500) NOT NULL,
	`cat_url` VARCHAR(260),
	`keywords` TEXT,
	`description` TEXT,
	`prev_text` TEXT,
	`full_text` LONGTEXT NOT NULL,
	`category` INTEGER NOT NULL,
	`full_tpl` VARCHAR(50),
	`main_tpl` VARCHAR(50) NOT NULL,
	`position` SMALLINT(5) NOT NULL,
	`comments_status` SMALLINT(1) NOT NULL,
	`comments_count` INTEGER(9) DEFAULT 0,
	`post_status` VARCHAR(15) NOT NULL,
	`author` VARCHAR(50) NOT NULL,
	`publish_date` INTEGER NOT NULL,
	`created` INTEGER NOT NULL,
	`updated` INTEGER NOT NULL,
	`showed` INTEGER NOT NULL,
	`lang` INTEGER DEFAULT 0 NOT NULL,
	`lang_alias` INTEGER DEFAULT 0 NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `url` (`url`(500)),
	INDEX `lang` (`lang`),
	INDEX `post_status` (`post_status`(15)),
	INDEX `cat_url` (`cat_url`(260)),
	INDEX `publish_date` (`publish_date`),
	INDEX `category` (`category`),
	INDEX `created` (`created`),
	INDEX `updated` (`updated`)
) Engine=MyISAM;

CREATE TABLE `content_field_groups`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL,
	`description` TEXT,
	PRIMARY KEY (`id`),
	INDEX `name` (`name`(255))
) Engine=MyISAM;

CREATE TABLE `content_fields`
(
	`field_name` VARCHAR(255) NOT NULL,
	`type` VARCHAR(255) NOT NULL,
	`label` VARCHAR(255) NOT NULL,
	`data` TEXT NOT NULL,
	`group` INTEGER DEFAULT 0 NOT NULL,
	`weight` INTEGER NOT NULL,
	`in_search` TINYINT(1) DEFAULT 0,
	PRIMARY KEY (`field_name`),
	UNIQUE INDEX `field_name` (`field_name`(255)),
	INDEX `type` (`type`(255)),
	INDEX `in_search` (`in_search`(1))
) Engine=MyISAM;

CREATE TABLE `content_fields_data`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`item_id` INTEGER NOT NULL,
	`item_type` VARCHAR(15) NOT NULL,
	`field_name` VARCHAR(255) NOT NULL,
	`data` TEXT NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `item_id` (`item_id`),
	INDEX `item_type` (`item_type`(15)),
	INDEX `field_name` (`field_name`(255))
) Engine=MyISAM;

CREATE TABLE `content_permissions`
(
	`id` BIGINT(11) NOT NULL AUTO_INCREMENT,
	`page_id` BIGINT(11) NOT NULL,
	`data` TEXT NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `page_id` (`page_id`(11))
) Engine=MyISAM;

CREATE TABLE `content_tags`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`page_id` INTEGER NOT NULL,
	`tag_id` INTEGER NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `page_id` (`page_id`),
	INDEX `tag_id` (`tag_id`)
) Engine=MyISAM;

CREATE TABLE `gallery_albums`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`category_id` INTEGER,
	`name` VARCHAR(250),
	`description` VARCHAR(500),
	`cover_id` INTEGER DEFAULT 0,
	`position` INTEGER(9) DEFAULT 0,
	`created` INTEGER,
	`updated` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `category_id` (`category_id`),
	INDEX `created` (`created`)
) Engine=MyISAM;

CREATE TABLE `gallery_category`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(250),
	`description` VARCHAR(500),
	`cover_id` INTEGER DEFAULT 0,
	`position` INTEGER(9) DEFAULT 0,
	`created` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `created` (`created`),
	INDEX `position` (`position`(9))
) Engine=MyISAM;

CREATE TABLE `gallery_images`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`album_id` INTEGER,
	`file_name` VARCHAR(150),
	`file_ext` VARCHAR(8),
	`file_size` VARCHAR(20),
	`position` INTEGER(9),
	`width` INTEGER(6),
	`height` INTEGER(6),
	`description` VARCHAR(500),
	`uploaded` INTEGER,
	`views` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `album_id` (`album_id`),
	INDEX `position` (`position`(9))
) Engine=MyISAM;

CREATE TABLE `languages`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`lang_name` VARCHAR(100) NOT NULL,
	`identif` VARCHAR(10) NOT NULL,
	`image` TEXT NOT NULL,
	`folder` VARCHAR(100) NOT NULL,
	`template` VARCHAR(100) NOT NULL,
	`default` INTEGER(1) NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `identif` (`identif`(10)),
	INDEX `default` (`default`(1))
) Engine=MyISAM;

CREATE TABLE `login_attempts`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`ip_address` VARCHAR(40) NOT NULL,
	`time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`),
	INDEX `ip_address` (`ip_address`(40)),
	INDEX `time` (`time`)
) Engine=MyISAM;

CREATE TABLE `logs`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`user_id` INTEGER NOT NULL,
	`username` VARCHAR(250) NOT NULL,
	`message` TEXT NOT NULL,
	`date` INTEGER NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `date` (`date`)
) Engine=MyISAM;

CREATE TABLE `menu_translate`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`item_id` INTEGER NOT NULL,
	`lang_id` INTEGER NOT NULL,
	`title` VARCHAR(250) NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `item_id` (`item_id`),
	INDEX `lang_id` (`lang_id`)
) Engine=MyISAM;

CREATE TABLE `menus`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(250) NOT NULL,
	`main_title` VARCHAR(300) NOT NULL,
	`tpl` VARCHAR(255),
	`expand_level` INTEGER(255),
	`description` TEXT,
	`created` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `name` (`name`(250))
) Engine=MyISAM;

CREATE TABLE `menus_data`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`menu_id` INTEGER(9) NOT NULL,
	`item_id` INTEGER(9) NOT NULL,
	`item_type` VARCHAR(15) NOT NULL,
	`item_image` VARCHAR(255) NOT NULL,
	`roles` TEXT,
	`hidden` SMALLINT(1) DEFAULT 0 NOT NULL,
	`title` VARCHAR(300) NOT NULL,
	`parent_id` INTEGER(9) NOT NULL,
	`position` SMALLINT(5),
	`description` TEXT,
	`add_data` TEXT,
	PRIMARY KEY (`id`),
	INDEX `menu_id` (`menu_id`(9)),
	INDEX `position` (`position`(5))
) Engine=MyISAM;

CREATE TABLE `permissions`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`role_id` INTEGER NOT NULL,
	`data` TEXT,
	PRIMARY KEY (`id`),
	INDEX `role_id` (`role_id`)
) Engine=MyISAM;

CREATE TABLE `roles`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`parent_id` INTEGER DEFAULT 0 NOT NULL,
	`name` VARCHAR(30) NOT NULL,
	`alt_name` VARCHAR(50) NOT NULL,
	`desc` VARCHAR(300) NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `parent_id` (`parent_id`),
	INDEX `name` (`name`(30))
) Engine=MyISAM;

CREATE TABLE `search`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`hash` VARCHAR(264),
	`datetime` INTEGER,
	`where_array` TEXT,
	`select_array` TEXT,
	`table_name` VARCHAR(100),
	`order_by` TEXT,
	`row_count` INTEGER,
	`total_rows` INTEGER,
	`ids` TEXT,
	`search_title` VARCHAR(250) NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `hash` (`hash`(264)),
	INDEX `datetime` (`datetime`)
) Engine=MyISAM;

CREATE TABLE `settings`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`s_name` VARCHAR(50) NOT NULL,
	`site_title` VARCHAR(200) NOT NULL,
	`site_short_title` VARCHAR(50) NOT NULL,
	`site_description` VARCHAR(200) NOT NULL,
	`site_keywords` VARCHAR(200) NOT NULL,
	`create_keywords` VARCHAR(25) NOT NULL,
	`create_description` VARCHAR(25) NOT NULL,
	`create_cat_keywords` VARCHAR(25) NOT NULL,
	`create_cat_description` VARCHAR(25) NOT NULL,
	`add_site_name` INTEGER(1) NOT NULL,
	`add_site_name_to_cat` INTEGER(1) NOT NULL,
	`delimiter` VARCHAR(5) NOT NULL,
	`editor_theme` VARCHAR(10) NOT NULL,
	`site_template` VARCHAR(50) NOT NULL,
	`site_offline` VARCHAR(5) NOT NULL,
	`main_type` VARCHAR(50) NOT NULL,
	`main_page_id` INTEGER NOT NULL,
	`main_page_cat` TEXT NOT NULL,
	`main_page_module` VARCHAR(50) NOT NULL,
	`sidepanel` VARCHAR(5) NOT NULL,
	`lk` VARCHAR(250),
	PRIMARY KEY (`id`),
	INDEX `s_name` (`s_name`(50))
) Engine=MyISAM;

CREATE TABLE `tags`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`value` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `value` (`value`(255))
) Engine=MyISAM;

CREATE TABLE `user_autologin`
(
	`key_id` CHAR(32) NOT NULL,
	`user_id` SMALLINT(8) DEFAULT 0 NOT NULL,
	`user_agent` VARCHAR(150) NOT NULL,
	`last_ip` VARCHAR(40) NOT NULL,
	`last_login` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`key_id`,`user_id`),
	INDEX `last_ip` (`last_ip`(40))
) Engine=MyISAM;

CREATE TABLE `user_profile`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`user_id` INTEGER NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `user_id` (`user_id`)
) Engine=MyISAM;

CREATE TABLE `user_temp`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(255) NOT NULL,
	`password` VARCHAR(34) NOT NULL,
	`email` VARCHAR(100) NOT NULL,
	`activation_key` VARCHAR(50) NOT NULL,
	`last_ip` VARCHAR(40) NOT NULL,
	`created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) Engine=MyISAM;

CREATE TABLE `users`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`role_id` INTEGER DEFAULT 1 NOT NULL,
	`username` VARCHAR(25) NOT NULL,
	`password` VARCHAR(34) NOT NULL,
	`email` VARCHAR(100) NOT NULL,
	`banned` TINYINT(1) DEFAULT 0 NOT NULL,
	`ban_reason` VARCHAR(255),
	`newpass` VARCHAR(34),
	`newpass_key` VARCHAR(32),
	`newpass_time` DATETIME,
	`last_ip` VARCHAR(40) NOT NULL,
	`last_login` DATETIME DEFAULT \'0000-00-00 00:00:00\' NOT NULL,
	`created` DATETIME DEFAULT \'0000-00-00 00:00:00\' NOT NULL,
	`modified` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`),
	UNIQUE INDEX `username` (`username`(25)),
	UNIQUE INDEX `email` (`email`(100)),
	INDEX `role_id` (`role_id`),
	INDEX `banned` (`banned`(1)),
	INDEX `password` (`password`(34))
) Engine=MyISAM;

CREATE TABLE `widgets`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50) NOT NULL,
	`type` VARCHAR(15) NOT NULL,
	`data` TEXT NOT NULL,
	`method` VARCHAR(50) NOT NULL,
	`settings` TEXT NOT NULL,
	`description` VARCHAR(300) NOT NULL,
	`roles` TEXT NOT NULL,
	`created` INTEGER NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `name` (`name`(50))
) Engine=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
' 
		);
	}
}