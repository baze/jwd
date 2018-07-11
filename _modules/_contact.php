<?php 
	$contact__form = get_field('contact__form', 'option');
	$contact__position = get_field('contact__position');
	$contact__department = get_field('contact__department');
	$contact__phone = get_field('contact__phone');
	$contact__mobile = get_field('contact__mobile');
	$contact__email = get_field('contact__email');
?>

<article class="contact card card--inline grid-item">
	
	<?php if ( has_post_thumbnail() ) {  ?>
		<div class="card__image">
			<?php the_post_thumbnail('icon-192x192'); ?>
		</div>
	<?php } ?>
	
	
	<div class="card__content">
		<?php 
			the_title( '<h4>', '</h4>', true );
			if ( $contact__position ) { echo '<div class="contact__position"><i>' . $contact__position . '</i></div>'; }
			if ( $contact__position ) { echo '<div class="contact__department">' . $contact__department . '</div>'; }
			if ( $contact__position ) { echo '<div class="contact__phone"><strong>fon: </strong><a href="tel:' . $contact__phone . '">' . $contact__phone . '</a></div>'; }
			if ( $contact__position ) { echo '<div class="contact__mobile"><strong>mobil: </strong><a href="tel:' . $contact__mobile . '">' . $contact__mobile . '</a></div>'; }
			if ( $contact__position ) { echo '<a class="btn btn--inline contact__button" href="#contact__form">Kontakt aufnehmen</a>'; }
		?>
	</div>

</article>

<div class="contact__form" id="contact__form">
	<div class="container">
		<div class="container__inner">
			<?php echo do_shortcode( '[contact-form-7 id="' . $contact__form->ID . '" title="Ansprechpartner-Formular" destination-email="'. $contact__email .'"]' ); ?>
		</div>
	</div>
	
	<span class="contact__form__close contact__button">✖</span>

</div>