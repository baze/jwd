<?php
	++$cards_rows;
	
	$value_card_classes = get_sub_field('card-classes'); 
		
		if ( is_array($value_card_classes) ) {
			$card_classes = implode(' ', $value_card_classes);
		} else {
			$card_classes = $value_card_classes;
		}
?>

<?php if ( $cards_animation["animation_active"] ) { ?>
	
	<article class="card <?php echo $card_classes; ?> column columns-<?php echo $cards_columns; ?>" data-aos="<?php echo $cards_animation["animation_name"]; ?>" data-aos-delay="<?php echo $cards_animation["animation_delay"] * $cards_rows; ?>">

<?php } else { ?>

	<article class="card <?php echo $card_classes; ?> column columns-<?php echo $cards_columns; ?>">

<?php } ?>
	
	<?php $card__image = get_sub_field( 'card__image' ); ?>
		<?php if ( $card__image ) { ?>
			<div class="card__image">
				<img src="<?php echo $card__image['url']; ?>" alt="<?php echo $card__image['alt']; ?>" />
			</div>
		<?php } ?>

	<div class="card__content">
		
		<?php 
			if ( get_sub_field('card__headline') ) {
				echo "<h3>";
					the_sub_field( 'card__headline' );
				echo "</h3>";
			}
		?>

		<?php 
			if ( get_sub_field('card__content') ) {
				the_sub_field( 'card__content' );
			}			 
		?>

		<?php if ( get_sub_field('card__link') ) { ?>
			<a href="<?php the_sub_field( 'card__link' ); ?>" class="btn btn--inline btn--color"><?php the_sub_field('card__link__text'); ?></a>	
		<?php } ?>
		
	</div>

</article>