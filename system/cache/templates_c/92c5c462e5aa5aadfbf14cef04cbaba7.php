<?php if($compare = $CI->session->userdata('shopForCompare')): ?>
    <?php $count = count($compare);?>
<?php else:?>
    <?php $count = 0;?>
<?php endif; ?>
<div class="compare-list-btn tiny-compare-list" <?php if($count == 0): ?>style="display:none;"<?php endif; ?>>
    <button onclick="location = '<?php echo shop_url ('compare'); ?>'">
        <span class="icon_compare_list"></span>
        <span class="text-compare-list f-s_0">
            <span class="text-el"><?php echo lang ('Список сравнения','newLevel'); ?> </span>
            <span class="text-el">(</span>
            <span class="f-s_0">
                <span class="text-el compareListCount"></span>
            </span>
            <span class="text-el">)</span>
        </span>
    </button>
</div><?php $mabilis_ttl=1411133401; $mabilis_last_modified=1403818558; ///var/www/avto-era.com.ua/templates/newLevel/shop/compare_data.tpl ?>