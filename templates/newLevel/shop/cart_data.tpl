{$topCartCount = ShopCore::app()->SCart->totalItems()}
<div class="btn-bask buti tiny-bask{if $topCartCount != 0} pointer{/if}">
    <button>
        <span class="frame-icon">
        </span>
        <span class="text-cleaner bask">
            <span class="empty" {if $topCartCount == 0}style="display: inline"{/if}>
                <span class="helper"></span>
                <span>
                    <span class="text-el">{lang('Корзина пуста','newLevel')}</span>
                </span>
            </span>
            <span class="no-empty" {if $topCartCount != 0}style="display: inline"{/if}>
                <span class="helper"></span>
                <span>
                    <span class="text-el topCartCount">{echo $topCartCount}</span>
                    <span class="text-el">&nbsp;</span>
                    <span class="text-el plurProd">{echo SStringHelper::Pluralize(ShopCore::app()->SCart->totalItems(), array(lang('товар','newLevel'),lang('товара','newLevel'),lang('товаров','newLevel')))}</span>
                </span>
            </span>
        </span>
    </button>
</div>
