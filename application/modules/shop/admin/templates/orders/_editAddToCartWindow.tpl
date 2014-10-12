<div>
	<form method="post" class="form-horizontal"
		action="/admin/components/run/shop/orders/ajaxEditOrderAddToCart/{echo $order->getId()}"
		id="addToCartForm">
		<div class="control-group">
			<label class="control-label"> {lang('Reference','admin')}: </label>
			<div class="controls">
				<input id="productNumber" type="text" value="" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label"> {lang('Product','admin')}: </label>
			<div class="controls">
				<input id="product_name" type="text" value="" class="required" />
			</div>
			<input id="product_id" type="hidden" value="" name="newProductId" />
		</div>

		<div class="control-group">
			<label class="control-label"> {lang('Variant','admin')}: </label>
			<div class="controls">
				<select id="product_variant_name" class="required"
					name="newVariantId"></select>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label"> {lang('Total','admin')}: </label>
			<div class="controls number">
				<input id="product_quantity" type="text" value="" class="required"
					name="newQuantity" />
			</div>
		</div>

	</form>
</div>