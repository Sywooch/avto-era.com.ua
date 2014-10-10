// Create closure of elasticsearch.
(function( $ ) {
 
    // Plugin definition.
    $.fn.elasticSearch = function( options ) {
    	var self = this;    	
    	// This is the easiest way to have default options.
        var settings = $.extend({
            mainContainer: "#tiresElasticSearchContainer",
        	formID: "mainFilterForm1",
            formClass: "class",
            backgroundColor: "white",
            optionDefValue: "",
            
            entitySelects: [
                           {	
                        	   id: "e_s_brand_id",
                        	   name: "brand",
                        	   label: "Производитель"
                           },{
                        	   id: "e_s_typetr_id",
                        	   name: "typetr",
                        	   label: "Тип"
                           }
            ]
        }, options );
        
        selectProducer(self, settings);        
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
    	
    	//    	<div class="btBoxFilter">    	
    	var divApplyButton = $("<div>", {class: "e_s_apply_div"});
    	form.append(divApplyButton);
    	
    	// <button class="btVer1">Подобрать</button>
    	// <button class="submitdisk" type="submit">
    	var applyButton = $("<button>", {class: "submitdisk", type: "submit"});
    	applyButton.text("Подобрать");
    	divApplyButton.append(applyButton);
    	
    };
 })( jQuery );
