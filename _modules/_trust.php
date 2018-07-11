<?php

if( have_rows('trust-list', 'option') ):

	echo '<div class="trust-list">';

    while ( have_rows('trust-list', 'option') ) : the_row();
?>
		<article class="trust-entry" title="<?php the_sub_field('trust-entry-title'); ?>">
	
	<?php if ( get_sub_field('trust-entry-url') ) { ?>
		<a class="trust-entry-url" href="<?php the_sub_field('trust-entry-url'); ?>" rel="nofollow" target="_blank">
	<?php } ?>

	<?php if ( get_sub_field('trust-entry-img') ) { ?>
		<?php 
			$image = get_sub_field('trust-entry-img');
		?>
		<img src="<?php echo($image[url]); ?>" alt="<?php echo($image[description]); ?>" class="trust-entry-img">
	<?php } ?>

	<?php if ( get_sub_field('trust-entry-url') ) { ?>
		</a>
	<?php } ?>

</article>

<?php

    endwhile;

else :

endif;

echo '</div>';

?>