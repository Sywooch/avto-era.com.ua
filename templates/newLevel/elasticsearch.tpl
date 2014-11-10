<!-- Filter Client -->
	<center>
       	<div id="elasticsearchTab" style="width: 980px;">
		  <ul style="position: inherit;">
		    <li><a href="#esearchtabs-1">{lang('ШИНЫ','newLevel')}</a></li>
		    <li><a href="#esearchtabs-2">{lang('ДИСКИ','newLevel')}</a></li>
		    <li><a href="#esearchtabs-3">{lang('ПОДБОР ПО МАРКЕ','newLevel')}</a></li>
		  </ul>
		  <div id="esearchtabs-1" class="elasticContainer">
		    <p>
		    	{include_tpl('elasticsearch/tires.tpl')}				
			</p> 
		  </div>
		  <div id="esearchtabs-2" class="elasticContainer">
		    <p>{include_tpl('elasticsearch/disk.tpl')}</p> 
		  </div>
		  <div id="esearchtabs-3" class="elasticContainer">
		  	<p>{include_tpl('elasticsearch/brand.tpl')}</p>  
		  </div>
		</div>
		<script>
			$( "#elasticsearchTab" ).tabs();
		</script>
	</center>
	</br>
	</br>
<!-- Filter Client -->       