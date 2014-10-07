
<?php if($CI->core->core_data['data_type'] != null): ?>
    <?php if($CI->core->core_data['data_type'] == 'product'): ?>
<div class="star">
	<div class="productRate star-big"
		data-id="<?php echo $CI->core->core_data['id']?>" data-type="product">
		<div style="width: <?php if($model->getVotes() != null): ?><?php echo ($model->getRating()*20)."%\""?><?php else:?> 0%"<?php endif; ?>></div>
	</div>
	<span itemscope="" itemtype="" id="pageRatingData">
		<meta itemprop="rating" content="4"> <?php echo lang ('Leav', 'star_rating'); ?> <span
		id="count_votes_g" itemprop="count"><?php if($model->getVotes() != null): ?><?php echo $model->getVotes()?><?php else:?> 0 <?php endif; ?></span> <?php echo lang ('people(s)', 'star_rating'); ?>.
            </span>
</div>
<?php else:?>
<div class="star">
	<div class="productRate star-big"
		data-id="<?php echo $CI->core->core_data['id']?>"
		data-type="<?php echo $CI->core->core_data['data_type']?>">
		<div style="width: <?php if($data['votes'] != null): ?><?php echo $data['rating']."%\" "?><?php else:?> 0%"<?php endif; ?>></div>
	</div>
	<span>
		<meta itemprop="rating" content="4"> <?php echo lang ('Leav', 'star_rating'); ?> <span
		id="count_votes_g" itemprop="count"><?php if($data['votes'] != null): ?><?php echo $data['votes']?><?php else:?> 0 <?php endif; ?>
                </span> <?php echo lang ('people(s)', 'star_rating'); ?>.
            </span>
</div>
<?php endif; ?>
<?php endif; ?>
<?php $mabilis_ttl=1411133400; $mabilis_last_modified=1403818560; //templates/newLevel/star_rating/star_rating.tpl ?>