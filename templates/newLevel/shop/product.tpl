{/*/**
* @file Render shop product;
* @partof main.tpl;
* @updated 26 February 2013;
* Variables
*  $model : PropelObjectCollection of (object) instance of SProducts
*   $model->hasDiscounts() : Check whether the discount on the product.
*   $model->firstVariant : variable which contains the first variant of product;
*   $model->firstVariant->toCurrency() : variable which contains price of product;
*
*/}
{$Comments = $CI->load->module('comments')->init($model)}
{$NextCSIdCond = $NextCS != null}
{$variants = $model->getProductVariants()}
{$sizeAddImg = sizeof($productImages = $model->getSProductImagess())}
{$hasDiscounts = $model->hasDiscounts()}
<div class="frame-crumbs">
    <!-- Making bread crumbs -->
    {widget('path')}
</div>
<div class="frame-inside page-product">
    <div class="container">
        <div class="clearfix item-product {if $model->firstVariant->getStock() == 0}not-avail{/if}">
            <div class="f-s_0 title-product">
                <!-- Start. Name product -->
                <div class="frame-title">
                    <h1 class="d_i">{echo  ShopCore::encode($model->getName())}</h1>
                </div>
                <!-- End. Name product -->
                <!-- Start. article & variant name & brand name -->
                <span class="frame-variant-name-code">
                    <span class="frame-variant-code" {if !$model->firstVariant->getNumber()}style="display:none;"{/if}>
                        <span class="c_9">
                            <span class="text-el">(</span>{lang('Код товара','newLevel')}:
                            <span class="code">
                                {if $model->firstVariant->getNumber()}
                                    {trim($model->firstVariant->getNumber())}<span class="text-el">)</span>
                                {/if}
                            </span>                       
                        </span>
                    </span>
                    <span class="frame-variant-name" {if !$model->firstVariant->getName()}style="display:none;"{/if}>
                        {lang('Вариант','newLevel')}:
                        <span class="code">
                            {if $model->firstVariant->getName()}
                                {trim($model->firstVariant->getName())}
                            {/if}
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
                    {if count($variants) > 1}
                        <div class="check-variant-product">
                            <div class="title">{lang('Вибор варианта','newLevel')}:</div>
                            <div class="lineForm">
                                <select name="variant" id="variantSwitcher">
                                    {foreach $variants as $key => $productVariant}
                                        <option value="{echo $productVariant->getId()}">
                                            {if $productVariant->getName()}
                                                {echo ShopCore::encode($productVariant->getName())}
                                            {else:}
                                                {echo ShopCore::encode($model->getName())}
                                            {/if}
                                        </option>
                                    {/foreach}
                                </select>
                            </div>
                        </div>
                    {/if}
                    <!-- End. Check variant-->
                    <!-- Start. Description -->
                    {$props = ShopCore::app()->SPropertiesRenderer->renderPropertiesInlineNew($model->getId())}
                    <div class="short-desc">
                        <ul class="prop-product prop-product-p">
                            {if $model->getBrand() != null}
                            <li>
                                    {$brand = $model->getBrand()->getName()}
                                    {$hasBrand = trim($brand) != ''}
                                    <span class="frame-item-brand"><b>{lang('Бренд','newLevel')}:</b>
                                        <span>
                                            {if $hasBrand}
                                                <span>
                                                    {echo trim($brand)}
                                                </span>
                                            {/if}
                                        </span>
                                    </span>                       
                            </li>
                            {/if}
                            {echo $props}
                        </ul>
                    </div>
                    <!--Start .Share-->
                    <div class="clearfix m-b_5">
                        <dl class="social-product">
                            <dd class="social-like f_l">
                                {echo $CI->load->module('share')->_make_like_buttons()}
                            </dd>
                            <dd class="social-tell f_r">
                                {echo $CI->load->module('share')->_make_share_form()}
                            </dd>
                        </dl>
                    </div>
                    <!-- End. Share -->
                    {if trim($model->getShortDescription()) != ''}                      
                        <div class="short-desc">
                            {echo $model->getShortDescription()}
                        </div>
                    {/if}
                    <!--  End. Description -->
                </div>
                <div class="right-product-right">
                    <div class="f-s_0 buy-block">
                        <div class="frame-prices-buy-wish-compare">
                            <div class="frame-prices-buy f-s_0 t-a_c">
                                <!-- Start. Prices-->
                                <div class="frame-prices f-s_0 t-a_l">
                                    <!-- Start. Check for discount-->
                                    {$oldoprice = $model->getOldPrice() && $model->getOldPrice() != 0 && $model->getOldPrice() > $model->firstVariant->toCurrency()}
                                    {if $hasDiscounts}
                                        <span class="price-discount">
                                            <span>
                                                <span class="price priceOrigVariant">{echo $model->firstVariant->toCurrency('OrigPrice')}</span>
                                                <span class="curr">{$CS}</span>
                                            </span>
                                        </span>
                                    {/if}
                                    <!-- End. Check for discount-->
                                    <!-- Start. Check old price-->
                                    {if $oldoprice && !$hasDiscounts}
                                        <span class="price-discount">
                                            <span>
                                                <span class="price priceOrigVariant">{echo intval($model->getOldPrice())}</span>
                                                <span class="curr">{$CS}</span>
                                            </span>
                                        </span>
                                    {/if}
                                    <!-- End. Check old price-->
                                    <!-- Start. Product price-->
                                    {if $model->firstVariant->toCurrency() > 0}
                                        <span class="current-prices f-s_0">
                                            <span class="price-new">
                                                <span>
                                                    <span class="price priceVariant">{echo $model->firstVariant->toCurrency()}</span>
                                                    <span class="curr">{$CS}</span>
                                                </span>
                                            </span>
                                            {if $NextCSIdCond}
                                                <span class="price-add">
                                                    <span>
                                                        (<span class="price addCurrPrice">{echo $model->firstVariant->toCurrency('Price',$NextCSId)}</span>
                                                        <span class="curr-add">{$NextCS}</span>)
                                                    </span>
                                                </span>
                                            {/if}
                                        </span>
                                    {/if}
                                    <!-- End. Product price-->
                                </div>
                                <!-- End. Prices-->
                                <div class="funcs-buttons">
                                    <!-- Start. Collect information about Variants, for future processing -->
                                    {foreach $variants as $key => $productVariant}
                                        {$discount = 0}
                                        {if $hasDiscounts}
                                            {$discount = $productVariant->getvirtual('numDiscount')/$productVariant->toCurrency()*100}
                                        {/if}
                                        {if $productVariant->getStock() > 0}
                                            <div class="frame-count-buy variant_{echo $productVariant->getId()} variant" {if $key != 0}style="display:none"{/if}>
                                                <div class="frame-count front-count">
                                                    <div class="number" data-title="{lang('Количество на складе','newLevel')} {echo $productVariant->getstock()}" data-prodid="{echo $model->getId()}" data-varid="{echo $productVariant->getId()}" data-rel="frameplusminus">
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
                                                        <input type="text" value="1" data-rel="plusminus" data-title="{lang('Только цифры','newLevel')}" data-min="1" data-max="{echo $productVariant->getstock()}">
                                                    </div>
                                                </div>
                                                <div class="btn-buy btn-buy-p">
                                                    <button class="btnBuy infoBut"
                                                            disabled="disabled"
                                                            type="button"
                                                            data-id="{echo $productVariant->getId()}"
                                                            data-prodid="{echo $model->getId()}"
                                                            data-varid="{echo $productVariant->getId()}"
                                                            data-price="{echo $productVariant->toCurrency()}"
                                                            data-count="1"
                                                            data-name="{echo ShopCore::encode($model->getName())}"
                                                            data-vname="{echo trim(ShopCore::encode($productVariant->getName()))}"
                                                            data-maxcount="{echo $productVariant->getstock()}"
                                                            data-number="{echo trim($productVariant->getNumber())}"
                                                            data-url="{echo shop_url('product/'.$model->getUrl())}"
                                                            data-img="{echo $productVariant->getSmallPhoto()}"
                                                            data-mainImage="{echo $productVariant->getMainPhoto()}"
                                                            data-largeImage="{echo $productVariant->getlargePhoto()}"
                                                            data-origPrice="{if $hasDiscounts}{echo $productVariant->toCurrency('OrigPrice')}{/if}"
                                                            data-addPrice="{if $NextCSIdCond}{echo $productVariant->toCurrency('Price',$NextCSId)}{/if}"
                                                            data-prodStatus='{json_encode(promoLabelBtn($model->getAction(), $model->getHot(), $model->getHit(), $discount))}'
                                                            >
                                                        <span class="icon_cleaner icon_cleaner_buy"></span>
                                                        <span class="text-el">{lang('В корзину')}</span>
                                                    </button>
                                                </div>
                                            </div>
                                        {else:}
                                            <div class="d_i-b v-a_m">
                                                <div class="variant_{echo $productVariant->getId()} variant" {if $key != 0}style="display:none"{/if}>
                                                    <div class="alert-exists">{lang('Нет в наличии','newLevel')}</div>
                                                    <div class="btn-not-avail">
                                                        <button
                                                            type="button"
                                                            data-drop=".drop-report"
                                                            data-source="/shop/ajax/getNotifyingRequest"

                                                            data-id="{echo $productVariant->getId()}"
                                                            data-prodid="{echo $model->getId()}"
                                                            data-varid="{echo $productVariant->getId()}"
                                                            data-url="{echo shop_url('product/'.$model->getUrl())}"
                                                            data-price="{echo $productVariant->toCurrency()}"
                                                            data-origPrice="{if $hasDiscounts}{echo $productVariant->toCurrency('OrigPrice')}{/if}"
                                                            data-addPrice="{if $NextCSIdCond}{echo $productVariant->toCurrency('Price',$NextCSId)}{/if}"
                                                            data-name="{echo ShopCore::encode($model->getName())}"
                                                            data-vname="{echo trim(ShopCore::encode($productVariant->getName()))}"
                                                            data-maxcount="{echo $productVariant->getstock()}"
                                                            data-number="{echo trim($productVariant->getNumber())}"
                                                            data-img="{echo $productVariant->getSmallPhoto()}"
                                                            data-mainImage="{echo $productVariant->getMainPhoto()}"
                                                            data-largeImage="{echo $productVariant->getlargePhoto()}"
                                                            class="infoBut">
                                                            <span class="icon-but"></span>
                                                            <span class="text-el">{lang('Сообщить о появлении','newLevel')}</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        {/if}
                                    {/foreach}
                                </div>
                                <!-- End. Collect information about Variants, for future processing -->
                            </div>
                            <!-- Start. Wish List & Compare List buttons -->
                            <div class="frame-wish-compare-list f-s_0">
                                <div class="frame-btn-compare">
                                    <div class="btn-compare" data-prodid="{echo $model->getId()}">
                                        <button class="toCompare pointer"
                                                data-prodid="{echo $model->getId()}"
                                                type="button"
                                                data-title="{lang('Добавиить к сравнению','newLevel')}"
                                                data-firtitle="{lang('Добавиить к сравнению','newLevel')}"
                                                data-sectitle="{lang('В сравнении','newLevel')}"
                                                data-rel="tooltip">
                                            <span class="icon_compare"></span>
                                            <span class="text-el d_l_bl">{lang('Добавиить к сравнению','newLevel')}</span>
                                        </button>
                                    </div>
                                </div>
                                {foreach $variants as $key => $pv}
                                    <div class="frame-btn-wish variant_{echo $pv->getId()} variant" {if $key != 0}style="display:none"{/if} data-id="{echo $model->getId()}" data-varid="{echo $pv->getId()}">
                                        {$CI->load->module('wishlist')->renderWLButton($pv->getId())}
                                    </div>
                                {/foreach}
                            </div>
                            <!-- End. Wish List & Compare List buttons -->
                        </div>
                    </div>
                    <!--Start. Payments method form -->
                    {widget('payments_delivery_methods_info')}
                    <!--End. Payments method form -->
                </div>
            </div>
            <div class="left-product">
                <!-- Start. Photo block-->
                <a rel="position: 'xBlock'" onclick="return false;" href="{echo $model->firstVariant->getLargePhoto()}" class="frame-photo-title photoProduct cloud-zoom" id="photoProduct" title="{echo ShopCore::encode($model->getName())}"  data-drop="#photo" data-start="initDrop">
                    <span class="photo-block">
                        <span class="helper"></span>
                        <img src="{echo $model->firstVariant->getMainPhoto()}" alt="{echo ShopCore::encode($model->getName())}" title="{echo ShopCore::encode($model->getName())} - {echo $model->getId()}" class="vimgPr"/>
                        {$discount = 0}
                        {if $hasDiscounts}
                            {$discount = $model->firstVariant->getvirtual('numDiscount')/$model->firstVariant->toCurrency('origprice')*100}
                        {/if}
                        {promoLabel($model->getAction(), $model->getHot(), $model->getHit(), $discount)}
                    </span>
                </a>
                <!-- End. Photo block-->
                <!-- Start. Star rating -->
                {if $model->enable_comments && intval($Comments[$model->getId()]) !== 0}
                    <div class="frame-star">
                        {$CI->load->module('star_rating')->show_star_rating($model, false)}
                        <div class="d_i-b v-a_m">
                            <button data-trigger="[data-href='#comment']" data-scroll="true" class="count-response pointer">
                                <span class="text-el c_9">Всего:</span>
                                <span class="d_l_red">
                                    {intval($Comments[$model->getId()])}
                                    {echo SStringHelper::Pluralize($Comments[$model->getId()], array(lang("отзыв","newLevel"),lang("отзыва","newLevel"),lang("отзывов","newLevel")))}
                                </span>
                            </button>
                        </div>
                    </div>
                {/if}
                <!-- End. Star rating-->
                {if $sizeAddImg > 0}
                    <!-- Start. additional images-->
                    <div class="horizontal-carousel">
                        <div class="frame-thumbs carousel_js">
                            {/*carousel_js*/}
                            <div class="content-carousel">
                                <ul class="items-thumbs items">
                                    <!-- Start. main image-->
                                    <li class="active">
                                        <a onclick="return false;" rel="useZoom: 'photoProduct'" href="{echo $model->firstVariant->getLargePhoto()}" title="{echo ShopCore::encode($model->getName())}" class="cloud-zoom-gallery" id="mainThumb">
                                            <span class="photo-block">
                                                <span class="helper"></span>
                                                <img src="{echo $model->firstVariant->getSmallPhoto()}" alt="{echo ShopCore::encode($model->getName())}" class="vimgPr"/>
                                            </span>
                                        </a>
                                    </li>
                                    <!-- End. main image-->
                                    {foreach $productImages as $key => $image}
                                        <li>
                                            <a onclick="return false;" rel="useZoom: 'photoProduct'" href="{productImageUrl('products/additional/'.$image->getImageName())}" title="{echo ShopCore::encode($model->getName())}" class="cloud-zoom-gallery">
                                                <span class="photo-block">
                                                    <span class="helper"></span>
                                                    <img src="{echo productImageUrl('products/additional/thumb_'.$image->getImageName())}" alt="{echo ShopCore::encode($model->getName())} - {echo ++$key}"/>
                                                </span>
                                            </a>
                                        </li>
                                    {/foreach}
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
                {/if}
            </div>
        </div>
    </div>
    <div class="container f-s_0">
        <div class="frame-form-comment">
            {$c=$CI->load->module('comments/commentsapi')->renderAsArray($CI->uri->uri_string())}
            <div class="for_comments">
                {echo $c['comments']}
            </div>
            <!--End. Comments block-->
        </div>
    </div>
</div>
<!-- Start. Similar Products-->
<div class="horizontal-carousel">
    {widget('similar')}
</div>
<!-- End. Similar Products-->

<!-- Start. Photo Popup Frame-->
<div class="drop drop-style" id="photo"></div>
<script type="text/template" id="framePhotoProduct">
    {literal}
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
    {/literal}
</script>
<!-- End. Photo Popup Frame-->

<!-- Start. JS vars-->
<script type="text/javascript">
    var hrefCategoryProduct = "{$category_url}";
</script>
{literal}
    <script type="text/javascript">
        var
        productPhotoDrop = true,
        productPhotoCZoom = true;
    </script>
{/literal}
<!-- End. JS vars-->

<script type="text/javascript">
    initDownloadScripts(['cusel-min-2.5', 'cloud-zoom.1.0.3.min', '_product'], 'initPhotoTrEv', 'initPhotoTrEv');
</script>