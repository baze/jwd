<?php
	
	if ( is_home() ) {
		$page_for_posts = get_option( 'page_for_posts' );
	}

	$value = get_field('hero-classes', $page_for_posts); 
	if ($value) { $classes = implode(' ', $value); }

	$color__picker = get_field('hero__color', $page_for_posts);
	$hero__color = $color__picker["color_picker"];
?>

<section class="hero <?php echo $classes; ?>" style="background-color:<?php echo($hero__color); ?>" role="banner" id="hero">

	<?php if ( !has_post_thumbnail() ) { ?>
		<div class="hero__content container">
	<?php } else{ ?>
		<div class="hero__content">
	<?php } ?>
			<div class="hero__text">
				<h1 class="hero__headline">
					<?php
						if ( get_field('hero__headline', $page_for_posts) ) {
							the_field('hero__headline', $page_for_posts);
						} elseif (is_home() ) {
							$our_title = get_the_title( get_option('page_for_posts', true) );
							echo ($our_title);
						} else {
							the_title();
						}				
					?>						
				</h1>
				
				<?php if ( get_field('hero__subline', $page_for_posts) ) { ?>
					<h2 class="hero__subline"><?php the_field('hero__subline', $page_for_posts); ?></h2>
				<?php } ?>
				
				
				<?php if (get_field('hero__excerpt', $page_for_posts)) { ?>
					<p class="hero__excerpt">
						<?php the_field('hero__excerpt', $page_for_posts); ?>
					</p>
				<?php } elseif ( has_excerpt( $post->ID ) ) { ?>
					<p class="hero__excerpt">
						<?php the_excerpt(); ?>
					</p>
				<?php } else {  } ?>
				
			</div>
			
			<?php if ( get_field('hero__response', $page_for_posts) ) { ?>
				<div class="hero__response"><?php the_field('hero__response', $page_for_posts); ?></div>
			<?php } ?>
	</div>
	
	<?php if ( has_post_thumbnail($page_for_posts) ) { ?>
		<div class="hero__image"><?php the_post_thumbnail($page_for_posts); ?></div>	
	<?php } ?>
	
	<?php if ( get_field('hero__background', $page_for_posts) ) { ?>
		<div class="hero__background <?php the_field('hero__background-classes', $page_for_posts); ?>">
			<?php 
				$hero__background = get_field('hero__background', $page_for_posts);
				echo '<img src="' . $hero__background['url'] . '">';
			?>
				
		</div>
	<?php } ?>				

</section>