<?php if( have_rows('elements') ): 

	$elem_num = 1;

	while ( have_rows('elements') ) : the_row(); ?>
	
	<?php ++$elem_num; ?>
	
	<div class="element" data-count="<?php if ( $elem_num & 1 ) { echo "even"; } else { echo "odd"; } ?>">
		
		<?php
			if ( get_field('site__color', 'option') && !get_sub_field('color_picker') ) {
			
				$color = get_field('site__color', 'option');
			
			} elseif ( get_sub_field('color_picker') ) {
			
				$color = get_sub_field('color_picker');
			
			}
		?>
		
		<?php 
			$element__small_animation = get_sub_field('element__small_animation');
		?>
		
		<?php if ($element__small_animation["animation_active"]) {  ?>
			<div class="element__small" style="background-color:<?php echo($color); ?>" data-aos="<?php echo $element__small_animation["animation_name"]; ?>" data-aos-delay="<?php echo $element__small_animation["animation_delay"]; ?>">
		<?php  } else {  ?>
			<div class="element__small" style="background-color:<?php echo($color); ?>">
		<?php  } ?>
			
			<div class="element__small__img">
				<?php the_sub_field('element__small__img'); ?>
			</div>

		</div>

		<?php 
			$element__big_animation = get_sub_field('element__big_animation');
		?>

		<?php if ($element__big_animation["animation_active"]) {  ?>
			<div class="element__big" data-aos="<?php echo $element__big_animation["animation_name"]; ?>" data-aos-delay="<?php echo $element__big_animation["animation_delay"]; ?>">
		<?php  } else {  ?>
			<div class="element__big">
		<?php  } ?>
			
			<div class="element__big__content">
				<?php the_sub_field('element__big__content'); ?>
				
				<?php if ( get_sub_field('element__big__url') ) { ?>
					<a class="btn btn--border btn--round" href="<?php the_sub_field('element__big__url'); ?>"><?php _e('Mehr erfahren', 'jwd'); ?></a>
				<?php } ?>
			</div>

		</div>

	</div>
	
	<?php if ( get_sub_field('non-element__name') && get_sub_field('non-element__title') && get_sub_field('non-element__excerpt') && get_sub_field('non-element__link') && get_sub_field('non-element__img')) { ?>
	
	<?php 
		$non_element_animation = get_sub_field('non-element_animation');
	?>
	
	<?php if ($non_element_animation["animation_active"]) {  ?>
			<div class="non-element" data-aos="<?php echo $non_element_animation["animation_name"]; ?>" data-aos-delay="<?php echo $non_element_animation["animation_delay"]; ?>">
		<?php  } else {  ?>
			<div class="non-element">
		<?php  } ?>
	
		<div class="non-element__content">
			
			<?php if ( get_sub_field('non-element__name') ) { ?>
				<h3 class="non-element__name" ><?php the_sub_field('non-element__name'); ?></h3>
			<?php } ?>

			<?php if ( get_sub_field('non-element__title') ) { ?>
				<h2 class="non-element__title"><?php the_sub_field('non-element__title'); ?></h2>
			<?php } ?>

			<?php if ( get_sub_field('non-element__excerpt') ) { ?>
				<p class="non-element__excerpt"><?php the_sub_field('non-element__excerpt'); ?></p>
			<?php } ?>		
			
			<?php if ( get_sub_field('non-element__url') && get_sub_field('non-element__link')) { ?>
				<a class="btn btn--negative" href="<?php the_sub_field('non-element__url'); ?>"><?php the_sub_field('non-element__link'); ?></a>
			<?php } ?>
		
		</div>
				
		<?php if ( get_sub_field('non-element__img') ) { ?>
			<?php $image_object = get_sub_field('non-element__img'); ?>
			<img class="non-element__img" src="<?php echo $image_object["url"]; ?>" alt="<?php echo $image_object["alt"]; ?>">
		<?php } ?>

	</div>
	<?php } ?>

<?php endwhile; else : endif; ?>