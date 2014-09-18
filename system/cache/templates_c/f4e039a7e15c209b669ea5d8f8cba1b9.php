<?php if(count($brands) > 0): ?>
    <div class="frame-brands">
        <div class="products-carousel">
            <?php /*carousel_js*/?>
            <div class="frame-title container">
                <div class="title">
                    <a href="<?php echo shop_url ('brand/'); ?>"><?php if(isset($title)){ echo $title; } ?></a>
                </div>
            </div>
            <div class="container">
                <div class="frame-brands-carousel">
                    <div class="content-carousel">
                        <ul class="items items-brands">
                            <?php if(is_true_array($brands)){ foreach ($brands as $brand){ ?>
                                <li>
                                    <a href="<?php echo shop_url ( $brand['full_url'] ); ?>" class="frame-photo-title">
                                        <span class="photo-block">
                                            <span class="helper"></span>
                                            <img data-original="<?php echo media_url ( $brand['img_fullpath'] ); ?>" src="<?php if(isset($THEME)){ echo $THEME; } ?>images/blank.gif" title="<?php echo $brand['name']; ?>" alt="<?php echo $brand['name']; ?>" class="lazy"/>
                                        </span>
                                    </a>
                                </li>
                            <?php }} ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="group-button-carousel">
                <button type="button" class="prev arrow">
                    <span class="icon_arrow_p"></span>
                </button>
                <button type="button" class="next arrow">
                    <span class="icon_arrow_n"></span>
                </button>
            </div>
        </div>
    </div>
<?php endif; ?><?php $mabilis_ttl=1411123852; $mabilis_last_modified=1403818560; ///var/www/avto-era.com.ua/templates/newLevel/widgets/brands.tpl ?>