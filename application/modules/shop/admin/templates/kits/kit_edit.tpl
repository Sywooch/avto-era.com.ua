<section class="mini-layout">
	<div class="frame_title clearfix">
		<div class="pull-left">
			<span class="help-inline"></span> <span class="title">{lang('Edit
				product kit','admin')}: {echo $model->getId()}</span>
		</div>
		<div class="pull-right">
			<div class="d-i_b">
				<a href="{$ADMIN_URL}kits/index" class="t-d_n m-r_15 pjax"><span
					class="f-s_14">←</span> <span class="t-d_u">{lang('Back','admin')}</span></a>
				<button type="button" class="btn btn-small btn-primary formSubmit"
					data-form="#kit_edit_form" data-submit>
					<i class="icon-ok"></i>{lang('Save','admin')}
				</button>
				<button type="button" class="btn btn-small formSubmit"
					data-form="#kit_edit_form" data-action="tomain">
					<i class="icon-check"></i>{lang('Save and go back','admin')}
				</button>
			</div>
		</div>
	</div>
	<div class="tab-content">
		<div class="tab-pane active" id="modules">
			<div class="row-fluid">
				<form method="post"
					action="{$ADMIN_URL}kits/kit_edit/{echo $model->getId()}"
					class="form-horizontal" id="kit_edit_form">
					<input type="hidden" name="Locale" value="{echo $locale}" />
					<table
						class="table table-striped table-bordered table-hover table-condensed content_big_td">
						<thead>
							<tr>
								<th colspan="6">{lang('Properties','admin')}</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="6">
									<div class="inside_padd span9">
										<div class="control-group">
											<label class="control-label" for="kitMainProductName">{lang('Main
												product','admin')}:</label>
											<div class="controls">
												<input type="text" name="Name"
													value="{echo $model->getMainProduct()->getName()}"
													id="kitMainProductName"
													{if !$canChangeMainProduct}disabled="disabled" {/if}/>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="MainProductHidden">ID
												{lang('main product','admin')}:</label>
											<div class="controls number">
												<input type="text" id="MainProductHidden"
													readonly="readonly" name="MainProductId"
													value="{echo $model->getMainProduct()->getId()}"
													data-placement="left"
													data-original-title="{lang('numbers only','admin')}">
											</div>
										</div>
										<div class="control-group">
											<div class="control-label">{lang('Added
												products','admin')}:</div>
											<div class="controls o_h" id="forAttached">
												<div>
													<div class="d-i_b number v-a_b">
														<span class="help-inline d_b">ID</span> <input type="text"
															id="AttachedProductsID" name="" value=""
															disabled="disabled" class="input-mini" />
													</div>
													<div class="d-i_b v-a_b">
														<span class="help-inline d_b">{lang('Name','admin')}</span>
														<input type="text" id="AttachedProducts" value=""
															class="input-xxlarge" />
													</div>
													<div class="d-i_b number v-a_b">
														<span class="help-inline d_b">{lang('Discount','admin')}
															%</span> <input type="text" id="mainDisc" name="Discount"
															value="0" class="input-mini" data-placement="left"
															data-original-title="{lang('numbers only','admin')}" />
													</div>
													<button class="btn btn-small btn-danger" type="button">
														<i class="icon-trash icon-white" data-rel="tooltip"
															data-title="{lang('Delete','admin')}"></i>
													</button>
												</div>
												{foreach $model->getShopKitProducts() as $shopKitProduct}
												{$ap = $shopKitProduct->getSProducts()}
												<div id="tpm_row{echo $ap->getId()}" class="m-t_10">
													<div class="d-i_b number v-a_b">
														<span class="help-inline d_b">ID</span> <input type="text"
															name="AttachedProductsIds[]" readonly="readonly"
															value="{echo $ap->getId()}" data-placement="left"
															data-original-title="{lang('numbers only','admin')}"
															class="input-mini" />
													</div>
													<div class="d-i_b v-a_b">
														<span class="help-inline d_b">{lang('Name','admin')}</span>
														<input type="text"
															value="{echo ShopCore::encode($ap->getName())}"
															readonly="readonly" class="input-xxlarge" />
													</div>
													<div class="d-i_b number v-a_b">
														<span class="help-inline d_b">{lang('Discount','admin')}
															%</span> <input type="text" name="Discounts[]"
															value="{echo $shopKitProduct->getDiscount()}"
															data-placement="left"
															data-original-title="{lang('numbers only','admin')}"
															class="input-mini" />
													</div>
													<a class="btn del_tmp_row btn-small btn-danger"
														data-kid="{echo $ap->getId()}" data-rel="tooltip"
														data-title="{lang('Delete','admin')}"><i
														class="icon-trash icon-white"></i></a>
												</div>
												{/foreach}
											</div>
										</div>
										<div class="control-group">
											<div class="control-label"></div>
											<div class="controls">
												<span class="frame_label no_connection"> <span
													class="niceCheck b_n"> <input type="checkbox"
														name="Active" id="MainProductHidden" value="1" {if $model->getActive()
														== true}checked="checked"{/if} />
												</span> {lang('Active','admin')}
												</span>
											</div>
										</div>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
					{form_csrf()}
				</form>
			</div>
		</div>
		<div class="tab-pane"></div>
	</div>
</section>