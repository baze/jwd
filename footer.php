		</main>
		
		<?php 
			$main_classes = get_field('main-options');
			
			if ( $main_classes == 'main--has-sidebar' ) {
      			
      			echo '<aside class="sidebar">';
      				get_template_part( '_modules/_sidebar-contacts' );
					dynamic_sidebar( 'sidebar-1' );
				echo '</aside>';

    		}
		?>

		</div>

		<?php if ( !is_front_page()) {  ?>
		
			<div class="container trust-container">
				<?php get_template_part( '_modules/_trust' ); ?>
			</div>

		<?php } ?>

		<?php get_template_part('_modules/_footer-flexible'); ?>

		<span id="ScriptHook"></span>
		<?php get_template_part('_modules/_assets'); ?>
		<?php get_template_part('_modules/_site-color'); ?>
		<?php wp_footer(); ?>
		<?php get_template_part('_modules/_slider-assets'); ?>
		<?php get_template_part('_modules/_animation'); ?>
		
		
	</body>
</html>
