<section class="mini-layout">

	<div class="frame_title clearfix">
		<div class="pull-left">
			<span class="help-inline"></span> <span class="title w-s_n">{lang('Orders
				status creating','admin')}</span>
		</div>

		<div class="pull-right">
			<span class="help-inline"></span>
			<div class="d-i_b">
				<a href="{$ADMIN_URL}orderstatuses" class="pjax t-d_n m-r_15"><span
					class="f-s_14">←</span> <span class="t-d_u">{lang('Back','admin')}</span></a>
				<button type="button"
					class="btn btn-small btn-primary action_on formSubmit"
					data-action="edit" data-form="#addOrderStatusForm" data-submit>
					<i class="icon-ok icon-white"></i>{lang('Save','admin')}
				</button>
				<button type="button" class="btn btn-small action_on formSubmit"
					data-action="close" data-form="#addOrderStatusForm">
					<i class="icon-check"></i>{lang('Save and go back','admin')}
				</button>
			</div>
		</div>
	</div>
	<div class="tab-content">
		<table
			class="table table-striped table-bordered table-hover table-condensed content_big_td">
			<thead>
				<tr>
					<th colspan="6">{lang('Information','admin')}</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td colspan="6">
						<div class="inside_padd">
							<form method="post" class="form-horizontal span9"
								action="{$ADMIN_URL}orderstatuses/create"
								id="addOrderStatusForm">
								<div class="control-group">
									<label class="control-label" for="Name">
										{lang('Name','admin')}: </label>
									<div class="controls">
										<input type="text" name="Name" id="Name" class="required" />
									</div>
								</div>

								{form_csrf()}
							</form>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</section>

{/*}
<div style="float: right; padding: 2px;">
	{foreach $languages as $language} |<a {if $language.identif==
		$locale}style="font-weight: bold;"
		{/if}href="javascript:ajaxShop('orderstatuses/edit/{echo $model->getId()}/{$language.identif}');">{echo
		$language.lang_name}</a> {/foreach}
</div>
{*/}

