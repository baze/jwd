<footer class="footer" style="background-color: <?php the_field('footer__background', 'option'); ?>; color: <?php the_field('footer__text', 'option'); ?>; text-align: <?php the_field('footer__textalign', 'option'); ?>;" id="footer" role="contentinfo">
	
	<style>
		.footer a, .footer a:hover, .footer a:active, .footer a:visited{ color: <?php the_field('footer__text', 'option'); ?> !important;  }
	</style>

	<div class="container">

		<div class="container__inner row">
		
			<?php if ( get_field('footer__logo', 'option') ) { ?>
				
				<div class="footer__logo column columns-<?php the_field('footer__logo_columns', 'option'); ?>">
					<?php the_field('footer__logo', 'option'); ?>
				</div>

			<?php } ?>
			
			<?php if ( has_nav_menu( 'secondary' ) ) { ?>

				<nav class="footer__menu column columns-<?php the_field('footer__menu_columns', 'option'); ?>">
					<?php get_template_part('_menus/_menu-secondary');?>
				</nav>
			
			<?php } ?>

			<?php if ( get_field('socialmedia', 'option') ) {  ?>
			
				<div class="footer__socialmedia column columns-<?php the_field('footer__socialmedia_columns', 'option'); ?>">
					<?php get_template_part('_modules/_socialmedia');?>
				</div>

			<?php } ?>

			<?php if ( get_field('companies', 'option') ) {  ?>
			
				<div class="footer__companies column columns-<?php the_field('footer__companies_columns', 'option'); ?>">
					<?php get_template_part('_modules/_company');?>
				</div>

			<?php } ?>

		</div>

	</div>
</footer>