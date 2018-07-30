<?php
/*
Template Name: Vorschaltseite
*/
get_header();

if ( have_posts() ) : while ( have_posts() ) : the_post();
	
	echo '<section class="under_construction">';
		
		echo '<div class="under_construction__container">';

			echo '<div class="under_construction__logo">';
				get_template_part('_modules/_header__logo');
			echo '</div>';

			echo '<div class="under_construction__content">';
				
				the_title( '<h1>', '</h1>', true );

				echo '<div class="under_construction__content__txt">';
					the_content();
				echo '</div>';

				echo '<div class="under_construction__content__links">';
					echo '<a href="#imprint" class="btn btn--ghost imprint">Impressum</a>';
					echo '<a href="#privacy" class="btn btn--ghost privacy">Datenschutz</a>';
				echo '</div>';

			echo '</div>';

	
		echo '</div>';

		echo '<div class="under_construction__legal">';

			echo '<div class="under_construction__legal__imprint" id="imprint"><div class="container__inner">';
				echo '<h2>Impressum</h2>';
				get_template_part('_modules/_company');
				the_field('imprint__disclaimer', 'option');
			echo '</div></div>';

			echo '<div class="under_construction__legal__privacy" id="privacy"><div class="container__inner">';
				echo '<h2>Datenschutzerklärung</h2>';
				the_field('privacy-policy', 'option');
			echo '</div></div>';

			echo '<small style="display:inline-block; margin-top: 1.5rem;"><a href="https://jwdsign.de/webdesign/firmenwebseite/?rel=impressum&referrer=' . get_bloginfo('url') . '" target="_blank" rel="nofollow">Diese Webseite wurde von <strong>JWD - Jan Wambach Design</strong> realisiert.</a></small>';

		echo '</div>';

	echo '</section>';	

endwhile; else:

endif;

get_footer();

?>