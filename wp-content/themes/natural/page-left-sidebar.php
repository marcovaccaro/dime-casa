<?php
/**
 * Template name: Single page with left sidebar
 *
 */

get_header(); ?>
	
	<?php if((isset($e404_options['main_intro_type']) && $e404_options['main_intro_type'] != 'none')) echo '<div id="intro_wrapper">'; ?> 
		<?php include(OF_FILEPATH.'/main-intro-box.php'); ?> 
	<?php if((isset($e404_options['main_intro_type']) && $e404_options['main_intro_type'] != 'none')) echo '</div>'; ?>
	
	<div id="wrapper" class="sidebar-left-wrapper">
		
		<div id="sidebar" class="one_third sidebar-left">
			<?php get_sidebar('page'); ?>
		</div>
		<div id="page-content" class="two_third last">
			<?php if($e404_options['breadcrumbs']) : ?><div id="breadcrumb"><?php e404_breadcrumbs(); ?></div><?php endif; ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<?php if($e404_options['page_titles']) : ?><h2 class="fancy-header"><span><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></span></h2><?php endif; ?>
			<div id="post-<?php the_ID(); ?>" class="page-layout">
				<?php the_content(); ?>

				<?php if(!is_attachment() && $e404_options['page_comments']) {
					comments_template('', true);
				} ?>
			</div>
<?php endwhile; ?>
			
			<?php get_template_part('navigation'); ?>

		</div>
		<br class="clear" />
	</div>

<?php get_footer(); ?>
