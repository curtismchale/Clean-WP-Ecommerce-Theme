<?php if((get_option('hide_addtocart_button') == 0) &&  (get_option('addtocart_or_buynow') !='1')) : ?>
	<?php if(wpsc_product_has_stock()) : ?>
		<div class='wpsc_buy_button_container'>
				<?php if(wpsc_product_external_link(wpsc_the_product_id()) != '') : ?>
				<?php 	$action =  wpsc_product_external_link(wpsc_the_product_id()); ?>
				<input class="wpsc_buy_button" type='button' value='<?php echo __('Buy Now', 'wpsc'); ?>' onclick='gotoexternallink("<?php echo $action; ?>")'>
				<?php else: ?>
			<input type="submit" value="<?php echo __('Add To Cart', 'wpsc'); ?>" name="Buy" class="wpsc_buy_button" id="product_<?php echo wpsc_the_product_id(); ?>_submit_button"/>
				<?php endif; ?>
			<div class='wpsc_loading_animation'>
				<img title="Loading" alt="Loading" src="<?php echo WPSC_URL; ?>/images/indicator.gif" class="loadingimage"/>
				<?php echo __('Updating cart...', 'wpsc'); ?>
			</div><!-- /.wpsc_loading_animation -->
		</div><!-- /.wpsc_but_button_container -->
	<?php else : ?>
		<p class='soldout'><?php echo __('This product has sold out.', 'wpsc'); ?></p>
	<?php endif ; ?>
<?php endif ; ?>