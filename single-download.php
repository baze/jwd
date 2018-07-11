<?php
/**
 * The Template for displaying all single posts
 * @package  WordPress
 */
get_header(); ?>

<?php
	if ( have_posts() ) : while ( have_posts() ) : the_post();

		echo '<section class="section download">';

			echo '<header class="download__header container">';

				echo '<div class="download__image">';
					the_post_thumbnail();
				echo '</div>';
				
				echo '<h1 class="download__title">';
					the_title();
				echo '</h1>';
			
			echo '</header>';

			echo '<div class="download__teaser">';

				echo '<div class="download__excerpt">';
					the_excerpt();
				echo '</div>';

				echo '<div class="download__price">';
					edd_price();
				echo '</div>';

				echo '<div class="download__checkout">';
				echo '</div>';				

			echo "</div>";

			echo '<div class="download__content container">';
				the_content();
			echo '</div>';
						
		echo '</section>';

	endwhile;

	else :

	endif;
?>

<?php get_footer(); ?>