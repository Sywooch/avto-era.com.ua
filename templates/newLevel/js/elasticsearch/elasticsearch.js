// Create closure of elasticsearch.
(function( $ ) {
 
    // Plugin definition.
    $.fn.elasticSearch = function( options ) {
    	var self = this;    	
    	// This is the easiest way to have default options.
        var settings = $.extend({
            mainContainer: "#tiresElasticSContainer",
        	formID: "mainFilterForm1",
            formClass: "class",
            backgroundColor: "white",
            optionDefValue: "",            
            entitySelects: [
                           {	
                        	   id: 		"e_s_brand_id",
                        	   name: 	"brand",
                        	   label: 	"Производитель",
                        	   url:		"/shop/elastic_search/getBrands",
                        	   isset:	false
                           },{
                        	   id: 		"e_s_typetr_id",
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
        }, options );
        
        selectProducer(self, settings);        
        eventHandlerDispatch(self, settings);
        return this;
        
        
    	/**
    	 * Processing for each element
    	 */
//    	return this.each(function() {
//    		alert(1);
//    		console.log(this);
//    		// Bulting selectors
//            selectProducer(this, settings, self);
//        	
//        });
    };
    
    /**
     * Binds all events for selectors
     * @param thisObj
     * @param settings
     * @returns
     */
    function eventHandlerDispatch(thisObj, settings){
    	settings.entitySelects.forEach(function(elem, index, array){
    		
    		// event handler
			$( "#" + elem.id ).click(function() {
				if(elem.url != "" && !elem.isset){
					elem.isset = true;
					primaryLoadData(this, elem);
				}
			});
    	});
    }
    
    /**
     * Primary load data when select is empty
     * @param thisObj
     * @param settings
     * @returns
     */
    function primaryLoadData(thisObj, settings){
    	$(thisObj).empty().append('<option value="">Загрузка...</option>')
    	.prop('disabled', true);
    	
    	$.ajax({
    		url: settings.url,
    		beforeSend: function( xhr ) {
    			// before send
    		}
		}).done(function( data ) {
			$(thisObj).empty();			
			for (prop in data) {
				if (!data.hasOwnProperty(prop)) {
			        continue;
			    }
				$(thisObj)
		         	.append($("<option></option>")
		         	.attr("value", prop)
		         	.text(data[prop])); 				
			}
		}).fail(function() {
			// Error
		}).always(function() {
			$(thisObj).prop('disabled', false);
		});
    }
    
    /**
     * Private function of producer all tire`s selects
     * <form class="d_i-b1 diskform1 shinaform1" action="" method="get"
		id="mainFilterForm1">
     */
    function selectProducer(thisObj, settings){
    	var divWrapper = $("<div>");
    	var form = $("<form>", {id: settings.formID, class: settings.formClass, action: "", method: "get"});
    	    	
    	$(settings.mainContainer).append(divWrapper);
    	divWrapper.append(form);
    	
    	// <div class="e_s_container">
    	var divInnerContainer = $("<div>", {class: "e_s_container", style: "float: left;"});
    	form.append(divInnerContainer);
    	
    	settings.entitySelects.forEach(function(elem, index, array){
    		//console.log(elem);
    		//<div class="check-appointment p_r  v-a_m e_s_column">
    		var divSelectWrapper = $("<div>", {class: "check-appointment p_r  v-a_m e_s_column"});
    		divInnerContainer.append(divSelectWrapper);
    		
    		// <div class="lineForm">
    		var divLineForm = $("<div>");
    		divSelectWrapper.append(divLineForm);
    		
    		var divLabel  = $("<div>");
    		divLineForm.append(divLabel);
    		
    		// for="ProductBrandId">производитель</label>
    		var label = $("<label>", {for: elem.id});
    		label.text(elem.label);
    		divLabel.append(label);
    		
    		var select = $("<select>", {id: elem.id, name: elem.name});
    		divLineForm.append(select);
    		
    		// <option value="">Все</option>
    		var option = $("<option>", {value: ""});
    		option.text("Все");
    		select.append(option);
    		
    		
    		// -- 'SEPARATOR' ---
    		var divSelectSeparator = $("<div>", {class: "check-appointment p_r  v-a_m e_s_column", style: "width: 20px;"});
    		divInnerContainer.append(divSelectSeparator);
    	});
    	
    	//  <div class="btBoxFilter">    	
    	var divApplyButton = $("<div>", {class: "e_s_apply_div", style: "float: right;"});
    	form.append(divApplyButton);
    	
    	var divApplyButtonWrapper = $("<div>", {class: "e_s_bt_filter_bus"});
    	divApplyButton.append(divApplyButtonWrapper);
    	
    	var applyButton = $("<button>", {class: "e_s_apply_button", type: "submit"});
    	var applyButtonSpan = $("<span>", {class: "e_s_text-el"});
    	applyButtonSpan.text("Подобрать");
    	applyButton.append(applyButtonSpan);
    	divApplyButtonWrapper.append(applyButton);
    	
    	var clearBoth = $("<div>", {style: "clear: both;"});
    	form.append(clearBoth);
    };
 })( jQuery );
