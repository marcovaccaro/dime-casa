<?php
add_action('init','of_options');

if (!function_exists('of_options')) {
function of_options() {
	
$themename = "Theme Options";
$shortname = "e404";

global $of_options, $e404_options, $social_options, $background_textures, $header_pictures;
$of_options = get_option('of_options');

$GLOBALS['template_path'] = OF_DIRECTORY;

// Stylesheets Reader
$alt_stylesheet_path = OF_FILEPATH . '/styles/';
$alt_stylesheets = array();
if(is_dir($alt_stylesheet_path)) {
    if($alt_stylesheet_dir = opendir($alt_stylesheet_path)) { 
        while(($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false) {
            if(stristr($alt_stylesheet_file, ".css") !== false) {
                $alt_stylesheets[] = $alt_stylesheet_file;
            }
        }    
    }
}
sort($alt_stylesheets);
$alt_styles = array();
foreach($alt_stylesheets as $alt_style) {
	$alt_styles[$alt_style] = OF_DIRECTORY.'/styles/'.str_replace('.css', '.png', $alt_style);
}

// More Options
$uploads_arr = wp_upload_dir();
$all_uploads_path = $uploads_arr['path'];
$all_uploads = get_option('of_uploads');

// Slider options
$slider_options = array('' => 'None (disabled)', 'showcase' => 'Awkward Showcase', 'nivo' => 'Nivo Slider', 'liteaccordion' => 'liteAccordion', 'accordion' => 'Accordion Slider', 'anything' => 'Anything Slider');
$slideshows = get_terms('e404_slideshow');
$slideshow_options[-1] = 'Blog Posts (predefined slideshow)';
$slideshow_options[0] = 'All';
foreach($slideshows as $slideshow)
	$slideshow_options[$slideshow->term_id] = $slideshow->name;

// Nivo options
$nivo_effects = array('random', 'sliceDown', 'sliceDownLeft', 'sliceUp', 'sliceUpLeft', 'sliceUpDown', 'sliceUpDownLeft', 'fold', 'fade', 'slideInRight', 'slideInLeft', 'boxRandom', 'boxRain', 'boxRainReverse');

// Accordion options
$easing_effects = array('none', 'swing', 'easeInQuad', 'easeOutQuad', 'easeInOutQuad', 'easeInCubic', 'easeOutCubic', 'easeInOutCubic', 'easeInQuart', 'easeOutQuart', 'easeInOutQuart', 'easeInQuint', 'easeOutQuint', 'easeInOutQuint', 'easeInSine', 'easeOutSine', 'easeInOutSine', 'easeInExpo', 'easeOutExpo', 'easeInOutExpo', 'easeInCirc', 'easeOutCirc', 'easeInOutCirc', 'easeInElastic', 'easeOutElastic', 'easeInOutElastic', 'easeInBack', 'easeOutBack', 'easeInOutBack', 'easeInBounce', 'easeOutBounce', 'easeInOutBounce');

// Intro text options
$intro_main_options = array('none' => 'Disabled', 'title' => 'Page Title', 'title-excerpt' => 'Page Title & Excerpt (if available)', 'html' => 'HTML/Text', 'twitter' => 'Last Twitter status');
$intro_options = array_merge($intro_main_options, array('main' => 'The same as defined in the main setting'));

// Pages
$a_pages = get_pages();
$all_pages = array();
$all_pages[0] = '-- none --';
foreach($a_pages as $a_page) {
	$all_pages[$a_page->ID] = $a_page->post_title;
}

// Blog categories
$a_categories = get_categories();
$all_categories = array();
$all_categories[0] = '-- all --';
foreach($a_categories as $a_category) {
	$all_categories[$a_category->term_id] = $a_category->name;
}

// Google Web Fonts
include(OF_FILEPATH.'/inc/google-fonts-list.php');

$options = array();

$options[] = array( "name" => "General Settings",
                    "type" => "heading");

$options[] = array( "name" => "Custom Logo",
					"desc" => "Upload a logo for your theme, or specify the image address of your online logo. (http://yoursite.com/logo.png)",
					"id" => $shortname."_logo",
					"std" => "",
					"type" => "upload");

$options[] = array( "name" => "Custom Favicon",
					"desc" => "Upload a 16px x 16px png/gif image that will represent your website's favicon.",
					"id" => $shortname."_custom_favicon",
					"std" => "",
					"type" => "upload"); 

$options[] = array( "name" => "Theme Layout",
					"desc" => "Select an overall theme layout.",
					"id" => $shortname."_theme_layout",
					"std" => "standard",
					"type" => "select2",
					"options" => array('standard' => 'standard', 'boxed' => 'boxed'));

$options[] = array( "name" => "Show Breadcrumbs",
					"desc" => "Show the breadcrumb trail navigation.",
					"id" => $shortname."_breadcrumbs",
					"std" => "false",
					"type" => "checkbox"); 

$options[] = array( "name" => "Show Page Titles",
					"desc" => "Show page titles above the page content.",
					"id" => $shortname."_page_titles",
					"std" => "false",
					"type" => "checkbox"); 

$options[] = array( "name" => "Enable PrettyPhoto",
					"desc" => "Enable PrettyPhoto (Lightbox clone) support for images.",
					"id" => $shortname."_gallery_prettyphoto",
					"std" => "true",
					"type" => "checkbox"); 

$options[] = array( "name" => "Allow Page Comments",
					"desc" => "Enable comments on pages.",
					"id" => $shortname."_page_comments",
					"std" => "false",
					"type" => "checkbox"); 

$options[] = array( "name" => "Tracking Code",
					"desc" => "Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.",
					"id" => $shortname."_google_analytics",
					"std" => "",
					"type" => "textarea");                                                    
    
$options[] = array( "name" => "Background Settings",
                    "type" => "heading");

$options[] = array( "name" => "Background Texture",
					"desc" => "Select a background texture.",
					"id" => $shortname."_background_texture",
					"std" => "",
					"type" => "images",
					"options" => $background_textures);

$options[] = array( "name" => "Custom Background Texture",
					"desc" => "Upload your own background texture (above selection will be ignored).",
					"id" => $shortname."_custom_background_texture",
					"std" => "",
					"type" => "upload");

$options[] = array( "name" => "Header Texture",
					"desc" => "Select a header texture.",
					"id" => $shortname."_header_texture",
					"std" => "",
					"type" => "images",
					"options" => $background_textures);

$options[] = array( "name" => "Custom Header Texture",
					"desc" => "Upload your own header texture (above selection will be ignored).",
					"id" => $shortname."_custom_header_texture",
					"std" => "",
					"type" => "upload");

$options[] = array( "name" => "Header Picture",
					"desc" => "Select a header picture (header texture will be disabled).",
					"id" => $shortname."_header_picture",
					"std" => "",
					"type" => "images",
					"options" => $header_pictures);

$options[] = array( "name" => "Custom Header Picture",
					"desc" => "Upload your own header picture (above selection will be ignored).",
					"id" => $shortname."_custom_header_picture",
					"std" => "",
					"type" => "upload");

$options[] = array( "name" => "Header Options",
					"type" => "heading");
					
$options[] = array( "name" => "Disable Search Form",
					"desc" => "Remove the search form from the right side of the page.",
					"id" => $shortname."_remove_search_form",
					"std" => "false",
					"type" => "checkbox"); 

$options[] = array( "name" => "Top Contact Box",
                    "desc" => "Text/HTML to display in the top contact box.",
                    "id" => $shortname."_top_contact_box",
                    "std" => "Call us Free: <strong>+01 555 55 55</strong> | contact@johndoe.com</span>",
                    "type" => "textarea");

$options[] = array( "name" => "Disable Top Contact Box",
					"desc" => "Remove the contact box from the header.",
					"id" => $shortname."_remove_top_contact_box",
					"std" => "false",
					"type" => "checkbox"); 

$options[] = array( "name" => "Styling Options",
					"type" => "heading");

$options[] = array( "name" => "Theme Variations",
					"desc" => "Select a theme color variation. You can change the color of specific elements below.",
					"id" => $shortname."_theme_style",
					"std" => "style_01.css",
					"type" => "images",
					"options" => $alt_styles);

$options[] = array( "name" => "Enable Theme Customization",
					"desc" => "Enable the theme customization (see options below).",
					"id" => $shortname."_custom_style",
					"std" => "false",
					"type" => "checkbox");

$options[] = array( "name" => "Background Color",
					"desc" => "Set background color.",
					"id" => $shortname."_color_background",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Main Text Color",
					"desc" => "Set main text color.",
					"id" => $shortname."_color_main",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Link Color",
					"desc" => "Set links color.",
					"id" => $shortname."_color_links",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Link Hover Color",
					"desc" => "Set links hover color.",
					"id" => $shortname."_color_links_hover",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Code Text Color",
					"desc" => "Set code tag text color.",
					"id" => $shortname."_color_code",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Blockquote Text Color",
					"desc" => "Set blockquote tag text color.",
					"id" => $shortname."_color_blockquote",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Headers Text Color",
					"desc" => "Set headers (h1 - h6) text color.",
					"id" => $shortname."_color_headers",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Headers Link Color",
					"desc" => "Set headers (h1 - h6) links color.",
					"id" => $shortname."_color_headers_links",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Headers Link Hover Color",
					"desc" => "Set headers (h1 - h6) links hover color.",
					"id" => $shortname."_color_headers_links_hover",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Footer Headers Color",
					"desc" => "Set footer headers (h1 - h6) color.",
					"id" => $shortname."_color_footer_headers",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Header Background Color",
					"desc" => "Set header background color.",
					"id" => $shortname."_header_background",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Header Contact Box Background Color",
					"desc" => "Set header contact box background color.",
					"id" => $shortname."_header_contact_background",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Header Contact Box Text Color",
					"desc" => "Set header contact box text color.",
					"id" => $shortname."_header_contact_text",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Header Contact Box Strong Text Color",
					"desc" => "Set header contact box strong text color.",
					"id" => $shortname."_header_contact_text_strong",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Social Icons Background Color",
					"desc" => "Set social icons box background color.",
					"id" => $shortname."_header_social_icons_background",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Menu Background Color",
					"desc" => "Set menu background color.",
					"id" => $shortname."_menu_background",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Menu Links Color",
					"desc" => "Set menu links color.",
					"id" => $shortname."_menu_links",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Menu Links Hover & Current Page Text Color",
					"desc" => "Set menu links hover and current page text color.",
					"id" => $shortname."_menu_current_text",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Submenu Indicator Color",
					"desc" => "Set submenu indicator color.",
					"id" => $shortname."_menu_submenu_indicator",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Submenu Background Color",
					"desc" => "Set submenu background color.",
					"id" => $shortname."_menu_submenu_background",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Submenu Background Opacity",
					"desc" => "Set the opacity of the submenu background (in percents); you have also set the menu background color.",
					"id" => $shortname."_menu_submenu_background_opacity",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Submenu Links Color",
					"desc" => "Set submenu links color.",
					"id" => $shortname."_menu_submenu_links",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Submenu Links Hover Color",
					"desc" => "Set submenu links hover color.",
					"id" => $shortname."_menu_submenu_hover",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Submenu Links Hover Background Color",
					"desc" => "Set submenu links hover background color.",
					"id" => $shortname."_menu_submenu_hover_background",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Icon Box description Text Color",
					"desc" => "Set icon box description text color.",
					"id" => $shortname."_icon_box_text",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Content Box Background Color",
					"desc" => "Set content box background color.",
					"id" => $shortname."_content_box_background",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Content Box Border Color",
					"desc" => "Set content box border color.",
					"id" => $shortname."_content_box_border",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Intro Box Background Color",
					"desc" => "Set intro box background color.",
					"id" => $shortname."_introbox_background",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Intro Box Border Color",
					"desc" => "Set intro box border color.",
					"id" => $shortname."_introbox_border",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Intro Box Text Color",
					"desc" => "Set intro box text color.",
					"id" => $shortname."_introbox_text",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Intro Box Links Color",
					"desc" => "Set intro box links color.",
					"id" => $shortname."_introbox_links",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "WP PageNavi Text Color",
					"desc" => "Set WP PageNavi navigation text color.",
					"id" => $shortname."_wppagenavi_text",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "WP PageNavi Background Color",
					"desc" => "Set WP PageNavi navigation background color.",
					"id" => $shortname."_wppagenavi_background",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "WP PageNavi Hover Text Color",
					"desc" => "Set WP PageNavi navigation hover text color.",
					"id" => $shortname."_wppagenavi_hover_text",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "WP PageNavi Hover Background Color",
					"desc" => "Set WP PageNavi navigation hover background color.",
					"id" => $shortname."_wppagenavi_hover_background",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Post Date Text Color",
					"desc" => "Set blog post date text color.",
					"id" => $shortname."_blog_date_text",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Post Date Background Color",
					"desc" => "Set blog post date background color.",
					"id" => $shortname."_blog_date_background",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Sticky Post Date Text Color",
					"desc" => "Set blog sticky post date text color.",
					"id" => $shortname."_sticky_blog_date_text",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Sticky Post Date Background Color",
					"desc" => "Set blog sticky post date background color.",
					"id" => $shortname."_sticky_blog_date_background",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Tags Text Color",
					"desc" => "Set tag buttons text color.",
					"id" => $shortname."_tags_text",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Tags Background Color",
					"desc" => "Set tag buttons background color.",
					"id" => $shortname."_tags_background",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Tags Hover Text Color",
					"desc" => "Set tag buttons hover text color.",
					"id" => $shortname."_tags_hover_text",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Tags Hover Background Color",
					"desc" => "Set tag buttons hover background color.",
					"id" => $shortname."_tags_hover_background",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "'Read More' Button Text Color",
					"desc" => "Set 'Read More' button text color.",
					"id" => $shortname."_readmore_text",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "'Read More' Button Background Color",
					"desc" => "Set 'Read More' button background color.",
					"id" => $shortname."_readmore_background",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "'Read More' Button Hover Text Color",
					"desc" => "Set 'Read More' button hover text color.",
					"id" => $shortname."_readmore_hover_text",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "'Read More' Button Hover Background Color",
					"desc" => "Set 'Read More' button hover background color.",
					"id" => $shortname."_readmore_hover_background",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "'Reply' Button Text Color",
					"desc" => "Set 'Reply' button text color.",
					"id" => $shortname."_reply_text",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "'Reply' Button Background Color",
					"desc" => "Set 'Reply' button background color.",
					"id" => $shortname."_reply_background",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "'Reply' Button Hover Text Color",
					"desc" => "Set 'Reply' button hover text color.",
					"id" => $shortname."_reply_hover_text",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "'Reply' Button Hover Background Color",
					"desc" => "Set 'Reply' button hover background color.",
					"id" => $shortname."_reply_hover_background",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Tabs Text Color",
					"desc" => "Set tabs text color.",
					"id" => $shortname."_tabs_text",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Tabs Background Color",
					"desc" => "Set tabs background color.",
					"id" => $shortname."_tabs_background",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Tabs Hover Text Color",
					"desc" => "Set tabs hover text color.",
					"id" => $shortname."_tabs_hover_text",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Tabs Hover Background Color",
					"desc" => "Set tabs hover background color.",
					"id" => $shortname."_tabs_hover_background",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Slider/Scrollable Buttons Text Color",
					"desc" => "Set Slider/Scrollable icon buttons text color.",
					"id" => $shortname."_ssbuttons_text",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Slider/Scrollable Buttons Background Color",
					"desc" => "Set Slider/Scrollable icon buttons background color.",
					"id" => $shortname."_ssbuttons_background",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Slider/Scrollable Buttons Hover Text Color",
					"desc" => "Set Slider/Scrollable icon buttons hover text color.",
					"id" => $shortname."_ssbuttons_hover_text",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Slider/Scrollable Buttons Hover Background Color",
					"desc" => "Set Slider/Scrollable icon buttons hover background color.",
					"id" => $shortname."_ssbuttons_hover_background",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Sidebar Widgets Text Color",
					"desc" => "Set sidebar widgets text color.",
					"id" => $shortname."_widgets_text",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Sidebar Widgets Background Color",
					"desc" => "Set sidebar widgets background color.",
					"id" => $shortname."_widgets_background",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Sidebar Widgets Border Color",
					"desc" => "Set sidebar widgets border color.",
					"id" => $shortname."_widgets_border",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Sidebar Widgets Headers Color",
					"desc" => "Set sidebar widgets headers color.",
					"id" => $shortname."_widgets_headers",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Sidebar Widgets Span Text Color",
					"desc" => "Set sidebar widgets span text color.",
					"id" => $shortname."_widgets_span",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Sidebar Widgets Links Color",
					"desc" => "Set sidebar widgets links color.",
					"id" => $shortname."_widgets_links",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Sidebar Widgets Headers Links Color",
					"desc" => "Set sidebar widgets headers links color.",
					"id" => $shortname."_widgets_headers_links",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Highlighted Text Boxes Text Color",
					"desc" => "Set highlighted text boxes text color.",
					"id" => $shortname."_htextboxes_text",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Highlighted Text Boxes Background Color",
					"desc" => "Set highlighted text boxes background color.",
					"id" => $shortname."_htextboxes_background",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Highlighted Text Boxes Border Color",
					"desc" => "Set highlighted text boxes border color.",
					"id" => $shortname."_htextboxes_border",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Highlighted Text Boxes Headers Color",
					"desc" => "Set highlighted text boxes headers color.",
					"id" => $shortname."_htextboxes_headers",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Highlighted Text Boxes Span Text Color",
					"desc" => "Set highlighted text boxes span text color.",
					"id" => $shortname."_htextboxes_span",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Highlighted Text Boxes Links Color",
					"desc" => "Set highlighted text boxes links color.",
					"id" => $shortname."_htextboxes_links",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Highlighted Text Boxes Headers Links Color",
					"desc" => "Set highlighted text boxes headers links color.",
					"id" => $shortname."_htextboxes_headers_links",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "2nd Grade Links Color",
					"desc" => "Set 2nd grade links color (categories, breadcrumbs, post meta).",
					"id" => $shortname."_2ndgrade_links",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Twitter Icon Color Variant",
					"desc" => "Select the color variant of the Twitter icon. Empty for theme default.",
					"id" => $shortname."_twitter_icon_variant",
					"std" => "",
					"type" => "select",
					"options" => array('', 'black', 'blue', 'brown', 'darkblue', 'darkgray', 'gray', 'green', 'orange', 'pink', 'red', 'violet', 'white', 'yellow'));

$options[] = array( "name" => "Submit Button Text Color",
					"desc" => "Set submit buttons text color.",
					"id" => $shortname."_submit_text",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Submit Button Background Color",
					"desc" => "Set submit buttons background color.",
					"id" => $shortname."_submit_background",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Submit Button Border Color",
					"desc" => "Set submit buttons border color.",
					"id" => $shortname."_submit_border",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Submit Button Text Color (footer)",
					"desc" => "Set submit buttons text color (in footer).",
					"id" => $shortname."_submit_text_footer",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Submit Button Background Color (footer)",
					"desc" => "Set submit buttons background color (in footer).",
					"id" => $shortname."_submit_background_footer",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Submit Button Border Color (footer)",
					"desc" => "Set submit buttons border color (in footer).",
					"id" => $shortname."_submit_border_footer",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Forms Text Color",
					"desc" => "Set forms text color.",
					"id" => $shortname."_forms_text",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Forms Background Color",
					"desc" => "Set forms background color.",
					"id" => $shortname."_forms_background",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Forms Border Color",
					"desc" => "Set forms border color.",
					"id" => $shortname."_forms_border",
					"std" => "",
					"type" => "color");

$options[] = array( "name" => "Forms Text Color (footer)",
					"desc" => "Set forms text color (in footer).",
					"id" => $shortname."_forms_text_footer",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Forms Background Color (footer)",
					"desc" => "Set forms background color (in footer).",
					"id" => $shortname."_forms_background_footer",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Forms Border Color (footer)",
					"desc" => "Set forms border color (in footer).",
					"id" => $shortname."_forms_border_footer",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Search Box Text Color",
					"desc" => "Set search box text color.",
					"id" => $shortname."_search_box_text",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Alternative Navigation Text Color",
					"desc" => "Set alternative navigation text color (for iPhone).",
					"id" => $shortname."_alternative_nav_text",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Alternative Navigation Background Color",
					"desc" => "Set alternative navigation background color (for iPhone).",
					"id" => $shortname."_alternative_nav_background",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Alternative Navigation Border Color",
					"desc" => "Set alternative navigation border color (for iPhone).",
					"id" => $shortname."_alternative_nav_border",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Footer Text Color",
					"desc" => "Set footer text color.",
					"id" => $shortname."_footer_text",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Footer Links Color",
					"desc" => "Set footer links color.",
					"id" => $shortname."_footer_links",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Footer Background Color",
					"desc" => "Set footer background color.",
					"id" => $shortname."_footer_background",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Footer Top Border Color",
					"desc" => "Set footer top border color.",
					"id" => $shortname."_footer_top_border",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Footer Menu Links Color",
					"desc" => "Set footer menu links color.",
					"id" => $shortname."_footer_nav_links",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Footer Menu Links Divider",
					"desc" => "Set footer menu links divider.",
					"id" => $shortname."_footer_nav_divider",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Copyright Text Color",
					"desc" => "Set copyright text color.",
					"id" => $shortname."_copyright_text",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Copyright Links Color",
					"desc" => "Set copyright text color.",
					"id" => $shortname."_copyright_links",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Copyright Background Color",
					"desc" => "Set copyright background color.",
					"id" => $shortname."_copyright_background",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Copyright Top Border Color",
					"desc" => "Set copyright top border color.",
					"id" => $shortname."_copyright_top_border",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Pricebox - Border Hover Color",
					"desc" => "Set pricebox border hover color.",
					"id" => $shortname."_pricebox_border_hover",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Pricebox - Header Hover Text Color",
					"desc" => "Set pricebox header hover text color.",
					"id" => $shortname."_pricebox_header_text_hover",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Pricebox - Header Background Hover Color",
					"desc" => "Set pricebox header background hover color.",
					"id" => $shortname."_pricebox_header_background_hover",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Pricebox - Featured Box Border Color",
					"desc" => "Set featured box border color.",
					"id" => $shortname."_pricebox_featured_border",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Pricebox - Featured Box Header Text Color",
					"desc" => "Set featured box header text color.",
					"id" => $shortname."_pricebox_featured_header_text",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Pricebox - Featured Box Header Background Color",
					"desc" => "Set featured box header background color.",
					"id" => $shortname."_pricebox_featured_header_background",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Pricebox - Featured Box Price Text Color",
					"desc" => "Set featured box price text color.",
					"id" => $shortname."_pricebox_featured_price",
					"std" => "",
					"type" => "color");

$options[] = array( "name" => "Sortable Portfolio Current Category Color",
					"desc" => "Set sortable portfolio current category text color.",
					"id" => $shortname."_portfolio_nav_color",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Sortable Portfolio Navigation Underlin Color",
					"desc" => "Set sortable portfolio navigation underline color.",
					"id" => $shortname."_portfolio_nav_underline",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Lines",
					"desc" => "Select a type of horizontal lines.",
					"id" => $shortname."_horizontal_lines",
					"std" => "",
					"type" => "select2",
					"options" => array('' => 'theme default', 'images/hr1.png' => 'dark', 'images/hr2.png' => 'light'));

$options[] = array( "name" => "'Go to Top' Link Color",
					"desc" => "Set 'Go to Top' link color.",
					"id" => $shortname."_go_to_top_color",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "'Go to Top' Link Hover Color",
					"desc" => "Set 'Go to Top' link hover color.",
					"id" => $shortname."_go_to_top_hover_color",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Fancy Header Line Color",
					"desc" => "Set fancy header line color.",
					"id" => $shortname."_fancy_header_line_color",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Fancy Header Underline Color",
					"desc" => "Set fancy header underline color.",
					"id" => $shortname."_fancy_header_underline_color",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Footer Header Line Color",
					"desc" => "Set footer header line color.",
					"id" => $shortname."_footer_header_line_color",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Slider Captions Text Color",
					"desc" => "Set slider captions text color (for FlexSlider and ResponsiveSlides).",
					"id" => $shortname."_sliders_text",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Slider Captions Background Color",
					"desc" => "Set slider captions background color (for FlexSlider and ResponsiveSlides).",
					"id" => $shortname."_sliders_background",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Slider Pagination Color",
					"desc" => "Set slider pagination color (for FlexSlider, EISlideshowm, ResponsiveSlides and Scrollable).",
					"id" => $shortname."_sliders_pagination",
					"std" => "",
					"type" => "color"); 

$options[] = array( "name" => "Custom CSS",
                    "desc" => "Quickly add some CSS to your theme by adding it to this block.",
                    "id" => $shortname."_custom_css",
                    "std" => "",
                    "type" => "textarea");

$options[] = array( "name" => "Fonts Options",
					"type" => "heading");

$options[] = array( "name" => "Enable Fonts Replacement",
					"desc" => "Enable the fonts replacement with Google Web Fonts.<br />Go to the <a href='http://www.google.com/webfonts'>Google Font Directory</a> for a preview of available fonts.",
					"id" => $shortname."_google_web_fonts",
					"std" => "false",
					"type" => "checkbox");

$options[] = array( "name" => "body Font",
					"desc" => "Select a font to assign to 'body' tag.",
					"id" => $shortname."_gwf_body",
					"std" => "",
					"type" => "select2",
					"options" => $google_web_fonts);

$options[] = array( "name" => "p (paragraph) Font",
					"desc" => "Select a font to assign to 'p' tag.",
					"id" => $shortname."_gwf_p",
					"std" => "",
					"type" => "select2",
					"options" => $google_web_fonts);

$options[] = array( "name" => "h1 Font",
					"desc" => "Select a font to assign to 'h1' tag.",
					"id" => $shortname."_gwf_h1",
					"std" => "",
					"type" => "select2",
					"options" => $google_web_fonts);

$options[] = array( "name" => "h2 Font",
					"desc" => "Select a font to assign to 'h2' tag.",
					"id" => $shortname."_gwf_h2",
					"std" => "",
					"type" => "select2",
					"options" => $google_web_fonts);

$options[] = array( "name" => "h3 Font",
					"desc" => "Select a font to assign to 'h3' tag.",
					"id" => $shortname."_gwf_h3",
					"std" => "",
					"type" => "select2",
					"options" => $google_web_fonts);

$options[] = array( "name" => "h4 Font",
					"desc" => "Select a font to assign to 'h4' tag.",
					"id" => $shortname."_gwf_h4",
					"std" => "",
					"type" => "select2",
					"options" => $google_web_fonts);

$options[] = array( "name" => "h5 Font",
					"desc" => "Select a font to assign to 'h5' tag.",
					"id" => $shortname."_gwf_h5",
					"std" => "",
					"type" => "select2",
					"options" => $google_web_fonts);

$options[] = array( "name" => "h6 Font",
					"desc" => "Select a font to assign to 'h6' tag.",
					"id" => $shortname."_gwf_h6",
					"std" => "",
					"type" => "select2",
					"options" => $google_web_fonts);

$options[] = array( "name" => "blockquote Font",
					"desc" => "Select a font to assign to 'blockquote' tag.",
					"id" => $shortname."_gwf_blockquote",
					"std" => "",
					"type" => "select2",
					"options" => $google_web_fonts);

$options[] = array( "name" => "li Font",
					"desc" => "Select a font to assign to 'li' tag (lists).",
					"id" => $shortname."_gwf_li",
					"std" => "",
					"type" => "select2",
					"options" => $google_web_fonts);

$options[] = array( "name" => "Menu Font",
					"desc" => "Select a font to assign to the dropdown menu.",
					"id" => $shortname."_gwf_menu",
					"std" => "",
					"type" => "select2",
					"options" => $google_web_fonts);

$options[] = array( "name" => "Submenu Font",
					"desc" => "Select a font to assign to the dropdown menu (submenus).",
					"id" => $shortname."_gwf_submenu",
					"std" => "",
					"type" => "select2",
					"options" => $google_web_fonts);

$options[] = array( "name" => "Intro Text Box",
					"type" => "heading");

$options[] = array( "name" => "Intro Text Box",
					"desc" => "Select a content to display in the intro text box. You can choose other settings for different page types below.",
					"id" => $shortname."_intro_type",
					"std" => "title-excerpt",
					"type" => "select2",
					"options" => $intro_main_options);

$options[] = array( "name" => "HTML/Text",
					"desc" => "HTML/Text to display in the intro text box.",
					"id" => $shortname."_intro_text",
					"std" => "<p><strong>Welcome to Natural Theme: The ultimate all-in-one template.</strong><br />\nCreate outstanding website or blog in minutes!</p>",
					"type" => "textarea");                                                    

$options[] = array( "name" => "Intro Text Box for Home Page",
					"desc" => "Select a content to display in the intro text box on the Home Page.",
					"id" => $shortname."_home_intro_type",
					"std" => "html",
					"type" => "select2",
					"options" => $intro_options);

$options[] = array( "name" => "HTML/Text",
					"desc" => "HTML/Text to display in the intro text box on the Home Page.",
					"id" => $shortname."_home_intro_text",
					"std" => "<h1>Welcome to <a href=\"#\">Natural Theme</a> - the ultimate all-in-one responsive WordPress theme. Create outstanding website or blog in just few minutes!</h1>",
					"type" => "textarea");                                                    

$options[] = array( "name" => "Intro Text Box for Blog Pages",
					"desc" => "Select a content to display in the intro text box on Blog Pages.",
					"id" => $shortname."_blog_intro_type",
					"std" => "main",
					"type" => "select2",
					"options" => $intro_options);

$options[] = array( "name" => "HTML/Text",
					"desc" => "HTML/Text to display in the intro text box on Blog Pages.",
					"id" => $shortname."_blog_intro_text",
					"std" => "<h1>Blog</h1>\n<p>You can enter your own text here!</p>",
					"type" => "textarea");                                                    

$options[] = array( "name" => "Intro Text Box for Portfolio Pages",
					"desc" => "Select a content to display in the intro text box on Portfolio Pages.",
					"id" => $shortname."_portfolio_intro_type",
					"std" => "main",
					"type" => "select2",
					"options" => $intro_options);

$options[] = array( "name" => "HTML/Text",
					"desc" => "HTML/Text to display in the intro text box on Portfolio Pages.",
					"id" => $shortname."_portfolio_intro_text",
					"std" => "<h1>Portfolio</h1>\n<p>Show your best projects in several different ways.</p>",
					"type" => "textarea");                                                    

$options[] = array( "name" => "Intro Text Box for Gallery Pages",
					"desc" => "Select a content to display in the intro text box on Gallery Pages.",
					"id" => $shortname."_gallery_intro_type",
					"std" => "main",
					"type" => "select2",
					"options" => $intro_options);

$options[] = array( "name" => "HTML/Text",
					"desc" => "HTML/Text to display in the intro text box on Gallery Pages.",
					"id" => $shortname."_gallery_intro_text",
					"std" => "<h1>Gallery</h1>\n<p>Show your pictures with WordPress built-in gallery or Galleria slideshow.</p>",
					"type" => "textarea");                                                    

$options[] = array( "name" => "Post Excerpt Length",
					"desc" => "Define the maximum length of a post excerpt.",
					"id" => $shortname."_excerpt_length",
					"std" => "100",
					"type" => "text");

$options[] = array( "name" => "Footer Options",
					"type" => "heading");

$options[] = array( "name" => "Footer Columns",
					"desc" => "Pick the number of footer columns.",
					"id" => $shortname."_footer_columns",
					"std" => "4",
					"type" => "select",
					"options" => array('1', '2', '3', '4'));

$options[] = array( "name" => "Text Below Footer - Left",
                    "desc" => "Text/HTML to display on the left side below the footer.",
                    "id" => $shortname."_footer_below_left",
                    "std" => "Copyright &copy; 2012 <a href=\"http://e404themes.com\">e404 Themes</a>. All rights reserved.",
                    "type" => "textarea");

$options[] = array( "name" => "Text Below Footer - Right",
                    "desc" => "Text/HTML to display on the left side below the footer.",
                    "id" => $shortname."_footer_below_right",
                    "std" => "Powered by: <a href=\"http://wordpress.org\">WordPress</a>.",
                    "type" => "textarea");

$options[] = array( "name" => "Blog Options",
					"type" => "heading");

$options[] = array( "name" => "Blog Layout",
					"desc" => "Select blog layout.",
					"id" => $shortname."_blog_layout",
					"std" => "sidebar-right",
					"type" => "images",
					"options" => array(
						'no-sidebar' => OF_DIRECTORY.'/admin/images/1col.png',
						'sidebar-right' => OF_DIRECTORY.'/admin/images/2cr.png',
						'sidebar-left' => OF_DIRECTORY.'/admin/images/2cl.png')
					);

$options[] = array( "name" => "Display 'Like' button",
					"desc" => "Display the 'Like' button next to each blog post.",
					"id" => $shortname."_blog_like_this",
					"std" => "true",
					"type" => "checkbox"); 

$options[] = array( "name" => "Use Post Thumbnails",
					"desc" => "Use post thumbnails on the posts list.",
					"id" => $shortname."_blog_use_thumbnail",
					"std" => "true",
					"type" => "checkbox"); 

$options[] = array( "name" => "Use PrettyPhoto for Thumbnails",
					"desc" => "Use PrettyPhoto (Lightbox clone) for post thumbnails (can be overridden for individual posts).",
					"id" => $shortname."_blog_thumbnails_prettyphoto",
					"std" => "true",
					"type" => "checkbox"); 

$options[] = array( "name" => "Show Thumbnails on Single Post Page",
					"desc" => "Show post thumbnails also on a single blog post page (can be overridden for individual posts).",
					"id" => $shortname."_blog_thumbnails_single_page",
					"std" => "true",
					"type" => "checkbox"); 

$options[] = array( "name" => "Thumbnails Height",
					"desc" => "The height of post thumbnails on the posts list (in pixels; empty for default).",
					"id" => $shortname."_blog_thumbnails_height",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Use Post Excerpts",
					"desc" => htmlentities("Show excerpts on the posts list instead of the content before <!--more--> tag."),
					"id" => $shortname."_blog_use_excerpt",
					"std" => "true",
					"type" => "checkbox"); 

$options[] = array( "name" => "Enable PrettyPhoto",
					"desc" => "Enable PrettyPhoto (Lightbox clone) support for images in WordPress built-in galleries.",
					"id" => $shortname."_blog_prettyphoto",
					"std" => "true",
					"type" => "checkbox"); 

$options[] = array( "name" => "Show Share Icons",
					"desc" => "Show social networks sharing links on blog post pages.",
					"id" => $shortname."_blog_share_it",
					"std" => "true",
					"type" => "checkbox"); 

$options[] = array( "name" => "Show 'Read more' links",
					"desc" => "Show 'Read more' links on the blog page.",
					"id" => $shortname."_blog_read_more",
					"std" => "true",
					"type" => "checkbox"); 

$options[] = array( "name" => "'Read more' link text",
					"desc" => "Text to display in 'Read more' links.",
					"id" => $shortname."_blog_read_more_text",
					"std" => "Read more",
					"type" => "text");

$options[] = array( "name" => "Show Post Author",
					"desc" => "Show the post author.",
					"id" => $shortname."_blog_post_author",
					"std" => "true",
					"type" => "checkbox"); 

$options[] = array( "name" => "Show Post Categories",
					"desc" => "Show post categories.",
					"id" => $shortname."_blog_post_categories",
					"std" => "true",
					"type" => "checkbox"); 

$options[] = array( "name" => "Show Post Tags",
					"desc" => "Show post tags.",
					"id" => $shortname."_blog_post_tags",
					"std" => "true",
					"type" => "checkbox"); 

$options[] = array( "name" => "Show Author Bio",
					"desc" => "Show the box with informations about post author (taken from author profile).",
					"id" => $shortname."_blog_author_bio",
					"std" => "true",
					"type" => "checkbox"); 

$options[] = array( "name" => "Portfolio Options",
					"type" => "heading");

$options[] = array( "name" => "Portfolio Items List Layout",
					"desc" => "Select a layout for portfolio items list (only for templates with sidebar).",
					"id" => $shortname."_portfolio_layout",
					"std" => "sidebar-right",
					"type" => "images",
					"options" => array(
						'sidebar-right' => OF_DIRECTORY.'/admin/images/2cr.png',
						'sidebar-left' => OF_DIRECTORY.'/admin/images/2cl.png')
					);

$options[] = array( "name" => "Display 'Like' button",
					"desc" => "Display the 'Like' button next to each portfolio item.",
					"id" => $shortname."_portfolio_like_this",
					"std" => "true",
					"type" => "checkbox"); 

$options[] = array( "name" => "Portfolio Page",
					"desc" => "Select your portfolio page.",
					"id" => $shortname."_portfolio_page",
					"std" => "0",
					"type" => "select2",
					"options" => $all_pages);

$options[] = array( "name" => "Portfolio Items Per Page",
					"desc" => "Number of portfolio items to show on a portfolio page.",
					"id" => $shortname."_portfolio_posts_per_page",
					"std" => "10",
					"type" => "text");

$options[] = array( "name" => "Portfolio Thumbnails Height",
					"desc" => "Define the height of portfolio item thumbnails on the portfolio page (in pixels; empty for default).",
					"id" => $shortname."_portfolio_thumbnails_height",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Portfolio Slug",
					"desc" => "Slug for portfolio pages.",
					"id" => $shortname."_portfolio_slug",
					"std" => "portfolio",
					"type" => "text");

$options[] = array( "name" => "Portfolio Categories Slug",
					"desc" => "Slug for portfolio categories.",
					"id" => $shortname."_portfolio_category_slug",
					"std" => "category",
					"type" => "text");

$options[] = array( "name" => "Portfolio Categories Name",
					"desc" => "Name for portfolio categories (for example 'Work type').",
					"id" => $shortname."_portfolio_categories_name",
					"std" => "Portfolio Categories",
					"type" => "text");

$options[] = array( "name" => "Portfolio Tags Slug",
					"desc" => "Slug for portfolio tags.",
					"id" => $shortname."_portfolio_tag_slug",
					"std" => "tag",
					"type" => "text");

$options[] = array( "name" => "Portfolio Tags Name",
					"desc" => "Name for portfolio tags (for example 'Media' or 'Used technologies').",
					"id" => $shortname."_portfolio_tags_name",
					"std" => "Portfolio Tags",
					"type" => "text");

$options[] = array( "name" => "PrettyPhoto Support",
					"desc" => "Add PrettyPhoto (Lightbox clone) support for portfolio items featured images.",
					"id" => $shortname."_portfolio_prettyphoto",
					"std" => "true",
					"type" => "checkbox"); 

$options[] = array( "name" => "Show 'View project' (aka 'Read more') button",
					"desc" => "Enable 'View project' buttons on the portfolio page.",
					"id" => $shortname."_portfolio_read_more",
					"std" => "true",
					"type" => "checkbox"); 

$options[] = array( "name" => "'View project' (aka 'Read more') button text",
					"desc" => "Text to display in 'View project' buttons.",
					"id" => $shortname."_portfolio_read_more_text",
					"std" => "View project",
					"type" => "text");

$options[] = array( "name" => "Show Titles",
					"desc" => "Show portfolio items titles (only in column portfolio templates).",
					"id" => $shortname."_portfolio_titles",
					"std" => "true",
					"type" => "checkbox"); 

$options[] = array( "name" => "Show Titles on Single Page",
					"desc" => "Show a portfolio item title on a single item portfolio page.",
					"id" => $shortname."_portfolio_single_titles",
					"std" => "true",
					"type" => "checkbox"); 

$options[] = array( "name" => "Show Categories",
					"desc" => "Show portfolio items categories.",
					"id" => $shortname."_portfolio_item_categories",
					"std" => "true",
					"type" => "checkbox"); 

$options[] = array( "name" => "Show Tags",
					"desc" => "Show tags on portfolio item pages.",
					"id" => $shortname."_portfolio_item_tags",
					"std" => "true",
					"type" => "checkbox"); 

$options[] = array( "name" => "Social Networks & RSS",
					"type" => "heading"); 	   

$options[] = array( "name" => "Share Buttons",
					"desc" => "Choose sites to show in the Share This field.",
					"id" => $shortname."_share_this_sites",
					"std" => "facebook",
					"type" => "multicheck",
					"options" => $social_options);

$options[] = array( "name" => "Open share links in new window",
					"desc" => "Check to open sharing links in a new browser window.",
					"id" => $shortname."_share_buttons_target",
					"std" => "false",
					"type" => "checkbox"); 

$options[] = array( "name" => "Open header social links in new window",
					"desc" => "Check to open header social icons links in a new browser window.",
					"id" => $shortname."_header_social_icons_target",
					"std" => "false",
					"type" => "checkbox"); 

$options[] = array( "name" => "RSS Channel",
					"desc" => "URL address of your RSS channel.",
					"id" => $shortname."_rss",
					"std" => "",
					"type" => "text"); 

$options[] = array( "name" => "Contact Page",
					"desc" => "URL address of your contact page.",
					"id" => $shortname."_contact",
					"std" => "",
					"type" => "text"); 

$options[] = array( "name" => "Twitter username",
					"desc" => "Your Twitter username.",
					"id" => $shortname."_twitter",
					"std" => "",
					"type" => "text"); 

$options[] = array( "name" => "Twitter cache expiration time",
					"desc" => "Define a life time of Twitter cache (in seconds).",
					"id" => $shortname."_twitter_expire",
					"std" => "3600",
					"type" => "text"); 

$options[] = array( "name" => "Facebook profile/page URL",
					"desc" => "Full URL address of your Facebook profile or page.",
					"id" => $shortname."_facebook",
					"std" => "",
					"type" => "text"); 

$options[] = array( "name" => "Flickr profile URL",
					"desc" => "Full URL address of your Flickr profile.",
					"id" => $shortname."_flickr",
					"std" => "",
					"type" => "text"); 

$options[] = array( "name" => "Flickr cache expiration time",
					"desc" => "Define a life time of Flickr cache (in seconds).",
					"id" => $shortname."_flickr_expire",
					"std" => "3600",
					"type" => "text"); 

$options[] = array( "name" => "Google+ profile URL",
					"desc" => "Full URL address of your Google+ profile.",
					"id" => $shortname."_plus",
					"std" => "",
					"type" => "text"); 

$options[] = array( "name" => "500px profile URL",
					"desc" => "Full URL address of your 500px profile.",
					"id" => $shortname."_500px",
					"std" => "",
					"type" => "text"); 

$options[] = array( "name" => "Behance profile URL",
					"desc" => "Full URL address of your Behance profile.",
					"id" => $shortname."_behance",
					"std" => "",
					"type" => "text"); 

$options[] = array( "name" => "Delicious profile URL",
					"desc" => "Full URL address of your Delicious profile.",
					"id" => $shortname."_delicious",
					"std" => "",
					"type" => "text"); 

$options[] = array( "name" => "Digg profile URL",
					"desc" => "Full URL address of your Digg profile.",
					"id" => $shortname."_digg",
					"std" => "",
					"type" => "text"); 

$options[] = array( "name" => "Dribbble profile URL",
					"desc" => "Full URL address of your Dribbble profile.",
					"id" => $shortname."_dribbble",
					"std" => "",
					"type" => "text"); 

$options[] = array( "name" => "DropBox profile URL",
					"desc" => "Full URL address of your DropBox profile.",
					"id" => $shortname."_dropbox",
					"std" => "",
					"type" => "text"); 

$options[] = array( "name" => "Foursquare profile URL",
					"desc" => "Full URL address of your Foursquare profile.",
					"id" => $shortname."_foursquare",
					"std" => "",
					"type" => "text"); 

$options[] = array( "name" => "iChat URL",
					"desc" => "Full URL address of your iChat connection.",
					"id" => $shortname."_ichat",
					"std" => "",
					"type" => "text"); 

$options[] = array( "name" => "Last.fm profile URL",
					"desc" => "Full URL address of your Last.fm profile.",
					"id" => $shortname."_lastfm",
					"std" => "",
					"type" => "text"); 

$options[] = array( "name" => "LinkedIn profile URL",
					"desc" => "Full URL address of your LinkedIn profile.",
					"id" => $shortname."_linkedin",
					"std" => "",
					"type" => "text"); 

$options[] = array( "name" => "MobyPicture profile URL",
					"desc" => "Full URL address of your MobyPicture profile.",
					"id" => $shortname."_mobypicture",
					"std" => "",
					"type" => "text"); 

$options[] = array( "name" => "MySpace profile URL",
					"desc" => "Full URL address of your MySpace profile.",
					"id" => $shortname."_myspace",
					"std" => "",
					"type" => "text"); 

$options[] = array( "name" => "Pinterest profile URL",
					"desc" => "Full URL address of your Pinterest profile.",
					"id" => $shortname."_pinterest",
					"std" => "",
					"type" => "text"); 

$options[] = array( "name" => "Skype URL",
					"desc" => "Full URL address of your Skype connection.",
					"id" => $shortname."_skype",
					"std" => "",
					"type" => "text"); 

$options[] = array( "name" => "StumbleUpon profile URL",
					"desc" => "Full URL address of your StumbleUpon profile.",
					"id" => $shortname."_stumbleupon",
					"std" => "",
					"type" => "text"); 

$options[] = array( "name" => "Tumblr URL",
					"desc" => "Full URL address of your Tumblr blog/profile.",
					"id" => $shortname."_tumblr",
					"std" => "",
					"type" => "text"); 

$options[] = array( "name" => "Vimeo profile URL",
					"desc" => "Full URL address of your Vimeo profile.",
					"id" => $shortname."_vimeo",
					"std" => "",
					"type" => "text"); 

$options[] = array( "name" => "YouTube profile URL",
					"desc" => "Full URL address of your YouTube profile.",
					"id" => $shortname."_youtube",
					"std" => "",
					"type" => "text"); 

$options[] = array( "name" => "Xing profile URL",
					"desc" => "Full URL address of your Xing profile.",
					"id" => $shortname."_xing",
					"std" => "",
					"type" => "text"); 

$options[] = array( "name" => "Tweaks",
					"type" => "heading");

$options[] = array( "name" => "Disable Galleria Shortcode",
					"desc" => "Disable the <code>[galleria]</code> shortcode if you don't want to use it (the Galleria script will not be loaded). This setting doesn't affect slider options.",
					"id" => $shortname."_disable_galleria",
					"std" => "false",
					"type" => "checkbox"); 

$options[] = array( "name" => "Disable Media Shortcodes",
					"desc" => "Disable the <code>[youtube]</code>, <code>[vimeo]</code> and <code>[dailymotion]</code> shortcodes (if you prefer to use different embedding shortcodes).",
					"id" => $shortname."_disable_media_shortcodes",
					"std" => "false",
					"type" => "checkbox"); 

$options[] = array( "name" => "Remove 'generator' Meta Tag",
					"desc" => "Remove the 'generator' meta tag from the 'head' section.",
					"id" => $shortname."_remove_generator",
					"std" => "false",
					"type" => "checkbox"); 

$options[] = array( "name" => "Remove 'index', 'next' and 'prev' Links",
					"desc" => "Remove 'index', 'next' and 'prev' links from the 'head' section.",
					"id" => $shortname."_remove_nav_links",
					"std" => "false",
					"type" => "checkbox"); 

$options[] = array( "name" => "Remove Feeds Links",
					"desc" => "Remove links to post and comment feeds from the 'head' section.",
					"id" => $shortname."_remove_feeds",
					"std" => "false",
					"type" => "checkbox"); 

$options[] = array( "name" => "Remove Extra Feeds Links",
					"desc" => "Remove links to the extra feeds (category feed etc.) from the 'head' section.",
					"id" => $shortname."_remove_extra_feeds",
					"std" => "false",
					"type" => "checkbox"); 

$options[] = array( "name" => "Remove RSD Link",
					"desc" => "Remove links to the <a href='http://en.wikipedia.org/wiki/Really_Simple_Discovery' target='_blank'>Really Simple Discovery</a> service endpoint from the 'head' section.",
					"id" => $shortname."_remove_rsd",
					"std" => "false",
					"type" => "checkbox"); 

$options[] = array( "name" => "Remove WLW Manifest",
					"desc" => "Remove links to the Windows Live Writer manifest file from the 'head' section.",
					"id" => $shortname."_remove_wlw",
					"std" => "false",
					"type" => "checkbox"); 

$options[] = array( "name" => "Enable Shortcodes Preview",
					"desc" => "Enable the shortcodes code preview in the Shortcode Manager. Useful for testing or educational purposes.",
					"id" => $shortname."_shortcodes_preview",
					"std" => "false",
					"type" => "checkbox"); 

update_option('of_template', $options); 					  
update_option('of_themename', $themename);   
update_option('of_shortname', $shortname);

}
}
?>
