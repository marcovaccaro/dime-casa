<?php
/**
 * Template name: Portfolio - 3 columns without sidebar
 *
 */

get_header(); ?>
	
	<?php if((isset($e404_options['portfolio_intro_type']) && $e404_options['portfolio_intro_type'] != 'none')) echo '<div id="intro_wrapper">'; ?> 
		<?php include(OF_FILEPATH.'/portfolio-intro-box.php'); ?> 
	<?php if((isset($e404_options['portfolio_intro_type']) && $e404_options['portfolio_intro_type'] != 'none')) echo '</div>'; ?>
	
	<div id="wrapper">
		<?php if($e404_options['breadcrumbs']) : ?><div id="breadcrumb"><?php e404_breadcrumbs(); ?></div><?php endif; ?>
	
		<div class="portfolio portfolio-columns">
<?php
$query = "paged=".$paged."&post_type=portfolio&orderby=menu_order date&posts_per_page=".$e404_options['portfolio_posts_per_page'];
if(isset($taxonomy))
	$query .= "&taxonomy=".$taxonomy;
if(isset($term))
	$query .= "&term=".$term;
$i = 0;
$custom_query = new WP_Query($query);
if($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); $i++; ?>
				<div class="one_third<?php if($i % 3 == 0) echo ' last'; ?>">
					<div class="portfolio-item" id="post-<?php the_ID(); ?>">
						<?php
						$preview_url = e404_get_portfolio_preview_url($post->ID);
						if (has_post_thumbnail()) {
							$large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
							$img_shortcode = '[image align="none" href="'.get_permalink().'" title="'.the_title_attribute('echo=0').'" width="358"';
							if(!empty($e404_options['portfolio_thumbnails_height']) && $e404_options['portfolio_thumbnails_height'] > 0)
								$img_shortcode .= ' height="'.$e404_options['portfolio_thumbnails_height'].'"';
							else
								$img_shortcode .= ' height="188"';
							$img_shortcode .= ']'.$large_image_url[0].'[/image]';
							echo do_shortcode($img_shortcode);
						} ?>
						<?php if($e404_options['portfolio_titles']) : ?><div class="portfolio_item_header"><h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3></div><?php endif; ?>

						<?php get_template_part('meta', 'portfolio'); ?>

					</div>
				</div>
				<?php if($i % 3 == 0) echo '<br class="clear" />'; ?>
<?php endwhile; wp_reset_query(); ?>
			<?php if($i % 3 != 0) echo '<br class="clear" />'; ?>
<?php else :
			_e('Nothing Found', 'natural');
endif; ?>
			
		</div>

			<?php get_template_part('navigation', 'portfolio'); ?>

		<br class="clear" />
	</div>

<?php get_footer(); ?>
