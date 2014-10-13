$( document ).ready(function(){ 
	console.log($("#tiresElasticSContainer"));
	$("#tiresElasticSContainer").elasticSearch({
		mainContainer: "#tiresElasticSContainer",
		entitySelects: [
                {	
             	   id: 		"e_s_brand_id",
             	   name: 	"brand",
             	   label: 	"Производитель",
             	   url:		"/shop/elastic_search/getBrands",
             	   isset:	false
                },{
             	   id: 		"e_s_type_tr_id",
             	   name: 	"typetr",
             	   label: 	"Тип",
             	   url:		"/shop/elastic_search/getTypeOfTires",
             	   isset:	false
                },{
             	   id: 		"e_s_sezon_id",
             	   name: 	"sezon",
             	   label: 	"Сезонность",
             	   url:		"/shop/elastic_search/seasons",
             	   isset:	false
                },{
             	   id: 		"e_s_width_id",
             	   name: 	"width",
             	   label: 	"Ширина",
             	   url:		"/shop/elastic_search/getWidth",
             	   isset:	false
                },{
             	   id: 		"e_s_height_id",
             	   name: 	"height",
             	   label: 	"Высота",
             	   url:		"/shop/elastic_search/getHeight",
             	   isset:	false
                },{
             	   id: 		"e_s_diameter_id",
             	   name: 	"diameter",
             	   label: 	"Диаметр",
             	   url:		"/shop/elastic_search/getDiameter",
             	   isset:	false
                }
         ]
	}); 
});