<section class="mini-layout">
	<div class="frame_title clearfix">
		<div class="pull-left">
			<span class="help-inline"></span> <span class="title">{lang('Shop
				settings','admin')}</span>
		</div>
		<div class="pull-right">
			<div class="d-i_b">
				<a href="{$ADMIN_URL}dashboard" class="t-d_n m-r_15"><span
					class="f-s_14">←</span> <span class="t-d_u">{lang('Back','admin')}</span></a>
				<button type="button"
					class="btn btn-small btn-primary action_on formSubmit"
					data-form="#settings_form">
					<i class="icon-ok"></i>{lang('Save','admin')}
				</button>
				<button type="button" class="btn btn-small action_on formSubmit"
					data-form="#settings_form" data-action="close">
					<i class="icon-check"></i>{lang('Save and go back','admin')}
				</button>
				{echo
				create_language_select(ShopCore::$ci->cms_admin->get_langs(true),
				$locale, "/admin/components/run/shop/settings/index")}
			</div>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span3 m-t_10">
			<ul class="nav myTab nav-tabs nav-stacked">
				<li class="active"><a href="#view">{lang('External
						view','admin')}</a></li>
				<li><a href="#images">{lang('Images','admin')}</a></li>
				<li><a href="#orders">{lang('Orders','admin')}</a></li> {if
				!strpos(getCmsNumber(), 'Pro')}
				<li><a href="#socialService">{lang('Integration with social
						networks','admin')}</a></li> {/if}
				<li><a href="#notif">{lang('Notifications in
						pages','admin')}</a></li>
				<li><a href="#yandexMarket">{lang('Discharge into
						Yandex.Market','admin')}</a></li>
			</ul>
		</div>
		<div class="span9 content_big_td">
			<form id="settings_form"
				action="{$ADMIN_URL}settings/update/{echo $locale}" method="post">
				<input type="hidden" name="systemTemplatePath"
					id="systemTemplatePath"
					value="{echo ShopCore::app()->SSettings->systemTemplatePath}" /> <input
					type="hidden" name="mobileTemplatePath" id="mobileTemplatePath"
					value="{echo ShopCore::app()->SSettings->mobileTemplatePath}" /> <input
					type="hidden" name="Locale" value="{echo $locale}" />
				<div class="tab-content form-horizontal">
					<div class="tab-pane active" id="view">
						<table
							class="table table-striped table-bordered table-hover table-condensed">
							<thead>
								<tr>
									<th colspan="6">{lang('External view','admin')}</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="6">
										<div class="inside_padd">
											<div class="number">
												<div class="control-group">
													<label class="control-label">{lang('Products count
														shown on site','admin')}:</label>
													<div class="controls">
														<input type="text"
															value="{echo ShopCore::app()->SSettings->frontProductsPerPage}"
															name="frontProductsPerPage" class="input-small">
														<span class="help-inline"></span>
													</div>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">{lang('The values for
													the number of products per page (example: 12, 24,
													48)','admin')}:</label>
												<div class="controls">
													<input type="text" value="{echo  implode(",",unserialize(ShopCore::app()->SSettings->arrayFrontProductsPerPage))}"
													name="arrayFrontProductsPerPage"
													id="arrayFrontProductsPerPage" class=""> <span
														class="help-inline"></span>
												</div>
											</div>
											<div class="number">
												<div class="control-group">
													<label class="control-label">{lang('Products count
														in control panel','admin')}:</label>
													<div class="controls">
														<input type="text"
															value="{echo ShopCore::app()->SSettings->adminProductsPerPage}"
															name="adminProductsPerPage" class="input-small">
														<span class="help-inline"></span>
													</div>
												</div>
												<div class="control-group">
													<label class="control-label">{lang('Total','admin')}
														{lang('fractional digits','admin')}:</label>
													<div class="controls">
														<select name="pricePrecision" class="input-small">
															<option {ifShopCore::app()->SSettings->pricePrecision
																== 0}selected{/if} value="0">0</option>
															<option {ifShopCore::app()->SSettings->pricePrecision
																== 1}selected{/if} value="1">1</option>
															<option {ifShopCore::app()->SSettings->pricePrecision
																== 2}selected{/if} value="2">2</option>
															<option {ifShopCore::app()->SSettings->pricePrecision
																== 3}selected{/if} value="3">3</option>
															<option {ifShopCore::app()->SSettings->pricePrecision
																== 4}selected{/if} value="4">4</option>
															<option {ifShopCore::app()->SSettings->pricePrecision
																== 5}selected{/if} value="5">5</option>
														</select>
													</div>
												</div>
												{/**
												<div class="control-group">
													<label class="control-label">{lang('Template','admin')}:</label>
													<div class="controls">
														{if $templates} <select name="systemTemplatePath"
															class="input-long"> {foreach $templates as $t}
															<option {if $t==ShopCore::app()->SSettings->systemTemplatePath}selected{/if} value="{echo $t}">{echo str_replace(array('./templates/', '/shop/'), '', $t)}</option> {/foreach}
														</select> {else:} {lang('List','admin')} {lang('Template','admin')}
														{lang('Empty.','admin')}. {/if}
													</div>
												</div>
												**/}
											</div>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
						<div class="row-fluid">
							<form method="post" action="#" class="form-horizontal">
								<table
									class="table table-striped table-bordered table-hover table-condensed content_big_td orderMethodsTable">
									<thead>
										<tr>
											<th class="span2">{lang('Name','admin')}</th>
											<th>{lang('The name at the website','admin')}</th>
											<th>{lang('Hint','admin')}</th>
											<th class="span2">{lang('Get','admin')}</th>
											<th class="span2">{lang('Status','admin')}</th>
											<th class="span2">{lang('Edit','admin')}</th>
										</tr>
									</thead>
									<tbody class="sortable save_positions"
										data-url="/admin/components/run/shop/settings/saveSortPositions">
										{foreach $sorting as $s}
										<tr data-locale="{echo $locale}" data-id="{echo $s['id']}">
											<td>
												<div class="name">{echo $s['name']}</div> <input
												type="hidden" name="ids" value="{echo $s['id']}"> <input
												type="text" name="name" value="{echo $s['name']}"
												style="display: none">
											</td>
											<td><span> {if $s['name_front']}
													<div class="name_front">{echo $s['name_front']}</div>
													{else:}
													<div class="name_front">-</div> {/if}
											</span>
												<div class="text_field_block" style="display: none;">
													<textarea>{echo $s['name_front']}</textarea>
													<span class="save_button_field" data-id="{echo $s['id']}"
														data-name="name_front">{lang('Save','admin')}</span>
												</div> <input type="text" name="name_front"
												value="{echo $s['name_front']}" style="display: none">
											</td>
											<td><span> {if $s['tooltip']}
													<div class="tooltip_s">{echo $s['tooltip']}</div> {else:}
													<div class="tooltip_s">-</div> {/if}
											</span>
												<div class="text_field_block" style="display: none;">
													<textarea>{echo $s['tooltrip']}</textarea>
													<span class="save_button_field" data-id="{echo $s['id']}"
														data-name="tooltip">{lang('Save','admin')}</span>
												</div> <input type="text" name="tooltip"
												value="{echo $s['tooltip']}" style="display: none">
											</td>
											<td>
												<div class="get">{echo $s['get']}</div>
											</td>
											<td>
												<div class="frame_prod-on_off" data-rel="tooltip"
													data-placement="top"
													data-original-title="{if $s['active'] == 1}{lang('show','admin')}{else:}{lang("
													don'tshow",'admin')}{/if}" >
													<span
														class="prod-on_off {if $s['active'] != 1}disable_tovar{/if}"
														style="" {if $s['active'] == 1}rel="true"
														{else:}rel="false"
														{/if}
                                                              onclick="ChangeSortActive(this,{echo $s['id']});">
													</span>
												</div>
											</td>
											<td>
												<button class="btn my_btn_s btn-small orderMethodsEdit"
													type="button">
													<i class="icon-edit"></i>
												</button>
												<button class="btn my_btn_s btn-small orderMethodsRefresh"
													type="button" style="display: none">
													<i class="icon-refresh"></i>
												</button>
											</td>
										</tr>
										{/foreach}
									</tbody>
								</table>
							</form>
						</div>
					</div>
					<div class="tab-pane" id="images">
						<table
							class="table table-striped table-bordered table-hover table-condensed">
							<thead>
								<tr>
									<th colspan="6">{lang('Images','admin')}</th>
								</tr>
							</thead>
							<tbody>
								<!--                            Image sizes block-->
								<td colspan="6">
									<div class="inside_padd">
										<div class="form-horizontal">
											<div data-frame>
												<div class="variantsProduct">
													<table class="table table-bordered t-l_a">
														<thead>
															<tr>
																<th class="span3 vName">{lang('Prefix (folder will
																	be created)','admin')}<span class="required">*</span>
																</th>
																<th class="span2 ">{lang('Height, px','admin')} <span
																	class="required">*</span></th>
																<th class="span2">{lang('Width, px','admin')} <span
																	class="required">*</span></th>
															</tr>
														</thead>
														{$imageSizes =
														unserialize(ShopCore::app()->SSettings->imageSizesBlock)}
														<tbody id="AppendHolder">
															{foreach $imageSizes as $key => $size}
															<tr>
																<td class="vName">
																	<button
																		class="btn my_btn_s btn-small pull-left btn-danger m-r_5 removeImageType"
																		type="button" data-rel="tooltip"
																		data-title="{lang('Delete','admin')}">
																		<i class="icon-trash icon-white"></i>
																	</button>
																	<div class="o_h">
																		<input class="keyupSizes required" type="text"
																			name="{echo 'imageSizesBlock['.$size['name'].'][name]'}"
																			value="{$size['name']}" />
																	</div>
																</td>
																<td class='number'><input
																	class="keyupHeight required" type="text"
																	name="{echo 'imageSizesBlock['.$size['name'].'][height]'}"
																	value="{$size['height']}" /></td>
																<td class='number'><input
																	class="keyupWidth required" type="text"
																	name="{echo 'imageSizesBlock['.$size['name'].'][width]'}"
																	value="{$size['width']}" /></td>
															</tr>
															{/foreach}
														</tbody>
														<tfoot>
															<tr>
																<td colspan="8">
																	<div class="clearfix">
																		<button id="addImageSizesBlock" type="button"
																			class="pull-right btn btn-small btn-success">
																			<i class="icon-plus-sign icon-white"></i>
																			{lang('Add','admin')}
																		</button>
																	</div>
																</td>
															</tr>
														</tfoot>
													</table>
												</div>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">{lang('Additional
												image','admin')}:</label>
											<div class="controls">
												<input type="text" class="input-small required"
													value="{echo ShopCore::app()->SSettings->additionalImageWidth}"
													name="additionalImageWidth" data-placement="top"
													data-title="{lang('Digits only','admin')}"
													data-original-title=""> <span class="help-inline">&nbsp;x&nbsp;</span>
												<input type="text" class="input-small required"
													value="{echo ShopCore::app()->SSettings->additionalImageHeight}"
													name="additionalImageHeight" data-placement="top"
													data-title="{lang('Digits only','admin')}"
													data-original-title=""> <span class="help-inline">&nbsp;px</span>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">{lang('Thumbnail','admin')}:</label>
											<div class="controls">
												<input type="text" class="input-small required"
													value="{echo ShopCore::app()->SSettings->thumbImageWidth}"
													name="thumbImageWidth" data-placement="top"
													data-title="{lang('Digits only','admin')}"
													data-original-title=""> <span class="help-inline">&nbsp;x&nbsp;</span>
												<input type="text" class="input-small required"
													value="{echo ShopCore::app()->SSettings->thumbImageHeight}"
													name="thumbImageHeight" data-placement="top"
													data-title="{lang('Digits only','admin')}"
													data-original-title=""> <span class="help-inline">&nbsp;px</span>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">{lang('Quality','admin')}:</label>
											<div class="controls">
												<input type="text" class="input-small" maxlength="2"
													value="{echo ShopCore::app()->SSettings->imagesQuality}"
													name="images[quality]"> <span class="help-inline">%</span>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">{lang('Main
												size','admin')}:</label>
											<div class="controls">
												<select name="images[imagesMainSize]">
													<option {ifShopCore::app()->SSettings->imagesMainSize
														== 'auto'}selected="selected"{/if}
														value="auto">{lang('Auto','admin')}</option>
													<option {ifShopCore::app()->SSettings->imagesMainSize
														== 'height'}selected="selected"{/if}
														value="height">{lang('Height','admin')}</option>
													<option {ifShopCore::app()->SSettings->imagesMainSize
														== 'width'}selected="selected"{/if}
														value="width">{lang('Width','admin')}</option>
												</select>
											</div>
										</div>
									</div>
								</td>
							</tbody>
						</table>
						<!--        Start. Block for add new image sizes-->
						<div style="display: none">
							<table>
								<tr id="CloneImageSizesBlock">
									<td class="vName">
										<button
											class="btn my_btn_s btn-small pull-left btn-danger m-r_5"
											type="button" data-remove data-rel="tooltip"
											data-title="{lang('Delete','admin')}">
											<i class="icon-trash icon-white"></i>
										</button>
										<div class="o_h">
											<input class="keyupSizes required" type="text" name=""
												value="" />
										</div>
									</td>
									<td class='number'><input class="keyupHeight required"
										type="text" name="" value="" /></td>
									<td class='number'><input class="keyupWidth required"
										type="text" name="" value="" /></td>
								</tr>
							</table>
						</div>
						<!--        End. Block for add new image sizes-->
						<table
							class="table table-striped table-bordered table-hover table-condensed">
							<thead>
								<tr>
									<th colspan="6">{lang('Watermark','admin')}</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="6">
										<div class="inside_padd">
											<div class="control-group">
												<div class="control-label"></div>
												<div class="controls">
													<span class="frame_label no_connection"> <span
														class="niceCheck b_n"> <input type="checkbox"
															value="1" name="watermark[active]" {ifShopCore::app()->SSettings->watermark_active
															== true} checked="checked" {/if}/>
													</span> {lang('Active','admin')}
													</span>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="inputLocal">{lang('
													Horizontal alignment ','admin')}:</label>
												<div class="controls">
													<select id="inputLocal" name="watermark[wm_hor_alignment]">
														<option {ifShopCore::app()->SSettings->watermark_wm_hor_alignment
															== 'left'}selected="selected"{/if}
															value="left">{lang('Left','admin')}</option>
														<option {ifShopCore::app()->SSettings->watermark_wm_hor_alignment
															== 'center'}selected="selected"{/if}
															value="center">{lang('Center','admin')}</option>
														<option {ifShopCore::app()->SSettings->watermark_wm_hor_alignment
															== 'right'}selected="selected"{/if}
															value="right">{lang('Right','admin')}</option>
													</select>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="inputType">{lang('Vertical
													alignment','admin')}:</label>
												<div class="controls">
													<select name="watermark[wm_vrt_alignment]" id="inputLocal">
														<option {ifShopCore::app()->SSettings->watermark_wm_vrt_alignment
															== 'top'}selected="selected"{/if}
															value="top">{lang('Up','admin')}</option>
														<option {ifShopCore::app()->SSettings->watermark_wm_vrt_alignment
															== 'middle'}selected="selected"{/if}
															value="middle">{lang('In the middle','admin')}</option>
														<option {ifShopCore::app()->SSettings->watermark_wm_vrt_alignment
															== 'bottom'}selected="selected"{/if}
															value="bottom">{lang('At the bottom','admin')}</option>
													</select>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="inputWatermarkInterest">
													{lang('The ratio of the size of the watermark to the size
													of photos','admin')}: </label>
												<div class="controls">
													<div class="o_h">
														<input type="text" id="inputWatermarkInterest"
															name="watermark[watermark_interest]"
															value="{echo ShopCore::app()->SSettings->watermark_watermark_interest}">
													</div>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">{lang('Type','admin')}:</label>
												<div class="controls">
													<select name="watermark[watermark_type]"
														id="watermark_type">
														<option value="text" {ifShopCore::app()->SSettings->watermark_watermark_type
															== 'text'}selected="selected"{/if}
															>{lang('Text','admin')}</option>
														<option value="overlay" {ifShopCore::app()->SSettings->watermark_watermark_type
															== 'overlay'}selected="selected"{/if}
															>{lang('Image','admin')}</option>
													</select>
												</div>
											</div>
											<div class="forimageblock" {ifShopCore::app()->
												SSettings->watermark_watermark_type ==
												'text'}style="display:none;"{/if}>


												<div class="control-group">
													<label class="control-label" for="inputWatermark">
														{lang('Path to the image','admin')}: </label>
													<div class="controls">
														<div class="group_icon pull-right">
															<button class="btn btn-small"
																onclick="elFinderPopup('image', 'inputWatermark');
                                                                    return false;">
																<i class="icon-picture"></i> {lang('Choose an image
																','admin')}
															</button>
														</div>

														<div class="o_h">
															<input type="text" name="watermark[watermark_image]"
																id="inputWatermark"
																value="{echo ShopCore::app()->SSettings->watermark_watermark_image}">
														</div>
														<span class="help-block"> {lang('The file must be
															on the server. For example','admin')}:
															/uploads/images/logo.png </span>
													</div>
												</div>
												<div class="control-group">
													<label class="control-label" for="inputOpicty">{lang('Transparency','admin')}:</label>
													<div class="controls number">
														<input type="text" id="inputOpicty"
															name="watermark[watermark_image_opacity]"
															class="input-small" maxlength="2"
															value="{echo ShopCore::app()->SSettings->watermark_watermark_image_opacity}" />
														<span class="help-inline">%</span>
														<div class="d_b m-t_10" id="inputWatermark-preview"
															style="width: 220px">
															<!--<img src="/templates/administrator/img/no_image.png" class="img-polaroid" />-->
															{if
															file_exists(BASEPATH.'..'.ShopCore::app()->SSettings->watermark_watermark_image)}
															<img
																src="{echo ShopCore::app()->SSettings->watermark_watermark_image}"
																class="img-polaroid" /> {/if}
														</div>
													</div>
												</div>
											</div>
											<div class="fortextblock" {ifShopCore::app()->
												SSettings->watermark_watermark_type == 'overlay'}
												style="display:none;"{/if}>
												<div class="control-group">
													<label class="control-label">{lang('Text','admin')}:</label>
													<div class="controls">
														<input type="text"
															value="{echo ShopCore::app()->SSettings->watermark_watermark_text}"
															name="watermark[watermark_text]" />
													</div>
												</div>
												<div class="control-group">
													<label class="control-label">{lang('Font
														size','admin')}:</label>
													<div class="controls">
														<input type="text" class="input-small"
															value="{echo ShopCore::app()->SSettings->watermark_watermark_font_size}"
															name="watermark[watermark_font_size]" /> <span
															class="help-inline"></span>
													</div>
												</div>
												<div class="control-group">
													<label class="control-label">{lang('Font
														colour','admin')}:</label>
													<div class="controls">
														<input id="watermark_text_color" type="text"
															class="input-small"
															value="{echo ShopCore::app()->SSettings->watermark_watermark_color}"
															name="watermark[watermark_color]" />
													</div>
												</div>
												<div class="control-group">
													<label class="control-label">{lang('Displacement','admin')}:</label>
													<div class="controls number">
														<input type="text" class="input-small"
															value="{echo ShopCore::app()->SSettings->watermark_watermark_padding}"
															name="watermark[watermark_padding]" /> <span
															class="help-inline">&nbsp;px</span>
													</div>
												</div>
												<div class="control-group">
													<label class="control-label">{lang('Path to font
														','admin')}:</label>
													<div class="controls">
														<div>
															<span class="btn btn-small p_r pull-right"> <i
																class="icon-folder-open"></i>&nbsp;&nbsp;{lang('Download','admin')}
																<input type="file" class="btn-small btn"
																value="{echo ShopCore::app()->SSettings->watermark_watermark_font_path}"
																name="watermark[watermark_font_path]" />
															</span>
															<div class="o_h">
																<input type="text"
																	value="{echo ShopCore::app()->SSettings->watermark_watermark_font_path}"
																	name="watermark[watermark_font_path]">
															</div>
														</div>
														<span class="help-block"> {lang('Font file must be
															located on the server. For example','admin')}:
															./uploads/font.ttf </span>
													</div>
												</div>
											</div>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
						<table class="table table-striped table-bordered table-condensed">
							<thead>
								<tr>
									<th colspan="6">{lang('Resize','admin')}</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="6">
										<div class="inside_padd">
											<div class="control-group">
												<div class="control-label">{lang('Perform resize of
													all the images?','admin')}</div>
												<div class="controls">
													<button type="button" class="btn" id="resizeAll">
														{lang('Resize','admin')} &nbsp;<i class="icon-resize-full"></i>
													</button>
													<span class="frame_label no_connection"
														style="padding-left: 15px;"> <span
														class="niceCheck b_n"> <input type="checkbox"
															value="1" name="" id="useAdditionalImages" />
													</span> <span>{lang('Including additional
															images','admin')}</span>
													</span>

													<div id="progressBlock"
														style="display: none; margin-top: 15px;">
														<label id="progressLabel"></label>
														<div class="progress progress-striped active"
															style="margin-top: 15px;">
															<div class="bar" style="width: 1%;"></div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td colspan="6">
										<div class="inside_padd">
											<div class="control-group">
												<div class="control-label">{lang('Perform resize the
													selected product','admin')}:</div>
												<div class="controls">
													<div style="padding-bottom: 15px;">
														<div>{lang('Product name','admin')}:</div>
														<input id="product_name" type="text" value="" />
													</div>
													<div style="padding-bottom: 15px;">
														<div>{lang('Variant name','admin')}:</div>
														<select id="product_variant_name" name="newVariantId"></select>
													</div>
													<button type="button" class="btn" id="resizeById">
														{lang('Resize','admin')} &nbsp;<i class="icon-resize-full"></i>
													</button>
												</div>
											</div>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="tab-pane" id="wish_list">
						<table
							class="table table-striped table-bordered table-hover table-condensed">
							<thead>
								<tr>
									<th colspan="6">{lang('Wish List','admin')}</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="6">
										<div class="inside_padd">
											<div class="control-group">
												<label class="control-label">{lang('E-mail','admin')}
													{lang('sender','admin')}:</label>
												<div class="controls">
													<input type="text"
														value="{echo ShopCore::app()->SSettings->wishListsSenderEmail}"
														name="wishLists[senderEmail]" /> <span class="help-inline">{lang('For
														example','admin')}: noreply@example.com</span>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">{lang('User
													name','admin')} {lang('sender','admin')}:{$translatable}</label>
												<div class="controls">
													<input type="text"
														value="{echo ShopCore::app()->SSettings->wishListsSenderName}"
														name="wishLists[senderName]" />
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">{lang('Subject','admin')}:{$translatable}</label>
												<div class="controls">
													<input type="text"
														value="{echo ShopCore::app()->SSettings->wishListsMessageTheme}"
														name="wishLists[theme]" />
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">{lang('Message
													format','admin')}</label>
												<div class="controls">
													<select name="wishLists[messageFormat]">
														<option {ifShopCore::app()->SSettings->wishListsMessageFormat=='text'}selected{/if}
															value="text">text</option>
														<option {ifShopCore::app()->SSettings->wishListsMessageFormat=='html'}selected{/if}
															value="html">html</option>
													</select>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">{lang('Message
													text','admin')}:{$translatable}</label>
												<div class="controls">
													<textarea class="elRTE smallTextarea"
														name="wishLists[userMessageText]">{echo ShopCore::encode(ShopCore::app()->SSettings->wishListsMessageText)}</textarea>
													<span class="help-inline"> <b>{lang('You can use
															the following variable','admin')}:</b><br /> %userName% -
														{lang('Name of the WishList author','admin')}<br />
														%userPhone% - {lang(' Telephone number of the wishlist
														author','admin')}<br /> %userComment% - {lang('Comments of
														the wishlist author','admin')}<br /> %wishKey% -
														{lang('Key to view the wishlist','admin')}<br />
														%wishLink% - {lang('Link to view the WishList','admin')}<br />
														%userIP% - {lang('IP address of the wishlist
														author','admin')}<br /> %wishDateCreated% - {lang('Sending
														date of the wishlist','admin')}<br />
													</span>
												</div>
											</div>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="tab-pane" id="notifications">
						<table
							class="table table-striped table-bordered table-hover table-condensed">
							<thead>
								<tr>
									<th colspan="6">{lang('Arrival notification','admin')}</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="6">
										<div class="inside_padd">
											<div class="control-group">
												<label class="control-label">{lang('E-mail','admin')}
													{lang('sender','admin')}:</label>
												<div class="controls">
													<input type="text"
														value="{echo ShopCore::app()->SSettings->notificationsSenderEmail}"
														name="notifications[senderEmail]" /> <span
														class="help-inline">{lang('For example','admin')}:
														noreply@example.com</span>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">{lang('User
													name','admin')}, {lang('sender','admin')}:{$translatable}</label>
												<div class="controls">
													<input type="text"
														value="{echo ShopCore::app()->SSettings->notificationsSenderName}"
														name="notifications[senderName]" />
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">{lang('Subject','admin')}:{$translatable}</label>
												<div class="controls">
													<input type="text"
														value="{echo ShopCore::app()->SSettings->notificationsMessageTheme}"
														name="notifications[theme]" />
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">{lang('Message
													format','admin')}</label>
												<div class="controls">
													<select name="notifications[messageFormat]">
														<option {ifShopCore::app()->SSettings->notificationsMessageFormat=='text'}selected{/if}
															value="text">text</option>
														<option {ifShopCore::app()->SSettings->notificationsMessageFormat=='html'}selected{/if}
															value="html">html</option>
													</select>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">{lang('Message
													text','admin')}:{$translatable}</label>
												<div class="controls">
													<textarea class="elRTE smallTextarea"
														name="notifications[userMessageText]">{echo ShopCore::encode(ShopCore::app()->SSettings->notificationsMessageText)}</textarea>
													<span class="help-inline"> <b>{lang('You can use
															the following variable','admin')}:</b><br />
														%notificationStatus% - {lang('Notification status about
														the arrival','admin')}<br /> %userName% - {lang(' Name of
														the user who made a request ','admin')}<br /> %userPhone%
														- {lang('User phone number','admin')}<br /> %productName%
														- {lang('Product name ','admin')}<br /> %productLink% -
														{lang('Link to view the product','admin')}<br />
														%dateCreated% - {lang(' User notification request
														date','admin')}<br />
													</span>
												</div>
											</div>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="tab-pane" id="callbacks">
						<table
							class="table table-striped table-bordered table-hover table-condensed">
							<thead>
								<tr>
									<th colspan="6">{lang('Callback','admin')}</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="6">
										<div class="inside_padd">
											<div class="control-group">
												<div class="control-label"></div>
												<div class="controls">
													<span class="frame_label no_connection"> <span
														class="niceCheck b_n"> <input type="checkbox"
															value="1" name="callbacks[sendNotification]" {ifShopCore::app()->SSettings->callbacksSendNotification}checked{/if}
															/>
													</span> {lang('Send notification about new callback to
														administrator','admin')}:
													</span>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">{lang('Email for
													sending notifications about new Callbacks','admin')}:</label>
												<div class="controls">
													<input type="text"
														value="{echo ShopCore::app()->SSettings->callbacksSendEmailTo}"
														name="callbacks[sendEmailTo]" /> <span class="help-inline">{lang('For
														example','admin')}: manager@example.com</span>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">{lang('E-mail','admin')}
													{lang('sender','admin')}:</label>
												<div class="controls">
													<input type="text"
														value="{echo ShopCore::app()->SSettings->callbacksSenderEmail}"
														name="callbacks[senderEmail]" /> <span class="help-inline">{lang('For
														example','admin')}: noreply@example.com</span>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">{lang('User
													name','admin')} {lang('sender','admin')}:{$translatable}</label>
												<div class="controls">
													<input type="text"
														value="{echo ShopCore::app()->SSettings->callbacksSenderName}"
														name="callbacks[senderName]" />
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">{lang('Subject','admin')}:
													{$translatable}</label>
												<div class="controls">
													<input type="text"
														value="{echo ShopCore::app()->SSettings->callbacksMessageTheme}"
														name="callbacks[theme]" />
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">{lang('Message
													format','admin')}:</label>
												<div class="controls">
													<select name="callbacks[messageFormat]">
														<option {ifShopCore::app()->SSettings->callbacksMessageFormat=='text'}selected{/if}
															value="text">text</option>
														<option {ifShopCore::app()->SSettings->callbacksMessageFormat=='html'}selected{/if}
															value="html">html</option>
													</select>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">{lang('Message
													text','admin')}: {$translatable}</label>
												<div class="controls">
													<textarea class="elRTE smallTextarea"
														name="callbacks[userMessageText]">{echo ShopCore::encode(ShopCore::app()->SSettings->callbacksMessageText)}</textarea>
													<span class="help-inline"> <b>{lang('You can use
															the following variable','admin')}:</b><br /> %callbackTheme%
														- {lang('Theme','admin')} {lang('Callback','admin')}<br />
														%callbackStatus% - {lang('Status','admin')}
														{lang('Callback','admin')}<br /> %userName% -
														{lang('Username requested a callback','admin')}<br />
														%userPhone% - {lang('User telephone number requested a
														callback','admin')}<br /> %dateCreated% - {lang(' Callback
														request date','admin')}<br /> %userComment% -
														{lang('Comments by a callback user','admin')}<br />
													</span>
												</div>
											</div>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="tab-pane" id="orders">
						<table
							class="table table-striped table-bordered table-hover table-condensed">
							<thead>
								<tr>
									<th colspan="6">{lang('General settings','admin')}</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="6">
										<div class="inside_padd">
											<div class="control-group">
												<div class="control-label"></div>
												<div class="controls">
													<span class="frame_label no_connection"> <span
														class="niceCheck b_n"> <input type="checkbox"
															value="1" name="userInfo[Register]" {ifShopCore::app()->SSettings->userInfoRegister}checked{/if}
															/>
													</span> {lang('User registartion after making order','admin')}
													</span>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">{lang('Recalculate
													products after payment of the order?','admin')}</label>
												<div class="controls">
													<label class="pull-left m-r_10"> <input
														type="radio" name="orders[recountGoods]" value="1" {ifShopCore::app()->SSettings->ordersRecountGoods
														== 1} checked="checked" {/if} class="v-a_b"/>
														{lang('Yes','admin')}
													</label> <label class="pull-left"> <input type="radio"
														name="orders[recountGoods]" value="0" {ifShopCore::app()->SSettings->ordersRecountGoods
														== 0} checked="checked" {/if} class="v-a_b"/>
														{lang('No','admin')}
													</label>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">{lang('Consider the
													amount of products warehouse on adding to basket','admin')}</label>
												<div class="controls">
													<label class="pull-left m-r_10"> <input
														type="radio" name="orders[checkStocks]" value="1" {ifShopCore::app()->SSettings->ordersCheckStocks
														== 1} checked="checked" {/if} class="v-a_b"/>
														{lang('Yes','admin')}
													</label> <label class="pull-left"> <input type="radio"
														name="orders[checkStocks]" value="0" {ifShopCore::app()->SSettings->ordersCheckStocks
														== 0} checked="checked" {/if} class="v-a_b"/>
														{lang('No','admin')}
													</label>
												</div>
											</div>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
						{ /* }
						<table
							class="table table-striped table-bordered table-hover table-condensed">
							<thead>
								<tr>
									<th colspan="6">{lang(' Administrator notification about
										the order placement by e-mail','admin')}</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="6">
										<div class="inside_padd">
											<div class="control-group">
												<label class="control-label">{lang('Send','admin')}
													{lang('E-mail','admin')}</label>
												<div class="controls">
													<select name="orders[sendManagerEmail]">
														<option {ifShopCore::app()->SSettings->ordersSendManagerMessage=='true'}selected{/if}
															value="true">{lang('Yes','admin')}</option>
														<option {ifShopCore::app()->SSettings->ordersSendManagerMessage=='false'}selected{/if}
															value="false">{lang('No','admin')}</option>
													</select> <span class="help-inline"></span>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">{lang('E-mail','admin')}
													{lang('Administrator','admin')}</label>
												<div class="controls">
													<input type="text"
														value="{echo ShopCore::app()->SSettings->ordersManagerEmail}"
														name="orders[managerEmail]" /> <span class="help-inline">{lang('For
														example','admin')}: noreply@example.com</span>
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
									<th colspan="6">{lang('Customer notification about the
										order placement','admin')}</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="6">
										<div class="inside_padd">
											<div class="control-group">
												<label class="control-label">{lang('Send','admin')}
													{lang('E-mail','admin')}</label>
												<div class="controls">
													<select name="orders[sendUserEmail]">
														<option {ifShopCore::app()->SSettings->ordersSendMessage=='true'}selected{/if}
															value="true">{lang('Yes','admin')}</option>
														<option {ifShopCore::app()->SSettings->ordersSendMessage=='false'}selected{/if}
															value="false">{lang('No','admin')}</option>
													</select> <span class="help-inline">{lang('Order placement
														e-mail to the user has been sent','admin')}</span>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">{lang('E-mail','admin')}
													{lang('sender','admin')}</label>
												<div class="controls">
													<input type="text"
														value="{echo ShopCore::app()->SSettings->ordersSenderEmail}"
														name="orders[senderEmail]" /> <span class="help-inline">{lang('For
														example','admin')}: noreply@example.com</span>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">{lang('User
													name','admin')} {lang('sender','admin')}{$translatable}</label>
												<div class="controls">
													<input type="text"
														value="{echo ShopCore::app()->SSettings->ordersSenderName}"
														name="orders[senderName]" />
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">{lang('Subject','admin')}{$translatable}</label>
												<div class="controls">
													<input type="text"
														value="{echo ShopCore::app()->SSettings->ordersMessageTheme}"
														name="orders[theme]" />
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">{lang('Message
													format','admin')}</label>
												<div class="controls">
													<select name="orders[messageFormat]">
														<option {ifShopCore::app()->SSettings->ordersMessageFormat=='text'}selected{/if}
															value="text">text</option>
														<option {ifShopCore::app()->SSettings->ordersMessageFormat=='html'}selected{/if}
															value="html">html</option>
													</select>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">{lang('Message
													text','admin')}{$translatable}</label>
												<div class="controls">
													<textarea class="elRTE smallTextarea"
														name="orders[userMessageText]">{echo ShopCore::encode(ShopCore::app()->SSettings->ordersMessageText)}</textarea>
													<span class="help-inline"> <b>{lang('You can use
															the following variable','admin')}:</b><br /> %userName% -
														{lang('Name of the customer','admin')}<br /> %userEmail% -
														{lang('Customer e-mail address','admin')}<br />
														%userPhone% - {lang('Customer phone number','admin')}<br />
														%userDeliver% - {lang('Delivery address specified by the
														customer','admin')}<br /> %orderId% - {lang('ID
														order','admin')}<br /> %orderKey% - {lang(' Key to view
														the order','admin')}<br /> %orderLink% - {lang(' Link to
														the order','admin')}<br />
													</span>
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
									<th colspan="6">{lang(' Customer notification about the
										order status change','admin')}</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="6">
										<div class="inside_padd">
											<div class="control-group">
												<label class="control-label">{lang('Message
													format','admin')}</label>

												<div class="controls">
													<select name="notifyOrderStatus[statusEmail]">
														<option {ifShopCore::app()->SSettings->notifyOrderStatusStatusEmail==
															1}selected{/if} value="1">{lang('Yes','admin')}</option>
														<option {ifShopCore::app()->SSettings->notifyOrderStatusStatusEmail==
															2}selected{/if} value="2">{lang('No','admin')}</option>
													</select>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">{lang('E-mail','admin')}
													{lang('sender','admin')}</label>
												<div class="controls">
													<input type="text"
														value="{echo ShopCore::app()->SSettings->notifyOrderStatusSenderEmail}"
														name="notifyOrderStatus[senderEmail]" /> <span
														class="help-inline">{lang('For example','admin')}:
														noreply@example.com</span>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">{lang('User
													name','admin')} {lang('sender','admin')}:{$translatable}</label>
												<div class="controls">
													<input type="text"
														value="{echo ShopCore::app()->SSettings->notifyOrderStatusSenderName}"
														name="notifyOrderStatus[senderName]" />
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">{lang('Subject','admin')}
													{$translatable}</label>
												<div class="controls">
													<input type="text"
														value="{echo ShopCore::app()->SSettings->notifyOrderStatusMessageTheme}"
														name="notifyOrderStatus[theme]" />
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">{lang('Message
													format','admin')}</label>
												<div class="controls">
													<select name="notifyOrderStatus[messageFormat]">
														<option {ifShopCore::app()->SSettings->notifyOrderStatusMessageFormat=='text'}selected{/if}
															value="text">text</option>
														<option {ifShopCore::app()->SSettings->notifyOrderStatusMessageFormat=='html'}selected{/if}
															value="html">html</option>
													</select>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">{lang('Message
													text','admin')} {$translatable}</label>
												<div class="controls">
													<textarea class="elRTE smallTextarea"
														name="notifyOrderStatus[userMessageText]">{echo ShopCore::encode(ShopCore::app()->SSettings->notifyOrderStatusMessageText)}</textarea>
													<span class="help-inline"> <b>{lang('You can use
															the following variable','admin')}:</b><br /> %userName% -
														{lang('Name of the customer','admin')}<br /> %orderStatus%
														- {lang('New order status','admin')}<br /> %orderLink% -
														{lang(' Link to the order','admin')}<br /> %dateChanged% -
														{lang('Time of the order status change','admin')}<br />
													</span>
												</div>
											</div>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
						{ */ }
					</div>

					<div class="tab-pane" id="ordersreg">
						<table
							class="table table-striped table-bordered table-hover table-condensed">
							<thead>
								<tr>
									<th colspan="6">{lang('Registration after order','admin')}
									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="6">
										<div class="inside_padd">
											<div class="control-group">
												<div class="control-label"></div>
												<div class="controls">
													<span class="frame_label no_connection"> <span
														class="niceCheck b_n"> <input type="checkbox"
															value="1" name="userInfo[Register111]" {ifShopCore::app()->SSettings->userInfoRegister}checked{/if}
															/>
													</span> {lang('User registartion after making order','admin')}
													</span>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">{lang('E-mail','admin')}
													{lang('sender','admin')}</label>
												<div class="controls">
													<input type="text"
														value="{echo ShopCore::app()->SSettings->userInfoSenderEmail}"
														name="userInfo[senderEmail]" /> <span class="help-inline">{lang('For
														example','admin')}: noreply@example.com</span>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">{lang('User
													name','admin')} {lang('sender','admin')} {$translatable}</label>
												<div class="controls">
													<input type="text"
														value="{echo ShopCore::app()->SSettings->userInfoSenderName}"
														name="userInfo[senderName]" />
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">{lang('Subject','admin')}
													{$translatable}</label>
												<div class="controls">
													<input type="text"
														value="{echo ShopCore::app()->SSettings->userInfoMessageTheme}"
														name="userInfo[theme]" />
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">{lang('Message
													format','admin')}</label>
												<div class="controls">
													<select name="userInfo[messageFormat]">
														<option {ifShopCore::app()->SSettings->userInfoMessageFormat=='text'}selected{/if}
															value="text">text</option>
														<option {ifShopCore::app()->SSettings->userInfoMessageFormat=='html'}selected{/if}
															value="html">html</option>
													</select>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">{lang('Message
													text','admin')}:{$translatable}</label>
												<div class="controls">
													<textarea class="elRTE smallTextarea"
														name="userInfo[userMessageText]">{echo ShopCore::encode(ShopCore::app()->SSettings->userInfoMessageText)}</textarea>
													<span class="help-inline"> <b>{lang('You can use
															the following variable','admin')}:</b><br /> %userName% -
														{lang(' User login for site enrty','admin')}<br />
														%fullName% - {lang('Username of the customer','admin')}<br />
														%userEmail% - {lang('Customer e-mail','admin')}<br />
														%userPassword% - {lang('Customer password','admin')}<br />
														%siteLink% - {lang('Site address','admin')}
													</span>
												</div>
											</div>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="tab-pane" id="top_sale">
						<table
							class="table table-striped table-bordered table-hover table-condensed">
							<thead>
								<tr>
									<th colspan="6">{lang('Top sales block ','admin')}</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="6">
										<div class="inside_padd">
											<div class="control-group">
												<label class="control-label">{lang(' Popularity
													formula coefficient ','admin')}:</label>
												<div class="controls number">
													<input type="text"
														value="{echo ShopCore::app()->SSettings->topSalesBlockFormulaCoef}"
														name="topSalesBlock[formulaCoef]" />
												</div>
											</div>
											<div class="control-group">
												<label>{lang(' Popularity formula: number of views+
													products added to the cart *coefficient . For example:
													1000.','admin')}</label>
											</div>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					{ /* }
					<div class="tab-pane" id="forget_pass">
						<table
							class="table table-striped table-bordered table-hover table-condensed">
							<thead>
								<tr>
									<th colspan="6">{lang('Password recovery','admin')}</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="6">
										<div class="inside_padd">
											<div class="control-group">
												<label class="control-label">{lang('Text','admin')}
													{lang('E-mail','admin')}:{$translatable}</label>
												<div class="controls">
													<textarea class="elRTE smallTextarea"
														name="forgotPassword[MessageText]">{echo ShopCore::encode(ShopCore::app()->SSettings->forgotPasswordMessageText)}</textarea>
													<span class="help-inline"> <b>{lang('You can use
															the following variable','admin')}</b><br /> %webSiteName% -
														{lang('Site name','admin')}<br /> %resetPasswordUri% -
														{lang('Link to confirm password recovery','admin')}<br />
														%password% - {lang('New','admin')}
														{lang('Password','admin')}<br /> %key% -
														{lang('Key','admin')}<br /> %webMasterEmail% - {lang('Site
														webmaster email','admin')}
													</span>
												</div>
											</div>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					{ */ } {if !strpos(getCmsNumber(), 'Pro')}
					<div class="tab-pane" id="socialService">
						<table
							class="table table-striped table-bordered table-hover table-condensed content_big_td">
							<thead>
								<tr>
									<th colspan="6">Facebook</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="6">
										<div class="inside_padd">
											<div class="control-group">
												<div class="control-label"></div>
												<div class="controls">
													<span class="frame_label no_connection"> <span
														class="niceCheck b_n"> <input type="checkbox"
															id="facebook[use]" name="facebook[use]" value="1"
															{if $fsettings.use== 1}checked="checked"
															{/if} id="foncheck" />
													</span> {lang('Switch on integration with Facebook?','admin')}
													</span>
												</div>
											</div>

											<div class="control-group">
												<label class="control-label" for="secretkey">{lang('Secret
													key','admin')}:</label>
												<div class="controls">
													<input type="text" value="{echo $fsettings.secretkey}"
														name="facebook[secretkey]" id="secretkey" />
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="appnumber">{lang('Application
													number','admin')}:</label>
												<div class="controls">
													<input type="text" value="{echo $fsettings.appnumber}"
														name="facebook[appnumber]" id="appnumber" />
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="seltpl">{lang('Select
													template folder','admin')}:</label>
												<div class="controls">
													<select name="facebook[template]" id="seltpl">
														{foreach $ctemplates as $k => $v}
														<option value="{$k}" {if $fsettings.template==
															$k} selected="selected"{/if}>{$k}</option> {/foreach}
													</select>
												</div>
											</div>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
						<table
							class="table table-striped table-bordered table-hover table-condensed content_big_td">
							<thead>
								<tr>
									<th colspan="6">Vkontakte</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="6">
										<div class="inside_padd">
											<div class="control-group">
												<div class="control-label"></div>
												<div class="controls">
													<span class="frame_label no_connection"> <span
														class="niceCheck b_n"> <input type="checkbox"
															name="vk[use]" value="1" {if $vsettings.use==
															1}checked="checked" {/if} id="foncheck" />
													</span> {lang('Switch on integration with VKontakte?','admin')}
													</span>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="protkey">{lang('Protection
													key','admin')}:</label>
												<div class="controls">
													<input type="text" value="{echo $vsettings.protkey}"
														name="vk[protkey]" id="protkey" />
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="vappnumber">{lang('Application
													number','admin')}:</label>
												<div class="controls">
													<input type="text" value="{echo $vsettings.appnumber}"
														name="vk[appnumber]" id="vappnumber" />
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="vseltpl">{lang('Select
													template folder','admin')}:</label>
												<div class="controls">
													<select name="vk[template]" id="vseltpl"> {foreach
														$ctemplates as $k => $v}
														<option value="{$k}" {if $vsettings.template==
															$k} selected="selected"{/if}>{$k}</option> {/foreach}
													</select>
												</div>
											</div>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>


					{/if}

					<div class="tab-pane" id="notif">
						<table
							class="table table-striped table-bordered table-hover table-condensed">
							<thead>
								<tr>
									<th colspan="6">{lang('Notifications in pages','admin')}</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="6">
										<div class="inside_padd">
											<div class="control-group">
												<label class="control-label">{lang('Message about
													arrival','admin')}:</label>
												<div class="controls">
													<textarea class="elRTE smallTextarea"
														name="messages[incoming]">{echo ShopCore::encode($notif['incoming'])}</textarea>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">{lang('Message about a
													callback','admin')}:</label>
												<div class="controls">
													<textarea class="elRTE smallTextarea"
														name="messages[callback]">{echo ShopCore::encode($notif['callback'])}</textarea>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">{lang('Message from the
													order page','admin')}:</label>
												<div class="controls">
													<textarea class="elRTE smallTextarea"
														name="messages[order]">{echo ShopCore::encode($notif['order'])}</textarea>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label"> <span
													class="popover_ref"
													data-title="<b>{lang('API Key for Mail Chimp','admin')}</b>">
														<i class="icon-info-sign"></i>
												</span>
													<div class="d_n">
														{lang('The key to your account <br />on the mail
														Mailchimp','admin')}
													</div> <span>{lang('API Key for Mail Chimp','admin')}:</span>
												</label> </label>
												<div class="controls">
													<input type="text"
														value="{echo ShopCore::app()->SSettings->adminMessageMonkey}"
														name="messages[monkey]">
												</div>
											</div>
											<div class="control-group">
												<label class="control-label"> <span
													class="popover_ref"
													data-title="<b>{lang('Key for Mail Chimp list','admin')}</b>">
														<i class="icon-info-sign"></i>
												</span>
													<div class="d_n">
														{lang('The key to your list of <br />news for
														MailChimp','admin')}
													</div> <span>{lang('Key for Mail Chimp list','admin')}:</span>
												</label> </label>
												<div class="controls">
													<input type="text"
														value="{echo ShopCore::app()->SSettings->adminMessageMonkeylist}"
														name="messages[monkeylist]">
												</div>
											</div>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>

					<div class="tab-pane" id="yandexMarket">
						<table
							class="table table-striped table-bordered table-hover table-condensed">
							<thead>
								<tr>
									<th colspan="6">{lang('Settings Yandex.Market','admin')}</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="6">
										<div class="inside_padd">
											<div class="control-group">
												<label class="control-label">{lang('Displayed
													categories selection','admin')}:</label> {$holder =
												ShopCore::app()->SSettings->getSelectedCats()} {$categories
												= ShopCore::app()->SCategoryTree->getTree()}
												<div class="controls">
													<select name="displayedCats[]" multiple="multiple"
														style="width: 285px; height: 129px;"> {foreach
														$categories as $category}
														<option value="{echo $category->getId()}"
															{if @in_array($category->getId(),
															$holder)}selected="selected"{/if}>
															{str_repeat('-',$category->getLevel())} {echo
															ShopCore::encode($category->getName())}</option> {/foreach}
													</select>
												</div>
											</div>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
						<table
							class="table table-striped table-bordered table-hover table-condensed content_big_td">
							<thead>
								<th>{lang('Yandex.Market document','admin')}</th>
							</thead>
							<tbody>
								<tr>
									<td>
										<div class="inside_padd">
											<div class="control-group">
												<a href="{site_url('shop/yandex/genreyml')}" target="_blank">{lang('XML
													document','admin')}</a>
											</div>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
<div id="elFinder"></div>