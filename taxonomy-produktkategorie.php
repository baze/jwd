<?php
/**
 * The template for displaying archive pages.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 * @package wp-php-starter-theme
 */
	get_header();
	get_template_part('_snippets/_snippet-breadcrumb');
	$term =	$wp_query->queried_object;
?>
			
			<?php 
				echo '<header class="category__header"><div class="container"><div class="container__inner">';
					the_archive_title('<h1 class="category__title">', '</h1>');
					the_archive_description('<p class="category__description">', '</p>');
				echo '</div></div></header>';
			?>

			<?php

				echo '<div class="container"><div class="container__inner">';

				$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); // get current term
				$term_taxonomy = $term->taxonomy;
				$current_term = $term;
				$parent = get_term($term->parent, get_query_var('taxonomy') ); // get parent term
				$children = get_term_children($term->term_id, get_query_var('taxonomy')); // get children

				$parent_ID = $parent->term_id;
				$child_count = count($children);

				if ( $child_count > 0 ) {
					
					$args = array(
					    'parent' => $current_term->term_id,
					    'taxonomy' => $current_term->taxonomy,
						'hide_empty' => 0,
						'hierarchical' => true,
						'depth'  => 1,
						'title_li' => ''
					); 
					echo '<div class="child-taxonomy">';
					foreach (get_categories($args) as $cat) :
				 		echo'<article class="child-taxonomy">';
					 	
						 	echo'<h2 class="child-taxonomies-item-headline">' . $cat->cat_name . '</h2>';
							 	echo '<div class="product__list grid grid-3">';
								$current_query = $wp_query->query_vars;
									$wp_query = new WP_Query();
									$wp_query->query(array(
										$current_query['taxonomy'] => $current_query['term'],
										'paged' => $paged,
										'posts_per_page' => 4,
										'order'          => 'ASC',
										'orderby'        => 'menu_order',
									)); 
									while ($wp_query->have_posts()) : $wp_query->the_post();				
										get_template_part('_modules/_card--product');
									endwhile;  wp_reset_postdata();
								echo '</div>';
								echo'<a class="btn btn--border expand" href="' . get_term_link($cat) . '">Ansehen</a>';

				 		echo'</article>';
		 			endforeach;
					echo '</div>';

				} else{
					echo '<div class="product__list grid grid-3">';
						$current_query = $wp_query->query_vars;
							$wp_query = new WP_Query();
							$wp_query->query(array(
								$current_query['taxonomy'] => $current_query['term'],
								'paged' => $paged,
								'posts_per_page' => -1,
								'order'          => 'ASC',
								'orderby'        => 'menu_order',
							)); 
							while ($wp_query->have_posts()) : $wp_query->the_post();				
								get_template_part('_modules/_card--product');
							endwhile;  wp_reset_postdata();
						echo '</div>';
				}

				echo '</div></div>';

			?>

<?php get_footer(); ?>