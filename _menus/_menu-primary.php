<?php 
	$args = array( 
    	'theme_location' 	=> 'primary',
    	'container'			=> false,
    	'items_wrap' 		=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
    );
	
	wp_nav_menu( $args );

?>