<?php
$icons = array('', 'agenda', 'arrow-down', 'arrow-left-down', 'arrow-left-up', 'arrow-left', 'arrow-right-down', 'arrow-right-up', 'arrow-right', 'arrow-up', 'badge', 'bag', 'bass-speaker', 'battery-1', 'battery-2', 'battery-3', 'battery-4', 'beer-mug', 'binoculars', 'book', 'bookmark', 'bug', 'bulb', 'buoy', 'calculator', 'calendar', 'car', 'cart', 'cassette', 'cd-dvd', 'champion-cup', 'chip', 'clip', 'clipboard', 'clock', 'closed-lock', 'cloud', 'cocktail', 'coffee-cup', 'coffee-mug', 'collapse', 'comment', 'credit-card', 'cronometer', 'document', 'drop', 'empty-clipboard', 'envelope', 'expand', 'eye', 'facebook', 'first-aid-kit', 'flag', 'floppy-disc', 'flower', 'folder', 'game-boy', 'gas', 'gear', 'gift', 'glass', 'globe-1', 'globe-2', 'hard-disk', 'headphones', 'heart', 'id', 'industry', 'info', 'iphone', 'ipod', 'joystick', 'key', 'keyboard', 'lab', 'laptop', 'leaf', 'lollipop', 'magnifying-glass', 'man-user', 'memory-card', 'microphone', 'mobile-phone', 'monitor', 'moon', 'mouse', 'movie-film', 'music-note', 'network-socket', 'news', 'opened-envelope', 'opened-lock', 'pen', 'pencil', 'phone-1', 'phone-2', 'photography-camera', 'photography-film', 'photography', 'planet', 'plug', 'podcast', 'pointing-down', 'pointing-left', 'pointing-right', 'pointing-up', 'print', 'projector', 'pushpin-1', 'pushpin-2', 'puzzle', 'quote', 'radio', 'refresh', 'restaurant', 'router', 'rss', 'satelite', 'scissors', 'server', 'share', 'shield', 'sign-post', 'skull', 'snow-flake', 'speaker', 'star', 'suitcase', 'sun', 'surveillance-camera', 'tag', 'thumbs-down', 'thumbs-up', 'thunder', 'tools', 'traffic-cone', 'trash', 'tree', 'truck', 'tv', 'twitter-bird', 'twitter', 'umbrella', 'usb', 'user', 'video-camera', 'virus', 'wall-socket-1', 'wall-socket-2', 'wallet', 'webcam', 'window', 'woman-user', 'zoom-in', 'zoom-out');

$column_sizes = array(1 => 'full_page', 2 => 'one_half', 3 => 'one_third', 4 => 'one_fourth', 5 => 'one_fifth', 6 => 'one_sixth');

// [full_page] block shortcode
function e404_full_page_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('align' => ''), $atts));
	if(!empty($align))
		$align = ' '.$align;
	return '<div class="full_page'.$align.'">'.e404_clean_shortcode_content($content).'</div><br class="clear" />';
}

// [one_half] block shortcodes
function e404_one_half_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('align' => ''), $atts));
	if(!empty($align))
		$align = ' '.$align;
	return '<div class="one_half'.$align.'">'.e404_clean_shortcode_content($content).'</div>';
}

function e404_one_half_last_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('align' => ''), $atts));
	if(!empty($align))
		$align = ' '.$align;
	return '<div class="one_half last'.$align.'">'.e404_clean_shortcode_content($content).'</div><br class="clear" />'."\n";
}

// [one_third] block shortcodes
function e404_one_third_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('align' => ''), $atts));
	if(!empty($align))
		$align = ' '.$align;
	return '<div class="one_third'.$align.'">'.e404_clean_shortcode_content($content).'</div>';
}

function e404_one_third_last_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('align' => ''), $atts));
	if(!empty($align))
		$align = ' '.$align;
	return '<div class="one_third last'.$align.'">'.e404_clean_shortcode_content($content).'</div><br class="clear" />';
}

// [two_third] block shortcodes
function e404_two_third_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('align' => ''), $atts));
	if(!empty($align))
		$align = ' '.$align;
	return '<div class="two_third'.$align.'">'.e404_clean_shortcode_content($content).'</div>';
}

function e404_two_third_last_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('align' => ''), $atts));
	if(!empty($align))
		$align = ' '.$align;
	return '<div class="two_third last'.$align.'">'.e404_clean_shortcode_content($content).'</div><br class="clear" />';
}

// [one_fourth] block shortcodes
function e404_one_fourth_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('align' => ''), $atts));
	if(!empty($align))
		$align = ' '.$align;
	return '<div class="one_fourth'.$align.'">'.e404_clean_shortcode_content($content).'</div>';
}

function e404_one_fourth_last_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('align' => ''), $atts));
	if(!empty($align))
		$align = ' '.$align;
	return '<div class="one_fourth last'.$align.'">'.e404_clean_shortcode_content($content).'</div><br class="clear" />';
}

// [three_fourth] block shortcodes
function e404_three_fourth_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('align' => ''), $atts));
	if(!empty($align))
		$align = ' '.$align;
	return '<div class="three_fourth'.$align.'">'.e404_clean_shortcode_content($content).'</div>';
}

function e404_three_fourth_last_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('align' => ''), $atts));
	if(!empty($align))
		$align = ' '.$align;
	return '<div class="three_fourth last'.$align.'">'.e404_clean_shortcode_content($content).'</div><br class="clear" />';
}

// [one_fifth] block shortcodes
function e404_one_fifth_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('align' => ''), $atts));
	if(!empty($align))
		$align = ' '.$align;
	return '<div class="one_fifth'.$align.'">'.e404_clean_shortcode_content($content).'</div>';
}

function e404_one_fifth_last_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('align' => ''), $atts));
	if(!empty($align))
		$align = ' '.$align;
	return '<div class="one_fifth last'.$align.'">'.e404_clean_shortcode_content($content).'</div><br class="clear" />';
}

// [two_fifth] block shortcodes
function e404_two_fifth_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('align' => ''), $atts));
	if(!empty($align))
		$align = ' '.$align;
	return '<div class="two_fifth'.$align.'">'.e404_clean_shortcode_content($content).'</div>';
}

function e404_two_fifth_last_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('align' => ''), $atts));
	if(!empty($align))
		$align = ' '.$align;
	return '<div class="two_fifth last'.$align.'">'.e404_clean_shortcode_content($content).'</div><br class="clear" />';
}

// [three_fifth] block shortcodes
function e404_three_fifth_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('align' => ''), $atts));
	if(!empty($align))
		$align = ' '.$align;
	return '<div class="three_fifth'.$align.'">'.e404_clean_shortcode_content($content).'</div>';
}

function e404_three_fifth_last_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('align' => ''), $atts));
	if(!empty($align))
		$align = ' '.$align;
	return '<div class="three_fifth last'.$align.'">'.e404_clean_shortcode_content($content).'</div><br class="clear" />';
}

// [four_fifth] block shortcodes
function e404_four_fifth_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('align' => ''), $atts));
	if(!empty($align))
		$align = ' '.$align;
	return '<div class="four_fifth'.$align.'">'.e404_clean_shortcode_content($content).'</div>';
}

function e404_four_fifth_last_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('align' => ''), $atts));
	if(!empty($align))
		$align = ' '.$align;
	return '<div class="four_fifth last'.$align.'">'.e404_clean_shortcode_content($content).'</div><br class="clear" />';
}

// [one_sixth] block shortcodes
function e404_one_sixth_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('align' => ''), $atts));
	if(!empty($align))
		$align = ' '.$align;
	return '<div class="one_sixth'.$align.'">'.e404_clean_shortcode_content($content).'</div>';
}

function e404_one_sixth_last_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('align' => ''), $atts));
	if(!empty($align))
		$align = ' '.$align;
	return '<div class="one_sixth last'.$align.'">'.e404_clean_shortcode_content($content).'</div><br class="clear" />';
}

// [five_sixth] block shortcodes
function e404_five_sixth_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('align' => ''), $atts));
	if(!empty($align))
		$align = ' '.$align;
	return '<div class="five_sixth'.$align.'">'.e404_clean_shortcode_content($content).'</div>';
}

function e404_five_sixth_last_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('align' => ''), $atts));
	if(!empty($align))
		$align = ' '.$align;
	return '<div class="five_sixth last'.$align.'">'.e404_clean_shortcode_content($content).'</div><br class="clear" />';
}

// [one_eighth] block shortcodes
function e404_one_eighth_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('align' => ''), $atts));
	if(!empty($align))
		$align = ' '.$align;
	return '<div class="one_eighth'.$align.'">'.e404_clean_shortcode_content($content).'</div>';
}

function e404_one_eighth_last_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('align' => ''), $atts));
	if(!empty($align))
		$align = ' '.$align;
	return '<div class="one_eighth last'.$align.'">'.e404_clean_shortcode_content($content).'</div><br class="clear" />';
}

// [three_eighth] block shortcodes
function e404_three_eighth_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('align' => ''), $atts));
	if(!empty($align))
		$align = ' '.$align;
	return '<div class="three_eighth'.$align.'">'.e404_clean_shortcode_content($content).'</div>';
}

function e404_three_eighth_last_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('align' => ''), $atts));
	if(!empty($align))
		$align = ' '.$align;
	return '<div class="three_eighth last'.$align.'">'.e404_clean_shortcode_content($content).'</div><br class="clear" />';
}

// [five_eighth] block shortcodes
function e404_five_eighth_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('align' => ''), $atts));
	if(!empty($align))
		$align = ' '.$align;
	return '<div class="five_eighth'.$align.'">'.e404_clean_shortcode_content($content).'</div>';
}

function e404_five_eighth_last_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('align' => ''), $atts));
	if(!empty($align))
		$align = ' '.$align;
	return '<div class="five_eighth last'.$align.'">'.e404_clean_shortcode_content($content).'</div><br class="clear" />';
}

// [seven_eighth] block shortcodes
function e404_seven_eighth_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('align' => ''), $atts));
	if(!empty($align))
		$align = ' '.$align;
	return '<div class="seven_eighth'.$align.'">'.e404_clean_shortcode_content($content).'</div>';
}

function e404_seven_eighth_last_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('align' => ''), $atts));
	if(!empty($align))
		$align = ' '.$align;
	return '<div class="seven_eighth last'.$align.'">'.e404_clean_shortcode_content($content).'</div><br class="clear" />';
}

// [fancy_box] shortcode
function e404_fancy_box_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('wide' => ''), $atts));

	if($wide == 'true' || $wide == '1')
		$class = ' full-box';
	else
		$class = '';
	return do_shortcode('<div class="fancy-box'.$class.'">'.$content.'</div>');
}

// [blockquote] shortcode
function e404_blockquote_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('align' => '', 'author' => ''), $atts));

	$aligns = array('center', 'right', 'left', 'none');
	if(empty($align) || !in_array($align, $aligns))
		$align = "center";
		
	$before = '<blockquote class="bq-'.$align.'">';
	$after = '</blockquote>';
	if(!empty($author))
		$after = '<cite>'.$author.'</cite>'.$after;
	
	return $before.do_shortcode('<p>'.$content.'</p>').$after;
}

// [code] shortcode
function e404_code_shortcode($atts, $content = null) {
	$content = str_replace(array('[', ']'), array('&#91;', '&#93;'), $content);
	return '<code>'.nl2br($content).'</code>';
}

// [highlight1] shortcode
function e404_highlight1_shortcode($atts, $content = null) {
	return '<span class="highlight1">'.do_shortcode($content).'</span>';
}

// [highlight2] shortcode
function e404_highlight2_shortcode($atts, $content = null) {
	return '<span class="highlight2">'.do_shortcode($content).'</span>';
}

// [tip] shortcode
function e404_tip_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('title' => ''), $atts));
	if(empty($title))
		return do_shortcode($content);
	return '<span class="tiptip" title="'.$title.'">'.do_shortcode($content).'</span>';
}

// [icon_button] shortcode
function e404_icon_button_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('icon' => '', 'url' => '', 'title' => '', 'caption' => '', 'color' => '', 'transparent' => '', 'target' => ''), $atts));

	global $e404_default_icons, $e404_default_transparency;
	$stylesheet = str_replace('.css', '', $GLOBALS['stylesheet']);

	if(!in_array($color, array('black', 'white', 'gray', 'darkgray', 'green', 'blue', 'darkblue', 'violet', 'red', 'pink', 'orange', 'yellow', 'brown'))) {
		if(isset($e404_default_icons[$stylesheet]))
			$color = $e404_default_icons[$stylesheet];
		if(empty($color))
			$color = 'black';
	}
	if($transparent == 'true' || $transparent == '1')
		$transparent = ' transparent';
	else {
		if(isset($e404_default_transparency[$stylesheet])) {
			if($e404_default_transparency[$stylesheet] == 'true')
				$transparent = ' transparent';
			else
				$transparent = '';
		}
	}
	if(!empty($target))
		$target = ' target="'.$target.'"';
	$output = '';
	$output .= '<div class="icon-button icon-medium">';
	if(!empty($icon)) {
		if(empty($url))
			$output .= '<div><img src="'.OF_DIRECTORY.'/images/icons/'.$color.'/'.$icon.'.png" class="icon'.$transparent.'" alt="'.$title.'" /></div>';
		else
			$output .= '<div><a href="'.$url.'"'.$target.'><img src="'.OF_DIRECTORY.'/images/icons/'.$color.'/'.$icon.'.png" class="icon'.$transparent.'" alt="'.$title.'" /></a></div>';
	}
	$output .= '<div class="icon-desc">';
	if(empty($url))
		$output .= '<div><strong>'.$title.'</strong></div>';
	else
		$output .= '<div><a href="'.$url.'"'.$target.'>'.$title.'</a></div>';
	if(!empty($caption))
		$output .= '<div><span>'.$caption.'</span></div>';
	$output .= '</div></div>';

	return $output;
}

// [icon_box] shortcode
function e404_icon_box_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('icon' => '', 'url' => '', 'title' => '', 'caption' => '', 'more_text' => '', 'size' => '', 'color' => '', 'transparent' => '', 'center' => '', 'target' => ''), $atts));
	
	global $e404_default_icons, $e404_default_transparency;
	$stylesheet = str_replace('.css', '', $GLOBALS['stylesheet']);

	if(!in_array($color, array('black', 'white', 'gray', 'darkgray', 'green', 'blue', 'darkblue', 'violet', 'red', 'pink', 'orange', 'yellow', 'brown'))) {
		if(isset($e404_default_icons[$stylesheet]))
			$color = $e404_default_icons[$stylesheet];
		if(empty($color))
			$color = 'black';
	}
	if(!in_array($size, array('big', 'medium', 'small')))
		$size = 'big';
	$size = 'icon-'.$size;
	if($transparent == 'true' || $transparent == '1')
		$transparent = ' transparent';
	else {
		if(isset($e404_default_transparency[$stylesheet])) {
			if($e404_default_transparency[$stylesheet] == 'true')
				$transparent = ' transparent';
			else
				$transparent = '';
		}
	}
	if(!empty($target))
		$target = ' target="'.$target.'"';
	if($center == 'true' || $center == '1')
		$center = ' center';
	$output = '';
	$output .= '<div class="icon-box '.$size.$center.'">';
	if(!empty($icon))
		$output .= '<div><img src="'.OF_DIRECTORY.'/images/icons/'.$color.'/'.$icon.'.png" class="icon'.$transparent.$center.'" alt="'.$title.'" /></div>';
	$output .= '<div class="icon-desc'.$center.'">';
	if(empty($url))
		$output .= '<h2>'.$title.'</h2>';
	else
		$output .= '<h2><a href="'.$url.'"'.$target.'>'.$title.'</a></h2>';
	if(!empty($caption))
		$output .= '<div><span>'.$caption.'</span></div>';
	$output .= '</div></div>';
	
	if(trim($content) != '')
		$output .= '<p>'.do_shortcode($content).'</p>';
	if(!empty($url) && !empty($more_text)) {
		$output .= '<p class="more"><a href="'.$url.'"'.$target.'><span>'.$more_text.'</span></a></p>';
	}

	return $output;
}

// [testimonial] shortcode
function e404_testimonial_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('image' => '', 'url' => '', 'name' => '', 'info' => ''), $atts));
	
	$output = '';
	$output .= '<div class="testimonial-box light-box"><div class="leftside avatar-box">';
	if(!empty($image))
		$output .= '<img width="90" height="90" src="'.$image.'" alt="'.$name.'" />';
	else
		$output .= '<img width="90" height="90" src="'.OF_DIRECTORY.'/images/avatar.png" alt="'.$name.'" />';
	$output .= '</div><div class="comment-text">';
	if(!empty($url))
		$output .= '<h4 class="comment-author"><a href="'.$url.'">'.$name.'</a></h4>';
	else
		$output .= '<h4 class="comment-author"><span>'.$name.'</span></h4>';
	if(!empty($info))
		$output .= '<span class="comment-info">'.$info.'</span>';
	
	if(trim($content) != '')
		$output .= '<p>"'.do_shortcode($content).'"</p>';
	$output .= '</div></div>';

	return $output;
}

// [person] shortcode
function e404_person_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('image' => '', 'url' => '', 'name' => '', 'info' => '', 'twitter' => '', 'facebook' => '', 'linkedin' => ''), $atts));
	
	$output = '';
	$output .= '<div class="person-box light-box"><div class="leftside avatar-box">';
	if(!empty($image))
		$output .= '<img width="90" height="90" src="'.$image.'" alt="'.$name.'" />';
	else
		$output .= '<img width="90" height="90" src="'.OF_DIRECTORY.'/images/avatar.png" alt="'.$name.'" />';
	$output .= '</div><div class="person-text">';
	if(!empty($url))
		$output .= '<h4 class="person-name"><a href="'.$url.'">'.$name.'</a></h4>';
	else
		$output .= '<h4 class="person-name"><span>'.$name.'</span></h4>';
	if(!empty($info))
		$output .= '<span class="person-info">'.$info.'</span>';
	
	if(trim($content) != '')
		$output .= '<p>'.do_shortcode($content).'</p>';
	if(!(empty($twitter) && empty($facebook) && empty($linkedin))) {
		$output .= '<ul class="person-social">';
		if(!empty($twitter))
			$output .= '<li><a href="http://twitter.com/'.$twitter.'" class="person-twitter tiptip" title="Twitter">Twitter</a></li>';
		if(!empty($facebook))
			$output .= '<li><a href="'.$facebook.'" class="person-facebook tiptip" title="Facebook">Facebook</a></li>';
		if(!empty($linkedin))
			$output .= '<li><a href="http://www.linkedin.com/in/'.$linkedin.'" class="person-linkedin tiptip" title="LinkedIn">LinkedIn</a></li>';
		$output .= '</ul>';
	}
	$output .= '</div></div>';

	return $output;
}

// [line_dotted] shortcode
function e404_line_dotted_shortcode() {
	return '<hr class="divider-dotted" />';
}

// [line_top] shortcode
function e404_line_top_shortcode() {
	return '<div class="divider-top"><a href="#">Top</a></div>';
}

// [line] shortcode
function e404_line_shortcode() {
	return '<hr class="divider-full" />';
}

// [clear] shortcode
function e404_clear_shortcode() {
	return '<div class="clear"></div>';
}

// [h1], [h2], [h3], [h4], [h5], [h6] shortcodes
function e404_h1_shortcode($atts, $content = null) {
	return e404_h_shortcode('h1', $atts, $content);
}
function e404_h2_shortcode($atts, $content = null) {
	return e404_h_shortcode('h2', $atts, $content);
}
function e404_h3_shortcode($atts, $content = null) {
	return e404_h_shortcode('h3', $atts, $content);
}
function e404_h4_shortcode($atts, $content = null) {
	return e404_h_shortcode('h4', $atts, $content);
}
function e404_h5_shortcode($atts, $content = null) {
	return e404_h_shortcode('h5', $atts, $content);
}
function e404_h6_shortcode($atts, $content = null) {
	return e404_h_shortcode('h6', $atts, $content);
}
function e404_h_shortcode($header, $atts, $content = null) {
	extract(shortcode_atts(array('color' => '', 'nomargin' => '', 'fancy' => ''), $atts));
	if($nomargin == 'true' || $nomargin == '1' || $fancy == 'true' || $fancy == '1') {
		$class = ' class="';
		if($nomargin == 'true' || $nomargin == '1')
			$class .= 'nomargin ';
		if($fancy == 'true' || $fancy == '1') {
			$class .= 'fancy-header';
			$content = '<span>'.$content.'</span>';
		}
		$class .= '"';
	}
	else {
		$class = '';
	}
	return '<'.$header.$class.e404_custom_colors_style('', $color).'>'.do_shortcode($content).'</'.$header.'>';
}

// [b] shortcode
function e404_b_shortcode($atts, $content = null) {
	return '<strong>'.do_shortcode($content).'</strong>';
}

// [i] shortcode
function e404_i_shortcode($atts, $content = null) {
	return '<em>'.do_shortcode($content).'</em>';
}

// [dropcap] shortcode
function e404_dropcap_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('style' => '', 'color' => ''), $atts));
	$styles = array('1', '2', '3', '4', '5', '6', '7');
	if(empty($style) || !in_array($style, $styles))
		$style = '1';
	
	$before = '<span class="dropcap'.$style.'"'.e404_custom_colors_style('', $color).'>';
	$after = '</span>';

	return $before.do_shortcode($content).$after;
}

// [button] shortcode
function e404_button_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('style' => '', 'color' => '', 'size' => '', 'width' => '', 'bgcolor' => '', 'textcolor' => '', 'bordercolor' => '', 'href' => '', 'stroke' => '', 'rounded' => '', 'icon' => '', 'target' => ''), $atts));
	$sizes = array('small', 'medium', 'big');
	if(empty($size) || !in_array($size, $sizes))
		$size = 'small';
	$styles = array('normal', 'light', 'glass', 'gradient');
	if(!empty($style) && !in_array($style, $styles))
		$style = '';
	$colors = array('', 'darkgray', 'black', 'red', 'orange', 'brown', 'darkcoffee', 'lemon', 'pear', 'grass', 'turquoise', 'aquamarine', 'ice', 'denim', 'indigo', 'violet', 'fuschia', 'carnationpink', 'frenchrose');
	if(is_numeric($color))
		$color = $colors[(int)$color];
	if(!empty($color) && !in_array($color, $colors))
		$color = '';
	if(!empty($width)) {
		if(ctype_digit($width))
			$width = $width.'px';
	}

	$class_a = $size.'-btn';
	if(!empty($style))
		$class_a .= ' '.$style.'-btn';
	if(!empty($stroke))
		$class_a .= ' stroke-btn';
	if(!empty($rounded))
		$class_a .= ' rounded-btn';
	if(empty($color))
		$class_span = '';
	else
		$class_span = ' class="'.$color.'-btn"';
		
	if(!empty($target))
		$target = ' target="'.$target.'"';

	$before = '<a class="'.$class_a.'"'.$target.' href="'.$href.'"><span'.$class_span.e404_custom_colors_style($bgcolor, $textcolor, $bordercolor, false, $width).'>';
	if(!empty($icon))
		$before .= '<img src="'.OF_DIRECTORY.'/images/bullets/'.$icon.'.png" alt="" /> ';

	$after = '</span></a>';

	return do_shortcode($before.$content.$after);
}

// icons
$icon_types_normal = array('access-denied', 'alert', 'alert2', 'info', 'arrow-right', 'arrow-left', 'arrow-down', 'arrow-up', 'arrow', 'arrow2', 'checkmark', 'glass', 'plus', 'minus', 'user', 'help', 'bubble', 'bubbles', 'tag', 'download', 'calendar', 'clock', 'chart', 'cog', 'cd', 'document', 'folder', 'home', 'film', 'image', 'sound', 'link', 'key', 'locked', 'paperclip', 'marker', 'mail', 'rss', 'access-denied-light', 'alert-light', 'alert2-light', 'info-light', 'arrow-right-light', 'arrow-left-light', 'arrow-down-light', 'arrow-up-light', 'arrow-light', 'arrow2-light', 'checkmark-light', 'glass-light', 'plus-light', 'minus-light', 'user-light', 'help-light', 'bubble-light', 'bubbles-light', 'tag-light', 'download-light', 'calendar-light', 'clock-light', 'chart-light', 'cog-light', 'cd-light', 'document-light', 'folder-light', 'home-light', 'film-light', 'image-light', 'sound-light', 'link-light', 'key-light', 'locked-light', 'paperclip-light', 'marker-light', 'mail-light', 'rss-light');
$icon_types_small = array('small-arrow', 'small-checkmark', 'small-plus', 'small-minus', 'small-dot', 'small-star', 'small-arrow-left', 'small-arrow-right', 'small-add', 'small-go', 'small-toggle-plus', 'small-toggle-minus');
$icon_types = array_merge($icon_types_normal, $icon_types_small);

// [list] shortcode
function e404_list_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('type' => ''), $atts));
	if(empty($type))
		$type = 'arrow';
	if(substr($type, 0, 6) == 'small-') {
		$class = 'small-list';
	}
	else {
		$class = 'img-list';
		$type = 'ico-'.$type;
	}
	
	return '<ul class="'.$class.' '.$type.'">'.do_shortcode($content).'</ul>';
}

// [span] shortcode
function e404_span_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('type' => ''), $atts));
	if(empty($type))
		$type = 'arrow';
	if(substr($type, 0, 6) == 'small-') {
		$class = 'small-list';
	}
	else {
		$class = 'img-list';
		$type = 'ico-'.$type;
	}
	
	return '<span class="img-box '.$type.'">'.do_shortcode($content).'</span>';
}

// [link] shortcode
function e404_link_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('type' => '', 'href' => '', 'target' => ''), $atts));
	if(empty($type))
		$type = 'arrow';
	if(substr($type, 0, 6) == 'small-') {
		$class = 'small-list';
	}
	else {
		$class = 'img-list';
		$type = 'ico-'.$type;
	}
	
	if(!empty($target))
		$target = ' target="'.$target.'"';

	return '<a href="'.$href.'"'.$target.' class="img-box '.$type.'">'.do_shortcode($content).'</a>';
}

// [li] shortcode
function e404_li_shortcode($atts, $content = null) {
	return '<li>'.do_shortcode($content).'</li>';
}

// [message] shortcode
function e404_message_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('type' => ''), $atts));
	$types = array('info', 'tip', 'note', 'error');
	if(empty($type) || !in_array($type, $types))
		$type = 'info';
	
	return '<div class="message msg-'.$type.'">'.do_shortcode($content).'</div>';
}

// [image] shortcode
function e404_image_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('raw' => 'true', 'align' => '', 'size' => '', 'title' => '', 'lightbox' => '', 'group' => '', 'width' => '', 'height' => '', 'border' => '', 'href' => '', 'target' => '', 'caption' => '', 'shadow' => ''), $atts));
	$image_size = array('vtiny' => 108, 'tiny' => 158, 'vsmall' => 198, 'small' => 258, 'medium' => 358, 'large' => 558, 'huge' => 758, 'full' => 1158);

	if(trim($content) == '')
		return;

	if(!empty($size)) {
		$nsize = $image_size[$size];
		if($nsize == 0 || !$nsize)
			$shadow = 'false';
	}

	$image_width = $image_height = 0;
	$before = $after = $output = $rel = $image_title = $image_caption = '';
	if(empty($align))
		$align = false;
	elseif($align == 'none')
		$align = false;

	if($shadow == 'true') {
		if($align == 'left' || $align == 'right' || $align == 'center')
			$shadow_align = ' align'.$align.' shadow_'.$align;
		else
			$shadow_align = '';
		$before = '<div class="shadow shadow_'.$size.$shadow_align.'">';
		$align = false;
	}

	if($lightbox == 'true' || $lightbox == '1') {
		if(empty($group))
			$rel = ' rel="prettyPhoto"';
		else
			$rel = ' rel="prettyPhoto['.$group.']"';
		$zoom = "zoom";
		if($align && $align != 'center')
			$zoom .= ' ' .$align.'side';
		if(!empty($caption))
			$image_caption = ' title="'.$caption.'"';
		else
			$image_caption = ' title=""';
		$before .= '<a href="'.$content.'" class="'.$zoom.'"'.$rel.$image_caption.'>';
		$after = '</a>';
	}
	elseif(!empty($href)) {
		if(!empty($target))
			$target = ' target="'.$target.'"';
		$before .= '<a href="'.$href.'"'.$target.'>';
		$after = '</a>';
	}
		
	if($shadow == 'true')
		$after .= '</div>';
	
	if(!empty($size))
		$image_width = $image_size[$size];
	else {
		if(!empty($width))
			$image_width = $width;
	}
	if(!empty($height))
		$image_height = $height;
	$image_title = ' alt="'.$title.'"';
	if(!empty($title)) {
		if(!($lightbox == 'true' || $lightbox == '1'))
			$image_title .= ' title="'.$title.'"';
	}
	if($border == 'true' || $border == '1') {
		$image_class = 'border-img';
	}
	else {
		$image_class = 'img';
		$image_width = $image_width + 12;
		if($image_height > 0)
			$image_height = $image_height + 12;
	}
	if($align)
		$image_class .= ' align'.$align;
	if(!empty($size))
		$image_class .= ' img_'.$size;

	$output = $before.'<img src="'.e404_img_scale($content, $image_width, $image_height).'"'.$image_title.' class="'.$image_class.'" />'.$after;

	return $output;
}

// [lightbox] shortcode
function e404_lightbox_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('title' => '', 'group' => '', 'width' => '', 'height' => '', 'href' => '', 'iframe' => ''), $atts));

	if(trim($content) == '')
		return;
	$a_title = '';
	
	if(empty($group))
		$rel = ' rel="prettyPhoto"';
	else
		$rel = ' rel="prettyPhoto['.$group.']"';
	if(!empty($href) && ($iframe == 'true' || $iframe == '1')) {
		$href .= '?iframe=true';
		if((int)$width)
			$href .= '&amp;width='.(int)$width;
		if((int)$height)
			$href .= '&amp;height='.(int)$height;
	}
	if(!empty($title))
		$a_title = ' title="'.$title.'"';
	$before = '<a href="'.$href.'"'.$rel.$a_title.'>';
	$after = '</a>';

	return "\n".$before.do_shortcode($content).$after."\n";
}

// [accordions] shortcode
function e404_accordions_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('style' => ''), $atts));

	$styles = array('dark' => '1', 'medium' => '2', 'light' => '3');
	$style = e404_get_style_number($style, $styles);

	$before = '<div class="accordion accordion'.$style.'">';
	$after = '</div>';
	
	return $before.do_shortcode($content).$after;
}

function e404_accordion_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('title' => '', 'bgcolor' => '', 'color' => '', 'bordercolor' => '', 'header_bgcolor' => '', 'header_color' => '', 'header_bordercolor' => ''), $atts));
	
	$before = '<h4 class="accordion_title"'.e404_custom_colors_style($header_bgcolor, $header_color, $header_bordercolor).'>';
	$before .= '<span'.e404_custom_colors_style('', $header_color, '').'>'.$title.'</span></h4>';
	$before .= '<div class="accordion_content light-box"'.e404_custom_colors_style($bgcolor, $color, '', true).'><p>';
	$after = '</p></div>';
	
	return $before.do_shortcode($content).$after;
}

// [toggle] shortcode
function e404_toggle_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('title' => '', 'bgcolor' => '', 'color' => '', 'header_bgcolor' => '', 'header_color' => '', 'header_bordercolor' => '', 'style' => ''), $atts));

	$styles = array('dark' => '1', 'medium' => '2', 'light' => '3');
	$style = e404_get_style_number($style, $styles);

	$before = '<div class="toggle toggle'.$style.'">';
	$before .= '<h4 class="toggle_title"'.e404_custom_colors_style($header_bgcolor, $header_color, $header_bordercolor).'>';
	$before .= '<span'.e404_custom_colors_style('', $header_color, '').'>'.$title.'</span></h4>';
	$before .= '<div class="toggle_content light-box"'.e404_custom_colors_style($bgcolor, $color, '', true).'><p>';
	$after = '</p></div></div>';
	
	return $before.do_shortcode($content).$after;
}

// [box] shortcode
function e404_box_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('big' => '', 'title' => '', 'bgcolor' => '', 'color' => '', 'header_bgcolor' => '', 'header_color' => '', 'header_bordercolor' => '', 'style' => '', 'rounded' => ''), $atts));

	$styles = array('dark' => '3', 'medium' => '2', 'light' => '1');
	$style = e404_get_style_number($style, $styles);
	if($big == 'true' || $big == '1')
		$style .= ' big_text';
	if($rounded == 'true' || $rounded == '1')
		$style .= ' rounded';
		
	$before = '<div class="info_box info_box'.$style.'"'.e404_custom_colors_style($bgcolor, $color).'>';
	if(!empty($title))
		$before .= '<div class="title_box"'.e404_custom_colors_style($header_bgcolor, $header_color, $header_bordercolor).'>'.$title.'</div>';
	$before .= '<div class="content_box"><p>';
	$after = '</p></div></div>';
	
	return $before.do_shortcode($content).$after;
}

// [tabs] shortcode
function e404_tabs_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('tabs' => '', 'icons' => ''), $atts));
	
	$tabs = explode('|', $tabs);
	$icons = explode('|', $icons);
	$tab_number = 0;
	$output = '<ul class="tabs">';
	foreach($tabs as $tab) {
		$icon = $icons[$tab_number];
		$tab_number++;
		if($tab_number == 1) {
			$output .= '<li class="current">';
		}
		else {
			$output .= '<li>';
		}
		$output .= '<a href="#" class="tab">';
		if(!empty($icon))
			$output .= '<img src="'.OF_DIRECTORY.'/images/miniicons/'.$icon.'.png" alt="'.$icon.'" />';
		if(!empty($tab))
			$output .= '<span>'.trim($tab).'</span>';
		$output .= '</a></li>';
	}
	$output .= '</ul>';
	
	return $output.do_shortcode($content);
}

function e404_tab_shortcode($atts, $content = null) {
	return '<div class="tab_content fancy-box" style="position: absolute; left: -10000px;"><p>'.do_shortcode($content).'</p></div>';
}

// [table] shortcodes
function e404_table_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('style' => '', 'align' => '', 'width' => '', 'highlight' => '', 'border' => ''), $atts));
		
	$styles = array('light', 'medium', 'dark');
	if(empty($style) || !in_array($style, $styles))
		$style = 'light';
	$tclass = 'tables';
	if(!empty($style))
		$tclass .= ' table-'.$style;
	if($highlight == 'true' or $highlight == '1')
		$tclass .= ' highlight-row';
	$tstyle = (empty($width)) ? '' : ' style="width: '.(int)$width.'px"';
	$talign = (empty($align)) ? '' : ' align="'.$align.'"';
		
	if($border == 'true')
		$before = '<div class="table-border">';
	else
		$before = '';
	
	$before .= '<table class="'.$tclass.'"'.$tstyle.$talign.'>';
	$after = '</table>';
		
	if($border == 'true')
		$after .= '</div>';
	
	return $before.do_shortcode($content).$after;
}

function e404_table_header_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('align' => ''), $atts));
	$talign = (empty($align)) ? '' : ' class="th-'.$align.'"';
	
	$before = '<thead'.$talign.'>';
	$after = '</thead>';
	
	return $before.do_shortcode($content).$after;
}

function e404_table_body_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('align' => ''), $atts));
	$talign = (empty($align)) ? '' : ' class="td-'.$align.'"';
	
	$before = '<tbody'.$talign.'>';
	$after = '</tbody>';
	
	return $before.do_shortcode($content).$after;
}

function e404_table_th_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('align' => ''), $atts));
	$talign = (empty($align)) ? '' : ' class="'.$align.'"';
	
	$before = '<th'.$talign.'>';
	$after = '</th>';
	
	return $before.do_shortcode($content).$after;
}

function e404_table_tr_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('align' => ''), $atts));
	$talign = (empty($align)) ? '' : ' class="'.$align.'"';
	
	$before = '<tr'.$talign.'>';
	$after = '</tr>';
	
	return $before.do_shortcode($content).$after;
}

function e404_table_td_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('align' => '', 'bgcolor' => ''), $atts));
	$talign = (empty($align)) ? '' : ' class="'.$align.'"';
	$tbgcolor = (empty($bgcolor)) ? '' : ' style="background-color: '.$bgcolor.';"';
	
	$before = '<td'.$talign.$tbgcolor.'>';
	$before = '<td'.$talign.'>';
	$after = '</td>';
	
	return $before.do_shortcode($content).$after;
}

// [pricebox] shortcodes
function e404_pricebox_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('title' => '', 'featured' => ''), $atts));
	if($featured == 'true' || $featured == '1')
		$featured = ' featured-box';
	
	$before = '<div class="pricebox'.$featured.' light-box"><h3>'.$title.'</h3>';
	$after = '</div>';

	return $before.do_shortcode($content).$after;
}

function e404_pricebox_price_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('price' => '', 'period' => ''), $atts));
	
	$output = '<p class="price-td">';
	if(!empty($price))
		$output .= '<strong>'.$price.'</strong>';
	if(!empty($period))
		$output .= '<span>'.$period.'</span>';
	$output .= '</p>';
	
	return $output;
}

function e404_pricebox_body_shortcode($atts, $content = null) {
	$before = '<div class="price-body">';
	$after = '<hr class="dotted" /></div>';
	
	$output = '<ul>';
	$lines = explode("\n", $content);
	foreach($lines as $line) {
		if(trim($line) != '')
			$output .= '<li>'.trim($line).'</li>';
	}
	$output .= '</ul>';
	
	return $before.do_shortcode($output).$after;
}

function e404_pricebox_footer_shortcode($atts, $content = null) {
	$before = '<p class="price-foot">';
	$after = '</p>';
	
	return $before.do_shortcode($content).$after;
}

// [galleria] shortcode
function e404_galleria_shortcode($attr, $content = null) {
	global $post, $wp_locale;

	$disabled = get_option('e404_disable_galleria');
	if($disabled == 'true')
		return;

	wp_enqueue_script('galleria', OF_DIRECTORY.'/js/galleria.min.js', array('jquery'), '', true);
	wp_enqueue_script('galleria-classic', OF_DIRECTORY.'/js/galleria.classic.min.js', array('jquery'), '', true);

	static $instance = 0;
	$instance++;

	// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
			unset( $attr['orderby'] );
	}

	extract(shortcode_atts(array(
		'width'		=> '1170',
		'height'	=> '700',
		'bgcolor'	=> '',
		'images'	=> '',
		'thumbnails' => '',
		'image_crop' => 'true',
		'slideshow'	=> '',
		'captions' 	=> '',
		'speed'		=> 3000,
		'order'     => 'ASC',
		'orderby'   => 'menu_order ID',
		'id'        => $post->ID,
		'include'   => '',
		'exclude'   => ''
	), $attr));

	if($thumbnails == 'true' || $thumbnails == '1')
		$thumbnails = 'true';
	else
		$thumbnails = 'false';
	if($image_crop == 'true' || $image_crop == '1')
		$image_crop = 'true';
	else
		$image_crop = 'false';
	if($captions == 'true' || $captions == '1')
		$captions = 'true';
	else
		$captions = 'false';
	if($slideshow == 'true' || $slideshow == '1')
		$autoplay = (int)$speed;
	else
		$autoplay = '0';

	// gallery from post
	if(empty($images)) {
		$id = intval($id);
		if ( 'RAND' == $order )
			$orderby = 'none';
	
		if ( !empty($include) ) {
			$include = preg_replace( '/[^0-9,]+/', '', $include );
			$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	
			$attachments = array();
			foreach ( $_attachments as $key => $val ) {
				$attachments[$val->ID] = $_attachments[$key];
			}
		} elseif ( !empty($exclude) ) {
			$exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
			$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
		} else {
			$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
		}
	
		if ( empty($attachments) )
			return '';
	
		if ( is_feed() ) {
			$output = "\n";
			foreach ( $attachments as $att_id => $attachment )
				$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
			return $output;
		}
	
		$selector = 'galleria-'.$instance;
		$output = '<div id="'.$selector.'" style="width: 100%">';
	
		foreach ( $attachments as $id => $attachment ) {
			$src = wp_get_attachment_image_src($id, 'full');
			if($titles == 'false')
				$attachment->post_title = '';
			$output .= '<img src="'.e404_img_scale($src[0], $width).'" alt="'.$attachment->post_title.'" />';
		}
		$output .= '</div>';
	}
	// gallery from image URLs
	else {
		$selector = 'galleria-'.$instance;
		$output = '<div id="'.$selector.'" style="width: 100%;">';

		$images = explode("\n", $content);
		foreach($images as $image) {
			if(trim($image) != '') {
				$img_data = explode(";", trim($image));
				$output .= '<img src="'.e404_img_scale($img_data[0], $width).'"';
				if(!empty($img_data[1]) && $captions == 'true')
					$output .= ' alt="'.$img_data[1].'"';
				else
					$output .= ' alt=""';
				$output .= ' />';
			}
		}
		$output .= '</div>';
	}
	echo '<script type="text/javascript">';
	echo 'jQuery(document).ready(function() { ';
	echo 'jQuery("#'.$selector.'").galleria({ thumbnails: '.$thumbnails.', autoplay: '.$autoplay.', responsive: true, imageCrop: '.$image_crop.', height: '.(round($height / $width, 4)).' });';
	echo 'jQuery(".galleria-container").css("background", "'.$bgcolor.'");';
	if($thumbnails != 'true' && $thumbnails != '1')
		echo 'jQuery(".galleria-stage").css("bottom", "10px");';
	echo '});';
	echo '</script>'."\n";

	return $output;
}

function e404_galleria_post_shortcode($attr) {
	$attr['images'] = '';
	return e404_galleria_shortcode($attr);
}

function e404_galleria_images_shortcode($attr, $content = null) {
	$attr['images'] = 'true';
	return e404_galleria_shortcode($attr, $content);
}

// [gallery] - set link=file as default
function e404_gallery_shortcode($attr) {
	if(empty($attr['link']))
		$attr['link'] = 'file';
	return gallery_shortcode($attr);
}
remove_shortcode('gallery');
add_shortcode('gallery', 'e404_gallery_shortcode');

// [recent_posts] shortcode
function e404_recent_posts_shortcode($atts) {
	extract(shortcode_atts(array('show_thumbnails' => 'true', 'show_categories' => 'true', 'show_dates' => 'false', 'number' => 5, 'title' => __('Recent Posts', 'natural'), 'limit' => 60, 'categories' => ''), $atts));
	
	if($show_thumbnails == 'true')
		$show_dates = 'false';
	$params = array('showposts' => $number, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1);
	if(!empty($categories))
		$params = array_merge($params, array('category_name' => $categories));
	$r = new WP_Query($params);
	if ($r->have_posts()) :
		$before = '';
		if(!empty($title))
			$before .= '<h3 class="fancy-header"><span>'.$title.'</span></h3>';
		$before .= '<div class="widgets">';
		$before .= '<ul class="recent-posts">';
		$after = '</ul></div>';
		$output = '';
		while ($r->have_posts()) : $r->the_post();
			if (has_post_thumbnail() && $show_thumbnails == 'true') {
				$large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($r->post->ID), 'full');
				$img = '<img src="'.e404_img_scale($large_image_url[0], 70, 70).'" alt="'.esc_attr(get_the_title()).'" />';
			}
			else
				$img = '';
			$output .= '<li class="group">';
			if($img)
				$output .= '<div class="alignleft"><a href="'.get_permalink().'" class="recent-link" title="'.esc_attr(get_the_title() ? get_the_title() : get_the_ID()).'">'.$img.'</a></div>';
			if($show_dates == 'true') {
				$output .= '<div class="meta-date"><span class="meta-day">'.get_the_time('d').'</span><span class="meta-month">'.get_the_time('M').'</span></div>';
			}
			$output .= '<div class="posts-desc"><h4><a href="'.get_permalink().'" title="'.esc_attr(get_the_title() ? get_the_title() : get_the_ID()).'">'.get_the_title().'</a></h4>';
			if($show_categories == 'true') {
				$output .= '<div class="fancy_categories">';
				$output .= get_the_category_list(', ');
				$output .= '</div>';
			}
			$excerpt = e404_get_excerpt($r->post);
			$output .= e404_word_limiter($excerpt, $limit);
			$output .= '</div></li>';
		endwhile;
	endif;
	wp_reset_query();

	return $before.$output.$after;
}

// [popular_posts] shortcode
function e404_popular_posts_shortcode($atts) {
	extract(shortcode_atts(array('show_thumbnails' => 'true', 'show_categories' => 'true', 'show_dates' => '', 'number' => 5, 'title' => __('Popular Posts', 'natural'), 'limit' => 60, 'categories' => ''), $atts));
	
	if($show_thumbnails == 'true')
		$show_dates = 'false';
	$params = array('showposts' => $number, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'orderby' => 'comment_count');
	if(!empty($categories))
		$params = array_merge($params, array('category_name' => $categories));
	$r = new WP_Query($params);
	if ($r->have_posts()) :
		$before = '';
		if(!empty($title))
			$before .= '<h3 class="fancy-header"><span>'.$title.'</span></h3>';
		$before .= '<div class="widgets">';
		$before .= '<ul class="popular-posts">';
		$after = '</ul></div>';
		$output = '';
		while ($r->have_posts()) : $r->the_post();
			if (has_post_thumbnail() && $show_thumbnails == 'true') {
				$large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($r->post->ID), 'full');
				$img = '<img src="'.e404_img_scale($large_image_url[0], 70, 70).'" alt="'.esc_attr(get_the_title()).'" />';
			}
			else
				$img = '';
			$output .= '<li class="group">';
			if($img)
				$output .= '<div class="alignleft"><a href="'.get_permalink().'" class="popular-link" title="'.esc_attr(get_the_title() ? get_the_title() : get_the_ID()).'">'.$img.'</a></div>';
			if($show_dates == 'true') {
				$output .= '<div class="meta-date"><span class="meta-day">'.get_the_time('d').'</span><span class="meta-month">'.get_the_time('M').'</span></div>';
			}
			$output .= '<div class="posts-desc"><h4><a href="'.get_permalink().'" title="'.esc_attr(get_the_title() ? get_the_title() : get_the_ID()).'">'.get_the_title().'</a></h4>';
			if($show_categories == 'true') {
				$output .= '<div class="fancy_categories">';
				$output .= get_the_category_list(', ');
				$output .= '</div>';
			}
			$excerpt = ($r->post->post_excerpt) ? $r->post->post_excerpt : trim(strip_tags(strip_shortcodes($r->post->post_content)));
			$excerpt = str_replace("\n\r", "", $excerpt);
			$excerpt = str_replace("\n", "", $excerpt);
			$output .= e404_word_limiter($excerpt, $limit);
			$output .= '</div></li>';
		endwhile;
	endif;
	wp_reset_query();

	return $before.$output.$after;
}

function e404_get_excerpt($post, $limit = 0) {
	$excerpt = '';
	if(!is_object($post))
		return '';
	$excerpt = ($post->post_excerpt) ? $post->post_excerpt : trim(strip_tags(strip_shortcodes($post->post_content)));
	$excerpt = preg_replace('|\[(.+?)\](.+?\[/\\1\])?|s', '', $excerpt);
	$excerpt = str_replace("\n\r", "", $excerpt);
	$excerpt = str_replace("\n", "", $excerpt);
	if($limit > 0)
		$excerpt = e404_word_limiter($excerpt, $limit);
	return $excerpt;
}

function e404_excerpt($limit = 80) {
	return e404_word_limiter(get_the_excerpt(), $limit);
}

// [tweets] shortcode
function e404_tweets_shortcode($atts) {
	extract(shortcode_atts(array('number' => 5, 'title' => __('Last Tweets', 'natural'), 'time' => '', 'username' => '', 'replies' => 'false'), $atts));
	if(empty($username))
		$username = get_option('e404_twitter');
	if(empty($username))
		return;
	if($replies == 'true')
		$replies = true;
	else
		$replies = false;
	$tweets = e404_get_tweets($username, $number, $replies);
	$before = '<div class="widgets">';
	if(!empty($title))
		$before .= '<h3>'.$title.'</h3>';
	$before .= '<ul class="tweets">';
	$after = '</ul></div>';
	$output = '';
	foreach($tweets as $tweet) {
		$output .= '<li>';
        $output .= $tweet['text'];
        if($time == 'true' || $time == '1')
            $output .= ' <span>'.$tweet['time'].'</span>';
		$output .= '</li>';
	}
	$output = twitter_hyperlinks($output);
	$output = twitter_users($output);
	
	return $before.$output.$after;
}

// [tweet] shortcode
function e404_tweet_shortcode($atts) {
	extract(shortcode_atts(array('username' => '', 'replies' => 'false', 'wide' => 'false'), $atts));
	if(empty($username))
		$username = get_option('e404_twitter');
	if(empty($username))
		return;
	if($replies == 'true')
		$replies = true;
	else
		$replies = false;
	if($wide == 'true' || $wide == '1')
		$class = ' full-box';
	else
		$class = '';
	$tweets = e404_get_tweets($username, 1, $replies);
	$tweet = $tweets[0]['text'].' <a href="http://twitter.com/'.$username.'/statuses/'.$tweets[0]['id'].'">'.$tweets[0]['time'].'</a>';
	$output = '<div class="twitter-box fancy-box'.$class.'"><p>'.$tweet.'</p></div>';

	$output = twitter_hyperlinks($output);
	$output = twitter_users($output);
	
	return $output;
}

// [youtube] shortcode
function e404_youtube_shortcode($atts) {
	extract(shortcode_atts(array('id' => '', 'height' => '420', 'width' => '770'), $atts));
	if(empty($id))
		return;
	return '<div class="fvideo"><iframe width="'.$width.'" height="'.$height.'" src="http://www.youtube.com/embed/'.$id.'?rel=0&wmode=opaque" frameborder="0"></iframe></div>';
}

// [vimeo] shortcode
function e404_vimeo_shortcode($atts) {
	extract(shortcode_atts(array('id' => '', 'height' => '420', 'width' => '770'), $atts));
	if(empty($id))
		return;
	return '<div class="fvideo"><iframe width="'.$width.'" height="'.$height.'" src="http://player.vimeo.com/video/'.$id.'" frameborder="0"></iframe></div>';
}

// [dailymotion] shortcode
function e404_dailymotion_shortcode($atts) {
	extract(shortcode_atts(array('id' => '', 'height' => '420', 'width' => '770'), $atts));
	if(empty($id))
		return;
	return '<div class="fvideo"><iframe width="'.$width.'" height="'.$height.'" src="http://www.dailymotion.com/embed/video/'.$id.'?theme=none&hideInfos=1" frameborder="0"></iframe></div>';
}
/*
if(get_option('e404_disable_media_shortcodes') != 'true') {
	add_shortcode('youtube', 'e404_youtube_shortcode');
	add_shortcode('vimeo', 'e404_vimeo_shortcode');
	add_shortcode('dailymotion', 'e404_dailymotion_shortcode');
}
*/

// [video] shortcode
function e404_video_shortcode($atts) {
	extract(shortcode_atts(array('title' => '', 'poster' => '', 'height' => '420', 'width' => '770', 'source' => '', 'controls' => 'true'), $atts));

	wp_enqueue_script('flowplayer', OF_DIRECTORY.'/js/flowplayer.min.js', array('jquery'), '', true);

	static $instance = 0;
	$instance++;

	$output = '<a class="flowplayer-container" id="flowplayer_'.$instance.'" href="'.$source.'" style="display: block; width: '.$width.'px; height: '.$height.'px;">';
	if(!empty($poster))
		$output .= '<img src="'.$poster.'" alt="'.$title.'" />';
	$output .= '</a>';
	$output .= "\n";

	echo '<script type="text/javascript">
	jQuery(document).ready(function() {
		flowplayer("flowplayer_'.$instance.'", { src: "'.OF_DIRECTORY.'/lib/flowplayer.swf", wmode: "transparent" }, {';
	if($controls == 'false')
		echo ' plugins: { controls: null },';
	echo ' clip: { autoPlay: false }, onLoad: function(){ jQuery("body").fitVids({customSelector: "a.flowplayer-container"}); jQuery("#flowplayer_'.$instance.'").css("height", ""); } });
	});
	</script>'."\n";
	
	return $output;
}

// [map] shortcode
function e404_map_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('height' => '400', 'max_height' => '', 'width' => '1170'), $atts));
	
	if(!empty($max_height)) {
		$height = $max_height;
		$max_height = ' style="max-height: '.$max_height.'px;"';
	}
	$before = '<iframe class="fluid-gmap"'.$max_height.' width="'.$width.'" height="'.$height.'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="';
	$after = '&amp;output=embed"></iframe>';
	
	$after .= '<script type="text/javascript">
	jQuery(document).ready(function() { jQuery("body").fitVids({customSelector: ".fluid-gmap"}); jQuery(".fluid-gmap").css("height", ""); });
	</script>';

	return $before.$content.$after;
}

// [recent_works_images_full] shortcode
function e404_recent_works_images_full_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('title' => __('Recent Works', 'natural'), 'more_url' => '', 'more_text' => __('view all', 'natural'), 'description' => '', 'show_categories' => 'true', 'height' => 200), $atts));
	
	global $e404_all_options;

	$output = '<h2 class="fancy-header"><span>'.$title.'</span></h2>';
	$output .= '<div class="fancy_list_wrapper">';

	$query = array('post_type' => 'portfolio', 'orderby' => 'menu_order date', 'numberposts' => 3);
	$works = get_posts($query);
	$i = 0;
	foreach($works as $work) {
		$i++;
		$preview_url = e404_get_portfolio_preview_url($work->ID);
		$large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($work->ID), 'full');
		if(!$large_image_url)
			$large_image_url[0] = OF_DIRECTORY.'/images/blank152.png';
		$image = $large_image_url[0];
		if($i == 3)
			$last = ' last';
		else
			$last = '';
		$output .= '<div class="one_third'.$last.' fancy_list_item"><div class="fancy_image">';
		$output .= '<a href="'.get_permalink($work->ID).'"><img src="'.e404_img_scale($image, 370, $height).'"';
		$output .= ' alt="'.esc_attr(get_the_title($work->ID)).'" /></a>';
		
		$output .= '<div class="fancy_meta"><ul>';
		$output .= '<li><a href="'.get_permalink($work->ID).'" class="tiptip fancy_icon fancy_details" title="'.__('More details', 'natural').'"><span></span></a></li>';
		$output .= '<li><a href="'.$preview_url.'" rel="prettyphoto" class="tiptip fancy_icon fancy_preview" title="'.__('Preview', 'natural').'"><span></span></a></li>';
		if($e404_all_options['e404_portfolio_like_this'] == 'true') {
			$like_class = e404_liked($work->ID) ? 'fancy_likes_you_like' : 'fancy_likes';
			$output .= '<li><a href="#" class="tiptip fancy_icon like_this '.$like_class.'" id="like-'.$work->ID.'" title="'.e404_likes_text(e404_like_this($work->ID), false).'"><span></span></a></li>';
		}
		$output .= '</ul></div></div>';
		if(!empty($work->post_title))
			$output .= '<h3><a href="'.get_permalink($work->ID).'">'.esc_html(get_the_title($work->ID)).'</a></h3>';
		if($show_categories == 'true') {
			$output .= '<div class="fancy_categories">';
			$output .= get_the_term_list($work->ID, 'portfolio-category', '', ', ');
			$output .= '</div>';
		}
		$output .= '</div>';
	}
	$output .= '<br class="clear" /></div>';

	return $output;
}

// [recent_posts_images_full] shortcode
function e404_recent_posts_images_full_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('title' => __('Recent Posts', 'natural'), 'more_url' => '', 'more_text' => __('view all', 'natural'), 'categories' => '', 'description' => '', 'height' => 200), $atts));
	
	global $e404_all_options;
	$output = '<h2 class="fancy-header"><span>'.$title.'</span></h2>';
	$output .= '<div class="fancy_list_wrapper">';

	$query = array('orderby' => 'menu_order date', 'numberposts' => 3);
	if(!empty($categories))
		$query = array_merge($query, array('category_name' => $categories));
	$posts = get_posts($query);
	$i = 0;
	foreach($posts as $post) {
		$i++;
		$large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
		if(!$large_image_url)
			$large_image_url[0] = OF_DIRECTORY.'/images/blank152.png';
		$image = $large_image_url[0];
		if($i == 3)
			$last = ' last';
		else
			$last = '';
		$output .= '<div class="one_third'.$last.' fancy_list_item"><div class="fancy_image">';
		$output .= '<a href="'.get_permalink($post->ID).'"><img src="'.e404_img_scale($image, 370, $height).'"';
		$output .= ' alt="'.esc_attr(get_the_title($post->ID)).'" /></a>';
		
		$output .= '<div class="fancy_meta"><ul>';
		$output .= '<li><a href="'.get_permalink($post->ID).'" class="tiptip fancy_icon fancy_details" title="'.__('More details', 'natural').'"><span></span></a></li>';
		$comments_number = get_comments_number($post->ID);
		if($comments_number == 0)
			$comments_number_txt = __('No comments', 'natural');
		elseif($comments_number == 1)
			$comments_number_txt = __('1 comment', 'natural');
		else
			$comments_number_txt = sprintf(__('%d comments'), $comments_number);
		if(comments_open($post->ID))
			$output .= '<li><a href="'.get_comments_link($post->ID).'" class="tiptip fancy_icon fancy_comments" title="'.$comments_number_txt.'"><span></span></a></li>';
		if($e404_all_options['e404_blog_like_this'] == 'true') {
			$like_class = e404_liked($post->ID) ? 'fancy_likes_you_like' : 'fancy_likes';
			$output .= '<li><a href="#" class="tiptip fancy_icon like_this '.$like_class.'" id="like-'.$post->ID.'" title="'.e404_likes_text(e404_like_this($post->ID), false).'"><span></span></a></li>';
		}
		$output .= '</ul></div></div>';
		if(!empty($post->post_title))
			$output .= '<h3><a href="'.get_permalink($post->ID).'">'.esc_html(get_the_title($post->ID)).'</a></h3>';
		
		$output .= '<div class="fancy_date">'.get_the_time(get_option('date_format'), $post).'</div>';
		$output .= '</div>';
	}
	$output .= '<br class="clear" /></div>';

	return $output;
}

// [recent_posts_images] shortcode
function e404_recent_posts_images_shortcode($atts) {
	extract(shortcode_atts(array('number' => 2, 'more_url' => '', 'more_text' => __('Read more', 'natural'), 'categories' => '', 'show_categories' => 'true'), $atts));
	
	$output = '<ul class="post-list">';
	
	$query = array('orderby' => 'menu_order date', 'numberposts' => $number);
	if(!empty($categories))
		$query = array_merge($query, array('category_name' => $categories));
	$posts = get_posts($query);
	foreach($posts as $post) {
		$large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
		if(!$large_image_url)
			$large_image_url[0] = OF_DIRECTORY.'/images/blank152.png';
		$output .= '<li class="group"><div class="alignleft">
		<a href="'.get_permalink($post->ID).'" title="'.esc_attr(get_the_title($post->ID)).'"><img src="'.e404_img_scale($large_image_url[0], 120, 120).'" alt="'.get_the_title($post->ID).'" title="'.get_the_title($post->ID).'" /></a></div>
		<div class="post-list-info">
			<h4><a href="'.get_permalink($post->ID).'" title="'.esc_attr(get_the_title($post->ID)).'">'.get_the_title($post->ID).'</a></h4>';
		if($show_categories == 'true') {
			$output .= '<div class="fancy_categories">';
			$output .= get_the_category_list(', ', '', $post->ID);
			$output .= '</div>';
		}
		$output .= '<div class="more"><a href="'.get_permalink($post->ID).'" class="details-link"><span>'.$more_text.'</span></a><a href="'.get_comments_link($post->ID).'" class="comments-link"><span>'.$post->comment_count.'</span></a></div></div></li>';
	}
	
	$output .= '</ul>';

	return do_shortcode($output);
}

// [popular_posts_images] shortcode
function e404_popular_posts_images_shortcode($atts) {
	extract(shortcode_atts(array('number' => 2, 'more_url' => '', 'more_text' => __('Read more', 'natural'), 'categories' => '', 'show_categories' => 'true'), $atts));
	
	$output = '<ul class="post-list">';
	
	$query = array('orderby' => 'comment_count', 'numberposts' => $number);
	if(!empty($categories))
		$query = array_merge($query, array('category_name' => $categories));
	$posts = get_posts($query);
	foreach($posts as $post) {
		$large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
		if(!$large_image_url)
			$large_image_url[0] = OF_DIRECTORY.'/images/blank152.png';
		$output .= '<li class="group"><div class="alignleft">
		<a href="'.get_permalink($post->ID).'" title="'.esc_attr(get_the_title($post->ID)).'"><img src="'.e404_img_scale($large_image_url[0], 120, 120).'" alt="'.get_the_title($post->ID).'" title="'.get_the_title($post->ID).'" /></a></div>
		<div class="post-list-info">
			<h4><a href="'.get_permalink($post->ID).'" title="'.esc_attr(get_the_title($post->ID)).'">'.get_the_title($post->ID).'</a></h4>';
		if($show_categories == 'true') {
			$output .= '<div class="fancy_categories">';
			$output .= get_the_category_list(', ', '', $post->ID);
			$output .= '</div>';
		}
		$output .= '<div class="more"><a href="'.get_permalink($post->ID).'" class="details-link"><span>'.$more_text.'</span></a><a href="'.get_comments_link($post->ID).'" class="comments-link"><span>'.$post->comment_count.'</span></a></div></div></li>';
	}
	
	$output .= '</ul>';

	return do_shortcode($output);
}

// [recent_comments] shortcode
function e404_recent_comments_shortcode($atts) {
	extract(shortcode_atts(array('number' => 3), $atts));
	
	$output = '<ul class="latest-comments">';
	
	$query = array('status' => 'approve', 'number' => $number);
	$comments = get_comments($query);
	foreach($comments as $comment) {
		$output .= '<li><div><p><span>'.$comment->comment_author.'</span>'.__(' on:', 'natural').'</p>
		<p><a href="'.get_permalink($comment->comment_post_ID).'">'.get_the_title($comment->comment_post_ID).'</a></p></div></li>';
	}
	
	$output .= '</ul>';

	return do_shortcode($output);
}

// [scrollable] shortcode
function e404_scrollable_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('title' => '', 'items' => 5, 'height' => '', 'pagination' => 'false'), $atts));
	
	wp_enqueue_script('caroufredsel', OF_DIRECTORY.'/js/jquery.caroufredsel.min.js', array('jquery'), '', true);
	wp_enqueue_script('touchwipe', OF_DIRECTORY.'/js/jquery.touchwipe.min.js', array('caroufredsel'), '', true);
	
	global $column_sizes;

	if($items < 2 || $items > 6)
		$items = 5;
	$images = $items;
	$sizes = array(2 => 'large', 3 => 'medium', 4 => 'small', 5 => 'vsmall', 6 => 'tiny');
	$widths = array(2 => 570, 3 => 370, 4 => 270, 5 => 210, 6 => 170);
	$heights = array(2 => 300, 3 => 200, 4 => 150, 5 => 120, 6 => 100);
	if(empty($height))
		$height = $heights[$images];
	
	static $instance = 0;
	$instance++;
	$selector = 'scrollable_'.$instance;

	$output = '<div class="scroller group">';
	$output .= '<div class="fancy-header-wrapper">';
	if(!empty($title))
		$output .= '<h2 class="fancy-header"><span>'.$title.'</span></h2>';
	$output .= '<div class="scroller_btns"><a id="sprev_'.$instance.'" class="prev browse arrowleft"><span>prev</span></a> <a id="snext_'.$instance.'" class="next browse arrowright"><span>next</span></a></div></div>';
	$output .= '<div class="list-carousel" style="min-height: '.$height.'px;"><ul id="'.$selector.'" style="display: none;">';

	$i = 0;
	$content = str_replace("\r", "", $content);
	$images_list = explode("\n", $content);
	foreach($images_list as $image) {
		if(trim($image) != '') {
			$i++;
			$img_data = explode(";", trim($image));
			if(!empty($img_data[2])) {
				$url = $img_data[2];
				$rel = '';
				$zoom = '';
			}
			else {
				$url = $img_data[0];
				$rel = ' rel="prettyphoto[scrl'.$instance.']"';
				$zoom = ' class="zoom"';
			}
			$output .= '<li class="'.$column_sizes[$images].'"><a href="'.$url.'"'.$rel.$zoom.'><img src="'.e404_img_scale($img_data[0], $widths[$images], $height).'"';
			if(!empty($img_data[1]))
				$output .= ' title="'.$img_data[1].'" alt="'.$img_data[1].'"';
			else
				$output .= ' alt=""';
			$output .= ' /></a></li>';
		}
	}
	$output .= '</ul></div><br class="clear" />';
	
	if($pagination == 'true')
		$output .= '<div id="'.$selector.'_pagination" class="scrollable-pagination"></div>';
		
	$output .= '</div>';

	echo '<script type="text/javascript">';
	echo 'jQuery(window).load(function() { jQuery("#'.$selector.'").show(); jQuery(".list-carousel").css("min-height", 0).css("background", "none"); jQuery("#'.$selector.'").carouFredSel({next: "#snext_'.$instance.'", prev: "#sprev_'.$instance.'", '.e404_scrollable_params($atts, $selector, $widths[$images]).'}); })';
	echo '</script>'."\n";
	
	return $output;
}

// [recent_works_images_scrollable] shortcode
function e404_recent_works_images_scrollable_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('title' => __('Recent Works', 'natural'), 'more_url' => '', 'more_text' => __('view all', 'natural'), 'works' => 8, 'items' => 4, 'height' => '', 'scroll' => 1, 'auto' => 'false'), $atts));

	wp_enqueue_script('caroufredsel', OF_DIRECTORY.'/js/jquery.caroufredsel.min.js', array('jquery'), '', true);
	wp_enqueue_script('touchwipe', OF_DIRECTORY.'/js/jquery.touchwipe.min.js', array('caroufredsel'), '', true);
	
	global $e404_all_options, $column_sizes;

	if($items < 1 || $items > 4)
		$items = 4;
	$sizes = array(1 => 'full', 2 => 'large', 3 => 'medium', 4 => 'small', 5 => 'vsmall');
	$widths = array(1 => 1170, 2 => 570, 3 => 370, 4 => 270, 5 => 210);
	$heights = array(1 => 400, 2 => 300, 3 => 200, 4 => 150, 5 => 120);
	if(empty($height))
		$height = $heights[$items];
	
	static $instance = 0;
	$instance++;
	$selector = 'scrollable_works_'.$instance;

	if(!empty($description))
		$description = '<p>'.$description.'</p>';
	$output = '<div class="fancy-header-wrapper"><h2 class="fancy-header"><span>'.$title.'</span></h2>';
	$output .= '<div class="scroller_btns"><span class="view-all"><a href="'.$more_url.'">'.$more_text.'</a></span> <a id="wprev_'.$instance.'" class="prev browse arrowleft"><span>prev</span></a> <a id="wnext_'.$instance.'" class="next browse arrowright"><span>next</span></a></div></div>';
	$output .= '<div class="list-carousel group" style="min-height: '.$height.'px;"><ul id="'.$selector.'" style="display: none;">';

	$query = array('post_type' => 'portfolio', 'orderby' => 'menu_order date', 'numberposts' => $works);
	$works = get_posts($query);
	$i = 0;
	foreach($works as $work) {
		$i++;
		$preview_url = e404_get_portfolio_preview_url($work->ID);
		$large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($work->ID), 'full');
		if(!$large_image_url)
			$large_image_url[0] = OF_DIRECTORY.'/images/blank152.png';
		$image = $large_image_url[0];
		$output .= '<li class="'.$column_sizes[$items].' fancy_list_item"><div class="fancy_image">';
		$output .= '<a href="'.get_permalink($work->ID).'"><img src="'.e404_img_scale($image, $widths[$items], $height).'"';
		if(!empty($work->post_title))
			$output .= ' title="'.esc_attr(get_the_title($work->ID)).'" alt="'.esc_attr(get_the_title($work->ID)).'"';
		else
			$output .= ' alt="'.esc_attr(get_the_title($work->ID)).'"';
		$output .= ' /></a>';
		
		$output .= '<div class="fancy_meta"><ul>';
		$output .= '<li><a href="'.get_permalink($work->ID).'" class="tiptip fancy_icon fancy_details" title="'.__('More details', 'natural').'"><span></span></a></li>';
		$output .= '<li><a href="'.$preview_url.'" rel="prettyphoto" class="tiptip fancy_icon fancy_preview" title="'.__('Preview', 'natural').'"><span></span></a></li>';
		if($e404_all_options['e404_portfolio_like_this'] == 'true') {
			$like_class = e404_liked($work->ID) ? 'fancy_likes_you_like' : 'fancy_likes';
			$output .= '<li><a href="#" class="tiptip fancy_icon like_this '.$like_class.'" id="like-'.$work->ID.'" title="'.e404_likes_text(e404_like_this($work->ID), false).'"><span></span></a></li>';
		}
		$output .= '</ul></div></div><h3><a href="'.get_permalink($work->ID).'">'.esc_html(get_the_title($work->ID)).'</a></h3></li>';
	}
	$output .= '</ul><br class="clear" /></div>';

	echo '<script type="text/javascript">';
	echo 'jQuery(window).load(function() { jQuery("#'.$selector.'").show(); jQuery(".list-carousel").css("min-height", 0).css("background", "none"); jQuery("#'.$selector.'").carouFredSel({next: "#wnext_'.$instance.'", prev: "#wprev_'.$instance.'", '.e404_scrollable_params($atts, $selector, $widths[$items]).'}); })';
	echo '</script>'."\n";
	
	return $output;
}

// [recent_posts_images_scrollable] shortcode
function e404_recent_posts_images_scrollable_shortcode($atts, $content = null) {
	extract(shortcode_atts(array('title' => __('Recent Posts', 'natural'), 'more_url' => '', 'more_text' => __('view all', 'natural'), 'categories' => '', 'posts' => 8, 'items' => 4, 'height' => '', 'scroll' => 1, 'auto' => 'false'), $atts));

	wp_enqueue_script('caroufredsel', OF_DIRECTORY.'/js/jquery.caroufredsel.min.js', array('jquery'), '', true);
	wp_enqueue_script('touchwipe', OF_DIRECTORY.'/js/jquery.touchwipe.min.js', array('caroufredsel'), '', true);
	
	global $e404_all_options, $column_sizes;

	if($items < 1 || $items > 4)
		$items = 4;
	$sizes = array(1 => 'full', 2 => 'large', 3 => 'medium', 4 => 'small', 5 => 'vsmall');
	$widths = array(1 => 1170, 2 => 570, 3 => 370, 4 => 270, 5 => 210);
	$heights = array(1 => 400, 2 => 300, 3 => 200, 4 => 150, 5 => 120);
	if(empty($height))
		$height = $heights[$items];

	static $instance = 0;
	$instance++;
	$selector = 'scrollable_posts_'.$instance;

	if(!empty($description))
		$description = '<p>'.$description.'</p>';
	$output = '<div class="fancy-header-wrapper"><h2 class="fancy-header"><span>'.$title.'</span></h2>';
	$output .= '<div class="scroller_btns"><span class="view-all"><a href="'.$more_url.'">'.$more_text.'</a></span> <a id="pprev_'.$instance.'" class="prev browse arrowleft"><span>prev</span></a> <a id="pnext_'.$instance.'" class="next browse arrowright"><span>next</span></a></div></div>';
	$output .= '<div class="list-carousel group" style="min-height: '.$height.'px;"><ul id="'.$selector.'" style="display: none;">';

	$query = array('orderby' => 'menu_order date', 'numberposts' => $posts);
	if(!empty($categories))
		$query = array_merge($query, array('category_name' => $categories));
	$posts = get_posts($query);
	$i = 0;
	foreach($posts as $post) {
		$i++;
		$large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
		if(!$large_image_url)
			$large_image_url[0] = OF_DIRECTORY.'/images/blank152.png';
		$image = $large_image_url[0];
		$output .= '<li class="'.$column_sizes[$items].' fancy_list_item"><div class="fancy_image">';
		$output .= '<a href="'.get_permalink($post->ID).'"><img src="'.e404_img_scale($image, $widths[$items], $height).'"';
		if(!empty($post->post_title))
			$output .= ' title="'.esc_attr(get_the_title($post->ID)).'" alt="'.esc_attr(get_the_title($post->ID)).'"';
		else
			$output .= ' alt="'.esc_attr(get_the_title($post->ID)).'"';
		$output .= ' /></a>';
		
		$output .= '<div class="fancy_meta"><ul>';
		$output .= '<li><a href="'.get_permalink($post->ID).'" class="tiptip fancy_icon fancy_details" title="'.__('More details', 'natural').'"><span></span></a></li>';
		$comments_number = get_comments_number($post->ID);
		if($comments_number == 0)
			$comments_number_txt = __('No comments', 'natural');
		elseif($comments_number == 1)
			$comments_number_txt = __('1 comment', 'natural');
		else
			$comments_number_txt = sprintf(__('%d comments'), $comments_number);
		if(comments_open($post->ID))
			$output .= '<li><a href="'.get_comments_link($post->ID).'" class="tiptip fancy_icon fancy_comments" title="'.$comments_number_txt.'"><span></span></a></li>';
		if($e404_all_options['e404_blog_like_this'] == 'true') {
			$like_class = e404_liked($post->ID) ? 'fancy_likes_you_like' : 'fancy_likes';
			$output .= '<li><a href="#" class="tiptip fancy_icon like_this '.$like_class.'" id="like-'.$post->ID.'" title="'.e404_likes_text(e404_like_this($post->ID), false).'"><span></span></a></li>';
		}
		$output .= '</ul></div></div><h3><a href="'.get_permalink($post->ID).'">'.esc_html(get_the_title($post->ID)).'</a></h3>';
		$output .= '<div class="fancy_date">'.get_the_time(get_option('date_format'), $post).'</div></li>';
	}
	$output .= '</ul><br class="clear" /></div>';

	echo '<script type="text/javascript">';
	echo 'jQuery(window).load(function() { jQuery("#'.$selector.'").show(); jQuery(".list-carousel").css("min-height", 0).css("background", "none"); jQuery("#'.$selector.'").carouFredSel({next: "#pnext_'.$instance.'", prev: "#pprev_'.$instance.'", '.e404_scrollable_params($atts, $selector, $widths[$items]).'}); })';
	echo '</script>'."\n";
	
	return $output;
}

function e404_scrollable_params($atts, $container, $item_width) {
	extract(shortcode_atts(array('scroll' => 1, 'scroll_fx' => 'scroll', 'scroll_easing' => 'swing', 'scroll_duration' => 500, 'auto' => 'false', 'pause' => 2500, 'pause_on_hover' => 'false', 'infinite' => 'false', 'pagination' => '', 'items' => 5), $atts));
	
	$output =  'responsive: true, debug: false,
				items: { visible: { min: 1, max: '.$items.' }, width: '.$item_width.' },
				scroll: { wipe: true, items: '.$scroll.', fx: "'.$scroll_fx.'", easing: "'.$scroll_easing.'", duration: '.$scroll_duration.', pauseOnHover: '.$pause_on_hover.' },
				auto: { play: '.$auto.', pauseDuration: '.$pause.' },
				infinite: '.$infinite.',
				circular: false,';
	if($pagination == 'true')
		$output .=  'pagination: { container: "#'.$container.'_pagination" }';
	return str_replace("\n", "", $output);
}

// custom colors style
function e404_custom_colors_style($bgcolor = '', $color = '', $bordercolor = '', $hidden = false, $width = '') {
	$output = '';
	if(!(empty($bgcolor) && empty($color) && empty($bordercolor) && !$hidden)) {
		$output .= ' style="';
		if(!empty($bgcolor)) {
			$output .= 'background-color: '.$bgcolor.'; ';
		}
		if(!empty($color)) {
			$output .= 'color: '.$color.'; ';
		}
		if(!empty($bordercolor)) {
			$output .= 'border-color: '.$bordercolor.'; ';
		}
		if(!empty($width)) {
			$output .= 'width: '.$width.'; ';
		}
		if($hidden)
			$output .= 'display: none; ';
		$output = substr($output, 0, strlen($output) - 1);
		$output .= '"';
	}
	return $output;	
}

// get style number
function e404_get_style_number($style, &$styles) {
	if(array_key_exists($style, $styles))
		return $styles[$style];
	else
		return '1';
}

e404_register_theme_shortcodes();

// Register theme shortcodes
function e404_register_theme_shortcodes() {
	add_shortcode('code', 'e404_code_shortcode');
	add_shortcode('full_page', 'e404_full_page_shortcode');
	add_shortcode('one_half', 'e404_one_half_shortcode');
	add_shortcode('one_half_last', 'e404_one_half_last_shortcode');
	add_shortcode('one_third', 'e404_one_third_shortcode');
	add_shortcode('one_third_last', 'e404_one_third_last_shortcode');
	add_shortcode('two_third', 'e404_two_third_shortcode');
	add_shortcode('two_third_last', 'e404_two_third_last_shortcode');
	add_shortcode('one_fourth', 'e404_one_fourth_shortcode');
	add_shortcode('one_fourth_last', 'e404_one_fourth_last_shortcode');
	add_shortcode('three_fourth', 'e404_three_fourth_shortcode');
	add_shortcode('three_fourth_last', 'e404_three_fourth_last_shortcode');
	add_shortcode('one_fifth', 'e404_one_fifth_shortcode');
	add_shortcode('one_fifth_last', 'e404_one_fifth_last_shortcode');
	add_shortcode('two_fifth', 'e404_two_fifth_shortcode');
	add_shortcode('two_fifth_last', 'e404_two_fifth_last_shortcode');
	add_shortcode('three_fifth', 'e404_three_fifth_shortcode');
	add_shortcode('three_fifth_last', 'e404_three_fifth_last_shortcode');
	add_shortcode('four_fifth', 'e404_four_fifth_shortcode');
	add_shortcode('four_fifth_last', 'e404_four_fifth_last_shortcode');
	add_shortcode('one_sixth', 'e404_one_sixth_shortcode');
	add_shortcode('one_sixth_last', 'e404_one_sixth_last_shortcode');
	add_shortcode('five_sixth', 'e404_five_sixth_shortcode');
	add_shortcode('five_sixth_last', 'e404_five_sixth_last_shortcode');
	add_shortcode('one_eighth', 'e404_one_eighth_shortcode');
	add_shortcode('one_eighth_last', 'e404_one_eighth_last_shortcode');
	add_shortcode('three_eighth', 'e404_three_eighth_shortcode');
	add_shortcode('three_eighth_last', 'e404_three_eighth_last_shortcode');
	add_shortcode('five_eighth', 'e404_five_eighth_shortcode');
	add_shortcode('five_eighth_last', 'e404_five_eighth_last_shortcode');
	add_shortcode('seven_eighth', 'e404_seven_eighth_shortcode');
	add_shortcode('seven_eighth_last', 'e404_seven_eighth_last_shortcode');
	add_shortcode('fancy_box', 'e404_fancy_box_shortcode');
	add_shortcode('blockquote', 'e404_blockquote_shortcode');
	add_shortcode('highlight1', 'e404_highlight1_shortcode');
	add_shortcode('highlight2', 'e404_highlight2_shortcode');
	add_shortcode('tip', 'e404_tip_shortcode');
	add_shortcode('icon_button', 'e404_icon_button_shortcode');
	add_shortcode('icon_box', 'e404_icon_box_shortcode');
	add_shortcode('testimonial', 'e404_testimonial_shortcode');
	add_shortcode('person', 'e404_person_shortcode');
	add_shortcode('line_dotted', 'e404_line_dotted_shortcode');
	add_shortcode('line_top', 'e404_line_top_shortcode');
	add_shortcode('line', 'e404_line_shortcode');
	add_shortcode('clear', 'e404_clear_shortcode');
	add_shortcode('h1', 'e404_h1_shortcode');
	add_shortcode('h2', 'e404_h2_shortcode');
	add_shortcode('h3', 'e404_h3_shortcode');
	add_shortcode('h4', 'e404_h4_shortcode');
	add_shortcode('h5', 'e404_h5_shortcode');
	add_shortcode('h6', 'e404_h6_shortcode');
	add_shortcode('b', 'e404_b_shortcode');
	add_shortcode('i', 'e404_i_shortcode');
	add_shortcode('dropcap', 'e404_dropcap_shortcode');
	add_shortcode('button', 'e404_button_shortcode');
	add_shortcode('list', 'e404_list_shortcode');
	add_shortcode('span', 'e404_span_shortcode');
	add_shortcode('link', 'e404_link_shortcode');
	add_shortcode('li', 'e404_li_shortcode');
	add_shortcode('message', 'e404_message_shortcode');
	add_shortcode('image', 'e404_image_shortcode');
	add_shortcode('lightbox', 'e404_lightbox_shortcode');
	add_shortcode('accordions', 'e404_accordions_shortcode');
	add_shortcode('accordion', 'e404_accordion_shortcode');
	add_shortcode('toggle', 'e404_toggle_shortcode');
	add_shortcode('box', 'e404_box_shortcode');
	add_shortcode('tabs', 'e404_tabs_shortcode');
	add_shortcode('tab', 'e404_tab_shortcode');
	add_shortcode('table', 'e404_table_shortcode');
	add_shortcode('thead', 'e404_table_header_shortcode');
	add_shortcode('tbody', 'e404_table_body_shortcode');
	add_shortcode('tr', 'e404_table_tr_shortcode');
	add_shortcode('td', 'e404_table_td_shortcode');
	add_shortcode('th', 'e404_table_th_shortcode');
	add_shortcode('pricebox', 'e404_pricebox_shortcode');
	add_shortcode('pricebox_price', 'e404_pricebox_price_shortcode');
	add_shortcode('pricebox_body', 'e404_pricebox_body_shortcode');
	add_shortcode('pricebox_footer', 'e404_pricebox_footer_shortcode');
	add_shortcode('galleria', 'e404_galleria_post_shortcode');
	add_shortcode('galleria_images', 'e404_galleria_images_shortcode');
	add_shortcode('recent_posts', 'e404_recent_posts_shortcode');
	add_shortcode('popular_posts', 'e404_popular_posts_shortcode');
	add_shortcode('tweets', 'e404_tweets_shortcode');
	add_shortcode('tweet', 'e404_tweet_shortcode');
	if(get_option('e404_disable_media_shortcodes') != 'true') {
		add_shortcode('youtube', 'e404_youtube_shortcode');
		add_shortcode('vimeo', 'e404_vimeo_shortcode');
		add_shortcode('dailymotion', 'e404_dailymotion_shortcode');
	}
	add_shortcode('video', 'e404_video_shortcode');
	add_shortcode('map', 'e404_map_shortcode');
	add_shortcode('recent_works_images_full', 'e404_recent_works_images_full_shortcode');
	add_shortcode('recent_posts_images_full', 'e404_recent_posts_images_full_shortcode');
	add_shortcode('recent_posts_images', 'e404_recent_posts_images_shortcode');
	add_shortcode('popular_posts_images', 'e404_popular_posts_images_shortcode');
	add_shortcode('recent_comments', 'e404_recent_comments_shortcode');
	add_shortcode('scrollable', 'e404_scrollable_shortcode');
	add_shortcode('recent_works_images_scrollable', 'e404_recent_works_images_scrollable_shortcode');
	add_shortcode('recent_posts_images_scrollable', 'e404_recent_posts_images_scrollable_shortcode');

	add_shortcode('flexslider', 'e404_flexslider_shortcode');
	add_shortcode('flexslider_images', 'e404_flexslider_images_shortcode');
	add_shortcode('flexslider_gallery', 'e404_flexslider_gallery_shortcode');
	add_shortcode('eislideshow', 'e404_eislideshow_shortcode');
	add_shortcode('eislideshow_images', 'e404_eislideshow_images_shortcode');
	add_shortcode('eislideshow_gallery', 'e404_eislideshow_gallery_shortcode');
	add_shortcode('responsiveslides', 'e404_responsiveslides_shortcode');
	add_shortcode('responsiveslides_images', 'e404_responsiveslides_images_shortcode');
	add_shortcode('responsiveslides_gallery', 'e404_responsiveslides_gallery_shortcode');
}

// source: http://www.viper007bond.com/2009/11/22/wordpress-code-earlier-shortcodes/
function e404_run_shortcodes($content) {
    global $shortcode_tags;
    
    // Backup current registered shortcodes and clear them all out
    $orig_shortcode_tags = $shortcode_tags;
    remove_all_shortcodes();
    
	e404_register_theme_shortcodes();
	
    // Do the shortcode (only the one above is registered)
    $content = do_shortcode($content);
	$content = str_replace('<br class="clear" />', '<div class="clear"></div>', $content);
    
    // Put the original shortcodes back
    $shortcode_tags = $orig_shortcode_tags;
    
    return $content;
}
add_filter('the_content', 'e404_run_shortcodes', 7);

// source: http://wordpress.stackexchange.com/questions/27395/
function e404_clean_shortcode_content($content) {
    $content = trim(wpautop(do_shortcode($content)));
    if(substr($content, 0, 4) == '')
        $content = substr($content, 4);
    if (substr($content, -3, 3) == '<p>')
        $content = substr($content, 0, -3);
    $content = str_replace(array('</p><p></p>'), '', $content);
    return $content;
}

?>