<?php
	if( have_rows('mosaic') ):

		$mosaic_rows = 0;

		echo '<div class="mosaic">';

	    while ( have_rows('mosaic') ) : the_row();
	    	++$mosaic_rows;
?>			

<?php if ($mosaic_animation["animation_active"]) {  ?>
	<div class="mosaic__element" data-aos="<?php echo $mosaic_animation["animation_name"]; ?>" data-aos-delay="<?php echo $mosaic_animation["animation_delay"]; ?>">
<?php } else { ?>
	<div class="mosaic__element">
<?php } ?>

		<div class="mosaic__image">
			<?php $mosaic__image = get_sub_field('mosaic__image'); ?>
			<img src="<?php echo $mosaic__image['url']; ?>" alt="<?php echo $mosaic__image['alt']; ?>">
		</div>
		
		<div class="mosaic__content">
			<?php the_sub_field('mosaic__content'); ?>
		</div>

	</div>

	

<?php
	    endwhile;

	    echo '</div>';

	else : endif;
?>
