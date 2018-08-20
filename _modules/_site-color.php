<?php 
	$primary__font = get_field('primary__font', 'option');
	$secondary__font = get_field('secondary__font', 'option');
?>

<style>
	html, body, p > a{ font-family: <?php echo $secondary__font['font'] ?>; }
	h1,h2,h3,h4,h5,h6, a, button, input, textarea, select, option, .faq__question, .counter{ font-family: <?php echo $primary__font['font'] ?> ;  }
</style>

<?php
	$site__color = get_field('site__color', 'option');
?>

<?php if ( !empty($site__color) ) {  ?>
	<style>
		.menu__cta, .menu__cta:hover{ background-color: <?php echo($site__color); ?>; border: 1px solid <?php echo($site__color); ?>;}
		.menu__cta a{ color: #fff !important;  }
		.hero--color .hero__headline{ color: <?php echo($site__color); ?>; }
		.hero--color .hero__subline{ color: <?php echo($site__color); ?>; filter: brightness(75%); }
		.hero--negative{ background-color: <?php echo($site__color); ?>; }
		.hero__response	input[type="submit"]{ border: 1px solid <?php echo($site__color); ?>; background-color: <?php echo($site__color); ?>; }
		.sidebar a{ color: <?php echo($site__color); ?>; }
		.btn--color{ color: <?php echo($site__color); ?>; }
		.btn--color:hover, .btn--color:active{ color: <?php echo($site__color); ?>; filter: brightness(75%); }
		.btn--border{ color: <?php echo($site__color); ?>; border: 1px solid <?php echo($site__color); ?>; }
		.btn--border:hover{ color: <?php echo($site__color); ?>;; border: 1px solid <?php echo($site__color); ?>; }
		.btn--border:active{ background-color: <?php echo($site__color); ?>; border: 1px solid <?php echo($site__color); ?>; filter: brightness(75%); }
		.btn--negative{ border: 1px solid <?php echo($site__color); ?>; background-color: <?php echo($site__color); ?>; }
		.btn--negative:hover{ background-color: <?php echo($site__color); ?>; filter: brightness(75%); border-color: <?php echo($site__color); ?>; }
		.btn--negative:active{ color: <?php echo($site__color); ?>; filter: brightness(75%); border: 1px solid lighten <?php echo($site__color); ?>; }
		.contact__form__close, .wpcf7-submit{background-color:<?php echo($site__color); ?>;}
		.contact__form__close:hover, .wpcf7-submit:hover{color:<?php echo($site__color); ?> !important; border-color:<?php echo($site__color); ?>;}
		.accordion--active .accordion__headline{ color: <?php echo($site__color); ?>; }
		.tabs-nav-entry.tab--active{color:<?php echo($site__color); ?>;}
		.testimonial__entry__quote{color:<?php echo($site__color); ?>;}
		.pricingtable__entry--highlight .pricingtable__header{ background-color:<?php echo($site__color); ?>; }
		.pricingtable__entry--highlight .pricingtable__price{color:<?php echo($site__color); ?>;}
		.card--negative{background-color:<?php echo($site__color); ?>;}
		.card--negative .btn, .card--negative input[type="button"], .card--negative input[type="reset"], .card--negative input[type="submit"]{ border-color: rgba(0,0,0,0); }
		.card--negative .btn:hover, .card--negative input[type="button"]:hover, .card--negative input[type="reset"]:hover, .card--negative input[type="submit"]:hover{ background-color: rgba(255,255,255,0.25); color: #fff; }
		.product__price__amount{ color:<?php echo($site__color); ?>;  }
		.multiline{ background-color:<?php echo($site__color); ?>; }
		/* WooCommerce*/
		.woocommerce-info{ border-top-color: <?php echo($site__color); ?>; }
		.woocommerce-info:before, .order-total .amount, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce ul.products li.product .price{ color:<?php echo($site__color); ?>; }
		.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover{ background-color:<?php echo($site__color); ?>; }
		.headline-transition:before, .headline-transition:hover{ color:<?php echo($site__color); ?>; }
		.headline-transition:after{ background-color:<?php echo($site__color); ?>; }
		.faq__question.active, .landingpage-toc .active, blockquote:before, .shortcode-message h4, .counter__number, .mega__menu__section h3 .fa{ color: <?php echo($site__color); ?>;  }
		.woocommerce ul.products li.product .onsale, .woocommerce span.onsale{ background-color:<?php echo($site__color); ?>; filter: invert(100%); color: #000;}
		.page-template-produkte .header--fixed-transparent .menu__cta, .tax-produktkategorie .header--fixed-transparent .menu__cta, .produkte-template-default .header--fixed-transparent .menu__cta, .woocommerce-page .header--fixed-transparent .menu__cta, .under_construction__container, .badge, .wp-block-button__link:not(.has-background), .wp-block-button__link:not(.has-background):active, .wp-block-button__link:not(.has-background):focus, .wp-block-button__link:not(.has-background):hover, .fc-content, .fc-event, .fc-event-dot{ background-color:<?php echo($site__color); ?> !important; }
		.fc-event, .fc-event-dot{ border: 1px solid <?php echo($site__color); ?> !important;  }
		main p a{border-bottom: 2px solid <?php echo($site__color); ?>;}
		main p a:hover{ background-color:<?php echo($site__color); ?>; color: #fff !important;  }
		main p a:after{ background-color:<?php echo($site__color); ?>; }
	</style>
<?php } ?>