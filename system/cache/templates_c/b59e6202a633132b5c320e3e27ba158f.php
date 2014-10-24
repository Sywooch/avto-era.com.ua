<?php $colorScheme = 'css/color_scheme_1'?>
<div class="frame-inside page-404">
	<div class="container">
		<div class="content t-a_c">
			<img
				src="<?php if(isset($THEME)){ echo $THEME; } ?><?php if(isset($colorScheme)){ echo $colorScheme; } ?>/images/404.png" />
			<div class="description">
                <?php if(isset($error)){ echo $error; } ?>            
                <div class="btn-buy-p">
					<a href="<?php echo site_url (); ?>"><span class="text-el"><?php echo lang ('Перейти на главную','newLevel'); ?></span></a>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
        $(document).on('ready', function(){
            $('footer').css({'z-index': 1, 'position': 'relative'});
        });
    </script>
<?php $mabilis_ttl=1411131283; $mabilis_last_modified=1403818539; ///var/www/avto-era.com.ua/templates/newLevel/404.tpl ?>