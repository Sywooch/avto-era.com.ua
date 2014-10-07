
<div class="preloader wo-i"></div>
<?php $this->include_tpl('filter_opt', '/var/www/avto-era.com.ua/templates/newLevel/smart_filter'); ?>
<div class="frames-checks-sliders">




	<div
		style="border: solid 2px #eb5041; padding: 7px; margin: 17px 0px; display: block; background: none;"
		class="frame-slider" data-rel="sliders.slider1">
		<div class="inside-padd">
			<div class="title">Фильтр по цене</div>
			<div class="form-cost number">
				<div class="t-a_j">
                    <?php /*may been delete*/?>
                    <label> <input type="text" class="minCost"
						data-title="только цифры" name="lp"
						value="<?php echo $curMin?>" data-mins="<?php echo $minPrice?>" />
					</label> <label> <input type="text" class="maxCost"
						data-title="только цифры" name="rp"
						value="<?php echo $curMax?>" data-maxs="<?php echo $maxPrice?>" />
					</label>
					<div class="btn-not-avail v-a_t">
						<button type="submit">
							<span class="text-el">ОК</span>
						</button>
					</div>
				</div>
			</div>
			<div class="slider-cont">
				<noscript>Джаваскрипт не включен</noscript>
                <?php /*id="slider1" for cleaverfilter that paste frame with count finded products*/?>
                <div class="slider" id="slider1">
					<a href="#" class="ui-slider-handle left-slider"></a> <a href="#"
						class="ui-slider-handle right-slider"></a>
				</div>
			</div>
		</div>
	</div>
    <?php if(count($brands) > 0): ?>
        <div class="frame-group-checks">
		<div class="inside-padd">
			<div class="title">
				<span class="f-s_0"> <span class="icon-arrow"></span> <span
					class="d_b"> <span class="text-el"><?php echo lang ('Производитель', 'newLevel'); ?></span>
				</span>
				</span>
			</div>
			<ul class="filters-content"
				style="height: 300px; overflow-y: scroll;">
                    <?php if(is_true_array($brands)){ foreach ($brands as $brand){ ?>
                        <?php if(is_array($_GET['brand']) && in_array($brand->id, $_GET['brand'])): ?>
                            <?php $check = 'checked="checked"'?>
                        <?php else:?>
                            <?php $check = ''?>
                        <?php endif; ?>
                        <?php if($brand->countProducts == 0): ?>
                            <?php $dis = 'disabled="disabled"'?>
                        <?php else:?>
                            <?php $dis = ""?>
                        <?php endif; ?>
                        <li>
					<div class="frame-label" id="brand_<?php echo $brand->id?>">
						<span class="niceCheck b_n"> <input
							<?php if(isset($dis)){ echo $dis; } ?>
							class="brand<?php echo $brand->id?>" name="brand[]"
							value="<?php echo $brand->id?>" type="checkbox"
							<?php if(isset($check)){ echo $check; } ?> />
						</span>
						<div class="name-count">
							<span class="text-el"><?php echo $brand->name?></span> <span
								class="count">(<?php echo $brand->countProducts?>)</span>
						</div>
					</div>
				</li>
                    <?php }} ?>
                </ul>
		</div>
	</div>
    <?php endif; ?>
<?php 
/*
				       * ?>
				       * <?php if(count($propertiesInCat) > 0): ?>
				       * <?php $flagScroll = 0?>
				       * <?php if(is_true_array($propertiesInCat)){ foreach ($propertiesInCat as $prop){ ?>
				       * <?php if(count($prop->possibleValues) > 0): ?>
				       * <?php $typeProperty = $CI->load->module('new_level')->getPropertyTypes($prop->property_id)?>
				       * <?php $condTypeProperty = $typeProperty != '' && sizeof($typeProperty) != 0?>
				       * <div class="frame-group-checks" <?php if($condTypeProperty): ?>data-rel="<?php echo implode (" ",$typeProperty); ?>"<?php endif; ?> <?php if(in_array('dropDown', $typeProperty)): ?>id="dropDown<?php if(isset($flagScroll)){ echo $flagScroll; } ?>"<?php $flagScroll++?><?php endif; ?>>
				       * <div class="inside-padd">
				       * <div class="title">
				       * <span class="f-s_0">
				       * <span class="d_b">
				       * <span class="text-el"><?php echo $prop->name?></span>
				       * <span class="icon-arrow"></span>
				       * </span>
				       * </span>
				       * </div>
				       * <?php if(!in_array('cusel', $typeProperty) || !$typeProperty): ?>
				       * <div class="filters-content">
				       * <ul>
				       * <?php if(is_true_array($prop->possibleValues)){ foreach ($prop->possibleValues as $item){ ?>
				       * <?php if(is_array($_GET['p'][$prop->property_id]) && (in_array( $item['value'] , $_GET['p'][$prop->property_id]) or in_array(htmlspecialchars_decode( $item['value'] ), $_GET['p'][$prop->property_id]))): ?>
				       * <?php $check = 'checked="checked"'?>
				       * <?php else:?>
				       * <?php $check = ''?>
				       * <?php endif; ?>
				       * <?php if($item['count'] == 0): ?>
				       * <?php $dis = 'disabled="disabled"'?>
				       * <?php else:?>
				       * <?php $dis = ""?>
				       * <?php endif; ?>
				       * <li>
				       * <div class="frame-label" id="p_<?php echo $prop->property_id?>_<?php echo $item['id'] ?>">
				       * <span class="niceCheck b_n">
				       * <input <?php if(isset($dis)){ echo $dis; } ?> name="p[<?php echo $prop->property_id?>][]" value='<?php echo $item['value'] ?>' type="checkbox" <?php if(isset($check)){ echo $check; } ?> />
				       * </span>
				       * <div class="name-count">
				       * <span class="text-el"><?php echo $item['value'] ?></span>
				       * <span class="count">(<?php echo $item['count'] ?>)</span>
				       * </div>
				       * </div>
				       * </li>
				       * <?php }} ?>
				       * </ul>
				       * </div>
				       * <?php else:?>
				       * <div class="lineForm">
				       * <select name="p[<?php echo $prop->property_id?>][]" id="p<?php echo $prop->property_id?>" onchange="changeSelectFilter(this)">
				       * <option id="none" value=''>--<?php echo lang ('Не выбрано', 'newLevel'); ?>--</option>
				       * <?php if(is_true_array($prop->possibleValues)){ foreach ($prop->possibleValues as $item){ ?>
				       * <?php if(is_array($_GET['p'][$prop->property_id]) && in_array( $item['value'] , $_GET['p'][$prop->property_id])): ?>
				       * <?php $check = 'selected="selected"'?>
				       * <?php else:?>
				       * <?php $check = ''?>
				       * <?php endif; ?>
				       * <?php if($item['count'] == 0): ?>
				       * <?php $dis = 'disabled="disabled"'?>
				       * <?php else:?>
				       * <?php $dis = ""?>
				       * <?php endif; ?>
				       * <option <?php if(isset($dis)){ echo $dis; } ?> id="p_<?php echo $prop->property_id?>_<?php echo $item['id'] ?>" value='<?php echo $item['value'] ?>' <?php if(isset($check)){ echo $check; } ?>><?php echo $item['value'] ?> (<?php echo $item['count'] ?>)</option>
				       * <?php }} ?>
				       * </select>
				       * </div>
				       * <?php endif; ?>
				       * </div>
				       * </div>
				       * <?php if($condTypeProperty): ?><div class="preloader"></div><?php endif; ?>
				       * <?php endif; ?>
				       * <?php }} ?>
				       * <?php endif; ?>
				       * </div>
				       * <?php
				       */

				?>
<input disabled="disabled" type="hidden" name="requestUri"
		value="<?php echo site_url($CI->uri->uri_string())?>" />
<?php $mabilis_ttl=1411131446; $mabilis_last_modified=1410788115; ///var/www/avto-era.com.ua/templates/newLevel/smart_filter/filter.tpl ?>