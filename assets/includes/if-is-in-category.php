<?php if(wpsc_is_in_category()) : ?>
	<div class='wpsc_category_details'>
		<?php if(get_option('show_category_thumbnails') && wpsc_category_image()) : ?>
			<img src='<?php echo wpsc_category_image(); ?>' alt='<?php echo wpsc_category_name(); ?>' title='<?php echo wpsc_category_name(); ?>' />
		<?php endif; ?>

		<?php if(get_option('wpsc_category_description') &&  wpsc_category_description()) : ?>
			<?php echo wpsc_category_description(); ?>
		<?php endif; ?>
	</div>
<?php endif; ?>