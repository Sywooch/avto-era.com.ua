// Create closure of elasticsearch.
(function( $ ) {
 
    // Plugin definition.
    $.fn.elasticSearch = function( options ) {
    	var self = this;    	
    	// This is the easiest way to have default options.
        var settings = $.extend({
        	formID: "mainFilterFormElasticS",
            formClass: "class",
            backgroundColor: "white",
            optionDefValue: ""
        }, options );
        
        selectProducer(self, settings);        
        eventHandlerDispatch(self, settings);
        return this;
        
        
    	/**
    	 * Processing for each element
    	 */
//    	return this.each(function() {
//    		alert(1);
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
					var selectID =  $( this ).attr("id");
					elem.isset = true;
					primaryLoadData(this, elem, settings, selectID);
				}
			});
    		
    		$( "#" + elem.id ).change(function(event){
    			var selectID =  $( this ).attr("id");
    			var conf = getConfigByID(settings, selectID);
    			conf.optVal = $( this ).val();
    			onChangeAjaxSelect(thisObj, settings, selectID, 0);
    		});
    	});
    };
    
    /**
     * update all selectors
     * @param thisObj
     * @param settings
     * @param selectID
     * @param settingsIndex
     * @returns
     */
    function onChangeAjaxSelect(thisObj, settings, selectID, settingsIndex){
    	if(settingsIndex < settings.entitySelects.length ){
    		// AJAX
    		selectElemDesc = settings.entitySelects[settingsIndex];

    		if( selectID != selectElemDesc.id || $("#" + selectElemDesc.id ).val() == ""){
    			// =================== event ===============
    			var requestParam = generateRequestParam(thisObj, settings, selectID);
    			selectElemDesc.isset = true;
    	    	$("#" + selectElemDesc.id).empty().append('<option value="">Загрузка...</option>')
    	    	.prop('disabled', true);
    	    	
    	    	
    	    	$.ajax({
    	    		url: selectElemDesc.url,
    	    		data: requestParam,
    	    		beforeSend: function( xhr ) {
    	    			// before send
    	    		}
    			}).done(function( data ) {
    				generateSelectOptions(data, $("#" + selectElemDesc.id), settings);
    			}).fail(function() {
    				// Error
    			}).always(function() {
    				$("#" + selectElemDesc.id).prop('disabled', false);
    				settingsIndex++;
        			onChangeAjaxSelect($("#" + selectElemDesc.id), settings, selectID, settingsIndex);
    			});
    	    	// =================== event ===============
    		}else{
    			settingsIndex++;
    			onChangeAjaxSelect($("#" + selectElemDesc.id), settings, selectID, settingsIndex);
    		}
    	}
    };
    
    /**
     * Generate options for Selectors
     * If previous data was similar revalue it
     * @param data
     * @param selectObj
     * @returns
     */
    function generateSelectOptions(data, selectObj, settings){
    	var confs = getConfigByID(settings, $(selectObj).attr("id"));
    	$(selectObj).empty();
    	
    	// Common ALL value
    	$(selectObj)
     	.append( $("<option></option>") 
     	.attr("value", "")
     	.text("Все") ); 
    	
		for (prop in data) {
			if (!data.hasOwnProperty(prop)) {
		        continue;
		    }
			$(selectObj)
	         	.append($("<option></option>")
	         	.attr("value", prop)
	         	.text(data[prop]) ); 				
		}
		// Re-select
		if ( $("#" + $(selectObj).attr("id") + " option[value='" + confs.optVal + "']").length > 0 ){
			$( selectObj ).val(confs.optVal);
		}else{
			confs.optVal = null;
		}
    };
    
    /**
     * Generate AJAX request params link 
     * @returns
     */
    function generateRequestParam(thisObj, settings, selectID){
    	var reqParamArray = {};
    	settings.entitySelects.forEach(function(elem, index, array){
    		//if(elem.id != selectID){
    			if ( $( "#" + elem.id ).val() && $( "#" + elem.id ).val() != "" && ( $( "#" + elem.id ).val().trim() ) ) {
        			reqParamArray[elem.name] = $( "#" + elem.id ).val();
        		}
    		//}
    	});
    	return reqParamArray;
    };
    
    /**
     * Primary load data when select is empty
     * @param thisObj
     * @param settings
     * @returns
     */
    function primaryLoadData(thisObj, settingsElem, settings, selectID){
    	var requestParam = generateRequestParam(thisObj, settings, selectID);
    	$(thisObj).empty().append('<option value="">Загрузка...</option>')
    	.prop('disabled', true);
    	
    	
    	$.ajax({
    		url: settingsElem.url,
    		data: requestParam,
    		beforeSend: function( xhr ) {
    			// before send
    		}
		}).done(function( data ) {
			generateSelectOptions( data, $(thisObj), settings );			
		}).fail(function() {
			// Error
		}).always(function() {
			$(thisObj).prop('disabled', false);
		});
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
    
    /**
     * Retrive entry select by ID
     * @param settings
     * @param id
     * @returns
     */
    function getConfigByID(settings, id){
    	config = {};

    	for (ind in settings.entitySelects){
    		var entitySelectsVal = settings.entitySelects[ind];
    		if(entitySelectsVal.id == id){
    			config = entitySelectsVal;
    		}
    	}
    	return config;
    }
 })( jQuery );