<a href="/admin/components/run/shop/orders/index?status_id=1" class="btn btn-large pjax" data-title="{lang('Orders','admin')}" data-rel="tooltip" data-original-title="{lang('Orders','admin')}">
    <i class="icon-bask {if $totalNewOrders} active {/if}"></i>
    {if $totalNewOrders}<span class="badge badge-important">{echo $totalNewOrders}</span>{/if}
</a>
<a href="/admin/components/run/shop/search/index?WithoutImages=1" class="btn btn-large pjax" data-title="{lang('Products without icons','admin')}" data-rel="tooltip" data-original-title="">
    <i class="icon-report_exists {if $toralProductsWithoutImage}active{/if}"></i>
    {if $toralProductsWithoutImage}<span class="badge badge-important">{echo $toralProductsWithoutImage}</span>{/if}
</a>
<a href="{$ADMIN_URL}callbacks#callbacks_1" class="btn btn-large pjax" data-title="{lang('Callback','admin')}" data-rel="tooltip" data-original-title="{lang('Callback','admin')}">
    <i class="icon-callback {if $totalNewCallbacks} active {/if}"></i>
    {if $totalNewCallbacks} <span class="badge badge-important">{echo $totalNewCallbacks}</span> {/if}
</a>
<a href="/admin/components/cp/comments" class="btn btn-large pjax" data-title="{lang('Latest/recent  comments','admin')}" data-rel="tooltip" data-original-title="{lang('Latest/recent  comments','admin')}">
    <i class="icon-comment_head {if  $totalNewComments} active {/if}"></i>
    {if  $totalNewComments} <span class="badge badge-important">{echo $totalNewComments}</span>  {/if}
</a>


	
