<?php if(wpsc_display_categories()): ?>
  <?php if(get_option('wpsc_category_grid_view') == 1) :?>
		<div class='wpsc_categories wpsc_category_grid'>
			<?php wpsc_start_category_query(array('category_group'=> get_option('wpsc_default_category'), 'show_thumbnails'=> 1)); ?>
				<a href="<?php wpsc_print_category_url();?>" class="wpsc_category_grid_item" title='<?php wpsc_print_category_name();?>'>
					<?php wpsc_print_category_image(45, 45); ?>
				</a>
				<?php wpsc_print_subcategory("", ""); ?>
			<?php wpsc_end_category_query(); ?>
			<div class='clear_category_group'></div>
		</div>
  <?php else:?>
		<ul class='wpsc_categories'>
			<?php wpsc_start_category_query(array('category_group'=>get_option('wpsc_default_category'), 'show_thumbnails'=> get_option('show_category_thumbnails'))); ?>
					<li>
						<?php wpsc_print_category_image(32, 32); ?>

						<a href="<?php wpsc_print_category_url();?>" class="wpsc_category_link"><?php wpsc_print_category_name();?></a>
						<?php if(get_option('wpsc_category_description')) :?>
							<?php wpsc_print_category_description("<div class='wpsc_subcategory'>", "</div>"); ?>
						<?php endif;?>

						<?php wpsc_print_subcategory("<ul>", "</ul>"); ?>
					</li>
			<?php wpsc_end_category_query(); ?>
		</ul>
	<?php endif; ?>
<?php endif; ?>