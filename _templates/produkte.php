<?php
/*
Template Name: Produkte
*/
get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
<?php
	  echo '<div class="container"><div class="container__inner">';
	  $term = $wp_query->queried_object;

	  $post_type = 'produkt';
	  $taxonomies = 'produktkategorie';
	  $args = array( 
	  					'parent'	=>	0, 
	  					'orderby'	=>	'name', 
	  					'order'		=>	'ASC',
	  					'hide_empty' => true, 
	  					);

	  $tax_terms = get_terms($taxonomies, $args);

	  if ($tax_terms) {
		foreach ($tax_terms as $tax_term) {
			
			echo '<div class="taxonomy">'; 
			echo '<h2 class="taxonomy-headline">';
			echo $tax_term->name; 
			echo '</h2>';

			$current_term = $tax_term;
			$current_term_slug = $current_term->slug;
			$termID = $current_term->term_id;
			$taxonomy_name = $current_term->taxonomy;
			$children = get_term_children( $termID, $taxonomy_name );
			$term_link = get_term_link($current_term);

			if ( count($children) > 0 ) {
				echo '<div class="child-taxonomies grid grid-3">';
				foreach ( $children as $child ) {
					$childterm = get_term_by( 'id', $child, $taxonomy_name );
					//dd($childterm);
					$category__image = get_field('category__image', $childterm);
					//dd($category__image);
					echo '<article class="card card--noborder child-taxonomies-item grid-item" >';
					echo '<a href="' . get_term_link( $child, $taxonomy_name ) . '">';
					echo '<img class="child-taxonomies-item-img" src="' . $category__image["sizes"]["icon-192x192"] . '" />'; 
					echo '<h3 class="child-taxonomies-item-headline">' . $childterm->name . '</h3>';
					echo '</a>';
					echo '</article>';
				}
				echo '</div>';
				echo '<a class="btn btn--border expand" href="' . esc_url( $term_link ) . '">Mehr Informationen</a>';
			} elseif ( count($children) == 0  ) {

				echo '<div class="produkt-container grid grid-3">';
					$args = array (
						 $taxonomies          	 => $current_term_slug,
						'posts_per_page'         => -1,
						'order'                  => 'ASC',
						'orderby'                => 'menu_order'
					);
					$query = new WP_Query( $args ); if ( $query->have_posts() ) { while ( $query->have_posts() ) { $query->the_post();
						get_template_part('_modules/_card--product');
					} } else { } wp_reset_postdata();
				echo '</div>';
			}
			echo '</div>';

		}
	}
?>

<?php endwhile; else: ?>

<?php endif;
		echo '</div></div>';
?>

<?php get_footer(); ?>