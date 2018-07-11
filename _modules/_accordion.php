<?php if( have_rows('accordion') ): ?>

	<?php $rows = 0; ?>

<section class="accordions">
	
	<?php while ( have_rows('accordion') ) : the_row(); ?>
	
	<?php ++$rows; ?>

	<?php if ($accordion_animation["animation_active"]) {  ?>
		
		<div class="accordion" data-aos="<?php echo $accordion_animation["animation_name"]; ?>" data-aos-delay="<?php echo $accordion_animation["animation_delay"] * $rows; ?>">

	<?php } else { ?>
		
		<div class="accordion">

	<?php } ?>
			
		<h3 class="accordion__headline"><?php the_sub_field('accordion__headline'); ?></h3>
		<div class="accordion__inner">
			<div class="accordion__container">
				<?php the_sub_field('accordion__content'); ?>
			</div>
		</div>

	</div>
<?php endwhile; ?>

</section>

<?php else : endif; ?>