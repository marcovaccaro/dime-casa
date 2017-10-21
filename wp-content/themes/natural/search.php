<?php
/**
 * Search Results template.
 *
 */

get_header(); ?>
	
	<?php if((isset($e404_options['main_intro_type']) && $e404_options['main_intro_type'] != 'none')) echo '<div id="intro_wrapper">'; ?> 
		<?php include(OF_FILEPATH.'/main-intro-box.php'); ?> 
	<?php if((isset($e404_options['main_intro_type']) && $e404_options['main_intro_type'] != 'none')) echo '</div>'; ?>
	
	<div id="wrapper">
		<?php if($e404_options['breadcrumbs']) : ?><div id="breadcrumb"><?php e404_breadcrumbs(); ?></div><?php endif; ?>
	
		<div id="page-content" class="full-page">
<?php
if(have_posts()) :
?>
			<div class="full_page"><h2 class="fancy-header"><span><?php printf( __('Search Results for: %s', 'natural'), '<em>'.get_search_query().'</em>'); ?></span></h2></div>
<?php
while ( have_posts() ) : the_post(); ?>
			<div id="post-<?php the_ID(); ?>" class="post search-item">
				<h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				<?php the_excerpt(''); ?>

			<?php if(!is_single() && $e404_options['blog_read_more']) : ?>
				<p class="more"><a href="<?php the_permalink(); ?>"><span><?php echo($e404_options['blog_read_more_text']); ?></span></a></p>
			<?php endif; ?>
			</div>
<?php endwhile; ?>
<?php else : ?>
				<div id="post-0" <?php post_class(); ?>>
					<h2 class="entry-title"><?php _e('Nothing Found', 'natural'); ?></h2>
						<p><?php _e('Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'natural'); ?></p>
						<?php get_search_form(); ?>
				</div>
<?php endif; ?>
			
			<?php get_template_part('navigation'); ?>

		</div>
		<br class="clear" />
	</div>

<?php get_footer(); ?>
