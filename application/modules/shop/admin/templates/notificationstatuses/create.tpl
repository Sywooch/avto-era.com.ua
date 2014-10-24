<div class="container">
	<section class="mini-layout">
		<div class="frame_title clearfix">
			<div class="pull-left">
				<span class="help-inline"></span> <span class="title">{lang('Creation
					of Status pending','admin')}</span>

			</div>
			<div class="pull-right">
				<div class="d-i_b">
					<a href="/admin/components/run/shop/notificationstatuses/index"
						class="t-d_n m-r_15"><span class="f-s_14">←</span> <span
						class="t-d_u">{lang('Back','admin')}</span></a>
					<button type="button"
						class="btn btn-small btn-success action_on formSubmit"
						data-action="edit" data-form="#editNot" data-submit>
						<i class="icon-plus-sign icon-white"></i>{lang('Create','admin')}
					</button>
				</div>
			</div>
		</div>
		<table
			class="table table-striped table-bordered table-condensed table-hover content_big_td">
			<thead>
				<tr>
					<th colspan="6">{lang('General information','admin')}</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td colspan="6">
						<div class="inside_padd">
							<form action="{$ADMIN_URL}notificationstatuses/create"
								id="editNot" method="post" class="span9">
								<div class="form-horizontal">

									<div class="control-group">
										<label class="control-label" for="inputFio">{lang('Name','admin')}:</label>
										<div class="controls">
											<input type="text" name="Name" value="" id="inputFio"
												required />
										</div>
									</div>
								</div>
								{form_csrf()}
							</form>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</section>

</div>