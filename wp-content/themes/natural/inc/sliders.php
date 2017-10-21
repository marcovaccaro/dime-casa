<?php
$e404_all_options['e404_slider_width'] = 1170;

$easings = array('none', 'swing', 'easeInQuad', 'easeOutQuad', 'easeInOutQuad', 'easeInCubic', 'easeOutCubic', 'easeInOutCubic', 'easeInQuart', 'easeOutQuart', 'easeInOutQuart', 'easeInQuint', 'easeOutQuint', 'easeInOutQuint', 'easeInSine', 'easeOutSine', 'easeInOutSine', 'easeInExpo', 'easeOutExpo', 'easeInOutExpo', 'easeInCirc', 'easeOutCirc', 'easeInOutCirc', 'easeInElastic', 'easeOutElastic', 'easeInOutElastic', 'easeInBack', 'easeOutBack', 'easeInOutBack', 'easeInBounce', 'easeOutBounce', 'easeInOutBounce');

function e404_sliders_css_init() {
	wp_enqueue_style('natural-sliders', OF_DIRECTORY.'/css/sliders.css');
//	wp_enqueue_style('flexslider', OF_DIRECTORY.'/css/flexslider.css');
//	wp_enqueue_style('eislideshow', OF_DIRECTORY.'/css/eislideshow.css');
//	wp_enqueue_style('responsiveslides', OF_DIRECTORY.'/css/responsiveslides.css');
}
add_action('init', 'e404_sliders_css_init');

// get slideshow ID by slideshow name
function e404_get_slideshow_id($slideshow) {
	$term = get_term_by('slug', $slideshow, 'e404_slideshow');
	return $term->term_id;
}

// get slides from slideshow
function e404_get_slideshow_slides($slideshow_id) {
	$numberposts = 99;
	$args = array('post_type' => 'e404_slide', 'numberposts' => $numberposts, 'orderby' => 'menu_order date', 'suppress_filters' => 0);
	if((int)$slideshow_id > 0) {
		$slideshow_name = get_term_by('id', (int)$slideshow_id, 'e404_slideshow');
	}
	if(isset($slideshow_name)) {
		$args['e404_slideshow'] = $slideshow_name->slug;
	}

	$slides = get_posts($args);
	$slides_final = array();
	$i = 0;
	foreach($slides as $slide) {
		$image = wp_get_attachment_image_src(get_post_thumbnail_id($slide->ID), 'single-post-thumbnail');
		if($image)
			$slide->image = $image[0];
		else
			$slide->image = null;
		$slide->post_title = get_the_title($slide->ID);
		$slide->url = get_post_meta($slide->ID, 'e404_slide_target_url', true);
		
		$slides_final[$i] = new stdClass();
		$slides_final[$i]->ID = $slide->ID;
		$slides_final[$i]->title = $slide->post_title;
		$slides_final[$i]->content = $slide->post_content;
		$slides_final[$i]->image = $slide->image;
		$slides_final[$i]->url = $slide->url;

		$i++;
		if($i == $numberposts)
			break;
	}
	return $slides_final;
}

// get images from images list
function e404_get_images_from_list($content) {
	$content = str_replace("\r", "", $content);
	$images = explode("\n", $content);
	$slides = array();
	$i = 0;
	foreach($images as $image) {
		$image = strip_tags($image);
		if(trim($image) != '') {
    		$slides[$i] = new stdClass();
			$img_data = explode(";", trim($image));
			if(isset($img_data[0]))
				$slides[$i]->image = $img_data[0];
			if(isset($img_data[1]))
				$slides[$i]->title = $img_data[1];
			else
				$slides[$i]->title = '';
			if(isset($img_data[2]))
				$slides[$i]->url = $img_data[2];
			else
				$slides[$i]->url = '';
			$slides[$i]->content = '';
			$i++;
		}
	}
	return $slides;
}

// get images attached to a post/page
function e404_get_images_attachments($post_id, $exclude = '') {
	$params = array('post_parent' => $post_id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order date');
	if(!empty($exclude)) {
		$exclude = preg_replace('/[^0-9,]+/', '', $exclude);
		$params = array_merge($params, array('exclude' => $exclude));
	}
	$images = array();
	$attachments = get_children($params);
	$i = 0;
	foreach($attachments as $attachment_id => $attachment) {
        $images[$i] = new stdClass();
		$images[$i]->ID = $attachment->ID;
		$image_src = wp_get_attachment_image_src($attachment->ID, 'full');
		$images[$i]->image = $image_src[0];
		$images[$i]->title = get_the_title($attachment->ID);
		$images[$i]->url = $attachment->post_excerpt;
		$images[$i]->content = '';
		$i++;
	}
	return $images;
}

// echo JavaScript params
function e404_javascript_params($params) {
	$output = '';
	foreach($params as $key => $value) {
		if(!empty($value)) {
			if($value == 'true' || $value == 'false')
				$output .= $key.': '.$value.', ';
			else
				$output .= $key.': "'.$value.'", ';
		}
	}
	return substr($output, 0, strlen($output) - 2);
}

// FlexSlider
function e404_show_flexslider($slides, $atts) {
	global $e404_all_options;
	extract(shortcode_atts(array('width' => $e404_all_options['e404_slider_width'], 'height' => '400', 'titles' => 'true',
								 'animation' => '', 'slide_direction' => '', 'autoplay' => '', 'pause' => '', 'animation_speed' => '',
								 'direction_nav' => '', 'control_nav' => '', 'keyboard_nav' => '', 'mousewheel' => '',
								 'prev_text' => __('Previous', 'natural'), 'next_text' => __('Next', 'natural'),
								 'randomize' => '', 'animation_loop' => '', 'pause_on_action' => '', 'pause_on_hover' => '', 'lightbox' => 'false'
								 ), $atts));
	
	wp_enqueue_script('flexslider', OF_DIRECTORY.'/js/jquery.flexslider.min.js', array('jquery'), '', true);

	$animations = array('fade', 'slide');
	$directions = array('horizontal', 'vertical');
	
	if(!in_array($animation, $animations))
		$animation = '';
	if(!in_array($slide_direction, $directions))
		$slide_direction = '';
	
	$js_params = array('animation' => $animation,
					   'slideDirection' => $slide_direction,
					   'slideshow' => $autoplay,
					   'slideshowSpeed' => $pause,
					   'animationDuration' => $animation_speed,
					   'directionNav' => $direction_nav,
					   'controlNav' => $control_nav,
					   'keyboardNav' => $keyboard_nav,
					   'mousewheel' => $mousewheel,
					   'prevText' => $prev_text,
					   'nextText' => $next_text,
					   'randomize' => $randomize,
					   'animationLoop' => $animation_loop,
					   'pauseOnAction' => $pause_on_action,
					   'pauseOnHover' => $pause_on_hover
					   );
	
	static $instance = 0;
	$instance++;

	$output = '<div class="flexslider" id="flexslider_'.$instance.'" style="min-height: 100px;">';
	$output .= '<ul class="slides">';
	foreach($slides as $slide) {
		if(!empty($slide->image)) {
			if($lightbox == 'true') {
				$rel = ' rel="prettyphoto[flexslider'.$instance.']"';
				$slide->url = $slide->image;
			}
			else {
				$rel = '';
			}
			if(empty($slide->url))
				$output .= '<li><img src="'.e404_img_scale($slide->image, $width, $height).'" alt="'.$slide->title.'" />';
			else
				$output .= '<li><a href="'.$slide->url.'"'.$rel.'><img src="'.e404_img_scale($slide->image, $width, $height).'" alt="'.$slide->title.'" /></a>';
			if(!empty($slide->title) && $titles == 'true')
				$output .= '<p class="flex-caption">'.$slide->title.'</p>';
			$output .= '</li>';
		}
	}
	$output .= '</ul></div>';

	echo '<script type="text/javascript">';
	echo 'jQuery(window).load(function() {
	jQuery("#flexslider_'.$instance.'").krioImageLoader({ onStart: function() {
		jQuery(this).css("min-height", 0).css("background", "none");
		jQuery(this).flexslider({'.e404_javascript_params($js_params).'});
		} });
	});';
	echo '</script>'."\n";
	
	return $output;
}

// [flexslider]
function e404_flexslider_shortcode($atts) {
	extract(shortcode_atts(array('slideshow' => '', 'slideshow_id' => ''), $atts));
	if(empty($slideshow_id)) {
		if(empty($slideshow)) {
			$slideshow_id = -1; // show all slides
		}
		else {
			$slideshow_id = e404_get_slideshow_id($slideshow);
		}
	}
	$output = e404_show_flexslider(e404_get_slideshow_slides($slideshow_id), $atts);
	return $output;
}

// [flexslider_images]
function e404_flexslider_images_shortcode($atts, $content = null) {
	$output = '';
	if(!empty($content)) {
		$output = e404_show_flexslider(e404_get_images_from_list($content), $atts);
	}
	return $output;
}

// [flexslider_gallery]
function e404_flexslider_gallery_shortcode($atts) {
	extract(shortcode_atts(array('exclude' => '', 'post_id' => ''), $atts));
	global $post;
	$output = '';
	$id = 0;
	if(!empty($post_id)) {
		$id = (int)$post_id;
	}
	else {
		if(is_object($post)) {
			$id = $post->ID;
		}
	}
	if($id > 0)
		$output = e404_show_flexslider(e404_get_images_attachments($id, $exclude), $atts);
	return $output;
}
add_shortcode('flexslider', 'e404_flexslider_shortcode');
add_shortcode('flexslider_images', 'e404_flexslider_images_shortcode');
add_shortcode('flexslider_gallery', 'e404_flexslider_gallery_shortcode');

// Elastic Image Slideshow
function e404_show_eislideshow($slides, $atts) {
	global $e404_all_options, $easings;
	extract(shortcode_atts(array('width' => $e404_all_options['e404_slider_width'], 'height' => '400', 'titles' => 'true',
								 'animation' => '', 'autoplay' => '', 'easing' => '', 'pause' => '', 'animation_speed' => '',
								 'title_speed' => '', 'title_easing' => '', 'lightbox' => ''
								 ), $atts));
	
	wp_enqueue_script('eislideshow', OF_DIRECTORY.'/js/jquery.eislideshow.min.js', array('jquery'), '', true);

	$animations = array('sides', 'center');
	
	if(!in_array($animation, $animations))
		$animation = '';
	if(!in_array($easing, $easings))
		$easing = '';
	if(!in_array($title_easing, $easings))
		$title_easing = '';
	
	$js_params = array('animation' => $animation,
					   'autoplay' => $autoplay,
					   'slideshow_interval' => $pause,
					   'speed' => $animation_speed,
					   'easing' => $easing,
					   'titlespeed' => $title_speed,
					   'titleeasing' => $title_easing,
					   'thumbMaxWidth' => 'none'
					   );
	
	static $instance = 0;
	$instance++;

	$output = '<div class="ei-slider" id="eislideshow_'.$instance.'" style="height: '.$height.'px;">';
	$output .= '<ul class="ei-slider-large">';
	$output_thumbs = '';
	foreach($slides as $slide) {
		if(!empty($slide->image)) {
			if($lightbox == 'true') {
				$rel = ' rel="prettyphoto[eislideshow'.$instance.']"';
				$slide->url = $slide->image;
			}
			else {
				$rel = '';
			}
			if(empty($slide->url))
				$output .= '<li><img src="'.e404_img_scale($slide->image, $width, $height).'" alt="'.$slide->title.'" />';
			else
				$output .= '<li><a href="'.$slide->url.'"'.$rel.'><img src="'.e404_img_scale($slide->image, $width, $height).'" alt="'.$slide->title.'" /></a>';
			if($titles == 'true') {
				if(!empty($slide->content)) {
					$title_content = '';
					if(strpos($slide->content, '<h2') !== false || strpos($slide->content, '<h3') !== false) {
						$title_content = $slide->content;
					}
					else {
						$slide_content = str_replace("\r", "", $slide->content);
						$slide_content = explode("\n", $slide_content);
						if(!empty($slide_content[0])) {
							$title_content .= '<h2>'.$slide_content[0].'</h2>';
						}
						if(!empty($slide_content[1])) {
							$title_content .= '<h3>'.$slide_content[1].'</h3>';
						}
					}
					$output .= '<div class="ei-title">'.$title_content.'</div>';
				}
				elseif(!empty($slide->title)) {
					$output .= '<div class="ei-title"><h2>'.$slide->title.'</h2></div>';
				}
			}
			$output .= '</li>';
			$output_thumbs .= '<li><a href="#">'.$slide->title.'</a><img src="'.e404_img_scale($slide->image, 150, 60).'" alt="'.$slide->title.'" /></li>';
		}
	}
	$output .= '</ul>';
	$output .= '<ul class="ei-slider-thumbs"><li class="ei-slider-element">Current</li>'.$output_thumbs.'</ul>';
	$output .= '</div><br class="clear" />';

	echo '<script type="text/javascript">';
	echo 'jQuery(function() { jQuery(".ei-title").show(); jQuery(".ei-slider-large li img").show();
	jQuery("#eislideshow_'.$instance.'").css("background", "none");
	jQuery("#eislideshow_'.$instance.'").eislideshow({'.e404_javascript_params($js_params).'});
	});';
	echo '</script>'."\n";
	
	return $output;
}

// [eislideshow]
function e404_eislideshow_shortcode($atts) {
	extract(shortcode_atts(array('slideshow' => '', 'slideshow_id' => ''), $atts));
	if(empty($slideshow_id)) {
		if(empty($slideshow)) {
			$slideshow_id = -1; // show all slides
		}
		else {
			$slideshow_id = e404_get_slideshow_id($slideshow);
		}
	}
	$output = e404_show_eislideshow(e404_get_slideshow_slides($slideshow_id), $atts);
	return $output;
}

// [eislideshow_images]
function e404_eislideshow_images_shortcode($atts, $content = null) {
	$output = '';
	if(!empty($content)) {
		$output = e404_show_eislideshow(e404_get_images_from_list($content), $atts);
	}
	return $output;
}

// [eislideshow_gallery]
function e404_eislideshow_gallery_shortcode($atts) {
	extract(shortcode_atts(array('exclude' => '', 'post_id' => ''), $atts));
	global $post;
	$output = '';
	$id = 0;
	if(!empty($post_id)) {
		$id = (int)$post_id;
	}
	else {
		if(is_object($post)) {
			$id = $post->ID;
		}
	}
	if($id > 0)
		$output = e404_show_eislideshow(e404_get_images_attachments($id, $exclude), $atts);
	return $output;
}
add_shortcode('eislideshow', 'e404_eislideshow_shortcode');
add_shortcode('eislideshow_images', 'e404_eislideshow_images_shortcode');
add_shortcode('eislideshow_gallery', 'e404_eislideshow_gallery_shortcode');

// ResponsiveSlides
function e404_show_responsiveslides($slides, $atts) {
	global $e404_all_options;
	extract(shortcode_atts(array('width' => $e404_all_options['e404_slider_width'], 'height' => '400', 'titles' => 'true',
								 'autoplay' => 'true', 'pause' => '', 'animation_speed' => '', 'nav' => 'true', 'pager' => '', 'random' => '',
								 'prev_text' => __('Previous', 'natural'), 'next_text' => __('Next', 'natural'),
								 'pause_on_hover' => '', 'lightbox' => 'false'
								 ), $atts));
	
	wp_enqueue_script('responsiveslides', OF_DIRECTORY.'/js/responsiveslides.min.js', array('jquery'), '', true);

	static $instance = 0;
	$instance++;

	$js_params = array('auto' => $autoplay,
					   'timeout' => $pause,
					   'speed' => $animation_speed,
					   'pager' => $pager,
					   'nav' => $nav,
					   'random' => $random,
					   'pause' => $pause_on_hover,
					   'prevText' => $prev_text,
					   'nextText' => $next_text
					   );
	
	$output = '<div class="responsiveslides" style="min-height: 100px; max-height: '.$height.'px;">';
	$output .= '<ul class="rslides" id="responsiveslides_'.$instance.'">';
	foreach($slides as $slide) {
		if(!empty($slide->image)) {
			if($lightbox == 'true') {
				$rel = ' rel="prettyphoto[rslider'.$instance.']"';
				$slide->url = $slide->image;
			}
			else {
				$rel = '';
			}
			if(empty($slide->url))
				$output .= '<li><img src="'.e404_img_scale($slide->image, $width, $height).'" alt="'.$slide->title.'" />';
			else
				$output .= '<li><a href="'.$slide->url.'"'.$rel.'><img src="'.e404_img_scale($slide->image, $width, $height).'" alt="'.$slide->title.'" /></a>';
			if(!empty($slide->title) && $titles == 'true')
				$output .= '<p class="rscaption">'.$slide->title.'</p>';
			$output .= '</li>';
		}
	}
	$output .= '</ul></div>';

	echo '<script type="text/javascript">';
	echo 'jQuery(window).load(function() {
		jQuery(".responsiveslides").css("min-height", 0).css("background", "none");
		jQuery("#responsiveslides_'.$instance.' li").css("max-height", '.$height.');
		jQuery("#responsiveslides_'.$instance.'").responsiveSlides({'.e404_javascript_params($js_params).'});
		});';
	echo '</script>'."\n";
	
	return $output;
}

// [responsiveslides]
function e404_responsiveslides_shortcode($atts) {
	extract(shortcode_atts(array('slideshow' => '', 'slideshow_id' => ''), $atts));
	if(empty($slideshow_id)) {
		if(empty($slideshow)) {
			$slideshow_id = -1; // show all slides
		}
		else {
			$slideshow_id = e404_get_slideshow_id($slideshow);
		}
	}
	$output = e404_show_responsiveslides(e404_get_slideshow_slides($slideshow_id), $atts);
	return $output;
}

// [responsiveslides_images]
function e404_responsiveslides_images_shortcode($atts, $content = null) {
	$output = '';
	if(!empty($content)) {
		$output = e404_show_responsiveslides(e404_get_images_from_list($content), $atts);
	}
	return $output;
}

// [responsiveslides_gallery]
function e404_responsiveslides_gallery_shortcode($atts) {
	extract(shortcode_atts(array('exclude' => '', 'post_id' => ''), $atts));
	global $post;
	$output = '';
	$id = 0;
	if(!empty($post_id)) {
		$id = (int)$post_id;
	}
	else {
		if(is_object($post)) {
			$id = $post->ID;
		}
	}
	if($id > 0)
		$output = e404_show_responsiveslides(e404_get_images_attachments($id, $exclude), $atts);
	return $output;
}
add_shortcode('responsiveslides', 'e404_responsiveslides_shortcode');
add_shortcode('responsiveslides_images', 'e404_responsiveslides_images_shortcode');
add_shortcode('responsiveslides_gallery', 'e404_responsiveslides_gallery_shortcode');

?>