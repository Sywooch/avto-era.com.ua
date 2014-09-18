<?php $i=0?>
<div class="crumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
    <div class="container">
        <ul class="items items-crumbs">
            <li class="btn-crumb">
                <a href="<?php echo site_url (); ?>" typeof="v:Breadcrumb">
                    <span class="text-el"><?php echo lang ('Главная', 'newLevel'); ?><span class="divider">/</span></span>
                </a>
            </li>
            <?php if(is_true_array($navi_cats)){ foreach ($navi_cats as $item){ ?> <?php $i++?>
                <li class="btn-crumb">
                    <?php if($i < count($navi_cats)): ?>
                        <a href="<?php echo site_url ( $item['path_url'] ); ?>" typeof="v:Breadcrumb">
                            <span class="text-el"><?php echo $item['name']; ?><span class="divider">/</span></span>
                        </a>
                    <?php else:?>
                        <button typeof="v:Breadcrumb" disabled="disabled">
                            <span class="text-el"><?php echo $item['name']; ?></span>
                        </button>
                    <?php endif; ?>
                </li>
            <?php }} ?>
        </ul>
    </div>
</div>
<?php $mabilis_ttl=1411133400; $mabilis_last_modified=1403818560; ///var/www/avto-era.com.ua/templates/newLevel/widgets/path.tpl ?>