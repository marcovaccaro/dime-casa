<script type="text/javascript">
    jQuery(document).ready(function() {
		jQuery('.meta-radio').change(function() {
			jQuery(".hidden-input").hide();
			if(jQuery(this).val() == 'video') {
				jQuery('#video-url').show();
			}
		});
		if(jQuery('input[name="e404_portfolio_preview_options[preview_type]"]:checked').val() == 'video')
			jQuery('#video-url').show();
	});
</script>
<div class="e404_meta_control">
	<h4><?php _e('Preview Type', 'natural'); ?></h4>
	<?php $mb->the_field('preview_type'); ?>
	<?php $checked = $mb->get_the_value(); if(empty($checked) || !in_array($checked, array('image', 'video'))) $checked = 'image'; ?>
	<p><input type="radio" name="<?php $mb->the_name(); ?>" class="meta-radio" value="image"<?php if($checked == 'image') echo ' checked="checked"'; ?>/> <?php _e('Featured Image', 'natural'); ?></p>
	<p><input type="radio" name="<?php $mb->the_name(); ?>" class="meta-radio" value="video"<?php if($checked == 'video') echo ' checked="checked"'; ?>/> <?php _e('Video', 'natural'); ?></p>
	<?php $mb->the_field('preview_video'); ?>
	<p id="video-url" class="hidden-input"><label><?php _e('Video URL (YouTube or Vimeo)', 'natural'); ?></label> <input type="text" class="meta-text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" /></p>
</div>