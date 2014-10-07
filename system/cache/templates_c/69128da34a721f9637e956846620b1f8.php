<div class="page-main">
    <?php 
/*
				       * ?><div class="frame-start-page-category-menu">
				       * <div class="container">
				       * <?php \Category\RenderMenu::create()->setConfig(array('cache'=>TRUE))->load('start_page_category_menu')?>
				       * </div>
				       * </div><?php
				       */
				?>
    <div class="filter-bus_benefits container">
		<div class="filter-bus f_l">
			<div class="title">
				<span class="text-el">Быстрый подбор автошин</span>
			</div>

			<form class="d_i-b diskform shinaform" action="" method="get"
				id="mainFilterForm">
				<div class="check-appointment p_r d_i-b v-a_m">
					<div class="lineForm">
						<select class="color" id="brand2" name="brand[]">
							<option value="0" selected="selected">выберите бренд</option>
                        <?php
																								
$result = getBrand ( 102, true );
																								if (is_true_array ( $result )) {
																									foreach ( $result as $b ) {
																										?>
                            <option value="<?php echo $b->getId()?>"><?php echo $b->getName()?></option>
                        <?php }} ?>
                    </select>
					</div>
				</div>
				<div class="btn-filter-bus v-a_m ">
					<button type="submit" class="submitshyny">
						<span class="text-el">выбрать</span>
					</button>
				</div>
				<div class="check-appointment p_r  v-a_m m-t_10">
					<div class="lineForm seltypetr">
						<select class="color" id="typetr" name="typetr">
							<option value="0" selected="selected">выберите тип</option>

						</select>
					</div>
				</div>
				<div class="check-appointment p_r  v-a_m m-t_10">
					<div class="lineForm selsezon">
						<select class="color" id="sezon" name="sezon">
							<option value="0" selected="selected">выберите сезон</option>

						</select>
					</div>
				</div>

				<div class="check-appointment p_r  v-a_m m-t_10">
					<div class="lineForm selshirina">
						<select class="color" id="shirina" name="shirina">
							<option value="0" selected="selected">выберите
								ширину</option>

						</select>
					</div>
				</div>

				<div class="check-appointment p_r  v-a_m m-t_10">
					<div class="lineForm selvysota">
						<select class="color" id="vysota" name="vysota">
							<option value="0" selected="selected">выберите
								высоту</option>

						</select>
					</div>
				</div>

				<div class="check-appointment p_r  v-a_m m-t_10">
					<div class="lineForm selshnydimatr">
						<select class="color" id="shnydimatr" name="shnydimatr">
							<option value="0" selected="selected">выберите
								диаметр</option>

						</select>
					</div>
				</div>



				<span class="datas f-s_0"></span>
			</form>

		</div>

		<div class="filter-bus f_l" style="margin-left: 47px;">
			<div class="title">
				<span class="text-el">Быстрый подбор дисков</span>
			</div>
			<form class="d_i-b diskform formadisk" action="/shop/category/diski"
				method="get">

				<div class="check-appointment p_r f_l v-a_m">

					<div class="lineForm">
						<select class="color" id="brand" name="brand[]">
							<option value="0" selected="selected">выберите бренд</option>
                        <?php
																								
$result = getBrand ( 102 );
																								if (is_true_array ( $result )) {
																									foreach ( $result as $b ) {
																										?>
                            <option value="<?php echo $b->getId()?>"><?php echo $b->getName()?></option>
                        <?php }} ?>
                    </select>
					</div>
				</div>

				<div class="btn-filter-bus v-a_m">
					<button type="submit" class="submitdisk">
						<span class="text-el">выбрать</span>
					</button>
				</div>
				<span class="datas f-s_0"></span>

				<div class="check-appointment p_r  v-a_m m-t_10">

					<div class="lineForm seldiametr">
						<select class="color" id="diametr" name="p[59][]">
							<option value="0" selected="selected">выберите
								диаметр</option>

						</select>
					</div>
				</div>

				<div class="check-appointment p_r  v-a_m m-t_10">

					<div class="lineForm seldisctype">
						<select class="color" id="disctype" name="p[65][]">
							<option value="0" selected="selected">выберите тип</option>
						</select>
					</div>
				</div>


				<div class="check-appointment p_r  v-a_m  m-t_10">

					<div class="lineForm selpcd">
						<select class="color" id="pcd" name="p[60][]">
							<option value="0" selected="selected">выберите PCD</option>
						</select>
					</div>
				</div>


				<div class="check-appointment p_r  v-a_m m-t_10">

					<div class="lineForm selet">
						<select class="color" id="et" name="p[62][]">
							<option value="0" selected="selected">выберите ET</option>
						</select>
					</div>
				</div>


				<div class="check-appointment p_r  v-a_m m-t_10">

					<div class="lineForm selstupica">
						<select class="color" id="stupica" name="p[63][]">
							<option value="0" selected="selected">выберите
								ступицу</option>
						</select>
					</div>
				</div>





			</form>

		</div>

		<div class="benefits f_r">
			<ul>
				<li><span class="icon_work-time"></span>Работаем 7 дней
					в неделю</li>
				<li><span class="icon_system"></span>Гибкая система
					скидок для клиентов</li>
				<li><span class="icon_deliv-ben"></span>Доставка по
					Украине</li>
			</ul>
		</div>
	</div>











	<div id="action_products">
		<div class="preloader"></div>
        <?php echo widget_ajax ('action_products', '#action_products'); ?>
    </div>
	<div class="horizontal-carousel">
		<div id="popular_products">
            <?php echo widget ('popular_products', TRUE); ?>
        </div>
	</div>
	<div id="new_products">
		<div class="preloader"></div>
        <?php echo widget_ajax ('new_products', '#new_products'); ?>
    </div>
    <?php echo widget ('brands'); ?>
    <div class="frame-seotext-news">
		<div class="frame-seo-text">
			<div class="container">
				<div class="text seo-text">
                    <?php echo widget ('start_page_seo_text'); ?>
                </div>
			</div>
		</div>
        <?php echo widget ('latest_news', TRUE); ?>
    </div>
</div>

<script type="text/javascript">
    initDownloadScripts(['cusel-min-2.5']);
</script><?php $mabilis_ttl=1411133355; $mabilis_last_modified=1410863505; ///var/www/avto-era.com.ua/templates/newLevel/shop/start_page.tpl ?>