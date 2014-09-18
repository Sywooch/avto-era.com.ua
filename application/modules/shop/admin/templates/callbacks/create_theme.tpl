<section class="mini-layout">

    <div class="frame_title clearfix">
        <div class="pull-left">
            <span class="help-inline"></span>
            <span class="title w-s_n">{lang('Creation of the request subject','admin')}</span>
        </div>

        <div class="pull-right">
            <span class="help-inline"></span>
            <div class="d-i_b">
                <a href="{$ADMIN_URL}callbacks/themes" class="pjax t-d_n m-r_15"><span class="f-s_14">←</span> <span class="t-d_u">{lang('Back','admin')}</span></a>
                <button type="button" class="btn btn-small btn-success action_on formSubmit" data-action="edit" data-form="#addCallbackStatusForm" data-submit><i class="icon-plus-sign icon-white"></i>{lang('Create','admin')}</button>
                <button type="button" class="btn btn-small action_on formSubmit" data-action="close" data-form="#addCallbackStatusForm"><i class="icon-check"></i>{lang('Create and exit','admin')}</button>
            </div>
        </div>                            
    </div>  



    <div class="tab-content">                
        <table class="table table-striped table-bordered table-hover table-condensed content_big_td">

            <thead>
                <tr>
                    <th colspan="6">
                        {lang('Information','admin')}
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="6">
                        <div class="inside_padd">
                            <form method="post" class="form-horizontal span9" action="{$ADMIN_URL}callbacks/createTheme" id="addCallbackStatusForm">
                                <div class="control-group">
                                    <label class="control-label" for="Text">
                                        {lang('Name','admin')}:
                                    </label>
                                    <div class="controls">
                                        <input type="text" name="Text" id="Text" class="required" />	
                                    </div>
                                </div>

                                {form_csrf()}
                            </form>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>

</section>
