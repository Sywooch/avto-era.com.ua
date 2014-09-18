
<div class="tab-pane active" id="parameters">
    <table class="table table-striped table-bordered table-hover table-condensed">
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
                        <div class="form-horizontal">
                            <div data-frame>
                                <div class="control-group span9 p-r_25">
                                    <label class="control-label" for="Name">{echo $translatable} {lang('Product name','admin')}:</label>
                                    <div class="controls">
                                        <input type="text" id="Name" name="Name" value="{echo ShopCore::encode($model->getName())}">
                                    </div>
                                </div>
                                <div class="span3">
                                    <span class="v-a_m m-r_5">{lang('Active','admin')}:</span>
                                    {if $model->getActive() == true}
                                        {$checked = 'checked="checked"';$checkedP = '';$disableClass='';}
                                    {else:}
                                        {$checkedP = 'disable_tovar';$checked = '';$disableClass='disabled';}
                                    {/if}
                                    <div class="frame_prod-on_off v-a_m" data-rel="tooltip" data-placement="top" data-original-title="{lang('show','admin')}">
                                        <span data-page = "tovar" class="prod-on_off {echo $checkedP;}" data-id="{echo $model->getId()}" ></span>
                                        <input type="checkbox" name="Active" value="1" {echo $checked;} style="display: none;" >
                                    </div>
                                </div>
                                <div class="control-group m-t_10">
                                    <label class="control-label">{lang('status','admin')}:</label>
                                    <div class="controls">
                                        {if $model->getHit() == true}
                                            <button type="button" data-id="{echo $model->getId()}" class="btn btn-small {echo $disableClass;} btn-primary active setHit" data-rel="tooltip" data-placement="top" data-original-title="{lang('hit','admin')}"><i class="icon-fire"></i> {lang('Hit','admin')}</button>
                                        {else:}
                                            <button type="button" data-id="{echo $model->getId()}" class="btn btn-small {echo $disableClass;} setHit" data-rel="tooltip" data-placement="top" data-original-title="{lang('hit','admin')}"><i class="icon-fire"></i> {lang('Hit','admin')}</button>
                                        {/if}

                                        {if $model->getHot() == true}
                                            <button type="button" data-id="{echo $model->getId()}" class="btn btn-small {echo $disableClass;} btn-primary active setHot" data-rel="tooltip" data-placement="top" data-original-title="{lang('novelty','admin')}"><i class="icon-gift"></i> {lang('Novelty','admin')}</button>
                                        {else:}
                                            <button type="button" data-id="{echo $model->getId()}" class="btn btn-small {echo $disableClass;} setHot" data-rel="tooltip" data-placement="top" data-original-title="{lang('novelty','admin')}"><i class="icon-gift"></i> {lang('Novelty','admin')}</button>
                                        {/if}

                                        {if $model->getAction() == true}
                                            <button type="button" data-id="{echo $model->getId()}" class="btn btn-small {echo $disableClass;} btn-primary active setAction" data-rel="tooltip" data-placement="top" data-original-title="{lang('promotion','admin')}"><i class="icon-star"></i> {lang('Promotion','admin')}</button>
                                        {else:}
                                            <button type="button" data-id="{echo $model->getId()}" class="btn btn-small {echo $disableClass;} setAction" data-rel="tooltip" data-placement="top" data-original-title="{lang('promotion','admin')}"><i class="icon-star"></i> {lang('Promotion','admin')}</button>
                                        {/if}
                                    </div>
                                </div>
                                <div class="variantsProduct">
                                    <table class="table table-bordered t-l_a">
                                        <thead>
                                            <tr>
                                                <th class="span3 vName" >{echo $translatable_w} {lang('Product variant name','admin')} </th>
                                                <th class="span2">{echo ShopCore::encode($model->getLabel('Price'))} <span class="required">*</span></th>
                                                    {if count($currencies)>0}
                                                    <th class="span2">{lang('Currency','admin')}</th>
                                                    {/if}
                                                <th class="span2">{echo ShopCore::encode($model->getLabel('Number'))}</th>
                                                <th class="span2">{echo ShopCore::encode($model->getLabel('Stock'))}</th>
                                                <th class="span2">{lang('Photo','admin')}</th>
                                            </tr>
                                            <tr class="head_body">
                                            </tr>
                                        </thead>
                                        <tbody class="sortable save_positions_variant" data-url="/admin/components/run/shop/search/save_positions_variant"  id="variantHolder">
                                            {if $model->countProductVariants() > 0}
                                                {$i=0}

                                                {foreach $model->getProductVariants(null,null, TRUE, $locale) as $v}

                                                    <tr id="ProductVariantRow_{$i}">
                                                        <td class="vName">
                                                            <input name="idv" type="hidden" value="{echo $v->id}"/>
                                                            {if $i>0}
                                                                <button class="btn my_btn_s btn-small pull-left btn-danger m-r_5" type="button" data-remove data-rel="tooltip" data-title="{lang('Delete','admin')}">
                                                                    <i class="icon-trash icon-white"></i>
                                                                </button>
                                                            {/if}
                                                            <div class="o_h">
                                                                <input type="hidden" name="variants[RandomId][]"  class="random_id" value=""/>
                                                                <input type="hidden" name="variants[CurrentId][]"  value="{echo $v->getId()}" />
                                                                <input  type="text" name="variants[Name][]" value="{echo ShopCore::encode($v->getName())}"/>
                                                            </div>
                                                        </td>
                                                        <td class="number">
                                                            <input type="text" name="variants[PriceInMain][]" value="{echo ShopCore::encode($v->getPriceInMain())}"/>
                                                        </td>
                                                        {if count($currencies)>0}
                                                            <td>
                                                                <select name="variants[currency][]">
                                                                    {foreach $currencies as $c}
                                                                        <option value="{echo $c->getId()}" {if $c->getId() == $v->getCurrency()}selected="selected"{/if}>
                                                                            {echo $c->getCode()}
                                                                        </option>
                                                                    {/foreach}
                                                                </select>
                                                            </td>
                                                        {/if}

                                                        <td>
                                                            <input type="text" name="variants[Number][]" value="{echo ShopCore::encode($v->getNumber())}" class="textbox_short" />
                                                        </td>
                                                        <td class="number">
                                                            <input type="text" name="variants[Stock][]" value="{echo ShopCore::encode($v->getStock())}" class="textbox_short" />
                                                        </td>
                                                        <td class="variantImage">
                                                            <div class="control-group">
                                                                <label class="control-label" style="display: none;">
                                                                    <span class="btn btn-small p_r" data-url="file" >
                                                                        <i class="icon-camera"></i>
                                                                        <input type="file" name="image{$i}" title="{lang('Main image','admin')}"/>
                                                                        <input type="hidden" name="changeImage[]" value="" class="changeImage" />
                                                                        <input type="hidden" name="variants[MainImageForDel][{echo $v->getId()}]" class="deleteImage" value="0"/>
                                                                    </span>
                                                                </label>
                                                                <div class="controls photo_album">
                                                                    <div class="fon"></div>
                                                                    <div class="btn-group f-s_0">
                                                                        <button type="button" class="btn change_image" data-rel="tooltip" data-title="{lang('Edit','admin')}" data-original-title=""><i class="icon-edit"></i></button>
                                                                        <button type="button" class="btn images_modal" data-rel="tooltip" data-title="{lang('Load from internet', 'admin')}" data-original-title=""><i class="icon-search"></i></button>
                                                                        <button type="button" class="btn delete_image" data-rel="tooltip" data-title="{lang('Remove','admin')}"><i class="icon-remove"></i></button>
                                                                    </div>
                                                                    {if $v->getMainPhoto()}
                                                                        <img  src="{echo $v->getMainPhoto()}" class="img-polaroid" style="width: 100px;">
                                                                    {else:}
                                                                        <img src="{$THEME}images/select-picture.png" class="img-polaroid " style="width: 50px; ">
                                                                    {/if}
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    {$i++}
                                                {/foreach}
                                            {/if}
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="8">
                                                    <div class="clearfix">
                                                        <button type="button"
                                                                onclick="vName()"
                                                                class="pull-right btn btn-small btn-success"
                                                                id="addVariant">
                                                            <i class="icon-plus-sign icon-white"></i>{lang('Add a variant','admin')}
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <button class="btn my_btn_s btn-small d_n"
                                        type="button"
                                        data-remove="example"
                                        data-rel="tooltip"
                                        data-title="{lang('Delete','admin')}">
                                    <i class="icon-remove"></i>
                                </button>
                            </div>
                            <div class="row-fluid">
                                <div class="span9">
                                    <div class="control-group">
                                        <label class="control-label" for="inputParent">{lang('Brand name','admin')}:</label>
                                        <div class="controls">
                                            <select id="inputParent" name="BrandId">
                                                <option value="">{lang('Not specified','admin')}</option>
                                                {foreach SBrandsQuery::create()->find() as $brand}
                                                    <option {if $model->getBrandId() == $brand->getId()} selected="selected" {/if} value="{echo $brand->getId()}">{echo ShopCore::encode($brand->getName())}</option>
                                                {/foreach}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="comment">{lang('Category','admin')}:</label>
                                        <div class="controls">
                                            <select name="CategoryId" id="comment">
                                                {foreach $categories as $category}
                                                    <option {if $category->getLevel() == 0}style="font-weight: bold;"{/if} {if $model->getCategoryId() == $category->getId()}selected="selected"{/if} value="{echo $category->getId()}">{str_repeat('-',$category->getLevel())}{echo ShopCore::encode($category->getName())}</option>
                                                {/foreach}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="iddCategory">{lang('Additional categories', 'admin')}:</label>
                                        <div class="controls">
                                            <select name="Categories[]" multiple="multiple" id="iddCategory">
                                                {foreach $categories as $category}
                                                    {$selected=""}
                                                    {if in_array($category->getId(), $productCategories) && $category->getId() != $model->getCategoryId()}
                                                        {$selected="selected='selected'"}
                                                    {/if}
                                                    <option {if $category->getLevel() == 0}style="font-weight: bold;"{/if} {$selected} value="{echo $category->getId()}">{str_repeat('-',$category->getLevel())} {echo ShopCore::encode($category->getName())}</option>
                                                {/foreach}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"
                                       for="ShortDescriptions">{echo $translatable} {lang('Short description','admin')}:
                                </label>
                                <div class="controls">
                                    <textarea class="elRTE"
                                              id="ShortDescriptions"
                                              name="ShortDescription">
                                        {echo ShopCore::encode($model->getShortDescription())}
                                    </textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"
                                       for="FullDescriptions">{echo $translatable} {lang('Full description','admin')}:
                                </label>
                                <div class="controls">
                                    <textarea class="elRTE"
                                              id="FullDescriptions"
                                              name="FullDescription">
                                        {echo ShopCore::encode($model->getFullDescription())}
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                </td>
            </tr>
        </tbody>
    </table>
    <table class="table table-striped table-bordered table-hover table-condensed">
        <thead>
            <tr>
                <th colspan="6">
                    {lang('Settings','admin')}
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="6">
                    <div class="inside_padd span9">
                        <div class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label" for="pName">{lang('Warehouses','admin')}:
                                    <button type="button" data-clone="wares" class="btn btn-small"><i class="icon-plus"></i></button><br/>
                                </label>
                                <div class="controls">
                                    <div id="warehouses_container">
                                        <div>
                                            {foreach $model->getSWarehouseDatas() as $w_data}
                                                <div id="warehouse_line">
                                                    <select name="warehouses[]" class="input-medium">
                                                        <option value="">---</option>
                                                        {foreach $warehouses as $w}
                                                            <option {if $w->getId() == $w_data->getWarehouseId()}selected{/if} value="{echo $w->getId()}">{echo encode($w->getName())}</option>
                                                        {/foreach}
                                                    </select>
                                                    <input type="text" name="warehouses_c[]"  value="{echo $w_data->getCount()}"   class="input-medium"/>
                                                    <a data-del="wares" class="btn btn-small"><i class="icon-trash"></i></a>
                                                </div>
                                            {/foreach}
                                        </div>
                                        <div class="warehouses_container">
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="comments">{lang('Comment permission','admin')}:</label>
                                <div class="controls">
                                    <select id="comments" class="input-mini" name="EnableComments">
                                        <option {if $model->getEnableComments()} selected {/if} value="1">{lang('Yes','admin')}</option>
                                        <option {if !$model->getEnableComments()} selected {/if}value="0">{lang('No','admin')}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="dCreate">{lang('Date of creation','admin')}:</label>
                                <div class="controls">
                                    <input type="text"
                                           id="dCreate"
                                           name="Created"
                                           value="{echo date('Y-m-d H:i:s',$model->getCreated())}"
                                           class="datepicker input-medium"/>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="oldP">{lang('Old price','admin')}:</label>
                                <div class="controls">
                                    <input type="text" id="oldP" value="{echo $model->getOldPrice()}" name="OldPrice"/>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="RelatedProducts">{lang('Related products','admin')}:</label>
                                <div class="controls">
                                    <input type="text" id="RelatedProducts"/>
                                    <div id="relatedProductsNames" style="margin-top: 10px;">
                                        {foreach $model->getRelatedProductsModels() as $shopKitProduct}
                                            <div id="tpm_row{echo $shopKitProduct->getId()}">
                                                <span style="width: 70%; margin-left: 1%;" class="pull-left">
                                                    <a href="{echo $ADMIN_URL .'products/edit/'.$shopKitProduct->getId()}" >
                                                        {echo ShopCore::encode($shopKitProduct->getName())}
                                                    </a>
                                                    <input type="hidden"
                                                           name="RelatedProducts[]"
                                                           value="{echo $shopKitProduct->getId()}">
                                                </span>
                                                <span style="width: 8%;margin-left: 1%;" class="pull-left">
                                                    <button class="btn btn-small del_tmp_row"
                                                            data-rel="tooltip"
                                                            data-title="{lang('Delete','admin')}"
                                                            data-kid="{echo $shopKitProduct->getId()}">
                                                        <i class="icon-trash"></i>
                                                    </button>
                                                </span>
                                            </div>

                                        {/foreach}
                                    </div>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="templateGH">{lang('Main template','admin')}:</label>
                                <div class="controls">
                                    <input type="text" id="templateGH" name="tpl" value="{echo ShopCore::encode($model->tpl)}"/>
                                    <p class="help-block">{lang('Product main template. By default  product.tpl','admin')}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <table class="table table-striped table-bordered table-hover table-condensed">
        <thead>
            <tr>
                <th colspan="6">
                    {lang('Meta data','admin')}
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="6">
                    <div class="inside_padd span9">
                        <div class="form-horizontal">

                            <div class="control-group">
                                <label class="control-label" for="Url">URL:</label>
                                <div class="controls">
                                    <div class="group_icon pull-right">
                                        <button type="button"
                                                class="btn btn-small"
                                                id="translateProductUrl">
                                            <i class="icon-refresh"></i>&nbsp;&nbsp;{lang('Autoselection','admin')}
                                        </button>
                                    </div>
                                    <span class="o_h d_b">
                                        <input type="text"
                                               name="Url"
                                               id="Url"
                                               value="{echo $model->getUrl()}"/>
                                    </span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="Mtag">{echo $translatable} {lang('Meta Title','admin')}:</label>
                                <div class="controls">
                                    <input type="text" name="MetaTitle" id="Mtag" value="{echo $model->getMetaTitle()}"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="mDesc">{echo $translatable} {lang('Meta Description','admin')}:</label>
                                <div class="controls">
                                    <input type="text" name="MetaDescription" id="mDesc" value="{echo $model->getMetaDescription()}"/>
                                <!--    <input type="text" name="MetaDescription" id="mDesc" value="{echo $model->getId()} - {echo $model->getName()} - {echo $model->getMainCategory()->getName()}"/>-->
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="mKey">{echo $translatable} {lang('Meta Keywords','admin')}:</label>
                                <div class="controls">
                                    <input type="text" name="MetaKeywords" id="mKey" value="{echo $model->getMetaKeywords()}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>




</div>

<div class="tab-pane" id="parameters_article">
    <table class="table table-striped table-bordered table-hover table-condensed">
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
                            <div class="span9">
                                {echo ShopCore::app()->SPropertiesRenderer->renderAdmin($model->getCategoryId(), $model, $locale)}
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="tab-pane" id="additionalPics">
    <table class="table table-striped table-bordered table-hover table-condensed">
        <thead>
            <tr>
                <th colspan="6">
                    {lang('Images','admin')}
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="6">
                    <div class="inside_padd">
                        <div class="form-horizontal">
                            <div class="span9 offset3">
                                {for $i=0; $i<12; $i++}
                                    {if ($i+1) % 2}
                                        <div class="row" style="height: 115px;">
                                        {/if}
                                        <div class="control-group span6" >
                                            <label class="control-label" for="additionalImage_{$i}">
                                                <span class="btn btn-small p_r" data-url="file">
                                                    <i class="icon-camera"></i>&nbsp;&nbsp;{lang('Select a file','admin')}
                                                    <input type="file" class="btn-small btn additional_image_file" id="additionalImage_{$i}" name="additionalImages{echo $i}">
                                                    <input type="hidden" class='additional_image_url' id='add_img_urls_{$i}' name='add_img_urls_{$i}'>
                                                </span>
                                            </label>
                                            <div class="controls">
                                                {if isset($additionalImagePositions[$i])}
                                                    <img src="/uploads/shop/products/origin/additional/{echo $additionalImagePositions[$i]->getImageName()}"
                                                         class="img-polaroid"
                                                         style="width: 100px; height: 100px;">
                                                    <button class="btn btn-small rmAddPic"
                                                            data-i="{echo $i}"
                                                            onclick="change_status('{$ADMIN_URL}products/deleteAddImage/{echo $model->getId()}/{echo $i}');">
                                                        <i class="icon-remove"></i>
                                                    </button>
                                                {else:}
                                                    <img src="{$THEME}images/select-picture.png" class="img-polaroid " style="width: 100px; ">
                                                {/if}
                                            </div>
                                        </div>

                                        {if $i % 2}
                                        </div>
                                    {/if}

                                {/for}
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
{$addField = ShopCore::app()->CustomFieldsHelper->getCustomFields('product', $model->getId())->asAdminHtml()}
{if !empty($addField)}
    <div class="tab-pane" id="customFields">
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
    </div>
{/if}

<div class="tab-pane" id="kits">
    <a style="float: right;"
       class="btn btn-mini btn-success pjax"
       href="/admin/components/run/shop/kits/kit_create/{echo $model->getId()}" >
        <i class="icon-plus-sign icon-white"></i>{lang('Create a set','admin')}
    </a>

    {if count($model->getKits($criteria))}
        <table class="table table-striped table-bordered table-hover table-condensed">
            <thead>
                <tr>
                    <th colspan="6">
                        {lang('Kits','admin')}

                    </th>
                </tr>
            </thead>
            <tbody class="sortable">
                <tr>
                    <td colspan="6">
                        {$criteria = 'ASC'}
                        {if $model->getKits($criteria)->count() > 0}
                            {foreach $model->getKits($criteria) as $kit}
                                <table class="table table-striped table-bordered table-hover table-condensed">
                                    <thead>
                                        <tr>
                                            <th>
                                                ID:{echo $kit->getId()}
                                            </th>
                                            <th>
                                                <a class="pjax" href="{$ADMIN_URL}kits/kit_edit/{echo $kit->getId()}">{lang('Editing','admin')}</a>
                                            </th>
                                            <th>
                                                {lang('Position','admin')}: {echo $kit->getPosition()}
                                                <button type="button" style="float: right" class="btn btn-mini kit_del" data-kid="{echo $kit->getId()}">
                                                    <i title="{lang('Delete set','admin')}" class="icon-trash"></i>
                                                </button>
                                                <button type="button"
                                                        style="float: right; margin-right: 2px;"
                                                        class="btn btn-mini kit_change_active {if $kit->getActive() == 1} active{/if}"
                                                        data-kid="{echo $kit->getId()}">
                                                    <i title="{lang('Active','admin')}" class="icon-ok"></i>
                                                </button>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <b>{echo $kit->getLabel('Id')}</b>
                                            </td>
                                            <td>
                                                <b>{echo $kit->getLabel('Name')}</b>
                                            </td>
                                            <td>
                                                <b>{echo $kit->getLabel('Discount')}</b>
                                            </td>

                                        </tr>
                                        {foreach $kit->getShopKitProducts() as $shopKitProduct}
                                            {$ap = $shopKitProduct->getSProducts()}
                                            {$ap->setLocale($model->getLocale())}
                                            <tr class="{counter('even','odd')}">
                                                <td>{echo $ap->getId()}</td>
                                                <td>{echo ShopCore::encode($ap->getName())}</td>
                                                <td>{echo $shopKitProduct->getDiscount()}%</td>
                                            </tr>
                                        {/foreach}
                                    </tbody>
                                </table>
                            {/foreach}
                        {/if}
                    </td>
                </tr>
            </tbody>
        </table>
    {else:}
        <div class="alert alert-info" style="margin-bottom: 18px; margin-top: 71px;">
            {lang('Kit List products are empty','admin')}
        </div>
    {/if}
</div>

