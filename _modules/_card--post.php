<article class="card <?php echo $card_classes; ?> grid-item">
	
		<?php if ( has_post_thumbnail() ) { ?>
			<div class="card__image">
				<?php the_post_thumbnail('med-half'); ?>
			</div>
		<?php } ?>

	<div class="card__content">

		<?php 
			the_title( '<h3>', '</h3>', true );
			the_excerpt();
		?>
		<a href="<?php the_permalink(); ?>" class="btn btn--inline btn--color"><?php _e("Weiterlesen ...", "jwd"); ?></a>	
		
	</div>

</article>