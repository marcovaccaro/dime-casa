<?php
/**
 * The main template file.
 *
 */

get_header(); ?>
	
	<?php if((isset($e404_options['blog_intro_type']) && $e404_options['blog_intro_type'] != 'none')) echo '<div id="intro_wrapper">'; ?> 
		<?php include(OF_FILEPATH.'/blog-intro-box.php'); ?> 
	<?php if((isset($e404_options['blog_intro_type']) && $e404_options['blog_intro_type'] != 'none')) echo '</div>'; ?>
	
	<div id="wrapper"<?php if($e404_options['blog_layout'] == 'sidebar-left'): ?> class="sidebar-left-wrapper"<?php elseif($e404_options['blog_layout'] == 'sidebar-right') : ?> class="sidebar-right-wrapper"<?php endif; ?>>
	<?php if($e404_options['blog_layout'] == 'sidebar-left'): ?>
		<div id="sidebar" class="one_third sidebar-left">
	<?php get_sidebar('blog'); ?>
		</div>
	<?php endif; ?>

	<?php if($e404_options['blog_layout'] == 'no-sidebar') : ?>
		<div id="page-content" class="full_page">
	<?php else: ?>
		<div id="page-content" class="two_third<?php if($e404_options['blog_layout'] == 'sidebar-left') echo ' last'; ?>">
	<?php endif; ?>
		<?php if($e404_options['breadcrumbs']): ?><div id="breadcrumb"><?php e404_breadcrumbs(); ?></div><?php endif; ?>

	<?php
		if(have_posts())
			the_post();
		if(is_day())
			printf('<div class="full_page"><h1 class="page-title">'.__('Daily Archives: <span>%s</span>', 'natural').'</h1></div>', get_the_date());
		elseif(is_month())
			printf('<div class="full_page"><h1 class="page-title">'.__('Monthly Archives: <span>%s</span>', 'natural').'</h1></div>', get_the_date('F Y'));
		elseif(is_year())
			printf('<div class="full_page"><h1 class="page-title">'.__('Yearly Archives: <span>%s</span>', 'natural').'</h1></div>', get_the_date('Y'));
		elseif(is_tag())
			printf('<div class="full_page"><h1 class="page-title">'.__('Tag Archives: <span>%s</span>', 'natural').'</h1></div>', single_tag_title('', false));
		rewind_posts();
	?>

<?php
while ( have_posts() ) : the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php if(!is_attachment()) : ?>
				<?php
				$meta = $e404_blog_thumbnail_options->the_meta($post->ID);
				$thumbnail_show_on_single_page = $e404_all_options['e404_blog_thumbnails_single_page'];
				$thumbnail_show_on_single_page_custom = (isset($meta['preview_show_on_single_page']) && !empty($meta['preview_show_on_single_page'])) ? $meta['preview_show_on_single_page'] : 'default';
				if($thumbnail_show_on_single_page_custom == 'true' || $thumbnail_show_on_single_page_custom == 'false') {
					$thumbnail_show_on_single_page = $thumbnail_show_on_single_page_custom;
				}
				$thumbnail_type = (isset($meta['preview_type']) && !empty($meta['preview_type'])) ? $meta['preview_type'] : 'image';
				if($thumbnail_show_on_single_page != 'true' && is_single())
					$thumbnail_type = 'none';
				if($thumbnail_type == 'image') {
					if(has_post_thumbnail()) {
						$custom_prettyphoto = (isset($meta['preview_prettyphoto']) && !empty($meta['preview_prettyphoto'])) ? $meta['preview_prettyphoto'] : 'default';
						if($custom_prettyphoto === false || empty($custom_prettyphoto) || $custom_prettyphoto == 'default')
							$custom_prettyphoto = $e404_options['blog_thumbnails_prettyphoto'];
						else
							$custom_prettyphoto = ($custom_prettyphoto == 'true') ? true : false;
						if($e404_options['blog_layout'] == 'no-sidebar')
							$custom_size = 'full';
						else
							$custom_size = 'huge';
						$large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
						$img_shortcode = '<div class="thumbnail_wrapper">[image align="center" title="'.the_title_attribute('echo=0').'" size="'.$custom_size.'"';
						if($custom_prettyphoto)
							$img_shortcode .= ' lightbox="true"';
						else
							$img_shortcode .= ' href="'.get_permalink().'"';
						if(!empty($e404_options['blog_thumbnails_height']) && $e404_options['blog_thumbnails_height'] > 0)
							$img_shortcode .= ' height="'.$e404_options['blog_thumbnails_height'].'"';
						$img_shortcode .= ']'.$large_image_url[0].'[/image]</div>';
						echo do_shortcode($img_shortcode);
					}
				}
				if($thumbnail_type == 'video-youtube') {
					if(!empty($meta['preview_video_youtube'])) {
						$shortcode = '<div class="thumbnail_wrapper">[youtube id="'.e404_get_video_id($meta['preview_video_youtube']).'"]</div>';
						echo do_shortcode($shortcode);
					}
				}
				if($thumbnail_type == 'video-vimeo') {
					if(!empty($meta['preview_video_vimeo'])) {
						$shortcode = '<div class="thumbnail_wrapper">[vimeo id="'.e404_get_video_id($meta['preview_video_vimeo']).'"]</div>';
						echo do_shortcode($shortcode);
					}
				}
				if($thumbnail_type == 'slider') {
					$shortcode = '<div class="thumbnail_wrapper">[flexslider_gallery';
					if(isset($meta['preview_slider_titles']) && $meta['preview_slider_titles'] == 'Y')
						$shortcode .= ' titles="true"';
					else
						$shortcode .= ' titles="false"';
					if(isset($meta['preview_slider_lightbox']) && $meta['preview_slider_lightbox'] == 'Y')
						$shortcode .= ' lightbox="true"';
					else
						$shortcode .= ' lightbox="false"';
					if(isset($meta['preview_slider_autoplay']) && $meta['preview_slider_autoplay'] == 'Y')
						$shortcode .= ' autoplay="true"';
					else
						$shortcode .= ' autoplay="false"';
					if(isset($meta['preview_slider_directionnav']) && $meta['preview_slider_directionnav'] == 'Y')
						$shortcode .= ' direction_nav="true"';
					else
						$shortcode .= ' direction_nav="false"';
					if(isset($meta['preview_slider_excluded']) && !empty($meta['preview_slider_excluded']))
						$shortcode .= ' exclude="'.$meta['preview_slider_excluded'].'"';
					if($e404_options['blog_layout'] != 'no-sidebar') {
						$shortcode .= ' width="770"';
					}
					$shortcode .= ' height="'.$e404_options['blog_thumbnails_height'].'"';
					$shortcode .= ']</div>';
					echo do_shortcode(apply_filters('the_content', $shortcode));
				}
				?>
				<div class="post-header">
					<div class="meta-date">
						<span class="meta-day"><?php the_time('d'); ?></span>
					   	<span class="meta-month"><?php the_time('M'); ?></span>
					 </div>
					 <div class="post-meta">
						<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						<div class="meta posted-meta">
							<?php if($e404_options['blog_post_author']) { echo '<span class="blog-author">', the_author_link(), '</span> '; } ?>
							<?php if($e404_options['blog_post_categories']) { echo '<span class="blog-categories">', the_category(', '), '</span> '; } ?>
							<?php if(!is_attachment() && comments_open($post->ID)) : ?><span class="blog-comments"><a href="<?php comments_link(); ?>"><?php comments_number('0', '1', '%'); ?></a></span><?php endif; ?>
						<?php if($e404_all_options['e404_blog_like_this'] == 'true') : $like_class = e404_liked($post->ID) ? ' fancy_likes_you_like' : ''; ?>
							<span class="blog-likes"><a href="#" id="like-<?php the_ID(); ?>" class="like_this<?php echo $like_class; ?>" title="<?php echo e404_likes_text(e404_like_this($post->ID), false); ?>"><span><?php echo e404_like_this($post->ID); ?></span></a></span>
						<?php endif; ?>
							<?php edit_post_link(__('Edit', 'natural'), '<span class="edit-link">', '</span>'); ?>
						</div>
					</div>
				</div>
				<div class="post_wrapper<?php if(!is_single()) echo(' excerpt_wrapper'); ?>">
			<?php endif; ?>
			<?php
			if($e404_options['blog_use_thumbnail'] && !is_single()) {
				if($e404_options['blog_use_excerpt']) the_excerpt(); else the_content(''); 
			}
			else {
				if($e404_options['blog_use_excerpt'] && !is_single()) the_excerpt(); else the_content(''); 
				?>
				<br class="clear" />
				<?php
			}
			?>

			<?php if(!is_single() && $e404_options['blog_read_more']): ?>
				<p class="more right"><a href="<?php the_permalink(); ?>"><span><?php echo($e404_options['blog_read_more_text']); ?></span></a></p>
			<?php endif; ?>
			
			<?php if(is_single() && $e404_options['blog_post_tags']): ?><div class="meta tags-meta"><?php e404_show_tags(get_the_tags()); ?></div><?php endif; ?>
				</div>
			
				</div>

			<?php if(is_single() && !is_attachment() && $e404_options['blog_share_it']): ?>
				<div class="share-this">
					<?php e404_share_this(); ?>
				</div>
			<?php endif; ?>
				
			<?php if(is_single() && $e404_options['blog_author_bio'] && !is_attachment()): ?>
				<?php $user = get_user_by('id', $post->post_author);
				if($user->description): ?>
				<h3><?php _e('About the Author', 'natural'); ?></h3>
				<div id="post-author">
					<div class="alignleft"><?php echo get_avatar($post->post_author, 80, OF_DIRECTORY.'/images/avatar.png'); ?></div>
					<div class="author-desc">
						<h4><?php _e('Written by', 'natural'); ?> <?php echo the_author_link(); ?></h4>
						<p><?php echo $user->description; ?></p>
					</div>
					<br class="clear" />
				</div>
				<?php endif; ?>
			<?php endif; ?>

				<?php if(is_single() && !is_attachment() && comments_open($post->ID)) {
					comments_template('', true);
				} ?>
<?php endwhile; ?>
			
			<?php get_template_part('navigation'); ?>

		</div>
	<?php if($e404_options['blog_layout'] == 'sidebar-right') : ?>
		<div id="sidebar" class="one_third last sidebar-right">
	<?php get_sidebar('blog'); ?>
		</div>
	<?php endif; ?>
		<br class="clear" />
	</div>

<?php get_footer(); ?>