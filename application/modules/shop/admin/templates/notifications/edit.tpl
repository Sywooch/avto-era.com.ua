<div class="container">
	<section class="mini-layout">
		<div class="frame_title clearfix">
			<div class="pull-left">
				<span class="help-inline"></span> <span class="title">{lang('The
					request for notification','admin')}</span> <span
					style="color: silver; font-size: 11px;">{lang('by','admin')}
					{echo STimeHelper::timeAgoInWords($model->getDateCreated())}</span>
			</div>
			<div class="pull-right">
				<div class="d-i_b">
					<a href="/admin/components/run/shop/notifications"
						class="t-d_n m-r_15"><span class="f-s_14">←</span> <span
						class="t-d_u">{lang('Back','admin')}</span></a>
					<button type="button" class="btn btn-small btn-primary formSubmit"
						data-form="#editNot" data-action="edit" data-submit>
						<i class="icon-ok icon-white"></i>{lang('Save','admin')}
					</button>
					<button type="button" class="btn btn-small action_on formSubmit"
						data-action="close" data-form="#editNot">
						<i class="icon-check"></i>{lang('Save and exit','admin')}
					</button>

				</div>
			</div>
		</div>
		<div class="content_big_td">
			<table
				class="table table-striped table-bordered table-hover table-condensed">
				<thead>
					<tr>
						<th colspan="6">{lang('Data','admin')}</th>
					</tr>
				</thead>
				<tbody>
					<form
						action="{$ADMIN_URL}notifications/edit/{echo $model->getId()}"
						id="editNot" method="post">
						<tr>
							<td colspan="6">
								<div class="inside_padd">
									<div class="span9">
										<div class="row">
											<dl class="dl-horizontal pull-left"
												style="margin-right: 70px;">
												<dt>{lang('ID','admin')}:</dt>
												<dd>{echo $model->getId()}</dd>
												<dt>{lang('Status','admin')}:</dt>
												<dd>
													<select name="Status"> {foreach
														$notificationStatuses as $notificationStatus}
														<option value="{echo $notificationStatus->getId()}"
															{if $notificationStatus->getId() ==
															$model->getStatus()}selected="selected"{/if}> {echo
															$notificationStatus->getName()}</option> {/foreach}
													</select>
												</dd>

												<dt>{lang('Date of creation','admin')}:</dt>
												<dd>{date("d-m-Y H:i", $model->getDateCreated())}</dd>
												<dt>{lang('Status has been set','admin')}:</dt>
												<dd>{echo ShopCore::encode($managerName)}</dd>
												<dt>{lang('Arrival notification','admin')}:</dt>
												<dd>
													{if $model->getNotifiedByEmail() == true} <img
														src="/application/modules/shop/admin/templates/assets/images/mail_sent.png"
														class="proccessNotificationButton"
														title="{lang('Notify a buyer about the status change','admin')}" />
													{else:} <img
														src="/application/modules/shop/admin/templates/assets/images/mail_send.png"
														class="proccessNotificationButton"
														onclick="change_status('{$ADMIN_URL}notifications/notifyByEmail/{echo $model->getId()}')"
														title="{lang('E-mail notification','admin')}" /> {/if}
												</dd>
											</dl>
										</div>

										<div class="form-horizontal">

											<div class="control-group">
												<label class="control-label" for="inputFio">{lang('User
													name','admin')}:</label>
												<div class="controls">
													<input type="text"
														value="{echo ShopCore::encode($model->getUserName())}" />
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="inputPhone">{lang('E-mail','admin')}:</label>
												<div class="controls">
													<input type="text"
														value="{echo ShopCore::encode($model->getUserEmail())}" />
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="inputEmail">{lang('Telephone','admin')}:</label>
												<div class="controls">
													<input type="text"
														value="{echo ShopCore::encode($model->getUserPhone())}" />

												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="inputAddress">{lang('Comment','admin')}:</label>
												<div class="controls">
													<textarea disabled="disabled" name="UserComment">{echo ShopCore::encode($model->getUserComment())}</textarea>
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
		<div class="frame_table row-fluid">
			<table
				class="table table-striped table-bordered table-hover table-condensed">
				<thead>
					<tr>
						<th class="span2">{lang('Image','admin')}</th>
						<th class="span10">{lang('Product','admin')}</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><a
							href="{$ADMIN_URL}products/edit/{echo $product->getId()}"> <img
								width="60px" height="60px"
								src="{echo $product->firstVariant->getSmallPhoto()}"
								title="{lang('Notified email','admin')}" />
						</a></td>
						<td><a
							href="{$ADMIN_URL}products/edit/{echo $product->getId()}">{echo
								ShopCore::encode($product->getName())}</a></td>
					</tr>
					</form>
				</tbody>
			</table>
		</div>
	</section>

</div>