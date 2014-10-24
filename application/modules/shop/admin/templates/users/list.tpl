<div class="container">

	<!-- ---------------------------------------------------Блок видалення---------------------------------------------------- -->
	<div class="modal hide fade modal_del">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"
				aria-hidden="true">&times;</button>
			<h3>{lang('Deleting a user','admin')}</h3>
		</div>
		<div class="modal-body">
			<p>{lang('Remove selected users?','admin')}</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn btn-primary"
				onclick="delete_function.deleteFunctionConfirm('{$ADMIN_URL}users/deleteAll')">{lang('Delete','admin')}</a>
			<a href="#" class="btn" onclick="$('.modal').modal('hide');">{lang('Cancel','admin')}</a>
		</div>
	</div>


	<div id="delete_dialog" title="{lang('Deleting a user','admin')}"
		style="display: none">{lang('Deleting a user','admin')}</div>
	<!-- ---------------------------------------------------Блок видалення---------------------------------------------------- -->

	<section class="mini-layout">
		<div class="frame_title clearfix">
			<div class="pull-left">
				<span class="help-inline"></span> <span class="title">{lang('Users
					list','admin')}</span>
			</div>
			<div class="pull-right">
				<div class="d-i_b">
					<button type="button"
						class="btn btn-small action_on disabled listFilterSubmitButton">
						<i class="icon-filter"></i>{lang('Filter','admin')}
					</button>
					<a href="{$ADMIN_URL}users/index"
						title="{lang('Cancel filter','admin')}" type="button"
						class="btn btn-small pjax action_on disabled listFilterSubmitButton"><i
						class="icon-refresh"></i>{lang('Cancel filter','admin')}</a> <a
						class="btn btn-small btn-success pjax"
						href="/admin/components/run/shop/users/create"><i
						class="icon-plus-sign icon-white"></i>{lang('Create
						user','admin')}</a>
					<button type="button"
						class="btn btn-small btn-danger disabled action_on"
						onclick="delete_function.deleteFunction()">
						<i class="icon-trash icon-white"></i>{lang('Delete','admin')}
					</button>
				</div>
			</div>
		</div>
		<div class="content_big_td row-fluid">
			<div class="clearfix">
				<div class="btn-group myTab m-t_20 pull-left"
					data-toggle="buttons-radio">
					<a href="#users" class="btn btn-small active">{lang('User','admin')}</a>
					<a href="#export" class="btn btn-small">{lang('Export','admin')}</a>
				</div>
			</div>
			<div class="tab-content">
				<div class="tab-pane active" id="users">
					<form method="get" action="/admin/components/run/shop/users/index"
						id="ordersListFilter" class="listFilterForm">
						<table
							class="table table-striped table-bordered table-hover table-condensed">
							<thead>
								<tr>
									<th class="t-a_c span1"><span class="frame_label">
											<span class="niceCheck b_n"> <input type="checkbox" />
										</span>
									</span></th>
									<th class="span1">{lang('ID','admin')}</th>
									<th class="span5">{lang('E-mail','admin')}</th>
									<th class="span5">{lang('User','admin')}</th>
									<th class="span3">{lang('Role','admin')}</th>
									<th class="span2">{lang('Time of registration','admin')}</th>
									<th class="span2">{lang('Purchase price','admin')}</th>
								</tr>
								<tr class="head_body">
									<td></td>
									<td></td>
									<td><input type="text" data-provide="typeahead"
										data-items="5" id="shopEmailAutoC" value="{$_GET['email']}"
										name="email" /></td>
									<td><input type="text" data-provide="typeahead"
										data-items="5" id="shopNameAutoC" value="{$_GET['name']}"
										name="name" /></td>
									<td>{ /* }<input type="text" data-provide="typeahead"
										data-items="5" id="shopRoleAutoC" value="{$_GET['role']}"
										name="role" />{ */ } <select id="shopRoleAutoC" name="role"
										onchange="submit()"> {foreach $roles as $key =>
											$role}
											<option {if $key==
												$_GET['role']} selected {/if}value="{echo $key}">{echo
												$role}</option> {/foreach}
											<option {if !$_GET['role']}selected{/if} value="0">{lang('Simple
												user', 'admin')}</option>
									</select>
									</td>
									<td><label> <span class="pull-left"><span
												class="neigh_form_field help-inline"></span>{lang('from','admin')}&nbsp;&nbsp;</span>
											<span class="o_h d_b p_r"> <input type="text"
												data-placement="top"
												data-original-title="{lang('choose a date','admin')}"
												data-rel="tooltip" class="datepicker " name="dateCreated_f"
												value="{$_GET['dateCreated_f']}"> <i
												class="icon-calendar"></i>
										</span>
									</label> <label> <span class="pull-left"><span
												class="neigh_form_field help-inline"></span>{lang('to','admin')}&nbsp;&nbsp;</span>
											<span class="o_h d_b p_r"> <input type="text"
												data-placement="top"
												data-original-title="{lang('choose a date','admin')}"
												data-rel="tooltip" class="datepicker " name="dateCreated_t"
												value="{$_GET['dateCreated_t']}"> <i
												class="icon-calendar"></i>
										</span>
									</label></td>
									<td><label> <span class="pull-left"><span
												class="neigh_form_field help-inline"></span>{lang('from','admin')}&nbsp;&nbsp;</span>
											<span class="o_h d_b p_r"> <input type="text"
												data-placement="top"
												data-original-title="{lang('numbers only','admin')}"
												data-rel="tooltip" name="amout_f" value="{$_GET['amout_f']}">

										</span>
									</label> <label> <span class="pull-left"><span
												class="neigh_form_field help-inline"></span>{lang('to','admin')}&nbsp;&nbsp;</span>
											<span class="o_h d_b p_r"> <input type="text"
												data-placement="top"
												data-original-title="{lang('numbers only','admin')}"
												data-rel="tooltip" name="amout_t" value="{$_GET['amout_t']}">
										</span>
									</label></td>
								</tr>
							</thead>
							<tbody>
								{foreach $model as $u}
								<tr class="simple_tr">
									<td class="t-a_c">{if $u->getId() !=
										$CI->dx_auth->get_user_id()} <span class="frame_label">
											<span class="niceCheck b_n"> <input type="checkbox"
												name="ids" value="{echo $u->getId()}" />
										</span>
									</span> {/if}
									</td>
									<td><a href="{$ADMIN_URL}users/edit/{echo $u->getId()}"
										class="pjax">{echo $u->getId()}</a></td>
									<td><span>{echo
											ShopCore::encode($u->getUserEmail())}</span></td>
									<td><a href="{$ADMIN_URL}users/edit/{echo $u->getId()}"
										class="pjax" data-title="{lang('Edit','admin')}"
										data-rel="tooltip">{echo
											ShopCore::encode($u->getFullName())}</a></td>
									<td><span>{if $_GET['role'] &&
											$roles[$u->getRoleId()]}{echo
											$roles[$u->getRoleId()]}{else:}{lang('Simple user',
											'admin')}{/if}</span></td>
									<td><p>{date("Y-m-d", $u->getDateCreated())}</p></td>
									<td><p>{echo $u->getAmout()} {$CS}</p></td>

								</tr>

								{/foreach}

							</tbody>
						</table>
						<div class="clearfix">{if $paginator}{$paginator}{/if}</div>
					</form>
				</div>
				<div class="tab-pane" id="export">
					<form id="exportUsers" method="post"
						action="{$ADMIN_URL}system/exportUsers">
						<table
							class="table table-striped table-bordered table-hover table-condensed">
							<thead>
								<tr>
									<th colspan="6">{lang('Export','admin')}</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="6">
										<div class="inside_padd">
											<div class="form-horizontal">
												<div class="row-fluid">
													<button type="button"
														class="btn btn-small action_on formSubmit export"
														data-form="#exportUsers">
														<i class="icon-plus-sign"></i>{lang('Export','admin')}
													</button>
													<div class="control-group">

														<label class="control-label"> <span
															class="popover_ref" data-title="<b>CSV</b>"> <i
																class="icon-info-sign"></i>
														</span>
															<div class="d_n">
																{lang('Export CSV gives <br />jumps file with <br />a
																list of all<br /> users.','admin')}
															</div> <span>CSV (" ",):</span>
														</label>
														<div class="controls">

															<input type="radio" name="export" id="csv" value="csv" />

														</div>
													</div>
													<div class="control-group">
														<label class="control-label"> <span
															class="popover_ref" data-title="<b>MailChimp</b>">
																<i class="icon-info-sign"></i>
														</span>
															<div class="d_n">
																{lang('Export Mailchimp sent <br />to all users on
																their<br /> email subscription<br /> form on your<br />
																news rassilku.','admin')}
															</div> <span>MailChimp:</span>
														</label>
														<div class="controls">
															<input type="radio" name="export" id="monkey"
																value="monkey" />
														</div>
													</div>
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
	</section>
</div>
<script type="text/javascript">
                var usersDatas = {echo json_encode(array_values($usersDatas))};
        </script>
{literal}
<script type="text/javascript">
                window.onload = function() {
                    if ($.exists('.datepicker')) {
                        $(".datepicker").datepicker({
                            showOtherMonths: true,
                            selectOtherMonths: true,
                            prevText: '',
                            nextText: ''
                        });
                    }
                    $('.ui-datepicker').addClass('dropdown-menu');
                }
            </script>
{/literal}
