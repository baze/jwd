<?php
/**
 * Search results page
 * @package    WordPress
 */
get_header(); 

$s = get_search_query();
$args = array(
	's' =>$s
);
$the_query = new WP_Query( $args );

?>
	
<?php 
	echo '<section class="section"><div class="container"><div class="container__inner">'; 
		
		if ( $the_query->have_posts() ) {
			
			echo '<h1 style="text-align: center;">Ihre Suche nach: <i>' . get_query_var('s') . '</i></h1>';
			
			echo '<ul class="search__results grid grid-4">';
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				
				echo '<li class="card grid-item"><a href="'. get_the_permalink() . '">';
				if ( get_the_post_thumbnail() ) {
					the_post_thumbnail( $size = 'post-thumbnail', $attr = '' );
				}
				echo '<div class="card__content"><h3>' . get_the_title() . '</h3><p>' . get_the_excerpt() . '</p></div></a></li>';
			}
			echo '</ul>';

		
		} else{
			echo '<h1 style="text-align: center;">Ihre Suche nach: <i>' . get_query_var('s') . '</i></h1>'; 
			echo '<p style="text-align:center;">Leider konnten wir zu Ihrer Suche nach <strong>' . get_query_var('s') . '</strong> keine Ergebnisse finden.</p>';
			echo '<p style="text-align:center;">Vielleicht hilft Ihnen eine dieser Seiten weiter:</p>';
			
			echo '<div class="page__list">';
				wp_list_pages();
			echo '</div>';
		}

	echo '</div></div></section>';
?>

<?php get_footer(); ?>
