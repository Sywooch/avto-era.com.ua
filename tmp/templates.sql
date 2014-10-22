=============================[products => brand]====================
SELECT * FROM `shop_products` shop_products INNER JOIN `shop_brands` shop_brands ON shop_brands.id = shop_products.brand_id
=============================[products => brand]====================
SELECT * FROM `shop_brands_i18n` shop_brands_i18n WHERE shop_brands_i18n.id IN (SELECT DISTINCT shop_brands.id FROM `shop_brands` shop_brands INNER JOIN `shop_products` shop_products ON shop_brands.id = shop_products.brand_id) AND shop_brands_i18n.locale = 'ru' ORDER BY shop_brands_i18n.name
=============================[products => category]==================== 
SELECT * FROM `shop_category_i18n` shop_category_i18n WHERE shop_category_i18n.id IN (SELECT DISTINCT shop_category.id FROM `shop_category` shop_category INNER JOIN `shop_products` shop_products ON shop_category.id = shop_products.brand_id) AND shop_category_i18n.locale = 'ru' AND shop_category_i18n.id <> '102' GROUP BY(shop_category_i18n.name) ORDER BY shop_category_i18n.name
=============================[products => property data]====================
SELECT shop_product_properties_data.id, shop_product_properties_data.value FROM `shop_product_properties_data` shop_product_properties_data INNER JOIN `shop_products` shop_products ON shop_products.id = shop_product_properties_data.product_id WHERE shop_product_properties_data.property_id = '42' GROUP BY (shop_product_properties_data.value)


<script type="text/javascript">
	$( document ).ready(function() {
		$("tiresElasticSearchContainer").elasticSearch();
	});
</script>



SELECT * FROM `shop_product_properties_data` JOIN `shop_product_properties` ON shop_product_properties_data.property_id=shop_product_properties.id JOIN `shop_product_properties_i18n` ON shop_product_properties_data.property_id=shop_product_properties_i18n.id WHERE shop_product_properties_data.locale='" . $locale . "' AND shop_product_properties_i18n.locale='" . $locale . "' AND shop_product_properties.show_on_site AND shop_product_properties_data.product_id=" . $this->productId . " GROUP BY shop_product_properties_data.property_id ORDER BY shop_product_properties.position
//======================
SELECT * FROM `shop_product_properties_data` JOIN `shop_product_properties` ON shop_product_properties_data.property_id=shop_product_properties.id JOIN `shop_product_properties_i18n` ON shop_product_properties_data.property_id=shop_product_properties_i18n.id WHERE shop_product_properties_data.locale='ru' AND shop_product_properties_i18n.locale='ru' AND shop_product_properties.show_on_site AND shop_product_properties_data.product_id='29756' GROUP BY shop_product_properties_data.property_id ORDER BY shop_product_properties.position

################################################################################
################################################################################
################################################################################

SELECT * FROM `shop_products` shop_products 
JOIN `shop_brands` ON shop_brands.id = shop_products.brand_id
JOIN `shop_brands_i18n` ON shop_brands_i18n.id = shop_brands.id
JOIN `shop_category` ON shop_category.id = shop_products.category_id
JOIN `shop_category_i18n` ON shop_category_i18n.id = shop_category.id 	
JOIN `shop_product_properties_data` ON shop_product_properties_data.product_id = shop_products.id
JOIN `shop_product_properties` ON shop_product_properties_data.property_id = shop_product_properties.id
JOIN `shop_product_properties_i18n` ON shop_product_properties_i18n.id = shop_product_properties.id

################################################################################
################################################################################
################################################################################

SELECT DISTINCT shop_brands_i18n.name FROM `shop_products` shop_products 
JOIN `shop_brands` ON shop_brands.id = shop_products.brand_id
JOIN `shop_brands_i18n` ON shop_brands_i18n.id = shop_brands.id
JOIN `shop_category` ON shop_category.id = shop_products.category_id
JOIN `shop_category_i18n` ON shop_category_i18n.id = shop_category.id 	
JOIN `shop_product_properties_data` ON shop_product_properties_data.product_id = shop_products.id
JOIN `shop_product_properties` ON shop_product_properties_data.property_id = shop_product_properties.id
JOIN `shop_product_properties_i18n` ON shop_product_properties_i18n.id = shop_product_properties.id 
where shop_category_i18n.name='Всесезонные легковые шины'
GROUP BY shop_brands_i18n.name

################################################################################
################################################################################
################################################################################

SELECT shop_product_properties_data.id AS id, shop_product_properties_data.value AS name FROM `shop_products` shop_products
		JOIN `shop_brands` ON shop_brands.id = shop_products.brand_id
		JOIN `shop_brands_i18n` ON shop_brands_i18n.id = shop_brands.id
		JOIN `shop_category` ON shop_category.id = shop_products.category_id
		JOIN `shop_category_i18n` ON shop_category_i18n.id = shop_category.id
		JOIN `shop_product_properties_data` ON shop_product_properties_data.product_id = shop_products.id
		JOIN `shop_product_properties` ON shop_product_properties_data.property_id = shop_product_properties.id
		JOIN `shop_product_properties_i18n` ON shop_product_properties_i18n.id = shop_product_properties.id
		where shop_product_properties_i18n.name='Сезонность'
		GROUP BY shop_product_properties_data.value
		ORDER BY shop_product_properties_data.value