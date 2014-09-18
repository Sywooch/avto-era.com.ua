<?php include ('/var/www/avto-era.com.ua/application/libraries/mabilis/functions/func.counter.php');  ?>
<div class="tab-pane active" id="parameters">
    <table class="table table-striped table-bordered table-hover table-condensed">
        <thead>
            <tr>
                <th colspan="6">
                    <?php echo lang ('Information','admin'); ?>
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
                                    <label class="control-label" for="Name"><?php echo $translatable?> <?php echo lang ('Product name','admin'); ?>:</label>
                                    <div class="controls">
                                        <input type="text" id="Name" name="Name" value="<?php echo ShopCore::encode($model->getName())?>">
                                    </div>
                                </div>
                                <div class="span3">
                                    <span class="v-a_m m-r_5"><?php echo lang ('Active','admin'); ?>:</span>
                                    <?php if($model->getActive() == true): ?>
                                        <?php $checked = 'checked="checked"';$checkedP = '';$disableClass='';?>
                                    <?php else:?>
                                        <?php $checkedP = 'disable_tovar';$checked = '';$disableClass='disabled';?>
                                    <?php endif; ?>
                                    <div class="frame_prod-on_off v-a_m" data-rel="tooltip" data-placement="top" data-original-title="<?php echo lang ('show','admin'); ?>">
                                        <span data-page = "tovar" class="prod-on_off <?php if(isset($checkedP)){ echo $checkedP; } ?>" data-id="<?php echo $model->getId()?>" ></span>
                                        <input type="checkbox" name="Active" value="1" <?php if(isset($checked)){ echo $checked; } ?> style="display: none;" >
                                    </div>
                                </div>
                                <div class="control-group m-t_10">
                                    <label class="control-label"><?php echo lang ('status','admin'); ?>:</label>
                                    <div class="controls">
                                        <?php if($model->getHit() == true): ?>
                                            <button type="button" data-id="<?php echo $model->getId()?>" class="btn btn-small <?php if(isset($disableClass)){ echo $disableClass; } ?> btn-primary active setHit" data-rel="tooltip" data-placement="top" data-original-title="<?php echo lang ('hit','admin'); ?>"><i class="icon-fire"></i> <?php echo lang ('Hit','admin'); ?></button>
                                        <?php else:?>
                                            <button type="button" data-id="<?php echo $model->getId()?>" class="btn btn-small <?php if(isset($disableClass)){ echo $disableClass; } ?> setHit" data-rel="tooltip" data-placement="top" data-original-title="<?php echo lang ('hit','admin'); ?>"><i class="icon-fire"></i> <?php echo lang ('Hit','admin'); ?></button>
                                        <?php endif; ?>

                                        <?php if($model->getHot() == true): ?>
                                            <button type="button" data-id="<?php echo $model->getId()?>" class="btn btn-small <?php if(isset($disableClass)){ echo $disableClass; } ?> btn-primary active setHot" data-rel="tooltip" data-placement="top" data-original-title="<?php echo lang ('novelty','admin'); ?>"><i class="icon-gift"></i> <?php echo lang ('Novelty','admin'); ?></button>
                                        <?php else:?>
                                            <button type="button" data-id="<?php echo $model->getId()?>" class="btn btn-small <?php if(isset($disableClass)){ echo $disableClass; } ?> setHot" data-rel="tooltip" data-placement="top" data-original-title="<?php echo lang ('novelty','admin'); ?>"><i class="icon-gift"></i> <?php echo lang ('Novelty','admin'); ?></button>
                                        <?php endif; ?>

                                        <?php if($model->getAction() == true): ?>
                                            <button type="button" data-id="<?php echo $model->getId()?>" class="btn btn-small <?php if(isset($disableClass)){ echo $disableClass; } ?> btn-primary active setAction" data-rel="tooltip" data-placement="top" data-original-title="<?php echo lang ('promotion','admin'); ?>"><i class="icon-star"></i> <?php echo lang ('Promotion','admin'); ?></button>
                                        <?php else:?>
                                            <button type="button" data-id="<?php echo $model->getId()?>" class="btn btn-small <?php if(isset($disableClass)){ echo $disableClass; } ?> setAction" data-rel="tooltip" data-placement="top" data-original-title="<?php echo lang ('promotion','admin'); ?>"><i class="icon-star"></i> <?php echo lang ('Promotion','admin'); ?></button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="variantsProduct">
                                    <table class="table table-bordered t-l_a">
                                        <thead>
                                            <tr>
                                                <th class="span3 vName" ><?php echo $translatable_w?> <?php echo lang ('Product variant name','admin'); ?> </th>
                                                <th class="span2"><?php echo ShopCore::encode($model->getLabel('Price'))?> <span class="required">*</span></th>
                                                    <?php if(count($currencies)>0): ?>
                                                    <th class="span2"><?php echo lang ('Currency','admin'); ?></th>
                                                    <?php endif; ?>
                                                <th class="span2"><?php echo ShopCore::encode($model->getLabel('Number'))?></th>
                                                <th class="span2"><?php echo ShopCore::encode($model->getLabel('Stock'))?></th>
                                                <th class="span2"><?php echo lang ('Photo','admin'); ?></th>
                                            </tr>
                                            <tr class="head_body">
                                            </tr>
                                        </thead>
                                        <tbody class="sortable save_positions_variant" data-url="/admin/components/run/shop/search/save_positions_variant"  id="variantHolder">
                                            <?php if($model->countProductVariants() > 0): ?>
                                                <?php $i=0?>

                                                <?php if(is_true_array($model->getProductVariants(null,null, TRUE, $locale))){ foreach ($model->getProductVariants(null,null, TRUE, $locale) as $v){ ?>

                                                    <tr id="ProductVariantRow_<?php if(isset($i)){ echo $i; } ?>">
                                                        <td class="vName">
                                                            <input name="idv" type="hidden" value="<?php echo $v->id?>"/>
                                                            <?php if($i>0): ?>
                                                                <button class="btn my_btn_s btn-small pull-left btn-danger m-r_5" type="button" data-remove data-rel="tooltip" data-title="<?php echo lang ('Delete','admin'); ?>">
                                                                    <i class="icon-trash icon-white"></i>
                                                                </button>
                                                            <?php endif; ?>
                                                            <div class="o_h">
                                                                <input type="hidden" name="variants[RandomId][]"  class="random_id" value=""/>
                                                                <input type="hidden" name="variants[CurrentId][]"  value="<?php echo $v->getId()?>" />
                                                                <input  type="text" name="variants[Name][]" value="<?php echo ShopCore::encode($v->getName())?>"/>
                                                            </div>
                                                        </td>
                                                        <td class="number">
                                                            <input type="text" name="variants[PriceInMain][]" value="<?php echo ShopCore::encode($v->getPriceInMain())?>"/>
                                                        </td>
                                                        <?php if(count($currencies)>0): ?>
                                                            <td>
                                                                <select name="variants[currency][]">
                                                                    <?php if(is_true_array($currencies)){ foreach ($currencies as $c){ ?>
                                                                        <option value="<?php echo $c->getId()?>" <?php if($c->getId() == $v->getCurrency()): ?>selected="selected"<?php endif; ?>>
                                                                            <?php echo $c->getCode()?>
                                                                        </option>
                                                                    <?php }} ?>
                                                                </select>
                                                            </td>
                                                        <?php endif; ?>

                                                        <td>
                                                            <input type="text" name="variants[Number][]" value="<?php echo ShopCore::encode($v->getNumber())?>" class="textbox_short" />
                                                        </td>
                                                        <td class="number">
                                                            <input type="text" name="variants[Stock][]" value="<?php echo ShopCore::encode($v->getStock())?>" class="textbox_short" />
                                                        </td>
                                                        <td class="variantImage">
                                                            <div class="control-group">
                                                                <label class="control-label" style="display: none;">
                                                                    <span class="btn btn-small p_r" data-url="file" >
                                                                        <i class="icon-camera"></i>
                                                                        <input type="file" name="image<?php if(isset($i)){ echo $i; } ?>" title="<?php echo lang ('Main image','admin'); ?>"/>
                                                                        <input type="hidden" name="changeImage[]" value="" class="changeImage" />
                                                                        <input type="hidden" name="variants[MainImageForDel][<?php echo $v->getId()?>]" class="deleteImage" value="0"/>
                                                                    </span>
                                                                </label>
                                                                <div class="controls photo_album">
                                                                    <div class="fon"></div>
                                                                    <div class="btn-group f-s_0">
                                                                        <button type="button" class="btn change_image" data-rel="tooltip" data-title="<?php echo lang ('Edit','admin'); ?>" data-original-title=""><i class="icon-edit"></i></button>
                                                                        <button type="button" class="btn images_modal" data-rel="tooltip" data-title="<?php echo lang ('Load from internet', 'admin'); ?>" data-original-title=""><i class="icon-search"></i></button>
                                                                        <button type="button" class="btn delete_image" data-rel="tooltip" data-title="<?php echo lang ('Remove','admin'); ?>"><i class="icon-remove"></i></button>
                                                                    </div>
                                                                    <?php if($v->getMainPhoto()): ?>
                                                                        <img  src="<?php echo $v->getMainPhoto()?>" class="img-polaroid" style="width: 100px;">
                                                                    <?php else:?>
                                                                        <img src="<?php if(isset($THEME)){ echo $THEME; } ?>images/select-picture.png" class="img-polaroid " style="width: 50px; ">
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php $i++?>
                                                <?php }} ?>
                                            <?php endif; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="8">
                                                    <div class="clearfix">
                                                        <button type="button"
                                                                onclick="vName()"
                                                                class="pull-right btn btn-small btn-success"
                                                                id="addVariant">
                                                            <i class="icon-plus-sign icon-white"></i><?php echo lang ('Add a variant','admin'); ?>
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
                                        data-title="<?php echo lang ('Delete','admin'); ?>">
                                    <i class="icon-remove"></i>
                                </button>
                            </div>
                            <div class="row-fluid">
                                <div class="span9">
                                    <div class="control-group">
                                        <label class="control-label" for="inputParent"><?php echo lang ('Brand name','admin'); ?>:</label>
                                        <div class="controls">
                                            <select id="inputParent" name="BrandId">
                                                <option value=""><?php echo lang ('Not specified','admin'); ?></option>
                                                <?php $result = SBrandsQuery::create()->find(); 
 if(is_true_array($result)){ foreach ($result as $brand){ ?>
                                                    <option <?php if($model->getBrandId() == $brand->getId()): ?> selected="selected" <?php endif; ?> value="<?php echo $brand->getId()?>"><?php echo ShopCore::encode($brand->getName())?></option>
                                                <?php }} ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="comment"><?php echo lang ('Category','admin'); ?>:</label>
                                        <div class="controls">
                                            <select name="CategoryId" id="comment">
                                                <?php if(is_true_array($categories)){ foreach ($categories as $category){ ?>
                                                    <option <?php if($category->getLevel() == 0): ?>style="font-weight: bold;"<?php endif; ?> <?php if($model->getCategoryId() == $category->getId()): ?>selected="selected"<?php endif; ?> value="<?php echo $category->getId()?>"><?php echo str_repeat ('-',$category->getLevel()); ?><?php echo ShopCore::encode($category->getName())?></option>
                                                <?php }} ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="iddCategory"><?php echo lang ('Additional categories', 'admin'); ?>:</label>
                                        <div class="controls">
                                            <select name="Categories[]" multiple="multiple" id="iddCategory">
                                                <?php if(is_true_array($categories)){ foreach ($categories as $category){ ?>
                                                    <?php $selected=""?>
                                                    <?php if(in_array($category->getId(), $productCategories) && $category->getId() != $model->getCategoryId()): ?>
                                                        <?php $selected="selected='selected'"?>
                                                    <?php endif; ?>
                                                    <option <?php if($category->getLevel() == 0): ?>style="font-weight: bold;"<?php endif; ?> <?php if(isset($selected)){ echo $selected; } ?> value="<?php echo $category->getId()?>"><?php echo str_repeat ('-',$category->getLevel()); ?> <?php echo ShopCore::encode($category->getName())?></option>
                                                <?php }} ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"
                                       for="ShortDescriptions"><?php echo $translatable?> <?php echo lang ('Short description','admin'); ?>:
                                </label>
                                <div class="controls">
                                    <textarea class="elRTE"
                                              id="ShortDescriptions"
                                              name="ShortDescription">
                                        <?php echo ShopCore::encode($model->getShortDescription())?>
                                    </textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"
                                       for="FullDescriptions"><?php echo $translatable?> <?php echo lang ('Full description','admin'); ?>:
                                </label>
                                <div class="controls">
                                    <textarea class="elRTE"
                                              id="FullDescriptions"
                                              name="FullDescription">
                                        <?php echo ShopCore::encode($model->getFullDescription())?>
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
                    <?php echo lang ('Settings','admin'); ?>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="6">
                    <div class="inside_padd span9">
                        <div class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label" for="pName"><?php echo lang ('Warehouses','admin'); ?>:
                                    <button type="button" data-clone="wares" class="btn btn-small"><i class="icon-plus"></i></button><br/>
                                </label>
                                <div class="controls">
                                    <div id="warehouses_container">
                                        <div>
                                            <?php if(is_true_array($model->getSWarehouseDatas())){ foreach ($model->getSWarehouseDatas() as $w_data){ ?>
                                                <div id="warehouse_line">
                                                    <select name="warehouses[]" class="input-medium">
                                                        <option value="">---</option>
                                                        <?php if(is_true_array($warehouses)){ foreach ($warehouses as $w){ ?>
                                                            <option <?php if($w->getId() == $w_data->getWarehouseId()): ?>selected<?php endif; ?> value="<?php echo $w->getId()?>"><?php echo encode($w->getName())?></option>
                                                        <?php }} ?>
                                                    </select>
                                                    <input type="text" name="warehouses_c[]"  value="<?php echo $w_data->getCount()?>"   class="input-medium"/>
                                                    <a data-del="wares" class="btn btn-small"><i class="icon-trash"></i></a>
                                                </div>
                                            <?php }} ?>
                                        </div>
                                        <div class="warehouses_container">
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="comments"><?php echo lang ('Comment permission','admin'); ?>:</label>
                                <div class="controls">
                                    <select id="comments" class="input-mini" name="EnableComments">
                                        <option <?php if($model->getEnableComments()): ?> selected <?php endif; ?> value="1"><?php echo lang ('Yes','admin'); ?></option>
                                        <option <?php if(!$model->getEnableComments()): ?> selected <?php endif; ?>value="0"><?php echo lang ('No','admin'); ?></option>
                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="dCreate"><?php echo lang ('Date of creation','admin'); ?>:</label>
                                <div class="controls">
                                    <input type="text"
                                           id="dCreate"
                                           name="Created"
                                           value="<?php echo date('Y-m-d H:i:s',$model->getCreated())?>"
                                           class="datepicker input-medium"/>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="oldP"><?php echo lang ('Old price','admin'); ?>:</label>
                                <div class="controls">
                                    <input type="text" id="oldP" value="<?php echo $model->getOldPrice()?>" name="OldPrice"/>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="RelatedProducts"><?php echo lang ('Related products','admin'); ?>:</label>
                                <div class="controls">
                                    <input type="text" id="RelatedProducts"/>
                                    <div id="relatedProductsNames" style="margin-top: 10px;">
                                        <?php if(is_true_array($model->getRelatedProductsModels())){ foreach ($model->getRelatedProductsModels() as $shopKitProduct){ ?>
                                            <div id="tpm_row<?php echo $shopKitProduct->getId()?>">
                                                <span style="width: 70%; margin-left: 1%;" class="pull-left">
                                                    <a href="<?php echo $ADMIN_URL .'products/edit/'.$shopKitProduct->getId()?>" >
                                                        <?php echo ShopCore::encode($shopKitProduct->getName())?>
                                                    </a>
                                                    <input type="hidden"
                                                           name="RelatedProducts[]"
                                                           value="<?php echo $shopKitProduct->getId()?>">
                                                </span>
                                                <span style="width: 8%;margin-left: 1%;" class="pull-left">
                                                    <button class="btn btn-small del_tmp_row"
                                                            data-rel="tooltip"
                                                            data-title="<?php echo lang ('Delete','admin'); ?>"
                                                            data-kid="<?php echo $shopKitProduct->getId()?>">
                                                        <i class="icon-trash"></i>
                                                    </button>
                                                </span>
                                            </div>

                                        <?php }} ?>
                                    </div>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="templateGH"><?php echo lang ('Main template','admin'); ?>:</label>
                                <div class="controls">
                                    <input type="text" id="templateGH" name="tpl" value="<?php echo ShopCore::encode($model->tpl)?>"/>
                                    <p class="help-block"><?php echo lang ('Product main template. By default  product.tpl','admin'); ?></p>
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
                    <?php echo lang ('Meta data','admin'); ?>
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
                                            <i class="icon-refresh"></i>&nbsp;&nbsp;<?php echo lang ('Autoselection','admin'); ?>
                                        </button>
                                    </div>
                                    <span class="o_h d_b">
                                        <input type="text"
                                               name="Url"
                                               id="Url"
                                               value="<?php echo $model->getUrl()?>"/>
                                    </span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="Mtag"><?php echo $translatable?> <?php echo lang ('Meta Title','admin'); ?>:</label>
                                <div class="controls">
                                    <input type="text" name="MetaTitle" id="Mtag" value="<?php echo $model->getMetaTitle()?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="mDesc"><?php echo $translatable?> <?php echo lang ('Meta Description','admin'); ?>:</label>
                                <div class="controls">
                                    <input type="text" name="MetaDescription" id="mDesc" value="<?php echo $model->getMetaDescription()?>"/>
                                <!--    <input type="text" name="MetaDescription" id="mDesc" value="<?php echo $model->getId()?> - <?php echo $model->getName()?> - <?php echo $model->getMainCategory()->getName()?>"/>-->
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="mKey"><?php echo $translatable?> <?php echo lang ('Meta Keywords','admin'); ?>:</label>
                                <div class="controls">
                                    <input type="text" name="MetaKeywords" id="mKey" value="<?php echo $model->getMetaKeywords()?>"/>
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
                    <?php echo lang ('Properties','admin'); ?>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="6">
                    <div class="inside_padd">
                        <div class="form-horizontal">
                            <div class="span9">
                                <?php echo ShopCore::app()->SPropertiesRenderer->renderAdmin($model->getCategoryId(), $model, $locale)?>
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
                    <?php echo lang ('Images','admin'); ?>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="6">
                    <div class="inside_padd">
                        <div class="form-horizontal">
                            <div class="span9 offset3">
                                <?php for($i=0; $i<12; $i++){?>
                                    <?php if(($i+1) % 2): ?>
                                        <div class="row" style="height: 115px;">
                                        <?php endif; ?>
                                        <div class="control-group span6" >
                                            <label class="control-label" for="additionalImage_<?php if(isset($i)){ echo $i; } ?>">
                                                <span class="btn btn-small p_r" data-url="file">
                                                    <i class="icon-camera"></i>&nbsp;&nbsp;<?php echo lang ('Select a file','admin'); ?>
                                                    <input type="file" class="btn-small btn additional_image_file" id="additionalImage_<?php if(isset($i)){ echo $i; } ?>" name="additionalImages<?php echo $i?>">
                                                    <input type="hidden" class='additional_image_url' id='add_img_urls_<?php if(isset($i)){ echo $i; } ?>' name='add_img_urls_<?php if(isset($i)){ echo $i; } ?>'>
                                                </span>
                                            </label>
                                            <div class="controls">
                                                <?php if(isset($additionalImagePositions[$i])): ?>
                                                    <img src="/uploads/shop/products/origin/additional/<?php echo $additionalImagePositions[$i]->getImageName()?>"
                                                         class="img-polaroid"
                                                         style="width: 100px; height: 100px;">
                                                    <button class="btn btn-small rmAddPic"
                                                            data-i="<?php echo $i?>"
                                                            onclick="change_status('<?php if(isset($ADMIN_URL)){ echo $ADMIN_URL; } ?>products/deleteAddImage/<?php echo $model->getId()?>/<?php echo $i?>');">
                                                        <i class="icon-remove"></i>
                                                    </button>
                                                <?php else:?>
                                                    <img src="<?php if(isset($THEME)){ echo $THEME; } ?>images/select-picture.png" class="img-polaroid " style="width: 100px; ">
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <?php if($i % 2): ?>
                                        </div>
                                    <?php endif; ?>

                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<?php $addField = ShopCore::app()->CustomFieldsHelper->getCustomFields('product', $model->getId())->asAdminHtml()?>
<?php if(!empty($addField)): ?>
    <div class="tab-pane" id="customFields">
        <table class="table table-striped table-bordered table-hover table-condensed">
            <thead>
                <tr>
                    <th colspan="6">
                        <?php echo lang ('Additional data','admin'); ?>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="6">
                        <div class="inside_padd span12">
                            <div class="form-horizontal">
                                <?php if(isset($addField)){ echo $addField; } ?>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <div id="elFinder"> </div>
    </div>
<?php endif; ?>

<div class="tab-pane" id="kits">
    <a style="float: right;"
       class="btn btn-mini btn-success pjax"
       href="/admin/components/run/shop/kits/kit_create/<?php echo $model->getId()?>" >
        <i class="icon-plus-sign icon-white"></i><?php echo lang ('Create a set','admin'); ?>
    </a>

    <?php if(count($model->getKits($criteria))): ?>
        <table class="table table-striped table-bordered table-hover table-condensed">
            <thead>
                <tr>
                    <th colspan="6">
                        <?php echo lang ('Kits','admin'); ?>

                    </th>
                </tr>
            </thead>
            <tbody class="sortable">
                <tr>
                    <td colspan="6">
                        <?php $criteria = 'ASC'?>
                        <?php if($model->getKits($criteria)->count() > 0): ?>
                            <?php if(is_true_array($model->getKits($criteria))){ foreach ($model->getKits($criteria) as $kit){ ?>
                                <table class="table table-striped table-bordered table-hover table-condensed">
                                    <thead>
                                        <tr>
                                            <th>
                                                ID:<?php echo $kit->getId()?>
                                            </th>
                                            <th>
                                                <a class="pjax" href="<?php if(isset($ADMIN_URL)){ echo $ADMIN_URL; } ?>kits/kit_edit/<?php echo $kit->getId()?>"><?php echo lang ('Editing','admin'); ?></a>
                                            </th>
                                            <th>
                                                <?php echo lang ('Position','admin'); ?>: <?php echo $kit->getPosition()?>
                                                <button type="button" style="float: right" class="btn btn-mini kit_del" data-kid="<?php echo $kit->getId()?>">
                                                    <i title="<?php echo lang ('Delete set','admin'); ?>" class="icon-trash"></i>
                                                </button>
                                                <button type="button"
                                                        style="float: right; margin-right: 2px;"
                                                        class="btn btn-mini kit_change_active <?php if($kit->getActive() == 1): ?> active<?php endif; ?>"
                                                        data-kid="<?php echo $kit->getId()?>">
                                                    <i title="<?php echo lang ('Active','admin'); ?>" class="icon-ok"></i>
                                                </button>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <b><?php echo $kit->getLabel('Id')?></b>
                                            </td>
                                            <td>
                                                <b><?php echo $kit->getLabel('Name')?></b>
                                            </td>
                                            <td>
                                                <b><?php echo $kit->getLabel('Discount')?></b>
                                            </td>

                                        </tr>
                                        <?php if(is_true_array($kit->getShopKitProducts())){ foreach ($kit->getShopKitProducts() as $shopKitProduct){ ?>
                                            <?php $ap = $shopKitProduct->getSProducts()?>
                                            <?php $ap->setLocale($model->getLocale())?>
                                            <tr class="<?php echo func_counter ('even','odd'); ?>">
                                                <td><?php echo $ap->getId()?></td>
                                                <td><?php echo ShopCore::encode($ap->getName())?></td>
                                                <td><?php echo $shopKitProduct->getDiscount()?>%</td>
                                            </tr>
                                        <?php }} ?>
                                    </tbody>
                                </table>
                            <?php }} ?>
                        <?php endif; ?>
                    </td>
                </tr>
            </tbody>
        </table>
    <?php else:?>
        <div class="alert alert-info" style="margin-bottom: 18px; margin-top: 71px;">
            <?php echo lang ('Kit List products are empty','admin'); ?>
        </div>
    <?php endif; ?>
</div>

<?php $mabilis_ttl=1411124036; $mabilis_last_modified=1403818173; ///var/www/avto-era.com.ua/application/modules/shop/admin/templates/products/default_edit.tpl ?>