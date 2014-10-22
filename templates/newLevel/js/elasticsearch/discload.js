$( document ).ready(function(){ 
	$("#tiresElasticSContainer").elasticSearch({
		mainContainer: "#discElasticSContainer",
		entitySelects: [
                {	
             	   id: 		"e_s_disc_brand_id",
             	   name: 	"brand_disc",
             	   label: 	"Производитель",
             	   url:		"/shop/elastic_search/getBrands",
             	   isset:	false,
             	   optVal:	null
                },{
             	   id: 		"e_s_type_disc_id",
             	   name: 	"type_tr_disc",
             	   label: 	"Тип",
             	   url:		"",
             	   isset:	false,
             	   optVal:	null
                },{
             	   id: 		"e_s_diameter_disc_id",
             	   name: 	"diameter_disc",
             	   label: 	"Диаметр",
             	   url:		"",
             	   isset:	false,
             	   optVal:	null
                },{
             	   id: 		"e_s_pcd_disc_id",
             	   name: 	"pcd_disc",
             	   label: 	"Выберите PCD",
             	   url:		"",
             	   isset:	false,
             	   optVal:	null
                },{
             	   id: 		"e_s_et_disc_id",
             	   name: 	"et_disc",
             	   label: 	"Выберите ET",
             	   url:		"",
             	   isset:	false,
             	   optVal:	null
                },{
             	   id: 		"e_s_hub_disc_id",
             	   name: 	"hub_disc",
             	   label: 	"Ступицу",
             	   url:		"",
             	   isset:	false,
             	   optVal:	null
                }
         ]
	}); 
});