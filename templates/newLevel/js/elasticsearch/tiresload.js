$( document ).ready(function(){ 
	$("#tiresElasticSContainer").elasticSearch({
		mainContainer: "#tiresElasticSContainer",
		entitySelects: [
                {	
             	   id: 		"e_s_brand_id",
             	   name: 	"shop_brands_i18n__id",
             	   label: 	"Производитель",
             	   url:		"/shop/elastic_search/getBrands",
             	   isset:	false
                },{
             	   id: 		"e_s_type_tr_id",
             	   name: 	"shop_category_i18n__id",
             	   label: 	"Тип",
             	   url:		"/shop/elastic_search/getTypeOfTires",
             	   isset:	false
                },{
             	   id: 		"e_s_sezon_id",
             	   name: 	"shop_product_properties_data__name",
             	   label: 	"Сезонность",
             	   url:		"/shop/elastic_search/seasons",
             	   isset:	false
                },{
             	   id: 		"e_s_width_id",
             	   name: 	"shop_product_properties_data__name",
             	   label: 	"Ширина",
             	   url:		"/shop/elastic_search/getWidth",
             	   isset:	false
                },{
             	   id: 		"e_s_height_id",
             	   name: 	"shop_product_properties_data__name",
             	   label: 	"Высота",
             	   url:		"/shop/elastic_search/getHeight",
             	   isset:	false
                },{
             	   id: 		"e_s_diameter_id",
             	   name: 	"shop_product_properties_data__name",
             	   label: 	"Диаметр",
             	   url:		"/shop/elastic_search/getDiameter",
             	   isset:	false
                }
         ]
	}); 
});