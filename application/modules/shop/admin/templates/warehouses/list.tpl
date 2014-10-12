<div class="container">

	<!-- ---------------------------------------------------Блок видалення---------------------------------------------------- -->
	<div class="modal hide fade modal_del">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"
				aria-hidden="true">&times;</button>
			<h3>{lang('Delete warehouse','admin')}</h3>
		</div>
		<div class="modal-body">
			<p>{lang('Really remove selected warehouses?','admin')}</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn btn-primary"
				onclick="delete_function.deleteFunctionConfirm('{$ADMIN_URL}warehouses/deleteAll')">{lang('Delete','admin')}</a>
			<a href="#" class="btn" onclick="$('.modal').modal('hide');">{lang('Cancel','admin')}</a>
		</div>
	</div>


	<div id="delete_dialog" title="{lang('Delete warehouses','admin')}"
		style="display: none">{lang('Delete warehouses','admin')}</div>
	<!-- ---------------------------------------------------Блок видалення---------------------------------------------------- -->

	<section class="mini-layout">
		<div class="frame_title clearfix">
			<div class="pull-left">
				<span class="help-inline"></span> <span class="title">{lang('Warehouses
					list','admin')}</span>
			</div>
			<div class="pull-right">
				<div class="d-i_b">
					<a class="btn btn-small btn-success pjax"
						href="/admin/components/run/shop/warehouses/create"><i
						class="icon-plus-sign icon-white"></i>{lang('Create a
						warehouse','admin')}</a>
					<button type="button"
						class="btn btn-small btn-danger disabled action_on"
						id="del_sel_warehouse" onclick="delete_function.deleteFunction()">
						<i class="icon-trash icon-white"></i>{lang('Delete','admin')}
					</button>
				</div>
			</div>
		</div>
		<div class="tab-content">
			<div class="row-fluid">
				{if count($model) > 0}
				<table
					class="table table-striped table-bordered table-hover table-condensed">
					<thead>
						<tr>
							<th class="t-a_c span1"><span class="frame_label"> <span
									class="niceCheck b_n"> <input type="checkbox" />
								</span>
							</span></th>
							<th class="span1">{lang('ID','admin')}</th>
							<th class="span5">{lang('Name','admin')}</th>
							<th class="span5">{lang('Address','admin')}</th>
						</tr>
					</thead>
					<tbody class="sortable">
						{foreach $model as $c}

						<tr>
							<td class="t-a_c"><span class="frame_label"> <span
									class="niceCheck b_n"> <input type="checkbox" name="ids"
										value="{echo $c->getId()}" />
								</span>
							</span></td>
							<td><p>{echo $c->getId()}</p></td>
							<td><a href="{$ADMIN_URL}warehouses/edit/{echo $c->getId()}"
								class="pjax" data-rel="tooltip"
								data-title="{lang('Editing','admin')}">{echo
									ShopCore::encode($c->getName())}</a></td>
							<td>{echo ShopCore::encode($c->getAddress())}</td>

						</tr>
						{/foreach}

					</tbody>
				</table>
				{else:}
				<div class="alert alert-info"
					style="margin-bottom: 18px; margin-top: 18px;">{lang('Empty
					warehouse list.','admin')}</div>
				{/if}
			</div>
		</div>
	</section>
</div>