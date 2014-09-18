<li class="column_<?php echo $CI->load->module('new_level')->getCategoryColumns($id)?>">
    <a href="<?php if(isset($link)){ echo $link; } ?>" class="title-category-l1 <?php if($wrapper != FALSE): ?> is-sub<?php endif; ?>">
        <span class="helper"></span>
        <span class="icon_<?php if(isset($image)){ echo $image; } ?>"></span>
        <span class="text-el"><?php if(isset($title)){ echo $title; } ?></span>
    </a>
    <?php if(isset($wrapper)){ echo $wrapper; } ?>
</li><?php $mabilis_ttl=1411123852; $mabilis_last_modified=1403818570; ///var/www/avto-era.com.ua/templates/newLevel//category_menu/level_1/item_default.tpl ?>