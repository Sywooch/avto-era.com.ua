{/* /** * @file - template for displaying shop category page * Variables
* $category: (object) instance of SCategory *
$category->getDescription(): method which returns category description *
$category->getName(): method which returns category name according to
currenct locale * $products: PropelObjectCollection of (object)s
instance of SProducts * $product->firstVariant: variable which contains
the first variant of product * $product->firstVariant->toCurrency():
method which returns price according to current currencya and format *
$totalProducts: integer contains products count * $pagination: string
variable contains html code for displaying pagination * $pageNumber:
integer variable contains the current page number * $banners: array of
(object)s of SBanners which have to be displayed in current page */}

<!--Start. Make bread crumbs -->
<div class="frame-crumbs">{widget('path')}</div>

<div class="frame-inside page-category">
	<div class="container">
		<div class="right-catalog">
			<!-- Start. Category name and count products in category-->
			<div class="f-s_0 title-category">
				<div class="frame-title">
					<h1 class="d_i title">{echo $title}</h1>
				</div>
				<span class="count">(<span class="text-el">{lang('Найдено','newLevel')}</span>
					{$totalProducts} {echo SStringHelper::Pluralize($totalProducts,
					array(lang('товар','newLevel'),lang('товара','newLevel'),lang('товаров','newLevel')))})
				</span>
			</div>
			<!-- End. Category name and count products in category-->
			{if $totalProducts == 0}
			<!-- Start. Empty category-->
			<div class="msg layout-highlight layout-highlight-msg">
				<div class="info">
					<span class="icon_info"></span> <span class="text-el">{lang('Не
						найдено товаров','newLevel')}</span>
				</div>
			</div>
			<!-- End. Empty category-->
			{/if}

			{include_tpl('catalogue_header')}
			<!-- Start.If count products in category > 0 then show products list and pagination links -->
			{if $totalProducts > 0}
			<ul
				class="animateListItems items items-catalog {if $_COOKIE['listtable'] == 'table' || $_COOKIE['listtable'] == NULL} table{else:} list{/if}"
				id="items-catalog-main">
				<!-- Include template for one product item-->
				{$CI->load->module('new_level')->OPI($model, array('wishlist'=>true, 'codeArticle' => true), 'elastic_search_one_product_item')}
			</ul>
			<!-- render pagination-->
			{$pagination} {/if}
			<!-- End.If count products in category > 0 then show products and pagination links -->
			{/*if (!$_GET['per_page'] || $_GET['per_page'] <= 0 ||
				$_GET['per_page'] == "") && trim($category->getDescription()) != ""*/}
			<div class="frame-seo-text">
				<div class="text seo-text">{/*echo
					trim($category->getDescription())*/}</div>
			</div>
			{/*/if*/}
		</div>
	</div>
</div>
<!--Start. Popular products -->
<div class="horizontal-carousel">
	{widget('popular_products_cartogory_h')}</div>
<!--End. Popular products -->
<script type="text/javascript" src="{$THEME}js/cusel-min-2.5.js"></script>
