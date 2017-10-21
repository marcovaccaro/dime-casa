<?php
if ( STYLESHEETPATH == TEMPLATEPATH ) {
	define('OF_FILEPATH', TEMPLATEPATH);
	define('OF_DIRECTORY', get_template_directory_uri());
} else {
	define('OF_FILEPATH', STYLESHEETPATH);
	define('OF_DIRECTORY', get_stylesheet_directory_uri());
}

if(!isset($content_width))
	$content_width = 1170;

load_theme_textdomain('natural', OF_FILEPATH.'/languages/');

require_once(OF_FILEPATH.'/inc/theme-defaults.php');
require_once(OF_FILEPATH.'/inc/dashboard-widget.php');

require_once(OF_FILEPATH.'/admin/admin-functions.php');
require_once(OF_FILEPATH.'/admin/admin-interface.php');

require_once(OF_FILEPATH.'/inc/custom-sidebars.php');
require_once(OF_FILEPATH.'/inc/custom-post-types.php');

if(is_admin())
	require_once (OF_FILEPATH.'/admin/theme-options.php');
require_once (OF_FILEPATH.'/admin/theme-functions.php');

require_once(OF_FILEPATH.'/inc/shortcodes.php');
require_once(OF_FILEPATH.'/inc/tools.php');
require_once(OF_FILEPATH.'/inc/widgets.php');

require_once(OF_FILEPATH.'/inc/theme-options.php');

require_once(OF_FILEPATH.'/inc/meta-boxes.php');

require_once(OF_FILEPATH.'/inc/shortcode-manager.php');

// theme settings
add_theme_support('post-thumbnails');
add_theme_support('automatic-feed-links');

// register sidebars
register_sidebar(array(	'id' => 'e404_blog_sidebar',
						'name' => 'Blog Sidebar',
						'before_widget' => '<div id="%1$s" class="widgets %2$s">',
						'after_widget' => "</div>\n",
						'before_title' => '<h3>',
						'after_title' => "</h3>\n"));

register_sidebar(array(	'id' => 'e404_page_sidebar',
						'name' => 'Page Sidebar',
						'before_widget' => '<div id="%1$s" class="widgets %2$s">',
						'after_widget' => "</div>\n",
						'before_title' => '<h3>',
						'after_title' => "</h3>\n"));

register_sidebar(array(	'id' => 'e404_portfolio_sidebar',
						'name' => 'Portfolio Sidebar',
						'before_widget' => '<div id="%1$s" class="widgets %2$s">',
						'after_widget' => "</div>\n",
						'before_title' => '<h3>',
						'after_title' => "</h3>\n"));

register_sidebar(array(	'id' => 'e404_gallery_sidebar',
						'name' => 'Gallery Sidebar',
						'before_widget' => '<div id="%1$s" class="widgets %2$s">',
						'after_widget' => "</div>\n",
						'before_title' => '<h3>',
						'after_title' => "</h3>\n"));

if($e404_all_options['e404_footer_columns'] == '1')
	$footer_class = 'full_page';
elseif($e404_all_options['e404_footer_columns'] == '2')
	$footer_class = 'one_half';
elseif($e404_all_options['e404_footer_columns'] == '3')
	$footer_class = 'one_third';
elseif($e404_all_options['e404_footer_columns'] == '4')
	$footer_class = 'one_fourth';
else
	$footer_class = 'one_fourth';

register_sidebar(array(	'id' => 'e404_footer_sidebar',
						'name' => 'Footer Sidebar',
						'before_widget' => '<div id="%1$s" class="'.$footer_class.' widgets %2$s">',
						'after_widget' => "</div>\n",
						'before_title' => '<h3>',
						'after_title' => "</h3>\n"));

// register menus
function e404_register_menus() {
	register_nav_menus(array('header-menu' => __('Header Menu', 'natural')));
	register_nav_menus(array('footer-menu' => __('Footer Menu', 'natural')));
}
add_action('init', 'e404_register_menus');

if(!is_admin()) {
	require_once(OF_FILEPATH.'/inc/custom-colors.php');
	
	require_once(OF_FILEPATH.'/inc/tweaks.php');
	require_once(OF_FILEPATH.'/inc/sliders.php');

	add_action('init', 'e404_enqueue_scripts_and_styles');

	function e404_enqueue_scripts_and_styles() {
		wp_enqueue_script('jquery');
		wp_enqueue_script('preloader', OF_DIRECTORY.'/js/preloader.js', array('jquery'));
		wp_enqueue_script('respond', OF_DIRECTORY.'/js/respond.js', array('jquery'));
	
		$disabled = get_option('e404_disable_galleria');
		if($disabled != 'true') {
			wp_enqueue_style('galleria', OF_DIRECTORY.'/css/galleria.classic.css');
		}
	
		// menu 
		wp_enqueue_script('hoverintent', OF_DIRECTORY.'/js/hoverIntent.js', array('jquery'));
		wp_enqueue_script('superfish', OF_DIRECTORY.'/js/superfish.js', array('jquery'));
		wp_enqueue_style('superfish', OF_DIRECTORY.'/css/menu.css');
	
		// tipsy
		wp_enqueue_script('tipsy', OF_DIRECTORY.'/js/jquery.tipsy.js', array('jquery'), '', true);
		wp_enqueue_style('tipsy', OF_DIRECTORY.'/css/tipsy.css');
		
		// fitvids
		wp_enqueue_script('fitvids', OF_DIRECTORY.'/js/jquery.fitvids.js', array('jquery'), '', true);
		
		// sortable portfolio
		function e404_sortable_scripts() {
			$sortable_templates = array('portfolio-3columns-sortable.php', 'portfolio-4columns-sortable.php');
			if(in_array(e404_get_current_template(), $sortable_templates)) {
				wp_enqueue_script('quicksand', OF_DIRECTORY.'/js/jquery.quicksand.js', array('jquery'), '', true);
				wp_enqueue_script('sortable', OF_DIRECTORY.'/js/sortable.js', array('jquery'), '', true);
			}
		}
		add_action('get_header', 'e404_sortable_scripts');
	
		wp_enqueue_script('prettyphoto', OF_DIRECTORY.'/js/jquery.prettyphoto.js', array('jquery'));
		wp_enqueue_style('prettyphoto', OF_DIRECTORY.'/css/prettyphoto.css');
		add_action('wp_footer', 'e404_init_prettyphoto');
	
		// custom JS scripts
		wp_enqueue_script('natural-custom', OF_DIRECTORY.'/js/natural_custom.js', array('jquery'), '', true);
	}
	
	$gwf = get_option('e404_google_web_fonts');
	if($gwf == 'true') {
		add_action('init', 'e404_google_web_fonts');
		add_action('wp_head', 'e404_google_web_fonts_css');
	}
}

// init prettyPhoto
function e404_init_prettyphoto() {
?>
	<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery("a[rel^='prettyPhoto']").prettyPhoto({ overlay_gallery: false, social_tools: '', deeplinking: false });
		});
	</script>
<?php
}

// add Google Web Fonts scripts to page header
function e404_google_web_fonts() {
	$gwf_fonts[] = $gwf['body'] = get_option('e404_gwf_body');
	$gwf_fonts[] = $gwf['h1,.flex-caption,.ei-title h2'] = get_option('e404_gwf_h1');
	$gwf_fonts[] = $gwf['h2,.ei-title h3'] = get_option('e404_gwf_h2');
	$gwf_fonts[] = $gwf['h3,.rscaption'] = get_option('e404_gwf_h3');
	$gwf_fonts[] = $gwf['h4'] = get_option('e404_gwf_h4');
	$gwf_fonts[] = $gwf['h5'] = get_option('e404_gwf_h5');
	$gwf_fonts[] = $gwf['h6'] = get_option('e404_gwf_h6');
	$gwf_fonts[] = $gwf['p'] = get_option('e404_gwf_p');
	$gwf_fonts[] = $gwf['blockquote'] = get_option('e404_gwf_blockquote');
	$gwf_fonts[] = $gwf['li'] = get_option('e404_gwf_li');
	$gwf_fonts[] = $gwf['.sf-menu li'] = get_option('e404_gwf_menu');
	$gwf_fonts[] = $gwf['.sf-menu li li'] = get_option('e404_gwf_submenu');
	
	$gwf_fonts = array_unique($gwf_fonts);
	wp_cache_add('e404_gwf', $gwf);
	foreach($gwf_fonts as $font) {
		if($font != '') {
			wp_enqueue_style(str_replace(array(':', '+'), '-', $font), 'http://fonts.googleapis.com/css?family='.$font);
		}
	}
}

// generate Google Web Fonts custom CSS
function e404_google_web_fonts_css() {
	$output = '<style type="text/css">';
	$gwf = wp_cache_get('e404_gwf');
	foreach($gwf as $tag => $font) {
		if($font != '') {
			$font = explode(':', $font);
			$output .= $tag." { font-family: '".str_replace('+', ' ', $font[0])."', arial, serif; }\n";
		}
	}
	$output .= '</style>';
	echo $output;
}

// display header social icons
function e404_show_header_social_icons() {
	global $e404_all_options;

	$sites = array('Contact', 'RSS', 'Twitter', 'Facebook', 'Flickr', 'Pinterest', 'Behance', 'Buzz', 'Google+', '500px', 'Delicious', 'Digg', 'Dribbble', 'DropBox', 'Foursquare', 'iChat', 'LastFM', 'LinkedIn', 'MobyPicture', 'MySpace', 'Skype', 'StumbleUpon', 'Tumblr', 'Vimeo', 'YouTube', 'Xing');
	
	$social_media = array();
	$i = 0;
	foreach($sites as $site) {
		$name = $site;
		$site = strtolower($site);
		if($site == 'google+')
			$site = 'plus';
		if(isset($e404_all_options['e404_'.$site]) && trim($e404_all_options['e404_'.$site]) != '') {
			$social_media[$i]['name'] = $name;
			if($site == 'twitter')
				$social_media[$i]['url'] = 'http://twitter.com/'.$e404_all_options['e404_twitter'];
			else
				$social_media[$i]['url'] = $e404_all_options['e404_'.$site];
			$social_media[$i]['icon'] = OF_DIRECTORY.'/images/socialmedia/'.$site.'.png';
			$i++;
		}
	}
	$output = '';
	if($e404_all_options['e404_header_social_icons_target'] == 'true')
		$target = ' target="_blank"';
	else
		$target = '';
	foreach($social_media as $site) {
		$output .= '<a href="'.$site['url'].'"'.$target.' title="'.$site['name'].'" class="tiptip"><img src="'.$site['icon'].'" alt="'.$site['name'].'" /></a>'."\n";
	}
	echo $output;
}

// template redirects for portfolio sections
function e404_portfolio_template($templates) {
	$page_id = get_option('e404_portfolio_page');
	$template_name = get_post_meta($page_id, '_wp_page_template', true);
	$template = OF_FILEPATH.'/'.$template_name;
	if(!is_file($template)) {
		echo 'Portfolio page not found. Please choose your portfolio page in Appearance -> Theme Options -> Portfolio Options.';
		exit();
	}
	return $template;
}
add_filter('taxonomy_template', 'e404_portfolio_template');

// excerpt customization
function e404_excerpt_more($more) {
	return '';
}
add_filter('excerpt_more', 'e404_excerpt_more');
function e404_excerpt_length($length) {
	return 9999;
}
add_filter('excerpt_length', 'e404_excerpt_length');

// current templates magic
function e404_template_include($template) {
    $GLOBALS['e404_current_template'] = basename($template);
    return $template;
}
add_filter('template_include', 'e404_template_include', 1000);

function e404_get_current_template() {
    if(!isset($GLOBALS['e404_current_template']))
        return false;
    else
        return $GLOBALS['e404_current_template'];
}

add_filter('gallery_style', 
	create_function(
		'$css',
		'return preg_replace("#<style type=\'text/css\'>(.*?)</style>#s", "", $css);'
		)
	);

// shortcodes in sidebars
add_filter('widget_text', 'do_shortcode');

// comment form
function e404_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li id="li-comment-<?php comment_ID(); ?>">
		<div <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<div class="comment-box">
			<div class="leftside avatar-box"><?php echo get_avatar($comment, 70, OF_DIRECTORY.'/images/avatar.png'); ?></div>
			<div class="comment-text">
			<?php printf( __( sprintf('<h4 class="comment-author">%s</h4>', get_comment_author_link() ), 'natural')); ?>
			<?php if ( $comment->comment_approved == '0' ) : ?>
				<em><?php _e('Your comment is awaiting moderation.', 'natural'); ?></em>
				<br />
			<?php endif; ?>
				<span class="comment-date"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
					<?php printf( __('%1$s at %2$s', 'natural'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link(__('(Edit)', 'natural'), ' '); ?>
				</span>
				<p><?php comment_text(); ?></p>
				<div class="comment-reply">
					<?php comment_reply_link( array_merge( $args, array( 'reply_text' => '<span>'.__('Reply').'</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</div>
			</div>
		</div>
	</div>
	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'natural'); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'natural'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}

?>