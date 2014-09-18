<div class="container">

    <!-- ---------------------------------------------------Блок видалення---------------------------------------------------- -->    
    <div class="modal hide fade modal_del">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" title="{lang('Close','admin')}" aria-hidden="true">&times;</button>
            <h3>{lang('Removing discounts','admin')}</h3>
        </div>
        <div class="modal-body">
            <p>{lang('Remove selected discount?','admin')}</p>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn btn-primary" onclick="delete_function.deleteFunctionConfirm('{$ADMIN_URL}discounts/deleteAll')" >{lang('Delete','admin')}</a>
            <a href="#" class="btn" onclick="$('.modal').modal('hide');">{lang('Cancel','admin')}</a>
        </div>
    </div>


    <div id="delete_dialog" title="{lang('Removing discounts','admin')}" style="display: none">
        {lang('Remove the discount?','admin')}
    </div>
    <!-- ---------------------------------------------------Блок видалення---------------------------------------------------- -->
    <section class="mini-layout">
        <div class="frame_title clearfix">
            <div class="pull-left">
                <span class="help-inline"></span>
                <span class="title">{lang('List of permanent discounts','admin')}</span>
            </div>
            <div class="pull-right">
                <div class="d-i_b">
                    <a class="btn btn-small btn-primary pjax" href="/admin/components/run/shop/comulativ/allusers"><i class="icon-plus-sign icon-white"></i>{lang('Deposit rates','admin')}</a> 
                    <a class="btn btn-small btn-success pjax" href="/admin/components/run/shop/discounts/create"><i class="icon-plus-sign icon-white"></i>{lang('Create a discount','admin')}</a>
                    <button type="button" class="btn btn-small btn-danger disabled action_on" onclick="delete_function.deleteFunction()" ><i class="icon-trash icon-white"></i>{lang('Delete','admin')}</button>        

                </div>
            </div>                            
        </div>
        <div class="tab-content">
            <div class="row-fluid">
                {if count($model) > 0}
                    <table class="table table-striped table-bordered table-hover table-condensed">
                        <thead>
                            <tr>
                                <th class="t-a_c span1">
                                    <span class="frame_label">
                                        <span class="niceCheck b_n">
                                            <input type="checkbox"/>
                                        </span>
                                    </span>
                                </th>
                                <th class="span1">{lang('ID','admin')}</th>
                                <th class="span4">{lang('Name','admin')}</th>
                                <th class="span4">{lang('Starting date','admin')}</th>
                                <th class="span4">{lang('Finishing date ','admin')}</th>
                                <th class="span2">{lang('Active','admin')}</th>
                            </tr>
                        </thead>
                        <tbody>
                            {foreach $model as $c}

                                <tr>
                                    <td class="t-a_c">
                                        <span class="frame_label">
                                            <span class="niceCheck b_n">
                                                <input type="checkbox" name="ids" value="{echo $c->getId()}"/>
                                            </span>
                                        </span>
                                    </td>
                                    <td><p>{echo $c->getId()}</p></td>
                                    <td>
                                        <a href="{$ADMIN_URL}discounts/edit/{echo $c->getId()}" data-rel="tooltip" data-title="{lang('Editing','admin')}" class="pjax">{echo ShopCore::encode($c->getName())}</a>
                                    </td>
                                    <td><p>{echo date('d/m/Y',$c->getDateStart())}</p></td>
                                    <td><p>{echo date('d/m/Y',$c->getDateStop())}</p></td>                                
                                    <td>
                                        <div class="frame_prod-on_off" data-rel="tooltip" data-placement="top" data-original-title="{lang('Active','admin')}" onclick="change_status('{$ADMIN_URL}discounts/change_discount_status/{echo $c->getId()}');" >
                                            <span class="prod-on_off {if $c->getActive() == NULL}disable_tovar{/if}" style="{if $c->getActive() == NULL}left: -28px;{/if}"></span>
                                        </div>
                                    </td>
                                </tr>
                            {/foreach}

                        </tbody>
                    </table>
                {else:}
                    <div class="alert alert-info" style="margin-bottom: 18px; margin-top: 18px;">
                        {lang('Empty discount list','admin')}
                    </div>
                {/if}
            </div>
        </div>
    </section>
</div>