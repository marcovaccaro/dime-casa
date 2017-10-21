<?php global $wpalchemy_media_access; ?>
<script type="text/javascript">
    jQuery(document).ready(function() {
		jQuery('.meta-radio').change(function() {
			jQuery(".hidden-input").hide();
			if(jQuery(this).val() == 'image') {
				jQuery('#header-image').show();
				jQuery('#header-size').show();
			}
			if(jQuery(this).val() == 'slider') {
				jQuery('#header-slider').show();
				jQuery('#header-size').show();
			}
			if(jQuery(this).val() == 'gmap') {
				jQuery('#header-gmap').show();
			}
		});
		if(jQuery('input[name="e404_wide_header_options[content_type]"]:checked').val() == 'image') {
			jQuery('#header-image').show();
			jQuery('#header-size').show();
		}
		if(jQuery('input[name="e404_wide_header_options[content_type]"]:checked').val() == 'slider') {
			jQuery('#header-slider').show();
			jQuery('#header-size').show();
		}
		if(jQuery('input[name="e404_wide_header_options[content_type]"]:checked').val() == 'gmap') {
			jQuery('#header-gmap').show();
		}
	});
</script>
<div class="e404_meta_control">
	<h4><?php _e('Wide Header Content', 'natural'); ?></h4>
	<?php $mb->the_field('content_type'); ?>
	<?php $checked = $metabox->get_the_value(); if(empty($checked) || !in_array($checked, array('none', 'image', 'slider', 'gmap'))) $checked = 'none'; ?>
	<p><input type="radio" name="<?php $mb->the_name(); ?>" class="meta-radio" value="none"<?php if($checked == 'none') echo ' checked="checked"'; ?>/> <?php _e('None', 'natural'); ?></p>
	<p><input type="radio" name="<?php $mb->the_name(); ?>" class="meta-radio" value="image"<?php if($checked == 'image') echo ' checked="checked"'; ?>/> <?php _e('Image', 'natural'); ?></p>
	<p><input type="radio" name="<?php $mb->the_name(); ?>" class="meta-radio" value="slider"<?php if($checked == 'slider') echo ' checked="checked"'; ?>/> <?php _e('Slider (displays images attached to the post)', 'natural'); ?></p>
	<p><input type="radio" name="<?php $mb->the_name(); ?>" class="meta-radio" value="gmap"<?php if($checked == 'gmap') echo ' checked="checked"'; ?>/> <?php _e('Google Maps map', 'natural'); ?></p>
	<p id="header-size" class="hidden-input">
		<label><?php _e('Header images size (optional)', 'natural'); ?></label>
		<?php $mb->the_field('header_width'); ?>
		<input type="text" class="meta-num" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" /> x
		<?php $mb->the_field('header_height'); ?>
		<input type="text" class="meta-num" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" /> <?php _e('(in pixels)', 'natural'); ?>
	</p>
	<?php $mb->the_field('header_image'); ?>
	<p id="header-image" class="hidden-input">
		<?php echo $wpalchemy_media_access->getField(array('name' => $mb->get_the_name(), 'class' => 'meta-image', 'value' => $mb->get_the_value())); ?>
		<?php echo $wpalchemy_media_access->getButton(array('label' => __('Pick a header image', 'natural'))); ?>
	</p>
	<?php $mb->the_field('header_gmap'); ?>
	<p id="header-gmap" class="hidden-input">
		<label><?php _e('Google Maps URL', 'natural'); ?></label> <input type="text" class="meta-gmap" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" /><br />
		<label><?php _e('Map height (optional)', 'natural'); ?></label>
		<?php $mb->the_field('header_map_height'); ?>
		<input type="text" class="meta-num" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />
	</p>
	<p id="header-slider" class="hidden-input">
		<?php $mb->the_field('header_slider_titles'); ?>
		<input id="header_slider_titles" type="checkbox"<?php if($mb->get_the_value() == 'Y') echo ' checked="checked"'; ?> class="meta-checkbox" name="<?php $mb->the_name(); ?>" value="Y" /> <label for="header_slider_titles"><?php _e('Show titles', 'natural'); ?></label><br />
		<?php $mb->the_field('header_slider_lightbox'); ?>
		<input id="header_slider_lightbox" type="checkbox"<?php if($mb->get_the_value() == 'Y') echo ' checked="checked"'; ?> class="meta-checkbox" name="<?php $mb->the_name(); ?>" value="Y" /> <label for="header_slider_lightbox"><?php _e('Open images in Lightbox', 'natural'); ?></label><br />
		<?php $mb->the_field('header_slider_autoplay'); ?>
		<input id="header_slider_autoplay" type="checkbox"<?php if($mb->get_the_value() == 'Y') echo ' checked="checked"'; ?> class="meta-checkbox" name="<?php $mb->the_name(); ?>" value="Y" /> <label for="header_slider_autoplay"><?php _e('Autoplay', 'natural'); ?></label><br />
		<?php $mb->the_field('header_slider_nav'); ?>
		<input id="header_slider_nav" type="checkbox"<?php if($mb->get_the_value() == 'Y') echo ' checked="checked"'; ?> class="meta-checkbox" name="<?php $mb->the_name(); ?>" value="Y" /> <label for="header_slider_nav"><?php _e('Show prev & next arrows', 'natural'); ?></label><br />
		<?php $mb->the_field('header_slider_excluded'); ?>
		<label><?php _e('Excluded images IDs (coma separated)', 'natural'); ?></label> <input type="text" class="meta-text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />
	</p>
	<input type="submit" class="button" name="save" value="<?php _e('Save', 'natural'); ?>" /><br />
</div>