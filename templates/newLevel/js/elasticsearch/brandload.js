$( document ).ready(function(){ 
	$("#brandElasticSContainer").elasticSearch({
		mainContainer: "#brandElasticSContainer",
		buttonSwitcher: true,
		type: "tyres",
		entitySelects: [
                {	
             	   id: 		"e_s_avto_brand_id",
             	   name: 	"podbor_shini_i_diski__vendor",
             	   label: 	"Производитель",
             	   url:		"/shop/elastic_search/getAutoBrands",
             	   isset:	false,
             	   optVal:	null
                },{
             	   id: 		"e_s_avto_model_id",
             	   name: 	"podbor_shini_i_diski__car",
             	   label: 	"Модель",
             	   url:		"/shop/elastic_search/getAutoModels",
             	   isset:	false,
             	   optVal:	null
                },{
             	   id: 		"e_s_avto_year_id",
             	   name: 	"podbor_shini_i_diski__year",
             	   label: 	"Год выпуска",
             	   url:		"/shop/elastic_search/getAutoYears",
             	   isset:	false,
             	   optVal:	null
                },{
             	   id: 		"e_s_avto_modification_id",
             	   name: 	"podbor_shini_i_diski__modification",
             	   label: 	"Модификация",
             	   url:		"/shop/elastic_search/getAutoModification",
             	   isset:	false,
             	   optVal:	null
                }
         ]
	}); 
});