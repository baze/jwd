<?php if ( get_field('animations', 'option') ) {  ?>
	
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/dest/css/aos.css" />
	<script src="<?php echo get_template_directory_uri(); ?>/dest/js/aos.js"></script>

	<script>
		$(document).ready(function(){
			AOS.init({
					offset: 400,
					duration: 600,
					easing: 'ease-in-out-sine',
					delay: 500,
					disable: 'mobile',
					once: true
			});
			window.addEventListener('load', AOS.refresh);
		});
	</script>

	<style>
		@media all and (-ms-high-contrast:none){ *::-ms-backdrop,[data-aos^=fade][data-aos^=fade],[data-aos^=zoom][data-aos^=zoom]{ opacity: 1; } }
	</style>

	<noscript>
	    <style>
	        *[data-aos] {
	            display: block !important;
	            opacity: 1 !important;
	            visibility: visible !important;
	        }
	    </style>
	</noscript>

<?php } ?>