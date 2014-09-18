<section class="mini-layout">
    <div class="frame_title clearfix">
        <div class="pull-left">
            <span class="help-inline"></span>
            <span class="title">{lang('Edit warehouse','admin')}</span>
        </div>
        <div class="pull-right">
            <div class="d-i_b">
                <a href="{$ADMIN_URL}warehouses" class="t-d_n m-r_15 pjax"><span class="f-s_14">←</span> <span class="t-d_u">{lang('Back','admin')}</span></a>
                <button type="button" class="btn btn-small btn-primary formSubmit" data-form="#warehousEdit" data-submit><i class="icon-ok icon-white"></i>{lang('Save','admin')}</button>
                <button type="button" class="btn btn-small formSubmit" data-form="#warehousEdit" data-action="tomain"><i class="icon-check"></i>{lang('Save and go back','admin')}</button>
            </div>
        </div>                            
    </div>
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
                            <form id="warehousEdit" method="post" active="{$ADMIN_URL}warehouses/edit/{echo $model->getId()}" id="warehousEdit">
                                <div class="span9">
                                    <div class="control-group">
                                        <label class="control-label" for="inputRecCount">{lang('Name','admin')}</label>
                                        <div class="controls">
                                            <input type="text" name="Name" value="{echo encode($model->getName())}" id="inputRecCount"/>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="inputAddress">{lang('Address','admin')}:</label>
                                        <div class="controls">
                                            <input type="text" name="Address" value="{echo encode($model->getAddress())}" id="inputAddress"/>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="inputPhone">{lang('Telephone','admin')}:</label>
                                        <div class="controls">
                                            <input type="text" name="Phone" value="{echo encode($model->getPhone())}" id="inputPhone"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputDesc">{lang('Description','admin')}:</label>
                                    <div class="controls">
                                        <textarea class="elRTE" name="Description" id="inputDesc">{echo encode($model->getDescription())}</textarea>
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