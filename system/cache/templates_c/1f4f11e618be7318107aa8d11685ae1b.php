<div class="frame-baner frame-baner-start_page">
    <section class="carousel_js baner container_1042">
        <div class="content-carousel">
            <ul class="cycle"><?php /*забирати якщо не цикл*/?>
                <?php if(is_true_array($banners)){ foreach ($banners as $banner){ ?>
                    <li>
                        <?php if(trim( $banner['url'] )): ?>
                            <a href="<?php echo site_url ( $banner['url'] ); ?>"><img data-original="<?php echo $banner['photo']?>" src="<?php if(isset($THEME)){ echo $THEME; } ?>images/blank.gif" alt="<?php ShopCore::encode( $banner['name'] ) ?>"/></a>
                            <?php else:?>
                            <span><img data-original="<?php echo $banner['photo']?>" src="<?php if(isset($THEME)){ echo $THEME; } ?>images/blank.gif" alt="<?php ShopCore::encode( $banner['name'] ) ?>"/></span>
                            <?php endif; ?>
                    </li>
                <?php }} ?>
            </ul>
            <div class="preloader"></div>
            <div class="pager"></div>
        </div>
        <div class="group-button-carousel container p_r">
            <button type="button" class="prev arrow">
                <span class="icon_arrow_p"></span>
            </button>
            <button type="button" class="next arrow">
                <span class="icon_arrow_n"></span>
            </button>
        </div>
    </section>
</div>
<?php $mabilis_ttl=1411133359; $mabilis_last_modified=1403818550; //templates/newLevel/banners/main_slider.tpl ?>