<section class="mini-layout">
	<div class="frame_title clearfix">
		<div class="pull-left">
			<span class="help-inline"></span> <span class="title">{lang('Currency
				edit','admin')}</span>
		</div>
		<div class="pull-right">
			<div class="d-i_b">
				<a href="{$BASE_URL}admin/components/run/shop/currencies"
					class="t-d_n m-r_15 pjax"><span class="f-s_14">←</span> <span
					class="t-d_u">{lang('Back','admin')}</span></a>
				<button type="button" class="btn btn-small btn-primary formSubmit"
					data-form="#cur_ed_form" data-submit>
					<i class="icon-ok icon-white"></i>{lang('Save','admin')}
				</button>
				<button type="button" class="btn btn-small formSubmit"
					data-form="#cur_ed_form" data-action="tomain">
					<i class="icon-check"></i>{lang('Save and go back','admin')}
				</button>
			</div>
		</div>
	</div>
	<div class="tab-content">
		<div class="tab-pane active" id="modules">
			<form method="post"
				action="{$ADMIN_URL}currencies/edit/{echo $model->getId()}"
				class="form-horizontal" id="cur_ed_form">
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
									<div class="control-group m-t_10">
										<label class="control-label">{lang('Name','admin')}:</label>
										<div class="controls">
											<input type="text" name="Name"
												value="{echo ShopCore::encode($model->getName())}" required />
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">{lang('ISO','admin')}
											{lang('Code','admin')}:</label>
										<div class="controls">
											<input type="text" name="Code"
												value="{echo ShopCore::encode($model->getCode())}" required />
											<p class="help-block">({lang('For example','admin')} USD)</p>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">{lang('Character','admin')}:</label>
										<div class="controls">
											<input type="text" name="Symbol"
												value="{echo ShopCore::encode($model->getSymbol())}"
												required />
											<p class="help-block">({lang('For example','admin')}: $)</p>
										</div>
									</div>
									<div class="control-group" id="mod_name">
										<label class="control-label">{lang('Currency
											rate','admin')}:</label>
										<div class="controls">
											<input type="text" name="Rate"
												value="{echo $model->getRate()}" required />
											<p class="help-block">= 1.000 {$CS}</p>
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
		<div class="tab-pane"></div>
	</div>
</section>
