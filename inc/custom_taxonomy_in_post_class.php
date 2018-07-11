<?php 

function custom_taxonomy_in_post_class( $classes, $class, $ID ) {
    $taxonomy = 'standort-kategorien';
    $terms = get_the_terms( (int) $ID, $taxonomy );
    if( !empty( $terms ) ) {
        foreach( (array) $terms as $order => $term ) {
            if( !in_array( $term->slug, $classes ) ) {
                $classes[] = 'tax-' . $term->slug;
            }
        }
    }
    return $classes;
}

add_filter( 'post_class', 'custom_taxonomy_in_post_class', 10, 3 );