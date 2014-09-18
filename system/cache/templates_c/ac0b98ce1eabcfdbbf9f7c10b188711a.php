<!--Start. Top menu and authentication data block-->
<div class="menu-header">
    <div class="container">
        <nav class="left-header f_l">
            <ul class="nav">
                <?php echo load_menu ('top_menu'); ?>
            </ul>
        </nav>
        <div class="frame-search-form d_i-b">
                    <div class="p_r">
                        <form name="search" method="get" action="<?php echo shop_url ('search'); ?>">
                            <span class="btn-search">
                                <button type="submit"><span class="icon_search"></span><span class="text-el"><?php echo lang ('Найти','newLevel'); ?></span></button>
                            </span>
                            <div class="frame-search-input">
                                <input type="text" class="input-search" id="inputString" name="text" autocomplete="off" value="<?php if(strpos($CI->uri->uri_string, 'search') !== false): ?><?php echo htmlspecialchars ($_GET['text']); ?><?php endif; ?>" />
                                <div id="suggestions" class="drop drop-search"></div>
                            </div>
                        </form>
                    </div>
                </div>
        <div class="right-header f_r">
            <?php $this->include_shop_tpl('auth_data', '/var/www/avto-era.com.ua/templates/newLevel'); ?>
        </div>
    </div>
</div>
<!--End. Top menu and authentication data block-->
<div class="content-header">
    <div class="container">
        <!--        Logo-->
        <div class="wrap-logo">
            <?php if($CI->uri->uri_string() == ''): ?>
                <span class="logo">
                    <img src="<?php echo siteinfo('siteinfo_logo_url')?>" alt="logo.png"/>
                </span>
            <?php else:?>
                <a href="<?php echo site_url (''); ?>" class="logo">
                    <img src="<?php echo siteinfo('siteinfo_logo_url')?>" alt="logo.png"/>
                </a>
            <?php endif; ?>
        </div>
        <div class="left-content-header">
            <div class="header-left-content-header">
                <div class="del-info-header d_i-b">
                    <span class="icon-del-info-header"></span>
                    <span class="text-el c_23">Доставка по Украине</span>
                </div>
                <!--                Start. contacts block-->
                <div class="phones-header">
                    <span class="f-s_0">
                        <span class="icon_phone_header"></span>
                        <span class="phone">
                            <span class="phone-number"><?php echo siteinfo('siteinfo_mainphone')?></span>

                        </span>
                    </span>
                    <ul class="tabs">
                        <li class="btn-order-call">
                            <a href="#ordercall" data-drop="#ordercall" data-source="<?php echo site_url ('shop/callback'); ?>" class="pointer">
                                <span class="icon_order_call"></span>
                                <span class="text-el d_l_bl"><?php echo lang ('Заказать звонок','newLevel'); ?></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!--                End. Contacts block-->
                <!--                Start. Include cart data template-->
                <div id="bask_block" class="frame-cleaner">
                    <?php $this->include_shop_tpl('cart_data', '/var/www/avto-era.com.ua/templates/newLevel'); ?>
                </div>
                <!--                    End. Include cart data template-->
            </div>
            <div class="frame-search-cleaner clearfix f_r">
                <!--                Start. Show search form-->
                
                <!--                End. Show search form-->
                <div class="frame-menu-main horizontal-menu f_l">
                    <?php \Category\RenderMenu::create()->setConfig(array('cache'=>TRUE))->load('category_menu')?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if(strpos($CI->uri->uri_string, 'search') !== false): ?>
        <script>
            $(document).on('scriptDefer', function() {
                var input = $('#inputString');
                input.setCursorPosition(input.val().length);
            });
        </script>
    
<?php endif; ?><?php $mabilis_ttl=1411133400; $mabilis_last_modified=1410789505; ///var/www/avto-era.com.ua/templates/newLevel/header.tpl ?>