$( document ).ready(function(){ 
	$("#tiresElasticSContainer").elasticSearch({
		mainContainer: "#discElasticSContainer",
		type: "wheels",
		productTyreWheelID:			"productTyreWheelIDWheel",
        action: 					"/shop/categories/searchByWheels",
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
             	   name: 	":wheels_diameter",
             	   label: 	"Ширина х Диаметр",
             	   url:		"/shop/elastic_search/getWheelDiameter",
             	   isset:	false,
             	   optVal:	null
                },{
             	   id: 		"e_s_pcd_disc_id",
             	   name: 	":wheels_pcd",
             	   label: 	"Выберите PCD",
             	   url:		"/shop/elastic_search/getWheelPCD",
             	   isset:	false,
             	   optVal:	null
                },{
             	   id: 		"e_s_et_disc_id",
             	   name: 	":wheels_et",
             	   label: 	"Выберите ET",
             	   url:		"/shop/elastic_search/getWheelVyletet",
             	   isset:	false,
             	   optVal:	null
                },{
             	   id: 		"e_s_hub_disc_id",
             	   name: 	":wheels_dia",
             	   label: 	"Ступицу",
             	   url:		"/shop/elastic_search/getWheelHub",
             	   isset:	false,
             	   optVal:	null
                }
         ]
	}); 
});