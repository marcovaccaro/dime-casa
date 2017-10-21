<script type="text/javascript">
    jQuery(document).ready(function() {
		jQuery('.meta-radio-b').change(function() {
			jQuery(".hidden-input").hide();
			if(jQuery(this).val() == 'video-youtube') {
				jQuery('#video-youtube-url').show();
			}
			if(jQuery(this).val() == 'video-vimeo') {
				jQuery('#video-vimeo-url').show();
			}
			if(jQuery(this).val() == 'image') {
				jQuery('#featured-prettyphoto').show();
			}
			if(jQuery(this).val() == 'slider') {
				jQuery('#featured-slider').show();
			}
		});
		if(jQuery('input[name="e404_blog_thumbnail_options[preview_type]"]:checked').val() == 'video-youtube')
			jQuery('#video-youtube-url').show();
		if(jQuery('input[name="e404_blog_thumbnail_options[preview_type]"]:checked').val() == 'video-vimeo')
			jQuery('#video-vimeo-url').show();
		if(jQuery('input[name="e404_blog_thumbnail_options[preview_type]"]:checked').val() == 'image')
			jQuery('#featured-prettyphoto').show();
		if(jQuery('input[name="e404_blog_thumbnail_options[preview_type]"]:checked').val() == 'slider')
			jQuery('#featured-slider').show();
	});
</script>
<div class="e404_meta_control">
	<?php $mb->the_field('preview_show_on_single_page'); ?>
	<?php $selected = $metabox->get_the_value(); if(empty($selected)) $selected = 'default'; ?>
	<p><label><?php _e('Show also on a single post page', 'natural'); ?></label>
	<select name="<?php $mb->the_name(); ?>">
		<option value="default"<?php if($selected == 'default') echo ' selected="selected"'; ?>><?php _e('-- default --', 'natural'); ?></option>
		<option value="true"<?php if($selected == 'true') echo ' selected="selected"'; ?>><?php _e('show', 'natural'); ?></option>
		<option value="false"<?php if($selected == 'false') echo ' selected="selected"'; ?>><?php _e('hide', 'natural'); ?></option>
	</select>
	</p>
	<h4><?php _e('Thumbnail Type', 'natural'); ?></h4>
	<?php $mb->the_field('preview_type'); ?>
	<?php $checked = $metabox->get_the_value(); if(empty($checked) || !in_array($checked, array('image', 'video-youtube', 'video-vimeo', 'slider'))) $checked = 'image'; ?>
	<p><input type="radio" name="<?php $mb->the_name(); ?>" class="meta-radio-b" value="image"<?php if($checked == 'image') echo ' checked="checked"'; ?>/> <?php _e('Featured Image', 'natural'); ?></p>
	<p><input type="radio" name="<?php $mb->the_name(); ?>" class="meta-radio-b" value="video-youtube"<?php if($checked == 'video-youtube') echo ' checked="checked"'; ?>/> <?php _e('YouTube Video', 'natural'); ?></p>
	<p><input type="radio" name="<?php $mb->the_name(); ?>" class="meta-radio-b" value="video-vimeo"<?php if($checked == 'video-vimeo') echo ' checked="checked"'; ?>/> <?php _e('Vimeo Video', 'natural'); ?></p>
	<p><input type="radio" name="<?php $mb->the_name(); ?>" class="meta-radio-b" value="slider"<?php if($checked == 'slider') echo ' checked="checked"'; ?>/> <?php _e('Slider (displays images attached to the post)', 'natural'); ?></p>
	<?php $mb->the_field('preview_video_youtube'); ?>
	<p id="video-youtube-url" class="hidden-input"><label><?php _e('YouTube Video URL', 'natural'); ?></label> <input type="text" class="meta-text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" /></p>
	<?php $mb->the_field('preview_video_vimeo'); ?>
	<p id="video-vimeo-url" class="hidden-input"><label><?php _e('Vimeo Video URL', 'natural'); ?></label> <input type="text" class="meta-text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" /></p>
	<?php $mb->the_field('preview_prettyphoto'); ?>
	<?php $selected = $metabox->get_the_value(); if(empty($selected)) $selected = 'default'; ?>
	<p id="featured-prettyphoto" class="hidden-input"><label><?php _e('PrettyPhoto (Lighbox)', 'natural'); ?></label>
	<select name="<?php $mb->the_name(); ?>">
		<option value="default"<?php if($selected == 'default') echo ' selected="selected"'; ?>><?php _e('-- default --', 'natural'); ?></option>
		<option value="true"<?php if($selected == 'true') echo ' selected="selected"'; ?>><?php _e('enabled', 'natural'); ?></option>
		<option value="false"<?php if($selected == 'false') echo ' selected="selected"'; ?>><?php _e('disabled', 'natural'); ?></option>
	</select>
	</p>
	<p id="featured-slider" class="hidden-input">
		<?php $mb->the_field('preview_slider_titles'); ?>
		<input id="preview_slider_titles" type="checkbox"<?php if($mb->get_the_value() == 'Y') echo ' checked="checked"'; ?> class="meta-checkbox" name="<?php $mb->the_name(); ?>" value="Y" /> <label for="preview_slider_titles"><?php _e('Show titles', 'natural'); ?></label><br />
		<?php $mb->the_field('preview_slider_lightbox'); ?>
		<input id="preview_slider_lightbox" type="checkbox"<?php if($mb->get_the_value() == 'Y') echo ' checked="checked"'; ?> class="meta-checkbox" name="<?php $mb->the_name(); ?>" value="Y" /> <label for="preview_slider_lightbox"><?php _e('Open images in Lightbox', 'natural'); ?></label><br />
		<?php $mb->the_field('preview_slider_autoplay'); ?>
		<input id="preview_slider_autoplay" type="checkbox"<?php if($mb->get_the_value() == 'Y') echo ' checked="checked"'; ?> class="meta-checkbox" name="<?php $mb->the_name(); ?>" value="Y" /> <label for="preview_slider_autoplay"><?php _e('Autoplay', 'natural'); ?></label><br />
		<?php $mb->the_field('preview_slider_directionnav'); ?>
		<input id="preview_slider_directionnav" type="checkbox"<?php if($mb->get_the_value() == 'Y') echo ' checked="checked"'; ?> class="meta-checkbox" name="<?php $mb->the_name(); ?>" value="Y" /> <label for="preview_slider_directionnav"><?php _e('Show prev & next arrows', 'natural'); ?></label><br />
		<?php $mb->the_field('preview_slider_excluded'); ?>
		<label><?php _e('Excluded images IDs (coma separated)', 'natural'); ?></label> <input type="text" class="meta-text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />
	</p>
	<input type="submit" class="button" name="save" value="<?php _e('Save', 'natural'); ?>" /><br />
</div>