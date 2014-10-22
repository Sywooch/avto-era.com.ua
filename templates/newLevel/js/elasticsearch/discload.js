$( document ).ready(function(){ 
	$("#tiresElasticSContainer").elasticSearch({
		mainContainer: "#discElasticSContainer",
		entitySelects: [
                {	
             	   id: 		"e_s_disc_brand_id",
             	   name: 	"shop_brands_i18n__id",
             	   label: 	"Производитель",
             	   url:		"/shop/elastic_search/getWheelBrands",
             	   isset:	false,
             	   optVal:	null
                },{
             	   id: 		"e_s_type_disc_id",
             	   name: 	"shop_product_properties_data__value1",
             	   label: 	"Тип",
             	   url:		"/shop/elastic_search/getWheelType",
             	   isset:	false,
             	   optVal:	null
                },{
             	   id: 		"e_s_diameter_disc_id",
             	   name: 	"shop_product_properties_data__value2",
             	   label: 	"Диаметр",
             	   url:		"/shop/elastic_search/getWheelDiameter",
             	   isset:	false,
             	   optVal:	null
                },{
             	   id: 		"e_s_pcd_disc_id",
             	   name: 	"pcd_disc",
             	   label: 	"Выберите PCD",
             	   url:		"/shop/elastic_search/getWheelBrands",
             	   isset:	false,
             	   optVal:	null
                },{
             	   id: 		"e_s_et_disc_id",
             	   name: 	"et_disc",
             	   label: 	"Выберите ET",
             	   url:		"/shop/elastic_search/getWheelBrands",
             	   isset:	false,
             	   optVal:	null
                },{
             	   id: 		"e_s_hub_disc_id",
             	   name: 	"hub_disc",
             	   label: 	"Ступицу",
             	   url:		"/shop/elastic_search/getWheelBrands",
             	   isset:	false,
             	   optVal:	null
                }
         ]
	}); 
});