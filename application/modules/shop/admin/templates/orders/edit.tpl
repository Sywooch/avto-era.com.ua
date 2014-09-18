{$allStatuses = SOrders::getStatuses()}
<div class="container">
    <section class="mini-layout">
        <div class="frame_title clearfix">
            <div class="pull-left">
                <span class="help-inline"></span>
                <span class="title w-s_n">{lang('Editing','admin')}:
                    {lang('Order','admin')} #{echo $model->getId()}
                    <span style="color: silver; font-size: 11px;">
                        {lang('Has been created','admin')}:{date("d-m-Y H:i", $model->getDateCreated())} - {echo STimeHelper::timeAgoInWords($model->getDateCreated())}
                    </span>
                </span>
            </div>
            <div class="pull-right">
                <span class="help-inline"></span>
                <div class="d-i_b">
                    <a href="{$ADMIN_URL}orders" class="pjax t-d_n m-r_15"><span class="f-s_14">←</span> <span class="t-d_u">{lang('Back','admin')}</span></a>
                        {if $model->getTotalPrice()}
                        <a class="btn btn-small" target="_blank" href="/admin/components/run/shop/orders/createPdf/{echo $model->getId()}">
                            {lang('Print receipt','admin')}
                        </a>
                    {/if}
                    <button type="button" class="btn btn-small action_on formSubmit btn-primary" data-action="edit" data-form="#add_order_form" data-submit><i class="icon-ok"></i>{lang('Save','admin')}</button>
                    <button type="button" class="btn btn-small action_on formSubmit" data-action="close" data-form="#add_order_form"><i class="icon-check"></i>{lang('Save and go back','admin')}</button>
                </div>
            </div>
        </div>
        <div class="clearfix">
            <div class="btn-group myTab m-t_20 pull-left" data-toggle="buttons-radio">
                <a href="#main_data" class="btn btn-small active">{lang('Basic data','admin')}</a>
                <a href="#payment_and_delivery" class="btn btn-small ">{lang('Products and order history','admin')}</a>
            </div>
        </div>
        <form method="post" action="{$ADMIN_URL}orders/edit/{echo $model->getId()}" class="form-horizontal" id="add_order_form">
            <div class="tab-content content_big_td">
                <div class="tab-pane active" id="main_data">
                    <table class="table table-striped table-bordered table-hover table-condensed">
                        <thead>
                            <tr>
                                <th colspan="6">{lang('Information','admin')}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="6">
                                    <div class="inside_padd">
                                        <div class="row-fluid">
                                            <dl class="dl-horizontal pull-left m-r_15">
                                                <dt>{lang('Date of order','admin')}:</dt>
                                                <dd>{date("Y-m-d, H:i", $model->getDateCreated())}</dd>
                                                <dt>{lang('Status','admin')}:</dt>
                                                <dd><span class="badge">{$allStatuses[$model->getStatus()]}</span></dd>
                                                <dt>{lang('Paid','admin')}:</dt>
                                                <dd>
                                                    {if $model->getPaid()}
                                                        <span class="badge badge-success">{lang('Yes','admin')}</span>
                                                    {else:}
                                                        <span class="badge ">{lang('No','admin')}</span>
                                                    {/if}
                                                </dd>
                                            </dl>
                                            <dl class="dl-horizontal pull-left">
                                                <dt>{lang('Payment method','admin')}:</dt>
                                                <dd>
                                                    {foreach $paymentMethods as $pm}
                                                        {if $pm->getId() == $model->getPaymentMethod()}
                                                            {echo $pm->getName()}
                                                        {/if}
                                                    {/foreach}
                                                    {if !$model->getPaymentMethod()}
                                                        {lang('Not specified','admin')}
                                                    {/if}
                                                </dd>
                                                <dt>{lang('Delivery Method','admin')}:</dt>
                                                <dd>
                                                    {foreach $deliveryMethods as $dm}
                                                        {if $dm->getId() == $model->getDeliveryMethod()}
                                                            {echo $dm->getName()}
                                                        {/if}
                                                    {/foreach}
                                                    {if !$model->getDeliveryMethod()}
                                                        {lang('Not specified','admin')}
                                                    {/if}
                                                </dd>

                                                <dt>{lang('Order amount','admin')}:</dt>
                                                <dd ><span class="totalOrderPrice">{echo $model->getTotalPrice()}</span> {$CS}</dd>
                                                {if $model->getDiscount()}

                                                    <dt>{lang('Discount','admin')}:</dt>
                                                    <dd >{echo ShopCore::app()->SCurrencyHelper->convert($model->getDiscount())} {$CS}</dd>
                                                    <dt>{lang('Delivery','admin')}:</dt>
                                                    <dd ><span class="totalOrderPrice">{echo ShopCore::app()->SCurrencyHelper->convert($model->getDeliveryPrice())}</span> {$CS}</dd>

                                                {/if}
                                            </dl>
                                        </div>
                                        <!--                                        <div class="control-group">
                                                                                    <label class="control-label" for="Paid"> {lang('Paid','admin')} </label>
                                                                                    <div class="controls">

                                                                                        <span class="frame_label no_connection">
                                                                                            <span style="background-position: -46px 0px; " class="niceCheck" id="paid_span">
                                                                                                <input type="checkbox" name="PaidF" id="Paid" value="1" {if $model->getPaid()==1} checked='checked' {/if}/>
                                                                                            </span>
                                                                                        </span>
                                                                                    </div>
                                                                                </div>-->
                                        <div class="control-group">
                                            <label class="control-label" for="UserFullName">
                                                {if $model->getUserId()} <a href="/admin/components/run/shop/users/edit/{echo $model->getUserId()}">
                                                        {lang('Full user name','admin')}
                                                    </a>
                                                {else:}
                                                     {lang('Full user name','admin')}
                                                {/if}: </label>
                                            <div class="controls">
                                                <input type="text" name="UserFullName" id="UserFullName"
                                                       value="{echo ShopCore::encode($model->getUserFullName())}"
                                                       class="required" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="UserEmail"> {lang('E-mail','admin')}: </label>
                                            <div class="controls">
                                                <input type="text" name="UserEmail" id="UserEmail"
                                                       value="{echo ShopCore::encode($model->getUserEmail())}"
                                                       class="email required" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="UserPhone"> {lang('Telephone','admin')}: </label>
                                            <div class="controls">
                                                <input type="text" name="UserPhone" id="UserPhone"
                                                       value="{echo ShopCore::encode($model->getUserPhone())}"
                                                       class="textbox_long" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="postAddress">
                                                {lang('Delivery Address','admin')}: </label>
                                            <div class="controls">
                                                <a onclick="orders.fixAddressA()" id="postAddressBtn" class="btn btn-small pull-right" href="http://maps.google.com/?q={echo ShopCore::encode($model->getUserDeliverTo())}"
                                                   target="_blank"
                                                   title="{lang('View','admin')} {lang('on','admin')} {lang('map','admin')}.">
                                                    <i class="icon-globe"></i> {lang('Show on map','admin')}
                                                </a>
                                                <div class="o_h">
                                                    <input type="text" name="UserDeliverTo" id="postAddress" value="{echo ShopCore::encode($model->getUserDeliverTo())}" "/>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">{lang('Delivery method','admin')}:</label>
                                            <div class="controls">
                                                <select id="shopOrdersdeliveryMethod" type="text" style="width: 200px;"  name="shop_orders[delivery_method]" value="">
                                                    {foreach $deliveryMethods as $dm}
                                                        <option {if $dm->getId() == $model->getDeliveryMethod()}selected="selected"{/if}value="{echo $dm->getId()}">{echo $dm->getName()}</option>
                                                    {/foreach}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">{lang('Payment method','admin')}:</label>
                                            <div class="controls">

                                                <select id="shopOrdersPaymentMethod" type="text"  name="shop_orders[payment_method]" value="">
                                                    {foreach $paymentMethods as $pm}
                                                        <option value="{echo $pm->getId()}"{if $pm->getId() == $model->getPaymentMethod()}selected="selected"{/if}>{echo $pm->getName()}</option>
                                                    {/foreach}
                                                </select>
                                            </div>
                                        </div>


                                        <div class="control-group">
                                            <label class="control-label" for="UserComment"> {lang('Comment','admin')}: </label>
                                            <div class="controls">
                                                <textarea name="UserComment" id="UserComment">{echo ShopCore::encode($model->getUserComment())}</textarea>
                                            </div>
                                        </div>
                                        {form_csrf()}
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row-fluid">
                        <table class="table table-striped table-bordered table-hover table-condensed" id="productsInCart">
                            <thead>
                                <tr>

                                    <th class="span5">{lang('Items in Cart','admin')}</th>
                                    <th class="span2">{lang('Reference','admin')}</th>
                                    <th class="span2">{lang('Price','admin')}</th>
                                    <th class="span1">{lang('Total','admin')}</th>
                                    <th class="span2">{lang('Total price','admin')}</th>
                                    <th class="span1">{lang('Delete','admin')}</th>

                                </tr>
                            </thead>
                            <tbody>
                                {$total = 0}
                                {foreach $model->getSOrderProductss() as $item}
                                    {if $item->getKitId() > 0}
                                        <tr>
                                            {$kitId == 0}
                                            {if $item->getIsMain()}
                                                {$kitId = $item->getKitId()}
                                                <td>
                                                    {foreach $model->getSOrderProductss() as $kititem}
                                                        {if $kititem->getKitId() == $kitId}
                                                            <a href="{base_url()}admin/components/run/shop/products/edit/{echo $item->getProductID()}" class="pjax">
                                                                {echo ShopCore::encode($kititem->getProductName())}
                                                            </a><br />
                                                            {echo ShopCore::encode($kititem->getVariantName())}
                                                            {echo ShopCore::app()->SCurrencyHelper->convert($kititem->getPrice())} {$CS} {$total = $total + $kititem->getQuantity() * $kititem->getPrice()}</br>
                                                        {/if}
                                                    {/foreach}
                                                </td>
                                                <td></td>
                                                <td>
                                                    <span class="pull-right">
                                                        <span class="neigh_form_field help-inline"></span>&nbsp;&nbsp;{$CS}
                                                    </span>
                                                    <div class="p_r o_h frame_price number">
                                                        {$kits[$item->getKitId()]['price']}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="p_r o_h frame_price number">
                                                        <input type="text" value="{echo $item->getQuantity()}" class="js_price" data-value="{echo $item->getQuantity()}" data-placement="top" data-original-title="{lang('Digits only','admin')}">
                                                        <button data-update="count" onclick="orders.updateOrderItem({echo $item->getId()}, this)" class="btn btn-small" type="button" style="display: none; "><i class="icon-refresh"></i></button>
                                                    </div>
                                                </td>
                                                <td>
                                                    {echo $item->getQuantity()*$kits[$item->getKitId()]['price']}&nbsp;{$CS}
                                                </td>
                                                <td>
                                                    <button class="btn my_btn_s btn-small" type="button" onclick="orders.deleteProduct({echo $item->getId()})"><i class="icon-trash"></i></button>
                                                </td>
                                            {/if}
                                        </tr>
                                    {else:}
                                        <tr>
                                            <td>
                                                <a href="{base_url()}admin/components/run/shop/products/edit/{echo $item->getProductID()}" class="pjax">
                                                    {echo ShopCore::encode($item->getProductName())}
                                                </a><br />
                                                {echo ShopCore::encode($item->getVariantName())}
                                            </td>
                                            <td>
                                                <div class="p_r o_h frame_price number">
                                                    <!--<input type="text" value="{echo $item->getNumber()}" class="js_price" data-value="{echo $item->getPrice()}" data-placement="top" data-original-title="{lang('Digits only','admin')}">-->
                                                    {echo $item->getNumber()}
                                                </div>
                                            </td>
                                            <td>
                                                <span class="pull-right">
                                                    <span class="neigh_form_field help-inline"></span>&nbsp;&nbsp;{$CS}
                                                </span>
                                                <div class="p_r o_h frame_price number">
                                                    <input type="text" value="{echo ShopCore::app()->SCurrencyHelper->convert($item->getPrice())}" class="js_price" data-value="{echo ShopCore::app()->SCurrencyHelper->convert($item->getPrice())}" data-placement="top" data-original-title="{lang('Digits only','admin')}">
                                                    <button data-update="price" onclick="orders.updateOrderItem({echo $item->getId()}, this)"  class=" btn btn-small" type="button" style="display: none; "><i class="icon-refresh"></i></button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="p_r o_h frame_price number">
                                                    <input type="text" value="{echo $item->getQuantity()}" class="js_price" data-value="{echo $item->getQuantity()}" data-placement="top" data-original-title="{lang('Digits only','admin')}">
                                                    <button data-update="count" onclick="orders.updateOrderItem({echo $item->getId()}, this)" class="btn btn-small" type="button" style="display: none; "><i class="icon-refresh"></i></button>
                                                </div>
                                            </td>
                                            <td>{echo ShopCore::app()->SCurrencyHelper->convert($item->getQuantity() * $item->getPrice())}&nbsp;{$CS}</td>
                                            <td><button class="btn my_btn_s btn-small" type="button" onclick="orders.deleteProduct({echo $item->getId()})"><i class="icon-trash"></i></button></td>
                                        </tr>
                                    {/if}
                                {/foreach}
                                {if $model->getgiftcertkey() != null}
                                    <tr>
                                        <td>{lang('Gift Certificate','admin')}:</td>
                                        {$giftcertprice = ShopCore::app()->SCurrencyHelper->convert($model->getgiftcertprice())}
                                        <td>{echo $giftcertprice} {$CS}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                {/if}
                                <tr>
                                    <td>
                                        <a href="#" class="btn btn-small btn-success" onclick="orders.addProduct({echo $model->getId()});">
                                            <i class="icon-plus icon-white"></i>&nbsp;{lang('Add a new product to the order','admin')}
                                        </a>
                                    </td>
                                    <td colspan="2" style="border-left: 0 !important;">
                                        {if $model->getDeliveryPrice() > 0 AND $model->getTotalPrice() < $freeFrom || $freeFrom == 0}
                                            <span class="gen_sum">{lang('Delivery','admin')}:
                                                <b>
                                                    <span class="totalOrderPrice">{echo ShopCore::app()->SCurrencyHelper->convert($model->getDeliveryPrice())}</span> {$CS}
                                                </b>
                                            </span>
                                        {/if}
                                    </td>
                                    <td colspan="2" class="t-a_r" style="border-left: 0 !important;">
                                        <span class="gen_sum">{lang('Total','admin')}:
                                            <b>{if $model->getTotalPrice() >= $freeFrom  && $freeFrom != 0}{$delivery = 0}{else:}{$delivery = ShopCore::app()->SCurrencyHelper->convert($model->getDeliveryPrice())}{/if}
                                                <span class="totalOrderPrice">
                                                    {echo $model->getTotalPrice() +  $delivery}
                                                </span> {$CS}
                                            </b>
                                        </span>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                    {$addField = ShopCore::app()->CustomFieldsHelper->getCustomFields('order', $model->getId())->asAdminHtml()}
                    {if !empty($addField)}
                        <table class="table table-striped table-bordered table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th colspan="6">
                                        {lang('Additional data','admin')}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="6">
                                        <div class="inside_padd span12">
                                            <div class="form-horizontal">
                                                {$addField}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div id="elFinder"> </div>
                    {/if}
                </div>
                {form_csrf()}
                <div class="tab-pane " id="payment_and_delivery">
                    <div class="row-fluid">
                        <div class="span5">
                            <table class="table table-striped table-bordered table-hover table-condensed">
                                <thead>
                                    <tr>
                                        <th>
                                            {lang('Ordering information','admin')}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <label for="status">{lang('Status','admin')}:</label>
                                            <div class="o_h">
                                                {form_dropdown('Status', $allStatuses, $model->getStatus(), '', 'status')}
                                            </div>
                                            <div style="padding-top:10px">
                                                <span class="frame_label no_connection">
                                                    <span id="spanPaid2" class="niceCheck" style="background-position: -46px 0px; ">
                                                        <input type="checkbox" name="Paid" id="Paid2" value="1" {if $model->getPaid()==1} checked='checked' {/if}/>
                                                    </span>
                                                    {lang('Paid','admin')}
                                                </span>
                                            </div>
                                            <label class="m-t_20" for="Comment">{lang('Commentary to change the status','admin')}:</label>
                                            <textarea name="Comment" id="Comment"></textarea>
                                            <input type="hidden" name="OrderId" value="{echo $model->getId()}"/>
                                            <div class="m-t_10">
                                                <span class="frame_label no_connection">
                                                    <span class="niceCheck" style="background-position: -46px 0px; ">
                                                        <input name="Notify" type="checkbox">
                                                    </span>
                                                    {lang('Info buyer about change status','admin')}
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="span7">
                            {if count($statusHistory)} {$counter = 1}
                                <table class="table table-bordered table-condensed">
                                    <thead>
                                        <tr>
                                            <th>{lang('Status','admin')}</th>
                                            <th>{lang('Date modified','admin')}</th>
                                            <th class="span3">{lang('Comment','admin')}</th>
                                            <th>{lang('Manager','admin')}</th>
                                            <th>{lang('Paid','admin')}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {if count($statusHistory)} {$counter = 1}
                                            {foreach $statusHistory as $sh}
                                                {if $sh == end($statusHistory)}
                                                    <tr style='background-color:#FFF4F4;border: 4px;'>
                                                        <td>
                                                            <span class="badge {if $model->getStatus() == 2} label-success {/if}">
                                                                {echo $allStatuses[$model->getStatus()]}
                                                            </span>
                                                        </td>
                                                        <td>{date("d-m-Y H:i:s", $sh->getDateCreated())}</td>
                                                        <td>{if $sh->getComment() != null}{echo $sh->getComment()}{else:}-{/if}</td>
                                                        <td style="text-align: left;">{echo $usersName[$sh->getId()]}</td>
                                                        <td>
                                                            {if $model->getPaid()}
                                                                <span class="badge badge-success">{lang('Yes','admin')}</span>
                                                            {else:}
                                                                <span class="badge"> {lang('No','admin')} </span>
                                                            {/if}
                                                        </td>
                                                    </tr>{/if}
                                                    {/foreach}
                                                        {/if}
                                                        </tbody>
                                                    </table>
                                                    <h4> {lang('Status history','admin')}</h4>
                                                    <table class="table table-striped table-bordered table-hover table-condensed">
                                                        <thead>
                                                            <tr>
                                                                <th>{lang('Status','admin')}</th>
                                                                <th>{lang('Date modified','admin')}</th>
                                                                <th class="span3">{lang('Comment','admin')}</th>
                                                                <th>{lang('Manager','admin')}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            {if count($statusHistory)} {$counter = 1}
                                                                {foreach $statusHistory as $sh}
                                                                    {if $sh != end($statusHistory)}
                                                                        <tr >
                                                                            <td><span class="label "> {echo $sh->getSOrderStatuses()->getName()} </span> </td>
                                                                            <td> <span class="time">{date("d-m-Y H:i:s", $sh->getDateCreated())} </span> </td>
                                                                            <td >{if $sh->getComment() != null}{echo $sh->getComment()}{else:}-{/if}</td>
                                                                            <td>{echo $usersName[$sh->getId()]}</td>
                                                                        </tr>
                                                                    {/if}
                                                                {/foreach}
                                                            {/if}
                                                        </tbody>
                                                    </table>

                                                    {else:}
                                                        <table class="table table-bordered table-condensed">
                                                            <thead>
                                                                <tr>
                                                                    <th>{lang('Status','admin')}</th>
                                                                    <th>{lang('Date modified','admin')}</th>
                                                                    <th class="span3">{lang('Comment','admin')}</th>
                                                                    <th>{lang('Manager','admin')}</th>
                                                                    <th>{lang('Paid','admin')}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr style='background-color:#FFF4F4;border: 4px;'>
                                                                    <td>
                                                                        <span class="badge {if $model->getStatus() == 2} label-success {/if}">
                                                                            {echo $allStatuses[$model->getStatus()]}
                                                                        </span>
                                                                    </td>
                                                                    <td>{date("d-m-Y H:i:s", $model->getDateCreated())}</td>
                                                                    <td></td>
                                                                    <td style="text-align: left;"></td>
                                                                    <td>
                                                                        {if $model->getPaid()}

                                                                            <span class="badge badge-success">{lang('Yes','admin')}</span>

                                                                        {else:}
                                                                            <span class="badge"> {lang('No','admin')} </span>
                                                                        {/if}
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        {/if}

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div style="clear: both;"></div>
                                    </section>
                                    <script type="text/javascript">
                                                    var productsAmount = "{echo $model->getTotalPrice()}";
                                                    var deliveryPrice = "{echo $model->getDeliveryPrice()}";
                                                    var giftPrice = "{echo $model->getGiftCertPrice()}";
                                                    productsAmount = parseFloat(productsAmount);
                                                    deliveryPrice = parseFloat(deliveryPrice);
                                                    giftPrice = parseFloat(giftPrice);
                                                    if (isNaN(giftPrice))
                                                        giftPrice = 0;
                                                    var deliveryPrices = new Object;
                                        {foreach $deliveryMethods as $dm}
                                                    deliveryPrices["{echo $dm->getId()}"] = parseFloat("{echo $dm->getPrice()}");
                                        {/foreach}
                                    </script>
                                    <!--  dialog  -->
                                    <div class="modal hide fade">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h3>{lang('Product addition','admin')}</h3>
                                        </div>
                                        <div class="modal-body"></div>
                                        <div class="modal-footer">
                                            <a href="#" class="btn" onclick="$('.modal').modal('hide');">{lang('Cancel','admin')}</a>
                                            <input type="submit" class="btn btn-primary formSubmit" data-form="#addToCartForm" id="addToCartConfirm" value="{lang('Add','admin')}"/>
                                        </div>
                                    </div>
                                </div>
