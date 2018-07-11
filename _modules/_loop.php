<?php 
$loop__posts = get_sub_field('loop__posts');
$posts__look__classes = get_sub_field('card-classes');
$loop__number = get_sub_field('loop__number');

if ( is_array($posts__look__classes) ) {

	$card_classes = implode(' ', $posts__look__classes);

	} else {

	$card_classes = $posts__look__classes;
}

$args = array(
	'post_type'              => $loop__posts,
	'post_status'            => array( 'publish' ),
	'posts_per_page'         => $loop__number,
	'ignore_sticky_posts'    => false,
	'order'                  => 'DESC',
	'orderby'                => 'date',
);


// The Query
$query = new WP_Query( $args );

//dd($query);

// The Loop
if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();
		if ( $loop__posts == 'post' ) {

			include(locate_template('_modules/_card--post.php'));
		
		} elseif ( $loop__posts == 'testimonials' ) {
			
			include(locate_template('_modules/_testimonial.php'));
		
		} elseif ( $loop__posts == 'produkte' ) {
		
			include(locate_template('_modules/_card--product.php'));
		
		} elseif ( $loop__posts == 'downloads' ) {

			include(locate_template('_modules/_download.php'));
		
		} elseif ( $loop__posts == 'ansprechpartner' ) {

			include(locate_template('_modules/_contact.php'));
		
		}
		
	}
} else {
	echo wpautop( 'Keine Inhalte gefunden. Es tut uns leid.' );
}

// Restore original Post Data
wp_reset_postdata();
?>