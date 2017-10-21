<?php

/**
 * @author Benjamin Barbier
 *
 */
class SplashImageBean {
	
	/**
	 * @var int
	 */
	private $id;
	
	/**
	 * @var bool
	 */
	private $wsi_display_always;

	/**
	 * @var bool
	 */
	private $wsi_hide_on_mobile_devices;	
	
	/**
	 * @var int
	 */
	private $wsi_idle_time;
	
	/**
	 * @var string
	 */
	private $url_splash_image;
	
	/**
	 * @var int
	 */
	private $splash_image_width;
	
	/**
	 * @var int
	 */
	private $splash_image_height;
	
	/**
	 * @var int
	 */
	private $wsi_margin_top;

	/**
	 * @var string
	 */
	private $splash_color;
	
	/**
	 * @var string : date de début d'affichage du splash au format ???
	 */
	private $datepicker_start;
	
	/**
	 * @var string
	 */
	private $datepicker_end;
	
	/**
	 * @var int
	 */
	private $wsi_display_time;
	
	/**
	 * @var bool
	 */
	private $wsi_fixed_splash;
	
	/**
	 * @var string
	 */
	private $wsi_picture_link_url;
	
	/**
	 * @var string
	 */
	private $wsi_picture_link_target;
	
	/**
	 * @var string
	 */
	private $wsi_include_url;
	
	/**
	 * @var bool
	 */
	private $wsi_close_on_esc_function;
	
	/**
	 * @var bool
	 */
	private $wsi_close_on_click_function;
	
	/**
	 * @var bool
	 */
	private $wsi_hide_cross;
	
	/**
	 * @var bool
	 */
	private $wsi_disable_shadow_border;
	
	/**
	 * @var string
	 */
	private $wsi_type;
	
	/**
	 * @var int
	 */
	private $wsi_opacity;
	
	/**
	 * @var string
	 */
	private $wsi_youtube;
	
	/**
	 * @var bool
	 */
	private $wsi_youtube_autoplay;
	
	/**
	 * @var bool
	 */
	private $wsi_youtube_loop;
	
	/**
	 * @var string
	 */
	private $wsi_yahoo;
	
	/**
	 * @var string
	 */
	private $wsi_dailymotion;
	
	/**
	 * @var string
	 */
	private $wsi_metacafe;
	
	/**
	 * @var string
	 */
	private $wsi_swf;
	
	/**
	 * @var string
	 */
	private $wsi_html;
	
	
	/**
	 * Getters & Setters
	 * Generated by http://www.shuchow.com/gettersetter.html
	 */
	public function getId() { return $this->id; }
	public function isWsi_display_always() { return $this->wsi_display_always; }
	public function isWsi_hide_on_mobile_devices() { return $this->wsi_hide_on_mobile_devices; }
	public function getWsi_idle_time() { return $this->wsi_idle_time; } 
	public function getUrl_splash_image() { return $this->url_splash_image; } 
	public function getSplash_image_width() { return $this->splash_image_width; } 
	public function getSplash_image_height() { return $this->splash_image_height; } 
	public function getWsi_margin_top() { return $this->wsi_margin_top; } 
	public function getSplash_color() { return $this->splash_color; } 
	public function getDatepicker_start() { return $this->datepicker_start; } 
	public function getDatepicker_end() { return $this->datepicker_end; } 
	public function getWsi_display_time() { return $this->wsi_display_time; } 
	public function isWsi_fixed_splash() { return $this->wsi_fixed_splash; } 
	public function getWsi_picture_link_url() { return $this->wsi_picture_link_url; } 
	public function getWsi_picture_link_target() { return $this->wsi_picture_link_target; }
	public function getWsi_include_url() { return $this->wsi_include_url; }
	public function isWsi_close_on_esc_function() { return $this->wsi_close_on_esc_function; }
	public function isWsi_close_on_click_function() { return $this->wsi_close_on_click_function; } 
	public function isWsi_hide_cross() { return $this->wsi_hide_cross; } 
	public function isWsi_disable_shadow_border() { return $this->wsi_disable_shadow_border; } 
	public function getWsi_type() { return $this->wsi_type; } 
	public function getWsi_opacity() { return $this->wsi_opacity; } 
	public function getWsi_youtube() { return $this->wsi_youtube; } 
	public function isWsi_youtube_autoplay() { return $this->wsi_youtube_autoplay; } 
	public function isWsi_youtube_loop() { return $this->wsi_youtube_loop; } 

	public function getWsi_yahoo() { return $this->wsi_yahoo; } 
	public function getWsi_dailymotion() { return $this->wsi_dailymotion; } 
	public function getWsi_metacafe() { return $this->wsi_metacafe; } 
	public function getWsi_swf() { return $this->wsi_swf; } 
	public function getWsi_html() { return $this->wsi_html; }
	public function setId($x) { $this->id = $x; }
	public function setWsi_display_always($x) { $this->wsi_display_always = $x; }
	public function setWsi_hide_on_mobile_devices($x) { $this->wsi_hide_on_mobile_devices = $x; }
	public function setWsi_idle_time($x) { $this->wsi_idle_time = $x; } 
	public function setUrl_splash_image($x) { $this->url_splash_image = $x; } 
	public function setSplash_image_width($x) { $this->splash_image_width = $x; } 
	public function setSplash_image_height($x) { $this->splash_image_height = $x; } 
	public function setWsi_margin_top($x) { $this->wsi_margin_top = $x; } 
	public function setSplash_color($x) { $this->splash_color = $x; } 
	public function setDatepicker_start($x) { $this->datepicker_start = $x; } 
	public function setDatepicker_end($x) { $this->datepicker_end = $x; } 
	public function setWsi_display_time($x) { $this->wsi_display_time = $x; } 
	public function setWsi_fixed_splash($x) { $this->wsi_fixed_splash = $x; } 
	public function setWsi_picture_link_url($x) { $this->wsi_picture_link_url = $x; } 
	public function setWsi_picture_link_target($x) { $this->wsi_picture_link_target = $x; } 
	public function setWsi_include_url($x) { $this->wsi_include_url = $x; }
	public function setWsi_close_on_esc_function($x) { $this->wsi_close_on_esc_function = $x; }
	public function setWsi_close_on_click_function($x) { $this->wsi_close_on_click_function = $x; } 
	public function setWsi_hide_cross($x) { $this->wsi_hide_cross = $x; } 
	public function setWsi_disable_shadow_border($x) { $this->wsi_disable_shadow_border = $x; } 
	public function setWsi_type($x) { $this->wsi_type = $x; } 
	public function setWsi_opacity($x) { $this->wsi_opacity = $x; } 
	public function setWsi_youtube($x) { $this->wsi_youtube = $x; } 
	public function setWsi_youtube_autoplay($x) { $this->wsi_youtube_autoplay = $x; } 
	public function setWsi_youtube_loop($x) { $this->wsi_youtube_loop = $x; } 
	public function setWsi_yahoo($x) { $this->wsi_yahoo = $x; } 
	public function setWsi_dailymotion($x) { $this->wsi_dailymotion = $x; } 
	public function setWsi_metacafe($x) { $this->wsi_metacafe = $x; } 
	public function setWsi_swf($x) { $this->wsi_swf = $x; } 
	public function setWsi_html($x) { $this->wsi_html = $x; } 
	
}

?>