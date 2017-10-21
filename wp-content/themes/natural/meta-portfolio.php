<?php
	global $e404_all_options, $preview_url;
?>
						<div class="fancy_meta">
							<ul>
								<li><a class="tiptip fancy_icon fancy_details" href="<?php the_permalink(); ?>" title="<?php _e('More Details', 'natural'); ?>"><span><?php _e('More Details', 'natural'); ?></span></a></li>
								<li><a class="tiptip fancy_icon fancy_preview" rel="prettyphoto" href="<?php echo $preview_url; ?>" title="<?php _e('Preview', 'natural'); ?>"><span><?php _e('Preview', 'natural'); ?></span></a></li>
						<?php if($e404_all_options['e404_portfolio_like_this'] == 'true') : $like_class = e404_liked($post->ID) ? 'fancy_likes_you_like' : 'fancy_likes'; ?>
								<li><a class="tiptip fancy_icon like_this <?php echo $like_class; ?>" href="#" id="like-<?php the_ID(); ?>" title="<?php echo e404_likes_text(e404_like_this($post->ID), false); ?>"><?php e404_likes_text(e404_like_this($post->ID), false); ?><span></span></a></li>
						<?php endif; ?>
							</ul>
						</div>
