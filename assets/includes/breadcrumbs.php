<?php if(wpsc_has_breadcrumbs()) : ?>
	<div class='breadcrumb'>
		<a href='<?php echo get_option('product_list_url'); ?>'><?php echo get_option('blogname'); ?></a> &raquo;
		<?php while (wpsc_have_breadcrumbs()) : wpsc_the_breadcrumb(); ?>
			<?php if(wpsc_breadcrumb_url()) :?>
				<a href='<?php echo wpsc_breadcrumb_url(); ?>'><?php echo wpsc_breadcrumb_name(); ?></a> &raquo;
			<?php else: ?>
				<?php echo wpsc_breadcrumb_name(); ?>
			<?php endif; ?>
		<?php endwhile; ?>
	</div><!-- /.breadcrumbs -->
<?php endif; ?>