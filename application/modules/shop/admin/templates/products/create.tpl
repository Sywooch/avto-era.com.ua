<section class="mini-layout">
	<div class="frame_title clearfix">
		<div class="pull-left">
			<span class="help-inline"></span> <span class="title">{lang('Product
				creation','admin')}</span>
		</div>
		<div class="pull-right">
			<div class="d-i_b">
				<!-- $_SESSION['ref_url'] is session variable to save filter results to go back to it -->
				<a href="{$ADMIN_URL}search/index{$_SESSION['ref_url']}"
					class="t-d_n m-r_15 pjax"><span class="f-s_14">←</span> <span
					class="t-d_u">{lang('Back','admin')}</span></a>
				<button type="button"
					class="btn btn-small btn-primary action_on formSubmit"
					data-form="#image_upload_form">
					<i class="icon-ok"></i>{lang('Save','admin')}
				</button>
				<button type="button" class="btn btn-small action_on formSubmit"
					data-form="#image_upload_form" data-action="close">
					<i class="icon-check"></i>{lang('Save and exit','admin')}
				</button>
			</div>
		</div>
	</div>
	<form action="{$ADMIN_URL}products/create" method="post"
		enctype="multipart/form-data" id="image_upload_form">
		<div class="content_big_td">
			<div class="clearfix">
				<div class="btn-group myTab m-t_10 pull-left"
					data-toggle="buttons-radio">
					<a href="#parameters" class="btn btn-small active">{lang('Product','admin')}</a>
					<!--<a href="#parameters_article" class="btn btn-small">{lang('Properties','admin')}</a>-->
					<!--<a href="#additionalPics" class="btn btn-small">{lang('Images','admin')}</a>
                    <a href="#kits" class="btn btn-small">{lang('Kits','admin')}</a>-->
					{if $moduleAdditions} <a href="#modules_additions"
						class="btn btn-small">{lang('Modules additions', 'admin')}</a>
					{/if}
				</div>
			</div>
			<div class="tab-content">
				<div class="tab-pane active" id="parameters">
					<table
						class="table table-striped table-bordered table-hover table-condensed">
						<thead>
							<tr>
								<th colspan="6">{lang('Information','admin')}</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="6">
									<div class="inside_padd">
										<div class="form-horizontal">
											<div data-frame>
												<div class="control-group span9 p-r_25">
													<label class="control-label" for="Name">{echo
														$translatable} {lang('Product name','admin')}:</label>
													<div class="controls">
														<input type="text" id="Name" name="Name"
															value="{echo ShopCore::encode($model->getName())}">
													</div>
												</div>
												<div class="span3">
													<input type="hidden" name="Active" value="1">
												</div>
												<div class="control-group m-t_10">
													<label class="control-label">{lang('Status','admin')}:</label>
													<div class="controls">
														<button type="button"
															class="btn btn-small disabled setHit" data-rel="tooltip"
															data-placement="top"
															data-original-title="{lang('hit','admin')}">
															<i class="icon-fire"></i> {lang('Hit','admin')}
														</button>
														<button type="button"
															class="btn btn-small disabled setHot" data-rel="tooltip"
															data-placement="top"
															data-original-title="{lang('novelty','admin')}">
															<i class="icon-gift"></i> {lang('Novelty','admin')}
														</button>
														<button type="button"
															class="btn btn-small disabled setAction"
															data-rel="tooltip" data-placement="top"
															data-original-title="{lang('promotion','admin')}">
															<i class="icon-star"></i> {lang('Promotion','admin')}
														</button>
													</div>
												</div>
												<div class="variantsProduct">
													<table class="table table-bordered t-l_a">
														<thead>
															<tr>
																<th class="span3 vName" style="display: none;">{echo
																	$translatable_w} {lang('Product variant name','admin')}
																</th>
																<th class="span3 vNameH"></th>
																<th class="span2">{echo
																	ShopCore::encode($model->getLabel('Price'))} <span
																	class="required">*</span>
																</th> {if count($currencies)>0}
																<th class="span2">{lang('Currency','admin')}</th> {/if}
																<th class="span2">{echo
																	ShopCore::encode($model->getLabel('Number'))}</th>
																<th class="span2">{echo
																	ShopCore::encode($model->getLabel('Stock'))}</th>
																<th class="span2">{lang('Photo','admin')}</th>
															</tr>
															<tr class="head_body">
															</tr>
														</thead>
														<tbody class="sortable save_positions_variant"
															data-url="/admin/components/run/shop/search/save_positions_variant"
															id="variantHolder">
															<tr id="ProductVariantRow_0">
																<td class="vName" style="display: none;"><input
																	type="hidden" name="variants[RandomId][]"
																	class="random_id" value="45456465" /> <input
																	type="text" name="variants[Name][]" value="" /></td>
																<td class="vNameH"></td>
																<td class="number"><input type="text"
																	name="variants[PriceInMain][]" value=""
																	class="required" /></td> {if count($currencies)>0}
																<td><select name="variants[currency][]">
																		{foreach $currencies as $c}
																		<option value="{echo $c->getId()}" {if $c->getMain()}selected="selected"{/if}>{echo
																			$c->getCode()}</option> {/foreach}
																</select></td> {/if}
																<td><input type="text" name="variants[Number][]"
																	value="" class="textbox_short" /></td>
																<td class="number"><input type="text"
																	name="variants[Stock][]" value="1"
																	class="textbox_short" /></td>
																<td class="variantImage">
																	<div class="control-group">
																		<label class="control-label" style="display: none;">
																			<span class="btn btn-small p_r" data-url="file">
																				<i class="icon-camera"></i> <input type="file"
																				name="image0" title="{lang('Main image','admin')}"
																				accept="image/jpeg,image/png,image/gif" /> <input
																				type="hidden" name="changeImage[]" value=""
																				class="changeImage" />
																		</span>
																		</label>
																		<div class="controls photo_album">
																			<div class="fon"></div>
																			<div class="btn-group f-s_0">
																				<button type="button" class="btn change_image"
																					data-rel="tooltip"
																					data-title="{lang('Edit','admin')}"
																					data-original-title="">
																					<i class="icon-edit"></i>
																				</button>
																				<button type="button" class="btn images_modal"
																					data-rel="tooltip"
																					data-title="{lang('Load from internet','admin')}"
																					data-original-title="">
																					<i class="icon-search"></i>
																				</button>
																			</div>
																			<img src="{$THEME}images/select-picture.png"
																				class="img-polaroid " style="width: 50px;">
																		</div>
																	</div>

																</td>
															</tr>
														</tbody>
														<tfoot>
															<tr>
																<td colspan="8">
																	<div class="clearfix">
																		<button type="button" onclick="vName()"
																			class="pull-right btn btn-small btn-success"
																			id="addVariant">
																			<i class="icon-plus-sign icon-white"></i>{lang('Add a
																			variant','admin')}
																		</button>
																	</div>
																</td>
															</tr>
														</tfoot>
													</table>
												</div>
												<button class="btn my_btn_s btn-small d_n" type="button"
													data-remove="example" data-rel="tooltip"
													data-title="{lang('Delete','admin')}">
													<i class="icon-remove"></i>
												</button>
											</div>
											<div class="row-fluid">
												<div class="span9">
													<div class="control-group">
														<label class="control-label" for="inputParent">{lang('Brand
															name','admin')}:</label>
														<div class="controls">
															<select id="inputParent" name="BrandId">
																<option value="">{lang('Not
																	specified','admin')}</option> {foreach
																SBrandsQuery::create()->find() as $brand}
																<option {if $model->getBrandId() ==
																	$brand->getId()} selected="selected" {/if} value="{echo
																	$brand->getId()}">{echo
																	ShopCore::encode($brand->getName())}</option> {/foreach}
															</select>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label" for="comment">{lang('Category','admin')}:</label>
														<div class="controls">
															<select name="CategoryId" id="comment"> {foreach
																$categories as $category}
																<option {if $category->getLevel() ==
																	0}style="font-weight: bold;"{/if} value="{echo
																	$category->getId()}">{str_repeat('-',$category->getLevel())}{echo
																	ShopCore::encode($category->getName())}</option> {/foreach}
															</select>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label" for="iddCategory">{lang('Additional
															categories', 'admin')}:</label>
														<div class="controls">
															<select name="Categories[]" multiple="multiple"
																id="iddCategory"> {foreach $categories as
																$category}
																<option {if $category->getLevel() ==
																	0}style="font-weight: bold;"{/if} value="{echo
																	$category->getId()}">{str_repeat('-',$category->getLevel())}
																	{echo ShopCore::encode($category->getName())}</option>
																{/foreach}
															</select>
														</div>
													</div>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="ShortDescriptions">{echo
													$translatable} {lang('Short description','admin')}:</label>
												<div class="controls">
													<textarea class="elRTE" id="ShortDescriptions"
														name="ShortDescription"></textarea>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="FullDescriptions">{echo
													$translatable} {lang('Full description','admin')}:</label>
												<div class="controls">
													<textarea class="elRTE" id="FullDescriptions"
														name="FullDescription"></textarea>
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
								<th colspan="6">{lang('Settings','admin')}</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="6">
									<div class="inside_padd span9">
										<div class="form-horizontal">
											<div class="row-fluid">
												<div class="control-group">
													<label class="control-label" for="pName">{lang('Warehouses','admin')}:
														<button type="button" data-clone="wares"
															class="btn btn-small">
															<i class="icon-plus"></i>
														</button>
														<br />
													</label>
													<div class="controls">
														<div id="warehouses_container">
															<div>
																{foreach $model->getSWarehouseDatas() as $w_data}
																<div id="warehouse_line">
																	<select name="warehouses[]" class="input-medium">
																		<option value="">---</option> {foreach $warehouses as
																		$w}
																		<option {if $w->getId() ==
																			$w_data->getWarehouseId()}selected{/if} value="{echo
																			$w->getId()}">{echo encode($w->getName())}</option> {/foreach}
																	</select> <input type="text" name="warehouses_c[]" value=""
																		class="input-medium" /> <a data-del="wares"
																		class="btn btn-small"><i class="icon-trash"></i></a>
																</div>
																{/foreach}
															</div>
															<div class="warehouses_container"></div>
														</div>
													</div>
												</div>
												<div class="control-group">
													<label class="control-label" for="comments">{lang('Comment
														permission','admin')}:</label>
													<div class="controls">
														<select id="comments" class="input-mini">
															<option {if $model->getEnableComments()}
																selected {/if} value="1">{lang('Yes','admin')}</option>
															<option {if !$model->getEnableComments()}
																selected {/if}value="0">{lang('No','admin')}</option>
														</select>
													</div>
												</div>
												<div class="control-group">
													<label class="control-label" for="dCreate">{lang('Date
														of creation','admin')}:</label>
													<div class="controls">
														<div class="o_h">
															<input type="text" id="dCreate" name="Created"
																value="{echo date('Y-m-d', time())}"
																class="datepicker input-medium" />
														</div>
													</div>
												</div>
												<div class="control-group">
													<label class="control-label" for="oldP">{lang('Old
														price','admin')}:</label>
													<div class="controls number">
														<div class="o_h">
															<input type="text" id="oldP" value="" />
														</div>
													</div>
												</div>
												<div class="control-group">
													<label class="control-label" for="RelatedProducts">{lang('Related
														products','admin')}:</label>
													<div class="controls">
														<div class="o_h">
															<input type="text" id="RelatedProducts" />
															<div id="relatedProductsNames" style="margin-top: 10px;">
																{foreach $model->getRelatedProductsModels() as
																$shopKitProduct}
																<div id="tpm_row{echo $shopKitProduct->getId()}">
																	<span style="width: 70%; margin-left: 1%;"
																		class="pull-left"> <input type="text" value="" />
																		<input type="hidden" name="RelatedProducts[]" value="">
																	</span> <span style="width: 8%; margin-left: 1%;"
																		class="pull-left">
																		<button class="btn btn-small del_tmp_row"
																			data-rel="tooltip"
																			data-title="{lang('Delete','admin')}"
																			data-kid="{echo $shopKitProduct->getId()}">
																			<i class="icon-trash"></i>
																		</button>
																	</span>
																</div>
																{/foreach}
															</div>
														</div>
													</div>
												</div>
												<div class="control-group">
													<label class="control-label" for="templateGH">{lang('Main
														template','admin')}:</label>
													<div class="controls">
														<div class="o_h">
															<input type="text" id="templateGH" name="tpl"
																value="{echo ShopCore::encode($model->tpl)}" />
														</div>
														<p class="help-block">{lang('Product main template. By
															default product.tpl','admin')}</p>
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
								<th colspan="6">{lang('Meta data','admin')}</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="6">
									<div class="inside_padd span9">
										<div class="form-horizontal">
											<div class="row-fluid">
												<div class="control-group">
													<label class="control-label" for="Url">URL:</label>
													<div class="controls">
														<div class="group_icon pull-right">
															<button type="button" class="btn btn-small"
																id="translateProductUrl">
																<i class="icon-refresh"></i>&nbsp;&nbsp;{lang('Autoselection','admin')}
															</button>
														</div>
														<span class="o_h d_b"> <input type="text"
															name="Url" id="Url" value="" />
														</span>
													</div>
												</div>
												<div class="control-group">
													<label class="control-label" for="Mtag">{echo
														$translatable} {lang('Meta Title','admin')}</label>
													<div class="controls">
														<input type="text" name="MetaTitle" id="Mtag" value="" />
													</div>
												</div>
												<!--<div class="control-group">
                                                    <label class="control-label" for="mDesc">{echo $translatable} {lang('Meta Description','admin')}:</label>
                                                    <div class="controls">
                                                        <input type="text" name="MetaDescription" id="mDesc" value=""/>
                                                    </div>
                                                </div>-->
												<div class="control-group">
													<label class="control-label" for="mKey">{echo
														$translatable} {lang('Meta Keywords','admin')}:</label>
													<div class="controls">
														<input type="text" name="MetaKeywords" id="mKey" value="" />
													</div>
												</div>
											</div>
										</div>
									</div>
								</td>
							</tr>
						</tbody>
					</table>

				</div>
				{include_tpl('../modules_additions')}
			</div>
		</div>
	</form>
</section>
<div style="display: none;">
	<div class="warehouse_line">
		<select name="warehouses[]" class="input-medium">
			<option value="">---</option> {foreach $warehouses as $w}
			<option value="{echo $w->getId()}">{echo
				encode($w->getName())}</option> {/foreach}
		</select> <input type="text" name="warehouses_c[]" value=""
			class="textbox_short input-medium" /> <a data-del="wares"
			class="btn btn-small"><i class="icon-trash"></i></a>
	</div>
</div>
<!-- ---------------------------------------------------Блок для додавання варыантів-------------------------------------- -->
<div style="display: none;" class="variantRowSample">
	<table>
		<tbody>
			<tr id="ProductVariantRow_">
				<td>
					<button class="btn my_btn_s btn-small pull-left btn-danger m-r_5"
						type="button" data-remove data-rel="tooltip"
						data-title="{lang('Delete','admin')}">
						<i class="icon-trash icon-white"></i>
					</button>
					<div class="o_h">
						<input type="hidden" name="variants[RandomId][]" class="random_id"
							value="" /> <input type="hidden" name="variants[CurrentId][]"
							value="" /> <input type="text" name="variants[Name][]" value="" />
					</div>
				</td>
				<td class="number"><input type="text"
					name="variants[PriceInMain][]" value="" /></td> {if
				count($currencies)>0}
				<td><select name="variants[currency][]"> {foreach
						$currencies as $c}
						<option value="{echo $c->getId()}" {if $c->getMain()}selected="selected"{/if}>{echo
							$c->getCode()}</option> {/foreach}
				</select></td> {/if}
				<td><input type="text" name="variants[Number][]" value=""
					class="textbox_short" /></td>
				<td class="number"><input type="text" name="variants[Stock][]"
					value="1" class="textbox_short" /></td>
				<td class="variantImage">
					<div class="control-group photo_album">
						<label class="control-label" style="display: none;"> <span
							class="btn btn-small p_r" data-url="file"> <i
								class="icon-camera"></i> <input type="file" class="newImage"
								name="image" title="{lang('Main image','admin')}" /> <input
								type="hidden" name="changeImage[]" value="" class="changeImage" />
						</span>
						</label>
						<div class="controls">
							<div class="fon"></div>
							<div class="btn-group f-s_0">
								<button type="button" class="btn change_image"
									data-rel="tooltip" data-title="{lang('Edit','admin')}"
									data-original-title="">
									<i class="icon-edit"></i>
								</button>
								<button type="button" class="btn images_modal"
									data-rel="tooltip"
									data-title="{lang('Load from internet','admin')}"
									data-original-title="">
									<i class="icon-search"></i>
								</button>
							</div>
							<img src="{$THEME}images/select-picture.png"
								class="img-polaroid " style="width: 50px;" />
						</div>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
</div>
{$imagesPopup}
<!-- ---------------------------------------------------Блок для додавання варыантів-------------------------------------- -->
{literal}
<script type="text/javascript">
                                                                            function vName() {
                                                                                $('.vName').show();
                                                                                $('.vNameH').hide();
                                                                            }

    </script>
{/literal}
