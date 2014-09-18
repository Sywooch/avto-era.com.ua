<!-- Edit product form -->
<section class="mini-layout">
    <div class="frame_title clearfix">
        <div class="pull-left">
            <span class="help-inline"></span>
            <span class="title"><?php echo ShopCore::encode($model->getName())?></span>
        </div>
        <div class="pull-right">
            <div class="d-i_b">
                <!-- $_SESSION['ref_url'] is session variable to save filter results to go back to it -->
                <a href="<?php if(isset($ADMIN_URL)){ echo $ADMIN_URL; } ?>search/index<?php echo $_SESSION['ref_url']; ?>" class="t-d_n m-r_15 pjax"><span class="f-s_14">←</span> <span class="t-d_u"><?php echo lang ('Back','admin'); ?></span></a>
                <button type="button" class="btn btn-small action_on formSubmit btn-primary" data-form="#image_upload_form" data-submit><i class="icon-ok"></i><?php echo lang ('Save','admin'); ?></button>
                <button type="button" class="btn btn-small action_on formSubmit" data-form="#image_upload_form" data-action="close"><i class="icon-check"></i><?php echo lang ('Save and exit','admin'); ?></button>
                    <?php echo create_language_select($languages, $locale, "/admin/components/run/shop/products/edit/".$model->getId())?>
            </div>
        </div>
    </div>
    <form  action="<?php if(isset($ADMIN_URL)){ echo $ADMIN_URL; } ?>products/edit/<?php echo $model->getId()?>/<?php if(isset($locale)){ echo $locale; } ?>" method="post" enctype="multipart/form-data"  id="image_upload_form">
        <div class="content_big_td">
            <div class="clearfix">
                <div class="btn-group myTab m-t_20 pull-left" data-toggle="buttons-radio">
                    <a href="#parameters" class="btn btn-small active"><?php echo lang ('Product','admin'); ?></a>
                    <a href="#parameters_article" class="btn btn-small"><?php echo lang ('Properties','admin'); ?></a>
                    <?php $addField = ShopCore::app()->CustomFieldsHelper->getCustomFields('product', $model->getId())->asAdminHtml()?>

                    <a href="#additionalPics" class="btn btn-small"><?php echo lang ('Images','admin'); ?></a>
                    <?php if($addField): ?>
                        <a href="#customFields" class="btn btn-small"><?php echo lang ('Additional data','admin'); ?></a>
                    <?php endif; ?>

                    <a href="#kits" class="btn btn-small"><?php echo lang ('Kits','admin'); ?></a>
                    <?php if($moduleAdditions): ?>
                        <a href="#modules_additions" class="btn btn-small"><?php echo lang ('Modules additions', 'admin'); ?></a>
                    <?php endif; ?>
                </div>
                <div class="pull-right m-t_20">
                    <a href="/shop/product/<?php echo $model->getUrl()?>" target="_blank" class="btn btn-small action_on" data-form="#image_upload_form" data-action="close"><i class="icon-share-alt m-r_5"></i><?php echo lang ('View page','admin'); ?></a>
                    <a href=""></a>
                </div>
                <div class="pagination pagination-small pagination-centered">
                    <ul>
                        <li <?php if(!$prev_id): ?>class="disabled"<?php endif; ?>>
                            <?php if($prev_id): ?>
                                <a href="/admin/components/run/shop/products/edit/<?php echo $prev_id?><?php echo $_SESSION['ref_url']?>" class="pjax"><span>←</span> <?php echo lang ('Previous','admin'); ?></a>
                            <?php else:?>
                                <span><span>←</span> <?php echo lang ('Previous','admin'); ?></span>
                            <?php endif; ?>
                        </li>
                        <li <?php if(!$next_id): ?>class="disabled"<?php endif; ?>>
                            <?php if($next_id): ?>
                                <a href="/admin/components/run/shop/products/edit/<?php echo $next_id?><?php echo $_SESSION['ref_url']?>" class="pjax"><?php echo lang ('Next','admin'); ?> <span>→</span></a>
                            <?php else:?>
                                <span><?php echo lang ('Next','admin'); ?> <span>→</span></span>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">

                <?php $this->include_tpl('default_edit', '/var/www/avto-era.com.ua/application/modules/shop/admin/templates/products'); ?>

                <?php $this->include_tpl('../modules_additions', '/var/www/avto-era.com.ua/application/modules/shop/admin/templates/products'); ?>

            </div>
        </div>
    </form>
</section>
<div style="display:none;">
    <div class="warehouse_line">
        <select name="warehouses[]" class="input-medium">
            <option value="">---</option>
            <?php if(is_true_array($warehouses)){ foreach ($warehouses as $w){ ?>
                <option value="<?php echo $w->getId()?>"><?php echo encode($w->getName())?></option>
            <?php }} ?>
        </select>
        <input type="text" name="warehouses_c[]"  value="" class="textbox_short input-medium"/>
        <a data-del="wares" class="btn btn-small"><i class="icon-trash"></i></a>
    </div>
</div>
<!-- ---------------------------------------------------Блок видалення---------------------------------------------------- -->
<div class="modal hide fade modal_del_kit">
    <div class="modal-header">
        <button type="button" class="close f-s_26" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3><?php echo lang ('Kit removal','admin'); ?></h3>
    </div>
    <div class="modal-body">
        <p><?php echo lang ('Kits del body','admin'); ?></p>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn btn-primary kit_del_ok"><?php echo lang ('Delete','admin'); ?></a>
        <a href="#" class="btn" onclick="$('.modal').modal('hide');"><?php echo lang ('Cancel','admin'); ?></a>
    </div>
</div>
<!-- ---------------------------------------------------Блок видалення---------------------------------------------------- -->

<!-- ---------------------------------------------------Блок для додавання варыантів-------------------------------------- -->
<div style="display: none;" class="variantRowSample">
    <?php $v = $model->getFirstVariant()?>
    <table>
        <tbody>
            <tr id="ProductVariantRow_">
                <td>
                    <button class="btn my_btn_s btn-small pull-left btn-danger m-r_5"
                            type="button"
                            data-remove data-rel="tooltip"
                            data-title="<?php echo lang ('Delete','admin'); ?>">
                        <i class="icon-trash icon-white"></i>
                    </button>
                    <div class="o_h">
                        <input type="hidden" name="variants[RandomId][]"  class="random_id" value=""/>
                        <input type="hidden" name="variants[CurrentId][]" value="" />
                        <input type="text" name="variants[Name][]" value=""/>
                    </div>
                </td>
                <td class="number"><input type="text" name="variants[PriceInMain][]" value=""/></td>
                    <?php if(count($currencies)>0): ?>
                    <td>
                        <select name="variants[currency][]">
                            <?php if(is_true_array($currencies)){ foreach ($currencies as $c){ ?>

                                <option value="<?php echo $c->getId()?>" <?php if($c->getMain()): ?>selected="selected"<?php endif; ?>><?php echo $c->getCode()?></option>
                            <?php }} ?>
                        </select>
                    </td>
                <?php endif; ?>
                <td><input type="text" name="variants[Number][]" value="" class="textbox_short" /></td>
                <td class="number"><input type="text" name="variants[Stock][]" value="1" class="textbox_short" /></td>
                <td class="variantImage">
                    <div class="control-group photo_album">
                        <label class="control-label" style="display: none;">
                            <span class="btn btn-small p_r" data-url="file" >
                                <i class="icon-camera"></i>
                                <input type="file" class="newImage" name="image" title="<?php echo lang ('Main image','admin'); ?>" accept="image/jpeg,image/png,image/gif"/>
                                <input type="hidden" name="changeImage[]" value="" class="changeImage" />
                                <input type="hidden" name="variants[MainImageForDel][]" value="0"/>
                            </span>
                        </label>
                        <div class="controls">
                            <div class="fon"></div>
                            <div class="btn-group f-s_0">
                                <button type="button"
                                        class="btn change_image"
                                        data-rel="tooltip"
                                        data-title="<?php echo lang ('Edit','admin'); ?>"
                                        data-original-title="">
                                    <i class="icon-edit"></i>
                                </button>
                                <button type="button"  class="btn images_modal" data-rel="tooltip" data-title="Загрузить с интернета" data-original-title=""><i class="icon-search"></i></button>
                                    <?php if($v->getMainImage()): ?>
                                    <button class="btn delete_image"
                                            type="button"
                                            data-title="<?php echo lang ('Delete','admin'); ?>">
                                        <i class="icon-remove"></i>
                                    </button>
                                <?php endif; ?>
                            </div>
                            <img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/select-picture.png" class="img-polaroid " style="width: 50px;"/>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<?php if(isset($imagesPopup)){ echo $imagesPopup; } ?>

<!-- ---------------------------------------------------Блок для додавання варыантів-------------------------------------- -->
    <script type="text/javascript">
            function vName() {
                $('.vName').show();
                $('.vNameH').hide();
            }

    </script>

<?php $mabilis_ttl=1411124036; $mabilis_last_modified=1403818173; ///var/www/avto-era.com.ua/application/modules/shop/admin/templates/products/edit.tpl ?>