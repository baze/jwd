<?php get_header(); ?>

<?php
	$obj = get_queried_object();

	$page_for_posts = get_option( 'page_for_posts' );
	
	if ( get_field('posts__look', $page_for_posts) ) {
	
		$posts__look = get_field('posts__look', $page_for_posts);
		$posts__look__classes = $posts__look["posts__look__classes"];

		if ( is_array($posts__look__classes) ) {
				$card_classes = implode(' ', $posts__look__classes);
			} else {
				$card_classes = $posts__look__classes;
		}

		$posts__look__columns = $posts__look["column-width"];
	
	}
	
	if ( get_field('posts__query', $page_for_posts) ) {
		
		$posts__query = get_field('posts__query', $page_for_posts);
		$posts__query__qty = $posts__query["$posts__query__qty"];
		$posts__query__order = $posts__query["$posts__query__order"];
		$posts__query__orderby = $posts__query["$posts__query__orderby"];

	}	

	$count = get_option('posts_per_page', 10);
	$paged = get_query_var('paged') ? get_query_var('paged') : 1;
 	$offset = ($paged - 1) * $count;

?>

<section class="section">
	<div class="container">
		
		<?php if ( !is_paged() ) {  ?>
			<div class="sticky-posts">
				<?php 

					$sticky = get_option( 'sticky_posts' );
					$args = array(
						'posts_per_page' => 1,
						'post__in'  => $sticky,
						'ignore_sticky_posts' => 1
					);
					$query = new WP_Query( $args );
					if ( isset($sticky[0]) ) {
						include(locate_template('_modules/_card--sticky.php'));
					}
					wp_reset_postdata();
				?>
			</div>
		<?php } ?>

		<div class="posts">
		<?php 
			$args = array(
				'post_type'              => array( 'post' ),
				'post_status'            => array( 'publish' ),
				'cat'					 => array($obj->term_id),
				'nopaging'               => false,
				'posts_per_page'         => $posts__query__qty,
				'posts_per_archive_page' => $posts__query__qty,
				'paged'					 => $paged,
				'offset'				 => $offset,
				'order'                  => $posts__query__order,
				'orderby'                => 'DESC',
				'ignore_sticky_posts'	 => 1,
				'post__not_in' => get_option( 'sticky_posts' )
			);

			$query = new WP_Query( $args );

			// The Loop
			if ( $query->have_posts() ) {
				
				echo '<div class="grid grid-' . $posts__look__columns . '">';

				while ( $query->have_posts() ) :
					
					$query->the_post();
					include(locate_template('_modules/_card--post.php'));
				
				endwhile;

				echo '</div>';

				echo '<div class="pagination">';

					echo '<span class="prev">';
						next_posts_link( '◀ Ältere Beiträge', $the_query->max_num_pages );
					echo '</span>';

					echo '<span class="next">';
						previous_posts_link( 'Neuere Beiträge ▶', $the_query->max_num_pages );
					echo '</span>';

				echo '</div>';

			} else {
				
			}

			wp_reset_postdata();
		?>
		</div>

	</div>
</section>


<?php get_footer(); ?>