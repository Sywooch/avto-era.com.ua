<script type="text/javascript">
    var curr = '{$CS}';
</script>
<div class="container">
	<section class="mini-layout">
		<div class="frame_title clearfix">
			<div class="pull-left">
				<span class="help-inline"></span> <span class="title w-s_n">{lang('Order
					create','admin')}</span>
			</div>
			<div class="pull-right">
				<span class="help-inline"></span>
				<div class="d-i_b">
					<a href="{$ADMIN_URL}orders" class="pjax t-d_n m-r_15"><span
						class="f-s_14">←</span> <span class="t-d_u">{lang('Back','admin')}</span></a>
					<button type="button"
						class="btn btn-small btn-success action_on formSubmit"
						data-action="edit" data-form="#add_order_form" data-submit>
						<i class="icon-plus-sign icon-white"></i>{lang('Save','admin')}
					</button>
					<button type="button" class="btn btn-small action_on formSubmit"
						data-action="close" data-form="#add_order_form">
						<i class="icon-check"></i>{lang('Save and exit','admin')}
					</button>
				</div>
			</div>
		</div>

		<div class="clearfix">
			<div class="btn-group myTab m-t_20 pull-left"
				data-toggle="buttons-radio">
				<a href="#tab1" class="btn btn-small">{lang('Product','admin')}</a>
				<a href="#tab2" class="btn btn-small">{lang('User','admin')}</a> <a
					href="#tab3" class="btn btn-small">{lang('Make order','admin')}</a>
			</div>
		</div>

		<form method="post" action="{$ADMIN_URL}orders/create"
			class="form-horizontal" id="add_order_form">

			<div class="tab-content content_big_td">
				<!--                Tab 1 - PRODUCTS-->
				<div class="tab-pane active" id="tab1">
					<div class="row-fluid">
						<table
							class="table table-striped table-bordered table-hover table-condensed"
							id="addProduct">
							<thead>
								<th>{lang('Find a product','admin')}</th>
								<th colspan="2"></th>
							</thead>
							<tbody>
								<tr style="height: 80px;">
									<td>
										<div>
											<label>{lang('Article / Name / ID','admin')}</label> <input
												id="productNameForOrders" type="text" value=""
												class="ui-autocomplete-input" autocomplete="off"
												role="textbox" aria-autocomplete="list" aria-haspopup="true">
										</div>
									</td>
									<td colspan="2">
										<div id="variantInfoBlock"
											style="display: none; padding-top: 6px;" class="row-fluid">
											<div class="span2" style="padding-left: 30px;">
												<img id="imageSrc" class="img-polaroid" style="width: 55px;">
											</div>
											<div class="span3 v-a_t">
												<span id="productText"></span> <span id="productStock"></span>
											</div>
											<div class="span4 v-a_t">
												<button id="addVariantToCart" type="button"
													class="btn btn-small" style="margin-top: 1px;"
													data-stock="" data-price="" data-variantname=""
													data-productid="" data-productname=""
													data-productcurrency="">{lang('Add to
													Cart','admin')}</button>
											</div>

										</div>
									</td>
								</tr>
								<tr>
									<td><label><b>{lang('Category','admin')}:</b></label> <select
										multiple="multiple" id="categoryForOrders"
										style="height: 250px !important;"> {foreach
											$categories as $category}
											<option {if $category->getLevel() ==
												0}style="font-weight: bold;"{/if} value="{echo
												$category->getId()}">{str_repeat('-',$category->getLevel())}
												{echo ShopCore::encode($category->getName())}</option> {/foreach}
									</select></td>
									<td><label><b>{lang('Product','admin')}:</b></label> <select
										multiple="multiple" id="productsForOrders"
										style="height: 250px !important;"></select></td>
									<td><label><b>{lang('Variant','admin')}:</b></label> <select
										multiple="multiple" id="variantsForOrders"
										style="height: 250px !important;"></select></td>
								</tr>
							</tbody>
						</table>
						<table
							class="table table-striped table-bordered table-hover table-condensed"
							id="productsInCart">
							<thead>
								<tr>
									<th class="span4">{lang('Product','admin')}</th>
									<th class="span4">{lang('Variant','admin')}</th>
									<th class="span3">{lang('Price','admin')}</th>
									<th class="span2">{lang('Total','admin')}</th>
									<th class="span3">{lang('Total price','admin')}</th>
									<th class="span1"></th>
								</tr>
							</thead>
							<tbody id="insertHere">

							</tbody>
							<tfoot>
								<tr>
									<td></td>
									<td colspan="2" style="border-left: 0 !important;"></td>
									<td colspan="2" class="t-a_r"
										style="border-left: 0 !important;"><span class="gen_sum">{lang('Total','admin')}:
											<b> <span id="totalCartSum"> 0 </span> <span
												class="productCartPriceSymbol">{$CS}</span>
										</b>
									</span></td>

								</tr>
							</tfoot>
						</table>
					</div>
				</div>
				<!--                    TaB 2 - USERS-->
				<div class="tab-pane " id="tab2">
					<div class="row-fluid">
						<table
							class="table table-striped table-bordered table-hover table-condensed"
							id="addProduct">
							<thead>
								<th class="span1">{lang('User','admin')}</th>
							</thead>
							<tbody>
								<tr>
									<td>
										<div class="accordion">
											<div class="accordion-group">
												<div class="accordion-heading">
													<a id="collapsed" class="accordion-toggle collapsed"
														data-toggle="collapse" data-parent="#accordion2"
														href="#collapseOne"> {lang('Create new','admin')} </a>
												</div>
												<div id="collapseOne" class="accordion-body collapse">
													<div class="accordion-inner">
														<div class="row-fluid">
															<div class="span4">
																<label><b>{lang('Create new user','admin')}:</b></label>
																<label><span class="required">*</span>
																	{lang('Full Name','admin')} :</label> <input
																	id="createUserName" type="text" value=""
																	class="input-small"> <label><span
																	class="required">*</span> E-mail :</label> <input
																	id="createUserEmail" type="text" value=""
																	class="input-small"> <label>{lang('Phone','admin')}
																	:</label> <input id="createUserPhone" type="text" value=""
																	class="input-small"> <label>{lang('Address','admin')}:</label>
																<input id="createUserAddress" type="text" value=""
																	class="input-small">
															</div>
														</div>
														<div class="row-fluid center"
															style="padding: 10px 0 10px 75px;">
															<div class="span4">
																<button type="button" class="btn btn-small btn-primary"
																	id="createUserButton">
																	<i class="icon-ok icon-white"></i>{lang('Create','admin')}
																</button>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="accordion-group">
												<div class="accordion-heading">
													<a class="accordion-toggle collapsed"
														data-toggle="collapse" data-parent="#accordion2"
														href="#collapseTwo"> {lang('Search user','admin')} </a>
												</div>
												<div id="collapseTwo" class="accordion-body collapse in">
													<div class="accordion-inner">
														<div class="row-fluid">
															<div class="span4" style="padding-bottom: 15px;">
																<label><b>{lang('Search','admin')}:</b></label> <label>
																	{lang('ID / Full Name / Email','admin')}</label> <input
																	id="usersForOrders" type="text" value=""
																	class="ui-autocomplete-input" autocomplete="off"
																	role="textbox" aria-autocomplete="list"
																	aria-haspopup="true">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
						<table
							class="table table-striped table-bordered table-hover table-condensed">
							<thead>
								<tr>
									<th class="span1">{lang('ID','admin')}</th>
									<th class="span5">{lang('E-mail','admin')}</th>
									<th class="span5">{lang('User','admin')}</th>
									<th class="span5">{lang('Address','admin')}</th>
									<th class="span2">{lang('Telephone','admin')}</th>
								</tr>
							</thead>
							<tbody>
								<tr class="simple_tr">
									<td><a href="" class="pjax" id="userIdforOrder"></a></td>
									<td><span id="userEmailforOrder"></span></td>
									<td><a href="" class="pjax"
										data-title="{lang('Editing by','admin')}" data-rel="tooltip"
										id="userNameforOrder"></a></td>
									<td id="userAddressforOrder"></td>
									<td id="userPhoneforOrder"></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<!--                    Tab 3 - Order Info-->
				<div class="tab-pane " id="tab3">
					<table
						class="table table-striped table-bordered table-hover table-condensed"
						id="addProduct">
						<thead>
							<th class="span1">{lang('Order information','admin')}</th>
						</thead>
						<tbody>
							<tr>
								<td>
									<div class="inside_padd">
										<div class="row-fluid">
											<div class="span6">
												<label><b>{lang('User','admin')}:</b></label> <label>{lang('Full
													Name','admin')}</label> <input id="shopOrdersUserFullName"
													readonly="readonly" type="text"
													name="shop_orders[user_full_name]" value=""> <label>{lang('Email','admin')}</label>
												<input id="shopOrdersUserEmail" readonly="readonly"
													type="text" name="shop_orders[user_email]" value="">
												<label>{lang('Phone','admin')}</label> <input
													id="shopOrdersUserPhone" type="text"
													name="shop_orders[user_phone]" value=""> <label>{lang('Address','admin')}</label>
												<input id="shopOrdersUserAddress" type="text"
													name="shop_orders[user_delivery_to]" value="">

												<div class="number">
													<label>{lang('Products amount','admin')}:</label> <input
														id="shopOrdersTotalPrice" type="text"
														name="shop_orders[total_price]" value=""
														style="width: 250px !important;"> {$CS}
												</div>
												<div class="row-fluid" style="padding: 10px 0 10px 0;">
													<button type="button" class="btn btn-success"
														id="getAllOrderInfoButton">
														<i class="icon-refresh icon-white"></i>{lang('Update','admin')}
													</button>
												</div>
												<!--Hidden fields-->
												<input id="shopOrdersUserid" type="hidden"
													name="shop_orders[user_id]" value=""> <input
													id="shopOrdersGiftCertKey" type="hidden"
													name="shop_orders[gift_cert_key]" value=""> <input
													id="shopOrdersGiftCertPrice" type="hidden"
													name="shop_orders[gift_cert_price]" value="">

											</div>
											<div class="span6">
												<label><b>{lang('Order information','admin')}:</b></label> <label>{lang('Delivery
													method','admin')}:</label> <select id="shopOrdersdeliveryMethod"
													type="text" name="shop_orders[delivery_method]" value="">
													<option value="0">{lang('Not selected','admin')}</option>
													{foreach $deliveryMethods as $dm}
													<option value="{echo $dm->getId()}">{echo
														$dm->getName()}</option> {/foreach}
												</select> <label>{lang('Payment method','admin')}:</label> <select
													id="shopOrdersPaymentMethod" type="text"
													name="shop_orders[payment_method]" value="">
													<option value="0">{lang('Not selected','admin')}</option>
												</select> <label style="padding-top: 27px;"><b>{lang('Certificate','admin')}:</b></label>
												<label>{lang('Enter the key','admin')}:</label> <input
													id="shopOrdersCheckGiftCert" type="text" value=""
													style="width: 150px !important;">
												<button class="btn btn-small" type="button"
													id="checkOrderGiftCert">
													<i class="icon-refresh"></i>
												</button>
												<span id="currentGiftCertInfo" style="display: none;"><span
													id="giftPrice"></span><span class="removeGiftCert"
													style="cursor: pointer;"><i class="icon-trash"
														style="margin-left: 12px;"></i></span></span> <label
													style="padding-top: 10px;"><b>{lang('Discount','admin')}:</b></label>
												<div class="number">
													<label>{lang('Current discount','admin')}:</label> <input
														id="shopOrdersComulativ" type="text"
														name="shop_orders[comulativ]" value=""
														style="width: 150px !important;"> %
												</div>
											</div>
										</div>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</form>
		<div style="clear: both;"></div>
	</section>
</div>

<!--Start. Add product block-->
<table style='display: none'>
	<tr class="addNewProductBlock">
		<td><span class="productCartName"></span> <input
			class="inputProductId" type="hidden"
			name="shop_orders_products[product_id][]" value=""> <input
			class="inputProductName" type="hidden"
			name="shop_orders_products[product_name][]" value=""></td>
		<td><input class="inputVariantId" type="hidden"
			name="shop_orders_products[variant_id][]" value=""> <input
			class="inputVariantName" type="hidden"
			name="shop_orders_products[variant_name][]" value=""> <span
			class="variantCartName"></span></td>
		<td><span class="pull-right"> <input class="inputPrice"
				type="hidden" name="shop_orders_products[price][]" value="">
				<span class="productCartPrice"></span> <span
				class="productCartPriceSymbol"></span>
		</span></td>
		<td>
			<div class="p_r o_h frame_price number">
				<input onkeyup="orders.updateQuantityAdmin(this)" type="text"
					name="shop_orders_products[quantity][]" value="1"
					class="js_price productCartQuantity inputQuantity"
					data-placement="top"
					data-original-title="{lang('Digits only','admin')}">
			</div>
		</td>
		<td><span class="productCartTotal"></span> <span
			class="productCartPriceSymbol"></span></td>
		<td><button class="btn my_btn_s btn-small" type="button"
				onclick="orders.deleteCartProduct(this)">
				<i class="icon-trash"></i>
			</button></td>
	</tr>
</table>
<!--End. Add product block-->
<!-- php vars to js -->
<script type="text/javascript">
    var pricePrecision = parseInt('{echo ShopCore::app()->SSettings->pricePrecision}');
    var checkProdStock = "{echo ShopCore::app()->SSettings->ordersCheckStocks}";
</script>
