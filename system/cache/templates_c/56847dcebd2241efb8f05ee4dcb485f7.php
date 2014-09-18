<div class="content-footer">
    <div class="container">
        <!--Start. Info block-->
        <div class="box-1">
            <div class="inside-padd">
                <ul class="contact-list">
                    <li>
                        <div class="c_3 m-b_10"><?php echo siteinfo('siteinfo_companytype')?></div>
                        <div class="phone-number phone-number-footer"><span class="icon_footer-main-phone"></span><?php echo siteinfo('siteinfo_mainphone')?></div>
                    </li>
                    <li>
                        <div class="btn-read_more btn-read_more-f btn-read_more-ft">
                            <button type="button" data-trigger="[data-drop='#ordercall']" title="<?php echo lang ('Заказать звонок','newLevel'); ?>"><span class="text-el"><?php echo lang ('Заказать звонок','newLevel'); ?></span>
                            </button>
                        </div>
                    </li>
                    <li> <span class="icon_mail">&nbsp;</span> <span class="text-el"><?php echo siteinfo('Email')?></span></li>
                </ul>
                <div class="clearfix">
                    <?php $CI->load->module('star_rating')->show_star_rating()?>
                </div>
            </div>
        </div>
        <!--End. Info block-->
        <!--Start. Load menu in footer-->
        <div class="box-2">
            <div class="inside-padd">
                <div class="main-title"><?php echo lang ('Сайт','newLevel'); ?></div>
                <ul>
                    <?php echo load_menu ('top_menu'); ?>
                </ul>
            </div>
        </div>
        <div class="box-3">
            <div class="inside-padd">
                <?php \Category\RenderMenu::create()->setConfig(array('cache'=>FALSE))->load('footer_category_menu')?>
            </div>
        </div>
        <!--End. Load menu in footer-->
    </div>
</div>
<div class="footer-footer">
    <div class="container t-a_c">
        <div class="d_i-b">
            <span class="icon_siteimage"></span>
            <?php echo lang ('Создание сайта, раскрутка, магазина от','newLevel'); ?>
            <a class="siteimage-link" target="_blank" href="http://siteimage.com.ua"><?php echo lang ('компании Siteimage','newLevel'); ?></a>
        </div>
        <?php if(function_exists('mobile_site_address')): ?>
            <div class="f_r">
                <a class="f-s_0 c_w">
                    <span class="icon_phone_footer"></span>
                    <span class="text-el"><a href="<?php echo mobile_site_address (); ?>"><?php echo lang ('Мобильная версия','newLevel'); ?></a></span>
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php $mabilis_ttl=1411133400; $mabilis_last_modified=1403818539; ///var/www/avto-era.com.ua/templates/newLevel/footer.tpl ?>