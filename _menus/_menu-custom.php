<?php 
	wp_nav_menu( array( 
    'theme_location' 	=> 'custom',
    'items_wrap' 		=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
    'walker'			=> new themeslug_walker_nav_menu
    ));
?>