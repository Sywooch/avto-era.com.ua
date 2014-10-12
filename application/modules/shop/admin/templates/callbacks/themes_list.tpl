<div class="container">
	<form method="post" action="{$ADMIN_URL}orderstatuses/savePositions"
		id="orderStatusesList">
		<section class="mini-layout">
			<div class="frame_title clearfix">
				<div class="pull-left">
					<span class="help-inline"></span> <span class="title">{lang('Browse
						topics collback','admin')}</span>
				</div>
				<div class="pull-right">
					<div class="d-i_b">
						<a href="{$ADMIN_URL}callbacks/createTheme"
							class="pjax btn btn-small btn-success"><i
							class="icon-plus-sign icon-white"></i>{lang('Add a new
							topic','admin')}</a>
					</div>
				</div>
			</div>
			<div class="tab-content">
				<div class="row-fluid">
					<table
						class="table table-striped table-bordered table-hover table-condensed">
						<thead>
							<tr>
								<th class="span1">ID</th>
								<th class="span4">{lang('Text','admin')}</th>
								<th class="span1">{lang('Delete','admin')}</th>
							</tr>
						</thead>
						<tbody class="sortable sortable-ui"
							data-chfunction="callbacks.reorderThemes">
							{foreach $model as $c} {//setDefaultLanguage($c)}
							<tr data-original-title="" data-id="{echo $c->getId()}">
								<td>{echo $c->getId()}</td>
								<td><a
									href="{$ADMIN_URL}callbacks/updateTheme/{echo $c->getId()}/{$locale}"
									data-rel="tooltip"
									data-title="{lang('Request subject editing','admin')}">{echo
										ShopCore::encode($c->getText())}</a></td>
								<td class="t-a_c span1"><a href="#"
									onclick="callbacks.deleteTheme({echo $c->getId()});
                                            return false;"
									class="btn btn-small my_btn_s"> <i class="icon-trash"></i></a>
								</td>
							</tr>
							{/foreach}
						</tbody>
					</table>
				</div>
			</div>
			{/*else:}
			<div class="alert alert-info"
				style="margin-bottom: 18px; margin-top: 18px;">{lang('List of
				callbacks is empty','admin')}</div>
			{/if*/}
		</section>
	</form>
</div>
