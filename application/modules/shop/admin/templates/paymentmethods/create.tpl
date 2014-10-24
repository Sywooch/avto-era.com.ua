<div class="container">
	<section class="mini-layout">
		<div class="frame_title clearfix">
			<div class="pull-left">
				<span class="help-inline"></span> <span class="title">{lang('Payment
					method create','admin')}</span>
			</div>
			<div class="pull-right">
				<div class="d-i_b">
					<a href="{$ADMIN_URL}paymentmethods" class="t-d_n m-r_15 pjax"><span
						class="f-s_14">←</span> <span class="t-d_u">{lang('Back','admin')}</span></a>
					<button type="button" class="btn btn-small btn-success formSubmit"
						data-form="#createPayment">
						<i class="icon-plus-sign icon-white"></i>{lang('Create','admin')}
					</button>
					<button type="button" class="btn btn-small formSubmit"
						data-form="#createPayment" data-action="exit">
						<i class="icon-check"></i>{lang('Save and go back','admin')}
					</button>
				</div>
			</div>
		</div>
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
						<div class="inside_padd">
							<div class="form-horizontal">
								<form id="createPayment" id="createPayment" method="post"
									active="{$ADMIN_URL}paymentmethods/create">
									<div class="span9">
										<div class="control-group">
											<label class="control-label" for="Name">{lang('Name','admin')}:</label>
											<div class="controls">
												<input type="text" name="Name" value="" id="Name" required />
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="CurrencyId">{lang('Currency','admin')}:</label>
											<div class="controls">
												<select name="CurrencyId" style="width: 280px;"
													id="CurrencyId"> {foreach $currencies as $c}
													<option value="{echo $c->getId()}">{echo
														ShopCore::encode($c->getName())} ({echo $c->getRate()}
														{echo $c->getSymbol()} = 1 {$CS})</option> {/foreach}
												</select>
											</div>
										</div>

										<div class="control-group">
											<div class="control-label"></div>
											<div class="controls">
												<span class="frame_label"> <span
													class="niceCheck b_n"> <input type="checkbox"
														name="Active" checked="checked" value="1" id="inputActive" />
												</span> {lang('Active','admin')}
												</span>
											</div>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="Description">{lang('Description','admin')}:</label>
										<div class="controls">
											<textarea name="Description" id="Description" value=""
												class="elRTE" id="inputDesc"></textarea>
										</div>
									</div>
								</form>
							</div>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</section>
</div>













