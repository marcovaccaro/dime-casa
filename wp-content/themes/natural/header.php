<?php
/**
 * Theme Header
 *
 */
//ini_set('memory_limit','128M');
global $e404_options;
if($post && is_singular()) {
	$e404_options['post_id'] = $post->ID;
	$e404_options['post_parent'] = $post->post_parent;
}
else {
	if(e404_get_current_template() == 'index.php') {
		$page_data = get_page(get_option('page_for_posts'));
		$e404_options['post_id'] = $page_data->ID;
	}
	else {
		$e404_options['post_id'] = null;
	}
	$e404_options['post_parent'] = null;
}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title('&laquo;', true, 'right'); ?><?php bloginfo('name'); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/mediaqueries.css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	wp_head();
?>
</head>

<body<?php if($e404_options['theme_layout'] == 'boxed') echo ' id="boxed_layout"'; ?>>
<?php do_action('after_body'); ?>
<div id="page_wrapper">
<div id="header_wrapper">
	<div id="header_bar_wrapper">
		<div id="header_bar">
			<div id="header_bar_inner" class="rightside">
				<div id="header_tools" class="leftside">
					<?php if(!$e404_options['remove_search_form']) : ?>
					<div id="search" class="leftside">
						<form action="<?php echo home_url(); ?>" method="get">
							<input id="search-input" type="text" name="s" value="<?php _e('Search...', 'natural'); ?>" onfocus="if (this.value == '<?php _e('Search...', 'natural'); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Search...', 'natural'); ?>';}" />
							<span class="search-btn"></span>
						</form>
					</div>
					<?php endif; ?>
			
					<div id="social_icons" class="leftside">
						<?php e404_show_header_social_icons(); ?>
					</div>
				</div>
				
				<?php if(!$e404_options['remove_top_contact_box']) : ?>
				<div id="header_info" class="leftside">
					<?php echo $e404_options['top_contact_box']; ?>
				</div>
				<?php endif; ?>
				<br class="clear" />
			</div>
		</div>
	</div>
	<div id="header">
		<div id="logo"><a href="<?php echo home_url(); ?>"><img src="<?php echo $e404_options['logo_url']; ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" /></a></div>
	</div>
</div>
<div id="navigation_wrapper">
    <div id="navigation">
    	<?php wp_nav_menu(array('theme_location' => 'header-menu', 'container' => false, 'menu_class' => 'sf-menu', 'link_before' => '<span class="menu-btn">', 'link_after' => '</span>')); ?>
    	<br class="clear" />
    </div>
</div>
<?php
global $e404_wide_header_options;
if(is_object($e404_wide_header_options) && !empty($e404_options['post_id'])) {
	$header_meta = $e404_wide_header_options->the_meta($e404_options['post_id']);
	$header_shortcode = '';
}
else {
	$header_meta['content_type'] = null;
}
if(isset($header_meta['content_type']) && !empty($header_meta['content_type'])) {
	if(isset($header_meta['header_height']) && !empty($header_meta['header_height']))
		$header_height = $header_meta['header_height'];
	else
		$header_height = 400;
	if(isset($header_meta['header_width']) && !empty($header_meta['header_width']))
		$header_width = $header_meta['header_width'];
	else
		$header_width = 1500;
	if($header_meta['content_type'] == 'slider') {
		$header_shortcode = '[responsiveslides_gallery';
		if(isset($header_meta['header_slider_titles']) && $header_meta['header_slider_titles'] == 'Y')
			$header_shortcode .= ' titles="true"';
		else
			$header_shortcode .= ' titles="false"';
		if(isset($header_meta['header_slider_lightbox']) && $header_meta['header_slider_lightbox'] == 'Y')
			$header_shortcode .= ' lightbox="true"';
		else
			$header_shortcode .= ' lightbox="false"';
		if(isset($header_meta['header_slider_autoplay']) && $header_meta['header_slider_autoplay'] == 'Y')
			$header_shortcode .= ' autoplay="true"';
		else
			$header_shortcode .= ' autoplay="false"';
		if(isset($header_meta['header_slider_nav']) && $header_meta['header_slider_nav'] == 'Y')
			$header_shortcode .= ' nav="true"';
		else
			$header_shortcode .= ' nav="false"';
		$header_shortcode .= ' height="'.$header_height.'"';
		if(isset($header_meta['header_slider_excluded']) && !empty($header_meta['header_slider_excluded']))
			$header_shortcode .= ' exclude="'.$header_meta['header_slider_excluded'].'"';
		$header_shortcode .= ' post_id="'.$e404_options['post_id'].'" width="'.$header_width.'"]';
	}
	if($header_meta['content_type'] == 'image') {
		if(isset($header_meta['header_image']) && !empty($header_meta['header_image']))
			$header_shortcode = '[image width="'.$header_width.'" height="'.$header_height.'"]'.$header_meta['header_image'].'[/image]';
	}
	if($header_meta['content_type'] == 'gmap') {
		if(isset($header_meta['header_gmap']) && !empty($header_meta['header_gmap']))
			if(isset($header_meta['header_map_height']) && !empty($header_meta['header_map_height']))
				$header_height = $header_meta['header_map_height'];
			else
				$header_height = 400;
			$header_shortcode = '[map height="'.$header_height.'"]'.$header_meta['header_gmap'].'[/map]';
	}
}	

if(!empty($header_shortcode)) {
	echo do_shortcode(apply_filters('the_content', '<div id="wide_header_wrapper" style="overflow: hidden; max-height: '.$header_height.'px;">'.$header_shortcode.'</div>'));
}