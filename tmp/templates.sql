=============================[products => brand]====================
SELECT * FROM `shop_products` shop_products INNER JOIN `shop_brands` shop_brands ON shop_brands.id = shop_products.brand_id
=============================[products => brand]====================
SELECT * FROM `shop_brands_i18n` shop_brands_i18n WHERE shop_brands_i18n.id IN (SELECT DISTINCT shop_brands.id FROM `shop_brands` shop_brands INNER JOIN `shop_products` shop_products ON shop_brands.id = shop_products.brand_id) AND shop_brands_i18n.locale = 'ru' ORDER BY shop_brands_i18n.name
=============================[products => category]==================== 
SELECT * FROM `shop_category_i18n` shop_category_i18n WHERE shop_category_i18n.id IN (SELECT DISTINCT shop_category.id FROM `shop_category` shop_category INNER JOIN `shop_products` shop_products ON shop_category.id = shop_products.brand_id) AND shop_category_i18n.locale = 'ru' AND shop_category_i18n.id <> '102' GROUP BY(shop_category_i18n.name) ORDER BY shop_category_i18n.name
=============================[products => property data]====================
SELECT shop_product_properties_data.id, shop_product_properties_data.value FROM `shop_product_properties_data` shop_product_properties_data INNER JOIN `shop_products` shop_products ON shop_products.id = shop_product_properties_data.product_id WHERE shop_product_properties_data.property_id = '42' GROUP BY (shop_product_properties_data.value)
	