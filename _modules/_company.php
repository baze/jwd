<?php

if( have_rows('companies', 'option') ): while ( have_rows('companies', 'option') ) : the_row(); ?>

<div class="company">

	<?php if ( get_sub_field('company__name', 'option') ) { ?>
		<div class="company__name"><?php the_sub_field('company__name', 'option'); ?></div>
	<?php } ?>

	<div class="company__adress">
		
		<?php if ( get_sub_field('company__streetaddress', 'option') ) { ?>
			<span class="company__streetaddress"><?php the_sub_field('company__streetaddress', 'option'); ?></span>
		<?php } ?>
		
		<?php if ( get_sub_field('company__zipcode', 'option') ) { ?>
			<span class="company__zipcode"><?php the_sub_field('company__zipcode', 'option'); ?></span>
		<?php } ?>
		
		<?php if ( get_sub_field('company__city', 'option') ) { ?>
			<span class="company__city"><?php the_sub_field('company__city', 'option'); ?></span>		
		<?php } ?>
		
		<?php if ( get_sub_field('company__state', 'option') ) { ?>
			<span class="company__state"><?php the_sub_field('company__state', 'option'); ?></span>
		<?php } ?>
		
		<?php if ( get_sub_field('company__country', 'option') ) { ?>
			<span class="company__country"><?php the_sub_field('company__country', 'option'); ?></span>
		<?php } ?>

	</div>

	<div class="company__contact">
		
		<?php if ( get_sub_field('company__fon', 'option') ) { ?>
			<span class="company__fon"><a href="tel:<?php the_sub_field('company__fon', 'option'); ?>"><?php the_sub_field('company__fon', 'option'); ?></a></span>
		<?php } ?>

		<?php if ( get_sub_field('company__mobile', 'option') ) { ?>
			<span class="company__mobile"><a href="tel:<?php the_sub_field('company__mobile', 'option'); ?>"><?php the_sub_field('company__mobile', 'option'); ?></a></span>
		<?php } ?>
		
		<?php if ( get_sub_field('company__fax', 'option') ) { ?>
			<span class="company__fax"><a href="fax:<?php the_sub_field('company__fax', 'option'); ?>"><?php the_sub_field('company__fax', 'option'); ?></a></span>
		<?php } ?>
		
		<?php if ( get_sub_field('company__email', 'option') ) { ?>
			<span class="company__email"><a href="mailto:<?php the_sub_field('company__email', 'option'); ?>"><?php the_sub_field('company__email', 'option'); ?></a></span>
		<?php } ?>

	</div>

	<div class="company__legal">
		
		<?php if ( get_sub_field('company__representative', 'option') ) { ?>
		<span class="company__representative"><?php the_sub_field('company__representative', 'option'); ?></span>
		<?php } ?>
		
		<?php if ( get_sub_field('company__register', 'option') ) { ?>
			<span class="company__register"><?php the_sub_field('company__register', 'option'); ?></span>
		<?php } ?>
		
		<?php if ( get_sub_field('company__register__no', 'option') ) { ?>
			<span class="company__register__no"><?php the_sub_field('company__register__no', 'option'); ?></span>
		<?php } ?>
		
		<?php if ( get_sub_field('company__court', 'option') ) { ?>
			<span class="company__court"><?php the_sub_field('company__court', 'option'); ?></span>
		<?php } ?>
		
		<?php if ( get_sub_field('company__vatID', 'option') ) { ?>
			<span class="company__vatID"><?php the_sub_field('company__vatID', 'option'); ?></span>
		<?php } ?>

	</div>

</div>

<script type="application/ld+json">
<?php 
	$company__rating = get_sub_field('company__rating', 'option');
	$company__coordinates = get_sub_field('company__coordinates', 'option');
?>	
{
  "@context": "http://schema.org",
  "@type": "ProfessionalService",
  "@id": "<?php echo get_home_url(); ?>",
  "name": "<?php the_sub_field('company__name', 'option'); ?>",
  "image": "<?php the_sub_field('company__image', 'option'); ?>",
  "priceRange": "<?php the_sub_field('company__priceRange', 'option'); ?>",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "<?php the_sub_field('company__streetaddress', 'option'); ?>",
    "addressLocality": "<?php the_sub_field('company__city', 'option'); ?>",
    "addressRegion": "<?php the_sub_field('company__state__short', 'option'); ?>",
    "postalCode": "<?php the_sub_field('company__zipcode', 'option'); ?>",
    "addressCountry": "<?php the_sub_field('company__country__short', 'option'); ?>"
  },
  "telephone": "<?php the_sub_field('company__fon', 'option'); ?>",
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": <?php echo $company__coordinates["company__lat"]; ?>,
    "longitude": <?php echo $company__coordinates["company__long"]; ?>
  },
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "<?php echo $company__rating["company__ratingValue"]; ?>",
    "bestRating": "100",
    "worstRating": "1",
    "ratingCount": "<?php echo $company__rating["company__ratingCount"]; ?>"
  }
  }
}
</script>

<?php endwhile; else : endif; ?>