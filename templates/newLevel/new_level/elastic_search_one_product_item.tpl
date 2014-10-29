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
	<span class="title">{echo ShopCore::encode($p->getName())}</span>
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