<!-- ---------------------------------------------------Блок видалення---------------------------------------------------- -->
<div class="modal hide fade" id="first">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3>{lang('Remove currency','admin')}</h3>
    </div>
    <div class="modal-body">
        <p>{lang('Remove the selected currency?','admin')}</p>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn btn-primary" onclick="delete_currency_function.deleteFunctionConfirm('{$ADMIN_URL}currencies/delete')" >{lang('Delete','admin')}</a>
        <a href="#" class="btn" onclick="$('.modal').modal('hide');">{lang('Cancel','admin')}</a>
    </div>
</div>

<div class="modal hide fade" id="recount">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3>{lang('Recalculation','admin')}</h3>
    </div>
    <div class="modal-body">
        <p>{lang('The currency is in use in the products. Recalculate?','admin')}</p>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn btn-primary" onclick="delete_currency_function.ajaxRecount('{$ADMIN_URL}currencies/recount')" >{lang('Recalculate','admin')}</a>
        <a href="#" class="btn" onclick="$('.modal').modal('hide');">{lang('Cancel','admin')}</a>
    </div>
</div>


<div id="delete_dialog" title="{lang('Removing properties','admin')}" style="display: none">
    {lang('Remove currency?','admin')}
</div>
<!-- ---------------------------------------------------Блок видалення---------------------------------------------------- -->

<section class="mini-layout">
    <div class="frame_title clearfix">
        <div class="pull-left">
            <span class="help-inline"></span>
            <span class="title">{lang('Currencies list','admin')}</span>
        </div>
        <div class="pull-right">
            <div class="d-i_b">
                <button class="btn" name="checkPrices">{lang('Check prices','admin')}</button>
                <a class="btn btn-small btn-success pjax" href="/admin/components/run/shop/currencies/create" ><i class="icon-plus-sign icon-white"></i>{lang('Create currency','admin')}</a>
            </div>
        </div>
    </div>
    <div class="tab-content">
        {if count($model)>0}
            <div class="row-fluid">
                <form method="post" action="#" class="form-horizontal">
                    <table class="table table-striped table-bordered table-hover table-condensed content_big_td">
                        <thead>
                            <tr>
                                <th class="span1">{lang('ID','admin')}</th>
                                <th>{lang('Name','admin')}</th>
                                <th>{lang('ISO','admin')} {lang('Code','admin')}</th>
                                <th>{lang('Character','admin')}</th>
                                <th class="span1">{lang('Main','admin')}</th>
                                <th class="span2">{lang('Additional currency','admin')}</th>
                                <th class="span1">{lang('Delete','admin')}</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            {foreach $model as $item}
                                <tr id="currency_tr{echo $item->getId()}">
                                    <td>{echo $item->getId()}</td>
                                    <td>
                                        <a class="pjax" href="/admin/components/run/shop/currencies/edit/{echo $item->getId()}" data-rel="tooltip" data-title="{lang('Editing','admin')}">{echo ShopCore::encode($item->getName())}</a>
                                    </td>
                                    <td>
                                        {echo ShopCore::encode($item->getCode())}
                                    </td>
                                    <td>{echo ShopCore::encode($item->getSymbol())}</td>
                                    {/*}<td class="t-a_c">

                                        <button data-title="{lang('Make main','admin')}" data-rel="tooltip" type="button" class="btn btn-small {if $item->getMain() == true} active{/if} currency_main" id="currmain{echo $item->getId()}" data-currid="{echo $item->getId()}" {if $item->getMain() == true}disabled="disabled"{/if}>
                                            <i class="icon-fire"></i>
                                        </button>

                                        <button data-title="{lang('Make currency default ','admin')}" data-rel="tooltip" type="button" class="btn btn-small {if $item->getIsDefault() == true} active {/if} currency_def" id="currdef{echo $item->getId()}" data-currid="{echo $item->getId()}">
                                            <i class="icon-leaf"></i>
                                        </button>


                                    <td>
                                        <input type=radio name="is_default" {if $item->getisdefault() == 1}checked=checker{/if} value="{echo $item->getid()}" onclick="changeDefaultValute({echo $item->getid()})"/>

                                    </td>
                                    { */}
                                    <td>
                                        <input type=radio name="is_main" {if $item->getmain() == 1}checked=checker{/if} value="{echo $item->getid()}" onclick="changeMainValute({echo $item->getid()})"/>

                                    </td>
                                    <td>
                                        <div class="frame_prod-on_off" data-rel="tooltip" data-placement="top" data-original-title="{lang('show','admin')}">
                                            <span   class="prod-on_off {if ShopCore::encode($item->getShowOnSite()) == 0 }disable_tovar{/if}" style="{if ShopCore::encode($item->getShowOnSite()) == 0 }left: -28px;{/if}" rel="{echo ShopCore::encode($item->getShowOnSite())}" onclick="showOnSite({echo $item->getId()}, $(this))"></span>
                                        </div>
                                    </td>
                                                    {/*}

                                        <button data-title="{lang('Delete','admin')}" data-rel="tooltip" type="button" class="btn btn-small btn-danger " onclick="delete_currency_function.deleteFunction({echo $item->getId()})">
                                                <i class="icon-trash icon-white"></i>
                                        </button>
                                    </td>{ */}
                                    <td>
                                        <button data-title="{lang('Delete','admin')}" data-rel="tooltip" type="button" class="btn btn-small btn-danger" onclick="delete_currency_function.deleteFunction({echo $item->getId()})">
                                            <i class="icon-trash icon-white"></i>
                                        </button>
                                    </td>
                                </tr>
                                                    {/foreach}
                    </tbody>
                </table>
            </form>
        </div>
                                                        {else:}
        </br>
        <div class="alert alert-info">
                                                            {lang('There are no currencies','admin')}
        </div>
                                                            {/if}
</div>
</section>
