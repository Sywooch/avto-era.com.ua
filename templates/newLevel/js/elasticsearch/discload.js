$( document ).ready(function(){ 
	$("#tiresElasticSContainer").elasticSearch({
		mainContainer: "#discElasticSContainer",
		type: "wheels",
		productTyreWheelID:			"productTyreWheelIDWheel",
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
             	   name: 	"shop_product_properties_data__value3",
             	   label: 	"Выберите PCD",
             	   url:		"/shop/elastic_search/getWheelPCD",
             	   isset:	false,
             	   optVal:	null
                },{
             	   id: 		"e_s_et_disc_id",
             	   name: 	"shop_product_properties_data__value4",
             	   label: 	"Выберите ET",
             	   url:		"/shop/elastic_search/getWheelVyletet",
             	   isset:	false,
             	   optVal:	null
                },{
             	   id: 		"e_s_hub_disc_id",
             	   name: 	"shop_product_properties_data__value5",
             	   label: 	"Ступицу",
             	   url:		"/shop/elastic_search/getWheelHub",
             	   isset:	false,
             	   optVal:	null
                }
         ]
	}); 
});