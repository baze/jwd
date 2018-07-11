<?php
/*
Template Name: Flexible-Content
*/
get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<?php get_template_part('_snippets/_snippet-breadcrumb'); ?>
	<?php get_template_part('_modules/_flexible-content'); ?>

<?php endwhile; else: ?>

<?php endif; ?>

<?php get_footer(); ?>