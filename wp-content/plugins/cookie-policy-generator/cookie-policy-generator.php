<?php 
/**
 * Plugin Name: Cookie Policy Generator
 * Plugin URI: https://nibirumail.com/cookies/
 * Description: Using Cookie Policy Generator is really simple. Our plugin will advice your visitors of your cookie policy and will generate an external page (hosted free) that will inform them about your cookies. This plugin is proudly served by Nibirumail.com - Build online utilities. Faster.
 * Version: 0.9
 * Author: Lenus Media
 * Author URI: http://www.lenus.it
 * Text Domain: nibirumail
 * Network: true
 * License: GPL2
Copyright 2015 Lenus Media (email : support@lenusmedia.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

defined( 'ABSPATH' ) or die( 'Are you kidding me?' );
add_action( 'admin_menu', 'nibirumail__add_admin_menu' );
add_action( 'admin_init', 'nibirumail__settings_init' );
function nibirumail__load_widget() {
	$options = get_option( 'nibirumail__settings' );
	if (trim($options['custom_advice_text']) != ''){
		echo '<script type="text/javascript">var nibirumail_advice_text = \''. addslashes($options['custom_advice_text']) .'\'</script>';
	}
	if (trim($options['custom_privacy_policy_url']) != ''){
		echo '<script type="text/javascript">var cookie_policy_url = \''. addslashes($options['cookie_policy_url']) .'\'</script>';
	}
	wp_enqueue_script('nibirumail_widget', 'https://nibirumail.com/docs/scripts/nibirumail.cookie.min.js', '', '0.9', true); 
}
add_action( 'wp_enqueue_scripts', 'nibirumail__load_widget' ); 


function nibirumail__add_admin_menu(  ) { 
	add_options_page( 'Cookie Policy Generator', 'Cookie Policy Generator', 'manage_options', 'cookie_policy_generator', 'nibirumail__options_page' );
}


function nibirumail__settings_init(  ) { 
	register_setting( 'pluginPage', 'nibirumail__settings' );
	add_settings_section('nibirumail__pluginPage_section', __( 'General Settings', 'nibirumail' ), 'nibirumail__settings_section_callback', 'pluginPage');
	add_settings_field('nibirumail__custom_privacy_policy_url', __( 'Custom Cookie Privacy URL', 'nibirumail' ), 'nibirumail__custom_privacy_policy_url_render', 'pluginPage', 'nibirumail__pluginPage_section' );
	add_settings_field('nibirumail__custom_advice_text', __( 'Custom Advice Text', 'nibirumail' ), 'nibirumail__custom_advice_text_render', 'pluginPage', 'nibirumail__pluginPage_section' );
	add_settings_field('nibirumail__likeus', __( 'Need Support?', 'nibirumail' ), 'nibirumail__likeus_render', 'pluginPage', 'nibirumail__pluginPage_section' );

}
function nibirumail__custom_privacy_policy_url_render(  ) { 
	$options = get_option( 'nibirumail__settings' );
	?>
	<input type="text" class="regular-text" name="nibirumail__settings[custom_privacy_policy_url]" placeholder="https://nibirumail.com/docs/scripts/nibirumail.cookie.min.js" value="<?php echo $options["custom_privacy_policy_url"]; ?>" /><br /> 
	<p><span class="description"><?php echo __( 'You can change the default Cookie Policy Url here. This link will be opened in a _blank page.', 'nibirumail' ) ?></span></p>
	<?php

}
function nibirumail__custom_advice_text_render(  ) { 
	$options = get_option( 'nibirumail__settings' );
	?>
	<textarea cols="40" rows="5" name="nibirumail__settings[custom_advice_text]"><?php echo $options["custom_advice_text"]; ?></textarea>
	<p><span class="description"><?php echo __( 'You can use HTML to manage links and text-formatting. Read more on <a target="_blank" href="https://nibirumail.com/cookies/">https://nibirumail.com/cookies/</a>. This setting will override your Custom Cookie Policy URL.', 'nibirumail' ) ?></span></p>
	<?php

}

function nibirumail__likeus_render(  ) { 
	?>
	<div class="fb-page" data-href="https://www.facebook.com/nibirumail" data-width="100%" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/nibirumail"><a href="https://www.facebook.com/nibirumail">Nibirumail</a></blockquote></div></div>
	<p><span class="description"><?php echo __( 'For all your enquires in Italian, English and Spanish, please visit our Facebook Fan Page!.', 'nibirumail' ) ?></span></p>
	<?php

}
function nibirumail__settings_section_callback(  ) { 
	echo '<p>'. __( '<strong>Cookie Policy Generator is running on your website.</strong> If you need to customize Cookie Policy URL or edit the default advice you can use the form below. Enjoy!', 'nibirumail' ) .'</p>';
	echo '<p>'. __( 'Support our website for more and more amazing online utilities!', 'nibirumail' ) . '</p>';
	?>
	<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/it_IT/sdk.js#xfbml=1&version=v2.3&appId=246967871987191";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
	<?php 
}
function nibirumail__options_page(  ) { 

	?>
	<form action='options.php' method='post'>
		
		<h2>Cookie Policy Generator</h2>
		<?php
		settings_fields( 'pluginPage' );
		do_settings_sections( 'pluginPage' );
		submit_button();
		?>
		
	</form>
	<?php
}