$( document ).ready(function(){ 
	$("#brandElasticSContainer").elasticSearch({
		mainContainer: "#brandElasticSContainer",
		entitySelects: [
                {	
             	   id: 		"e_s_avto_brand_id",
             	   name: 	"podbor_shini_i_diski__id",
             	   label: 	"Производитель",
             	   url:		"/shop/elastic_search/getWheelBrands",
             	   isset:	false,
             	   optVal:	null
                },{
             	   id: 		"e_s_avto_model_id",
             	   name: 	"shop_product_properties_data__value1",
             	   label: 	"Модель",
             	   url:		"/shop/elastic_search/getWheelType",
             	   isset:	false,
             	   optVal:	null
                },{
             	   id: 		"e_s_avto_year_id",
             	   name: 	"shop_product_properties_data__value2",
             	   label: 	"Год выпуска",
             	   url:		"/shop/elastic_search/getWheelDiameter",
             	   isset:	false,
             	   optVal:	null
                },{
             	   id: 		"e_s_avto_modification_id",
             	   name: 	"shop_product_properties_data__value3",
             	   label: 	"Модификация",
             	   url:		"/shop/elastic_search/getWheelPCD",
             	   isset:	false,
             	   optVal:	null
                }
         ]
	}); 
});