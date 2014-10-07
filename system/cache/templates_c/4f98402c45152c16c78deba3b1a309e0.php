<?php $this->include_tpl('filter_opt', '/var/www/avto-era.com.ua/templates/newLevel/smart_filter'); ?>
<?php if($_GET['brand'] != "" || $_GET['p'] != "" || ($_GET['lp'] && $_GET['lp'] != $minPrice) || ($_GET['rp'] && $_GET['rp'] != $maxPrice)): ?>
<div class="frame-check-filter">
	<div class="inside-padd">
		<div class="title">
			Выбранные фильтры <span class="c_9">(<?php echo count($products)?>)</span>
		</div>
		<ul class="list-check-filter">
                <?php if($curMin != $minPrice || $curMax != $maxPrice): ?>
                    <li class="clear-slider" data-rel="sliders.slider1"><button
					type="button">
					<span class="icon_times icon_remove_filter f_l"></span><span
						class="name-check-filter">Цена от <?php echo $_GET['lp']?> до <?php echo $_GET['rp']?> <span
						class="cur"><?php if(isset($CS)){ echo $CS; } ?></span></>
				
				</button></li>
                    <?php endif; ?>
                    <?php if(count($brands) > 0): ?>
                        <?php if(is_true_array($brands)){ foreach ($brands as $brand){ ?>
                            <?php if(is_true_array($_GET['brand'])){ foreach ($_GET['brand'] as $id){ ?>
                                <?php if($id == $brand->id): ?>
                                <li
				data-name="brand_<?php echo $brand->id?>" class="clear-filter"><button
					type="button">
					<span class="icon_times icon_remove_filter f_l"></span><span
						class="name-check-filter"><?php echo $brand->name?></span>
				</button></li>
                                        <?php endif; ?>
                                    <?php }} ?>
                                <?php }} ?>
                            <?php endif; ?>
                            <?php if(count($propertiesInCat) > 0): ?>
                                <?php if(is_true_array($propertiesInCat)){ foreach ($propertiesInCat as $prop){ ?>
                                    <?php if(is_true_array($prop->possibleValues)){ foreach ($prop->possibleValues as $key){ ?>
                                        <?php if(is_true_array($_GET['p'][$prop->property_id])){ foreach ($_GET['p'][$prop->property_id] as $nm){ ?>
                                            <?php if($nm ==  $key['value']): ?>
                                    <li
				data-name="p_<?php echo $prop->property_id?>_<?php echo  $key['id']  ?>"
				class="clear-filter"><button type="button">
					<span class="icon_times icon_remove_filter f_l"></span><span
						class="name-check-filter"><?php echo $prop->name?>: <?php echo  $key['value']  ?></span>
				</button></li>
                                            <?php endif; ?>
                                        <?php }} ?>
                                    <?php }} ?>
                                <?php }} ?>
                            <?php endif; ?>
            </ul>
		<div class="foot-check-filter">
			<button type="button"
				onclick="location.href = '<?php echo site_url ($CI->uri->uri_string()); ?>'"
				class="btn-reset-filter pointer">
				<span class="text-el d_l_red">Сбросить все фильтры</span>
			</button>
		</div>
	</div>
</div>
<?php endif; ?>
<!-- end of selected filters block -->

<form method="get" id="catalogForm">
	<input type="hidden" name="order" value="<?php echo $order_method?>" />
	<input type="hidden" name="user_per_page"
		value="<?php if(!$_GET['user_per_page']): ?><?php echo \ShopCore::app()->SSettings->frontProductsPerPage?><?php else:?><?php echo $_GET['user_per_page']?><?php endif; ?>" />
    <?php if($totalProducts > 0): ?>
        <div class="frame-filter p_r">
            <?php $this->include_tpl('filter', '/var/www/avto-era.com.ua/templates/newLevel/smart_filter'); ?>
        </div>
    <?php endif; ?>
</form>
<?php $mabilis_ttl=1411131446; $mabilis_last_modified=1403818559; //templates/newLevel/smart_filter/main.tpl ?>