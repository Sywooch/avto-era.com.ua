{/*
/**
* @file - template for displaying shop category page
* Variables
*   $category: (object) instance of SCategory
*       $category->getDescription(): method which returns category description
*       $category->getName(): method which returns category name according to currenct locale
*   $products: PropelObjectCollection of (object)s instance of SProducts
*       $product->firstVariant: variable which contains the first variant of product
*       $product->firstVariant->toCurrency(): method which returns price according to current currencya and format
*   $totalProducts: integer contains products count
*   $pagination: string variable contains html code for displaying pagination
*   $pageNumber: integer variable contains the current page number
*   $banners: array of (object)s of SBanners which have to be displayed in current page
*/}

<!--Start. Make bread crumbs -->
<div class="frame-crumbs">
    {widget('path')}
</div>
<!--End. Make bread crumbs -->
<div class="frame-inside page-category">
    <div class="container">
        <div class="right-catalog">
            <!-- Start. Category name and count products in category-->
            <div class="f-s_0 title-category">
                <div class="frame-title">
                    <h1 class="d_i title">{echo $title}</h1>
                </div>
                <span class="count">(<span class="text-el">{lang('Найдено','newLevel')}</span> {$totalProducts} {echo SStringHelper::Pluralize($totalProducts, array(lang('товар','newLevel'),lang('товара','newLevel'),lang('товаров','newLevel')))})</span>
            </div>
            <!-- End. Category name and count products in category-->
            {if $totalProducts == 0}
                <!-- Start. Empty category-->
                <div class="msg layout-highlight layout-highlight-msg">
                    <div class="info">
                        <span class="icon_info"></span>
                        <span class="text-el">{lang('Не найдено товаров','newLevel')}</span>
                    </div>
                </div>
                <!-- End. Empty category-->
            {/if}
            <!--Start. Banners block-->
            {$CI->load->module('banners')->render($category->getId())}

            <!--End. Banners-->
            {include_tpl('catalogue_header')}
            <!-- Start.If count products in category > 0 then show products list and pagination links -->
            {if $totalProducts > 0}
                <ul class="animateListItems items items-catalog {if $_COOKIE['listtable'] == 'table' || $_COOKIE['listtable'] == NULL} table{else:} list{/if}" id="items-catalog-main">
                    <!-- Include template for one product item-->
                    {$CI->load->module('new_level')->OPI($model, array('wishlist'=>true, 'codeArticle' => true))}
                </ul>
                <!-- render pagination-->
                {$pagination}
            {/if}
            <!-- End.If count products in category > 0 then show products and pagination links -->
            {if (!$_GET['per_page'] || $_GET['per_page'] <= 0 || $_GET['per_page'] == "") && trim($category->getDescription()) != ""}
                <div class="frame-seo-text">
                    <div class="text seo-text">
                        {echo trim($category->getDescription())}
                    </div>
                </div>
            {/if}
        </div>
          
		<div class="filter left-catalog">
			<!--
			<div class="filter-bus_benefits container"
				style="width: 200px; margin-top: 35px; z-index: 222;">
				{if $category->getId() != 102}
				<div class="filter-bus f_l" style="margin-left: -10px;">
					<div class="title">
						<span class="text-el">Быстрый подбор автошин</span>
					</div>

					<form class="d_i-b diskform shinaform" action="" method="get"
						id="mainFilterForm">
						<div class="check-appointment p_r  v-a_m">
							<div class="lineForm">
								<select class="color" id="brand2" name="brand[]">
									<option value="0" selected="selected">выберите бренд</option>
									{foreach getBrand(102, true) as $b}
									<option value="{echo $b->getId()}">{echo
										$b->getName()}</option> {/foreach}
								</select>
							</div>
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
									<option value="0" selected="selected">выберите ширину</option>

								</select>
							</div>
						</div>

						<div class="check-appointment p_r  v-a_m m-t_10">
							<div class="lineForm selvysota">
								<select class="color" id="vysota" name="vysota">
									<option value="0" selected="selected">выберите высоту</option>

								</select>
							</div>
						</div>

						<div class="check-appointment p_r  v-a_m m-t_10">
							<div class="lineForm selshnydimatr">
								<select class="color" id="shnydimatr" name="shnydimatr">
									<option value="0" selected="selected">выберите диаметр</option>

								</select>
							</div>
						</div>
						<div class="btn-filter-bus v-a_m m-t_10">
							<button type="submit" class="submitshyny">
								<span class="text-el">выбрать</span>
							</button>
						</div>


						<span class="datas f-s_0"></span>
					</form>

				</div>
				{else:}

				<div class="filter-bus f_l" style="margin-left: -10px;">
					<div class="title">
						<span class="text-el">Быстрый подбор дисков</span>
					</div>
					<form class="d_i-b diskform formadisk"
						action="/shop/category/diski" method="get">

						<div class="check-appointment p_r  v-a_m">

							<div class="lineForm">
								<select class="color" id="brand" name="brand[]">
									<option value="0" selected="selected">выберите бренд</option>
									{foreach getBrand(102) as $b}
									<option value="{echo $b->getId()}">{echo
										$b->getName()}</option> {/foreach}
								</select>
							</div>
						</div>


						<span class="datas f-s_0"></span>

						<div class="check-appointment p_r  v-a_m m-t_10">

							<div class="lineForm seldiametr">
								<select class="color" id="diametr" name="p[59][]">
									<option value="0" selected="selected">выберите диаметр</option>

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
									<option value="0" selected="selected">выберите ступицу</option>
								</select>
							</div>
						</div>



						<div class="btn-filter-bus v-a_m m-t_10">
							<button type="submit" class="submitdisk">
								<span class="text-el">выбрать</span>
							</button>
						</div>

					</form>

				</div>
				{/if}

			</div>
			-->

			{$addCats = array(40 => 84, 44 => 84, 41 => 85, 45 => 85, 43 => 86,
			46 => 86, 78 => 87, 81 => 87, 79 => 88, 82 => 88, 80 => 89, 83 =>
			89)}
			<!-- 
            {if isset($addCats[$category->getId()]) && $cat = getCat($addCats[$category->getId()])}
                <div class="frame-category-menu layout-highlight">
                    <div class="inside-padd">
                        <nav>
                            <ul class="nav nav-vertical nav-category">
                                <li>
                                    <a href="{shop_url('category/' . $cat->getFullPath())}">{echo $cat->getName()}</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            {/if}

            {if $category->hasSubCats()}
                {$subcats = $category->getChildsByParentIdI18n($category->getId())}
            {else:}
                {$subcats = $category->getChildsByParentIdI18n($category->getParentId())}
            {/if}
            {if $subcats}
                <div class="frame-category-menu layout-highlight">
                    <div class="inside-padd">
                        <nav>
                            <ul class="nav nav-vertical nav-category">
                                {foreach $subcats as $key => $value}
                                    {if $value->getId() == $category->getId()}
                                        <li class="active">
                                            <span>{echo $value->getName()}</span>
                                        </li>
                                    {else:}
                                        <li class="active">
                                            <a href="{shop_url('category/' . $value->getFullPath())}">{echo $value->getName()}</a>
                                        </li>
                                    {/if}
                                {/foreach}
                            </ul>
                        </nav>
                    </div>
                </div>
            {/if} -->
			<!-- Load filter-->
			{$CI->load->module('smart_filter')->init()}
		</div>
		<!--widget for popular products in this category-->
    </div>
</div>
<!--Start. Popular products -->
<div class="horizontal-carousel">
    {widget('popular_products_cartogory_h')}
</div>
<!--End. Popular products -->
<script type="text/javascript" src="{$THEME}js/cusel-min-2.5.js"></script>