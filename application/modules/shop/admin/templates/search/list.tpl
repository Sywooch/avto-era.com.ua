<!-- ---------------------------------------------------Блок видалення---------------------------------------------------- -->
<div class="modal hide fade modal_del">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal"
			aria-hidden="true">&times;</button>
		<h3>{lang('Delete products','admin')}</h3>
	</div>
	<div class="modal-body">
		<p>{lang('Really delete selected products?','admin')}</p>
		<!--<p>{lang(a_products_del_body_warning)}</p>-->
	</div>
	<div class="modal-footer">
		<a href="#" class="btn btn-primary"
			onclick="delete_function.deleteFunctionConfirm('{$ADMIN_URL}products/ajaxDeleteProducts')">{lang('Delete','admin')}</a>
		<a href="#" class="btn" onclick="$('.modal').modal('hide');">{lang('Cancel','admin')}</a>
	</div>
</div>
<!-- ---------------------------------------------------Блок видалення---------------------------------------------------- -->

<div class="modal hide fade modal_move_to_cat">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal"
			aria-hidden="true">&times;</button>
		<h3>{lang('Move products','admin')}</h3>
	</div>
	<div class="modal-body">
		<select name="" id="moveCategoryId" style="width: 285px;">
			{foreach $categories as $category}
			<option {if $category->getId() == $categoryId}selected{/if}
				value="{echo
				$category->getId()}">{str_repeat('-',$category->getLevel())} {echo
				ShopCore::encode($category->getName())}</option> {/foreach}
		</select>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn btn-primary move_to_cat">{lang('Move','admin')}</a>
		<a href="#" class="btn"
			onclick="$('.modal_move_to_cat').modal('hide');">{lang('Cancel','admin')}</a>
	</div>
</div>

<!-- ---------------------------------------------------Блок видалення---------------------------------------------------- -->

<form action="{$ADMIN_URL}search/index/" id="filter_form" method="get">
	<section class="mini-layout">
		<div class="frame_title clearfix">
			<div class="pull-left">
				<span class="help-inline"></span> <span class="title">{if
					isset($_GET['WithoutImages']) AND $_GET['WithoutImages'] ==
					1}{lang('Products without images','admin')}{else:}{lang('Products
					list','admin')}{/if}{if $totalProducts!=null} ({echo
					$totalProducts}){/if}</span>
			</div>
			<div class="pull-right">
				<div class="d-i_b">

					<button title="{lang('Filter','admin')}" type="submit"
						class="btn btn-small">
						<i class="icon-filter"></i>{lang('Filter','admin')}
					</button>
					<a
						href="{$ADMIN_URL}search/index{if $_GET['WithoutImages'] == 1}?WithoutImages=1{/if}"
						title="{lang('Reset filter','admin')}" type="button"
						class="btn btn-small pjax"><i class="icon-refresh"></i>{lang('Cancel
						filter','admin')}</a>
					<div class="dropdown d-i_b">
						<button type="button"
							class="btn btn-small dropdown-toggle disabled action_on"
							data-toggle="dropdown">
							<i class="icon-tag"></i> {lang('Mark','admin')} <span
								class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<li><a class="to_hit" href="#" onclick="product.toHit()">{lang('Hit','admin')}</a></li>
							<li><a href="#" class="tonew" onclick="product.toNew()">{lang('New','admin')}</a></li>
							<li><a href="#" class="toaction"
								onclick="product.toAction()">{lang('Promotion','admin')}</a></li>
							<li><a href="#" class="clone" onclick="product.cloneTo()">{lang('Create
									copy','admin')}</a></li>
							<li><a href="#" class="tocategory"
								onclick="product.toCategory()">{lang('Move to
									category','admin')}</a></li>
						</ul>
					</div>
					<a class="btn btn-small btn-danger disabled action_on"
						id="del_in_search" onclick="delete_function.deleteFunction()"><i
						class="icon-trash icon-white"></i>{lang('Delete','admin')}</a> <a
						class="btn btn-small btn-success pjax"
						href="/admin/components/run/shop/products/create"><i
						class="icon-plus-sign icon-white"></i>{lang('Create','admin')}</a>
				</div>
			</div>
		</div>
		<div class="row-fluid">
			<table
				class="table table-striped table-bordered table-hover table-condensed products_table">
				<thead>
					<tr style="cursor: pointer;">
						<th class="t-a_c span1"><span class="frame_label"> <span
								class="niceCheck b_n"> <input type="checkbox" />
							</span>
						</span></th>
						<th class="span1 product_list_order" data-column="Id">{lang('ID','admin')}
							{if isset($_GET.orderMethod) AND $_GET.orderMethod == 'Id'} {if
							$_GET.order == 'ASC'} &nbsp;&nbsp;&nbsp;<span class="f-s_14">↑</span>
							{else:} &nbsp;&nbsp;&nbsp;<span class="f-s_14">↓</span> {/if}
							{/if}
						</th>
						<th class="span3 product_list_order" data-column="Name">{lang('Name','admin')}
							{if isset($_GET.orderMethod) AND $_GET.orderMethod == 'Name'} {if
							$_GET.order == 'ASC'} &nbsp;&nbsp;&nbsp;<span class="f-s_14">↑</span>
							{else:} &nbsp;&nbsp;&nbsp;<span class="f-s_14">↓</span> {/if}
							{/if}
						</th>
						<th class="span2 product_list_order" data-column="CategoryId">{lang('Categories','admin')}
							{if isset($_GET.orderMethod) AND $_GET.orderMethod ==
							'CategoryId'} {if $_GET.order == 'ASC'} &nbsp;&nbsp;&nbsp;<span
							class="f-s_14">↑</span> {else:} &nbsp;&nbsp;&nbsp;<span
							class="f-s_14">↓</span> {/if} {/if}
						</th>
						<th class="span1 product_list_order" data-column="Reference">{lang('Article',
							'admin')} {if isset($_GET.orderMethod) AND $_GET.orderMethod ==
							'Reference'} {if $_GET.order == 'ASC'} &nbsp;&nbsp;&nbsp;<span
							class="f-s_14">↑</span> {else:} &nbsp;&nbsp;&nbsp;<span
							class="f-s_14">↓</span> {/if} {/if}
						</th>
						<th class="span1 product_list_order" data-column="Active">{lang('Active','admin')}
							{if isset($_GET.orderMethod) AND $_GET.orderMethod == 'Active'}
							{if $_GET.order == 'ASC'} &nbsp;&nbsp;&nbsp;<span class="f-s_14">↑</span>
							{else:} &nbsp;&nbsp;&nbsp;<span class="f-s_14">↓</span> {/if}
							{/if}
						</th>
						<th class="span2">{lang('Status','admin')}</th>
						<th class="span2 product_list_order" data-column="Price">{lang('Price','admin')}
							{if isset($_GET.orderMethod) AND $_GET.orderMethod == 'Price'}
							{if $_GET.order == 'ASC'} &nbsp;&nbsp;&nbsp;<span class="f-s_14">↑</span>
							{else:} &nbsp;&nbsp;&nbsp;<span class="f-s_14">↓</span> {/if}
							{/if}
						</th>
					</tr>
					<tr class="head_body">
						<input type="hidden" name="WithoutImages"
							value="{$_GET.WithoutImages}" />
						<input type="hidden" name="orderMethod"
							value="{$_GET.orderMethod}" />
						<input type="hidden" name="order" value="{$_GET.order}" />
						<td class="t-a_c"></td>
						<td class="number">
							<div>
								<input name="filterID" type="text" value="{$_GET.filterID}" />
							</div>
						</td>
						<td><input type="text" name="text" value="{$_GET.text}" /></td>
						<td><select class="prodFilterSelect" name="CategoryId">
								<option value="0">{lang('All','admin')}</option> {foreach
								$categories as $category} {$selected = ''} {if
								$category->getId() == (int)$_GET.CategoryId}
								{$selected='selected="selected"'} {/if}
								<option value="{echo $category->getId()}"{$selected} >{str_repeat('-',$category->getLevel())}
									{echo ShopCore::encode($category->getName())}</option> {/foreach}
						</select></td>
						<td><input type="text" name="number" value="{$_GET.number}" />
						</td>
						<td><select class="prodFilterSelect" name="Active">
								<option value="">{lang('All','admin')}</option>
								<option value="true" {if $_GET['Active'] ==
									'true'}selected="selected"{/if}>{lang('Yes','admin')}</option>
								<option value="false" {if $_GET['Active'] ==
									'false'}selected="selected"{/if}>{lang('No','admin')}</option>
						</select></td>
						<td><select class="prodFilterSelect" name="s">
								<option value="">{lang('All','admin')}</option>
								<option value="Hit" {if $_GET['s'] == 'Hit'}selected="selected"{/if}>{lang('Hit','admin')}</option>
								<option value="Hot" {if $_GET['s'] == 'Hot'}selected="selected"{/if}>{lang('New','admin')}</option>
								<option value="Action" {if $_GET['s'] ==
									'Action'}selected="selected"{/if}>{lang('Promotion','admin')}</option>
						</select></td>
						<td class="number"><label> <span class="pull-left"><span
									class="neigh_form_field help-inline"></span>{lang('From','admin')}&nbsp;&nbsp;</span>
								<span class="o_h d_b"><input type="text" name="min_price"
									value="{$_GET.min_price}" /></span>
						</label> <label> <span class="pull-left"><span
									class="neigh_form_field help-inline"></span>{lang('To','admin')}&nbsp;&nbsp;</span>
								<span class="o_h d_b"><input type="text" name="max_price"
									value="{$_GET.max_price}" /></span>
						</label></td> {form_csrf()}
						</form>
					</tr>
				</thead>
				<tbody>
					{foreach $products as $p} {$variants = $p->getProductVariants()}
					{if sizeof($variants) == 1}
					<tr data-id="{echo $p->getId()}" class="simple_tr">
						<td class="t-a_c"><span class="frame_label"> <span
								class="niceCheck b_n"> <input type="checkbox" name="ids"
									value="{echo $p->getId()}" data-id="{echo $p->getId()}" />
							</span>
						</span></td>
						<td><p>{echo $p->getId()}</p></td>
						<td class="share_alt"><a
							href="/shop/product/{echo $p->getUrl()}" target="_blank"
							class="go_to_site pull-right btn btn-small" data-rel="tooltip"
							data-placement="top"
							data-original-title="{lang('go to the website','admin')}"> <i
								class="icon-share-alt"></i>
						</a> <a
							href="/admin/components/run/shop/products/edit/{echo $p->getId()}{$_SESSION['ref_url']}"
							class="pjax title" data-rel="tooltip"
							data-title="{lang('Editing','admin')}">
								{truncate(ShopCore::encode($p->getName()),100)} </a></td>
						<td class="share_alt"><a
							href="/shop/category/{echo $p->getMainCategory()->getFullPath()}"
							target="_blank" class="go_to_site pull-right btn btn-small"
							data-rel="tooltip" data-placement="top"
							data-original-title="{lang('go to the website','admin')}"> <i
								class="icon-share-alt"></i>
						</a> <a
							href="{$ADMIN_URL}categories/edit/{echo $p->getMainCategory()->getId()}"
							class="pjax" data-rel="tooltip"
							data-title="{lang('Editing','admin')}"> {echo
								$p->getMainCategory()->getName()} </a></td>
						<td>
							<p>{echo $variants[0]->getNumber()}</p>
						</td>
						<td>
							<div class="frame_prod-on_off" data-rel="tooltip"
								data-placement="top"
								data-original-title="{lang('show','admin')}">
								{if $p->getActive() == true} <span class="prod-on_off"
									data-id="{echo $p->getId()}"></span> {else:} <span
									class="prod-on_off disable_tovar" data-id="{echo $p->getId()}"></span>
								{/if}
							</div>
						</td>
						<td>{if $p->getHit() == true}
							<button type="button" data-id="{echo $p->getId()}"
								class="btn btn-small btn-primary active {if $p->getActive() != true} disabled{/if} setHit"
								data-rel="tooltip" data-placement="top"
								data-original-title="{lang('hit','admin')}">
								<i class="icon-fire"></i>
							</button> {else:}
							<button type="button" data-id="{echo $p->getId()}"
								class="btn btn-small {if $p->getActive() != true} disabled{/if} setHit"
								data-rel="tooltip" data-placement="top"
								data-original-title="{lang('hit','admin')}">
								<i class="icon-fire"></i>
							</button> {/if} {if $p->getHot() == true}
							<button type="button" data-id="{echo $p->getId()}"
								class="btn btn-small btn-primary active {if $p->getActive() != true} disabled{/if} setHot"
								data-rel="tooltip" data-placement="top"
								data-original-title="{lang('novelty','admin')}">
								<i class="icon-gift"></i>
							</button> {else:}
							<button type="button" data-id="{echo $p->getId()}"
								class="btn btn-small {if $p->getActive() != true} disabled{/if} setHot"
								data-rel="tooltip" data-placement="top"
								data-original-title="{lang('novelty','admin')}">
								<i class="icon-gift"></i>
							</button> {/if} {if $p->getAction() == true}
							<button type="button" data-id="{echo $p->getId()}"
								class="btn btn-small btn-primary active {if $p->getActive() != true} disabled{/if} setAction"
								data-rel="tooltip" data-placement="top"
								data-original-title="{lang('promotion','admin')}">
								<i class="icon-star"></i>
							</button> {else:}
							<button type="button" data-id="{echo $p->getId()}"
								class="btn btn-small {if $p->getActive() != true} disabled{/if} setAction"
								data-rel="tooltip" data-placement="top"
								data-original-title="{lang('promotion','admin')}">
								<i class="icon-star"></i>
							</button> {/if}
						</td>
						<td><span class="pull-right"><span
								class="neigh_form_field help-inline"></span>&nbsp;&nbsp;{echo
								ShopCore::app()->SCurrencyHelper->getSymbolById($variants[0]->getCurrency())}</span>
							<div class="p_r o_h frame_price number">
								<input type="text"
									value="{echo number_format($variants[0]->getPriceInMain(), ShopCore::app()->SSettings->pricePrecision, "
									.", "")}"
                                               class="js_price"
									data-value="{echo number_format($variants[0]->getPriceInMain(), 2, ".", "")}">
								<button class="btn btn-small refresh_price"
									data-id="{echo $p->getId()}" type="button">
									<i class="icon-refresh"></i>
								</button>
							</div></td>
					</tr>
					{else:}
					<tr data-id="{echo $p->getId()}" class="simple_tr">
						<td colspan="8">
							<table>
								<thead class="no_vis">
									<tr>
										<td class="span1"></td>
										<td class="span1"></td>
										<td class="span3"></td>
										<td class="span2"></td>
										<td class="span1"></td>
										<td class="span1"></td>
										<td class="span2"></td>
										<td class="span2"></td>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="t-a_c"><span class="frame_label"> <span
												class="niceCheck b_n"> <input type="checkbox"
													name="ids" value="{echo $p->getId()}"
													data-id="{echo $p->getId()}" />
											</span>
										</span></td>
										<td>
											<p>{echo $p->getId()}</p>
										</td>
										<td class="share_alt"><a
											href="/shop/product/{echo $p->getUrl()}" target="_blank"
											class="go_to_site pull-right btn btn-small"
											data-rel="tooltip" data-placement="top"
											data-original-title="{lang('go to the website','admin')}">
												<i class="icon-share-alt"></i>
										</a> <a
											href="/admin/components/run/shop/products/edit/{echo $p->getId()}{$_SESSION['ref_url']}"
											class="title" data-rel="tooltip"
											data-title="{lang('Editing','admin')}">
												{truncate(ShopCore::encode($p->getName()),100)} </a></td>
										<td class="share_alt"><a
											href="/shop/category/{echo $p->getMainCategory()->getFullPath()}"
											target="_blank" class="go_to_site pull-right btn btn-small"
											data-rel="tooltip" data-placement="top"
											data-original-title="{lang('go to the website','admin')}">
												<i class="icon-share-alt"></i>
										</a> <a
											href="{$ADMIN_URL}categories/edit/{echo $p->getMainCategory()->getId()}"
											class="pjax" data-rel="tooltip"
											data-title="{lang('Editing','admin')}"> {echo
												$p->getMainCategory()->getName()} </a></td>
										<td></td>
										<td>
											<div class="frame_prod-on_off" data-rel="tooltip"
												data-placement="top"
												data-original-title="{lang('show','admin')}">
												{if $p->getActive() == true} <span class="prod-on_off"
													data-id="{echo $p->getId()}"></span> {else:} <span
													class="prod-on_off disable_tovar"
													data-id="{echo $p->getId()}"></span> {/if}
											</div>
										</td>
										<td>{if $p->getHit() == true}
											<button type="button" data-id="{echo $p->getId()}"
												class="btn btn-small btn-primary active {if $p->getActive() != true} disabled{/if} setHit"
												data-rel="tooltip" data-placement="top"
												data-original-title="{lang('hit','admin')}">
												<i class="icon-fire"></i>
											</button> {else:}
											<button type="button" data-id="{echo $p->getId()}"
												class="btn btn-small {if $p->getActive() != true} disabled{/if} setHit"
												data-rel="tooltip" data-placement="top"
												data-original-title="{lang('hit','admin')}">
												<i class="icon-fire"></i>
											</button> {/if} {if $p->getHot() == true}
											<button type="button" data-id="{echo $p->getId()}"
												class="btn btn-small btn-primary active {if $p->getActive() != true} disabled{/if} setHot"
												data-rel="tooltip" data-placement="top"
												data-original-title="{lang('novelty','admin')}">
												<i class="icon-gift"></i>
											</button> {else:}
											<button type="button" data-id="{echo $p->getId()}"
												class="btn btn-small {if $p->getActive() != true} disabled{/if} setHot"
												data-rel="tooltip" data-placement="top"
												data-original-title="{lang('novelty','admin')}">
												<i class="icon-gift"></i>
											</button> {/if} {if $p->getAction() == true}
											<button type="button" data-id="{echo $p->getId()}"
												class="btn btn-small btn-primary active {if $p->getActive() != true} disabled{/if} setAction"
												data-rel="tooltip" data-placement="top"
												data-original-title="{lang('Promotion','admin')}">
												<i class="icon-star"></i>
											</button> {else:}
											<button type="button" data-id="{echo $p->getId()}"
												class="btn btn-small {if $p->getActive() != true} disabled{/if} setAction"
												data-rel="tooltip" data-placement="top"
												data-original-title="{lang('Promotion','admin')}">
												<i class="icon-star"></i>
											</button> {/if}
										</td>
										<td><a href="#" class="t-d_n variants"><span
												class="js">{lang('Variants','admin')}</span> <span
												class="f-s_14">↓</span></a></td>
									</tr>
									<tr style="display: none;">
										<td colspan="8">
											<table>
												<thead class="no_vis">
													<tr>
														<td class="span1"></td>
														<td class="span1"></td>
														<td class="span3"></td>
														<td class="span2"></td>
														<td class="span1"></td>
														<td class="span1"></td>
														<td class="span2"></td>
														<td class="span2"></td>
													</tr>
												</thead>
												<tbody class="sortable save_positions_variant"
													data-url="/admin/components/run/shop/search/save_positions_variant">

													{foreach $variants as $v}

													<tr data-title="{lang('Drag product variant','admin')}">
														<td class="t-a_c"><input name="idv" type="hidden"
															value="{echo $v->id}" /></td>
														<td></td>
														<td><span class="simple_tree">&#8627;</span>&nbsp;&nbsp;
															{if $v->getName() != ''} <span>{echo
																$v->getName()}</span> {else:} <span>{echo $p->getName()}</span>
															{/if}</td>
														<td></td>
														<td><p>{echo $v->getNumber()}</p></td>
														<td></td>
														<td></td>
														<td><span class="pull-right"> <span
																class="neigh_form_field help-inline"></span>&nbsp;&nbsp;{echo
																ShopCore::app()->SCurrencyHelper->getSymbolById($v->getCurrency())}
														</span>
															<div class="p_r o_h frame_price number">
																<input type="text"
																	value="{echo number_format($v->getPriceInMain(), ShopCore::app()->SSettings->pricePrecision, "
																	.", "")}"
                                                                                   class="js_price"
																	data-value="{echo number_format($v->getPriceInMain(), 2, ".", "")}">
																<button class="btn btn-small refresh_price"
																	data-id="{echo $v->getProductId()}"
																	variant-id="{echo $v->getId()}" type="button">
																	<i class="icon-refresh"></i>
																</button>
															</div></td>
													</tr>
													{/foreach}
												</tbody>
											</table>
										</td>
									</tr>
								</tbody>
							</table>
						</td>
					</tr>
					{/if} {/foreach}
				</tbody>
			</table>
			{if $totalProducts == 0}
			<div class="row-fluid news">
				<div class="span12">
					<div class="alert alert-info">
						<!--<p>{lang('Request showed no result','admin')}</p>                                -->
						<p>{lang('There are no results. Modify your search or click
							the Reset Filter','admin')}</p>
					</div>
				</div>
			</div>
		</div>

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
				products page','admin')}:</div>
		</div>
		</div>

	</section>