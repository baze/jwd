<?php

add_filter( 'post_class', 'custom_taxonomy_post_class', 10, 3 );

    if( !function_exists( 'custom_taxonomy_post_class' ) ) {

        function custom_taxonomy_post_class( $classes, $class, $ID ) {

            $taxonomy = 'listing-category';

            $terms = get_the_terms( (int) $ID, $taxonomy );

            if( !empty( $terms ) ) {

                foreach( (array) $terms as $order => $term ) {

                    if( !in_array( $term->slug, $classes ) ) {

                        $classes[] = $term->slug;

                    }

                }

            }

            return $classes;

        }

    }  