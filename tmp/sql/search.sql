SELECT shop_products.id AS id FROM `shop_products` shop_products 
JOIN `shop_products_i18n` ON shop_products_i18n.id = shop_products.id 
JOIN `shop_brands` ON shop_brands.id = shop_products.brand_id 
JOIN `shop_brands_i18n` ON shop_brands_i18n.id = shop_brands.id 
JOIN `shop_category` ON shop_category.id = shop_products.category_id 
JOIN `shop_category_i18n` ON shop_category_i18n.id = shop_category.id 
JOIN `shop_product_properties_data` ON shop_product_properties_data.product_id = shop_products.id 
JOIN `shop_product_properties` ON shop_product_properties_data.property_id = shop_product_properties.id 
JOIN `shop_product_properties_i18n` ON shop_product_properties_i18n.id = shop_product_properties.id 
where shop_products.active=1 AND shop_brands_i18n.id = '52' AND shop_category_i18n.id = '' AND shop_product_properties_data.value = '' AND shop_product_properties_data.value = '' AND shop_product_properties_data.value = '' AND shop_product_properties_data.value = '' GROUP BY shop_products_i18n.name ORDER BY shop_products_i18n.name LIMIT 0, 24

============================================================
SELECT * FROM `shop_products_i18n` WHERE shop_products_i18n.name REGEXP '\(\d*\/\d*\WR\d*\)'; 

SELECT * FROM `shop_products_i18n` WHERE shop_products_i18n.name REGEXP '\\(\\d*\\/\\d*\\WR\\d*\\)'; 

SELECT * FROM `shop_products_i18n` WHERE shop_products_i18n.name REGEXP '\\([0-9]*\/[0-9]*\.R[0-9]*\\)'; 

SELECT * FROM `shop_products_i18n` WHERE shop_products_i18n.name REGEXP '[0-9]*\/[0-9]*\.R[0-9]*';
============================================================
SELECT * FROM `shop_products` shop_products 
JOIN `shop_products_i18n` ON shop_products_i18n.id = shop_products.id 
JOIN `shop_brands` ON shop_brands.id = shop_products.brand_id 
JOIN `shop_brands_i18n` ON shop_brands_i18n.id = shop_brands.id 
JOIN `shop_category` ON shop_category.id = shop_products.category_id 
JOIN `shop_category_i18n` ON shop_category_i18n.id = shop_category.id
where shop_products.active=1 AND shop_products_i18n.name REGEXP '[0-9]*\/[0-9]*\.R[0-9]*' 
GROUP BY shop_products_i18n.name
============================================================
SELECT * FROM `shop_products` shop_products 
JOIN `shop_products_i18n` ON shop_products_i18n.id = shop_products.id 
JOIN `shop_brands` ON shop_brands.id = shop_products.brand_id 
JOIN `shop_brands_i18n` ON shop_brands_i18n.id = shop_brands.id 
JOIN `shop_category` ON shop_category.id = shop_products.category_id 
JOIN `shop_category_i18n` ON shop_category_i18n.id = shop_category.id
JOIN `shop_product_properties_data` ON shop_product_properties_data.product_id = shop_products.id
JOIN `shop_product_properties` ON shop_product_properties_data.property_id = shop_product_properties.id
JOIN `shop_product_properties_i18n` ON shop_product_properties_i18n.id = shop_product_properties.id
where shop_products.active=1 AND shop_products_i18n.name REGEXP '[0-9]*\/[0-9]*\.R[0-9]*' 
GROUP BY shop_products_i18n.name