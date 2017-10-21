<?php
/**
 * Template Name: Home Page
 *
 */

get_header();

?>

<?php if($e404_options['home_intro_type'] != 'none') echo '<div id="intro_wrapper">'; ?>
	<?php include(OF_FILEPATH.'/home-intro-box.php'); ?>
<?php if($e404_options['home_intro_type'] != 'none') echo '</div>'; ?>

<div id="wrapper">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<?php the_content(); ?>
<?php endwhile; ?>

</div>

<?php get_footer(); ?>
