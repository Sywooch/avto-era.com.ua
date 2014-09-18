<?php /*/**
* @file Render shop product;
* @partof main.tpl;
* @updated 26 February 2013;
* Variables
*  $model : PropelObjectCollection of (object) instance of SProducts
*   $model->hasDiscounts() : Check whether the discount on the product.
*   $model->firstVariant : variable which contains the first variant of product;
*   $model->firstVariant->toCurrency() : variable which contains price of product;
*
*/?>
<?php $Comments = $CI->load->module('comments')->init($model)?>
<?php $NextCSIdCond = $NextCS != null?>
<?php $variants = $model->getProductVariants()?>
<?php $sizeAddImg = sizeof($productImages = $model->getSProductImagess())?>
<?php $hasDiscounts = $model->hasDiscounts()?>
<div class="frame-crumbs">
    <!-- Making bread crumbs -->
    <?php echo widget ('path'); ?>
</div>
<div class="frame-inside page-product">
    <div class="container">
        <div class="clearfix item-product <?php if($model->firstVariant->getStock() == 0): ?>not-avail<?php endif; ?>">
            <div class="f-s_0 title-product">
                <!-- Start. Name product -->
                <div class="frame-title">
                    <h1 class="d_i"><?php echo  ShopCore::encode($model->getName())?></h1>
                </div>
                <!-- End. Name product -->
                <!-- Start. article & variant name & brand name -->
                <span class="frame-variant-name-code">
                    <span class="frame-variant-code" <?php if(!$model->firstVariant->getNumber()): ?>style="display:none;"<?php endif; ?>>
                        <span class="c_9">
                            <span class="text-el">(</span><?php echo lang ('Код товара','newLevel'); ?>:
                            <span class="code">
                                <?php if($model->firstVariant->getNumber()): ?>
                                    <?php echo trim ($model->firstVariant->getNumber()); ?><span class="text-el">)</span>
                                <?php endif; ?>
                            </span>                       
                        </span>
                    </span>
                    <span class="frame-variant-name" <?php if(!$model->firstVariant->getName()): ?>style="display:none;"<?php endif; ?>>
                        <?php echo lang ('Вариант','newLevel'); ?>:
                        <span class="code">
                            <?php if($model->firstVariant->getName()): ?>
                                <?php echo trim ($model->firstVariant->getName()); ?>
                            <?php endif; ?>
                        </span>
                    </span>
                </span>
                <!-- End. article & variant name & brand name -->
            </div>
            <div class="right-product">
                <!-- Start. frame for cloudzoom -->
                <div id="xBlock"></div>
                <!-- End. frame for cloudzoom -->
                <div class="right-product-left">
                    <!-- Start. Check variant-->
                    <?php if(count($variants) > 1): ?>
                        <div class="check-variant-product">
                            <div class="title"><?php echo lang ('Вибор варианта','newLevel'); ?>:</div>
                            <div class="lineForm">
                                <select name="variant" id="variantSwitcher">
                                    <?php if(is_true_array($variants)){ foreach ($variants as $key => $productVariant){ ?>
                                        <option value="<?php echo $productVariant->getId()?>">
                                            <?php if($productVariant->getName()): ?>
                                                <?php echo ShopCore::encode($productVariant->getName())?>
                                            <?php else:?>
                                                <?php echo ShopCore::encode($model->getName())?>
                                            <?php endif; ?>
                                        </option>
                                    <?php }} ?>
                                </select>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!-- End. Check variant-->
                    <!-- Start. Description -->
                    <?php $props = ShopCore::app()->SPropertiesRenderer->renderPropertiesInlineNew($model->getId())?>
                    <div class="short-desc">
                        <ul class="prop-product prop-product-p">
                            <?php if($model->getBrand() != null): ?>
                            <li>
                                    <?php $brand = $model->getBrand()->getName()?>
                                    <?php $hasBrand = trim($brand) != ''?>
                                    <span class="frame-item-brand"><b><?php echo lang ('Бренд','newLevel'); ?>:</b>
                                        <span>
                                            <?php if($hasBrand): ?>
                                                <span>
                                                    <?php echo trim($brand)?>
                                                </span>
                                            <?php endif; ?>
                                        </span>
                                    </span>                       
                            </li>
                            <?php endif; ?>
                            <?php echo $props?>
                        </ul>
                    </div>
                    <!--Start .Share-->
                    <div class="clearfix m-b_5">
                        <dl class="social-product">
                            <dd class="social-like f_l">
                                <?php echo $CI->load->module('share')->_make_like_buttons()?>
                            </dd>
                            <dd class="social-tell f_r">
                                <?php echo $CI->load->module('share')->_make_share_form()?>
                            </dd>
                        </dl>
                    </div>
                    <!-- End. Share -->
                    <?php if(trim($model->getShortDescription()) != ''): ?>                      
                        <div class="short-desc">
                            <?php echo $model->getShortDescription()?>
                        </div>
                    <?php endif; ?>
                    <!--  End. Description -->
                </div>
                <div class="right-product-right">
                    <div class="f-s_0 buy-block">
                        <div class="frame-prices-buy-wish-compare">
                            <div class="frame-prices-buy f-s_0 t-a_c">
                                <!-- Start. Prices-->
                                <div class="frame-prices f-s_0 t-a_l">
                                    <!-- Start. Check for discount-->
                                    <?php $oldoprice = $model->getOldPrice() && $model->getOldPrice() != 0 && $model->getOldPrice() > $model->firstVariant->toCurrency()?>
                                    <?php if($hasDiscounts): ?>
                                        <span class="price-discount">
                                            <span>
                                                <span class="price priceOrigVariant"><?php echo $model->firstVariant->toCurrency('OrigPrice')?></span>
                                                <span class="curr"><?php if(isset($CS)){ echo $CS; } ?></span>
                                            </span>
                                        </span>
                                    <?php endif; ?>
                                    <!-- End. Check for discount-->
                                    <!-- Start. Check old price-->
                                    <?php if($oldoprice && !$hasDiscounts): ?>
                                        <span class="price-discount">
                                            <span>
                                                <span class="price priceOrigVariant"><?php echo intval($model->getOldPrice())?></span>
                                                <span class="curr"><?php if(isset($CS)){ echo $CS; } ?></span>
                                            </span>
                                        </span>
                                    <?php endif; ?>
                                    <!-- End. Check old price-->
                                    <!-- Start. Product price-->
                                    <?php if($model->firstVariant->toCurrency() > 0): ?>
                                        <span class="current-prices f-s_0">
                                            <span class="price-new">
                                                <span>
                                                    <span class="price priceVariant"><?php echo $model->firstVariant->toCurrency()?></span>
                                                    <span class="curr"><?php if(isset($CS)){ echo $CS; } ?></span>
                                                </span>
                                            </span>
                                            <?php if($NextCSIdCond): ?>
                                                <span class="price-add">
                                                    <span>
                                                        (<span class="price addCurrPrice"><?php echo $model->firstVariant->toCurrency('Price',$NextCSId)?></span>
                                                        <span class="curr-add"><?php if(isset($NextCS)){ echo $NextCS; } ?></span>)
                                                    </span>
                                                </span>
                                            <?php endif; ?>
                                        </span>
                                    <?php endif; ?>
                                    <!-- End. Product price-->
                                </div>
                                <!-- End. Prices-->
                                <div class="funcs-buttons">
                                    <!-- Start. Collect information about Variants, for future processing -->
                                    <?php if(is_true_array($variants)){ foreach ($variants as $key => $productVariant){ ?>
                                        <?php $discount = 0?>
                                        <?php if($hasDiscounts): ?>
                                            <?php $discount = $productVariant->getvirtual('numDiscount')/$productVariant->toCurrency()*100?>
                                        <?php endif; ?>
                                        <?php if($productVariant->getStock() > 0): ?>
                                            <div class="frame-count-buy variant_<?php echo $productVariant->getId()?> variant" <?php if($key != 0): ?>style="display:none"<?php endif; ?>>
                                                <div class="frame-count front-count">
                                                    <div class="number" data-title="<?php echo lang ('Количество на складе','newLevel'); ?> <?php echo $productVariant->getstock()?>" data-prodid="<?php echo $model->getId()?>" data-varid="<?php echo $productVariant->getId()?>" data-rel="frameplusminus">
                                                        <div class="frame-change-count">
                                                            <div class="btn-plus">
                                                                <button type="button">
                                                                    <span class="icon-plus"></span>
                                                                </button>
                                                            </div>
                                                            <div class="btn-minus">
                                                                <button type="button">
                                                                    <span class="icon-minus"></span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <input type="text" value="1" data-rel="plusminus" data-title="<?php echo lang ('Только цифры','newLevel'); ?>" data-min="1" data-max="<?php echo $productVariant->getstock()?>">
                                                    </div>
                                                </div>
                                                <div class="btn-buy btn-buy-p">
                                                    <button class="btnBuy infoBut"
                                                            disabled="disabled"
                                                            type="button"
                                                            data-id="<?php echo $productVariant->getId()?>"
                                                            data-prodid="<?php echo $model->getId()?>"
                                                            data-varid="<?php echo $productVariant->getId()?>"
                                                            data-price="<?php echo $productVariant->toCurrency()?>"
                                                            data-count="1"
                                                            data-name="<?php echo ShopCore::encode($model->getName())?>"
                                                            data-vname="<?php echo trim(ShopCore::encode($productVariant->getName()))?>"
                                                            data-maxcount="<?php echo $productVariant->getstock()?>"
                                                            data-number="<?php echo trim($productVariant->getNumber())?>"
                                                            data-url="<?php echo shop_url('product/'.$model->getUrl())?>"
                                                            data-img="<?php echo $productVariant->getSmallPhoto()?>"
                                                            data-mainImage="<?php echo $productVariant->getMainPhoto()?>"
                                                            data-largeImage="<?php echo $productVariant->getlargePhoto()?>"
                                                            data-origPrice="<?php if($hasDiscounts): ?><?php echo $productVariant->toCurrency('OrigPrice')?><?php endif; ?>"
                                                            data-addPrice="<?php if($NextCSIdCond): ?><?php echo $productVariant->toCurrency('Price',$NextCSId)?><?php endif; ?>"
                                                            data-prodStatus='<?php echo json_encode (promoLabelBtn($model->getAction(), $model->getHot(), $model->getHit(), $discount)); ?>'
                                                            >
                                                        <span class="icon_cleaner icon_cleaner_buy"></span>
                                                        <span class="text-el"><?php echo lang ('В корзину'); ?></span>
                                                    </button>
                                                </div>
                                            </div>
                                        <?php else:?>
                                            <div class="d_i-b v-a_m">
                                                <div class="variant_<?php echo $productVariant->getId()?> variant" <?php if($key != 0): ?>style="display:none"<?php endif; ?>>
                                                    <div class="alert-exists"><?php echo lang ('Нет в наличии','newLevel'); ?></div>
                                                    <div class="btn-not-avail">
                                                        <button
                                                            type="button"
                                                            data-drop=".drop-report"
                                                            data-source="/shop/ajax/getNotifyingRequest"

                                                            data-id="<?php echo $productVariant->getId()?>"
                                                            data-prodid="<?php echo $model->getId()?>"
                                                            data-varid="<?php echo $productVariant->getId()?>"
                                                            data-url="<?php echo shop_url('product/'.$model->getUrl())?>"
                                                            data-price="<?php echo $productVariant->toCurrency()?>"
                                                            data-origPrice="<?php if($hasDiscounts): ?><?php echo $productVariant->toCurrency('OrigPrice')?><?php endif; ?>"
                                                            data-addPrice="<?php if($NextCSIdCond): ?><?php echo $productVariant->toCurrency('Price',$NextCSId)?><?php endif; ?>"
                                                            data-name="<?php echo ShopCore::encode($model->getName())?>"
                                                            data-vname="<?php echo trim(ShopCore::encode($productVariant->getName()))?>"
                                                            data-maxcount="<?php echo $productVariant->getstock()?>"
                                                            data-number="<?php echo trim($productVariant->getNumber())?>"
                                                            data-img="<?php echo $productVariant->getSmallPhoto()?>"
                                                            data-mainImage="<?php echo $productVariant->getMainPhoto()?>"
                                                            data-largeImage="<?php echo $productVariant->getlargePhoto()?>"
                                                            class="infoBut">
                                                            <span class="icon-but"></span>
                                                            <span class="text-el"><?php echo lang ('Сообщить о появлении','newLevel'); ?></span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php }} ?>
                                </div>
                                <!-- End. Collect information about Variants, for future processing -->
                            </div>
                            <!-- Start. Wish List & Compare List buttons -->
                            <div class="frame-wish-compare-list f-s_0">
                                <div class="frame-btn-compare">
                                    <div class="btn-compare" data-prodid="<?php echo $model->getId()?>">
                                        <button class="toCompare pointer"
                                                data-prodid="<?php echo $model->getId()?>"
                                                type="button"
                                                data-title="<?php echo lang ('Добавиить к сравнению','newLevel'); ?>"
                                                data-firtitle="<?php echo lang ('Добавиить к сравнению','newLevel'); ?>"
                                                data-sectitle="<?php echo lang ('В сравнении','newLevel'); ?>"
                                                data-rel="tooltip">
                                            <span class="icon_compare"></span>
                                            <span class="text-el d_l_bl"><?php echo lang ('Добавиить к сравнению','newLevel'); ?></span>
                                        </button>
                                    </div>
                                </div>
                                <?php if(is_true_array($variants)){ foreach ($variants as $key => $pv){ ?>
                                    <div class="frame-btn-wish variant_<?php echo $pv->getId()?> variant" <?php if($key != 0): ?>style="display:none"<?php endif; ?> data-id="<?php echo $model->getId()?>" data-varid="<?php echo $pv->getId()?>">
                                        <?php $CI->load->module('wishlist')->renderWLButton($pv->getId())?>
                                    </div>
                                <?php }} ?>
                            </div>
                            <!-- End. Wish List & Compare List buttons -->
                        </div>
                    </div>
                    <!--Start. Payments method form -->
                    <?php echo widget ('payments_delivery_methods_info'); ?>
                    <!--End. Payments method form -->
                </div>
            </div>
            <div class="left-product">
                <!-- Start. Photo block-->
                <a rel="position: 'xBlock'" onclick="return false;" href="<?php echo $model->firstVariant->getLargePhoto()?>" class="frame-photo-title photoProduct cloud-zoom" id="photoProduct" title="<?php echo ShopCore::encode($model->getName())?>"  data-drop="#photo" data-start="initDrop">
                    <span class="photo-block">
                        <span class="helper"></span>
                        <img src="<?php echo $model->firstVariant->getMainPhoto()?>" alt="<?php echo ShopCore::encode($model->getName())?>" title="<?php echo ShopCore::encode($model->getName())?> - <?php echo $model->getId()?>" class="vimgPr"/>
                        <?php $discount = 0?>
                        <?php if($hasDiscounts): ?>
                            <?php $discount = $model->firstVariant->getvirtual('numDiscount')/$model->firstVariant->toCurrency('origprice')*100?>
                        <?php endif; ?>
                        <?php echo promoLabel ($model->getAction(), $model->getHot(), $model->getHit(), $discount); ?>
                    </span>
                </a>
                <!-- End. Photo block-->
                <!-- Start. Star rating -->
                <?php if($model->enable_comments && intval($Comments[$model->getId()]) !== 0): ?>
                    <div class="frame-star">
                        <?php $CI->load->module('star_rating')->show_star_rating($model, false)?>
                        <div class="d_i-b v-a_m">
                            <button data-trigger="[data-href='#comment']" data-scroll="true" class="count-response pointer">
                                <span class="text-el c_9">Всего:</span>
                                <span class="d_l_red">
                                    <?php echo intval ($Comments[$model->getId()]); ?>
                                    <?php echo SStringHelper::Pluralize($Comments[$model->getId()], array(lang("отзыв","newLevel"),lang("отзыва","newLevel"),lang("отзывов","newLevel")))?>
                                </span>
                            </button>
                        </div>
                    </div>
                <?php endif; ?>
                <!-- End. Star rating-->
                <?php if($sizeAddImg > 0): ?>
                    <!-- Start. additional images-->
                    <div class="horizontal-carousel">
                        <div class="frame-thumbs carousel_js">
                            <?php /*carousel_js*/?>
                            <div class="content-carousel">
                                <ul class="items-thumbs items">
                                    <!-- Start. main image-->
                                    <li class="active">
                                        <a onclick="return false;" rel="useZoom: 'photoProduct'" href="<?php echo $model->firstVariant->getLargePhoto()?>" title="<?php echo ShopCore::encode($model->getName())?>" class="cloud-zoom-gallery" id="mainThumb">
                                            <span class="photo-block">
                                                <span class="helper"></span>
                                                <img src="<?php echo $model->firstVariant->getSmallPhoto()?>" alt="<?php echo ShopCore::encode($model->getName())?>" class="vimgPr"/>
                                            </span>
                                        </a>
                                    </li>
                                    <!-- End. main image-->
                                    <?php if(is_true_array($productImages)){ foreach ($productImages as $key => $image){ ?>
                                        <li>
                                            <a onclick="return false;" rel="useZoom: 'photoProduct'" href="<?php echo productImageUrl ('products/additional/'.$image->getImageName()); ?>" title="<?php echo ShopCore::encode($model->getName())?>" class="cloud-zoom-gallery">
                                                <span class="photo-block">
                                                    <span class="helper"></span>
                                                    <img src="<?php echo productImageUrl('products/additional/thumb_'.$image->getImageName())?>" alt="<?php echo ShopCore::encode($model->getName())?> - <?php echo ++$key?>"/>
                                                </span>
                                            </a>
                                        </li>
                                    <?php }} ?>
                                </ul>
                            </div>
                            <div class="group-button-carousel">
                                <button type="button" class="prev arrow">
                                    <span class="icon_arrow_p"></span>
                                </button>
                                <button type="button" class="next arrow">
                                    <span class="icon_arrow_n"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- End. additional images-->
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="container f-s_0">
        <div class="frame-form-comment">
            <?php $c=$CI->load->module('comments/commentsapi')->renderAsArray($CI->uri->uri_string())?>
            <div class="for_comments">
                <?php echo $c['comments']?>
            </div>
            <!--End. Comments block-->
        </div>
    </div>
</div>
<!-- Start. Similar Products-->
<div class="horizontal-carousel">
    <?php echo widget ('similar'); ?>
</div>
<!-- End. Similar Products-->

<!-- Start. Photo Popup Frame-->
<div class="drop drop-style" id="photo"></div>
<script type="text/template" id="framePhotoProduct">
        <button type="button" class="icon_times_drop" data-closed="closed-js"></button>
        <div class="drop-header">
        <div class="title"><%- obj.title %></div>
        </div>
        <div class="horizontal-carousel">
        <div class="frame-fancy-gallery frame-thumbs">
        <div class="fancy-gallery carousel_js">
        <div class="content-carousel">
        <ul class="items-thumbs items">
        <%= obj.frame.find(obj.galleryContent).html() %>
        </ul>
        </div>
        <div class="group-button-carousel">
        <button type="button" class="prev arrow">
        <span class="icon_arrow_p"></span>
        </button>
        <button type="button" class="next arrow">
        <span class="icon_arrow_n"></span>
        </button>
        </div>
        </div>
        </div>
        </div>
        <div class="drop-content-photo">
        <div class="inside-padd">
        <span class="helper"></span>
        <img src="<%- obj.mainPhoto %>" alt="<%- obj.title %>"/>
        </div>
        <div class="horizontal-carousel">
        <div class="group-button-carousel">
        <button type="button" class="prev arrow">
        <span class="icon_arrow_p"></span>
        </button>
        <button type="button" class="next arrow">
        <span class="icon_arrow_n"></span>
        </button>
        </div>
        </div>
        </div>
        <div class="drop-footer">
        <%= obj.frame.find(obj.footerContent).html()%>
        </div>
    
</script>
<!-- End. Photo Popup Frame-->

<!-- Start. JS vars-->
<script type="text/javascript">
    var hrefCategoryProduct = "<?php if(isset($category_url)){ echo $category_url; } ?>";
</script>
    <script type="text/javascript">
        var
        productPhotoDrop = true,
        productPhotoCZoom = true;
    </script>

<!-- End. JS vars-->

<script type="text/javascript">
    initDownloadScripts(['cusel-min-2.5', 'cloud-zoom.1.0.3.min', '_product'], 'initPhotoTrEv', 'initPhotoTrEv');
</script><?php $mabilis_ttl=1411133400; $mabilis_last_modified=1403818558; ///var/www/avto-era.com.ua/templates/newLevel/shop/product.tpl ?>