<div class="container">
	<!-- ---------------------------------------------------Блок видалення---------------------------------------------------- -->
	<div class="modal hide fade modal_del">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"
				aria-hidden="true">&times;</button>
			<h3>{lang('Delete a property','admin')}</h3>
		</div>
		<div class="modal-body">
			<p>{lang('Remove selected properties?','admin')}</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn btn-primary"
				onclick="delete_function.deleteFunctionConfirm('{$ADMIN_URL}properties/delete')">{lang('Delete','admin')}</a>
			<a href="#" class="btn" onclick="$('.modal').modal('hide');">{lang('Cancel','admin')}</a>
		</div>
	</div>

	<!-- ---------------------------------------------------Блок видалення---------------------------------------------------- -->

	<section class="mini-layout">
		<div class="frame_title clearfix">
			<div class="pull-left">
				<span class="help-inline"></span> <span class="title">{lang('Properties
					list review','admin')}</span>
			</div>
			<div class="pull-right">
				<span class="help-inline"></span>
				<div class="d-i_b">
					<div class="d-i_b input-large">
						<select name="CategoryId" class="catfilter"
							style="margin-bottom: 0px;">
							<option value="0">- {lang('All','admin')}
								{lang('Categories','admin')} -</option> {foreach $categories as
							$category} {$selected = ''} {if $filterCategory instanceof
							SCategory && $category->getId() == $filterCategory->getId()}
							{$selected='selected="selected"'} {/if}
							<option value="{echo $category->getId()}"{$selected} >{str_repeat('-',$category->getLevel())}
								{echo ShopCore::encode($category->getName())}</option> {/foreach}
						</select>
					</div>
					<button type="button"
						class="btn btn-small btn-danger disabled action_on"
						onclick="delete_function.deleteFunction()" id="del_sel_property">
						<i class="icon-trash icon-white"></i>{lang('Delete','admin')}
					</button>
					<a class="btn btn-small btn-success pjax"
						href="/admin/components/run/shop/properties/create"><i
						class="icon-plus-sign icon-white"></i>{lang('Create a
						property','admin')}</a>
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
								<th>{lang('ID','admin')}</th>
								<th>{lang('Name','admin')}</th>
								<th>CSV {lang('Name','admin')}</th>
								<th class="span2">{lang('Status','admin')}</th>
							</tr>
						</thead>
						<tbody class="sortable save_positions"
							data-url="/admin/components/run/shop/properties/save_positions">
							{foreach $model as $p} {//setDefaultLanguage($p)}
							<tr data-id="{echo $p->getId()}">
								<td class="t-a_c"><span class="frame_label"> <span
										class="niceCheck b_n"> <input type="checkbox"
											name="ids" value="{echo $p->getId()}" />
									</span>
								</span></td>
								<td>{echo $p->getId()}</td>
								<td><a class="pjax"
									href="{$ADMIN_URL}properties/edit/{echo $p->getId()}/{echo $locale}"
									data-rel="tooltip" data-title="{lang('Editing','admin')}">{truncate(ShopCore::encode($p->getName()),100)}</a>
								</td>
								<td>{echo $p->getCSVName()}</td>
								<td class="span1">
									<div class="frame_prod-on_off" data-rel="tooltip"
										data-placement="top"
										data-original-title="{lang('switch on','admin')}"
										data-off="{lang('switch off','admin')}">
										<span
											class="prod-on_off prop_active {if $p->getActive() != 1}disable_tovar{/if}"
											data-id="{echo $p->getId()}"></span>
									</div>
								</td>
							</tr>
							{/foreach}
						</tbody>
					</table>
				</form>
			</div>
			{else:} </br>
			<div class="alert alert-info">{lang('Empty property
				list','admin')}</div>
			{/if}

			<div class="clearfix">
				{if $pagination > ''} {$pagination} {/if}
				<div class="pagination pull-right" style="margin-right: 25px;">
					<select style="max-width: 60px;"
						onchange="change_per_page(this);
                    return false;">
						{if $_COOKIE['per_page'] ==
						ShopCore::app()->SSettings->adminProductsPerPage}
						<option selected="selected" value="{echo $_COOKIE['per_page']}">{echo
							$_COOKIE['per_page']}</option>{/if}
						<option {if $_COOKIE['per_page'] == 10}selected="selected"
							{/if} value="10">10</option>
						<option {if $_COOKIE['per_page'] == 20}selected="selected"
							{/if} value="20">20</option>
						<option {if $_COOKIE['per_page'] == 30}selected="selected"
							{/if} value="30">30</option>
						<option {if $_COOKIE['per_page'] == 40}selected="selected"
							{/if} value="40">40</option>
						<option {if $_COOKIE['per_page'] == 50}selected="selected"
							{/if} value="50">50</option>
						<option {if $_COOKIE['per_page'] == 60}selected="selected"
							{/if} value="60">60</option>
						<option {if $_COOKIE['per_page'] == 70}selected="selected"
							{/if} value="70">70</option>
						<option {if $_COOKIE['per_page'] == 80}selected="selected"
							{/if} value="80">80</option>
						<option {if $_COOKIE['per_page'] == 90}selected="selected"
							{/if} value="90">90</option>
						<option {if $_COOKIE['per_page'] == 100}selected="selected"
							{/if} value="100">100</option>
					</select>
				</div>
				<div class="pagination pull-right"
					style="margin-right: 10px; margin-top: 24px;">{lang('At the
					properties page','admin')}:</div>
			</div>



		</div>
	</section>
</div>