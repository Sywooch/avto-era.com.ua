<?php if($is_logged_in): ?>
    <?php $wish_list = $CI->load->module('wishlist')?>
    <?php $countWL = $wish_list->getUserWishListItemsCount($CI->dx_auth->get_user_id())?>
    <div id="wishListData">
        <div class="wish-list-btn tiny-wish-list" <?php if($countWL == 0): ?>style="display:none;"<?php endif; ?>>
            <button onclick="location = '<?php echo site_url ('wishlist'); ?>'">
                <span class="icon_wish_list"></span>
                <span class="text-wish-list f-s_0">
                    <span class="text-el"><?php echo lang ('Список желаний','newLevel'); ?> </span>
                    <span class="text-el">(</span>
                    <span class="text-el wishListCount"><?php echo $countWL?></span>
                </span>
                <span class="text-el">)</span>
                </span>
            </button>
        </div>
    </div>
<?php endif; ?><?php $mabilis_ttl=1411133401; $mabilis_last_modified=1403818558; ///var/www/avto-era.com.ua/templates/newLevel/shop/wish_list_data.tpl ?>