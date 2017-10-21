<?php
// generate custom colors CSS
function e404_custom_colors_css() {
	global $e404_all_options, $background_textures, $header_pictures;
	
	$css = '<style type="text/css">'."\n";

	if(!empty($e404_all_options['e404_custom_background_texture'])) {
		$css .= "html {\n";
		$css .= "    background-image: url('".$e404_all_options['e404_custom_background_texture']."');\n";
		$css .= "    background-repeat: repeat;\n";
		$css .= "}\n";
		$css .= "body {\n";
		$css .= "    background: none;\n";
		$css .= "}\n";
	}
	elseif(!empty($e404_all_options['e404_background_texture'])) {
		$css .= "html  {\n";
		$css .= "    background-image: url('".str_replace('/mini', '', $background_textures[$e404_all_options['e404_background_texture']])."');\n";
		$css .= "    background-repeat: repeat;\n";
		$css .= "}\n";
		$css .= "body {\n";
		$css .= "    background: none;\n";
		$css .= "}\n";
	}

	if(!empty($e404_all_options['e404_custom_header_picture'])) {
		$css .= "#header_wrapper {\n";
		$css .= "    background-image: url('".$e404_all_options['e404_custom_header_picture']."');\n";
		$css .= "    background-repeat: no-repeat;\n";
		$css .= "    background-position: 50% 0;\n";
		$css .= "}\n";
	}
	elseif(!empty($e404_all_options['e404_header_picture'])) {
		$css .= "#header_wrapper {\n";
		$css .= "    background-image: url('".str_replace('/mini', '', $header_pictures[$e404_all_options['e404_header_picture']])."');\n";
		$css .= "    background-repeat: no-repeat;\n";
		$css .= "    background-position: 50% 0;\n";
		$css .= "}\n";
	}
	elseif(!empty($e404_all_options['e404_custom_header_texture'])) {
		$css .= "#header_wrapper {\n";
		$css .= "    background-image: url('".$e404_all_options['e404_custom_header_texture']."');\n";
		$css .= "    background-repeat: repeat;\n";
		$css .= "}\n";
	}
	elseif(!empty($e404_all_options['e404_header_texture'])) {
		$css .= "#header_wrapper {\n";
		$css .= "    background-image: url('".str_replace('/mini', '', $background_textures[$e404_all_options['e404_header_texture']])."');\n";
		$css .= "    background-repeat: repeat;\n";
		$css .= "}\n";
	}


	if($e404_all_options['e404_custom_style'] != 'true') {
		$css .= "</style>\n";
		echo $css;
		return;
	}

	if(!empty($e404_all_options['e404_color_background'])) {
		$css .= "html {\n    background-color: ".$e404_all_options['e404_color_background'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_color_main'])) {
		$css .= "html, body, form {\n    color: ".$e404_all_options['e404_color_main'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_color_links'])) {
		$css .= "a {\n    color: ".$e404_all_options['e404_color_links'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_color_links_hover'])) {
		$css .= "a:hover {\n    color: ".$e404_all_options['e404_color_links_hover'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_color_code'])) {
		$css .= "code {\n    color: ".$e404_all_options['e404_color_code'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_color_blockquote'])) {
		$css .= "blockquote {\n    color: ".$e404_all_options['e404_color_blockquote'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_color_headers'])) {
		$css .= "h1, h2, h3, h4, h5, h6 {\n    color: ".$e404_all_options['e404_color_headers'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_color_headers_links'])) {
		$css .= "h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {\n    color: ".$e404_all_options['e404_color_headers_links'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_color_headers_links_hover'])) {
		$css .= "h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover {\n    color: ".$e404_all_options['e404_color_headers_links_hover'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_color_footer_headers'])) {
		$css .= "#footer h1, #footer h2, #footer h3, #footer h4, #footer h5, #footer h6 {\n    color: ".$e404_all_options['e404_color_footer_headers'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_header_background'])) {
		$css .= "#header_wrapper {\n    background-color: ".$e404_all_options['e404_header_background'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_header_contact_background'])) {
		$css .= "#header_info {\n    background-color: ".$e404_all_options['e404_header_contact_background'].";\n}\n";
		$css .= "#header_wrapper {\n    border-top-color: ".$e404_all_options['e404_header_contact_background'].";\n}\n";
		$css .= "#header_tools, #social_icons a, #search {\n    border-color: ".$e404_all_options['e404_header_contact_background'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_header_contact_text'])) {
		$css .= "#header_info {\n    color: ".$e404_all_options['e404_header_contact_text'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_header_contact_text_strong'])) {
		$css .= "#header_info strong {\n    color: ".$e404_all_options['e404_header_contact_text_strong'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_header_social_icons_background'])) {
		$css .= "#header_tools, #social_icons a, #search {\n    background-color: ".$e404_all_options['e404_header_social_icons_background'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_menu_background'])) {
		$css .= "#navigation_wrapper {\n    background-color: ".$e404_all_options['e404_menu_background']."; }\n";
	}
	if(!empty($e404_all_options['e404_menu_links'])) {
		$css .= ".sf-menu a {\n    color: ".$e404_all_options['e404_menu_links']."; }\n";
	}
	if(!empty($e404_all_options['e404_menu_current_text'])) {
		$css .= ".sf-menu li:hover a, .sf-menu li.current-menu-item a, .sf-menu li.current-page-parent a, .sf-menu li.current-page-ancestor a, .sf-menu li.current_page_parent a {\n";
		$css .= "    color: ".$e404_all_options['e404_menu_current_text'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_menu_submenu_indicator'])) {
		$css .= ".sf-menu li li .sf-sub-indicator-inner {\n    border-left-color: ".$e404_all_options['e404_menu_submenu_indicator'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_menu_submenu_background'])) {
		$bgcolor = hex2RGB($e404_all_options['e404_menu_submenu_background']);
		$bgopacity = $e404_all_options['e404_menu_submenu_background_opacity'] / 100;
		$css .= ".sf-menu li ul {\n    background: rgb(".$bgcolor.");\n    background: rgba(".$bgcolor.", ".$bgopacity.");\n}\n";
	}
	if(!empty($e404_all_options['e404_menu_submenu_links'])) {
		$css .= ".sf-menu li:hover li a, .sf-menu li li a, .sf-menu li.current-menu-item li a, .sf-menu li.current-page-parent li a, .sf-menu li li.current-menu-item li a, .sf-menu li.current-page-ancestor li a, .sf-menu li.current-menu-parent li a, .sf-menu li.current-menu-ancestor li a {\n    color: ".$e404_all_options['e404_menu_submenu_links'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_menu_submenu_hover'])) {
		$css .= ".sf-menu li:hover li a:hover, .sf-menu li li.current-menu-item a {\n    color: ".$e404_all_options['e404_menu_submenu_hover'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_menu_submenu_hover_background'])) {
		$css .= ".sf-menu li:hover li:hover, .sf-menu li li.current-menu-item, .sf-menu li li.current-page-parent, .sf-menu li li.current-page-ancestor, .sf-menu li li.current_page_parent {\n";
		$css .= "    background-color: ".$e404_all_options['e404_menu_submenu_hover_background'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_icon_box_text'])) {
		$css .= ".icon-box span, .icon-button span {\n    color: ".$e404_all_options['e404_icon_box_text'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_content_box_background']) || !empty($e404_all_options['e404_content_box_border'])) {
		$css .= "#wrapper {\n";
		if(!empty($e404_all_options['e404_content_box_background']))
			$css .= "	background-color: ".$e404_all_options['e404_content_box_background'].";\n";
		if(!empty($e404_all_options['e404_content_box_border']))
			$css .= "	border-color: ".$e404_all_options['e404_content_box_border'].";\n";
		$css .= "}\n";
	}
	if(!empty($e404_all_options['e404_introbox_background']) || !empty($e404_all_options['e404_introbox_border'])) {
		$css .= "#intro_wrapper, #wide_header_wrapper {\n";
		if(!empty($e404_all_options['e404_introbox_background']))
			$css .= "	background-color: ".$e404_all_options['e404_introbox_background'].";\n";
		if(!empty($e404_all_options['e404_introbox_border']))
			$css .= "	border-color: ".$e404_all_options['e404_introbox_border'].";\n";
		$css .= "}\n";
	}
	if(!empty($e404_all_options['e404_introbox_text'])) {
		$css .= "#intro, #intro .icon-box span, #intro .icon-button span, #intro h1, #intro h2, #intro h3, #intro h4, #intro h5, #intro h6 {\n    color: ".$e404_all_options['e404_introbox_text'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_introbox_links'])) {
		$css .= "#intro a, #intro h1 a, #intro h2 a, #intro h3 a, #intro h4 a, #intro h5 a, #intro h6 a {\n    color: ".$e404_all_options['e404_introbox_links'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_wppagenavi_text'])) {
		$css .= ".wp-pagenavi a.first, .wp-pagenavi a.last, .wp-pagenavi a.previouspostslink, .wp-pagenavi a.nextpostslink {\n    color: ".$e404_all_options['e404_wppagenavi_text']." !important;\n}\n";
	}
	if(!empty($e404_all_options['e404_wppagenavi_background'])) {
		$css .= ".wp-pagenavi a.first, .wp-pagenavi a.last, .wp-pagenavi a.previouspostslink, .wp-pagenavi a.nextpostslink {\n    background-color: ".$e404_all_options['e404_wppagenavi_background'].";\n}\n";
		$css .= ".wp-pagenavi a.last, .wp-pagenavi a.nextpostslink {\n    border-color: ".$e404_all_options['e404_wppagenavi_background'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_wppagenavi_hover_text'])) {
		$css .= ".wp-pagenavi a:hover, .wp-pagenavi span.current {\n    color: ".$e404_all_options['e404_wppagenavi_hover_text']." !important;\n}\n";
	}
	if(!empty($e404_all_options['e404_wppagenavi_hover_background'])) {
		$css .= ".wp-pagenavi a:hover, .wp-pagenavi span.current {\n    background-color: ".$e404_all_options['e404_wppagenavi_hover_background'].";\n}\n";
		$css .= ".wp-pagenavi a.last:hover, .wp-pagenavi a.nextpostslink:hover {\n    border-color: ".$e404_all_options['e404_wppagenavi_hover_background'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_blog_date_text']) || !empty($e404_all_options['e404_blog_date_background'])) {
		$css .= ".meta-date {\n";
		if(!empty($e404_all_options['e404_blog_date_text']))
			$css .= "    color: ".$e404_all_options['e404_blog_date_text'].";\n";
		if(!empty($e404_all_options['e404_blog_date_background']))
			$css .= "    background-color: ".$e404_all_options['e404_blog_date_background'].";\n";
		$css .= "}\n";
	}
	if(!empty($e404_all_options['e404_sticky_blog_date_text']) || !empty($e404_all_options['e404_sticky_blog_date_background'])) {
		$css .= ".sticky .meta-date {\n";
		if(!empty($e404_all_options['e404_sticky_blog_date_text']))
			$css .= "    color: ".$e404_all_options['e404_sticky_blog_date_text'].";\n";
		if(!empty($e404_all_options['e404_sticky_blog_date_background']))
			$css .= "    background-color: ".$e404_all_options['e404_sticky_blog_date_background'].";\n";
		$css .= "}\n";
	}
	if(!empty($e404_all_options['e404_tags_text']) || !empty($e404_all_options['e404_tags_background'])) {
		$css .= ".tags-meta a {\n";
		if(!empty($e404_all_options['e404_tags_text']))
			$css .= "    color: ".$e404_all_options['e404_tags_text']." !important;\n";
		if(!empty($e404_all_options['e404_tags_background']))
			$css .= "    background-color: ".$e404_all_options['e404_tags_background'].";\n";
		$css .= "}\n";
	}
	if(!empty($e404_all_options['e404_tags_hover_text']) || !empty($e404_all_options['e404_tags_hover_background'])) {
		$css .= ".tags-meta a:hover {\n";
		if(!empty($e404_all_options['e404_tags_hover_text']))
			$css .= "    color: ".$e404_all_options['e404_tags_hover_text']." !important;\n";
		if(!empty($e404_all_options['e404_tags_hover_background']))
			$css .= "    background-color: ".$e404_all_options['e404_tags_hover_background'].";\n";
		$css .= "}\n";
	}
	if(!empty($e404_all_options['e404_readmore_text']) || !empty($e404_all_options['e404_readmore_background'])) {
		$css .= ".more a, .more span.comments-link {\n";
		if(!empty($e404_all_options['e404_readmore_text']))
			$css .= "    color: ".$e404_all_options['e404_readmore_text']." !important;\n";
		if(!empty($e404_all_options['e404_readmore_background']))
			$css .= "    background-color: ".$e404_all_options['e404_readmore_background'].";\n";
		$css .= "}\n";
	}
	if(!empty($e404_all_options['e404_readmore_hover_text']) || !empty($e404_all_options['e404_readmore_hover_background'])) {
		$css .= ".more a:hover, .more span.comments-link:hover {\n";
		if(!empty($e404_all_options['e404_readmore_hover_text']))
			$css .= "    color: ".$e404_all_options['e404_readmore_hover_text']." !important;\n";
		if(!empty($e404_all_options['e404_readmore_hover_background']))
			$css .= "    background-color: ".$e404_all_options['e404_readmore_hover_background'].";\n";
		$css .= "}\n";
	}
	if(!empty($e404_all_options['e404_reply_text']) || !empty($e404_all_options['e404_reply_background'])) {
		$css .= ".comment-reply a {\n";
		if(!empty($e404_all_options['e404_reply_text']))
			$css .= "    color: ".$e404_all_options['e404_reply_text']." !important;\n";
		if(!empty($e404_all_options['e404_reply_background']))
			$css .= "    background-color: ".$e404_all_options['e404_reply_background'].";\n";
		$css .= "}\n";
	}
	if(!empty($e404_all_options['e404_reply_hover_text']) || !empty($e404_all_options['e404_reply_hover_background'])) {
		$css .= ".comment-reply a:hover {\n";
		if(!empty($e404_all_options['e404_reply_hover_text']))
			$css .= "    color: ".$e404_all_options['e404_reply_hover_text']." !important;\n";
		if(!empty($e404_all_options['e404_reply_hover_background']))
			$css .= "    background-color: ".$e404_all_options['e404_reply_hover_background'].";\n";
		$css .= "}\n";
	}
	if(!empty($e404_all_options['e404_tabs_text']) || !empty($e404_all_options['e404_tabs_background'])) {
		$css .= ".tabs a {\n";
		if(!empty($e404_all_options['e404_tabs_text']))
			$css .= "    color: ".$e404_all_options['e404_tabs_text']." !important;\n";
		if(!empty($e404_all_options['e404_tabs_background']))
			$css .= "    background-color: ".$e404_all_options['e404_tabs_background'].";\n";
		$css .= "}\n";
	}
	if(!empty($e404_all_options['e404_tabs_hover_text']) || !empty($e404_all_options['e404_tabs_hover_background'])) {
		$css .= ".tabs a:hover, .tabs li.current a {\n";
		if(!empty($e404_all_options['e404_tabs_hover_text']))
			$css .= "    color: ".$e404_all_options['e404_tabs_hover_text']." !important;\n";
		if(!empty($e404_all_options['e404_tabs_hover_background']))
			$css .= "    background-color: ".$e404_all_options['e404_tabs_hover_background'].";\n";
		$css .= "}\n";
	}
	if(!empty($e404_all_options['e404_ssbuttons_text']) || !empty($e404_all_options['e404_ssbuttons_background'])) {
		$css .= "a.browse, .icon-btn, a.like_this, a.disabled:hover, #wp-calendar #prev a, #wp-calendar #next a {\n";
		if(!empty($e404_all_options['e404_ssbuttons_text']))
			$css .= "    color: ".$e404_all_options['e404_ssbuttons_text']." !important;\n";
		if(!empty($e404_all_options['e404_ssbuttons_background']))
			$css .= "    background-color: ".$e404_all_options['e404_ssbuttons_background'].";\n";
		$css .= "}\n";
	}
	if(!empty($e404_all_options['e404_ssbuttons_hover_text']) || !empty($e404_all_options['e404_ssbuttons_hover_background'])) {
		$css .= "a.like_this:hover, a.browse:hover, a.fancy_likes_you_like, #wp-calendar #prev a:hover, #wp-calendar #next a:hover {\n";
		if(!empty($e404_all_options['e404_ssbuttons_hover_text']))
			$css .= "    color: ".$e404_all_options['e404_ssbuttons_hover_text']." !important;\n";
		if(!empty($e404_all_options['e404_ssbuttons_hover_background']))
			$css .= "    background-color: ".$e404_all_options['e404_ssbuttons_hover_background'].";\n";
		$css .= "}\n";
	}
	if(!empty($e404_all_options['e404_ssbuttons_background'])) {
		$bgcolor = hex2RGB($e404_all_options['e404_ssbuttons_background']);
		$css .= ".fancy_meta a, .flex-direction-nav li a, .rslides_nav {\n    background-color: rgb(".$bgcolor.");\n    background-color: rgba(".$bgcolor.", 0.8);\n}\n";
	}
	if(!empty($e404_all_options['e404_ssbuttons_hover_background'])) {
		$bgcolor = hex2RGB($e404_all_options['e404_ssbuttons_hover_background']);
		$css .= ".fancy_meta a.fancy_likes_you_like, .fancy_meta a:hover, .flex-direction-nav li a:hover, .rslides_nav:hover {\n    background-color: rgb(".$bgcolor.");\n    background-color: rgba(".$bgcolor.", 0.8);\n}\n";
	}
	if(!empty($e404_all_options['e404_widgets_text']) || !empty($e404_all_options['e404_widgets_background']) || !empty($e404_all_options['e404_widgets_border'])) {
		$css .= "#sidebar .widgets {\n";
		if(!empty($e404_all_options['e404_widgets_text']))
			$css .= "    color: ".$e404_all_options['e404_widgets_text'].";\n";
		if(!empty($e404_all_options['e404_widgets_background']))
			$css .= "    background-color: ".$e404_all_options['e404_widgets_background'].";\n";
		if(!empty($e404_all_options['e404_widgets_border']))
			$css .= "    border-color: ".$e404_all_options['e404_widgets_border'].";\n";
		$css .= "}\n";
	}
	if(!empty($e404_all_options['e404_widgets_headers'])) {
		$css .= "#sidebar .widgets h1, #sidebar .widgets h2, #sidebar .widgets h3, #sidebar .widgets h4, #sidebar .widgets h5, #sidebar .widgets h6 {\n    color: ".$e404_all_options['e404_widgets_headers'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_widgets_span'])) {
		$css .= "#sidebar .widgets .icon-box span, #sidebar .widgets .icon-button span {\n    color: ".$e404_all_options['e404_widgets_span'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_widgets_links'])) {
		$css .= "#sidebar .widgets a {\n    color: ".$e404_all_options['e404_widgets_links'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_widgets_headers_links'])) {
		$css .= "#sidebar .widgets h1 a, #sidebar .widgets h2 a, #sidebar .widgets h3 a, #sidebar .widgets h4 a, #sidebar .widgets h5 a, #sidebar .widgets h6 a {\n    color: ".$e404_all_options['e404_widgets_headers_links'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_htextboxes_text']) || !empty($e404_all_options['e404_htextboxes_background']) || !empty($e404_all_options['e404_htextboxes_border'])) {
		$css .= ".fancy-box, .toggle_content, .accordion_content, .person-box, .testimonial-box, #post-author, .galleria-container {\n";
		if(!empty($e404_all_options['e404_htextboxes_text']))
			$css .= "    color: ".$e404_all_options['e404_htextboxes_text'].";\n";
		if(!empty($e404_all_options['e404_htextboxes_background']))
			$css .= "    background-color: ".$e404_all_options['e404_htextboxes_background'].";\n";
		if(!empty($e404_all_options['e404_htextboxes_border']))
			$css .= "    border-color: ".$e404_all_options['e404_htextboxes_border'].";\n";
		$css .= "}\n";
	}
	if(!empty($e404_all_options['e404_htextboxes_headers'])) {
		$css .= ".fancy-box h1,.toggle_content h1,.accordion_content h1,.person-box h1,.testimonial-box h1,#post-author h1,
.fancy-box h2,.toggle_content h2,.accordion_content h2,.person-box h2,.testimonial-box h2,#post-author h2,
.fancy-box h3,.toggle_content h3,.accordion_content h3,.person-box h3,.testimonial-box h3,#post-author h3,
.fancy-box h4,.toggle_content h4,.accordion_content h4,.person-box h4,.testimonial-box h4,#post-author h4,
.fancy-box h5,.toggle_content h5,.accordion_content h5,.person-box h5,.testimonial-box h5,#post-author h5,
.fancy-box h6,.toggle_content h6,.accordion_content h6,.person-box h6,.testimonial-box h6,#post-author h6 {\n    color: ".$e404_all_options['e404_htextboxes_headers'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_htextboxes_span'])) {
		$css .= ".fancy-box .icon-box span,.toggle_content .icon-box span,.accordion_content .icon-box span,.person-box .icon-box span,.testimonial-box .icon-box span,#post-author .icon-box span,
.fancy-box .icon-button span, .toggle_content .icon-button span,.accordion_content .icon-button span,.person-box .icon-button span,.testimonial-box .icon-button span,#post-author .icon-button span,
.person-box .person-info,.testimonial-box .comment-info {\n    color: ".$e404_all_options['e404_htextboxes_span'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_htextboxes_links'])) {
		$css .= ".fancy-box a,.toggle_content a,.accordion_content a,.person-box a,.testimonial-box a,#post-author a  {\n    color: ".$e404_all_options['e404_htextboxes_links'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_htextboxes_headers_links'])) {
		$css .= ".fancy-box h1 a,.toggle_content h1 a,.accordion_content h1 a,.person-box h1 a,.testimonial-box h1 a,#post-author h1 a,
.fancy-box h2 a,.toggle_content h2 a,.accordion_content h2 a,.person-box h2 a,.testimonial-box h2 a,#post-author h2 a,
.fancy-box h3 a,.toggle_content h3 a,.accordion_content h3 a,.person-box h3 a,.testimonial-box h3 a,#post-author h3 a,
.fancy-box h4 a,.toggle_content h4 a,.accordion_content h4 a,.person-box h4 a,.testimonial-box h4 a,#post-author h4 a,
.fancy-box h5 a,.toggle_content h5 a,.accordion_content h5 a,.person-box h5 a,.testimonial-box h5 a,#post-author h5 a,
.fancy-box h6 a,.toggle_content h6 a,.accordion_content h6 a,.person-box h6 a,.testimonial-box h6 a,#post-author h6 a {\n    color: ".$e404_all_options['e404_htextboxes_headers_links'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_2ndgrade_links'])) {
		$css .= ".fancy_categories a, .posted-meta a, #breadcrumb a, .blog-likes a.like_this:hover, .comment-date a {\n    color: ".$e404_all_options['e404_2ndgrade_links']." !important;\n}\n";
	}
	if(!empty($e404_all_options['e404_twitter_icon_variant'])) {
		$css .= "#footer .tweets li, .twitter-intro p, .twitter-box p {\n    background-image: url('".OF_DIRECTORY.'/images/twitter-intro-'.$e404_all_options['e404_twitter_icon_variant'].".png');\n}\n";
	}
	if(!empty($e404_all_options['e404_submit_background']) || !empty($e404_all_options['e404_submit_text']) || !empty($e404_all_options['e404_submit_border'])) {
		$css .= "form input[type=\"submit\"] {\n";
		if(!empty($e404_all_options['e404_submit_background']))
			$css .= "    background-color: ".$e404_all_options['e404_submit_background'].";\n";
		if(!empty($e404_all_options['e404_submit_text']))
			$css .= "    color: ".$e404_all_options['e404_submit_text'].";\n";
		if(!empty($e404_all_options['e404_submit_border']))
			$css .= "    border-color: ".$e404_all_options['e404_submit_border'].";\n";
		$css .= "}\n";
	}
	if(!empty($e404_all_options['e404_submit_background_footer']) || !empty($e404_all_options['e404_submit_text_footer']) || !empty($e404_all_options['e404_submit_border_footer'])) {
		$css .= "#footer form input[type=\"submit\"] {\n";
		if(!empty($e404_all_options['e404_submit_background_footer']))
			$css .= "    background-color: ".$e404_all_options['e404_submit_background_footer'].";\n";
		if(!empty($e404_all_options['e404_submit_text_footer']))
			$css .= "    color: ".$e404_all_options['e404_submit_text_footer'].";\n";
		if(!empty($e404_all_options['e404_submit_border_footer']))
			$css .= "    border-color: ".$e404_all_options['e404_submit_border_footer'].";\n";
		$css .= "}\n";
	}
	if(!empty($e404_all_options['e404_forms_background']) || !empty($e404_all_options['e404_forms_text']) || !empty($e404_all_options['e404_forms_border'])) {
		$css .= "form input[type=\"text\"], form input[type=\"password\"], textarea, select {\n";
		if(!empty($e404_all_options['e404_forms_background']))
			$css .= "    background-color: ".$e404_all_options['e404_forms_background'].";\n";
		if(!empty($e404_all_options['e404_forms_text']))
			$css .= "    color: ".$e404_all_options['e404_forms_text']." !important;\n";
		if(!empty($e404_all_options['e404_forms_border']))
			$css .= "    border-color: ".$e404_all_options['e404_forms_border'].";\n";
		$css .= "}\n";
	}
	if(!empty($e404_all_options['e404_forms_background_footer']) || !empty($e404_all_options['e404_forms_text_footer']) || !empty($e404_all_options['e404_forms_border_footer'])) {
		$css .= "#footer form input[type=\"text\"], #footer form input[type=\"password\"], #footer textarea, #footer select {\n";
		if(!empty($e404_all_options['e404_forms_background_footer']))
			$css .= "    background-color: ".$e404_all_options['e404_forms_background_footer'].";\n";
		if(!empty($e404_all_options['e404_forms_text_footer']))
			$css .= "    color: ".$e404_all_options['e404_forms_text_footer']." !important;\n";
		if(!empty($e404_all_options['e404_forms_border_footer']))
			$css .= "    border-color: ".$e404_all_options['e404_forms_border_footer'].";\n";
		$css .= "}\n";
	}
	if(!empty($e404_all_options['e404_search_box_text'])) {
		$css .= "#search form input[type=\"text\"] {\n    color: ".$e404_all_options['e404_search_box_text']." !important;\n}\n";
	}
	if(!empty($e404_all_options['e404_alternative_nav_text']) || !empty($e404_all_options['e404_alternative_nav_border']) || !empty($e404_all_options['e404_alternative_nav_background'])) {
		$css .= "#navigation select, #navigation option {\n";
		if(!empty($e404_all_options['e404_alternative_nav_background']))
			$css .= "    background-color: ".$e404_all_options['e404_alternative_nav_background'].";\n";
		if(!empty($e404_all_options['e404_alternative_nav_text']))
			$css .= "    color: ".$e404_all_options['e404_alternative_nav_text']." !important;\n";
		if(!empty($e404_all_options['e404_alternative_nav_border']))
			$css .= "    border-color: ".$e404_all_options['e404_alternative_nav_border'].";\n";
		$css .= "}\n";
	}
	if(!empty($e404_all_options['e404_footer_text'])) {
		$css .= "#footer, #footer form {\n    color: ".$e404_all_options['e404_footer_text'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_footer_links'])) {
		$css .= "#footer a {\n    color: ".$e404_all_options['e404_footer_links'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_footer_background'])) {
		$css .= "#footer_wrapper {\n    background-color: ".$e404_all_options['e404_footer_background'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_footer_top_border'])) {
		$css .= "#footer_wrapper {\n    border-top-color: ".$e404_all_options['e404_footer_top_border'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_footer_nav_links'])) {
		$css .= "#copyright #footer_nav a {\n    color: ".$e404_all_options['e404_footer_nav_links'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_footer_nav_divider'])) {
		$css .= "#footer_nav li, #copyright hr {\n    border-color: ".$e404_all_options['e404_footer_nav_divider'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_copyright_text'])) {
		$css .= "#copyright {\n    color: ".$e404_all_options['e404_copyright_text'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_copyright_links'])) {
		$css .= "#copyright a {\n    color: ".$e404_all_options['e404_copyright_links'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_copyright_background'])) {
		$css .= "#copyright_wrapper {\n    background-color: ".$e404_all_options['e404_copyright_background'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_copyright_top_border'])) {
		$css .= "#copyright_wrapper {\n    border-top-color: ".$e404_all_options['e404_copyright_top_border'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_pricebox_featured_border'])) {
		$css .= ".featured-box {\n    border-color: ".$e404_all_options['e404_pricebox_featured_border']." !important;\n}\n";
	}
	if(!empty($e404_all_options['e404_pricebox_featured_price'])) {
		$css .= ".featured-box strong {\n    color: ".$e404_all_options['e404_pricebox_featured_price']." !important;\n}\n";
	}
	if(!empty($e404_all_options['e404_pricebox_border_hover'])) {
		$css .= ".pricebox:hover, .featured-box:hover {\n    border-color: ".$e404_all_options['e404_pricebox_border_hover']." !important;\n}\n";
	}
	if(!empty($e404_all_options['e404_pricebox_header_text_hover'])) {
		$css .= ".pricebox:hover h3, #wrapper .featured-box:hover h3 {\n    background-color: ".$e404_all_options['e404_pricebox_header_text_hover']." !important;\n}\n";
	}
	if(!empty($e404_all_options['e404_pricebox_header_background_hover'])) {
		$css .= ".pricebox:hover strong, #wrapper .featured-box:hover strong  {\n    color: ".$e404_all_options['e404_pricebox_header_background_hover']." !important;\n}\n";
	}
	if(!empty($e404_all_options['e404_pricebox_featured_header_text']) || !empty($e404_all_options['e404_pricebox_featured_header_background'])) {
		$css .= ".featured-box h3 {\n";
		if(!empty($e404_all_options['e404_pricebox_featured_header_text']))
			$css .= "    color: ".$e404_all_options['e404_pricebox_featured_header_text']." !important;\n";
		if(!empty($e404_all_options['e404_pricebox_featured_header_background']))
			$css .= "    background: ".$e404_all_options['e404_pricebox_featured_header_background']." !important;\n";
		$css .= "}\n";
	}
	if(!empty($e404_all_options['e404_portfolio_nav_color'])) {
		$css .= ".current_page_item_li a, #pcats li a:hover {\n    color: ".$e404_all_options['e404_portfolio_nav_color'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_portfolio_nav_underline'])) {
		$css .= "#magic-line {\n    background: ".$e404_all_options['e404_portfolio_nav_underline'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_horizontal_lines'])) {
		$css .= ".divider-dotted, .portfolio .tags-meta, .price-body .dotted, #wrapper .post-list li {\n    background-image: url('".OF_DIRECTORY.'/'.$e404_all_options['e404_horizontal_lines']."');\n}\n";
	}
	if(!empty($e404_all_options['e404_dividers_color'])) {
		$css .= "#magic-line {\n    background: ".$e404_all_options['e404_dividers_color'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_go_to_top_color'])) {
		$css .= ".divider-top a {\n    color: ".$e404_all_options['e404_go_to_top_color'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_go_to_top_hover_color'])) {
		$css .= ".divider-top a:hover {\n    color: ".$e404_all_options['e404_go_to_top_hover_color'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_fancy_header_line_color'])) {
		$css .= ".fancy-header, .fancy-header-wrapper, #sidebar h3, .widgets h3, hr, .divider-top, .divider-full, blockquote, .comment-text, .person-text, .post-header {\n    border-color: ".$e404_all_options['e404_fancy_header_line_color'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_fancy_header_underline_color'])) {
		$css .= ".fancy-header span {\n    border-color: ".$e404_all_options['e404_fancy_header_underline_color'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_footer_header_line_color'])) {
		$css .= "#footer h3 {\n    border-color: ".$e404_all_options['e404_footer_header_line_color'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_sliders_text'])) {
		$css .= ".flex-caption, .rscaption {\n    color: ".$e404_all_options['e404_sliders_text'].";\n}\n";
	}
	if(!empty($e404_all_options['e404_sliders_background'])) {
		$css .= ".scrollable-pagination a, .flex-control-nav li a, .ei-slider-thumbs li a, .rslides_tabs a {\n    background-color: ".$e404_all_options['e404_sliders_background'].";\n}\n";
		$bgcolor = hex2RGB($e404_all_options['e404_sliders_background']);
		$css .= ".flex-caption, .rscaption {\n    background-color: rgb(".$bgcolor.");\n    background-color: rgba(".$bgcolor.", 0.8);\n}\n";
	}
	if(!empty($e404_all_options['e404_sliders_pagination'])) {
		$css .= ".scrollable-pagination a:hover, .scrollable-pagination a.selected, .flex-control-nav li a:hover, .flex-control-nav li a.active, .ei-slider-thumbs li a:hover, .ei-slider-thumbs li.ei-slider-element, .rslides_tabs a:hover, .rslides_tabs .rslides_here a {\n    background-color: ".$e404_all_options['e404_sliders_pagination'].";\n}\n";
	}

	$css .= "</style>\n";
	
	echo $css;
}
add_action('wp_head', 'e404_custom_colors_css');
