<?php
/**
 * Portfolio - single page
 *
 */

get_header(); ?>
	
	<?php if((isset($e404_options['portfolio_intro_type']) && $e404_options['portfolio_intro_type'] != 'none')) echo '<div id="intro_wrapper">'; ?> 
		<?php include(OF_FILEPATH.'/portfolio-intro-box.php'); ?> 
	<?php if((isset($e404_options['portfolio_intro_type']) && $e404_options['portfolio_intro_type'] != 'none')) echo '</div>'; ?>
	
	<div id="wrapper">
		<?php if($e404_options['breadcrumbs']) : ?><div id="breadcrumb"><?php e404_breadcrumbs(); ?></div><?php endif; ?>
	
		<div class="portfolio portfolio-page">
<?php
while ( have_posts() ) : the_post(); ?>

<?php
	$next = get_adjacent_post(false, '', false);
	$prev = get_adjacent_post(false, '', true);
	if($next)
		$next_url = get_permalink($next);
	else
		$next_url = '';
	if($prev)
		$prev_url = get_permalink($prev);
	else
		$prev_url = '';
	$portfolio_page_id = get_option('e404_portfolio_page');
	$portfolio_page = get_page($portfolio_page_id);
	$portfolio_url = get_permalink($portfolio_page->ID);
	$like_class = e404_liked($post->ID) ? 'fancy_likes_you_like' : 'fancy_likes';
?>
			<div class="fancy-header-wrapper">
			<?php if($e404_options['portfolio_single_titles']): ?>
				<h2 class="fancy-header"><span><?php the_title(); ?></span></h2>
			<?php endif; ?>
				<div class="scroller_btns">
					<span class="view-all"><a href="<?php echo $portfolio_url; ?>">view all</a></span>
					<?php if($e404_all_options['e404_portfolio_like_this'] == 'true') : ?>
					<a id="like-<?php echo $post->ID; ?>" class="tiptip fancy_icon like_this <?php echo $like_class; ?>" href="#" title="<?php echo e404_likes_text(e404_like_this($post->ID), false); ?>"><span></span></a>
					<?php endif; ?>
						
					<a <?php if($prev_url) echo 'href="'.$prev_url.'"'; ?>class="prev browse arrowleft<?php if(!$prev) echo' disabled'; ?>"><span>prev</span></a>
					<a <?php if($next_url) echo 'href="'.$next_url.'"'; ?>class="next browse arrowright<?php if(!$next) echo' disabled'; ?>"><span>next</span></a>
				</div>
			</div>
			<?php if($e404_options['portfolio_item_categories']) : ?>
				<div class="portfolio-meta">
					<div class="posted-meta"><?php the_terms($post->ID, 'portfolio-category', '', ', '); ?></div>
				</div>
			<?php endif; ?>
			<?php the_content(''); ?>

<?php endwhile; ?>
<?php if($e404_options['portfolio_item_tags']) : ?>
			<br class="clear" />
			<div class="full_page tags-meta"><?php e404_show_tags(get_the_terms($post->ID, 'portfolio-tag')); ?></div>
<?php endif; ?>
		</div>
		<br class="clear" />
	</div>

<?php get_footer(); ?>
