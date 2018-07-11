<?php
/**
 * The Template for displaying all single posts
 * @package  WordPress
 */
get_header(); ?>

<?php
	if ( have_posts() ) : while ( have_posts() ) : the_post();

		echo '<section class="section article">';
			
			get_template_part('_modules/_product');
						
		echo '</section>';

	endwhile;

	else :

	endif;
?>

<?php get_footer(); ?>