<div id="tiresElasticSearchContainer"></div>
<script type="text/javascript">
	$( document ).ready(function() {
		$("tiresElasticSearchContainer").elasticSearch();
	});
</script>


<!-- 
<div>
	<form class="d_i-b1 diskform1 shinaform1" action="" method="get"
		id="mainFilterForm1">
		<div class="e_s_container">
			<div class="check-appointment p_r  v-a_m e_s_column">
				<div class="lineForm">
					<select class="color" id="brand2" name="brand[]">
						<option value="0" selected="selected">выберите бренд</option>
						{foreach getBrand(102, true) as $b}
						<option value="{echo $b->getId()}">{echo $b->getName()}</option>
						{/foreach}
					</select>
				</div>
			</div>
	
			<div class="check-appointment p_r  v-a_m m-t_10 e_s_column">
				<div class="lineForm seltypetr">
					<select class="color" id="typetr" name="typetr">
						<option value="0" selected="selected">выберите тип</option>
	
					</select>
				</div>
			</div>
			<div class="check-appointment p_r  v-a_m m-t_10 e_s_column">
				<div class="lineForm selsezon">
					<select class="color" id="sezon" name="sezon">
						<option value="0" selected="selected">выберите сезон</option>
	
					</select>
				</div>
			</div>
	
			<div class="check-appointment p_r  v-a_m m-t_10 e_s_column">
				<div class="lineForm selshirina">
					<select class="color" id="shirina" name="shirina">
						<option value="0" selected="selected">выберите ширину</option>
	
					</select>
				</div>
			</div>
	
			<div class="check-appointment p_r  v-a_m m-t_10 e_s_column">
				<div class="lineForm selvysota">
					<select class="color" id="vysota" name="vysota">
						<option value="0" selected="selected">выберите высоту</option>
	
					</select>
				</div>
			</div>
	
			<div class="check-appointment p_r  v-a_m m-t_10 e_s_column">
				<div class="lineForm selshnydimatr">
					<select class="color" id="shnydimatr" name="shnydimatr">
						<option value="0" selected="selected">выберите диаметр</option>
	
					</select>
				</div>
			</div>
			<div class="btn-filter-bus v-a_m m-t_10 e_s_column">
				<button type="submit" class="submitshyny">
					<span class="text-el">выбрать</span>
				</button>
			</div>
	
	
			<span class="datas f-s_0"></span>
		</div>
	</form>
</div>

-->