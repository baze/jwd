<?php



if( have_rows('socialmedia', 'option') ):

	echo '<nav class="social-media">';

    while ( have_rows('socialmedia', 'option') ) : the_row();

    	$url = get_sub_field('socialmedia__url', 'option');
        $icon = get_sub_field('socialmedia__icon', 'option');
        $text = get_sub_field('socialmedia__text', 'option');

        echo '<div class="socialmedia__link"><a href="' . $url . '" target="_blank" rel="nofollow">' . $icon . ' ' . $text . '</a></div>';

    endwhile;

    echo '</nav>';

else :


endif;

?>
