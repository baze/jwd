<?php 
	
	if ( has_post_thumbnail() ) {	
		$site__color = get_field('site__color', 'option');
		echo '<div class="article__image" style="background-color:' . $site__color . ';"></div>';
		
		echo '<div class="container has-image">';
	} else {
		echo '<div class="container">';
	}

		
		echo '<header class="article__header container__inner">';
		
			if ( has_post_thumbnail() ) {
				echo "<figure>";
					the_post_thumbnail( 'blog' );
					
					echo "<figcaption><small>";
						the_post_thumbnail_caption();
					echo "</small></figcaption>";
				
				echo "</figure>";
			}

			echo '<div class="article__categories">';
				$categories = get_the_category();

				foreach ($categories as $category) {
					$category__link = get_category_link( $category->term_id );
					echo '<a class="article__category" href="' . $category__link . '">' . $category->name . '</a>';
				}
			echo '</div>';


			the_title( '<h1 class="article__title">', '</h1>', true );

			echo '<div class="article__meta">';

				$author_id = get_the_author_meta('ID');
				$author_name = get_the_author_meta('display_name', $author_id);
				$author_firstname = get_the_author_meta('first_name', $author_id);
				$author__image = get_avatar(get_the_author_meta('ID'));
				$author_url = get_author_posts_url( $author_id, $author_nicename );;
				$author_description = get_the_author_meta('description', $author_id);
				$twitter = get_the_author_meta( 'twitter', $post->post_author );
				$facebook = get_the_author_meta( 'facebook', $post->post_author );
				$post_date = get_the_date();
				$modified = get_the_modified_date();


				echo '<span class="artcle__meta__entry article__author">' . $author_name . ',</span>';				
				echo '<span class="artcle__meta__entry article__date">' . $post_date . '</span>';

			echo '</div>';

		echo '</header>';

		echo '<div class="article__body container__inner">';

			$show_toc = get_field('show__toc');

			if ($show_toc == "true") {
				echo '<div class="toc__hook"></div>';	
			}

			the_content();

			get_template_part('_modules/_share');
		
		echo '</div>';

		echo '<a class="article__body__toggle btn btn--negative" href="">Mehr anzeigen</a>';

		echo '<div class="post__author container__inner">';

			if ( $author__image ) {
			
			echo '<div class="post__author__image">';
				echo $author__image;
			echo '</div>';

			}

			echo '<h4 class="post__author__name"><a href="' . $author_url .'">' . $author_name . '</a></h4>';

			if ( $author_description  ) {
				echo '<p class="post__author__desc">' . $author_description . '</p>';
			}
			
			if ( $twitter && $facebook ) {
			
			echo '<div class="post__author__social">';

			if ( $twitter ) {
				echo '<a class="post__author__twitter expand" href="https://twitter.com/' . $twitter .'" rel="nofollow" target="_blank">Folge ' . $author_firstname . ' bei Twitter</a>';
			}
			

			if ( $facebook) {
				echo '<a class="post__author__facebook expand" href="'. $facebook .'" rel="nofollow" target="_blank">Folge ' . $author_firstname . ' bei Facebook</a>';	
			}
			

			echo '</div>';

			}

		echo '</div>';
	
	echo '</div>';
?>

<script type="application/ld+json">{
	<?php 
		$company = get_field('companies', 'option');
		$date = get_the_date('c');
		$modified = get_the_modified_date('c'); 
	?>

	"@context": "http://schema.org",
	"@type": "NewsArticle",
	"headline": "<?php the_title(); ?>",
	"author": "<?php echo $author_name; ?>",
	"datePublished": "<?php echo $date; ?>",
	"dateModified" : "<?php echo $modified; ?>",
	"mainEntityOfPage" : "<?php bloginfo( 'url' ); ?>",
	"image": {
		"@type": "imageObject",
		"url": "<?php the_post_thumbnail_url( 'blog' ); ?>",
		"height": "1200",
		"width": "300"
	},
	"publisher": {
		"@type": "Organization",
		"name": "<?php echo $company[0]["company__name"]; ?>",
		"logo": {
			"@type": "imageObject",
			"url": "<?php echo $company[0]["company__image"]; ?>"
		}
	}
}</script>
