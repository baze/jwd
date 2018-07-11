<?php

	if ( is_home() ) {
		$page_for_posts = get_option( 'page_for_posts' );
	}

	$value = get_field('hero-classes', $page_for_posts); 
	if ($value) { $classes = implode(' ', $value); }

	$color__picker = get_field('hero__color', $page_for_posts);
	$hero__color = $color__picker["color_picker"];
?>

<section class="hero slider <?php echo $classes; ?>" style="background-color:<?php echo($hero__color); ?>" role="banner" id="hero">
	
	<div class="flexslider">
		<ul class="slides">
			
			<?php if( have_rows('slider') ): while ( have_rows('slider') ) : the_row(); ?>
	
			<li class="slide">
				
				<div class="slide__content">	

					<div class="hero__text">
						<h2 class="hero__headline"><?php the_sub_field('slider__headline'); ?></h2>
						<p class="hero__excerpt"><?php the_sub_field('slider__excerpt'); ?></p>
						<?php $slider__button = get_sub_field('slider__button'); ?>
						<a href="<?php echo $slider__button["url"]; ?>" class="btn btn--negative btn--color"><?php echo $slider__button["cta"]; ?></a>
					</div>
						

					<div class="hero__image">
						<?php $slider__image = get_sub_field('slider__image'); ?>
						<img src="<?php echo $slider__image["url"]; ?>" alt="<?php echo $slider__image["description"]; ?>">
					</div>

				</div>

			</li>	
			

			<?php endwhile; else : endif; ?>

		</ul>
	</div>

		<?php if ( get_field('hero__background', $page_for_posts) ) { ?>
			<div class="hero__background <?php the_field('hero__background-classes', $page_for_posts); ?>">
				<?php 
					$hero__background = get_field('hero__background', $page_for_posts);
					echo '<img src="' . $hero__background['url'] . '">';
				?>
			</div>
		<?php } ?>	

	

</section>