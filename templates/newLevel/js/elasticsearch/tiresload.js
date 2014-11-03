$( document ).ready(function(){ 
	$("#tiresElasticSContainer").elasticSearch({
		mainContainer: "#tiresElasticSContainer",
		type: "tyres",
		entitySelects: [
                {	
             	   id: 		"e_s_brand_id",
             	   name: 	"shop_brands_i18n__id",
             	   label: 	"Производитель",
             	   url:		"/shop/elastic_search/getBrands",
             	   isset:	false,
             	   optVal:	null
                },{
             	   id: 		"e_s_type_tr_id",
             	   name: 	"shop_category_i18n__id",
             	   label: 	"Тип",
             	   url:		"/shop/elastic_search/getTypeOfTires",
             	   isset:	false,
             	   optVal:	null
                }/*,{
             	   id: 		"e_s_sezon_id",
             	   name: 	"shop_product_properties_data__value1",
             	   label: 	"Сезонность",
             	   url:		"/shop/elastic_search/seasons",
             	   isset:	false,
             	   optVal:	null
                }*/,{
             	   id: 		"e_s_width_id",
             	   name: 	"shop_product_properties_data__value2",
             	   label: 	"Ширина",
             	   url:		"/shop/elastic_search/getWidth",
             	   isset:	false,
             	   optVal:	null
                },{
             	   id: 		"e_s_height_id",
             	   name: 	"shop_product_properties_data__value3",
             	   label: 	"Высота",
             	   url:		"/shop/elastic_search/getHeight",
             	   isset:	false,
             	   optVal:	null
                },{
             	   id: 		"e_s_diameter_id",
             	   name: 	"shop_product_properties_data__value4",
             	   label: 	"Диаметр",
             	   url:		"/shop/elastic_search/getDiameter",
             	   isset:	false,
             	   optVal:	null
                }
         ]
	}); 
});