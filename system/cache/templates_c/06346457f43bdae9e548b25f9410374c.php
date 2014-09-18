<div class="frame-user-toolbar">
    <div class="container inside-padd">
        <?php if($compare = $CI->session->userdata('shopForCompare')): ?>
            <?php $countCo = count($compare);?>
        <?php else:?>
            <?php $countCo = 0;?>
        <?php endif; ?>
        <?php $wish_list = $CI->load->module('wishlist')?>
        <?php $countWL = $wish_list->getUserWishListItemsCount($CI->dx_auth->get_user_id())?>
        <?php $countSh = getProductViewsCount()?>
        <div class="content-user-toolbar" <?php if(!($countCo!=0 || $countWL!=0 || $countSh!=0)): ?>style="display:none;"<?php endif; ?>>
            <ul class="items items-user-toolbar">
                <li class="box-1">
                    <?php $this->include_shop_tpl('wish_list_data', '/var/www/avto-era.com.ua/templates/newLevel'); ?>
                </li>
                <li class="box-2">
                    <?php $this->include_shop_tpl('compare_data', '/var/www/avto-era.com.ua/templates/newLevel'); ?>
                </li>
                <?php if($countSh): ?>
                    <li class="box-3">
                        <div class="btn-already-show">
                            <button type="button" data-drop=".frame-already-show" data-effect-on="slideDown" data-effect-off="slideUp" data-place="inherit">
                                <span class="icon_already_show"></span>
                                <span class="text-view-list">
                                    <span class="text-el"><?php echo lang ("Просмотренные товары",'newLevel'); ?></span>
                                    <span class="text-el">&nbsp;(<?php echo $countSh?>)</span>
                                </span>
                            </button>
                        </div>
                    </li>
                <?php endif; ?>
                <li class="box-4">
                    <div class="btn-toggle-toolbar">
                        <button type="button" data-rel="0" <?php if($_COOKIE['condUserToolbar'] == 0 && isset($_COOKIE['condUserToolbar'])): ?>style="display: none;"<?php else:?> class="activeUT active"<?php endif; ?>>
                            <span class="icon_times_toolbar_down"></span>
                        </button>
                        <button type="button" data-rel="1" <?php if($_COOKIE['condUserToolbar'] == 1 ||  !isset($_COOKIE['condUserToolbar'])): ?>style="display: none;"<?php else:?> class="activeUT active"<?php endif; ?>>
                            <span class="icon_times_toolbar_up"></span>
                        </button>
                    </div>
                </li>
            </ul>
        </div>
        <div class="btn-to-up">
            <button type="button">
                <span class="icon_arrow_p"></span>
            </button>
        </div>
    </div>
    <div class="drop frame-already-show">
        <div class="content-already-show">
            <div class="horizontal-carousel p_r" id="ViewedProducts">
                <?php /*<?php echo widget_ajax ('ViewedProducts', '#ViewedProducts'); ?>*/?>
                <?php echo widget ('ViewedProducts'); ?>
            </div>
        </div>
    </div>
</div>
<?php $mabilis_ttl=1411133401; $mabilis_last_modified=1403818540; ///var/www/avto-era.com.ua/templates/newLevel/user_toolbar.tpl ?>