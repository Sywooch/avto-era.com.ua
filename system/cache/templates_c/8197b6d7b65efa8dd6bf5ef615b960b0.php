<?php $widget = $widget != false && $widget != NULL?>
<?php $default = $defaultItem != false && $defaultItem != NULL?>
<?php $wishlist = $wishlist != false && $wishlist != NULL?>
<?php $compare = $compare != false && $compare != NULL?>
<?php $codeArticle = $codeArticle != false && $codeArticle != NULL?>
<?php $defaultItem = $defaultItem != false && $defaultItem != NULL?>
<?php $condlimit = $limit != false && $limit != NULL?>

<?php if(is_true_array($products)){ foreach ($products as $key => $p){ ?>
    <?php if($key >= $limit && $condlimit): ?>
        <?php break?>
    <?php endif; ?>
    <?php $Comments = $CI->load->module('comments')->init($p)?>
<li
	class="clearfix <?php if($p->firstVariant->getStock() == 0): ?>not-avail<?php endif; ?>"
	data-pos="top">
	<!-- Start. Photo & Name product --> <a
	href="<?php echo shop_url ('product/' . $p->getUrl()); ?>"
	class="frame-photo-title"
	title="<?php echo ShopCore::encode($p->getName())?>"> <span
		class="d_b m-b_10"> <span class="title"><?php echo ShopCore::encode($p->getName())?></span>
	</span> <span class="photo-block"> <span class="helper"></span>
                <?php $photo = $p->firstVariant->getMediumPhoto()?>
                <img data-original="<?php echo $photo?>"
			src="<?php if(isset($THEME)){ echo $THEME; } ?>images/blank.gif"
			alt="<?php echo ShopCore::encode($p->firstVariant->getName())?>"
			class="vimg lazy" />
                <?php $discount = 0?>
                <?php if($p->hasDiscounts()): ?>
                    <?php $discount = $p->firstVariant->getvirtual('numDiscount') / $p->firstVariant->toCurrency('origprice') * 100?>
                <?php endif; ?>
                <?php echo promoLabel ($p->getAction(), $p->getHot(), $p->getHit(), $discount); ?>
            </span>
</a> <!-- End. Photo & Name product -->
	<div class="description">
		<!-- Start. article & variant name & brand name -->
            <?php if($codeArticle): ?>
                <div class="frame-variant-name-code">
                    <?php $hasCode = $p->firstVariant->getNumber() == ''?>
                    <span class="frame-variant-code"
				<?php if($hasCode): ?> style="display: none;" <?php endif; ?>><span
				class="text-number"></span>: <span class="code">
                            <?php if(!$hasCode): ?>
                                <?php echo trim ($p->firstVariant->getNumber()); ?>
                            <?php endif; ?>
                        </span> </span>
                    <?php $hasVariant = $p->firstVariant->getName() == ''?>
                    <span class="frame-variant-name"
				<?php if($hasVariant): ?> style="display: none;" <?php endif; ?>><span
				class="text-variant"></span>: <span class="code">
                            <?php if(!$hasVariant): ?>
                                <?php echo trim ($p->firstVariant->getName()); ?>
                            <?php endif; ?>
                        </span> </span>
		</div>
            <?php endif; ?>
            <!-- End. article & variant name & brand name -->
            <?php if(!$compare && !$defaultItem): ?>
                <div
			class="p_r frame-without-top frame-without-top-prop">
                    <?php if(!$vertical): ?>
                        <?php if($p->enable_comments && intval($Comments[$p->getId()]) !== 0): ?>
                            <div class="frame-star f-s_0">
                                <?php $CI->load->module('star_rating')->show_star_rating($p, false)?>
                                <a
					href="<?php echo shop_url ('product/'.$p->url.'#comment'); ?>"
					class="count-response t-d_n">
                                    <?php echo lang ('Отзывы:','newLevel'); ?>
                                    <?php echo intval ($Comments[$p->getId()]); ?>
                                </a>
			</div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <div class="is-vis-table">
				<!--Start. Description-->
                        <?php if($props = ShopCore::app()->SPropertiesRenderer->renderPropertiesMainArray($p)): ?>
                            <div class="short-desc short-desc-prop">
					<ul class="prop-product">
                                    <?php if($brand = $p->getBrand()): ?>
                                        <?php $brand = $brand->getName()?>
                                        <?php $hasBrand = trim($brand) != ''?>
                                        <?php if($hasBrand): ?>
                                            <li class="brand-item"><span
							class="frame-item-brand"><b><?php echo lang ('Бренд','newLevel'); ?>:</b>
								<span class="code"> <span>
                                                            <?php echo trim($brand)?>
                                                        </span>
							</span> </span></li>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if(strpos($CI->uri->uri_string(),'/category') !== false || strpos($CI->uri->uri_string(),'/brand') !== false || strpos($CI->uri->uri_string(),'/search') !== false): ?>
                                        <?php if(is_true_array($props)){ foreach ($props as $prop){ ?>
                                            <li class="li-table"><span
							class="c_3"><?php echo $prop['Name']; ?>:</span> <?php echo $prop['Value']; ?></li>
                                        <?php }} ?>
                                        <?php if($props = ShopCore::app()->SPropertiesRenderer->renderPropertiesMainArray($p, 0)): ?>
                                            <?php $pcnt = 1?>
                                            <?php if(is_true_array($props)){ foreach ($props as $prop){ ?>
                                                <li class="li-list"
							<?php if($pcnt == 1): ?> style="border-top: none" <?php endif; ?>>
							<span class="c_3"><?php echo $prop['Name']; ?>:</span> <?php echo $prop['Value']; ?>
                                                </li>
                                                <?php $pcnt ++?>
                                            <?php }} ?>
                                        <?php endif; ?>
                                    <?php else:?>
                                        <?php if(is_true_array($props)){ foreach ($props as $prop){ ?>
                                            <li><span class="c_3"><?php echo $prop['Name']; ?>:</span> <?php echo $prop['Value']; ?></li>
                                        <?php }} ?>
                                    <?php endif; ?>
                                </ul>
				</div>
                        <?php endif; ?>
                        <!-- End. Description-->
			</div>
		</div>
            <?php endif; ?>
            <div class="frame-right-list">
			<!-- Start. Prices-->
			<!-- End. Prices-->
                <?php $variants = $p->getProductVariants()?>
                <!-- Start. Check variant-->
                <?php if(!$widget && !$defaultItem && !$compare): ?>
                    <?php if(count($variants) > 1): ?>
                        <div class="check-variant-catalog">
				<div class="lineForm">
					<select
						id="сVariantSwitcher_<?php echo $p->firstVariant->getId()?>"
						name="variant">
                                    <?php if(is_true_array($variants)){ foreach ($variants as $key => $pv){ ?>
                                        <?php if($pv->getName()): ?>
                                            <?php $name = ShopCore::encode($pv->getName())?>
                                        <?php else:?>
                                            <?php $name = ShopCore::encode($p->getName())?>
                                        <?php endif; ?>
                                        <option
							value="<?php echo $pv->getId()?>" title="<?php echo $name?>">
                                            <?php echo $name?>
                                        </option>
                                    <?php }} ?>
                                </select>
				</div>
			</div>
                    <?php endif; ?>
                <?php endif; ?>
                <!-- End. Check variant-->
			<div class="frame-prices f-s_0">
				<!-- Start. Check for discount-->
                    <?php $oldoprice = $p->getOldPrice() && $p->getOldPrice() != 0 && $p->getOldPrice() > $p->firstVariant->toCurrency()?>
                    <?php $hasDiscounts = $p->hasDiscounts()?>
                    <?php if($hasDiscounts): ?>
                        <span class="price-discount"> <span> <span
						class="price priceOrigVariant"><?php echo $p->firstVariant->toCurrency('OrigPrice')?></span>
						<span class="curr"><?php if(isset($CS)){ echo $CS; } ?></span>
				</span>
				</span>
                    <?php endif; ?>
                    <!-- End. Check for discount-->
				<!-- Start. Check old price-->
                    <?php if($oldoprice && !$hasDiscounts): ?>
                        <span class="price-discount"> <span> <span
						class="price priceOrigVariant"><?php echo intval($p->getOldPrice())?></span>
						<span class="curr"><?php if(isset($CS)){ echo $CS; } ?></span>
				</span>
				</span>
                    <?php endif; ?>
                    <!-- End. Check old price-->
			</div>
			<!-- Start. Product price-->
                <?php if($p->firstVariant->toCurrency() > 0): ?>
                    <span class="current-prices f-s_0 v-a_m"> <span
				class="price-new"> <span> <span class="price priceVariant"><?php echo $p->firstVariant->toCurrency()?></span>
						<span class="curr"><?php if(isset($CS)){ echo $CS; } ?></span>
				</span>
			</span>

			</span>
                <?php endif; ?>
                <!-- End. Product price-->
			<div class="funcs-buttons v-a_m">
				<!-- Start. Collect information about Variants, for future processing -->
                    <?php if(is_true_array($variants)){ foreach ($variants as $key => $pv){ ?>
                        <?php if($pv->getStock() > 0): ?>
                            <div
					class="frame-count-buy variant_<?php echo $pv->getId()?> variant"
					<?php if($key != 0): ?> style="display: none" <?php endif; ?>>
                                <?php if(!$widget && !$default): ?>
                                    <div class="frame-count d_n">
						<div class="number"
							data-title="<?php echo lang ('Количество на складе','newLevel'); ?> <?php echo $pv->getstock()?>"
							data-prodid="<?php echo $p->getId()?>"
							data-varid="<?php echo $pv->getId()?>" data-rel="frameplusminus">
							<div class="frame-change-count">
								<div class="btn-plus">
									<button type="button">
										<span class="icon-plus"></span>
									</button>
								</div>
								<div class="btn-minus">
									<button type="button">
										<span class="icon-minus"></span>
									</button>
								</div>
							</div>
							<input type="text" value="1" data-rel="plusminus"
								data-title="<?php echo lang ('Только цифры','newLevel'); ?>"
								data-min="1" data-max="<?php echo $pv->getstock()?>">
						</div>
					</div>
                                <?php endif; ?>
                                <div class="btn-buy buti">
						<button <?php $discount = 0?> <?php if($hasDiscounts): ?>
							<?php $discount = $pv->getvirtual('numDiscount')/$pv->toCurrency()*100?>
							<?php endif; ?> disabled="disabled" class="btnBuy infoBut"
							type="button" data-id="<?php echo $pv->getId()?>"
							data-prodid="<?php echo $p->getId()?>"
							data-varid="<?php echo $pv->getId()?>" data-count="1"
							data-name="<?php echo ShopCore::encode($p->getName())?>"
							data-vname="<?php echo trim(ShopCore::encode($pv->getName()))?>"
							data-maxcount="<?php echo $pv->getstock()?>"
							data-number="<?php echo trim($pv->getNumber())?>"
							data-mediumImage="<?php echo $pv->getMediumPhoto()?>"
							data-img="<?php echo $pv->getSmallPhoto()?>"
							data-url="<?php echo shop_url('product/'.$p->getUrl())?>"
							data-price="<?php echo $pv->toCurrency()?>"
							data-origPrice="<?php if($p->hasDiscounts()): ?><?php echo $pv->toCurrency('OrigPrice')?><?php endif; ?>"
							data-addPrice="<?php if($NextCS != null): ?><?php echo $pv->toCurrency('Price',$NextCSId)?><?php endif; ?>"
							data-prodStatus='<?php echo json_encode (promoLabelBtn($p->getAction(), $p->getHot(), $p->getHit(), $discount)); ?>'>
                                        <?php /*?> <span class="icon_cleaner icon_cleaner_buy"></span> <?php */?>
                                        <span
								class="text-el text-toCart"></span>
						</button>
					</div>
				</div>
                        <?php else:?>
                            <div
					class="btn-not-avail variant_<?php echo $pv->getId()?> variant"
					<?php if($key != 0): ?> style="display: none" <?php endif; ?>>
					<button class="infoBut" type="button" data-drop=".drop-report"
						data-source="/shop/ajax/getNotifyingRequest"
						data-id="<?php echo $pv->getId()?>"
						data-prodid="<?php echo $p->getId()?>"
						data-varid="<?php echo $pv->getId()?>"
						data-url="<?php echo shop_url('product/'.$p->getUrl())?>"
						data-price="<?php echo $pv->toCurrency()?>"
						data-origPrice="<?php if($p->hasDiscounts()): ?><?php echo $pv->toCurrency('OrigPrice')?><?php endif; ?>"
						data-addPrice="<?php if($NextCS != null): ?><?php echo $pv->toCurrency('Price',$NextCSId)?><?php endif; ?>"
						data-name="<?php echo ShopCore::encode($p->getName())?>"
						data-vname="<?php echo trim(ShopCore::encode($pv->getName()))?>"
						data-maxcount="<?php echo $pv->getstock()?>"
						data-number="<?php echo trim($pv->getNumber())?>"
						data-img="<?php echo $pv->getSmallPhoto()?>"
						data-mediumImage="<?php echo $pv->getMediumPhoto()?>">
						<span class="text-el text-notAvail"></span>
					</button>
				</div>
                        <?php endif; ?>
                    <?php }} ?>
                </div>
			<!-- End. Collect information about Variants, for future processing -->
                <?php if(!$widget && !$defaultItem): ?>
                    <div
				class="p_r frame-without-top frame-without-top-wish">
				<!-- Wish List & Compare List buttons -->
				<div class="frame-wish-compare-list no-vis-table">
                            <?php if(!$compare): ?>
                                <div class="frame-btn-comp">
						<!-- Start. Compare List button -->
						<div class="btn-compare">
							<button class="toCompare pointer"
								data-prodid="<?php echo $p->getId()?>" type="button"
								data-title="<?php echo lang ('Добавить к сравнению','newLevel'); ?>"
								data-firtitle="<?php echo lang ('В список сравнений','newLevel'); ?>"
								data-sectitle="<?php echo lang ('В сравнении','newLevel'); ?>"
								data-rel="tooltip">
								<span class="icon_compare"></span> <span
									class="text-el d_l_bl text-toComp"></span>
							</button>
						</div>
						<!-- End. Compare List button -->
					</div>
                            <?php endif; ?>
                            <?php if($wishlist): ?>
                                <!-- Start. Wish list buttons -->
                                <?php if(is_true_array($variants)){ foreach ($variants as $key => $pv){ ?>
                                    <div
						class="frame-btn-wish variant_<?php echo $pv->getId()?> variant d_i-b_"
						<?php if($key != 0): ?> style="display: none" <?php endif; ?>
						data-id="<?php echo $p->getId()?>"
						data-varid="<?php echo $pv->getId()?>">
                                        <?php $CI->load->module('wishlist')->renderWLButton($pv->getId())?>
                                    </div>
                                <?php }} ?>
                                <!-- End. wish list buttons -->
                            <?php endif; ?>
                        </div>
				<!-- End. Wish List & Compare List buttons -->
			</div>
                <?php endif; ?>
                <!-- End. Collect information about Variants, for future processing -->
		</div>
	</div> <!-- Start. Remove buttons if compare-->
        <?php if($compare && !$widget): ?>
            <button type="button" class="icon_times deleteFromCompare"
		onclick="Shop.CompareList.rm(<?php echo  $p->getId()?>, this)"></button>
        <?php endif; ?>
        <!-- End. Remove buttons if compare-->

	<div class="decor-element"></div>
</li>
<?php }} ?>
<script type="text/javascript">
        $('.text-toWish').text( '<?php echo lang ('В закладки','newLevel'); ?>' );
        $('.text-inWish').text( '<?php echo lang ('В закладках','newLevel'); ?>' );
        $('.text-toComp').text( '<?php echo lang ('Добавить к сравнению','newLevel'); ?>' );
        //$('.text-inComp').text('В сравнении');
        $('.text-toCart').text( '<?php echo lang ('в корзину', 'newLevel'); ?>' );
        //$('.text-inCart').text('В корзинe');icon_times_cart
        $('.text-variant').text( '<?php echo lang ('Вариант','newLevel'); ?>' );
        $('.text-number').text( '<?php echo lang ('Артикул','newLevel'); ?>' );
        $('.text-notAvail').text( '<?php echo lang ('Узнать о появлении','newLevel'); ?>' );
</script><?php $mabilis_ttl=1411133400; $mabilis_last_modified=1403818556; //templates/newLevel/new_level/one_product_item.tpl ?>