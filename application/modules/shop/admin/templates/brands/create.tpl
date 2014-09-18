<section class="mini-layout">
    <div class="frame_title clearfix">
        <div class="pull-left">
            <span class="help-inline"></span>
            <span class="title">{lang('Create brand','admin')}</span>
        </div>
        <div class="pull-right">
            <div class="d-i_b">
                <a href="{$BASE_URL}admin/components/run/shop/brands/index" class="t-d_n m-r_15 pjax"><span class="f-s_14">←</span> <span class="t-d_u">{lang('Back','admin')}</span></a>
                <button type="button" class="btn btn-small btn-success formSubmit" data-form="#br_cr_form" data-submit><i class="icon-plus-sign icon-white"></i>{lang('Create','admin')}</button>
                <button type="button" class="btn btn-small formSubmit" data-form="#br_cr_form" data-action="exit"><i class="icon-check"></i>{lang('Create and exit','admin')}</button>
            </div>
        </div>                            
    </div>
    <div class="tab-content">
        <div class="tab-pane active" id="modules">
            <form method="post" action="{$BASE_URL}admin/components/run/shop/brands/create" class="form-horizontal" id="br_cr_form" enctype="multipart/form-data">
                <input type="hidden" name="Locale" value="{echo $locale}"/>
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
                                    <div class="span9">
                                        <div class="control-group m-t_10">
                                            <label class="control-label" for="Name">{lang('Name','admin')}:</label>
                                            <div class="controls">
                                                <input type="text" id="Name" name="Name" value="" required/>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="Url">{lang('URL','admin')}:</label>
                                            <div class="controls">
                                                <input type="text" id="Url" name="Url" value=""/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="Description">{lang('Description','admin')}:</label>
                                        <div class="controls">
                                            <textarea name="Description" class="elRTE"></textarea>
                                        </div>
                                    </div>
                                    <div class="span9">
                                        <div class="control-group" id="mod_name">
                                            <label class="control-label" for="MetaTitle">{lang('Meta Title','admin')}:</label>
                                            <div class="controls" >
                                                <input type="text" id="MetaTitle" name="MetaTitle" value=""/>
                                            </div>
                                        </div>
                                        <div class="control-group" id="mod_name">
                                            <label class="control-label" for="MetaDescription">{lang('Meta Description','admin')}:</label>
                                            <div class="controls" >
                                                <input type="text" id="MetaDescription" name="MetaDescription" value=""/>
                                            </div>
                                        </div>
                                        <div class="control-group" id="mod_name">
                                            <label class="control-label" for="MetaKeywords">{lang('Meta Keywords','admin')}:</label>
                                            <div class="controls" >
                                                <input type="text" id="MetaKeywords" name="MetaKeywords" value=""/>
                                            </div>
                                        </div>
                                        <div class="control-group span6">
                                            <label class="control-label" for="inputSImg">{lang('Image','admin')}:
                                                <span class="btn btn-small p_r" data-url="file">
                                                    <i class="icon-camera"></i>&nbsp;&nbsp;{lang('Select the file','admin')}
                                                    <input type="file" class="btn-small btn" id="inputSImg" name="mainPhoto">
                                                </span>
                                                <span class="frame_label no_connection active d_b m-t_10">
                                                    <button class="btn btn-small deleteMainImages" type="button">
                                                        <i class="icon-remove"></i>
                                                    </button>                                                                    
                                                </span>
                                            </label>
                                            <div class="controls">
                                                {if file_exists("uploads/shop/brands/". $model->getUrl() .".jpg") }
                                                    <img src="/uploads/shop/brands/{echo $model->getUrl()}.jpg?{rand(1,9999)}" class="img-polaroid" style="width: 100px;">
                                                {else:}
                                                    <img src="{$THEME}images/select-picture.png" class="img-polaroid " style="width: 100px; ">
                                                {/if}
                                            </div>
                                        </div>
                                        <!--<div class="control-group span6">
                                            <label class="control-label" for="inputImg">
                                                <span class="btn btn-small p_r" data-url="file">
                                                    <i class="icon-camera"></i>&nbsp;&nbsp;{lang('Select a file','admin')}
                                                    <input type="file" class="btn-small btn" id="inputImg" name="mainPhoto">
                                                </span>
    
    
                                            </label>
                                            <div class="controls">
                                        {if $model->getImage() == true}
                                            <img src="/uploads/shop/brands/{echo $model->getImage()}?{rand(1,9999)}" style="cursor: pointer;" class="img-polaroid"/>
                                        {/if}   
                                    </div>
                                </div>-->
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                {form_csrf()}
            </form>
        </div>
    </div>
</section>