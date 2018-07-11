<?php ++$pricingtable_rows; ?>
<?php if ($pricingtable_animation["animation_active"]) { ?>

	<div class="pricingtable__entry <?php the_sub_field('pricingtable_style'); ?>" data-aos="<?php echo $pricingtable_animation["animation_name"]; ?>" data-aos-delay="<?php echo $pricingtable_animation["animation_delay"] * $pricingtable_rows; ?>">

<?php } else { ?>

<div class="pricingtable__entry <?php the_sub_field('pricingtable_style'); ?>">

<?php } ?>

	<div class="pricingtable__header">
		<h3><?php the_sub_field('pricingtable__header'); ?></h3>
	</div>
	
	<div class="pricingtable__price">
		<span class="pricingtable__currency"><?php the_sub_field('pricingtable__currency'); ?></span>
		<span class="pricingtable__amount"><?php the_sub_field('pricingtable__amount'); ?></span>
		<span class="pricingtable__interval"><?php the_sub_field('pricingtable__interval'); ?></span>
	</div>
	
	<ul class="pricingtable__content">
		<?php 
			if( have_rows('pricingtable__content') ): while ( have_rows('pricingtable__content') ) : the_row();

			echo '<li class="pricingtable__feature">';
        		the_sub_field('pricingtable__feature');
        	echo '</li>';

    		endwhile; else : endif;
		?>
		
	</ul>
	
	<div class="pricingtable__action">
		<a href="<?php the_sub_field('pricingtable__action'); ?>" class="btn  <?php the_sub_field('pricingtable__action__style'); ?> btn--round"><?php the_sub_field('pricingtable__action__text'); ?></a>
	</div>
							
</div>