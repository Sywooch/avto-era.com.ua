<!-- Edit product form -->
<section class="mini-layout">
	<div class="frame_title clearfix">
		<div class="pull-left">
			<span class="help-inline"></span> <span class="title">{echo
				ShopCore::encode($model->getName())}</span>
		</div>
		<div class="pull-right">
			<div class="d-i_b">
				<!-- $_SESSION['ref_url'] is session variable to save filter results to go back to it -->
				<a href="{$ADMIN_URL}search/index{$_SESSION['ref_url']}"
					class="t-d_n m-r_15 pjax"><span class="f-s_14">←</span> <span
					class="t-d_u">{lang('Back','admin')}</span></a>
				<button type="button"
					class="btn btn-small action_on formSubmit btn-primary"
					data-form="#image_upload_form" data-submit>
					<i class="icon-ok"></i>{lang('Save','admin')}
				</button>
				<button type="button" class="btn btn-small action_on formSubmit"
					data-form="#image_upload_form" data-action="close">
					<i class="icon-check"></i>{lang('Save and exit','admin')}
				</button>
				{echo create_language_select($languages, $locale,
				"/admin/components/run/shop/products/edit/".$model->getId())}
			</div>
		</div>
	</div>
	<form
		action="{$ADMIN_URL}products/edit/{echo $model->getId()}/{$locale}"
		method="post" enctype="multipart/form-data" id="image_upload_form">
		<div class="content_big_td">
			<div class="clearfix">
				<div class="btn-group myTab m-t_20 pull-left"
					data-toggle="buttons-radio">
					<a href="#parameters" class="btn btn-small active">{lang('Product','admin')}</a>
					<a href="#parameters_article" class="btn btn-small">{lang('Properties','admin')}</a>
					{$addField =
					ShopCore::app()->CustomFieldsHelper->getCustomFields('product',
					$model->getId())->asAdminHtml()} <a href="#additionalPics"
						class="btn btn-small">{lang('Images','admin')}</a> {if $addField}
					<a href="#customFields" class="btn btn-small">{lang('Additional
						data','admin')}</a> {/if} <a href="#kits" class="btn btn-small">{lang('Kits','admin')}</a>
					{if $moduleAdditions} <a href="#modules_additions"
						class="btn btn-small">{lang('Modules additions', 'admin')}</a>
					{/if}
				</div>
				<div class="pull-right m-t_20">
					<a href="/shop/product/{echo $model->getUrl()}" target="_blank"
						class="btn btn-small action_on" data-form="#image_upload_form"
						data-action="close"><i class="icon-share-alt m-r_5"></i>{lang('View
						page','admin')}</a> <a href=""></a>
				</div>
				<div class="pagination pagination-small pagination-centered">
					<ul>
						<li {if !$prev_id}class="disabled"{/if}>{if $prev_id} <a
							href="/admin/components/run/shop/products/edit/{echo $prev_id}{echo $_SESSION['ref_url']}"
							class="pjax"><span>←</span> {lang('Previous','admin')}</a>
							{else:} <span><span>←</span> {lang('Previous','admin')}</span>
							{/if}
						</li>
						<li {if !$next_id}class="disabled"{/if}>{if $next_id} <a
							href="/admin/components/run/shop/products/edit/{echo $next_id}{echo $_SESSION['ref_url']}"
							class="pjax">{lang('Next','admin')} <span>→</span></a> {else:} <span>{lang('Next','admin')}
								<span>→</span>
						</span> {/if}
						</li>
					</ul>
				</div>
			</div>
			<div class="tab-content">{include_tpl('default_edit')}

				{include_tpl('../modules_additions')}</div>
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
<!-- ---------------------------------------------------Блок видалення---------------------------------------------------- -->
<div class="modal hide fade modal_del_kit">
	<div class="modal-header">
		<button type="button" class="close f-s_26" data-dismiss="modal"
			aria-hidden="true">&times;</button>
		<h3>{lang('Kit removal','admin')}</h3>
	</div>
	<div class="modal-body">
		<p>{lang('Kits del body','admin')}</p>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn btn-primary kit_del_ok">{lang('Delete','admin')}</a>
		<a href="#" class="btn" onclick="$('.modal').modal('hide');">{lang('Cancel','admin')}</a>
	</div>
</div>
<!-- ---------------------------------------------------Блок видалення---------------------------------------------------- -->

<!-- ---------------------------------------------------Блок для додавання варыантів-------------------------------------- -->
<div style="display: none;" class="variantRowSample">
	{ $v = $model->getFirstVariant()}
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
								name="image" title="{lang('Main image','admin')}"
								accept="image/jpeg,image/png,image/gif" /> <input type="hidden"
								name="changeImage[]" value="" class="changeImage" /> <input
								type="hidden" name="variants[MainImageForDel][]" value="0" />
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
									data-rel="tooltip" data-title="Загрузить с интернета"
									data-original-title="">
									<i class="icon-search"></i>
								</button>
								{if $v->getMainImage()}
								<button class="btn delete_image" type="button"
									data-title="{lang('Delete','admin')}">
									<i class="icon-remove"></i>
								</button>
								{/if}
							</div>
							<img src="{$THEME}/images/select-picture.png"
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
