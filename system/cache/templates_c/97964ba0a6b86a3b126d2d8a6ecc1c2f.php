<?php $topCartCount = ShopCore::app()->SCart->totalItems()?>
<div
	class="btn-bask buti tiny-bask<?php if($topCartCount != 0): ?> pointer<?php endif; ?>">
	<button>
		<span class="frame-icon"> </span> <span class="text-cleaner bask"> <span
			class="empty" <?php if($topCartCount == 0): ?>
			style="display: inline" <?php endif; ?>> <span class="helper"></span>
				<span> <span class="text-el"><?php echo lang ('Корзина пуста','newLevel'); ?></span>
			</span>
		</span> <span class="no-empty" <?php if($topCartCount != 0): ?>
			style="display: inline" <?php endif; ?>> <span class="helper"></span>
				<span> <span class="text-el topCartCount"><?php echo $topCartCount?></span>
					<span class="text-el">&nbsp;</span> <span class="text-el plurProd"><?php echo SStringHelper::Pluralize(ShopCore::app()->SCart->totalItems(), array(lang('товар','newLevel'),lang('товара','newLevel'),lang('товаров','newLevel')))?></span>
			</span>
		</span>
		</span>
	</button>
</div>
<?php $mabilis_ttl=1411133400; $mabilis_last_modified=1403818557; ///var/www/avto-era.com.ua/templates/newLevel/shop/cart_data.tpl ?>