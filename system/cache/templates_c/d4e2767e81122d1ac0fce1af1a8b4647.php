<div id="images_modal" class="modal hide fade">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal"
			aria-hidden="true">&times;</button>
		<h3><?php echo lang ('Searching for images on the Internet', 'admin'); ?></h3>
		<br />
		<div class="span5" style="width: 424px;">
			<input
				data-original-title="<?php echo lang ('URL or request for search', 'admin'); ?>"
				type="text" id="url_image" maxlength="255"
				placeholder="<?php echo lang ('Enter the URL of the image or the search criterion', 'admin'); ?>">
		</div>
		<button id="search_images" class="btn">
			<i class="icon-search"></i>
		</button>

	</div>
	<div id="image_search_result" class="modal-body"></div>
	<div class="modal-footer images_modal_footer">
		<label id="as_additional_container" class="pull-left"
			data-original-title="<?php echo lang ('Hold down Shift to select multiple images', 'admin'); ?>"
			for="as_additional"> <input type="checkbox" name="as_additional"
			id="as_additional" />
            <?php echo lang ('Save as additional', 'admin'); ?>
        </label> <a href="#" class="btn" data-dismiss="modal"><?php echo lang ('Cancel', 'admin'); ?></a>
		<a href="#" id="save_image" class="btn btn-primary"><?php echo lang ('Save', 'admin'); ?></a>
	</div>
</div>
<?php $mabilis_ttl=1411124036; $mabilis_last_modified=1403818173; ///var/www/avto-era.com.ua/application/modules/shop/admin/templates/products/images.tpl ?>