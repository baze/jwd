<?php
/**
 * @package  WordPress
 * @subpackage  wp-php-starter-theme
 * Template Name: Startseite
 */
get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<?php get_template_part('_modules/_flexible-content'); ?>

<?php endwhile; else: ?>

<?php endif; ?>

<?php get_footer(); ?>