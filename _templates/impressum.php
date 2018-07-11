<?php
/*
Template Name: Impressum
*/
get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<?php get_template_part('_snippets/_snippet-breadcrumb'); ?>
	<?php 
		echo '<section class="section imprint">';
		echo '<div class="container">';
			echo "<h2>";
			_e('Angaben gemäß $5 TMG:', 'jwd');
			echo "</h2>";

			get_template_part('_modules/_company');

			the_field('imprint__disclaimer', 'option');
		echo '</div>';
		echo '</section>'; 
	?>
	<?php get_template_part('_modules/_flexible-content'); ?>

<?php endwhile; else: ?>

<?php endif; ?>

<?php get_footer(); ?>