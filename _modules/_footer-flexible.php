<footer class="footer" style="background-color: <?php the_field('footer__background', 'option'); ?>; color: <?php the_field('footer__text', 'option'); ?>; text-align: <?php the_field('footer__textalign', 'option'); ?>;" id="footer" role="contentinfo">
	
	<style>
		.footer a, .footer a:hover, .footer a:active, .footer a:visited, footer h4{ color: <?php the_field('footer__text', 'option'); ?> !important;  }
	</style>

	<div class="container">

		<div class="container__inner row">
		
		<?php

			$footer__elements = get_field('footer__elements', 'option');

			if( have_rows('footer__elements', 'option') ):

			    while ( have_rows('footer__elements', 'option') ) : the_row();

			        if( get_row_layout() == 'footer__elements__logo' ):
			        	
			        	$columns = get_sub_field('column-width');
			        	echo '<div class="column columns-' . $columns . '">';
			        		get_template_part('_modules/_footer__logo');
			        	echo '</div>';

			        elseif( get_row_layout() == 'footer__elements__menu' ):

			        	$columns = get_sub_field('column-width');
			        	echo '<div class="column columns-' . $columns . '">';
			        		get_template_part('_menus/_menu-secondary');
			        	echo '</div>';

			        elseif( get_row_layout() == 'footer__elements__social' ):

			        	$columns = get_sub_field('column-width');
			        	echo '<div class="column columns-' . $columns . '">';
			        		get_template_part('_modules/_socialmedia');
			        	echo '</div>';

			        elseif( get_row_layout() == 'footer__elements__company' ):

			        	$columns = get_sub_field('column-width');
			        	echo '<div class="column columns-' . $columns . '">';
			        		get_template_part('_modules/_company');
			        	echo '</div>';

			        elseif( get_row_layout() == 'footer__elements__openinghours' ):

			        	$columns = get_sub_field('column-width');
			        	echo '<div class="column columns-' . $columns . '">';
			        		get_template_part('_modules/_openinghours');
			        	echo '</div>';

			        elseif( get_row_layout() == 'footer__elements__text' ):

			        	$columns = get_sub_field('column-width');
			        	echo '<div class="column columns-' . $columns . '">';
			        		the_sub_field('footer__elements__text__entry', 'option');
			        	echo '</div>';

			        endif;

			    endwhile;

			else : endif;

		?>	

		</div>

	</div>
</footer>