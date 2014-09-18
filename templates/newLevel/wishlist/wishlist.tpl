{$pricePrecision = ShopCore::app()->SSettings->pricePrecision}
<div class="frame-inside page-wishlist">
    <div class="container">
        <div class="f-s_0 title-cart without-crumbs">
            <div class="frame-title">
                <h1 class="d_i">{lang('Список желаний','newLevel')}</h1>
            </div>
        </div>
        {if $errors}
            {foreach $errors as $error}
                <div class="msg">
                    <div class="error">{$error}</div>
                </div>
            {/foreach}
        {/if}
        <div class="clearfix frame-tabs-ref">
            <div id="list-products">
                <div class="frame-button-add-wish-list">
                    <div class="btn-cart">
                        <button type="button" data-drop=".drop-add-wishlist" data-place="inherit" data-overlayopacity="0">
                            <span class="icon_add_wish"></span>
                            <span class="text-el">{lang('Создать новый список','newLevel')}</span>
                        </button>
                    </div>
                    <span class="help-block">{lang('В список избранных вы можете отложить понравившиеся товары, также показать список друзьям', 'newLevel')}</span>
                </div>
                <div class="drop drop-style-2 drop-add-wishlist">
                    <div class="drop-header">
                        <div class="title">{lang('Создание списка избранных товаров','newLevel')}</div>
                    </div>
                    <div class="drop-content2">
                        <div class="inside-padd">
                            <div class="horizontal-form big-title">
                                <form method="POST" action="{site_url('/wishlist/wishlistApi/createWishList')}">
                                    <input type="hidden" value="{echo $user[id]}" name="user_id"/>
                                    <div class="frame-label">
                                        <span class="title">{lang('Доступность:','newLevel')}</span>
                                        <div class="frame-form-field check-public">
                                            <div class="lineForm">
                                                <select name="wlTypes" id="wlTypes">
                                                    <option value="shared">Shared</option>
                                                    <option value="public">Public</option>
                                                    <option value="private">Private</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <label>
                                        <span class="title">{lang('Название списка:','newLevel')}</span>
                                        <span class="frame-form-field">
                                            <input type="text" value="" name="wishListName"/>
                                        </span>
                                    </label>
                                    <label>
                                        <span class="title">{lang('Описание:','newLevel')}</span>
                                        <span class="frame-form-field">
                                            <textarea name="wlDescription"></textarea>
                                        </span>
                                    </label>
                                    <div class="frame-label">
                                        <span class="title">&nbsp;</span>
                                        <div class="frame-form-field">
                                            <div class="btn-def">
                                                <button
                                                    class="btn"
                                                    type="submit"
                                                    data-source="{site_url('/wishlist/wishlistApi/createWishList')}"
                                                    data-type="json"
                                                    data-modal="true"

                                                    data-always="true"
                                                    onclick="serializeForm(this)"
                                                    data-drop="#notification"
                                                    data-effect-on="fadeIn"
                                                    data-effect-off="fadeOut"
                                                    data-after="createWishList"
                                                    >
                                                    <span class="text-el">{lang('Создать новий список','newLevel')}</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    {form_csrf()}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {if count($wishlists)>0}
                    {foreach $wishlists as $key => $wishlist}
                        <div class="drop-style-2 drop-wishlist-items" data-rel="list-item">
                            <input type="hidden" name="WLID" value="{echo $wishlist[0][wish_list_id]}">
                            <div class="drop-content2">
                                <div class="inside-padd">
                                    {if $wishlist[0][title]}
                                        <h2>{$wishlist[0][title]}</h2>
                                    {/if}
                                    {if $wishlist[0][description]}
                                        <div class="text">
                                            {$wishlist[0][description]}
                                        </div>
                                    {/if}
                                    {if $wishlist[0][variant_id]}
                                        <ul class="items items-catalog items-wish-list">
                                            {$CI->load->module('new_level')->OPI($wishlist, array('wishlist'=>true), 'array_product_item')}
                                        </ul>
                                    {else:}
                                        <div class="msg layout-highlight layout-highlight-msg">
                                            <div class="info">
                                                <span class="icon_info"></span>
                                                <span class="text-el">{lang('Список пуст','newLevel')}</span>
                                            </div>
                                        </div>
                                    {/if}
                                </div>
                            </div>
                            <div class="drop-footer2">
                                <div class="inside-padd clearfix">
                                    <div class="f_l">
                                        <div class="clearfix">
                                            <div class="funcs-buttons-wishlist f_l">
                                                <div class="btn-edit-WL">
                                                    <button class="pointer"
                                                        type="button"
                                                        data-source="{site_url('/wishlist/editWL/'.$wishlist[0][wish_list_id])}"
                                                        data-drop=".drop-edit-wishlist"
                                                        data-always="true"
                                                        >
                                                        <span class="d_l_bl text-el">{lang('Редактировать список','newLevel')}</span>
                                                    </button>
                                                </div>
                                                <div class="btn-remove-WL">
                                                    <button class="pointer"
                                                        type="button"
                                                        data-source="{site_url('/wishlist/wishlistApi/deleteWL/'.$wishlist[0][wish_list_id])}"
                                                        data-type="json"
                                                        data-modal="true"

                                                        data-drop="#notification"
                                                        data-after="removeWL"
                                                        data-confirm="true"

                                                        data-effect-on="fadeIn"
                                                        data-effect-off="fadeOut"
                                                        >
                                                        <span class="icon_remove"></span>
                                                        <span class="text-el d_l_bl">{lang('Удалить список','newLevel')}</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="f_l">
                                                <b>{lang('Доступность:','newLevel')}</b>
                                                <span class="s_t">{echo $wishlist[0][access]}</span>
                                            </div>
                                        </div>
                                        <div>
                                            {if $wishlist[0]['access'] == 'shared' || $wishlist[0]['access'] == 'public'}
                                                <div class="btn-not-avail btn-send-wishlist">
                                                    <button type="button" data-drop=".drop-sendemail" title="{lang('Поделится с другом','newLevel')}" data-source="{echo site_url('wishlist/wishlistApi/renderEmail/' . $wishlist[0][wish_list_id])}">
                                                        <span class="icon_mail"></span>
                                                        <span class="text-el">Поделится з другом</span>
                                                    </button>
                                                </div>
                                            {/if}
                                            {if $wishlist[0]['access'] == 'shared'}
                                                {echo $CI->load->module('share')->_make_share_form(site_url('wishlist/show/'.$wishlist[0]['hash']))}
                                            {/if}
                                        </div>
                                    </div>
                                    {if $wishlist[0][variant_id]}
                                        <div class="f_r">
                                            {$price = 0}
                                            {$i = 0}
                                            {foreach $wishlist as $key => $p}
                                                {if $p.stock > 0}
                                                    {$price += $p.price;}
                                                    {$i++}
                                                {/if}
                                            {/foreach}
                                            {if $i > 0}
                                                <div class="frame-buy-all-products">
                                                    <div class="title-h3">{lang('Всего','newLevel')} <b class="countProdsWL">{echo $i}</b> <span class="plurProd">{echo SStringHelper::Pluralize($i, array(lang('товар','newLevel'),lang('товара','newLevel'),lang('товаров','newLevel')))}</span> {lang('на сумму', 'newLevel')}
                                                        <span class="frame-prices f-s_0">
                                                            <span class="current-prices">
                                                                <span class="price-new">
                                                                    <span>
                                                                        <span class="price genPriceProdsWL">{round($price, $pricePrecision)}</span>
                                                                        <span class="curr f-s_14">{$CS}</span>
                                                                    </span>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </div>
                                                    <div class="btn-buy-p">
                                                        <button
                                                            type="button"
                                                            class="btnBuyWishList"
                                                            >
                                                            <span class="icon_cleaner icon_cleaner_buy"></span>
                                                            <span class="text-el" data-cart="{lang('Просмотреть купленные товары','newLevel')}" data-buy="{lang('Купить все доступные товары','newLevel')}">{lang('Купить все доступные товары','newLevel')}</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            {/if}
                                        </div>
                                    {/if}
                                </div>
                            </div>
                            {form_csrf()}
                        </div>
                    {/foreach}
                {else:}
                    <div class="msg layout-highlight layout-highlight-msg">
                        <div class="info">
                            <span class="icon_info"></span>
                            <span class="text-el">{lang('Список Желания пуст','newLevel')}</span>
                        </div>
                    </div>
                {/if}
            </div>
        </div>
    </div>
</div>