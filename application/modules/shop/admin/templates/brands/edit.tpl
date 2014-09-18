<section class="mini-layout">
    <div class="frame_title clearfix">
        <div class="pull-left">
            <span class="help-inline"></span>
            <span class="title">{lang('Editing brand','admin')} {lang('ID','admin')}: {echo $model->Id}</span>
        </div>
        <div class="pull-right">
            <div class="d-i_b">
                <a href="{$BASE_URL}admin/components/run/shop/brands/index" class="t-d_n m-r_15 pjax"><span class="f-s_14">←</span> <span class="t-d_u">{lang('Back','admin')}</span></a>
                <button type="button" class="btn btn-small btn-primary formSubmit" data-form="#br_ed_form"><i class="icon-ok icon-white"></i>{lang('Save','admin')}</button>
                <button type="button" class="btn btn-small formSubmit" data-form="#br_ed_form" data-action="tomain"><i class="icon-check"></i>{lang('Save and go back','admin')}</button>
                {echo create_language_select($languages, $locale, "/admin/components/run/shop/brands/edit/".$model->getId())}
            </div>
        </div>                            
    </div>
    <div class="tab-content">
        <div class="tab-pane active" id="modules">
            <form method="post" action="{$ADMIN_URL}brands/edit/{echo $model->getId()}/{echo $locale}" enctype="multipart/form-data" class="form-horizontal" id="br_ed_form">
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
                                            <label class="control-label" for="Name">{lang('Name','admin')}:{$translatable}</label>
                                            <div class="controls">
                                                <input type="text" name="Name" id="Name" value="{echo ShopCore::encode($model->getName())}" required/>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="Url">{lang('URL','admin')}:</label>
                                            <div class="controls">
                                                <input type="text" name="Url" id="Url" value="{echo ShopCore::encode($model->getUrl())}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" >{lang('Description','admin')}:{$translatable}</label>
                                        <div class="controls">
                                            <textarea name="Description" class="elRTE">{echo ShopCore::encode($model->getDescription())}</textarea>
                                        </div>
                                    </div>
                                    <div class="span9">
                                        <div class="control-group">
                                            <label class="control-label" for="MetaTitle">{lang('Meta Title','admin')}:{$translatable}</label>
                                            <div class="controls">
                                                <input type="text" name="MetaTitle" id="MetaTitle" value="{echo ShopCore::encode($model->getMetaTitle())}"/>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="MetaDescription">{lang('Meta Description','admin')}:{$translatable}</label>
                                            <div class="controls" >
                                                <input type="text" name="MetaDescription" id="MetaDescription" value="{echo ShopCore::encode($model->getMetaDescription())}"/>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="MetaKeywords">{lang('Meta Keywords','admin')}:{$translatable}</label>
                                            <div class="controls" >
                                                <input type="text" name="MetaKeywords" id="MetaKeywords" value="{echo ShopCore::encode($model->getMetaKeywords())}"/>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="inputSImg">{lang('Image','admin')}:
                                                <span class="btn btn-small p_r" data-url="file">
                                                    <i class="icon-camera"></i>&nbsp;&nbsp;{lang('Select a file','admin')}
                                                    <input type="file" class="btn-small btn" id="inputSImg" name="mainPhoto">
                                                    <input type="hidden" name="deleteImage" value=""/>
                                                </span>
                                                <span class="frame_label no_connection active d_b m-t_10">
                                                    <button class="btn btn-small deleteMainImages" type="button">
                                                        <i class="icon-remove"></i>
                                                    </button>                                                                    
                                                </span>
                                            </label>
                                            <div class="controls">
                                                {if file_exists("uploads/shop/brands/". $model->getImage()) }
                                                    <img src="/uploads/shop/brands/{echo $model->getImage()}?{rand(1,9999)}" class="img-polaroid" style="width: 100px;">
                                                {else:}
                                                    <img src="{$THEME}images/select-picture.png" class="img-polaroid " style="width: 100px; ">
                                                {/if}
                                            </div>
                                        </div>
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