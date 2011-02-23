<?php /** the variation group HTML and loop */?>
<div class="wpsc_variation_forms">
	<?php while (wpsc_have_variation_groups()) : wpsc_the_variation_group(); ?>
		<p>
			<label for="<?php echo wpsc_vargrp_form_id(); ?>"><?php echo wpsc_the_vargrp_name(); ?>:</label>
			<?php /** the variation HTML and loop */?>
			<select class='wpsc_select_variation' name="variation[<?php echo wpsc_vargrp_id(); ?>]" id="<?php echo wpsc_vargrp_form_id(); ?>">
			<?php while (wpsc_have_variations()) : wpsc_the_variation(); ?>
				<option value="<?php echo wpsc_the_variation_id(); ?>" <?php echo wpsc_the_variation_out_of_stock(); ?> ><?php echo wpsc_the_variation_name(); ?></option>
			<?php endwhile; ?>
			</select>
		</p>
	<?php endwhile; ?>
</div><!-- /.wpsc_variation_form -->
<?php /** the variation group HTML and loop ends here */?>