<div class="container">

	{if sizeof($model)==0}
	<div id="notice" class="alert alert-info">{lang('Empty status
		list.','admin')}</div>
	{return} {/if}
	<form method="post" action="{$ADMIN_URL}orderstatuses/savePositions"
		id="orderStatusesList">
		<section class="mini-layout">
			<div class="frame_title clearfix">
				<div class="pull-left">
					<span class="help-inline"></span> <span class="title">{lang('Browse
						topics callback','admin')}</span>
				</div>
				<div class="pull-right">
					<div class="d-i_b">
						<a href="{$ADMIN_URL}callbacks/createStatus"
							class="pjax btn btn-small btn-success"><i
							class="icon-plus-sign icon-white"></i>{lang('Create
							status','admin')}</a>
					</div>
				</div>
			</div>
			<div class="tab-content">
				<div class="row-fluid">
					<table
						class="table table-striped table-bordered table-hover table-condensed">
						<thead>
							<tr>
								<th class="span1">{lang('ID','admin')}</th>
								<th class="span4">{lang('Name','admin')}</th>
								<th class="span4">{lang('By default','admin')}</th>
								<th class="span1">{lang('Delete','admin')}</th>
							</tr>
						</thead>
						<tbody>
							{foreach $model as $c} {//setDefaultLanguage($c)}
							<tr data-original-title="" data-id="{echo $c->getId()}">
								<td>{echo $c->getId()}</td>
								<td><a
									href="{$ADMIN_URL}callbacks/updateStatus/{echo $c->getId()}/{$locale}"
									data-rel="tooltip"
									data-title="{lang('Edit topic callback','admin')}">{echo
										ShopCore::encode($c->getText())}</a></td>
								<td>
									<div class="frame_prod-on_off" data-rel="tooltip"
										data-placement="top"
										data-original-title="{lang('By default','admin')}">
										<span
											class="prod-on_off {if !$c->getIsDefault()} disable_tovar"
											style="left: -28px;" {else:} " style="left: 0px; "
											{/if} onclick="callbacks.setDefaultStatus({echo $c->getId()}, this)"></span>
									</div>
								</td>
								<td><a href="#"
									onclick="callbacks.deleteStatus({echo $c->getId()}); return false;"
									class="btn btn-small btn-danger my_btn_s"> <i
										class="icon-trash icon-white"></i>
								</a></td>
							</tr>
							{/foreach}
						</tbody>
					</table>
				</div>
			</div>
		</section>
	</form>
</div>