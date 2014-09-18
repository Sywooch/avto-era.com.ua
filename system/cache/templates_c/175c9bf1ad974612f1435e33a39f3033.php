<nav>
    <ul class="nav nav-enter-reg">
        <?php if(!$CI->dx_auth->is_logged_in()): ?>
            <li class="enter">
                <button type="button"
                        id="loginButton"
                        data-drop=".drop-enter"
                        data-source="<?php echo site_url ('auth'); ?>"
                        >
                    <span class="icon_enter"></span>
                    <span class="text-el"><?php echo lang ('Вход','newLevel'); ?></span>
                </button>
            </li>
            <li class="org f-s_0">
                <span class="text-el"><?php echo lang ('или','newLevel'); ?></span>
            </li>
            <li class="btn-register">
                <a href="<?php echo site_url ('/auth/register'); ?>" rel=”nofollow”>
                    <span class="icon_reg"></span>
                    <span class="text-el"><?php echo lang ('Регистрация','newLevel'); ?></span>
                </a>
            </li>
            <!--Else show link for personal cabinet -->
        <?php else:?>
            <li class="personal-area">
                <a href="<?php echo site_url ('/shop/profile'); ?>">
                    <span class="icon_enter"></span>
                    <span class="text-el"><?php echo lang ('Личный кабинет','newLevel'); ?></span>
                </a>
            </li>
            <li class="exit-shop">
                <button type="button" class="f-s_0" onclick="ImageCMSApi.formAction('<?php echo site_url ("/auth/authapi/logout"); ?>', '',{durationHideForm: 0, callback: function(msg, status, form, DS) {
                                if (status) {
                                    var items = Shop.Cart.getAllItems();
                                    for (var i = 0; i < items.length; i++)
                                        localStorage.removeItem(items[i].storageId());
                                    localStorage.removeItem('wishList');
                                }
                            }});
                        return false;">
                                            <span class="icon_exit" style="height:13px;"></span>
                    <span class="text-el"><?php echo lang ('Выход','newLevel'); ?></span>
                </button>
            </li>
        <?php endif; ?>
    </ul>
</nav><?php $mabilis_ttl=1411133400; $mabilis_last_modified=1403818557; ///var/www/avto-era.com.ua/templates/newLevel/shop/auth_data.tpl ?>