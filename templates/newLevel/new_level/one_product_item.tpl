{$widget = $widget != false && $widget != NULL}
{$default = $defaultItem != false && $defaultItem != NULL}
{$wishlist = $wishlist != false && $wishlist != NULL}
{$compare = $compare != false && $compare != NULL}
{$codeArticle = $codeArticle != false && $codeArticle != NULL}
{$defaultItem = $defaultItem != false && $defaultItem != NULL}
{$condlimit = $limit != false && $limit != NULL}

{foreach $products as $key => $p}
    {if $key >= $limit && $condlimit}
        {break}
    {/if}
    {$Comments = $CI->load->module('comments')->init($p)}
    <li class="clearfix {if $p->firstVariant->getStock() == 0}not-avail{/if}" data-pos="top">
        <!-- Start. Photo & Name product -->
        <a href="{shop_url('product/' . $p->getUrl())}" class="frame-photo-title" title="{echo ShopCore::encode($p->getName())}">
            <span class="d_b m-b_10">
                <span class="title">{echo ShopCore::encode($p->getName())}</span>
            </span>
            <span class="photo-block">
                <span class="helper"></span>
                {$photo = $p->firstVariant->getMediumPhoto()}
                <img data-original="{echo $photo}"
                     src="{$THEME}images/blank.gif"
                     alt="{echo ShopCore::encode($p->firstVariant->getName())}"
                     class="vimg lazy"/>
                {$discount = 0}
                {if $p->hasDiscounts()}
                    {$discount = $p->firstVariant->getvirtual('numDiscount') / $p->firstVariant->toCurrency('origprice') * 100}
                {/if}
                {promoLabel($p->getAction(), $p->getHot(), $p->getHit(), $discount)}
            </span>
        </a>
        <!-- End. Photo & Name product -->
        <div class="description">
            <!-- Start. article & variant name & brand name -->
            {if $codeArticle}
                <div class="frame-variant-name-code">
                    {$hasCode = $p->firstVariant->getNumber() == ''}
                    <span class="frame-variant-code" {if $hasCode}style="display:none;"{/if}><span class="text-number"></span>:
                        <span class="code">
                            {if !$hasCode}
                                {trim($p->firstVariant->getNumber())}
                            {/if}
                        </span>
                    </span>
                    {$hasVariant = $p->firstVariant->getName() == ''}
                    <span class="frame-variant-name" {if $hasVariant}style="display:none;"{/if}><span class="text-variant"></span>:
                        <span class="code">
                            {if !$hasVariant}
                                {trim($p->firstVariant->getName())}
                            {/if}
                        </span>
                    </span>
                </div>
            {/if}
            <!-- End. article & variant name & brand name -->
            {if !$compare && !$defaultItem}
                <div class="p_r frame-without-top frame-without-top-prop">
                    {if !$vertical}
                        {if $p->enable_comments && intval($Comments[$p->getId()]) !== 0}
                            <div class="frame-star f-s_0">
                                {$CI->load->module('star_rating')->show_star_rating($p, false)}
                                <a href="{shop_url('product/'.$p->url.'#comment')}" class="count-response t-d_n">
                                    {lang('Отзывы:','newLevel')}
                                    {intval($Comments[$p->getId()])}
                                </a>
                            </div>
                        {/if}
                    {/if}
                    <div class="is-vis-table">
                        <!--Start. Description-->
                        {if $props = ShopCore::app()->SPropertiesRenderer->renderPropertiesMainArray($p)}
                            <div class="short-desc short-desc-prop">
                                <ul class="prop-product">
                                    {if $brand = $p->getBrand()}
                                        {$brand = $brand->getName()}
                                        {$hasBrand = trim($brand) != ''}
                                        {if $hasBrand}
                                            <li class="brand-item">
                                                <span class="frame-item-brand"><b>{lang('Бренд','newLevel')}:</b>
                                                    <span class="code">
                                                        <span>
                                                            {echo trim($brand)}
                                                        </span>
                                                    </span>
                                                </span>
                                            </li>
                                        {/if}
                                    {/if}
                                    {if strpos($CI->uri->uri_string(),'/category') !== false || strpos($CI->uri->uri_string(),'/brand') !== false || strpos($CI->uri->uri_string(),'/search') !== false}
                                        {foreach $props as $prop}
                                            <li class="li-table"><span class="c_3">{$prop['Name']}:</span> {$prop['Value']}</li>
                                        {/foreach}
                                        {if $props = ShopCore::app()->SPropertiesRenderer->renderPropertiesMainArray($p, 0)}
                                            {$pcnt = 1}
                                            {foreach $props as $prop}
                                                <li class="li-list" {if $pcnt == 1}style="border-top:none"{/if}>
                                                    <span class="c_3">{$prop['Name']}:</span> {$prop['Value']}
                                                </li>
                                                {$pcnt ++}
                                            {/foreach}
                                        {/if}
                                    {else:}
                                        {foreach $props as $prop}
                                            <li><span class="c_3">{$prop['Name']}:</span> {$prop['Value']}</li>
                                        {/foreach}
                                    {/if}
                                </ul>
                            </div>
                        {/if}
                        <!-- End. Description-->
                    </div>
                </div>
            {/if}
            <div class="frame-right-list">
                <!-- Start. Prices-->
                <!-- End. Prices-->
                {$variants = $p->getProductVariants()}
                <!-- Start. Check variant-->
                {if !$widget && !$defaultItem && !$compare}
                    {if count($variants) > 1}
                        <div class="check-variant-catalog">
                            <div class="lineForm">
                                <select id="сVariantSwitcher_{echo $p->firstVariant->getId()}" name="variant">
                                    {foreach $variants as $key => $pv}
                                        {if $pv->getName()}
                                            {$name = ShopCore::encode($pv->getName())}
                                        {else:}
                                            {$name = ShopCore::encode($p->getName())}
                                        {/if}
                                        <option value="{echo $pv->getId()}" title="{echo $name}">
                                            {echo $name}
                                        </option>
                                    {/foreach}
                                </select>
                            </div>
                        </div>
                    {/if}
                {/if}
                <!-- End. Check variant-->
                <div class="frame-prices f-s_0">
                    <!-- Start. Check for discount-->
                    {$oldoprice = $p->getOldPrice() && $p->getOldPrice() != 0 && $p->getOldPrice() > $p->firstVariant->toCurrency()}
                    {$hasDiscounts = $p->hasDiscounts()}
                    {if $hasDiscounts}
                        <span class="price-discount">
                            <span>
                                <span class="price priceOrigVariant">{echo $p->firstVariant->toCurrency('OrigPrice')}</span>
                                <span class="curr">{$CS}</span>
                            </span>
                        </span>
                    {/if}
                    <!-- End. Check for discount-->
                    <!-- Start. Check old price-->
                    {if $oldoprice && !$hasDiscounts}
                        <span class="price-discount">
                            <span>
                                <span class="price priceOrigVariant">{echo intval($p->getOldPrice())}</span>
                                <span class="curr">{$CS}</span>
                            </span>
                        </span>
                    {/if}
                    <!-- End. Check old price-->
                </div>
                <!-- Start. Product price-->
                {if $p->firstVariant->toCurrency() > 0}
                    <span class="current-prices f-s_0 v-a_m">
                        <span class="price-new">
                            <span>
                                <span class="price priceVariant">{echo $p->firstVariant->toCurrency()}</span>
                                <span class="curr">{$CS}</span>
                            </span>
                        </span>

                    </span>
                {/if}
                <!-- End. Product price-->
                <div class="funcs-buttons v-a_m">
                    <!-- Start. Collect information about Variants, for future processing -->
                    {foreach $variants as $key => $pv}
                        {if $pv->getStock() > 0}
                            <div class="frame-count-buy variant_{echo $pv->getId()} variant" {if $key != 0}style="display:none"{/if}>
                                {if !$widget && !$default}
                                    <div class="frame-count d_n">
                                        <div class="number" data-title="{lang('Количество на складе','newLevel')} {echo $pv->getstock()}" data-prodid="{echo $p->getId()}" data-varid="{echo $pv->getId()}" data-rel="frameplusminus">
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
                                            <input type="text" value="1" data-rel="plusminus" data-title="{lang('Только цифры','newLevel')}" data-min="1" data-max="{echo $pv->getstock()}">
                                        </div>
                                    </div>
                                {/if}
                                <div class="btn-buy buti">
                                    <button
                                        {$discount = 0}
                                        {if $hasDiscounts}
                                            {$discount = $pv->getvirtual('numDiscount')/$pv->toCurrency()*100}
                                        {/if}
                                        disabled="disabled"
                                        class="btnBuy infoBut"
                                        type="button"
                                        data-id="{echo $pv->getId()}"
                                        data-prodid="{echo $p->getId()}"
                                        data-varid="{echo $pv->getId()}"
                                        data-count="1"
                                        data-name="{echo ShopCore::encode($p->getName())}"
                                        data-vname="{echo trim(ShopCore::encode($pv->getName()))}"
                                        data-maxcount="{echo $pv->getstock()}"
                                        data-number="{echo trim($pv->getNumber())}"
                                        data-mediumImage="{echo $pv->getMediumPhoto()}"
                                        data-img="{echo $pv->getSmallPhoto()}"
                                        data-url="{echo shop_url('product/'.$p->getUrl())}"
                                        data-price="{echo $pv->toCurrency()}"
                                        data-origPrice="{if $p->hasDiscounts()}{echo $pv->toCurrency('OrigPrice')}{/if}"
                                        data-addPrice="{if $NextCS != null}{echo $pv->toCurrency('Price',$NextCSId)}{/if}"
                                        data-prodStatus='{json_encode(promoLabelBtn($p->getAction(), $p->getHot(), $p->getHit(), $discount))}'
                                        >
                                        {/*} <span class="icon_cleaner icon_cleaner_buy"></span> { */}
                                        <span class="text-el text-toCart"></span>
                                    </button>
                                </div>
                            </div>
                        {else:}
                            <div class="btn-not-avail variant_{echo $pv->getId()} variant" {if $key != 0}style="display:none"{/if}>
                                <button
                                    class="infoBut"
                                    type="button"
                                    data-drop=".drop-report"
                                    data-source="/shop/ajax/getNotifyingRequest"

                                    data-id="{echo $pv->getId()}"
                                    data-prodid="{echo $p->getId()}"
                                    data-varid="{echo $pv->getId()}"
                                    data-url="{echo shop_url('product/'.$p->getUrl())}"
                                    data-price="{echo $pv->toCurrency()}"
                                    data-origPrice="{if $p->hasDiscounts()}{echo $pv->toCurrency('OrigPrice')}{/if}"
                                    data-addPrice="{if $NextCS != null}{echo $pv->toCurrency('Price',$NextCSId)}{/if}"
                                    data-name="{echo ShopCore::encode($p->getName())}"
                                    data-vname="{echo trim(ShopCore::encode($pv->getName()))}"
                                    data-maxcount="{echo $pv->getstock()}"
                                    data-number="{echo trim($pv->getNumber())}"
                                    data-img="{echo $pv->getSmallPhoto()}"
                                    data-mediumImage="{echo $pv->getMediumPhoto()}">
                                    <span class="text-el text-notAvail"></span>
                                </button>
                            </div>
                        {/if}
                    {/foreach}
                </div>
                <!-- End. Collect information about Variants, for future processing -->
                {if !$widget && !$defaultItem}
                    <div class="p_r frame-without-top frame-without-top-wish">
                        <!-- Wish List & Compare List buttons -->
                        <div class="frame-wish-compare-list no-vis-table">
                            {if !$compare}
                                <div class="frame-btn-comp">
                                    <!-- Start. Compare List button -->
                                    <div class="btn-compare">
                                        <button class="toCompare pointer"
                                                data-prodid="{echo $p->getId()}"
                                                type="button"
                                                data-title="{lang('Добавить к сравнению','newLevel')}"
                                                data-firtitle="{lang('В список сравнений','newLevel')}"
                                                data-sectitle="{lang('В сравнении','newLevel')}"
                                                data-rel="tooltip">
                                            <span class="icon_compare"></span>
                                            <span class="text-el d_l_bl text-toComp"></span>
                                        </button>
                                    </div>
                                    <!-- End. Compare List button -->
                                </div>
                            {/if}
                            {if $wishlist}
                                <!-- Start. Wish list buttons -->
                                {foreach $variants as $key => $pv}
                                    <div class="frame-btn-wish variant_{echo $pv->getId()} variant d_i-b_" {if $key != 0}style="display:none"{/if} data-id="{echo $p->getId()}" data-varid="{echo $pv->getId()}">
                                        {$CI->load->module('wishlist')->renderWLButton($pv->getId())}
                                    </div>
                                {/foreach}
                                <!-- End. wish list buttons -->
                            {/if}
                        </div>
                        <!-- End. Wish List & Compare List buttons -->
                    </div>
                {/if}
                <!-- End. Collect information about Variants, for future processing -->
            </div>
        </div>
        <!-- Start. Remove buttons if compare-->
        {if $compare && !$widget}
            <button type="button" class="icon_times deleteFromCompare" onclick="Shop.CompareList.rm({echo  $p->getId()}, this)"></button>
        {/if}
        <!-- End. Remove buttons if compare-->

        <div class="decor-element"></div>
    </li>
{/foreach}
<script type="text/javascript">
        $('.text-toWish').text( '{lang('В закладки','newLevel')}' );
        $('.text-inWish').text( '{lang('В закладках','newLevel')}' );
        $('.text-toComp').text( '{lang('Добавить к сравнению','newLevel')}' );
        //$('.text-inComp').text('В сравнении');
        $('.text-toCart').text( '{lang('в корзину', 'newLevel')}' );
        //$('.text-inCart').text('В корзинe');icon_times_cart
        $('.text-variant').text( '{lang('Вариант','newLevel')}' );
        $('.text-number').text( '{lang('Артикул','newLevel')}' );
        $('.text-notAvail').text( '{lang('Узнать о появлении','newLevel')}' );
</script>