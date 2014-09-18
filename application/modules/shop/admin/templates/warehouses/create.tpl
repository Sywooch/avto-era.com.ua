<section class="mini-layout">
    <div class="frame_title clearfix">
        <div class="pull-left">
            <span class="help-inline"></span>
            <span class="title">{lang('Creating a warehouse','admin')}</span>
        </div>
        <div class="pull-right">
            <div class="d-i_b">
                <a href="{$ADMIN_URL}warehouses" class="t-d_n m-r_15 pjax"><span class="f-s_14">←</span> <span class="t-d_u">{lang('Back','admin')}</span></a>
                <button type="button" class="btn btn-small btn-success formSubmit" data-form="#createWarehouses"><i class="icon-plus-sign icon-white"></i>{lang('Create','admin')}</button>
                <button type="button" class="btn btn-small formSubmit" data-form="#createWarehouses" data-action="exit"><i class="icon-check"></i>{lang('Save and go back','admin')}</button>
            </div>
        </div>                            
    </div>
    <div class="tab-pane">
        <table class="table table-striped table-bordered table-hover table-condensed content_big_td">
            <thead>
                <tr>
                    <th colspan="6">
                        {lang('Properties','admin')}
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="6">
                        <div class="inside_padd">
                            <div class="form-horizontal">
                                <form id="createWarehouses" method="post" active="{$ADMIN_URL}warehouses/create" id="createWarehouses">
                                    <div class="span9">
                                        <div class="control-group">
                                            <label class="control-label" for="inputRecCount">{lang('Name','admin')}:</label>
                                            <div class="controls">
                                                <input type="text" name="Name" value="" id="inputRecCount" required/>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="inputAddress">{lang('Address','admin')}:</label>
                                            <div class="controls">
                                                <input type="text" name="Address" value=""  id="inputAddress"/>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="inputPhone">{lang('Telephone','admin')}:</label>
                                            <div class="controls">                                                    
                                                <input type="text" name="Phone" value=""  id="inputPhone"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inputDesc">{lang('Description','admin')}:</label>
                                        <div class="controls">
                                            <textarea name="Description" class="elRTE" id="inputDesc"></textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>                               
    </div>
</section>