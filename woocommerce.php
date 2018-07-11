<?php 
/*
Template Name: WooCommerce
*/
	get_header();
		
	    echo '<section class="section"><div class="container">';
	        woocommerce_content();
	    echo '</div></section>';

	get_footer(); 
?>