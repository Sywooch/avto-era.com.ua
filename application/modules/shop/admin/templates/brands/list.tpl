<!-- ---------------------------------------------------Блок видалення---------------------------------------------------- -->
<div class="modal hide fade modal_del">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal"
			aria-hidden="true">&times;</button>
		<h3>{lang('Removing brand','admin')}</h3>
	</div>
	<div class="modal-body">
		<p>{lang('Remove selected brands?','admin')}</p>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn btn-primary"
			onclick="delete_function.deleteFunctionConfirm('{$ADMIN_URL}brands/delete')">{lang('Delete','admin')}</a>
		<a href="#" class="btn" onclick="$('.modal').modal('hide');">{lang('Cancel','admin')}</a>
	</div>
</div>


<div id="delete_dialog" title="{lang('Removing brand','admin')}"
	style="display: none">{lang('Remove brands?','admin')}</div>
<!-- ---------------------------------------------------Блок видалення---------------------------------------------------- -->

<section class="mini-layout">
	<div class="frame_title clearfix">
		<div class="pull-left">
			<span class="help-inline"></span> <span class="title">{lang('List
				of brands','admin')}</span>
		</div>
		<div class="pull-right">
			<div class="d-i_b">
				<a class="btn btn-small btn-success pjax"
					href="/admin/components/run/shop/brands/create"><i
					class="icon-plus-sign icon-white"></i>{lang('Create a
					brand','admin')}</a>
				<button type="button"
					class="btn btn-small btn-danger disabled action_on"
					onclick="delete_function.deleteFunction()" id="del_sel_brand">
					<i class="icon-trash icon-white"></i>{lang('Delete','admin')}
				</button>
			</div>
		</div>
	</div>
	<div class="tab-content">
		{if count($model)>0}
		<div class="row-fluid">
			<form method="post" action="#" class="form-horizontal">
				<table
					class="table table-striped table-bordered table-hover table-condensed content_big_td">
					<thead>
						<tr>
							<th class="span1 t-a_c"><span class="frame_label"> <span
									class="niceCheck b_n"> <input type="checkbox" />
								</span>
							</span></th>
							<th class="span1">{lang('ID','admin')}</th>
							<th>{lang('Name','admin')}</th>
							<th>{lang('URL','admin')}</th>
							<!--<th class="span1"></th>-->
						</tr>
					</thead>
					<tbody class="sortable save_positions"
						data-url="/admin/components/run/shop/brands/save_positions">
						{foreach $model as $item} {//setDefaultLanguage($item)}
						<tr>
							<td class="t-a_c"><span class="frame_label"> <span
									class="niceCheck b_n"> <input type="checkbox" name="ids"
										value="{echo $item->getId()}" />
								</span>
							</span></td>
							<td>{echo $item->getId()}</td>
							<td><a class="pjax"
								href="/admin/components/run/shop/brands/edit/{echo $item->getId()}/{echo $item->getLocale()}"
								data-rel="tooltip" data-title="{lang('Editing','admin')}">{echo
									ShopCore::encode($item->getName())}</a></td>
							<td><a href="{echo shop_url('brand/'.$item->getUrl())}"
								target="_blank">{echo shop_url('brand/'.$item->getUrl())}</a></td>
						</tr>
						{/foreach}
					</tbody>
				</table>
				<div class="clearfix">{echo $pagination}</div>
			</form>
		</div>
		{else:} </br>
		<div class="alert alert-info">{lang('Brands list is
			empty.','admin')}</div>
		{/if}
	</div>
</section>