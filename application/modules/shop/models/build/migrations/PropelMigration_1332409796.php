<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1332409796.
 * Generated on 2012-03-22 11:49:56 by firstrow
 */
class PropelMigration_1332409796 {
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

ALTER TABLE `shop_product_variants` ADD
(
	`external_id` VARCHAR(255)
);

ALTER TABLE `shop_products` ADD
(
	`external_id` VARCHAR(255)
);

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

ALTER TABLE `shop_product_variants` DROP `external_id`;
ALTER TABLE `shop_products` DROP `external_id`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
' 
		);
	}
}