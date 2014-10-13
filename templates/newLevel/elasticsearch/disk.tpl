<div id="discElasticSContainer"></div>
<script type="text/javascript" src="{$THEME}js/elasticsearch/discload.js?_={echo rand(5, 1000000);}">
</script>

<!-- 
<div>
	<form class="d_i-b diskform formadisk" action="/shop/category/diski"
		method="get">
		<div class="e_s_container">
			<div class="check-appointment p_r  v-a_m e_s_column">

				<div class="lineForm">
					<select class="color" id="brand" name="brand[]">
						<option value="0" selected="selected">выберите бренд</option>
						{foreach getBrand(102) as $b}
						<option value="{echo $b->getId()}">{echo $b->getName()}</option>
						{/foreach}
					</select>
				</div>
			</div>


			<span class="datas f-s_0"></span>

			<div class="check-appointment p_r  v-a_m m-t_10 e_s_column">

				<div class="lineForm seldiametr">
					<select class="color" id="diametr" name="p[59][]">
						<option value="0" selected="selected">выберите диаметр</option>

					</select>
				</div>
			</div>

			<div class="check-appointment p_r  v-a_m m-t_10 e_s_column">

				<div class="lineForm seldisctype">
					<select class="color" id="disctype" name="p[65][]">
						<option value="0" selected="selected">выберите тип</option>
					</select>
				</div>
			</div>


			<div class="check-appointment p_r  v-a_m  m-t_10 e_s_column">

				<div class="lineForm selpcd">
					<select class="color" id="pcd" name="p[60][]">
						<option value="0" selected="selected">выберите PCD</option>
					</select>
				</div>
			</div>


			<div class="check-appointment p_r  v-a_m m-t_10 e_s_column">

				<div class="lineForm selet">
					<select class="color" id="et" name="p[62][]">
						<option value="0" selected="selected">выберите ET</option>
					</select>
				</div>
			</div>


			<div class="check-appointment p_r  v-a_m m-t_10 e_s_column">

				<div class="lineForm selstupica">
					<select class="color" id="stupica" name="p[63][]">
						<option value="0" selected="selected">выберите ступицу</option>
					</select>
				</div>
			</div>



			<div class="btn-filter-bus v-a_m m-t_10 e_s_column">
				<button type="submit" class="submitdisk">
					<span class="text-el">выбрать</span>
				</button>
			</div>
		</div>
	</form>

</div>
 -->