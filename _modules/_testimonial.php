<?php if ($testimonial_animation["animation_active"]) {  ?>
	<article class="testimonial__entry column columns-<?php the_sub_field('column-width'); ?>" data-aos="<?php echo $testimonial_animation["animation_name"]; ?>" data-aos-delay="<?php echo $testimonial_animation["animation_delay"] * $testimonial_row; ?>">
<?php } else {  ?>
	<article class="testimonial__entry column columns-<?php the_sub_field('column-width'); ?>">
<?php } ?>

	<q class="testimonial__entry__quote">
		<?php the_field( 'testimonial__entry__quote' ); ?>
	</q>

	<div class="testimonial__entry__ratings" data-content="<?php the_field( 'testimonial__entry__ratings' ); ?>"></div>

	<div class="testimonial__entry__text">
		
		<p>
			<?php the_field( 'testimonial__entry__text' ); ?>
		</p>
	
	</div>

	<div class="testimonial__entry__person">
		
		<?php $testimonial__entry__person__image = get_field( 'testimonial__entry__person__image' ); ?>
		<?php if ( $testimonial__entry__person__image ) { ?>
			<img class="testimonial__entry__person__image" src="<?php echo $testimonial__entry__person__image['url']; ?>" alt="<?php echo $testimonial__entry__person__image['alt']; ?>" />
		<?php } ?>
		
		<h5 class="testimonial__entry__person__name">
			<?php the_field( 'testimonial__entry__person__name' ); ?>
		</h5>
		
		<span class="testimonial__entry__person__title">
			<?php the_field( 'testimonial__entry__person__title' ); ?>
		</span>
	
	</div>

	<?php 
		$product_image = get_the_post_thumbnail_url();
		$product_name = get_bloginfo( 'name' );
		$product_date = the_modified_date(null, null, null, false);
	?>

	<script type="application/ld+json">
		{
		  "@context": "http://schema.org/",
		  "@type": "Product",
		  "image": "<?php echo($product_image); ?>",
		  "name": "<?php echo($product_name); ?>",
		  "review": {
		    "@type": "Review",
		    "reviewRating": {
		      "@type": "Rating",
		      "ratingValue": "<?php the_field( 'testimonial__entry__ratings' ); ?>"
		    },
		    "name": "<?php the_field( 'testimonial__entry__quote' ); ?>",
		    "author": {
		      "@type": "Person",
		      "name": "<?php the_field( 'testimonial__entry__person__name' ); ?>"
		    },
		    "datePublished": "<?php echo($product_date) ?>",
		    "reviewBody": "<?php the_field( 'testimonial__entry__text' ); ?>",
		    "publisher": {
		      "@type": "Organization",
		      "name": "<?php the_field( 'testimonial__entry__person__title' ); ?>"
		    }
		  }
		}
	</script>

</article>

