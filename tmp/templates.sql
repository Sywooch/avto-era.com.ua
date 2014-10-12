=============================[products => brand]====================
SELECT * FROM `shop_products` shop_products INNER JOIN `shop_brands` shop_brands ON shop_brands.id = shop_products.brand_id
=============================[products => brand]====================
SELECT * FROM `shop_brands_i18n` shop_brands_i18n WHERE shop_brands_i18n.id IN (SELECT DISTINCT shop_brands.id FROM `shop_brands` shop_brands INNER JOIN `shop_products` shop_products ON shop_brands.id = shop_products.brand_id) AND shop_brands_i18n.locale = 'ru' ORDER BY shop_brands_i18n.name
==================================================================== 

	