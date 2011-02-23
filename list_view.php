<?php
global $wpsc_query, $wpdb;
?>
<div id='products_page_container' class="wrap wpsc_container">

    <?php include( 'assets/includes/breadcrumbs.php' ); ?>

	<?php do_action('wpsc_top_of_products_page'); // Plugin hook for adding things to the top of the products page, like the live search ?>

    <?php include( 'assets/includes/if-display-categories.php' ); ?>

	<?php if(wpsc_display_products()): ?>

        <?php include( 'assets/includes/if-is-in-category.php' ); ?>

		<!-- Start Pagination -->
		<?php if ( ( get_option( 'use_pagination' ) == 1 && ( get_option( 'wpsc_page_number_position' ) == 1 || get_option( 'wpsc_page_number_position' ) == 3 ) ) ) : ?>
			<div class="wpsc_page_numbers">
				<?php if ( wpsc_has_pages() ) : ?>
					Pages: <?php echo wpsc_first_products_link( '&laquo; First', true ); ?> <?php echo wpsc_previous_products_link( '&laquo; Previous', true ); ?> <?php echo wpsc_pagination( 10 ); ?> <?php echo wpsc_next_products_link( 'Next &raquo;', true ); ?> <?php echo wpsc_last_products_link( 'Last &raquo;', true ); ?>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<!-- End Pagination -->


		<table class="list_productdisplay <?php echo wpsc_category_class(); ?>">
			<?php /** start the product loop here */?>
			<?php $alt = 0;	?>
			<?php while (wpsc_have_products()) :  wpsc_the_product(); ?>
				<?php
				$alt++;
				if ($alt %2 == 1) { $alt_class = 'alt'; } else { $alt_class = ''; }
				?>
				<tr  class="product_view_<?php echo wpsc_the_product_id(); ?> <?php echo $alt_class;?>">
					<td style="width: 9px;">
					</td>

					<td width="55%">
						<a class="wpsc_product_title" href="<?php echo wpsc_the_product_permalink(); ?>">
							<strong><?php echo wpsc_the_product_title(); ?></strong>
						</a>
					</td>

					<td width="10" style="text-align: center;">
						<?php if(wpsc_product_has_stock()) : ?>
							<img src="<?php echo WPSC_URL; ?>/images/yes_stock.gif" alt="Yes" title="Yes" style="margin-top: 4px;"/>
						<?php else: ?>
							<img src="<?php echo WPSC_URL; ?>/images/no_stock.gif" title='No' alt='No' style="margin-top: 4px;"/>
						<?php endif; ?>
					</td>

					<td width="10%">
						<span id="product_price_<?php echo wpsc_the_product_id(); ?>" class="pricedisplay"><?php echo wpsc_the_product_price(get_option('wpsc_hide_decimals')); ?></span>
					</td>

					<td width="20%">
						<?php if(wpsc_product_external_link(wpsc_the_product_id()) != '') : ?>
							<?php	$action =  wpsc_product_external_link(wpsc_the_product_id()); ?>
						<?php else: ?>
							<?php	$action =  wpsc_this_page_url(); ?>
						<?php endif; ?>
						<form id="product_<?php echo wpsc_the_product_id(); ?>" class='product_form'  enctype="multipart/form-data" action="<?php echo $action; ?>" method="post" name="product_<?php echo wpsc_the_product_id(); ?>">

                            <?php include( 'assets/includes/variation-groupd.php' ); ?>

							<?php if(wpsc_has_multi_adding()): ?>
								<label class='wpsc_quantity_update' for='wpsc_quantity_update[<?php echo wpsc_the_product_id(); ?>]'><?php echo __('Quantity', 'wpsc'); ?>:</label>
								<input type="text" id='wpsc_quantity_update' name="wpsc_quantity_update[<?php echo wpsc_the_product_id(); ?>]" size="2" value="1"/>
								<input type="hidden" name="key" value="<?php echo wpsc_the_cart_item_key(); ?>"/>
								<input type="hidden" name="wpsc_update_quantity" value="true"/>
							<?php endif ;?>

							<input type="hidden" value="add_to_cart" name="wpsc_ajax_action"/>
							<input type="hidden" value="<?php echo wpsc_the_product_id(); ?>" name="product_id"/>

                            <?php include( 'assets/includes/buy-button.php' ); ?>

						</form>
					</td>
				</tr>

				<tr class="list_view_description">
					<td colspan="5">
						<div id="list_description_<?php echo wpsc_the_product_id(); ?>">
							<?php echo wpsc_the_product_description(); ?>
						</div>
					</td>
				</tr>

			<?php endwhile; ?>
			<?php /** end the product loop here */?>
		</table>


		<?php if(wpsc_product_count() < 1):?>
			<p><?php  echo __('There are no products in this group.', 'wpsc'); ?></p>
		<?php endif ; ?>

	<?php

	if(function_exists('fancy_notifications')) {
		echo fancy_notifications();
	}
	?>

    <?php include( 'assets/includes/pagination.php' ); ?>

	<?php endif; ?>
</div>