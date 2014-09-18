<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1365409582.
 * Generated on 2013-04-08 11:26:22 by user
 */
class PropelMigration_1365409582
{

	public function preUp($manager)
	{
		// add the pre-migration code here
	}

	public function postUp($manager)
	{
		// add the post-migration code here
	}

	public function preDown($manager)
	{
		// add the pre-migration code here
	}

	public function postDown($manager)
	{
		// add the post-migration code here
	}

	/**
	 * Get the SQL statements for the Up migration
	 *
	 * @return array list of the SQL strings to execute for the Up migration
	 *               the keys being the datasources
	 */
	public function getUpSQL()
	{
		return array (
  'Shop' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

ALTER TABLE `shop_banners_i18n` ADD CONSTRAINT `shop_banners_i18n_FK_1`
	FOREIGN KEY (`id`)
	REFERENCES `shop_banners` (`id`)
	ON UPDATE CASCADE
	ON DELETE CASCADE;

ALTER TABLE `shop_brands_i18n` ADD CONSTRAINT `shop_brands_i18n_FK_1`
	FOREIGN KEY (`id`)
	REFERENCES `shop_brands` (`id`)
	ON UPDATE CASCADE
	ON DELETE CASCADE;

ALTER TABLE `shop_callbacks` ADD CONSTRAINT `shop_callbacks_FK_1`
	FOREIGN KEY (`status_id`)
	REFERENCES `shop_callbacks_statuses` (`id`);

ALTER TABLE `shop_callbacks` ADD CONSTRAINT `shop_callbacks_FK_2`
	FOREIGN KEY (`theme_id`)
	REFERENCES `shop_callbacks_themes` (`id`);

ALTER TABLE `shop_callbacks_statuses_i18n` ADD CONSTRAINT `shop_callbacks_statuses_i18n_FK_1`
	FOREIGN KEY (`id`)
	REFERENCES `shop_callbacks_statuses` (`id`)
	ON UPDATE CASCADE
	ON DELETE CASCADE;

ALTER TABLE `shop_callbacks_themes_i18n` ADD CONSTRAINT `shop_callbacks_themes_i18n_FK_1`
	FOREIGN KEY (`id`)
	REFERENCES `shop_callbacks_themes` (`id`)
	ON UPDATE CASCADE
	ON DELETE CASCADE;

ALTER TABLE `shop_category` ADD CONSTRAINT `shop_category_FK_1`
	FOREIGN KEY (`parent_id`)
	REFERENCES `shop_category` (`id`)
	ON UPDATE CASCADE
	ON DELETE CASCADE;

ALTER TABLE `shop_category_i18n` ADD CONSTRAINT `shop_category_i18n_FK_1`
	FOREIGN KEY (`id`)
	REFERENCES `shop_category` (`id`)
	ON UPDATE CASCADE
	ON DELETE CASCADE;

ALTER TABLE `shop_currencies` CHANGE `rate` `rate` FLOAT (6,3) DEFAULT 1.000;

ALTER TABLE `shop_delivery_methods` CHANGE `price` `price` FLOAT (10,2) NOT NULL;

ALTER TABLE `shop_delivery_methods` CHANGE `free_from` `free_from` FLOAT (10,2) NOT NULL;

ALTER TABLE `shop_delivery_methods_i18n` ADD CONSTRAINT `shop_delivery_methods_i18n_FK_1`
	FOREIGN KEY (`id`)
	REFERENCES `shop_delivery_methods` (`id`)
	ON UPDATE CASCADE
	ON DELETE CASCADE;

ALTER TABLE `shop_delivery_methods_systems` ADD CONSTRAINT `shop_delivery_methods_systems_FK_1`
	FOREIGN KEY (`delivery_method_id`)
	REFERENCES `shop_delivery_methods` (`id`)
	ON DELETE CASCADE;

ALTER TABLE `shop_delivery_methods_systems` ADD CONSTRAINT `shop_delivery_methods_systems_FK_2`
	FOREIGN KEY (`payment_method_id`)
	REFERENCES `shop_payment_methods` (`id`);

ALTER TABLE `shop_discounts` CHANGE `date_start` `date_start` INTEGER(11);

ALTER TABLE `shop_discounts` CHANGE `date_stop` `date_stop` INTEGER(11);

ALTER TABLE `shop_discounts` CHANGE `min_price` `min_price` FLOAT (10,2);

ALTER TABLE `shop_discounts` CHANGE `max_price` `max_price` FLOAT (10,2);

ALTER TABLE `shop_kit` ADD CONSTRAINT `shop_kit_FK_1`
	FOREIGN KEY (`product_id`)
	REFERENCES `shop_products` (`id`)
	ON UPDATE CASCADE
	ON DELETE CASCADE;

ALTER TABLE `shop_kit_product` ADD CONSTRAINT `shop_kit_product_FK_1`
	FOREIGN KEY (`product_id`)
	REFERENCES `shop_products` (`id`)
	ON UPDATE CASCADE
	ON DELETE CASCADE;

ALTER TABLE `shop_kit_product` ADD CONSTRAINT `shop_kit_product_FK_2`
	FOREIGN KEY (`product_id`)
	REFERENCES `shop_product_variants` (`product_id`)
	ON UPDATE CASCADE
	ON DELETE CASCADE;

ALTER TABLE `shop_kit_product` ADD CONSTRAINT `shop_kit_product_FK_3`
	FOREIGN KEY (`kit_id`)
	REFERENCES `shop_kit` (`id`)
	ON UPDATE CASCADE
	ON DELETE CASCADE;

ALTER TABLE `shop_notification_statuses_i18n` ADD CONSTRAINT `shop_notification_statuses_i18n_FK_1`
	FOREIGN KEY (`id`)
	REFERENCES `shop_notification_statuses` (`id`)
	ON UPDATE CASCADE
	ON DELETE CASCADE;

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

ALTER TABLE `shop_payment_methods` CHANGE `currency_id` `currency_id` INTEGER(11);

ALTER TABLE `shop_payment_methods` CHANGE `position` `position` INTEGER(11);

ALTER TABLE `shop_payment_methods` ADD CONSTRAINT `shop_payment_methods_FK_1`
	FOREIGN KEY (`currency_id`)
	REFERENCES `shop_currencies` (`id`);

ALTER TABLE `shop_payment_methods_i18n` ADD CONSTRAINT `shop_payment_methods_i18n_FK_1`
	FOREIGN KEY (`id`)
	REFERENCES `shop_payment_methods` (`id`)
	ON UPDATE CASCADE
	ON DELETE CASCADE;

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

ALTER TABLE `shop_product_variants` CHANGE `price` `price` DOUBLE (20,5) NOT NULL;

ALTER TABLE `shop_product_variants` CHANGE `price_in_main` `price_in_main` DOUBLE (20,5) NOT NULL;

ALTER TABLE `shop_product_variants` ADD CONSTRAINT `shop_product_variants_FK_1`
	FOREIGN KEY (`product_id`)
	REFERENCES `shop_products` (`id`)
	ON UPDATE CASCADE
	ON DELETE CASCADE;

ALTER TABLE `shop_product_variants` ADD CONSTRAINT `shop_product_variants_FK_2`
	FOREIGN KEY (`currency`)
	REFERENCES `shop_currencies` (`id`)
	ON UPDATE CASCADE
	ON DELETE CASCADE;

ALTER TABLE `shop_product_variants_i18n` ADD CONSTRAINT `shop_product_variants_i18n_FK_1`
	FOREIGN KEY (`id`)
	REFERENCES `shop_product_variants` (`id`)
	ON UPDATE CASCADE
	ON DELETE CASCADE;

ALTER TABLE `shop_products` CHANGE `old_price` `old_price` FLOAT (10,2);

ALTER TABLE `shop_products` ADD CONSTRAINT `shop_products_FK_1`
	FOREIGN KEY (`brand_id`)
	REFERENCES `shop_brands` (`id`);

ALTER TABLE `shop_products` ADD CONSTRAINT `shop_products_FK_2`
	FOREIGN KEY (`category_id`)
	REFERENCES `shop_category` (`id`)
	ON UPDATE CASCADE
	ON DELETE CASCADE;

ALTER TABLE `shop_products_i18n` ADD CONSTRAINT `shop_products_i18n_FK_1`
	FOREIGN KEY (`id`)
	REFERENCES `shop_products` (`id`)
	ON UPDATE CASCADE
	ON DELETE CASCADE;

ALTER TABLE `shop_products_rating` CHANGE `product_id` `product_id` INTEGER(11) NOT NULL;

ALTER TABLE `shop_products_rating` CHANGE `votes` `votes` INTEGER(11);

ALTER TABLE `shop_products_rating` CHANGE `rating` `rating` INTEGER(11);

ALTER TABLE `shop_products_rating` ADD CONSTRAINT `shop_products_rating_FK_1`
	FOREIGN KEY (`product_id`)
	REFERENCES `shop_products` (`id`);

ALTER TABLE `shop_sorting` CHANGE `tooltrip` `tooltip` VARCHAR(100);

ALTER TABLE `shop_sorting` CHANGE `pos` `pos` INTEGER(11);

ALTER TABLE `shop_spy` CHANGE `user_id` `user_id` INTEGER(11);

ALTER TABLE `shop_spy` CHANGE `product_id` `product_id` INTEGER(11);

ALTER TABLE `shop_spy` CHANGE `price` `price` INTEGER(11);

ALTER TABLE `shop_spy` CHANGE `variant_id` `variant_id` INTEGER(11);

ALTER TABLE `shop_spy` CHANGE `old_price` `old_price` INTEGER(11);

ALTER TABLE `shop_warehouse_data` ADD CONSTRAINT `shop_warehouse_data_FK_1`
	FOREIGN KEY (`product_id`)
	REFERENCES `shop_products` (`id`)
	ON DELETE CASCADE;

ALTER TABLE `shop_warehouse_data` ADD CONSTRAINT `shop_warehouse_data_FK_2`
	FOREIGN KEY (`warehouse_id`)
	REFERENCES `shop_warehouse` (`id`);

ALTER TABLE `users` CHANGE `amout` `amout` FLOAT (10,2) NOT NULL;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
	}

	/**
	 * Get the SQL statements for the Down migration
	 *
	 * @return array list of the SQL strings to execute for the Down migration
	 *               the keys being the datasources
	 */
	public function getDownSQL()
	{
		return array (
  'Shop' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

ALTER TABLE `shop_banners_i18n` DROP FOREIGN KEY `shop_banners_i18n_FK_1`;

ALTER TABLE `shop_brands_i18n` DROP FOREIGN KEY `shop_brands_i18n_FK_1`;

ALTER TABLE `shop_callbacks` DROP FOREIGN KEY `shop_callbacks_FK_1`;

ALTER TABLE `shop_callbacks` DROP FOREIGN KEY `shop_callbacks_FK_2`;

ALTER TABLE `shop_callbacks_statuses_i18n` DROP FOREIGN KEY `shop_callbacks_statuses_i18n_FK_1`;

ALTER TABLE `shop_callbacks_themes_i18n` DROP FOREIGN KEY `shop_callbacks_themes_i18n_FK_1`;

ALTER TABLE `shop_category` DROP FOREIGN KEY `shop_category_FK_1`;

ALTER TABLE `shop_category_i18n` DROP FOREIGN KEY `shop_category_i18n_FK_1`;

ALTER TABLE `shop_currencies` CHANGE `rate` `rate` FLOAT(6,3) DEFAULT 1.000;

ALTER TABLE `shop_delivery_methods` CHANGE `price` `price` FLOAT(10,2) NOT NULL;

ALTER TABLE `shop_delivery_methods` CHANGE `free_from` `free_from` FLOAT(10,2) NOT NULL;

ALTER TABLE `shop_delivery_methods_i18n` DROP FOREIGN KEY `shop_delivery_methods_i18n_FK_1`;

ALTER TABLE `shop_delivery_methods_systems` DROP FOREIGN KEY `shop_delivery_methods_systems_FK_1`;

ALTER TABLE `shop_delivery_methods_systems` DROP FOREIGN KEY `shop_delivery_methods_systems_FK_2`;

ALTER TABLE `shop_discounts` CHANGE `date_start` `date_start` INTEGER;

ALTER TABLE `shop_discounts` CHANGE `date_stop` `date_stop` INTEGER;

ALTER TABLE `shop_discounts` CHANGE `min_price` `min_price` FLOAT(10,2);

ALTER TABLE `shop_discounts` CHANGE `max_price` `max_price` FLOAT(10,2);

ALTER TABLE `shop_kit` DROP FOREIGN KEY `shop_kit_FK_1`;

ALTER TABLE `shop_kit_product` DROP FOREIGN KEY `shop_kit_product_FK_1`;

ALTER TABLE `shop_kit_product` DROP FOREIGN KEY `shop_kit_product_FK_2`;

ALTER TABLE `shop_kit_product` DROP FOREIGN KEY `shop_kit_product_FK_3`;

ALTER TABLE `shop_notification_statuses_i18n` DROP FOREIGN KEY `shop_notification_statuses_i18n_FK_1`;

ALTER TABLE `shop_notifications` DROP FOREIGN KEY `shop_notifications_FK_1`;

ALTER TABLE `shop_notifications` DROP FOREIGN KEY `shop_notifications_FK_2`;

ALTER TABLE `shop_notifications` DROP FOREIGN KEY `shop_notifications_FK_3`;

ALTER TABLE `shop_order_statuses_i18n` DROP FOREIGN KEY `shop_order_statuses_i18n_FK_1`;

ALTER TABLE `shop_orders` DROP FOREIGN KEY `shop_orders_FK_1`;

ALTER TABLE `shop_orders` DROP FOREIGN KEY `shop_orders_FK_2`;

ALTER TABLE `shop_orders` DROP FOREIGN KEY `shop_orders_FK_3`;

ALTER TABLE `shop_orders` CHANGE `delivery_price` `delivery_price` FLOAT(10,2);

ALTER TABLE `shop_orders` CHANGE `total_price` `total_price` FLOAT(10,2);

ALTER TABLE `shop_orders_products` DROP FOREIGN KEY `shop_orders_products_FK_1`;

ALTER TABLE `shop_orders_products` DROP FOREIGN KEY `shop_orders_products_FK_2`;

ALTER TABLE `shop_orders_products` CHANGE `price` `price` FLOAT(10,2);

ALTER TABLE `shop_orders_status_history` DROP FOREIGN KEY `shop_orders_status_history_FK_1`;

ALTER TABLE `shop_orders_status_history` DROP FOREIGN KEY `shop_orders_status_history_FK_2`;

ALTER TABLE `shop_payment_methods` DROP FOREIGN KEY `shop_payment_methods_FK_1`;

ALTER TABLE `shop_payment_methods` CHANGE `currency_id` `currency_id` INTEGER;

ALTER TABLE `shop_payment_methods` CHANGE `position` `position` INTEGER;

ALTER TABLE `shop_payment_methods_i18n` DROP FOREIGN KEY `shop_payment_methods_i18n_FK_1`;

ALTER TABLE `shop_product_categories` DROP FOREIGN KEY `shop_product_categories_FK_1`;

ALTER TABLE `shop_product_categories` DROP FOREIGN KEY `shop_product_categories_FK_2`;

ALTER TABLE `shop_product_images` DROP FOREIGN KEY `shop_product_images_FK_1`;

ALTER TABLE `shop_product_properties_categories` DROP FOREIGN KEY `shop_product_properties_categories_FK_1`;

ALTER TABLE `shop_product_properties_categories` DROP FOREIGN KEY `shop_product_properties_categories_FK_2`;

ALTER TABLE `shop_product_properties_data` DROP FOREIGN KEY `shop_product_properties_data_FK_1`;

ALTER TABLE `shop_product_properties_data` DROP FOREIGN KEY `shop_product_properties_data_FK_2`;

ALTER TABLE `shop_product_properties_i18n` DROP FOREIGN KEY `shop_product_properties_i18n_FK_1`;

ALTER TABLE `shop_product_variants` DROP FOREIGN KEY `shop_product_variants_FK_1`;

ALTER TABLE `shop_product_variants` DROP FOREIGN KEY `shop_product_variants_FK_2`;

ALTER TABLE `shop_product_variants` CHANGE `price` `price` DOUBLE(20,5) NOT NULL;

ALTER TABLE `shop_product_variants` CHANGE `price_in_main` `price_in_main` DOUBLE(20,5) NOT NULL;

ALTER TABLE `shop_product_variants_i18n` DROP FOREIGN KEY `shop_product_variants_i18n_FK_1`;

ALTER TABLE `shop_products` DROP FOREIGN KEY `shop_products_FK_1`;

ALTER TABLE `shop_products` DROP FOREIGN KEY `shop_products_FK_2`;

ALTER TABLE `shop_products` CHANGE `old_price` `old_price` FLOAT(10,2);

ALTER TABLE `shop_products_i18n` DROP FOREIGN KEY `shop_products_i18n_FK_1`;

ALTER TABLE `shop_products_rating` DROP FOREIGN KEY `shop_products_rating_FK_1`;

ALTER TABLE `shop_products_rating` CHANGE `product_id` `product_id` INTEGER NOT NULL;

ALTER TABLE `shop_products_rating` CHANGE `votes` `votes` INTEGER;

ALTER TABLE `shop_products_rating` CHANGE `rating` `rating` INTEGER;

ALTER TABLE `shop_sorting` CHANGE `tooltip` `tooltrip` VARCHAR(100);

ALTER TABLE `shop_sorting` CHANGE `pos` `pos` INTEGER;

ALTER TABLE `shop_spy` CHANGE `user_id` `user_id` INTEGER;

ALTER TABLE `shop_spy` CHANGE `product_id` `product_id` INTEGER;

ALTER TABLE `shop_spy` CHANGE `price` `price` INTEGER;

ALTER TABLE `shop_spy` CHANGE `variant_id` `variant_id` INTEGER;

ALTER TABLE `shop_spy` CHANGE `old_price` `old_price` INTEGER;

ALTER TABLE `shop_warehouse_data` DROP FOREIGN KEY `shop_warehouse_data_FK_1`;

ALTER TABLE `shop_warehouse_data` DROP FOREIGN KEY `shop_warehouse_data_FK_2`;

ALTER TABLE `users` CHANGE `amout` `amout` FLOAT(10,2) NOT NULL;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
	}

}