<?php
/**
 * The template for displaying archive pages.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 * @package wp-php-starter-theme
 */

get_header(); ?>

<?php 

$page_for_posts = get_option( 'page_for_posts' );

if ( get_field('posts__look', $page_for_posts) ) {
	$posts__look = get_field('posts__look', $page_for_posts);
	$posts__look__classes = $posts__look["posts__look__classes"];

	if ( is_array($posts__look__classes) ) {
			$card_classes = implode(' ', $posts__look__classes);
		} else {
			$card_classes = $posts__look__classes;
	}

	$posts__look__columns = $posts__look["column-width"];
}

$obj = get_queried_object();

$count = get_option('posts_per_page', 10);
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$offset = ($paged - 1) * $count;

echo '<header class="category__header"><div class="container"><div class="container__inner">';
	the_archive_title('<h1 class="category__title">', '</h1>');
	the_archive_description('<p class="category__description">', '</p>');
echo '</div></div></header>';

$args = array(
	'post_status'            => array( 'publish' ),
	'cat'					 => array($obj->term_id),
	'nopaging'               => false,
	'paged'					 => $paged,
	'offset'				 => $offset,
	'ignore_sticky_posts'    => true,
	'order'                  => 'DESC',
	'orderby'                => 'date',
);

echo '<div class="section"><div class="container"><div class="container__inner">';
echo '<div class="grid grid-' . $posts__look__columns . '">';

// The Query
$query = new WP_Query( $args );

//dd($query);

// The Loop
if ( $query->have_posts() ) {

	while ( $query->have_posts() ) {
		$query->the_post();
		include(locate_template('_modules/_card--post.php'));
	}
} else {
	echo '<div style="text-align: center;"><i>Keine Beiträge vorhanden. Das tut uns leid.</i></div>';
}

wp_reset_postdata();

echo '</div>';

echo '<div class="pagination">';

	echo '<span class="prev">';
		next_posts_link( '◀ Ältere Beiträge', $the_query->max_num_pages );
	echo '</span>';

	echo '<span class="next">';
		previous_posts_link( 'Neuere Beiträge ▶', $the_query->max_num_pages );
	echo '</span>';

echo '</div>';

echo '</div></div></section>';

?>

<?php get_footer(); ?>