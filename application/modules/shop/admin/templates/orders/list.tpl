<div class="container">
	<div class="modal hide fade">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"
				aria-hidden="true">&times;</button>
			<h3>{lang('Order removal','admin')}</h3>
		</div>
		<div class="modal-body">
			<p>{lang(' Delete selected orders?','admin')}</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" onclick="$('.modal').modal('hide');">{lang('Cancel','admin')}</a>
			<a href="#" class="btn btn-primary"
				onclick="orders.deleteOrdersConfirm()">{lang('Delete','admin')}</a>
		</div>
	</div>

	<form method="get" action="/admin/components/run/shop/orders/index"
		id="ordersListFilter" class="listFilterForm">
		<section class="mini-layout">
			<div class="frame_title clearfix">
				<div class="pull-left">
					<span class="help-inline"></span> <span class="title">{lang('Orders
						list','admin')} ({$totalOrders})</span>
				</div>
				<div class="pull-right">
					<div class="d-i_b">
						<button type="button"
							class="btn btn-small disabled action_on listFilterSubmitButton"
							disabled="disabled">
							<i class="icon-filter"></i>{lang('Filter','admin')}
						</button>
						<a href="{$ADMIN_URL}orders/index"
							title="{lang('Reset filter','admin')}" type="button"
							class="btn btn-small pjax"><i class="icon-refresh"></i>{lang('Cancel
							filter','admin')}</a>
						<div class="dropdown d-i_b">
							<button type="button"
								class="btn btn-small dropdown-toggle disabled action_on"
								data-toggle="dropdown">
								<i class="icon-bookmark"></i> {lang('Change status','admin')} <span
									class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li class="nav-header">{lang('Order status','admin')}</li>
								{foreach $orderStatuses as $os}
								<li><a onclick="orders.chOrderStatus({echo $os->getId()})"
									href="#" class="chOrderStatus">{echo $os->getName()}</a></li>
								{/foreach}
								<li class="nav-header">{lang('Payment status','admin')}</li>
								<li><a onclick="orders.chOrderPaid(1)" href="#"
									id="chOrderStatusNew">{lang('Paid','admin')}</a></li>
								<li><a onclick="orders.chOrderPaid(0)" href="#"
									id="chOrderStatusDelivered">{lang('Not paid','admin')}</a></li>
							</ul>
						</div>
						<button onclick="orders.deleteOrders()" type="button"
							class="btn btn-small btn-danger disabled action_on">
							<i class="icon-trash icon-white"></i>{lang('Delete','admin')}
						</button>
						<a href="/admin/components/run/shop/orders/create"
							class="btn btn-small btn-success pjax"><i
							class="icon-plus-sign icon-white"></i>{lang('Create
							order','admin')}</a>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<table
					class="table table-striped table-bordered table-hover table-condensed">
					<thead>
						<tr>
							<th class="t-a_c span1"><span class="frame_label"> <span
									class="niceCheck" style="background-position: -46px 0px;">
										<input type="checkbox">
								</span>
							</span></th>
							<th class="span1" id="orderId"><a href="#"
								class="order_list_order" data-method="Id"
								data-criteria="{if $orderField == 'Id'}{$nextOrderCriteria}{else:}ASC{/if}">{lang('ID','admin')}</a>
								{if isset($_GET['orderMethod']) AND $_GET['orderMethod'] ==
								'Id'} {if $_GET['orderCriteria'] == 'ASC'} &nbsp;&nbsp;&nbsp;<span
								class="f-s_14">↑</span> {else:} &nbsp;&nbsp;&nbsp;<span
								class="f-s_14">↓</span> {/if} {/if}</th>
							<th class="span2" id="orderStatus"><a
								class="order_list_order" href="#" data-method="Status"
								data-criteria="{if $orderField == 'Status'}{$nextOrderCriteria}{else:}ASC{/if}">{lang('Status','admin')}</a>
								{if isset($_GET['orderMethod']) AND $_GET['orderMethod'] ==
								'Status'} {if $_GET['orderCriteria'] == 'ASC'}
								&nbsp;&nbsp;&nbsp;<span class="f-s_14">↑</span> {else:}
								&nbsp;&nbsp;&nbsp;<span class="f-s_14">↓</span> {/if} {/if}</th>
							<th class="span2" id="orderDateCreated"><a href="#"
								class="order_list_order" data-method="DateCreated"
								data-criteria="{if $orderField == 'DateCreated'}{$nextOrderCriteria}{else:}ASC{/if}">{lang('Date','admin')}</a>
								{if isset($_GET['orderMethod']) AND $_GET['orderMethod'] ==
								'DateCreated'} {if $_GET['orderCriteria'] == 'ASC'}
								&nbsp;&nbsp;&nbsp;<span class="f-s_14">↑</span> {else:}
								&nbsp;&nbsp;&nbsp;<span class="f-s_14">↓</span> {/if} {/if}</th>
							<th class="span4">{lang('Customer','admin')}</th>
							<th class="span2">{lang('Products','admin')}</th>
							<th class="span2" id="orderTotalPrice"><a href="#"
								class="order_list_order" data-method="TotalPrice"
								data-criteria="{if $orderField == 'TotalPrice'}{$nextOrderCriteria}{else:}ASC{/if}">{lang('Total
									price','admin')} {lang('(no delivery)','admin')}</a> {if
								isset($_GET['orderMethod']) AND $_GET['orderMethod'] ==
								'TotalPrice'} {if $_GET['orderCriteria'] == 'ASC'}
								&nbsp;&nbsp;&nbsp;<span class="f-s_14">↑</span> {else:}
								&nbsp;&nbsp;&nbsp;<span class="f-s_14">↓</span> {/if} {/if}</th>
							<th class="span2" id="orderPaid"><a href="#"
								class="order_list_order" data-method="Paid"
								data-criteria="{if $orderField == 'Paid'}{$nextOrderCriteria}{else:}ASC{/if}">{lang('Paid','admin')}</a>
								{if isset($_GET['orderMethod']) AND $_GET['orderMethod'] ==
								'Paid'} {if $_GET['orderCriteria'] == 'ASC'} &nbsp;&nbsp;&nbsp;<span
								class="f-s_14">↑</span> {else:} &nbsp;&nbsp;&nbsp;<span
								class="f-s_14">↓</span> {/if} {/if} <input type="hidden"
								name="orderMethod"
								value="{if isset($_GET['orderMethod'])}{echo $_GET['orderMethod']}{else:}Id{/if}" />
								<!--<input type="hidden" name="orderCriteria" value="{if $_GET['orderCriteria'] != ''}{$_GET['orderCriteria']}{else:}DESC{/if}"/>-->
								<input type="hidden" name="orderCriteria"
								value="{echo $_GET['orderCriteria']}" /></th>
						</tr>
						<tr class="head_body">
							<td></td>
							<td class="number">
								<div>
									<input type="text" name="order_id" data-placement="top"
										data-original-title="{lang('numbers only','admin')}"
										value="{$_GET['order_id']}">
								</div>
							</td>
							<td><select name="status_id">
									<option {if !$_GET['status_id']} selected="selected"{/if} >--
										none --</option> {foreach $orderStatuses as $orderStatus}
									<option {if $orderStatus->getId() ==
										$_GET['status_id']} selected="selected" {/if} value="{echo
										$orderStatus->getId()}">{echo $orderStatus->getName()}</option>
									{/foreach}
							</select></td>
							<td><label> <span class="pull-left"><span
										class="neigh_form_field help-inline"></span>{lang('from','admin')}&nbsp;&nbsp;</span>
									<span class="o_h d_b p_r"> <input type="text"
										data-placement="top"
										data-original-title="{lang('choose a date','admin')}"
										data-rel="tooltip" class="datepicker " name="created_from"
										value="{$_GET['created_from']}"> <i
										class="icon-calendar"></i>
								</span>
							</label> <label> <span class="pull-left"><span
										class="neigh_form_field help-inline"></span>{lang('to','admin')}&nbsp;&nbsp;</span>
									<span class="o_h d_b p_r"> <input type="text"
										data-placement="top"
										data-original-title="{lang('choose a date','admin')}"
										data-rel="tooltip" class="datepicker " name="created_to"
										value="{$_GET['created_to']}"> <i
										class="icon-calendar"></i>
								</span>
							</label></td>
							<td><input type="text" name="customer" id="usersDatas"
								value="{$_GET['customer']}"></td>
							<td><input type="text" name="product"
								value="{$_GET['product']}" id="ordersFilterProduct"> <input
								name="product_id" type="hidden" value="{$_GET['product_id']}"
								id="ordersFilterProdId"></td>
							<td class="number"><label> <span class="pull-left"><span
										class="neigh_form_field help-inline"></span>{lang('from','admin')}&nbsp;&nbsp;</span>
									<span class="o_h d_b"><input
										value="{echo $_GET['amount_from']}" type="text"
										data-placement="top"
										data-original-title="{lang('numbers only','admin')}"
										name="amount_from"></span>
							</label> <label> <span class="pull-left"><span
										class="neigh_form_field help-inline"></span>{lang('to','admin')}&nbsp;&nbsp;</span>
									<span class="o_h d_b"><input
										value="{echo $_GET['amount_to']}" type="text"
										data-placement="top"
										data-original-title="{lang('numbers only','admin')}"
										name="amount_to"></span>
							</label></td>
							<td><select name="paid">
									<option {if !$_GET['paid']} selected="selected" {/if} value="">--
										none --</option>
									<option {if "0" === $_GET['paid']} selected="selected"
										{/if} value="0">{echo lang('No','admin')}</option>
									<option {if "1" == $_GET['paid']} selected="selected"
										{/if} value="1">{echo lang('Yes','admin')}</option>
							</select></td>
						</tr>
					</thead>
					<tbody>
						{$total_price_all=0}{$total_products=0}{$total_paid=0} {foreach
						$model as $o}
						<tr data-original-title="" class="simple_tr">
							<td class="t-a_c"><span class="frame_label"> <span
									class="niceCheck" style="background-position: -46px 0px;">
										<input type="checkbox" name="ids" value="{echo $o->getId()}">
								</span>
							</span></td>
							<td><a class="pjax"
								href="{$ADMIN_URL}orders/edit/{echo $o->getId()}"
								data-title="{lang('Edit order','admin')}" data-rel="tooltip">{echo
									$o->getId()}</a></td>
							<td><span
								class="badge {if $o->getStatus() == 2} label-success {/if}">
									{foreach $orderStatuses as $orderStatus} {if
									$orderStatus->getId() == $o->getStatus()} {echo
									$orderStatus->getName()} {/if} {/foreach} </span></td>
							<td>{date("d-m-Y, H:i:s", $o->getDateCreated())}</td>
							<td>{if $o->getUserId()}<a class="pjax"
								href="{$ADMIN_URL}users/edit/{echo $o->getUserId()}"
								data-title="{lang('Editing by','admin')}" data-rel="tooltip">{echo
									ShopCore::encode($o->getUserFullName())}</a> {else:} {echo
								ShopCore::encode($o->getUserFullName())} {/if}
							</td>
							<td>
								<div class="buy_prod"
									data-title="{lang('Purchased Product','admin')}"
									data-original-title="">
									{$count = 0} {foreach $o->getSOrderProductss() as $i} {$count
									+= $i->getQuantity()} {/foreach} <span>{echo $count}</span> <i
										class="icon-info-sign"></i>
								</div>
								<div class="d_n">
									{foreach $o->getSOrderProductss() as $p}
									<div class="check_product">
										{$productUrl = '#'} {$productModel = $p->getSProducts()} {if
										$productModel} {$productUrl =
										'/shop/product/'.$productModel->getUrl()} <a target="_blank"
											href="{$productUrl}">{echo $p->getProductName()}</a> {else:}
										{echo $p->getProductName()} {/if} {echo $p->getVariantName()}
										{echo $p->getQuantity()} {lang('pcs','admin')}. × {echo
										$p->getPrice(true)} {$CS}
									</div>
									{/foreach}
								</div>
							</td>

							<td>{//$total = 0} {foreach $o->getSOrderProductss() as $p}
								{//$total = $total + $p->getQuantity() * $p->getPrice()}
								{$total_products += $p->getQuantity()} {/foreach}
								{$total_price_all+=$o->getTotalPrice()} {//$total} {//$CS} {echo
								$o->getTotalPrice()}</td>
							<td>{$count_orders++} {if $o->getPaid() == true} <span
								class="label label-success">{lang('Yes','admin')}</span>{$total_paid++}
								{else:} <span class="label">{lang('No','admin')}</span> {/if}
							</td>
						</tr>
						{/foreach}
						<tr style="font-weight: bold;">
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>{echo $total_products++}</td>
							<td>{$total_price_all} {$CS}</td>
							<td>{echo $total_paid++} / {$count_orders}</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="clearfix">

				{$pagination}


				<div class="pagination pull-right" style="margin-right: 25px;">

					<select title="{lang('Orders on the page','admin')}"
						onchange="change_status('{$ADMIN_URL}orders/paginationVariant/' + this.value + '/1');">
						<option {if $paginationVariant== 12} selected="selected"{/if}>12</option>
						<option {if $paginationVariant== 24} selected="selected"{/if}>24</option>
						<option {if $paginationVariant== 36} selected="selected"{/if}>36</option>
						<option {if $paginationVariant== 48} selected="selected"{/if}>48</option>
						<option {if $paginationVariant== 60} selected="selected"{/if}>60</option>
						<option {if $paginationVariant== 78} selected="selected"{/if}>78</option>
						<option {if $paginationVariant== 100} selected="selected"{/if}>100</option>
					</select>
				</div>
				<div class="pagination pull-right"
					style="margin-right: 10px; margin-top: 24px;">{lang('Orders
					on the page','admin')}</div>
			</div>
		</section>
	</form>
</div>
<script type="text/javascript"> var usersDatas = {echo json_encode(array_values($usersDatas))};
                var productsDatas = {echo json_encode($productsDatas)};
                var orderField = "{$orderField}";
                var noc = "{$nextOrderCriteria}";
                var oldest_date = '{echo $oldest_order_date->oldest_date}';
                var newest_date = '{echo $oldest_order_date->newest_date}';
</script>
