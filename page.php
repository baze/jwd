<?php get_header(); ?>
        <?php
            if ( have_posts() ) : while ( have_posts() ) : the_post();

            		echo '<section class="section"><div class="container">';
                    	the_content();
                    echo '</div></section>';

                endwhile;

            else :
            	// do nothing
            endif;
        ?>
<?php get_footer(); ?>