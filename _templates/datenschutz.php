<?php
/*
Template Name: Datenschutz
*/
get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<?php get_template_part('_snippets/_snippet-breadcrumb'); ?>
	<?php 
		echo '<section class="section imprint">';
		echo '<div class="container">';

			the_field('privacy-policy', 'option');

		echo '</div>';
		echo '</section>'; 
	?>
	<?php get_template_part('_modules/_flexible-content'); ?>

<?php endwhile; else: ?>

<?php endif; ?>

<?php get_footer(); ?>