<?php
global $wpsc_query, $wpdb;
/*
 * Most functions called in this page can be found in the wpsc_query.php file
 */
?>
<div id='products_page_container' class="wrap wpsc_container">

    <?php include( 'assets/includes/breadcrumbs.php' ); ?>

	<?php do_action('wpsc_top_of_products_page'); // Plugin hook for adding things to the top of the products page, like the live search ?>

    <?php include( 'assets/includes/if-display-categories.php' ); ?>

	<?php if(wpsc_display_products()): ?>

        <?php include( 'assets/includes/if-is-in-category.php' ); ?>

        <?php include( 'assets/includes/pagination.php' ); ?>

        <?php include( 'product-loop.php' ); ?>


		<?php if(wpsc_product_count() < 1):?>
			<p><?php  echo __('There are no products in this group.', 'wpsc'); ?></p>
		<?php endif ; ?>

	<?php

	if(function_exists('fancy_notifications')) {
		echo fancy_notifications();
	}
	?>

    <?php include( 'assets/includes/pagination.php' ); ?>

	<?php endif; ?><!-- ends wpsc_display_products -->
</div>