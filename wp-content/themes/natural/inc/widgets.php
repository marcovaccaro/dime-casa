<?php
// Twitter widget
class e404_Widget_Twitter extends WP_Widget {

	function e404_Widget_Twitter() {
		$widget_ops = array('classname' => 'widget_twitter', 'description' => __('A list of last tweets', 'natural'));
		$this->WP_Widget('e404_twitter', __('Natural Twitter', 'natural'), $widget_ops);
	}

	function widget($args, $instance) {
		extract($args);

		$title = apply_filters('widget_title', empty($instance['title']) ? __('Twitter' , 'natural') : $instance['title'], $instance, $this->id_base);
		$username = $instance['username'] ? $instance['username'] : '';
		$show_time = $instance['show_time'] ? '1' : '0';
		$twitter_urls = $instance['twitter_urls'] ? '1' : '0';
		$urls = $instance['urls'] ? '1' : '0';
		$follow_me_link = $instance['follow_me_link'] ? '1' : '0';
		$hide_replies = $instance['hide_replies'] ? true : false;
		if(!$number = (int) $instance['number'])
			$number = 10;
		elseif($number < 1)
			$number = 1;
		elseif($number > 30)
			$number = 30;

		echo $before_widget;
		if($title)
			echo $before_title.$title.$after_title;
?>
		<ul class="tweets">
<?php
        $tweets = e404_get_tweets($username, $number, !$hide_replies);
        foreach($tweets as $tweet) {
            $output = $tweet['text'];
            if($show_time)
                $output .= ' <span><a href="http://twitter.com/'.$username.'/status/'.$tweet['id'].'">'.$tweet['time'].'</a></span>';
            if($urls)
                $output = twitter_hyperlinks($output);
            if($twitter_urls)
                $output = twitter_users($output);
            echo '<li>'.$output.'</li>';
        }
?>
		</ul>
<?php
        if($follow_me_link)
            echo '<p class="more followme"><a href="http://twitter.com/'.$username.'"><span>'.__('Follow me on Twitter', 'natural').'</span></a></p>';

		echo $after_widget;
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['username'] = strip_tags($new_instance['username']);
		$instance['number'] = (int) $new_instance['number'];
		$instance['show_time'] = !empty($new_instance['show_time']) ? 1 : 0;
		$instance['twitter_urls'] = !empty($new_instance['twitter_urls']) ? 1 : 0;
		$instance['urls'] = !empty($new_instance['urls']) ? 1 : 0;
		$instance['follow_me_link'] = !empty($new_instance['follow_me_link']) ? 1 : 0;
		$instance['hide_replies'] = !empty($new_instance['hide_replies']) ? 1 : 0;

		return $instance;
	}

	function form($instance) {
		$instance = wp_parse_args((array)$instance, array('title' => '', 'username' => ''));
		$title = esc_attr($instance['title']);
		$username = esc_attr($instance['username']);
		if(!isset($instance['number']) || !$number = (int)$instance['number'])
			$number = 5;
		$show_time = isset($instance['show_time']) ? (bool)$instance['show_time'] : true;
		$twitter_urls = isset($instance['twitter_urls']) ? (bool)$instance['twitter_urls'] : true;
		$urls = isset($instance['urls']) ? (bool)$instance['urls'] : true;
		$follow_me_link = isset($instance['follow_me_link']) ? (bool)$instance['follow_me_link'] : true;
		$hide_replies = isset($instance['hide_replies']) ? (bool)$instance['hide_replies'] : true;
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:' , 'natural'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('username'); ?>"><?php _e('Twitter username:', 'natural'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('username'); ?>" name="<?php echo $this->get_field_name('username'); ?>" type="text" value="<?php echo $username; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of tweets to show:', 'natural'); ?></label>
		<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>

		<p><input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('show_time'); ?>" name="<?php echo $this->get_field_name('show_time'); ?>"<?php checked($show_time); ?> />
		<label for="<?php echo $this->get_field_id('show_time'); ?>"><?php _e('Show status time', 'natural'); ?></label></p>

		<p><input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('twitter_urls'); ?>" name="<?php echo $this->get_field_name('twitter_urls'); ?>"<?php checked($twitter_urls); ?> />
		<label for="<?php echo $this->get_field_id('twitter_urls'); ?>"><?php _e('Make usernames clickable', 'natural'); ?></label></p>

		<p><input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('urls'); ?>" name="<?php echo $this->get_field_name('urls'); ?>"<?php checked($urls); ?> />
		<label for="<?php echo $this->get_field_id('urls'); ?>"><?php _e('Make URLs clickable', 'natural'); ?></label></p>

		<p><input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('follow_me_link'); ?>" name="<?php echo $this->get_field_name('follow_me_link'); ?>"<?php checked($follow_me_link); ?> />
		<label for="<?php echo $this->get_field_id('follow_me_link'); ?>"><?php _e('Add "Follow Me" Message', 'natural'); ?></label></p>

		<p><input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('hide_replies'); ?>" name="<?php echo $this->get_field_name('hide_replies'); ?>"<?php checked($hide_replies); ?> />
		<label for="<?php echo $this->get_field_id('hide_replies'); ?>"><?php _e('Hide Replies', 'natural'); ?></label></p>
<?php
	}
}
register_widget('e404_Widget_Twitter');

// Portfolio Tags widget
class e404_Widget_Portfolio_Tags extends WP_Widget {

	function e404_Widget_Portfolio_Tags() {
		$widget_ops = array('classname' => 'widget_portfolio_tags', 'description' => __('A list of portfolio tags', 'natural'));
		$this->WP_Widget('e404_portfolio_tags', __('Natural Portfolio Tags', 'natural'), $widget_ops);
	}

	function widget( $args, $instance ) {
		extract( $args );
		
		$title = apply_filters('widget_title', empty($instance['title']) ? e404_get_taxonomy_name('tags') : $instance['title'], $instance, $this->id_base);

		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;
?>
        <div class="tags-meta">
        <?php
        $tags = get_terms('portfolio-tag');
		$html = '';
		foreach ($tags as $tag) {
			$tag_link = get_term_link($tag, $tag->taxonomy);
			$html .= "<a href='{$tag_link}' title='{$tag->name}' class='{$tag->slug}'><span>";
			$html .= "{$tag->name}</span></a>";
		}
		echo $html;
		echo $after_widget;
        ?>
        </div>
<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);

		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '') );
		$title = esc_attr( $instance['title'] );
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:' , 'natural'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
<?php
	}
}
register_widget('e404_Widget_Portfolio_Tags');

// Portfolio Categories widget
class e404_Widget_Portfolio_Categories extends WP_Widget {

	function e404_Widget_Portfolio_Categories() {
		$widget_ops = array('classname' => 'widget_portfolio_categories', 'description' => __('A list of portfolio categories', 'natural'));
		$this->WP_Widget('e404_portfolio_categories', __('Natural Portfolio Categories', 'natural'), $widget_ops);
	}

	function widget( $args, $instance ) {
		extract( $args );
		
		$title = apply_filters('widget_title', empty($instance['title']) ? e404_get_taxonomy_name('categories') : $instance['title'], $instance, $this->id_base);
		$show_children = $instance['show_children'];

		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;
?>
				<ul>
				<?php
				$params = 'title_li=&taxonomy=portfolio-category';
				if(!$show_children)
					$params .= '&hierarchical=0';
				wp_list_categories($params);
				?>
				</ul>
<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['show_children'] = !empty($new_instance['show_children']) ? 1 : 0;

		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args((array)$instance, array('title' => ''));
		$title = esc_attr($instance['title']);
		$show_children = isset($instance['show_children']) ? (bool) $instance['show_children'] : true;
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'natural'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('show_children'); ?>" name="<?php echo $this->get_field_name('show_children'); ?>"<?php checked( $show_children ); ?> />
		<label for="<?php echo $this->get_field_id('show_children'); ?>"><?php _e('Hierarchical' , 'natural'); ?></label></p>
<?php
	}
}
register_widget('e404_Widget_Portfolio_Categories');

// Subpages navigation widget
class e404_Widget_Subpages extends WP_Widget {

	function e404_Widget_Subpages() {
		$widget_ops = array('classname' => 'widget_subpages', 'description' => __('A subpages navigation', 'natural'));
		$this->WP_Widget('e404_subpages', __('Natural Subpages', 'natural'), $widget_ops);
	}

	function widget( $args, $instance ) {
		extract( $args );

		echo $before_widget;
		e404_subpages_nav(true);
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		return $instance;
	}

}
register_widget('e404_Widget_Subpages');

// Flickr widget
class e404_Widget_Flickr extends WP_Widget {

	function e404_Widget_Flickr() {
		$widget_ops = array('classname' => 'widget_flickr', 'description' => __('Flickr Photos', 'natural'));
		$this->WP_Widget('e404_flickr', __('Natural Flickr', 'natural'), $widget_ops);
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', empty( $instance['title'] ) ? __('Flickr Photos', 'natural') : $instance['title'], $instance, $this->id_base);
		$prettyphoto = $instance['prettyphoto'] ? 1 : 0;
		$random = $instance['random'] ? 1 : 0;
		$user_id = $instance['user_id'] ? $instance['user_id'] : '';
		if ( !$number = (int) $instance['number'] )
			$number = 10;
		else if ( $number < 1 )
			$number = 1;
		else if ( $number > 30 )
			$number = 30;

		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;
?>
		<ul class="flickr">
<?php
        $photos = e404_get_flickr_photos($user_id, '', $number, $random);
        foreach($photos as $photo) {
			if($prettyphoto)
				$output = '<a href="'.$photo['photo'].'" rel="prettyphoto" title="'.$photo['title'].'"><img src="'.$photo['thumb'].'" alt="'.$photo['title'].'" /></a>';
			else
				$output = '<a href="'.$photo['url'].'" title="'.$photo['title'].'"><img src="'.$photo['thumb'].'" alt="'.$photo['title'].'" /></a>';
            echo '<li>'.$output.'</li>';
        }
?>
		</ul><br class="clear" />
<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['user_id'] = strip_tags($new_instance['user_id']);
		$instance['number'] = (int) $new_instance['number'];
		$instance['prettyphoto'] = !empty($new_instance['prettyphoto']) ? 1 : 0;
		$instance['random'] = !empty($new_instance['random']) ? 1 : 0;

		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array('title' => '', 'user_id' => '') );
		$title = esc_attr( $instance['title'] );
		$user_id = esc_attr( $instance['user_id'] );
		if ( !isset($instance['number']) || !$number = (int) $instance['number'] )
			$number = 9;
		$prettyphoto = isset( $instance['prettyphoto'] ) ? (bool) $instance['prettyphoto'] : true;
		$random = isset( $instance['random'] ) ? (bool) $instance['random'] : true;
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'natural'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('user_id'); ?>"><?php _e('Flickr user ID:', 'natural'); ?> (<a href="http://idgettr.com" target="_blank">get your ID</a>)</label>
		<input class="widefat" id="<?php echo $this->get_field_id('user_id'); ?>" name="<?php echo $this->get_field_name('user_id'); ?>" type="text" value="<?php echo $user_id; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of photos to show:', 'natural'); ?></label>
		<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>

		<p><input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('prettyphoto'); ?>" name="<?php echo $this->get_field_name('prettyphoto'); ?>"<?php checked( $prettyphoto ); ?> />
		<label for="<?php echo $this->get_field_id('prettyphoto'); ?>"><?php _e('Enable PrettyPhoto', 'natural'); ?></label></p>

		<p><input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('random'); ?>" name="<?php echo $this->get_field_name('random'); ?>"<?php checked( $random ); ?> />
		<label for="<?php echo $this->get_field_id('random'); ?>"><?php _e('Show random photos', 'natural'); ?></label></p>
<?php
	}
}
register_widget('e404_Widget_Flickr');

// recent posts widget with thumbnails
class e404_Widget_Recent_Posts extends WP_Widget {

	function e404_Widget_Recent_Posts() {
		$widget_ops = array('classname' => 'widget_natural_recent_entries', 'description' => __('The most recent posts on your site', 'natural'));
		$this->WP_Widget('e404_recent_posts', __('Natural Recent Posts', 'natural'), $widget_ops);
		$this->alt_option_name = 'widget_natural_recent_entries';

		add_action( 'save_post', array(&$this, 'flush_widget_cache') );
		add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
		add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
	}

	function widget($args, $instance) {
		$cache = wp_cache_get('widget_natural_recent_posts', 'widget');

		if ( !is_array($cache) )
			$cache = array();

		if ( isset($cache[$args['widget_id']]) ) {
			echo $cache[$args['widget_id']];
			return;
		}

		ob_start();
		extract($args);

		$title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts', 'natural') : $instance['title'], $instance, $this->id_base);
		if ( !isset($instance['number']) || !$number = (int) $instance['number'] )
			$number = 5;
		else if ( $number < 1 )
			$number = 1;
		else if ( $number > 20 )
			$number = 20;
		$categories = empty($instance['categories']) ? '' : $instance['categories'];
		$show_categories = $instance['show_categories'] ? true : false;
		$thumbnail_type = !empty($instance['thumbnail_type']) ? $instance['thumbnail_type'] : 'image';

		$params = array('showposts' => $number, 'nopaging' => 0, 'post_status' => 'publish');
		if(get_bloginfo('version') >= '3.1')
			$params = array_merge($params, array('ignore_sticky_posts' => 1));
		else
			$params = array_merge($params, array('caller_get_posts' => 1));
		if(!empty($categories))
			$params = array_merge($params, array('category_name' => $categories));
		$r = new WP_Query($params);
		if ($r->have_posts()) :
?>
		<?php echo $before_widget; ?>
		<?php if ( $title ) echo $before_title . $title . $after_title; ?>
		<ul class="recent-posts">
		<?php  while ($r->have_posts()) : $r->the_post(); ?>
		<?php
			if($thumbnail_type == 'image') {
				if(has_post_thumbnail()) {
					$large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($r->post->ID), 'large');
					$img = '<img src="'.e404_img_scale($large_image_url[0], 70, 70).'" alt="'.esc_attr(get_the_title()).'" />';
				}
				else {
					$img = '';
				}
			}
			else {
				$img = '';
			}
		?>
		<li><?php if($img) { ?><div class="alignleft"><a href="<?php the_permalink() ?>" class="recent-link" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php echo $img; ?></a></div> <?php } ?>
		<?php if($thumbnail_type == 'date') {
			echo '<div class="meta-date"><span class="meta-day">'.get_the_time('d').'</span><span class="meta-month">'.get_the_time('M').'</span></div>';
		} ?>
		<div class="posts-desc"><h4><a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a></h4>
		<?php if($show_categories) { ?>
			<span class="fancy_categories"><?php the_category(', '); ?></span>
		<?php } ?>
		<p><?php echo e404_word_limiter(get_the_excerpt(), 50); ?></p></div></li>

		<?php endwhile; ?>
		</ul>
		<?php echo $after_widget; ?>
<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();

		endif;

		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('widget_natural_recent_posts', $cache, 'widget');
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['categories'] = strip_tags($new_instance['categories']);
		$instance['number'] = (int) $new_instance['number'];
		$instance['show_categories'] = !empty($new_instance['show_categories']) ? true : false;
		$instance['thumbnail_type'] = $new_instance['thumbnail_type'];
		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['widget_natural_recent_entries']) )
			delete_option('widget_natural_recent_entries');

		return $instance;
	}

	function flush_widget_cache() {
		wp_cache_delete('widget_natural_recent_posts', 'widget');
	}

	function form( $instance ) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$categories = isset($instance['categories']) ? esc_attr($instance['categories']) : '';
		if ( !isset($instance['number']) || !$number = (int) $instance['number'] )
			$number = 5;
		$show_categories = isset($instance['show_categories']) ? (bool)$instance['show_categories'] : true;
		$thumbnail_type = isset($instance['thumbnail_type']) ? $instance['thumbnail_type'] : 'image';
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'natural'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('categories'); ?>"><?php _e('Categories slugs<br />(comma separated, empty for all):', 'natural'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('categories'); ?>" name="<?php echo $this->get_field_name('categories'); ?>" type="text" value="<?php echo $categories; ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:', 'natural'); ?></label>
		<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
		<p><input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('show_categories'); ?>" name="<?php echo $this->get_field_name('show_categories'); ?>"<?php checked($show_categories); ?> />
		<label for="<?php echo $this->get_field_id('show_categories'); ?>"><?php _e('Show categories', 'natural'); ?></label></p>
		<p>
			<label for="<?php echo $this->get_field_id('thumbnail_type'); ?>"><?php _e('Thumbnail:', 'natural'); ?></label>
			<select id="<?php echo $this->get_field_id('thumbnail_type'); ?>" name="<?php echo $this->get_field_name('thumbnail_type'); ?>">
				<option <?php if($thumbnail_type == 'none') echo ' selected="selected"'; ?> value="none"><?php _e('none', 'natural'); ?></option>
				<option <?php if($thumbnail_type == 'image') echo ' selected="selected"'; ?> value="image"><?php _e('featured image', 'natural'); ?></option>
				<option <?php if($thumbnail_type == 'date') echo ' selected="selected"'; ?> value="date"><?php _e('post date', 'natural'); ?></option>
			</select>
		</p>
<?php
	}
}
register_widget('e404_Widget_Recent_Posts');

// popular posts widget with thumbnails
class e404_Widget_Popular_Posts extends WP_Widget {

	function e404_Widget_Popular_Posts() {
		$widget_ops = array('classname' => 'widget_natural_popular_entries', 'description' => __('The most popular posts on your site', 'natural'));
		$this->WP_Widget('e404_popular_posts', __('Natural Popular Posts', 'natural'), $widget_ops);
		$this->alt_option_name = 'widget_natural_popular_entries';

		add_action( 'save_post', array(&$this, 'flush_widget_cache') );
		add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
		add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
	}

	function widget($args, $instance) {
		$cache = wp_cache_get('widget_natural_popular_posts', 'widget');

		if ( !is_array($cache) )
			$cache = array();

		if ( isset($cache[$args['widget_id']]) ) {
			echo $cache[$args['widget_id']];
			return;
		}

		ob_start();
		extract($args);

		$title = apply_filters('widget_title', empty($instance['title']) ? __('Popular Posts', 'natural') : $instance['title'], $instance, $this->id_base);
		if ( !isset($instance['number']) || !$number = (int) $instance['number'] )
			$number = 5;
		else if ( $number < 1 )
			$number = 1;
		else if ( $number > 20 )
			$number = 20;
		$categories = empty($instance['categories']) ? '' : $instance['categories'];
		$show_categories = $instance['show_categories'] ? true : false;
		$thumbnail_type = !empty($instance['thumbnail_type']) ? $instance['thumbnail_type'] : 'image';

		$params = array('showposts' => $number, 'nopaging' => 0, 'post_status' => 'publish', 'orderby' => 'comment_count');
		if(get_bloginfo('version') >= '3.1')
			$params = array_merge($params, array('ignore_sticky_posts' => 1));
		else
			$params = array_merge($params, array('caller_get_posts' => 1));
		if(!empty($categories))
			$params = array_merge($params, array('category_name' => $categories));
		$r = new WP_Query($params);
		if ($r->have_posts()) :
?>
		<?php echo $before_widget; ?>
		<?php if ( $title ) echo $before_title . $title . $after_title; ?>
		<ul class="popular-posts">
		<?php  while ($r->have_posts()) : $r->the_post(); ?>
		<?php
			if($thumbnail_type == 'image') {
				if (has_post_thumbnail()) {
					$large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($r->post->ID), 'large');
					$img = '<img src="'.e404_img_scale($large_image_url[0], 70, 70).'" alt="'.esc_attr(get_the_title()).'" />';
				}
				else {
					$img = '';
				}
			}
			else {
				$img = '';
			}
		?>
		<li><?php if($img) { ?><div class="alignleft"><a href="<?php the_permalink() ?>" class="popular-link" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php echo $img; ?></a></div> <?php } ?>
		<?php if($thumbnail_type == 'date') {
			echo '<div class="meta-date"><span class="meta-day">'.get_the_time('d').'</span><span class="meta-month">'.get_the_time('M').'</span></div>';
		} ?>
		<div class="posts-desc"><h4><a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a></h4>
		<?php if($show_categories) { ?>
			<span class="fancy_categories"><?php the_category(', '); ?></span>
		<?php } ?>
		<p><?php echo e404_word_limiter(get_the_excerpt(), 50); ?></p></div></li>
		<?php endwhile; ?>
		</ul>
		<?php echo $after_widget; ?>
<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();

		endif;

		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('widget_natural_popular_posts', $cache, 'widget');
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['categories'] = strip_tags($new_instance['categories']);
		$instance['number'] = (int) $new_instance['number'];
		$instance['show_categories'] = !empty($new_instance['show_categories']) ? true : false;
		$instance['thumbnail_type'] = $new_instance['thumbnail_type'];
		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['widget_natural_popular_entries']) )
			delete_option('widget_natural_popular_entries');

		return $instance;
	}

	function flush_widget_cache() {
		wp_cache_delete('widget_natural_popular_posts', 'widget');
	}

	function form( $instance ) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$categories = isset($instance['categories']) ? esc_attr($instance['categories']) : '';
		if ( !isset($instance['number']) || !$number = (int) $instance['number'] )
			$number = 5;
		$show_categories = isset($instance['show_categories']) ? (bool)$instance['show_categories'] : true;
		$thumbnail_type = isset($instance['thumbnail_type']) ? $instance['thumbnail_type'] : 'image';
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'natural'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('categories'); ?>"><?php _e('Categories slugs<br />(comma separated, empty for all):', 'natural'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('categories'); ?>" name="<?php echo $this->get_field_name('categories'); ?>" type="text" value="<?php echo $categories; ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:', 'natural'); ?></label>
		<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
		<p><input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('show_categories'); ?>" name="<?php echo $this->get_field_name('show_categories'); ?>"<?php checked($show_categories); ?> />
		<label for="<?php echo $this->get_field_id('show_categories'); ?>"><?php _e('Show categories', 'natural'); ?></label></p>
		<p>
			<label for="<?php echo $this->get_field_id('thumbnail_type'); ?>"><?php _e('Thumbnail:', 'natural'); ?></label>
			<select id="<?php echo $this->get_field_id('thumbnail_type'); ?>" name="<?php echo $this->get_field_name('thumbnail_type'); ?>">
				<option <?php if($thumbnail_type == 'none') echo ' selected="selected"'; ?> value="none"><?php _e('none', 'natural'); ?></option>
				<option <?php if($thumbnail_type == 'image') echo ' selected="selected"'; ?> value="image"><?php _e('featured image', 'natural'); ?></option>
				<option <?php if($thumbnail_type == 'date') echo ' selected="selected"'; ?> value="date"><?php _e('post date', 'natural'); ?></option>
			</select>
		</p>
<?php
	}
}
register_widget('e404_Widget_Popular_Posts');

// Tags widget
class e404_Widget_Tags extends WP_Widget {

	function e404_Widget_Tags() {
		$widget_ops = array('classname' => 'widget_tags', 'description' => __('A list of blog post tags', 'natural'));
		$this->WP_Widget('e404_tags', __('Natural Post Tags', 'natural'), $widget_ops);
	}

	function widget( $args, $instance ) {
		extract( $args );
		
		$title = apply_filters('widget_title', empty( $instance['title'] ) ? __('Tags', 'natural') : $instance['title'], $instance, $this->id_base);

		echo $before_widget;
		
		if ( $title )
			echo $before_title . $title . $after_title;
?>
	    <div class="tags-meta">
        <?php
		$tags = get_tags();
		$html = '';
		foreach ($tags as $tag) {
			$tag_link = get_tag_link($tag->term_id);
			$html .= "<a href='{$tag_link}' title='{$tag->name}' class='{$tag->slug}'><span>";
			$html .= "{$tag->name}</span></a>";
		}
		echo $html;
        ?>
        </div><br class="clear" />
		<?php echo $after_widget; ?>
<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);

		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '') );
		$title = esc_attr( $instance['title'] );
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:' , 'natural'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
<?php
	}
}
register_widget('e404_Widget_Tags');

// Recent portfolio items widget
class e404_Widget_Recent_Portfolio extends WP_Widget {

	function e404_Widget_Recent_Portfolio() {
		$widget_ops = array('classname' => 'widget_recent_portfolio', 'description' => __('Recent portfolio items', 'natural'));
		$this->WP_Widget('e404_recent_portfolio', __('Natural Recent Portfolio Items', 'natural'), $widget_ops);
	}

	function widget( $args, $instance ) {
		extract( $args );
		
		$title = apply_filters('widget_title', empty( $instance['title'] ) ? __('Recent Portfolio Items', 'natural') : $instance['title'], $instance, $this->id_base);
		if ( !$number = (int) $instance['number'] )
			$number = 5;
		else if ( $number < 1 )
			$number = 1;

		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;
?>
				<ul class="recent-portfolio">
				<?php
				$params = 'post_type=portfolio&numberposts='.$number;
				$items = get_posts($params);
				foreach($items as $item) {
					$large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($item->ID), 'full');
					if($large_image_url)
						$img = '<img src="'.e404_img_scale($large_image_url[0], 70, 70).'" alt="'.esc_attr(get_the_title($item->ID)).'" />';
					else
						$img = false;
					if($img)
						echo '<li><div class="alignleft"><a class="recent-link" href="'.get_permalink($item->ID).'">'.$img.'</a></div>';
					else
						echo '<li>';
					echo '<div class="posts-desc"><h4><a href="'.get_permalink($item->ID).'">'.get_the_title($item->ID).'</a></h4><span class="fancy_categories">';
					the_terms($item->ID, 'portfolio-category', '', ', ');
					echo '</span></div></li>';
				}
				?>
				</ul>
<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['show_children'] = !empty($new_instance['show_children']) ? 1 : 0;
		$instance['number'] = (int)$new_instance['number'];

		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args((array)$instance, array('title' => ''));
		$title = esc_attr($instance['title']);
		if ( !isset($instance['number']) || !$number = (int) $instance['number'] )
			$number = 5;
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'natural'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of items to show:', 'natural'); ?></label>
		<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
<?php
	}
}
register_widget('e404_Widget_Recent_Portfolio');

// Most liked portfolio items widget
class e404_Widget_Most_Liked_Portfolio extends WP_Widget {

	function e404_Widget_Most_Liked_Portfolio() {
		$widget_ops = array( 'classname' => 'widget_most_liked_portfolio', 'description' => __('Most liked portfolio items', 'natural') );
		$this->WP_Widget('e404_most_liked_portfolio', __('Natural Most Liked Portfolio Items', 'natural'), $widget_ops);
	}

	function widget( $args, $instance ) {
		extract( $args );
		
		$title = apply_filters('widget_title', empty( $instance['title'] ) ? __('Most Liked Portfolio Items', 'natural') : $instance['title'], $instance, $this->id_base);
		if ( !$number = (int) $instance['number'] )
			$number = 5;
		else if ( $number < 1 )
			$number = 1;

		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;
?>
				<ul class="recent-portfolio">
				<?php
				$params = array('post_type' => 'portfolio', 'meta_key' => '_likes', 'orderby' => 'meta_value_number', 'order' => 'DESC', 'numberposts' => $number);
				$items = get_posts($params);
				foreach($items as $item) {
					$large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($item->ID), 'full');
					if($large_image_url)
						$img = '<img src="'.e404_img_scale($large_image_url[0], 70, 70).'" alt="'.esc_attr(get_the_title($item->ID)).'" />';
					else
						$img = false;
					if($img)
						echo '<li><div class="alignleft"><a class="recent-link" href="'.get_permalink($item->ID).'">'.$img.'</a></div>';
					else
						echo '<li>';
					echo '<div class="posts-desc"><h4><a href="'.get_permalink($item->ID).'">'.get_the_title($item->ID).'</a></h4><span class="fancy_categories">';
					the_terms($item->ID, 'portfolio-category', '', ', ');
					echo '</span></div></li>';
				}
				
				?>
				</ul>
<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['show_children'] = !empty($new_instance['show_children']) ? 1 : 0;
		$instance['number'] = (int)$new_instance['number'];

		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args((array)$instance, array('title' => ''));
		$title = esc_attr($instance['title']);
		if ( !isset($instance['number']) || !$number = (int) $instance['number'] )
			$number = 5;
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'natural'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of items to show:', 'natural'); ?></label>
		<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
<?php
	}
}
register_widget('e404_Widget_Most_Liked_Portfolio');

// most liked posts widget with thumbnails
class e404_Widget_Most_Liked_Posts extends WP_Widget {

	function e404_Widget_Most_Liked_Posts() {
		$widget_ops = array('classname' => 'widget_natural_most_liked_entries', 'description' => __('Most liked posts on your site', 'natural'));
		$this->WP_Widget('e404_most_liked_posts', __('Natural Most Liked Posts', 'natural'), $widget_ops);
		$this->alt_option_name = 'widget_natural_most_liked_entries';

		add_action( 'save_post', array(&$this, 'flush_widget_cache') );
		add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
		add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
	}

	function widget($args, $instance) {
		$cache = wp_cache_get('widget_natural_most_liked_posts', 'widget');

		if ( !is_array($cache) )
			$cache = array();

		if ( isset($cache[$args['widget_id']]) ) {
			echo $cache[$args['widget_id']];
			return;
		}

		ob_start();
		extract($args);

		$title = apply_filters('widget_title', empty($instance['title']) ? __('Most Liked Posts', 'natural') : $instance['title'], $instance, $this->id_base);
		if ( !isset($instance['number']) || !$number = (int) $instance['number'] )
			$number = 5;
		else if ( $number < 1 )
			$number = 1;
		else if ( $number > 20 )
			$number = 20;
		$show_categories = $instance['show_categories'] ? true : false;
		$thumbnail_type = !empty($instance['thumbnail_type']) ? $instance['thumbnail_type'] : 'image';

		$params = array('showposts' => $number, 'nopaging' => 0, 'post_status' => 'publish', 'meta_key' => '_likes', 'orderby' => 'meta_value_num', 'order' => 'DESC');
		if(get_bloginfo('version') >= '3.1')
			$params = array_merge($params, array('ignore_sticky_posts' => 1));
		else
			$params = array_merge($params, array('caller_get_posts' => 1));
		$r = new WP_Query($params);
		if ($r->have_posts()) :
?>
		<?php echo $before_widget; ?>
		<?php if ( $title ) echo $before_title . $title . $after_title; ?>
		<ul class="popular-posts">
		<?php while ($r->have_posts()) : $r->the_post(); ?>
		<?php
			if($thumbnail_type == 'image') {
				if (has_post_thumbnail()) {
					$large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($r->post->ID), 'large');
					$img = '<img src="'.e404_img_scale($large_image_url[0], 70, 70).'" alt="'.esc_attr(get_the_title()).'" />';
				}
				else {
					$img = '';
				}
			}
			else {
				$img = '';
			}
		?>
		<li><?php if($img) { ?><div class="alignleft"><a href="<?php the_permalink() ?>" class="recent-link" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php echo $img; ?></a></div> <?php } ?>
		<?php if($thumbnail_type == 'date') {
			echo '<div class="meta-date"><span class="meta-day">'.get_the_time('d').'</span><span class="meta-month">'.get_the_time('M').'</span></div>';
		} ?>
		<div class="posts-desc"><h4><a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a></h4>
		<?php if($show_categories) { ?>
			<span class="fancy_categories"><?php the_category(', '); ?></span>
		<?php } ?>
		<p><?php echo e404_word_limiter(get_the_excerpt(), 50); ?></p></div><br class="clear" /></li>

		<?php endwhile; ?>
		</ul>
		<?php echo $after_widget; ?>
<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();

		endif;

		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('widget_natural_most_liked_posts', $cache, 'widget');
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];
		$instance['show_categories'] = !empty($new_instance['show_categories']) ? true : false;
		$instance['thumbnail_type'] = $new_instance['thumbnail_type'];
		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['widget_natural_most_liked_entries']) )
			delete_option('widget_natural_most_liked_entries');

		return $instance;
	}

	function flush_widget_cache() {
		wp_cache_delete('widget_natural_most_liked_posts', 'widget');
	}

	function form( $instance ) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		if ( !isset($instance['number']) || !$number = (int) $instance['number'] )
			$number = 5;
		$show_categories = isset($instance['show_categories']) ? (bool)$instance['show_categories'] : true;
		$thumbnail_type = isset($instance['thumbnail_type']) ? $instance['thumbnail_type'] : 'image';
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'natural'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:', 'natural'); ?></label>
		<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
		<p><input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('show_categories'); ?>" name="<?php echo $this->get_field_name('show_categories'); ?>"<?php checked($show_categories); ?> />
		<label for="<?php echo $this->get_field_id('show_categories'); ?>"><?php _e('Show categories', 'natural'); ?></label></p>
		<p>
			<label for="<?php echo $this->get_field_id('thumbnail_type'); ?>"><?php _e('Thumbnail:', 'natural'); ?></label>
			<select id="<?php echo $this->get_field_id('thumbnail_type'); ?>" name="<?php echo $this->get_field_name('thumbnail_type'); ?>">
				<option <?php if($thumbnail_type == 'none') echo ' selected="selected"'; ?> value="none"><?php _e('none', 'natural'); ?></option>
				<option <?php if($thumbnail_type == 'image') echo ' selected="selected"'; ?> value="image"><?php _e('featured image', 'natural'); ?></option>
				<option <?php if($thumbnail_type == 'date') echo ' selected="selected"'; ?> value="date"><?php _e('post date', 'natural'); ?></option>
			</select>
		</p>
<?php
	}
}
register_widget('e404_Widget_Most_Liked_Posts');

?>