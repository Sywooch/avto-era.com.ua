<script>
    var del = "{lang('Delete ','admin')}";
    var wf = "{lang('Notification ','admin')}";
    var jid = "{lang('ID : ','admin')}";
    var remail = "{lang('User has already been notified by e-mail  about  product arrival! Notify again? ','admin')}";
    var mail_product = "{lang('Notify a user by e-mail about product arrival?','admin')}";
    var status_notice = "{lang(' Change the status of marked notifications?','admin')}";
    var usersDatas = JSON.parse('{json_encode($emails)}');
</script>
<form method="get" action="/admin/components/run/shop/notifications/search" id="ordersListFilter" class="listFilterForm">
    <section class="mini-layout">
        <!-- ---------------------------------------------------Блок видалення---------------------------------------------------- -->    
        <div class="modal hide fade modal_del">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>{lang('Removal requests','admin')}</h3>
            </div>
            <div class="modal-body">
                <p>{lang('Delete the selected queries?','admin')}</p>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-primary" onclick="delete_function.deleteFunctionConfirm('{$ADMIN_URL}notifications/deleteAll')" >{lang('Delete','admin')}</a>
                <a href="#" class="btn" onclick="$('.modal').modal('hide');">{lang('Cancel','admin')}</a>
            </div>
        </div>
        <div id="delete_dialog" style="display: none">
            {lang('Delete the query?','admin')}
        </div>
        <!-- ---------------------------------------------------Блок видалення---------------------------------------------------- -->

        <div class="frame_title clearfix">
            <div class="pull-left">
                <span class="help-inline"></span>
                <span class="title">{lang('Arrival notification','admin')}</span>
            </div>
            <div class="pull-right">
                <div class="d-i_b">
                    {if count($model) > 0}
                        <button type="submit" {if count($model) < 1}disabled="disabled"{/if} class="btn btn-small listFilterSubmitButton"><i class="icon-filter"></i>{lang('Filter','admin')}</button>
                        <a href="{$ADMIN_URL}notifications"   title="{lang('Cancel filter','admin')}" type="button" class="btn btn-small pjax listFilterSubmitButton"><i class="icon-refresh"></i>{lang('Cancel filter','admin')}</a>
                        <button type="button" class="btn btn-small btn-danger disabled action_on" onclick="delete_function.deleteFunction()"><i class="icon-trash icon-white"></i>{lang('Delete','admin')}</button>
                        {/if}
                </div>
            </div>                            
        </div>

        <div class="btn-group myTab m-t_20" data-toggle="buttons-radio">
            <a href="#notification_all" class="btn btn-small active">{lang('All','admin')}</a>
            {foreach $notificationStatuses as $notificationStatus}
                <a href="#notification_{echo $notificationStatus->getId()}"  class="btn btn-small {$active}">{echo $notificationStatus->getName()}</a>
            {/foreach}
            <!--        <a href="#fisrt" class="btn btn-small active">Страницы и категории</a>-->
        </div>
        {if count($model) > 0}
            <div class="tab-content">
                <div class="tab-pane active" id="notification_all">

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
                                <th class="span2">{lang('E-mail','admin')}</th>
                                <th class="span2">{lang('Time of addition','admin')}</th>
                                <th class="span2">{lang('Valid until','admin')}</th>
                                <th class="span2">{lang('Manager','admin')}</th>
                                <th class="span2">{lang('Status','admin')}</th>
                                <th class="span1">{lang('Product','admin')}</th>
                                <th class="span2">{lang('Notifications','admin')}</th>
                            </tr>
                            <tr class="head_body">
                                <td></td>
                                <td class="number"><input type="text"  value="{encode($_GET.notification_id)}" name="notification_id"/></td>
                                <td><input type="text" id="usersDatas" name="user_email"  value="{echo $CI->input->get('user_email')}"/></td>
                                <td><input type="text"  id="create_date"  class="neigh_form_field help-inline datepicker" name="created" value="{encode($_GET['created'])}"/></td>
                                <td><input type="text"  class="datepicker" id="end_date" name="actual" value="{encode($_GET['actual'])}"/></td>
                                <td></td>
                                <td>
                                    <select name="status_id">
                                        <option value="">-- none --</option>
                                        {foreach $notificationStatuses as $notificationStatus}
                                            <option
                                            {if $_GET.status_id == $notificationStatus->getId() && $_GET.status_id != ''}selected="selected"{/if}
                                            value="{echo $notificationStatus->getId()}">{encode($notificationStatus->getName())}
                                        </option>
                                    {/foreach}
                                </select>
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    {if sizeof($model)>0}
                        {$ci = get_instance()}
                        {$ci->load->model('dx_auth/users', 'users')}
                        <tbody>
                            {foreach $model as $n}
                                <tr>
                                    <td class="t-a_c">
                                        <span class="frame_label">
                                            <span class="niceCheck b_n">
                                                <input type="checkbox" name="ids" value="{echo $n->getId()}"/>
                                            </span>
                                        </span>
                                    </td>
                                    <td><p><a href="/admin/components/run/shop/notifications/edit/{echo $n->getId()}" >{echo $n->getId()}</a></p></td>
                                    <td><a href="/admin/components/run/shop/notifications/edit/{echo $n->getId()}">{echo ShopCore::encode($n->getUserEmail())}</a></td>
                                    <td><p>{date("Y-m-d", $n->getDateCreated())}</p></td>
                                    <td><p>{date("Y-m-d", $n->getActiveTo())}</p></td>
                                    <td><p>
                                            {if $query = $ci->users->get_user_by_id($n->getManagerId()) AND $query->num_rows() == 1}
                                                {echo $query->row()->username}
                                            {/if}
                                        </p>
                                    </td>
                                    <td>
                                        <select>
                                            <option>--none--</option>
                                            {foreach $notificationStatuses as $notificationStatus}
                                                {if $notificationStatus->getId() == $n->getStatus()}
                                                    <option {if $n->getStatus() == $notificationStatus->getId()} selected="selected" {/if} value="{echo $notificationStatus->name}">{echo $notificationStatus->name}</option>
                                                {else:}
                                                    <option onclick="change_status('{$ADMIN_URL}notifications/changeStatus/{echo $n->getId()}/{echo $notificationStatus->getId()}');">{echo $notificationStatus->name}</option>
                                                {/if}
                                            {/foreach}
                                        </select>
                                    </td>
                                    <td>
                                        <div class="buy_prod" data-title="{lang('Product','admin')}">
                                            <span>{echo count($n->getSProducts()->getName())}</span>
                                            <i class="icon-info-sign"></i>
                                        </div>
                                        <div class="d_n">
                                            <div class="check_product">
                                                <a href="{$ADMIN_URL}products/edit/{echo $n->getSProducts()->getId()}">

                                                    <img width="50px" height="50px" title="{echo $n->getSProducts()->getName()}"  src="/uploads/shop/products/main/{echo $n->getSProducts()->getMainImage()}"  title="{lang('Notified email','admin')}"/>

                                                    <br />{echo $n->getSProducts()->getName()}
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        {if $n->getNotifiedByEmail() == true}
                                            <button class="btn btn-small disabled">
                                                <i class="icon-ok"></i>  {lang('Notified','admin')}
                                            </button>       
                                        {else:}
                                            <button class="btn btn-small" onclick="change_status('{$ADMIN_URL}notifications/notifyByEmail/{echo $n->getId()}');
        return false;">
                                                <i class="icon-envelope"></i> {lang('Notify','admin')}
                                            </button>                                           
                                        {/if}
                                    </td>
                                </tr>
                            {/foreach}
                        </tbody>
                    {else:}    
                        <div id="notice" class="alert alert-info">
                            {lang('Empty product arrival notification list.','admin')}
                        </div>
                        {return}
                    {/if}
                </table>

            </div>
            {foreach $notificationStatuses as $not}            
                <div class="tab-pane" id="notification_{echo $not->getId()}">
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
                                <th class="span3">{lang('E-mail','admin')}</th>
                                <th class="span3">{lang('Time of addition','admin')}</th>
                                <th class="span2">{lang('Valid until','admin')}</th>
                                <th class="span2">{lang('Status','admin')}</th>
                                <th class="span2">{lang('Manager','admin')}</th>
                                <th class="span1">{lang('Product','admin')}</th>
                                <th class="span2">{lang('Notifications','admin')}</th>
                            </tr>
                            {$ci = get_instance()}
                            {$ci->load->model('dx_auth/users', 'users')}
                        </thead>
                        <tbody class="sortable">
                            {foreach $model as $n}
                                {if $n->getStatus() == $not->getId()}  
                                    <tr data-status="{echo $n->getId()}" id="notification_{echo $not->getId()}" >
                                        <td class="t-a_c">
                                            <span class="frame_label">
                                                <span class="niceCheck b_n">
                                                    <input type="checkbox" name="ids" value="{echo $n->getId()}"/>
                                                </span>
                                            </span>
                                        </td>
                                        <td>
                                            <p><a href="/admin/components/run/shop/notifications/edit/{echo $n->getId()}" >{echo $n->getId()}</a></p>
                                        </td>
                                        <td>
                                            <a href="/admin/components/run/shop/notifications/edit/{echo $n->getId()}">{echo ShopCore::encode($n->getUserEmail())}</a>
                                        </td>
                                        <td><p>{date("d,m,Y H:i:s", $n->getDateCreated())}</p></td>
                                        <td><p>{date("d,m,Y H:i:s", $n->getActiveTo())}</p></td>
                                        <td>
                                            <select>
                                                {foreach $notificationStatuses as $notificationStatus}
                                                    {if $notificationStatus->getId() == $n->getStatus()}
                                                        <option {if $n->getStatus() == $not->getId()} selected="selected" {/if} value="{echo $notificationStatus->name}">{echo $notificationStatus->name}</option>
                                                    {else:}
                                                        <option onclick="change_status('{$ADMIN_URL}notifications/changeStatus/{echo $n->getId()}/{echo $notificationStatus->getId()}');">{echo $notificationStatus->name}</option>
                                                    {/if}
                                                {/foreach}
                                            </select>
                                        </td>
                                        <td>
                                            <p>
                                                {if $query = $ci->users->get_user_by_id($n->getManagerId()) AND $query->num_rows() == 1}
                                                    {echo $query->row()->username}
                                                {/if}
                                            </p>
                                        </td>   
                                        <td>
                                            <div class="buy_prod" data-title="{lang('Product','admin')}">
                                                <span>{echo count($n->getSProducts()->getName())}</span>
                                                <i class="icon-info-sign"></i>
                                            </div>
                                            <div class="d_n">
                                                <div class="check_product">
                                                    <a href="{$ADMIN_URL}products/edit/{echo $n->getSProducts()->getId()}">
                                                        <img width="50px" height="50px" title="{echo $n->getSProducts()->getName()}"  src="/uploads/shop/{echo $n->getSProducts()->getId()}_smallMod.jpg"  title="{lang('Notified email','admin')}"/>
                                                        <br/>{echo $n->getSProducts()->getName()}
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            {if $n->getNotifiedByEmail() == true}
                                                <button class="btn btn-small disabled">
                                                    <i class="icon-ok"></i>  {lang('Notified','admin')}
                                                </button> 
                                            {else:}
                                                <button class="btn btn-small" onclick="change_status('{$ADMIN_URL}notifications/notifyByEmail/{echo $n->getId()}');
        return false;">
                                                    <i class="icon-envelope"></i> {lang('Notify','admin')}
                                                </button>    
                                            {/if}

                                        </td>
                                    </tr>
                                {/if}
                            {/foreach}
                        </tbody>
                    </table>
                </div>
            {/foreach}
            <div class="tab-pane"></div>
        </div>
    {else:}
        <div class="alert alert-info" style="margin-bottom: 18px; margin-top: 18px;">
            {lang('Empty product arrival notification list.','admin')}
        </div>
    {/if}
    <div class="clearfix">
        {$pagination}
    </div>
</section>
</form>
