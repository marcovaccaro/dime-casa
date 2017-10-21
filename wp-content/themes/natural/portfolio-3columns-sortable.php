<?php
/**
 * Template name: Portfolio - 3 columns sortable
 *
 */

get_header(); ?>
	
	<?php if((isset($e404_options['portfolio_intro_type']) && $e404_options['portfolio_intro_type'] != 'none')) echo '<div id="intro_wrapper">'; ?> 
		<?php include(OF_FILEPATH.'/portfolio-intro-box.php'); ?> 
	<?php if((isset($e404_options['portfolio_intro_type']) && $e404_options['portfolio_intro_type'] != 'none')) echo '</div>'; ?>
	
	<div id="wrapper" class="portfolio-sortable">
		<?php if($e404_options['breadcrumbs']) : ?><div id="breadcrumb"><?php e404_breadcrumbs(); ?></div><?php endif; ?>
	
		<div class="nav-wrap group">
			<ul id="pcats">
				<li class="current_page_item_li"><a href="#" rel="all"><?php _e('All', 'natural'); ?></a></li>
<?php
		$params = 'title_li=&taxonomy=portfolio-category';
		$params .= '&hierarchical=0';
		$categories = get_categories($params);
		
		foreach($categories as $category) {
			?>
			<li><a href="#" rel="<?php echo $category->slug; ?>" class="pcat"><?php echo $category->name; ?></a></li>
			<?php
		}
?>
			</ul>
		</div>
	
		<ul id="items" class="portfolio portfolio-columns">
<?php
$query = "paged=".$paged."&post_type=portfolio&orderby=menu_order date&nopaging=true";
if(isset($taxonomy))
	$query .= "&taxonomy=".$taxonomy;
if(isset($term))
	$query .= "&term=".$term;
$i = 0;
$custom_query = new WP_Query($query);
if($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); $i++;
				$item_categories = get_the_terms($post->ID, 'portfolio-category');
				$cats = '';
				if(is_array($item_categories)) {
					foreach($item_categories as $item_category)
						$cats .= ' '.$item_category->slug;
				}
				?>
				<li class="one_third portfolio-item-li<?php if($i % 3 == 0) echo ' last'; echo $cats; ?>" id="post-<?php the_ID(); ?>">
					<div class="portfolio-item">
						<?php
						$preview_url = e404_get_portfolio_preview_url($post->ID);
						if (has_post_thumbnail()) {
							$large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
							$img_shortcode = '[image align="none" href="'.get_permalink().'" title="'.the_title_attribute('echo=0').'" width="358" height="188"';
							$img_shortcode .= ']'.$large_image_url[0].'[/image]';
							echo do_shortcode($img_shortcode);
						} ?>
						<?php if($e404_options['portfolio_titles']) : ?><div class="portfolio_item_header"><h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3></div><?php endif; ?>

						<?php get_template_part('meta', 'portfolio'); ?>

					</div>
				</li>
<?php endwhile; wp_reset_query(); ?>
<?php else :
			_e('Nothing Found', 'natural');
endif; ?>
		</ul>
		<br class="clear" />
	</div>

<?php get_footer(); ?>
