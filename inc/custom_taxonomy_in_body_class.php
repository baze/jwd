<?php 

function custom_taxonomy_in_body_class( $classes ){
  if( is_singular() )
  {
    $custom_terms = get_the_terms(0, 'themen');
    if ($custom_terms) {
      foreach ($custom_terms as $custom_term) {
        $classes[] = 'tax-' . $custom_term->slug;
      }
    }
  }
  return $classes;
}

add_filter( 'body_class', 'custom_taxonomy_in_body_class' );