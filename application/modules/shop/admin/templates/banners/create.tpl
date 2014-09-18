<section class="mini-layout">
    <div class="frame_title clearfix">
        <div class="pull-left">
            <span class="help-inline"></span>
            <span class="title">{lang('Banner creation','admin')}</span>
        </div>
        <div class="pull-right">
            <div class="d-i_b">
                <a href="{$BASE_URL}admin/components/run/shop/banners/index" class="t-d_n m-r_15 pjax"><span class="f-s_14">←</span> <span class="t-d_u">{lang('Back','admin')}</span></a>
                <button type="button" class="btn btn-small btn-success formSubmit" data-form="#createBanners"><i class="icon-plus-sign icon-white"></i>{lang('Create','admin')}</button>
                <button type="button" class="btn btn-small formSubmit" data-form="#createBanners" data-action="exit"><i class="icon-check"></i>{lang('Create and exit','admin')}</button>
            </div>
        </div>                            
    </div>
    <table class="table table-striped table-bordered table-hover table-condensed content_big_td">
        <thead>
            <tr>
                <th colspan="6">
                    {lang('Data','admin')}
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="6">
                    <div class="inside_padd">
                        <div class="form-horizontal">
                            <form id="createBanners" method="post" action="{$ADMIN_URL}banners/create" enctype="multipart/form-data" id="image_upload_form">
                                <div class="span9">
                                    <div class="control-group">
                                        <label class="control-label" for="Name">{lang('Name','admin')}:</label>
                                        <div class="controls">
                                            <input type="text" name="Name" id="Name" value="{echo ShopCore::encode($model->getName())}" required/>
                                        </div>  
                                        <div class="controls">
                                            <span class="frame_label no_connection m-r_15">
                                                <span class="niceCheck" style="background-position: -46px 0px; ">
                                                    <input type="checkbox" name="Active" value="1" {if $model->getActive() == true}checked="checked"{/if}>
                                                </span>
                                                {lang('Active','admin')}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="Text"> {lang('Text banner','admin')}:</label>
                                    <div class="controls">
                                        <textarea name="Text" id="Text" class="elRTE" >{echo ShopCore::encode($model->getText())}</textarea> 
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="Url">{lang('URL','admin')}:</label>
                                    <div class="controls">                                                    
                                        <input type="text" name="Url" id="Url" value="{if $model->getUrl()}{echo ShopCore::encode($model->getUrl())}{/if}"  />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="Img">
                                        {lang('Image','admin')}:
                                    </label>
                                    <div class="controls">
                                        <div class="group_icon pull-right">            
                                            <button type="button" class="btn btn-small" onclick="elFinderPopup('image', 'Img');return false;"><i class="icon-picture"></i>  {lang('Choose an image ','admin')}</button>
                                        </div>
                                        <div class="o_h">		            
                                            <input type="text" name="Image" id="Img" value="{echo $model->getImage();}">					
                                        </div>
                                        <div id="Img-preview" style="width: 400px;" >
                                            {if file_exists("uploads/shop/banners/". $model->getImage()) AND $model->getImage() != ''}
                                                <img src="/uploads/shop/banners/{echo $model->getImage()}?{rand(1,9999)}" class="img-polaroid" style="width: 400px;">
                                            {else:}
                                                <!--<img src="{$THEME}images/select-picture.png" class="img-polaroid" style="width: 400px; ">-->
                                            {/if}
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="on_main">{lang('Display on the home page:','admin')}</label>
                                    <div class="controls">
                                        <select name="on_main">
                                            <option value="1" {if $model->getOnMain() == 1}selected="selected"{/if}>{lang('Yes','admin')}</option>
                                            <option value="0" {if $model->getOnMain() != 1} selected="false" {/if}>{lang('No','admin')}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="iddCategory">{lang('Display in the categories','admin')}</label>
                                    <div class="controls">
                                        <select id="cat_list" name="Categories[]" multiple="multiple" id="iddCategory" style="height:300px;" {if $model->getCategories() == 'all'}disabled{/if}>
                                            <option value="no_category">{lang('Do not display','admin')}</option>
                                            {foreach $categories as $category}
                                                {$selected=""}
                                                {if $bannerCategories != null && in_array($category->getId(), $bannerCategories)}
                                                    {$selected="selected='selected'"}
                                                {/if}
                                                <option {if $category->getLevel() == 0}style="font-weight: bold;"{/if} {$selected} value="{echo $category->getId()}">{str_repeat('-',$category->getLevel())} {echo ShopCore::encode($category->getName())}</option>
                                            {/foreach}
                                        </select>
                                    </div>

                                    <div class="controls">
                                        <span class="frame_label m-r_15">
                                            <span id="span_f_cat"class="niceCheck" style="background-position: -46px 0px; ">
                                                <input id="show_in_all_cat"  type="checkbox" name="show_in_all_cat" value="1" {if $model->getCategories() == 'all'}checked="checked"{/if}>
                                            </span>
                                            {lang('Select all','admin')}
                                        </span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">{lang('Active until','admin')}:</label>
                                    <div class="controls">
                                        <input class="datepicker" type="text" value="{$date}" name="espir" required/>
                                    </div>
                                </div> 
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <div id="elFinder"></div>
</section>