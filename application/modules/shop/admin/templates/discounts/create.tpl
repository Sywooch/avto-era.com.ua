<section class="mini-layout">
    <div class="frame_title clearfix">
        <div class="pull-left">
            <span class="help-inline"></span>
            <span class="title">{lang('Create','admin')} {lang('Discounts','admin')}</span>
        </div>
        <div class="pull-right">
            <div class="d-i_b">
                <a href="/admin/components/run/shop/discounts/index" class="t-d_n m-r_15 pjax"><span class="f-s_14">←</span> <span class="t-d_u">{lang('Back','admin')}</span></a>
                <button type="button" class="btn btn-small btn-success formSubmit" data-form="#createDiscount" data-action="edit" data-submit><i class="icon-plus-sign icon-white"></i>{lang('Create','admin')}</button>
                <button type="button" class="btn btn-small action_on formSubmit" data-form="#createDiscount" data-action="close"><i class="icon-check"></i>{lang('Save and exit','admin')}</button>                    
            </div>
        </div>                            
    </div>
    <table class="table table-striped table-bordered table-hover table-condensed content_big_td">
        <thead>
            <tr>
                <th colspan="6">
                    {lang('Payment method create','admin')}
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="6">
                    <div class="inside_padd span9">
                        <div class="form-horizontal">
                            <form id="createDiscount" method="post" active="{$ADMIN_URL}discounts/create">
                                <div class="control-group">
                                    <label class="control-label" for="Name">{lang('Name','admin')}:</label>
                                    <div class="controls">
                                        <input type="text" name="Name" id="Name" value="" required/>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <div class="control-label"></div>
                                    <div class="controls">
                                        <span class="frame_label no_connection">
                                            <span class="niceCheck b_n">
                                                <input type="checkbox" name="Active" value="1" />
                                            </span>
                                            {lang('Active','admin')}
                                        </span>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="Description">{lang('Description','admin')}:</label>
                                    <div class="controls">                                                    
                                        <textarea name="Description" id="Description"></textarea>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="DateStart">{lang('Starting date','admin')}:</label>
                                    <div class="controls">
                                        <div class="p_r input-small">
                                            <input name="DateStart" id="DateStart" value="" type="text" data-placement="top" data-original-title="{lang('choose a date','admin')}" data-rel="tooltip" class="datepicker" required/><i class="icon-calendar"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="DateStop">{lang('Finishing date ','admin')}:</label>
                                    <div class="controls">
                                        <div class="p_r input-small">
                                            <input name="DateStop" id="DateStop" value="" type="text" data-placement="top" data-original-title="{lang('choose a date','admin')}" data-rel="tooltip" class="datepicker" required/> <i class="icon-calendar"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="Discount">{lang('Discounts','admin')}:</label>
                                    <div class="controls number">
                                        <input type="text" name="Discount" id="Discount" value="" required data-max="100"/>
                                        <span class="help-block"> {lang(' Number greater than zero. To use a percent discount  apply : "SUM" format.','admin')}</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="Categories">{lang('Categories','admin')}:</label>
                                    <div class="controls">
                                        <select name="Categories[]" multiple="multiple" id="Categories" style="width:285px;height:129px;">
                                            {foreach $categoriesTree as $category}
                                                <option value="{echo $category->getId()}">{str_repeat('-',$category->getLevel())} {echo ShopCore::encode($category->getName())}</option>
                                            {/foreach}
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="Products">{lang('Enter a product for promotion','admin')}:</label>
                                    <div style="position: relative" class="controls">
                                        <input type="text" value="" class="textbox_long" onkeyup="autosearch(this,'/admin/components/run/shop/discounts/autosearch','#autodrop','autodrop')"/>
                                        <span class="help-block">{lang('Enter the name or id','admin')}</span>
                                        <div id="autodrop">
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="Products">{lang('Selected products:','admin')}</label>
                                    <div class="controls">
                                        <input type="text" name="Products" id="Products" value="" class="textbox_long" />
                                        <span class="help-block">{lang('Follow product ID by a comma.','admin')}</span>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="rolesan">{lang('User group','admin')}:</label>
                                    <div class="controls">
                                        {if empty($roles)}
                                                {lang('There are no translations users','admin')}
                                            {else:}

                                            
                                            <span class="frame_label no_connection">
                                                <span class="niceCheck b_n">
                                                    <input name="roles[]"  id="rolesan" {if isset($userGroup)}{if in_array('not_registered', $userGroup)} checked="checked" {/if} {/if}value="not_registered" type="checkbox"/>
                                                </span>
                                                {lang('Unregistered users','admin')}
                                            </span>
                                            <br/>

                                        {foreach $roles as $key => $r}
                                            <span class="frame_label no_connection">
                                                <span class="niceCheck b_n">
                                                    <input name="roles[]" id="rolesan"  value="{echo $r['id']}" type="checkbox"/>
                                                </span>
                                                {encode($r.alt_name)}
                                            </span>
                                            <br/>
                                        {/foreach}
                                        {/if}
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>                               
</section>

{literal}
    <script type="text/javascript">
                if ($.exists('.datepicker')) {
                    $( ".datepicker" ).datepicker({
                        showOtherMonths: true,
                        selectOtherMonths: true,
                        prevText: '',
                        nextText: ''
                    });
                }
                $('.ui-datepicker').addClass('dropdown-menu'); 

    </script>
{/literal}
