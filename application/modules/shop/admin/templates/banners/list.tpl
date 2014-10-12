<div class="container">

	<!-- ---------------------------------------------------Блок видалення---------------------------------------------------- -->
	<div class="modal hide fade modal_del">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"
				aria-hidden="true">&times;</button>
			<h3>{lang('Removing banner','admin')}</h3>
		</div>
		<div class="modal-body">
			<p>{lang('Remove selected banners?','admin')}</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn btn-primary"
				onclick="delete_function.deleteFunctionConfirm('{$ADMIN_URL}banners/deleteAll')">{lang('Delete','admin')}</a>
			<a href="#" class="btn" onclick="$('.modal').modal('hide');">{lang('Cancel','admin')}</a>
		</div>
	</div>


	<div id="delete_dialog" title="{lang('Removing banner','admin')}"
		style="display: none">{lang('Remove banners?','admin')}</div>
	<!-- ---------------------------------------------------Блок видалення---------------------------------------------------- -->

	<section class="mini-layout">
		<div class="frame_title clearfix">
			<div class="pull-left">
				<span class="help-inline"></span> <span class="title">{lang('Banner
					list','admin')}</span>
			</div>
			<div class="pull-right">
				<div class="d-i_b">
					<a href="/admin/components/run/shop/banners/create"
						class="btn btn-small btn-success pjax"><i
						class="icon-plus-sign icon-white"></i>{lang('Create a
						banner','admin')}</a>
					<button type="button"
						class="btn btn-small btn-danger disabled action_on"
						id="banner_del" onclick="delete_function.deleteFunction()">
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
							<th class="span3">{lang('Name','admin')}</th>
							<th class="span2" style="width: 80px;">{lang('On the
								main','admin')}</th>
							<th class="span10">{lang('In categories','admin')}</th>
							<th class="span2" style="width: 80px;">{lang('Active
								before','admin')}</th>
							<th class="span1" style="width: 60px;">{lang('Status','admin')}</th>

						</tr>
					</thead>
					<tbody class="sortable save_positions"
						data-url='/admin/components/run/shop/banners/save_positions'>
						{foreach $model as $b} {setDefaultLanguage($b)}
						<tr>
							<td class="t-a_c span1"><span class="frame_label"> <span
									class="niceCheck b_n"> <input type="checkbox" name="ids"
										value="{echo $b->getId()}" />
								</span>
							</span></td>
							<td><p>{echo $b->getId()}</p></td>
							<td><a class="pjax"
								href="{$ADMIN_URL}banners/edit/{echo $b->getId()}/{$locale}"
								data-rel="tooltip" data-title="{lang('Editing','admin')}">{echo
									ShopCore::encode($b->getName())}</a></td>
							<td><p>{if $b->getOnMain() == 1} {lang('Yes','admin')}
									{else:}{lang('No','admin')}{/if}</p></td>
							<td><p>{if $b->getCategories()!= 'all'}
									{$categories_banner = json_decode($b->getCategories())}
									{foreach $categories_banner as $cat} {foreach $categories as
									$m_cat} {if $m_cat['id'] == $cat} {echo ' '.$m_cat['name']};
									{break;} {/if} {/foreach} {/foreach} {else:}
									{lang('All','admin')} {/if}</p></td>
							<td><p>{echo date('Y-m-d',$b->getEspdate())}</p></td>
							<td>
								<div class="frame_prod-on_off" data-rel="tooltip"
									data-placement="top"
									data-original-title="{if $b->getActive() == 1}{lang('show','admin')}{else:}{lang("
									don'tshow",'admin')}{/if}" >
									<span
										class="prod-on_off {if $b->getActive() != 1 }disable_tovar{/if}"
										style="" {if $b->getActive() == 1
										}rel="true"{else:}rel="false"{/if}
										onclick="ChangeBannerActive(this,{echo $b->getId()});"></span>
								</div>
							</td>

							</div>
							</td>
						</tr>
						{/foreach}

					</tbody>
				</table>
				{else:}
				<div class="alert alert-info"
					style="margin-bottom: 18px; margin-top: 18px;">{lang('Empty
					banner list.','admin')}</div>
				{/if}
			</div>
		</div>
	</section>
</div>