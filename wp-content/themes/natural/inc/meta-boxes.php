<?php
require_once(OF_FILEPATH.'/lib/meta-box.php');

$meta_boxes = array();

// Slide meta box
$meta_boxes[] = array(
	'id' => 'e404_slide',
	'title' => __('Slide options', 'natural'),
	'pages' => array('e404_slide'),

	'fields' => array(
		array(
			'name' => __('Target URL (optional)', 'natural'),
			'id' => 'e404_slide_target_url',
			'type' => 'text'
		)
	)
);

$meta_sidebars = array();
foreach($e404_custom_sidebars as $sidebar) {
	$meta_sidebars[$sidebar] = $sidebar;
}

$meta_boxes[] = array(
	'id' => 'e404_blog_custom_sidebar',
	'title' => __('Custom Sidebar', 'natural'),
	'pages' => array('page', 'post'),
	'context' => 'side',

	'fields' => array(
		array(
			'name' => __('Sidebar', 'natural'),
			'id' => 'e404_custom_sidebar',
			'type' => 'select',
			'options' => $meta_sidebars
		)
	)
);

foreach ($meta_boxes as $meta_box) {
	$my_box = new RW_Meta_Box($meta_box);
}

add_action('do_meta_boxes', 'e404_slide_image_box');
function e404_slide_image_box() {
	remove_meta_box('postimagediv', 'e404_slide', 'side');
	add_meta_box('postimagediv', __('Slide Image', 'natural'), 'post_thumbnail_meta_box', 'e404_slide', 'normal', 'high');
}

require_once(OF_FILEPATH.'/lib/MetaBox.php');
require_once(OF_FILEPATH.'/lib/MediaAccess.php');

$wpalchemy_media_access = new WPAlchemy_MediaAccess();

$e404_portfolio_preview_options = new WPAlchemy_MetaBox(array
(
	'id' => 'e404_portfolio_preview_options',
	'title' => __('Portfolio Preview Options', 'natural'),
	'types' => array('portfolio'),
	'context' => 'normal',
	'template' => OF_FILEPATH.'/inc/meta-portfolio-preview-options.php'
));

$e404_blog_thumbnail_options = new WPAlchemy_MetaBox(array
(
	'id' => 'e404_blog_thumbnail_options',
	'title' => __('Blog Thumbnail Options', 'natural'),
	'types' => array('post'),
	'context' => 'normal',
	'template' => OF_FILEPATH.'/inc/meta-blog-thumbnail-options.php'
));

$e404_wide_header_options = new WPAlchemy_MetaBox(array
(
	'id' => 'e404_wide_header_options',
	'title' => __('Header Options', 'natural'),
	'types' => array('post', 'page', 'portfolio'),
	'context' => 'normal',
	'template' => OF_FILEPATH.'/inc/meta-wide-header-options.php'
));

if(is_admin()) {
	add_action('init', 'add_metabox_css');
	function add_metabox_css() {
		wp_enqueue_style('metabox', OF_DIRECTORY.'/css/meta.css');
	}
}

?>