<?php
/**
 * Page Not Found (error 404) template.
 *
 */

get_header(); ?>
	
	<?php if((isset($e404_options['main_intro_type']) && $e404_options['main_intro_type'] != 'none')) echo '<div id="intro_wrapper">'; ?> 
		<?php include(OF_FILEPATH.'/main-intro-box.php'); ?> 
	<?php if((isset($e404_options['main_intro_type']) && $e404_options['main_intro_type'] != 'none')) echo '</div>'; ?>
	
	<div id="wrapper">
		<?php if($e404_options['breadcrumbs']) : ?><div id="breadcrumb"><?php e404_breadcrumbs(); ?></div><?php endif; ?>

		<div id="error" class="one_half">
			<p>
				<strong>404</strong>
				<span><?php _e('Page not Found', 'natural'); ?></span>
			</p>
		</div>
		<div id="error-info" class="one_half last">
			<p><?php _e('Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'natural'); ?></p>
			<div class="content-search">
				<form action="<?php echo home_url(); ?>" method="get">
					<input type="text" name="s" value="<?php _e('Search...', 'natural'); ?>" onfocus="if (this.value == '<?php _e('Search...', 'natural'); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Search...', 'natural'); ?>';}" />
					<input type="submit" value="<?php _e('Search', 'natural'); ?>" />
				</form>
			</div>
    		<hr class="divider-dotted" />
			<ul class="small-list small-dot">
				<li><?php printf(__('Go to the <a href="%1$s">homepage</a>', 'natural'), home_url()); ?></li>
    		</ul>
		</div>
		<br class="clear" />
	</div>

<?php get_footer(); ?>
